
					<script>
						function _(el) {
							return document.getElementById(el);
						}

						function changeImageCover() {

							var cover = _("cover").files[0];
							// var avatar = _("avatar").files[0];
							if (cover.type != "image/jpeg" && cover.type != "image/png") {
								alert("Không Phải Định Dạng Hình Ảnh Cho Phép (PNG, JPG và JPEG)!");
								_("cover").value = null;
							}
						}

						function changeImageAvatar() {

							// var cover = _("cover").files[0];
							var avatar = _("avatar").files[0];
							if (avatar.type != "image/jpeg" && avatar.type != "image/png") {
								alert("Không Phải Định Dạng Hình Ảnh Cho Phép (PNG, JPG và JPEG)!");
								_("avatar").value = null;
							}
						}
					</script>
					<?php
					$querySLC = "select * from film_cataloge order by film_cataloge_id asc";
					$resultSLC = mysql_query($querySLC);
					$querySLCon = "select * from film_country order by film_country_id asc";
					$resultSLCon = mysql_query($querySLCon);
					$querySLNSX = "select * from film_nhasx order by film_nhasx_id asc";
					$resultSLNSX = mysql_query($querySLNSX);
					?>
					<div class="tab-pane fade" id="addFilmBo">
					<h1 class="text-center text-danger">Thêm Dữ Liệu Phim Bộ</h1>
					<div class="well">
						<form method="POST" action="addEditDelete/addFilmBo.php" class="form-horizontal" id="management" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label col-md-2">Tên Phim Bộ</label>
								<div class="col-md-8">
								<input type="text" name="tenFilmBo" class="form-control required" value="" placeholder="Nhập Tên Tiếng Anh"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Tên Phim(Tiếng Việt)</label>
								<div class="col-md-8">
								<input type="text" name="tenFilmBoVi" class="form-control required" value="" placeholder="Nhập Tên Tiếng Việt"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
								<input type="hidden" name="soTap" class="form-control digits required" value="0"  />
							<div class="form-group">
								<label class="control-label col-md-2">Năm Sản Xuất</label>
								<div class="col-md-8">
								<select name="namSX" class="form-control">
									<?php
									for ($i=1800; $i <= date('Y'); $i++) { 
										if($i==date('Y')){
											?>
											<option selected="" value="<?php echo($i); ?>"><?php echo($i); ?></option>
											<?php
											}
											else {
											?>
											<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
											<?php
											}
											} ?>
								</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Thể Loại 1</label>
								<div class="col-md-8">
									<select name="theLoai1" class="form-control">
										<?php
										while($rowC = mysql_fetch_array($resultSLC))
										{
										?>
										<option value="<?php echo($rowC['0']); ?>" ><?php echo($rowC['1']); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Thể Loại 2</label>
								<div class="col-md-8">
									<select name="theLoai2" class="form-control">
										<?php
										mysql_data_seek($resultSLC, 0);
										while($rowC = mysql_fetch_array($resultSLC))
										{
										?>
										<option value="<?php echo($rowC['0']); ?>" ><?php echo($rowC['1']); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>						
							<div class="form-group">
								<label class="control-label col-md-2">Thể Loại 3</label>
								<div class="col-md-8">
									<select name="theLoai3" class="form-control">
										<?php
										mysql_data_seek($resultSLC, 0);
										while($rowC = mysql_fetch_array($resultSLC))
										{
										?>
										<option value="<?php echo($rowC['0']); ?>" ><?php echo($rowC['1']); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Nước Sản Xuất</label>
								<div class="col-md-8">
									<select name="nuocSX" class="form-control">
										<?php
										
										while($rowCon = mysql_fetch_array($resultSLCon))
										{
										?>
										<option value="<?php echo($rowCon['0']); ?>" ><?php echo($rowCon['1']); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Nhà Sản Xuất</label>
								<div class="col-md-8">
									<select name="nhaSX" class="form-control">
										<?php
										
										while($rowNSX = mysql_fetch_array($resultSLNSX))
										{
										?>
										<option value="<?php echo($rowNSX['0']); ?>" ><?php echo($rowNSX['1']); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Nội Dung</label>
								<div class="col-md-8">
									<textarea name="noiDung" id="editor" class="required"></textarea>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Hình Avatar</label>
								<div class="col-md-8">
								<input type="file" accept="jpeg|png|jpg" onchange="changeImageAvatar()" id="avatar" name="avatar" class="form-control required" value=""  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Hình Cover</label>
								<div class="col-md-8">
								<input type="file" accept="jpeg|png|jpg" onchange="changeImageCover()" id="cover" name="cover" class="form-control required" value=""   />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Tên Đạo Diễn</label>
								<div class="col-md-8">
								<input type="text" name="tenDaoDien" class="form-control required" minlength="3" value="" placeholder="Nhập Tên Đạo Diễn"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Tên Diễn Viên</label>
								<div class="col-md-8">
								<input type="text" name="tenDienVien" class="form-control required" minlength="3" value="" placeholder="Nhập Tên Các Diễn Viên"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							
							<div class="form-group">
								<div class="col-md-offset-2 col-md-8">
									<div class="btn-group">
										<a href="#tableFilmBo" data-toggle="tab" class="btn btn-info text-center">Hủy</a>
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
				<div class="tab-pane active fade in" id="tableFilmBo">
					<?php
					$query = "SELECT `film_bo_id`,`film_bo_name`,`film_bo_name_vi`,`film_bo_sotap`,`film_bo_namsx`,
					B.film_cataloge_name,C.film_cataloge_name,D.film_cataloge_name,E.film_country_name,F.film_nhasx_name,
					`film_bo_avatar`,`film_bo_cover`,`film_bo_daodien`,`film_bo_dienvien`,`film_bo_postdate`,`film_bo_viewed`,
					`film_bo_rate` FROM film_bo A,film_cataloge B,film_cataloge C,film_cataloge D,film_country E,film_nhasx F 
					WHERE A.film_bo_cataloge_id_first = B.film_cataloge_id and A.film_bo_cataloge_id_second = C.film_cataloge_id and
					 A.film_bo_cataloge_id_third = D.film_cataloge_id and A.film_bo_country_id = E.film_country_id and
					  A.film_bo_nhasx_id = F.film_nhasx_id";
					$result = mysql_query($query);

					mysql_close($link);
					?>
					<h1 class="text-danger">Bảng Dữ Liệu Phim Bộ</h1>
					<div class="btn-group">
						<a href="#addFilmBo" data-transition="flow" data-toggle="tab" class="btn btn-info">Thêm Mới</a>
					</div>
					<div class="btn-group">
						<a href="index-admin.php?changePage=7" class="btn btn-default">Làm Tươi Trang</a>
					</div>
					<div class="btn-group">
						<input placeholder="Tìm Kiếm..." type="search" name="search" class="form-control" value="" id="id_search" />
					</div>
					<div class="btn-group">
						<span class="loading text-primary">Loading...</span>
					</div>
					<hr id="Four" />
					<div id="tableFour" class="table-responsive table-scrollable">
						<table class="table table-striped table-hover">
							<thead style="white-space: nowrap;">
								<tr>
									<th class="lead">STT</th>
									<th class="lead">ID Phim</th>
									<th class="lead">Tên Phim</th>
									<th class="lead">Tên Tiếng Việt</th>
									<th class="lead">Số Tập</th>
									<th class="lead">Năm SX</th>
									<th class="lead">Thể Loại</th>
									<!-- <th class="lead">Nước</th>
									<th class="lead">Nhà SX</th>
									<th class="lead">Ảnh Avatar</th>
									<th class="lead">Ảnh Cover</th>
									<th class="lead">Đạo Diễn</th>
									<th class="lead">Diễn Viên</th>
									<th class="lead">Ngày Đăng</th>
									<th class="lead">Lượt View</th>
									<th class="lead">Rating</th> -->
									<th>&nbsp;</th>
								</tr>
								
							</thead>
							<tbody style="white-space: nowrap;">
								<?php
								$i = 1;
								if($result){
								while ($row = mysql_fetch_array($result)) {

								?>
								<tr>
									<!-- <script>$('[data-toggle="tooltip"]').tooltip({'placement': 'top'});</script> -->
									<td><?php echo($i++); ?></td>
									<td><?php echo($row['0'])?></td>
									<td><?php echo($row['1']); ?></td>
									<td><?php echo($row['2']); ?></td>
									<td>
										
										<a data-toggle="tooltip"  title="Chi Tiết Phim" href="index-admin.php?changePage=9&filmBoID=<?php echo($row['0']); ?>"><?php echo($row['3']); ?></a>
									</td>
									<td><?php echo($row['4']); ?></td>
									<td><?php echo($row['5'] . " | " . $row['6'] . " | " . $row['7']); ?></td>
									<td style="display: none;"><?php echo($row['8']); ?></td>
									<td style="display: none;"><?php echo($row['9']); ?></td>
									<td style="display: none;"><?php echo($row['10']); ?></td>
									<td style="display: none;"><?php echo($row['11']); ?></td>
									<td style="display: none;"><?php echo($row['12']); ?></td>
									<td style="display: none;"><?php echo($row['13']); ?></td>
									<td style="display: none;"><?php echo($row['14']); ?></td>
									<td style="display: none;"><?php echo($row['15']); ?></td>
									<td style="display: none;"><?php echo($row['16']); ?></td>
									<td>
										<a data-toggle="modal" role="button" href="<?php echo("#detail".$i); ?>" data-target="<?php echo("#detail".$i); ?>" data-remote="false"> Chi Tiết </a>
										&nbsp;&nbsp;
										<a href="addEditDelete/editOneFilmBo.php?filmBoID=<?php echo($row['0']); ?>">Sửa</a>
										&nbsp;&nbsp;
										<a href="addEditDelete/deleteOneFilmBo.php?filmBoID=<?php echo($row['0']); ?>&filmBoName=<?php echo($row['1']); ?>&cover=<?php echo($row['11']); ?>&avatar=<?php echo($row['10']); ?>">Xóa</a>
									</td>
								</tr>
								<div class="modal fade" id="<?php echo("detail".$i); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  									<div class="modal-dialog">
    									<div class="modal-content">
      										<div class="modal-header">
        										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        										<h4 class="modal-title text-primary" id="myModalLabel"><strong>Thông Tin Chi Tiết Phim</strong></h4>
      										</div>
      										<div class="modal-body">
      											<div class="row">
      												<label class="col-md-3">ID Phim:</label>
      												<div class="col-md-9"><?php echo($row['0']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Tên Phim:</label>
      												<div class="col-md-9"><?php echo($row['1']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Tên Tiếng Việt:</label>
      												<div class="col-md-9"><?php echo($row['2']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Số Tập:</label>
      												<div class="col-md-9"><?php echo($row['3']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Năm Sản Xuất:</label>
      												<div class="col-md-9"><?php echo($row['4']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Thể Loại:</label>
      												<div class="col-md-9"><?php echo($row['5'].", "); ?><?php echo($row['6'].", "); ?><?php echo($row['7']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Nước:</label>
      												<div class="col-md-9"><?php echo($row['8']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Nhà Sản Xuất:</label>
      												<div class="col-md-9"><?php echo($row['9']); ?></div>
      											</div>
      											<hr />
      											<div class="row">
      												<label class="col-md-3">Ảnh Avatar:</label>
      												<div class="col-md-9"><img width="60" height="90" src="<?php echo($row['10']); ?>"/></div>
      											</div>
      											<hr />
      											<div class="row">
      												<label class="col-md-3">Ảnh Cover:</label>
      												<div class="col-md-9"><img width="100" height="60" src="<?php echo($row['11']); ?>" /></div>
      											</div>
      											<hr />
      											<div class="row">
      												<label class="col-md-3">Đạo Diễn:</label>
      												<div class="col-md-9"><?php echo($row['12']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Diễn Viên:</label>
      												<div class="col-md-9"><?php echo($row['13']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Ngày Đăng:</label>
      												<div class="col-md-9"><?php echo($row['14']." (<strong>yyyy/MM/dd</strong>)"); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Lượt View:</label>
      												<div class="col-md-9"><?php echo($row['15']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Rating:</label>
      												<div class="col-md-9"><?php echo($row['16']); ?></div>
      											</div>
      											
     										</div>
      										<div class="modal-footer">
        										<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button> -->
      										</div>
    									</div>
  									</div>
								</div>
								<?php
								}
								}
								?>
							</tbody>
						</table>
					</div>
					<hr />
				</div>
				