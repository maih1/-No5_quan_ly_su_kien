<?php
	require_once "./app/common/ErrorValidate.php";
    require_once "./app/model/EventSearchModel.php";
    function getUrl() {
        $urls = explode("/", filter_var(trim($_SERVER['PHP_SELF'], "/")));
        $url = "/";
        for($i = 0; $i < count($urls)-1; $i++){
            $url = $url . $urls[$i] . "/";
        }
        return $url;
    }
    function eventSearch() {
        global $event_search_result,$b,$a;
		$a = explode("?", filter_var(trim($_SERVER['REQUEST_URI'], "?")));
		if (count($a) >1){
			$b = explode("&", $a[1]);
		}
		$temp;
		if (isset($b))
			foreach ($b as $value) {
				$temp=explode("=", $value);
				$_GET[$temp[0]]=$temp[1];
			}
		echo $_GET['term'];
		if (isset($_GET['submit']))
			$event_search_result= getEventSearchResult($_GET['term']);
		//if (isset($_GET['delete'])) 
			echo $_GET['delete'];
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