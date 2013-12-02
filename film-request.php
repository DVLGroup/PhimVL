
<div id="requestFilm-form">
	<div style="height: 5px">
		<button type="button" class="close exitBtn">
			<i class="glyphicon glyphicon-remove"></i>
		</button>
	</div>
	<h3 class="text-warning text-center">YÊU CẦU PHIM</h3>
	<form method="POST" action="">
		<div class="form-group" align="center">
			<span class="loading text-primary"> </span>
			<span class='success text-success' style="display: none">Yêu cầu thành công!</span>
		</div>
		<div >
			<div id='user_email' class="form-group">
				<label>Email: </label>
				<i class="iwarning glyphicon"> </i>
				<input name='user_email' type="email" class="form-control" value="<?php session_start(); echo $_SESSION['user'];?>" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label>Tên gốc của phim: </label>
				<i class="iwarning glyphicon"> </i>
				<input name='film_name' type="text" class="form-control"/>
			</div>
			<div class="form-group">
				<label>Tên phim theo tiếng Việt: </label>
				<i class="iwarning glyphicon"> </i>
				<input name='film_name_vi' type="text" class="form-control"/>
			</div>
			<div class="form-group">
				<label>Năm sản xuất: </label>
				<i class="iwarning glyphicon"> </i>
				<input name='film_namsx' type="text" class="form-control"/>
			</div>
			<div class="form-group pull-right">

				<button type="button" class="btn btn-sm btn-primary" onclick="requestFilm()">
					Gửi yêu cầu
				</button>
				<button type="button" class="btn btn-sm btn-default exitBtn" >
					Hủy
				</button>
			</div>
			<div class="clearfix"></div>
		</div>
	</form>
</div>
