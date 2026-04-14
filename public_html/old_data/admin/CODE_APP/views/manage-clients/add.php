<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_data = $handler->users->data();
$upline_commission = (int) $user_data['my_percentage'];
$upline_partnership = (int) $user_data['my_percentage'];


$min_cricket_stake = (!empty($user_data['min_cricket_stake'])) ? $user_data['min_cricket_stake'] : 500;
$min_soccer_stake = (!empty($user_data['min_soccer_stake'])) ? $user_data['min_soccer_stake'] : 500;
$min_tennis_stake = (!empty($user_data['min_tennis_stake'])) ? $user_data['min_tennis_stake'] : 500;
$min_fancy_stake = (!empty($user_data['min_fancy_stake'])) ? $user_data['min_fancy_stake'] : 500;
$min_casino_stake = (!empty($user_data['min_casino_stake'])) ? $user_data['min_casino_stake'] : 500;

$max_cricket_stake = (!empty($user_data['max_cricket_stake'])) ? $user_data['max_cricket_stake'] : 500000;
$max_soccer_stake = (!empty($user_data['max_soccer_stake'])) ? $user_data['max_soccer_stake'] : 500000;
$max_tennis_stake = (!empty($user_data['max_tennis_stake'])) ? $user_data['max_tennis_stake'] : 500000;
$max_fancy_stake = (!empty($user_data['max_fancy_stake'])) ? $user_data['max_fancy_stake'] : 500000;
$max_casino_stake = (!empty($user_data['max_casino_stake'])) ? $user_data['max_casino_stake'] : 500000;

$minimum_odds = $user_data['minimum_odds'];
$maximum_odds = $user_data['maximum_odds'];
?>
<div class="col-md-12 main-container">
    <div>
        <div class="add-account">
            <h2 class="m-b-20">Add Account</h2>
            <div id="form_error"></div>

            <form method="post" class="form-horizontal form-label-left" id="add_new_user_form" name="add_new_user_form">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="m-b-20 col-md-12">Personal Detail</h4>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="user-username">Client Name:</label>
                                    <input type="text" name="user-username" id="user-username" class="form-control" placeholder="Client Name" required="required" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="user-password">Password:</label>
                                    <input type="password" name="user-password" id="user-password" class="form-control" placeholder="Password" required="required" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="user-cpassword">Confirm Password:</label>
                                    <input type="password" name="user-cpassword" id="user-cpassword" class="form-control" placeholder="Confirm Password" required="required" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="user-full-name">Full Name:</label>
                                    <input type="text" name="user-full-name" id="user-full-name" class="form-control" placeholder="Full Name" required="required" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="user-city">City:</label>
                                    <input type="text" name="user-city" id="user-city" class="form-control" placeholder="City" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="user-cpassword">Phone:</label>
                                    <input type="text" name="user-phone" id="user-phone" class="form-control" placeholder="Phone"  autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="m-b-20 col-md-12">Account Details:</h4>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="user-account_type">Account Type:</label>
                                    <select name="user-account_type" id="user-account_type" class="form-control" required="required">
                                        <option value="">Select Account Type</option>
										<?php if ($user_data['power'] == 7) { ?>
                                            <option value="4">Super master</option>
                                        <?php } ?>
										
                                        <?php if ($user_data['power'] < 5 or $user_data['power'] == 7) { ?>
                                            <?php if ($user_data['power'] >= 4) { ?>
                                                <option value="3">Master</option>
                                            <?php } if ($user_data['power'] >= 3 ) { ?>
                                                <option value="2">Agent</option>
                                            <?php } ?>
                                            <option value="1">User</option>
                                        <?php } ?>
                                        <?php if ($user_data['power'] == 5) { ?>
                                            <option value="7">King Admin</option>
                                        <?php } ?>
										
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="user-credit_reference">Credit Reference:</label>
                                    <input type="text" name="user-credit_reference" id="user-credit_reference" class="form-control" placeholder="Credit Reference" value="" required="required" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12" id="div-exposure_limit">
                                <div class="form-group">
                                    <label for="user-exposure_limit">Exposure Limit:</label>
                                    <input type="text" name="user-exposure_limit" id="user-exposure_limit" class="form-control" placeholder="Exposure Limit" value="" required="required" autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-b-20 col-md-12 col-xs-12" id="div-commission_setting">
                        <h4 class="m-b-20 col-md-12">Commission Setting:</h4>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Cricket</th>
                                    <th>Soccer</th>
                                    <th>Tennis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Up Line</td>
                                    <td><input type="text" name="user-cricket_upline_commission" id="user-cricket_upline_commission" class="form-control" value="<?php echo (100 - $upline_commission); ?>" required="required" autocomplete="off" disabled=""/></td>
                                    <td><input type="text" name="user-soccer_upline_commission" id="user-soccer_upline_commission" class="form-control" value="<?php echo (100 - $upline_commission); ?>" required="required" autocomplete="off" disabled=""/></td>
                                    <td><input type="text" name="user-tennis_upline_commission" id="user-tennis_upline_commission" class="form-control" value="<?php echo (100 - $upline_commission); ?>" required="required" autocomplete="off" disabled=""/></td>
                                </tr>
                                <tr>
                                    <td>Down Line</td>
                                    <td><input type="text" name="user-cricket_downline_commission" id="user-cricket_downline_commission" class="form-control downline_commission" data-sport="cricket" value="" required="required" autocomplete="off"/></td>
                                    <td><input type="text" name="user-soccer_downline_commission" id="user-soccer_downline_commission" class="form-control downline_commission" data-sport="soccer" value="" required="required" autocomplete="off"/></td>
                                    <td><input type="text" name="user-tennis_downline_commission" id="user-tennis_downline_commission" class="form-control downline_commission" data-sport="tennis" value="" required="required" autocomplete="off"/></td>
                                </tr>
                                <tr>
                                    <td>Our</td>
                                    <td><input type="text" name="user-cricket_our_commission" id="user-cricket_our_commission" class="form-control" value="<?php echo $upline_commission; ?>" required="required" autocomplete="off" disabled=""/></td>
                                    <td><input type="text" name="user-soccer_our_commission" id="user-soccer_our_commission" class="form-control" value="<?php echo $upline_commission; ?>" required="required" autocomplete="off" disabled=""/></td>
                                    <td><input type="text" name="user-tennis_our_commission" id="user-tennis_our_commission" class="form-control" value="<?php echo $upline_commission; ?>" required="required" autocomplete="off" disabled=""/></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="m-b-20 col-md-12 col-xs-12" id="div-partnership_setting">
                        <h4 class="m-b-20 col-md-12">Partnership Setting:</h4>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Cricket</th>
                                    <th>Soccer</th>
                                    <th>Tennis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Up Line</td>
                                    <td><input type="text" name="user-cricket_upline_partnership" id="user-cricket_upline_partnership" class="form-control" value="<?php echo (100 - $upline_partnership); ?>" required="required" autocomplete="off" disabled=""/></td>
                                    <td><input type="text" name="user-soccer_upline_partnership" id="user-soccer_upline_partnership" class="form-control" value="<?php echo (100 - $upline_partnership); ?>" required="required" autocomplete="off" disabled=""/></td>
                                    <td><input type="text" name="user-tennis_upline_partnership" id="user-tennis_upline_partnership" class="form-control" value="<?php echo (100 - $upline_partnership); ?>" required="required" autocomplete="off" disabled=""/></td>
                                </tr>
                                <tr>
                                    <td>Down Line</td>
                                    <td><input type="text" name="user-cricket_downline_partnership" id="user-cricket_downline_partnership" class="form-control downline_partnership" data-sport="cricket"  value="" required="required" autocomplete="off"/></td>
                                    <td><input type="text" name="user-soccer_downline_partnership" id="user-soccer_downline_partnership" class="form-control downline_partnership" data-sport="soccer" value="" required="required" autocomplete="off"/></td>
                                    <td><input type="text" name="user-tennis_downline_partnership" id="user-tennis_downline_partnership" class="form-control downline_partnership" data-sport="tennis" value="" required="required" autocomplete="off"/></td>
                                </tr>
                                <tr>
                                    <td>Our</td>
                                    <td><input type="text" name="user-cricket_our_partnership" id="user-cricket_our_partnership" class="form-control" value="<?php echo $upline_partnership; ?>" required="required" autocomplete="off" disabled=""/></td>
                                    <td><input type="text" name="user-soccer_our_partnership" id="user-soccer_our_partnership" class="form-control" value="<?php echo $upline_partnership; ?>" required="required" autocomplete="off" disabled=""/></td>
                                    <td><input type="text" name="user-tennis_our_partnership" id="user-tennis_our_partnership" class="form-control" value="<?php echo $upline_partnership; ?>" required="required" autocomplete="off" disabled=""/></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="m-b-20 col-md-12 col-xs-12" id="div-bet_limit_setting">
                        <h4 class="m-b-20 col-md-12">Bet Limit Setting:</h4>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Cricket</th>
                                    <th>Soccer</th>
                                    <th>Tennis</th>
                                    <th>Fancy</th>
                                    <th>Casino</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Minimum</td>
                                    <td><input type="number" name="user-minimum_limit_cricket" id="user-minimum_limit_cricket" class="form-control" value="<?php echo $min_cricket_stake; ?>" min="<?php echo $min_cricket_stake; ?>" required="required" autocomplete="off"/></td>
                                    <td><input type="number" name="user-minimum_limit_soccer" id="user-minimum_limit_soccer" class="form-control" value="<?php echo $min_soccer_stake; ?>" min="<?php echo $min_soccer_stake; ?>" required="required" autocomplete="off"/></td>
                                    <td><input type="number" name="user-minimum_limit_tennis" id="user-minimum_limit_tennis" class="form-control" value="<?php echo $min_tennis_stake; ?>" min="<?php echo $min_tennis_stake; ?>" required="required" autocomplete="off"/></td>
                                    <td><input type="number" name="user-minimum_limit_fancy" id="user-minimum_limit_fancy" class="form-control" value="<?php echo $min_fancy_stake; ?>" min="<?php echo $min_fancy_stake; ?>" required="required" autocomplete="off"/></td>
                                    <td><input type="number" name="user-minimum_limit_casino" id="user-minimum_limit_casino" class="form-control" value="<?php echo $min_casino_stake; ?>" min="<?php echo $min_casino_stake; ?>" required="required" autocomplete="off"/></td>
                                </tr>
                                <tr>
                                    <td>Maximum</td>
                                    <td><input type="number" name="user-maximum_limit_cricket" id="user-maximum_limit_cricket" class="form-control" value="<?php echo $max_cricket_stake; ?>" min="<?php echo $min_cricket_stake; ?>" max="<?php echo $max_cricket_stake; ?>" required="required" autocomplete="off"/></td>
                                    <td><input type="number" name="user-maximum_limit_soccer" id="user-maximum_limit_soccer" class="form-control" value="<?php echo $max_soccer_stake; ?>" min="<?php echo $min_soccer_stake; ?>" max="<?php echo $max_soccer_stake; ?>" required="required" autocomplete="off"/></td>
                                    <td><input type="number" name="user-maximum_limit_tennis" id="user-maximum_limit_tennis" class="form-control" value="<?php echo $max_tennis_stake; ?>" min="<?php echo $min_tennis_stake; ?>" max="<?php echo $max_tennis_stake; ?>" required="required" autocomplete="off"/></td>
                                    <td><input type="number" name="user-maximum_limit_fancy" id="user-maximum_limit_fancy" class="form-control" value="<?php echo $max_fancy_stake; ?>" min="<?php echo $min_fancy_stake; ?>" max="<?php echo $max_fancy_stake; ?>" required="required" autocomplete="off"/></td>
                                    <td><input type="number" name="user-maximum_limit_casino" id="user-maximum_limit_casino" class="form-control" value="<?php echo $max_casino_stake; ?>" min="<?php echo $min_casino_stake; ?>" max="<?php echo $max_casino_stake; ?>" required="required" autocomplete="off"/></td>
                                </tr>
                                <tr>
                                    <td>Delay</td>
                                    <td><input type="number" name="user-delay_cricket" id="user-delay_cricket" class="form-control" value="5" min="5" required="required" autocomplete="off"/></td>
                                    <td><input type="number" name="user-delay_soccer" id="user-delay_soccer" class="form-control" value="5" min="5" required="required" autocomplete="off"/></td>
                                    <td><input type="number" name="user-delay_tennis" id="user-delay_tennis" class="form-control" value="5" min="5" required="required" autocomplete="off"/></td>
                                    <td><input type="number" name="user-delay_fancy" id="user-delay_fancy" class="form-control" value="5" min="5" required="required" autocomplete="off"/></td>
                                    <td><input type="number" name="user-delay_casino" id="user-delay_casino" class="form-control" value="5" min="5" required="required" autocomplete="off"/></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="m-b-20 col-md-12 col-xs-12" style="display:none;">
                        <h4 class="m-b-20 col-md-12">Min-Max Odds:</h4>
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td>Minimum Odds</td>
                                    <td><input type="number" name="user-minimum_odds" id="user-minimum_odds" class="form-control" value="" min="" autocomplete="off" placeholder="Lay Odds" style="width: 200px;" /></td>
                                </tr>
                                <tr>
                                    <td>Maximum Odds</td>
                                    <td><input type="number" name="user-maximum_odds" id="user-maximum_odds" class="form-control" value="" min="" autocomplete="off" placeholder="Back Odds" style="width: 200px;" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row m-t-20">
                    <div class="col-md-12">
                        <div class="form-group col-md-3 float-right">
                            <label for="master_pwd">Transaction Password:</label>
                            <input required="required" maxlength="15" placeholder="Transaction Password" name="form-master_pwd" id="master_pwd" value="" type="password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row m-t-20">
                    <div class="col-md-12">
                        <div class="float-right">
                            <button class="btn btn-submit" type="submit">Create Account</button>
                        </div>
                    </div>
                </div>
            </form>  
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/additional-methods.min.js"></script>

<script type="text/javascript">

    var xhr;
    var _user_id = 0;
    function call_xhr(url, mydata)
    {
        if (xhr && xhr.readyState != 4)
            xhr.abort();
        xhr = $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: mydata,
            error: function (data) {

            }
        });
    }

    function set_search_single(field_name, field_val) {
        if ($.trim(field_name) != "" && $.trim(field_val) != "")
        {
            return ("&" + $.trim(field_name) + "=" + $.trim(field_val));
        } else
        {
            return "";
        }
    }

    function preparesearch()
    {
        var search_string = "";
        search_string += set_search_single("common_search", $('#search-common').val());
        search_string += set_search_single("from_date", $('#search-from_date').val());
        search_string += set_search_single("to_date", $('#search-to_date').val());
        return search_string;
    }

    $(document).ready(function () {

        $('#user-account_type').on('change', function () {
            var account_type = $(this).val();
            if (account_type != '') {
                if (account_type == 1) {
                    $('#div-exposure_limit').show();

                    $('#div-bet_limit_setting').show();
                    $('#div-commission_setting').hide();
                    $('#div-partnership_setting').hide();
                }
                else {

                    $('#user-exposure_limit').val('0');
                    $('#div-exposure_limit').hide();

                    $('#div-bet_limit_setting').hide();
                    $('#div-commission_setting').show();
                    $('#div-partnership_setting').show();
                }
            }
            else {
                $('#div-exposure_limit').hide();

                $('#div-commission_setting').hide();
                $('#div-partnership_setting').hide();
                $('#div-bet_limit_setting').hide();
            }
        });
        $("form[id='add_new_user_form']").validate({
            rules: {
                'user-title': "required",
                'user-first-name': {
                    required: true,
                    minlength: 2,
                    lettersonly: true
                },
               
                'user-username': {
                    required: true,
                    minlength: 3,
                    remote: {
                        url: "check_user_username/",
                        type: "post"
                    }
                },
                'user-password': {
                    required: true,
                    minlength: 5,
                },
                'user-cpassword': {
                    required: true,
                    minlength: 5,
                    equalTo: "#user-password"
                },
            },
            messages: {
                'user-title': "Please select title",
                'user-first-name': {
                    required: "Please enter user name",
                    lettersonly: "enter only letters please"
                },
                'user-username': {
                    required: "Please enter username",
                    remote: "Username is already taken"
                },
                
                'user-password': {
                    required: "Please enter password",
                    minlength: "Your password must be at least 5 characters long",
                },
                'user-cpassword': {
                    required: "Please enter password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
            },
            submitHandler: function (form) {

                var userData = $('#add_new_user_form').serialize();
                $.ajax({
                    type: 'POST',
                    url: 'add_user',
                    data: userData,
                    dataType: 'JSON',
                    success: function (data) {
                        $('#form_error').html('').show();
                        if (data.login_error != 'undefined' && data.login_error) {
                            window.location = '/agetn/login';
                        }
                        else if (data.status == 'danger') {
                            var tmp = 'alert_' + (Date.now());
                            $('#form_error').html('<div class="alert alert-danger" id="' + tmp + '">' + data.message + '</div>').fadeOut(5000);
                        } else {
                            var tmp = 'alert_' + (Date.now());
                            $('#form_error').html('<div class="alert alert-success" id="' + tmp + '">' + data.message + '</div>');
                            $('#add_new_user_form').trigger('reset');
//                            call_page();
                        }
                        scroll_top();
                    }
                });
                return false;
            }
        });

        function scroll_top() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

        $('.downline_commission').on('input , change, focusout', function () {
            cal_downline_commission(this);
        });

        function cal_downline_commission($element) {

            var sport_name = $($element).attr('data-sport');
            var downline = Number($($element).val());
            $(this).val(downline);
            var upline_commission = Number($('#user-' + sport_name + '_upline_commission').val());

            var our_commission = 0;
            if ((downline + upline_commission) <= 100) {
                our_commission = 100 - (downline + upline_commission);
            }
            else {
                downline = Number($($element).val().slice(0, -1));
                our_commission = 100 - (downline + upline_commission);
                downline = $($element).val(downline);
            }
            $('#user-' + sport_name + '_our_commission').val(our_commission);

        }

        $('.downline_partnership').on('input , change, focusout', function () {
            cal_our_partnership(this);
        });

        function cal_our_partnership($element) {
            var sport_name = $($element).attr('data-sport');
            var downline = Number($($element).val());
            $($element).val(downline);
            var upline_commission = Number($('#user-' + sport_name + '_upline_partnership').val());

            var our_commission = 0;
            if ((downline + upline_commission) <= 100) {
                our_commission = 100 - (downline + upline_commission);
            }
            else {
                downline = Number($($element).val().slice(0, -1));
                our_commission = 100 - (downline + upline_commission);
                downline = $($element).val(downline);
            }
            $('#user-' + sport_name + '_our_partnership').val(our_commission);
        }

        $('#user-cricket_downline_commission').on('blur', function () {
            var value = Number($(this).val());
            $(this).val(value);
            set_val(value);

            $('#user-cricket_downline_partnership').val(value);
            cal_our_partnership($('#user-cricket_downline_partnership'));
        });

        $('#user-cricket_downline_partnership').on('blur', function () {
            var value = Number($(this).val());
            $(this).val(value);
            set_val(value);

            $('#user-cricket_downline_commission').val(value);
            cal_our_partnership($('#user-cricket_downline_commission'));
        });


        function set_val(value) {
//            var soccer_cms = $('#user-soccer_downline_commission').val();
//            if (soccer_cms == '' || soccer_cms == 0) {
//                $('#user-soccer_downline_commission').val(value);
//                cal_downline_commission($('#user-soccer_downline_commission'));
//            }
//            var tennis_cms = $('#user-tennis_downline_commission').val();
//            if (tennis_cms == '' || tennis_cms == 0) {
//                $('#user-tennis_downline_commission').val(value);
//                cal_downline_commission($('#user-tennis_downline_commission'));
//            }
//
//
//            var soccer_ptnr = $('#user-soccer_downline_partnership').val();
//            if (soccer_ptnr == '' || soccer_ptnr == 0) {
//                $('#user-soccer_downline_partnership').val(value);
//                cal_our_partnership($('#user-soccer_downline_partnership'));
//            }
//            var tennis_ptnr = $('#user-tennis_downline_partnership').val();
//            if (tennis_ptnr == '' || tennis_ptnr == 0) {
//                $('#user-tennis_downline_partnership').val(value);
//                cal_our_partnership($('#user-tennis_downline_partnership'));
//            }

            $('#user-soccer_downline_commission').val(value);
            cal_downline_commission($('#user-soccer_downline_commission'));
            $('#user-tennis_downline_commission').val(value);
            cal_downline_commission($('#user-tennis_downline_commission'));

            $('#user-soccer_downline_partnership').val(value);
            cal_our_partnership($('#user-soccer_downline_partnership'));
            $('#user-tennis_downline_partnership').val(value);
            cal_our_partnership($('#user-tennis_downline_partnership'));

            return;
        }
    });

</script>
