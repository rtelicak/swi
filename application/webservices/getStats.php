<?php 

$uid = $_GET['uid'];

	/* connect to the db */
	$link = mysql_connect('localhost','root','root') or die('Cannot connect to the DB');
	mysql_select_db('task_manager',$link) or die('Cannot select the DB');
	
	// create query to get tasks
	$qry =  "SELECT  * FROM tasks WHERE id_assigned_user = ".$uid."";
	$result = mysql_query($qry,$link) or die('Errant query:  '.$qry);
	
	// create one array for tasks
	$tasks = array();
	if(mysql_num_rows($result)) { 
		while($task = mysql_fetch_assoc($result)) {
			$tasks[$task['id']]['state'] = $task['id_state'];
			$tasks[$task['id']]['priority'] = $task['id_priority'];
		}
	}   

var_dump( $tasks );


?>