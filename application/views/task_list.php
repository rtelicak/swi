<!DOCTYPE html>
<html lang="en">
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
        <link rel="shortcut icon" href="../assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
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
                <li><a href="index.html">Domov</a></li>
                <li ><a href="media.html">Štatistiky</a></li>
                <li ><a href="calendar.html">Kalendár úloh</a></li>
            </ul>
            <a href="#tasks-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Úlohy<span class="label label-info">+3</span></a>
            <ul id="tasks-menu" class="nav nav-list collapse">
                <li ><a href="list.html">Prehľad úloh <span class="label label-info">+2</span></a></li>
                <li ><a href="list.html">Prehľad mojich úloh <span class="label label-info">+1</span></a></li>
                <li ><a href="add.html">Pridať novú úlohu</a></li>
            </ul>
            <a href="sign-in.html" class="nav-header" ><i class="icon-user"></i>Odhlásenie</a>
        </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></td>
                                    <td>User1</td>
                                    <td>14.03.2013</td>
                                    <td><span class="label label-important">Nevyriešená</span></td>
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
        <script src="lib/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript">
            $("[rel=tooltip]").tooltip();
            $(function() {
                $('.demo-cancel-click').click(function(){return false;});
            });
        </script>
    </body>
</html>