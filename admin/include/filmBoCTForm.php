					<script src="_assets/js/jquery-1.2.6.min.js" type="text/javascript"></script>
					<script src="_assets/js/jquery.tablesorter-2.0.4.js" type="text/javascript"></script>
					<script src="_assets/js/jquery.quicksearch.js" type="text/javascript"></script>
					<script>
						$(document).ready(function() {

							//Setup the sorting for the table with the first column initially sorted ascending
							//and the rows striped using the zebra widget
							$("#tableThree").tablesorter({
								sortList : [[0, 0]],
								widgets : ['zebra']
							});

							//Setup the quickSearch plugin with on onAfter event that first checks to see how
							//many rows are visible in the body of the table. If there are rows still visible
							//call tableSorter functions to update the sorting and then hide the tables footer.
							//Else show the tables footer
							$("#tableThree tbody tr").quicksearch({
								labelText : 'Tìm Kiếm: ',
								attached : '#Three',
								position : 'before',
								delay : 100,
								loaderText : 'Loading...',
								onAfter : function() {
									if ($("#tableThree tbody tr:visible").length != 0) {
										$("#tableThree").trigger("update");
										$("#tableThree").trigger("appendCache");
										$("#tableThree tfoot tr").hide();
									} else {
										$("#tableThree tfoot tr").show();
									}
								}
							});

						});
					</script>
					<?php
					$filmBoIDAdd = $_REQUEST['filmBoID'];
					$querySLFB = "select film_bo_id, film_bo_name from film_bo where film_bo_id = $filmBoIDAdd order by film_bo_id";
					$resultSLFB = mysql_query($querySLFB);
					?>
					<div class="tab-pane fade" id="addCTFilmBo">
					<h1 class="text-center text-danger">Thêm Dữ Liệu Chi Tiết Phim Bộ</h1>
					<div class="well">
						<form method="POST" action="addEditDelete/beginUploadBo.php" class="form-horizontal" id="management">
							<div class="form-group">
								<label class="control-label col-md-2">Tên Phim Bộ</label>
								<div class="col-md-8">
									<!-- <input type="text" name="cTFilmBoName" class="form-control required" minlength="3" value="" placeholder="Nhập Tên Phim Bộ"  /> -->
									<?php
									while($row = mysql_fetch_array($resultSLFB)){
									?>
										<input type="hidden" name="cTFilmBoID" value="<?php echo($row['0']); ?>" />
										<input type="text" class="form-control" value="<?php echo($row['1']); ?>" disabled="disabled" />
									<?php
									}
									?>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Tập</label>
								<div class="col-md-8">
									<input type="text" name="cTFilmBoTap" class="form-control digits required" value="" placeholder="Nhập Tập"  />
								</div>
							</div>
							<!-- <div class="form-group">
								<label class="control-label col-md-2">Link Phim</label>
								<div class="col-md-8">
									<input type="text" name="cTFilmBoLink" class="form-control url required" minlength="3" value="" placeholder="Nhập Link Phim"  />
								</div>
							</div> -->
							<div class="form-group">
								<div class="col-md-offset-2 col-md-8">
									<div class="btn-group">
										<a href="#tableCTFilmBo" data-toggle="tab" class="btn btn-info text-center">Hủy</a>
									</div>									
									<div class="btn-group">
										<button type="submit" class="btn btn-default">Đồng Ý</button>
									</div>
									
									<div class="btn-group">
										<button type="reset" class="btn btn-warning">Làm Tươi Form</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
					<div class="tab-pane active fade in" id="tableCTFilmBo">
					<?php 
						if(isset($_REQUEST['filmBoID']))
						{
							$querySLCT = "SELECT film_bo_ct_id,film_bo_ct_tap,film_bo_ct_link,film_bo_name FROM `film_bo_ct` A,`film_bo` B WHERE
							A.film_bo_ct_id = B.film_bo_id and `film_bo_ct_id` =".$_REQUEST['filmBoID']."";
							$resultSLCT = mysql_query($querySLCT);
							mysql_close($link);
						
						
					?>
					<h1 class="text-danger">Bảng Dữ Liệu Chi Tiết Phim Bộ</h1>
					<div class="btn-group">
						<a href="#addCTFilmBo" data-toggle="tab" class="btn btn-info">Upload Phim Bộ</a>
					</div>
					<div class="btn-group">
						<a href="index-admin.php?changePage=7" class="btn btn-default">Trở Về Bảng Phim Bộ</a>
					</div>
					<hr id="Three" />
					<div class="table-responsive">
						<table id="tableThree" class="table table-striped table-hover table-responsive">
							<thead>
								<tr>
									<th class="lead">STT</th>
									<th class="lead">ID Phim</th>
									<th class="lead">Tên Phim</th>
									<th class="lead">Tập</th>
									<th class="lead">Link Phim</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>							
								<?php 
								$i = 1;
								if($resultSLCT){
								while($row1 = mysql_fetch_array($resultSLCT)){
								?>
								<tr>
									<td><?php echo($i++); ?></td>
									<td><?php echo($row1['0']); ?></td>
									<td><?php echo($row1['3']); ?></td>
									<td><?php echo($row1['1']); ?></td>
									<td><?php echo($row1['2']); ?></td>
									<td><a href="addEditDelete/editOneFilmBoCT.php?cTFilmBoID=<?php echo($row1['0']); ?>&cTFilmBoTap=<?php echo($row1['1']); ?>&cTFilmBoName=<?php echo($row1['3']); ?>">Sửa</a>
										&nbsp;
										<a href="addEditDelete/deleteOneFilmBoCT.php?cTFilmBoID=<?php echo($row1['0']); ?>&cTFilmBoTap=<?php echo($row1['1']); ?>&cTFilmBoName=<?php echo($row1['3']); ?>&cTFilmBoLink=<?php echo($row1['2']); ?>">Xóa</a>
									</td>
									
								</tr>
								<?php
								}
								}
							}
							else {
								echo '<h3 class="text-center">Nhập URL Tầm Bậy!</h3>';
							}
								?>
							</tbody>
						</table>
					</div>
					<hr />
				</div>
				