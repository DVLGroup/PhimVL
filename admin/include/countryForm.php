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
					<hr />
					<div class="table-responsive">
						<table class="table table-striped table-hover">
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
				