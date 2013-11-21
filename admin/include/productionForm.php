					<script src="_assets/js/jquery-1.2.6.min.js" type="text/javascript"></script>
					<script src="_assets/js/jquery.tablesorter-2.0.4.js" type="text/javascript"></script>
					<script src="_assets/js/jquery.quicksearch.js" type="text/javascript"></script>
					<script>
						$(document).ready(function() {

							//Setup the sorting for the table with the first column initially sorted ascending
							//and the rows striped using the zebra widget
							$("#tableSeven").tablesorter({
								sortList : [[0, 0]],
								widgets : ['zebra']
							});

							//Setup the quickSearch plugin with on onAfter event that first checks to see how
							//many rows are visible in the body of the table. If there are rows still visible
							//call tableSorter functions to update the sorting and then hide the tables footer.
							//Else show the tables footer
							$("#tableSeven tbody tr").quicksearch({
								labelText : 'Tìm Kiếm: ',
								attached : '#Seven',
								position : 'before',
								delay : 100,
								loaderText : 'Loading...',
								onAfter : function() {
									if ($("#tableSeven tbody tr:visible").length != 0) {
										$("#tableSeven").trigger("update");
										$("#tableSeven").trigger("appendCache");
										$("#tableSeven tfoot tr").hide();
									} else {
										$("#tableSeven tfoot tr").show();
									}
								}
							});

						});
					</script>
					<link href="../css/style.css" />
					<div class="tab-pane fade" id="addProduction">
					<h1 class="text-center text-danger">Thêm Dữ Liệu Nhà Sản Xuất</h1>
					<div class="well">
						<form method="POST" action="addEditDelete/addProduction.php" class="form-horizontal" id="management">
							<div class="form-group">
								<label class="control-label col-md-2">Tên Nhà Sản Xuất</label>
								<div class="col-md-8">
									<input type="text" name="productionName" class="form-control required" minlength="3" value="" placeholder="Nhập Tên Nhà Sản Xuất"  />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-8">
									<div class="btn-group">
										<a href="#tableProduction" data-toggle="tab" class="btn btn-info text-center">Hủy</a>
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
					<div class="tab-pane active fade in" id="tableProduction">
					<?php
						$queryProduction = 'select * from film_nhasx order by film_nhasx_id asc';
						$resultProduction = mysql_query($queryProduction);
						mysql_close($link);
					?>
					<h1 class="text-danger">Bảng Dữ Liệu Nhà Sản Xuất</h1>
					<div class="btn-group">
						<a href="#addProduction" data-toggle="tab" class="btn btn-info">Thêm Mới</a>
					</div>
					<div class="btn-group">
						<a href="index-admin.php?changePage=4" class="btn btn-default">Làm Tươi Trang</a>
					</div>
					<hr id="Seven" />
					<div id="tableSeven" class="table-responsive">
						<table class="table table-striped table-hover table-responsive">
							<thead>
								<tr>
									<th class="lead">STT</th>
									<th class="lead">ID Nhà Sản Xuất</th>
									<th class="lead">Tên Nhà Sản Xuất</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>							
								<?php 
								$i = 1;
								if($resultProduction){
								while($row = mysql_fetch_array($resultProduction)){
								?>
								<tr>
									<td><?php echo($i++); ?></td>
									<td><?php echo($row['0']); ?></td>
									<td><?php echo($row['1']); ?></td>
									<td><a href="addEditDelete/editOneProduction.php?productionID=<?php echo($row['0']); ?>">Sửa</a>
										&nbsp;
										<a href="addEditDelete/deleteOneProduction.php?productionID=<?php echo($row['0']); ?>&productionName=<?php echo($row['1']); ?>">Xóa</a>
									</td>
								</tr>
								<?php
								}
								}
								?>
							</tbody>
						</table>
					</div>
					<hr />
				</div>
				