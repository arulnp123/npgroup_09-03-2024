<?php


include "config.php";



$name="";
$email="";
$mobile="";
$password="";
$address="";
$user_type="";

if (isset($_POST['submit'])) {
	
	
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$mobile = trim($_POST['mobile']);
	$password = trim($_POST['password']);
	$address = trim($_POST['address']);
$user_type = trim($_POST['user_type']);
   

        $stmt = $conn->prepare("INSERT INTO users (name,email,mobile,password,address,user_type) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $name,$email,$mobile,$password,$address,$user_type);
        $stmt->execute();
		$id = $stmt->insert_id;
       
        header("location: index.php");
    
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
<title>Npgroups</title>

<!-- Bootstrap -->
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

<!--
<div class="page-header"><!-- page-header -->
 <!-- <div class="container">
    <div class="row page-section"><!-- page section -->
 <!--     <div class="col-md-12 page-description"><!-- page description -->
  <!--      <h1 class="page-title">Register</h1>
      </div>
      <!-- page description --> 
      
 <!--   </div>
    <!-- page section --> 
  <!--</div>
  <div class="page-breadcrumb">
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active">Franchising</li>
    </ol>
  </div>
</div>
<!-- /.page-header -->


<div class="main-container"><!-- main container -->
 <!-- <div class="space-bottom-80">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <img src="images/frenchising.jpg" alt="" class="img-responsive">
        </div>
        <div class="col-md-6 col-sm-6">
          <h1>SCHOOL MANAGEMENT</h1>
          <p>Management is the administration of an organization, a not-for-profit organization, or government body. Management includes the activities of setting the strategy of an organization and coordinating the efforts of its employees to accomplish its objectives through the application of available resources, such as financial, natural, technological, and human resources. The term "management" may also refer to those people who manage an organization, study management as an academic discipline, </p>
            </div>
      </div>
    </div>
  </div>-->
<!--  <div class="section-space section-color">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8 section-title">
          <h1>SCHOOL MANAGEMENT</h1>
          <p class="lead">Fixit utrum sitaet enim at euismod eleifend turpiise luctus nisi felis eget suscipit ipsum ultrices sitamet endisse non sodales ulaam lacmassa ac lectus efficitur a lobortis placerat.</p>
        </div>
        <div class="col-md-6 col-sm-6">
          <ul class="listnone circle">
            <li>Added Menus</li>
            <li>Added Fees session</li>
            <li>Added Staff Attendance.</li>
			   <li>Added Student Transport Report</li>
			     <li>Added login with last logout page</li>
          </ul>
        </div>
        <div class="col-md-6 col-sm-6">
          <ul class="listnone circle">
            <li>Added Staff Attendance Report</li>
            <li>Added Assign Class Teacher</li>
            <li>Added Student History</li>
			  <li>Added Calendar Event</li>
          </ul>
        </div>
      </div>
    </div>
  </div>-->
  <div class="section-space"  style="margin-top: -120px;">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8 section-title" style=" margin-bottom: 0px">
          <h1>Register Form</h1>
         </div>
      </div>
      <div class="row">
        <form class="" method="post" action="">
          <div class="col-md-8"> 
            <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="name">Name</label>
              <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required>
            </div>
          </div>
          <!-- Text input-->
          <div class="col-md-8">
            <div class="form-group">
              <label class="control-label" for="email">E-mail</label>
              <input id="email" name="email" type="text" placeholder="email" class="form-control input-md" required>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label class="control-label" for="password">password</label>
              <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required>
            </div>
          </div>
          <!-- Text input-->
          <div class="col-md-8">
            <div class="form-group">
              <label class="control-label" for="mobile">Phone</label>
              <input id="mobile" name="mobile" type="text" placeholder="mobile" class="form-control input-md" required>
            </div>
          </div>
          <div class="col-md-8"><!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="address">Address</label>
              <input id="address" name="address" type="text" placeholder="address" class="form-control input-md">
            </div>
          </div>
          
          
                <div class="col-md-8">
            <div class="form-group">
              <label class="control-label" for="user_type">Select user</label>
              <select id="user_type" name="user_type" class="form-control">
                <option value=""></option>
                <option value="staff">Staff</option>
                <option value="student">Student</option>
            
              </select>
            </div>
          </div>
      <!--    <div class="col-md-8">
            <div class="form-group">
              <label class="control-label" for="city">Select city</label>
              <select id="city" name="city" class="form-control">
                <option value=""></option>
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Pune">Pune</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Banglore">Banglore</option>
              </select>
            </div>
          </div>-->
          
          <!-- Select Basic -->
        <!--  <div class="col-md-8">
            <div class="form-group">
              <label class="control-label" for="state">Select state</label>
              <select id="state" name="state" class="form-control">
              <option value=""></option>
                <option value="Gujarat">Gujarat</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Goa">Goa</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
              </select>
            </div>
          </div>-->
          
          <!-- Textarea -->
      <!--      <div class="col-md-8">
            <div class="form-group">
              <label class="control-label" for="about">Tell us A Little About Yourself:</label>
              <textarea class="form-control" id="about" name="about" rows="5">default text</textarea>
            </div>
          </div>-->
          
           <div class="col-md-8">
            <button type="submit" class="btn btn-default">Submit Request</button>
             <button type="submit" class="btn btn-default"><a href="http://npgroups.com/index.php" style="color: #fff;" >Back</a> </button>
          </div>
        </form>
      </div>
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
<!-- Back to top script --> 
<script src="js/back-to-top.js" type="text/javascript"></script>
</body>


</html>