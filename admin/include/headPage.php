<title>Quản Lý</title>

<link href="../css/docs.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/messages_vi.js"></script>
<link rel="stylesheet" href="../js/wysibb/theme/default/wbbtheme.css" />
<script src="../js/wysibb/jquery.wysibb.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#management").validate({
			errorElement : "span", // Định dạng cho thẻ HTML hiện thông báo lỗi
			rules : {
				rePassword : {
					equalTo : "#password" // So sánh trường repassword với trường có id là password
				},
			}
		});
		$(function() {
			$(window).scroll(function() {
				if ($(this).scrollTop() !== 0) {
					$('#bttop').fadeIn();
				} else {
					$('#bttop').fadeOut().animate({
						bottom : "60px",
						right : "10px"
					});
				}
			});
			$('#bttop').click(function() {
				$('body,html').animate({
					scrollTop : 0
				}, 800);
				$('#bttop').animate({
					bottom : "700px",
					right : "250px"
				}, 800);
			});
		});
		$(document).ready(function() {
			$("#editor").wysibb();
		});
	}); 
</script>
<div class="btn btn-lg" id="bttop"><img width="65" height="32" src="../images/batmanToTop.png" />
</div>