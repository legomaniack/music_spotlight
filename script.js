$(document).ready(function(){
    $('.sidebutton').click(function(){
        $('div.sidebutton').toggleClass('sidebarshow');
        $('div.sidebar').toggleClass('sidebarshow');
    });
	var button = $('div.sidebutton'), pos = button.offset();
	$(window).scroll(function(){
		if($(this).scrollTop() > pos.top && !$('div.sidebutton').hasClass('fixed')) {
			$('div.sidebutton').addClass('fixed');
		}
		else if($(this).scrollTop() <= pos.top && $('div.sidebutton').hasClass('fixed')) {
			$('div.sidebutton').removeClass('fixed');
		}
	});
});