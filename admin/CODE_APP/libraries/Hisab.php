<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Shared client-line hisab: balance rollup, P/L, exposure.
 */
class Hisab {

    /** @var CI_Controller */
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
    }

    public function build_chain_children_map($user_ids)
    {
        $parent_children_map = array();
        if (empty($user_ids)) {
            return array($parent_children_map, array());
        }

        $user_ids = array_map('intval', $user_ids);
        $user_ids_str = implode(',', $user_ids);

        $down_users_data = $this->CI->db->query("
            SELECT Id, parentDL, parentMDL, parentSuperMDL, parentKingAdmin
            FROM user_master
            WHERE parentDL IN ($user_ids_str)
            OR parentMDL IN ($user_ids_str)
            OR parentSuperMDL IN ($user_ids_str)
            OR parentKingAdmin IN ($user_ids_str)
        ")->result_array();

        foreach ($down_users_data as $du) {
            foreach (array('parentDL', 'parentMDL', 'parentSuperMDL', 'parentKingAdmin') as $p) {
                if (!empty($du[$p]) && in_array((int) $du[$p], $user_ids, true)) {
                    $parent_children_map[(int) $du[$p]][] = (int) $du['Id'];
                }
            }
        }

        foreach ($parent_children_map as $pid => $children) {
            $parent_children_map[$pid] = array_values(array_unique($children));
        }

        return array($parent_children_map, array_column($down_users_data, 'Id'));
    }

    public function collect_parent_id_descendants($root_ids)
    {
        $root_ids = array_values(array_unique(array_map('intval', $root_ids)));
        $all = $root_ids;
        $seen = array_flip($root_ids);
        $frontier = $root_ids;

        while (!empty($frontier)) {
            $in = implode(',', $frontier);
            $rows = $this->CI->db->query("SELECT Id FROM user_master WHERE parent_id IN ($in)")->result_array();
            $frontier = array();
            foreach ($rows as $row) {
                $cid = (int) $row['Id'];
                if (!isset($seen[$cid])) {
                    $seen[$cid] = true;
                    $all[] = $cid;
                    $frontier[] = $cid;
                }
            }
        }

        return $all;
    }

    public function build_parent_id_children_map($user_ids)
    {
        $scope_ids = $this->collect_parent_id_descendants($user_ids);
        if (empty($scope_ids)) {
            return array();
        }

        $ids_str = implode(',', array_map('intval', $scope_ids));
        $rows = $this->CI->db->query("
            SELECT Id, parent_id FROM user_master WHERE Id IN ($ids_str)
        ")->result_array();

        $children_map = array();
        foreach ($rows as $row) {
            $parent_id = (int) $row['parent_id'];
            $child_id = (int) $row['Id'];
            if ($parent_id > 0) {
                $children_map[$parent_id][] = $child_id;
            }
        }

        return $children_map;
    }

    public function collect_subtree_ids($root_id, $parent_id_children_map, $include_root = true)
    {
        $root_id = (int) $root_id;
        $all = $include_root ? array($root_id) : array();
        $seen = $include_root ? array($root_id => true) : array();
        $frontier = array($root_id);

        while (!empty($frontier)) {
            $next = array();
            foreach ($frontier as $pid) {
                if (empty($parent_id_children_map[$pid])) {
                    continue;
                }
                foreach ($parent_id_children_map[$pid] as $cid) {
                    if (!isset($seen[$cid])) {
                        $seen[$cid] = true;
                        $all[] = $cid;
                        $next[] = $cid;
                    }
                }
            }
            $frontier = $next;
        }

        return $all;
    }

    public function get_downline_ids_for_row($row_id, $chain_children_map, $parent_id_children_map = null)
    {
        $row_id = (int) $row_id;
        $chain_ids = isset($chain_children_map[$row_id]) ? $chain_children_map[$row_id] : array();

        if ($parent_id_children_map !== null) {
            $parent_tree_ids = $this->collect_subtree_ids($row_id, $parent_id_children_map, true);
        } else {
            $parent_tree_ids = $this->collect_parent_id_descendants(array($row_id));
        }

        return array_values(array_unique(array_merge($parent_tree_ids, $chain_ids)));
    }

    public function build_row_downline_map($user_ids, $chain_children_map, $parent_id_children_map)
    {
        $row_downline_map = array();
        foreach ($user_ids as $uid) {
            $uid = (int) $uid;
            $row_downline_map[$uid] = $this->get_downline_ids_for_row(
                $uid,
                $chain_children_map,
                $parent_id_children_map
            );
        }

        return $row_downline_map;
    }

    public function fetch_balances_map($user_ids_list)
    {
        if (empty($user_ids_list)) {
            return array();
        }

        $user_ids_list = array_values(array_unique(array_map('intval', $user_ids_list)));
        $ids_str = implode(',', $user_ids_list);

        $balances = $this->CI->db->query("
            SELECT user_id, SUM(amount) AS account_balance
            FROM " . ACCOUNT_DATABASE_NAME . "
            WHERE user_id IN ($ids_str) AND status = 1
            GROUP BY user_id
        ")->result_array();

        return array_column($balances, 'account_balance', 'user_id');
    }

    public function fetch_betting_pl_map($user_ids_list)
    {
        if (empty($user_ids_list)) {
            return array();
        }

        $user_ids_list = array_values(array_unique(array_map('intval', $user_ids_list)));
        $ids_str = implode(',', $user_ids_list);

        $rows = $this->CI->db->query("
            SELECT user_id, SUM(amount) AS betting_pl
            FROM " . ACCOUNT_DATABASE_NAME . "
            WHERE user_id IN ($ids_str) AND status = 1 AND entry_type NOT IN (1,2,5)
            GROUP BY user_id
        ")->result_array();

        return array_column($rows, 'betting_pl', 'user_id');
    }

    public function fetch_user_power_map($user_ids_list)
    {
        if (empty($user_ids_list)) {
            return array();
        }

        $user_ids_list = array_values(array_unique(array_map('intval', $user_ids_list)));
        $ids_str = implode(',', $user_ids_list);

        $rows = $this->CI->db->query("
            SELECT Id, power FROM user_master WHERE Id IN ($ids_str)
        ")->result_array();

        return array_column($rows, 'power', 'Id');
    }

    public function compute_own_partnership_share($user_row, $parent_my_percentage = null)
    {
        $my_pct = isset($user_row['my_percentage']) ? (float) $user_row['my_percentage'] : 0;
        $parent_id = isset($user_row['parent_id']) ? (int) $user_row['parent_id'] : 0;

        if ($parent_my_percentage === null && $parent_id > 0) {
            $parent = $this->CI->db->query("
                SELECT my_percentage FROM user_master WHERE Id = $parent_id
            ")->row_array();
            $parent_my_percentage = $parent ? (float) $parent['my_percentage'] : 100;
        } elseif ($parent_my_percentage === null) {
            $parent_my_percentage = 100;
        }

        // my_percentage stores downline partnership; own share = parent - downline given.
        return max(0, (float) $parent_my_percentage - $my_pct);
    }

    public function sum_clients_betting_pl($down_ids, $row_id, $user_power_map, $betting_pl_map)
    {
        $row_id = (int) $row_id;
        $clients_betting_pl = 0;

        foreach ($down_ids as $did) {
            $did = (int) $did;
            if ($did === $row_id) {
                continue;
            }
            if (!isset($user_power_map[$did]) || (int) $user_power_map[$did] !== 1) {
                continue;
            }
            $clients_betting_pl += isset($betting_pl_map[$did]) ? (float) $betting_pl_map[$did] : 0;
        }

        return $clients_betting_pl;
    }

    public function fetch_liabilities_map($user_ids_list)
    {
        if (empty($user_ids_list)) {
            return array();
        }

        $user_ids_list = array_values(array_unique(array_map('intval', $user_ids_list)));
        $ids_str = implode(',', $user_ids_list);

        $liabilities = $this->CI->db->query("
            SELECT user_id,
                SUM(exposure_amount) AS betting_liability,
                SUM(max_winning_amount) AS master_betting_liability
            FROM exposure_details
            WHERE user_id IN ($ids_str) AND exposure_amount < 0
            GROUP BY user_id
        ")->result_array();

        $liabilities_map = array();
        foreach ($liabilities as $li) {
            $liabilities_map[$li['user_id']] = array(
                'betting_liability' => $li['betting_liability'],
                'master_betting_liability' => $li['master_betting_liability'],
            );
        }

        return $liabilities_map;
    }

    public function sum_line_metrics($down_ids, $balances_map, $liabilities_map)
    {
        $account_balance = 0;
        $betting_liability = 0;

        foreach ($down_ids as $did) {
            $account_balance += isset($balances_map[$did]) ? (float) $balances_map[$did] : 0;
            if (isset($liabilities_map[$did])) {
                $betting_liability += (float) $liabilities_map[$did]['betting_liability'];
            }
        }

        $exposure = ($betting_liability <= 0) ? abs($betting_liability) : 0;

        return array($account_balance, $exposure);
    }

    public function build_hisab_context($users_list, $show_summary = true)
    {
        $ctx = array(
            'chain_children_map' => array(),
            'parent_id_children_map' => array(),
            'row_downline_map' => array(),
            'balances_map' => array(),
            'liabilities_map' => array(),
            'betting_pl_map' => array(),
            'user_power_map' => array(),
            'all_downline_ids' => array(),
        );

        if (!$show_summary || empty($users_list)) {
            return $ctx;
        }

        $user_ids = array_column($users_list, 'Id');
        list($ctx['chain_children_map'], $chain_ids) = $this->build_chain_children_map($user_ids);
        $ctx['parent_id_children_map'] = $this->build_parent_id_children_map($user_ids);
        $ctx['row_downline_map'] = $this->build_row_downline_map(
            $user_ids,
            $ctx['chain_children_map'],
            $ctx['parent_id_children_map']
        );

        $parent_tree_ids = array();
        foreach ($ctx['row_downline_map'] as $down_ids) {
            $parent_tree_ids = array_merge($parent_tree_ids, $down_ids);
        }

        $ctx['all_downline_ids'] = array_values(array_unique(array_map('intval', $parent_tree_ids)));

        if (!empty($ctx['all_downline_ids'])) {
            $ctx['balances_map'] = $this->fetch_balances_map($ctx['all_downline_ids']);
            $ctx['liabilities_map'] = $this->fetch_liabilities_map($ctx['all_downline_ids']);
            $ctx['betting_pl_map'] = $this->fetch_betting_pl_map($ctx['all_downline_ids']);
            $ctx['user_power_map'] = $this->fetch_user_power_map($ctx['all_downline_ids']);
        }

        return $ctx;
    }

    public function compute_row_hisab($user_row, $ctx)
    {
        $row_id = (int) $user_row['Id'];
        if (isset($ctx['row_downline_map'][$row_id])) {
            $down_ids = $ctx['row_downline_map'][$row_id];
        } else {
            $down_ids = $this->get_downline_ids_for_row(
                $row_id,
                $ctx['chain_children_map'],
                isset($ctx['parent_id_children_map']) ? $ctx['parent_id_children_map'] : null
            );
        }

        list($account_balance, $exposure) = $this->sum_line_metrics(
            $down_ids,
            $ctx['balances_map'],
            $ctx['liabilities_map']
        );

        $account_balance1 = isset($ctx['balances_map'][$row_id]) ? (float) $ctx['balances_map'][$row_id] : 0;
        $row_power = isset($user_row['power']) ? (int) $user_row['power'] : 1;
        $user_power_map = isset($ctx['user_power_map']) ? $ctx['user_power_map'] : array();
        $betting_pl_map = isset($ctx['betting_pl_map']) ? $ctx['betting_pl_map'] : array();

        if ($row_power === 1) {
            $client_pl = $account_balance - (float) $user_row['credit_reference'];
        } else {
            $clients_betting_pl = $this->sum_clients_betting_pl(
                $down_ids,
                $row_id,
                $user_power_map,
                $betting_pl_map
            );
            $own_share = $this->compute_own_partnership_share($user_row);
            $client_pl = ($clients_betting_pl * $own_share) / 100;
        }

        return array(
            'account_balance' => round($account_balance, 2),
            'account_balance1' => round($account_balance1, 2),
            'client_pl' => round($client_pl, 2),
            'exposure' => round($exposure, 2),
            'avl_balance' => round($account_balance1 - $exposure, 2),
            'down_ids' => $down_ids,
            'down_ids_count' => count($down_ids),
        );
    }

    /** Sum of (line balance − credit ref) for each direct child — matches manage-clients footer. */
    public function sum_direct_children_pl($parent_user_id)
    {
        $parent_user_id = (int) $parent_user_id;
        $direct = $this->CI->db->query("
            SELECT Id, credit_reference FROM user_master WHERE parent_id = $parent_user_id
        ")->result_array();

        if (empty($direct)) {
            return 0;
        }

        $direct_ids = array_column($direct, 'Id');
        list($chain_map,) = $this->build_chain_children_map($direct_ids);
        $parent_id_children_map = $this->build_parent_id_children_map($direct_ids);
        $row_downline_map = $this->build_row_downline_map($direct_ids, $chain_map, $parent_id_children_map);

        $all_ids = array();
        foreach ($row_downline_map as $down_ids) {
            $all_ids = array_merge($all_ids, $down_ids);
        }
        $all_ids = array_values(array_unique(array_map('intval', $all_ids)));

        $bal_map = $this->fetch_balances_map($all_ids);
        $pl_sum = 0;

        foreach ($direct as $d) {
            $down_ids = $row_downline_map[(int) $d['Id']];
            list($line_bal,) = $this->sum_line_metrics($down_ids, $bal_map, array());
            $pl_sum += ($line_bal - (float) $d['credit_reference']);
        }

        return round($pl_sum, 2);
    }
}
