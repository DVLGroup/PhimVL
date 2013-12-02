/**
 * @author TrongLoi
 */
function warning(formGroup, warning){
	if(warning == null){
		warning = '.warning';
	}
	$('#signup '+formGroup+' '+warning+'').fadeIn();
	$('#signup '+formGroup+' i.iwarning').removeClass('glyphicon-ok');
	$('#signup '+formGroup+' i.iwarning').removeClass('text-success');
	$('#signup '+formGroup+' i.iwarning').addClass('glyphicon-remove');
	$('#signup '+formGroup+' i.iwarning').addClass('text-danger');
}
function offwarning(formGroup, warning){
	if(warning == null){
		warning = '.warning';
	}
	$('#signup '+formGroup+' '+warning+'').fadeOut();
	$('#signup '+formGroup+' i.iwarning').removeClass('glyphicon-remove');
	$('#signup '+formGroup+' i.iwarning').removeClass('text-danger');
	$('#signup '+formGroup+' i.iwarning').addClass('glyphicon-ok');
	$('#signup '+formGroup+' i.iwarning').addClass('text-success');
}

var d1 = false;
var d2 = false;
var d3 = false;
var d4 = false;

$(document).ready(function(){
	//
	$('#signup input[name="user_name"]').blur(function(){
		var user_name = $(this).val();
		if(user_name == '' || user_name == ' ' || (user_name.length < 4)){
			warning("#user_name");
			d1 = false;
		}else{
			offwarning("#user_name");
			d1 = true;
		}
		return false;
	});
	
	$('#signup input[name="user_email"]').blur(function(){
		var user_email = $(this).val();
		var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		if(user_email == '' || user_email == ' ' || !email_regex.test(user_email)){
			warning("#user_email", ".emailError");
			$('#signup .emailExistError').fadeOut();
			d2 = false;
		}
		else{
			$.ajax({
				type:	"POST",
				url:	"signup.php",
				data:	{checkEmail:user_email,uemail:user_email},
				success:	function(result){
					console.log(result);
					if(result == "emailExist"){
						warning("#user_email", ".emailExistError");
						$('#signup .emailError').fadeOut()
						d2 = false;
						
					}else{
						offwarning("#user_email", ".emailError");
						offwarning("#user_email", ".emailExistError");
						d2 = true;
						//warning("#user_email", ".emailExistError");
						//offwarning("#user_email", ".emailError");
						//d2 = false;
					}
				}
			});
			
			//offwarning("#user_email", ".emailError");
			//d2 = true;
		}
		return false;
	});
	
	$('#signup input[name="user_password"]').blur(function(){
		var user_password = $(this).val();
		var user_password2 = $('#signup input[name="user_password2"]').val();
		if(user_password.length < 6){
			warning("#user_password");
			d3 = false;
			if(user_password2 != user_password){
				warning("#user_password2");
				d4 = false;
			}
		}else{
			offwarning("#user_password");
			d3 = true;
			if(user_password2 == user_password){
				offwarning("#user_password2");
				d4 = true;
			}else{
				warning("#user_password2");
				d4 = true;
			}
		}
		return false;
	});
	
	$('#signup input[name="user_password2"]').blur(function(){
		var user_password2 = $(this).val();
		var user_password = $('#signup input[name="user_password"]').val();
		if(user_password2 == '' || user_password2 == ' ' || user_password2 != user_password){
			warning("#user_password2");
			d4 = false;
		}else{
			offwarning("#user_password2");
			d4 = true;
		}
		return false;
	});	
	
	
	
	//YÊU CẦU PHIM
	//Xác định sự kiện khi nhấp vào nút Yêu cầu phim
	//$('#showfRequestFilmBtn').click(function(){
		
	//});
	//$('#requestFilm-form .exitBtn, .exitLoginbtn, #showfchangePassBtn ').click(function(){
	//	$('#requestFilm-form').slideUp();
	//});
	//Show khung nhập yêu cầu
	
	//Thông tin gồm, họ tên, email, Tên gốc của phim, Tên phim theo tiếng việt, năm sx
	
	//xác định hàm thêm yêu cầu -> xử lý bằng php + ajax
});



function checkSignup(){
		$('#signup .loading').html('Loading...');
		if(d1 && d2 && d3 && d4){
			var user_name = $('#signup input[name="user_name"]').val();
			var user_email = $('#signup input[name="user_email"]').val();
			var user_password = $('#signup input[name="user_password"]').val();
			$.ajax({
				type:	"POST",
				url:	"signup.php",
				data:	{signup:"ok", uname:user_name, uemail:user_email, upassword:user_password},
				success:	function(result){
					$('#signup .loading').html('');
					//console.log(result);
					if(result == 'success'){
						$('#signup .success').slideDown('slow');
						$('#signup .error').fadeOut();
						$('#signup .signup-content').fadeOut();
						setTimeout(function(){
							location.reload();
						},2000);
					}else {
						$('#signup .loading').html('');
						$('#signup .success').fadeOut();
						$('#signup .error').slideDown('slow');
					}
				}
			});
			
		}
		else{
			$('#signup .loading').html('');
			$('#signup .warning').focus();
			alert('Một vài thông tin bị thiếu hoặc sai sót nên không thể đăng ký! Hãy xem lại');
		}
		
}



function writeCookie(name,value,days) {
    var date, expires;
    if (days) {
        date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        expires = "; expires=" + date.toGMTString();
            }else{
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var i, c, ca, nameEQ = name + "=";
    ca = document.cookie.split(';');
    for(i=0;i < ca.length;i++) {
        c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1,c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length,c.length);
        }
    }
    return '';
}


function showfRequestFilm(){
	$('#requestFilm-form').slideDown();
}
function closefRequestFilm(){
	$('#requestFilm-form').slideUp();
}




function requestFilm(){
	$('#requestFilm-form .loading').html('Loading...');
	var uemail = $('#requestFilm-form input[name="user_email"]').val();
	var fname = $('#requestFilm-form input[name="film_name"]').val();
	var fnamevi = $('#requestFilm-form input[name="film_name_vi"]').val();
	var fnamsx = $('#requestFilm-form input[name="film_namsx"]').val();
	
	var data_request_film = 'requestFilm=true&fname='+fname+'&fnamevi='+fnamevi+'&fnamsx='+fnamsx;
	
	$.ajax({
		type: 'POST',
		url: 'requestfilm.php',
		data: data_request_film,
		success: function(rs){
			console.log(rs);
			$('#requestFilm-form .loading').html('');
			if(rs == "success"){
				$('#requestFilm-form .success').fadeIn();
				fname = $('#requestFilm-form input[name="film_name"]').val('');
				fnamevi = $('#requestFilm-form input[name="film_name_vi"]').val('');
				fnamsx = $('#requestFilm-form input[name="film_namsx"]').val('');
				setTimeout(function(){
					$('#requestFilm-form').slideUp();
				},2000);
				$('#requestFilm-form .success').fadeOut('slow');
			}
			else{
				$('#requestFilm-form .error').fadeIn();
			}
		}
	});
}



