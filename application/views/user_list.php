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
            <input type="text" placeholder="Vyhľadávanie v používateľoch..">
        </form>
  </div>
</div>
<div class="">
    <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Používateľ</th>
                  <th>Stav úloh</th>
                  <th>Štatistiky</th>
                  <th>Operácia</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td width="55%" class="font-120">
                  	<span class="username"><a href="#">Bender Rodriguez</a></span>
                  </td>
                  <td>Celkovo <span class="badge badge-info">8</span> | Vyriešených <span class="badge badge-success">4</span> | Nevyriešených <span class="badge badge-important">4</span></td>
                  <td><a href="#" class="btn btn-link btn-small"><i class="icon-bar-chart"></i> Zobraziť</a></td>
                  <td width="15%">
                      <a href="#" class="btn btn-warning btn-small"><i class="icon-ban-circle"></i> Zakázať prístup</a>
   	                  <a href="#" class="btn btn-danger btn-small"><i class="icon-trash"></i> Zmazať</a>
                  </td>
                </tr>
                <tr>
                  <td width="55%" class="font-120">
                  	<span class="username"><a href="#">Bender Rodriguez</a></span>
                  </td>
                  <td>Celkovo <span class="badge badge-info">8</span> | Vyriešených <span class="badge badge-success">4</span> | Nevyriešených <span class="badge badge-important">4</span></td>
                  <td><a href="#" class="btn btn-link btn-small"><i class="icon-bar-chart"></i> Zobraziť</a></td>
                  <td width="15%">
                      <a href="#" class="btn btn-warning btn-small"><i class="icon-ban-circle"></i> Zakázať prístup</a>
   	                  <a href="#" class="btn btn-danger btn-small"><i class="icon-trash"></i> Zmazať</a>
                  </td>
                </tr>
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