/**
 * @author TrongLoi
 */


$(document).ready(function(){
	$('.fbloginBtn').click(function(){
		alert("Hello");
		FB.login(function(response) {
		    if (response.authResponse) {
		        // The person logged into your app
		        FB.api('/me', function(response){
		        	alert(response.name);
		        	console.log(response);
		        });
		    } else {
		        // The person cancelled the login dialog
		    }
		});
	});
});
