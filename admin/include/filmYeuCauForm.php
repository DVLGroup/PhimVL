				<div class="tab-pane active fade in" id="">
					<?php
					$query = "select film_yeucau_id,user.user_email,film_yeucau_name,film_yeucau_name_vi,film_yeucau_namsx,film_yeucau_postdate 
					from user,film_yeucau where user.user_id = film_yeucau.film_yeucau_user_id order by user.user_id asc";
					$result = mysql_query($query);

					mysql_close($link);
					?>
					<h1 class="text-danger">Bảng Dữ Liệu Film Yêu Cầu</h1>
					<div class="btn-group">
						<a href="index-admin.php?changePage=6" class="btn btn-default">Làm Tươi Trang</a>
					</div>
					<hr />
					<div class="table-responsive table-scrollable">
						<table class="table table-striped table-hover">
							<thead style="white-space: nowrap;">
								<tr>
									<th class="lead">STT</th>
									<th class="lead">ID Yêu Cầu</th>
									<th class="lead">Email Người Yêu Cầu</th>
									<th class="lead">Tên Film</th>
									<th class="lead">Tên Film(Tiếng Việt)</th>
									<th class="lead">Năm SX</th>
									<th class="lead">Ngày Gửi</th>
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
									<td><?php echo($row['3']); ?></td>
									<td><?php echo($row['4']); ?></td>
									<td><?php echo($row['5']); ?></td>
									<td>
										<a href="addEditDelete/deleteOneYeuCau.php?filmYeuCauID=<?php echo($row['0']); ?>&filmYeuCauName=<?php echo($row['3']); ?>">Xóa</a>
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
				