<?php session_start();
@$BMI = $_SESSION['BMI'];
@$avgStep = $_SESSION['avgStep'];
@$email = $_SESSION["adminemail"];
$conn = @mysql_connect("localhost","root","");
if (!$conn){
    die("Failed to connect database£º" . mysql_error());
}
$db=mysql_select_db("se1", $conn);
if(!$db)
{
  die("Failed to connect to MySQL:". mysql_error());
}
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
                    <h1 class="page-header"><i class="fa fa-tag"></i> Suggestion</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            Suggestions
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#goal" data-toggle="tab"><i class="fa fa-edit fa-fw"></i> Based on goal</a>
                                </li>
                                <li><a href="#plan" data-toggle="tab"><i class="fa fa-calendar-o fa-fw"></i> Based on plan</a>
                                </li>
                                <li><a href="#friends" data-toggle="tab"><i class="fa fa-facebook-square fa-fw"></i> Based on friends</a>
                                </li>
                                <li><a href="#fitbit" data-toggle="tab"><i class="fa fa-circle-o fa-fw"></i> Based on fitbit</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="goal">
                                    <h4>Suggestions based on goal</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="plan">
                                    <h4>Suggestions based on plan</h4>
                                    <?php
                                    //$userPlan = mysql_query(query)
                                    $rst = mysql_query("SELECT * FROM `plan` where EmailAdd='$email' ORDER BY `plan`.`StartDate` DESC limit 1");
                                    //$rst2 = mysql_query("SELECT max('Start-Date') as maxtime from plan where EmailAdd='$email'");
                                    $v = mysql_fetch_assoc($rst);
                                    $array = explode(',', $v['Body']);
                                    foreach ($array as $j) {
                                        echo "<li>";
                                        echo $j;
                                        echo "<br/>";
                                        switch ($j) {
                                            case 'Chest':
                                                # code...
                                                echo "The chest is made up of two muscles that work together to make the chest function. The muscle are the pectoralis major and pectoralis minor. Basically, the pectoralis minor is located directly underneath the pectoralis major. Overall, these chest muscles start at the clavicle and insert at the sternum and the armpit area (humerous).The three different functions of the chest muscles are the side arm pitching motion, the ability to bring your arm up and down at your sides, and the classic arm wresting motion. The basic recommended exercises for building up your chest include the bench press and flyes.";
                                                break;
                                            case 'Back':
                                                # code...
                                                echo "The most important thing to do on every rep of every set of every back workout is to squeeze it. Most of the time the reason you can't grow your back is because you can't feel it. Hold the contracted position of each back lift for one second and if you still can't feel your back working you are probably still performing the movement incorrectly.Your mind is just as important when lifting as your body is. Because you can't see your back working you have to imagine it working instead. Before you start your back workout start to visualize your exercises; pull-ups, pulldowns, rows (dumbbell and barbell), deadlifts, or whatever you are doing that day. Imagine that you are working your back and only your back when doing these exercises and visualize yourself doing these exercises from behind. Visualize what you would look like if you were standing behind yourself.";
                                                break;
                                            case 'Abs':
                                                # code...
                                                echo "Your diet is essential in building a lean physique. It is important to consume 4- to-6 small meals per day;The very first thing that you'll want to ensure is in place if you're going to increase the total tension that you place on the abs is a good mind-muscle connection.";
                                                break;
                                            case 'Arms':
                                                # code...
                                                echo "One key to building lean mass is keeping your muscles under tension. The best way to do this is by increasing the length of each rep by pausing for some extra squeeze at the top of the movement.Do supersets. Supersets are a technique which calls for you to do two exercises back-to-back without resting. One of the best ways to employ this technique is to do a triceps exercise and follow it immediately with a biceps exercise or vice versa.";
                                                break;
                                            case 'Shoulder':
                                                echo "Overhead press exercises—dumbbell press, barbell press, behind-the-neck press, and many other variations—may seem fairly interchangeable, but they're actually quite different.Take Your Heavy Overhead Presses To The Front.If you've already got shoulder pain—as many long-time lifters do—overhead presses may be a contributing factor.Try Shoulder-Friendly Overhead-Press Variations.";
                                                break;
                                            case 'Butt':
                                                # code...
                                                echo "Cardiovascular exercises are the best form of exercises to perform. You need to make sure you are moving your body for at least thirty minutes each day. Weight training is also a good method to use and it can help you not only lose butt fat, but build up muscle.";
                                                break;
                                            case 'Legs':
                                                # code...
                                                echo "Don’t train legs without a partner. “A good training partner pushes you to handle more poundage and gives you incentive to grind out more reps per set,” Arnold wrote in his early autobiography. “Workouts are more fun with a partner as well as more competitive…you challenge each other.” When you’ve forced out all the reps you can for squats, for example, stand holding the weight for a moment, then do one more rep (with a partner spotting you) to push your body to its absolute limit.";
                                                break;
                                            default:
                                                # code...
                                                break;
                                        }
                                        echo "</li>";
                                    }

                                     ?>
                                    <p></p>
                                </div>
                                <div class="tab-pane fade" id="friends">
                                    <h4>Suggestions based on friends</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="fitbit">
                                    <h4>Suggestions based on fitbit</h4>
                                    <p><?php echo "Your BMI = $BMI<br/>";
                                    if ($BMI>25) {
                                        echo "Your body mass index (BMI) is $BMI which, according to the CDC, is classified as overweight for adults 20 years of age and older.<br/>";
                                    }
                                    elseif ($BMI<=25&&$BMI>18.5) {
                                        echo "Your body mass index (BMI) is $BMI which, according to the CDC, is classified as normal for adults 20 years of age and older.<br/>";
                                    }
                                    elseif ($BMI<=18.5) {
                                        echo "Your body mass index (BMI) is $BMI which, according to the CDC, is classified as underweight for adults 20 years of age and older.<br/>";
                                    }
                                    echo "Your average step = $avgStep<br/>";
                                    echo "Medical research has shown that overweight individuals who lose weight through exercise and/or dieting can significantly decrease their risk of heart disease, diabetes and other illnesses.A regular running program provides one of the best ways to lose weight or maintain healthy weight. Each mile you cover will burn approximately 125 calories.Running long and slow burns a higher percentage of fat calories, and teaches your body to become more efficient at fat-burning, which gives you more endurance for long runs and marathons.Running shorter and faster burns more total calories per minute or mile, which helps you lose weight, including body fat. Faster running also increases your 'afterburn' the calories your body continues burning after your run stops. We believe it is a good idea to mix longer runs and faster runs in your workout program.";
                                     ?> </p>
                                    
                                </div>

                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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

</body>

</html>
