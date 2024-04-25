<?php
$status = "";
$to = "info@npgroups.com";
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$comments = $_POST['comments'];
	
	if(empty($name) || empty($phone) || empty($email) || empty($comments))
	{
		$status = '<div class="alert alert-danger">
  <strong>Error!</strong> Please fill required fields
</div>';
	}
	
	if(empty($status))
	{
	
		 $subject = "NPGROUPS Web";
         $message  = "\n Name: ".$name."\r\n";
         $message .= "\n Phone: ".$phone."\r\n";
		 $message .= "\n Email: ".$email."\r\n";
		 $message .= "\n Message: ".$comments."\r\n";
         
         $header = "From:info@npgroups.com   \r\n";
         $header .= "Cc:sivaarulnp@gmail.com  \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            $status = '<div class="alert alert-success">
  <strong>Success!</strong> Email sent successfully
</div>';
         }else {
            $status = '<div class="alert alert-danger">
  <strong>Error!</strong> Failed to send message.
</div>';
         }
		 
	}
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Fixit is repair Shop websites template.">
    <meta name="keywords" content="HTML,CSS, Hardware Repair, Computer Repair, Website Template, Console Repair, Tablet Repair, iMac Repair">
    <title>NP Software Service</title>
    <!-- Bootstrap -->
    <link rel="icon" href="images/12.jpg" type="images/12.jpg" sizes="20x20">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Style -->
    <link href="css/style.css" rel="stylesheet">
    <!-- animsition css -->
    <link rel="stylesheet" type="text/css" href="css/animsition.min.css">
    <!-- Template icon font css -->
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- Template Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600,300,700' rel='stylesheet' type='text/css'>
    
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139138483-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139138483-1');
</script>
	
</head>

<body class="animsition">
    <div class="collapse" id="search-area">
        <div class="well-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
            </span> </div>
                        <!-- /input-group -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
            </div>
        </div>
    </div>
	<?php include "menu.php" ?>
   
    <div class="page-header" style="background:url(images/slider-2.jpg)">
        <!-- page-header -->
        <div class="container">
            <div class="row page-section">
                <!-- page section -->
                <div class="col-md-12 page-description">
                    <!-- page description -->
                    <h1 class="page-title">Contact us</h1>
                </div>
                <!-- page description -->
            </div>
            <!-- page section -->
        </div>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Contact us</li>
            </ol>
        </div>
    </div>
    <!-- /.page-header -->
    <div class="main-container">
        <!-- main container -->
        <div class="container">
            <div class="row">
                <div class="col-md-7 content col-sm-12">
                    <!-- content -->
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Get In Touch With NPS</h1>
                            <p>NPS is an Software Company based out of Nagercoil.</p>
                        </div>
                        <div class="col-md-12">
                           <!-- <form class="contact-form" id="contactus" method="post" action="">-->
                             <form class="contact-form" action="send_contact.php" method="post"  id="contact_form">
			
	<!-- <form id="sign_up" method="POST" action="send_contact.php"  class="col s12" enctype="">-->	
                                <div class="row">
                                    <!-- Text input-->
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Name<span class="required">*</span></label>
                                            <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label" for="email">Email<span class="required">*</span></label>
                                            <input id="email" name="email" type="email" placeholder="" class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label" for="phone">Phone</label>
                                            <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <!-- Textarea -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="comments">Message</label>
                                            <textarea class="form-control" id="comments" rows="7" name="comments"></textarea>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                        <span class="required pull-right">*Required Field</span> </div>
                                </div>
                            </form>
                            <!--</form>-->
                        </div>
                    </div>
                </div>
                <!-- /.content -->
                <div class="col-md-offset-1 col-md-4 sidebar col-sm-12">
                    <!-- sidebar -->
                    <div class="row">
                        <div class="col-md-12 widget col-sm-4">
                            <div class="well-bg widget-address">
                                <div class="well-inner"> <i class="fa fa-home"></i>
                                    <h3>Address</h3>
                                    <address>
									
									
									NP Software Services Pvt Ltd    <br> 
                    181/4A Vivakanadher Street 
                     <br> KP Road, Opp to SIMCO Nagercoil;
                      Pincode : 629003

                     
                                    </address>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 widget col-sm-4">
                            <div class="well-bg widget-schedule">
                                <div class="well-inner"> <i class="fa fa-clock-o"></i>
                                    <h3>Schedule</h3>
                                    <ul class="listnone">
                                        <li>Mon - Sat : <strong> 9am - 9pm</strong></li>
                                        <!--<li>Sat : <strong> Holiday</strong></li>--->
                                        <li>Sun :   Phone Contact only.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 widget col-sm-4">
                            <div class="well-bg widget-phone">
                                <div class="well-inner"> <i class="fa fa-phone"></i>
                                    <h3>Phone</h3>
                                    <ul class="listnone">
                                        <li>Whatsapp  : +91-9566080828</li>
                                        <li>Office : 04652-221831</li>
                                        <li>Mobile : +91-9566080828</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.sidebar -->
            </div>
        </div>
    </div>
    <!-- /.main container -->
   
	
		<?php include "footer.php" ?>
	
    <!-- back to top icon -->
    <a href="#0" class="cd-top" title="Go to top">Top</a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Navigation -->
    <script src="js/menumaker.js"></script>
    <script type="text/javascript">
    $("#navigation").menumaker({
        title: "Menu",
        format: "multitoggle"
    });
    </script>
    <!-- animsition -->
    <script type="text/javascript" src="js/animsition.js"></script>
    <script type="text/javascript" src="js/animsition-script.js"></script>
    <!-- Sticky header -->
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <script type="text/javascript" src="js/sticky-header.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <!-- Back to top script -->
    <script src="js/back-to-top.js" type="text/javascript"></script>
    <script>
    var myCenter = new google.maps.LatLng(23.0203458, 72.5797426);

    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom: 9,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        var marker = new google.maps.Marker({
            position: myCenter,

            icon: 'images/marker.png'
        });

        marker.setMap(map);
        var infowindow = new google.maps.InfoWindow({
            content: "Hello Address"
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</body>


</html>