<?php 

$uid = $_GET['uid'];

	/* connect to the db */
	$link = mysql_connect('localhost','root','root') or die('Cannot connect to the DB');
	mysql_select_db('task_manager',$link) or die('Cannot select the DB');
	
	// create query to get tasks
	$qry =  "SELECT tasks.id AS id, priority.priority AS priority, COUNT(priority.priority) AS count
			FROM tasks 
			LEFT JOIN priority ON tasks.id_priority = priority.id
			WHERE id_assigned_user = ".$uid."
			GROUP BY priority.priority";
	$result = mysql_query($qry,$link) or die('Errant query:  '.$qry);
	
	// create one array for tasks
	$tasks = array();
	if(mysql_num_rows($result)) { 
		while($task = mysql_fetch_assoc($result)) {
			//$tasks[$task['id']]['state'] = $task['state'];
			//$tasks[$task['id']]['priority'] = $task['priority'];
			$tasks[$task['priority']] = $task['count'];
		}
	}   
	
	// create query to get states
	$qry =  "SELECT tasks.id AS id, state.state AS state, COUNT(state.state) AS count
			FROM tasks 
			LEFT JOIN state ON tasks.id_state = state.id
			WHERE id_assigned_user = ".$uid."
			GROUP BY state.state";
	$result = mysql_query($qry,$link) or die('Errant query:  '.$qry);
	
	// create one array for states
	$states = array();
	if(mysql_num_rows($result)) { 
		while($state = mysql_fetch_assoc($result)) {
			$states[$state['state']] = $state['count'];
		}
	}
	
	$out = array('tasks' => $tasks, 'state' => $states);
	//var_dump( $out );
	
	header('Content-type: application/json');
	echo json_encode($out);
	mysql_close($link);
	



?>