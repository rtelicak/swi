<?php include('includes/head.php'); ?>
<?php include('includes/topnav.php'); ?>
<?php include('includes/menu.php'); ?>

<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Zoznam používateľov</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="">Domov</a> <span class="divider">/</span></li>
            <li class="active">Zoznam používateľov</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-success"><i class="icon-user"></i> Nový používateľ</button>
  	<div class="btn-group right">
        <form class="search form-inline mb-0">
            <input type="text" placeholder="Vyhľadávanie medzi používateľmi..">
        </form>
  </div>
</div>
<div class="">
    <table id="userTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Používateľ</th>
                  <th>Stav úloh</th>
                  <th>Štatistiky</th>
                  <th>Operácia</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($users as $user): ?>
					<tr class="line">
						<td width="30%" class="font-120"><a href=detail/<?php echo $user->id?>><?php echo $user->username?></a></td>
						<td>Celkovo <span class="badge badge-info">-</span> | Vyriešených <span class="badge badge-success">-</span> | Nevyriešených <span class="badge badge-important">-</span></td>
						<td><a href="#stats" class="btn btn-link btn-small stats"><i class="icon-bar-chart"></i> <span>Zobraziť</span></a></td>
						<td width="25%">
                        	<a href="#<?=$user->id?>" class="btn btn-warning btn-small"><i class="icon-ban-circle"></i> Zakázať prístup</a>
                        	<a href="#<?=$user->id?>" class="btn btn-danger btn-small"><i class="icon-trash"></i> Zmazať</a>
                        </td> 
					</tr>
                    <tr class='stats' style="display:none;"><td colspan='4'>Stats</td></tr>
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
			$(function () {
					$("#userTable", "body").on({
						'click': function (event) {
							event.preventDefault();
							var content = $(this).find("span");
							if(content.text()==='Zobraziť') {
								content.text("Skryť");
							}
							else {
								content.text("Zobraziť");
							}

							$(this).closest("tr.line").nextUntil("tr.line").toggle("fast");
						}
					},
						"a.stats", null);
				});
        </script>
    </body>
</html>