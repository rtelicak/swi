<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Nová úloha</title>
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
	            height:300px;
	            width:800px;
	            margin: 0px auto;
	            margin-top: 1em;
            }
            .brand { font-family: georgia, serif; }
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
                <ul class="nav pull-right">
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user"></i> Admin adminov
                        <i class="icon-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="#">Moje úlohy</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="sign-in.html">Odhlásenie</a></li>
                        </ul>
                    </li>
                </ul>
                <a class="brand" href="index.html"><span class="first">Projekt</span> - <span class="second">Softvérové Inžinierstvo II</span></a>
            </div>
        </div>
        <div class="sidebar-nav">
            <form class="search form-inline">
                <input type="text" placeholder="Vyhľadávanie v úlohách..">
            </form>
            <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
            <ul id="dashboard-menu" class="nav nav-list collapse in">
                <li><a href="./home">Domov</a></li>
                <li ><a href="media.html">Štatistiky</a></li>
                <li ><a href="calendar.html">Kalendár úloh</a></li>
            </ul>
            <a href="#tasks-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Úlohy<span class="label label-info">+3</span></a>
            <ul id="tasks-menu" class="nav nav-list collapse">
                <li ><a href="list.html">Prehľad úloh <span class="label label-info">+2</span></a></li>
                <li ><a href="list.html">Prehľad mojich úloh <span class="label label-info">+1</span></a></li>
                <li ><a href="./displayTaskForm">Pridať novú úlohu</a></li>
            </ul>
            <a href="sign-in.html" class="nav-header" ><i class="icon-user"></i>Odhlásenie</a>
        </div>
        <div class="content">
            <div class="header">
                <h1 class="page-title">Nová úloha</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="index.html">Domov</a> <span class="divider">/</span></li>
                <li><a href="list.html">Zoznam úloh</a> <span class="divider">/</span></li>
                <li class="active">Nová úloha</li>
            </ul>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="btn-toolbar">
                        <button class="btn btn-primary"><i class="icon-save"></i> Uložiť / Aktualizovať</button>
                        <a href="#myModal" data-toggle="modal" class="btn btn-warning"><i class="icon-ban-circle"></i> Zrušiť</a>
                        <div class="btn-group">
                        </div>
                    </div>
                    <div class="well">
                        <div class="form-cover">
                            <h2 class="page-title">
                            Parametre úlohy</h1>
                            <div class="tab-pane active in" id="home">
                                <form id="tab">
                                    <label>Názov</label>
                                    <input type="text" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit." class="input-xxlarge">
                                    <label>Popis úlohy</label>
                                    <textarea value="popis" rows="3" class="input-xxlarge">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et metus tellus. Cras pretium ligula lorem, ac bibendum metus. Curabitur vitae orci eu metus ultricies pharetra at ac tellus. Nam hendrerit gravida est, placerat pulvinar quam mollis commodo. Quisque non feugiat nisl. Sed sodales, sapien non ornare tincidunt, risus mi ornare diam, a tristique magna nunc sed magna. Nulla et nisi ac metus venenatis tincidunt eget quis mauris. Pellentesque felis nulla, tristique fringilla congue ac, accumsan at ante. Morbi condimentum tempus iaculis. Nullam varius nulla non mi tincidunt vitae cursus nisl lobortis. Proin pharetra rhoncus velit, eu vehicula purus rhoncus vel. Fusce lacinia, massa id imperdiet volutpat, diam magna vehicula metus, et viverra dui lorem et arcu. Quisque at quam tortor, eget pellentesque dolor. Morbi id neque nisi. 
									</textarea>
                                    <label>Priradený používateľ</label>
                                    <select name="user" id="user" class="input-xlarge">
                                        <option value="1">User 1</option>
                                        <option value="1">User 2</option>
                                        <option value="1">User 3</option>
                                        <option value="1">User 4</option>
                                        <option value="1">User 5</option>
                                    </select>
                                    <label>Priorita</label>
                                    <select name="priority" id="priority" class="input-xlarge">
                                        <option value="1">Normal</option>
                                        <option value="1">Critical</option>
                                        <option value="1">Solid</option>
                                        <option value="1">High</option>
                                        <option value="1">Low</option>
                                    </select>
                                    <label>Deadline</label>
                                    <input type="text" value="20.03.2013" class="input-large">
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