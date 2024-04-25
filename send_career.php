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
	$message = $_POST['message'];


    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($message)){
        
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
                $toEmail = 'abiya0605@gmail.com';
 
 
                 // Sender
                $from = 'npsspvt@gmail.com';
                $fromName = 'Mail From Npgroups';
                
                // Subject
               $emailSubject = 'Find a job Request Submitted by '.$name;
                
                // Message 
                 $htmlContent = '<h2>Contact Request Submitted</h2>
                    <p><b>Name :</b> '.$name.'</p>
					<p><b>Subject :</b> '.$subject.'</p>
                    <p><b>Email :</b> '.$email.'</p>
					<p><b>Phone :</b> '.$phone.'</p>
                    <p><b>Message :</b> '.$message.'</p>';
					
					
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

<div class="main-container"><!-- main container -->

  <div class="section-space"  style="margin-top: -120px;">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8 section-title" style=" margin-bottom: 0px">
          <h1>Apply Now</h1>
         </div>
      </div>
      <div class="row">
	   <form class="" action="" method="post"  id="contact_form" enctype="multipart/form-data">
       	
          <div class="col-md-8"> 
            <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="name">Name</label>*
              <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required>
            </div>
          </div>
          <!-- Text input-->
          <div class="col-md-8">
            <div class="form-group">
              <label class="control-label" for="email">E-mail</label>*
              <input id="email" name="email" type="text" placeholder="email" class="form-control input-md" required>
            </div>
          </div>
        
          <!-- Text input-->
          <div class="col-md-8">
            <div class="form-group">
              <label class="control-label" for="phone">Phone Number</label>*
              <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md" required>
            </div>
          </div>
          <div class="col-md-8"><!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="subject">Subject</label>
              <input id="subject" name="subject" type="text" placeholder="subject" class="form-control input-md">
            </div>
          </div>
		   <div class="col-md-8"><!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="message">Comment</label>
              <input id="message" name="message" type="text" placeholder="comment" class="form-control input-md">
            </div>
          </div>
         <div class="col-md-8"><!-- Text input-->
            <!-- <div class="form-group">
                <label class="control-label" for="fileToUpload">Files upload</label>
              <!--<label class="control-label" for="attachment">Files upload</label>
              <input type="file" name="attachment" multiple="multiple" size="30" style="width:300px;">
              
              
               <label class="control-label" for="fileToUpload"></label>
              <!-- input type="file" name=resume[]" multiple="multiple"" size="300" style="width:300px;" -->
		 <!--	  <input type="file" name="attachment" class="control-label"  style="border:none;">-->
			  
			  
			  
			  	   		<div class="form-group">
              <label class="control-label" for="fileToUpload"></label>
              <!-- input type="file" name=resume[]" multiple="multiple"" size="300" style="width:300px;" -->
			  <input type="file" name="attachment" class="control-label"  style="border:none;">

            </div>	

            </div>
          </div>
          
           
          
           <div class="col-md-8">
            <button type="submit"  name="submit" class="btn btn-default">Submit Request</button>
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