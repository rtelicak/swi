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
    </head>
    <body class="">
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="nav pull-right">
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user"></i> <?php echo $username; ?>
                        <i class="icon-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="#">Moje úlohy</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="home/logout">Odhlásenie</a></li>
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
                <li><a href="./">Domov</a></li>
                <li ><a href="media.html">Štatistiky</a></li>
                <li ><a href="calendar.html">Kalendár úloh</a></li>
            </ul>
            <a href="#tasks-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Úlohy<span class="label label-info">+3</span></a>
            <ul id="tasks-menu" class="nav nav-list collapse">
                <li ><a href="list.html">Prehľad úloh <span class="label label-info">+2</span></a></li>
                <li ><a href="list.html">Prehľad mojich úloh <span class="label label-info">+1</span></a></li>
                <li ><a href="home/displayTaskForm">Pridať novú úlohu</a></li>
            </ul>
            <a href="home/logout" class="nav-header" ><i class="icon-user"></i>Odhlásenie</a>
        </div>
        <div class="content">
            <div class="header">
                <div class="stats">
                    <p class="stat"><span class="number">53</span>Úloh celkovo</p>
                    <p class="stat"><span class="number">27</span>Priradených</p>
                    <p class="stat"><span class="number">15</span>Vyriešených</p>
                    <p class="stat"><span class="number">12</span>Čakajúcich</p>
                </div>
                <h1 class="page-title">Dashboard</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="index.html">Domov</a> <span class="divider">/</span></li>
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
                                        <tr>
                                            <td><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></td>
                                            <td>14.03.2013</td>
                                            <td><span class="label label-important">Nevyriešená</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Sed eget elit lectus, sit amet laoreet est.</a></td>
                                            <td>20.03.2013</td>
                                            <td><span class="label label-success">Vyriešená</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Curabitur non lectus lorem, a malesuada massa.</a></td>
                                            <td>21.03.2013</td>
                                            <td><span class="label label-success">Vyriešená</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Sed in odio nec libero adipiscing tristique.</a></td>
                                            <td>29.03.2013</td>
                                            <td><span class="label label-success">Vyriešená</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Vivamus bibendum arcu ut dui molestie elementum commodo ligula venenatis.</a></td>
                                            <td>01.04.2013</td>
                                            <td><span class="label label-important">Nevyriešená</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Etiam augue mi, cursus at elementum ut, malesuada ac leo.</a></td>
                                            <td>17.04.2013</td>
                                            <td><span class="label label-success">Vyriešená</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p><a href="list.html" class="btn btn-link"><i class="icon-th-list"></i> Zobraziť všetky</a></p>
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