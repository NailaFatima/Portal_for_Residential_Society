<?php
// tbl_request consist of status 0-pending and 1-approved

include_once 'includes/connect_db.php';
include_once 'includes/functions.php';
session_start();
$requested_id = $_REQUEST['id'];
$sender_id = $_SESSION['id'];



if (isset($requested_id) && isLogin()) {
	$sel_sql_req = "select * from tbl_request where sender_id='$sender_id' AND receiver_id='$requested_id' OR sender_id='$requested_id' AND receiver_id='$sender_id'";

	$res_sql_req = mysqli_query($dblink, $sel_sql_req);
	// $data=mysqli_fetch_assoc($res_sql_req);
	$sel_sql_friends = "Select * from tbl_friends where friend_1='$sender_id' AND friend_2='$requested_id' OR friend_1='$requested_id' AND friend_2='$sender_id'";

	$res_sql_friends = mysqli_query($dblink, $sel_sql_friends);

	if (mysqli_num_rows($res_sql_friends) > 0) {
		header("LOCATION: community.php?succ=1");
		// echo "You are already friends";
	} elseif (mysqli_num_rows($res_sql_req) > 0) {
		header("LOCATION: community.php?succ=0");
		// echo "Friend Request has already been sent";

		// if($sender==$sender_id && $receiver==$requested_id && $status=="")
		// {
		// 	header("LOCATION: community.php?succ=0");
		// 	// $msg="Friend Request has already been sent";
		// }
	} else {
		$ins_sql_req = "INSERT INTO tbl_request (sender_id, receiver_id, status) VALUES ('$sender_id', '$requested_id', 0)";
		// echo $ins_sql_req;
		$res_sql_req = mysqli_query($dblink, $ins_sql_req);
		if ($res_sql_req) {
			header("LOCATION: community.php?succ=2");
			// echo "request sent";
		}

	}
} else {
	header("LOCATION: login_form.php");
}

?>