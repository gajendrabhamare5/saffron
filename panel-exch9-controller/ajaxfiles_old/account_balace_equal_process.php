<?php
include "../../include/conn.php";
include "../session.php";
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];




if ($login_type != 5) {
    header("Location: ../logout.php");
}

$user_name = $conn->real_escape_string($_POST['user_name']);

if (!isset($_POST['user_name'])) {
    $return_array = array(
        "status" => "error",
        "message" => "Please choose user",
    );
    echo json_encode($return_array);
    exit();
}
if (empty($user_name)) {
    $return_array = array(
        "status" => "error",
        "message" => "Please choose user",
    );
    echo json_encode($return_array);
    exit();
}

$get_customer_name = $conn->query("select * from user_login_master where Email_ID='$user_name'");
if (mysqli_num_rows($get_customer_name) <= 0) {
    $return_array = array(
        "status" => "error",
        "message" => "User Not available",
    );
    echo json_encode($return_array);
    exit();
}

$fetch_customer_name = mysqli_fetch_assoc($get_customer_name);

$user_idd = $fetch_customer_name['UserID'];

$querty_forward_date_query = $conn->query("select * from accounts_temp where remark LIKE '%Query forwarding%' ORDER BY `account_date_time` ASC limit 1");
if (mysqli_num_rows($querty_forward_date_query) > 0) {
    $query_forward_date_data = mysqli_fetch_assoc($querty_forward_date_query);
    $forwarding_date = $query_forward_date_data['account_date_time'];
    $forwarding_date = date("Y-m-d", strtotime($forwarding_date));

    

   /*  $diffrende_record = $conn->query("SELECT b.account_id,a.user_id,a.entry_type,sum(a.amount) as a11,b.amount, sum(a.amount)-b.amount as Difference FROM accounts a INNER JOIN accounts_temp b ON a.user_id=b.user_id and a.entry_type = b.entry_type where a.user_id in ($user_idd) and cast(b.account_date_time as date) <= '$forwarding_date' and cast(a.account_date_time as date) <= '$forwarding_date' and b.remark LIKE '%Query forwarding%' group by a.user_id,a.entry_type having Difference <> 0"); */
    $diffrende_record = $conn->query("SELECT * FROM  accounts_temp b where b.user_id in ($user_idd) and cast(b.account_date_time as date) <= '$forwarding_date' and b.remark LIKE '%Query forwarding%' group by b.user_id,b.entry_type");
    if (mysqli_num_rows($diffrende_record) > 0) {

        $conn->query("DROP TRIGGER 	accounts_temp_update_trigger"); 

        while($accounts_temp_data=mysqli_fetch_assoc($diffrende_record)){
            $entry_type = $accounts_temp_data['entry_type'];
            $amount = $accounts_temp_data['amount'];
            $account_id = $accounts_temp_data['account_id'];

            $sum_amount_accounts= $conn->query("select sum(amount) as all_amount from accounts b where b.user_id in ($user_idd) and cast(b.account_date_time as date) <= '$forwarding_date' and entry_type='$entry_type'");
            if(mysqli_num_rows($sum_amount_accounts)){
                $sum_amount_accounts_data=mysqli_fetch_assoc($sum_amount_accounts);
                $update_amount=$sum_amount_accounts_data['all_amount'];
            }
            else{
                $update_amount=0;
            }
            if(empty($update_amount)){
                $update_amount = 0;
            }
            $conn->query("update accounts_temp set amount='$update_amount' where account_id='$account_id' and entry_type='$entry_type'");

        }
       

       /*  $conn->query("UPDATE accounts_temp AS b1 INNER JOIN ( SELECT b.account_id,a.user_id,a.entry_type,sum(a.amount) as a11,b.amount, sum(a.amount)-b.amount as Difference FROM accounts a INNER JOIN accounts_temp b ON a.user_id=b.user_id and a.entry_type = b.entry_type where a.user_id in ($user_idd) and cast(b.account_date_time as date) <= '$forwarding_date' and cast(a.account_date_time as date) <= '$forwarding_date' and b.remark LIKE '%Query forwarding%' group by a.user_id,a.entry_type having Difference <> 0) AS b2 SET b1.amount = b2.a11 WHERE b1.user_id = b2.user_id and b1.entry_type = b2.entry_type and b1.account_id = b2.account_id"); */


        $conn->query('CREATE TRIGGER accounts_temp_update_trigger BEFORE UPDATE
     ON accounts_temp FOR EACH ROW 
BEGIN
	IF	NEW.account_id <> OLD.account_id || NEW.user_id <> OLD.user_id 
		|| NEW.opp_user_id <> OLD.opp_user_id || NEW.account_description <> OLD.account_description 
		|| NEW.bet_id <> OLD.bet_id || NEW.event_id <> OLD.event_id 
		|| NEW.game_type <> OLD.game_type || NEW.amount <> OLD.amount 
		|| NEW.type <> OLD.type || NEW.entry_type <> OLD.entry_type 
		|| NEW.account_date_time <> OLD.account_date_time || NEW.status <> OLD.status 
		|| NEW.remark <> OLD.remark || NEW.transaction_id <> OLD.transaction_id
	THEN
       	signal sqlstate "45000" set message_text = "Invalid update action.";
    END IF;
END
	');

        $return_array = array(
            "status" => "ok",
            "message" => "Account balance process done",

        );
        echo json_encode($return_array);
        exit();
    } else {
        $return_array = array(
            "status" => "error",
            "message" => "Account balance already equal",
        );
        echo json_encode($return_array);
        exit();
    }

}
$return_array = array(
    "status" => "error",
    "message" => "something is wrong.",
);
echo json_encode($return_array);
exit();
