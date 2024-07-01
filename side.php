<?php
// include_once "functions.php";
// session_start();
$sel_sql_count = "SELECT COUNT(*) as total from tbl_request WHERE receiver_id='" . $_SESSION['id'] . "' AND status=''";
// echo $sel_sql_count;
$res_sql_count = mysqli_query($dblink, $sel_sql_count);
$num = mysqli_fetch_assoc($res_sql_count);
$count_notes = $num['total'];
// exit;

?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 col-sm-3">
      <!-- <div class="collapse navbar-collapse">  -->
      <div id="profile" class="collapse navbar-collapse">
        <div class="profilepic"">
          <img style=" width: 100px; height: 100px;" class="pimg" src="images/<?php echo $_SESSION["profile_pic"]; ?>"
          alt="<?php echo $_SESSION["fname"] . $_SESSION["lname"]; ?>">
          <h5><?php echo $_SESSION["fname"] . $_SESSION["lname"]; ?></h5>

          <h4>I'm not trying to be different. To me, I'm just being myself.</h4>
        </div>
        <div>
          <ul class="nav nav-tabs">
            <li class=""><a data-toggle="tab" href="#notify"><i class="pe-7s-bell"></i><sup
                  style="color: red; font-size: 1.5rem;" class=""><?php if ($count_notes != 0)
                    echo $count_notes; ?></sup>
                <p class="hidden-lg hidden-md">
                  <?php echo $count_notes; ?>
                </p>
              </a>
            </li>
            <li><a data-toggle="tab" href="#show_friends"><i class="pe-7s-users"></i></a></li>
            <li><a data-toggle="tab" href="#menu2"><i class="pe-7s-chat"></i></a></li>
          </ul>
          <div class="tab-content">
            <ul class="tab-pane" id="notify">
              <?php
              if (isLogin()) {
                $sel_sql_req = "Select * from tbl_request where receiver_id=" . $_SESSION['id'] . " AND status=''";
                // echo $sel_sql_req;
                // exit;
                $res_sql_req = mysqli_query($dblink, $sel_sql_req);
                if (mysqli_num_rows($res_sql_req) > 0) {
                  while ($data = mysqli_fetch_assoc($res_sql_req)) {
                    $req_id = $data['request_id'];
                    $sender = $data['sender_id'];
                    $status = $data['status'];
                    // echo "<pre>";
                    //   print_r($data);
                    //   echo "</pre>";
                    if ($status == 0) {
                      $sel_sql_mem = "select profile_pic, fname, lname from tbl_members where member_id=" . $sender . " and status= 'active'";

                      $res_sql_mem = mysqli_query($dblink, $sel_sql_mem);
                      if (mysqli_num_rows($res_sql_mem) > 0) {
                        $row = mysqli_fetch_assoc($res_sql_mem);
                        $req_name = $row['fname'] . "" . $row['lname'];
                        $req_pic = $row['profile_pic'];
                        ?>
                        <li class="friend_request row">
                          <div class="col-md-3">
                            <img width="80px" height="80px" class="img-responsive img-circle"
                              src="images/<?php echo $req_pic; ?>">
                          </div>
                          <div class="col-md-9 matter">
                            <h5><?php echo $req_name; ?> Sends you friend request</h5>
                            <div>
                              <a href="aproval.php?id=<?php echo $req_id; ?>&deci=1" class="btn btn-success accept">Accept</a>
                              <a href="aproval.php?id=<?php echo $req_id; ?>&deci=0" class="btn btn-danger decline">Decline</a>
                            </div>
                          </div>
                        </li>
                        <?php
                      }
                    }
                  }
                } else {
                  echo "<li class='para'>You have No requests for now </li>";
                }
              }
              ?>


            </ul>
            <ul id="show_friends" class="tab-pane">
              <?php
              if (isLogin()) {
                $sel_sql_friends = "SELECT * FROM tbl_friends
                    WHERE (friend_1 = " . $_SESSION['id'] . " OR friend_2 =" . $_SESSION['id'] . ")";
                //echo $sel_sql_friends;
                $res_sql_friends = mysqli_query($dblink, $sel_sql_friends);
                if ($res_sql_friends) {
                  while ($row = mysqli_fetch_assoc($res_sql_friends)) {
                    // echo "<pre>";
                    // print_r($row);
                    // echo "</pre>";
                    $frnd_1 = $row['friend_1'];
                    $frnd_2 = $row['friend_2'];
                    $status = $row['status'];
                    if ($frnd_1 == $_SESSION['id']) {

                      $sel_sql_mem = "select fname,lname,profile_pic from tbl_members where member_id='$frnd_2'";
                      $res_sql_mem = mysqli_query($dblink, $sel_sql_mem);
                      if (mysqli_num_rows($res_sql_mem) > 0) {
                        $result = mysqli_fetch_assoc($res_sql_mem);
                        $frnd_pic = $result['profile_pic'];
                        $frnd_name = $result['fname'] . $result['lname'];
                      }
                    } else {
                      $sel_sql_mem = "select fname,lname,profile_pic from tbl_members where member_id='$frnd_1'";
                      $res_sql_mem = mysqli_query($dblink, $sel_sql_mem);
                      //   echo "<pre>";
                      //   echo "in else";
                      // print_r($res_sql_mem);
                      // echo "</pre>";
                      if (mysqli_num_rows($res_sql_mem) > 0) {
                        $result = mysqli_fetch_assoc($res_sql_mem);
                        $frnd_pic = $result['profile_pic'];
                        $frnd_name = $result['fname'] . $result['lname'];
                      }
                    }
                    ?>
                    <li><a href="#">
                        <img width="70px" height="70px" class="pimg" src="images/<?php echo $frnd_pic; ?>" alt="">
                        <p style="color: white;"><?php echo $frnd_name; ?></p>
                      </a></li>
                    <?php



                  }
                } else {
                  echo "<li class='para'>Lets Make some FRIENDS</li>";
                }
              } else {
                header("LOCATION: login_form.php");
              }
              ?>


            </ul>
          </div>
        </div>



      </div>
      <!-- </div> -->
    </div>
    <!-- </nav> -->