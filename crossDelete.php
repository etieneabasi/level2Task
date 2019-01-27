<?php  
session_start();
if (!empty($_GET['action']) && !empty($_GET['id'])) {
	$action = $_GET['action'];
	$id = $_GET['id'];

	if ($action == "delete") {
		// Remove data from session
		unset($_SESSION['tasks'][$id - 1]);
		echo "Deleted task.";
	} elseif($action == "done") {
		// First we store the data somewhere temporarily
		// as we need to do an overwrite
		$data = $_SESSION['tasks'] [$id - 1];
		$_SESSION['tasks'] [$id - 1]  = array(
			'task' => $data['task'],
			// Mark task as undone if already  done, or done if otherwise
			'done' => $data['done'] == false ? true: false,
		);
		echo $data['done'] == false ? "Task Done" : "Task to be redone.";
	}
} else{
	echo "Empty";
}
header("location:index.php");
?>

	