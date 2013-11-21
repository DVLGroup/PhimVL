					<script src="_assets/js/jquery-1.2.6.min.js" type="text/javascript"></script>
					<script src="_assets/js/jquery.tablesorter-2.0.4.js" type="text/javascript"></script>
					<script src="_assets/js/jquery.quicksearch.js" type="text/javascript"></script>
					<script>
						$(document).ready(function() {

							//Setup the sorting for the table with the first column initially sorted ascending
							//and the rows striped using the zebra widget
							$("#tableNine").tablesorter({
								sortList : [[0, 0]],
								widgets : ['zebra']
							});

							//Setup the quickSearch plugin with on onAfter event that first checks to see how
							//many rows are visible in the body of the table. If there are rows still visible
							//call tableSorter functions to update the sorting and then hide the tables footer.
							//Else show the tables footer
							$("#tableNine tbody tr").quicksearch({
								labelText : 'Tìm Kiếm: ',
								attached : '#Nine',
								position : 'before',
								delay : 100,
								loaderText : 'Loading...',
								onAfter : function() {
									if ($("#tableNine tbody tr:visible").length != 0) {
										$("#tableNine").trigger("update");
										$("#tableNine").trigger("appendCache");
										$("#tableNine tfoot tr").hide();
									} else {
										$("#tableNine tfoot tr").show();
									}
								}
							});

						});
					</script>
					<div class="tab-pane fade" id="addUserLevel">
					<h1 class="text-center text-danger">Thêm Dữ Liệu Nhóm Người Dùng</h1>
					<div class="well">
						<form method="POST" action="addEditDelete/addUserLevel.php" class="form-horizontal" id="management">
							<div class="form-group">
								<label class="control-label col-md-2">Tên Nhóm</label>
								<div class="col-md-8">
									<input type="text" name="userLevelName" class="form-control required" minlength="3" value="" placeholder="Nhập Tên Nhóm"  />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-8">
									<div class="btn-group">
										<a href="#tableUserLevel" data-toggle="tab" class="btn btn-info text-center">Hủy</a>
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
					<div class="tab-pane active fade in" id="tableUserLevel">
					<?php 
						$querySLUA = "SELECT distinct user.user_level_id,user_level_name FROM user_level,user 
						WHERE user.user_level_id = user_level.user_level_id order by user_level_id asc";
						$resultSLUA = mysql_query($querySLUA);
						$querySLUNA = "SELECT * FROM user_level where user_level_id NOT IN(
									   SELECT distinct user.user_level_id FROM user_level,user 
									   WHERE user.user_level_id = user_level.user_level_id) order by user_level_id asc";
						$resultSLUNA = mysql_query($querySLUNA);
						mysql_close($link);
					?>
					<h1 class="text-danger">Bảng Dữ Liệu Nhóm User</h1>
					<div class="btn-group">
						<a href="#addUserLevel" data-toggle="tab" class="btn btn-info">Thêm Mới</a>
					</div>
					<div class="btn-group">
						<a href="index-admin.php?changePage=2" class="btn btn-default">Làm Tươi Trang</a>
					</div>
					<hr id="Nine" />
					<div class="table-responsive">
						<table id="tableNine" class="table table-striped table-hover table-responsive">
							<thead>
								<tr>
									<th class="lead">STT</th>
									<th class="lead">ID Nhóm User</th>
									<th class="lead">Tên Nhóm User</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>							
								<?php 
								$i = 1;
								if($resultSLUA&&$resultSLUNA){
								while($row1 = mysql_fetch_array($resultSLUA)){
								?>
								<tr>
									<td><?php echo($i++); ?></td>
									<td><?php echo($row1['0']); ?></td>
									<td><?php echo($row1['1']); ?></td>
									<td><a href="addEditDelete/editOneUserLevel.php?userLvlId=<?php echo($row1['0']); ?>">Sửa</a></td>
								</tr>
								<?php
								}
								?>
								<?php 
								while($row2 = mysql_fetch_array($resultSLUNA)){
								?>
								<tr>
									<td><?php echo($i++); ?></td>
									<td><?php echo($row2['0']); ?></td>
									<td><?php echo($row2['1']); ?></td>
									<td>
										<a href="addEditDelete/editOneUserLevel.php?userLvlId=<?php echo($row2['0']); ?>">Sửa</a>
										&nbsp;
										<a href="addEditDelete/deleteOneUserLevel.php?userLvlId=<?php echo($row2['0']); ?>&userLvlName=<?php echo($row2['1']); ?>">Xóa</a>
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
				