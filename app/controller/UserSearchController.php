<?php
    require_once './app/common/CheckLogin.php';
    require_once './app/model/UserModel.php';
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
            $search = userSearch($_GET['key'], $_GET['phanloai']);

		}
        require_once './app/view/UserSearchView.php';
}
