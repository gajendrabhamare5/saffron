<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Casino_results extends CI_Controller
{

    function index()
    {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;

        $this->users->pwd_change_status();

        $this->layout['title'] = PROJECTNAME . ' - Current Bets';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('reports/casino_results', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function get_casino_results($offset = 0)
    {

        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');
        $this->load->helper('common_helper');

        if (!$this->users->require_power(2))
            return;

        $limit = LIMIT;
        $casino_results_data = $this->get_casino_results_data($limit, $offset);

        $html = '';
        if (count($casino_results_data) > 0) {

            foreach ($casino_results_data as $key => $cr) {
                $result = $cr['result_status'];
                $result_text = '';

                if (in_array($cr['game_type'], array('teen20', 'teen', 'poker', 'poker20', 'poker9'))) {
                    if ($result == '0')
                        $result_text = 'Tie - ' . $cr['game_type'];
                    else
                        $result_text = 'Player ' . $result . ' - ' . $cr['game_type'];
                } else if ($cr['game_type'] == 'teen9') {
                    $testArr = array('T' => 'Tiger', 'L' => 'Lion', 'D' => 'Dragon');
                    $result_text = @$testArr[$result] . ' - teen9';
                } else if ($cr['game_type'] == 'baccarat' || $cr['game_type'] == 'baccarat2') {
                    $testArr = array('T' => 'Tie Game', 'P' => 'Player', 'B' => 'Banker');
                    $result_text = @$testArr[$result] . ' - ' . $cr['game_type'];
                } else {
                    $result_text = ' - ' . $cr['game_type'];
                }

                $html .= '<tr>'
                    . '<td><a href="' . $cr['event_id'] . '" data-type="' . $cr['game_type'] . '" class="btn_modal_result">' . $cr['event_id'] . '</a></td>'
                    . '<td>' . $result_text . '</td>'
                    . '</tr>';
            }
        } else {
            $html .= '';
        }

        $total_records = $this->get_casino_results_data();

        $data['links'] = pagi_links(MASTER_URL . '/report/casino-results/get_casino_results', $total_records, $limit, $offset);
        $data['result'] = $html;
        $this->print_json($data);
    }

    public function get_result($game_type = '', $round_id = 0)
    {
        $this->load->database();
        $this->db->where('t.event_id', $round_id);
        if ($game_type != '')
            $this->db->where('t.game_type', $game_type);
        $result_data = $this->db->get('twenty_teenpatti_result as t', 1)->row_array();

        $m_body_html = '
                <style type="text/css">
                .p-r {
    position: relative;
}
                .race-modal .race-result-box {
                    width: 386px;
                    position: relative;
                    z-index: 10;
                }
                .board-result-inner {
                        background: #f9f9f9;
                        padding: 10px;
                        font-size: 17px;
                }
.race-modal .result-image.k-image {
    position: absolute;
    right: -60px;
}
.race-modal .winner-icon {
    right: -110px;
    top: 0;
    bottom: unset;
}
.race-modal .video-winner-text {
    color: #000;
    position: absolute;
    right: -3px;
    top: 0;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    height: calc(100% - 5px);
    font-size: 30px;
    width: 55px;
    border: 1px solid yellow;
    padding: 20px;
    z-index: -1;
    background-color: #efeded;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}
                .yellowbx {
                        color: #caca03;
                }

                .player-image-container img {
                        max-width: 45px;
                }

                .c-title {
                        font-weight: bold;
                        font-size: 24px;
                        margin-bottom: 6px;
                        color: #222;
                        text-align: center;
                        margin-top: 15px;
                }

                .eightplayer img {
                        width: 35px;
                        margin-right: 0px;
                }

                .result-row {
                        position: relative;
                        margin-bottom: 50px;
                }

                .result-row .winner-label {
                        font-size: 16px;
                        position: absolute;
                        margin-top: 10px;
                        left: 50%;
                        transform: translateX(-50%);
                }

                .v-t {
                        vertical-align: top;
                }

                .winner-icon i {
                        font-size: 26px;
                        box-shadow: 0 0 0 var(--secondary-bg);
                        -webkit-animation: winnerbox 2s infinite;
                        animation: winnerbox 1.5s infinite;
                        border-radius: 50%;
                        color: #169733;
                }

                @-webkit-keyframes winnerbox {
                        0% {
                                -webkit-box-shadow: 0 0 0 0 rgba(29, 127, 30, .6)
                        }
                        70% {
                                -webkit-box-shadow: 0 0 0 10px rgba(29, 127, 30, 0)
                        }
                        100% {
                                -webkit-box-shadow: 0 0 0 0 rgba(29, 127, 30, 0)
                        }
                }
                </style>
                ';
                /*$m_body_html .= $this->db->last_query();*/
        if ($result_data) {

            if (in_array(strtolower($result_data['game_type']), array('teen20', 'teen9', 'teen'))) {
                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span>
                                </div>
                            </div>
                            <div class="row player-container m-t-10">';

                $cards_arr = json_decode($result_data['cards'], true);
                $card_3_arr = array();
                $number_of_players = 2;
                if ($result_data['game_type'] == "teen9") {
                    $number_of_players = 3;
                }
                $i = 0;
                foreach ($cards_arr as $c_data) {
                    if ($result_data['game_type'] == "teen9") {
                        if ($i % $number_of_players == 2) {
                            $card_3_arr[2][] = $c_data;
                        }
                    }
                    if ($i % $number_of_players == 1) {
                        $card_3_arr[1][] = $c_data;
                    } else if ($i % $number_of_players == 0) {
                        $card_3_arr[0][] = $c_data;
                    }
                    $i++;
                }

                $alphachar = array('A', 'B');
                if ($result_data['game_type'] == 'teen9') {
                    $alphachar = array('T', 'L', 'D');
                } else {
                }

                $result_key = (array_search($result_data['result_status'], $alphachar));

                foreach ($card_3_arr as $key => $cards) {
                    $m_body_html .= '
                                <div class="player-number">
                                    <h4 class="text-center">Player ' . $alphachar[$key] . '</h4>
                                    <div class="player-image-container row">

                                        <div class="col-md-12 text-center">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cards[0] . '.png">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cards[1] . '.png">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cards[2] . '.png">
                                        </div>

                                        <div class="col-md-12 text-center">' .
                        (($result_key == $key) ? '<label class="winner-label bg-success m-t-20">Winner</label>' : '')
                        . '        </div>
                                    </div>
                                </div>
                        ';
                }

                $m_body_html .= '       </div>
                        </div>
                    ';
            } elseif ($result_data['game_type'] == 'teen8') {
                $winnersArr = explode(',', $result_data['result_status']);
                $cardsArr = json_decode($result_data['cards']);
                $m_body_html = '
                    <style>
                        .sixplayer-image img {
                            max-width: 45px;
                        }
                    </style>
            <div class="container-fluid">
               <div class="row m-t-10">
                  <div class="col-md-12">
                     <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span>
                  </div>
               </div>
               <div class="eightplayer">
                  <div class="row result-row">
                     <div class="col-md-3 sixplayer-image">
                        <h4 class="text-center">1</h4>
                        <div class="text-center">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[0] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[9] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[18] . '.png">
                        </div>
                        ' .
                    ((in_array("1", $winnersArr)) ?
                        '<div class="text-center">
                                    <label class="winner-label bg-success">Winner</label>
                                 </div>' :
                        '')
                    . '
                     </div>
                     <div class="col-md-6 sixplayer-image">
                        <h4 class="text-center">Dealer</h4>
                        <div class="text-center">
                           <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[8] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[17] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[26] . '.png">
                        </div>
                     </div>
                     <div class="col-md-3 sixplayer-image">
                        <h4 class="text-center">8</h4>
                        <div class="text-center">
                           <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[7] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[16] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[25] . '.png">
                        </div>
                        ' .
                    ((in_array(8, $winnersArr)) ?
                        '<div class="text-center">
                                    <label class="winner-label bg-success">Winner</label>
                                 </div>' :
                        '')
                    . '
                     </div>
                  </div>
                  <div class="row result-row">
                     <div class="col-md-3 sixplayer-image">
                        <h4 class="text-center">2</h4>
                        <div class="text-center">
                           <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[1] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[10] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[19] . '.png">
                        </div>
                        ' .
                    ((in_array(2, $winnersArr)) ?
                        '<div class="text-center">
                                    <label class="winner-label bg-success">Winner</label>
                                 </div>' :
                        '')
                    . '
                     </div>
                     <div class="col-md-6 sixplayer-image">
                     </div>
                     <div class="col-md-3 sixplayer-image">
                        <h4 class="text-center">7</h4>
                        <div class="text-center">
                           <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[6] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[15] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[24] . '.png">
                        </div>
                        ' .
                    ((in_array(7, $winnersArr)) ?
                        '<div class="text-center">
                                    <label class="winner-label bg-success">Winner</label>
                                 </div>' :
                        '')
                    . '
                     </div>
                  </div>
                  <div class="row result-row">
                     <div class="col-md-3 sixplayer-image">
                        <h4 class="text-center">3</h4>
                        <div class="text-center">
                           <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[2] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[11] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[20] . '.png">
                        </div>
                        ' .
                    ((in_array(3, $winnersArr)) ?
                        '<div class="text-center">
                                    <label class="winner-label bg-success">Winner</label>
                                 </div>' :
                        '')
                    . '
                     </div>
                     <div class="col-md-3 sixplayer-image">
                        <h4 class="text-center">4</h4>
                        <div class="text-center">
                           <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[3] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[12] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[21] . '.png">
                        </div>
                        ' .
                    ((in_array(4, $winnersArr)) ?
                        '<div class="text-center">
                                    <label class="winner-label bg-success">Winner</label>
                                 </div>' :
                        '')
                    . '
                     </div>
                     <div class="col-md-3 sixplayer-image">
                        <h4 class="text-center">5</h4>
                        <div class="text-center">
                           <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[4] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[13] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[22] . '.png">
                        </div>
                        ' .
                    ((in_array(5, $winnersArr)) ?
                        '<div class="text-center">
                                    <label class="winner-label bg-success">Winner</label>
                                 </div>' :
                        '')
                    . '
                     </div>
                     <div class="col-md-3 sixplayer-image">
                        <h4 class="text-center">6</h4>
                        <div class="text-center">
                           <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[5] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[14] . '.png">
                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[23] . '.png">
                        </div>
                        
                        ' .
                    ((in_array(6, $winnersArr)) ?
                        '<div class="text-center">
                                    <label class="winner-label bg-success">Winner</label>
                                 </div>' :
                        '')
                    . '
                     </div>
                  </div>
               </div>
            </div>';
            } elseif ($result_data['game_type'] == 'poker20' || $result_data['game_type'] == 'poker') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $desc_remakrs = $result_data['desc_remakrs'];


                $rdesc = str_replace(" ", "", $desc_remakrs);
                $rdesc_array = explode("#", $rdesc);



                $winner = $rdesc_array[0];
                $pair_check = $rdesc_array[1];
                if ($casino_type == "poker") {
                    $pair_check = $rdesc_array[2];
                }
                $pair_check_array = explode("|", $pair_check);
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                                <span class="float-right round-id">
                                    <b>Round ID:</b> ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                            <div class="player-number">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container row">' .
                    (($result_status == 'A') ?
                        '<div class="col-md-6 text-center">
                                        <label class="winner-label bg-success m-t-20">Winner</label>
                                    </div>' : '')
                    . '<div class="col-md-6 text-center">
                                        <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[0] . '.png">
                                        <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[1] . '.png">
                                    </div>
                                </div>
                            </div>
                            <div class="player-number">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container row">' .
                    (($result_status == 'B') ?
                        '<div class="col-md-6 text-center">
                                        <label class="winner-label bg-success m-t-20">Winner</label>
                                    </div>' : '')
                    . '
                                    <div class="col-md-6 text-center">
                                        <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[2] . '.png">
                                        <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[3] . '.png">
                                    </div>
                                    <div class="col-md-6 text-center"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-10 text-center ">
                            <div class="player-number ">
                                <div class="">
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[4] . '.png">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[5] . '.png">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[6] . '.png">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[7] . '.png">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[8] . '.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                    <div class="m-b-5">
                                        <span class="greenbx">Winner:</span> ' . $winner . '
                                    </div>';

                if ($pair_check_array != null) {

                    foreach ($pair_check_array as $pair_data) {
                        $pair_data_array = explode(":", $pair_data);
                        if ($pair_data_array != null) {
                            $winner_side = $pair_data_array[0];
                            $winner_type = $pair_data_array[1];
                            if ($winner_side == "A") {
                                $texg_color = "redbx";
                            } else {
                                $texg_color = "yellowbx";
                            }

                            $m_body_html .= '<div class="m-b-5">
                                        <span class="' . $texg_color . '">PLAYER ' . $winner_side . ':</span> ' . $winner_type . '
                                    </div>';
                        }
                    }
                }


                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'poker9') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $desc = $result_data['desc_remakrs'];
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                                <span class="float-right round-id">
                                    <b>Round ID:</b> ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="poker9-result">
                            <div class="row player-container m-t-10">
                                <div class="player-number">
                                    <div class="player-image-container">
                                        <div class="row">
                                            <div class="col-sm-3 text-center">
                                                <div class="c-title  text-center">1</div>
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[0] . '.png">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[6] . '.png">
                                                ' . (($result_status == 1) ? '<label class="winner-label bg-success m-t-20">Winner</label>' : '') . '
                                            </div>
                                            <div class="col-sm text-center">
                                                <div class="c-title  text-center m-t-20">Board</div>
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[12] . '.png">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[13] . '.png">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[14] . '.png" class="m-r-10">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[15] . '.png" class="m-r-10">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[16] . '.png">
                                            </div>
                                            <div class="col-sm-3 text-center">
                                                <div class="c-title  text-center">6</div>
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[5] . '.png">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[11] . '.png">
                                                ' . (($result_status == 6) ? '<label class="winner-label bg-success m-t-20">Winner</label>' : '') . '
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm"></div>
                                            <div class="col-sm-3 text-center">
                                                <div class="c-title text-center">2</div>
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[1] . '.png">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[7] . '.png">
                                                ' . (($result_status == 2) ? '<label class="winner-label bg-success m-t-20">Winner</label>' : '') . '
                                            </div>
                                            <div class="col-sm"></div>
                                            <div class="col-sm-3 text-center">
                                                <div class="c-title  text-center">5</div>
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[4] . '.png">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[10] . '.png">
                                                ' . (($result_status == 5) ? '<label class="winner-label bg-success m-t-20">Winner</label>' : '') . '
                                            </div>
                                            <div class="col-sm"></div>
                                        </div>
                                        <div class=" row">
                                            <div class="col-sm"></div>
                                            <div class="col-sm text-center">
                                                <div class="c-title text-center">3</div>
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[2] . '.png">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[8] . '.png">
                                                ' . (($result_status == 3) ? '<label class="winner-label bg-success m-t-20">Winner</label>' : '') . '
                                            </div>
                                            <div class="col-sm text-center">
                                                <div class="c-title text-center">4</div>
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[3] . '.png">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[9] . '.png">
                                                ' . (($result_status == 4) ? '<label class="winner-label bg-success m-t-20">Winner</label>' : '') . '
                                            </div>
                                            <div class="col-sm"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="resultd">
                                <span class="greenbx">Result:</span> ' . $desc . '

                            </div>
                        </div>
                    </div>
                ';
            } else if ($result_data['game_type'] == 'lucky7' || $result_data['game_type'] == 'lucky7eu') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];

                $details = $this->card_details($cardsArr[0]);

                $result_status_text = "";
                if ($result_status == "T" || $details['name'] == 7) {
                    $result_status_text = "Tie";
                } else if ($result_status == "H" or $result_status == "2") {
                    $result_status_text = "High Card";
                } else if ($result_status == "L" or $result_status == "1") {
                    $result_status_text = "Low Card";
                }

                $result_status_text .= ' || ' . $details['oddeven'] . ' || ' . $details['color'] . ' || Card ' . $details['name'];

                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span>
                                </div>
                            </div>
                                <div class="row player-container m-t-10">
                                <div class="player-number">
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[0] . '.png">
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="resultd m-t-20">
                                               <span class="greenbx">Result:</span> ' . $result_status_text . '
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>';
            }
            else if ($result_data['game_type'] == 'superover') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];
                $data_cards = json_decode($result_data['data']);

                $details = $this->card_details($cardsArr[0]);

               $winner_name = "";
                if($result_status == 1){
                    $winner_name = "ENG";
                }
                else if($result_status == 2){
                    $winner_name = "RSA";
                }
                else{
                    $winner_name = "TIE";
                }

                $ball_0_1 = "";
        $ball_0_2 = "";
        $ball_0_3 = "";
        $ball_0_4 = "";
        $ball_0_5 = "";
        $ball_0_6 = "";
        $ball_0_run_over = "";
        $ball_0_score = "";
        
        
        $ball_1_1 = "";
        $ball_1_2 = "";
        $ball_1_3 = "";
        $ball_1_4 = "";
        $ball_1_5 = "";
        $ball_1_6 = "";
        $ball_1_run_over = "";
        $ball_1_score = "";
        
        $team_1_score = 0;
        $team_1_wicket = 0;
        $team_2_score = 0;
        $team_2_wicket = 0;
        foreach($data_cards[1] as $cards_data){
                        $nation = $cards_data->nation;
                        if(!isset($nation)){
                            $nation = $cards_data->nat;
                        }
            $ball  = $cards_data->ball;
            $run  = $cards_data->run;
            $wkt  = $cards_data->wkt;
            if($nation == "ENG"){
                $team_1_score = $team_1_score + $run;
                if($ball == "0.1"){
                    $ball_0_1 = $run;
                    if($wkt == 1){
                        $ball_0_1 = "ww";
                        $team_1_wicket++;
                    }
                }
                else if($ball == "0.2"){
                    $ball_0_2 = $run;
                    if($wkt == 1){
                        $ball_0_2 = "ww";
                        $team_1_wicket++;
                    }
                }
                else if($ball == "0.3"){
                    $ball_0_3 = $run;
                    if($wkt == 1){
                        $ball_0_3 = "ww";
                        $team_1_wicket++;
                    }
                }
                else if($ball == "0.4"){
                    $ball_0_4 = $run;
                    if($wkt == 1){
                        $ball_0_4 = "ww";
                        $team_1_wicket++;
                    }
                }
                else if($ball == "0.5"){
                    $ball_0_5 = $run;
                    if($wkt == 1){
                        $ball_0_5 = "ww";
                        $team_1_wicket++;
                    }
                }
                else if($ball == "0.6"){
                    $ball_0_6 = $run;
                    if($wkt == 1){
                        $ball_0_6 = "ww";
                        $team_1_wicket++;
                    }
                }
            }
            else{
                $team_2_score = $team_2_score + $run;
                if($ball == "0.1"){
                    $ball_1_1 = $run;
                    if($wkt == 1){
                        $ball_1_1 = "ww";
                        $team_2_wicket++;
                    }
                }
                else if($ball == "0.2"){
                    $ball_1_2 = $run;
                    if($wkt == 1){
                        $ball_1_2 = "ww";
                        $team_2_wicket++;
                    }
                }
                else if($ball == "0.3"){
                    $ball_1_3 = $run;
                    if($wkt == 1){
                        $ball_1_3 = "ww";
                        $team_2_wicket++;
                    }
                }
                else if($ball == "0.4"){
                    $ball_1_4 = $run;
                    if($wkt == 1){
                        $ball_1_4 = "ww";
                        $team_2_wicket++;
                    }
                }
                else if($ball == "0.5"){
                    $ball_1_5 = $run;
                    if($wkt == 1){
                        $ball_1_5 = "ww";
                        $team_2_wicket++;
                    }
                }
                else if($ball == "0.6"){
                    $ball_1_6 = $run;
                    if($wkt == 1){
                        $ball_1_6 = "ww";
                        $team_2_wicket++;
                    }
                }
            }
            
            $ball_0_score = "$team_1_score/$team_1_wicket";
            $ball_1_score = "$team_2_score/$team_2_wicket";
            $ball_0_run_over = "$team_1_score";
            $ball_1_run_over = "$team_2_score";
        }
        
        $result_status_text = str_replace($result_text." | ","",$descText);     

        /*$result_status_text .= $details['color'] . ' || ' . $details['oddeven'] . ' || Card ' . $details['name'];*/
        
        

          

                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span>
                                </div>
                                <br> 
                                <div class="col-md-12">
                                    <span class="float-right ">Winner: <span class="greenbx"> ' . $winner_name . '</span> '.$descText.'</span>
                                </div>
                            </div>
                            <div>
   <div class="table-responsive">
      <div class="market-title">First Innings</div>
      <table class="table table-bordered">
         <tr>
            <th class="text-center"><b><span class="text-success">ENG</span></b></th>
            <th class="text-center"><b>1</b></th>
            <th class="text-center"><b>2</b></th>
            <th class="text-center"><b>3</b></th>
            <th class="text-center"><b>4</b></th>
            <th class="text-center"><b>5</b></th>
            <th class="text-center"><b>6</b></th>
            <th class="text-center"><b>Run/Over</b></th>
            <th class="text-center"><b>Score</b></th>
         </tr>
         <tr>
            <td class="text-center"><b>Over 1</b></td>
            <td class="text-center"><span class="text-danger">'.$ball_0_1.'</span></td>
            <td class="text-center"><span class="text-danger">'.$ball_0_2.'</span></td>
            <td class="text-center"><span class="text-danger">'.$ball_0_3.'</span></td>
            <td class="text-center"><span class="text-danger">'.$ball_0_4.'</span></td>
            <td class="text-center"><span class="text-danger">'.$ball_0_5.'</span></td>
            <td class="text-center"><span class="text-danger">'.$ball_0_6.'</span></td>
            <td class="text-center nationcard">'.$ball_0_run_over.'</td>
            <td class="text-center nationcard">'.$ball_0_score.'</td>
         </tr>
      </table>
   </div>
   <div class="table-responsive mt-3">
      <div class="market-title">Second Innings</div>
      <table class="table table-bordered">
         <tr>
            <th class="text-center"><b><span class="text-success">RSA</span></b></th>
            <th class="text-center"><b>1</b></th>
            <th class="text-center"><b>2</b></th>
            <th class="text-center"><b>3</b></th>
            <th class="text-center"><b>4</b></th>
            <th class="text-center"><b>5</b></th>
            <th class="text-center"><b>6</b></th>
            <th class="text-center"><b>Run/Over</b></th>
            <th class="text-center"><b>Score</b></th>
         </tr>
         <tr>
            <td class="text-center"><b>Over 1</b></td>
            <td class="text-center"><span class="text-danger">'.$ball_1_1.'</span></td>
            <td class="text-center"><span class="text-danger">'.$ball_1_2.'</span></td>
            <td class="text-center"><span class="text-danger">'.$ball_1_3.'</span></td>
            <td class="text-center"><span class="text-danger">'.$ball_1_4.'</span></td>
            <td class="text-center"><span class="text-danger">'.$ball_1_5.'</span></td>
            <td class="text-center"><span class="text-danger">'.$ball_1_6.'</span></td>
            <td class="text-center nationcard">'.$ball_1_run_over.'</td>
            <td class="text-center nationcard">'.$ball_1_score.'</td>
         </tr>
      </table>
   </div>
</div>
                        </div>';
            } 
            else if ($result_data['game_type'] == 'aaa') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];

                $details = $this->card_details($cardsArr[0]);

                $result_text = "";
        if($result_status == "A"){
            $result_text = "Amar";
        }else if($result_status == "B"){
            $result_text = "Akbar";
        }else if($result_status == "C"){
            $result_text = "Anthony";
        }
        
        $result_status_text = str_replace($result_text." | ","",$descText);     

        /*$result_status_text .= $details['color'] . ' || ' . $details['oddeven'] . ' || Card ' . $details['name'];*/
        
        

          

                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span>
                                </div>
                            </div>
                                <div class="row player-container m-t-10">
                                <div class="player-number">
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[0] . '.png">
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="resultd m-t-20">
                                               <span class="greenbx">Result:</span> ' . $result_text . '
                                                <br>
                                                <span>'.$result_status_text.'</span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>';
            } 
            else if ($result_data['game_type'] == 'cmatch20') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];

                
          

                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span>
                                </div>
                            </div>
                                <div class="row player-container m-t-10">
                                <div class="player-number">
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[0] . '.png">
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                        </div>';
            } 
             else if ($result_data['game_type'] == 'dtl20') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $m_body_html .= '
                            <div class="container-fluid">
                                <div class="row m-t-10">
                                    <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span> </div>
                                </div>
                                <div class="row player-container m-t-10">
                                    <div class="player-number">
                                        <h4 class="text-center"></h4>
                                        <div class="player-image-container row">
                                            <div class="col-md-12 text-center">
                                                <div class="col-md-2 d-inline-block v-t"> 
                                                    <span class="text-center"><b>Dragon</b></span> 
                                                    <img class="m-t-10"  src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[0] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> 
                                                        ' . (($result_status == 'D') ? '<i class="text-success fas fa-trophy"></i> ' : '') . '
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-inline-block v-t"> 
                                                    <span class="text-center"><b>Tiger</b></span> 
                                                    <img class="m-t-10"  src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[1] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> 
                                                    ' . (($result_status == 'T') ? '<i class="text-success fas fa-trophy"></i> ' : '') . '
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-inline-block v-t"> 
                                                    <span class="text-center"><b>Lion</b></span> 
                                                    <img class="m-t-10"  src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[2] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> 
                                                    ' . (($result_status == 'L') ? '<i class="text-success fas fa-trophy"></i> ' : '') . '
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            } else if ($result_data['game_type'] == 'dt6' || $result_data['game_type'] == 'dt20') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descArr = explode('@@', $result_data['desc_remakrs']);

                $d_details = $this->card_details($cardsArr[0]);
                $dragon_label = implode(' | ', $d_details);

                $t_details = $this->card_details($cardsArr[1]);
                $tiger_label = implode(' | ', $t_details);

                $result_text = "";
                if ($result_status == "D") {
                    $result_text = "Dragon";
                } else if ($result_status == "T") {
                    $result_text = "Tiger";
                }

                $is_pair_text = 'No';
                $is_pair = $this->is_pair_dt20($cardsArr[0], $cardsArr[1]);
                if ($is_pair)
                    $is_pair_text .= 'Is';

                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span>
                                </div>
                            </div>
                            <div class="row player-container m-t-10">
                                <div class="player-number">
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[0] . '.png">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[1] . '.png">
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="resultd m-t-20">
                                                <span class="greenbx">Result:</span> ' . $result_text . ' | ' . $is_pair_text . 'Pair
                                            </div>
                                            <div><b>Dragon:</b> ' . $dragon_label . '</div> 
                                            <div><b>Tiger:</b> ' . $tiger_label . '</div> 
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        ';
            } else if ($result_data['game_type'] == 'btable') {
                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];

                $details = $this->card_details($cardsArr[0]);

                $result_text = "";
                if ($result_status == "A") {
                    $result_text = "DON";
                } else if ($result_status == "B") {
                    $result_text = "Amar Akbar Anthony";
                } else if ($result_status == "C") {
                    $result_text = "Sahib Bibi Aur Ghulam";
                } else if ($result_status == "D") {
                    $result_text = "Dharam Veer";
                } else if ($result_status == "E") {
                    $result_text = "Kis KisKo Pyaar Karoon";
                } else if ($result_status == "F") {
                    $result_text = "Ghulam";
                }

                $is_dulhan = $this->is_dulhan($cardsArr[0]);
                if ($is_dulhan) {
                    $dulha_barati = "Dulha Dulhan";
                } else {
                    $dulha_barati = "Barati";
                }

                $result_status_text = $details['oddeven'] . ' || ' . $details['color'] . ' || ' . $dulha_barati . ' || Card ' . $details['name'];

                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span>
                                </div>
                            </div>
                                <div class="row player-container m-t-10">
                                <div class="player-number">
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center">
                                            <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[0] . '.png">
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="resultd m-t-20">
                                               <span class="greenbx">Result:</span> ' . $result_text . '<br>
                                                   ' . $result_status_text . '
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>';
            } else if ($result_data['game_type'] == 'card32' || $result_data['game_type'] == 'card32eu') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];

                $player_8 = array($cardsArr[0], $cardsArr[4], $cardsArr[8], $cardsArr[12], $cardsArr[16], $cardsArr[20], $cardsArr[24], $cardsArr[28], $cardsArr[32]);

                $player_9 = array($cardsArr[1], $cardsArr[5], $cardsArr[9], $cardsArr[13], $cardsArr[17], $cardsArr[21], $cardsArr[25], $cardsArr[29], $cardsArr[33]);

                $player_10 = array($cardsArr[2], $cardsArr[6], $cardsArr[10], $cardsArr[14], $cardsArr[18], $cardsArr[22], $cardsArr[26], $cardsArr[30], $cardsArr[34]);

                $player_11 = array($cardsArr[3], $cardsArr[7], $cardsArr[11], $cardsArr[15], $cardsArr[19], $cardsArr[23], $cardsArr[27], $cardsArr[31], $cardsArr[35]);


                $player_8_img = '';
                foreach ($player_8 as $values) {
                    if ($values == 1)
                        continue;
                    $player_8_img .= '<img src="' . WEB_URL . '/storage/front/img/cards/' . $values . '.png" class="mr-2" />';
                }
                $player_9_img = '';
                foreach ($player_9 as $values) {
                    if ($values == 1)
                        continue;
                    $player_9_img .= '<img src="' . WEB_URL . '/storage/front/img/cards/' . $values . '.png" class="mr-2" />';
                }
                $player_10_img = '';
                foreach ($player_10 as $values) {
                    if ($values == 1)
                        continue;
                    $player_10_img .= '<img src="' . WEB_URL . '/storage/front/img/cards/' . $values . '.png" class="mr-2" />';
                }
                $player_11_img = '';
                foreach ($player_11 as $values) {
                    if ($values == 1)
                        continue;
                    $player_11_img .= '<img src="' . WEB_URL . '/storage/front/img/cards/' . $values . '.png" class="mr-2" />';
                }

                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span> </div>
                            </div>
                            <div class="row player-container m-t-10">
                                <div class="player-number">
                                    <h4 class="text-center">Player 8</h4>
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center"> ' . $player_8_img . ' </div>
                                        ' . (($result_status == 8) ? '<div class="col-md-12 text-center"><label class="winner-label bg-success m-t-20">Winner</label></div>' : '') . '
                                    </div>
                                    <hr>
                                    <h4 class="text-center">Player 9</h4>
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center"> ' . $player_9_img . ' </div>
                                        ' . (($result_status == 9) ? '<div class="col-md-12 text-center"><label class="winner-label bg-success m-t-20">Winner</label></div>' : '') . '
                                    </div>
                                    <hr>
                                    <h4 class="text-center">Player 10</h4>
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center"> ' . $player_10_img . ' </div>
                                        ' . (($result_status == 10) ? '<div class="col-md-12 text-center"><label class="winner-label bg-success m-t-20">Winner</label></div>' : '') . '
                                    </div>
                                    <hr>
                                    <h4 class="text-center">Player 11</h4>
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center"> ' . $player_11_img . ' </div>
                                        ' . (($result_status == 11) ? '<div class="col-md-12 text-center"><label class="winner-label bg-success m-t-20">Winner</label></div>' : '') . '
                                    </div>
                                </div>
                            </div>
                        </div>';
            } else if (strtolower($result_data['game_type']) == 'war') {

                $result_arr = explode(",", $result_data['result_status']);
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];
                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span> </div>
                            </div>
                            <div class="row player-container m-t-10">
                                <div class="player-number">
                                    <h4 class="text-center">Dealer</h4>
                                    <div class="player-image-container row">
                                        <!-- <div class=" text-center">
                                            </div> -->
                                        <div class="col-md-12 text-center"> <img src="' . WEB_URL . 'storage/front/img/cards/' . $cardsArr[6] . '.png"> </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row m-t-10 text-center ">
                                <div class="player-number ">
                                    <div class="">
                                        <div class="player-image-container row">
                                            <div class="col-md-12 text-center">
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b>Player 1</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards/' . $cardsArr[0] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> ' . ((in_array(1, $result_arr)) ? '<i class="text-success fas fa-trophy"></i>' : '') . ' </div>
                                                </div>
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b>Player 2</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards/' . $cardsArr[1] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> ' . ((in_array(11, $result_arr)) ? '<i class="text-success fas fa-trophy"></i>' : '') . ' </div>
                                                </div>
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b>Player 3</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards/' . $cardsArr[2] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> ' . ((in_array(21, $result_arr)) ? '<i class="text-success fas fa-trophy"></i>' : '') . ' </div>
                                                </div>
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b>Player 4</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards/' . $cardsArr[3] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> ' . ((in_array(31, $result_arr)) ? '<i class="text-success fas fa-trophy"></i>' : '') . ' </div>
                                                </div>
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b>Player 5</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards/' . $cardsArr[4] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> ' . ((in_array(41, $result_arr)) ? '<i class="text-success fas fa-trophy"></i>' : '') . ' </div>
                                                </div>
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b>Player 6</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards/' . $cardsArr[5] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> ' . ((in_array(51, $result_arr)) ? '<i class="text-success fas fa-trophy"></i>' : '') . ' </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
            } else if ($result_data['game_type'] == 'ab20') {

                $andar_cards = json_decode($result_data['cards']);
                $bahar_cards = json_decode($result_data['b_cards']);
                $andar_html = '';
                foreach ($andar_cards as $andar_card) {
                    $andar_html .= '
                        <div class="owl-item active" style="width: 65.225px; margin-right: 2px;">
                            <div class="item"> <img src="' . WEB_URL . 'storage/front/img/cards/' . $andar_card . '.png"> </div>
                        </div>';
                }

                $bahar_html = '';
                foreach ($bahar_cards as $bahar_card) {
                    $bahar_html .= '
                        <div class="owl-item active" style="width: 65.225px; margin-right: 2px;">
                            <div class="item"> <img src="' . WEB_URL . 'storage/front/img/cards/' . $bahar_card . '.png"> </div>
                        </div>';
                }

                $m_body_html .= '
                <div class="container-fluid">
                    <div class="row m-t-10">
                        <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b>' . $round_id . '</span> </div>
                    </div>
                    <div class="m-t-10">
                        <div class="player-number1">
                            <h4 class="text-center">Andar</h4>
                            <div style="width: 95%; margin: 0 auto">
                                <div class="owl-carousel owl-theme last-result-slider owl-loaded owl-drag">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0.25s ease 0s; width: 606px;">
                                            ' . $andar_html . '
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="player-number1">
                            <h4 class="text-center">Bahar</h4>
                            <div style="width: 95%; margin: 0 auto">
                                <div class="owl-carousel owl-theme last-result-slider owl-loaded owl-drag">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 673px;">
                                            ' . $bahar_html . '
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            } else if ($result_data['game_type'] == 'cmeter') {

                $cardsArr = json_decode($result_data['cards']);
                $cards = json_decode($result_data['cards']);
                $low_cards = json_decode($result_data['cards']);
                $high_cards = json_decode($result_data['b_cards']);

                $low_cards = array();
                $high_cards = array();
                $result_cards = array();
                $i = 0;
                while($cards[$i]){
                    if($cards[$i] == '10HH' || $cards[$i] == '10hh'){
                        $result_cards[] = $cards[$i];
                    }
                    else{
                        $a = $cards[$i];
                        $details = $this->card_details($a);
                    
                        $card_1_rank = $details['rank']; 
                        
                        if($card_1_rank < 10){
                            $low_cards[] = $cards[$i];
                        }
                        else{
                            $high_cards[] = $cards[$i];
                        }
                    }
                    $i++;
                }

                $low_html = '';
                if ($low_cards) {
                    foreach ($low_cards as $low_card) {
                        $low_html .= '<img src="' . WEB_URL . 'storage/front/img/cards/' . $low_card . '.png"> ';
                    }
                }

                $high_html = '';
                if ($high_cards) {
                    foreach ($high_cards as $high_card) {
                        $high_html .= '<img src="' . WEB_URL . 'storage/front/img/cards/' . $high_card . '.png"> ';
                    }
                }

                $result_arr = explode(",", $result_data['result_status']);
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span> </div>
                        </div>
                        <div class="row row5 align-items-center cmeter player-image-container">
                            <div class="col-10">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <h6>Low Cards</h6> </div>
                                    <div class="col-10">
                                        <div class="result-image"> ' . $low_html . ' </div>
                                    </div>
                                </div>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-2">
                                        <h6>High Cards</h6> </div>
                                    <div class="col-10">
                                        <div class="result-image"> ' . $high_html . ' </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 align-items-center text-right">
                                <div class="result-image"> </div>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                            <div class="col-md-12 text-center"> </div>
                        </div>
                    </div>';
            } else if ($result_data['game_type'] == 'cricket20') {

                $cards = json_decode($result_data['cards']);
                $m_body_html .= '
                    <div class="container-fluid">
                            <div class="row m-t-10">
                                    <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span> </div>
                            </div>
                            <div class="row player-container m-t-10">
                                    <div class="player-number">
                                            <h4 class="text-center">Dealer</h4>
                                            <div class="player-image-container row">
                                                    <div class="col-md-12 text-center"> <img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[0] . '.png"> </div>
                                            </div>
                                    </div>
                            </div>
                    </div>';
            } else if ($result_data['game_type'] == 'baccarat' || $result_data['game_type'] == 'baccarat2') {

                $result_status = $result_data['result_status'];
                $cards = json_decode($result_data['cards']);

                $card_1  = WEB_URL."/storage/front/img/cards/".$cards[0].".png";
                $card_2  = WEB_URL."/storage/front/img/cards/".$cards[1].".png";
                $card_3  = WEB_URL."/storage/front/img/cards/".$cards[2].".png";
                $card_4  = WEB_URL."/storage/front/img/cards/".$cards[3].".png";
                $card_5  = WEB_URL."/storage/front/img/cards/".$cards[4].".png";
                $card_6  = WEB_URL."/storage/front/img/cards/".$cards[5].".png";
 

                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span> </div>
                        </div>
                        <div class="row player-container m-t-10">
                            <div class="player-number">
                                <h4 class="text-center">Player </h4>
                                <div class="player-image-container row">
                                    <div class="col-md-12 text-center">
                                        ' . (($cards[4] != 1) ? '<img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[4] . '.png" class="lrotate mr-2 m-r-15">' : '') . '
                                        <img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[2] . '.png" class="mr-2 m-r-15">
                                        <img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[0] . '.png" class="mr-2 m-r-15">
                                    </div>
                                    <div class="col-md-12 text-center win-cup-pos">
                                        ' . (($result_status == '1') ? '<div class="winner-icon mt-3"><i class="fas fa-trophy"></i></div>' : '') . '
                                    </div>
                                </div>
                            </div>
                            <div class="player-number">
                                <h4 class="text-center">Banker</h4>
                                <div class="player-image-container row">
                                    <div class="col-md-12 text-center">
                                        <img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[1] . '.png" class="mr-2 m-r-15 ">
                                        <img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[3] . '.png" class="mr-2 m-r-15">
                                        ' . (($cards[5] != 1) ? '<img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[5] . '.png" class="rrotate mr-2 m-r-15">' : '') . '
                                    </div>
                                    <div class="col-md-12 text-center win-cup-pos">
                                        ' . (($result_status == '2') ? '<div class="winner-icon mt-3"><i class="fas fa-trophy"></i></div>' : '') . '
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            } else if ($result_data['game_type'] == '3cardj') {

                $cards = json_decode($result_data['cards']);

                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span> </div>
                        </div>
                        <div class="row player-container m-t-10">
                            <div class="player-number">
                                <div class="player-image-container row">
                                    <div class="col-md-12 text-center">
                                        <img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[0] . '.png" class="mr-2 m-r-15">
                                        <img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[1] . '.png" class="mr-2 m-r-15">
                                        <img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[2] . '.png" class="mr-2 m-r-15">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            } else if ($result_data['game_type'] == 'worli2') {
                $cards = json_decode($result_data['cards']);
                $result_status = $result_data['result_status'];

                $card_1_value = str_replace("A", "1", $cards[0]);
                $card_2_value = str_replace("A", "1", $cards[1]);
                $card_3_value = str_replace("A", "1", $cards[2]);

                $card_1_value = preg_replace("/[^0-9]/", "", "$card_1_value");
                $card_2_value = preg_replace("/[^0-9]/", "", "$card_2_value");
                $card_3_value = preg_replace("/[^0-9]/", "", "$card_3_value");

                if ($card_1_value >= 10) {
                    $card_1_value = substr($card_1_value, -1);
                }

                if ($card_2_value >= 10) {
                    $card_2_value = substr($card_2_value, -1);
                }

                if ($card_3_value >= 10) {
                    $card_3_value = substr($card_3_value, -1);
                }

                $result_arr = array($card_1_value, $card_2_value, $card_3_value);

                sort($result_arr);
                $result_text = $result_arr[0] . $result_arr[1] . $result_arr[2] . ' - ' . $result_status;


                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span> </div>
                        </div>
                        <div class="row player-container m-t-10">
                            <div class="player-number">
                                <div class="player-image-container row">
                                    <div class="col-md-12 text-center"> 
                                        <img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[0] . '.png">
                                        <img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[1] . '.png">
                                        <img src="' . WEB_URL . 'storage/front/img/cards/' . $cards[2] . '.png">
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <label class="winner-label bg-success m-t-20">' . $result_text . '</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            } else if ($result_data['game_type'] == 'race20') {
                $cards = json_decode($result_data['cards']);
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];

                $array_hh = array();
                $array_dd = array();
                $array_cc = array();
                $array_ss = array();
                
                foreach ($cards as $card_img) {
                    if ($card_img == 1) {
                        continue;
                    }

                    $card_type = substr($card_img, -2);
                    if ($card_type == "HH") {
                        $array_hh[] = WEB_URL . "/storage/front/img/cards/" . $card_img . ".png";
                    } else if ($card_type == "DD") {
                        $array_dd[] = WEB_URL . "/storage/front/img/cards/" . $card_img . ".png";
                    } else if ($card_type == "CC") {
                        $array_cc[] = WEB_URL . "/storage/front/img/cards/" . $card_img . ".png";
                    } else if ($card_type == "SS") {
                        $array_ss[] = WEB_URL . "/storage/front/img/cards/" . $card_img . ".png";
                    }
                }

                $m_body_html .= '<div class="race-modal player-image-container">
                                    <div class="row m-t-10">
                                        <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span> </div>
                                    </div>
                                    <div class="race-result-box">
                                        <div class="mb-1 p-r">
                                            <span class="result-image"><img src="'. WEB_URL.'storage/front/img/cards/spade_race.png"></span>';

                                            foreach ($array_hh as $hh_img) {
                                                $m_body_html .= '<span class="result-image"><img src="'.$hh_img.'"></span>';
                                            }
                                            
                                            if ($result_status == 1) {
                                                $m_body_html .= '<span class="result-image k-image"><img src="' . WEB_URL . 'storage/front/img/cards/KHH.png"></span>
                                                <div class="winner-icon mt-3"><i class="fas fa-trophy mr-2"></i></div>';
                                            }
                                        $m_body_html .= '</div>
                                        <div class="mb-1 p-r">
                                            <span class="result-image"><img src="' . WEB_URL . 'storage/front/img/cards/heart_race.png"></span>';

                                            foreach ($array_dd as $dd_img) {
                                                $m_body_html .= '<span class="result-image"><img src="'.$dd_img.'"></span>';
                                            }
                                            if ($result_status == 2) {
                                                $m_body_html .= '<span class="result-image k-image"><img src="' . WEB_URL . 'storage/front/img/cards/KDD.png"></span>
                                                <div class="winner-icon mt-3"><i class="fas fa-trophy mr-2"></i></div>';
                                            }

                                        $m_body_html .= '</div>
                                        <div class="mb-1 p-r">
                                            <span class="result-image"><img src="' . WEB_URL . 'storage/front/img/cards/club_race.png"></span>';

                                            foreach ($array_cc as $cc_img) {
                                                $m_body_html .= '<span class="result-image "><img src="'.$cc_img.'"></span>';
                                            }
                                            
                                            if ($result_status == 3) {
                                                $m_body_html .= '<span class="result-image k-image"><img src="' . WEB_URL . 'storage/front/img/cards/KCC.png"></span>
                                                <div class="winner-icon mt-3"><i class="fas fa-trophy mr-2"></i></div>';
                                            }
                                        $m_body_html .= '</div>
                                        <div class="mb-1 p-r">
                                            <span class="result-image"><img src="' . WEB_URL . 'storage/front/img/cards/diamond_race.png"></span>';

                                            foreach ($array_ss as $ss_img) {
                                                $m_body_html .= '<span class="result-image"><img src="'.$ss_img.'"></span>';
                                            }
                                            if ($result_status == 4) {
                                                $m_body_html .= '<span class="result-image k-image"><img src="' . WEB_URL . 'storage/front/img/cards/KSS.png"></span>
                                                <div class="winner-icon mt-3"><i class="fas fa-trophy mr-2"></i></div>';
                                            }
                                        $m_body_html .= '</div>
                                        <div class="video-winner-text">
                                            <div>W</div>
                                            <div>I</div>
                                            <div>N</div>
                                            <div>N</div>
                                            <div>E</div>
                                            <div>R</div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <div class="winner-board">
                                                <div class="mb-1"><span class="text-success">Result:</span> <span>'.$desc_remakrs.'</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
            } else if ($result_data['game_type'] == 'queen') {
                $cards = json_decode($result_data['cards']);
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];

                $player_8[] = WEB_URL . "/storage/front/img/cards/" . $cards[0] . ".png";
                $player_8[] = WEB_URL . "/storage/front/img/cards/" . $cards[4] . ".png";
                $player_8[] = WEB_URL . "/storage/front/img/cards/" . $cards[8] . ".png";
                $player_8[] = WEB_URL . "/storage/front/img/cards/" . $cards[12] . ".png";



                //player 9
                $player_9[] = WEB_URL . "/storage/front/img/cards/" . $cards[1] . ".png";
                $player_9[] = WEB_URL . "/storage/front/img/cards/" . $cards[5] . ".png";
                $player_9[] = WEB_URL . "/storage/front/img/cards/" . $cards[9] . ".png";
                $player_9[] = WEB_URL . "/storage/front/img/cards/" . $cards[13] . ".png";

                //player 10
                $player_10[] = WEB_URL . "/storage/front/img/cards/" . $cards[2] . ".png";
                $player_10[] = WEB_URL . "/storage/front/img/cards/" . $cards[6] . ".png";
                $player_10[] = WEB_URL . "/storage/front/img/cards/" . $cards[10] . ".png";
                $player_10[] = WEB_URL . "/storage/front/img/cards/" . $cards[14] . ".png";

                //player 11
                $player_11[] = WEB_URL . "/storage/front/img/cards/" . $cards[3] . ".png";
                $player_11[] = WEB_URL . "/storage/front/img/cards/" . $cards[7] . ".png";
                $player_11[] = WEB_URL . "/storage/front/img/cards/" . $cards[11] . ".png";
                $player_11[] = WEB_URL . "/storage/front/img/cards/" . $cards[15] . ".png";

                $m_body_html .= '<div class="player-image-container" id="cards_data">
                                    <div class="row m-t-10">
                                        <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span> </div>
                                    </div>
                                    <style>
                                        .winner-icon {
                                            position: absolute;
                                            right: 0;
                                            bottom: 15%;
                                        }
                                    </style>
                                    <div class="row">
                                        <div class="col-12 text-center ">
                                            <h4>Total 0</h4>
                                            <div class="result-image">';
                                            foreach ($player_8 as $card_8) {
                                                if ($card_8 != WEB_URL . "/storage/front/img/cards/1.png") {
                                                    $m_body_html .= '<img src="'. $card_8.'" class="mr-2">';
                                                }
                                            }
                                            $m_body_html .= '</div>';
                                            if($result_status == 0){
                                                $m_body_html .= '<div class="winner-icon mt-3"><i class="fas fa-trophy mr-2"></i></div>';
                                            }
                                        $m_body_html .= '</div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <h4>Total 1</h4>
                                            <div class="result-image">';
                                            foreach ($player_9 as $card_9) {
                                                if ($card_9 != WEB_URL . "/storage/front/img/cards/1.png") {
                                                    $m_body_html .= '<img src="'. $card_9.'" class="mr-2">';
                                                }
                                            }
                                            $m_body_html .= '</div>';
                                            if($result_status == 1){
                                                $m_body_html .= '<div class="winner-icon mt-3"><i class="fas fa-trophy mr-2"></i></div>';
                                            }
                                        $m_body_html .= '</div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <h4>Total 2</h4>
                                            <div class="result-image">';
                                            foreach ($player_10 as $card_10) {
                                                if ($card_10 != WEB_URL . "/storage/front/img/cards/1.png") {
                                                    $m_body_html .= '<img src="'. $card_10.'" class="mr-2">';
                                                }
                                            }
                                            $m_body_html .= '</div>';
                                            if($result_status == 2){
                                                $m_body_html .= '<div class="winner-icon mt-3"><i class="fas fa-trophy mr-2"></i></div>';
                                            }
                                        $m_body_html .= '</div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <h4>Total 3</h4>
                                            <div class="result-image">';
                                            foreach ($player_11 as $card_11) {
                                                if ($card_11 != WEB_URL . "/storage/front/img/cards/1.png") {
                                                    $m_body_html .= '<img src="'. $card_11.'" class="mr-2">';
                                                }
                                            }
                                            $m_body_html .= '</div>';
                                            if($result_status == 3){
                                                $m_body_html .= '<div class="winner-icon mt-3"><i class="fas fa-trophy mr-2"></i></div>';
                                            }
                                        $m_body_html .= '</div>
                                    </div>
                                </div>';
            } else if ($result_data['game_type'] == 'abj') {
                $cards = json_decode($result_data['cards']);
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $cards_b = $result_data['b_cards'];

                $card_joker_image  = WEB_URL . "/storage/front/img/cards/" . $cards[0] . ".png";
                $card_1st_andar_image  = WEB_URL . "/storage/front/img/cards/" . $cards[2] . ".png";
                $card_1st_bahat_image  = WEB_URL . "/storage/front/img/cards/" . $cards[1] . ".png";

                $i = 0;
                $aall = array();
                $ball = array();

                foreach ($cards as $card_image) {
                    if ($card_image != 1
                    ) {
                        if ($i >= 3) {
                            if ($i % 2 == 0) {
                                $aall[] = WEB_URL . "/storage/front/img/cards/" . $card_image . ".png";
                            } else {
                                $ball[] = WEB_URL . "/storage/front/img/cards/" . $card_image . ".png";
                            }
                        }
                    }
                    $i++;
                }

                $aall = array_reverse($aall);
                $ball = array_reverse($ball);

                $m_body_html .= '<div class="row m-t-10">
                                        <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span> </div>
                                    </div>
                                    <div class="row row5 abj-result text-center align-items-center">';
                $m_body_html .= '<div class="col-2"><img src="'.$card_joker_image.'" class="card-right"></div>';
                
                $m_body_html .= '<div class="col-10">
                                    <div class="player-number1" style="position: relative;">
                                        <h4 class="text-center">Andar</h4>
                                        <div class="row row5">';
                $m_body_html .= '<div class="col-1"><img src="' . $card_1st_andar_image . '" class="mb-1"></div>';
                $m_body_html .= '<div class="col-10">
                                    <div style="width: 90%; margin: 0 auto">
                                    <div id="result-a-cards" class="ab-rtlslider owl-carousel last-result-slider owl-theme owl-rtl owl-loaded owl-drag" style="width: 100%;">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 190px;">';
                $i = 0;
                foreach ($aall as $andar_card) {
                    $active_class = "";
                    if ($i == 0) {
                        $active_class = "active";
                    }
                    $i++;

                    $m_body_html .= '<div class="owl-item '.$active_class.'" >
                                        <div class="item"><img src="'.$andar_card.'"></div>
                                    </div>';
                }

                $m_body_html .= '</div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                <div class="winner-icon mt-3">';
                if ($result_status == 1) {
                    $m_body_html .= '<div class="winner-icon mt-3"><i class="fas fa-trophy mr-2"></i></div>';
                }

                $m_body_html .= '</div>
                                    

                                </div>
                                <div class="player-number1" style="position: relative;">
                                    <h4 class="text-center">Bahar</h4>
                                    <div class="row row5">';
                $m_body_html .= '<div class="col-1"><img src="' . $card_1st_bahat_image . '" class="card-right"></div>';
                $m_body_html .= '<div class="col-10">
                                    <div style="width: 90%; margin: 0 auto">
                                    <div id="result-b-cards" class="ab-rtlslider owl-carousel last-result-slider owl-theme owl-rtl owl-loaded owl-drag" style="width: 100%;">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 228px;">';
                $i = 0;
                foreach ($ball as $bahar_card) {
                    $active_class = "";
                    if ($i == 0) {
                        $active_class = "active";
                    }
                    $i++;
                    $m_body_html .= '<div class="owl-item '.$active_class.'" >
                                        <div class="item"><img src="'.$bahar_card.'"></div>
                                    </div>';
                }
                $m_body_html .= '</div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="winner-icon mt-3">';
                if ($result_status == 2) {
                    $m_body_html .= '<div class="winner-icon mt-3"><i class="fas fa-trophy mr-2"></i></div>';
                }

                $m_body_html .= '</div>
                                        
                                    </div>
                                </div>
                                </div>
                                <script>

                                (function ( $ ) { 

                                jQuery("#result-a-cards").owlCarousel({
                                        
                                        rtl:true,
                                        loop: false,
                                        margin: 2,
                                        nav: true,
                                        responsive: {
                                            0: {
                                            items: 10
                                            },

                                            600: {
                                            items: 10
                                            },

                                            1000: {
                                            items: 10
                                            },
                                        }
                                        }); 
                                        jQuery("#result-b-cards").owlCarousel({
                                        
                                        rtl:true,
                                        loop: false,
                                        margin: 2,
                                        nav: true,
                                        responsive: {
                                            0: {
                                            items: 10
                                            },

                                            600: {
                                            items: 10
                                            },

                                            1000: {
                                            items: 10
                                            },
                                        }
                                        }); 


                                }( jQuery ));
                                </script>';
            } else if ($result_data['game_type'] == 'cricketv3') {
                $cards = json_decode($result_data['cards']);
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $data_cards = json_decode($result_data['data']);

                $winner_name = "";
                if ($result_status == 1) {
                    $winner_name = "AUS";
                } else if ($result_status == 2) {
                    $winner_name = "IND";
                } else {
                    $winner_name = "TIE";
                }

                $m_body_html .= '<div class="row m-t-10">
                                    <div class="col-md-12"> <span class="float-right round-id"><b>Round ID:</b> ' . $round_id . '</span> </div>
                                </div>
                                <div class="mb-1 text-right mt-3">
                                    Winner:<span class="text-success">'.$winner_name. '</span> | '.$desc_remakrs. ' </div>
                                <div>';
                $socre_result = array();
                foreach ($data_cards->t2 as $cards_data) {
                    $team_name = $cards_data->nation;
                    $over = $cards_data->over;
                    $ball = $cards_data->ball;
                    $wkt = $cards_data->wkt;
                    $run = $cards_data->run;
                    if (!isset($socre_result[$team_name])) {
                        $socre_result[$team_name] = array();
                    }

                    if (!isset($socre_result[$team_name][$over])) {
                        $socre_result[$team_name][$over] = array();
                    }

                    $bal_value = $run;
                    if ($wkt == 1) {
                        $bal_value = "ww";
                    }
                    $socre_result[$team_name][$over][$ball] = $bal_value;
                }

                $m_body_html .= '<div class="table-responsive">
                                    <div class="market-title">First Innings</div>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="text-center"><b><span class="text-success">AUS</span></b></th>
                                            <th class="text-center"><b>1</b></th>
                                            <th class="text-center"><b>2</b></th>
                                            <th class="text-center"><b>3</b></th>
                                            <th class="text-center"><b>4</b></th>
                                            <th class="text-center"><b>5</b></th>
                                            <th class="text-center"><b>6</b></th>
                                            <th class="text-center"><b>Run/Over</b></th>
                                            <th class="text-center"><b>Score</b></th>
                                        </tr>';
                $over_wicket = 0;
                $over_score = 0;
                $total_score = 0;
                $total_wicket = 0;
                foreach ($socre_result['AUS'] as $data_key => $data_value) {
                    $m_body_html .= '<tr>
                                        <td class="text-center"><b>Over '.$data_key.'</b></td>';
                    $over_wicket = 0;
                    $over_score = 0;
                    foreach ($data_value as $ball_value) {
                        if ($ball_value == "ww"
                        ) {
                            $over_wicket++;
                            $total_wicket++;
                        } else {
                            $over_score = $over_score + $ball_value;
                            $total_score = $total_score + $ball_value;
                        }

                        $m_body_html .= '<td class="text-center"><span class="text-danger">'.$ball_value.'</span></td>';
                    }

                    $m_body_html .= '<td class="text-center nationcard">'.$over_score.'</td>
                                        <td class="text-center nationcard">'.$total_score.'/'.$total_wicket.'</td>
                                    </tr>';
                }

                $m_body_html .= '</table>
                                    </div>
                                    <div class="table-responsive mt-3">
                                        <div class="market-title">Second Innings</div>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th class="text-center"><b><span class="text-success">IND</span></b></th>
                                                <th class="text-center"><b>1</b></th>
                                                <th class="text-center"><b>2</b></th>
                                                <th class="text-center"><b>3</b></th>
                                                <th class="text-center"><b>4</b></th>
                                                <th class="text-center"><b>5</b></th>
                                                <th class="text-center"><b>6</b></th>
                                                <th class="text-center"><b>Run/Over</b></th>
                                                <th class="text-center"><b>Score</b></th>
                                            </tr>';
                $over_wicket = 0;
                $over_score = 0;
                $total_score = 0;
                $total_wicket = 0;
                foreach ($socre_result['IND'] as $data_key => $data_value) {
                    $m_body_html .= '<tr>
                                        <td class="text-center"><b>Over '.$data_key.'</b></td>';
                    $over_wicket = 0;
                    $over_score = 0;
                    foreach ($data_value as $ball_value) {
                        if ($ball_value == "ww"
                        ) {
                            $over_wicket++;
                            $total_wicket++;
                        } else {
                            $over_score = $over_score + $ball_value;
                            $total_score = $total_score + $ball_value;
                        }
                        $m_body_html .= '<td class="text-center"><span class="text-danger">'.$ball_value.'</span></td>';
                    }
                    $m_body_html .= '<td class="text-center nationcard">'.$over_score.'</td>
                                        <td class="text-center nationcard">'.$total_score.'/'.$total_wicket.'</td>
                                    </tr>';
                }

                $m_body_html .= '</table>
                                </div>
                                </div>';
            }
        }

        return $this->print_json(array('result' => $m_body_html));

        //        echo $m_body_html;
    }

    private function get_casino_results_data($limit = '', $offset = '')
    {

        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        if (!empty($limit)) {
            /* $this->db->limit($limit, $offset); */
            $this->db->select('t.*');
        } else {
            $this->db->select('t.tt_result_id');
        }

        if ($date = $this->input->post('date', TRUE)) {
            $this->db->where('t.result_time >= "' . $date . ' 00:00:00"');
            $this->db->where('t.result_time <= "' . $date . ' 23:59:59"');
        }

        if ($type = $this->input->post('type', TRUE)) {
            $this->db->where('t.game_type LIKE "' . $type . '"');
        }

        if ($round_id = $this->input->post('round_id', TRUE)) {
            $this->db->where('t.event_id LIKE "%' . $round_id . '%"');
        }

        $this->db->order_by('t.result_time', 'DESC');

        $result = $this->db->get('twenty_teenpatti_result as t');

        if (!empty($limit)) {

            return $result->result_array();
        } else {

            return $result->num_rows();
        }
    }

    private function print_json($array)
    {
        $this->output->set_content_type('application/json')->set_output(json_encode($array));
    }

    function cardsArr($code = '')
    {
        $cards = array(
            'ASS' => array('type' => 'diamond', 'name' => 'A', 'rank' => 1, 'priority' => 14),
            'ADD' => array('type' => 'heart', 'name' => 'A', 'rank' => 1, 'priority' => 14),
            'AHH' => array('type' => 'spade', 'name' => 'A', 'rank' => 1, 'priority' => 14),
            'ACC' => array('type' => 'club', 'name' => 'A', 'rank' => 1, 'priority' => 14),
            'ass' => array('type' => 'diamond', 'name' => 'A', 'rank' => 1, 'priority' => 14),
            'add' => array('type' => 'heart', 'name' => 'A', 'rank' => 1, 'priority' => 14),
            'ahh' => array('type' => 'spade', 'name' => 'A', 'rank' => 1, 'priority' => 14),
            'acc' => array('type' => 'club', 'name' => 'A', 'rank' => 1, 'priority' => 14),
            '2SS' => array('type' => 'diamond', 'name' => '2', 'rank' => 2, 'priority' => 2),
            '2DD' => array('type' => 'heart', 'name' => '2', 'rank' => 2, 'priority' => 2),
            '2HH' => array('type' => 'spade', 'name' => '2', 'rank' => 2, 'priority' => 2),
            '2CC' => array('type' => 'club', 'name' => '2', 'rank' => 2, 'priority' => 2),
            '3SS' => array('type' => 'diamond', 'name' => '3', 'rank' => 3, 'priority' => 3),
            '3DD' => array('type' => 'heart', 'name' => '3', 'rank' => 3, 'priority' => 3),
            '3HH' => array('type' => 'spade', 'name' => '3', 'rank' => 3, 'priority' => 3),
            '3CC' => array('type' => 'club', 'name' => '3', 'rank' => 3, 'priority' => 3),
            '4SS' => array('type' => 'diamond', 'name' => '4', 'rank' => 4, 'priority' => 4),
            '4DD' => array('type' => 'heart', 'name' => '4', 'rank' => 4, 'priority' => 4),
            '4HH' => array('type' => 'spade', 'name' => '4', 'rank' => 4, 'priority' => 4),
            '4CC' => array('type' => 'club', 'name' => '4', 'rank' => 4, 'priority' => 4),
            '5SS' => array('type' => 'diamond', 'name' => '5', 'rank' => 5, 'priority' => 5),
            '5DD' => array('type' => 'heart', 'name' => '5', 'rank' => 5, 'priority' => 5),
            '5HH' => array('type' => 'spade', 'name' => '5', 'rank' => 5, 'priority' => 5),
            '5CC' => array('type' => 'club', 'name' => '5', 'rank' => 5, 'priority' => 5),
            '6SS' => array('type' => 'diamond', 'name' => '6', 'rank' => 6, 'priority' => 6),
            '6DD' => array('type' => 'heart', 'name' => '6', 'rank' => 6, 'priority' => 6),
            '6HH' => array('type' => 'spade', 'name' => '6', 'rank' => 6, 'priority' => 6),
            '6CC' => array('type' => 'club', 'name' => '6', 'rank' => 6, 'priority' => 6),
            '7SS' => array('type' => 'diamond', 'name' => '7', 'rank' => 7, 'priority' => 7),
            '7DD' => array('type' => 'heart', 'name' => '7', 'rank' => 7, 'priority' => 7),
            '7HH' => array('type' => 'spade', 'name' => '7', 'rank' => 7, 'priority' => 7),
            '7CC' => array('type' => 'club', 'name' => '7', 'rank' => 7, 'priority' => 7),
            '8SS' => array('type' => 'diamond', 'name' => '8', 'rank' => 8, 'priority' => 8),
            '8DD' => array('type' => 'heart', 'name' => '8', 'rank' => 8, 'priority' => 8),
            '8HH' => array('type' => 'spade', 'name' => '8', 'rank' => 8, 'priority' => 8),
            '8CC' => array('type' => 'club', 'name' => '8', 'rank' => 8, 'priority' => 8),
            '9SS' => array('type' => 'diamond', 'name' => '9', 'rank' => 9, 'priority' => 9),
            '9DD' => array('type' => 'heart', 'name' => '9', 'rank' => 9, 'priority' => 9),
            '9HH' => array('type' => 'spade', 'name' => '9', 'rank' => 9, 'priority' => 9),
            '9CC' => array('type' => 'club', 'name' => '9', 'rank' => 9, 'priority' => 9),
            '10SS' => array('type' => 'diamond', 'name' => '10', 'rank' => 10, 'priority' => 10),
            '10DD' => array('type' => 'heart', 'name' => '10', 'rank' => 10, 'priority' => 10),
            '10HH' => array('type' => 'spade', 'name' => '10', 'rank' => 10, 'priority' => 10),
            '10CC' => array('type' => 'club', 'name' => '10', 'rank' => 10, 'priority' => 10),
            'JSS' => array('type' => 'diamond', 'name' => 'J', 'rank' => 11, 'priority' => 11),
            'JDD' => array('type' => 'heart', 'name' => 'J', 'rank' => 11, 'priority' => 11),
            'JHH' => array('type' => 'spade', 'name' => 'J', 'rank' => 11, 'priority' => 11),
            'JCC' => array('type' => 'club', 'name' => 'J', 'rank' => 11, 'priority' => 11),
            'QSS' => array('type' => 'diamond', 'name' => 'Q', 'rank' => 12, 'priority' => 12),
            'QDD' => array('type' => 'heart', 'name' => 'Q', 'rank' => 12, 'priority' => 12),
            'QHH' => array('type' => 'spade', 'name' => 'Q', 'rank' => 12, 'priority' => 12),
            'QCC' => array('type' => 'club', 'name' => 'Q', 'rank' => 12, 'priority' => 12),
            'KSS' => array('type' => 'diamond', 'name' => 'K', 'rank' => 13, 'priority' => 13),
            'KDD' => array('type' => 'heart', 'name' => 'K', 'rank' => 13, 'priority' => 13),
            'KHH' => array('type' => 'spade', 'name' => 'K', 'rank' => 13, 'priority' => 13),
            'KCC' => array('type' => 'club', 'name' => 'K', 'rank' => 13, 'priority' => 13),
            'ass' => array('type' => 'diamond', 'name' => 'a', 'rank' => 1, 'priority' => 14),
            'add' => array('type' => 'heart', 'name' => 'a', 'rank' => 1, 'priority' => 14),
            'ahh' => array('type' => 'spade', 'name' => 'a', 'rank' => 1, 'priority' => 14),
            'acc' => array('type' => 'club', 'name' => 'a', 'rank' => 1, 'priority' => 14),
            'ass' => array('type' => 'diamond', 'name' => 'a', 'rank' => 1, 'priority' => 14),
            'add' => array('type' => 'heart', 'name' => 'a', 'rank' => 1, 'priority' => 14),
            'ahh' => array('type' => 'spade', 'name' => 'a', 'rank' => 1, 'priority' => 14),
            'acc' => array('type' => 'club', 'name' => 'a', 'rank' => 1, 'priority' => 14),
            '2ss' => array('type' => 'diamond', 'name' => '2', 'rank' => 2, 'priority' => 2),
            '2dd' => array('type' => 'heart', 'name' => '2', 'rank' => 2, 'priority' => 2),
            '2hh' => array('type' => 'spade', 'name' => '2', 'rank' => 2, 'priority' => 2),
            '2cc' => array('type' => 'club', 'name' => '2', 'rank' => 2, 'priority' => 2),
            '3ss' => array('type' => 'diamond', 'name' => '3', 'rank' => 3, 'priority' => 3),
            '3dd' => array('type' => 'heart', 'name' => '3', 'rank' => 3, 'priority' => 3),
            '3hh' => array('type' => 'spade', 'name' => '3', 'rank' => 3, 'priority' => 3),
            '3cc' => array('type' => 'club', 'name' => '3', 'rank' => 3, 'priority' => 3),
            '4ss' => array('type' => 'diamond', 'name' => '4', 'rank' => 4, 'priority' => 4),
            '4dd' => array('type' => 'heart', 'name' => '4', 'rank' => 4, 'priority' => 4),
            '4hh' => array('type' => 'spade', 'name' => '4', 'rank' => 4, 'priority' => 4),
            '4cc' => array('type' => 'club', 'name' => '4', 'rank' => 4, 'priority' => 4),
            '5ss' => array('type' => 'diamond', 'name' => '5', 'rank' => 5, 'priority' => 5),
            '5dd' => array('type' => 'heart', 'name' => '5', 'rank' => 5, 'priority' => 5),
            '5hh' => array('type' => 'spade', 'name' => '5', 'rank' => 5, 'priority' => 5),
            '5cc' => array('type' => 'club', 'name' => '5', 'rank' => 5, 'priority' => 5),
            '6ss' => array('type' => 'diamond', 'name' => '6', 'rank' => 6, 'priority' => 6),
            '6dd' => array('type' => 'heart', 'name' => '6', 'rank' => 6, 'priority' => 6),
            '6hh' => array('type' => 'spade', 'name' => '6', 'rank' => 6, 'priority' => 6),
            '6cc' => array('type' => 'club', 'name' => '6', 'rank' => 6, 'priority' => 6),
            '7ss' => array('type' => 'diamond', 'name' => '7', 'rank' => 7, 'priority' => 7),
            '7dd' => array('type' => 'heart', 'name' => '7', 'rank' => 7, 'priority' => 7),
            '7hh' => array('type' => 'spade', 'name' => '7', 'rank' => 7, 'priority' => 7),
            '7cc' => array('type' => 'club', 'name' => '7', 'rank' => 7, 'priority' => 7),
            '8ss' => array('type' => 'diamond', 'name' => '8', 'rank' => 8, 'priority' => 8),
            '8dd' => array('type' => 'heart', 'name' => '8', 'rank' => 8, 'priority' => 8),
            '8hh' => array('type' => 'spade', 'name' => '8', 'rank' => 8, 'priority' => 8),
            '8cc' => array('type' => 'club', 'name' => '8', 'rank' => 8, 'priority' => 8),
            '9ss' => array('type' => 'diamond', 'name' => '9', 'rank' => 9, 'priority' => 9),
            '9dd' => array('type' => 'heart', 'name' => '9', 'rank' => 9, 'priority' => 9),
            '9hh' => array('type' => 'spade', 'name' => '9', 'rank' => 9, 'priority' => 9),
            '9cc' => array('type' => 'club', 'name' => '9', 'rank' => 9, 'priority' => 9),
            '10ss' => array('type' => 'diamond', 'name' => '10', 'rank' => 10, 'priority' => 10),
            '10dd' => array('type' => 'heart', 'name' => '10', 'rank' => 10, 'priority' => 10),
            '10hh' => array('type' => 'spade', 'name' => '10', 'rank' => 10, 'priority' => 10),
            '10cc' => array('type' => 'club', 'name' => '10', 'rank' => 10, 'priority' => 10),
            'jss' => array('type' => 'diamond', 'name' => 'j', 'rank' => 11, 'priority' => 11),
            'jdd' => array('type' => 'heart', 'name' => 'j', 'rank' => 11, 'priority' => 11),
            'jhh' => array('type' => 'spade', 'name' => 'j', 'rank' => 11, 'priority' => 11),
            'jcc' => array('type' => 'club', 'name' => 'j', 'rank' => 11, 'priority' => 11),
            'qss' => array('type' => 'diamond', 'name' => 'q', 'rank' => 12, 'priority' => 12),
            'qdd' => array('type' => 'heart', 'name' => 'q', 'rank' => 12, 'priority' => 12),
            'qhh' => array('type' => 'spade', 'name' => 'q', 'rank' => 12, 'priority' => 12),
            'qcc' => array('type' => 'club', 'name' => 'q', 'rank' => 12, 'priority' => 12),
            'kss' => array('type' => 'diamond', 'name' => 'k', 'rank' => 13, 'priority' => 13),
            'kdd' => array('type' => 'heart', 'name' => 'k', 'rank' => 13, 'priority' => 13),
            'khh' => array('type' => 'spade', 'name' => 'k', 'rank' => 13, 'priority' => 13),
            'kcc' => array('type' => 'club', 'name' => 'k', 'rank' => 13, 'priority' => 13)
        );

        if ($code != '')
            return $cards[$code];
        else
            return $cards;
    }

    public function card_details($card11 = '')
    {

        $card_details = $this->cardsArr($card11);

        $rank = $card_details['rank'];
        $type = $card_details['type'];
        $name = $card_details['name'];

        $returnArr = [];
        if ($rank % 2 == 0) {
            $returnArr['oddeven'] = 'Even';
        } else {
            $returnArr['oddeven'] = 'Odd';
        }

        if ($type == "diamond" or $type == "heart") {
            $returnArr['color'] = 'Red';
        } else {
            $returnArr['color'] = 'Black';
        }

        $returnArr['name'] = $name;
        $returnArr['type'] = $type;
        $returnArr['rank'] = $rank;

        return $returnArr;
    }

    function is_pair_dt20($dragon = '', $tiger = '')
    {
        $dragon_cards = $this->cardsArr($dragon);
        $dragon_cards_rank = $dragon_cards['rank'];

        $tiger_cards = $this->cardsArr($tiger);
        $tiger_cards_rank = $tiger_cards['rank'];

        if ($tiger_cards_rank == $dragon_cards_rank) {
            return true;
        } else {
            return false;
        }
    }

    function rank_number($card11, $cards_result)
    {
        $card1 = $cards_result->$card11;
        $rank = $card1['rank'];
        return $rank;
    }

    function is_dulhan($card11)
    {
        $card1 = $this->cardsArr($card11);
        $rank = $card1['rank'];

        if ($rank == 12 or $rank == 13) {
            return true;
        } else {
            return false;
        }
    }
}
