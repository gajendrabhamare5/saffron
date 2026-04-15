<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

<style type="text/css">
    .new-casino.race .card-content {
        background-color: #eee;
        padding: 10px;
    }

    .new-casino .casino-odds-box-wrapper {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .new-casino .casino-odds-box-container {
        width: calc(25% - 8px);
        margin-right: 8px;
        margin-bottom: 15px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .new-casino .casino-odds-box-bhav {
        text-align: center;
        position: relative;
        font-size: 14px;
        color: #333;
        width: 100%;
    }

    .new-casino .range-icon {
        margin-left: 5px;
        display: inline-block;
        vertical-align: middle;
    }

    .new-casino .icon-range {
        position: absolute;
        top: 100%;
        background-color: #333;
        padding: 4px;
        max-width: 100%;
        word-wrap: break-word;
        font-size: 12px;
        z-index: 10;
        right: 0;
        transition: 0.1s;
        text-transform: capitalize;
        color: #fff;
    }

    .new-casino .casino-odds-box {
        padding: 4px;
        text-align: center;
        margin-top: 5px;
        cursor: pointer;
        height: 48px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .suspended {
        position: relative;
    }

    .new-casino.race .suspended:after {
        width: 100%;
    }

    .casino-grid .suspended:after {
        font-family: "Font Awesome 5 Free";
        content: "\f023";
        font-weight: 900;
        font-size: 16px;
        color: #fff;
    }

    .suspended:after {
        position: absolute;
        content: attr(data-title);
        top: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.5);
        color: #ff0000;
        width: 510px;
        height: 100%;
        font-size: 20px;
        /* text-transform: uppercase; */
        cursor: not-allowed;
        align-items: center;
        display: flex;
        display: -ms-flex;
        display: -webkit-flex;
        justify-content: center;
    }

    .new-casino .casino-odds-box>div {
        width: 49%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100%;
    }

    .new-casino .back-border {
        border: 2px solid #72bbef;
    }

    .new-casino .casino-odds-box .casino-odds-box-odd {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 3px;
        text-transform: uppercase;
    }

    .new-casino .casino-odds-box span {
        display: block;
        font-size: 12px;
        width: 100%;
    }

    .new-casino .lay-border {
        border: 2px solid #f994ba;
    }

    .casino-odds-book {
        text-align: center;
        font-size: 14px;
        color: #333;
        width: 100%;
        font-weight: bold;
        margin-top: 5px;
    }

    .new-casino.race .casino-odds-box-container-extra {
        width: 100%;
    }

    .new-casino .casino-yn {
        display: flex;
        width: 100%;
    }

    .new-casino .casino-yn>div {
        width: 33.33% !important;
        margin-right: 1%;
    }

    .new-casino .casino-yn .casino-odds-box-bhav {
        flex-direction: row;
    }

    .new-casino .casino-yn+.casino-odds-book {
        width: 66.66%;
        margin-left: auto;
    }

    .new-casino .casino-video-title {
        position: absolute;
        left: 5px;
        top: 5px;
        background-color: rgba(0, 0, 0, 0.8);
        padding: 10px;
        z-index: 10;
        text-align: center;
        min-width: 220px;
        display: flex;
        display: -webkit-flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .new-casino .casino-video-title .casino-name {
        font-weight: bold;
        text-transform: uppercase;
        font-size: 20px;
        color: #FDCF13;
        line-height: 22px;
        padding: 0;
        background: transparent;
        position: unset;
        width: auto;
    }

    .new-casino .casino-video-rid {
        font-weight: bold;
        color: #ddd;
        margin-top: 3px;
    }

    .new-casino.race .total-points {
        display: flex;
        margin-top: 10px;
    }

    .new-casino.race .total-points>div {
        padding: 5px;
        margin-right: 5px;
        border: 1px solid #FDCF13;
        color: #fff;
    }

    .new-casino.race .video-overlay {
        width: 297px;
        top: 50%;
        transform: translateY(-30%);
    }

    .new-casino.race .video-overlay>div {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .new-casino.race .video-overlay span {
        min-height: 44px;
    }

    .new-casino.race .video-overlay img {
        margin-left: 3px;
        margin-right: 3px;
    }

    .last-result.playersuit {
        background-color: #d5d5d5;
        border: 1px solid #626262;
        line-height: 27px;
    }

    .last-result {
        cursor: pointer;
        margin-left: 2px;
    }

    .last-result.playersuit img {
        height: 26px;
    }

    .race-modal .race-result-box {
        width: 386px;
        position: relative;
        z-index: 10;
    }

    .race-modal img {
        width: 50px;
        margin-left: 2px;
        margin-right: 2px;
    }

    .p-r {
        position: relative;
    }

    .race-modal .result-image.k-image {
        position: absolute;
        right: -60px;
    }

    .winner-icon {
        position: absolute;
        right: 0;
        bottom: 15%;
    }

    .winner-icon i {
        font-size: 26px;
        box-shadow: 0 0 0 var(--secondary-bg);
        -webkit-animation: winnerbox 2s infinite;
        animation: winnerbox 1.5s infinite;
        border-radius: 50%;
        color: #169733;
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
</style>
<div class="col-md-12 main-container">
    <div class="listing-grid cardj3 casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content new-casino race">
                <div class="coupon-card">
                    <div style="position: relative;">
                        <iframe width="100%" height="400" src="<?php echo IFRAME_URL . "" . RACE20_CODE; ?>" style="border:0px"></iframe>
                        <div class="casino-video-title">
                            <span class="casino-name">Race 20-20</span>
                            <div class="casino-video-rid">Round ID: <span id="round-id" class="round_no"></span></div>
                            <div class="total-points">
                                <div>
                                    <div>Total Card:</div>
                                    <div id="total_card">0</div>
                                </div>
                                <div>
                                    <div>Total Point:</div>
                                    <div id="total_point">0</div>
                                </div>
                            </div>
                        </div>
                        <div class="video-overlay">
                            <div class="mb-1">
                                <span>
                                    <img src="https://dzm0kbaskt4pv.cloudfront.net/v2/static/front/img/cards/spade.png">
                                </span>
                                <span><img src="storage/front/img/cards/1.png" id="card_spade_1" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_spade_2" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_spade_3" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_spade_4" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_spade_5" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_spade_6" class="cl_cards" style="display:none;"></span>
                            </div>
                            <div class="mb-1">
                                <span>
                                    <img src="https://dzm0kbaskt4pv.cloudfront.net/v2/static/front/img/cards/heart.png">
                                </span>
                                <span><img src="storage/front/img/cards/1.png" id="card_heart_1" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_heart_2" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_heart_3" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_heart_4" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_heart_5" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_heart_6" class="cl_cards" style="display:none;"></span>
                            </div>
                            <div class="mb-1">
                                <span>
                                    <img src="https://dzm0kbaskt4pv.cloudfront.net/v2/static/front/img/cards/club.png">
                                </span>
                                <span><img src="storage/front/img/cards/1.png" id="card_club_1" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_club_2" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_club_3" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_club_4" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_club_5" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_club_6" class="cl_cards" style="display:none;"></span>
                            </div>
                            <div class="mb-1">
                                <span>
                                    <img src="https://dzm0kbaskt4pv.cloudfront.net/v2/static/front/img/cards/diamond.png">
                                </span>
                                <span><img src="storage/front/img/cards/1.png" id="card_diamond_1" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_diamond_2" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_diamond_3" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_diamond_4" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_diamond_5" class="cl_cards" style="display:none;"></span>
                                <span><img src="storage/front/img/cards/1.png" id="card_diamond_6" class="cl_cards" style="display:none;"></span>
                            </div>
                        </div>
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                        <div id="result-desc" style="display: none;"></div>
                    </div>

                    <div class="card-content m-t-10">
                        <div class="casino-odds-box-wrapper">
                            <div class="casino-odds-box-container casino-odds-box-container-double">
                                <div class="casino-odds-box-bhav">
                                    <img src="https://dzm0kbaskt4pv.cloudfront.net/v2/static/front/img/cards/KHH.png" style="width: 35px;">
                                    <div class="range-icon">
                                        <i data-toggle="collapse" data-target="#demo0" class="fas fa-info-circle float-right"></i>
                                        <div id="demo0" class="collapse icon-range">
                                            Range:<span>100</span>-<span>100K</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="casino-odds-box suspended market_1_row">
                                    <div class="back-border market_1_b_btn back-1"><span class="casino-odds-box-odd market_1_b_value">0.00</span> <span>0</span></div>
                                    <div class="lay-border market_1_l_btn lay-1"><span class="casino-odds-box-odd market_1_l_value">0.00</span> <span>0</span></div>
                                </div>
                                <div class="casino-odds-book">
                                    <div class="ubook m-t-5 market_1_b_exposure market_exposure"><b>0</b></div>
                                </div>
                            </div>
                            <div class="casino-odds-box-container casino-odds-box-container-double">
                                <div class="casino-odds-box-bhav"><img src="https://dzm0kbaskt4pv.cloudfront.net/v2/static/front/img/cards/KDD.png" style="width: 35px;">
                                    <div class="range-icon"><i data-toggle="collapse" data-target="#demo1" class="fas fa-info-circle float-right"></i>
                                        <div id="demo1" class="collapse icon-range">
                                            Range:<span>100</span>-<span>100K</span></div>
                                    </div>
                                </div>
                                <div class="casino-odds-box suspended market_2_row">
                                    <div class="back-border market_2_b_btn back-1"><span class="casino-odds-box-odd market_2_b_value">0.00</span> <span>0</span></div>
                                    <div class="lay-border market_2_l_btn lay-1"><span class="casino-odds-box-odd market_2_l_value">0.00</span> <span>0</span></div>
                                </div>
                                <div class="casino-odds-book">
                                    <div class="ubook m-t-5 market_2_b_exposure market_exposure"><b>0</b></div>
                                </div>
                            </div>
                            <div class="casino-odds-box-container casino-odds-box-container-double">
                                <div class="casino-odds-box-bhav"><img src="https://dzm0kbaskt4pv.cloudfront.net/v2/static/front/img/cards/KCC.png" style="width: 35px;">
                                    <div class="range-icon"><i data-toggle="collapse" data-target="#demo2" class="fas fa-info-circle float-right"></i>
                                        <div id="demo2" class="collapse icon-range">
                                            Range:<span>100</span>-<span>100K</span></div>
                                    </div>
                                </div>
                                <div class="casino-odds-box suspended market_3_row">
                                    <div class="back-border market_3_b_btn back-1"><span class="casino-odds-box-odd market_3_b_value">0.00</span> <span>0</span></div>
                                    <div class="lay-border market_3_l_btn lay-1"><span class="casino-odds-box-odd market_3_l_value">0.00</span> <span>0</span></div>
                                </div>
                                <div class="casino-odds-book">
                                    <div class="ubook m-t-5 market_3_b_exposure market_exposure"><b>0</b></div>
                                </div>
                            </div>
                            <div class="casino-odds-box-container casino-odds-box-container-double">
                                <div class="casino-odds-box-bhav"><img src="https://dzm0kbaskt4pv.cloudfront.net/v2/static/front/img/cards/KSS.png" style="width: 35px;">
                                    <div class="range-icon"><i data-toggle="collapse" data-target="#demo3" class="fas fa-info-circle float-right"></i>
                                        <div id="demo3" class="collapse icon-range">
                                            Range:<span>100</span>-<span>100K</span></div>
                                    </div>
                                </div>
                                <div class="casino-odds-box suspended market_4_row">
                                    <div class="back-border market_4_b_btn back-1"><span class="casino-odds-box-odd market_4_b_value">0.00</span> <span>0</span></div>
                                    <div class="lay-border market_4_l_btn lay-1"><span class="casino-odds-box-odd market_4_l_value">0.00</span> <span>0</span></div>
                                </div>
                                <div class="casino-odds-book">
                                    <div class="ubook m-t-5 market_4_b_exposure market_exposure"><b>0</b></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row5 mt-2">
                        <div class="col-4">
                            <div class="card-content">
                                <div class="casino-odds-box-container casino-odds-box-container-extra">
                                    <div class="casino-yn">
                                        <div></div>
                                        <div class="casino-odds-box-bhav"><b>No</b></div>
                                        <div class="casino-odds-box-bhav"><b>Yes</b></div>
                                    </div>
                                    <div class="casino-odds-box casino-yn">
                                        <div class="casino-odds-box-bhav"><b>Total Point</b>
                                            <div class="range-icon"><i data-toggle="collapse" data-target="#demo4" class="fas fa-info-circle float-right"></i>
                                                <div id="demo4" class="collapse icon-range">
                                                    Range:<span>100</span>-<span>100K</span></div>
                                            </div>
                                        </div>
                                        <div class="lay-border suspended market_5_row market_5_l_btn lay-1"><span class="casino-odds-box-odd market_5_l_value">0.00</span> <span>0</span></div>
                                        <div class="back-border suspended market_5_row market_5_b_btn back-1"><span class="casino-odds-box-odd market_5_b_value">0.00</span> <span>0</span></div>
                                    </div>
                                    <div class="casino-odds-book">
                                        <div class="casino-odds-book market_5_b_exposure market_exposure" style="color: black;">0</div>
                                    </div>
                                </div>
                                <div class="casino-odds-box-container casino-odds-box-container-extra">
                                    <div class="casino-yn">
                                        <div></div>
                                        <div class="casino-odds-box-bhav"><b>No</b></div>
                                        <div class="casino-odds-box-bhav"><b>Yes</b></div>
                                    </div>
                                    <div class="casino-odds-box casino-yn">
                                        <div class="casino-odds-box-bhav"><b>Total Card</b>
                                            <div class="range-icon"><i data-toggle="collapse" data-target="#demo5" class="fas fa-info-circle float-right"></i>
                                                <div id="demo5" class="collapse icon-range">
                                                    Range:<span>100</span>-<span>100K</span></div>
                                            </div>
                                        </div>
                                        <div class="lay-border suspended market_6_row market_6_l_btn lay-1"><span class="casino-odds-box-odd market_6_b_value">0.00</span> <span>0</span></div>
                                        <div class="back-border suspended market_6_row market_6_b_btn back-1"><span class="casino-odds-box-odd market_6_l_value">0.00</span> <span>0</span></div>
                                    </div>
                                    <div class="casino-odds-book">
                                        <div class="casino-odds-book market_6_b_exposure market_exposure" style="color: black;">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card-content">
                                <div class="row row5">
                                    <div class="col-4">
                                        <div class="casino-odds-box-container casino-odds-box-container-extra">
                                            <div class="casino-odds-box-bhav"><b>Win with 5</b>
                                                <div class="range-icon">
                                                    <i data-toggle="collapse" data-target="#demo6" class="fas fa-info-circle float-right"></i>
                                                    <div id="demo6" class="collapse icon-range">
                                                        Range:<span>10</span>-<span>25K</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back-border suspended market_7_row market_7_b_btn back-1"><span class="casino-odds-box-odd market_7_b_value">0.00</span></div>
                                            <div class="casino-odds-book market_7_b_exposure market_exposure" style="color: black;">0</div>
                                        </div>
                                        <div class="casino-odds-box-container casino-odds-box-container-extra">
                                            <div class="casino-odds-box-bhav"><b>Win with 15</b>
                                                <div class="range-icon"><i data-toggle="collapse" data-target="#demo9" class="fas fa-info-circle float-right"></i>
                                                    <div id="demo9" class="collapse icon-range">
                                                        Range:<span>10</span>-<span>25K</span></div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back-border suspended market_10_row market_10_b_btn back-1"><span class="casino-odds-box-odd market_10_b_value">0.00</span></div>
                                            <div class="casino-odds-book market_10_b_exposure market_exposure" style="color: black;">0</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="casino-odds-box-container casino-odds-box-container-extra">
                                            <div class="casino-odds-box-bhav"><b>Win with 6</b>
                                                <div class="range-icon"><i data-toggle="collapse" data-target="#demo7" class="fas fa-info-circle float-right"></i>
                                                    <div id="demo7" class="collapse icon-range">
                                                        Range:<span>10</span>-<span>25K</span></div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back-border suspended market_8_row market_8_b_btn back-1"><span class="casino-odds-box-odd market_8_b_value">0.00</span></div>
                                            <div class="casino-odds-book market_8_b_exposure market_exposure" style="color: black;">0</div>
                                        </div>
                                        <div class="casino-odds-box-container casino-odds-box-container-extra">
                                            <div class="casino-odds-box-bhav"><b>Win with 16</b>
                                                <div class="range-icon"><i data-toggle="collapse" data-target="#demo10" class="fas fa-info-circle float-right"></i>
                                                    <div id="demo10" class="collapse icon-range">
                                                        Range:<span>10</span>-<span>25K</span></div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back-border suspended market_11_row market_11_b_btn back-1"><span class="casino-odds-box-odd market_11_b_value">0.00</span></div>
                                            <div class="casino-odds-book market_11_b_exposure market_exposure" style="color: black;">0</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="casino-odds-box-container casino-odds-box-container-extra">
                                            <div class="casino-odds-box-bhav"><b>Win with 7</b>
                                                <div class="range-icon"><i data-toggle="collapse" data-target="#demo8" class="fas fa-info-circle float-right"></i>
                                                    <div id="demo8" class="collapse icon-range">
                                                        Range:<span>10</span>-<span>25K</span></div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back-border suspended market_9_row market_9_b_btn back-1"><span class="casino-odds-box-odd market_9_b_value">0.00</span></div>
                                            <div class="casino-odds-book market_9_b_exposure market_exposure" style="color: black;">0</div>
                                        </div>
                                        <div class="casino-odds-box-container casino-odds-box-container-extra">
                                            <div class="casino-odds-box-bhav"><b>Win with 17</b>
                                                <div class="range-icon"><i data-toggle="collapse" data-target="#demo11" class="fas fa-info-circle float-right"></i>
                                                    <div id="demo11" class="collapse icon-range">
                                                        Range:<span>10</span>-<span>25K</span></div>
                                                </div>
                                            </div>
                                            <div class="casino-odds-box back-border suspended market_12_row market_12_b_btn back-1"><span class="casino-odds-box-odd market_12_b_value">0.00</span></div>
                                            <div class="casino-odds-book market_12_b_exposure market_exposure" style="color: black;">0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <marquee scrollamount="3" id="mar" class="casino-remark mt-2">Hi.</marquee>

                    <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=race20" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
                    </div>
                    <div class="m-b-10">
                        <p class="ball-by-ball row m-t-10"></p>
                        <p id="last-result" class="text-right"></p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 sidebar-right" id="sidebar-right">
                <div class="card m-b-10 scorecard" style="margin-bottom: 0px;">
                    <div class="card m-b-10 my-bet">
                        <div class="card-header">
                            <ul class="nav nav-tabs d-inline-block" role="tablist ">
                                <li class="nav-item d-inline-block">
                                    <a class="nav-link active " data-toggle="tab" href="#matched-bet">Matched <span id="matchedCount">(0)</span></a>
                                </li>
                            </ul>
                            <a href="javascript:void(0)" class="btn btn-back float-right" id="view_more_bets">View More</a>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="matched-bet" class="tab-pane active">
                                    <div class="table-responsive">
                                        <table id="matched" class="table coupon-table table-bordered table-stripted">
                                            <thead>
                                                <tr>
                                                    <th>UserName</th>
                                                    <th style="min-width: 140px">Nation</th>
                                                    <th style="min-width: 50px">Rate</th>
                                                    <th>Amount</th>
                                                    <th>PlaceDate</th>
                                                    <th>MatchDate</th>
                                                    <th style="min-width:70px">Gametype</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table_body">
                                                <tr class="">
                                                    <td colspan="100%" align="center">Loading</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="userwise">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Active User</h4>
                        <button type="button" class="close" data-dismiss="modal">�</button>
                    </div>
                    <div class="modal-body">
                        <div class="usertypewiseactive-container"></div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view-more">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">View More Bet</h4>
                        <button type="button" class="close" data-dismiss="modal">�</button>
                    </div>
                    <div class="modal-body">
                        <div class="viewMoreMatchedDataModal"></div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalrulesteenpatti" class="modal fade teenpatti">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Rules</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <img src="../../../storage/front/img/rules/race20.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Race 20-20</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="cards_data1">
                        <div>
                            <h6 class="text-right round-id">
                                <b>Round Id:</b>
                            </h6>
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-view_more">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View More Bet</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="viewMoreMatchedDataModal">
                    <ul class="nav nav-tabs d-inline-block" role="tablist ">
                        <li class="nav-item d-inline-block">
                            <a class="nav-link  active " data-toggle="tab" href="#matched-bet2" id="matchedDataLink">Matched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#unmatched-bet2" id="unMatchedDataLink">Unmatched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#deleted-bet2" id="deletedMatchedDataLink">Deleted Bets</a>
                        </li>
                    </ul>
                    <div class="tab-content m-t-20">
                        <div id="matched-bet2" class="tab-pane active">
                            <form method="POST" id="form-view_more_bets">
                                <div class="row form-inline">
                                    <div class="col-md-5">
                                        <div class="form-group m-t-20">
                                            <label for="list-ac" class="d-inline-block">Client Name</label>
                                            <select class="form-control" name="search-client_name" id="search-client_name" id="" style="width: 160px;"></select>
                                        </div>
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">IP Address</label>
                                            <input type="text" name="search-ipaddress" id="search-ipaddress" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">Amount</label>
                                            <input type="text" name="search-amount_min" id="search-amount_min" class="form-control" placeholder="Min">
                                            <input type="text" name="search-amount_max" id="search-amount_max" class="form-control m-l-10" placeholder="Max">
                                        </div>
                                        <div class="form-group m-t-20">
                                            <label class="d-inline-block">Type</label>
                                            <select name="search-bettype" class="form-control d-inline-block" id="search-bettype">
                                                <option value="">All</option>
                                                <option value="back">Back</option>
                                                <option value="lay">Lay</option>
                                            </select>
                                            <button class="btn btn-back m-l-10" id="btn-search" type="submit">Search</button>
                                            <button type="reset" class="btn btn-back m-l-10" id="btn-view_all_matched">View All</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Nation</th>
                                            <th>Bet Type</th>
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <th>Match Date</th>
                                            <th>IP</th>
                                            <th>Browser Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-view_more_matched">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="unmatched-bet2" class="tab-pane">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Nation</th>
                                            <th>Bet Type</th>
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <th>Match Date</th>
                                            <th>IP</th>
                                            <th>Browser Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr>
                                            <td colspan="100%" align="center">No Record Found!..</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="deleted-bet2" class="tab-pane">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Nation</th>
                                            <th>Bet Type</th>
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <th>Match Date</th>
                                            <th>IP</th>
                                            <th>Browser Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr>
                                            <td colspan="100%" align="center">No Record Found!..</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo WEB_URL; ?>/js/socket.io.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/js/flipclock.js" type="text/javascript"></script>


<script type="text/javascript">
    var site_url = '<?php echo WEB_URL; ?>';
    var websocketurl = '<?php echo GAME_IP; ?>';
    var clock = new FlipClock($(".clock"), {
        clockFace: "Counter"
    });
    var oldGameId = 0;
    var resultGameLast = 0;
    var data6;
    var markettype = "RACE_20";
    var last_result_id = '0';

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function() {
            socket.emit('Room', 'race20');
        });

        socket.on('game', function(data) {
            if (data && data['t1'] && data['t1'][0]) {
                if (oldGameId != data.t1[0].mid && oldGameId != 0) {
                    setTimeout(function() {
                        clearCards();
                    }, <?php echo CASINO_RESULT_TIMEOUT; ?>);
                }
                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    var desc = data.t1[0].desc;
                    desc = desc.split(",");

                    var total_card_value = 0;
                    var total_card_rank = 0;
                    var spade_card_show = 0;
                    var heart_card_show = 0;
                    var club_card_show = 0;
                    var diamond_card_show = 0;



                    for (var i in desc) {
                        card_details = desc[i];
                        if (card_details != 1) {
                            card_value = getType(card_details);
                            card_rank = card_value.rank;
                            ctype = card_value.ctype;

                            if (ctype == "spade") {
                                spade_card_show++;
                                spade_master_card_show = spade_card_show + 1;
                                $("#card_" + ctype + "_" + spade_card_show).attr("src", site_url + "storage/front/img/cards/" + card_details + ".png");
                                $("#card_" + ctype + "_" + spade_card_show).show();
                                $("#card_" + ctype + "_" + spade_master_card_show).attr("src", site_url + "storage/front/img/cards/KHH.png");
                                $("#card_" + ctype + "_" + spade_master_card_show).show();
                            } else if (ctype == "heart") {
                                heart_card_show++;
                                heart_master_card_show = heart_card_show + 1;
                                $("#card_" + ctype + "_" + heart_card_show).attr("src", site_url + "storage/front/img/cards/" + card_details + ".png");
                                $("#card_" + ctype + "_" + heart_card_show).show();
                                $("#card_" + ctype + "_" + heart_master_card_show).attr("src", site_url + "storage/front/img/cards/KDD.png");
                                $("#card_" + ctype + "_" + heart_master_card_show).show();
                            } else if (ctype == "club") {
                                club_card_show++;
                                club_master_card_show = club_card_show + 1;
                                $("#card_" + ctype + "_" + club_card_show).attr("src", site_url + "storage/front/img/cards/" + card_details + ".png");
                                $("#card_" + ctype + "_" + club_card_show).show();
                                $("#card_" + ctype + "_" + club_master_card_show).attr("src", site_url + "storage/front/img/cards/KCC.png");
                                $("#card_" + ctype + "_" + club_master_card_show).show();
                            } else if (ctype == "diamond") {
                                diamond_card_show++;
                                diamond_master_card_show = diamond_card_show + 1;
                                $("#card_" + ctype + "_" + diamond_card_show).attr("src", site_url + "storage/front/img/cards/" + card_details + ".png");
                                $("#card_" + ctype + "_" + diamond_card_show).show();
                                $("#card_" + ctype + "_" + diamond_master_card_show).attr("src", site_url + "storage/front/img/cards/KSS.png");
                                $("#card_" + ctype + "_" + diamond_master_card_show).show();
                            }




                            total_card_rank += card_rank;
                            total_card_value++;
                        }
                    }

                    $("#total_card").text(total_card_value);
                    $("#total_point").text(total_card_rank);

                }
                clock.setValue(data.t1[0].autotime);
                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid.split(".")[1];

                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);
                    runner = data['t2'][j].nat || data['t2'][j].nation;
                    b1 = data['t2'][j].b1;
                    bs1 = data['t2'][j].bs1;
                    l1 = data['t2'][j].l1;
                    ls1 = data['t2'][j].ls1;

                    b11 = b1;
                    markettype = "RACE_20";



                    if (selectionid <= 6) {
                        if (selectionid == 5) {
                            bs1 = 100;
                        } else if (selectionid == 6) {
                            bs1 = 90;
                        }
                        back_html = '<span class="casino-odds-box-odd market_' + selectionid + '_b_value">' + b1 + '</span> <span>' + bs1 + '</span>';
                    } else {
                        back_html = '<span class="casino-odds-box-odd market_' + selectionid + '_b_value">' + b1 + '</span>';
                    }

                    $(".market_" + selectionid + "_b_btn").html(back_html);

                    $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                    $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                    $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);
                    $(".market_" + selectionid + "_b_btn").attr("runner", runner);
                    $(".market_" + selectionid + "_b_btn").attr("marketname", runner);
                    $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                    $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
                    $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                    $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
                    $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", b1);

                    if (selectionid <= 6) {
                        if (selectionid == 5) {
                            ls1 = 100;
                        } else if (selectionid == 6) {
                            ls1 = 105;
                        }
                        lay_html = '<span class="casino-odds-box-odd market_' + selectionid + '_l_value">' + l1 + '</span> <span>' + ls1 + '</span>';
                    } else {
                        lay_html = '<span class="casino-odds-box-odd market_' + selectionid + '_l_value">' + l1 + '</span>';
                    }

                    $(".market_" + selectionid + "_l_btn").attr("side", "Lay");
                    $(".market_" + selectionid + "_l_btn").attr("selectionid", selectionid);
                    $(".market_" + selectionid + "_l_btn").attr("marketid", selectionid);
                    $(".market_" + selectionid + "_l_btn").attr("runner", runner);
                    $(".market_" + selectionid + "_l_btn").attr("marketname", runner);
                    $(".market_" + selectionid + "_l_btn").attr("eventid", eventId);
                    $(".market_" + selectionid + "_l_btn").attr("markettype", markettype);
                    $(".market_" + selectionid + "_l_btn").attr("event_name", markettype);
                    $(".market_" + selectionid + "_l_btn").attr("fullmarketodds", l1);
                    $(".market_" + selectionid + "_l_btn").attr("fullfancymarketrate", l1);
                    $(".market_" + selectionid + "_l_btn").html(lay_html);

                    gstatus = data['t2'][j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0" || gstatus == "CLOSED") {
                        $(".market_" + selectionid + "_row").addClass("suspended");
                        $(".market_" + selectionid + "_b_btn").removeClass("back-1");
                        $(".market_" + selectionid + "_l_btn").removeClass("lay-1");
                    } else {
                        $(".market_" + selectionid + "_row").removeClass("suspended");
                        $(".market_" + selectionid + "_b_btn").addClass("back-1");
                        $(".market_" + selectionid + "_l_btn").addClass("lay-1");
                    }
                }
            }
        });

        socket.on('gameResult', function(args) {
            updateResult(args.data);
        });
        socket.on('error', function(data) {});
        socket.on('close', function(data) {});
    }


    function updateResult(data) {
        if (data && data[0]) {
            resultGameLast = data[0].mid;

            if (last_result_id != resultGameLast) {
                last_result_id = resultGameLast;

            }

            html = "";
            var ab = "";
            var ab1 = "";
            casino_type = "'race20'";
            data.forEach((runData) => {
                if (parseInt(runData.result) == 1) {
                    ab = "playersuit";
                    ab1 = "<img src='" + site_url + "storage/front/img/cards/spade.png'>";

                } else if (parseInt(runData.result) == 2) {
                    ab = "playersuit";
                    ab1 = "<img src='" + site_url + "storage/front/img/cards/heart.png'>";

                } else if (parseInt(runData.result) == 3) {
                    ab = "playersuit";
                    ab1 = "<img src='" + site_url + "storage/front/img/cards/club.png'>";

                } else {
                    ab = "playersuit";
                    ab1 = "<img src='" + site_url + "storage/front/img/cards/diamond.png'>";
                }

                eventId = runData.mid == 0 ? 0 : runData.mid.split(".")[1];
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
            });


            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {

            }
        }
    }

    function teenpatti(type) {
        gameType = type
        websocket();
    }

    function getType(data) {
        var data1 = data;
        if (data) {
            data = data.split('SS');
            if (data.length > 1) {
                var obj = {
                    type: '[',
                    color: 'red',
                    ctype: 'diamond',
                    card: data[0],
                    rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
                }
                return obj;
            } else {
                data = data1;
                data = data.split('DD');
                if (data.length > 1) {
                    var obj = {
                        type: '{',
                        color: 'red',
                        ctype: 'heart',
                        card: data[0],
                        rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
                    }
                    return obj;
                } else {
                    data = data1;
                    data = data.split('HH');
                    if (data.length > 1) {
                        var obj = {
                            type: ']',
                            color: 'black',
                            ctype: 'spade',
                            card: data[0],
                            rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
                        }
                        return obj;
                    } else {
                        data = data1;
                        data = data.split('CC');
                        if (data.length > 1) {
                            var obj = {
                                type: '}',
                                color: 'black',
                                ctype: 'club',
                                card: data[0],
                                rank: data[0] == 'A' ? 1 : data[0] == 'K' ? 13 : data[0] == 'Q' ? 12 : data[0] == 'J' ? 11 : parseInt(data[0])
                            }
                            return obj;
                        } else {
                            return 0;
                        }
                    }
                }
            }
        }
        return 0;
    }

    function clearCards() {
        $("#total_card").text(0);
        $("#total_point").text(0);
        $(".cl_cards").attr("storage/front/img/cards/1.png");
        $(".cl_cards").hide();
    }
    teenpatti("ok");
</script>
<script>
    function view_casiono_result(event_id, casino_type) {

        $("#cards_data").html("");
        $("#round_no").text(event_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/race20/' + event_id,
            dataType: 'json',
            data: {
                event_id: event_id,
                casino_type: casino_type
            },
            success: function(response) {
                $('#modalpokerresult').modal('show');
                $("#cards_data1").html(response.result);
            }
        });
    }

    function get_round_no() {
        return $.trim($('.round_no').text());
    }

    $('.last-result').on('click', function() {

        $('#modalpokerresult').modal('show');
    });
    var xhr;

    function call_active_bets() {

        if (get_round_no() == 0) {
            $('#table_body').html('');
            $('#matchedCount').html('(0)');
        }
        if (xhr && xhr.readyState != 4)
            xhr.abort();
        xhr = $.ajax({
            url: MASTER_URL + '/live-market/race20/active_bets/race20/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                if (data.results) {

                    $('#table_body').html(data.results);
                    $('#matchedCount').html('(' + data.total_bets + ')');
                }

            }

        });
    }

    var xhr_vm;

    function call_view_more_bets() {

        if (xhr_vm && xhr_vm.readyState != 4)
            xhr_vm.abort();
        xhr_vm = $.ajax({
            url: MASTER_URL + '/live-market/race20/view_more_matched/race20/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            data: $('#form-view_more_bets').serialize(),
            success: function(data) {

                if (data.results) {

                    $('#tbody-view_more_matched').html(data.results);
                    $('#modal-view_more').modal('show');
                    $('[data-toggle="tooltip"]').tooltip();
                }

            }

        });
    }



    var xhr_analysis;

    function call_analysis() {
        if (get_round_no() == 0) {
            $('.market_exposure').text(0).css('color', 'black');
            return false;
        }

        if (xhr_analysis && xhr_analysis.readyState != 4)
            xhr_analysis.abort();
        xhr_analysis = $.ajax({
            url: MASTER_URL + '/live-market/race20/market_analysis/race20/' + get_round_no(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.results == 0) {
                    $('.market_exposure').text(0).css('color', 'black');
                }
                $.each(data.results, function(index, value) {
                    var element = $('.market_' + value.market_id + '_b_exposure');
                    $(element).text(value.pl);
                    if (value.pl > 0)
                        $(element).css('color', 'green');
                    else
                        $(element).css('color', 'red');
                });
            }

        });
    }

    $(function() {

        setTimeout(function() {
            call_active_bets();
            call_analysis();
        }, 2000);
        setInterval(function() {
            call_active_bets();
            call_analysis();
        }, <?php echo CASINO_SET_INTERVAL;  ?>);
        $('#view_more_bets').on('click', function() {

            call_view_more_bets();
        });
        $('#form-view_more_bets').on('submit', function() {

            call_view_more_bets();
            return false;
        });
        $('#btn-view_all_matched').on('click', function() {

            $('#search-client_name').html('');
            setTimeout(function() {

                call_view_more_bets();
            }, 1);
        });
        $('#search-client_name').select2({
            allowClear: true,
            minimumInputLength: 3,
            placeholder: 'select..',
            ajax: {
                url: MASTER_URL + '/reports/common/get_clients',
                data: function(params) {

                    var query = {
                        search: params.term,
                        type: 'public'

                    }

                    return query;
                }

            },
        });
    });
</script>