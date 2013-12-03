/**
 * @author TrongLoi
 */

function warning(divID, formGroup, warning){
	if(warning == null){
		warning = '.warning';
	}
	$(divID+' '+formGroup+' '+warning+'').fadeIn();
	$(divID+' '+formGroup+' i.iwarning').removeClass('glyphicon-ok');
	$(divID+' '+formGroup+' i.iwarning').removeClass('text-success');
	$(divID+' '+formGroup+' i.iwarning').addClass('glyphicon-remove');
	$(divID+' '+formGroup+' i.iwarning').addClass('text-danger');
}
function offwarning(divID, formGroup, warning){
	if(warning == null){
		warning = '.warning';
	}
	$(divID+' '+formGroup+' '+warning+'').fadeOut();
	$(divID+' '+formGroup+' i.iwarning').removeClass('glyphicon-remove');
	$(divID+' '+formGroup+' i.iwarning').removeClass('text-danger');
	$(divID+' '+formGroup+' i.iwarning').addClass('glyphicon-ok');
	$(divID+' '+formGroup+' i.iwarning').addClass('text-success');
}

var d1 = false;
var d2 = false;
var d3 = false;
var d4 = false;

$(document).ready(function(){
	//
	$('#flogin').on('blur', 'input[name="user_name"]', function(e){
		e.preventDefault();
		var user_name = $(this).val();
		if(user_name == '' || user_name == ' ' || (user_name.length < 4)){
			warning("#signup", "#user_name");
			d1 = false;
		}else{
			offwarning("#signup", "#user_name");
			d1 = true;
		}
		return false;
	});
	// $('#signup input[name="user_name"]').on('blur', function(e){
// 		
		// var user_name = $(this).val();
		// if(user_name == '' || user_name == ' ' || (user_name.length < 4)){
			// warning("#user_name");
			// d1 = false;
		// }else{
			// offwarning("#user_name");
			// d1 = true;
		// }
		// e.preventDefault();
		// return false;
	// });
	
	$('#flogin').on('blur','input[name="user_email"]',function(){
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
						warning("#signup", "#user_email", ".emailExistError");
						$('#signup .emailError').fadeOut()
						d2 = false;
						
					}else{
						offwarning("#signup","#user_email", ".emailError");
						offwarning("#signup","#user_email", ".emailExistError");
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
	
	$('#flogin').on('blur','input[name="user_password"]',function(){
		var user_password = $(this).val();
		var user_password2 = $('#signup input[name="user_password2"]').val();
		if(user_password.length < 6){
			warning("#signup", "#user_password");
			d3 = false;
			if(user_password2 != user_password){
				warning("#signup", "#user_password2");
				d4 = false;
			}
		}else{
			offwarning("#signup", "#user_password");
			d3 = true;
			if(user_password2 == user_password){
				offwarning("#signup", "#user_password2");
				d4 = true;
			}else{
				warning("#signup", "#user_password2");
				d4 = false;
			}
		}
		return false;
	});
	
	$('#flogin').on('blur','input[name="user_password2"]',function(){
		var user_password2 = $(this).val();
		var user_password = $('#signup input[name="user_password"]').val();
		if(user_password2 == '' || user_password2 == ' ' || user_password2 != user_password){
			warning("#signup","#user_password2");
			d4 = false;
		}else{
			offwarning("#signup","#user_password2");
			d4 = true;
		}
		return false;
	});	
	
	
});



function checkSignup(){
		$('#signup .error').fadeOut();
		$('#signup .success').fadeOut('slow');
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
					console.log(result);
					if(result == 'success'){
						$('#signup .success').slideDown('slow');
						$('#signup .signup-content').slideUp();
						//$('#myModal').hide();
						//$('#flogin').load('header.php #flogin-content');
						setTimeout(function(){
							location.reload();
						},2000);
						//refresh form tương tác của người dùng
						$('#accfAction #frequest').load('film-request.php #requestFilm-form');
						$('#accfAction #fchangePass').load('film-changePass.php #changePass-form');
						
					}else {
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



///////////////////YÊU CẦU PHIM //////////////
function showfRequestFilm(){
	$('#changePass-form').fadeOut('fast');
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



/////////////THAY ĐỔI MẬT KHẨU/////////////////////
$(document).ready(function(){
	ckcpass1 = false;
	ckpass2 = false;
	ckcpass3 = false;
	$('#fchangePass').on('blur', 'input[name="user_pass"]', function(){
		var value = $(this).val();
		var newpass = $('#changePass-form input[name="changePass_newpass1"]').val();
		if(value == '' || value[0] == ' ' || value.length < 6){
			ckcpass1 = false;
			warning("#changePass-form", "#user_password");
		}else{
			ckcpass1 = true;
			offwarning("#changePass-form", "#user_password");
			if(value == newpass){
				ckcpass2 = false;
				warning("#changePass-form", "#newpass", ".coincidencePass");
			}
			if(value != newpass){
				if(newpass.length > 5){
					ckcpass2 = true;
					offwarning("#changePass-form", "#newpass");
				}
				else{
					ckcpass2 = false;
					warning("#changePass-form", "#newpass", ".passLess");
				}
			}
		}	
		
	});
	$('#fchangePass').on('blur', 'input[name="changePass_newpass1"]', function(){
		offwarning("#changePass-form", "#newpass");
		var value = $(this).val();
		var upass = $('#changePass-form input[name="user_pass"]').val();
		var newpass2 = $('#changePass-form input[name="changePass_newpass2"]').val();
		if(value == '' || value[0] == ' ' || value.length < 6){
			ckcpass2 = false;
			warning("#changePass-form", "#newpass", ".passLess");
			if(value != newpass2){
				ckcpass3 = false;
				warning("#changePass-form", "#newpass2");
			}
		}
		else{
			ckcpass2 = true;
			offwarning("#changePass-form", "#newpass");
			if(value == newpass2){
				ckcpass3 = true;
				offwarning('#changePass-form','#newpass2');
			}else {
				ckcpass3 = false;
				warning('#changePass-form','#newpass2');
			}
			if(value == upass){
				ckcpass2=false;
				warning("#changePass-form", "#newpass", '.coincidencePass');
			}
		}
	});
	$('#fchangePass').on('blur', 'input[name="changePass_newpass2"]', function(){
		var newpass = $('#changePass-form input[name="changePass_newpass1"]').val();
		var value = $(this).val();
		
		if(value == '' || value[0] == ' ' || value != newpass){
			ckcpass3=false;
			warning("#changePass-form", "#newpass2");
		}else if(value == newpass){
			ckcpass3=true;
			offwarning("#changePass-form", "#newpass2");
		}
	});
});

function showfChangePass(){
	$('#requestFilm-form').fadeOut('fast');
	$('#changePass-form').slideDown();
}
function closefChangePass(){
	$('#changePass-form').slideUp();
}

function changePass(){
	$('#changePass-form .error').fadeOut('fast');
	$('#changePass-form .success').fadeOut('fast');
	$('#changePass-form .loading').html('Loading...');
	if(ckcpass1 && ckcpass2 && ckcpass3){
		var uemail = $('#changePass-form input[name="user_email"]').val();
		var upass = $('#changePass-form input[name="user_pass"]').val();
		var newpass = $('#changePass-form input[name="changePass_newpass1"]').val();
		var data_chagePass = 'changePass=true&uemail='+uemail+'&upass='+upass+'&newpass='+newpass;
		
		$.ajax({
			type: 'POST',
			url: 'changePass.php',
			data: data_chagePass,
			success: function(result){
				console.log(result);
				$('#changePass-form .loading').html('');
				
				if(result == "Error"){
					$('#changePass-form .error').slideDown();
				}else if(result == "success"){
					$('#changePass-form input[name="user_pass"]').val('');
					$('#changePass-form input[name="changePass_newpass1"]').val('');
					$('#changePass-form input[name="changePass_newpass2"]').val('');
					$('#changePass-form .success').slideDown().delay(1000).fadeOut();
					setTimeout(function(){
						$('#changePass-form').slideUp();
					},2000);
				}
			}
		});
	}else{
		$('#changePass-form .loading').html('');
		alert('Một vài thông tin bị thiếu hoặc sai sót nên không thể đăng ký! Hãy xem lại')
	}
}

