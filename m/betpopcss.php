<link href="../toastr/toastr.min.css?31" rel="stylesheet"/>
<script src="../toastr/toastr.min.js?21" type="text/javascript"></script>
<style>
        .odd-stake-box {
        background: #ffffff45;
        padding: 4px;
    }
    .place-bet-modal .stakeinput {
        width: calc(100% - 56px);
        height: 28px;
        float: left;
    }
    .place-bet-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    padding: 4px;
    gap: 2px;
}
.place-bet-modal .place-bet-buttons {
        padding: 0;
    }
    .place-bet-modal .place-bet-buttons .btn-place-bet {
        width: calc(25% - 1.5px);
        background-color: var(--theme2-bg85);
        color: var(--secondary-color);
        border-radius: 0;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
        padding: 5px;
        border: 0;
    font-weight: bold;
    font-size: 14px;
    }
    .place-bet-modal .place-bet-buttons .btn-place-bet {
        width: calc(33.33% - 2px);
    }
    .place-bet-modal {
        padding: 10px;
    }
    .place-bet-btn-box {
        display: flex;
    }
    .place-bet-btn-box .btn {
        width: 25%;
        font-size: 14px;
        font-weight: bold;
    }
    /* .btn-success.disabled, .btn-success:disabled {
    color: #fff;
    background-color: #198754;
    border-color: #198754;
    }
    .btn.disabled, .btn:disabled, fieldset:disabled .btn {
        pointer-events: none;
        opacity: .65;
    } */

    .place-bet-modal .stakeactionminus, .place-bet-modal .stakeactionplus {
        background: var(--theme2-bg);
        height: 28px;
        width: 28px;
        line-height: 28px;
        padding: 0;
        float: left;
        border-radius: 0;
        color: var(--secondary-color);
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
    }
    #market_runner_label img{
        width: 30px;
        margin-right: 10px;
    }
</style>
<script>
    $(document).on('click', '.stackclear', function(e) {
        $("#inputStake").val("");
        $("#profitLiability").html("0");
    });
</script>