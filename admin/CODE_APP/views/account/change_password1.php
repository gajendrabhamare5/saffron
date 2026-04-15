<div class="col-md-12 main-container">
    <div>
        <div class="listing-grid">
            <div class="detail-row">
                <h2>Change Password</h2>
                <div class="m-t-20">

                    <?php
                    if ($handler->session->userdata("alerts") !== NULL) {
                        foreach ($handler->session->userdata("alerts") as $type => $data) {
                            
                            $alert_icon = (($type == "success") ? "check" : "warning");
                            ?>
                                <div class="alert alert-<?php echo($alert_icon); ?>"><i class="fas fa-<?php echo $alert_icon; ?>" aria-hidden="true"></i><?php echo $data[0]; ?></div> 
                            <?php
                            $handler->session->unset_userdata("alerts");
                            
                        }
                    }
                    ?>

                    <div class="col-md-12">
                        <form action="<?php echo MASTER_URL; ?>/account/change_password" method="post" name="change_password_form" id="change_password_form" >
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="account-new-password">New Password:</label>
                                        <input type="password" class="form-control" name="account-new-password" id="account-new-password" placeholder="" required="true">
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="account-confirm-new-password">Confirm Password</label>
                                        <input type="password" class="form-control" name="account-confirm-new-password" id="account-confirm-new-password" placeholder="" required="true">
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="account-password">Transaction Password:</label>
                                        <input type="password" class="form-control" name="account-password" id="account-password" placeholder=""  required="true">
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>&nbsp</label><br>
                                    <button type="submit" class="btn btn-diamond">Load</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="table-responsive data-table">
            </div>
        </div>
    </div>
</div>