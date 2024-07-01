

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>AHT</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>
    <div class="wrapper"><div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Archana Hill Town
                </a>
</div>
<ul class="nav">
                <li class="active">
                    <a href="dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li>
                    <a href="Manage_members.php">
                        <i class="pe-7s-note2"></i>
                        <p>Manage Members</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Customers</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Discount</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				<!-- <li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li> -->
            </ul>
    	</div>
    </div><div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="#">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="#">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Dropdown
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
</nav>
<script type="text/javascript">
function delete_member(memberid,ext)
{
    //alert("hi");
    if(memberid!="")
    {
        var delconf;
        delconf=confirm("Are you sure to delete the member?");
        //alert(delconf);
        if(delconf)
        {
            window.location.href="delete_member.php?delmemid="+memberid+"&extension="+ext;
        }
        
    }
}
</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    	<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Manage Members</h4>
                                <p style="color: red;"> </p>
                                 <!-- <a href="add_member.php" class="btn btn-lg pull-right" name="add_new">Add New Member</a> -->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Flat_no</th>
                                    	<th>Name</th>
                                    	<th>Image</th>
                                    	<th>Phone no</th>
                                    	<th>Rented/Owner</th>
                                    	<th>Action</th>
                                    </thead>
<tbody>
<tr>
                                            <td>104</td>
                                            <td>Mazhar Ali</td>
                                            <td><img src="../images/mem_thumb_5.jpg"></td>
                                            <td>564764</td>
                                            <td>Rented</td>
                                            <td><a href="update_member.php?member_id=5">Modify</a>/<a href="#" onclick='delete_member(5,"jpg ")'>Delete</a></td>
</tr>
<tr>
                                            <td>202</td>
                                            <td>Rajesh Yadav</td>
                                            <td><img src="../images/mem_thumb_8.jpg"></td>
                                            <td>5896321</td>
                                            <td>Owner</td>
                                            <td><a href="update_member.php?member_id=8">Modify</a>/<a href="#" onclick='delete_member(8,"jpg ")'>Delete</a></td>
</tr>
<tr>
                                            <td>202</td>
                                            <td>Rajesh Yadav</td>
                                            <td><img src="../images/mem_thumb_9.jpg"></td>
                                            <td>5896321</td>
                                            <td>Owner</td>
                                            <td><a href="update_member.php?member_id=9">Modify</a>/<a href="#" onclick='delete_member(9,"jpg ")'>Delete</a></td>
</tr>
<tr>
                                            <td>303</td>
                                            <td>Janvi Shinde</td>
                                            <td><img src="../images/mem_thumb_12.jpg"></td>
                                            <td>89632541</td>
                                            <td>Owner</td>
                                            <td><a href="update_member.php?member_id=12">Modify</a>/<a href="#" onclick='delete_member(12,"jpg ")'>Delete</a></td>
</tr>
<tr>
                                            <td>503</td>
                                            <td>Kamlesh Rai</td>
                                            <td><img src="../images/mem_thumb_13.jpg"></td>
                                            <td>598623</td>
                                            <td>Owner</td>
                                            <td><a href="update_member.php?member_id=13">Modify</a>/<a href="#" onclick='delete_member(13,"jpg ")'>Delete</a></td>
</tr>
</tbody>
                                </table>
                            </div>
                            <!-- for pagination -->
                            <div>
                               <ul class="pagination">
                                
                                <li class='page-item'><a class='page-link' href='manage_members.php?page=1'>First</a></li><li class='page-item'><a class='page-link active' href='manage_members.php?page=1'>1</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=2'>2</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=3'>3</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=4'>4</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=5'>5</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=6'>6</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=7'>7</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=8'>8</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=9'>9</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=10'>10</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=11'>11</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=12'>12</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=13'>13</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=14'>14</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=15'>15</a></li><li class='page-item'><a class='page-link' href='manage_members.php?page=15'>Last</a></li>                                
                              </ul> 
                            </div>
                        </div>          
                    </div>                    
                </div>       
            </div>
</div>
<footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Naila</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<!-- <script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script> -->

</html>
