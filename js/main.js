$(document).ready(function(){
    $('#nav li').not('.active').hover(highlight);
    $('#user').click(ddown);
    $('#test').click(ddownt);
	
	$('.del').on('click',function(e){
		e.stopPropagation();
		console.log("sa");
			if (confirm("Вы подтверждаете удаление?")) {
					return true;
				} else {
					return false;
				}
		});
});
function highlight(){
    $(this).toggleClass('active');
}
function ddown(){
    $('.ddown-cont').slideToggle();
}

function ddownt(){
    $('.ddown-test').slideToggle();
}


