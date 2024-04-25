<?php
include('config.php');

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$phoneno = $_POST['phoneno'];
	$email = $_POST['email'];
	$whatsupno = $_POST['whatsupno'];
	$college = $_POST['college'];
	$yearstudy = $_POST['yearstudy'];
    $location = $_POST['location'];
    $training = $_POST['training'];
	$programintrested = $_POST['programintrested'];
	
    $sql="INSERT INTO enquiry (name,email,phoneno,whatsupno,location,training,college,yearstudy,programintrested) 
	VALUES ('".$name."','".$email."', '".$phoneno."', '".$whatsupno."','".$location."','".$training."','".$college."','".$yearstudy."','".$programintrested."')";
    $result = mysqli_query($conn, $sql); 
    if($result)
    {
         $message="Thank you for Submitting the form";
         echo "<script>alert('$message');</script>";
       
    }
    else
    {
       echo mysqli_error();
        
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
    <meta name="description" content="NP Software Service Pvt Ltd ">
    <title>NP Software Service</title>
    <!-- Bootstrap -->
    <link rel="icon" href="images/nps8.jpg" type="images/nps8.jpg" sizes="16x16">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Style -->
    <link href="css/style.css" rel="stylesheet">
    <!-- animsition css -->
    <link rel="stylesheet" type="text/css" href="css/animsition.min.css">
    <!-- slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css" />
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- Template Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
   
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
<button class="btn btn-default"type="button">Go!</button>
</span> </div>
                        <!-- /input-group -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
            </div>
        </div>
    </div>
	<?php include "menu.php" ?>
	
    
 
  
  
    
    <div class="section-space section-color">
        <div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="post">
				<span class="contact100-form-title">
					Training and Internship Offer from 
				</span>
              <span class="contact100-form-title softwar" style="color: #04aeae;">
					 NP Software
				</span>

				<div class="wrap-input100 validate-input">
					<span class="label-input100"> Name *</span>
					<input class="input100" type="text" name="name" placeholder="Name" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input">
					<span class="label-input100">Email *</span>
					<input class="input100" type="email" name="email" placeholder="Email" required>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input">
					<span class="label-input100">Phone number *</span>
					<input class="input100" type="tel" name="phoneno"maxlength="10"  placeholder="Phone number" pattern="[1-9]{1}[0-9]{9}" required>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input">
					<span class="label-input100">Whatsapp Phone Number *</span>
					<input class="input100" type="tel" name="whatsupno" maxlength="10" placeholder="Whatsapp Phone Number" pattern="[1-9]{1}[0-9]{9}" required>
					<span class="focus-input100"></span>
				</div>
		       <div class="wrap-input100 validate-input" required>
					<span class="label-input100">Location</span>
					<input class="input100" type="text" name="location" placeholder="Location" required>
					<span class="focus-input100"></span>
				</div>
                <div class="wrap-input100 validate-input"  required>
					<span class="label-input100">College Name *</span>
					<input class="input100" type="text" name="college" placeholder="College Name" required>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" required>
					<span class="label-input100">Year of study*</span>
					<input class="input100" type="text" name="yearstudy" placeholder="Year of study" required>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 input100-select">
					<span class="label-input100">Training *</span>
					<div>
						<select class="selection-2" name="training" required     style="width: 100%;border: none;">
							<option value="">Select</option>
							<option value="Inplant Training">Inplant Training</option>
							<option value="Intenship Training">Intenship Training</option>
							
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 input100-select">
					<span class="label-input100">Program Interested in *</span>
					<div>
						<select class="selection-2" name="programintrested" required   style="width: 100%;border: none;">
							<option value="0">Select</option>
							<option value="Html/CSS">Html/CSS</option>
<option value="Bootstrap/JavaScript/jQuery">Bootstrap/JavaScript/jQuery</option>
<option value="Php/Codeignator">Php/Codeignator</option>
<option value="Android/Flutter">Android/Flutter</option>
<option value="Java">Java</option>
<option value="PythonPhp/Codeignator">PythonPhp/Codeignator</option>
<option value="Android/Flutter">Android/Flutter</option>
<option value="Python">Python</option>
<option value="Azure/AWS/GCP">Azure/AWS/GCP</option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>

				

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						
						  <button type="submit" name="submit" class="contact100-form-btn" style="background-color: #06afb2;">
							<span>
								Submit
								
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>
    </div>
  
  
  <style>
  * {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #0a2580;
   color: #fff;
 padding: 5px 0;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: -60px;
  width: 160px;
     float: right;
    font-size: 14px;
   
    text-align: center;
    
    height: 40px;
	
	 top: 40%;
    font-weight: 700;
    text-transform: uppercase;
    

    letter-spacing: 2px;
    text-shadow: 0 0 0 #033093;
	border-radius: 0;
    -webkit-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    transform: rotate(270deg);
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 0px;
/*  border: 3px solid #f1f1f1;*/
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: #0a2580;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 6px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
    .footer{
    display:none;
    }
</style>  
  
<button class="open-button" onclick="openForm()">Enquire now</button>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
       <h3 style="color:#fff;">Enquire now</h3>

    <input type="text" placeholder="Enter Name" name="Name" required>
	

		<input type="text" placeholder="Enter Email" name="email" required>
    

    <input type="password" placeholder="Enter Phone" name="psw" required>
    
	
    <input type="password" placeholder="Enter Message" name="psw" required>

    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
  
  
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
    <!-- Slider -->
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>
    <script type="text/javascript" src="js/testimonial.js"></script>
    <!-- Back to top script -->
    <script src="js/back-to-top.js" type="text/javascript"></script>
	<script src="vendor/select2/select2.min.js"></script>

	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
</body>


</html>