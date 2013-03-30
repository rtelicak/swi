<?php include('includes/head.php'); ?>
<?php include('includes/topnav.php'); ?>
<?php include('includes/menu.php'); ?>
    <div class="content">
        <div class="header">
            <h1 class="page-title">Detail úlohy</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="index.html">Úlohy</a> <span class="divider">/</span></li>
            <li class="active">Detail úlohy</li>
        </ul>
        <div class="container-fluid">
            <div class="row-fluid">
                <!-- <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    Tento task je tesne pred deadlinom.
                </div> -->
                <div class="item-content">
                    <div class="span9">
                        <h2><?php echo $title; ?></h2>
                        <p style="width: 700px;">
                            <?php echo $desc; ?>
                        </p>
                        <div class="mb-30" style="padding-top: 40px;">
                            <button class="btn btn-small btn-success"><i class="icon-ok"></i> Vyriešiť úlohu</button>
                            <button class="btn btn-small btn-primary"><i class="icon-bar-chart"></i> Začať pracovať na úlohe</button>
                            <button class="btn btn-small btn-primary"><i class="icon-off"></i> Ukončiť prácu na úlohe</button>
							<a href="<?php echo base_url() ?>task/edit_task/<?php echo $id_task ?>"><button class="btn btn-small btn-warning"><i class="icon-edit"></i> Upravit ulohu</button></a>
                        </div>
                        <h3>Komentáre</h3>
						<ul class=comment-wrapper>
							<?php foreach ($comments as $comment): ?>
								<li class="comment">
									<div class="comment-info">
										<i class="icon-user"></i>&nbsp<?php echo $comment->user; ?></i><br/>
										<small><?php echo $comment->dateTime; ?></small>
										</div>
									<div class="comment-bubble"><p><?php echo $comment->body; ?></p></div>
								</li>
							<?php endforeach ?>
						</ul>
						<div class="add-comment-wrapper">
							<div class="comment-box">
	                        	<h4>Pridať nový komentár</h4>
								<?php echo form_open('task/add_comment'); ?> 
									<input type="hidden" name="id_user" id="id_user" value="<?php echo $id_logged_user ?>" />
									<input type="hidden" name="id_task" id="id_task" value="<?php echo $id_task ?>" />
		                        	<textarea name="body" id="commentarea" placeholder="Váš komentár.." rows="5" cols="15"></textarea>
		                            <div class="comment-btns">
										<button type="submit" class="btn btn-small btn-success pull-left mr-10"><i class="icon-ok"></i> Pridať komentár</button>
		    	                        <button type="button" class="btn btn-small btn-danger pull-left"><i class="icon-ban-circle"></i> Zmazať napísané</button>
		                            </div>
								</form>
							</div>
						</div>
                    </div>
                    <div class="span3">
                        <div class="toc well boot">
                            <h3 class="mt-0">Parametre úlohy</h3>
                            <h4>Priradený:</h4>
                            <p><?php echo $assigned_user; ?></p>
                            <h4>Úloha pridaná</h4>
                            <p><?php echo $created; ?></p>
                            <h4>Deadline</h4>
                            <p><?php echo $deadline; ?></p>
                            <h4>Priorita</h4>
                            <p><span class="label label-important"><?php echo $priority; ?></span></p>
                            <h4>Stav</h4>
                            <p><span class="label label-success"><?php echo $state; ?></span></p>
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
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