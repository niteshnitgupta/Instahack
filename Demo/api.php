<?php

if(isset($_POST['action']) && $_POST['action'] != '') {
	$action = $_POST['action'];
	if($action == 'findPorters') {
		print_r($_REQUEST);
		die;
		$porters = '';
		// Format
		// $porters .= '{"lat":"long",}';

		$porters .= '{12.931190:77.6325844,';
		$porters .= '12.932690": 77.629274,';
		$porters .= '12.939382": 77.622064,';
		$porters .= '12.927001": 77.631677,';
		$porters .= '12.937207": 77.633136}';

		die(json_encode(array('response'=>'ok','porters'=>$porters)));
	}

}

?>