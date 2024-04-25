<?php
$page = "Careers";

// the message
//$msg = "First line of text\nSecond line of text";
// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);
// send email
//mail("winwinweb05@gmail.com","My subject",$msg);


$postData = $uploadedFile = $statusMsg = '';
$msgClass = 'errordiv';
if(isset($_POST['submit'])){
    // Get the submitted form data
    $postData = $_POST;
    
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$notice = $_POST['notice'];


    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($notice)){
        
        // Validate email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
        }else{
            $uploadStatus = 1;
            
			
            // Upload attachment file
            if(!empty($_FILES["attachment"]["name"])){
                
                // File path config
                $targetDir = "uploads/";
                $fileName = basename($_FILES["attachment"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                
                // Allow certain file formats
                $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to the server
                    if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFilePath)){
                        $uploadedFile = $targetFilePath;
                    }else{
                        $uploadStatus = 0;
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                }else{
                    $uploadStatus = 0;
                    $statusMsg = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.';
                }
            }
            
            if($uploadStatus == 1){
                
                // Recipient
               //  $toEmail = 'abiya0605@gmail.com';
                $toEmail = 'CarrerEWGlobal@gmail.com';
 
 
                 // Sender
                $from = 'CarrerEWGlobal@gmail.com';
                $fromName = 'checking from ew';
                
                // Subject
               $emailSubject = 'Find a job Request Submitted by '.$name;
                
                // Message 
                 $htmlContent = '<h2>Contact Request Submitted</h2>
                    <p><b>Name:</b> '.$name.'</p>
					<p><b>Type of Job:</b> '.$subject.'</p>
                    <p><b>Email:</b> '.$email.'</p>
					<p><b>Phone:</b> '.$phone.'</p>
                    <p><b>Subject:</b> '.$notice.'</p>';
					
					
		     	 //	var_dump($_POST);
			     //	print_r($_POST);
                 // exit;
   
                // Header for sender info
                $headers = "From: $fromName"." <".$from.">";

                if(!empty($uploadedFile) && file_exists($uploadedFile)){
                    
                    // Boundary 
                    $semi_rand = md5(time()); 
                    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
                    
                    // Headers for attachment 
                    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
                    
                    // Multipart boundary 
                    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 
                    
                    // Preparing attachment
                    if(is_file($uploadedFile)){
                        $message .= "--{$mime_boundary}\n";
                        $fp =    @fopen($uploadedFile,"rb");
                        $data =  @fread($fp,filesize($uploadedFile));
                        @fclose($fp);
                        $data = chunk_split(base64_encode($data));
                        $message .= "Content-Type: application/octet-stream; name=\"".basename($uploadedFile)."\"\n" . 
                        "Content-Description: ".basename($uploadedFile)."\n" .
                        "Content-Disposition: attachment;\n" . " filename=\"".basename($uploadedFile)."\"; size=".filesize($uploadedFile).";\n" . 
                        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                    }
                    
                    $message .= "--{$mime_boundary}--";
                    $returnpath = "-f" . $email;
                    
                    // Send email
                    $mail = mail($toEmail, $emailSubject, $message, $headers, $returnpath);
                    
                    // Delete attachment file from the server
                    @unlink($uploadedFile);
                }else{
                     // Set content-type header for sending HTML email
                    $headers .= "\r\n". "MIME-Version: 1.0";
                    $headers .= "\r\n". "Content-type:text/html;charset=UTF-8";
                    
                    // Send email
                    $mail = mail($toEmail, $emailSubject, $htmlContent, $headers); 
                }
                
                // If mail sent
                if($mail){
                   echo  $statusMsg = 'Your contact request has been submitted successfully !';
                    $msgClass = 'succdiv';
                    
                    $postData = '';
                }else{
                     echo  $statusMsg = 'Your contact request submission failed, please try again.';
                }
            }
        }
    }else{
      
        echo   $statusMsg = 'Please fill all the fields.';
    }
}
?>


<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EW</title>
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-liberty.css">
  <!-- Template CSS -->
  <link href="http://fonts.googleapis.com/css?family=Poppins:100,300,400,500,500i,600,700&amp;display=swap" rel="stylesheet">
  <!-- Template CSS -->

</head>
<body>

<!--/top-header-content-->
<!--/top-header-content-->
<section class="w3l-top-header-content">
	<div class="hny-top-menu">
		<div class="top-hd">
			<div class="container-fluid">
				<div class="row">
					<div class="accounts col-lg-6" style="text-align:left">
					
						<li class="top_li"><span class="fa fa-mobile"></span><a href="tel:+91-8072175806">+91-8072175806</a>
						</li>

						<li class="top_li"><span class="fa fa-envelope-o"></span><a href="mailto:ewglobalconsultant@gmail.com">ewglobalconsultant@gmail.com</a>

						</li>
					</div>
					<div class="accounts col-lg-6">
						
						<li><a href="#"><span class="fa fa-facebook"></span></a></li>
						<li><a href="#"><span class="fa fa-instagram"></span></a> </li>
						<li><a href="#"><span class="fa fa-twitter"></span></a></li>
						
						<li>
							<a href="#">
								<span class="fa fa-linkedin"></span>
							</a>
						</li>
						<li class="top_li1" Style="background-color:green;padding: 10px;"> GET AN APPOINTMENT</li>
					</div>
				</div>
			</div>
		</div>
		<!--/nav-->
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html"><span class="fa fa-podcast" aria-hidden="true"></span> <label class="lohny"></label></a>
				<!-- if logo is image enable this   
				<a class="navbar-brand" href="#index.html">
					<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
				</a> -->
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="index.html">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.html">About Us</a>
						</li>
						
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="services.html" id="navbarDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Services
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="services.html">Services</a>
								<a class="dropdown-item" href="recruitment.html">Recruitment</a>
								<a class="dropdown-item" href="executive_search_Selection.html">Executive search & Selection</a>
								<a class="dropdown-item" href="flexi_staffing_solution.html">Flexi Staffing Solution</a>
							</div>
						</li>
						
						 <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								INDUSTRIAL  SERVER
 
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="fmcg.html">FMCG</a>
								<a class="dropdown-item" href="automobile.html">Automobile</a>
								<a class="dropdown-item" href="tyre.html">Tyre</a>
								<a class="dropdown-item" href="pharma_chemicals.html">Pharma And Chemicals</a>
								<a class="dropdown-item" href="plastics.html">Plastics</a>
								<a class="dropdown-item" href="consumer_durables.html">Consumer Durables</a>
								<a class="dropdown-item" href="IT_hardware_electronics.html">IT Hardware & Electronics</a>
								<a class="dropdown-item" href="ITES_software.html">ITES & Software</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="jobs.php">LATEST JOBS </a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="blog.html">BLOG</a>
						</li>
						

						<li class="nav-item">
							<a class="nav-link" href="contact.php">Contact</a>
						</li>
					</ul>

				</div>
			</div>
		</nav>
		<!--//nav-->
	</div>

</section>
<!--//top-header-content-->

    <section class="w3l-inner-page-main">
      <div class="breadcrumb-infhny">
        <div class="container">
          <nav aria-label="breadcrumb">
            <h2 class="hny-title text-center">Apply Jobs</h2>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Apply Jobs</li>
            </ol>
          </nav>
        </div>
      </div>
    </section>



   <!-- //content-6-section -->
	<section class="w3l-contact-main">
		<div class="contact-infhny py-5">
			<div class="container">
					<div class="display-ad" style="margin: 8px auto; display: block; text-align:center;">

							<!---728x90--->

							
							</div>
				<div class="contact-grids row py-lg-5">
				
					
					<div class="contact-right col-lg-5 pl-lg-4" style="margin-top: -50px;">
							
					 <form class="" action="" method="post"  id="contact_form" enctype="multipart/form-data">	
							<div class="input-grids" style="width: 450px;">
								<input type="text" name="name" id="name"  placeholder="Full name" class="contact-input" />
								<input type="email" name="email" id="email" placeholder="Your email" class="contact-input" />
								<input type="number" name="phone" id="phone" placeholder="Phone number" class="contact-input" />
								
							</div>
					
					
						<div  class="form-input" >
												 <label for="subject"  class="contact-input" >
  <select id="subject" name="subject"  style="width: 407px; border: 1px solid #adb5bd;
    padding: 12px;
    border-radius: 5px;">
    <option value="">Types of Jobs</option>
    <option value="Service Engineer">Service Engineer</option>
    <option value="Sales Engineer">Sales Engineer</option>
    <option value=" SMT Engineer"> SMT Engineer</option>
    <option value="Assistant Manager - SMT">Assistant Manager - SMT</option>
	
	  <option value="Manager - NPI"> Manager - NPI</option>
    <option value="Canteen Supervisor">Canteen Supervisor</option>
    <option value="Canteen - Chef">Canteen - Chef</option>
    <option value="Canteen Assistant">Canteen Assistant</option>
  </select></label>
					</div><br>
						<div  class="form-input" style="width: 450px;">
								<textarea name="notice" id="notice" placeholder="Type your message here" required=""></textarea>
							</div>
				
						   		<div class="form-group">
              <label class="control-label" for="fileToUpload"></label>
              <!-- input type="file" name=resume[]" multiple="multiple"" size="300" style="width:300px;" -->
			  <input type="file" name="attachment" class="control-label"  style="border:none;">

            </div>	
							<button class="btn submit" type="submit" name="submit" id ="submit" >Send Message</button>
						
						  <?php if(isset($_POST['submit'])) { ?>
                  <div class="alert alert-success">
                    <p>Message send successfully!</p>
                  </div>
                <?php } ?>
						</form>
					</div>

				</div>
			</div>
		</div>
		
	</section>
					
  <style>
  .w3l-contact-main .contact-grids input, .w3l-contact-main .contact-grids textarea {
    width: 90%;
    color: #555;
    background: #fff;
    font-size: 16px;
    line-height: 25px;
    font-weight: normal;
    font-style: normal;
    border: none;
    font-family: inherit;
    padding: 12px 12px;
    border: 1px solid #adb5bd;
    outline: none;
    margin-bottom: 16px;
}
  </style>
  


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $("document").ready(function(){
    setTimeout(function(){
       $("div.alert-success").remove();
    }, 2000 ); // 2 secs
});
</script>
  

<!-- //customers-6-->
<section class="w3l-footer-22-main">
    <!-- footer-22 -->
    <div class="footer-hny py-5">
        <div class="container py-lg-4"> 
                    <div class="sub-columns row">
                        <div class="sub-one-left col-lg-6 col-md-6">
                            <h6>About </h6>
                            <p>EW Global Consultant is an accomplished name, renowned for providing quality services in
the Human Capital and Staffing arena. We equip our esteemed clients with valuable business
solutions for Recruitment, Executive Search, Staffing. We provide comprehensive manpower
solutions across all levels and diverse functional areas. We deal with multiple functional
verticals distributed across the industry.</p>

                        </div>
                        <div class="sub-two-right col-lg-6 col-md-6 my-md-0 my-5">
                            <h6>Our Services</h6>
                            <div class="footer-hny-ul">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                            <ul>
                                    <li><a href="#">Executive Search & Selection</a></li>
                                    <li><a href="#">Flexi Staffing Solutions</a></li>
                                    <li><a href="#">Recruitment</a></li>
                                    
                            </ul>
                           </div>
                        </div>

                      <!--  <div class="sub-one-left col-lg-4 col-md-6 mt-lg-0 mt-md-5">
                            <h6>Subscribe Us </h6>
                            <form action="#" method="post" class="footer-newsletter">
                                <div class="">
                                    <input type="email" name="email" class="form-input" placeholder="Enter your email.." />
                                </div>
                                <button type="submit" class="btn">Subscribe</button>
                            </form>
                        </div>-->
                    </div>
                </div>
         </div>  
        <div class="below-section">
            <div class="container">
                <div class="copyright-footer row">
                <div class="columns col-lg-6">
                    <ul class="social footer">
                        <li><a href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
                        <li><a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
                        <li><a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                        <li><a href="#"><span class="fa fa-google" aria-hidden="true"></span></a></li>
                  
                    </ul>
                </div>
                <div class="columns copy-right col-lg-6">
                    <p>© 2020  Design by <a href="" target="_blank">
                        NPGROUPS</a>
                </p>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- //titels-5 -->
     <!-- move top -->
     <button onclick="topFunction()" id="movetop" title="Go to top">
            <span class="fa fa-long-arrow-up"></span>
    </button>
    <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () {
                scrollFunction()
            };
    
            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }
    
            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- /move top -->
   
</section>
</div>
</body>


</html>


<script src="assets/js/jquery-3.3.1.min.js"></script>
<!-- disable body scroll which navbar is in active -->
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll which navbar is in active -->
<!-- jQuery-Photo-filter-lightbox-portfolio-plugin -->
<script src="assets/js/jquery-1.7.2.js"></script>
<script src="assets/js/jquery.quicksand.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/jquery.prettyPhoto.js"></script>
<!-- //jQuery-Photo-filter-lightbox-portfolio-plugin -->
<script src="assets/js/bootstrap.min.js"></script>

