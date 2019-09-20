<?php
/**
*@Author { Hameed Abdulrahaman}
*@email { hameedabdulrahamann@gmail.com}
*/

require 'config/classes/DB.php';

if ($_POST) {
    # query the database to submit form...
     
    if (empty(DB::query('SELECT email FROM users WHERE email =:email', array(':email'=>$_POST['email']))[0])) {
        if ($_POST['password'] == $_POST['repeat_password']) {
        DB::query('INSERT INTO `users`(`fullname`, `email`, `password`, `phone`, `status`) VALUES (:fullname,:email,:password,:phone,:status)', array(':fullname'=>$_POST['fullname'], ':email'=>$_POST['email'], ':password'=>md5($_POST['password']), ':phone'=>$_POST['phone'], ':status'=>'ACTIVE'));
        header('Location: login.php');
        } else {
            $msg = '<br><div class="alert alert-danger"><center> Sorry! <b>Password </b> not matched! </center></div>';
         }
    } else {
        $msg = '<br><div class="alert alert-danger"><center> Sorry! <b>Email</b> already exist! </center></div>';
    }
}       

?>


<!DOCTYPE html>
<html lang="en">
<link href="images/icon.png" rel="shortcut icon"/>
<head>
	<link rel="canonical" href="register.html"/>

		
	<title>Register - Farmmonie</title>
	<link rel="stylesheet" href="../use.fontawesome.com/releases/v5.0.10/css/all.css" >
	<link rel="stylesheet" href="sitestatics/css/main_v1.css"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<link href="https://fonts.googleapis.com/css?family=Varela+Round|Muli:200,400,800|Poppins|Lato|Playfair+Display" rel="stylesheet" />  
	 
	<link href="storage/dev/dashboard/assets/css/customcss_48a60d8c1c.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		body {
			font-family: 'Varela Round', sans-serif;
		}
		.inputcontrol {
			color: #444;
		}


		.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{position:relative;min-height:1px;padding-right:15px;padding-left:15px}.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{float:left}.col-xs-12{width:100%}.col-xs-11{width:91.66666667%}.col-xs-10{width:83.33333333%}.col-xs-9{width:75%}.col-xs-8{width:66.66666667%}.col-xs-7{width:58.33333333%}.col-xs-6{width:50%}.col-xs-5{width:41.66666667%}.col-xs-4{width:33.33333333%}.col-xs-3{width:25%}.col-xs-2{width:16.66666667%}.col-xs-1{width:8.33333333%}.col-xs-pull-12{right:100%}.col-xs-pull-11{right:91.66666667%}.col-xs-pull-10{right:83.33333333%}.col-xs-pull-9{right:75%}.col-xs-pull-8{right:66.66666667%}.col-xs-pull-7{right:58.33333333%}.col-xs-pull-6{right:50%}.col-xs-pull-5{right:41.66666667%}.col-xs-pull-4{right:33.33333333%}.col-xs-pull-3{right:25%}.col-xs-pull-2{right:16.66666667%}.col-xs-pull-1{right:8.33333333%}.col-xs-pull-0{right:auto}.col-xs-push-12{left:100%}.col-xs-push-11{left:91.66666667%}.col-xs-push-10{left:83.33333333%}.col-xs-push-9{left:75%}.col-xs-push-8{left:66.66666667%}.col-xs-push-7{left:58.33333333%}.col-xs-push-6{left:50%}.col-xs-push-5{left:41.66666667%}.col-xs-push-4{left:33.33333333%}.col-xs-push-3{left:25%}.col-xs-push-2{left:16.66666667%}.col-xs-push-1{left:8.33333333%}.col-xs-push-0{left:auto}.col-xs-offset-12{margin-left:100%}.col-xs-offset-11{margin-left:91.66666667%}.col-xs-offset-10{margin-left:83.33333333%}.col-xs-offset-9{margin-left:75%}.col-xs-offset-8{margin-left:66.66666667%}.col-xs-offset-7{margin-left:58.33333333%}.col-xs-offset-6{margin-left:50%}.col-xs-offset-5{margin-left:41.66666667%}.col-xs-offset-4{margin-left:33.33333333%}.col-xs-offset-3{margin-left:25%}.col-xs-offset-2{margin-left:16.66666667%}.col-xs-offset-1{margin-left:8.33333333%}.col-xs-offset-0{margin-left:0}

		@media (min-width:768px){
			.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9{float:left}.col-sm-12{width:100%}.col-sm-11{width:91.66666667%}.col-sm-10{width:83.33333333%}.col-sm-9{width:75%}.col-sm-8{width:66.66666667%}.col-sm-7{width:58.33333333%}.col-sm-6{width:50%}.col-sm-5{width:41.66666667%}.col-sm-4{width:33.33333333%}.col-sm-3{width:25%}.col-sm-2{width:16.66666667%}.col-sm-1{width:8.33333333%}.col-sm-pull-12{right:100%}.col-sm-pull-11{right:91.66666667%}.col-sm-pull-10{right:83.33333333%}.col-sm-pull-9{right:75%}.col-sm-pull-8{right:66.66666667%}.col-sm-pull-7{right:58.33333333%}.col-sm-pull-6{right:50%}.col-sm-pull-5{right:41.66666667%}.col-sm-pull-4{right:33.33333333%}.col-sm-pull-3{right:25%}.col-sm-pull-2{right:16.66666667%}.col-sm-pull-1{right:8.33333333%}.col-sm-pull-0{right:auto}.col-sm-push-12{left:100%}.col-sm-push-11{left:91.66666667%}.col-sm-push-10{left:83.33333333%}.col-sm-push-9{left:75%}.col-sm-push-8{left:66.66666667%}.col-sm-push-7{left:58.33333333%}.col-sm-push-6{left:50%}.col-sm-push-5{left:41.66666667%}.col-sm-push-4{left:33.33333333%}.col-sm-push-3{left:25%}.col-sm-push-2{left:16.66666667%}.col-sm-push-1{left:8.33333333%}.col-sm-push-0{left:auto}.col-sm-offset-12{margin-left:100%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-0{margin-left:0}
		}

		@media (min-width:992px){
			.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9{float:left}.col-md-12{width:100%}.col-md-11{width:91.66666667%}.col-md-10{width:83.33333333%}.col-md-9{width:75%}.col-md-8{width:66.66666667%}.col-md-7{width:58.33333333%}.col-md-6{width:50%}.col-md-5{width:41.66666667%}.col-md-4{width:33.33333333%}.col-md-3{width:25%}.col-md-2{width:16.66666667%}.col-md-1{width:8.33333333%}.col-md-pull-12{right:100%}.col-md-pull-11{right:91.66666667%}.col-md-pull-10{right:83.33333333%}.col-md-pull-9{right:75%}.col-md-pull-8{right:66.66666667%}.col-md-pull-7{right:58.33333333%}.col-md-pull-6{right:50%}.col-md-pull-5{right:41.66666667%}.col-md-pull-4{right:33.33333333%}.col-md-pull-3{right:25%}.col-md-pull-2{right:16.66666667%}.col-md-pull-1{right:8.33333333%}.col-md-pull-0{right:auto}.col-md-push-12{left:100%}.col-md-push-11{left:91.66666667%}.col-md-push-10{left:83.33333333%}.col-md-push-9{left:75%}.col-md-push-8{left:66.66666667%}.col-md-push-7{left:58.33333333%}.col-md-push-6{left:50%}.col-md-push-5{left:41.66666667%}.col-md-push-4{left:33.33333333%}.col-md-push-3{left:25%}.col-md-push-2{left:16.66666667%}.col-md-push-1{left:8.33333333%}.col-md-push-0{left:auto}.col-md-offset-12{margin-left:100%}.col-md-offset-11{margin-left:91.66666667%}.col-md-offset-10{margin-left:83.33333333%}.col-md-offset-9{margin-left:75%}.col-md-offset-8{margin-left:66.66666667%}.col-md-offset-7{margin-left:58.33333333%}.col-md-offset-6{margin-left:50%}.col-md-offset-5{margin-left:41.66666667%}.col-md-offset-4{margin-left:33.33333333%}.col-md-offset-3{margin-left:25%}.col-md-offset-2{margin-left:16.66666667%}.col-md-offset-1{margin-left:8.33333333%}.col-md-offset-0{margin-left:0}
		}

		@media (min-width:1200px){
			.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9{float:left}.col-lg-12{width:100%}.col-lg-11{width:91.66666667%}.col-lg-10{width:83.33333333%}.col-lg-9{width:75%}.col-lg-8{width:66.66666667%}.col-lg-7{width:58.33333333%}.col-lg-6{width:50%}.col-lg-5{width:41.66666667%}.col-lg-4{width:33.33333333%}.col-lg-3{width:25%}.col-lg-2{width:16.66666667%}.col-lg-1{width:8.33333333%}.col-lg-pull-12{right:100%}.col-lg-pull-11{right:91.66666667%}.col-lg-pull-10{right:83.33333333%}.col-lg-pull-9{right:75%}.col-lg-pull-8{right:66.66666667%}.col-lg-pull-7{right:58.33333333%}.col-lg-pull-6{right:50%}.col-lg-pull-5{right:41.66666667%}.col-lg-pull-4{right:33.33333333%}.col-lg-pull-3{right:25%}.col-lg-pull-2{right:16.66666667%}.col-lg-pull-1{right:8.33333333%}.col-lg-pull-0{right:auto}.col-lg-push-12{left:100%}.col-lg-push-11{left:91.66666667%}.col-lg-push-10{left:83.33333333%}.col-lg-push-9{left:75%}.col-lg-push-8{left:66.66666667%}.col-lg-push-7{left:58.33333333%}.col-lg-push-6{left:50%}.col-lg-push-5{left:41.66666667%}.col-lg-push-4{left:33.33333333%}.col-lg-push-3{left:25%}.col-lg-push-2{left:16.66666667%}.col-lg-push-1{left:8.33333333%}.col-lg-push-0{left:auto}.col-lg-offset-12{margin-left:100%}.col-lg-offset-11{margin-left:91.66666667%}.col-lg-offset-10{margin-left:83.33333333%}.col-lg-offset-9{margin-left:75%}.col-lg-offset-8{margin-left:66.66666667%}
		}


	</style>
		<style type="text/css"> 
		@media (max-width: 600px) {
			.page-content section {
				padding: 10px;
			}
			.page-content .card {
				padding: 10px;
			}
		}
	</style>
</head>






<style type="text/css">
	.scrolled, .alt-nav, .navwhite {
		box-shadow: none;
	}

	.nav-icon .line1, .white-nav-icon .line1, .blue-nav-icon .line1, .nav-icon .line2, .white-nav-icon .line2, .blue-nav-icon .line2, .nav-icon .line3, .white-nav-icon .line3, .blue-nav-icon .line3, .nav-icon .signin-modal .closeslide .line2, .signin-modal .closeslide .nav-icon .line2, .white-nav-icon .signin-modal .closeslide .line2, .signin-modal .closeslide .white-nav-icon .line2, .blue-nav-icon .signin-modal .closeslide .line2, .signin-modal .closeslide .blue-nav-icon .line2, .nav-icon .register .closeslide .line2, .register .closeslide .nav-icon .line2, .white-nav-icon .register .closeslide .line2, .register .closeslide .white-nav-icon .line2, .blue-nav-icon .register .closeslide .line2, .register .closeslide .blue-nav-icon .line2 { 
		background: #106b31 !important;
	}

	.mainheroholder{
		background-image: url(storage/dev/statics/woman-header-min.png);
		background-repeat: no-repeat;
		background-size: 100%;
		background-position: top right;
		padding-bottom: 130px;
		
	}
	.main-header {
		width: 100%;
		padding-bottom: 0px;
		background: none;
		background-color: none;
		background-blend-mode: multiply;
		-webkit-clip-path: none;
		clip-path: none;
		background-size: cover;
		color: #144499;
		position: relative;
		overflow: hidden;
		z-index: 500;
	}

	.container {
		/*width: 1280px;*/
	}


	.minicontainer{

	}


	.bluecolor{
		color: #144499;
	}

	.bold{
		font-weight: bold;
	}

	.ashcolor{
		color: #444;
	}

	.intro-text h1 {
		font-size: 50px;
		line-height: 58px;
	}

	.cards-icon{
		height: 25px;
		display: block;
		margin-top: 50px;
	}


	.grayback{
		background: #fbfbfb;
	}


	.rightimage{
		position: absolute;
		height: calc(644.67px);
		right: -20px;
		top: 100px;
		text-align: center;
		-webkit-transform: rotate(10deg);
		transform: rotate(0deg);
		transition: all 300ms ease-in-out;
		z-index: 600;
	}


	.rightimage img{
		width: 100%;
	}


	.securealertbox{
		display: table;
		text-align: left;
		max-width: 700px;
	}


	.securealertbox > div{
		display: table-cell;
		vertical-align: middle;
	}


	.securealertbox > .imagepart{
		width: 100px;
	}


	.securealertbox > .imagepart > img{
		width: 100%;
	}


	.securealertbox > .textpart{
		padding-left: 30px;
	}

	.securealertbox .textheader{
		font-size: 24px;
		margin-bottom: 5px;
	}

	.securealertbox .textinfo{
		font-size: 14px;
	}


	.why_p_box{
		display: table;
		margin: 60px 0px;
	}


	.why_p_box > div{
		display: table-cell;
		vertical-align: middle;
	}


	.why_p_box > div{
		display: table-cell;
	}


	.why_p_box > div:first-child{
		width: 70%;
		padding-right: 30px;
	}


	.why_p_box > div:last-child img{
		width: 100%;
	}

	.pointspart{
		text-align: left;
		margin-bottom: 50px;
	}

	.pheader{
		font-size: 18px;
		margin-bottom: 5px;
	}

	.pheader .fa{
		margin-right: 10px;
	}

	.pinfo{
		font-size: 14px;
	}

	.piconenabled .pinfo{
		margin-left: 34px;
	}

	.piconenabled .pheader .fa{
		display: inline-block;
		margin-right: 10px;
	}

	.feature-text{
		margin-top: 15%;
	}

	.featuremonth-text{
		margin-top: 50px;
	}

	.feature-text h2{
		font-size: 30px;
	}

	.feature-text p{
		font-size: 16px;
		line-height: 30px;
		color: #444;
	}

	.feature .feature-image img {
		width: 100%;
		box-shadow: none;
	}

	.howtostart h3{
		font-size: 20px;
	}

	.stories { 
		background-image: none;
	}

	.spaceout{
		padding: 100px 0px;
	}

	.partners_image{
		width: 90%;
		max-width: 900px;
	}

	._outfeature_box{
		background: #fbfbfb;
		margin: 5px;
		padding: 30px 10px;
	}

	._outfeature_box img{
		width: 100%;
	}

	._outfeature_box h3{
		font-size: 18px;
		font-weight: 100;
	}

	._outfeature_box p{
		font-size: 14px;
		line-height: 22px;
		color: #444;
	}

	.savingsfeature{
		background-color: #f8faff;
	}

	.investfeature{
		background-color: #fbf8ff;
	}

	.investfeature h3{
		color: #674498;
	}

	.investcontent h1 {
		color: #674498;
	}

	@media (max-width: 600px) {
		._mobilecenter{
			text-align: center;
			margin-top: 50px;
		}


		.mainheroholder {
			background-image: none; 
			padding-bottom: 50px;
			text-align: left;
		}


		.intro-text h1 {
			font-size: 30px;
			line-height: 48px;
		}

		.feature-text h2{
			font-size: 18px;
		}

		.feature-text p{
			font-size: 12px;
			line-height: 22px;
		}

		.securealertbox .textheader {
			font-size: 16px;
			margin-bottom: 3px;
		}

		.securealertbox .textinfo {
			font-size: 11px;
			line-height: 18px;
		}


		.feature .feature-text { 
			text-align: left;
		}


		.featuremonth-text {
			text-align: center !important;
		}

	}
</style>
<style type="text/css">
	

	.wrap1{
		width: 1000px;
		margin: auto;
		margin-top: 100px;

	}

	.card1{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0 , 0.6);
		transition: 0.4s;
		width: 300px;
		background: #fff;
		float: left;
		margin: 10px;
	}
	.card1:hover{
		box-shadow: 0 8px 16px 0 rgba(0, 0, 0 , 0.6);
	}
	.container1{
		padding: 3px 16px;
	}


</style>
<body>
<!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+2349060008394", // WhatsApp number
            call_to_action: "Chat with us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->


<!-- mobile menu icon -->
<div class="nav-icon nav-icon _margin-10" style="color: #106b31;">
	<div class="line1" style="color: #106b31;"></div>
	<div class="line2" style="color: #106b31;"></div>
	<div class="line3" style="color: #106b31;"></div>
</div> 

<!-- mobile menu icon End -->
<!-- mobile menu -->
<nav class="mobile-nav" style="background-color: #106b31;" > 
				<div class="container" >
			<ul class="menu">
			<l1><a href="about.html">About Us</a></l1>
			<l1><a href="ourprocess.html">Our Process</a></l1>
			<l1><a href="ourpeople.html">Our People</a></l1>
			<l1><a href="index.html#farmmarket">Farm Market</a></l1>
			<l1><a href="login.html">Log In</a></l1>
			<l1><a href="register.html" class="signup-btn">Sign Up</a></l1>
			</ul>
	</div>  
</nav>
<!-- mobile menu End -->
<!-- Nav -->
<nav class="top-nav  alt-nav navwhite">
		<div class="container">
					<a href="index.html">
				<img src="storage/dev/statics/pvest-logo-web-white-min.png" class="logo" alt="">
			</a>
			<a href="index.html">
				<img src="storage/dev/statics/logo-main-web-shifted-min.png" class="logo-alt" alt="">
			</a>
  
			<ul class="menu _no-show">
               
			<li class="menu-list"><a href="about.html" class="menu-link">About Us</a></li>
			<li class="menu-list"><a href="ourprocess.html" class="menu-link">Our Process</a></li>
			<li class="menu-list"><a href="ourpeople.html" class="menu-link">Our People</a></li>
			<li class="menu-list"><a href="index.html#farmmarket" class="menu-link">Farm Market</a></li>
			<li class="menu-list"><a href="login.html" class="menu-link">Log In</a></li>
			<li class="menu-list"><a href="register.html" class="menu-link signup-btn">Sign Up</a></li>
			</ul>
	</div>
</nav>
	<!-- Nav End -->	
	<header class="header">
		<section class="intro-text fornheadertext">
			<div class="container">
				<div class="profileuser">
					<br>
					<br>
					<h1 class="_margin-50 _middle boldtext">Create an Account</h1>
					<p class="_margin-20 _margin-b-20 _middle"></p>
					<div align="center">
						<div align="left" class="mainactionbutton">
							<form action="register.php" method="post">
								<label class="form-label leftlabel"><b>First &amp; Last Name</b></label>
								<input type="text" class="inputcontrol largetext largetextcenter" name="fullname" id="fname" value="" required="">
								<br />
								<br />
								<label class="form-label leftlabel"><b>Valid Email</b></label>
								<input type="email" class="inputcontrol largetext largetextcenter" name="email" id="email" value="" autocomplete="off" required="">
								<br />
								<br />
								<label class="form-label leftlabel"><b>Phone Number</b></label>
								<input type="tel" maxlength="11" name="phone" id="phone" class="inputcontrol largetext largetextcenter" value="" autocomplete="off" required="">
								<br />
								<br />
								<label class="form-label leftlabel"><b>Enter Password</b></label>
								<input type="password" maxlength="20" name="password" id="password" class="inputcontrol largetext largetextcenter" value="" autocomplete="off" required >
																<br />
								<br />
								<label class="form-label leftlabel"><b>Confirm Password</b></label>
								<input type="password" maxlength="20" name="repeat_password" id="password" class="inputcontrol largetext largetextcenter" value="" autocomplete="off" required >
																<br />
								<br />
								<?php if($_POST){ echo $msg; }?>
								<hr class="thhr"> 
								<div class="form-group form-grouplast">
									<button type="submit" class="btn btn-block btn-large btn-success blue wide" id="login">Create a Free Account</button>
								</div> 
							</form>
						</div>    
						<div class="_margin-20">
							<a href="login.html" class="_margin-20">Already have an Account? Login</a>
						</div>
						<span class="_center _margin-20">By continuing, I agree to Farmmonie <a href="terms_conditions.html" target="_blank">Terms &amp; Conditions </a></span>	
					</div>
				</div>
			</div>
		</section>
	</header>
	<!-- Header + Nav End -->
	<br />
	<br />
	<br />
<footer class="content" >

		<div class="row">

<ul class="_right foot-links">
				<h3>Navigation</h3>
				<li>
					<a href="about.html">About Us</a>
				</li>
				<li>
					<a href="ourprocess.html">Our Process</a>
				</li>
				<li>
					<a href="ourpeople.html">Our People</a>
				</li>
				<li>
					<a href="index.html#farmmarket">Farm Market</a>
				</li>
				<li>
					<a href="faq.html">FAQs</a>
				</li>
				<li>
					<a href="terms_conditions.html">Terms & Conditions</a>
				</li>

			</ul>










<ul class="_right foot-links">
				<li><br>
					Texas(USA)<br>2500 Wilcrest<br> Drive(Suite 355),<br>Houston Texas<br>(Wennovation Hub).
				</li>
			</ul>


			<ul class="_right foot-links">
				<li><br>
					Abuja<br>1st Floor,<br>Plaza B-Bright<br>Star Plaza,<br>50 Ebitu Ukiwe<br>Street, Jabi<br>(Wennovation Hub).
				</li>
			</ul>






				<ul class="_right foot-links">
				<li><br>
					Ibadan<br>Plot 6 & 7,<br> Adejumo Layout,<br>Basorun Ibadan<br>(Wennovation Hub).
				</li>
			</ul>




			<ul class="_right foot-links">
				<li><br>
					Lagos<br>12, Rev Ogunbiyi<br>Street,<br> Ikeja G.R.A, <br>(Wennovation Hub).<br>
				</li>
			</ul>




<ul class="_left foot-links">
				<span>&nbsp;<img src="storage/dev/statics/logo-main-web-shifted-min.png" class="logo" alt=""></span>
				<li>
					Farmmonie is helping to create <br>a new business experience for <br>farmers in Nigeria by enabling<br> them through technology <br>and sustainable business <br>models to grow birds both <br>on and off season with<br> steady flow of income. <br><br><span>&copy; 2019 Farmmonie is a product<br> of Smartagro Technologies Ltd<br> - RC 1405222. All Rights Reserved</span>
				</li>

			</ul>

			
<ul class="_right foot-links">
				<li><br>
					<span>Edo<br>2nd Floor,<br>Edo Innovation Hub,<br> 59, ICE Road, <br>Off Wire Road, Benin City.<br>
				</li>
				<br>
				<li>
				     <a href="mailto:hello@farmmonie.com">hello@farmmonie.com</a><br>
 <a href="tel:+234906008394">+234 (0) 906 000 8394</a></span><br>
                    <span class="icon">
                     	<a href="#" target="_blank"><img alt="Facebook" src="images/social-media-icon-FB-80-min.png"></a>
                    </span>
                                         
                    <span class="icon">
                     	<a href="#" target="_blank"><img alt="Twitter" src="images/social-media-icon-TWT-80-min.png"></a>
                    </span>
                                         
                    <span class="icon">
                     	<a href="#" target="_blank"><img alt="Instagram" src="images/social-media-icon-instagram-80-min.png"></a>	
                    </span>
                    				</li>
                    				
			</ul>
		</div>
		

	

	</footer>
		
	<script src="sitestatics/js/jquery.min.js"></script> 
	<script src="sitestatics/js/jquery.livequery_new_compress.js" type="text/javascript" ></script>
	<script src="sitestatics/js/jquery-ui-output.min.js"></script>
	<script src="sitestatics/js/main_v1.js"></script>
	
</body>

</html>
