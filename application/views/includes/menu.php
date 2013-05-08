<div class="sidebar-nav">
    <form id="tab" class="search form-inline mb-0" method="post" action="<?php echo base_url() ?>task/search">
        <input type="text" name="keyword" id="keyword" placeholder="Vyhľadávanie v úlohách..">
    </form>
    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
    <ul id="dashboard-menu" class="nav nav-list collapse in">
        <li><a href="<?php echo base_url() ?>home">Domov</a></li>
        <li ><a href="<?php echo base_url() ?>statistics">Štatistiky</a></li>
    </ul>
    <a href="#tasks-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Úlohy<span class="label label-info"><i class="icon-th-list" style="margin:0 0.75em"></i></span></a>
    <ul id="tasks-menu" class="nav nav-list collapse">
        <li ><a href="<?php echo base_url() ?>task/task_list">Prehľad úloh</a></li>
        <li ><a href="<?php echo base_url() ?>task/task_list/<?php $loggedUser = $this->session->userdata('logged_in');  echo $loggedUser['id']; ?>">Prehľad mojich úloh</a></li>
        <li ><a href="<?php echo base_url() ?>task/add_task">Pridať novú úlohu</a></li>
    </ul>
   	<a href="<?php echo base_url() ?>user/user_list" class="nav-header" ><i class="icon-user"></i>Používatelia</a>
    <a href="<?php echo base_url() ?>home/logout" class="nav-header" ><i class="icon-ban-circle"></i>Odhlásenie</a>

</div>