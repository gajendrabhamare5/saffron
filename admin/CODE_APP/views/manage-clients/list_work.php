<?php
defined('BASEPATH') or exit('No direct script access allowed');
$agent_id = $handler->layout['agent_id'];
?>
<style>
    /*    .input-group{
            margin: 10px 0;
        }*/

    /*    th {
            white-space: nowrap;
        }*/

    .btn-default {
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }

    .btn-default:hover,
    .btn-default:focus,
    .btn-default:active,
    .btn-default.active,
    .open>.dropdown-toggle.btn-default {
        color: #333;
        background-color: #e6e6e6;
        border-color: #adadad;
    }

    .btn-custom-button {
        cursor: pointer;
        background: #444;
        padding: 5px 10px;
        text-decoration: none;
        color: #fff;
        border-radius: 3px;
        margin-right: 3px;
        text-transform: uppercase;
        display: inline-block;
        border: none;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link {
        color: #495057;
    }

    /* ////////////// */

   #clientListTable{
    border:unset;
   }

   /* Container */
.dataTables_paginate {
    text-align: right;
    margin-top: 20px;
}

/* All pagination buttons */
.dataTables_paginate .paginate_button {
    background-color: #fff !important; /* dark background */
    color: #ced4da !important;
    border: none !important;
    padding: 6px 12px;
    margin: 0 2px;
    border-radius: 4px;
    font-weight: bold;
    cursor: pointer;
}

/* Active Page Button */
.dataTables_paginate .paginate_button.current {
    background: unset !important;
    background-color: #ae4600 !important; /* Teal active background */
    color: white !important;
    border-radius: 4px;
}

/* Hover effect */
/* .dataTables_paginate .paginate_button:hover {
    background-color: #666 !important;
} */

/* Disable default borders on pagination container */
.dataTables_wrapper .dataTables_paginate .paginate_button {
    box-shadow: none !important;
}

#top-controls {
  flex-wrap: wrap;
  gap: 15px;
  margin-bottom: unset !important;
}

.custom-dt-select{
    display: inline-block;
    width: 100%;
    height: calc(1.5em + 0.94rem + 2px);
    padding: 0.47rem 1.75rem 0.47rem 0.75rem;
    font-size: 0.8125rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
    background: #fff url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='8' height='10' viewBox='0 0 8 10'><path fill='%23343a40' d='M4 0L0 4h8zM4 10L0 6h8z'/></svg>") 
    no-repeat right 0.75rem center / 8px 10px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;

    height: calc(1.5em + 0.5rem + 2px);
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
    padding-left: 0.5rem;
    font-size: 0.7109375rem;
}

.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 500;
    color: #0056b3;
}

.nav-tabs .nav-link{
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 500;
}

.buttons-pdf {
    background-color: #cb0606;
    color: #fff;
    box-shadow: 0 5px 6px -6px #000;
    border: 1px solid #cb0606;
    height: 34px;
    cursor: pointer;
    /* font-size: 1rem; */
    line-height: 1.5;
    padding: .375rem .75rem;
    border-radius: 0.25rem;
}

.buttons-excel {
    background-color: #217346;
    color: #fff;
    box-shadow: 0 5px 6px -6px #000;
    border: 1px solid #217346;
    height: 34px;
    cursor: pointer;
    padding: 8px 6px;
    line-height: 1.5;
    padding: .375rem .75rem;
    border-radius: 0.25rem;
}

.label {
    font-family: "Roboto Condensed", sans-serif;
}

.popup-box {
    background-color: #ddd;
    border: 1px solid #666;
    float: left;
    margin: 1px 2px 0;
    min-width: 48%;
    text-align: right;
    height: calc(1.5em + 0.94rem + 2px);
    width: 100%;
    padding: 0.47rem 0.75rem;
    line-height: 1.5;
    color: #495057;
}

.custom-modal-label{
    padding-top: calc(0.47rem + 1px);
    padding-bottom: calc(0.47rem + 1px);
    margin-bottom: 0;
    font-size: inherit;
    line-height: 1.5;
}

.modal-dialog{
    max-height: calc(100% - 3.5rem);
    /* max-width: 530px; */
}

.modal-body {
    background-color: transparent;
    overflow-y: auto;
    overflow-x: hidden;
    max-height: calc(100vh - 58px);
}

.modal-content input {
    background-color: #fff;
    border: 1px solid #666;
    float: left;
    margin: 1px 2px 0;
    min-width: 48%;
    text-align: right;
    height: calc(1.5em + 0.94rem + 2px);
    width: 100%;
    padding: 0.47rem 0.75rem;
    line-height: 1.5;
    color: #495057;
    border-radius: 0.25rem;

    width: 100%;
    border: 1px solid #ced4da;

}

.modal-content textarea {
    background-color: #fff;
    border: 1px solid #666;
    float: left;
    margin: 1px 2px 0;
    min-width: 48%;
    text-align: right;
    height: calc(1.5em + 0.94rem + 2px);
    width: 100%;
    padding: 0.47rem 0.75rem;
    line-height: 1.5;
    color: #495057;
    border-radius: 0.25rem;

    width: 100%;
    border: 1px solid #ced4da;
    height: auto;
}

.table-responsive{
        overflow-x: hidden;
    }

    .toast-container {
  position: fixed;
  z-index: 999999;
}

.toast-message{
    color: #000;
}
.toast-title{
    color: #000;
    font-size: 14px;
}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<div class="col-md-12 main-container">
    <div class="listing-grid">
        <div class="detail-row">
            <div class="row">
                <div class="col-md-6 m-b-10">
                    <h2 class="d-inline-block">Account List</h2>
                </div>
                <?php

                $user_data = $this->users->data();
                $user_power = $user_data['power'];

                if ($user_power != 6) {


                    if (empty($agent_id)) { ?>
                        <div class="col-md-6 float-right m-b-10">
                            <p class="text-right">
                                <a href="<?php echo MASTER_URL; ?>/manage-clients/add" class="btn btn-diamond">Add Account </a>
                            </p>
                        </div>
                <?php }
                }

                ?>
                
            </div>
        </div>
         <div class="d-flex justify-content-between align-items-center mb-2">
                         
                            <div id="lengthMenuContainer">
  <label>
    Show 
    <select id="customLengthMenu" class="form-control d-inline-block" style="width:auto; display:inline-block;">
      <option value="25" selected>25</option>
      <option value="50">50</option>
      <option value="100">100</option>
      <option value="250">250</option>
      <option value="500">500</option>
      <option value="750">750</option>
      <option value="1000">1000</option>
    </select>
    entries
  </label>
</div>
                           
                                <div id="tickets-table_filter" class="dataTables_filter text-md-right">
                                    <label class="d-inline-flex align-items-center"> Search:
                                        <input  type="text" placeholder="Search..." class="form-control form-control-sm ml-2 form-control" id="search-common">
                                        <button type="button" id="btn-load" class="btn btn-diamond ml-2">Load</button> 
                                        <button type="button" id="btn-reset" class="btn btn-secondary ml-2">Reset</button>
                                    </label>
                                </div>
                            
                    </div>
                
                    <ul class="nav nav-tabs d-inline-block" role="tablist ">
                        <li class="nav-item d-inline-block">
                            <a class="nav-link active" data-toggle="tab" href="#active-user" onclick="tab_view('1')">Active User
                            </a>
                        </li>
                        <li class="nav-item d-inline-block">
                            <a class="nav-link" data-toggle="tab" href="#active-user" onclick="tab_view('0')">Deactive User
                            </a>
                        </li>
                    </ul>
        <div class='table-responsive tab-content' style="margin-top: 20px;">
                
            <div id="active-user" class="tab-pane active">
                <table id="clientListTable" class="table table-striped  table-bordered " style="width:100%;overflow: auto;">
                   
                
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Credit Reference</th>
                            <th>Balance</th>
                            <th>Client (P/L)</th>
                            <th>Exposure</th>
                            <th>Available Balance</th>
                            <th class="noExport">U St</th>
                            <th class="noExport">B St</th>
                            <?php if ($handler->layout['user_data']['power'] == 5) { ?>
                                <th class="noExport" style="padding-left: 0px;padding-right: 0px;">Cricket</th>
                                <th class="noExport" style="padding-left: 0px;padding-right: 0px;">Soccer</th>
                                <th class="noExport" style="padding-left: 0px;padding-right: 0px;">Tennis</th>
                                <th class="noExport" style="padding-left: 0px;padding-right: 0px;">Video</th>
                            <?php } ?>
                            <th style="min-width:60px;max-width:60px;">Exposure Limit</th>
                            <th>Default %</th>
                            <th>Account Type</th>
                            <th class="noExport" style="min-width:150px;max-width:150px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="manage_user_tbody"></tbody>
                </table>
            </div>
            
        </div>
        <div class="row m-t-10 m-b-10">
            <div class="col-md-6">
            </div>
            <div class="col-md-6" id="pagination">
            </div>
        </div>
    </div>

    <div class="modal fade" id="generate-modal">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Generate Points</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" method="post" name="generate_form" id="generate_form">
                    <div class="modal-body">
                        <div class="modal_error"></div>
                        <div class="box-body">
                            <input type="hidden" name="generate_user_id" id="generate_user_id">

                            <div class="row m-b-20">
                                <div class="col-md-4">
                                    <label id="generate-user-second"></label>
                                </div>
                                <div class="col-md-8">
                                    <span class="popup-box" id="generate-second"></span>
                                    <span class="popup-box" id="generate-second-diff"></span>
                                </div>
                            </div>
                            <div class="input-group" style="margin-top: 10px;">
                                <label class="input-group-addon" id="label-generate_amount" for="generate_amount" style="width: 36%">Points</label>
                                <input type="text" class="form-control" id="generate_amount" name="generate_amount" placeholder="Enter Points">
                            </div>
                            <div class="input-group" style="margin-top: 10px;">
                                <span class="input-group-addon" style="width: 36%">Transaction Password</span>
                                <input type="password" class="form-control" id="generate_master_password" name="generate_master_password" placeholder="Transaction Password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pull-right">
                        <button class="btn btn-success" type="button" data-dismiss="modal"><i class="fa fa-undo" aria-hidden="true"></i> Back</button>
                        <button class="btn btn-submit" type="submit" id="btn-generate_points"> Submit <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deposit-modal">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deposit</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" method="post" name="deposit_form" id="deposit_form">
                    <div class="modal-body p-0">
                        <div class="modal_error"></div>
                        <div class="box-body">
                            <input type="hidden" name="deposit_user_id" id="deposit_user_id">
                            <div class="container-fluid">
                                <div class="row m-b-15">
                                    <div class="col-md-4">
                                        <label class="deposite-user-first custom-modal-label"></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                         <div class="col-6">
                                        <span class="popup-box" id="deposite-first"></span>
                                         </div>
                                            <div class="col-6">
                                        <span class="popup-box" id="deposite-first-diff"></span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row m-b-15">
                                    <div class="col-md-4">
                                        <label class="deposite-user-second custom-modal-label">JJIPL01</label>
                                    </div>
                                    <div class="col-md-8">
                                          <div class="row">
                                            <div class="col-6">
                                        <span class="popup-box" id="deposite-second">2000.00</span>
                                          </div>
                                            <div class="col-6">
                                        <span class="popup-box" id="deposite-second-diff"></span>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row m-b-15">
                                    <div class="col-md-4">
                                        <label class="custom-modal-label">Amount</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" class="text-right maxlength10" id="deposit_amount" name="deposit_amount" required="" min="0" max="9999999999" step=".01" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="row m-b-15">
                                    <div class="col-md-4">
                                        <label class="custom-modal-label">Remark</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea value="" id="deposit_remark" name="deposit_remark"  placeholder="Remark"></textarea>
                                    </div>
                                </div>
                                <div class="row m-b-15">
                                    <div class="col-md-4">
                                        <label class="custom-modal-label">Transaction Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="Password" name="deposit_master_password" id="deposit_master_password" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pull-right p-0 pb-1">
                        <button class="btn btn-back" type="button" data-dismiss="modal"><i class="fa fa-undo" aria-hidden="true"></i> Back</button>
                        <button class="btn btn-submit" type="submit"> Submit <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="withdrawal-modal">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Withdrawal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" method="post" name="withdrawal_form" id="withdrawal_form">
                    <div class="modal-body p-0">
                        <div class="modal_error"></div>
                        <div class="box-body">
                            <input type="hidden" name="withdrawal_user_id" id="withdrawal_user_id">
                            <div class="container-fluid">
                                <div class="row m-b-15">
                                    <div class="col-md-4">
                                        <label class="withdraw-user-first  ustom-modal-label"></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-6">
                                         <span class="popup-box" id="withdraw-first">94621.42</span>
                                           </div>
                                            <div class="col-6">
                                          <span class="popup-box" id="withdraw-first-diff"></span> 
                                        </div>
                                         </div>
                                        </div>
                                </div>
                                <div class="row m-b-15">
                                    <div class="col-md-4">
                                        <label class="withdraw-user-second ustom-modal-label">JJIPL01</label>
                                    </div>
                                    <div class="col-md-8"> 
                                         <div class="row">
                                            <div class="col-6">
                                        <span class="popup-box" id="withdraw-second">2000.00</span> 
                                          </div>
                                            <div class="col-6">
                                        <span class="popup-box" id="withdraw-second-diff"></span> 
                                         </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-b-15">
                                    <div class="col-md-4">
                                        <label class="ustom-modal-label">Amount</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="withdrawal_amount" name="withdrawal_amount" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="row m-b-15">
                                    <div class="col-md-4">
                                        <label class="ustom-modal-label">Remark</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" id="withdrawal_remark" name="withdrawal_remark" placeholder="Enter Remark"></textarea>
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>Transaction Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" name="withdrawal_master_password" id="withdrawal_master_password" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer  p-0 pb-1">
                        <button class="btn btn-back" type="button" data-dismiss="modal"><i class="fa fa-undo" aria-hidden="true"></i> Back</button>
                        <button class="btn btn-submit" type="submit"> Submit <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exposure_limit-modal">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Exposure Limit</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" method="post" name="exposure_limit-form" id="exposure_limit-form">
                    <div class="modal-body">
                        <div class="modal_error"></div>
                        <div class="box-body">
                            <input type="hidden" name="exposure_limit-user_id" id="exposure_limit-user_id">


                            <div class="container-fluid">
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>Old Limit</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span class="popup-box popup-box-full" id="old_exposure_limit-amount">0.00</span>
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>New Limit</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" class="text-right maxlength10" id="exposure_limit-amount" name="exposure_limit-amount" required="" min="0" max="9999999999">
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>Transaction Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="Password" name="exposure_limit-master_password" id="exposure_limit-master_password" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-back" type="button" data-dismiss="modal"><i class="fa fa-undo" aria-hidden="true"></i> Back</button>
                        <button class="btn btn-submit" type="submit"> Submit <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="credit_reference-modal">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Credit</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" method="post" name="credit_reference-form" id="credit_reference-form">
                    <div class="modal-body">
                        <div class="modal_error"></div>
                        <div class="box-body">
                            <input type="hidden" name="credit_reference-user_id" id="credit_reference-user_id">


                            <div class="container-fluid">
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>Old Credit</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span class="popup-box popup-box-full" id="old_credit_reference-amount">0.00</span>
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>New Credit</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" class="text-right maxlength12" id="credit_reference-amount" name="credit_reference-amount" required="" min="0" max="999999999999">
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>Transaction Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="Password" name="credit_reference-master_password" id="credit_reference-master_password" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-back" type="button" data-dismiss="modal"><i class="fa fa-undo" aria-hidden="true"></i> Back</button>
                        <button class="btn btn-submit" type="submit"> Submit <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="min_max_odds-modal">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Min-Max Odds</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" method="post" name="min_max_odds-form" id="min_max_odds-form">
                    <div class="modal-body">
                        <div class="modal_error"></div>
                        <div class="box-body">
                            <input type="hidden" name="min_max_odds-user_id" id="min_max_odds-user_id">


                            <div class="container-fluid">
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>Minimum Odds</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" class="text-right maxlength12" id="min_max_odds-min" name="min_max_odds-min" required="" min="0" max="999999999999" placeholder="Lay Odds">
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>Maximum Odds</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" class="text-right maxlength12" id="min_max_odds-max" name="min_max_odds-max" required="" min="0" max="999999999999" placeholder="Back Odds">
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>Transaction Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="Password" name="min_max_odds-master_password" id="min_max_odds-master_password" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-back" type="button" data-dismiss="modal"><i class="fa fa-undo" aria-hidden="true"></i> Back</button>
                        <button class="btn btn-submit" type="submit"> Submit <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="change_status-modal">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Status</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form role="form" method="post" class="form-horizontal" name="change_status-form" id="change_status-form">

                    <div class="m-t-20">
                        <div class="col-md-12">
                            <div class="user-name">
                                <p id="change_status-username">JJIPL01</p>
                            </div>
                            <div class="float-right user-status">
                                <p class="text-success" id="user-active-diff-s" style="">Active</p>
                                <p class="text-danger" id="user-active-diff-f" style="display: none">Inactive</p>
                            </div>
                        </div>
                    </div>

                    <ul class="status col-md-12 text-center m-t-20">
                        <div class="row">
                            <li class="col-md-6">
                                <h4>User Active</h4>
                                <label class="switch">
                                    <input name="change_status-account" id="change_status-account" type="checkbox">
                                    <div id="s-account" class="slider">
                                        <span>On</span>
                                        <span>Off</span>
                                    </div>
                                </label>
                            </li>
                            <li class="col-md-6">
                                <h4>Bet Active</h4>
                                <label class="switch">
                                    <input name="change_status-bet" id="change_status-bet" type="checkbox">
                                    <div id="s-bet" class="slider">
                                        <span>On</span>
                                        <span>Off</span>
                                    </div>
                                </label>
                            </li>
                        </div>
                    </ul>

                    <div class="modal-body">
                        <div class="modal_error"></div>
                        <div class="modal-body m-t-20">
                            <input type="hidden" name="change_status-user_id" id="change_status-user_id">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Transaction Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" name="change_status-master_password" id="change_status-master_password" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="button" data-dismiss="modal"><i class="fa fa-undo" aria-hidden="true"></i> Back</button>
                        <button class="btn btn-info btn-submit" type="submit"> Submit <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="change_access-modal">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Super Master Access</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form role="form" method="post" class="form-horizontal" name="change_access-form" id="change_access-form">

                    <ul class="status col-md-12 text-center m-t-20">
                        <div class="row">
                            <li class="col-md-6">
                                <h4>Cricket</h4>
                                <label class="switch">
                                    <input name="cricket_access" id="cricket_access" type="checkbox">
                                    <div id="a-cricket_access" class="slider">
                                        <span>On</span>
                                        <span>Off</span>
                                    </div>
                                </label>
                            </li>
                            <li class="col-md-6">
                                <h4>Soccer</h4>
                                <label class="switch">
                                    <input name="soccer_access" id="soccer_access" type="checkbox">
                                    <div id="a-soccer_access" class="slider">
                                        <span>On</span>
                                        <span>Off</span>
                                    </div>
                                </label>
                            </li>
                        </div>
                        <div class="row">
                            <li class="col-md-6">
                                <h4>Tennis</h4>
                                <label class="switch">
                                    <input name="tennis_access" id="tennis_access" type="checkbox">
                                    <div id="a-tennis_access" class="slider">
                                        <span>On</span>
                                        <span>Off</span>
                                    </div>
                                </label>
                            </li>
                            <li class="col-md-6">
                                <h4>Casino</h4>
                                <label class="switch">
                                    <input name="video_access" id="video_access" type="checkbox">
                                    <div id="a-video_access" class="slider">
                                        <span>On</span>
                                        <span>Off</span>
                                    </div>
                                </label>
                            </li>
                        </div>
                    </ul>

                    <div class="modal-body">
                        <div class="modal_error"></div>
                        <div class="modal-body m-t-20">
                            <input type="hidden" name="change_access-user_id" id="change_access-user_id">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Transaction Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" name="change_access-master_password" id="change_access-master_password" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="button" data-dismiss="modal"><i class="fa fa-undo" aria-hidden="true"></i> Back</button>
                        <button class="btn btn-info" type="submit"> Submit <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changepwd-modal">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form role="form" method="post" name="changepwd_form" id="changepwd_form">
                    <div class="modal-body">
                        <div class="modal_error"></div>
                        <div class="box-body">
                            <input type="hidden" name="changepwd_user_id" id="changepwd_user_id">

                            <div class="container-fluid">
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>New Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" class="text-right" id="changepwd_password" name="changepwd_password" required="" maxlength="20">
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>Confirm Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="Password" class="text-right" id="changepwd_cpassword" name="changepwd_cpassword" required="" maxlength="20">
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <label>Transaction Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" id="changepwd_master_password" name="changepwd_master_password" required="" maxlength="20">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-back" type="button" data-dismiss="modal"><i class="fa fa-undo" aria-hidden="true"></i> Back</button>
                        <button class="btn btn-submit" type="submit"> Submit <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

<script type="text/javascript">
    var user_status=1;
    function tab_view(status) {

        user_status = status;
        console.log(user_status);
        call_page();

    }

    var xhr, xhr_gud, xhr_act, xhr_sel, xhr_cs, xhr_cp, xhr_scr;
    var _agent_id = '<?php echo $agent_id; ?>';

    function set_search_single(field_name, field_val) {
        if ($.trim(field_name) != "" && $.trim(field_val) != "") {
            return ("&" + $.trim(field_name) + "=" + $.trim(field_val));
        } else {
            return "";
        }
    }

    function preparesearch() {
        var search_string = "";
        search_string += set_search_single("common_search", $('#search-common').val());
        search_string += set_search_single("from_date", $('#search-from_date').val());
        search_string += set_search_single("to_date", $('#search-to_date').val());
        search_string += set_search_single("agent_id", _agent_id);
        return search_string;
    }

    function prepareorderby() {
        var data = '';
        if ($('.btn-orderby.active').length > 0) {
            data += set_search_single("orderby", $('.btn-orderby.active').attr('data-order'));
            data += set_search_single("sort", $('.btn-orderby.active').attr('data-sort'));
        }
        return data;
    }

    function resetorderby() {
        $('.btn-orderby').attr({
            'src': MASTER_URL + '/assets/images/sort_both.png',
            'data-sort': ''
        });
        $('.btn-orderby').removeClass('active');
    }

    var dataTable;
    function call_page(limit_page, orderby) {
        $('#divLoading').addClass('show');

        var user2 = 'show';
        var limit = limit_page || 0;
     
        var postdata = preparesearch() + prepareorderby();
        if (xhr && xhr.readyState != 4)
            xhr.abort();
        xhr = $.ajax({
            url: MASTER_URL + '/manage_clients/get_user_list/' + limit+'/'+user_status+'/'+user2,
            type: 'POST',
            dataType: 'json',
            data: postdata,
            success: function(data) {
                // console.log("data",data.result);
                
                if (typeof(data.result) != "undefined") {
                    $('#manage_user_tbody').html('');
                    // $("#clientListTable").DataTable().destroy();
                    //$('#pagination').html(data.links);
                     if ($.fn.DataTable.isDataTable('#clientListTable')) {
                    dataTable.destroy();
                }
                    $('#manage_user_tbody').html(data.result);
                    dataTable =   $('#clientListTable').DataTable({
                        "scrollX": true,
                        "ordering": false,
                        "searching": false,
                        "lengthMenu": [25, 50, 100, 250, 500, 750, 1000],
                        "pageLength": 25,
                       
                         dom: 'Brtip',
                      

                        buttons: [{
                            extend: 'pdfHtml5',
                            // exportOptions: {
                            //     columns: ':not(.noExport)'
                            // }
                            text: ' PDF',
                            className: 'btn btn-danger'
                        }, {
                            extend: 'excelHtml5',
                            // exportOptions: {
                            //     columns: ':not(.noExport)'
                            // }
                             text: ' Excel',
                            className: 'btn btn-success'
                        }],
                         initComplete: function() {
                        $('#divLoading').removeClass('show');
$('#customLengthMenu').off('change').on('change', function() {
      const length = parseInt($(this).val(), 10);
      dataTable.page.len(length).draw();
    });
                    },

                        "drawCallback": function() {
                            $('.dataTables_paginate > a,.dataTables_paginate span a').addClass('button btn btn-diamond').removeClass('paginate_button');
                        }
                    });

                       
                }else{
                    console.log("else");
                    
                }
            }
        });
        // $('.custom-search').html($('#tickets-table_filter'));
        // $('.tab-container').html($('.nav-tabs'));
    }


    $(document).ready(function() {

        call_page();
        $('#pagination').delegate('a', 'click', function() {
            var page = $(this).attr('href').split('/');
            if ($.trim(page) != '') {
                page = page[page.length - 1];
                call_page(page);
            }
            return false;
        });
        $('.btn-orderby').on('click', function() {

            var order_sort = 'ASC',
                src = 'sort_asc';
            if ($(this).attr('data-sort') == 'ASC') {
                order_sort = 'DESC', src = 'sort_desc';
            }

            resetorderby();
            $(this).attr({
                'src': MASTER_URL + '/assets/images/' + src + '.png',
                'data-sort': order_sort
            });
            $(this).addClass('active');
            call_page();
        });

        // $('#search-common').on('keyup', function() {
        //     call_page(0);
        // });

        // $('#form-search').on('reset', function() {
        //     resetorderby();
        //     setTimeout(function() {
        //         call_page(0);
        //     }, 1);
        // });

         // Load button search
    $('#btn-load').on('click', function () {
        call_page(0);
    });

    // Reset button search
    $('#btn-reset').on('click', function () {
        $('#search-common').val(''); // clear search box
        resetorderby();
        call_page(0); // reload with all data
    });

        $('#transfer-form').on('submit', function() {
            var transferData = $('#transfer-form').serialize();
            $.ajax({
                type: 'POST',
                url: 'manage_clients/transfer_amount',
                data: transferData,
                dataType: 'JSON',
                success: function(data) {
                    // alert(data.text);
                    if (data.status == 'ok') {
                        setTimeout(function() {
                            $('#transfer-form').trigger('reset');
                            $('#transfer_modal').modal('hide');
                        }, 4000);
                         toastr.clear()
                        toastr.success("", data.text, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        call_page();
                    }else{
                         toastr.clear()
                        toastr.warning("", data.text, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                    }
                }
            });
            return false;
        });
        $('#manage_user_tbody').delegate('.btn_deposit_modal', 'click', function() {
            var id = $(this).attr('id');
            $('#deposit_user_id').val(id);
            $('.deposite-user-second').text('');
            $('#deposite-second').text('');
            $('#deposit_remark').val('');
            $('#deposit_master_password').val('');
            $('#deposit_form').find('.modal_error').html('');
            if (xhr_gud && xhr_gud.readyState != 4)
                xhr_gud.abort();
            xhr_gud = $.ajax({
                url: MASTER_URL + '/ajax/common/getuserdata',
                type: 'POST',
                dataType: 'json',
                data: '&id=' + id,
                success: function(data) {
                    $('.deposite-user-second').text(data.result.Email_ID);
                    var balance = (data.result.account_balance === null) ? 0 : data.result.account_balance;
                    $('#deposite-second').text(balance);

                    $('.deposite-user-first').text(data.result.fisrt_name);
                    $('#deposite-first').text(data.result.fisrt_balance);

                    $('#label-deposit_amount').trigger('click');
                }
            });
            $('#deposit-modal').modal('show');
        });

        $('#manage_user_tbody').delegate('.btn_odds_modal', 'click', function() {
            var id = $(this).attr('id');
            $('#min_max_odds-user_id').val(id);
            $('#min_max_odds-min').val('');
            $('#min_max_odds-max').val('');
            $('#min_max_odds_master_password').val('');
            $('#min_max_odds_form').find('.modal_error').html('');
            if (xhr_gud && xhr_gud.readyState != 4)
                xhr_gud.abort();
            xhr_gud = $.ajax({
                url: MASTER_URL + '/ajax/common/getuserdata',
                type: 'POST',
                dataType: 'json',
                data: '&id=' + id,
                success: function(data) {

                    $('#min_max_odds-min').val(data.result.minimum_odds);
                    $('#min_max_odds-max').val(data.result.maximum_odds);
                    $('#label-odds').trigger('click');
                }
            });
            $('#min_max_odds-modal').modal('show');
        });

        $('#manage_user_tbody').delegate('.btn_change_password', 'click', function() {
            var id = $(this).attr('id');
            $('#changepwd_user_id').val(id);
            $('#changepwd_username').val('');
            $('#changepwd_password').val('');
            $('#changepwd_cpassword').val('');
            $('#changepwd_master_password').val('');
            $('#changepwd_form').find('.modal_error').html('');
            if (xhr_gud && xhr_gud.readyState != 4)
                xhr_gud.abort();
            xhr_gud = $.ajax({
                url: MASTER_URL + '/ajax/common/getuserdata',
                type: 'POST',
                dataType: 'json',
                data: '&id=' + id,
                success: function(data) {
                    $('#changepwd_username').val(data.result.Email_ID);
                    var balance = (data.result.account_balance === null) ? 0 : data.result.account_balance;
                    $('#changepwd_balance').val(balance);
                }
            });
            $('#changepwd-modal').modal('show');
        });

        $('#deposit_form').on('input', '#deposit_amount', function() {

            var deposit_amount = Number($(this).val());
            var deposite_second = Number($('#deposite-second').text());
            var deposite_second_diff = deposite_second + deposit_amount;
            $('#deposite-second-diff').text(deposite_second_diff);

            var deposite_first = Number($('#deposite-first').text());
            var deposite_first_diff = deposite_first - deposit_amount;
            $('#deposite-first-diff').text(deposite_first_diff);
        });

        $('#deposit_form').on('submit', function() {

            var user_id = $('#deposit_user_id').val();
            var amount = $('#deposit_amount').val();
            var remark = $('#deposit_remark').val();
            var master_password = $('#deposit_master_password').val();
            if ((master_password).trim() == '') {
                var error = '<div class="alert alert-danger alert-dismissible">' +
                    '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                    '    <strong>Error!</strong> The Transaction Password field is required.' +
                    '</div>';
                $('#deposit_form').find('.modal_error').html(error);
                return false;
            }

            $('#deposit-modal .btn-submit').attr('disabled', true);
            var data = "&user_name=" + user_id + "&transaction_points=" + amount + "&remark=" + remark + "&transaction_type=1&master_password=" + master_password;
            if (xhr_act && xhr_act.readyState != 4)
                xhr_act.abort();
            xhr_act = $.ajax({
                url: MASTER_URL + '/manage-clients/account_transaction',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(rdata) {
                    $('#deposit-modal .btn-submit').attr('disabled', false);
                    // alert(rdata.message);
                    if (rdata.status == 'ok') {
                        setTimeout(function() {
                            $('#deposit-modal').modal('hide');
                            $('#deposit_amount').val('0');
                        }, 1000);
                        toastr.clear()
                        toastr.success("", rdata.message, {
                              "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        call_page();
                    }else{
                          toastr.clear()
                        toastr.warning("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });

                        return false;
                    }
                }
            });
            return false;
        });
        $('#manage_user_tbody').delegate('.btn_generate_modal', 'click', function() {
            var id = $(this).attr('id');
            $('#generate_user_id').val(id);
            $('#generate-user-second').text('');
            $('#generate-second').text('');
            $('#generate-second-diff').text('');
            $('#generate_master_password').val('');
            $('#generate_form').find('.modal_error').html('');
            if (xhr_gud && xhr_gud.readyState != 4)
                xhr_gud.abort();
            xhr_gud = $.ajax({
                url: MASTER_URL + '/ajax/common/getuserdata',
                type: 'POST',
                dataType: 'json',
                data: '&id=' + id,
                success: function(data) {
                    $('#generate-user-second').text(data.result.Email_ID);
                    var balance = (data.result.account_balance === null) ? 0 : data.result.account_balance;
                    $('#generate-second').text(balance);
                }
            });
            $('#generate-modal').modal('show');
        });
        $('#manage_user_tbody').delegate('.btn_access_modal', 'click', function() {
            var id = $(this).attr('id');
            $('#change_access-user_id').val(id);
            $('#change_access-username').text('');
            $('#change_access-master_password').val('');
            $('#change_access-form').find('.modal_error').html('');
            if (xhr_gud && xhr_gud.readyState != 4)
                xhr_gud.abort();
            xhr_gud = $.ajax({
                url: MASTER_URL + '/ajax/common/getuserdata',
                type: 'POST',
                dataType: 'json',
                data: '&id=' + id,
                success: function(data) {
                    $('#change_access-username').text(data.result.Email_ID);

                    if (data.result.cricket_access == 1) {
                        $("#cricket_access").prop('checked', true);
                    } else {
                        $("#cricket_access").prop('checked', false);
                    }
                    if (data.result.soccer_access == 1) {
                        $("#soccer_access").prop('checked', true);
                    } else {
                        $("#soccer_access").prop('checked', false);
                    }
                    if (data.result.tennis_access == 1) {
                        $("#tennis_access").prop('checked', true);
                    } else {
                        $("#tennis_access").prop('checked', false);
                    }
                    if (data.result.video_access == 1) {
                        $("#video_access").prop('checked', true);
                    } else {
                        $("#video_access").prop('checked', false);
                    }
                }
            });
            $('#change_access-modal').modal('show');
        });
        $('#generate_form').on('submit', function() {

            var user_id = $('#generate_user_id').val();
            var amount = $('#generate_amount').val();
            var master_password = $('#generate_master_password').val();
            if ((master_password).trim() == '') {
                var error = '<div class="alert alert-danger alert-dismissible">' +
                    '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                    '    <strong>Error!</strong> The Transaction Password field is required.' +
                    '</div>';
                $('#generate_form').find('.modal_error').html(error);
                return false;
            }
            $('#btn-generate_points').attr('disabled', true);
            var data = "&user_name=" + user_id + "&transaction_points=" + amount + "&transaction_type=5&master_password=" + master_password;
            if (xhr_act && xhr_act.readyState != 4)
                xhr_act.abort();
            xhr_act = $.ajax({
                url: MASTER_URL + '/manage-clients/generate_points',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(rdata) {
                    // alert(rdata.message);
                    if (rdata.status == 'ok') {
                        setTimeout(function() {
                            $('#generate-modal').modal('hide');
                            $('#generate_amount').val('0');
                        }, 1000);
                        toastr.clear()
                        toastr.success("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        call_page();
                    }else{
                        toastr.clear()
                        toastr.warning("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        $('#btn-generate_points').attr('disabled', false);
                        return false;
                    }
                }
            });
            return false;
        });
        $('#generate_form').on('input', '#generate_amount', function() {
            var g_amount = Number($(this).val());
            var generate_second = Number($('#generate-second').text());
            var generate_second_diff = generate_second + g_amount;
            $('#generate-second-diff').text((generate_second_diff).toFixed(2));
        });
        $('#manage_user_tbody').delegate('.btn_withdrawal_modal', 'click', function() {
            var id = $(this).attr('id');
            $('#withdrawal_user_id').val(id);
            $('.withdraw-user-second').text('');
            $('#withdraw-second').text('');
            $('#withdrawal_master_password').val('');
            $('#withdrawal_remark').val('');
            $('#withdrawal_form').find('.modal_error').html('');
            if (xhr_gud && xhr_gud.readyState != 4)
                xhr_gud.abort();
            xhr_gud = $.ajax({
                url: MASTER_URL + '/ajax/common/getuserdata',
                type: 'POST',
                dataType: 'json',
                data: '&id=' + id,
                success: function(data) {
                    $('.withdraw-user-first').text(data.result.fisrt_name);
                    $('#withdraw-first').text(data.result.fisrt_balance);

                    $('.withdraw-user-second').text(data.result.Email_ID);
                    var balance = (data.result.account_balance === null) ? 0 : data.result.account_balance;
                    $('#withdraw-second').text(balance);
                }
            });
            $('#withdrawal-modal').modal('show');
        });

        $('#withdrawal_form').on('input', '#withdrawal_amount', function() {

            var withdraw_amount = Number($(this).val());
            var withdraw_second = Number($('#withdraw-second').text());
            var withdraw_second_diff = withdraw_second - withdraw_amount;
            $('#withdraw-second-diff').text((withdraw_second_diff).toFixed(2));

            var withdraw_first = Number($('#withdraw-first').text());
            var withdraw_first_diff = withdraw_first + withdraw_amount;
            $('#withdraw-first-diff').text((withdraw_first_diff).toFixed(2));
        });

        $('#withdrawal_form').on('submit', function() {

            var user_id = $('#withdrawal_user_id').val();
            var amount = $('#withdrawal_amount').val();
            var remark = $('#withdrawal_remark').val();
            var master_password = $('#withdrawal_master_password').val();

            $('#dwithdrawal_form .btn-submit').attr('disabled', true);
            var data = "&user_name=" + user_id + "&transaction_points=" + amount + "&remark=" + remark + "&transaction_type=2&master_password=" + master_password;
            if (xhr_act && xhr_act.readyState != 4)
                xhr_act.abort();
            xhr_act = $.ajax({
                url: MASTER_URL + '/manage-clients/account_transaction',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(rdata) {
                    $('#dwithdrawal_form .btn-submit').attr('disabled', false);
                    // alert(rdata.message);
                    if (rdata.status == 'ok') {
                        setTimeout(function() {
                            $('#withdrawal-modal').modal('hide');
                            $('#withdrawal_amount').val('0');
                        }, 1000);
                         toastr.clear()
                        toastr.success("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        call_page();
                    }else{
                        
                         toastr.clear()
                        toastr.warning("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        return false;
                    }
                }
            });
            return false;
        });
        $('#manage_user_tbody').delegate('.btn_exposure_limit', 'click', function() {
            var id = $(this).attr('id');
            $('#exposure_limit-user_id').val(id);
            $('#exposure_limit-username').val('');
            $('#exposure_limit-balance').val('');
            $('#old_exposure_limit-amount').text('');
            $('#exposure_limit-amount').val('');
            $('#exposure_limit-master_password').val('');
            $('#exposure_limit-form').find('.modal_error').html('');
            if (xhr_gud && xhr_gud.readyState != 4)
                xhr_gud.abort();
            xhr_gud = $.ajax({
                url: MASTER_URL + '/ajax/common/getuserdata',
                type: 'POST',
                dataType: 'json',
                data: '&id=' + id,
                success: function(data) {
                    $('#exposure_limit-username').val(data.result.Email_ID);
                    var balance = (data.result.account_balance === null) ? 0 : data.result.account_balance;
                    $('#exposure_limit-balance').val(balance);
                    $('#old_exposure_limit-amount').text(data.result.net_exposure_limit);
                }
            });
            $('#exposure_limit-modal').modal('show');
        });
        $('#exposure_limit-modal').delegate('#exposure_limit-form', 'submit', function() {
            var id = $('#exposure_limit-user_id').val();
            var amount = $('#exposure_limit-amount').val();
            var master_password = $('#exposure_limit-master_password').val();
            if ((master_password).trim() == '') {
                var error = '<div class="alert alert-danger alert-dismissible">' +
                    '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                    '    <strong>Error!</strong> The Transaction Password field is required.' +
                    '</div>';
                $('#exposure_limit-form').find('.modal_error').html(error);
                return false;
            }

            $('#exposure_limit-modal .btn-submit').attr('disabled', true);
            if (xhr_sel && xhr_sel.readyState != 4)
                xhr_sel.abort();
            xhr_sel = $.ajax({
                url: MASTER_URL + '/manage-clients/set_exposure_limit',
                type: 'POST',
                dataType: 'json',
                data: '&id=' + id + '&amount=' + amount + '&master_password=' + master_password,
                success: function(rdata) {
                    $('#exposure_limit-modal .btn-submit').attr('disabled', false);
                    // alert(rdata.message);

                    if (rdata.status == 'ok') {

                        setTimeout(function() {
                            $('#exposure_limit-modal').modal('hide');
                        }, 1000);
                         toastr.clear()
                        toastr.success("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        call_page();
                    }else{
                         toastr.clear()
                        toastr.warning("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        return false;
                    }

                }
            });
            return false;
        });
        $('#manage_user_tbody').delegate('.btn_credit_reference', 'click', function() {
            var id = $(this).attr('id');
            $('#credit_reference-user_id').val(id);
            $('#credit_reference-username').val('');
            $('#credit_reference-balance').val('');
            $('#old_credit_reference-amount').text('');
            $('#credit_reference-amount').val('');
            $('#credit_reference-master_password').val('');
            $('#credit_reference-form').find('.modal_error').html('');
            if (xhr_gud && xhr_gud.readyState != 4)
                xhr_gud.abort();
            xhr_gud = $.ajax({
                url: MASTER_URL + '/ajax/common/getuserdata',
                type: 'POST',
                dataType: 'json',
                data: '&id=' + id,
                success: function(data) {
                    $('#credit_reference-username').val(data.result.Email_ID);
                    var balance = (data.result.account_balance === null) ? 0 : data.result.account_balance;
                    $('#credit_reference-balance').val(balance);
                    $('#old_credit_reference-amount').text(data.result.credit_reference);
                }
            });
            $('#credit_reference-modal').modal('show');
        });
        $('#credit_reference-modal').delegate('#credit_reference-form', 'submit', function() {
            $('#change_status-form').find('.modal_error').html('');
            var id = $('#credit_reference-user_id').val();
            var amount = $('#credit_reference-amount').val();
            var master_password = $('#credit_reference-master_password').val();
            if ((master_password).trim() == '') {
                var error = '<div class="alert alert-danger alert-dismissible">' +
                    '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                    '    <strong>Error!</strong> The Transaction Password field is required.' +
                    '</div>';
                $('#credit_reference-form').find('.modal_error').html(error);
                return false;
            }
            $('#change_status-form .btn-submit').attr('disabled', true);
            var postdata = '&id=' + id + '&amount=' + amount + '&master_password=' + master_password;
            if (xhr_scr && xhr_scr.readyState != 4)
                xhr_scr.abort();
            xhr_scr = $.ajax({
                url: MASTER_URL + '/manage-clients/set_credit_reference',
                type: 'POST',
                dataType: 'json',
                data: postdata,
                success: function(rdata) {
                    $('#change_status-form .btn-submit').attr('disabled', false);
                    // alert(rdata.message);
                    if (rdata.status == 'ok') {
                        setTimeout(function() {
                            $('#credit_reference-modal').modal('hide')
                        }, 1000);
                          toastr.clear()
                        toastr.success("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });

                        call_page();
                    }else{
                         toastr.clear()
                        toastr.warning("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        return false;
                    }
                }
            });
            return false;
        });
        $('#manage_user_tbody').delegate('.btn_change_status', 'click', function() {
            var id = $(this).attr('id');
            $('#change_status-user_id').val(id);
            $('#change_status-username').text('');
            $('#change_status-master_password').val('');
            $('#change_status-form').find('.modal_error').html('');
            if (xhr_gud && xhr_gud.readyState != 4)
                xhr_gud.abort();
            xhr_gud = $.ajax({
                url: MASTER_URL + '/ajax/common/getuserdata',
                type: 'POST',
                dataType: 'json',
                data: '&id=' + id,
                success: function(data) {
                    $('#change_status-username').text(data.result.Email_ID);

                    if (data.result.Status == 1) {
                        $("#change_status-account").prop('checked', true);
                        $("#change_status-modal #user-active-diff-s").show();
                        $("#change_status-modal #user-active-diff-f").hide();
                    } else {
                        $("#change_status-account").prop('checked', false);
                        $("#change_status-modal #user-active-diff-s").hide();
                        $("#change_status-modal #user-active-diff-f").show();
                    }
                    if (data.result.bet_status == 1) {
                        $("#change_status-bet").prop('checked', true);
                    } else {
                        $("#change_status-bet").prop('checked', false);
                    }
                }
            });
            $('#change_status-modal').modal('show');
        });
        $('#change_status-form').on('submit', function() {

            var id = $('#change_status-user_id').val();
            var accout_status = ($('#change_status-account').is(':checked')) ? 1 : 0;
            var bet_status = ($('#change_status-bet').is(':checked')) ? 1 : 0;
            var master_password = $('#change_status-master_password').val();
            if ((master_password).trim() == '') {
                var error = '<div class="alert alert-danger alert-dismissible">' +
                    '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                    '    <strong>Error!</strong> The Transaction Password field is required.' +
                    '</div>';
                $('#change_status-form').find('.modal_error').html(error);
                return false;
            }

            $('#change_status-form .btn-submit').attr('disabled', true);

            var data = '&id=' + id + '&accout_status=' + accout_status + '&bet_status=' + bet_status + '&master_password=' + master_password;
            if (xhr_cs && xhr_cs.readyState != 4)
                xhr_cs.abort();
            xhr_cs = $.ajax({
                url: MASTER_URL + '/manage-clients/change_status',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(data) {
                    $('#change_status-form .btn-submit').attr('disabled', false);
                    // alert(data.msg);
                    if (data.status == 'ok') {
                        setTimeout(function() {
                            $('#change_status-modal').modal('hide');
                        }, 1000);
                         toastr.clear()
                        toastr.success("", data.msg, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        call_page();
                    }else{
                        toastr.clear()
                        toastr.warning("", data.msg, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        return false;
                    }
                }
            });
            return false;
        });
        $('#change_access-form').on('submit', function() {

            var id = $('#change_access-user_id').val();

            var cricket_access = ($('#cricket_access').is(':checked')) ? 1 : 0;
            var soccer_access = ($('#soccer_access').is(':checked')) ? 1 : 0;
            var tennis_access = ($('#tennis_access').is(':checked')) ? 1 : 0;
            var video_access = ($('#video_access').is(':checked')) ? 1 : 0;

            var master_password = $('#change_access-master_password').val();
            if ((master_password).trim() == '') {
                var error = '<div class="alert alert-danger alert-dismissible">' +
                    '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                    '    <strong>Error!</strong> The Transaction Password field is required.' +
                    '</div>';
                $('#change_status-form').find('.modal_error').html(error);
                return false;
            }

            var data = '&id=' + id + '&cricket_access=' + cricket_access + '&soccer_access=' + soccer_access + '&tennis_access=' + tennis_access + '&video_access=' + video_access + '&master_password=' + master_password;
            if (xhr_cs && xhr_cs.readyState != 4)
                xhr_cs.abort();
            xhr_cs = $.ajax({
                url: MASTER_URL + '/manage-clients/change_access',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(data) {
                    // alert(data.msg);
                    if (data.status == 'ok') {
                        setTimeout(function() {
                            $('#change_access-modal').modal('hide');
                        }, 1000);
                        toastr.clear()
                        toastr.success("", data.msg, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        call_page();
                    }else{
                         toastr.clear()
                        toastr.warning("", data.msg, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        return false;
                    }
                }
            });
            return false;
        });
        $('#changepwd_form').on('submit', function() {
            var postdata = $(this).serialize();
            $('#changepwd_form .btn-submit').attr('disabled', true);
            if (xhr_cp && xhr_cp.readyState != 4)
                xhr_cp.abort();
            xhr_cp = $.ajax({
                url: MASTER_URL + '/manage-clients/changepwd',
                type: 'POST',
                dataType: 'json',
                data: postdata,
                success: function(rdata) {
                    $('#changepwd_form .btn-submit').attr('disabled', false);
                    // alert(rdata.message);

                    if (rdata.status == 'ok') {
                        setTimeout(function() {
                            $('#changepwd-modal').modal('hide');
                        }, 1000);
                        toastr.clear()
                        toastr.success("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        call_page();
                    }else{
                         toastr.clear()
                        toastr.warning("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        return false;
                    }

                }
            });
            return false;
        });

        $('#min_max_odds-form').on('submit', function() {
            var postdata = $(this).serialize();
            $('#min_max_odds-form .btn-submit').attr('disabled', true);
            if (xhr_cp && xhr_cp.readyState != 4)
                xhr_cp.abort();
            xhr_cp = $.ajax({
                url: MASTER_URL + '/manage-clients/set_min_max_odds',
                type: 'POST',
                dataType: 'json',
                data: postdata,
                success: function(rdata) {
                    $('#min_max_odds-form .btn-submit').attr('disabled', false);
                    // alert(rdata.message);

                    if (rdata.status == 'ok') {
                        setTimeout(function() {
                            $('#min_max_odds-modal').modal('hide');
                        }, 1000);

                        $("#min_max_odds-form").get(0).reset();
                        toastr.clear()
                        toastr.success("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        call_page();

                    }else{
                         toastr.clear()
                        toastr.warning("", rdata.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                        return false;
                    }

                }
            });
            return false;
        });
        $('#search-client_name').typeahead({
            source: function(query, process) {
                return $.ajax({
                    type: 'POST',
                    url: 'user_autocomplate',
                    data: {
                        query: query
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        return process(data);
                    }
                });
            }
        });
    });
</script>