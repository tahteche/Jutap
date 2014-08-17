<?php
$apikey = 'trnsl.1.1.20131110T161124Z.4f1f758a4433f706.ed5bab1ba0ff6d8390ec023a3aff009c9ef7adf2';


	//Collect form Input
	$query = $_GET['query'];
	$your_language = $_GET['your_language'];
	
	//Detects your language if auto detect is selected
	if(empty($your_language)){
		
		$auto_detect_link = 'https://translate.yandex.net/api/v1.5/tr/detect?key=' . $apikey . '&text=' . $query;
		$auto_detect = simplexml_load_file ($auto_detect_link);
		$auto_detect = $auto_detect->attributes();
		$auto_detect = $auto_detect['lang'];
		$your_language = $auto_detect;
	}

	$search_in = $_GET['search_in'];
	
	//Replace spaces in query with +
	$query = explode(' ',$query);
	$query = implode('+',$query);
	
	//Create GET request, submit to yandex, collect xml data and safe translated text in $trans_query
	$rest_link = 'https://translate.yandex.net/api/v1.5/tr/translate?key=' . $apikey . '&lang=' . $your_language . '-' . $search_in .  '&text=' . $query;
	
	$xml = simplexml_load_file($rest_link);
	$trans_query = $xml->text;
	
	//Stores trnslated query to be used in page links in pagination.php
	$trans_query_yandex = $trans_query;
	
?>