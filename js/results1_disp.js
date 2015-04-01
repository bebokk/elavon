$(window).scroll(function () {

	var top = $(window).scrollTop();
	$("#position").val(top);

	if (top > 500) {
		
		//check state of box 		
		var test1 = $(".rs-sticky-header").css("margin-top");
		if (test1 == '-150px') {
			$('.rs-sticky-header').animate({
				marginTop: '0px'
			}, 700, function() {
			
				setTimeout(function() {
				    stop_flashing();
				}, 2250);
			});	
		}
	}
	
	if (top < 500) {
		
		//check state of box 		
		var test1 = $(".rs-sticky-header").css("margin-top");
		if (test1 == '0px') {
			$('.rs-sticky-header').animate({
				marginTop: '-150px'
			}, 700, function() {
			
				prepare_flashing();
			});			
		}	
	}
});

function stop_flashing() {

	$("#rs-note-icon1").attr("class","rs-note-icon");
}

function prepare_flashing() {
	$("#rs-note-icon1").attr("class","rs-note-icon rs-note-icon1");
}