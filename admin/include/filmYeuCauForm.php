				<script src="_assets/js/jquery-1.2.6.min.js" type="text/javascript"></script>
					<script src="_assets/js/jquery.tablesorter-2.0.4.js" type="text/javascript"></script>
					<script src="_assets/js/jquery.quicksearch.js" type="text/javascript"></script>
					<script>
						$(document).ready(function() {

							//Setup the sorting for the table with the first column initially sorted ascending
							//and the rows striped using the zebra widget
							$("#tableSix").tablesorter({
								sortList : [[0, 0]],
								widgets : ['zebra']
							});

							//Setup the quickSearch plugin with on onAfter event that first checks to see how
							//many rows are visible in the body of the table. If there are rows still visible
							//call tableSorter functions to update the sorting and then hide the tables footer.
							//Else show the tables footer
							$("#tableSix tbody tr").quicksearch({
								labelText : 'Tìm Kiếm: ',
								attached : '#Six',
								position : 'before',
								delay : 100,
								loaderText : 'Loading...',
								onAfter : function() {
									if ($("#tableSix tbody tr:visible").length != 0) {
										$("#tableSix").trigger("update");
										$("#tableSix").trigger("appendCache");
										$("#tableSix tfoot tr").hide();
									} else {
										$("#tableSix tfoot tr").show();
									}
								}
							});

						});
					</script>
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
					<hr id="Six" />
					<div id="tableSix" class="table-responsive table-scrollable">
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
				