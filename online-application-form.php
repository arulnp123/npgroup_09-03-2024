<?php
$page = "Find And Apply";
include "config.php";
$id = $_GET['id'];
error_reporting(1);
set_time_limit(0);
include "mailer/PHPMailerAutoload.php";
if(isset($_POST['submit'])){
	//echo "<pre>";
	//print_r($_FILES);
	//print_r($_POST);
	//echo "</pre>";
	//die;
	
    $tag = "";
    $tag .= 'Name : ' . $_POST['first_name'] . '<br>';
    $tag .= 'Father Name : ' . $_POST['father_name'] . '<br>';
    $tag .= 'Mother Name : ' . $_POST['mother_name'] . '<br>';
    $tag .= 'Nationality : ' . $_POST['nationality'] . '<br>';
    $tag .= 'Religion : ' . $_POST['religion'] . '<br>';
    $tag .= 'Medium : ' . $_POST['medium'] . '<br>';
    $tag .= 'Blood Group : ' . $_POST['blood_group'] . '<br>';
    $tag .= 'Gender : ' . $_POST['gender'] . '<br>';
    $tag .= 'Date of Birth : ' . $_POST['dateof_birth'] . '<br>';
    $tag .= 'Employed Unemployed : ' . $_POST['employed_unemployed'] . '<br>';
    $tag .= 'Physically Handicapped : ' . $_POST['physically_handicapped'] . '<br>';
    $tag .= 'Phone Number : ' . $_POST['phone_number'] . '<br>';
    $tag .= 'Course : ' . $_POST['course'] . '<br>';
    $tag .= 'Enrolment Year : ' . $_POST['enrolment_year'] . '<br>';
    $tag .= 'Address : ' . $_POST['address'] . '<br>';
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = "abiya0605@gmail.com";
	$mail->Password = "rails2020";
	$mail->SetFrom("abiya0605@gmail.com");
	$mail->Subject = "JIIER Student Online Apply";
	$mail->MsgHTML($tag);
	
		
	for ($i = 0; $i < count($_FILES["resume"]['name']); $i++) {
		$mail->AddAttachment($_FILES['resume']['tmp_name'][$i],$_FILES['resume']['name'][$i]);
	}

	$mail->AddAddress("abiya0605@gmail.com");
	if (!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message has been sent";
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Online Application Form St.Joseph International Institute For Education And Research-JIIER </title>
    <meta name="description" content="St.Joseph International Institute For Education And Research-JIIER" />
    <meta name="Keywords" content="St.Joseph International Institute For Education And Research-JIIER" />
    <meta property="og:title" content="St.Joseph International Institute For Education And Research-JIIER" />
    <meta property="og:type" content="blog" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="St.Joseph International Institute For Education And Research-JIIER" />
    <meta property="og:url" content="http://www.jiier.org" />
    <meta property="og:site_name" content="St.Joseph International Institute For Education And Research-JIIER" />
    <meta name="twitter:card" content="summary" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content='IE=8' http-equiv='X-UA-Compatible' />
    <link rel="icon" href="./assets/images/jiier-logo.jpg" />

    <!-- bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/css/bootstrappage.css" rel="stylesheet" />

    <!-- global styles -->
    <link href="assets/css/flexslider.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet" />

    <!-- scripts -->
    <script src="assets/js/jquery-1.7.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/superfish.js"></script>
    <script src="assets/js/jquery.scrolltotop.js"></script>
    <!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139138483-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139138483-1');
</script>
</head>

<body>
 

    <section class="header_text">
        <h1><b>Online Application Form</b></h1>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span12">
                        <div id="myCarousel" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails">
                                   <li class="span4">
										<form action="" method="post">
                                                <table width="475px">
                                                    <tr>
                                                       <td valign="top">
														 <label for="first_name">
                                                                <h5>Full Name : *<h5 />
                                                            </label>
                                                            <input type="text" name="first_name" required maxlength="50" size="30" style="width:300px;">
                                                      
													 <label for="father_name">
                                                            <h5>Father Name : <h5 />
                                                        </label>
                                                        <input type="text" name="father_name" maxlength="80" size="30" style="width:300px;">
                                                    
														 <label for="mother_name">
                                                                <h5>Mother Name : <h5 />
                                                            </label>
                                                            <input type="text" name="mother_name"  maxlength="30" size="30" style="width:300px;">
                                                       
													 <label for="nationality">
                                                            <h5>Nationality : *<h5 />
                                                        </label>
                                                        <input type="text" name="nationality" required maxlength="80"  size="30" style="width:300px;">
                                                   
														      <label for="religion">
                                                                <h5>Religion : <h5 />
                                                            </label>
                                                            <input type="text" name="religion"  maxlength="50" size="30" style="width:300px;">
                                                       
													<label for="medium">
                                                            <h5>Medium : <h5 />
                                                        </label>
                                                        <input type="text" name="medium"  maxlength="80" size="30" style="width:300px;">
                                                  
														 <label for="blood_group">
                                                                <h5>Blood Group : <h5 />
                                                            </label>
                                                             <select class="form-control"  name="blood_group" id="blood_group"  style="width:310px;">
		<option>Select</option>
    <option value="A +">A +</option>
    <option value="A -">A -</option>
    <option value="B +">B +</option>
	<option value="A -">A -</option>
    <option value="AB +">AB +</option>
    <option value="AB -">AB -</option>
	<option value="O +">O +</option>
    <option value="O -">O -</option>
     </select> 

                                                        <label for="gender">
                                                            <h5>Gender : <h5 />
                                                        </label> 
														<select class="form-control" name="gender" id="gender" style="width:310px;">
	<option>Select</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Others">Others</option>
     </select> 
	 
														
                                                        </td>
                                                    </tr>
                                                   
                                                    
                                                </table>
                                        </li>
                                        <li class="span4">

                                                <table width="475px">
                                                    <tr>
                                                       
                                                       <td valign="top">
													   <label for="dateof_birth">
                                                                <h5>Date Of Birth : *<h5 />
                                                            </label>
                                                            <input type="date" name="dateof_birth" id="dateof_birth" required maxlength="50" size="30"  placeholder="MM/DD/YYYY"   style="width:300px;">
													
													   <label for="employed_unemployed">
                                                            <h5>Employed/Un-Employed : <h5 />
                                                        </label>
                                                         <select class="form-control"  name="employed_unemployed" id="employed_unemployed"  style="width:310px;">
														     <option value="">Select</option>
														     <option value="Yes">Yes</option>
														     <option value="No">No</option>
                                                        </select> 
                                               
														 <label for="physically_handicapped">
                                                                <h5>Physically Handicapped : <h5 />
                                                            </label>
                                                             <select class="form-control"  name="physically_handicapped" id="physically_handicapped"  style="width:310px;" >
		                                                       <option>Select</option>
															   <option value="Yes">Yes</option>
														       <option value="Yes">Yes</option>
                                                                    </select> 
													 <label for="phone_number">
                                                            <h5>Phone Number :<h5 />
                                                        </label>
                                                        <input type="tel" name="phone_number"  maxlength="80"  size="30" style="width:300px;">
                                                  
														   <label for="course">
                                                                <h5>Course : <h5 />
                                                            </label>
											    <?php
                                            //$sql = "select * from jiier_paper where id=$id";
$sql = "select a.*,b.program_name, c.degree_name,d.degree_type_name from jiier_paper a,jiier_program b,jiier_degree c, jiier_degree_type d where a.program_id=b.id and a.degree_id=c.id and a.degree_type_id=d.id and a.id=$id";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>	
												<textarea rows="4" cols="50" type="text" name="course"  size="30"  style="width:300px;">Program = <?php echo $row['program_name']; ?>,
												Degree = <?php echo $row['degree_name']; ?>,
												Degree Type = <?php echo $row['degree_type_name']; ?>,
												Paper = <?php echo $row['paper_name']; ?>
												</textarea>
															 <?php } ?>
													   <label for="enrolment_year">
                                                            <h5>Enrolment Year : 
                                                                <h5 />
                                                        </label>
                                                       <input type="tel" name="enrolment_year"  maxlength="30" size="30" style="width:300px;">
                                                 
													 <label for="address">
                                                            <h5>Address : 
                                                                <h5 />
                                                        </label>
                                                        <textarea rows="4" cols="50" type="text" name="address"  size="30"  style="width:300px;"></textarea>
                                                   
                                                      <label for="files_upload">
                                                            <h5>Files upload :<h5 />
                                                        </label>
														<input type="file" name="resume[]" multiple="multiple" size="30" style="width:300px;">
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="text-align:center">
                                                            <input type="submit" name="submit" value="Submit">
                                                            
                                                        </td>
                                                    </tr>
                                                    </tr>
                                                    
                                                </table>
                                            </form>
                                        </li>
                                       										   


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
               

                <script src="assets/js/common.js"></script>
                <script src="assets/js/jquery.flexslider-min.js"></script>
                <script type="text/javascript">
                $(function() {
                    $(document).ready(function() {
                        $('.flexslider').flexslider({
                            animation: "fade",
                            slideshowSpeed: 4000,
                            animationSpeed: 600,
                            controlNav: false,
                            directionNav: true,
                            controlsContainer: ".flex-container" // the container that holds the flexslider
                        });
                    });
                });
                </script>
</body>

</html>