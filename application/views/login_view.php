<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>SWI2</title>
	<link href="<?php echo base_url();?>/bootstrap/css/bootstrap.css" rel="stylesheet">
	    <style type="text/css">
			/* Override some defaults */
			html, body {
				background-color: #eee;
			}
			body {
				padding-top: 40px; 
			}
			.container {
				width: 300px;          
			}  
			.span2{
				width: 180px !important;
			}         
			/* The white background content wrapper */
			.container > .content {
				background-color: #fff;
				padding: 20px;
				margin: 0 -20px; 
				-webkit-border-radius: 10px 10px 10px 10px;
				-moz-border-radius: 10px 10px 10px 10px;
				border-radius: 10px 10px 10px 10px;
				-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
				-moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
				box-shadow: 0 1px 2px rgba(0,0,0,.15);
			}
			.login-form {
				margin-left: 65px;
			}                         
	    </style>
  </head>
  <body>
	<div class="container">
	    <div class="content">
	      <div class="row">
	        <div class="login-form">
	          <h2>Sign in BITCH!</h2>
	          <?php echo validation_errors(); ?>
		    	<?php echo form_open('verifylogin'); ?>
					<fieldset>
						<label for="username">Username</label>
						<div class="div_text">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-user"></i></span>
								<input name="username" id="username" type="text" id="log inputIcon"  class="username span2">
							</div>
						</div>
						<label for="password">Password</label>
						<div class="div_text">
							<div class="input-prepend"><span class="add-on">
								<i class="icon-lock"></i></span>
								<input name="password" type="password" id="password" class="password span2">
							</div>
						</div>
						<div class="button_div"><input type="submit" name="Submit" value="Login" class="btn btn-primary"></div>             
					</fieldset>
	          </form>
	        </div>
	      </div>
	    </div>
	  </div>
  </body>
</html>
