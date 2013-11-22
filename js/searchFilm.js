/**
 * @author TrongLoi
 */

$(document).ready(function(){
	
	
	function search(){
		//Từ khóa tìm kiếm
		var tu_khoa = $("input#search").val();
		
		$("b#value-search").html(tu_khoa);
		
		if(tu_khoa !== ''){
			$.ajax({
				type: 	"POST",
				url:	"search.php",
				data:	{tu_khoa: tu_khoa},
				success: function(result){
					$("ul#results").html(result);
				}				
			});
		}
	}
	
	
	
	$("input#search").live("keyup",function(e){
		clearTimeout($.data(this, 'timer'));
		
		//Từ khóa tìm kiếm
		var tu_khoa = $(this).val();
		
		//
		if(tu_khoa == '' || tu_khoa == ' '){
			$("div#resultSearch").fadeOut();
			$("#results").fadeOut();
			$("p#searchFilmTitle").fadeOut();
		}
		else{
			$("div#resultSearch").fadeIn();
			$("#results").fadeIn();
			$("p#searchFilmTitle").fadeIn();
			$(this).data('timer', setTimeout(search, 100));
		}
	});
	
	
	//
	$("input#search").blur(function(){
		$("div#resultSearch").fadeOut();
		$("#results").fadeOut();
		$("p#searchFilmTitle").fadeOut();
	});
	
})
