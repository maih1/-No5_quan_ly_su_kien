<?php
    require_once './app/model/UserSearchModel.php';
    
    function userSearchF() {
        global $search,$key;
		
		$a = explode("?", filter_var(trim($_SERVER['REQUEST_URI'], "?")));
		if (count($a) >1){
			$b = explode("&", $a[1]);
		}
		if (isset($b))
			foreach ($b as $value) {
				$temp=explode("=", $value);
				$_GET[$temp[0]]=$temp[1];
		}
		if (isset($_GET['key']))
			$key=$_GET['key'];
		if (isset($_GET['del'])){ 
			userDel($_GET['del']);
			//$search = userSeach($_GET['key']);
		}
		if (isset($_GET['submit'])){
			$search = userSeach($_GET['key']);
		}
        require_once './app/view/usersearch/UserSearchView.php';
    }
    
?>