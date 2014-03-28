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
	$('.sidebarpage').hide();
	$("#navMenu a").click(function (e) {
        e.preventDefault();
		$('#navMenu a div').removeClass('activetab');
		$('div', this).addClass('activetab');
        var item = this.href.split("#")[1];
        $(".sidebarpage:visible").hide();
        $("#" + item).show();
    });
	$('#tab2').show();

});