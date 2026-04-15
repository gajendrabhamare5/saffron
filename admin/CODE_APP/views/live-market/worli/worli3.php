<link rel="stylesheet" type="text/css" href="<?php echo MASTER_URL; ?>/assets/css/flipclock.css">

<div class="col-md-12 main-container">
    <style type="text/css">
        .video-overlay {
            /* right: 0; */
            left: 0;
        }

        #result-desc {
            top: auto;
            right: auto;
            bottom: 0;
            left: 0;
        }
         .casino-last-results {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        margin-top: 10px;
        width: 100%;
    }

        .casino-last-results .result {
            background: #355e3b;
            color: #fff;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
            margin-left: 5px;
            cursor: pointer;
        }

        .casino-last-results .result.result-a {
            color: #ff4500;
        }

        .casino-last-results .result.result-b {
            color: #ffff33;
        }

        .casino-last-results .result.result-c {
            color: #33c6ff;
        }

         .casino-last-result-title {
        padding: 10px;
        background-color: var(--theme2-bg);
        color: #ffffff;
        font-size: 14px;
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        width: 100%;
        height: 41px;
        align-items: center;
    }

    .casino-last-result-title a {
        color: #ffffff;
    }

    .casino-last-results span.result-b{
        color: #ffff33;
    }

    @media (min-width: 576px) {
    .modal-dialog {
        max-width: 800px !important;
        margin: 1.75rem auto;
    }
}
    </style>
     <style>
    .casino-video-right-icons {
        position: absolute;
        right: 5px;
        top: 5px;
        display: flex;
        display: -webkit-flex;
    }

    .casino-video-rules-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border: 2px solid #999;
        border-radius: 50%;
        height: 40px;
        width: 40px;
        display: flex;
        display: -webkit-flex;
        align-items: center;
        justify-content: center;
        margin-right: 5px;
        cursor: pointer;
        font-size: 24px;
    }

    .casino-video-rules-icon i {
        font-size: 24 px !important;
        color: #fff;
        cursor: pointer;

    }
    
  .tooltip-container {
        position: relative;
        display: inline-block;
        cursor: pointer;
        font-family: Arial, sans-serif;
    }

    .tooltip-box {
        visibility: hidden;
        /* background-color: #fff; */
        color: #333;
        /* border: 1px solid #ccc; */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        border-radius: 6px;
        position: absolute;
        z-index: 1;
        top: 125%;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        overflow: hidden;
        left: -617%;
    width: 1500%;
    height: 550%;
    }

    .tooltip-header {
        background-color: #333;
        display: flex;
        justify-content: center;
        font-size: 16px;
        padding: 4px 8px;
        width: 100%;
        color: white;
         position: relative;
    }

    .tooltip-content {
        padding: 10px;
        overflow-x: hidden;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #666666 #333333;
        height: calc(100% - 24px);
        line-height: normal;
        width: 100%;
        background-color: black;
        color: white;
        font-size: 12px;
    }

    .tooltip-container.show-tooltip .tooltip-box {
        visibility: visible;

    }
    .tooltip-close {
        cursor: pointer;
    font-size: 23px;
    font-weight: bold;
    position: absolute;
    right: 8px; 
    top: 50%;
    transform: translateY(-50%);
}

.matka-tabs {
    margin-bottom: 4px;
    margin-top: 4px;
}

.matka-tabs .nav-pills {
    gap: 0 4px;
    flex-wrap: nowrap;
    overflow: auto;
    white-space: nowrap;
}

.matka-tabs .nav-pills .nav-link.active, .matka .matka-tabs .nav-pills .show > .nav-link {
    color: #fff;
    background-color: #125e7b;
    font-weight: bold;
}

.matka-tabs .nav-pills .nav-link {
    background: #374151;
    color: #fff;
    font-size: 14px;
    text-transform: uppercase;
    border-radius: 0;
    display: flex;
    flex-direction: column;
    line-height: 1.2;
    padding: 4px 8px;
    justify-content: center;
    align-items: center;
    gap: 4px;
}

.nav-link span {
    line-height: 1;
}
.matka-tabs .remaining-time {
    display: flex;
    align-items: center;
    gap: 6px;
}
.matka-tabs .nav-pills .nav-link.active, .matka .matka-tabs .nav-pills .show > .nav-link {
    color: #fff;
    background-color: #125e7b;
    font-weight: bold;
}

 .matka-tabs .remaining-time img {
    height: 18px;
}
.matka-tabs .remaining-time span {
    font-weight: bold;
    color: #fdcf13;
    font-size: 12px;
}
.matka .game-time {
    margin-top: -3px;
    font-size: 11px;
}
.matka-tabs .nav-pills .nav-link.active, .matka .matka-tabs .nav-pills .show > .nav-link {
    color: #fff;
    background-color: #125e7b;
    font-weight: bold;
}
.game-time {
    margin-top: -3px;
    font-size: 11px;
}

</style>
    <div class="listing-grid hv-container casino-grid">
        <div class="coupon-card row">
            <div class="col-md-8 main-content">
                <div class="coupon-card">
                    <div class="game-heading">
                        <span class="card-header-title">Matka Market</span>
                        <span class="float-right">
                            Round ID: <span id="round-id" class="round_no"></span></span>
                    </div>
                    <div class="matka-tabs">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><span>Lords Close</span>
                                    <div class="remaining-time"><img
                                            src="../../../storage/front/img/casinoicons/clock.png"
                                            alt="Clock Icon"><span>00:25:05</span></div>
                                    <div class="game-time"><span>25 Dec 25 12:00 PM</span></div>
                                </a></li>
                            <li class="nav-item"><a class="nav-link " href="javascript:void(0);"><span>Riga Open</span>
                                    <div class="remaining-time"><img
                                            src="../../../storage/front/img/casinoicons/clock.png"
                                            alt="Clock Icon"><span>01:25:05</span></div>
                                    <div class="game-time"><span>25 Dec 25 01:00 PM</span></div>
                                </a></li>
                        </ul>
                    </div>
                    <div style="position: relative;">


                        <?php
                        if (!empty(IFRAME_URL_SET)) {
                        ?>
                            <iframe class="iframedesign" src="<?php echo IFRAME_URL . "" . WORLI3; ?>" width="100%" height="400px" style="border: 0px;"></iframe>
                        <?php

                        } else {
                        ?>
                            <iframe class="iframedesign" id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe>
                        <?php

                        }
                        ?>

                        <!-- <iframe id="casinoIframe" src="" width="100%" height="400" style="border: 0px;"></iframe> -->
                        <!-- <iframe width="100%" height="400" src="<?php echo IFRAME_URL . "" . WORLI3; ?>" style="border:0px"></iframe> -->
                        <!-- <div class="video-overlay">
                            <h4 class="text-left text-white text-uppercase">Cards</h4>
                            <div>
                                <img id="card_c1" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                <img id="card_c2" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                                <img id="card_c3" src="<?php echo WEB_URL; ?>storage/front/img/cards/1.png">
                            </div>
                        </div> -->

                          <div class="casino-video-right-icons">
                            <div title="Rules" class="casino-video-rules-icon tooltip-container" id="tooltipBtn">
                                <i class="fas fa-info-circle" style="margin: 6px 0 0 6px;"></i>
                                <div class="tooltip-box">
                                    <div class="tooltip-header">Rules  <span class="tooltip-close" id="tooltipClose">&times;</span></div>
                                    <div class="tooltip-content">
                                        <style type="text/css">
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@100..900&display=swap');
            .rules-section {
                font-family: "Noto Sans Devanagari", sans-serif;font-size:18px;
                
            }
            .rules-section .row.row5 {
                margin-left: -5px;
                margin-right: -5px;
            }

            .rules-section .pl-2 {
                padding-left: 0.5rem !important;
            }

            .rules-section .pr-2 {
                padding-right: 0.5rem !important;
            }

            .rules-section .row.row5 > [class*="col-"],
            .rules-section .row.row5 > [class*="col"] {
                padding-left: 5px;
                padding-right: 5px;
            }

            .rules-section {
                text-align: left;
                margin-bottom: 10px;
            }

            .rules-section .table {
                color: #fff;
                border: 1px solid #444;
                background-color: #222;
                font-size: 12px;
            }

            .rules-section .table td,
            .rules-section .table th {
                border-bottom: 1px solid #444;
            }

            .rules-section ul li,
            .rules-section p {
                margin-bottom: 5px;
            }

            .rules-section::-webkit-scrollbar {
                width: 8px;
            }

            .rules-section::-webkit-scrollbar-track {
                background: #666666;
            }

            .rules-section::-webkit-scrollbar-thumb {
                background-color: #333333;
            }

            .rules-section .rules-highlight {
                color: #fdcf13;
                font-size: 16px;
            }

            .rules-section .rules-sub-highlight {
                color: #fdcf13;
                font-size: 14px;
            }

            .rules-section .list-style,
            .rules-section .list-style li {
                list-style: disc;
            }

            .rules-section .rule-card {
                height: 20px;
                margin-left: 5px;
            }

            .rules-section .card-character {
                font-family: Card Characters;
            }

            .rules-section .red-card {
                color: red;
            }

            .rules-section .black-card {
                color: black;
            }

            .rules-section .cards-box {
                background: #fff;
                padding: 6px;
                display: inline-block;
                color: #000;
                min-width: 150px;
            }
        </style>
        <div class="rules-section">
                                                <h5>मटका एक भारतीय आँकड़ों (Numbers) पर आधारित लोकप्रिय खेल है, जिसमें परिणाम अंक गणना (Calculation) के आधार पर निकाले जाते हैं।</h5>
                                                <p>कार्ड और उनकी वैल्यू</p>
                                                <p>इस खेल में ताश (Cards) का उपयोग किया जाता है।</p>
                                                <p>उपयोग होने वाले कार्ड</p>
                                                <p>A, 2, 3, 4, 5, 6, 7, 8, 9, 10</p>
                                                <p>चारों सूट में:</p>
                                                <p>♠ Spade</p>
                                                <p>♥ Heart</p>
                                                <p>♣ Club</p>
                                                <p>♦ Diamond</p>
                                                <h6 class="rules-highlight">🔢 कार्ड वैल्यू (Card Value):</h6>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>कार्ड</th>
                                                                <th>वैल्यू</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>A (Ace)</td>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>4</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>5</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>6</td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td>7</td>
                                                            </tr>
                                                            <tr>
                                                                <td>8</td>
                                                                <td>8</td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <td>9</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <td>0</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <p>⚠️ नोट: इस प्रणाली में 10 को 0 माना जाता है, जो मटका की अंक-गणना में बहुत महत्वपूर्ण होता है। आँकड़ा (Single Digit)</p>
                                                <p>इसका मतलब है 0 से 9 के बीच का कोई भी एक नंबर जिस पर आप दांव लगाते हैं</p>
                                                <p>तीन पत्तों (या कार्ड्स/नंबरों) के कुल जोड़ से जो आख़िरी अंक निकलता है, उसे आँकड़ा कहा जाता है। इसी आँकड़ा के आधार पर रिज़ल्ट तय होता है।</p>
                                                <p>आंकड़ा कैसे बनता है?</p>
                                                <p>आंकड़ा हमेशा पाना (Patti) के जोड़ से पैदा होता है।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>मान लीजिए पाना खुला: 2-3-9</li>
                                                    <li>इनका जोड़ करें: 2 + 3 + 9 = 14</li>
                                                    <li>जोड़ का आखिरी अंक क्या है? 4</li>
                                                    <li>तो इस खेल का 'सिंगल आंकड़ा' 4 कहलाएगा।</li>
                                                </ul>
                                                <h6 class="rules-highlight">जोड़ी</h6>
                                                <p>मटका में 'जोड़ी' (Jodi) का अर्थ बहुत ही सीधा है—यह दो अंकों की एक संख्या होती है।</p>
                                                <p>जैसा कि नाम से पता चलता है, जब दो अंकों को मिलाकर एक साथ दांव लगाया जाता है, तो उसे 'जोड़ी' कहा जाता है। यह संख्या 00 से 99 के बीच की कोई भी संख्या हो सकती है।</p>
                                                <h7 class="rules-sub-highlight">जोड़ी कैसे बनती है?</h7>
                                                <p>मटका खेल दो चरणों में होता है: <b>ओपन (Open)</b> और <b>क्लोज (Close)।</b></p>
                                                <p><b>ओपन (Open):</b> खेल की शुरुआत में निकलने वाला पहला <b>आंकड़ा</b> ।</p>
                                                <p><b>क्लोज (Close):</b> खेल के अंत में निकलने वाला दूसरा आंकड़ा ।</p>
                                                <p><b>जोड़ी:</b> जब इन दोनों अंकों को साथ रखा जाता है, तो वह 'जोड़ी' बन जाती है।</p>
                                                <h7 class="rules-sub-highlight"> जोड़ी कैसे बनती है?</h7>
                                                <p>मटका का पूरा रिजल्ट दो हिस्सों में आता है: <b>ओपन (Open)</b> और <b>क्लोज (Close)</b>। इन दोनों के सिंगल अंकों को साथ जोड़ने पर 'जोड़ी' बनती है।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li><b>स्टेप 1:</b> पहले 'ओपन' का रिजल्ट आता है (जैसे आंकड़ा निकला: 4)</li>
                                                    <li><b>स्टेप 2:</b> फिर कुछ घंटों बाद 'क्लोज' का रिजल्ट आता है (जैसे आंकड़ा निकला: 7)</li>
                                                    <li>फाइनल जोड़ी: इन दोनों को मिलाकर जो संख्या बनी, यानी 47, उसे उस दिन की 'जोड़ी' कहा जाता है।</li>
                                                </ul>
                                                <h6 class="rules-highlight">पाना</h6>
                                                <p>मटका के संदर्भ में, <b>'पाना' (Pana)</b> एक बहुत ही महत्वपूर्ण शब्द है। यह खेल के दांव लगाने का एक विशिष्ट तरीका है।</p>
                                                <p>सरल शब्दों में, <b>पाना 3 अंकों का एक समूह होता है।</b></p>
                                                <h7 class="rules-sub-highlight">पाना (Pana) कैसे काम करता है?</h7>
                                                <p>जब आप मटका खेलते हैं, तो आपको 0 से 9 के बीच के अंक चुनने होते हैं। लेकिन इन एकल अंकों (Single Digit) के पीछे <b>तीन अंकों का एक सेट</b> होता है, जिसे 'पाना' कहा जाता है।</p>
                                                <p>उदाहरण के लिए:</p>
                                                <p>अगर आपने तीन अंक चुने: 1, 2, और 5</p>
                                                <p>इन तीनों को जोड़ने पर: 1 + 2 + 5 = 8</p>
                                                <p>यहाँ 8 आपका 'सिंगल आंकड़ा (Single Digit) है और 125 आपका 'पाना' है।</p>
                                                <h6 class="rules-highlight">सिंगल पाना</h6>
                                                <p>मटका में <b>SP</b> का मतलब <b>'सिंगल पाना'</b> (Single Pana) होता है।</p>
                                                <h7 class="rules-sub-highlight">Single Pana (SP) की परिभाषा</h7>
                                                <p>सिंगल पाना उसे कहते हैं जिसमें <b>तीनों अंक अलग-अलग</b> होते हैं। इसमें कोई भी अंक दोहराया (Repeat) नहीं जाता।</p>
                                                <p><b>मटका में पाना हमेशा छोटे से बड़े अंक की तरफ लिखा जाता है। सिंगल पाना कुल 120 कॉम्बिनेशन होते हैं।</b></p>
                                                <h6 class="rules-highlight">डबल पाना</h6>
                                                <p>मटका की भाषा में DP का मतलब होता है <b>"डबल पाना" (Double Pana)।</b></p>
                                                <p>जैसा कि नाम से ही पता चलता है, जब किसी पाने (3 अंकों के सेट) में कोई भी दो अंक एक जैसे <b>(duplicate)</b> होते हैं, तो उसे 'डबल पाना' कहा जाता है।</p>
                                                <h7 class="rules-sub-highlight">डबल पाना की पहचान</h7>
                                                <p>इसमें तीन में से दो अंक बिल्कुल समान होते हैं और तीसरा अंक अलग होता है।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li><b>उदाहरण:</b> * 112 (यहाँ 1 दोबारा आया है)</li>
                                                    <li>559 (यहाँ 5 दोबारा आया है)</li>
                                                    <li>400 (यहाँ 0 दोबारा आया है)</li>
                                                </ul>
                                                <h7 class="rules-sub-highlight">डबल पाना (DP) से सिंगल अंक कैसे निकलता है?</h7>
                                                <p>नियम वही है—तीनों अंकों को जोड़ें और जोड़ का आखिरी अंक आपका 'सिंगल' होगा।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>उदाहरण 1: पाना 223</li>
                                                    <li>जोड़: 2 + 2 + 3 = 7</li>
                                                    <li>सिंगल अंक बना: 7</li>
                                                </ul>
                                                <h6 class="rules-highlight">TRIO (ट्रायो)</h6>
                                                <p>जब किसी पाने के तीनों अंक एक जैसे होते हैं, तो उसे ट्रिपल पाना या <b>'ट्रियो'</b> कहा जाता है। मटका में 0 से 9 तक के अंकों के लिए केवल <b>10 ट्रिपल</b> पाने ही संभव हैं।</p>
                                                <h7 class="rules-sub-highlight">TRIO आँकड़ा के उदाहरण</h7>
                                                <p><b>111 / 222 / 333 / 444 / 555 / 666 / 777 / 888 / 999 / 000</b></p>
                                                <h6 class="rules-highlight">Cycle (साइकिल)</h6>
                                                <p>जब आप दो अंकों की एक जोड़ी चुनते हैं और यह शर्त लगाते हैं कि रिजल्ट के पाने (3 अंकों के सेट) में ये दो अंक जरूर आएंगे, तो उसे साइकिल पाना कहते हैं।</p>
                                                <p><b>उदाहरण:</b> मान लीजिए आपने <b>'1-2'</b> की साइकिल (CP) ली।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>अब अगर रिजल्ट का पाना 123, 124, 125, 126, 127, 128, 129 या 120 में से कोई भी आता है, तो आप जीत जाएंगे।</li>
                                                    <li>शर्त सिर्फ इतनी है कि उस तीन अंकों के पाने में '1' और '2' दोनों होने चाहिए।</li>
                                                </ul>
                                                <h6 class="rules-highlight">Motor SP (मोटर SP)</h6>
                                                <h7 class="rules-sub-highlight">खिलाड़ी कम से कम 4 और ज़्यादा से ज़्यादा 9 कार्ड चुनता है।</h7>
                                                <p><b>मान लीजिए आप 4 अंक चुनते हैं: 1, 2, 3, 4। अब इन चार अंकों से जितने भी संभव 3-अंकों के 'सिंगल पाने' (SP) बन सकते हैं, मोटर उन सबका एक सेट बना देता है।</b></p>
                                                <p><b>उदाहरण (4 अंकों की मोटर - 1234): इससे निम्नलिखित 4 'सिंगल पाने' बनेंगे:</b></p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>123</li>
                                                    <li>124</li>
                                                    <li>134</li>
                                                    <li>234</li>
                                                </ul>
                                                <p><b>अगर रिजल्ट में इन चारों में से कोई भी एक पाना आ जाता है, तो आप जीत जाते हैं।</b></p>
                                                <h6 class="rules-highlight">56 Chart (56 चार्ट)</h6>
                                                <p><b>56 चार्ट्स</b> मटका गेम में इस्तेमाल होने वाला एक संरचित चार्ट है,</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li> चार्ट में कुल 56 नंबर या संयोजन होते हैं।</li>
                                                    <li> ये नंबर आम तौर पर 0 और 1 को छोड़कर बनते हैं।</li>
                                                    <li> नंबर 2 से लेकर 9 तक के अलग-अलग संयोजन शामिल होते हैं।</li>
                                                </ul>
                                                <h6 class="rules-highlight">64 Chart (64 चार्ट)</h6>
                                                <p>64 चार्ट्स मटका गेम में इस्तेमाल होने वाला एक संरचित चार्ट है, चार्ट में कुल 64 नंबर या संयोजन होते हैं।</p>
                                                <p>आम तौर पर चार्ट में 0 और 1 शामिल होते हैं।</p>
                                                <p>==================================</p>
                                                <h6 class="rules-highlight">ABR (A/B/R)</h6>
                                                <h7 class="rules-sub-highlight">अकी-बेकी (Aki-Beki) - सम और विषम अंक</h7>
                                                <p>जिसका उपयोग 'Odd' और 'Even' अंकों के लिए किया जाता है।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>अकी (Aki): इसका मतलब है विषम अंक (Odd Numbers)। अंक: 1, 3, 5, 7, 9</li>
                                                    <li>बेकी (Beki): इसका मतलब है सम अंक (Even Numbers)। अंक: 2, 4, 6, 8, 0</li>
                                                </ul>
                                                <p>खेल में उपयोग: खिलाड़ी अक्सर दांव लगाते समय कहते हैं कि "आज ओपन में 'अकी' (विषम) अंक आएगा"। अगर रिजल्ट 1, 3, 5, 7 या 9 में से कुछ भी आता है, तो वे जीत जाते हैं।</p>
                                                <p>रोन (Ron) - अंकों का क्रम</p>
                                                <p>'रोन' का मतलब होता है सीक्वेंस (Sequence) या लगातार आने वाले अंक।</p>
                                                <p>जब किसी पाने (Pana) के तीनों अंक लगातार क्रम में होते हैं, तो उसे 'रोन पाना' कहा जाता है।</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>उदाहरण: 123, 234, 456, 789, 890।</li>
                                                </ul>
                                                <h6 class="rules-highlight">कॉमन सिंगल पन्ना (Common SP)</h6>
                                                <p>सरल शब्दों में: "यह एक ऐसा दांव है जहाँ खिलाड़ी 0 से 9 के बीच का कोई एक अंक चुनता है। यदि रिजल्ट में आने वाले तीन अंकों के पन्ने (Pana) में आपका चुना हुआ अंक एक बार मौजूद है, तो आप विजेता माने जाते हैं।"</p>
                                                <h6 class="rules-highlight">Common DP (कॉमन डबल पन्ना)</h6>
                                                <p>"कॉमन डबल पन्ना एक ऐसा दांव है जहाँ खिलाड़ी 0 से 9 के बीच का कोई एक अंक चुनता है। इस दांव में जीत तब मानी जाती है जब ड्रॉ (रिजल्ट) में आने वाले तीन कार्ड्स या अंकों के सेट में दो शर्तें पूरी हों:</p>
                                                <p>ड्रॉ में कोई भी एक जोड़ी (Pair) मौजूद हो (यानी दो अंक एक समान हों)।</p>
                                                <p>उस जोड़ी या सेट में खिलाड़ी द्वारा चुना हुआ अंक अनिवार्य रूप से शामिल हो।"</p>
                                                <h6 class="rules-highlight">Color DP (कलर डबल पन्ना)</h6>
                                                <p>"Color DP एक ऐसा दांव है जहाँ जीत का फैसला अंकों के सम-विषम क्रम (Odd/Even Sequence) और जोड़ी (Pair) के आधार पर होता है। इसमें खिलाड़ी 0 से 9 के बीच का कोई एक अंक चुनता है।</p>
                                                <p>जीतने के लिए ड्रॉ के तीन कार्डों/अंकों में ये शर्तें पूरी होनी चाहिए:</p>
                                                <ul class="class=pl-4 pr-4 list-style">
                                                    <li>कलर (Color Sequence): तीनों अंक या तो विषम (Odd) होने चाहिए (जैसे: 1, 3, 5, 7, 9) या तीनों अंक सम (Even) होने चाहिए (जैसे: 2, 4, 6, 8, 0)।</li>
                                                    <li>जोड़ी (Pair): उन तीन अंकों में कम से कम दो अंक एक समान (Pair) होने चाहिए।</li>
                                                    <li>चुना हुआ नंबर: उस सम या विषम जोड़ी वाले सेट में खिलाड़ी का चुना हुआ अंक मौजूद होना चाहिए।"</li>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <!-- <div id="result-desc" style="display: none;">550 - 0</div> -->
                        <div class="clock clock2digit flip-clock-wrapper"></div>
                    </div>

                    <!-- <div class="fancy-marker-title">
                        <h4>Last Result <a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=worli2" class="text-right" style="font-size: 14px; float: right; color: #fff">View All</a></h4>
                    </div>
                    <div class="m-b-10">
                        <p class="text-right" id="last-result"></p>
                    </div> -->
                    <div class="casino-last-result-title"><span>Last Result</span><span><a href="<?php echo MASTER_URL; ?>/reports/casino-results?q=worli3">View All</a></span></div>
                        <div class="casino-last-results" id="last-result"></div>
            </div>
            </div>
            <div class="col-md-4 sidebar-right" id="sidebar-right">
                <div class="card m-b-10 scorecard" style="margin-bottom: 0px;">
                    <div class="card m-b-10 my-bet">
                        <div class="card-header">
                            <ul class="nav nav-tabs d-inline-block" role="tablist ">
                                <li class="nav-item d-inline-block">
                                    <!-- <a class="nav-link active " data-toggle="tab" href="#matched-bet">Matched <span id="matchedCount">(0)</span></a> -->
                                     <span>My Bets</span>
                                </li>
                            </ul>
                            <a href="javascript:void(0)" class="btn btn-back float-right" id="view_more_bets">VIEW MORE</a>
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
                                                    <!-- <th>MatchDate</th> -->
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
                        <h4 class="modal-title">View More</h4>
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
                        <img src="../../../storage/front/img/rules/tp-rules.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div id="modalpokerresult" class="modal fade show" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Matka Market Result</h4>
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
                <h4 class="modal-title">View More</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="viewMoreMatchedDataModal">
                    <!-- <ul class="nav nav-tabs d-inline-block" role="tablist ">
                        <li class="nav-item d-inline-block">
                            <a class="nav-link  active " data-toggle="tab" href="#matched-bet2" id="matchedDataLink">Matched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#unmatched-bet2" id="unMatchedDataLink">Unmatched Bets</a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link " data-toggle="tab" href="#deleted-bet2" id="deletedMatchedDataLink">Deleted Bets</a>
                        </li>
                    </ul> -->
                    <div class="tab-content m-t-20">
                        <div id="matched-bet2" class="tab-pane active">
                            <!-- <form method="POST" id="form-view_more_bets">
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
                            </form> -->
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Nation</th>
                                            <!-- <th>Bet Type</th> -->
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <!-- <th>Match Date</th> -->
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
                                            <!-- <th>Bet Type</th> -->
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <!-- <th>Match Date</th> -->
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
                                            <!-- <th>Bet Type</th> -->
                                            <th>Amount</th>
                                            <th>User Rate</th>
                                            <th>Place Date</th>
                                            <!-- <th>Match Date</th> -->
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
    var selectionid = "";
    var runner = "";
    var b1 = "";
    var bs1 = "";
    var l1 = "";
    var ls1 = "";
    var markettype = "WORLI3";
    var back_html = "";
    var lay_html = "";
    var gstatus = "";

    function websocket(type) {
        socket = io.connect(websocketurl, {
            transports: ['websocket']
        });
        socket.on('connect', function() {
            socket.emit('Room', 'worli3');
        });

        socket.on('gameIframe', function(data) {
            $("#casinoIframe").attr('src', data);
        });
        socket.on('game', function(data) {

            if (data && data['t1'] && data['t1'][0]) {

                if (oldGameId != data.t1[0].mid && oldGameId != 0) {
                    $('#result-desc').hide();
                }

                oldGameId = data.t1[0].mid;
                if (data.t1[0].mid != 0 && data.t1[0].mid != "0" && oldGameId != resultGameLast) {
                    $(".casino-remark").text(data.t1[0].remark);
                    if (data.t1[0].C1 != 1) {
                        $("#card_c1").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C1 + ".png");
                    }
                    if (data.t1[0].C2 != 3) {
                        $("#card_c2").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C2 + ".png");
                    }
                    if (data.t1[0].C3 != 1) {
                        $("#card_c3").attr("src", site_url + "storage/front/img/cards/" + data.t1[0].C3 + ".png");
                    }

                    if (data.t1[0].C1 != 1 && data.t1[0].C2 != 1 && data.t1[0].C3 != 1) {
                        var c1 = data.t1[0].C1;
                        var c2 = data.t1[0].C2;
                        var c3 = data.t1[0].C3;


                        c1 = c1.replace('A', 1);
                        c2 = c2.replace('A', 1);
                        c3 = c3.replace('A', 1);

                        c1 = (c1.replace(/[^0-9]/g, '')).substr(-1);
                        c2 = (c2.replace(/[^0-9]/g, '')).substr(-1);
                        c3 = (c3.replace(/[^0-9]/g, '')).substr(-1);

                        var c_arr = [c1, c2, c3].sort();

                        var result = ((Number(c1) + Number(c2) + Number(c3)).toString()).substr(-1);

                        var result_html = ' ' + c_arr[0] + '' + c_arr[1] + '' + c_arr[2] + ' - ' + result;
                        $('#result-desc').html(result_html).show();
                    } else {
                        $('#result-desc').html('').hide();
                    }
                }
                clock.setValue(data.t1[0].autotime);

                $(".round_no").text(data.t1[0].mid == 0 ? 0 : data.t1[0].mid);
                $("#casino_event_id").val(data.t1[0].mid == 0 ? 0 : data.t1[0]);
                eventId = data.t1[0].mid == 0 ? 0 : data.t1[0].mid;

                for (var j in data['t2']) {
                    selectionid = parseInt(data['t2'][j].sid);

                    b1 = 9;



                    markettype = "WORLI3";

                    $(".market_" + selectionid + "_b_btn").attr("side", "Back");
                    $(".market_" + selectionid + "_b_btn").attr("selectionid", selectionid);
                    $(".market_" + selectionid + "_b_btn").attr("marketid", selectionid);

                    $(".market_" + selectionid + "_b_btn").attr("eventid", eventId);
                    $(".market_" + selectionid + "_b_btn").attr("markettype", markettype);
                    $(".market_" + selectionid + "_b_btn").attr("event_name", markettype);
                    $(".market_" + selectionid + "_b_btn").attr("fullmarketodds", b1);
                    $(".market_" + selectionid + "_b_btn").attr("fullfancymarketrate", b1);

                    gstatus = data['t2'][j].gstatus.toString();
                    if (gstatus == "SUSPENDED" || gstatus == "0") {
                        $(".market_" + selectionid + "_row").addClass("suspended");
                    } else {
                        $(".market_" + selectionid + "_row").removeClass("suspended");
                    }
                }
            }
        });
        socket.on('gameResult', function(args) {
             if (args.data) {
                        updateResult(args.data);
                    } else {
                        updateResult(args['res']);
                    }
        });
        socket.on('error', function(data) {});
        socket.on('close', function(data) {});
    }

    function getType(data) {
        var data1 = data;
        if (data) {
            data = data.split('SS');
            if (data.length > 1) {
                var obj = {
                    type: '[',
                    color: 'red',
                    card: data[0]
                }
                return obj;
            } else {
                data = data1;
                data = data.split('DD');
                if (data.length > 1) {
                    var obj = {
                        type: '{',
                        color: 'red',
                        card: data[0]
                    }
                    return obj;
                } else {
                    data = data1;
                    data = data.split('HH');
                    if (data.length > 1) {
                        var obj = {
                            type: ']',
                            color: 'black',
                            card: data[0]
                        }
                        return obj;
                    } else {
                        data = data1;
                        data = data.split('CC');
                        if (data.length > 1) {
                            var obj = {
                                type: '}',
                                color: 'black',
                                card: data[0]
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



    function updateResult(data) {
        if (data && typeof data == "object") {
             data = JSON.parse(JSON.stringify(data));
            resultGameLast = data[0].mid;

           

            html = "";
            // var ab = "";
            // var ab1 = "";
            casino_type = "'worli3'";
           data.forEach((runData) => {

                ab = "result-b";
                ab1 = "R";

                eventId = runData.mid == 0 ? 0 : typeof runData.mid == "string" ? runData.mid.split(".")[1] : runData.mid;
                html += '<span onclick="view_casiono_result(' + eventId + ',' + casino_type + ')"  class="ball-runs  ' + ab + ' last-result">' + ab1 + '</span>';
            });
            $("#last-result").html(html);
            if (oldGameId == 0 || oldGameId == resultGameLast) {
                // $("#card_c1").attr("src", site_url + "storage/front/img/cards/1.png");
                // $("#card_c2").attr("src", site_url + "storage/front/img/cards/1.png");
                // $("#card_c3").attr("src", site_url + "storage/front/img/cards/1.png");
            }
        }
    }

    function teenpatti(type) {
        gameType = type
        websocket();
    }

    teenpatti("ok");
</script>
<script>
    function view_casiono_result(event_id, casino_type) {

        $("#cards_data").html("");
        $("#round_no").text(event_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo MASTER_URL; ?>/reports/Casino_results/get_result/worli3/' + event_id,
            dataType: 'json',
            data: {event_id: event_id, casino_type: casino_type},
            success: function (response) {
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
            url: MASTER_URL + '/live-market/worli3/active_bets/worli3/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/worli3/view_more_matched/worli3/' + get_round_no(),
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
            url: MASTER_URL + '/live-market/worli3/market-analysis/worli3/' + get_round_no(),
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

<script>
const tooltipBtn = document.getElementById("tooltipBtn");
const tooltipClose = document.getElementById("tooltipClose");

tooltipBtn.addEventListener("click", function(e) {
    // Prevent closing when clicking inside tooltip-box
    if (!e.target.closest('.tooltip-box')) {
        this.classList.toggle("show-tooltip");
    }
});

// Close button action
tooltipClose.addEventListener("click", function(e) {
    e.stopPropagation(); // Prevent triggering the main click event
    tooltipBtn.classList.remove("show-tooltip");
});
</script>