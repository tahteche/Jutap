<?php
if(empty($_GET['page'])){
	$requested_page = 1;
}
else{
	$requested_page = $_GET['page'];
}
	$total_number_of_pages = ceil($total_results / 10);

if ($total_number_of_pages <= 10){
	$highest_page = $total_number_of_pages;
	$lowest_page = 1;
}
else if($total_number_of_pages >= 10){
	$lowest_page = $requested_page - 4;
	$highest_page = $requested_page + 5;
	if($lowest_page < 1){
		$highest_page = $highest_page + (1 - $lowest_page);
		$lowest_page = 1;
	}
	elseif($highest_page > $total_number_of_pages){
		$lowest_page = $lowest_page - ($highest_page - $total_number_of_pages);
		$highest_page = $total_number_of_pages;	
	}
}

if($requested_page > 1){
echo '<a href="index.php?trans_query=' . htmlspecialchars(urlencode($trans_query_yandex)) . '&amp;page=' . ($requested_page - 1) .
 '&amp;your_language=' . $_GET['your_language'] . '&amp;search_in=' . $_GET['search_in'] . '&amp;query=' .
  htmlspecialchars(urlencode($_GET['query'])) . '">' . htmlspecialchars('<<') .
  'Previous Page</a> &middot';
}
$i = $lowest_page;
while($i <= $highest_page){
	if($i == $requested_page){
		echo $i . ' &middot;';
	}
	else{
		echo '<a href="index.php?trans_query=' . htmlspecialchars(urlencode($trans_query_yandex)) . '&amp;page=' .
		 $i . '&amp;your_language=' . $_GET['your_language'] . '&amp;search_in=' . $_GET['search_in'] . 
		 '&amp;query=' . htmlspecialchars(urlencode($_GET['query'])) . '">' . $i . '</a> &middot; ';
	}
	$i++;
}
if($requested_page < $total_number_of_pages){
echo '<a href="index.php?trans_query=' . htmlspecialchars(urlencode($trans_query_yandex)) . '&amp;page=' .
	 ($requested_page + 1) . '&amp;your_language=' . $_GET['your_language'] . '&amp;search_in=' . $_GET['search_in'] . 
	 '&amp;query=' . htmlspecialchars(urlencode($_GET['query'])) . '">' . 'Next Page ' . htmlspecialchars('>>');
}

?>