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
					<hr />
					<div class="table-responsive">
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
				