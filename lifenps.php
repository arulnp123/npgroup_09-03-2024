<?php

include "config.php";

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
<div class="page-header"  style="background:url(images/careers1.jpg)"><!-- page-header -->
  <div class="container">
    <div class="row page-section"><!-- page section -->
      <div class="col-md-12 page-description"><!-- page description -->
        <h1 class="page-title">CAREERS</h1>
      </div>
      <!-- page description --> 
      
    </div>
    <!-- page section --> 
  </div>
  <div class="page-breadcrumb">
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active">CAREERS</li>
    </ol>
  </div>
</div>
<!-- /.page-header -->
<div class="main-container"><!-- main container -->
  <div class="container">
    <div class="row">
      <div class="col-md-12 faq-listing col-sm-12">
        <ul class="listnone">
            
            <li> <h2>CAREERS</h2><br>
            <?php
                        if($_SESSION['user_type']=="admin"){
                                    $sql = "select * from career ";
                        }else{
                            $user_id=$_SESSION['user_id'];
                                   $sql = "select * from career ";
                        }
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
        
        <p><b>Job Title : <?php echo $row['job_title']; ?> </b></p></li>
        <li> <h2></h2>
        <p>Job Descriptions : <?php echo $row['job_descri']; ?></p></li>
        <li> <h2></h2>
        <p>Preferred skills :  <?php echo $row['preferred_skills']; ?></p></li>
       <li> <h2></h2>
        <p>Qualification required :  <?php echo $row['qualification_required']; ?></p></li>
       
        <button type="a href=""" class="btn btn-default"><a href="careers.php"style="color: #fff;">Apply Now </a></button> <br><hr>
 	<?php } ?>



        </ul>
      </div>
    </div>
  </div>
</div>

<!--<div class="col-md-12">
<center>
            <button type="a href=""" class="btn btn-default"><a href="careers.php"style="color: #fff;">Apply Now </a></button>
			</center>
        
          </div>-->
          
          </br>
</br>
</br>
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