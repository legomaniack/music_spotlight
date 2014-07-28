$(document).ready(function(){
	
	var filtered_tags = new Array();
	
    $('.sidebutton').click(function(e){
		e.preventDefault();
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
	
	function compare (a, b) {
		for(i in a) {
			item = a[i];
			if($.inArray(item, b) >= 0) {
				return true;
			}
		}
		return false;
	}
	
	function tag_hide(){
		
		$("#music_container span").each(function(){
			var tags = new Array();
			var box = $(this).find("#tagbox");
			$("a", box).each(function(){
				var tag = this.href.split("#")[1];
				tags.push(tag);
			});
			if (!compare(tags, filtered_tags) && (filtered_tags.length > 0)){
				$("#main", this).addClass("hidden_song");
			} else {
				$("#main", this).removeClass("hidden_song");
			}
			
		});
	}
	
	$("#tagbox a").click(function (e) {
        e.preventDefault();
        var item = this.href.split("#")[1];
		$("."+item).toggleClass("selected_tag");
		console.log("toggleing " + "."+item);
		if ($.inArray(item, filtered_tags) >= 0) {
			filtered_tags.splice(filtered_tags.indexOf(item), 1);
		} else {
			filtered_tags.push(item);
		}
		tag_hide();
		
    });
	
	$(".expand_link").click(function(e) {
		e.preventDefault();
		$('.fullart').removeClass('show');
		console.log($(this).parents().find('.fullart'));
		$(this).parents().find('.fullart').addClass('show');
	});
	
	$(".close_link").click(function(e) {
		e.preventDefault();
		$('.fullart').removeClass('show');
	});
});