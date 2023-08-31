<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "milesfarrell1997@gmail.com";
    $email_subject = "Test";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['firstname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['firstdate']) ||
        !isset($_POST['seconddate'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $firstname = $_POST['firstname']; // required
    $email_from = $_POST['email']; // required
    $firstdate = $_POST['firstdate']; // not required
    $seconddate = $_POST['seconddate']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$firstname)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($firstname)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "First Date: ".clean_string(firstdate)."\n";
    $email_message .= "Second Date: ".clean_string($seconddate)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Booking Complete</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="../assets/css/demo.css" rel="stylesheet" /> 
    <link href="../assets/css/examples.css" rel="stylesheet" /> 
        
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
      
</head>
<body>
    <nav class="navbar navbar-default" role="navigation-demo" id="demo-navbar">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <!-- link to facebook or instagram page?? -->
          <a class="navbar-brand" href="index.html">Hōpara Campers</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="index.html" class="btn btn-simple">Home</a>
            </li>
            <li>
                <a href="FAQs.html" class="btn btn-simple">FAQs</a>
            </li>
            <li>
                <a href="contacts.html" class="btn btn-simple">Contact & Rentals</a>
            </li>
            <li><a href="adventures.html" class="btn btn-simple">Adventures</a>
              </li>
            <li>
                <a href="https://www.instagram.com/hopara_campers/" target="_blank" class="btn btn-simple"><i class="fa fa-instagram"></i></a>
            </li>
            <li>
                <a href="https://www.facebook.com/Hoparacampers" target="_blank" class="btn btn-simple"><i class="fa fa-facebook"></i></a>
            </li>
           </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav>         
    <div class="alert alert-danger landing-alert">
        <div class="container text-center">
             <h5>Haere Mai & Welcome to Hōpara</h5>
        </div>
    </div>
    
    <div class="wrapper">
        <div class="landing-header img-fluid" style="background-image: url()">
            <div class="container">
                <div class="motto">
                    <h1 class="title-uppercase text-center">Thank you for contacting us. We will be in touch with you very soon.</h1>
                    <h3></h3>
                    <br />
                </div>
            </div>    
        </div>
    </div>
        <!--<div class="main">
            <div class="section text-center landing-section">
                <div class="container">
                   
                </div>
            </div>  
            
            <div class=" landing-section second-landing">
                <div class="container">
                    <div class="row">
                      
                    </div>
                       
                </div>
            </div>
        </div>
        </div>-->
    <footer class="footer-demo section-dark">
        <div class="container">
            <nav class="copyright pull-right">
                <ul>
    
                    <li>
                        <a href="https://github.com/Milesfarrell">
                            My Github
                        </a>
                    </li>

                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; 2019, made by Miles Farrell
            </div>
        </div>
    </footer>

</body>

<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="../assets/js/ct-paper-checkbox.js"></script>
<script src="../assets/js/ct-paper-radio.js"></script>
<script src="../assets/js/bootstrap-select.js"></script>
<script src="../assets/js/bootstrap-datepicker.js"></script>

<script src="../assets/js/ct-paper.js"></script>
    
</html> 

 
<?php
 
}
?>