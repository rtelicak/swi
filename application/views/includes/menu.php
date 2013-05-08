<div class="sidebar-nav">
    <form class="search form-inline">
        <input type="text" placeholder="Vyhľadávanie v úlohách..">
    </form>
    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
    <ul id="dashboard-menu" class="nav nav-list collapse in">
        <li><a href="<?php echo base_url() ?>home">Domov</a></li>
        <li ><a href="<?php echo base_url() ?>statistics">Štatistiky</a></li>
        <li ><a href="<?php echo base_url() ?>calendar">Kalendár úloh</a></li>
    </ul>
    <a href="#tasks-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Úlohy<span class="label label-info">+3</span></a>
    <ul id="tasks-menu" class="nav nav-list collapse">
        <li ><a href="<?php echo base_url() ?>task/task_list">Prehľad úloh <span class="label label-info">+2</span></a></li>
        <li ><a href="<?php echo base_url() ?>task/task_list/<?php $loggedUser = $this->session->userdata('logged_in');  echo $loggedUser['id']; ?>">Prehľad mojich úloh <span class="label label-info">+1</span></a></li>
        <li ><a href="<?php echo base_url() ?>task/add_task">Pridať novú úlohu</a></li>
    </ul>
   	<a href="<?php echo base_url() ?>user/user_list" class="nav-header" ><i class="icon-user"></i>Používatelia</a>
    <a href="<?php echo base_url() ?>home/logout" class="nav-header" ><i class="icon-ban-circle"></i>Odhlásenie</a>

</div>