<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<script>
			var fileName;
			function _(el) {
				return document.getElementById(el);
			}
			function changeImageCover() {
				
				var cover = _("coverNew").files[0];
				// var avatar = _("avatar").files[0];
				if (cover.type != "image/jpeg" && cover.type != "image/png") {
					alert("Không Phải Định Dạng Hình Ảnh Cho Phép (PNG, JPG và JPEG)!");
					_("coverNew").value = null;
				}
				else
				{
					_("cover").value = cover.name;
				}
			}
			function changeImageAvatar() {
				
				// var cover = _("cover").files[0];
				var avatar = _("avatarNew").files[0];
				if (avatar.type != "image/jpeg" && avatar.type != "image/png") {
					alert("Không Phải Định Dạng Hình Ảnh Cho Phép (PNG, JPG và JPEG)!");
					_("avatarNew").value = null;
				}
				else
				{
					_("avatar").value = avatar.name;
				}
			}
		</script>
		<?php
		if (!isset($_REQUEST['filmLeID'])) {
			header('Location: ../index-admin.php');
		}
		?>
		<?php
		require '../include/headPage.php';

		$filmLeName;
		$filmLeNameVi;
		$linkFilm;
		$namSX;
		$theLoai1;
		$theLoai2;
		$theLoai3;
		$nuocSX;
		$nhaSX;
		$noiDung;
		$avatar;
		$cover;
		$tenDaoDien;
		$tenDienVien;

		$filmLeID = $_REQUEST['filmLeID'];
		require '../connect_db.php';
		$querySFL = "SELECT `film_le_name`,`film_le_name_vi`,`film_le_link`,`film_le_namsx`,B.film_cataloge_name,C.film_cataloge_name,
		D.film_cataloge_name,E.film_country_name,F.film_nhasx_name,`film_le_content`,`film_le_avatar`,`film_le_cover`,`film_le_daodien`,`film_le_dienvien` 
		FROM film_le A,film_cataloge B,film_cataloge C,film_cataloge D,film_country E,
		film_nhasx F WHERE A.film_le_cataloge_id_first = B.film_cataloge_id and A.film_le_cataloge_id_second = C.film_cataloge_id and 
		A.film_le_cataloge_id_third = D.film_cataloge_id and A.film_le_country_id = E.film_country_id and
		 A.film_le_nhasx_id = F.film_nhasx_id and `film_le_id` = $filmLeID";
		$resultSFL = mysql_query($querySFL);

		$querySLC = "select * from film_cataloge order by film_cataloge_id asc";
		$resultSLC = mysql_query($querySLC);
		$querySLCon = "select * from film_country order by film_country_id asc";
		$resultSLCon = mysql_query($querySLCon);
		$querySLNSX = "select * from film_nhasx order by film_nhasx_id asc";
		$resultSLNSX = mysql_query($querySLNSX);

		while ($row = mysql_fetch_array($resultSFL)) {
			$filmLeName = $row['0'];
			$filmLeNameVi = $row['1'];
			$linkFilm = $row['2'];
			$namSX = $row['3'];
			$theLoai1 = $row['4'];
			$theLoai2 = $row['5'];
			$theLoai3 = $row['6'];
			$nuocSX = $row['7'];
			$nhaSX = $row['8'];
			$noiDung = $row['9'];
			$avatar = $row['10'];
			$cover = $row['11'];
			$tenDaoDien = $row['12'];
			$tenDienVien = $row['13'];
		}
		mysql_close($link);
		// echo($emailEdit . $passwordEdit.$userLevelEdit);
	?>
	</head>
	<body>
		<div class="container">
			<div class="well">
				<form method="POST" action="../addEditDelete/editFilmLe.php" class="form-horizontal" id="management" enctype="multipart/form-data">
					<input type="hidden" name="filmLeTranID" value="<?php echo($filmLeID); ?>" />
					<div class="form-group">
						<label class="control-label col-md-2">Tên Phim</label>
						<div class="col-md-8">
							<input type="text" name="filmLeTranName" class="form-control required" minlength="3" value="<?php echo($filmLeName); ?>" placeholder="Nhập Tên Thể Loại"  />
						</div>
						<div class="col-md-offset-2"></div>
					</div>	
					<div class="form-group">
								<label class="control-label col-md-2">Tên Phim(Tiếng Việt)</label>
								<div class="col-md-8">
								<input type="text" name="tenFilmLeVi" class="form-control required" value="<?php echo($filmLeNameVi); ?>" placeholder="Nhập Tên Tiếng Việt"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Link Phim</label>
								<div class="col-md-8">
								
								<input readonly="readonly" type="text" name="linkPhim" type="text" class="form-control required" value="<?php echo($linkFilm); ?>" placeholder="Nhập Link Phim" />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Năm Sản Xuất</label>
								<div class="col-md-8">
								<select name="namSX" class="form-control">
									<?php
									for ($i=1800; $i <= date('Y'); $i++) { 
										if($i==$namSX){
											?>
											<option selected="selected" value="<?php echo($i); ?>"><?php echo($i); ?></option>
											<?php
										}
										else{
											?>
											<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
											<?php
										}
									}
									?>
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
											if($rowC['1'] == $theLoai1){
												?>
												<option selected="selected" value="<?php echo($rowC['0']); ?>" ><?php echo($rowC['1']); ?></option>
												<?php
											}
											else {
												?>
												<option value="<?php echo($rowC['0']); ?>" ><?php echo($rowC['1']); ?></option>
												<?php
											}
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
											if($rowC['1'] == $theLoai2){
												?>
												<option selected="selected" value="<?php echo($rowC['0']); ?>" ><?php echo($rowC['1']); ?></option>
												<?php
											}
											else {
												?>
												<option value="<?php echo($rowC['0']); ?>" ><?php echo($rowC['1']); ?></option>
												<?php
											}
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
											if($rowC['1'] == $theLoai3){
												?>
												<option selected="selected" value="<?php echo($rowC['0']); ?>" ><?php echo($rowC['1']); ?></option>
												<?php
											}
											else {
												?>
												<option value="<?php echo($rowC['0']); ?>" ><?php echo($rowC['1']); ?></option>
												<?php	
											}
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
											if($rowCon['1'] == $nuocSX){
												?>
												<option selected="selected" value="<?php echo($rowCon['0']); ?>" ><?php echo($rowCon['1']); ?></option>
												<?php
											}
											else{
												?>
												<option value="<?php echo($rowCon['0']); ?>" ><?php echo($rowCon['1']); ?></option>
												<?php
											}
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
											if($rowNSX['1'] == $nhaSX){
												?>
												<option selected="selected" value="<?php echo($rowNSX['0']); ?>" ><?php echo($rowNSX['1']); ?></option>
												<?php
											}
											else{
												?>
												<option value="<?php echo($rowNSX['0']); ?>" ><?php echo($rowNSX['1']); ?></option>
												<?php
											}
										}
										?>
									</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Nội Dung</label>
								<div class="col-md-8">
									<textarea name="noiDung" id="editor" class="required"><?php echo($noiDung); ?></textarea>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Hình Avatar</label>
								<div class="col-md-8">
								<input type="text" readonly="readonly" name="avatar" id="avatar" class="form-control required" value="<?php echo($avatar); ?>" placeholder="Nhập URL Hình"  />							
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Chọn Hình Avatar Mới</label>
								<div class="col-md-8">
								<input onchange="changeImageAvatar()" type="file" name="avatarNew" id="avatarNew" class="form-control"/>
								<h5 class="text-danger"><strong>Cần Nhắc Trước Khi Chọn Hình Mới Vì Hình Cũ Sẽ Mất Đi</strong></h5>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Hình Cover</label>
								<div class="col-md-8">
								<input type="text" readonly="readonly" name="cover" id="cover" class="form-control required" value="<?php echo($cover); ?>" placeholder="Nhập URL Hình"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Chọn Hình Cover Mới</label>
								<div class="col-md-8">
								<input onchange="changeImageCover()" type="file" name="coverNew" id="coverNew" class="form-control"/>
								<h5 class="text-danger"><strong>Cần Nhắc Trước Khi Chọn Hình Mới Vì Hình Cũ Sẽ Mất Đi</strong></h5>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Tên Đạo Diễn</label>
								<div class="col-md-8">
								<input type="text" name="tenDaoDien" class="form-control required" minlength="3" value="<?php echo($tenDaoDien); ?>" placeholder="Nhập Tên Đạo Diễn"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Tên Diễn Viên</label>
								<div class="col-md-8">
								<input type="text" name="tenDienVien" class="form-control required" minlength="3" value="<?php echo($tenDienVien); ?>" placeholder="Nhập Tên Các Diễn Viên"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>								
						<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<div class="alert alert-warning">
								<strong>Cảnh Báo! </strong> Bạn Có Chắc Muốn Sửa Phim Có ID là: <strong><?php echo($filmLeID); ?></strong> Không?
							</div>
							<div class="btn-group">
								<a href="../index-admin.php?changePage=8" class="btn btn-info text-center">Không</a>
							</div>

							<div class="btn-group">
								
								<button class="btn btn-default" type="submit">Có</button>
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>