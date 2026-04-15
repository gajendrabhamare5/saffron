<?php

defined('BASEPATH') or exit('No direct script access allowed');

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

class Events_analysis2 extends CI_Controller
{


    public $layout = array();

    public function index($event_id = '')
    {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;

        $this->users->pwd_change_status();

        $event_id = $this->input->get('eventId');
        $marketId = $this->input->get('marketId');

        $this->layout['title'] = PROJECTNAME . ' - Account Statement';
        $this->layout['event_id'] = $event_id;
        $this->layout['marketId'] = $marketId;

        $this->load->view('header', array('handler' => $this));
        $this->load->view('events_analysis/events_analysis2', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function get_analysis($event_id = '')
    {
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->model('common_model');

        if (!$this->users->require_power(2))
            return;

        $user_data = $this->users->data();
        $user_id = $user_data['Id'];

        // ------------------ DOWNLINE USERS ------------------
        $where_event = '';
        if ($user_data['power'] < 5 || $user_data['power'] == 7) {
            $where_event = 'AND (u.parentDL = ' . $user_id . ' 
                OR u.parentMDL = ' . $user_id . ' 
                OR u.parentSuperMDL = ' . $user_id . ' 
                OR u.parentKingAdmin = ' . $user_id . ')';
        }

        $users = $this->db->query("
            SELECT u.UserID 
            FROM user_login_master u 
            WHERE 1=1 $where_event
        ")->result_array();

        $user_ids = array_column($users, 'UserID');
        $downline_user_list = !empty($user_ids) ? implode(',', $user_ids) : "0";

        // ------------------ EVENT IDS ------------------
        if ($event_id == "") {
            $events = $this->db->query("
                SELECT event_id 
                FROM bet_details 
                WHERE bet_status in (0,1) 
                AND user_id IN ($downline_user_list)
                GROUP BY event_id
            ")->result_array();

            if (empty($events))
                return;

            $event_ids_str = implode(',', array_column($events, 'event_id'));
        } else {
            $event_ids_str = $event_id;
        }

        // ------------------ MARKETS ------------------
        $markets_data = $this->db->query("
            SELECT * 
            FROM event_market_id 
            WHERE event_id IN ($event_ids_str)
            AND event_id = $event_id
            GROUP BY event_id, market_type, market_id
        ")->result();

        // ------------------ DOWNLINE DETAILS ------------------
        if ($user_data['power'] == 5) {
            $downline = $this->db->query("
                SELECT UserID,parentDL,parentMDL,parentSuperMDL,parentKingAdmin
                FROM user_login_master 
                WHERE UserID IN ($downline_user_list)
            ")->result_array();
        } else {
            $downline = $this->db->query("
                SELECT UserID,parentDL,parentMDL,parentSuperMDL,parentKingAdmin
                FROM user_login_master 
                WHERE (parentDL=$user_id 
                    OR parentMDL=$user_id 
                    OR parentSuperMDL=$user_id 
                    OR parentKingAdmin=$user_id)
                AND UserID IN ($downline_user_list)
            ")->result_array();
        }

        // ------------------ GET PARENT % ------------------
        $parent_ids = [];
        foreach ($downline as $d) {
            foreach (['parentDL', 'parentMDL', 'parentSuperMDL', 'parentKingAdmin'] as $p) {
                if (!empty($d[$p]))
                    $parent_ids[] = $d[$p];
            }
        }
        $parent_ids = array_unique($parent_ids);

        $master_user_data = [];
        if (!empty($parent_ids)) {
            $ids = implode(',', $parent_ids);
            $rows = $this->db->query("
                SELECT Id,my_percentage 
                FROM user_master 
                WHERE Id IN ($ids)
            ")->result_array();

            foreach ($rows as $r) {
                $master_user_data[$r['Id']] = $r['my_percentage'];
            }
        }

        // ------------------ SELF % ------------------
        $self_percentage_array = [];

        foreach ($downline as $d) {

            $betting_data = [
                'parentDL' => $d['parentDL'],
                'parentMDL' => $d['parentMDL'],
                'parentSuperMDL' => $d['parentSuperMDL'],
                'parentKingAdmin' => $d['parentKingAdmin']
            ];

            $percentage_parentDL = isset($master_user_data[$d['parentDL']])
                ? $master_user_data[$d['parentDL']] : 0;

            $percentage_parentMDL = isset($master_user_data[$d['parentMDL']])
                ? $master_user_data[$d['parentMDL']] : 0;

            $percentage_parentSuperMDL = isset($master_user_data[$d['parentSuperMDL']])
                ? $master_user_data[$d['parentSuperMDL']] : 0;

            $percentage_parentKingAdmin = isset($master_user_data[$d['parentKingAdmin']])
                ? $master_user_data[$d['parentKingAdmin']] : 0;

            $self_percentage_array[$d['UserID']] =
                $this->common_model->get_my_partnership_all_user(
                    $user_data,
                    $percentage_parentDL,
                    $percentage_parentMDL,
                    $percentage_parentSuperMDL,
                    $percentage_parentKingAdmin,
                    $betting_data,
                    'my'
                );
        }

        // ------------------ BET DATA ------------------
        $bets_data = $this->db->query("
            SELECT 
                SUM(bet_margin_used) total_margin,
                SUM(bet_win_amount) total_win,
                market_name, market_id, market_type, bet_type,
                event_name, user_id,
                COUNT(bet_id) total_bet
            FROM bet_details
            WHERE event_id = $event_id
            AND bet_status in (0,1)
            AND market_type != 'FANCY_ODDS'
            AND user_id IN ($downline_user_list)
            GROUP BY user_id, market_id, market_type, bet_type
        ")->result_array();

        if (empty($bets_data))
            return;

        $event_name = $bets_data[0]['event_name'];

        // ------------------ MARKET EXPOSURE ------------------
        $market_pl = [];

        $types = [
            'MATCH_ODDS',
            'TIED_MATCH',
            'BOOKMAKER_ODDS',
            'BOOKMAKER_TIED_ODDS',
            'BOOKMAKERSMALL_ODDS'
        ];

        foreach ($types as $type) {
            $res = $this->get_market_exposure_fast(
                $markets_data,
                $bets_data,
                $type,
                $self_percentage_array
            );
            if (!empty($res)) {
                $market_pl = array_merge($market_pl, $res);
            }
        }

        $total_bet = array_sum(array_column($bets_data, 'total_bet'));

        return $this->print_json([
            'results' => [
                'event_name' => $event_name,
                'event_id' => $event_id,
                'market_pl' => array_values($market_pl),
                'total_bet' => $total_bet,
                'downline_user_list' => $downline_user_list,
                'self_percentage_array' => $self_percentage_array,
            ]
        ]);
    }

    public function get_analysis_fancy($event_id = '')
    {
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->model('common_model');

        if (!$this->users->require_power(2))
            return;

        $downline_user_list = explode(",", $this->input->post('downline_user_list'));
        $self_percentage_array = $this->input->post('self_percentage_array');

        $market_pl = [];

        if ($event_id != "" && !empty($downline_user_list)) {
            $get_exposure_data = $this->fancy_book($event_id, $downline_user_list, $self_percentage_array);

            if (!empty($get_exposure_data['data'])) {
                foreach ($get_exposure_data['data'] as $market_id => $pl_array) {
                    $market_pl[$market_id] = [
                        'market_id' => $market_id,
                        'market_type' => 'FANCY_ODDS',
                        'market_name' => '', // will fill below
                        'pl' => round(min($pl_array), 2)
                    ];
                }

                // Fetch all market names in one query (inline SQL, no ?)
                $market_ids = implode(",", array_keys($market_pl));
                $event_id = intval($event_id); // sanitize
                $sql = "SELECT market_id, market_name 
                        FROM bet_details 
                        WHERE event_id = $event_id 
                        AND market_id IN ($market_ids) 
                        GROUP BY market_id";
                $market_names = $this->db->query($sql)->result_array();

                foreach ($market_names as $market) {
                    $id = $market['market_id'];
                    if (isset($market_pl[$id])) {
                        $market_pl[$id]['market_name'] = $market['market_name'];
                    }
                }
            }
        }

        return $this->print_json([
            'results' => ['market_pl' => array_values($market_pl)],
            'get_exposure_data' => isset($get_exposure_data) ? $get_exposure_data : []
        ]);
    }

    public function get_userbook($event_id = '', $market_type = 'MATCH_ODDS', $tree_userid = 0)
    {
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->model('common_model');

        if (!$this->users->require_power(2))
            return;

        $user_data = $this->users->data();
        $user_id = (int) $user_data['Id'];

        // -------------------------------
        // STEP 1: Get all bets
        // -------------------------------
        $bets = $this->db->query("
        SELECT user_id, market_id, market_type, bet_type, event_name, market_name,
               SUM(bet_margin_used) as bet_margin_used, 
               SUM(bet_win_amount) as bet_win_amount, 
               COUNT(bet_id) as total_bet
        FROM bet_details 
        WHERE event_id = $event_id 
        AND bet_status in (0,1) 
        AND market_type = '$market_type'
        GROUP BY user_id, market_id, market_type, bet_type, event_name, market_name
    ")->result_array();

        if (empty($bets)) {
            return $this->print_json(['results' => '<table class="table"></table>']);
        }

        // -------------------------------
        // STEP 2: Get all users in one query
        // -------------------------------
        $user_ids = array_unique(array_column($bets, 'user_id'));
        $ids_str = implode(',', $user_ids);

        $users = $this->db->query("
        SELECT * FROM user_master WHERE Id IN ($ids_str)
    ")->result_array();

        $userMap = [];
        foreach ($users as $u) {
            $userMap[$u['Id']] = $u;
        }

        // -------------------------------
        // STEP 3: Apply hierarchy filter
        // -------------------------------
        $filtered_bets = [];

        foreach ($bets as $b) {
            $u = isset($userMap[$b['user_id']]) ? $userMap[$b['user_id']] : null;
            if (!$u)
                continue;

            if ($user_data['power'] < 5 || $user_data['power'] == 7) {
                if (
                    $u['parentDL'] != $user_id &&
                    $u['parentMDL'] != $user_id &&
                    $u['parentSuperMDL'] != $user_id &&
                    $u['parentKingAdmin'] != $user_id
                )
                    continue;
            }

            // attach user info (simulate JOIN)
            $b['parent_id'] = $u['parent_id'];
            $b['parentDL'] = $u['parentDL'];
            $b['parentMDL'] = $u['parentMDL'];
            $b['parentSuperMDL'] = $u['parentSuperMDL'];
            $b['parentKingAdmin'] = $u['parentKingAdmin'];
            $b['power'] = $u['power'];
            $b['Email_ID'] = $u['Email_ID'];

            $filtered_bets[] = $b;
        }

        if (empty($filtered_bets)) {
            return $this->print_json(['results' => '<table class="table"></table>']);
        }

        // -------------------------------
        // STEP 4: Aggregate bets (GROUP BY equivalent)
        // -------------------------------
        $bets_data = [];

        foreach ($filtered_bets as $b) {
            $key = $b['user_id'] . '_' . $b['market_id'] . '_' . $b['bet_type'];

            if (!isset($bets_data[$key])) {
                $bets_data[$key] = [
                    'total_margin' => 0,
                    'total_win' => 0,
                    'market_name' => $b['market_name'],
                    'market_id' => $b['market_id'],
                    'market_type' => $b['market_type'],
                    'bet_type' => $b['bet_type'],
                    'event_name' => $b['event_name'],
                    'user_id' => $b['user_id'],
                    'parent_id' => $b['parent_id'],
                    'parentDL' => $b['parentDL'],
                    'parentMDL' => $b['parentMDL'],
                    'parentSuperMDL' => $b['parentSuperMDL'],
                    'parentKingAdmin' => $b['parentKingAdmin'],
                    'power' => $b['power'],
                    'Email_ID' => $b['Email_ID'],
                    'total_bet' => 0
                ];
            }

            $bets_data[$key]['total_margin'] += $b['bet_margin_used'];
            $bets_data[$key]['total_win'] += $b['bet_win_amount'];
            $bets_data[$key]['total_bet'] += $b['total_bet'];
        }

        $bets_data = array_values($bets_data);

        // -------------------------------
        // STEP 5: Get markets (no join)
        // -------------------------------
        $markets = $this->db->query("
        SELECT * FROM event_market_id
        WHERE event_id = $event_id 
        AND market_type = '$market_type'
    ")->result();

        // -------------------------------
        // STEP 6: Calculate PL
        // -------------------------------
        $market_pl = $this->get_market_exposure_userwise($markets, $bets_data, $market_type, $user_data);

        ksort($market_pl);

        // -------------------------------
        // STEP 7: Build HTML (same)
        // -------------------------------
        $header = ($tree_userid == 0);
        if ($tree_userid == 0)
            $tree_userid = $user_id;

        $html = '<table class="table ' . ($header ? '' : 'child_table') . '">';

        foreach ($market_pl as $m_pl) {

            $temp_arr = array_values($m_pl);

            if ($tree_userid != $temp_arr[0]['parent_id'])
                continue;

            $total_column = count($temp_arr) + 1;
            $td_width = (100 / $total_column);

            if ($header) {
                $html .= '<tr class="header"><td width="' . $td_width . '%">Username</td>';
                foreach ($temp_arr as $v) {
                    $html .= '<td width="' . $td_width . '%">' . $v['market_name'] . '</td>';
                }
                $html .= '</tr>';
                $header = false;
            }

            $uid = $temp_arr[0]['user_id'];
            $power = $temp_arr[0]['power'];

            $onclick = ($power > 1)
                ? "onclick=\"get_down_level_book($event_id,'$market_type',$uid,this);\""
                : '';

            $html .= "<tr>";
            $html .= "<td $onclick>{$temp_arr[0]['Email_Id']}</td>";

            foreach ($temp_arr as $v) {
                $html .= "<td>{$v['pl']}</td>";
            }

            $html .= "</tr>";
        }

        $html .= '</table>';

        return $this->print_json(['results' => $html]);
    }
    public function get_market_exposure_fast($markets, $bets_data, $market_type, $self_percentage_array)
    {
        $market_pl = [];

        // Pre-calculate sums per selection and market type
        $back_win_sum = [];
        $lay_win_sum = [];
        $back_margin_sum = [];
        $lay_margin_sum = [];

        $global_back_margin = 0;
        $global_lay_win = 0;

        foreach ($bets_data as $bet) {
            if ($bet['market_type'] !== $market_type)
                continue;

            $user_share = isset($self_percentage_array[$bet['user_id']]) ? $self_percentage_array[$bet['user_id']] : 0;
            $mid = $bet['market_id'];

            $win_contribution = ($bet['total_win'] * $user_share) / 100;
            $margin_contribution = ($bet['total_margin'] * $user_share) / 100;

            if ($bet['bet_type'] == 'Back') {
                $back_win_sum[$mid] = ($back_win_sum[$mid] ?? 0) + $win_contribution;
                $back_margin_sum[$mid] = ($back_margin_sum[$mid] ?? 0) + $margin_contribution;
                $global_back_margin += $margin_contribution;
            } else { // Lay
                $lay_win_sum[$mid] = ($lay_win_sum[$mid] ?? 0) + $win_contribution;
                $lay_margin_sum[$mid] = ($lay_margin_sum[$mid] ?? 0) + $margin_contribution;
                $global_lay_win += $win_contribution;
            }
        }

        foreach ($markets as $market) {
            if ($market->market_type !== $market_type)
                continue;

            $mid = $market->market_id;

            // Total PL for Selection S = 
            // (PL from bets ON S) + (PL from bets NOT ON S)

            // Bets ON S:
            // Back: -back_win_sum[S]
            // Lay:  +lay_margin_sum[S]

            // Bets NOT ON S:
            // Back: +(global_back_margin - back_margin_sum[S])
            // Lay:  -(global_lay_win - lay_win_sum[S])

            $pl_on_s = -($back_win_sum[$mid] ?? 0) + ($lay_margin_sum[$mid] ?? 0);
            $pl_not_on_s = ($global_back_margin - ($back_margin_sum[$mid] ?? 0)) - ($global_lay_win - ($lay_win_sum[$mid] ?? 0));

            $total_pl = $pl_on_s + $pl_not_on_s;

            $market_pl[$mid] = [
                'market_id' => $mid,
                'market_type' => $market_type,
                'market_name' => $market->market_name,
                'pl' => round($total_pl, 2)
            ];
        }

        return $market_pl;
    }


    public function get_market_exposure_userwise($all_markets = [], $bets_data = [], $market_type = 'MATCH_ODDS', $user_data = [])
    {
        $user_data = $this->users->data();
        $market_pl = [];

        foreach ($all_markets as $market) {

            if ($market->market_type != $market_type)
                continue;

            foreach ($bets_data as $bet) {

                if ($bet['market_type'] != $market_type)
                    continue;

                $pl = 0;
                $client_pl = 0;

                if ($market->market_id == $bet['market_id']) {
                    if ($bet['bet_type'] == 'Back') {
                        $pl -= $bet['total_win'];
                        $client_pl += $bet['total_win'];
                    } else {
                        $pl += $bet['total_margin'];
                        $client_pl -= $bet['total_margin'];
                    }
                } else {
                    if ($bet['bet_type'] == 'Lay') {
                        $pl -= $bet['total_win'];
                        $client_pl += $bet['total_win'];
                    } else {
                        $pl += $bet['total_margin'];
                        $client_pl -= $bet['total_margin'];
                    }
                }

                $partnerships = $this->common_model->get_partnership_with_power($user_data, $bet, 'all');

                foreach ($partnerships as $p_id => $p) {

                    if ($p['power'] >= $user_data['power'] && $p['power'] != 7)
                        continue;

                    $my_pl = ($pl / 100) * $p['per'];

                    if (!isset($market_pl[$p_id][$market->market_id])) {
                        $market_pl[$p_id][$market->market_id] = [
                            'market_id' => $market->market_id,
                            'market_name' => $market->market_name,
                            'pl' => round($my_pl, 2),
                            'user_id' => $p_id,
                            'Email_Id' => $p['Email_ID'],
                            'parent_id' => $p['parent_id'],
                            'power' => $p['power']
                        ];
                    } else {
                        $market_pl[$p_id][$market->market_id]['pl'] += round($my_pl, 2);
                    }
                }

                // client PL
                $uid = $bet['user_id'];

                if (!isset($market_pl[$uid][$market->market_id])) {
                    $market_pl[$uid][$market->market_id] = [
                        'market_id' => $market->market_id,
                        'market_name' => $market->market_name,
                        'pl' => round($client_pl, 2),
                        'user_id' => $uid,
                        'Email_Id' => $bet['Email_ID'],
                        'parent_id' => $bet['parent_id'],
                        'power' => $bet['power']
                    ];
                } else {
                    $market_pl[$uid][$market->market_id]['pl'] += round($client_pl, 2);
                }
            }
        }

        return $market_pl;
    }



    public function fancy_bet_book_master($event_id, $market_id)
    {
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->model('common_model');

        if (!$this->users->require_power(2))
            return;

        $user_data = $this->users->data();
        $user_id = (int) $user_data['Id'];

        // -------------------------------
        // STEP 1: Get client users
        // -------------------------------
        $where_event = '';
        if ($user_data['power'] < 5) {
            $where_event = "AND (parentDL=$user_id OR parentMDL=$user_id OR parentSuperMDL=$user_id OR parentKingAdmin=$user_id)";
        }

        $users = $this->db->query("SELECT Id FROM user_master WHERE 1=1 $where_event")->result_array();

        $client_ids_arr = array_column($users, 'Id');

        if (empty($client_ids_arr)) {
            echo json_encode(["status" => "ok", "data" => []]);
            return;
        }

        $client_ids = implode(',', $client_ids_arr);

        // -------------------------------
        // STEP 2: Get min/max runs
        // -------------------------------
        $master_bets_data = $this->db->query("
            SELECT event_id, market_id, market_type,
                MIN(bet_runs) as min_run,
                MAX(bet_runs) as max_run,
                MAX(bet_runs2) as max_run2
            FROM bet_details
            WHERE event_id = '$event_id'
            AND market_id = $market_id
            AND market_type='FANCY_ODDS'
            AND user_id IN ($client_ids)
            GROUP BY market_id
        ")->result_array();

        $book_list = [];

        foreach ($master_bets_data as $master_bet_data) {

            $market_type = $master_bet_data['market_type'];

            // -------------------------------
            // STEP 3: Get bets
            // -------------------------------
            $bets_data = $this->db->query("
                SELECT market_id, event_name, bet_type,
                    bet_runs, bet_runs2, SUM(bet_margin_used) as bet_margin_used,
                    SUM(bet_win_amount) as bet_win_amount, user_id
                FROM bet_details
                WHERE event_id = '$event_id'
                AND market_id = $market_id
                AND market_type='$market_type'
                AND user_id IN ($client_ids)
                GROUP BY user_id, bet_type, bet_runs, bet_runs2, market_id, event_name
            ")->result_array();

            if (empty($bets_data))
                continue;

            // -------------------------------
            // STEP 4: Preload user_login_master (IMPORTANT FIX)
            // -------------------------------
            $bet_user_ids = array_unique(array_column($bets_data, 'user_id'));
            $bet_user_ids_str = implode(',', $bet_user_ids);

            $login_users = $this->db->query("
                SELECT UserID, parentDL, parentMDL, parentSuperMDL, parentKingAdmin
                FROM user_login_master
                WHERE UserID IN ($bet_user_ids_str)
            ")->result_array();

            $loginMap = [];
            foreach ($login_users as $lu) {
                $loginMap[$lu['UserID']] = $lu;
            }

            // -------------------------------
            // STEP 5: Cache percentage
            // -------------------------------
            $percentage_cache = [];

            $run_position_arr = [];

            $min_run = ($master_bet_data['min_run'] > 1)
                ? ($master_bet_data['min_run'] - 1)
                : $master_bet_data['min_run'];

            $max_run = ($market_type == 'KHADO_ODDS')
                ? ($master_bet_data['max_run2'] + 1)
                : ($master_bet_data['max_run'] + 1);

            // -------------------------------
            // STEP 6: MAIN LOOP
            // -------------------------------
            for ($i = $min_run; $i <= $max_run; $i++) {

                foreach ($bets_data as $bet) {

                    $bet_user_id = $bet['user_id'];

                    // ✅ percentage caching (NO DB call inside loop)
                    if (!isset($percentage_cache[$bet_user_id])) {

                        if (!isset($loginMap[$bet_user_id]))
                            continue;

                        $betting_data = [
                            'parentDL' => $loginMap[$bet_user_id]['parentDL'],
                            'parentMDL' => $loginMap[$bet_user_id]['parentMDL'],
                            'parentSuperMDL' => $loginMap[$bet_user_id]['parentSuperMDL'],
                            'parentKingAdmin' => $loginMap[$bet_user_id]['parentKingAdmin'],
                        ];

                        $percentage_cache[$bet_user_id] =
                            $this->common_model->get_my_partnership($user_data, $betting_data, 'my');
                    }

                    $self_percentage = $percentage_cache[$bet_user_id];

                    $bet_type = strtolower($bet['bet_type']);
                    $bet_runs = (int) $bet['bet_runs'];
                    $bet_runs2 = (int) $bet['bet_runs2'];
                    $bet_margin_used = -1 * (float) $bet['bet_margin_used'];
                    $bet_win_amount = (float) $bet['bet_win_amount'];

                    $cur_run = $i;

                    if (!isset($run_position_arr[$cur_run])) {
                        $run_position_arr[$cur_run] = 0;
                    }

                    if ($bet_type == 'back')
                        $bet_type = 'yes';
                    else if ($bet_type == 'lay')
                        $bet_type = 'no';

                    $amount = 0;

                    if ($market_type == 'KHADO_ODDS') {

                        if ($bet_type == 'yes') {
                            if ($cur_run >= $bet_runs && ($bet_runs2 + 1) > $cur_run) {
                                $amount = $bet_win_amount;
                            } else {
                                $amount = $bet_margin_used;
                            }
                        }

                    } else {

                        if ($bet_type == 'yes') {
                            $amount = ($cur_run >= $bet_runs) ? $bet_win_amount : $bet_margin_used;
                        } else {
                            $amount = ($cur_run < $bet_runs) ? $bet_win_amount : $bet_margin_used;
                        }
                    }

                    $amount = ($amount * $self_percentage) / 100;
                    $run_position_arr[$cur_run] += $amount;
                }
            }

            // -------------------------------
            // STEP 7: FORMAT OUTPUT
            // -------------------------------
            $loop = 0;
            $count = count($run_position_arr);

            foreach ($run_position_arr as $run => $amount) {

                $amount = -1 * $amount;

                $first = ($loop == 0) ? "0-" : "";
                $last = (($loop + 1) == $count) ? "+" : "";

                $book_list[] = [
                    "runs" => $first . $run . $last,
                    "exposure" => $amount,
                ];

                $loop++;
            }
        }

        echo json_encode([
            "status" => "ok",
            "data" => $book_list,
        ]);
    }




    public function get_active_bets($event_id = '')
    {
        $this->load->database();
        $this->load->library('users');

        $user_data = $this->users->data();
        $user_id = (int) $user_data['Id'];

        // -------------------------------
        // STEP 1: Get allowed user IDs
        // -------------------------------
        $user_ids = [];

        if ($user_data['power'] < 5 || $user_data['power'] == 7) {

            $users = $this->db->query("
				SELECT UserID 
				FROM user_login_master
				WHERE UserType=1
				AND (parentDL=$user_id OR parentMDL=$user_id OR parentSuperMDL=$user_id OR parentKingAdmin=$user_id)
			")->result_array();

            if (!empty($users)) {
                $user_ids = array_column($users, 'UserID');
            }
        }

        // -------------------------------
        // STEP 2 & 3: Count total bets
        // -------------------------------
        $this->db->from('bet_details');

        if (!empty($user_ids)) {
            $this->db->where_in('user_id', $user_ids);
        }

        $this->db->where([
            'event_id' => $event_id,
            'bet_status' => 1
        ]);
        
        $total = $this->db->count_all_results();

        // -------------------------------
        // STEP 4: Fetch bets with limit
        // -------------------------------
        $results = [];
        if ($total > 0) {
            $this->db->select('bet_id,user_id,bet_runs,bet_runs2,event_id,market_id,event_name,market_name,market_type,bet_type,bet_odds,bet_stack,bet_time');
            $this->db->from('bet_details');
            if (!empty($user_ids)) {
                $this->db->where_in('user_id', $user_ids);
            }
            $this->db->where([
                'event_id' => $event_id,
                'bet_status' => 1
            ]);
            $this->db->order_by('bet_id', 'DESC');
            $this->db->limit(10);
            $results = $this->db->get()->result_array();
        }

        // -------------------------------
        // STEP 5: Fetch ONLY required users
        // -------------------------------
        $bet_user_ids = array_unique(array_column($results, 'user_id'));

        $userMap = [];

        if (!empty($bet_user_ids)) {

            $users = $this->db->query("
				SELECT Id, Email_ID 
				FROM user_master 
				WHERE Id IN (" . implode(',', $bet_user_ids) . ")
			")->result_array();

            foreach ($users as $u) {
                $userMap[$u['Id']] = $u['Email_ID'];
            }
        }

        // -------------------------------
        // STEP 6: Build HTML
        // -------------------------------
        $html = '';

        foreach ($results as $result) {

            $email = isset($userMap[$result['user_id']]) ? $userMap[$result['user_id']] : '';

            $gametype = $result['market_type'];
            if ($gametype == 'MATCH_ODDS')
                $gametype = 'MATCH';
            else if ($gametype == 'BOOKMAKER_ODDS')
                $gametype = 'MATCH1';
            else if ($gametype == 'BOOKMAKERSMALL_ODDS')
                $gametype = 'MATCH2';
            else if ($gametype == 'FANCY_ODDS')
                $gametype = 'FANCY';

            $tr_class = ($result['bet_type'] == 'Back' || $result['bet_type'] == 'Yes') ? 'back' : 'lay';

            $odd = $result['bet_odds'];
            $marketName = $result['market_name'];

            if ($result['market_type'] == 'BOOKMAKER_ODDS' || $result['market_type'] == 'BOOKMAKERSMALL_ODDS') {
                $odd = floatval($odd) * 100 - 100;
                $odd = round($odd, 3);
            }

            if ($result['market_type'] == "KHADO_ODDS") {
                $marketName .= '-' . (($result['bet_runs2'] - $result['bet_runs']) + 1);
            } else if ($result['bet_runs'] != 0) {
                $odd = $result['bet_runs'];
                $marketName .= ' / ' . $result['bet_odds'];
            }

            $html .= '<tr class="' . $tr_class . '">';
            $html .= '<td>' . $email . '</td>';
            $html .= '<td>' . $marketName . '</td>';
            $html .= '<td>' . $odd . '</td>';
            $html .= '<td>' . $result['bet_stack'] . '</td>';
            $html .= '<td>' . $result['bet_time'] . '</td>';
            $html .= '<td>' . $result['bet_time'] . '</td>';
            $html .= '<td>' . $gametype . '</td>';
            $html .= '</tr><tr><td colspan="4" style="height:3px;padding:0"></td></tr>';
        }

        if ($total == 0) {
            $html = '<td colspan="100%" align="center"> No record found!...</td>';
        }

        $returnArr = [
            'results' => $html,
            'total' => $total
        ];

        return $this->print_json($returnArr);
    }



    public function view_more_matched($event_id = '')
    {
        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;

        $user_data = $this->users->data();
        $user_id = (int) $user_data['Id'];

        // -------------------------------
        // STEP 1: Get allowed user IDs
        // -------------------------------
        $user_ids = [];

        if ($user_data['power'] < 5 || $user_data['power'] == 7) {

            $users = $this->db->query("
                SELECT Id 
                FROM user_master
                WHERE parentDL=$user_id 
                OR parentMDL=$user_id 
                OR parentSuperMDL=$user_id 
                OR parentKingAdmin=$user_id
            ")->result_array();

            if (!empty($users)) {
                $user_ids = array_column($users, 'Id');
            }
        }

        // -------------------------------
        // STEP 2: Filters
        // -------------------------------
        $client_name = $this->input->post('search-client_name', TRUE);
        $ipaddress = $this->input->post('search-ipaddress', TRUE);
        $amount_min = $this->input->post('search-amount_min', TRUE);
        $amount_max = $this->input->post('search-amount_max', TRUE);
        $bettype = $this->input->post('search-bettype', TRUE);

        // -------------------------------
        // STEP 3: Fetch bets
        // -------------------------------
        $this->db->select('*');
        $this->db->from('bet_details');

        $this->db->where([
            'bet_status' => 1,
            'event_id' => $event_id
        ]);

        if (!empty($user_ids)) {
            $this->db->where('user_id IN (' . implode(',', $user_ids) . ')', NULL, FALSE);
        }

        if ($client_name) {
            $this->db->where('user_id', $client_name);
        }

        if ($ipaddress) {
            $this->db->where('bet_ip_address', $ipaddress);
        }

        if ($amount_min) {
            $this->db->where("CONVERT(SUBSTRING_INDEX(bet_stack,'-',-1),UNSIGNED INTEGER) >=", $amount_min);
        }

        if ($amount_max) {
            $this->db->where("CONVERT(SUBSTRING_INDEX(bet_stack,'-',-1),UNSIGNED INTEGER) <=", $amount_max);
        }

        if ($bettype !== '') {
            $this->db->where("bet_type LIKE '$bettype'");
        }

        $this->db->order_by('bet_id', 'DESC');

        $bets_data = $this->db->get()->result_array();

        // -------------------------------
        // STEP 4: Get user emails (only needed)
        // -------------------------------
        $bet_user_ids = array_unique(array_column($bets_data, 'user_id'));

        $userMap = [];

        if (!empty($bet_user_ids)) {
            $users = $this->db->query("
                SELECT Id, Email_ID 
                FROM user_master 
                WHERE Id IN (" . implode(',', $bet_user_ids) . ")
            ")->result_array();

            foreach ($users as $u) {
                $userMap[$u['Id']] = $u['Email_ID'];
            }
        }

        // -------------------------------
        // STEP 5: Build HTML
        // -------------------------------
        $html = '';
        $totalpl = 0;
        $sno = 0;

        foreach ($bets_data as $bet_data) {

            $sno++;

            $email = isset($userMap[$bet_data['user_id']]) ? $userMap[$bet_data['user_id']] : '';

            $tr_type = ($bet_data['bet_type'] == 'Back' || $bet_data['bet_type'] == 'Yes') ? 'back' : 'lay';

            $marketName = $bet_data['market_name'];
            $odds = floatval($bet_data['bet_odds']);

            if ($bet_data['bet_runs'] > 0) {
                $odds = $bet_data['bet_runs'];
                $marketName .= ' / ' . $bet_data['bet_odds'];
            }

            if ($bet_data['market_type'] == 'BOOKMAKER_ODDS' || $bet_data['market_type'] == 'BOOKMAKERSMALL_ODDS') {
                $odds = round($odds * 100 - 100, 3);
            }

            $bet_wl = (float) $bet_data['bet_stack'];

            if ($bet_data['bet_stack'] > 0) {
                $totalpl += (float) $bet_data['bet_stack'];
            } else {
                $totalpl = 0;
            }

            $bet_user_agent = $bet_data['bet_user_agent'] ?: $bet_data['bet_ip_address'];

            $html .= '<tr class="' . $tr_type . '">';
            $html .= '<td>' . $email . '</td>';
            $html .= '<td>' . $marketName . '</td>';
            $html .= '<td class="text-right">' . $odds . '</td>';
            $html .= '<td class="text-right">' . $bet_data['bet_stack'] . '</td>';
            $html .= '<td>' . $bet_data['bet_time'] . '</td>';
            $html .= '<td>' . $bet_data['bet_ip_address'] . '</td>';
            $html .= '<td><a data-toggle="tooltip" title="' . $bet_user_agent . '">Details</a></td>';
            $html .= '<td class="text-right">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input bet-checkbox" id="pro_los_' . $sno . '" data-wl="' . $bet_wl . '" >
                            <label class="custom-control-label" for="pro_los_' . $sno . '"></label>
                        </div>
                    </td>';
            $html .= '</tr>';
        }

        $total_bets = count($bets_data);

        if ($total_bets == 0) {
            $html = '<td colspan="100%" align="center">No record found!...</td>';
        }

        return $this->print_json([
            'results' => $html,
            'total' => $total_bets,
            'amttot' => $totalpl
        ]);
    }



    public function getusers_block_data($event_id = 0)
    {
        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;

        $user_data = $this->users->data();
        $login_user_id = (int) $user_data['Id'];

        // -------------------------------
        // STEP 1: Get users (only needed fields)
        // -------------------------------
        $users_data = $this->db->query("
            SELECT Id, Email_ID 
            FROM user_master 
            WHERE parent_id = $login_user_id
        ")->result_array();

        if (empty($users_data)) {
            echo $this->print_json(['results' => []]);
            return;
        }

        // -------------------------------
        // STEP 2: Collect user IDs
        // -------------------------------
        $user_ids = array_column($users_data, 'Id');
        $user_ids_str = implode(',', $user_ids);

        // -------------------------------
        // STEP 3: Fetch ALL block data in ONE query
        // -------------------------------
        $blocks = $this->db->query("
            SELECT user_id, block_type 
            FROM bet_block_details
            WHERE added_by = $login_user_id
            AND event_id = $event_id
            AND user_id IN ($user_ids_str)
        ")->result_array();

        // -------------------------------
        // STEP 4: Build block map
        // -------------------------------
        $blockMap = [];

        foreach ($blocks as $b) {
            $uid = $b['user_id'];

            if (!isset($blockMap[$uid])) {
                $blockMap[$uid] = [
                    'match' => 0,
                    'fancy' => 0
                ];
            }

            if ($b['block_type'] == 1) {
                $blockMap[$uid]['match'] = 1;
            } else if ($b['block_type'] == 2) {
                $blockMap[$uid]['fancy'] = 1;
            }
        }

        // -------------------------------
        // STEP 5: Build final response
        // -------------------------------
        $return_data = [];

        foreach ($users_data as $u) {

            $uid = $u['Id'];

            $match_status = isset($blockMap[$uid]) ? $blockMap[$uid]['match'] : 0;
            $fancy_status = isset($blockMap[$uid]) ? $blockMap[$uid]['fancy'] : 0;

            $return_data[] = [
                "username" => $u['Email_ID'],
                "status" => $match_status,
                "fstatus" => $fancy_status,
            ];
        }

        echo $this->print_json(['results' => $return_data]);
    }

    public function get_active_bets_users($event_id = 0)
    {

        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();
        $added_by = $user_data['Id'];

        // Determine block type
        $block_type = $this->input->get('fancy', true) ? 2 : 1;

        // Use COUNT directly without subquery
        $this->db->from('bet_block_details');
        $this->db->where('added_by', $added_by);
        $this->db->where('block_type', $block_type);
        $this->db->where('event_id', $event_id);

        $inactive_count = $this->db->count_all_results();

        return $this->print_json(['inactive' => $inactive_count]);
    }


    public function user_bet_status()
    {
        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;

        $user_data = $this->users->data();

        $users = $this->input->post('users');
        $event_id = (int) $this->input->post('event_id');
        $status_input = $this->input->post('status');

        $returnArr = [
            'msg' => 'Error! Something wrong.',
            'status' => 0
        ];

        $login_user_id = (int) $user_data['Id'];

        if (empty($users) || empty($event_id)) {
            return $this->print_json($returnArr);
        }

        // --------------------------------
        // CASE 1: ALL USERS
        // --------------------------------
        if ($users === 'all') {

            $status = ($status_input == 1) ? 0 : 1;

            // Get all downline IDs (ONLY Id)
            $downlines = $this->db->query("
                SELECT Id FROM user_master 
                WHERE parent_id = $login_user_id
            ")->result_array();

            if (empty($downlines)) {
                return $this->print_json($returnArr);
            }

            $user_ids = array_column($downlines, 'Id');
            $user_ids_str = implode(',', $user_ids);

            // -------------------------------
            // DELETE (single query)
            // -------------------------------
            if ($status == 0) {

                $this->db->query("
                    DELETE FROM bet_block_details 
                    WHERE user_id IN ($user_ids_str)
                    AND event_id = $event_id
                    AND block_type = 1
                    AND added_by = $login_user_id
                ");

                $returnArr['msg'] = 'Success! Status has updated.';
                $returnArr['status'] = 1;

            }
            // -------------------------------
            // INSERT (batch)
            // -------------------------------
            else {

                $added_datetime = date("Y-m-d H:i:s");

                $insert_data = [];

                foreach ($user_ids as $uid) {
                    $insert_data[] = [
                        "event_id" => $event_id,
                        "user_id" => $uid,
                        "block_type" => 1,
                        "added_by" => $login_user_id,
                        "added_datetime" => $added_datetime,
                    ];
                }

                if (!empty($insert_data)) {
                    $this->db->insert_batch('bet_block_details', $insert_data);

                    $returnArr['msg'] = 'Success! Status has updated.';
                    $returnArr['status'] = 1;
                }
            }
        }

        // --------------------------------
        // CASE 2: SINGLE USER
        // --------------------------------
        else {

            $status = ($status_input == 1) ? 1 : 0;

            // Get user ID (only Id)
            $user = $this->db->query("
                SELECT Id FROM user_master 
                WHERE Email_ID = " . $this->db->escape($users) . "
            ")->row();

            if (!$user) {
                return $this->print_json($returnArr);
            }

            $block_user_id = (int) $user->Id;

            // DELETE
            if ($status == 0) {

                $this->db->query("
                    DELETE FROM bet_block_details 
                    WHERE user_id = $block_user_id
                    AND event_id = $event_id
                    AND block_type = 1
                    AND added_by = $login_user_id
                ");

                $returnArr['msg'] = 'Success! Status has updated.';
                $returnArr['status'] = 1;

            }
            // INSERT
            else {

                $insert_data = [
                    "event_id" => $event_id,
                    "user_id" => $block_user_id,
                    "block_type" => 1,
                    "added_by" => $login_user_id,
                    "added_datetime" => date("Y-m-d H:i:s"),
                ];

                $this->db->insert('bet_block_details', $insert_data);

                $returnArr['msg'] = 'Success! Status has updated.';
                $returnArr['status'] = 1;
            }
        }

        return $this->print_json($returnArr);
    }


    public function user_fancy_bet_status()
    {
        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();
        $login_user_id = $user_data['Id'];

        $users = $this->input->post('users');
        $event_id = $this->input->post('event_id');
        $status_post = $this->input->post('status'); // 1 = block, 0 = unblock

        $returnArr = [
            'msg' => 'Error! Something went wrong.',
            'status' => 0
        ];

        if (!empty($users) && !empty($event_id)) {

            $block_type = 2; // Fancy bet block

            // Determine which users to process
            if ($users === 'all') {
                $downline_ids = $this->db->select('Id')
                    ->from('user_master')
                    ->where('parent_id', $login_user_id)
                    ->get()
                    ->result_array();
                $user_ids = array_column($downline_ids, 'Id');
            } else {
                $user_row = $this->db->select('Id')
                    ->from('user_master')
                    ->where('Email_ID', $users)
                    ->get()
                    ->row_array();
                $user_ids = $user_row ? [$user_row['Id']] : [];
            }

            if (!empty($user_ids)) {
                if ($status_post == 1) {
                    // Block users: bulk insert
                    $now = date("Y-m-d H:i:s");
                    $insert_data = [];
                    foreach ($user_ids as $uid) {
                        $insert_data[] = [
                            'event_id' => $event_id,
                            'user_id' => $uid,
                            'block_type' => $block_type,
                            'added_by' => $login_user_id,
                            'added_datetime' => $now
                        ];
                    }
                    if (!empty($insert_data)) {
                        $this->db->insert_batch('bet_block_details', $insert_data);
                        $returnArr['msg'] = 'Success! Users have been blocked.';
                        $returnArr['status'] = 1;
                    }
                } else {
                    // Unblock users: bulk delete
                    $this->db->where_in('user_id', $user_ids);
                    $this->db->where('event_id', $event_id);
                    $this->db->where('block_type', $block_type);
                    $this->db->where('added_by', $login_user_id);
                    $this->db->delete('bet_block_details');

                    $returnArr['msg'] = 'Success! Users have been unblocked.';
                    $returnArr['status'] = 1;
                }
            }
        }

        return $this->print_json($returnArr);
    }







    public function fancy_book($event_id = '', $downline_user_list = null, $self_percentage_array)
    {
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->model('common_model');

        if (!$this->users->require_power(2))
            return;

        if (empty($downline_user_list))
            return [
                'status' => 'ok',
                'self_percentage_array' => $self_percentage_array,
                'data' => []
            ];

        // sanitize IDs
        $client_users_ids = implode(",", array_map('intval', $downline_user_list));
        $event_id_s = intval($event_id);

        // Step 1: Get min/max runs per market
        $sql_master = "SELECT market_id, market_type, 
                            MIN(bet_runs) as min_run, 
                            MAX(bet_runs) as max_run, 
                            MAX(bet_runs2) as max_run2
                    FROM bet_details
                    WHERE event_id = $event_id_s
                        AND market_type='FANCY_ODDS'
                        AND user_id IN ($client_users_ids)
                    GROUP BY market_id";
        $markets = $this->db->query($sql_master)->result_array();

        if (empty($markets))
            return ['status' => 'ok', 'self_percentage_array' => $self_percentage_array, 'data' => []];

        $market_bounds = [];
        $all_market_ids = [];
        foreach ($markets as $m) {
            $id = $m['market_id'];
            $all_market_ids[] = $id;
            $market_bounds[$id] = [
                'min_run' => max(1, $m['min_run'] - 1),
                'max_run' => $m['max_run'] + 1,
                'max_run2' => $m['max_run2'] + 1,
                'market_type' => $m['market_type']
            ];
        }

        $all_market_ids_text = implode(",", $all_market_ids);

        // Step 2: Fetch all bets in one query
        $sql_bets = "SELECT market_id, bet_type, bet_runs, bet_runs2, SUM(bet_margin_used) as bet_margin_used, SUM(bet_win_amount) as bet_win_amount, user_id, market_type
                    FROM bet_details
                    WHERE event_id = $event_id_s
                    AND market_id IN ($all_market_ids_text)
                    AND market_type='FANCY_ODDS'
                    AND user_id IN ($client_users_ids)
                    GROUP BY user_id, market_id, bet_type, bet_runs, bet_runs2, market_type";
        $bets_data = $this->db->query($sql_bets)->result_array();

        // Step 3: Vectorized P/L calculation
        $master_fancy_book = [];

        foreach ($bets_data as $b) {
            $user_id = strtolower($b['user_id']);
            $market_id = $b['market_id'];
            $type = strtolower($b['bet_type']);
            $bet_runs = intval($b['bet_runs']);
            $bet_runs2 = intval($b['bet_runs2']);
            $bet_margin_used = -floatval($b['bet_margin_used']);
            $bet_win_amount = floatval($b['bet_win_amount']);
            $market_type = $b['market_type'];
            $self_percentage = isset($self_percentage_array[$user_id]) ? $self_percentage_array[$user_id] : 0;

            $min_run = $market_bounds[$market_id]['min_run'];
            $max_run = ($market_type == 'KHADO_ODDS') ? $market_bounds[$market_id]['max_run2'] : $market_bounds[$market_id]['max_run'];

            $pl_array = &$master_fancy_book[$market_id];
            if (!isset($pl_array))
                $pl_array = [];

            if ($market_type == 'KHADO_ODDS') {
                $type_conv = ($type == 'back') ? 'yes' : 'no';
                if ($type_conv == 'yes') {
                    for ($i = $min_run; $i <= $max_run; $i++) {
                        $amount = ($i >= $bet_runs && ($bet_runs2 + 1) > $i) ? $bet_win_amount : $bet_margin_used;
                        $pl_array[$i] = (isset($pl_array[$i]) ? $pl_array[$i] : 0) + $amount * $self_percentage / 100;
                    }
                }
            } else {
                for ($i = $min_run; $i <= $max_run; $i++) {
                    $amount = ($type == 'back') ? (($i >= $bet_runs) ? $bet_win_amount : $bet_margin_used)
                        : (($i < $bet_runs) ? $bet_win_amount : $bet_margin_used);
                    $pl_array[$i] = (isset($pl_array[$i]) ? $pl_array[$i] : 0) + $amount * $self_percentage / 100;
                }
            }
        }

        // Step 4: Convert P/L to negative
        foreach ($master_fancy_book as $market_id => &$pl_array) {
            foreach ($pl_array as $k => $v) {
                $pl_array[$k] = -$v;
            }
        }

        return [
            'status' => 'ok',
            'self_percentage_array' => $self_percentage_array,
            'data' => $master_fancy_book
        ];
    }

    public function max_limit($event_id)
    {
        $this->load->database();

        $this->load->library('users', $this);
        $this->load->model('common_model');

        if (!$this->users->require_power(5)) {
            return;
        }

        $match_max = "";
        $bookmaker_max = "";
        $status = "";
        $get_current_limit = $this->db->query("select * from event_market_limit where event_id=$event_id and status=0")->row();
        if ($get_current_limit != null) {
            $match_max = $get_current_limit->match_max;
            $status = $get_current_limit->status;
            $bookmaker_max = $get_current_limit->bookmaker_max;
        }

        $status_inactive_selected = "";
        $status_active_selected = "";
        if ($status == 1 and $status != "") {
            $status_inactive_selected = "selected='selected'";
            $status_active_selected = "";
        } else if ($status == 0 and $status != "") {
            $status_active_selected = "selected='selected'";
            $status_inactive_selected = "";
        }

        $results = '<div class="row">
                            <div class="col-md-4 col-xs-4">
                                <div class="form-group">
                                    <label for="limit_status">Limit Status:</label>
                                    <select class="form-control" name="limit_status" id="limit_status">
										<option value="">Select Status</option>
										<option value="0" ' . $status_active_selected . '> Active</option>
										<option value="1" ' . $status_inactive_selected . '> Inactive</option>
									</select>
                                </div>
                            </div>
							<div class="col-md-4 col-xs-4">
                                <div class="form-group">
                                    <label for="match_odds_limit">Match Odds Max Limit:</label>
                                    <input type="text" name="match_odds_limit" id="match_odds_limit" class="form-control" autocomplete="off" aria-required="true" value="' . $match_max . '">
                                </div>
                            </div>
							<div class="col-md-4 col-xs-4">
                                <div class="form-group">
                                    <label for="bookmaker_limit">Bookmaker Max Limit:</label>
                                    <input type="text" name="bookmaker_limit" id="bookmaker_limit" class="form-control" autocomplete="off" aria-required="true" value="' . $bookmaker_max . '">
                                </div>
                            </div>
                        </div>';
        return $this->print_json(array('results' => $results));
    }

    public function set_max_limit()
    {
        $this->load->database();

        $this->load->library('users', $this);
        $this->load->model('common_model');

        if (!$this->users->require_power(5)) {
            return;
        }

        $sport_id = $this->input->post("sport_id");
        $event_id = $this->input->post("event_id");
        $event_name = $this->input->post("event_name");
        $oddsmarketId = $this->input->post("oddsmarketId");
        $match_min = 100;
        $bookmaker_min = 100;

        $match_max = $this->input->post("match_odds_limit");
        $bookmaker_max = $this->input->post("bookmaker_limit");

        $matchdate = $this->input->post("matchdate");
        $limit_status = $this->input->post("limit_status");

        $check_already_insert = $this->db->query("select * from event_market_limit where event_id=$event_id")->row();
        if ($check_already_insert != null) {
            //update
            $update_data = array(
                "sport_id" => $sport_id,
                "event_id" => $event_id,
                "event_name" => $event_name,
                "oddsmarketId" => $oddsmarketId,
                "match_min" => $match_min,
                "bookmaker_min" => $bookmaker_min,
                "match_max" => $match_max,
                "bookmaker_max" => $bookmaker_max,
                "matchdate" => $matchdate,
                "status" => $limit_status,
            );
            $this->db->where("event_id", $event_id);
            $this->db->update("event_market_limit", $update_data);
        } else {
            //insert
            $insert = array(
                "sport_id" => $sport_id,
                "event_id" => $event_id,
                "event_name" => $event_name,
                "oddsmarketId" => $oddsmarketId,
                "match_min" => $match_min,
                "bookmaker_min" => $bookmaker_min,
                "match_max" => $match_max,
                "bookmaker_max" => $bookmaker_max,
                "matchdate" => $matchdate,
                "status" => $limit_status,
            );
            $this->db->insert("event_market_limit", $insert);
        }
        echo json_encode(array('status' => "ok", 'message' => "Added Successfully"));
        exit();
    }

    private function print_json($array)
    {
        $this->output->set_content_type('application/json')->set_output(json_encode($array));
    }
}
