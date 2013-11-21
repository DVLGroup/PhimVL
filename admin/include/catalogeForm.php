					<script src="_assets/js/jquery-1.2.6.min.js" type="text/javascript"></script>
					<script src="_assets/js/jquery.tablesorter-2.0.4.js" type="text/javascript"></script>
					<script src="_assets/js/jquery.quicksearch.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function() {

							//Setup the sorting for the table with the first column initially sorted ascending
							//and the rows striped using the zebra widget
							$("#tableOne").tablesorter({
								sortList : [[0, 0]],
								widgets : ['zebra']
							});

							//Setup the quickSearch plugin with on onAfter event that first checks to see how
							//many rows are visible in the body of the table. If there are rows still visible
							//call tableSorter functions to update the sorting and then hide the tables footer.
							//Else show the tables footer
							$("#tableOne tbody tr").quicksearch({
								labelText : 'Tìm Kiếm: ',
								attached : '#One',
								position : 'before',
								delay : 100,
								loaderText : 'Loading...',
								onAfter : function() {
									if ($("#tableOne tbody tr:visible").length != 0) {
										$("#tableOne").trigger("update");
										$("#tableOne").trigger("appendCache");
										$("#tableOne tfoot tr").hide();
									} else {
										$("#tableOne tfoot tr").show();
									}
								}
							});

						});
					</script>
					<div class="tab-pane fade" id="addCataloge">
					<h1 class="text-center text-danger">Thêm Dữ Liệu Thể Loại Film</h1>
					<div class="well">
						<form method="POST" action="addEditDelete/addCataloge.php" class="form-horizontal" id="management">
							<div class="form-group">
								<label class="control-label col-md-2">Tên Nhà Thể Loại</label>
								<div class="col-md-8">
									<input type="text" name="catalogeName" class="form-control required" minlength="3" value="" placeholder="Nhập Tên Thể Loại"  />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-8">
									<div class="btn-group">
										<a href="#tableCataloge" data-toggle="tab" class="btn btn-info text-center">Hủy</a>
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
					<div class="tab-pane active fade in" id="tableCataloge">
					<?php
					$queryCataloge = 'select * from film_cataloge order by film_cataloge_id asc';
					$resultCataloge = mysql_query($queryCataloge);
					mysql_close($link);
					?>
					<h1 class="text-danger">Bảng Dữ Liệu Thể Loại Film</h1>
					<div class="btn-group">
						<a href="#addCataloge" data-toggle="tab" class="btn btn-info">Thêm Mới</a>
					</div>
					<div class="btn-group">
						<a href="index-admin.php?changePage=5" class="btn btn-default">Làm Tươi Trang</a>
					</div>
					<hr id="One" />
					<div class="table-responsive">
						<table id="tableOne" class="table table-striped table-hover table-responsive">
							<thead>
								<tr>
									<th class="lead">STT</th>
									<th class="lead">ID Thể Loại</th>
									<th class="lead">Tên Thể Loại</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>							
								<?php 
								$i = 1;
								if($resultCataloge){
								while($row = mysql_fetch_array($resultCataloge)){
								?>
								<tr>
									<td><?php echo($i++); ?></td>
									<td><?php echo($row['0']); ?></td>
									<td><?php echo($row['1']); ?></td>
									<td><a href="addEditDelete/editOneCataloge.php?catalogeID=<?php echo($row['0']); ?>">Sửa</a>
										&nbsp;
										<a href="addEditDelete/deleteOneCataloge.php?catalogeID=<?php echo($row['0']); ?>&catalogeName=<?php echo($row['1']); ?>">Xóa</a>
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
				