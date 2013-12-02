<div id='flogin-content'>
					<?php
						if(!$noOne){
							$liQuanLy = '';
							$sessionName = 'guest';
							if($isAdmin){
								$sessionName = $_SESSION['admin'];
								$liQuanLy = '<li><a href="admin/index-admin.php"><i class="glyphicon glyphicon-wrench"></i> Quản lý</a></li>';
							}
							if($isUser){
								$liQuanLy = '<li id="showfRequestFilmBtn"><a><i class="glyphicon glyphicon-film"></i> Yêu cầu phim</a></li>';
								$sessionName = $_SESSION['user'];
							}
							echo '<div class="btn-group">';
							  echo '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">';
							  echo '<i class="glyphicon glyphicon-user"></i> '.$sessionName.' <span class="caret"></span>';
							  echo '</button>';
							  echo '<ul class="dropdown-menu dropdown-menu-default" role="menu">';
							  echo $liQuanLy ;
							  echo '<li id="showfchangePassBtn"><a href="#"><i class="glyphicon glyphicon-cog"></i> Đổi mật khẩu</a></li>';
							  echo '<li><a class="exitLoginbtn" title="Đăng xuất tài khoản" onclick="exitLogin()"><i class="glyphicon glyphicon-user"></i> Thoát</a></li>';
							echo '</div>';
							
							//if($isAdmin){
							//echo '<p>Xin chào <a href="admin/index-admin.php" title="Đến trang quản lý">'.$_SESSION['admin'].'</a></p>';
							//echo '<p><a class="exitLoginbtn" title="Đăng xuất tài khoản" onclick="exitLogin()">Thoát</a></p>';
							//}
							//if($isUser){
							//	echo '<p>Xin chào <a href="#Properties" title="Đến trang quản lý">'.$_SESSION['user'].'</a></p>';
							//	echo '<p><a class="exitLoginbtn" title="Đăng xuất tài khoản" onclick="exitLogin()">Thoát</a></p>';
							//}
						}
						if($noOne){
							
					?>
					
					
					<!-- Button trigger modal -->
					<a href="#myModal" id="btnShowSignup" data-toggle="modal" data-target="#myModal"> Đăng ký </a>
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div id='signup' class="signup-black">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
									<h3 class="text-warning text-center">ĐĂNG KÝ TÀI KHOẢN</h3>
									<form method="POST" action="#myModal">
										<div class="form-group" align="center">
											<span class="loading text-primary"> </span>
											<span class='success text-success'>Đăng ký thành công!</span>
											<span class='error text-danger'>Đăng ký thất bại!</span>
										</div>
										<div class="signup-content">
											<div id='user_name' class="form-group">
												<label>Họ và tên: </label>
												<i class="iwarning glyphicon"> </i>
												<input type="text" class="form-control" name='user_name'/>
												<p class="nameError warning">
													Ít nhất 4 ký tự!
												</p>
											</div>
											<div id='user_email' class="form-group">
												<label>Email: </label>
												<i class="iwarning glyphicon"> </i>
												<input name='user_email' type="email" class="form-control"/>
												<p class="emailError warning">
													Email không hợp lệ!
												</p>
												<p class="emailExistError warning">
													Email đã được tạo !
												</p>
											</div>
											<div id='user_password' class="form-group">
												<label>Mật khẩu: </label>
												<i class="iwarning glyphicon"> </i>
												<input name='user_password' type="password" class="form-control"/>
												<p class="passwordError warning">
													Ít nhất 6 ký tự!
												</p>
											</div>
											<div id='user_password2' class="form-group">
												<label>Xác thực mật khẩu: </label>
												<i class="iwarning glyphicon"> </i>
												<input name='user_password2' type="password" class="form-control"/>
												<p class='password2Error warning'>
													Mật khẩu xác thực không trùng khớp !
												</p>
											</div>
											<div class="form-group btnAction">
												
												<button type="button" class="btn btn-sm btn-primary" onclick="checkSignup()">
													Đăng ký
												</button>
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
													Hủy
												</button>
											</div>
											<div class="clearfix"></div>
										</div>
									</form>
								</div>
							</div>
						</div>
		
					</div><!-- /.modal -->
					<!-- ĐĂNG NHẬP -->
					<a id="btnShowLogin" onclick="showLoginForm()">Đăng nhập</a>
					<div id="login-form">
						<p class="loading text-primary" align="center"></p>
						<form>
							<div class="form-group">
								
								<input name="user_email" type="email" class="form-control input-sm" placeholder="Nhập email của bạn"/>
							</div>
							<div>
								<input name="user_password" type="password" class="form-control input-sm" placeholder="Nhập password của bạn"/>
							</div>
							<div class="" style="float: left; margin-top:5px;">
								<label>
									<input type="checkbox" ><font color="#CCC"> Ghi nhớ</font>
								</label>
							</div>
							<div class="btnAction">
								<button type="button" class="btn btn-xs btn-primary" onclick="login()">Đăng nhập</button>
								<button type="button" class="btn btn-xs btn-default" onclick="exitLoginForm()">Hủy</button>
							</div>
						</form>
					</div>
					
					<img class='fbloginbtn' src="images/fbloginbtn.png" />
				</div>