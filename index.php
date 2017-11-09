<?php
require_once("config.php");
?><!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
	<meta name="robots" content="noindex" />
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $language['site_name'] . " - "  . $language['brand_name'] ?></title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   
   <style>	
	.kapsa {
		width:50%;
		margin:30px auto 0 auto;
	}
	
	@media only screen and (max-width: 1100px) {
		.kapsa {
			width:80%;
		}
	}
	
	@media only screen and (max-width: 400px) {
		.kapsa {
			width:90%;
		}
		
		.ustbilgi {
			width:90%;
		}
		
		.btn-success {
			float:none!important;
		}
		
		.header {
			text-align:center;
		}
	}
	
	.header {
		border:1px solid #00a1dd;
		padding:10px;
		font-weight:bold;
		
		background-color: #00a1dd;
		color:#FFF;

		-webkit-border-top-left-radius: 5px;
		-webkit-border-top-right-radius: 5px;
		-moz-border-radius-topleft: 5px;
		-moz-border-radius-topright: 5px;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		
		overflow:hidden;
		line-height:35px;
	}
	
	.icerik {
		padding:10px;
		border:1px solid #00a1dd;
		
		-webkit-border-bottom-left-radius: 5px;
		-webkit-border-bottom-right-radius: 5px;
		-moz-border-radius-bottomleft: 5px;
		-moz-border-radius-bottomright: 5px;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
	}
	
	.satir {
		width:100%;
		overflow:hidden;
		margin-bottom:5px;
		border-bottom:1px solid #efefef;
	}
	
	.satirbaslik {
		width:150px;
		float:left;
		overflow:hidden;
		font-weight:bold;
		padding:5px;
		margin-right:2px;
	}
	
	/*
		.satirbaslik span {
			display:block;
			float:right;
		}
	*/
	
	.satiricerik {
		padding:5px;
		float:left;
		width:100%;
	}
	
	.btn-success {
	color: #fff;
	background-color: #388dad;
	border: 2px solid #1c8bb5;
	float:right;
	}

	.btn-success:hover, .btn-success:active, .btn-success:focus{
		border: 2px solid #1c8bb5!important;
		background-color:#48a9ce!important;
	}
	
	.ustbilgi {
		margin-top:10px;
		margin-bottom:10px;
		padding:5px;
		font-size:12px;
		color:#333;
	}
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  
<div class="kapsa">
	<div class="header">
		<?php echo $language['site_name']; ?>
		
		<button id="btnRefresh" class="btn btn-success"><?php echo $language['refresh']; ?></button>
	</div>
	<div class="icerik">
		
		<div class="ustbilgi">
			<strong><?php echo $language['general_title']; ?></strong>
			<br />
			<?php echo $language['general_description']; ?>
		</div>
		
<script>
 $(document).ready(function() {
     $('#responsemessagecontainer').html('<img src="static/img/yukleniyor.gif" width="50%"> <?php echo $language['loading']; ?>');
// AJAX Code To Submit Form.
$.ajax({
type: "post",
url: "incoming-sms-ajax.php",
data: 'randval='+ Math.random(),
cache: false,
success: function(result){
$('#responsemessagecontainer').html(result);
}
});
   var btnRefresh=document.getElementById("btnRefresh");
	btnRefresh.onclick=function() {
      $('#responsemessagecontainer').html('<img src="static/img/yukleniyor.gif" width="50%"> <?php echo $language['loading']; ?>');
// AJAX Code To Submit Form.
$.ajax({
type: "post",
url: "incoming-sms-ajax.php",
data: 'randval='+ Math.random(),
cache: false,
success: function(result){
$('#responsemessagecontainer').html(result);
}
});
   }
});
</script>
<div id="responsemessagecontainer">
</div>
		
	</div>
</div>
  
<center>
<br />
<br />
<br />
<a href="https://yandex.com/" target="_blank">
	<img src="static/img/logo/Yandex_logo_en.svg" width="130" />
</a>
<br />
<br />
</center>
</body>
</html>