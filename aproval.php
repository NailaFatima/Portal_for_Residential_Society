<?php
// tbl_request consist of status 0-pending,1-approved and 2-declined
session_start();
include_once 'includes/connect_db.php';
include_once 'includes/functions.php';

if (isset($_REQUEST['id']) && isset($_REQUEST['deci'])) {
	$req_id = $_REQUEST['id'];
	$decision = $_REQUEST['deci'];
	// echo $req_id;
	if ($decision == 1) {

		$upd_sql_req = "update tbl_request set status='1' where request_id='" . $req_id . "'";
		// echo $upd_sql_req;
		$res_upd_req = mysqli_query($dblink, $upd_sql_req);
		if ($res_upd_req) {
			$sel_sql_req = "select * from tbl_request where request_id=" . $req_id;
			$res_sql_req = mysqli_query($dblink, $sel_sql_req);
			$data = mysqli_fetch_assoc($res_sql_req);
			$sender = $data['sender_id'];
			$receiver = $data['receiver_id'];
			$status = $data['status'];
			if ($status == 1) {
				if ($sender < $receiver) {
					$ins_sql_friends = "INSERT INTO tbl_friends (friend_1,friend_2,status) VALUES ('$sender', '$receiver', 1)";
					$res_ins_friends = mysqli_query($dblink, $ins_sql_friends);
					if ($res_ins_friends) {
						header("LOCATION: community.php?aprd=1");
					}
				} else {
					$ins_sql_friends = "INSERT INTO tbl_friends (friend_1,friend_2,status) VALUES ('$receiver', '$sender', 1)";
					$res_ins_friends = mysqli_query($dblink, $ins_sql_friends);
					if ($res_ins_friends) {
						header("LOCATION: community.php?aprd=1");

					}
				}
			}
		}

	} else if ($decision == 0) {
		$upd_sql_req = "update tbl_request set status='2' where request_id='" . $req_id . "'";
		echo $upd_sql_req;
		$res_upd_req = mysqli_query($dblink, $upd_sql_req);
		if ($res_upd_req) {

			header("LOCATION: community.php?aprd=0");
		}
	}
}


?>