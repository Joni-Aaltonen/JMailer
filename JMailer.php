<?php
	/************************
	 * JMailer.php			*
	 * Version 1.0			*
	 * © Joni Aaltonen 2005	*
	 ************************
	


	 /************************** !! IMPORTANT !! ****************************
	  *                                                                     *
	  * Remember to define the URLTO variable in the HTML Form              *
	  * For example <input type='hidden' name='URLTO' value='thanks.htm' /> *
	  *                                                                     *
	  ************************** !! IMPORTANT !! ***************************/

	  /* Example form.html
		<form action='http://www.example.com/JMailer.php' method='post'>
		<input type='hidden' name='URLTO' value='http://www.example.com/thankyou.php'>
		<input type='text' name='Test field'><br>
		<input type='radio' name='test_radio' value='Yes'>
		<input type='radio' name='test_radio' value='No'><br>
		<input type='checkbox' name='test_checkbox' value='Yes'><br>
		<input type='submit' value='GO'>
		</form>
	  */







	 //Define these variables
	 $to = sprintf("\"%s\" <%s>", "Name To", "to_email@example.com");		
	 $from = sprintf("\"%s\" <%s>", "Name From", "email_from@example.com");
	 $subject = "Subject goes here";

	 //Do NOT touch anything below!
	if(!is_array($_POST) || empty($_POST) || !isset($_POST))
		die("An error occured while sending the form, please press <a href='javascript:window.history.go(-1);'>back</a> button in your browser and try again or contact the website's administrator");
	else{
		//URLTO Check
		if(empty($_POST[URLTO])) die("<b>Error:</b> Please check the URLTO parameter in your HTML form.<br>It should be something like &lt;input type='hidden' name='URLTO' value='thanks.htm' /&gt;");
		$headers = "From: " . $from;
		$msg = "==============================================================\n";
		$msg .= "\n";

		foreach($_POST as $name=>$value){
			$msg .= ($name != "URLTO") ? "\t" . $name . ": " . $value . "\n" : "";
		}//foreach post data

		$msg .= "\n";
		$msg .= "==============================================================\n";
		mail($to, $subject, str_replace("\n", "\r\n", $msg), $headers);
		header("Location: " . $_POST[URLTO]);
	}//else ok
?>
