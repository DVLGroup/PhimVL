/**
 * @author TrongLoi
 */




function showLoginForm(){
	if($('#login-form').is(':visible')){
		$('#login-form').fadeOut('fast');
		$('#flogin a#btnShowLogin').removeClass("afterClick");
	}
	else{
		$('#flogin a#btnShowLogin').addClass("afterClick");
		$('#login-form').fadeIn();
	}
}

function exitLogin(){
	
	alert('ok');
	
	var data_exitlogin = "logout=true";
	$.ajax({
		type: "POST",
		url: "login.php",
		data: data_exitlogin,
		success: function(rs){
			console.log(rs)
			if(rs == "success"){
				location.reload();
			}
		}
	});

				
}

function login(){
	var uemail = $('#login-form input[name="user_email"]').val();
	var upass = $('#login-form input[name="user_password"]').val();
	var data_login = 'login=true&uemail='+uemail+'&upass='+upass;
	
	$.ajax({
		type: "POST",
		url:	"login.php",
		data:	data_login,
		success: function(result){
			console.log(result);
			if(result == "login error"){
				alert('Đăng nhập thất bại!');
			}
			else{
				$('div#flogin').html('<p>Xin chào <a href="admin/index-admin.php" title="Đến trang quản lý">'+result+'</a></p>'+
				'<p><a class="exitLoginbtn" title="Đăng xuất tài khoản" onclick="exitLogin()">Thoát</a></p>');
				
				//Thông báo thành công
				//alert('Đăng nhập thành công!');
			}
		}
	});
}

function exitLoginForm(){
	$('#login-form').fadeOut();
	$('#flogin a#btnShowLogin').removeClass("afterClick");
}


