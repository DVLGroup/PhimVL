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
				$('div#flogin').html('<p>Xin chào <a href="#Properties" title="Đến trang quản lý">'+result+'</a></p>'+
				'<p><a href="index.php?logout=true" title="Đăng xuất tài khoản">Thoát</a></p>');
				
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

function exitLogin(){
	
//Reload lai trang sau 3s
				setTimeout(function(){
					location.replace('index.php');
				}, 3000);
}
