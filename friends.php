<?php session_start();
@$email = $_SESSION["adminemail"];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RU Healthy</title>

    <!-- Bootstrap Core CSS -->
    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="styles/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="styles/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="styles/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<script>


function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(redirectToPosition);
    } else { 
        //x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function redirectToPosition(position) {
    window.location='friends.php?lat='+position.coords.latitude+'&long='+position.coords.longitude;
}
</script>
<?php

// Connect to the database
$conn = @mysql_connect("localhost","root","");
if (!$conn){
    die("Failed to connect database£º" . mysql_error());
}
$db=mysql_select_db("se1", $conn);
if(!$db)
{
  die("Failed to connect to MySQL:". mysql_error());
}

$lat=(isset($_GET['lat']))?$_GET['lat']:'';
$long=(isset($_GET['long']))?$_GET['long']:'';

if($lat<>0){
mysql_query("UPDATE account SET Longitude='$long' WHERE EmailAdd='$email'");
mysql_query("UPDATE account SET Latitude='$lat' WHERE EmailAdd='$email'");
}

$result = mysql_query("SELECT * from account where EmailAdd='$email'");

$value = mysql_fetch_assoc($result);
$lowWeight = $value['Weight'] - 10;
$highWeight = $value['Weight'] + 10;
$lowHight = $value['Height'] - 2;
$highHight = $value['Height'] + 2;
$lowLat = $value['Latitude'] - 0.2;
$highLat = $value['Latitude'] + 0.2;
$lowLong = $value['Longitude'] - 0.2;
$highLong = $value['Longitude'] + 0.2;

$selected = mysql_query("SELECT * from account WHERE (Weight<$highWeight AND Weight>$lowWeight) AND 
(Height<$highHight AND Height>$lowHight) AND (Latitude<$highLat AND Latitude>$lowLat) AND (Longitude<$highLong AND Longitude>$lowLong) AND EmailAdd <> '$email'");

if (mysql_num_rows($selected) == 0) {
    echo "No recommended friends";
}

/*while ($row = mysql_fetch_assoc($selected)) {
    echo $row["EmailAdd"];
}*/

?>




    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">RU Healthy</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
						
						
						
						
						<!-- <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>lulu</div>
                            </a>
                        </li> -->
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="friends.php"><i class="fa fa-facebook fa-fw"></i> Friends</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Fitting<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="plan.php">Plan</a>
                                </li>
                                <li>
                                    <a href="gym.php">GYM</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="suggestion.php"><i class="fa fa-tag fa-fw"></i> Suggestion</a>
                        </li>
                        <li>
                            <a href="contactus.php"><i class="fa fa-envelope-o fa-fw"></i> Contact Us</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> <i class="fa fa-facebook"></i> Friends</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <i class="fa fa-facebook-square"></i> Friends Info
                        </div>
                        <div class="panel-body">
                            
							
							<!--Show to do list-->
                            <h4><i class="fa fa-github-alt"></i> To do list: </h4>
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
							<?php 
							$requestList=mysql_query("SELECT * FROM friend WHERE EmailAdd='$email'");
							$requestValue=mysql_fetch_assoc($requestList);
							$requestArray = explode(',',$requestValue['Request']);
							foreach($requestArray as $eachrequest)
							{
								$IDresult = mysql_query("SELECT * from account where ID='$eachrequest'");
								$IDvalue = mysql_fetch_assoc($IDresult);
						        $firstnameValue=$IDvalue['FirstName'];
								$LastnameValue=$IDvalue['LastName'];
							?>
							
							<h4 class="text-danger"> 
								<?php 
								if($IDvalue['FirstName']<>null && $IDvalue['LastName']<>null)
								{
									echo $firstnameValue." ".$LastnameValue; 
								?> 
							
							<button class="btn btn-outline btn-success pull-right" name="request" value="<?php echo $IDvalue['ID']?>" >Accept</button></h4>
							<br>  
							    <?php 
								} 
								?>
							<?php
							}
							?>
							</form>
							
							<!--button activity-->
							<?php 
                                if(isset($_POST["request"]))
                                {
                                    //echo "request sent";
                                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                                    {
                                        if(@$_POST["request"] != null){    
                                            $RequestID=$_POST["request"];
											$flag = 0;
											$filter = mysql_query("SELECT * FROM friend WHERE EmailAdd = '$email'");
											$val = mysql_fetch_assoc($filter);
											$array = explode(',', $val['FriendList']);
											foreach ($array as $j) {
												if($j == $RequestID)
													$flag = 1;
											}
											if($flag == 0)
											{
											mysql_query("UPDATE friend SET FriendList=concat(FriendList,'$RequestID,') WHERE EmailAdd='$email'");
											mysql_query("UPDATE friend SET Request=replace(Request,'$RequestID,','') WHERE EmailAdd='$email'");
											mysql_query("UPDATE friend SET Send=replace(FriendList,'$RequestID,','') WHERE ID='$RequestID'");
											$resultID=mysql_query("SELECT * FROM account WHERE EmailAdd = '$email'");
											$valueID=mysql_fetch_assoc($resultID);
											$mineID=$valueID['ID'];
											mysql_query("UPDATE friend SET FriendList=concat(FriendList,'$mineID,') WHERE ID='$RequestID'");
											}
                                        }
                                    }
                                }
                            ?>
							<!--Show to do list end-->
							
							<h4><i class="fa fa-github-alt"></i> Matched Friends: </h4>
                            
							<!--Show matched friends-->
							<?php 
							$friendsList=mysql_query("SELECT * FROM friend WHERE EmailAdd='$email'");
							$friendValue=mysql_fetch_assoc($friendsList);
							$friendArray = explode(',',$friendValue['FriendList']);
							foreach($friendArray as $eachFriend)
							{
								$IDresult = mysql_query("SELECT * from account where ID='$eachFriend'");
								$IDvalue = mysql_fetch_assoc($IDresult);
						        $firstnameValue=$IDvalue['FirstName'];
								$LastnameValue=$IDvalue['LastName'];
								
							?>
							
							<h4 class="text-danger"> <?php if($IDvalue['FirstName']<>null&&$IDvalue['LastName']<>null){echo $firstnameValue." ".$LastnameValue;}?></h4>
							<br>
							<?php 							
							}
							?>
							<!--Show matched friends end-->
							
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-circle-o"></i> Nearby
                        </div>
                        <div class="panel-body">
                           <button type="button" class="btn btn-primary btn-lg btn-block" onclick="getLocation()">Get Your Recommended Users</button>
						    <h4><i class="fa fa-github-alt"></i> Nearby Friends: </h4>
                            <br>
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
							<?php while ($row = mysql_fetch_assoc($selected)) {
								if (mysql_num_rows($selected) == 0) {
								echo "No recommended friends";
								}
							?>
                            <h4 class="text-danger"> <?php  echo $row["FirstName"] ." ". $row["LastName"]?>
							<button  class="btn btn-outline btn-success pull-right" name="send" value="<?php echo $row['ID'] ?>">Send Request</button>
                            <button type= "button" class="btn btn-outline btn-info pull-right btn-primary" data-toggle="modal" data-target="#mymodal-data" >info</button></h5>
							<br>
							<?php } ?>
                            </form>
                            
                            <?php  
                                if(isset($_POST["send"]))
                                {
                                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                                    {
                                        if(@$_POST["send"] != null){    
                                            $Send=$_POST["send"];
											$flag = 0;
											$Request = $value['ID'];
											$infoID = $_POST["send"];
							                $infoResult = mysql_query("SELECT * FROM account WHERE ID = '$infoID'");
							                $infoValue = mysql_fetch_assoc($infoResult);
											$filter = mysql_query("SELECT * FROM friend WHERE EmailAdd = '$email'");
											$val = mysql_fetch_assoc($filter);
											$array = explode(',', $val['Send']);
											foreach ($array as $j) {
												if($j == $Send)
													$flag = 1;
											}
											if($flag == 0)
											{
                                            mysql_query("UPDATE friend SET Send=concat(Send,'$Send,') WHERE EmailAdd='$email'");
											mysql_query("UPDATE friend SET Request = concat(Request,'$Request,') WHERE ID = '$Send'");
											}
                                        }
                                    }
                                }
                            ?>
                        
						<div class="modal" id="mymodal-data" tabindex="-1" role="dialog" aria-labelledby="mySnallModalLabel" aria-didden="true">
                                <div class="modal-dialog">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                           <h4 class="modal-title"><?php echo $infoValue['FirstName']." ".$infoValue['LastName'] ?></h4>
                                       </div>
                                       <div class="modal-body">
                                            <div class="panel panel-red">
                                                <div class="panel-heading">
                                                    <i class="fa fa-facebook-square"></i> Users Info
                                                </div>
                                                <div class="panel-body">
                                                    <h5 class="text-danger"> Gender: <?php echo $infoValue['Gender'] ?> </h5>
                                                    <h5 class="text-danger"> Age: <?php echo $infoValue['Age'] ?> </h5>
													<h5 class="text-danger"> Weight: <?php echo $infoValue['Weight'] ?> </h5>
													<h5 class="text-danger"> Height: <?php echo $infoValue['Height'] ?> </h5>
                                                    <br>
												</div>
                                            </div>
                                       </div>
									       <div class="modal-footer">
                                           <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
										   </div>
                                   </div>
                               </div>
                            </div>
						
						</div>
                        <div class="panel-footer">
                        </div>
                    </div>
                    <!-- /.col-lg-8 -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="scripts/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="scripts/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="scripts/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="scripts/raphael.min.js"></script>
    <script src="scripts/morris.min.js"></script>
    <script src="scripts/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="scripts/sb-admin-2.js"></script>

    <!-- Map -->
    <script src="scripts/map.js"></script>
    <style type="text/css">
            div#map { margin: 0 auto 0 auto; }
    </style>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdaezwONOepDO5aOOFYdnh7gdSaVHuYuU&libraries=places&callback=initMap">
    </script>

</body>

</html>
