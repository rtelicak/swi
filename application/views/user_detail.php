<?php include('includes/head.php'); ?>
<?php include('includes/topnav.php'); ?>
<?php include('includes/menu.php'); ?>
<div class="content">
	<div class="header">
    	<?php // echo var_dump($user); ?>
		<h1 class="page-title">Používateľ: <?php echo $user->username; ?></h1>
	</div>
	<ul class="breadcrumb">
		<li><a href="<?php echo base_url() ?>home">Domov</a> <span class="divider">/</span></li>
		<li><a href="<?php echo base_url() ?>user/user_list">Zoznam používateľov</a> <span class="divider">/</span></li>
		<li class="active">Úprava používateľa</li>
	</ul>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="well">
				<div class="form-cover">
					<div class="tab-pane active in" id="home">
						<form id="tab" class="form-horizontal" method="post" action="#">
							<legend>Parametre používateľa</legend>
                            <div class="alert alert-info">
								<strong>Posledné prihlásenie:</strong> <?php echo $user->lastLogin; ?>
				            </div>
							<div class="control-group">
								<label class="control-label" for="name">Prihlasovacie meno:</label>
								<div class="controls">
									<input type="text" id="name" placeholder="Meno používateľa" value="<?php echo $user->username; ?>" class="input-xlarge">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="password">Heslo:</label>
								<div class="controls">
									<input type="password" id="password" placeholder="Heslo" value="<?php echo $user->password; ?>" class="input-xlarge">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="passwordvalidate">Kontrola hesla:</label>
								<div class="controls">
									<input type="password" id="passwordvalidate" placeholder="Heslo" value="<?php echo $user->password; ?>" class="input-xlarge">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="blocked">Rola:</label>
								<div class="controls">
									<?php echo $role; ?>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="blocked">Blokovaný:</label>
								<div class="controls">
									<label class="radio left mr-10">
									<input type="radio" name="blocked" id="blocked" value="1" <?php if($user->blocked == 1) { echo "checked"; }?> />
									Áno
									</label>
									<label class="radio left pt-5">
									<input type="radio" name="blocked" id="blocked" value="0" <?php if($user->blocked == 0) { echo "checked"; }?> /> 
									Nie
									</label>
								</div>
							</div>
							<div class="btn-toolbar">
								<button class="btn btn-success"><i class="icon-save"></i> Uložiť / Aktualizovať</button>
								<a href="#myModal" data-toggle="modal" class="btn btn-danger"><i class="icon-ban-circle"></i> Zmazať</a>
								<a href="<?php echo base_url() ?>user/user_list" class="btn btn-primary"><i class="icon-tasks"></i> Návrat na zoznam</a>
							</div>
                            <input type="hidden" value="<?php echo $user->id; ?>" name="id_user" name="id_user" />
						</form> 
					</div>
				</div>
			</div>
			<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Delete Confirmation</h3>
				</div>
				<div class="modal-body">
					<p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
					<button class="btn btn-danger" data-dismiss="modal">Delete</button>
				</div>
			</div>
			<footer>
				<hr>
				<p class="pull-right">
					Task manager v1.1
				</p>
				<div class="clearfix">&nbsp;</div>
			</footer>
		</div>
	</div>
</div>
<script src="<?php echo base_url() ?>resources/bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
	$("[rel=tooltip]").tooltip();
	$(function() {
	    $('.demo-cancel-click').click(function(){return false;});
	});
</script>
</body>
</html>