					<script src="_assets/js/jquery-1.2.6.min.js" type="text/javascript"></script>
					<script src="_assets/js/jquery.tablesorter-2.0.4.js" type="text/javascript"></script>
					<script src="_assets/js/jquery.quicksearch.js" type="text/javascript"></script>
					<script>
						$(document).ready(function() {

							//Setup the sorting for the table with the first column initially sorted ascending
							//and the rows striped using the zebra widget
							$("#tableTwo").tablesorter({
								sortList : [[0, 0]],
								widgets : ['zebra']
							});

							//Setup the quickSearch plugin with on onAfter event that first checks to see how
							//many rows are visible in the body of the table. If there are rows still visible
							//call tableSorter functions to update the sorting and then hide the tables footer.
							//Else show the tables footer
							$("#tableTwo tbody tr").quicksearch({
								labelText : 'Tìm Kiếm: ',
								attached : '#Two',
								position : 'before',
								delay : 100,
								loaderText : 'Loading...',
								onAfter : function() {
									if ($("#tableTwo tbody tr:visible").length != 0) {
										$("#tableTwo").trigger("update");
										$("#tableTwo").trigger("appendCache");
										$("#tableTwo tfoot tr").hide();
									} else {
										$("#tableTwo tfoot tr").show();
									}
								}
							});

						});
					</script>
					<div class="tab-pane fade" id="addCountry">
					<h1 class="text-center text-danger">Thêm Dữ Liệu Nước</h1>
					<div class="well">
						<form method="POST" action="addEditDelete/addCountry.php" class="form-horizontal" id="management">
							<div class="form-group">
								<label class="control-label col-md-2">Tên Nước</label>
								<div class="col-md-8">
								<input type="text" name="countryName" class="form-control required" value="" placeholder="Nhập Tên Nước"  />
								<!-- <input type="hidden" name="check" value="1" /> -->
								</div>
								<div class="col-md-offset-2"></div>

							</div>
							
							<div class="form-group">
								<div class="col-md-offset-2 col-md-8">
									<div class="btn-group">
										<a href="#tableCountry" data-toggle="tab" class="btn btn-info text-center">Hủy</a>
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
				<div class="tab-pane active fade in" id="tableCountry">
					<?php
					$queryCountry = 'select * from film_country order by film_country_id asc';
					$resultCountry = mysql_query($queryCountry);

					mysql_close($link);
					?>
					<h1 class="text-danger">Bảng Dữ Liệu Nước</h1>
					<div class="btn-group">
						<a href="#addCountry" data-transition="flow" data-toggle="tab" class="btn btn-info">Thêm Mới</a>
					</div>
					<div class="btn-group">
						<a href="index-admin.php?changePage=3" class="btn btn-default">Làm Tươi Trang</a>
					</div>
					<hr id="Two" />
					<div class="table-responsive">
						<table id="tableTwo" class="table table-striped table-hover">
							<thead>
								<tr>
									<th class="lead">STT</th>
									<th class="lead">ID Nước</th>
									<th class="lead">Tên Nước</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								if($resultCountry){
								while ($row = mysql_fetch_array($resultCountry)) {

								?>
								<tr>
									<td><?php echo($i++); ?></td>
									<td><?php echo($row['0'])?></td>
									<td><?php echo($row['1']); ?></td>
									<td>
										<a href="addEditDelete/editOneCountry.php?countryID=<?php echo($row['0']); ?>">Sửa</a>
										&nbsp;
										<a href="addEditDelete/deleteOneCountry.php?countryID=<?php echo($row['0']); ?>&countryName=<?php echo($row['1']); ?>">Xóa</a>
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
				