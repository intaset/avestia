<?php
$journal_email = "copyright@avestia.com";

$errors = array();

// Remove $_COOKIE elements from $_REQUEST.

if(count($_COOKIE)){foreach(array_keys($_COOKIE) as $value){unset($_REQUEST[$value]);}}

// Check referrer is from same site.

if(!(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) && stristr($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']))){$errors[] = "You must enable referrer logging to use the form";}

// Display any errors and exit if errors exist.

if(count($errors)){foreach($errors as $value){print "$value<br>";} exit;}

if(!defined("PHP_EOL")){define("PHP_EOL", strtoupper(substr(PHP_OS,0,3) == "WIN") ? "\r\n" : "\n");}

// Build message.

function build_message($request_input){

	if(!isset($message_output)){
		$message_output ="";
	}

	if(!is_array($request_input)){
		$message_output = $request_input;
	}else{
		foreach($request_input as $key => $value){
			if(!empty($value)){
				if(!is_numeric($key)){
					$message_output .= str_replace("_"," ",ucfirst($key)).": ".build_message($value).PHP_EOL.PHP_EOL;
				}else{
					$message_output .= build_message($value).", ";
				}
			}
		}
	}
	return rtrim($message_output,", ");
}

// Defining the Variables
$date = date("Y-m-d,h_i_s A");
$message = build_message($_REQUEST);
$message = $message . 'File uploaded: ';
$message = $message . $date.'_'.$_FILES['file']['name'];
$message = $message . PHP_EOL.PHP_EOL."-- ".PHP_EOL."";
$message = stripslashes($message);
$journal_subject = "Copyright and Consent Form of " . $_REQUEST['Name'];
$author_subject = "Copyright and Consent Form Submitted Successfully";
$author_email = $_REQUEST['Email'];
$journal_headers = "From: " . $author_email;
$author_headers = "From: journals@avestia.com";
if 

((($_FILES["file"]["type"] == "application/pdf")

|| ($_FILES["file"]["type"] == "image/gif")

|| ($_FILES["file"]["type"] == "image/jpeg")

|| ($_FILES["file"]["type"] == "image/png")

|| ($_FILES["file"]["type"] == "image/pjpeg")

|| ($_FILES["file"]["type"] == "image/tif")
&& ($_FILES["file"]["size"] < 20000000)))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
      move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
      rename("upload/".$_FILES['file']['name'],"upload/".$date.'_'.$_FILES['file']['name']);
	$filename = $date.'_'.$_FILES['file']['name'];
    }
  }
else
  {
 ?> 
 
 <!--If user inputs incorrect file format (i.e. word), the below message will be displayed; if not, move to the bottom of HTML for confirmation webpage-->

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noarchive">
<meta name="description" content="{{page.meta}}">
<meta name="keywords" content="{{page.keyword}}">
<title>Avestia - Incorrect File</title>

<meta name="handheldfriendly" content="true">
<meta name="mobileoptimized" content="240">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/avestia.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic|Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<!--[if IE-9]><html lang="en" class="ie9"><![endif]-->

<script src="js/modernizr.custom.63321.js"></script>
<script>
  (function() {
    var cx = '016656741306535874023:f_iiykae6ri';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
</head>

<body class="loading">
<nav id="slide-menu">
  <h1>Avestia Publishing</h1>
  <ul>
    <li><a href="about">About Us</a></li>
    <li><a href="ethics">Ethics in Publishing</a></li>
    <li><a href="openaccess">Open Access</a></li>
    <li><a href="editor">Become a Reviewer or an Editor</a></li>
    <li><a href="publishing">Your Publishing Needs</a></li>
    <li><a href="proceedings">Conference Proceedings</a></li>
    <li><a href="news">Latest News</a></li>
    <li><a href="guidelines">Author Guidelines</a></li>
    <li><a href="journals">Journals</a></li>
    <li><a href="http://amss.avestia.com/">Submission</a></li>
    <li><a href="copyright">Copyright</a></li>
    <li><a href="contact">Contact Us</a></li>
  </ul>
</nav>

<div id="content">
  <div class="desktop">
    <div class="grid">
      <div class="unit unit-s-8-5 unit-m-8-5 unit-l-8-5">
        <gcse:searchbox-only resultsUrl="results"></gcse:searchbox-only>
      </div>

      <div class="unit unit-s-1-5 unit-m-1-5 unit-l-1-5">
        <div class="menu-trigger-1"><p class="menu">MENU</p></div>
      </div>
    </div>
  </div>

  <div class="desktop">
      <div class="cbp-af-header">
  <div class="cbp-af-inner">
    <a href="{{site.baseurl}}/"><img src="img/logo.svg" class="flex-logo"></a>
      <nav>
        <a href="{{site.baseurl}}/">Home</a>
        <a href="http://amss.avestia.com/">Submission</a>
        <a href="journals">Journals</a>
        <a href="ethics">Ethics in Publishing</a>
        <a href="guidelines">Author Guidelines</a>
    </nav>
  </div>
</div>
  </div>

  <header>
    <div class="mobile">
      <div class="cbp-af-header">
  <div class="cbp-af-inner">
    <div class="unit unit-s-3-4 unit-m-1-3 unit-l-1-3">
          <a href="{{site.baseurl}}/"><img src="img/logo.svg" class="flex-logo"></a>
      </div>
      <div class="unit unit-s-1-3 unit-m-2-3 unit-m-2-3-1 unit-l-2-3">
          <div class="menu-trigger"><p class="menu">MENU</p></div>
      </div>
  </div>
</div>
      <div class="bg">
        <gcse:searchbox-only resultsUrl="results"></gcse:searchbox-only>
      </div>
    </div> <!-- Mobile -->
  </header>

  <div class="main-content">
   <h3>Incorrect File Upload</h3>
   <p class="body">Please note that the copyright form must be either a PDF or image file (.jpg, .png) for a successful submission.</p>
  </div>

  <footer>
<div class="grid">
  <div class="unit unit-s-1 unit-s-1-3 unit-m-1-3 unit-l-1-3">
    <div class="unit-spacer">
      <ul class="footer-links">
        <li><a href="{{site.baseurl}}/" class="body-link">Avestia Publishing</a></li>
        <li><a href="journals" class="body-link">Journals</a></li>
        <li><script>var refURL = window.location.protocol + "//" + window.location.host + window.location.pathname; document.write('<a href="http://international-aset.com/feedback/?refURL=' + refURL+'">Feedback</a>');</script></li>
        <li><a href="terms" class="body-link">Terms of Use</a></li>
        <li><a href="sitemap" class="body-link">Sitemap</a></li>
      </ul>
    </div>
  </div>

  <div class="unit unit-s-1 unit-s-1-3 unit-m-1-3 unit-l-1-3">
    <div class="unit-spacer">
      <p class="body">
        Avestia Publishing,<br>
        International ASET Inc.<br>
        Unit. 417, 1376 Bank St.<br>
        Ottawa, ON, Canada, K1H 7Y3<br>
        +1 613-695-3040<br>
        <a href="mailto:info@avestia.com" class="body-link">info@avestia.com</a>
      </p>
    </div>
  </div>

  <div class="unit unit-s-1 unit-s-1-3 unit-m-1-3 unit-l-1-3">
    <div class="unit-spacer social">

      <div class="unit unit-s-1-1 unit-m-1-1 unit-l-1-1">
        <a href="https://cvmldm.avestia.com" target="blank" title="International Journal of Computer Vision, Machine Learning and Data Mining (CVMLDM)">
          <img src="img/fb.png" border="0" onmouseover="this.src='img/fb-hover.png'" onmouseout="this.src='img/fb.png'">
        </a>
      </div>

      <div class="unit unit-s-1-1 unit-m-1-1 unit-l-1-1">
        <a href="https://cvmldm.avestia.com" target="blank" title="International Journal of Computer Vision, Machine Learning and Data Mining (CVMLDM)">
          <img src="img/twitter.png" border="0" onmouseover="this.src='img/twitter-hover.png'" onmouseout="this.src='img/twitter.png'">
        </a>
      </div>

      <div class="unit unit-s-1-1 unit-m-1-1 unit-l-1-1">
        <a href="https://cvmldm.avestia.com" target="blank" title="International Journal of Computer Vision, Machine Learning and Data Mining (CVMLDM)">
          <img src="img/linkedin.png" border="0" onmouseover="this.src='img/linkedin-hover.png'" onmouseout="this.src='img/linkedin.png'">
        </a>
      </div>

      <div class="unit unit-s-1-1 unit-m-1-1 unit-l-1-1">
        <a href="https://cvmldm.avestia.com" target="blank" title="International Journal of Computer Vision, Machine Learning and Data Mining (CVMLDM)">
          <img src="img/google.png" border="0" onmouseover="this.src='img/google-hover.png'" onmouseout="this.src='img/google.png'">
        </a>
      </div>

      <div class="unit unit-s-1-1 unit-m-1-1 unit-l-1-1">
        <a href="https://cvmldm.avestia.com" target="blank" title="International Journal of Computer Vision, Machine Learning and Data Mining (CVMLDM)">
          <img src="img/youtube.png" border="0" onmouseover="this.src='img/youtube-hover.png'" onmouseout="this.src='img/youtube.png'">
        </a>
      </div>

      <p class="body">All site content, except where otherwise noted, is licensed under a Creative Commons Attribution (CC BY) license.</p>
    </div>
  </div>

</div>
</footer>

<div class="copyright">
  <p class="body">© Copyright 2015, International ASET Inc. – All Rights Reserved.</p>
</div>
</div>


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/cbpAnimatedHeader.min.js"></script>
    <script src="js/SpryValidationSelect.js" type="text/javascript"></script>

    <script src="js/SpryValidationTextField.js" type="text/javascript"></script>

    <script src="js/SpryValidationConfirm.js" type="text/javascript"></script>

    <script src="js/SpryValidationCheckbox.js" type="text/javascript"></script>
    <script src="js/SpryValidationTextarea.js" type="text/javascript"></script>

<script src="js/classie.js"></script>
<script src="js/jquery.easing.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script defer src="js/demo.js"></script>
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript" src="css/animate.min.css"></script>

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"-1"});

//-->
</script>



  <script>
(function($){
        $(window).load(function(){
            $("html").niceScroll();
        });
    })(jQuery);
</script>

<script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: false,
easing: "swing",               
animationLoop: true,
smoothHeight: false,  
slideshow: false,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

    <script type="text/javascript">
/*
  Slidemenu
*/
(function() {
  var $body = document.body
  , $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];

  if ( typeof $menu_trigger !== 'undefined' ) {
    $menu_trigger.addEventListener('click', function() {
      $body.className = ( $body.className == 'menu-active' )? '' : 'menu-active';
    });
  }

}).call(this);
</script>

<script type="text/javascript">
/*
  Slidemenu
*/
(function() {
  var $body = document.body
  , $menu_trigger = $body.getElementsByClassName('menu-trigger-1')[0];

  if ( typeof $menu_trigger !== 'undefined' ) {
    $menu_trigger.addEventListener('click', function() {
      $body.className = ( $body.className == 'menu-active' )? '' : 'menu-active';
    });
  }

}).call(this);
</script>

</body>
</html>

<?php
  }
  
 if($filename != NULL) {
$message = "Thank you for submitting the Copyright and Contest Form for your manuscript. You may find a copy of the submitted information below: \n\n".$message;
mail($journal_email,$journal_subject,$message,$journal_headers);
mail($author_email,$author_subject,$message,$author_headers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noarchive">
<meta name="description" content="{{page.meta}}">
<meta name="keywords" content="{{page.keyword}}">
<title>Avestia - Copyright Submitted</title>

<meta name="handheldfriendly" content="true">
<meta name="mobileoptimized" content="240">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/avestia.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic|Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<!--[if IE-9]><html lang="en" class="ie9"><![endif]-->

<script src="js/modernizr.custom.63321.js"></script>
<script>
  (function() {
    var cx = '016656741306535874023:f_iiykae6ri';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
</head>

<body class="loading">
<nav id="slide-menu">
  <h1>Avestia Publishing</h1>
  <ul>
    <li><a href="about">About Us</a></li>
    <li><a href="ethics">Ethics in Publishing</a></li>
    <li><a href="openaccess">Open Access</a></li>
    <li><a href="editor">Become a Reviewer or an Editor</a></li>
    <li><a href="publishing">Your Publishing Needs</a></li>
    <li><a href="proceedings">Conference Proceedings</a></li>
    <li><a href="news">Latest News</a></li>
    <li><a href="guidelines">Author Guidelines</a></li>
    <li><a href="journals">Journals</a></li>
    <li><a href="http://amss.avestia.com/">Submission</a></li>
    <li><a href="copyright">Copyright</a></li>
    <li><a href="contact">Contact Us</a></li>
  </ul>
</nav>

<div id="content">
  <div class="desktop">
    <div class="grid">
      <div class="unit unit-s-8-5 unit-m-8-5 unit-l-8-5">
        <gcse:searchbox-only resultsUrl="results"></gcse:searchbox-only>
      </div>

      <div class="unit unit-s-1-5 unit-m-1-5 unit-l-1-5">
        <div class="menu-trigger-1"><p class="menu">MENU</p></div>
      </div>
    </div>
  </div>

  <div class="desktop">
      {% include desktop-nav.html %}
  </div>

  <header>
    <div class="mobile">
      {% include nav.html %}
      <div class="bg">
        <gcse:searchbox-only resultsUrl="results"></gcse:searchbox-only>
      </div>
    </div> <!-- Mobile -->
  </header>

  <div class="main-content">
   <h3>Thank you for submitting your copyright.</h3>
   <p class="body">If you haven't already done so, please send us your manuscript in an MSWORD (doc or docx) format.</p>

   <p class="body">Thank you.<br><br>
	Sincerely,<br>
	Avestia Publishing</p>
  </div>

  {% include footer.html %}
</div>


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/cbpAnimatedHeader.min.js"></script>
    <script src="js/SpryValidationSelect.js" type="text/javascript"></script>

    <script src="js/SpryValidationTextField.js" type="text/javascript"></script>

    <script src="js/SpryValidationConfirm.js" type="text/javascript"></script>

    <script src="js/SpryValidationCheckbox.js" type="text/javascript"></script>
    <script src="js/SpryValidationTextarea.js" type="text/javascript"></script>

<script src="js/classie.js"></script>
<script src="js/jquery.easing.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script defer src="js/demo.js"></script>
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript" src="css/animate.min.css"></script>

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"-1"});

//-->
</script>



  <script>
(function($){
        $(window).load(function(){
            $("html").niceScroll();
        });
    })(jQuery);
</script>

<script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: false,
easing: "swing",               
animationLoop: true,
smoothHeight: false,  
slideshow: false,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

    <script type="text/javascript">
/*
  Slidemenu
*/
(function() {
  var $body = document.body
  , $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];

  if ( typeof $menu_trigger !== 'undefined' ) {
    $menu_trigger.addEventListener('click', function() {
      $body.className = ( $body.className == 'menu-active' )? '' : 'menu-active';
    });
  }

}).call(this);
</script>

<script type="text/javascript">
/*
  Slidemenu
*/
(function() {
  var $body = document.body
  , $menu_trigger = $body.getElementsByClassName('menu-trigger-1')[0];

  if ( typeof $menu_trigger !== 'undefined' ) {
    $menu_trigger.addEventListener('click', function() {
      $body.className = ( $body.className == 'menu-active' )? '' : 'menu-active';
    });
  }

}).call(this);
</script>

</body>
</html>