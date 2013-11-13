<link rel="stylesheet" href="css/bootstrapv3.css" type="text/css"  media="print,screen" />
<?php
    
    include 'core/Connect.php';
    
	function full_url()
	{
		
		$s			= empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
		$protocol 	= substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")) . $s;
		$port 		= ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
		return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
	}
    echo full_url();
	echo $_SERVER['PHP_SELF'];
?>



<?php
	
	$self		= $_SERVER['PHP_SELF'];	// This is current url
	
	$page 		= 1;
	$perPage	= 1;	// Elements on per page
	
	$start		= 0;		//Oder number of first element on this page
	
	$totalPage	= 0;
	
	
	
	if(isset($_REQUEST['page'])){
		$page = $_REQUEST['page'];
	}
	
	if($page > 1){
		$start	= ($page - 1) * $perPage;
	}
	
	$query 	= "SELECT * FROM film_bo LIMIT $start, $perPage";
	$rs		= mysql_query($query);
	while($rw = mysql_fetch_array($rs)){
		echo '<br>';
		echo "Film ID: " .$rw[0];
	}
	
	
	$sql_totalPage = "SELECT COUNT(*) FROM film_bo";
	$rs = mysql_query($sql_totalPage);
	$rw = mysql_fetch_array($rs);
	$totalPage = $rw[0];
	
?>

<ul class="pagination">
			

<?php
	if($page == 1){
		echo '<li class="disabled"><a href="#">&laquo;</a></li>';
	}
	else {
		echo '<li><a href="'.$self.'?page='.($page - 1).'">&laquo;</a></li>';
	}
	
	for($i = 1; $i <= $totalPage; $i++){
		if($i == $page){
			echo '<li class="active"><a href="'.$self.'?page='.$i.'">'.$i.'</a></li>';
		}
		else {
			echo '<li><a href="'.$self.'?page='.$i.'">'.$i.'</a></li>';
		}
	}
	
	if($page == $totalPage){
		echo '<li class="disabled"><a href="#">&raquo;</a></li>';
	}
	else {
		echo '<li><a href="'.$self.'?page='.($page + 1).'">&raquo;</a></li>';
	}
?>

</ul>