<?php
require_once("class.crud.php");
$crud = new CRUD();

	header('Content-type: application/json; charset=UTF-8');

	$response = array();

	if ($_POST['delete']) {



		$pid = intval($_POST['delete']);
		$query = "DELETE FROM tbl_users WHERE id=:pid";
		$stmt = $crud->runQuery( $query );
		$stmt->execute(array(':pid'=>$pid));

		if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'User Deleted Successfully ...';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'Unable to delete user ...';
		}
		echo json_encode($response);
	}
