<?php
$userdata = $handler->users->data();
?>
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: unset;
}

span.account_bets {
    cursor: pointer;
    background: #444;
    padding: 5px 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 3px;
    margin-right: 3px;
    text-transform: uppercase;
    display: inline-block;
}

span.account_bets1 {
    cursor: pointer;
    background: #444;
    padding: 5px 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 3px;
    margin-right: 3px;
    text-transform: uppercase;
    display: inline-block;
}

a.button.btn.btn-diamond {
    margin: 0 4px 4px 0;
}

.dataTables_paginate {
    text-align: right;
    margin-top: 20px;
}

/* All pagination buttons */
.dataTables_paginate .paginate_button {
    background-color: #fff !important;
    /* dark background */
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
    background-color: #ae4600 !important;
    /* Teal active background */
    color: white !important;
    border-radius: 4px;
}

.previlage-box {
    background-color: #ececec;
    border: 1px solid #ddd;
    display: flex;
    flex-wrap: wrap;
    padding: 10px;
}

.previlage-item {
    min-width: 180px;
    margin-right: 10px;
    margin-bottom: 10px;
}

.custom-control {
    position: relative;
    display: block;
    min-height: 1.21875rem;
    padding-left: 1.5rem;
}

.custom-control-label::after,
.custom-control-label::before {
    width: 20px;
    height: 20px;
    border-radius: 0;
    background-color: #000;
    border: 1px solid #000;
}

.custom-control-label:before,
.custom-file-label,
.custom-select {
    transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.previlage-master {
    text-align: right;
}

.mpass-text {
    display: inline-block;
    width: 150px !important;
}

.btn-light {
    color: #212529;
    background-color: #eff2f7 !important;
    border-color: #eff2f7 !important;
}
.inner{
    overflow-x: scroll;
    overflow-y: visible;
    margin-left: 450px;
}
.fixed-col-1{
    position: absolute;
    left: 25px;
    width: 150px;
}
.fixed-col-2{
    position: absolute;
    left: 175px;
    width: 150px;
}
.fixed-col-3{
    position: absolute;
    left: 325px;
    width: 150px;
}
 .inner th{
white-space: nowrap;
    height: 40px;
}
.table-bordered th {
    border: 1px solid #dee2e6 !important;
}
.is-invalid {
    border-color: #dc3545; /* Bootstrap danger red */
}
.text-danger {
    color: #dc3545 !important;
}

</style>
<div class="col-md-12 main-container">
    <div>
        <div class="listing-grid">
            <div class="detail-row">
                <h2>Multi Login Account</h2>
                <form method="post" id="employee_form">
                    <div class="m-t-20">
                        <!-- <h5 class="mb-0">Personal Information</h5> -->
                         <label class="mb-0">Personal Information</label>
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="uname"> Client ID</label>
                                <input type="text" class="form-control" name="uname" id="uname">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="fullname"> Full Name</label>
                                <input type="text" class="form-control" name="fullname" id="fullname">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="password"> Password</label>
                                <input type="text" class="form-control" name="password" id="password">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="cpass"> Confirm Password</label>
                                <input type="text" class="form-control" name="cpass" id="cpass">
                            </div>
                        </div>

                        <div class="mt-2 previlages">
                            <h5 class="mb-0">Privileges</h5>
                            <div class="previlage-box">
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="plist[]" class="custom-control-input" value="true" id="all">
                                            <label class="custom-control-label" for="all">All</label>
                                        </div>
                                    </div>
                                </div> <br>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="1" id="dashboard">
                                            <label class="custom-control-label" for="dashboard">DashBoard</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="2" id="manalysis">
                                            <label class="custom-control-label" for="manalysis">Market Analysis</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="4" id="ulist">
                                            <label class="custom-control-label" for="ulist">User List</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="5" id="user">
                                            <label class="custom-control-label" for="user">Insert User</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="8" id="astmt">
                                            <label class="custom-control-label" for="astmt">Account Statement</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="9" id="pwinloss">
                                            <label class="custom-control-label" for="pwinloss">Party Win Loss</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="10" id="cbets">
                                            <label class="custom-control-label" for="cbets">Current Bets</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="" id="glock">
                                            <label class="custom-control-label"for="glock">General Lock</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="13" id="cresult">
                                            <label class="custom-control-label"for="cresult">Casino Result</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="14" id="lcresult">
                                                <label class="custom-control-label" for="lcresult">Live Casino Result</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="15" id="casino">
                                                <label class="custom-control-label" for="casino">Our Casino</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="16" id="events">
                                                <label class="custom-control-label"for="events">Events</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges"
                                                type="checkbox" name="plist[]" class="custom-control-input" value="17" id="msanalysis">
                                                <label class="custom-control-label" for="msanalysis">Market Search Analysis</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="19" id="lucreation">
                                                <label class="custom-control-label"  for="lucreation">Login User creation</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="54" id="withdraw">
                                                <label class="custom-control-label" for="withdraw">Withdraw</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="55" id="deposit">
                                                <label class="custom-control-label" for="deposit">Deposit</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="56"id="creference">
                                                <label class="custom-control-label" for="creference">Credit Reference</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="57" id="uinfo">
                                                <label class="custom-control-label" for="uinfo">User Info</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="58"  id="pwdchange">
                                                <label class="custom-control-label"for="pwdchange">User Password Change</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="59" id="ulock">
                                                <label class="custom-control-label" for="ulock">User Lock</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="60" id="block">
                                                <label class="custom-control-label" for="block">Bet Lock</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges"type="checkbox" name="plist[]" class="custom-control-input" value="91" id="auser">
                                                <label class="custom-control-label" for="auser">active user</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="previlage-item">
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input data-vv-as="Privileges" type="checkbox" name="plist[]" class="custom-control-input" value="104" id="asign">
                                                <label class="custom-control-label" for="asign">Agent Assign</label>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <div class="previlage-master mt-2">
                                <div class="form-group mb-0">
                                     <input type="password" name="mpass" placeholder="Transaction Code" class="form-control mpass-text" aria-required="true" aria-invalid="false">
                                     <button type="submit" class="btn btn-success">Submit</button> 
                                     <button type="button" id="reset" class="btn btn-light">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="inner" style="margin-top:1.5rem !important">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="fixed-col-1">Action</th>
                            <th class="fixed-col-2">Username</th>
                            <th class="fixed-col-3">Full Name</th>
                            <th>DashBoard</th>
                            <th>Market Analysis</th>
                            <th>User List</th>
                            <th>Insert User</th>
                            <th>Account Statement</th>
                            <th>Party Win Loss</th>
                            <th>Current Bets</th>
                            <th>Casino Result</th>
                            <th>Live Casino Result</th>
                            <th>Our Casino</th>
                            <th>Events</th>
                            <th>Market Search Analysis</th>
                            <th>Login User creation</th>
                            <th>Withdraw</th>
                            <th>Deposit</th>
                            <th>Credit Reference</th>
                            <th>User Info</th>
                            <th>User Password Change</th>
                            <th>User Lock</th>
                            <th>Bet Lock</th>
                            <th>active user</th>
                            <th>Agent Assign</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row m-t-10 m-b-10">
                <div class="col-md-6">
                </div>
                <div class="col-md-6" id="pagination"></div>
            </div>
        </div>
    </div> 
</div>

<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo MASTER_URL; ?>/assets/vendors/datatables/js/buttons.html5.min.js"></script>
<script type="text/javascript">
var xhr, xhr_ac_details;
var _user_id = 0;
var id;
var game_type;
var event_type;
var market_type;
var market_id;
var client_name;
$("#account_history_table").DataTable();
$('.dataTables_filter input').addClass('form-control');

$(document).ready(function() {

    $('#all').on('change', function() {
        $('input[name="plist[]"]').not('#all').prop('checked', this.checked);
    });

     $('input[name="plist[]"]').not('#all').on('change', function() {
        if (!this.checked) {
            $('#all').prop('checked', false);
        } else {
            const total = $('input[name="plist[]"]').not('#all').length;
            const checked = $('input[name="plist[]"]').not('#all').filter(':checked').length;
            if (total === checked) {
                $('#all').prop('checked', true);
            }
        }
    });

    function validateField(input) {
        const fieldName = input.attr('id');
        const fieldLabel = $('label[for="' + fieldName + '"]').text().trim() || fieldName;
        const errorMessage = `The ${fieldLabel} field is required`;

        const value = input.val().trim();
        const errorSpanId = fieldName + '-error';

        if (value === '') {
           
            input.addClass('is-invalid');
            if ($('#' + errorSpanId).length === 0) {
                input.after('<span id="' + errorSpanId + '" class="text-danger small">' + errorMessage + '</span>');
            }
        } else {
           
            input.removeClass('is-invalid');
            $('#' + errorSpanId).remove();
        }
    }

     // On blur of each input inside the form
    $('#employee_form input[type="text"], #employee_form input[type="password"]').on('blur', function() {
        validateField($(this));
    });

    function validatePrivileges() {
        const checked = $('input[name="plist[]"]:checked').length;
        const errorSpanId = 'plist-error';
        if (checked === 0) {
            // Add red border highlight to the container
            // $('.previlage-box').addClass('border border-danger rounded p-2');

            // Show error message if not already shown
            if ($('#' + errorSpanId).length === 0) {
                $('.previlage-box').after('<span id="' + errorSpanId + '" class="text-danger small">The Privileges field is required</span>');
            }
            return false;
        } else {
            // Remove red border and error if valid
            $('.previlage-box').removeClass('border border-danger rounded p-2');
            $('#' + errorSpanId).remove();
            return true;
        }
    }

  // Validate privileges on checkbox change
    $('input[name="plist[]"]').on('change', function() {
        validatePrivileges();
    });

     $('#employee_form').on('submit', function(e) {
        let hasError = false;

        $('#employee_form input[type="text"], #employee_form input[type="password"]').each(function() {
           
            if ($(this).val().trim() === '') {
                validateField($(this));
                hasError = true;
            }
        });


        const privilegesValid = validatePrivileges();
        if (!privilegesValid) {
            hasError = true;
        }

        if (hasError) {
            e.preventDefault();
        }

        var userData = $('#employee_form').serialize();
        $.ajax({
            type: 'POST',
            url: 'Createaccount/add_employees',
            data: userData,
            dataType: 'JSON',
            success: function (data) {
                $('#form_error').html('').show();
                if (data.login_error != 'undefined' && data.login_error) {
                    window.location = '/agetn/login';
                }
                else if (data.status == 'danger') {
                    // var tmp = 'alert_' + (Date.now());
                    // $('#form_error').html('<div class="alert alert-danger" id="' + tmp + '">' + data.message + '</div>').fadeOut(5000);
                    toastr.clear()
                        toastr.warning("", data.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-warning",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });
                } else {
                    // var tmp = 'alert_' + (Date.now());
                    // $('#form_error').html('<div class="alert alert-success" id="' + tmp + '">' + data.message + '</div>');
                     toastr.clear()
                        toastr.success("",  data.message, {
                            "timeOut": "3000",
                            "iconClass": "toast-success",
                            "positionClass": "toast-top-right",
                            "extendedTImeout": "0"
                        });

                    $('#add_new_user_form').trigger('reset');
                    //call_page();
                }
                scroll_top();
            }
        });
        return false;
    });
});

</script>

