<?php include('includes/head.php'); ?>
<?php include('includes/topnav.php'); ?>
<?php include('includes/menu.php'); ?>

        <div class="content">
            <div class="header">
                <h1 class="page-title">Zoznam úloh</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="index.html">Domov</a> <span class="divider">/</span></li>
                <li class="active">Zoznam úloh</li>
            </ul>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="btn-toolbar">
                        <button class="btn btn-primary"><i class="icon-plus"></i> Nová úloha</button>
                        <button class="btn btn-primary"><i class="icon-check"></i> Zobraziť len moje úlohy</button>
                        <button class="btn btn-danger"><i class="icon-time"></i> Zobraziť úlohy pred deadlinom</button>
                        <div class="btn-group right">
                            <form class="search form-inline mb-0">
                                <input type="text" placeholder="Vyhľadávanie v úlohách..">
                            </form>
                        </div>
                    </div>
                    <div class="">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Názov</th>
                                    <th>Priradený</th>
                                    <th>Deadline</th>
                                    <th>Stav</th>    
									<th>Priorita</th>
                                </tr>
                            </thead>
                            <tbody> 
									<?php foreach ($tasks as $task): ?>
										<tr>
											<td><a href=detail/<?=$task->id?>><?=$task->title?></a></td>
											<td><?=$task->username?></td>
											<td><?=$task->deadline?></td>
											<td><?=$task->state?></td> 
											<td><?=$task->priority?></td> 
										</tr>
									<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
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