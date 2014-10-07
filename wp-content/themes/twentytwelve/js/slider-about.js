jQuery(document).ready(function($){
	var index = 0;
	var count = 0;
	
	$('#about-slider ul li').each(function(){
		index++;
		count++;
		
		$(this).addClass("" + index + "");
		$(this).find('p.slide-nr').text(index);
	});
	
	$('#about-slider ul li').each(function(){
		$(this).hide();
		$(this).find('.slide-desc').hide();
	});
	
	$('#about-slider ul li').each(function(){
		if ($(this).hasClass("1")){
			$(this).show();
			$(this).addClass("active");	
			$(this).find('.slide-desc').animate({width:'toggle'},1500);
		}
	});
	
	$('#about-slider ul li').each(function(){
		// if ($(this).hasClass("active")){
			// var nr = $(this).find('p.slide-nr').text();
			// var next = parseInt(nr) + 1;
// 			
			// //$(this).removeClass("active").fadeOut();
// 			
			// $('#about-slider ul li').each(function(){
				// if ($(this).hasClass("" + next + ""))
					// $(this).delay(1500).fadeIn(1500).addClass("active");
			// });
		// }
	});
	
	var next;
	var prev;
	
	$('a#next-slide').click(function(){
		$('#about-slider ul li').each(function(){
			if ($(this).hasClass("active")){
				var current = $(this).find('p.slide-nr').text();
				next = parseInt(current) + 1;
			
				if (next == count + 1)
					next = 1;
			
				$(this).fadeOut(2000);
				$(this).removeClass("active");
			}
		});
		
		$('#about-slider ul li').each(function(){
			if ($(this).hasClass("" + next + "")){
				$(this).fadeIn(3000);
				$(this).addClass("active");	
			}
		});
		
		$('#about-slider ul li').each(function(){
			if ($(this).hasClass("active"))
				$(this).find('.slide-desc').delay(1500).animate({width:'toggle'},1500);
			else
				$(this).find('.slide-desc').hide();	
		});
	});
	
	$('a#prev-slide').click(function(){
		$('#about-slider ul li').each(function(){
			if ($(this).hasClass("active")){
				var current = $(this).find('p.slide-nr').text();
				prev = parseInt(current) - 1;
			
				if (prev == 0)
					prev = count;
			
				$(this).fadeOut(2000);
				$(this).removeClass("active");
			}
		});
		
		$('#about-slider ul li').each(function(){
			if ($(this).hasClass("" + prev + "")){
				$(this).fadeIn(3000);
				$(this).addClass("active");	
			}
		});
		
		$('#about-slider ul li').each(function(){
			if ($(this).hasClass("active"))
				$(this).find('.slide-desc').delay(1500).animate({width:'toggle'},1500);	
			else
				$(this).find('.slide-desc').hide();
		});
	});
});
