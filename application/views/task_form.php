<?php include('includes/head.php'); ?>
<?php include('includes/topnav.php'); ?>
<?php include('includes/menu.php'); ?>

        <div class="content">
            <div class="header">
                <h1 class="page-title">Nová úloha</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="home">Domov</a> <span class="divider">/</span></li>
                <li><a href="task/list">Zoznam úloh</a> <span class="divider">/</span></li>
                <li class="active">Nová úloha</li>
            </ul>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="well">
                        <div class="form-cover">
                            <h2 class="page-title">
                            Parametre úlohy</h1>
                            <div class="tab-pane active in" id="home">
                                <?php echo validation_errors(); ?>
								<?php echo form_open('task/save'); ?>
                                    <label>Názov</label>
                                    <input name="title" type="text" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit." class="input-xxlarge">
                                    <label>Popis úlohy</label>
                                    <textarea name="desc" value="popis" rows="3" class="input-xxlarge">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et metus tellus. Cras pretium ligula lorem, ac bibendum metus. Curabitur vitae orci eu metus ultricies pharetra at ac tellus. Nam hendrerit gravida est, placerat pulvinar quam mollis commodo. Quisque non feugiat nisl. Sed sodales, sapien non ornare tincidunt, risus mi ornare diam, a tristique magna nunc sed magna. Nulla et nisi ac metus venenatis tincidunt eget quis mauris. Pellentesque felis nulla, tristique fringilla congue ac, accumsan at ante. Morbi condimentum tempus iaculis. Nullam varius nulla non mi tincidunt vitae cursus nisl lobortis. Proin pharetra rhoncus velit, eu vehicula purus rhoncus vel. Fusce lacinia, massa id imperdiet volutpat, diam magna vehicula metus, et viverra dui lorem et arcu. Quisque at quam tortor, eget pellentesque dolor. Morbi id neque nisi. 
									</textarea>
                                    <label>Priradený používateľ</label>
									<?php echo form_dropdown('user', $users); ?>
                                    <label>Priorita</label>
									<?php echo form_dropdown('priority', $priorities); ?>
                                    <label>Deadline</label>
                                    <input name="deadline" type="text" value="20.04.2013" class="input-large">
				                    <div class="btn-toolbar">
				                        <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Uložiť / Aktualizovať</button>
				                        <a href="#myModal" data-toggle="modal" class="btn btn-warning"><i class="icon-ban-circle"></i> Zrušiť</a>
				                    </div>
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