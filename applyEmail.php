<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>


  <?php

function sendMail() {

    $fname =$_POST['Name'];
    $lname =$_POST['LName'];
    $gender1 = $_POST['GENDER'];
    $email = $_POST['Email'];	
	$days = $_POST['days'];	 
	$months = $_POST['months'];
	$years = $_POST['years'];	
  
	$contact2 = $_POST['contact'];	
	$qualification = $_POST['qualification'];
	
	$experience = $_POST['experience'];	
	$city = $_POST['city'];	

	$city1 = $_POST['city1'];	
	$year = $_POST['yn'];	
    $filename=$_FILES["filename"]["name"];
    $filetype=$_FILES["filename"]["type"];
    $filesize=$_FILES["filename"]["size"];
    $filetemp=$_FILES["filename"]["tmp_name"];
	
    if(true)
    {
		
	$message='<table cellpadding="10" bgcolor="#EEE">
	<tr>
	<td>First Name</td>
	<td>'.$fname.'</td>
	</tr>

	<tr>
	<td>Last Name:</td>
	<td>'.$lname.'</td>
	</tr>

	<tr>
	<td>Gender</td>
	<td>'.$gender1.'</td>
	</tr>

	<tr>
	<td>Email:</td>
	<td>'.$email.'</td>
	</tr>

	<tr>
	<td>Date of Birth</td>
	<td>'.$days.'&nbsp;&nbsp;'.$months.'&nbsp;&nbsp;'.$years.'</td>
	</tr>

	<tr>
	<td>Phone (L):</td>
	<td>'.$countcode1.'&nbsp;&nbsp;'.$areacode1.'&nbsp;&nbsp;'.$contact1.'</td>
	</tr>

	<tr>
	<td>Phone (M):</td>
	<td>'.$countcode2.'&nbsp;&nbsp;'.$contact2.'</td>
	</tr>

	<tr>
	<td>Qualification:</td>
	<td>'.$qualification.'</td>
	</tr>

	<tr>
	<td>Experience:</td>
	<td>'.$experience.'</td>
	</tr>

	<tr>
	<td>Location Preferred 1</td>
	<td>'.$city.'</td>
	</tr>



	<tr>
	<td>Location Preferred 2</td>
	<td>'.$city1.'</td>
	</tr>
	
	<tr>
	<td>Have you applied for a job at Adore Technologies in the last one year?</td>
	<td>'.$year.'</td>
	</tr>

	
	</table>';
     
	 
	 // MAIL SUBJECT

    $subject = "Resume form Mr/Ms. ".  $fname;
   
    // TO MAIL ADDRESS
   
    $to="career@adoretechnologies.in";

	/*
		// MAIL HEADERS
						   
		$headers  = "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$headers .= "From: Powr <uploadyourresume@powerindiajobs.com>\n";
	
	*/ 

    // MAIL HEADERS with attachment

    // $fp = fopen($filetemp, "rb");
    //$file = fread($fp, $filesize);

    // $file = chunk_split(base64_encode($file));
    $num = md5(time());
   
   
	   if (is_uploaded_file($filetemp)) { //Do we have a file uploaded?
		  $fp = fopen($filetemp, "rb"); //Open it
		  $data = fread($fp, filesize($filetemp)); //Read it
		  $data = chunk_split(base64_encode($data)); //Chunk it up and encode it as base64 so it can emailed
			fclose($fp);
		}
	
    //Normal headers

    $headers .= "From: Adore Technologies(Website) <career@adoretechnologies.in>\r\n";
    $headers  .= "MIME-Version: 1.0\r\n";
    $headers  .= "Content-Type: multipart/mixed; ";
    $headers  .= "boundary=".$num."\r\n";
    $headers  .= "--".$num."\r\n";

    // This two steps to help avoid spam   

    $headers .= "Message-ID: <".$now." TheSystem@".$_SERVER['SERVER_NAME'].">\r\n";
    $headers .= "X-Mailer: PHP v".phpversion()."\r\n";         

        // With message
       
    $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    $headers .= "".$message."\n";
    $headers .= "--".$num."\n"; 

    // Attachment headers

    $headers  .= "Content-Type: application/octet-stream;\n\t";
    $headers  .= "name=\"".$filename."\"r\n";
    $headers  .= "Content-Transfer-Encoding: base64\r\n";
    $headers  .= "Content-Disposition: attachment; ";
    $headers  .= "filename=\"".$filename."\"\r\n\n";
    $headers  .= "".$data."\r\n";
    $headers  .= "--".$num."--";


    // SEND MAIL
       
     @mail($to, $subject, $message, $headers);
   

   // fclose($fp);

    echo '<span style="text-align:center;">
			 Thank You, <span class="redTxt bold">Adore Technologies</span> will review your profile and process for the relevant opening. <br/> <br/> 
	     </span>';
}else{
        echo '<font style="font-family:Verdana, Arial; font-size:11px; color:#F3363F; font-weight:bold">Wrong file format. Mail was not sent.</font>';
        //echo "<script>window.location.href='applyEmail.php';</script>";
    }

}
?>

<?php

    sendMail();

?>

<a href="index.html">Go Back To Home Page</a>
</body>
</html>
