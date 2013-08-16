<?php

// $EmailFrom = "chriscoyier@gmail.com";
$EmailTo = "ben@aeroagencybrands.com";
$Subject = "Aero Agency Contact Form";
$Name = Trim(stripslashes($_POST['Name'])); 
$Companyname = Trim(stripslashes($_POST['Companyname'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Phone = Trim(stripslashes($_POST['Phone'])); 
$Interestedin = Trim(stripslashes($_POST['Interestedin'])); 
$Message = Trim(stripslashes($_POST['Message'])); 

// validation
$validationOK=true;

if ($Email == "") {
  $validationOK=false;
}
if ($Name == "") {
  $validationOK=false;
}
if ($Message == "") {
  $validationOK=false;
}
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Company name: ";
$Body .= $Companyname;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $Phone;
$Body .= "\n";
$Body .= "Interested in: ";
$Body .= $Interestedin;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$Email>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=thankyou.html\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}
?>