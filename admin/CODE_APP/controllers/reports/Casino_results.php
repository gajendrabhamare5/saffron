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
                            top: 25% !important;
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
                        .winner-icon {
    position: relative;
    right: 0%;
    // bottom: 15%;
}
                </style>
                ';
        /*$m_body_html .= $this->db->last_query();*/
        if ($result_data) {
            $clean = substr((string)$round_id, 3);

            if (strlen($round_id) <= 12) {
                $clean = (string)$round_id;
            }

            // Extract parts
            $year = "20" . substr($clean, 0, 2);
            $month = substr($clean, 2, 2);
            $day = substr($clean, 4, 2);

            if (strlen($round_id) <= 12) {
                $day = substr($clean, 2, 2);
                $month = substr($clean, 4, 2);
            }

            $hour = substr($clean, 6, 2);
            $minute = substr($clean, 8, 2);
            $second = substr($clean, 10, 2);

            // Format into readable date-time
            $matchtimee = "$day/$month/$year $hour:$minute:$second";
            if (in_array(strtolower($result_data['game_type']), array('teen20', 'teen9'))) {
                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                    <span class="float-left round-id">Round-ID: ' . $round_id . '</span>
                                </div>
                            </div>
                            <div class="row player-container m-t-10">';

                $cards_arr = json_decode($result_data['cards'], true);
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
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

                $alphachar = array('Player A', 'Player B');
                $alphachar_new = array('A'=>'A', 'B'=>'B');
                if ($result_data['game_type'] == 'teen9') {
                    $alphachar = array('Tiger', 'Lion', 'Dragon');
                    $alphachar_new = array('T'=>'Tiger', 'L'=>'Lion', 'D'=>'Dragon');
                } else if ($result_data['game_type'] == 'teen20') {
                    $alphachar = array('Player A', 'Player B');
                    $alphachar_new = array('1'=>'Player A', '2'=>'Player B');
                } else {
                }

                // $result_key = (array_search($result_data['result_status'], $alphachar));
                $result_key = $alphachar_new[$result_data['result_status']];
               //echo "gughju=".$result_key;
                foreach ($card_3_arr as $key => $cards) {
                    $m_body_html .= '
                                <div class="player-number">
                                    <h4 class="text-center">' . $alphachar[$key] . '</h4>
                                    <div class="player-image-container row">

                                        <div class="col-md-12 text-center">
                                            <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cards[0] . '.png">
                                            <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cards[1] . '.png">
                                            <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cards[2] . '.png">
                                        </div>

                                        <div class="col-md-12 text-center">' .
                        (($result_key == $alphachar[$key]) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                        . '        </div>
                                    </div>
                                </div>
                        ';
                }
                 if ($result_data['game_type'] == 'teen20') {
     $m_body_html .= '
     </div>
         <div class="row board-result m-t-10">
             <div class="col-md-12">
                 <div class="board-result-inner">
                     <div class="casino-result-desc" style="display: flex; flex-wrap: wrap; padding: 6px; box-shadow: 0 0 4px -1px;">
                         <div class="casino-result-desc-item flex-column text-center" style="display: flex; justify-content: center; width: 100%;">
                             <div><span style="color:gray">Winner </span>' . $rdesc_array[0] . '</div>
                             <div><span style="color:gray">3 Baccarat </span>' . $rdesc_array[1] . '</div>
                             <div><span style="color:gray">Total </span>' . $rdesc_array[2] . '</div>
                             <div><span style="color:gray">Pair Plus </span>' . $rdesc_array[3] . '</div>
                             <div><span style="color:gray">Red Black </span>' . $rdesc_array[4] . '</div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>';
 }
               
//                 if ($result_data['game_type'] == 'teen9') {
//     $m_body_html .= '
//     </div>
//         <div class="row board-result m-t-10">
//             <div class="col-md-12">
//                 <div class="board-result-inner">
//                     <div class="casino-result-desc" style="display: flex; flex-wrap: wrap; padding: 6px; box-shadow: 0 0 4px -1px;">
//                         <div class="casino-result-desc-item flex-column text-center" style="display: flex; justify-content: center; width: 100%;">
//                             <div><span style="color:gray">Winner: </span>' . $rdesc_array[0] . '</div>
//                             <div><span style="color:gray">3 Baccarat: </span>' . $rdesc_array[1] . '</div>
//                             <div><span style="color:gray">Total: </span>' . $rdesc_array[2] . '</div>
//                             <div><span style="color:gray">Pair Plus: </span>' . $rdesc_array[3] . '</div>
//                             <div><span style="color:gray">Red Black: </span>' . $rdesc_array[4] . '</div>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//         </div>';
// }
// else{  
//  $m_body_html .= '   
//                  </div>
//                 <div class="row board-result m-t-10">
//                     <div class="col-md-12 ">
//                         <div class="board-result-inner">
//                             <div class="casino-result-desc" style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
//                                 <div class="casino-result-desc-item  flex-column text-center" style="display: flex;justify-content: center;width: 100%;">
//                                     <div><span style="color:gray">Winner </span> ' . $rdesc_array[0] . ' </div>
//                                     <div><span style="color:gray">3 Baccarat </span> ' . $rdesc_array[1] . ' </div>
//                                     <div><span style="color:gray">Total </span>  ' . $rdesc_array[2] . ' </div>
//                                     <div><span style="color:gray">Pair Plus: </span> ' . $rdesc_array[3] . '  </div>
//                                     <div><span style="color:gray">Red Black: </span> ' . $rdesc_array[4] . ' </div>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//                 </div>';
// }

               
           $m_body_html .= ' </div> ';
            } elseif ($result_data['game_type'] == 'teen8') {
                $winnersArr = explode(',', $result_data['result_status']);
                $cardsArr = json_decode($result_data['cards']);

                 $desc_remakrs = $result_data['desc_remakrs'];
                 $rdesc_array = explode("#", $desc_remakrs);

                $m_body_html = '
                  <style>
    .player-column {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 10px;
    }
    .players-row {
        display: flex;
        justify-content: center;
    }
    .player-column img {
        max-width: 41px;
        margin: 2px 0;
        left: 20%;
    bottom: 10%;
    }
    .winner-icon {
        width: 25px;
        height: auto;
    }
    .player-label {
        font-weight: bold;
        margin-bottom: 5px;
    }
        .board-result{
                padding-top: 27px !important;
            }
</style>
            
<div class="container-fluid">
    <div class="row m-t-10">
        <div class="col-md-12">
            <span class="float-right round-id">Match Time:  ' . $matchtimee . '</span>
            <span class="float-left round-id">Round-ID:  ' . $round_id . '</span>
        </div>
    </div>

    <div class="players-row">';
        
        $playerIndexes = [0,1,2,3,4,5,6,7,8]; 
        $labelMap = [1,2,3,4,5,6,7,8,'D'];

        foreach ($playerIndexes as $i => $index) {
            $card1 = $cardsArr[$index];
            $card2 = $cardsArr[$index + 9];
            $card3 = $cardsArr[$index + 18];
            $playerLabel = $labelMap[$i]; 
      
            $m_body_html .= '<div class="player-column">
                <div class="player-label">'. $playerLabel.'</div>
                <img src="'. MASTER_URL .'/assets/common/images/cards/' . $card1 . '.png">
                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $card2 . '.png">
                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $card3 . '.png">';
                if (in_array($playerLabel, $winnersArr)){
                   $m_body_html .=  '<div class="casino-result-cards-item" style="position:relative;top:20%;"><img src="'.WEB_URL .'/storage/front/img/winner.png" class="winner-icon"></div>';
                }
           $m_body_html .= '
           
           </div>';
         } 
    $m_body_html .= '
    </div>
         <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                    <div class="casino-result-desc"
                                        style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                        <div class="casino-result-desc-item  flex-column text-center"
                                            style="display: flex;justify-content: center;width: 100%;">
                                            <div><span style="color:gray">Winner </span>
                                                ' . $rdesc_array[0] . '
                                            </div>
                                            <div><span style="color:gray">Pair Plus </span>
                                                ' . $rdesc_array[1] . '
                                            </div>
                                            <div><span style="color:gray">Total </span>
                                                ' . $rdesc_array[2] . '
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>';
            } elseif ($result_data['game_type'] == 'teenjoker') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $desc_remakrs = $result_data['desc_remakrs'];

                $rdesc_array = explode("#", $desc_remakrs);
                $joker = "";
                $player_a = "";
                $player_b = "";
                foreach ($cardsArr as $key => $card) {
                    if ($card != "1") {
                        if ($key == "0") {
                            $joker = '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
                        } else {
                            if ($key % 2 == 0) {
                                $player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
                            } else {
                                $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
                            }
                        }
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id"><b>Match Time:</b> ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    <b>Round-ID:</b> ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                            <div class="player-number">
                                <h4 class="text-center">Joker</h4>
                                <div class="player-image-container"><div class="text-center">
                                        ' . $joker . '
                                    </div>
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $player_b . '
                                    </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner: </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">Odd/Even: </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Color: </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                        <div><span style="color:gray">Suit: </span>
                                            ' . $rdesc_array[3] . '
                                        </div>

                                    </div>
                                </div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'teen20c') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $desc_remakrs = $result_data['desc_remakrs'];

                $rdesc_array = explode("#", $desc_remakrs);
                $player_a = "";
                $player_b = "";
                foreach ($cardsArr as $key => $card) {
                    if ($card != "1") {
                        if ($key % 2 == 0) {
                            $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        } else {
                            $player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        }
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $player_b . '
                                    </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;">
					<div><span style="color:gray">Winner </span>
					' . $rdesc_array[0] . '
				</div>
				<div><span style="color:gray">3 Baccarat </span>
					' . $rdesc_array[1] . '
				</div>
				<div><span style="color:gray">Total </span>
					' . $rdesc_array[2] . '
				</div>
				<div><span style="color:gray">Pair Plus </span>
					' . $rdesc_array[3] . '
				</div>
				<div><span style="color:gray">color </span>
					' . $rdesc_array[4] . '
				</div>

				</div>
			</div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'teen41') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cardsArr);

                $player_a = "";
                $player_b = "";
                foreach ($cardsArr as $key => $card) {
                    if ($card != "1") {
                        if ($key % 2 == 0) {
                            $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        } else {
                            $player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        }
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID:' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container d-flex flex-column">
                                ' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '
                                        <div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>
                                   ' : '')
                    . '
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $player_b . '
                                    </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;">
					<div><span style="color:gray">Winner </span>
					' . $rdesc_array[0] . '
				</div>
				
				<div><span style="color:gray">Under/Over </span>
					' . $rdesc_array[1] . '
				</div>
				
				

				</div>
			</div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'teen') {

                $result_status = $result_data['result_status'];
                $cards = json_decode($result_data['cards']);
                $desc_remakrs = $result_data['desc_remakrs'];

                $rdesc_array = explode("#", $desc_remakrs);
                $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
                $carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
                $carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

                $cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
                $cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
                $cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png";
                $player_a = '<img src="' . $carda1 . '" class="mr-2"> <img src="' . $carda2 . '"
                                class="mr-2"> <img src="' . $carda3 . '" class="mr-2">';
                $player_b = '<img src="' . $cardb1 . '" class="mr-2"> <img src="' . $cardb2 . '" 
                                class="mr-2"> <img src="' . $cardb3 . '" class="mr-2">';
                                
                $m_body_html .= '
<style>
.player-image-container img {
    max-width: 45px;
    top: -50px !important;
}
.winner-icon {
    position: relative;
    right: 0%;
    top: -50px !important;
}
</style>
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $player_b . '
                                    </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;">
					<div><span style="color:gray">Winner </span>
					' . $rdesc_array[0] . '
				</div>
				<div><span style="color:gray">Odd/Even </span>
					' . $rdesc_array[2] . '
				</div>
				<div><span style="color:gray">Consecutive </span>
					' . $rdesc_array[3] . '
				</div>
				

				</div>
			</div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'teen42') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cardsArr);

                $player_a = "";
                $player_b = "";
                foreach ($cardsArr as $key => $card) {
                    if ($card != "1") {
                        if ($key % 2 == 0) {
                            $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        } else {
                            $player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        }
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $player_b . '
                                    </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;">
					<div><span style="color:gray">Winner </span>
					' . $rdesc_array[0] . '
				</div>
				
				<div><span style="color:gray">Under/Over </span>
					' . $rdesc_array[1] . '
				</div>
				
				

				</div>
			</div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'teen33') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cardsArr);

                $player_a = "";
                $player_b = "";
                foreach ($cardsArr as $key => $card) {
                    if ($card != "1") {
                        if ($key % 2 == 0) {
                            $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        } else {
                            $player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        }
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $player_b . '
                                    </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;">
					<div><span style="color:gray">Winner </span>
					' . $rdesc_array[0] . '
				</div>
			

				</div>
			</div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'teen32') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cardsArr);

                $player_a = "";
                $player_b = "";
                foreach ($cardsArr as $key => $card) {
                    if ($card != "1") {
                        if ($key % 2 == 0) {
                            $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        } else {
                            $player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        }
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $player_b . '
                                    </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;">
					<div><span style="color:gray">Winner </span>
					' . $rdesc_array[0] . '
				</div>
			

				</div>
			</div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
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
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                            <div class="player-number">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container row">' .
                    (($result_status == 'A') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '<div class="col-md-6 text-center">
                                        <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[0] . '.png">
                                        <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[1] . '.png">
                                    </div>
                                </div>
                            </div>
                            <div class="player-number">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container row">' .
                    (($result_status == 'B') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                    <div class="col-md-6 text-center">
                                        <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[2] . '.png">
                                        <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[3] . '.png">
                                    </div>
                                    <div class="col-md-6 text-center"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-10 text-center ">
                            <div class="player-number ">
                             <h4 class="text-center">Board</h4>
                                <div class="">
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center">
                                            <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[4] . '.png">
                                            <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[5] . '.png">
                                            <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[6] . '.png">
                                            <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[7] . '.png">
                                            <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[8] . '.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        if($result_data['game_type'] == 'poker'){
                         $m_body_html .= '<div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                    <div class="casino-result-desc" style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                        <div class="casino-result-desc-item  flex-column text-center"
                                            style="display: flex;justify-content: center;width: 100%;">
                                            <div><span style="color:gray">Main: </span>
                                            ' . $rdesc_array[0] . '
                                            </div>
                                        
                                            <div><span style="color:gray">2 Card: </span>
                                                ' . $rdesc_array[1] . '
                                            </div>

                                            <div><span style="color:gray">7 Card: </span>
                                                ' . $rdesc_array[2] . '
                                            </div>

                                        </div>
                                    </div>
			                    </div>
                            </div>
                        </div>';
                        }else{
                        $m_body_html .= '<div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                    <div class="casino-result-desc" style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                        <div class="casino-result-desc-item  flex-column text-center"
                                            style="display: flex;justify-content: center;width: 100%;">
                                            <div><span style="color:gray">Main: </span>
                                            ' . $rdesc_array[0] . '
                                            </div>
                                        
                                            <div><span style="color:gray">Other: </span>
                                                ' . $rdesc_array[1] . '
                                            </div>

                                        </div>
                                    </div>
			                    </div>
                            </div>
                        </div>';
                        }

                       
               


                $m_body_html .= '
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
                            <span class="float-right round-id"><b>Match Time:</b> ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    <b>Round-ID:</b> ' . $round_id . '
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
                                                ' . (($result_status == 1) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . '
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
                                                ' . (($result_status == 6) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . '
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm"></div>
                                            <div class="col-sm-3 text-center">
                                                <div class="c-title text-center">2</div>
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[1] . '.png">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[7] . '.png">
                                                ' . (($result_status == 2) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . '
                                            </div>
                                            <div class="col-sm"></div>
                                            <div class="col-sm-3 text-center">
                                                <div class="c-title  text-center">5</div>
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[4] . '.png">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[10] . '.png">
                                                ' . (($result_status == 5) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . '
                                            </div>
                                            <div class="col-sm"></div>
                                        </div>
                                        <div class=" row">
                                            <div class="col-sm"></div>
                                            <div class="col-sm text-center">
                                                <div class="c-title text-center">3</div>
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[2] . '.png">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[8] . '.png">
                                                ' . (($result_status == 3) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . '
                                            </div>
                                            <div class="col-sm text-center">
                                                <div class="c-title text-center">4</div>
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[3] . '.png">
                                                <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[9] . '.png">
                                                ' . (($result_status == 4) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . '
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
            } else if ($result_data['game_type'] == 'lucky7' || $result_data['game_type'] == 'lucky7eu' || $result_data['game_type'] == 'lucky7eu2') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];
                $desc_remakrs = explode("||",$descText);

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
                                <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                    <span class="float-left round-id">Round-ID: ' . $round_id . '</span>
                                </div>
                            </div>
                                <div class="row player-container m-t-10">
                                    <div class="player-number">
                                        <div class="player-image-container row">
                                            <div class="col-md-12 text-center">
                                                <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[0] . '.png">
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div> 

<div class="row mt-2 justify-content-center">
			<div class="col-md-6">
				<div class="casino-result-desc"
					style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
					<div class="casino-result-desc-item  flex-column text-center"
						style="display: flex;justify-content: center;width: 100%;gap:8px;">
						<div>
							<span style="color:gray">Winner  </span>
							<span>' . $desc_remakrs[0] . '</span>
						</div>
						<div>
							<span style="color:gray">Odd/Even  </span>
							<span>' . $desc_remakrs[2] . '</span>
						</div>
						<div>
							<span style="color:gray">Color  </span>
							<span>' . $desc_remakrs[1] . '</span>
						</div>
						<div>
							<span style="color:gray">Card  </span>
							<span>' . $desc_remakrs[3] . '</span>
						</div>
						<div>
							<span style="color:gray">Line  </span>
							<span>' . $desc_remakrs[4] . '</span>
						</div>
						
					</div>
				</div>
			</div>
		</div>

                        </div>';
                         // <div class="col-md-12 text-center">
                                            //     <div class="resultd m-t-20">
                                            //     <span class="greenbx">Result:</span> ' . $result_status_text . '
                                            //     </div>
                                            // </div>
            } else if ($result_data['game_type'] == 'lucky15') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];


                $m_body_html .= '
                <style  type="text/css">
                .result-image{
                    text-align: center !important;
                            }

                    .result-image span {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        color: #fff;
                        font-size: 32px;
                    }
                </style>
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                    <span class="float-left round-id">Round-ID: ' . $round_id . '</span>
                                </div>
                            </div>
                                <div class="row player-container m-t-10">
                                <div class="player-number">

                            <div class="result-image">
                                <img src="' . WEB_URL . 'storage/img/ball-blank.png">
                                <span>' . $descText . '</span>
                            </div>

                                </div>
                            </div> 
                        </div>';
            } else if ($result_data['game_type'] == 'ballbyball') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];


                $m_body_html .= '
                <style  type="text/css">
                .result-image{
                        text-align: center !important;
                    }

                    .result-image span {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        color: #fff;
                        font-size: 32px;
                    }
                </style>
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                <span class="float-right round-id">Match Time:' . $matchtimee . '</span>
                                    <span class="float-left round-id">Round-ID: ' . $round_id . '</span>
                                </div>
                            </div>
                                <div class="row player-container m-t-10">
                                <div class="player-number">

                            <div class="result-image">
                                <img src="' . WEB_URL . 'storage/img/ball-blank.png">
                                <span>' . $descText . '</span>
                            </div>

                                </div>
                            </div> 
                        </div>';
            } else if ($result_data['game_type'] == 'superover') {

                $result_status = $result_data['result_status'];
                $cardsArr = $result_data['cards'];
                $descText = $result_data['desc_remakrs'];
                $data_cards = $result_data['data'];
                $cards = json_decode($cardsArr);
                $data_cards = json_decode($data_cards);
                $result_array = $data_cards->t1;



                $data_cards = $result_array->score;
                $winner_name = "";
                if ($result_status == 1) {
                    $winner_name = "ENG";
                } else if ($result_status == 2) {
                    $winner_name = "RSA";
                } else {
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
                $ball_new = 1;
                $all_scorebaord = array();
                foreach ($data_cards as $cards_data) {
                    $nation = $cards_data->nation;
                    if (!isset($nation)) {
                        $nation = $cards_data->nat;
                    }
                    if (!array_key_exists($nation, $all_scorebaord)) {
                        $ball_new = 1;
                    } else {
                        $ball_new++;
                    }

                    $run  = $cards_data->run;
                    $ball1 = "0_" . $ball_new;
                    $all_scorebaord[$nation][$ball1]['over'] = $run;
                    $ball = "0." . $ball_new;
                    /* $ball  = $cards_data->ball; */
                    $wkt  = $cards_data->wkt;
                    if ($nation == "ENG") {
                        $team_1_score = $team_1_score + $run;
                        if ($ball == "0.1") {
                            $ball_0_1 = $run;
                            if ($wkt == 1) {
                                $ball_0_1 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.2") {
                            $ball_0_2 = $run;
                            if ($wkt == 1) {
                                $ball_0_2 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.3") {
                            $ball_0_3 = $run;
                            if ($wkt == 1) {
                                $ball_0_3 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.4") {
                            $ball_0_4 = $run;
                            if ($wkt == 1) {
                                $ball_0_4 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.5") {
                            $ball_0_5 = $run;
                            if ($wkt == 1) {
                                $ball_0_5 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.6") {
                            $ball_0_6 = $run;
                            if ($wkt == 1) {
                                $ball_0_6 = "ww";
                                $team_1_wicket++;
                            }
                        }
                    } else {
                        $team_2_score = $team_2_score + $run;
                        if ($ball == "0.1") {
                            $ball_1_1 = $run;
                            if ($wkt == 1) {
                                $ball_1_1 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.2") {
                            $ball_1_2 = $run;
                            if ($wkt == 1) {
                                $ball_1_2 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.3") {
                            $ball_1_3 = $run;
                            if ($wkt == 1) {
                                $ball_1_3 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.4") {
                            $ball_1_4 = $run;
                            if ($wkt == 1) {
                                $ball_1_4 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.5") {
                            $ball_1_5 = $run;
                            if ($wkt == 1) {
                                $ball_1_5 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.6") {
                            $ball_1_6 = $run;
                            if ($wkt == 1) {
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




                $m_body_html .= '
                <style>
                .text-warning1{
                color:  #ef910f;
            }
                .market-title{
                padding: 8px !important;
                color: white;
                font-weight: bold;
            }
                </style>
                                            <div class="container-fluid">
                                                <div class="row m-t-10">
                                                    <div class="col-md-12">
                                                    <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                                        <span class="float-left round-id">Round-ID: ' . $round_id . '</span>
                                                    </div>
                                                    <br> 
                                                    <div class="col-md-12">
                                                        <span class="float-right ">Winner: <span class="greenbx"> ' . $winner_name . '</span> ' . $descText . '</span>
                                                    </div>
                                                </div>
                                                <div>
                    <div class="table-responsive">
                        <div class="market-title">First Inning</div>
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
                                <td class="text-center"><span class=" '.($ball_0_1 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_1 . '</span></td>
                                <td class="text-center"><span class="'.($ball_0_2 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_2 . '</span></td>
                                <td class="text-center"><span class="'.($ball_0_3 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_3 . '</span></td>
                                <td class="text-center"><span class="'.($ball_0_4 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_4 . '</span></td>
                                <td class="text-center"><span class="'.($ball_0_5 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_5 . '</span></td>
					            <td class="text-center"><span class="'.($ball_0_6 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_6 . '</span></td>
                                <td class="text-center nationcard">' . $ball_0_run_over . '</td>
                                <td class="text-center nationcard">' . $ball_0_score . '</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive mt-3">
                        <div class="market-title">Second Inning</div>
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
                                <td class="text-center"><span class="'.($ball_1_1 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_1 . '</span></td>
                                <td class="text-center"><span class="'.($ball_1_2 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_2 . '</span></td>
                                <td class="text-center"><span class="'.($ball_1_3 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_3 . '</span></td>
                                <td class="text-center"><span class="'.($ball_1_4 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_4 . '</span></td>
                                <td class="text-center"><span class="'.($ball_1_5 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_5 . '</span></td>
					            <td class="text-center"><span class="'.($ball_1_6 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_6 . '</span></td>
                                <td class="text-center nationcard">' . $ball_1_run_over . '</td>
                                <td class="text-center nationcard">' . $ball_1_score . '</td>
                            </tr>
                        </table>
                    </div>
                    </div>
                                            </div>';
            } else if ($result_data['game_type'] == 'superover3') {

                $result_status = $result_data['result_status'];
                $cardsArr = $result_data['cards'];
                $descText = $result_data['desc_remakrs'];
                $data_cards = $result_data['data'];
                $cards = json_decode($cardsArr);
                $data_cards = json_decode($data_cards);
                $result_array = $data_cards->t1;
                // $details = $this->card_details($cardsArr[0]);
                $data_cards = $result_array->score;
                $winner_name = "";
                if ($result_status == 1) {
                    $winner_name = "IND";
                } else if ($result_status == 2) {
                    $winner_name = "AUS";
                } else {
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
                $ball_new = 1;
                $all_scorebaord = array();
                foreach ($data_cards as $cards_data) {
                    $nation = $cards_data->nation;
                    if (!isset($nation)) {
                        $nation = $cards_data->nat;
                    }
                    if (!array_key_exists($nation, $all_scorebaord)) {
                        $ball_new = 1;
                    } else {
                        $ball_new++;
                    }

                    $run  = $cards_data->run;
                    $ball1 = "0_" . $ball_new;
                    $all_scorebaord[$nation][$ball1]['over'] = $run;
                    $ball = "0." . $ball_new;
                    /* $ball  = $cards_data->ball; */
                    $wkt  = $cards_data->wkt;
                    if ($nation == "IND") {
                        $team_1_score = $team_1_score + $run;
                        if ($ball == "0.1") {
                            $ball_0_1 = $run;
                            if ($wkt == 1) {
                                $ball_0_1 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.2") {
                            $ball_0_2 = $run;
                            if ($wkt == 1) {
                                $ball_0_2 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.3") {
                            $ball_0_3 = $run;
                            if ($wkt == 1) {
                                $ball_0_3 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.4") {
                            $ball_0_4 = $run;
                            if ($wkt == 1) {
                                $ball_0_4 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.5") {
                            $ball_0_5 = $run;
                            if ($wkt == 1) {
                                $ball_0_5 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.6") {
                            $ball_0_6 = $run;
                            if ($wkt == 1) {
                                $ball_0_6 = "ww";
                                $team_1_wicket++;
                            }
                        }
                    } else {
                        $team_2_score = $team_2_score + $run;
                        if ($ball == "0.1") {
                            $ball_1_1 = $run;
                            if ($wkt == 1) {
                                $ball_1_1 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.2") {
                            $ball_1_2 = $run;
                            if ($wkt == 1) {
                                $ball_1_2 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.3") {
                            $ball_1_3 = $run;
                            if ($wkt == 1) {
                                $ball_1_3 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.4") {
                            $ball_1_4 = $run;
                            if ($wkt == 1) {
                                $ball_1_4 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.5") {
                            $ball_1_5 = $run;
                            if ($wkt == 1) {
                                $ball_1_5 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.6") {
                            $ball_1_6 = $run;
                            if ($wkt == 1) {
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

                // $result_status_text = str_replace($result_text." | ","",$descText);     

                /*$result_status_text .= $details['color'] . ' || ' . $details['oddeven'] . ' || Card ' . $details['name'];*/





                $m_body_html .= '
                <style>
                .text-warning1{
                color:  #ef910f;
            }
                </style>
                                            <div class="container-fluid">
                                                <div class="row m-t-10">
                                                    <div class="col-md-12">
                                                    <span class="float-right round-id"><b>Match Time:</b> ' . $matchtimee . '</span>
                                                        <span class="float-left round-id"><b>Round-ID:</b> ' . $round_id . '</span>
                                                    </div>
                                                    <br> 
                                                    <div class="col-md-12">
                                                        <span class="float-right ">Winner: <span class="greenbx"> ' . $winner_name . '</span> ' . $descText . '</span>
                                                    </div>
                                                </div>
                                                <div>
                    <div class="table-responsive">
                        <div class="market-title">First Inning</div>
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center"><b><span class="text-success">IND</span></b></th>
                                <th class="text-center"><b>1</b></th>
                                <th class="text-center"><b>2</b></th>
                                <th class="text-center"><b>3</b></th>
                                <th class="text-center"><b>4</b></th>
                            
                                <th class="text-center"><b>Run/Over</b></th>
                                <th class="text-center"><b>Score</b></th>
                            </tr>
                            <tr>
                                <td class="text-center"><b>Over 1</b></td>
                               <td class="text-center"><span class="'.($ball_0_1 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_1 . '</span></td>
                                <td class="text-center"><span class="'.($ball_0_2 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_2 . '</span></td>
                                <td class="text-center"><span class="'.($ball_0_3 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_3 . '</span></td>
                                <td class="text-center"><span class="'.($ball_0_4 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_4 . '</span></td>
                            
                                <td class="text-center nationcard">' . $ball_0_run_over . '</td>
                                <td class="text-center nationcard">' . $ball_0_score . '</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive mt-3">
                        <div class="market-title">Second Inning</div>
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center"><b><span class="text-success">AUS</span></b></th>
                                <th class="text-center"><b>1</b></th>
                                <th class="text-center"><b>2</b></th>
                                <th class="text-center"><b>3</b></th>
                                <th class="text-center"><b>4</b></th>
                            
                                <th class="text-center"><b>Run/Over</b></th>
                                <th class="text-center"><b>Score</b></th>
                            </tr>
                            <tr>
                                <td class="text-center"><b>Over 1</b></td>
                                <td class="text-center"><span class="'.($ball_1_1 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_1 . '</span></td>
                                <td class="text-center"><span class="'.($ball_1_2 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_2 . '</span></td>
                                <td class="text-center"><span class="'.($ball_1_3 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_3 . '</span></td>
                                <td class="text-center"><span class="'.($ball_1_4 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_4 . '</span></td>
                            
                                <td class="text-center nationcard">' . $ball_1_run_over . '</td>
                                <td class="text-center nationcard">' . $ball_1_score . '</td>
                            </tr>
                        </table>
                    </div>
                    </div>
                                            </div>';
            } else if ($result_data['game_type'] == 'aaa') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];
                $rdesc_array = explode("|",$descText);

                $details = $this->card_details($cardsArr[0]);

                $result_text = "";
                if ($result_status == "A") {
                    $result_text = "Amar";
                } else if ($result_status == "B") {
                    $result_text = "Akbar";
                } else if ($result_status == "C") {
                    $result_text = "Anthony";
                }

                $result_status_text = str_replace($result_text . " | ", "", $descText);

                /*$result_status_text .= $details['color'] . ' || ' . $details['oddeven'] . ' || Card ' . $details['name'];*/





                $m_body_html .= '
                                            <div class="container-fluid">
                                                <div class="row m-t-10">
                                                    <div class="col-md-12">
                                                    <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                                        <span class="float-left round-id">Round-ID:' . $round_id . '</span>
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

                                             <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">Odd/Even </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                        <div><span style="color:gray">Color </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Under/Over </span>
                                            ' . $rdesc_array[3] . '
                                        </div>
                                        <div><span style="color:gray">Card </span>
                                            ' . $rdesc_array[4] . '
                                        </div>

                                    </div>
                                </div>
                                </div>
                                </div>
                                    </div>

                                            </div>';
                                            //  <div class="col-md-12 text-center">
                                            //                     <div class="resultd m-t-20">
                                            //                     <span class="greenbx">Result:</span> ' . $result_text . '
                                            //                         <br>
                                            //                         <span>' . $result_status_text . '</span> 
                                            //                     </div>
                                            //                 </div>
            } else if ($result_data['game_type'] == 'superover2') {

                $result_status = $result_data['result_status'];
                $cardsArr = $result_data['cards'];
                $descText = $result_data['desc_remakrs'];
                $data_cards = $result_data['data'];
                $cards = json_decode($cardsArr);
                $data_cards = json_decode($data_cards);
                $result_array = $data_cards->t1;



                $data_cards = $result_array->score;
                $winner_name = "";
                if ($result_status == 1) {
                    $winner_name = "IND";
                } else if ($result_status == 2) {
                    $winner_name = "ENG";
                } else {
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
                $ball_new = 1;
                $all_scorebaord = array();
                foreach ($data_cards as $cards_data) {
                    $nation = $cards_data->nation;
                    if (!isset($nation)) {
                        $nation = $cards_data->nat;
                    }
                    if (!array_key_exists($nation, $all_scorebaord)) {
                        $ball_new = 1;
                    } else {
                        $ball_new++;
                    }

                    $run  = $cards_data->run;
                    $ball1 = "0_" . $ball_new;
                    $all_scorebaord[$nation][$ball1]['over'] = $run;
                    $ball = "0." . $ball_new;
                    /* $ball  = $cards_data->ball; */
                    $wkt  = $cards_data->wkt;
                    if ($nation == "IND") {
                        $team_1_score = $team_1_score + $run;
                        if ($ball == "0.1") {
                            $ball_0_1 = $run;
                            if ($wkt == 1) {
                                $ball_0_1 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.2") {
                            $ball_0_2 = $run;
                            if ($wkt == 1) {
                                $ball_0_2 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.3") {
                            $ball_0_3 = $run;
                            if ($wkt == 1) {
                                $ball_0_3 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.4") {
                            $ball_0_4 = $run;
                            if ($wkt == 1) {
                                $ball_0_4 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.5") {
                            $ball_0_5 = $run;
                            if ($wkt == 1) {
                                $ball_0_5 = "ww";
                                $team_1_wicket++;
                            }
                        } else if ($ball == "0.6") {
                            $ball_0_6 = $run;
                            if ($wkt == 1) {
                                $ball_0_6 = "ww";
                                $team_1_wicket++;
                            }
                        }
                    } else {
                        $team_2_score = $team_2_score + $run;
                        if ($ball == "0.1") {
                            $ball_1_1 = $run;
                            if ($wkt == 1) {
                                $ball_1_1 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.2") {
                            $ball_1_2 = $run;
                            if ($wkt == 1) {
                                $ball_1_2 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.3") {
                            $ball_1_3 = $run;
                            if ($wkt == 1) {
                                $ball_1_3 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.4") {
                            $ball_1_4 = $run;
                            if ($wkt == 1) {
                                $ball_1_4 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.5") {
                            $ball_1_5 = $run;
                            if ($wkt == 1) {
                                $ball_1_5 = "ww";
                                $team_2_wicket++;
                            }
                        } else if ($ball == "0.6") {
                            $ball_1_6 = $run;
                            if ($wkt == 1) {
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

                // $result_status_text = str_replace($result_text." | ","",$descText);     

                /*$result_status_text .= $details['color'] . ' || ' . $details['oddeven'] . ' || Card ' . $details['name'];*/





                $m_body_html .= '
                 <style>
                .text-warning1{
                color:  #ef910f;
            }
                </style>
                                            <div class="container-fluid">
                                                <div class="row m-t-10">
                                                    <div class="col-md-12">
                                                    <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                                        <span class="float-left round-id">Round-ID: ' . $round_id . '</span>
                                                    </div>
                                                    <br> 
                                                    <div class="col-md-12">
                                                        <span class="float-right ">Winner: <span class="greenbx"> ' . $winner_name . '</span> ' . $descText . '</span>
                                                    </div>
                                                </div>
                                                <div>
                    <div class="table-responsive">
                        <div class="market-title">First Inning</div>
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
                            </tr>
                            <tr>
                                <td class="text-center"><b>Over 1</b></td>
                                <td class="text-center"><span class="'.($ball_0_1 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_1 . '</span></td>
                                <td class="text-center"><span class="'.($ball_0_2 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_2 . '</span></td>
                                <td class="text-center"><span class="'.($ball_0_3 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_3 . '</span></td>
                                <td class="text-center"><span class="'.($ball_0_4 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_4 . '</span></td>
                                <td class="text-center"><span class="'.($ball_0_5 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_5 . '</span></td>
					            <td class="text-center"><span class="'.($ball_0_6 === 'ww' ? 'text-warning1' : '').'">' . $ball_0_6 . '</span></td>
                                <td class="text-center nationcard">' . $ball_0_run_over . '</td>
                                <td class="text-center nationcard">' . $ball_0_score . '</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive mt-3">
                        <div class="market-title">Second Inning</div>
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
                                <td class="text-center"><span class="'.($ball_1_1 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_1 . '</span></td>
                                <td class="text-center"><span class="'.($ball_1_2 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_2 . '</span></td>
                                <td class="text-center"><span class="'.($ball_1_3 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_3 . '</span></td>
                                <td class="text-center"><span class="'.($ball_1_4 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_4 . '</span></td>
                                <td class="text-center"><span class="'.($ball_1_5 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_5 . '</span></td>
					            <td class="text-center"><span class="'.($ball_1_6 === 'ww' ? 'text-warning1' : '').'">' . $ball_1_6 . '</span></td>
                                <td class="text-center nationcard">' . $ball_1_run_over . '</td>
                                <td class="text-center nationcard">' . $ball_1_score . '</td>
                            </tr>
                        </table>
                    </div>
                    </div>
                                            </div>';
            } else if ($result_data['game_type'] == 'aaa') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);

                $descText = $result_data['desc_remakrs'];

                $rdesc_array = explode("|",$descText);
                $details = $this->card_details($cardsArr[0]);

                $result_text = "";
                if ($result_status == "A") {
                    $result_text = "Amar";
                } else if ($result_status == "B") {
                    $result_text = "Akbar";
                } else if ($result_status == "C") {
                    $result_text = "Anthony";
                }

                $result_status_text = str_replace($result_text . " | ", "", $descText);

                /*$result_status_text .= $details['color'] . ' || ' . $details['oddeven'] . ' || Card ' . $details['name'];*/





                $m_body_html .= '
                                            <div class="container-fluid">
                                                <div class="row m-t-10">
                                                    <div class="col-md-12">
                                                   
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

                            <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner: </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">Pair: </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Odd/Even: </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                        <div><span style="color:gray">Color: </span>
                                            ' . $rdesc_array[3] . '
                                        </div>
                                        <div><span style="color:gray">Card: </span>
                                            ' . $rdesc_array[4] . '
                                        </div>

                                    </div>
                                </div>
                                </div>
                                </div>
                                    </div>

                                            </div>';
            } else if ($result_data['game_type'] == 'cmatch20') {

                $result_status = $result_data['result_status'];
                $cards = $result_data['cards'];
                $descText = $result_data['desc_remakrs'];
                $cards = json_decode($cards);
                $rdesc_array = explode("#", $descText);



                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                    <span class="float-left round-id">Round-ID: ' . $round_id . '</span>
                                </div>
                            </div>
                                <div class="row player-container m-t-10">
                                <div class="player-number">
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center">
                                            <img src="' . WEB_URL . '/storage/front/img/cards_new/' . $cards[0] . '.png">
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 

                         <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Runs: </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                    </div>

                        </div>';
            } else if ($result_data['game_type'] == 'dtl20') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $descText);

                $m_body_html .= '
                <style>
                .winner-icon {
    position: absolute;
    right: 68%;
     bottom: 0%; 
}
                </style>
                            <div class="container-fluid">
                                <div class="row m-t-10">
                                
                                    <div class="col-md-12"> 
                                    <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                    <span class="float-left round-id">Round-ID: ' . $round_id . '</span> 
                                    </div>
                                </div>
                               
                                <div class="row player-container m-t-10">
                                <div class="player-number">
                                   
                                    <div class="player-image-container row">
                                            <div class="col-md-12 text-center">
                                                <div class="col-md-2 d-inline-block v-t"> 
                                                    <span class="text-center"><h6>Dragon</h6></span> 
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> 
                                                        ' . (($result_status == 'D') ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>  ' : '') . '
                                                    </div>
                                                    <img class="m-t-10"  src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[0] . '.png">
                                                    
                                                </div>
                                                <div class="col-md-2 d-inline-block v-t"> 
                                                    <span class="text-center"><h6>Tiger</h6></span> 
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> 
                                                    ' . (($result_status == 'T') ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>  ' : '') . '
                                                    </div>
                                                    <img class="m-t-10"  src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[1] . '.png">
                                                    
                                                </div>
                                                <div class="col-md-2 d-inline-block v-t"> 
                                                    <span class="text-center"><h6>Lion</h6></span> 
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> 
                                                    ' . (($result_status == 'L') ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>  ' : '') . '
                                                    </div>
                                                    <img class="m-t-10"  src="' . WEB_URL . '/storage/front/img/cards_new/' . $cardsArr[2] . '.png">
                                                    
                                                </div>
                                               
                                            </div>
                                        </div>

                                </div>
                            </div> 

                             <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">Red/Black </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Odd/Even </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                        <div><span style="color:gray">Card </span>
                                            ' . $rdesc_array[3] . '
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                    </div>

                            </div>';
            } else if ($result_data['game_type'] == 'dt6' || $result_data['game_type'] == 'dt20' || $result_data['game_type'] == 'dt202') {

                $result_status = $result_data['result_status'];
                $cardsArr = $result_data['cards'];
                $descArr = $result_data['desc_remakrs'];
                $rdesc_array = explode('|', $descArr);
               
	            $cardsArr = json_decode($cardsArr);

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
                <style>
                .d-inline-block {
    display: inline-grid !important;
}
                </style>
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                    <span class="float-left round-id">Round-ID: ' . $round_id . '</span>
                                </div>
                            </div>
                            <div class="row player-container m-t-10">
                                <div class="player-number">
                                   
                                    <div class="player-image-container row">
                                            <div class="col-md-12 text-center">
                                                <div class="col-md-2 d-inline-block v-t" style="justify-content: space-evenly;align-items: flex-end;"> 
                                                    <span class="text-center"><b>Dragon</b></span> 
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> 
                                                        ' . (($result_status == 'D') ? '<div class="casino-result-cards-item">
                                                            <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
                                                        </div> ' : '') . '
                                                    </div>
                                                    <img class="m-t-10"  src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[0] . '.png">
                                                    
                                                </div>
                                                <div class="col-md-2 d-inline-block v-t" style="justify-content: space-evenly;align-items: flex-end;"> 
                                                    <span class="text-center"><b>Tiger</b></span> 
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> 
                                                    ' . (($result_status == 'T') ? '<div class="casino-result-cards-item">
                                                    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
                                                </div>' : '') . '
                                                    </div>
                                                    <img class="m-t-10"  src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[1] . '.png">
                                                    
                                                </div>
                                               
                                            </div>
                                        </div>

                                </div>
                            </div> 


                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">Pair </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Odd/Even </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                        <div><span style="color:gray">Color </span>
                                            ' . $rdesc_array[3] . '
                                        </div>
                                        <div><span style="color:gray">Card </span>
                                            ' . $rdesc_array[4] . '
                                        </div>
                                 <div><span style="color:gray">Suit </span>
                                            ' . $rdesc_array[5] . '
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        ';
                          // <div class="col-md-12 text-center">
                                        //     <div class="resultd m-t-20">
                                        //         <span class="greenbx">Result:</span> ' . $result_text . ' | ' . $is_pair_text . 'Pair
                                        //     </div>
                                        //     <div><b>Dragon:</b> ' . $dragon_label . '</div> 
                                        //     <div><b>Tiger:</b> ' . $tiger_label . '</div> 
                                        // </div>

                                         // <div class="player-image-container row">
                                    //     <div class="col text-center"> 
                                    //     <h4>Dragon</h4>
                                    //         <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[0] . '.png">
                                    //         <img src="' . MASTER_URL . '/assets/common/images/cards/' . $cardsArr[1] . '.png">
                                    //     </div>
                                    // </div>

            } else if ($result_data['game_type'] == 'btable') {
                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];
                $rdesc_array = explode("|",$descText);

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
                                <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                    <span class="float-left round-id">Round-ID: ' . $round_id . '</span>
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

                             <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">Odd/Even </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Color </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                        <div><span style="color:gray">Dulhan/Barati </span>
                                            ' . $rdesc_array[3] . '
                                        </div>
                                        <div><span style="color:gray">Card </span>
                                            ' . $rdesc_array[4] . '
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                    </div>

                        </div>';
            } else if ($result_data['game_type'] == 'btable2') {
                $result_status = $result_data['result_status'];
                $cards = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $descText);
                $card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";

                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                    <span class="float-left round-id">Round-ID: ' . $round_id . '</span>
                                </div>
                            </div>
                                <div class="row player-container m-t-10">
                                <div class="player-number">
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center">
                                            <img src="' . $card_1 . '">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> 
                            <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">Odd </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Dulha Dulhan/Barati </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                        <div><span style="color:gray">Color </span>
                                            ' . $rdesc_array[3] . '
                                        </div>
                                        <div><span style="color:gray">Card </span>
                                            ' . $rdesc_array[4] . '
                                        </div>

                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                        </div>';
            } else if ($result_data['game_type'] == 'goal') {
                $result_status = $result_data['result_status'];
                $cards = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $descText);

                $goal_by = $rdesc_array[0];
                $goal_method = $rdesc_array[1];


                $m_body_html .= '
                        <div class="container-fluid">
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                <span class="float-right round-id"><b>Match Time:</b> ' . $matchtimee . '</span>
                                    <span class="float-left round-id"><b>Round-ID:</b> ' . $round_id . '</span>
                                </div>
                            </div>
                            
                                    <div class="row">
                                            <div class="col-12 text-center">
                                                <div class="goal-result cricket20ballresult goalresult"><img src="' . WEB_URL . '/storage/img/soccer-ball.png" style="height: 250px;"><span>
                                                    ' . $goal_method . '  by  ' . $goal_by;
                '
                                                    </span></div>
                                            </div>
                                    </div>
                           
                            
                        </div>';
            } else if ($result_data['game_type'] == 'card32' || $result_data['game_type'] == 'card32eu') {

                $result_status = $result_data['result_status'];
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];
                $desc_remakrs = explode("|", $descText);

                $player_8 = array($cardsArr[0], $cardsArr[4], $cardsArr[8], $cardsArr[12], $cardsArr[16], $cardsArr[20], $cardsArr[24], $cardsArr[28], $cardsArr[32]);

                $player_9 = array($cardsArr[1], $cardsArr[5], $cardsArr[9], $cardsArr[13], $cardsArr[17], $cardsArr[21], $cardsArr[25], $cardsArr[29], $cardsArr[33]);

                $player_10 = array($cardsArr[2], $cardsArr[6], $cardsArr[10], $cardsArr[14], $cardsArr[18], $cardsArr[22], $cardsArr[26], $cardsArr[30], $cardsArr[34]);

                $player_11 = array($cardsArr[3], $cardsArr[7], $cardsArr[11], $cardsArr[15], $cardsArr[19], $cardsArr[23], $cardsArr[27], $cardsArr[31], $cardsArr[35]);


                $player_8_rank = 8; 
                $player_8_img  = "";

                foreach ($player_8 as $key => $card) {
                    if ($card != 'WEB_URL . "/storage/front/img/cards/' . $card. '.png"') {
                        // $card_info = $cards_result->$cardsArr[$key]; 
                         $card = $this->card_details($player_8[$key]);
                        $player_8_rank += $card['rank'];
                        $player_8_img .= '<img src="' . $card . '" />';
                    }
                }

                 $player_9_rank = 9; 
                $player_9_img  = "";

                foreach ($player_9 as $key => $card) {
                    if ($card != 'WEB_URL . "/storage/front/img/cards/' . $card. '.png"') {
                        // $card_info = $cards_result->$cardsArr[$key]; 
                         $card = $this->card_details($player_9[$key]);
                        $player_9_rank += $card['rank'];
                        $player_9_img .= '<img src="' . $card . '" />';
                    }
                }
                 $player_10_rank = 10; 
                $player_10_img  = "";

                foreach ($player_10 as $key => $card) {
                    if ($card != 'WEB_URL . "/storage/front/img/cards/' . $card. '.png"') {
                        // $card_info = $cards_result->$cardsArr[$key]; 
                         $card = $this->card_details($player_10[$key]);
                        $player_10_rank += $card['rank'];
                        $player_10_img .= '<img src="' . $card . '" />';
                    }
                }
                 $player_11_rank = 11; 
                $player_11_img  = "";

                foreach ($player_11 as $key => $card) {
                    if ($card != 'WEB_URL . "/storage/front/img/cards/' . $card. '.png"') {
                        // $card_info = $cards_result->$cardsArr[$key]; 
                         $card = $this->card_details($player_11[$key]);
                        $player_11_rank += $card['rank'];
                        $player_11_img .= '<img src="' . $card . '" />';
                    }
                }
               

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
                <style>
                .rank{
                    width: 20px;
    line-height: 20px;
    padding: 0;
    background-color: #34c38f !important;
    color: #fff !important;
                }
    .winner-icon {
    position: absolute;
    right: 35%;
    bottom: 8%;
}
                </style>
                        <div class="container-fluid">
                            <div class="row m-t-10">
                            
                                <div class="col-md-12"> 
                                <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">Round-ID: ' . $round_id . '</span> </div>
                            </div>
                            <div class="row player-container m-t-10">
                                <div class="player-number">
                                    <h4 class="text-center">Player 8 - <span class="rank">'. $player_8_rank .'</span></h4>
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center"> ' . $player_8_img . ' </div>
                                        ' . (($result_status == 8) ? '<div class="casino-result-cards-item" style="position: relative;right: 34%;">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . '
                                    </div>
                                    <hr>
                                    <h4 class="text-center">Player 9 - <span class="rank">'. $player_9_rank .'</span></h4>
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center"> ' . $player_9_img . ' </div>
                                        ' . (($result_status == 9) ? '<div class="casino-result-cards-item" style="position: relative;right: 34%;">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . '
                                    </div>
                                    <hr>
                                    <h4 class="text-center">Player 10 - <span class="rank">'. $player_10_rank .'</span></h4>
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center"> ' . $player_10_img . ' </div>
                                        ' . (($result_status == 10) ? '<div class="casino-result-cards-item" style="position: relative;right: 34%;">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . '
                                    </div>
                                    <hr>
                                    <h4 class="text-center">Player 11 - <span class="rank">'. $player_11_rank .'</span></h4>
                                    <div class="player-image-container row">
                                        <div class="col-md-12 text-center"> ' . $player_11_img . ' </div>
                                        ' . (($result_status == 11) ? '<div class="casino-result-cards-item" style="position: relative;right: 34%;">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . '
                                    </div>
                                </div>
                            </div>

                        </div>';
            } else if (strtolower($result_data['game_type']) == 'war') {

                $result_arr = explode(",", $result_data['result_status']);
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];
                $desc_remakrs = explode("#",$descText);
                $m_body_html .= '
                <style>
                .winner-icon {
    position: absolute;
    /* right: 0; */
    bottom: -69%;
    left: 19%;
}
                </style>
                        <div class="container-fluid">
                            <div class="row m-t-10">
                            
                                <div class="col-md-12">
                                <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                 <span class="float-left round-id">Round-ID: ' . $round_id . '</span> </div>
                            </div>
                          <!--  <div class="row player-container m-t-10">
                                <div class="player-number">
                                      <h4 class="text-center">Dealer</h4>
                                   <div class="player-image-container row">
                                        <div class=" text-center">
                                            </div> 
                                        <div class="col-md-12 text-center"> <img src="' . WEB_URL . 'storage/front/img/cards_new/' . $cardsArr[6] . '.png"> </div>
                                    </div> 
                                </div>
                            </div> -->
                            <hr>
                            <div class="row m-t-10 text-center ">
                                <div class="player-number ">
                                    <div class="">
                                        <div class="player-image-container row">
                                            <div class="col-md-12 text-center">
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b>1</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards_new/' . $cardsArr[0] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> ' . ((in_array(1, $result_arr)) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . ' </div>
                                                </div>
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b>2</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards_new/' . $cardsArr[1] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> ' . ((in_array(2, $result_arr)) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . ' </div>
                                                </div>
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b> 3</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards_new/' . $cardsArr[2] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> ' . ((in_array(3, $result_arr)) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . ' </div>
                                                </div>
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b> 4</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards_new/' . $cardsArr[3] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> ' . ((in_array(4, $result_arr)) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . ' </div>
                                                </div>
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b> 5</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards_new/' . $cardsArr[4] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> ' . ((in_array(5, $result_arr)) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . ' </div>
                                                </div>
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b> 6</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards_new/' . $cardsArr[5] . '.png">
                                                    <div class="winner-icon ml-2 d-inline-block mt-3"> ' . ((in_array(6, $result_arr)) ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . ' </div>
                                                </div>
                                                <div class="col-md-1 d-inline-block v-t"> <span class="text-center"><b> D</b></span> <img class="m-t-10" src="' . WEB_URL . 'storage/front/img/cards_new/' . $cardsArr[6] . '.png"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
 </div>
<div class="row mt-2 justify-content-center" style="padding: 46px;">
			<div class="col-md-6">
				<div class="casino-result-desc"
					style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
					<div class="casino-result-desc-item  flex-column text-center"
						style="display: flex;justify-content: center;width: 100%;gap:8px;">
						<div>
							<span style="color:gray">Winner  </span>
							<span>' . $desc_remakrs[0] . '</span>
						</div>
						 <div><span style="color:gray">Color  </span>
							<span>' . $desc_remakrs[1] . '</span>
						</div>
						<div><span style="color:gray">Odd/Even  </span>
							<span>' . $desc_remakrs[2] . '</span>
						</div>
                        <div><span style="color:gray">Suit  </span>
							<span>' . $desc_remakrs[3] . '</span>
						</div>
						
					</div>
				</div>
			</div>
		</div>

                       ';
            } else if ($result_data['game_type'] == 'ab20') {

                $andar_cards = $result_data['cards'];
                $bahar_cards = json_decode($result_data['b_cards']);
                $result_status = $result_data['result_status'];
	            $desc_remakrs = $result_data['desc_remakrs'];
	            $andar_cards = json_decode($andar_cards);

                $andar_html = '';
              
                foreach ($andar_cards as $andar_card) {
                   
                    $andar_html .= '
<style>
.owl-carousel .owl-item img {
    width: 43px !important;
    height: 52px;
    padding: 5px;
}
</style>
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
                    
                        <div class="col-md-12"> 
                        <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                        <span class="float-left round-id">Round-ID:' . $round_id . '</span> </div>
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
            }else if ($result_data['game_type'] == 'ab4') {

                 $cards = json_decode($result_data['cards']);
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $cards_b = $result_data['b_cards'];

                // $card_joker_image  = WEB_URL . "/storage/front/img/cards/" . $cards[0] . ".png";
                // $card_1st_andar_image  = WEB_URL . "/storage/front/img/cards/" . $cards[2] . ".png";
                // $card_1st_bahat_image  = WEB_URL . "/storage/front/img/cards/" . $cards[1] . ".png";

                $i = 0;
                $aall = array();
                $aall_number = array();
                $ball = array();
                $ball_number = array();

                foreach ($cards as $card_image) {
                    if (
                        $card_image != 1
                    ) {
                        
                            if ($i % 2 == 0) {
                                $ball[] = WEB_URL . "/storage/front/img/cards_new/" . $card_image . ".png";
                                $ball_number[]=$i;
                            } else {
                                $aall[] = WEB_URL . "/storage/front/img/cards_new/" . $card_image . ".png";
                                $aall_number[]=$i;
                            }
                        
                    }
                    $i++;
                }

               // $aall = array_reverse($aall);
               // $ball = array_reverse($ball);
                $andar_html = '';
              
               $m_body_html .= '<div class="row m-t-10">
                                        <div class="col-md-12">
                                        <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                         <span class="float-left round-id">Round-ID: ' . $round_id . '</span> </div>
                                    </div>
                                    <div class="row row5 abj-result text-center align-items-center">';
                // $m_body_html .= '<div class="col-2"><img src="' . $card_joker_image . '" class="card-right"></div>';

                $m_body_html .= '<div class="col-10">
                                    <div class="player-number1" style="position: relative;">
                                        <h4 class="text-center">Andar</h4>
                                        <div class="row row5">';
                // $m_body_html .= '<div class="col-1"><img src="' . $card_1st_andar_image . '" class="mb-1"></div>';
                $m_body_html .= '<div class="col-10">
                                    <div style="width: 90%; margin: 0 auto">
                                    <div id="result-a-cards" class="ab-ltrslider owl-carousel last-result-slider owl-theme owl-ltr owl-loaded owl-drag" style="width: 100%;">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 190px;">';
                $i = 0;
                foreach ($aall as $k=>$andar_card) {
                    $active_class = "";
                    if ($i == 0) {
                        $active_class = "active";
                    }
                    $i++;
                    
                    $m_body_html .= '<div class="owl-item ' . $active_class . '" >
                                        <div>'.($ball_number[$k] + 2).'</div>
                                        <div class="item"><img src="' . $andar_card . '"></div>
                                    </div>';
                }

                $m_body_html .= '</div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                ';
                if ($result_status == 1) {
                    $m_body_html .= '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>';
                }

                $m_body_html .= '
                                    

                                </div>
                                <div class="player-number1" style="position: relative;">
                                    <h4 class="text-center">Bahar</h4>
                                    <div class="row row5">';
                // $m_body_html .= '<div class="col-1"><img src="' . $card_1st_bahat_image . '" class="card-right"></div>';
                $m_body_html .= '<div class="col-10">
                                    <div style="width: 90%; margin: 0 auto">
                                    <div id="result-b-cards" class="ab-ltrslider owl-carousel last-result-slider owl-theme owl-ltr owl-loaded owl-drag" style="width: 100%;">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 228px;">';
                $i = 0;
                $j = 1;
                foreach ($ball as $l=>$bahar_card) {
                    $active_class = "";
                    if ($i == 0) {
                        $active_class = "active";
                    }
                    $i++;
                   
                    $m_body_html .= '<div class="owl-item ' . $active_class . '" >
                    <div>'.$j.'</div>
                                        <div class="item"><img src="' . $bahar_card . '"></div>
                                    </div>';
                    $j=$ball_number[$l] + 3;
                }
                $m_body_html .= '</div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            ';
                if ($result_status == 2) {
                    $m_body_html .= '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>';
                }

                $m_body_html .= '</div>
                                        
                                    </div>
                                </div>
                                </div>
                                <script>

                                (function ( $ ) { 

                                jQuery("#result-a-cards").owlCarousel({
                                        
                                        rtl:false,
                                        loop: false,
                                        margin: 2,
                                        nav: true,
                                        dots: false,
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
                                        
                                        rtl:false,
                                        loop: false,
                                        margin: 2,
                                        nav: true,
                                        dots: false,
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
            }  else if ($result_data['game_type'] == 'cmeter') {

               $cards = $result_data['cards'];
                $cards = json_decode($cards);
                $low_cards = array();
                $high_cards = array();
                $result_cards = array();
                $i = 0;

                while ($cards[$i]) {
                    if ($cards[$i] == '10HH' || $cards[$i] == '10hh') {
                        $result_cards[] = $cards[$i];
                    } else {
                        $a = $cards[$i];
                        $details = $this->card_details($a);

                        $card_1_rank = $details['rank'];

                        if ($card_1_rank < 10) {
                            $low_cards[] = $cards[$i];
                        } else {
                            $high_cards[] = $cards[$i];
                        }
                    }
                    $i++;
                }

              $low_html = '';
                if ($low_cards) {
                    // foreach ($low_cards as $low_card) {
                    //     $low_html .= '<img src="' . WEB_URL . 'storage/front/img/cards/' . $low_card . '.png"> ';
                    // }
                    $j = 0;
                    while ($low_cards[$j]) {
							$carda1  = WEB_URL . "/storage/front/img/cards_new/" . $low_cards[$j] . ".png";
							$low_html .= '<img src=" '. $carda1 .'" class="mr-2"> ';
							$j++;
						}
                }

                $high_html = '';
                // if ($high_cards) {
                //     foreach ($high_cards as $high_card) {
                //         $high_html .= '<img src="' . WEB_URL . 'storage/front/img/cards/' . $high_card . '.png"> ';
                //     }
                // }

                     $j = 0;
                    while ($high_cards[$j]) {
							$carda1  = WEB_URL . "/storage/front/img/cards_new/" . $high_cards[$j] . ".png";
							$high_html .= '<img src=" '. $carda1 .'" class="mr-2"> ';
							$j++;
						}

                $result_arr = explode(",", $result_data['result_status']);
                $cardsArr = json_decode($result_data['cards']);
                $descText = $result_data['desc_remakrs'];
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span> 
                            <span class="float-left round-id">Round-ID: ' . $round_id . '</span> </div>
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
                
                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
	            $cards = json_decode($cards);
                
                $m_body_html .= '
                    <div class="container-fluid">
                            <div class="row m-t-10">
                                    <div class="col-md-12"> 
                                    <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                    <span class="float-left round-id">Round-ID: ' . $round_id . '</span> </div>
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
                 $desc_remakrs = $result_data['desc_remakrs'];
                $desc_remakrs = explode("#", $desc_remakrs);
                $cards = json_decode($result_data['cards']);

                $card_1  = WEB_URL . "/storage/front/img/cards/" . $cards[0] . ".png";
                $card_2  = WEB_URL . "/storage/front/img/cards/" . $cards[1] . ".png";
                $card_3  = WEB_URL . "/storage/front/img/cards/" . $cards[2] . ".png";
                $card_4  = WEB_URL . "/storage/front/img/cards/" . $cards[3] . ".png";
                $card_5  = WEB_URL . "/storage/front/img/cards/" . $cards[4] . ".png";
                $card_6  = WEB_URL . "/storage/front/img/cards/" . $cards[5] . ".png";


                $m_body_html .= '
                <style>
                .winner-icon {
    position: absolute;
    right: 70%;
    bottom: 4%;
}
                </style>
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12"> 
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                            <span class="float-left round-id">Round-ID: ' . $round_id . '</span> </div>
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
                                        ' . (($result_status == '1') ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . '
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
                                        ' . (($result_status == '2') ? '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '') . '
                                    </div>
                                </div>
                            </div>
                        </div>

                <div class="row mt-2 justify-content-center">
			<div class="col-md-6">
				<div class="casino-result-desc"
					style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
					<div class="casino-result-desc-item  flex-column text-center"
						style="display: flex;justify-content: center;width: 100%;gap:8px;">
						<div>
							<span style="color:gray">Winner  </span>
							<span>' . $desc_remakrs[0] . '</span>
						</div>
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
                            <div class="col-md-12"> 
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                            <span class="float-left round-id">Round-ID: ' . $round_id . '</span> </div>
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
                 $desc_remakrs = $result_data['desc_remakrs'];
                $desc_remakrs = explode("#", $desc_remakrs);

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
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                             <span class="float-left round-id">Round-ID: ' . $round_id . '</span> </div>
                        </div>
                        <div class="row player-container m-t-10">
                            <div class="player-number">
                                <div class="player-image-container row">
                                    <div class="col-md-12 text-center"> 
                                        <img src="' . WEB_URL . 'storage/front/img/cards_new/' . $cards[0] . '.png">
                                        <img src="' . WEB_URL . 'storage/front/img/cards_new/' . $cards[1] . '.png">
                                        <img src="' . WEB_URL . 'storage/front/img/cards_new/' . $cards[2] . '.png">
                                    </div>
                                 
                                </div>
                            </div>
                        </div>

<div class="row mt-2 justify-content-center">
			<div class="col-md-6">
				<div class="casino-result-desc"
					style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
					<div class="casino-result-desc-item  flex-column text-center"
						style="display: flex;justify-content: center;width: 100%;gap:8px;">
						<div>
							<span style="color:gray">Pana:  </span>
							<span>' . $desc_remakrs[0] . '</span>
						</div>
						 <div><span style="color:gray">Ocada:  </span>
							<span>' . $desc_remakrs[1] . '</span>
						</div>
						
					</div>
				</div>
			</div>
		</div>

                    </div>';
            } else if ($result_data['game_type'] == 'race20') {
                $cards = json_decode($result_data['cards']);
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $desc_remakrs = explode("#", $desc_remakrs);
                $array_hh = array();
                $array_dd = array();
                $array_cc = array();
                $array_ss = array();

                foreach ($cards as $card_img) {
                    if ($card_img == 1) {
                        continue;
                    }

                    $card_type = substr($card_img, -2);
                    if ($card_type == "SS") {
                        $array_hh[] = WEB_URL . "/storage/front/img/cards_new/" . $card_img . ".png";
                    } else if ($card_type == "HH") {
                        $array_dd[] = WEB_URL . "/storage/front/img/cards_new/" . $card_img . ".png";
                    } else if ($card_type == "CC") {
                        $array_cc[] = WEB_URL . "/storage/front/img/cards_new/" . $card_img . ".png";
                    } else if ($card_type == "DD") {
                        $array_ss[] = WEB_URL . "/storage/front/img/cards_new/" . $card_img . ".png";
                    }
                }

                $m_body_html .= '<div class="race-modal player-image-container">
                                    <div class="row m-t-10">
                                        <div class="col-md-12">
                                       
                                          <span class="float-right round-id"> Match Time: ' . $matchtimee . '</span>
                                           <span class="float-left round-id"> Round-ID: ' . $round_id . '</span> 
                                          </div>
                                         
                                    </div>
                                    <div class="race-result-box">
                                        <div class="mb-1 p-r">
                                            <span class="result-image"><img src="' . WEB_URL . 'storage/front/img/cards/spade_race.png"></span>';

                foreach ($array_hh as $hh_img) {
                    $m_body_html .= '<span class="result-image"><img src="' . $hh_img . '"></span>';
                }

                if ($result_status == 1) {
                    $m_body_html .= '<span class="result-image k-image"><img src="' . WEB_URL . 'storage/front/img/cards/KHH.png"></span>
                                                <div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>';
                }
                $m_body_html .= '</div>
                                        <div class="mb-1 p-r">
                                            <span class="result-image"><img src="' . WEB_URL . 'storage/front/img/cards/heart_race.png"></span>';

                foreach ($array_dd as $dd_img) {
                    $m_body_html .= '<span class="result-image"><img src="' . $dd_img . '"></span>';
                }
                if ($result_status == 2) {
                    $m_body_html .= '<span class="result-image k-image"><img src="' . WEB_URL . 'storage/front/img/cards/KDD.png"></span>
                                                <div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>';
                }

                $m_body_html .= '</div>
                                        <div class="mb-1 p-r">
                                            <span class="result-image"><img src="' . WEB_URL . 'storage/front/img/cards/club_race.png"></span>';

                foreach ($array_cc as $cc_img) {
                    $m_body_html .= '<span class="result-image "><img src="' . $cc_img . '"></span>';
                }

                if ($result_status == 3) {
                    $m_body_html .= '<span class="result-image k-image"><img src="' . WEB_URL . 'storage/front/img/cards/KCC.png"></span>
                                               <div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>';
                }
                $m_body_html .= '</div>
                                        <div class="mb-1 p-r">
                                            <span class="result-image"><img src="' . WEB_URL . 'storage/front/img/cards/diamond_race.png"></span>';

                foreach ($array_ss as $ss_img) {
                    $m_body_html .= '<span class="result-image"><img src="' . $ss_img . '"></span>';
                }
                if ($result_status == 4) {
                    $m_body_html .= '<span class="result-image k-image"><img src="' . WEB_URL . 'storage/front/img/cards/KSS.png"></span>
                                                <div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>';
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

                                    <!-- <div class="row mt-3">
                                         <div class="col-12 text-center">
                                             <div class="winner-board">
                                                 <div class="mb-1"><span class="text-success">Result:</span> <span>' . $desc_remakrs . '</span></div>
                                            </div>
                                         </div>
                                     </div> -->

<div class="row mt-2 justify-content-center">
			<div class="col-md-6">
				<div class="casino-result-desc"
					style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
					<div class="casino-result-desc-item  flex-column text-center"
						style="display: flex;justify-content: center;width: 100%;gap:8px;">
						<div>
							<span style="color:gray">Winner  </span>
							<span>' . $desc_remakrs[0] . '</span>
						</div>
						 <div><span style="color:gray">Points  </span>
							<span>' . $desc_remakrs[1] . '</span>
						</div>
						<div><span style="color:gray">Cards  </span>
							<span>' . $desc_remakrs[2] . '</span>
						</div>
						
					</div>
				</div>
			</div>
		</div>

                                </div>';
            } else if ($result_data['game_type'] == 'queen') {
                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $desc_remakrs = explode("#",$desc_remakrs);
                $cards = json_decode($cards);

             

                $player_8[] = $card_0 = WEB_URL . "/storage/front/img/cards/" . $cards[0] . ".png";
                $player_8[] = $card_4 = WEB_URL . "/storage/front/img/cards/" . $cards[4] . ".png";
                $player_8[] = $card_8 = WEB_URL . "/storage/front/img/cards/" . $cards[8] . ".png";
                $player_8[] = $card_12 = WEB_URL . "/storage/front/img/cards/" . $cards[12] . ".png";

    $player_81[] = $cards[0];
	$player_81[] = $cards[4];
	$player_81[] = $cards[8];
	$player_81[] = $cards[12];

	$player_8_img = "";
	$player_8_rank = 0;
	foreach ($player_8 as $key=>$card_8) {
					if ($card_8 != WEB_URL . "/storage/front/img/cards/1.png") {
						// $card_1 = $cards_result->$player_81[$key];
                         $card_1 = $this->card_details($player_81[$key]);
						$player_8_rank +=  $card_1['rank'];
						$player_8_img .= '<img src="'.$card_8.'" />';
				
					}
				}


                //player 9
                $player_9[] = WEB_URL . "/storage/front/img/cards/" . $cards[1] . ".png";
                $player_9[] = WEB_URL . "/storage/front/img/cards/" . $cards[5] . ".png";
                $player_9[] = WEB_URL . "/storage/front/img/cards/" . $cards[9] . ".png";
                $player_9[] = WEB_URL . "/storage/front/img/cards/" . $cards[13] . ".png";

                $player_91[] = $cards[1];
	$player_91[] = $cards[5];
	$player_91[] = $cards[9];
	$player_91[] = $cards[13];
	$player_9_img = "";
	$player_9_rank = 1;
	foreach ($player_9 as $key=>$card_9) {
					if ($card_9 != WEB_URL . "/storage/front/img/cards/1.png") {
						$card_1 = $this->card_details($player_91[$key]);
						$player_9_rank += $card_1['rank'];
						$player_9_img .= '<img src="'.$card_9.'" />';
				
					}
				}


                //player 10
                $player_10[] = WEB_URL . "/storage/front/img/cards/" . $cards[2] . ".png";
                $player_10[] = WEB_URL . "/storage/front/img/cards/" . $cards[6] . ".png";
                $player_10[] = WEB_URL . "/storage/front/img/cards/" . $cards[10] . ".png";
                $player_10[] = WEB_URL . "/storage/front/img/cards/" . $cards[14] . ".png";

    $player_101[] = $cards[2];
	$player_101[] = $cards[6];
	$player_101[] = $cards[10];
	$player_101[] = $cards[14];

	$player_10_img = "";
	$player_10_rank = 2;
	foreach ($player_10 as $key=>$card_10) {
					if ($card_10 != WEB_URL . "/storage/front/img/cards/1.png") {
						$card_1 = $this->card_details($player_101[$key]);
						$player_10_rank += $card_1['rank'];
						$player_10_img .= '<img src="'.$card_10.'" />';
				
					}
				}

                //player 11
                $player_11[] = WEB_URL . "/storage/front/img/cards/" . $cards[3] . ".png";
                $player_11[] = WEB_URL . "/storage/front/img/cards/" . $cards[7] . ".png";
                $player_11[] = WEB_URL . "/storage/front/img/cards/" . $cards[11] . ".png";
                $player_11[] = WEB_URL . "/storage/front/img/cards/" . $cards[15] . ".png";

	    $player_111[] = $cards[3];
		$player_111[] = $cards[7];
		$player_111[] = $cards[11];
		$player_111[] = $cards[15];

		$player_11_img = "";
		$player_11_rank = 3;
		foreach ($player_11 as $key=>$card_11) {
						if ($card_11 != WEB_URL . "/storage/front/img/cards/1.png") {
							$card_1 = $this->card_details($player_111[$key]);

							$player_11_rank += $card_1['rank'];
							$player_11_img .= '<img src="'.$card_11.'" />';
					
						}
					}

                $m_body_html .= '<div class="player-image-container" id="cards_data">
                                    <div class="row m-t-10">
                                        <div class="col-md-12"> 
                                        <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                        <span class="float-left round-id">Round-ID: ' . $round_id . '</span> </div>
                                    </div>
                                    <style>
                                        .winner-icon {
                                            position: absolute;
                                            right: 0;
                                            bottom: 15%;
                                        }
                                            .abc{
                                                color: white !important;
                                            }
                                    </style>
                                    <div class="row">
                                        <div class="col-12 text-center ">
                                            <h4>Total 0 - <span class="badge bg-success abc"> '. $player_8_rank .'</h4>
                                            <div class="result-image">';
                foreach ($player_8 as $card_8) {
                    if ($card_8 != WEB_URL . "/storage/front/img/cards/1.png") {
                        $m_body_html .= '<img src="' . $card_8 . '" class="mr-2">';
                    }
                }
                $m_body_html .= '</div>';
                if ($result_status == 0) {
                    $m_body_html .= '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>';
                }
                $m_body_html .= '</div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <h4>Total 1 - <span class="badge bg-success abc"> '. $player_9_rank .'</h4>
                                            <div class="result-image">';
                foreach ($player_9 as $card_9) {
                    if ($card_9 != WEB_URL . "/storage/front/img/cards/1.png") {
                        $m_body_html .= '<img src="' . $card_9 . '" class="mr-2">';
                    }
                }
                $m_body_html .= '</div>';
                if ($result_status == 1) {
                    $m_body_html .= '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>';
                }
                $m_body_html .= '</div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <h4>Total 2 - <span class="badge bg-success abc"> '. $player_10_rank .'</h4>
                                            <div class="result-image">';
                foreach ($player_10 as $card_10) {
                    if ($card_10 != WEB_URL . "/storage/front/img/cards/1.png") {
                        $m_body_html .= '<img src="' . $card_10 . '" class="mr-2">';
                    }
                }
                $m_body_html .= '</div>';
                if ($result_status == 2) {
                    $m_body_html .= '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>';
                }
                $m_body_html .= '</div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <h4>Total 3 - <span class="badge bg-success abc"> '. $player_11_rank .'</h4>
                                            <div class="result-image">';
                foreach ($player_11 as $card_11) {
                    if ($card_11 != WEB_URL . "/storage/front/img/cards/1.png") {
                        $m_body_html .= '<img src="' . $card_11 . '" class="mr-2">';
                    }
                }
                $m_body_html .= '</div>';
                if ($result_status == 3) {
                    $m_body_html .= '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>';
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
                    if (
                        $card_image != 1
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
                 $m_body_html .='
                    <style>
                    .winner-icon {
    position: absolute;
    right: 0;
    bottom: 15%;
}
                    </style>
                 ';
                $m_body_html .= '<div class="row m-t-10">
                                        <div class="col-md-12">
                                        <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                         <span class="float-left round-id">Round-ID: ' . $round_id . '</span> </div>
                                    </div>
                                    <div class="row row5 abj-result text-center align-items-center">';
                $m_body_html .= '<div class="col-2"><img src="' . $card_joker_image . '" class="card-right"></div>';

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

                    $m_body_html .= '<div class="owl-item ' . $active_class . '" >
                                        <div class="item"><img src="' . $andar_card . '"></div>
                                    </div>';
                }

                $m_body_html .= '</div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                ';
                if ($result_status == 1) {
                    $m_body_html .= '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>';
                }

                $m_body_html .= '
                                    

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
                    $m_body_html .= '<div class="owl-item ' . $active_class . '" >
                                        <div class="item"><img src="' . $bahar_card . '"></div>
                                    </div>';
                }
                $m_body_html .= '</div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            ';
                if ($result_status == 2) {
                    $m_body_html .= '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>';
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
                                        dots: false,
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
                                        dots: false,
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
                $cards =$result_data['cards'];
                $result_status = $result_data['result_status'];
                $data_cards = $result_data['data'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $cards = json_decode($cards);
                $data_cards = json_decode($data_cards);

                $winner_name = "";
                if ($result_status == 1) {
                    $winner_name = "AUS";
                } else if ($result_status == 2) {
                    $winner_name = "IND";
                } else {
                    $winner_name = "TIE";
                }

                $m_body_html .= '<div class="row m-t-10">
                                    <div class="col-md-12">
                                    <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                     <span class="float-left round-id">Round-ID: ' . $round_id . '</span> </div>
                                </div>
                                <div class="mb-1 text-right mt-3">
                                    Winner:<span class="text-success">' . $winner_name . '</span> | ' . $desc_remakrs . ' </div>
                                <div>';
              $ball = 1;
		foreach ($data_cards->t1->score as $cards_data) {
			$team_name = $cards_data->nation;
			if (!isset($team_name)) {
				$team_name = $cards_data->nat;
			}
			$over = $cards_data->oc;
			/* $ball = $cards_data->ball; */
			$wkt = $cards_data->wkt;
			$run = $cards_data->run;
			if (!array_key_exists($team_name, $socre_result)) {
				$ball = 1;
			} else {
				$ball++;
			}
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

                $m_body_html .= '
                <style>
               .playerd{
                    color: #ef910f;
    }
                </style>
                <div class="table-responsive">
                                    <div class="market-title">First Inning</div>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="text-center"><b><span class="text-success">Australia</span></b></th>
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
                foreach ($socre_result['Australia'] as $data_key => $data_value) {
                    $m_body_html .= '<tr>
                                        <td class="text-center"><b>Over ' . $data_key . '</b></td>';
                    $over_wicket = 0;
                    $over_score = 0;
                    foreach ($data_value as $ball_value) {
                        if (
                            $ball_value == "ww"
                        ) {
                            $over_wicket++;
                            $total_wicket++;
                        } else {
                            $over_score = $over_score + $ball_value;
                            $total_score = $total_score + $ball_value;
                        }

                        $m_body_html .= '<td class="text-center"><span class="'.($ball_value == 'ww' ? 'playerd' : '').'">' . $ball_value . '</span></td>';
                    }

                    $m_body_html .= '<td class="text-center nationcard">' . $over_score . '</td>
                                        <td class="text-center nationcard">' . $total_score . '/' . $total_wicket . '</td>
                                    </tr>';
                }

                $m_body_html .= '</table>
                                    </div>
                                    <div class="table-responsive mt-3">
                                        <div class="market-title">Second Inning</div>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th class="text-center"><b><span class="text-success">India</span></b></th>
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
                foreach ($socre_result['India'] as $data_key => $data_value) {
                    $m_body_html .= '<tr>
                                        <td class="text-center"><b>Over ' . $data_key . '</b></td>';
                    $over_wicket = 0;
                    $over_score = 0;
                    if (count($data_value) != 6) {
							$ccc = 6 - count($data_value);
							for ($ii = 1; $ii <= $ccc; $ii++) {
								$data_value[] = " ";
							}
						}
                    foreach ($data_value as $ball_value) {
                        if (
                            $ball_value == "ww"
                        ) {
                            $over_wicket++;
                            $total_wicket++;
                        } else {
                            $over_score = $over_score + $ball_value;
                            $total_score = $total_score + $ball_value;
                        }
                        $m_body_html .= '<td class="text-center"><span class="'.($ball_value == 'ww' ? 'playerd' : '').'">' . $ball_value . '</span></td>';
                    }
                    $m_body_html .= '<td class="text-center nationcard">' . $over_score . '</td>
                                        <td class="text-center nationcard">' . $total_score . '/' . $total_wicket . '</td>
                                    </tr>';
                }

                $m_body_html .= '</table>
                                </div>
                                </div>';
            } else if ($result_data['game_type'] == 'sicbo2' || $result_data['game_type'] == 'sicbo') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $cards = json_decode($cards);
                $card_path = "cards_new";
                $card_1  = WEB_URL . "/storage/front/img/$card_path/dice" . $cards[0] . ".png";
                $card_2  = WEB_URL . "/storage/front/img/$card_path/dice" . $cards[1] . ".png";
                $card_3  = WEB_URL . "/storage/front/img/$card_path/dice" . $cards[2] . ".png";

                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                            <div class="player-number text-center">
                                <img src="' . $card_1 . '" class="mr-2" />
				                <img src="' . $card_2 . '" class="mr-2" />
				                <img src="' . $card_3 . '" class="mr-2" />
                               
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Desc </span>
                                            ' . $desc_remakrs . '
                                        </div>
                                        <div><span style="color:gray">Win </span>
                                            ' . $result_status . '
                                        </div>
                                        

                                    </div>
                                </div>';

                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'teen6') {

                $result_status = $result_data['result_status'];
                $cards = json_decode($result_data['cards']);
                $desc_remakrs = $result_data['desc_remakrs'];

                $rdesc_array = explode("#", $desc_remakrs);
                $joker = "";
                $player_a = "";
                $player_b = "";

                $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
                $carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
                $carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";
                $player_a = '<img src="' . $carda1 . '" class="mr-2" />
				                <img src="' . $carda2 . '" class="mr-2" />
				                <img src="' . $carda3 . '" class="mr-2" />';
                $cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
                $cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
                $cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png";
                $player_b = '<img src="' . $cardb1 . '" class="mr-2" />
				                <img src="' . $cardb2 . '" class="mr-2" />
				                <img src="' . $cardb3 . '" class="mr-2" />';


                $m_body_html .= '
                     <div class="container-fluid">
                         <div class="row m-t-10">
                             <div class="col-md-12">
                             <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                 <span class="float-left round-id">
                                     Round-ID: ' . $round_id . '
                                 </span>
                             </div>
                         </div>
                         <div class="row player-container m-t-10">
                        
                             <div class="player-number" style="position: relative;">
                                 <h4 class="text-center">Player A</h4>
                                 <div class="player-image-container d-flex flex-column">
                                 <div class="text-center">
                                         ' . $player_a . '
                                     </div>' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                 </div>
                             </div>
                             <div class="player-number" style="position: relative;">
                                 <h4 class="text-center">Player B</h4>
                                 <div class="player-image-container d-flex flex-column">
                                     <div class="text-center">
                                         ' . $player_b . '
                                     </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                 </div>
                             </div>
                         </div>
                         <div class="row board-result m-t-10">
                             <div class="col-md-12 ">
                                 <div class="board-result-inner">
                                 <div class="casino-result-desc"
                                     style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                     <div class="casino-result-desc-item  flex-column text-center"
                                         style="display: flex;justify-content: center;width: 100%;">
                                         <div><span style="color:gray">Winner </span>
                                             ' . $rdesc_array[0] . '
                                         </div>
                                         <div><span style="color:gray">Suit  </span>
                                             ' . $rdesc_array[1] . '
                                         </div>
                                         <div><span style="color:gray">Odd/Even </span>
                                             ' . $rdesc_array[2] . '
                                         </div>
                                         <div><span style="color:gray">Cards </span>
                                             ' . $rdesc_array[3] . '
                                         </div>
                                          <div><span style="color:gray">Under/Over </span>
                                             ' . $rdesc_array[4] . '
                                         </div>

                                     </div>
                                 </div>';



                $m_body_html .= '</div>
                             </div>
                         </div>
                     </div>
                     ';
            } elseif ($result_data['game_type'] == 'trap') {

                $cardsArr = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cardsArr = json_decode($cardsArr);


                $player_a = "";
                $player_a_rank = 0;
                $player_b = "";
                $player_b_rank = 0;

                foreach ($cardsArr as $key => $card) {
                    if ($card != "1") {
                        if ($key % 2 == 0) {
                            $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
                            $card_1 = $this->card_details($card);
				            $player_a_rank += $card_1['rank'];
                        } else {
                            $player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
                            $card_1 = $this->card_details($card);
				            $player_b_rank += $card_1['rank'];
                        }
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A ('.$player_a_rank .')</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B ('.$player_b_rank .')</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $player_b . '
                                    </div>' .
                    (($result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Main </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">Seven </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Picture Card  </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                        

                                    </div>
                                </div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'patti2') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);

                $player_a = "";
                $player_b = "";
                foreach ($cards as $key => $card) {
                    if ($card != "1") {
                        if ($key % 2 == 0) {
                            $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        } else {
                            $player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        }
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $player_b . '
                                    </div>' .
                    (($result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">Mini Baccarat </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Total  </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                          <div><span style="color:gray">Color Plus  </span>
                                            ' . $rdesc_array[3] . '
                                        </div>

                                    </div>
                                </div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'teensin') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);

                $player_a = "";
                $player_b = "";
                foreach ($cards as $key => $card) {
                    if ($card != "1") {
                        if ($key % 2 == 0) {
                            $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        } else {
                            $player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        }
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $player_b . '
                                    </div>' .
                    (($result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">High Card </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Pair  </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                          <div><span style="color:gray">Color Plus  </span>
                                            ' . $rdesc_array[3] . '
                                        </div>
                                        <div><span style="color:gray">Lucky 9  </span>
                                            ' . $rdesc_array[4] . '
                                        </div>

                                    </div>
                                </div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'teenmuf') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);

                $player_a = "";
                $player_b = "";
                foreach ($cards as $key => $card) {
                    if ($card != "1") {
                        if ($key % 2 == 0) {
                            $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        } else {
                            $player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        }
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $player_b . '
                                    </div>' .
                    (($result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">Top 9 </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">M Baccarat  </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                          

                                    </div>
                                </div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'race17') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);

                $player_a = "";

                foreach ($cards as $key => $card) {
                    if ($card != "1") {

                        $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div style="position: relative;">
                              
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == '1') ?
                        '' : '')
                    . '
                                </div>
                            </div>
                            <div class="row m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Race to 17: </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">Big Card: </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Zero Card:  </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                         <div><span style="color:gray">One Zero Card:  </span>
                                            ' . $rdesc_array[3] . '
                                        </div>
                                          

                                    </div>
                                </div>
                                </div>
                       ';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    ';
            } elseif ($result_data['game_type'] == 'teen20b') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);

                $player_a = "";
                $player_b = "";
                foreach ($cards as $key => $card) {
                    if ($card != "1") {
                        if ($key % 2 == 0) {
                            $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        } else {
                            $player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                        }
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $player_b . '
                                    </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;">
					<div><span style="color:gray">Winner </span>
					' . $rdesc_array[0] . '
				</div>
				<div><span style="color:gray">3 Baccarat </span>
					' . $rdesc_array[1] . '
				</div>
				<div><span style="color:gray">Total </span>
					' . $rdesc_array[2] . '
				</div>
				<div><span style="color:gray">Pair Plus </span>
					' . $rdesc_array[3] . '
				</div>
				<div><span style="color:gray">Color </span>
					' . $rdesc_array[4] . '
				</div>

				</div>
			</div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'trio') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);

                $player_a = "";

                foreach ($cards as $key => $card) {
                    if ($card != "1") {

                        $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div style="position: relative;">
                              
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            </div>
                            <div class="row m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Session (21) </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">1 2 4 / J Q K </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Red/Black   </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                         <div><span style="color:gray">Odd/Even  </span>
                                            ' . $rdesc_array[3] . '
                                        </div>
                                          <div><span style="color:gray">Pattern  </span>
                                            ' . $rdesc_array[4] . '
                                        </div>

                                    </div>
                                </div>
                       ';



                $m_body_html .= '
                            </div>
                        </div>
                    ';
            } elseif ($result_data['game_type'] == 'notenum') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);

                $player_a = "";

                foreach ($cards as $key => $card) {
                    if ($card != "1") {

                        $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div style="position: relative;">
                              
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="row m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Odd/Even </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">Red/Black </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">Low/High   </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                         <div><span style="color:gray">Cards  </span>
                                            ' . $rdesc_array[3] . '
                                        </div>
                                          <div><span style="color:gray">Baccarat </span>
                                            ' . $rdesc_array[4] . '
                                        </div>

                                    </div>
                                </div>
                       ';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    ';
            } elseif ($result_data['game_type'] == 'kbc') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);

                $player_a = "";

                foreach ($cards as $key => $card) {
                    if ($card != "1") {

                        $player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png" class="mr-2"> ';
                    }
                }
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div style="position: relative;">
                              
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            </div>
                            <div class="row m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">[Q1] Red-Black: </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                        <div><span style="color:gray">[Q2] Odd-Even: </span>
                                            ' . $rdesc_array[1] . '
                                        </div>
                                        <div><span style="color:gray">[Q3] 7 Up-7 Down:   </span>
                                            ' . $rdesc_array[2] . '
                                        </div>
                                         <div><span style="color:gray">[Q4] 3 Card Judgement:  </span>
                                            ' . $rdesc_array[3] . '
                                        </div>
                                          <div><span style="color:gray">[Q5] Suits:  </span>
                                            ' . $rdesc_array[4] . '
                                        </div>

                                    </div>
                                </div>
                       ';



                $m_body_html .= '
                            </div>
                        </div>
                    ';
            } elseif ($result_data['game_type'] == 'teen120') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);
                $carda1 .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' .  $cards[0] . '.png" class="mr-2"> ';
                $cardb2 .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' .  $cards[1] . '.png" class="mr-2"> ';
                // $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
                // $cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";

                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $carda1 . '
                                    </div>' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Dealer </h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $cardb2 . '
                                    </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;">
					<div><span style="color:gray">Winner </span>
					' . $rdesc_array[0] . '
				</div>
				
				<div><span style="color:gray">Pair </span>
					' . $rdesc_array[1] . '
				</div>
				</div>
			</div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'teen1') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);
                $carda1 .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' .  $cards[0] . '.png" class="mr-2"> ';
                $cardb2 .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' .  $cards[1] . '.png" class="mr-2"> ';
                // $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
                // $cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";

                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id"><b>Match Time:</b> ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    <b>Round-ID:</b> ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $carda1 . '
                                    </div>' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Dealer </h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        ' . $cardb2 . '
                                    </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;">
					<div><span style="color:gray">Winner: </span>
					' . $rdesc_array[0] . '
				</div>
				
				<div><span style="color:gray">7 Up - 7 Down: </span>
					' . $rdesc_array[1] . '
				</div>
				</div>
			</div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } else if ($result_data['game_type'] == 'ab3') {

                $cards = $result_data['cards'];
                $cards_b = $result_data['b_cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $desc_remakrs = explode("#",$desc_remakrs);
                $cards = json_decode($cards);

                $player_a = "";
                $player_b = "";
                $i = 0;
                foreach ($cards as $a_cards) {

                    if ($i % 2 != 0 and $a_cards != "*") {


                        $a_image  = WEB_URL . "/storage/front/img/cards_new/" . $a_cards . ".png";
                        $player_a .= '<div class="owl-item" style="">
                                        <div class="d-flex flex-column align-items-center justify-content-center text-center">
                                            <div>'. ( $i+1 ) .'</div>
										    <div class="item"><img style="width:40px;height:50px;" src="' . $a_image . '" /></div>
										</div>
									</div>';
                    }
                    $i++;
                }

                $i = 0;
                foreach ($cards as $a_cards) {

                    if ($i % 2 == 0  and $a_cards != "*") {


                        $a_image  = WEB_URL . "/storage/front/img/cards_new/" . $a_cards . ".png";
                        $player_b .= '<div class="owl-item" style="">
                                        <div class="d-flex flex-column align-items-center justify-content-center text-center">
                                            <div>'.( $i+1 ).'</div>
										    <div class="item"><img style="width:40px;height:50px;" src="' . $a_image . '" /></div>
										</div>
									</div>';
                    }
                    $i++;
                }

                $m_body_html .= '
                <div class="container-fluid">
                    <div class="row m-t-10">
                        <div class="col-md-12"> 
                        <span class="float-right round-id"><b>Match Time:</b> ' . $matchtimee . '</span>
                        <span class="float-left round-id"><b>Round-ID:</b>' . $round_id . '</span> </div>
                    </div>
                    <div class="m-t-10">
                        <div class="player-number1">
                            <h4 class="text-center">Andar</h4>
                            <div style="width: 95%; margin: 0 auto">
                                <div class="owl-carousel owl-theme last-result-slider owl-loaded owl-drag">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0.25s ease 0s; width: 606px;">
                                            ' . $player_a . '
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
                                            ' . $player_b . '
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

<div class="row m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner: </span>
                                            ' . $desc_remakrs[0] . '
                                        </div>
                                       

                                    </div>
                                </div>

                    </div>
                </div>';
            } elseif ($result_data['game_type'] == 'aaa2') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $desc_remakrs = explode("#", $desc_remakrs);
                $cards = json_decode($cards);

                $player_a = "";

                $card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
                $player_a .= '<img style="width:40px;height:50px;" src="' . $card_1 . '" />';

                $result_text = "";
                if ($result_status == "A") {
                    $result_text = "Amar";
                } else if ($result_status == "B") {
                    $result_text = "Akbar";
                } else if ($result_status == "C") {
                    $result_text = "Anthony";
                }

                $card_1_value = str_replace("SS", "", $cards[0]);
                $card_1_value = str_replace("DD", "", $card_1_value);
                $card_1_value = str_replace("HH", "", $card_1_value);
                $card_1_value = str_replace("CC", "", $card_1_value);




                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div style="position: relative;">
                              
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        ' . $player_a . '
                                    </div>' .
                    (($result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            </div>
                            <div class="row m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner: </span>
                                            ' . $desc_remakrs[0] . '
                                        </div>
                                        <div><span style="color:gray">Odd/Even: </span>
                                            ' . $desc_remakrs[1] . '
                                        </div>
                                        <div><span style="color:gray">Color: </span>
                                            ' . $desc_remakrs[2] . '
                                        </div>
                                        <div><span style="color:gray">Under/Over: </span>
                                            ' . $desc_remakrs[3] . '
                                        </div>
                                       <div><span style="color:gray">Card: </span>
                                            ' . $desc_remakrs[4] . '
                                        </div>

                                    </div>
                                </div>
                       ';



                $m_body_html .= '
                            </div>
                        </div>
                    ';
            } elseif ($result_data['game_type'] == 'race2') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);


                $card1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
                $card2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
                $card3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";

                $cardb4  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";

                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container"><div class="text-center">
                                        <img style="width:40px;height:50px;" src="' . $card1 . '" />
                                    </div>' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
                                <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
                            </div>' : '')
                        . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                        <img style="width:40px;height:50px;" src="' . $card2 . '" />
                                    </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
                            <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
                        </div>' : '')
                        . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player C</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                       <img style="width:40px;height:50px;" src="' . $card3 . '" />
                                    </div>' .
                    (($result_status == 'C' || $result_status == '3') ?
                        '<div class="casino-result-cards-item">
                            <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
                        </div>' : '')
                        . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player D</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                        <img style="width:40px;height:50px;" src="' . $cardb4 . '" />
                                    </div>' .
                    (($result_status == 'D' || $result_status == '4') ?
                        '<div class="casino-result-cards-item">
                                <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
                            </div>' : '')
                        . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
                                    style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
                                    <div class="casino-result-desc-item  flex-column text-center"
                                        style="display: flex;justify-content: center;width: 100%;">
                                        <div><span style="color:gray">Winner </span>
                                            ' . $rdesc_array[0] . '
                                        </div>
                                    </div>
                                </div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'teen3') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);


                $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
                $carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
                $carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

                $cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
                $cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
                $cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png";

                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player A</h4>
                                <div class="player-image-container d-flex flex-column">
                                <div class="text-center">
                                         <img style="width:40px;height:50px;" src="' . $carda1 . '" />
                                         <img style="width:40px;height:50px;" src="' . $carda2 . '" />
                                         <img style="width:40px;height:50px;" src="' . $carda3 . '" />
                                    </div>' .
                    (($result_status == 'A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Player B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                      <img style="width:40px;height:50px;" src="' . $cardb1 . '" />
                                      <img style="width:40px;height:50px;" src="' . $cardb2 . '" />
                                      <img style="width:40px;height:50px;" src="' . $cardb3 . '" />
                                    </div>' .
                    (($result_status == 'B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;">
					<div><span style="color:gray">Winner </span>
					' . $rdesc_array[0] . '
				</div>
			

				</div>
			</div>';




                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'dum10') {

                    $cards = json_decode($result_data['cards']);
                    $cards_b = $result_data['b_cards'];
                    $result_status = $result_data['result_status'];
                    $desc_remakrs = $result_data['desc_remakrs'];
                    $rdesc_array = explode("#", $desc_remakrs);
                    $tot_count = count($cards);
                    $cardb1 = "/storage/front/img/cards/1.png";

                    $m_body_html = '';

                        // Start Match Info
                        $m_body_html .= '<div class="row m-t-10">
                            <div class="col-md-12">
                                <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">Round-ID: ' . $round_id . '</span>
                            </div>
                        </div>';

                        // Start Cards Row
                        $m_body_html .= '<div class="row abj-result mt-2 text-center">
                            <!-- Andar Cards Carousel -->
                            <div class="col-md-10">
                                <div id="result-a-cards" class="ab-ltrslider owl-carousel owl-theme owl-ltr owl-loaded owl-drag">';

                        for ($i = 0; $i < $tot_count - 1; $i++) {
                            if ($cards[$i] != "*") {
                                $a_image = WEB_URL . "/storage/front/img/cards_new/" . $cards[$i] . ".png";
                                $m_body_html .= '<div class="item"><img style="width:40px;height:50px;" src="' . $a_image . '" /></div>';
                            }
                        }

                    $m_body_html .= '</div> <!-- end carousel -->
                        </div> <!-- end col-md-10 -->';

                    // Sticky Last Card
                    $last_card = $cards[$tot_count - 1];
                    if ($last_card != "*") {
                        $last_image = WEB_URL . "/storage/front/img/cards_new/" . $last_card . ".png";
                        $m_body_html .= '<div class="col-md-2">
                            <div class="result-image mt-1">
                                <img src="' . $last_image . '" style="width: 40px; border: 2px solid gold; border-radius: 5px;">
                            </div>
                        </div>';
                    }

                    $m_body_html .= '</div>'; // End row

                    // Card Descriptions
                    $m_body_html .= '<div class="row mt-3 justify-content-center">
                        <div class="col-6 text-center">
                            <div class="casino-result-desc" style="display: flex; flex-wrap: wrap; padding: 6px; box-shadow: 0 0 4px -1px; margin-top: 10px;">
                                <div class="casino-result-desc-item flex-column text-center" style="width: 100%; gap: 8px;">
                                    <div><span style="color:gray">Card </span>' . $rdesc_array[0] . '</div>
                                    <div><span style="color:gray">Current Total </span>' . $rdesc_array[1] . '</div>
                                    <div><span style="color:gray">Total </span>' . $rdesc_array[2] . '</div>
                                    <div><span style="color:gray">Odd/Even </span>' . $rdesc_array[3] . '</div>
                                    <div><span style="color:gray">Red/Black </span>' . $rdesc_array[4] . '</div>
                                </div>
                            </div>
                        </div>
                    </div>';


                $m_body_html .= '<script>
                (function($) {
                    $("#result-a-cards").owlCarousel({
                        rtl: false,
                        loop: false,
                        margin: 2,
                        nav: true,
                        responsive: {
                            0: { items: 10 },
                            600: { items: 10 },
                            1000: { items: 10 }
                        }
                    });
                })(jQuery);
            </script>';
            }elseif ($result_data['game_type'] == 'cmeter1') {
                  $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $rdesc_array = explode("#", $desc_remakrs);
                $cards = json_decode($cards);


               $card1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
		        $card2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";

                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Fighter A</h4>
                                <div class="player-image-container d-flex flex-column">
                                ' . (($result_status == 'Fighter A' || $result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : ''). '
                                <div class="text-center">
                                         <img style="width:40px;height:50px;" src="' . $card1 . '" />
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="player-number" style="position: relative;">
                                <h4 class="text-center">Fighter B</h4>
                                <div class="player-image-container d-flex flex-column">
                                    <div class="text-center">
                                      <img style="width:40px;height:50px;" src="' . $card2 . '" />
                                     
                                    </div>' .
                    (($result_status == 'Fighter B' || $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon">
</div>' : '')
                    . '
                                </div>
                            </div>
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;">
					<div><span style="color:gray">Winner </span>
					' . $rdesc_array[0] . '
				</div>
                <div><span style="color:gray">Points </span>
					' . $rdesc_array[1] . '
				</div>
			

				</div>
			</div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif ($result_data['game_type'] == 'lottcard') {

                $cards = $result_data['cards'];
                $result_status = $result_data['result_status'];
                $desc_remakrs = $result_data['desc_remakrs'];
                $cards = json_decode($cards);
                $rdesc_array = explode("#", $desc_remakrs);

                $card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	            $card_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	            $card_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";

                
                $m_body_html .= '
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-12">
                            <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                <span class="float-left round-id">
                                    Round-ID: ' . $round_id . '
                                </span>
                            </div>
                        </div>
                        <div class="row player-container m-t-10">
                        
                            <div class="player-number" style="position: relative;">
                               
                                <div class="player-image-container d-flex flex-column">
                               
                                        <div class="text-center">
                                            <img src="'. $card_1 .'" class="mr-2" />
                                            <img src="'. $card_2 .'" class="mr-2" />
                                            <img src="'. $card_3 .'" class="mr-2" />
                                        </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="row board-result m-t-10">
                            <div class="col-md-12 ">
                                <div class="board-result-inner">
                                <div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;">
					<div><span style="color:gray">Result </span>
					' . $rdesc_array[0] . '
				</div>
				</div>
			</div>';



                $m_body_html .= '</div>
                            </div>
                        </div>
                    </div>
                    ';
            }else if (strtolower($result_data['game_type']) == 'poker6') {

    $cards = $result_data['cards'];
	$result_status = $result_data['result_status'];
	$desc_remakrs = $result_data['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

    $player_1_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$player_1_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[6] . ".png";

	$player_2_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$player_2_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[7] . ".png";

	$player_3_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$player_3_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[8] . ".png";

	$player_4_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$player_4_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[9] . ".png";

	$player_5_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";
	$player_5_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[10] . ".png";

	$player_6_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png";
	$player_6_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[11] . ".png";



	$card_dealer_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[12] . ".png";
	$card_dealer_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[13] . ".png";
	$card_dealer_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[14] . ".png";
	$card_dealer_4  = WEB_URL . "/storage/front/img/cards_new/" . $cards[15] . ".png";
	$card_dealer_5  = WEB_URL . "/storage/front/img/cards_new/" . $cards[16] . ".png";

                $m_body_html .= '
                <style>
                .winner-icon {
    position: absolute;
    /* right: 0; */
    bottom: -30%;
    left: 19%;
}
    .d-inline-block{
                display: flex !important;
    flex-direction: column;
    justify-content: center;
    align-items: center;
            }
                </style>
                        <div class="container-fluid">
                            <div class="row m-t-10">
                            
                                <div class="col-md-12">
                                <span class="float-right round-id">Match Time: ' . $matchtimee . '</span>
                                 <span class="float-left round-id">Round-ID: ' . $round_id . '</span> </div>
                            </div>
                          
                            <div class="row m-t-10 text-center ">
                                  <div class="col-md-8 player-number">
        <div class="row">
            <!-- Player 1 -->
            <div class="col-md-2 d-inline-block v-t">
                <span class="text-center"><b>1</b></span>
                <img class="m-t-10" src="'.$player_1_1.'" style="width:80%">
                <img class="m-t-10" src="'.$player_1_2.'" style="width:80%">
                
                 ' . (($result_status == '1') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon" style="width:45%">
</div>' : ''). '
            </div>

            <!-- Player 2 -->
            <div class="col-md-2 d-inline-block v-t">
                <span class="text-center"><b>2</b></span>
                <img class="m-t-10" src="'.$player_2_1.'" style="width:80%">
                <img class="m-t-10" src="'.$player_2_2.'" style="width:80%">
                ' . (( $result_status == '2') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon" style="width:45%">
</div>' : ''). '
            </div>

            <!-- Player 3 -->
            <div class="col-md-2 d-inline-block v-t">
                <span class="text-center"><b>3</b></span>
                <img class="m-t-10" src="'.$player_3_1.'" style="width:80%">
                <img class="m-t-10" src="'.$player_3_2.'" style="width:80%">
                ' . (($result_status == '3') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon" style="width:45%">
</div>' : ''). '
            </div>

            <!-- Player 4 -->
            <div class="col-md-2 d-inline-block v-t">
                <span class="text-center"><b>4</b></span>
                <img class="m-t-10" src="'.$player_4_1.'" style="width:80%">
                <img class="m-t-10" src="'.$player_4_2.'" style="width:80%">
                 ' . (( $result_status == '4') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon" style="width:45%">
</div>' : ''). '
            </div>

            <!-- Player 5 -->
            <div class="col-md-2 d-inline-block v-t">
                <span class="text-center"><b>5</b></span>
                <img class="m-t-10" src="'.$player_5_1.'" style="width:80%">
                <img class="m-t-10" src="'.$player_5_2.'" style="width:80%">
                ' . (( $result_status == '5') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon" style="width:45%">
</div>' : ''). '
            </div>

            <!-- Player 6 -->
            <div class="col-md-2 d-inline-block v-t">
                <span class="text-center"><b>6</b></span>
                <img class="m-t-10" src="'.$player_6_1.'" style="width:80%">
                <img class="m-t-10" src="'.$player_6_2.'" style="width:80%">
                 ' . (($result_status == 'Fighter A' || $result_status == '6') ?
                        '<div class="casino-result-cards-item">
    <img src="' . WEB_URL . '/storage/front/img/winner.png" class="winner-icon" style="width:45%">
</div>' : ''). '
            </div>
        </div>
    </div>

    <!-- Right Section: Dealer Cards -->
    <div class="col-md-4">
        <span class="text-center d-block"><b>Board Card</b></span>
        <img class="m-t-10" src="'.$card_dealer_1.'" style="width:18%">
        <img class="m-t-10" src="'.$card_dealer_2.'" style="width:18%">
        <img class="m-t-10" src="'.$card_dealer_3.'" style="width:18%">
        <img class="m-t-10" src="'.$card_dealer_4.'" style="width:18%">
        <img class="m-t-10" src="'.$card_dealer_5.'" style="width:18%">
    </div>
                            </div>
 </div>
<div class="row mt-2 justify-content-center" style="padding: 46px;">
			<div class="col-md-6">
				<div class="casino-result-desc"
					style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
					<div class="casino-result-desc-item  flex-column text-center"
						style="display: flex;justify-content: center;width: 100%;gap:8px;">
						<div>
							<span style="color:gray">Winner  </span>
							<span>' . $rdesc_array[0] . '</span>
						</div>
						 <div><span style="color:gray">Color  </span>
							<span>' . $rdesc_array[1] . '</span>
						</div>
					</div>
				</div>
			</div>
		</div>

                       ';
            }
        }

        $this->load->library('users');

        if (!$this->users->is_login()) {
            return;
        }

        $userdata = $this->users->data();
        $user_id = $userdata['Id'];
        $event_id = $this->input->post('id', TRUE);
        if(empty($event_id)){
            $event_id=$round_id;
        }
    
        $event_type = $this->input->post('event_type', TRUE);
        if(empty($event_type)){
            $event_type=$game_type;
            if(unserialize(GAME_LIST)[$event_type]){
                $event_type=unserialize(GAME_LIST)[$event_type];
            }
        }
        if(!empty($event_type)){
            $game_list_new=json_decode(GAME_LIST2, true);
            $keychk = array_search($event_type, $game_list_new);
            if ($keychk !== false) {
                $event_type=$keychk;
            }
        }
        $game_type1 = $this->input->post('type', TRUE);
        
        
        $market_type = $this->input->post('market_type', TRUE);
        $market_id = $this->input->post('market_id', TRUE);
        $client_name = $this->input->post('client_name', TRUE);

        $this->db->select('event_id as id, bet_time as edt, market_name as nation, bet_type as side, bet_runs as runs, bet_odds as rate, bet_stack as amount, bet_result as wl, bet_time as date, bet_ip_address as ip_address,bet_user_agent as user_agent');
        $this->db->select('(SELECT Email_ID FROM user_master WHERE user_master.Id = b.user_id) as cl_name');
        $this->db->select('(SELECT Email_ID FROM user_master WHERE user_master.Id = u.parentDL) as dl_name');
        $this->db->select('(SELECT Email_ID FROM user_master WHERE user_master.Id = u.parentMDL) as mdl_name');
        $this->db->select('(SELECT Email_ID FROM user_master WHERE user_master.Id = u.parentSuperMDL) as smdl_name');
        $this->db->select('(SELECT Email_ID FROM user_master WHERE user_master.Id = u.parentKingAdmin) as kingadmin_name');
 
        $this->db->where('event_id', $event_id);
        $this->db->where('event_type', $event_type); 
        /*  if($market_type == 'MATCH_ODDS' || $market_type == 'BOOKMAKER_ODDS' || $market_type == 'BOOKMAKERSMALL_ODDS')
            $this->db->where('market_type', $market_type);
        else if($game_type == 0)
            $this->db->where('market_id', $market_id); */
        if ($market_type == 'MATCH_ODDS' || $market_type == 'BOOKMAKER_ODDS' || $market_type == 'BOOKMAKERSMALL_ODDS') {
            $this->db->where('market_type', $market_type);
        } else if ($game_type1 == 0) {
            $this->db->where('market_id', $market_id);
            $this->db->where('market_type', $market_type);
        }
        
        $bet_type = $this->input->post('bet_type', TRUE);
       // echo "bet_type".$bet_type;
        if (!empty($bet_type)) {
            if($bet_type == "Back"){
                $this->db->where("b.bet_type = 'Back'");
            }
            else if($bet_type == "Lay"){
                $this->db->where("b.bet_type = 'Lay'");
            }
            else if($bet_type == "2"){
                $this->db->where("b.bet_status = 2");
            }
            
            
        }
        
        $sql_where = '';
        if ($client_name && $client_name != 1) {
            $this->db->where("(u.Id = $client_name OR u.parentDL = $client_name OR u.parentMDL = $client_name OR u.parentSuperMDL = $client_name OR u.parentKingAdmin = $client_name)");
        } else {
            if ($userdata['power'] < 5 or $userdata['power'] == 7) {
                $this->db->where("(u.parentDL = $user_id OR u.parentMDL = $user_id OR u.parentSuperMDL = $user_id OR u.parentKingAdmin = $user_id)");
            }
        }

        $this->db->join('user_master u', 'u.Id = b.user_id', 'LEFT');

        if ($game_type1 == 0){
             $query = $this->db->get('bet_details as b');
        }
        else{
             $query = $this->db->get('bet_teen_details as b');
        }
       // echo $this->db->last_query();
        $bets_data = $query->result_array();
        $row_count = $query->num_rows();
        $ghh="";
        return $this->print_json(array('result' => $m_body_html, 'result_bet' => $bets_data, 'ghh' => $ghh, 'no_rows' => $row_count));

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
        // $card1 = $cards_result->$card11;
        //$rank = $card1['rank'];
       // return $rank; 
        if (isset($cards_result->$card11)) {
        $card = $cards_result->$card11;
        return isset($card['rank']) ? $card['rank'] : 0;
    }
    return 0;
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
