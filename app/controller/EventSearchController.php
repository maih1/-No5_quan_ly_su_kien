<?php
    require_once './app/common/CheckLogin.php';
	require_once "./app/common/ErrorValidate.php";
    require_once "./app/model/EventSearchModel.php";
    function eventSearch() {
        global $event_search_result,$keyword;
		if (isset($_GET['keyword']))
			$keyword=$_GET['keyword'];
		if (isset($_GET['delete'])){ 
			eventDeleteSQL($_GET['delete']);
			$event_search_result= getEventSearchResult($_GET['keyword']);
		}
		if (isset($_GET['submit']) || isset($keyword)){
			$event_search_result= getEventSearchResult($_GET['keyword']);
		}
		require_once "./app/view/eventsearch/EventSearch.php";
    }
    function getValue($value, $nameValue){
        $res = null;
        if(!empty($value)){
            $res = $value;
        } elseif((isset($_SESSION['checkEventAdd']) && $_SESSION['checkEventAdd'] == 5) && isset($_SESSION[$nameValue])){
            $res =  $_SESSION[$nameValue]; 
        }
        echo $res;
    }
?>