jQuery(document).ready(function($) {
	var mousedown = false;
	var resizetimer = false;
	
	$('.box-loadding-page .overlay').show();
	
	//Function Click Menu
	$('#accordion a').click(function(e){
		var id = $(this).attr('href');
		
		$('.rs-fields').hide();
		$(id).fadeIn();
		$(this).parent().find('ul').slideToggle();
	
		
		e.preventDefault();
	});
	
	//Set Height
	reset_height_cpanel();
	
	//Main Menu
	$("#adminmenuwrap").hide();
	$('#wpcontent, #wpfooter').css('margin-left',0);
	$('#nav .nav_left a').click(function(e){
		e.preventDefault();
		if( ! $("#adminmenuwrap").hasClass('show') ){
			$('#wpwrap').css('z-index','1');
			$('#adminmenuwrap').css('z-index','999');
			
			$('#adminmenuwrap').css('width','0').addClass('show').show().animate({
				width: "160px"
			},300);
			$('#wpcontent, #wpfooter').animate({
				left: "160px"
			},300);
			
			$('body').css({
				overflow: 'hidden'
			});
		}
		else {
			$('#wpwrap').css('z-index','999');
			$('#adminmenuwrap').css('z-index','1');
			
			$('#wpcontent, #wpfooter').animate({
				left: "0px"
			},300,function(){
				$('#adminmenuwrap').hide().removeClass('show');
				$('#wpwrap').css('z-index','1');
				$('#adminmenuwrap').css('z-index','999');
			});
			$('body').css({
				overflow: 'inherit'
			});
		}
	});
	
	//resize
	$(document).mouseup(function(){
		mousedown = false;
		$('#resize').css({
			border: 'none',
			marginLeft: '-18px',
			top:'-10px'
		});	
		$('body').css('pointer-events', '');
		$('body').css('user-select', '');
	});
	$('#resize').mousedown(function(){
		mousedown = true;
		$(this).css({
			borderTop: '100px solid transparent',
			borderRight: '100px solid transparent',
			borderLeft: '100px solid transparent',
			marginLeft: '-100px',
			top: '-100px'
		});	
		$('body').css('pointer-events', 'none');
		$('body').css('user-select', 'none');
		$('#toggle').removeClass('active');
	});
	$(window).mousemove(function(event){
		if(mousedown && event.pageY > ($('#wpadminbar').height() || 1)){
			$('#main').show();
			var pageY = event.pageY;
			if(pageY > window.innerHeight - 50){
				pageY = window.innerHeight - 50;
				$('#toggle').addClass('active');
			}
			else{
				$('#toggle').removeClass('active');
			}
			clearTimeout(resizetimer);
			resizetimer = setTimeout(function(){
				$('#header').height(pageY - $('#wpadminbar').height());
				$('#iframe').css('height','100%');
				$('#content').height(window.innerHeight - pageY );
				$('#main,.nav_siddebar,.main_content').height($('#content').height() - 50);
			},1);
		}
	});
	
	//Script resize <iframe src="" frameborder="0"></iframe>
	$('#toggle').click(function(e){
		e.preventDefault();
		if( $(this).hasClass('active') ){
			$(this).removeClass('active');
			$('#header, #iframe').css({
				'height':'350'
			});
			$('#main').show();
			$('#content').css({
				height: $('#wrapper').height() - 350,
				bottom: "auto"
			});
			$('#main,.nav_siddebar,.main_content').height($('#content').height() - 50);
			
		}
		else {
			$(this).addClass('active');
			$('#header, #iframe').css({
				'height': $('#wrapper').height()-50
			});
			$('#main').hide();
			$('#content').css({
				top: "auto",
				height: '50px',
				bottom: "0"
			});
		}
	});
	
	//Script Resize
	$('#laptop').unbind('click').click(function(e){
		e.preventDefault();
		if( $('#header #iframe').width() != $('#wrapper').width() ){
			$('#header #iframe').animate({ width: "100%" });
		}
	});
	$('#tablet').unbind('click').click(function(e){
		e.preventDefault();
		if( $('#header #iframe').width() != 768 ){
			$('#header #iframe').animate({ width: "768" });
		}
	});
	$('#mobie').unbind('click').click(function(e){
		e.preventDefault();
		if( $('#header #iframe').width() != 480 ){
			$('#header #iframe').animate({ width: "480" });
		}
	});
	
	//Submit
	$('form.rs-panel').submit(function(event){
		if(window.tinymce) tinymce.triggerSave();
			event.preventDefault();
		
		var url = $(this).attr('action');
		var params = $(this).serialize();
		$.post(url, params, function(data){
			rs.message('Settings saved.');
		}).error(function(){
			rs.message('Error');
		});
	});
	$('.save_view').click(function(e){
		e.preventDefault();
		var url = $('form.rs-panel').attr('action');
		var params = $('form.rs-panel').serialize();
		$.post(url, params, function(data){
			rs.message('Settings saved.');
		}).error(function(){
			rs.message('Error');
		}) .done(function() {
			document.getElementById('iframe').contentWindow.location.reload();
		});
	});
	
});

jQuery(window).load(function(){
	jQuery('.box-loadding-page .overlay').hide();
});
jQuery(window).resize(function(){
	reset_height_cpanel();
});
function reset_height_cpanel() {
	$ = jQuery;
	var height = $(window).height()-$('#wpadminbar').height();
	$('html,body, #wrapper').height( $(window).height()-$('#wpadminbar').height() );
	$('#content').height( height - $('#header').height() );
	$('#main').height( $('#content').height() - 50 );
	$('.nav_siddebar,.main_content').height( $('#content').height() - 50 );
}