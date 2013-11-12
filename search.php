<?php

include 'core/Connect.php';

$isFilmBo	= FALSE;	//Check is film bộ
$filmID		= null;		//film id number
$filmParaName	= null;	//value is filmBoID or filmLeID
$film		= null;		//value is film_bo_ or film_le_ ,it's name field in table

$html = '';
$html .= '<li class="result">';
$html .= '<a  href="urlString">';
$html .= '<img src="avatar" /> ';
$html .= '<h3>nameString</h3>';

$html .= '</a>';
$html .= '</li>';

// Get Search
$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
$search_string = mysql_real_escape_string($search_string);

// Check Length More Than One Character
if (strlen($search_string) >= 1 && $search_string !== ' ') {
	// Build Query
	$query_searchFilmLe = 'SELECT * FROM film_le WHERE film_le_name LIKE "%'.$search_string.'%"';
	$query_searchFilmBo = 'SELECT * FROM film_bo WHERE film_bo_name LIKE "%'.$search_string.'%"';
	
	// Do Search
	$result_searchFilmLe = mysql_query($query_searchFilmLe);
	$result_searchFilmBo = mysql_query($query_searchFilmBo);
	
	//exit;
	while($results = mysql_fetch_array($result_searchFilmLe)) {
		$result_array[]	= "FALSE";
		$result_array[] = $results;
	}
	while($results = mysql_fetch_array($result_searchFilmBo)) {
		$result_array[]	= "TRUE";
		$result_array[] = $results;
		
	}
//exit;
	// Check If We Have Results
	if (isset($result_array)) {
		foreach ($result_array as $result) {
			echo $result;
			//Check first column We have film lẻ or film bộ 
			if($result === "TRUE"){
				$isFilmBo	= TRUE;
				$film	= "film_bo_";
				$filmParaName	= "filmBoID";
				$filmID;
			}
			else {
				$film	= "film_le_";
				$filmParaName	= "filmLeID";
				$filmID;
			}
			
			// Format Output Strings And Hightlight Matches
			//
			$display_name = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result[''.$film.'name']);
			$display_url = 'index.php?'.$filmParaName.'='.$result[''.$film.'id'].'';
			$display_avatar	= $result['film_bo_avatar'];
			
			// Insert Name
			$output = str_replace('nameString', $display_name, $html);
			
			// Insert Avatar
			$output = str_replace('avatar', $display_avatar, $output);
			
			// Insert URL
			$output = str_replace('urlString', $display_url, $output);

			// Output
			echo($output);
		}
	}else{

		// Format No Results Output
		$output = str_replace('urlString', 'javascript:void(0);', $html);
		$output = str_replace('nameString', '<b>No Results Found.</b>', $output);
		$output = str_replace('funcStr', 'Sorry :(', $output);

		// Output
		echo($output);
	}
}

?>