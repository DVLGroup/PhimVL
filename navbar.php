
<?php
	include 'core/Connect.php';
?>

<!--@ NAVIGATION BAR -->
<nav class="navbar navbar-static-top navbar-inverse" >
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-Tools">
							<span class="sr-only">Select Option</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<p class="navbar-brand padding-50"> </p>
						
					</div>	
					
					<div class="collapse navbar-collapse navbar-Tools">
						<form action="index.php" method="GET" style="width: 500px; float: left">
						<div class="btn-group navbar-form">		
							<button type="submit" class="btn btn-danger" name="dsPhimMoi" value="1">PHIM MỚI</button>
							<button type="submit" class="btn btn-danger" name="dsPhimLe" value="1">PHIM LẺ</button>
							<button type="submit" class="btn btn-danger" name="dsPhimBo" value="1">PHIM BỘ</button>
							<div class="btn-group">
								<button type="submit" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
									THỂ LOẠI
									<span class="caret"> </span>
								</button>
								<ul class="dropdown-menu">
									<?php
										$sql = "SELECT * FROM film_cataloge";
										$rs = mysql_query( $sql, $my_connect);
										while($row = mysql_fetch_array($rs)){
											echo '<li><a href="index.php?filmCatID='.$row[0].'">'.$row[1].'</a></li>';
										}
										mysql_free_result($rs);
										
									?>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="submit" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
									QUỐC GIA 
									<span class="caret"> </span>
								</button>
								<ul class="dropdown-menu">
									<?php
										$sql = "SELECT * FROM film_country";
										$rs = mysql_query( $sql, $my_connect);
										while($row = mysql_fetch_array($rs)){
											echo '<li><a href="index.php?filmCountryID='.$row[0].'">'.$row[1].'</a></li>';
										}
										mysql_free_result($rs);
										
									?>
								</ul>
							</div>
						</div>
						</form>
						
						<form class="navbar-form pull-right" role="search" action="" method="GET" style="position: relative">
							<div class="form-group">
								<input id="search" class="form-control" type="text" placeholder="Nhập từ khóa tìm kiếm"  name="searchFilm_query" style="width: 300px"/>
							</div>
							<button type="submit" id="search-btn" class="btn btn-primary" name="searchFilm" value="1">Tìm kiếm</button>
							
							<div id="resultSearch">
								<p id="searchFilmTitle">Kết quả tìm kiếm: <b id="value-search"></b> </p>
								<ul id="results" class="list-unstyled"></ul>
							</div>
						</form>
						
					</div>
					<!--@@ END Navigation TOOLS -->
				</nav>
				
<?php mysql_close($my_connect); ?>