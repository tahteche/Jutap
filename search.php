<?php
if(empty($_GET['page'])){
	//Replace spaces in $trans_query with +
	$trans_query = explode(' ',$trans_query);
	$trans_query = implode('+',$trans_query);
}

$cse_id = '005539286011607860035:_vjan8vncrk';						//The Google Custom Search Engine ID
$google_cse_apikey = 'AIzaSyBO1TAIP29fwV8PmgWzup_sjr2QEbyMkcU';		//Google Custom Search Engine API key

if(empty($_GET['page'])){
//Get JSON search results from google
$search_results = file_get_contents('https://www.googleapis.com/customsearch/v1?q=' . $trans_query . '&cx=' . $cse_id . '&key=' .
				$google_cse_apikey . '&hl=' . $search_in . '&lr=lang_' . $search_in);
}
else{
	$search_in = $_GET['search_in']; $your_language = $_GET['your_language'];
	$page = $_GET['page'];
	$start_index = ($page * 10) - 9;
	
	$search_results = file_get_contents('https://www.googleapis.com/customsearch/v1?q=' . $trans_query . '&cx=' . $cse_id . '&key=' . $google_cse_apikey . '&hl=' . $search_in . '&lr=lang_' . $search_in . '&start=' . $start_index);
}
				
$search_results = json_decode($search_results, true); //'true' in json_decode causes the fxn to return array not object

$total_results = $search_results['queries']['request'][0]['totalResults'];

foreach ($search_results['items'] as $item){
	
	$title = $item['title']; 
	$snippet = $item['snippet'];
	
	// This script collects the title and the html snippet of the search results, translate them and sends back the results.

$apikey = 'trnsl.1.1.20131110T161124Z.4f1f758a4433f706.ed5bab1ba0ff6d8390ec023a3aff009c9ef7adf2';


	//Collect title and html snippet from results and translate
	$initial_results = array ($title, $snippet);
	
	$i = 1;
	foreach ($initial_results as $query) {
	
				
		//Replace spaces in query with +
		$query = explode(' ',$query);
		$query = implode('+',$query);
		
		//Create GET request, submit to yandex, collect xml data and safe translated text in $trans_query
		$rest_link = 'https://translate.yandex.net/api/v1.5/tr/translate?key=' . $apikey . '&lang=' . $search_in . '-' . $your_language .  '&text=' . $query;
		$xml = simplexml_load_file($rest_link);
		$trans_query = $xml->text;
		
		//Get the translated results back into their initial variables
		if ($i == 1){
			$trans_query = explode('+',$trans_query);
			$trans_query = implode(' ',$trans_query);
			$title = $trans_query;
		}
		if ($i == 2){
			$trans_query = explode('+',$trans_query);
			$trans_query = implode(' ',$trans_query);
			$snippet = $trans_query;
		}
		
		// When $i is 1, we are with $item['title'] and when its 2, we are at $item['snippet']
		$i++;
	}
	
	
	
	echo '<div class="search_item">';
	
	echo '<a href="' . 'http://translate.google.com/translate?sl=' . $search_in . '&tl=' . $your_language . '&js=n&prev=_t&hl=' . $your_language . '&ie=UTF-8&u=' . urlencode($item['link']) . '&act=url' . '">' . $title . '</a>' . '<br />';
	
	echo '<span class="display_link">' . $item['displayLink'] . '</span><br />';
	echo $snippet . '<br />';
	
	echo '</div>';
	
	/*
	$i = 0;
	foreach($item['pagemap']['cse_thumbnail'][0] as $thumbnail_property){
		$i++;
		if ($i == 3){
			echo '<img src="' . $thumbnail_property . '" />';
		}
		else{
			echo $thumbnail_property . '<br />';
		}
	}
	*/

}
?>