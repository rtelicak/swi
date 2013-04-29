<?php include('includes/head.php'); ?>
<?php include('includes/topnav.php'); ?>
<?php include('includes/menu.php'); ?>

        <div class="content">
            <div class="header">
                <div class="stats">
                    <p class="stat"><span class="number"><?php print_r($tasks_stats['Total']); ?></span>Úloh celkovo</p>
                    <p class="stat"><span class="number"><?php print_r(isset($tasks_stats['Closed']) ? $tasks_stats['Closed'] : 0); ?></span>Zatvorených</p>
					<p class="stat"><span class="number"><?php print_r(isset($tasks_stats['Resolved']) ? $tasks_stats['Resolved'] : 0); ?></span>Vyriešených</p>
					<p class="stat"><span class="number"><?php print_r(isset($tasks_stats['Reopened']) ? $tasks_stats['Reopened'] : 0); ?></span>Znovuotvorených</p>
					<p class="stat"><span class="number"><?php print_r(isset($tasks_stats['In Progress']) ? $tasks_stats['In Progress'] : 0); ?></span>Rozpracovaných</p>
					<p class="stat"><span class="number"><?php print_r(isset($tasks_stats['Open']) ? $tasks_stats['Open'] : 0); ?></span>Priradených</p>
                </div>
                <h1 class="page-title">Dashboard</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url() ?>home">Domov</a> <span class="divider">/</span></li>
                <li class="active">Dashboard</li>
            </ul>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Dobrý deň, naposledy ste boli prihlásení:</strong> <?php echo $lastLogin ?>
                        </div>
                        <div class="block">
                            <a href="#page-stats" class="block-heading" data-toggle="collapse">Najnovšie priradené úlohy</a>
                            <div id="page-stats" class="block-body collapse in">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Názov</th>
                                            <th>Deadline</th>
                                            <th>Stav</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach ($tasks as $task => $value): ?>
											<tr>
												<td><a href="<?php echo base_url(); ?>task/detail/<?php print_r($value['id']) ?>"><?php print_r($value['title']) ?></a></td>
												<td><?php print_r($value['deadline']); ?></td>
												<td>
												<?php 
													if ($value['id_state'] != 5){ //ak je solved
														echo "<span class=\"label label-important\">Nevyriešená</span>";
													} else {
														echo "<span class=\"label label-success\">Vyriešená</span>";
													}
												?>
												</td>
											</tr>
										<?php endforeach ?>
                                    </tbody>
                                </table>
                                <p><a href="<?php echo base_url() ?>task/task_list" class="btn btn-link"><i class="icon-th-list"></i> Zobraziť všetky</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="block span6">
                        <a href="#widget1" class="block-heading" data-toggle="collapse">Graf 1</a>
                        <div id="widget1" class="block-body collapse in">
                            <h2>Graf title</h2>
                        </div>
                    </div>
                    <div class="block span6">
                        <a href="#widget2" class="block-heading" data-toggle="collapse">Graf 2</a>
                        <div id="widget2" class="block-body collapse in">
                            <h2>Graf title</h2>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <hr>
                <p class="pull-right">Task manager v1.1</p>
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