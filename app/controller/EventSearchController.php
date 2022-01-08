<?php
    require_once './app/common/CheckLogin.php';
	require_once "./app/common/ErrorValidate.php";
    require_once "./app/model/EventsModel.php";
    function delete_directory($dirname) {
		error_reporting(0);
		if (is_dir($dirname))
			$dir_handle = opendir($dirname);
			if (!$dir_handle)
				return false;
		while($file = readdir($dir_handle)) {
			if ($file != "." && $file != "..") {
				if (!is_dir($dirname."/".$file))
					unlink($dirname."/".$file);
				else
					delete_directory($dirname.'/'.$file);
			}
		}
		closedir($dir_handle);
		rmdir($dirname);
		return true;
	}
	function eventSearch() {
		error_reporting(0);
        global $event_search_result,$keyword;
		if (isset($_GET['keyword']))
			$keyword=$_GET['keyword'];
		if (isset($_GET['delete'])){ 
			eventDeleteSQL($_GET['delete']);
			$id=$_GET['delete'];
			$event_search_result= getEventSearchResult($_GET['keyword']);
			delete_directory('./web/avatar/event/'.$id.'');
		}
		if (isset($_GET['submit']) || isset($keyword)){
			$event_search_result= getEventSearchResult($_GET['keyword']);
		}
		if (isset($_GET['edit'])) {
			$id=$_GET['edit'];
			unset($_SESSION['event_name']);
            unset($_SESSION['slogan']);
            unset($_SESSION['leader']);
            unset($_SESSION['description']);
            unset($_SESSION['cur_name_avatar']);
            unset($_SESSION['new_name_avatar']);
            unset($_SESSION['new_avatar']);
			header('Location: ../EventEdit/eventEditInput/'.$id.'');
		}
		//"window.location.href=''"
		require_once "./app/view/EventSearch.php";
    }
?>