<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">
		<title>Manažér úloh - administrácia v1.1</title>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<link rel="stylesheet" href="<?php echo base_url() ?>resources/bootstrap/css/bootstrap.css" type="text/css" charset="utf-8"> 
		<link rel="stylesheet" href="<?php echo base_url() ?>resources/stylesheets/theme.css" type="text/css" charset="utf-8"> 
		<link rel="stylesheet" href="<?php echo base_url() ?>resources/font-awesome/css/font-awesome.css" type="text/css" charset="utf-8"> 
		<script src="<?php echo base_url() ?>resources/jquery-1.7.2.min.js" type="text/javascript"></script>
    
	    <style type="text/css">
			#line-chart {
				height: 300px;
				width: 800px;
				margin: 0px auto;
				margin-top: 1em;
			}
			.brand {
				font-family: georgia, serif;
			}
			.brand .first {
				color: #ccc;
				font-style: italic;
			}
			.brand .second {
				color: #fff;
				font-weight: bold;
			}                         
	    </style>
	</head>
	<body class="">

		<div class="navbar">
			<div class="navbar-inner">
				<a class="brand" href="index.html"><span class="first">Projekt</span> - <span class="second">Softvérové Inžinierstvo II</span></a>
			</div>
		</div>
	
		<div class="row-fluid">
			<div class="dialog">
				<div class="block">
					<p class="block-heading">Prihlásenie</p>
					<div class="block-body"> 
						<?php echo validation_errors(); ?>
						<?php echo form_open('verifylogin'); ?>
							<label>Prihlasovacie meno</label>
							<input name="username" id="username" type="text" class="span12">
							<label>Heslo</label>
							<input name="password" id="password" type="password"  class="span12">
							<input type="submit" name="Submit" value="Prihlásiť sa" class="btn btn-primary pull-right">
							<div class="clearfix"></div>
						</form>        
					</div>      
				</div>     
			</div>
		</div>
	
	</body>
</html>
