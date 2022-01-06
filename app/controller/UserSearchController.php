<?php
    require_once './app/model/UserSearchModel.php';
    $_classify = array("Sinh viên" => 1, "Giáo viên" => 2, "Sinh viên cũ" => 3);
    $classify = array(1 => "Sinh viên", 2 => "Giáo viên", 3 => "Sinh viên cũ");
    function userSearchF() {
        global $search, $key, $phanloai;
		global $classify;
		if (isset($_GET['key']))
			$key=$_GET['key'];
        if (isset($_GET['phanloai']))
            $phanloai=$_GET['phanloai'];
		if (isset($_GET['del'])){ 
			userDel($_GET['del']);
		}
		if (isset($_GET['submit'])){
            if(!empty($key)) {
                $search = userSearch($_GET['key']);
            } else {
                $search = userSearchExact($_GET['phanloai']);
            }
		}
        require_once './app/view/UserSearchView.php';
    }
    
?>