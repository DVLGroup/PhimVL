
					<?php
					$queryLU = 'select * from user_level order by user_level_id asc';
					$resultLU = mysql_query($queryLU);
					?>
					<div class="tab-pane fade" id="addUser">
					<h1 class="text-center text-danger">Thêm Dữ Liệu Người Dùng</h1>
					<div class="well">
						<form method="POST" action="addEditDelete/addUser.php" class="form-horizontal" id="management">
							<div class="form-group">
								<label class="control-label col-md-2">Email</label>
								<div class="col-md-8">
								<input type="text" name="email" class="form-control required email" value="" placeholder="Nhập Email"  />
								<!-- <input type="hidden" name="check" value="1" /> -->
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Mật Khẩu</label>
								<div class="col-md-8">
									<input type="password" name="password" class="form-control required" minlength="8" value="" placeholder="Nhập Mật Khẩu" />
								</div>
								<div class="col-md-offset-2"></div>

							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Nhóm Người Dùng</label>
								<div class="col-md-8">
									<!-- <input type="text" name="userLevel" class="form-control" value="" placeholder="Nhập Nhóm" /> -->
									<select name="userLevel" class="form-control">
										<?php
										while($rowLU = mysql_fetch_array($resultLU))
										{
										?>
										<option value="<?php echo($rowLU['0']); ?>" ><?php echo($rowLU['1']); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-offset-2"></div>

							</div>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-8">
									<div class="btn-group">
										<a href="#tableUser" data-toggle="tab" class="btn btn-info text-center">Hủy</a>
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
				<div class="tab-pane active fade in" id="tableUser">
					<?php
					$query = "select * from user,user_level where user.user_level_id = user_level.user_level_id and user.user_level_id != '1' order by user.user_id asc";
					$result = mysql_query($query);

					mysql_close($link);
					?>
					<h1 class="text-danger">Bảng Dữ Liệu Người Dùng</h1>
					<div class="btn-group">
						<a href="#addUser" data-transition="flow" data-toggle="tab" class="btn btn-info">Thêm Mới</a>
					</div>
					<div class="btn-group">
						<a href="index-admin.php?changePage=1" class="btn btn-default">Làm Tươi Trang</a>
					</div>
					<div class="btn-group">
						<input placeholder="Tìm Kiếm..." type="search" name="search" class="form-control" value="" id="id_search" />
					</div>
					<div class="btn-group">
						<span class="loading text-primary">Loading...</span>
					</div>
					<hr id="Eight" />
					<div id="tableEight" class="table-responsive">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th class="lead">STT</th>
									<th class="lead">ID User</th>
									<th class="lead">Email</th>
									<th class="lead">Mật Khẩu</th>
									<th class="lead">Nhóm Người Dùng</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								if($result){
								while ($row = mysql_fetch_array($result)) {

								?>
								<tr>
									<td><?php echo($i++); ?></td>
									<td><?php echo($row['0'])?></td>
									<td><?php echo($row['1']); ?></td>
									<td><?php echo($row['2']); ?></td>
									<td><?php echo($row['5']); ?></td>
									<td>
										<a href="addEditDelete/editOneUser.php?userID=<?php echo($row['0']); ?>">Sửa</a>
										&nbsp;
										<a href="addEditDelete/deleteOneUser.php?userID=<?php echo($row['0']); ?>&userEmail=<?php echo($row['1']); ?>">Xóa</a>
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
				