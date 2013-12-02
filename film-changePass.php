
<div id="changePass-form">
	<div style="height: 5px">
		<button type="button" class="close exitBtn" onclick="closefChangePass()">
			<i class="glyphicon glyphicon-remove"></i>
		</button>
	</div>
	<h3 class="text-warning text-center">THAY ĐỔI MẬT KHẨU</h3>
	<form method="POST" action="">
		<div class="form-group" align="center">
			<span class="loading text-primary"> </span>
			<span class='success text-success' style="display: none">Yêu cầu thành công!</span>
			<span class='error text-success' style="display: none">Mật khẩu cũ không đúng!</span>
		</div>
		<div >
			<div id='user_email' class="form-group">
				<label>Email: </label>
				<i class="iwarning glyphicon"> </i>
				<input name='user_email' type="email" class="form-control" value="<?php session_start(); if(array_key_exists('uemail', $_SESSION)){ echo $_SESSION['uemail'];}else echo $sessionName;?>" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label>Mật khẩu cũ: </label>
				<i class="iwarning glyphicon"> </i>
				<input name='user_pass' type="pass" class="form-control"/>
			</div>
			<div class="form-group">
				<label>Mật khẩu mới: </label>
				<i class="iwarning glyphicon"> </i>
				<input name='changePass_newpass1' type="pass" class="form-control"/>
			</div>
			<div class="form-group">
				<label>Nhập lại mật khẩu mới: </label>
				<i class="iwarning glyphicon"> </i>
				<input name='changePass_newpass2' type="pass" class="form-control"/>
			</div>
			<div class="form-group pull-right">

				<button type="button" class="btn btn-sm btn-primary" onclick="changePass()">
					Gửi yêu cầu
				</button>
				<button type="button" class="btn btn-sm btn-default exitBtn" onclick="closefChangePass()">
					Hủy
				</button>
			</div>
			<div class="clearfix"></div>
		</div>
	</form>
</div>