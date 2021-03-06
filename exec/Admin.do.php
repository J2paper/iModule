<?php
REQUIRE_ONCE '../config/default.conf.php';

$mDB = &DB::instance();
$mMember = &Member::instance();
$member = $mMember->GetMemberInfo();

$action = Request('action');
$do = Request('do');

$return = array();
$errors = array();

if ($action == 'module') {
	$module = Request('module');
	if ($mMember->IsAdmin() == false) {
		$return['success'] = false;
		
		exit(json_encode($return));
	}

	if ($do == 'config') {
		$config = array();
		foreach ($_POST as $key=>$value) {
			if (preg_match('/_select$/',$key) == true && isset($_POST[str_replace('_select','',$key)]) == true) continue;
			$config[$key] = $value;
		}

		$config = serialize($config);
		if (sizeof($errors) == 0) {
			$mDB->DBupdate($_ENV['table']['module'],array('config'=>$config),'',"where `module`='$module'");
			$return['success'] = true;
		} else {
			$return['success'] = false;
			$return['errors'] = $errors;
		}
		
		exit(json_encode($return));
	}
	
	if ($do == 'update_folder') {
		$mModule = new Module($module);
		$mModule->CreateFolder();
		
		$return['success'] = true;
		exit(json_encode($return));
	}

	if ($do == 'update_db') {
		GetDefaultHeader('모듈 디비 업데이트중');
		$mModule = new Module($module);
		$mModule->CreateDatabase(true);
		GetDefaultFooter();
	}

	if ($do == 'direct') {
		$module = Request('module');
		$mModule = new Module($module);
		$value = Request('value');

		if ($mModule->IsSetup() == true) {
			$mDB->DBupdate($_ENV['table']['module'],array('is_admin_top'=>$value),'',"where `module`='$module'");
		}

		$return['success'] = true;
		exit(json_encode($return));
	}
	
	if ($do == 'sort') {
		$data = json_decode(Request('data'),true);
		
		for ($i=0, $loop=sizeof($data);$i<$loop;$i++) {
			$mDB->DBupdate($_ENV['table']['module'],array('sort'=>$data[$i]['sort']),'',"where `module`='{$data[$i]['module']}'");
		}
		$return['success'] = true;
		exit(json_encode($return));
	}
	
	if ($do == 'install') {
		$config = array();
		foreach ($_POST as $key=>$value) {
			if (preg_match('/_select$/',$key) == true && isset($_POST[str_replace('_select','',$key)]) == true) continue;
			$config[$key] = $value;
		}
		$config = serialize($config);
		
		$mModule = new Module($module);
		$mModule->Install($config);
		
		$return['success'] = true;
		exit(json_encode($return));
	}
}

if ($action == 'status') {
	header('Content-type: text/xml; charset="UTF-8"', true);
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");

	$mStatus = new Status();

	if ($do == 'log_visit_delete') {
		$mDB->DBtruncate($mStatus->table['log_visit']);
	}

	echo '<?xml version="1.0" encoding="UTF-8"?>';
	echo '<message success="true">';
	echo '</message>';
}
?>