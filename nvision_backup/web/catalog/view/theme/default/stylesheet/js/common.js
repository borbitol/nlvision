$(document).ready(function() {
  
  var cur_href = location.href.toString();
  
  
  $('ul a').each(function () {
    var link_href = $(this).attr('href').toString();
    if ($(this).hasClass('home_link'))
    {
      if(cur_href == link_href) $(this).addClass('active');
      else $(this).removeClass('active');
    }
    else
    {
      if(cur_href.indexOf(link_href) !== -1) $(this).addClass('active');
      else $(this).removeClass('active');
    }
  });
  
  
  //SVG Fallback
  if(!Modernizr.svg) {
    $("img[src*='svg']").attr("src", function() {
      return $(this).attr("src").replace(".svg", ".png");
    });
  };
  
	//E-mail Ajax Send
	//Documentation & Example: https://github.com/agragregra/uniMail
	$("form#contact_form").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", //Change
			data: th.serialize()
      }).done(function() {
			alert("Thank you!");
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
      }, 1000);
    });
		return false;
  });
  
	// Tooltrip
	$('.tooltip').tooltipster();
  
	//Dragstart
	$("img, a").on("dragstart", function(event) { event.preventDefault(); });
  
  
	// Basket
	$(document).on('click', '.basket>p', function() {
		$(this).siblings('.basket_content').slideToggle();
  });
  
	// Language
	$('.header_top_language-picker>button').click(function() {
		$(this).siblings('.language_dropdown-menu').slideToggle(0);
  });
  
	// Hamburger
	$("#header__button").click(function() {
		$(this).toggleClass("hamburger--open");
		$(this).siblings('ul').slideToggle();
  });
  
	// Main Tabs
	$('.tab-panels .tabs li').on('click', function() {
		var panelEnd = $(this).closest('.tab-panels')
		panelEnd.find('.tabs li').removeClass('active');
		$(this).addClass('active');
		var panelToShow = $(this).attr('rel');
		$(this).parent('.tabs').siblings('.panel').removeClass('active');
		$('#'+panelToShow).addClass('active');
  });
  
	// Inner Tabs
	$('.inner-tab-links').on('click', function() {
		var panelEnd = $(this).closest('.tabs-block')
		var panelToShow = $(this).attr('rel');
		$(this).parents('.tabs-block').find('.inner-panel').removeClass('active');
		$('#'+panelToShow).addClass('active');
  });
  
  
	// Product tabs
	$('.product_description .description_tabs_link li').on('click', function() {
		var panelEnd = $(this).closest('.product_description')
		panelEnd.find('.description_tabs_link li').removeClass('active');
		$(this).addClass('active');
		var panelToShow = $(this).attr('rel');
		$(this).parents('.product_description').find('.description_tabs_content').removeClass('active');
		$('#'+panelToShow).addClass('active');
  });
  
  
	$(".number input").focus(function () {
		$(this).siblings("span").css('opacity','1');
  });
  
  // $('.maphilight_goods_btn').on('click', function() {
  // $(this).parents('.tabs-block').find('.inner-panel').removeClass('active');
  // $(this).parents('.tabs-block').find('.inner-panel.last-block').addClass('active');
	// })
  
	// Popup
	$('.img-popup').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
    }
		
  });
  
	// Tooltip_msg
	$(".tooltip_msg img").click(function() {
		$(this).parents(".tooltip_msg").hide();
  });
  
	// Input countet
	$('.minus').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
  });
	$('.plus').click(function () {
		var $input = $(this).parent().find('input');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
  });
  
  
	// Fixed header
	$(window).scroll(function(){
		var sticky = $('.header'),
		scroll = $(window).scrollTop();
    
		if (scroll >= 145) {sticky.addClass('fixed');}
		else sticky.removeClass('fixed');
  });
  
	// Top btn
	$(function() {
		$.fn.scrollToTop = function() {
			$(this).hide().removeAttr("href");
			if ($(window).scrollTop() >= "250") $(this).fadeIn("slow")
      var scrollDiv = $(this);
			$(window).scroll(function() {
				if ($(window).scrollTop() <= "250") $(scrollDiv).fadeOut("slow")
        else $(scrollDiv).fadeIn("200")
      });
			$(this).click(function() {
				$("html, body").animate({scrollTop: 0}, "slow")
      })
    }
  });
  
	$(function() {
		$("#Go_Top").scrollToTop();
  });
  
	
  
});
$(function() {
	$.fn.maphilight.defaults = {
		fill: true,
		fillColor: '044999',
		fillOpacity: 0.65,
		stroke: true,
		strokeColor: 'a6a6a6',
		strokeOpacity: 0,
		strokeWidth: 1,
		fade: true,
		alwaysOn: false,
		neverOn: false,
		groupBy: false,
		wrapClass: true,
		shadow: false,
		shadowX: 0,
		shadowY: 0,
		shadowRadius: 6,
		shadowColor: '000000',
		shadowOpacity: 0.8,
		shadowPosition: 'outside',
		shadowFrom: false
  }
	$('.map').maphilight();
  
  
  
});

$(document).ready(function(){
  
	$("area").hover(function(){
  var el = "#"+$(this).attr("alt")+"Cat";
  if($(el).css("display")!=="block") {
  $(".map-btn-container").stop(true,true).fadeOut();
  $(el).stop(true, true).fadeIn();
  }
  });
	$("area").each(function(){
		$(this).click(function(){
			$(".cat-list-content").hide();
			$(".grp-added-dialog").hide();
			$(".right-prod-block").hide();
			var el = "#"+$(this).attr("alt")+"Cat";
			var block = "#"+$(el).attr("data-content");
			$(block).show();
			return false;
    });
  });
	$(".map-btn-submit").click(function(){
		$(".cat-list-content").hide();
		var cat_id = $(this).parent().parent().attr("data-content");
		$("#"+cat_id).show();
  });
	$(".map-btn-submit").hover(function(){
		$(this).css("backgroundColor", "#66af20");
    }, function() {
		$(this).css("backgroundColor", "#72c027");
  });
  
	var mapExternal = $("#external").detach();
	$(".baneris").click(function() {
    
		$(".map-btn-container").hide();
    
		var url_id = $(this).children().attr("href");
		if(url_id=="#external") {
			if($("#external").length) {
      }
			else {
				mapAllcab = $("#all-cab").detach();
				mapExternal.appendTo("#map_wrapper");
        
				$("#external").show();
				mapExternal = null;
      }
    }
		else {
			if($("#all-cab").length) {
      }
			else {
				mapExternal = $("#external").detach();
				mapAllcab.appendTo("#map_wrapper");
				mapAllcab = null;
      }
    }
    
		$(".baneris").each(function(){
			$(this).removeClass("active");
    });
		$(this).addClass("active");
		return false;
  });
	$("#map_wrapper").mouseleave(function(){
		$(".map-btn-container").fadeOut();
  });
  
	// $("#all-cab canvas").after('<img data-id="46" id="right-instrument-panel" class="red_img inner-panel3-img" src="catalog/view/theme/default/stylesheet/img/right.png" style="display:none;">');
	// $("#all-cab canvas").after('<img data-id="50" id="center-console" class="red_img inner-panel1-img" src="catalog/view/theme/default/stylesheet/img/center.png" style="display:none;">');
	// $("#all-cab canvas").after('<img data-id="47" id="left-instrument-panel" class="red_img inner-panel2-img" src="catalog/view/theme/default/stylesheet/img/left.png" style="display:none;">');
	// $("#all-cab canvas").after('<img data-id="52" id="right-side-console" class="red_img inner-panel7-img" src="catalog/view/theme/default/stylesheet/img/right_center.png" style="display:none;">');
	// $("#all-cab canvas").after('<img data-id="54" id="overhead-console" class="red_img  inner-panel4-img" src="catalog/view/theme/default/stylesheet/img/center_center.png" style="display:none;">');
	// $("#all-cab canvas").after('<img data-id="51" id="left-side-console" class="red_img inner-panel6-img" src="catalog/view/theme/default/stylesheet/img/left_center.png" style="display:none;">');
	// $("#all-cab canvas").after('<img data-id="53" id="circuit-breaker-console" class="red_img inner-panel5-img" src="catalog/view/theme/default/stylesheet/img/center_top.png" style="display:none;">');
  
  // $("#all-cab canvas").after('<img data-id="46" id="right-instrument-panel" class="red_img inner-panel3-img" src="catalog/view/theme/default/stylesheet/img/right.png">');
	// $("#all-cab canvas").after('<img data-id="50" id="center-console" class="red_img inner-panel1-img" src="catalog/view/theme/default/stylesheet/img/center.png">');
	// $("#all-cab canvas").after('<img data-id="47" id="left-instrument-panel" class="red_img inner-panel2-img" src="catalog/view/theme/default/stylesheet/img/left.png">');
	// $("#all-cab canvas").after('<img data-id="52" id="right-side-console" class="red_img inner-panel7-img" src="catalog/view/theme/default/stylesheet/img/right_center.png">');
	// $("#all-cab canvas").after('<img data-id="54" id="overhead-console" class="red_img  inner-panel4-img" src="catalog/view/theme/default/stylesheet/img/center_center.png">');
	// $("#all-cab canvas").after('<img data-id="51" id="left-side-console" class="red_img inner-panel6-img" src="catalog/view/theme/default/stylesheet/img/left_center.png">');
	// $("#all-cab canvas").after('<img data-id="53" id="circuit-breaker-console" class="red_img inner-panel5-img" src="catalog/view/theme/default/stylesheet/img/center_top.png">');
  
  
  $("#all-cab canvas").after('<img data-id="46" id="right-instrument-panel" class="red_img inner-panel3-img" src="catalog/view/theme/default/stylesheet/img/right.png">');
	$("#all-cab canvas").after('<img data-id="50" id="center-console" class="red_img inner-panel1-img" src="catalog/view/theme/default/stylesheet/img/center.png">');
	$("#all-cab canvas").after('<img data-id="47" id="left-instrument-panel" class="red_img inner-panel2-img" src="catalog/view/theme/default/stylesheet/img/left.png">');
	$("#all-cab canvas").after('<img data-id="52" id="right-side-console" class="red_img inner-panel7-img" src="catalog/view/theme/default/stylesheet/img/right_center.png">');
	$("#all-cab canvas").after('<img data-id="54" id="overhead-console" class="red_img  inner-panel4-img" src="catalog/view/theme/default/stylesheet/img/center_center.png">');
	$("#all-cab canvas").after('<img data-id="51" id="left-side-console" class="red_img inner-panel6-img" src="catalog/view/theme/default/stylesheet/img/left_center.png">');
	$("#all-cab canvas").after('<img data-id="53" id="circuit-breaker-console" class="red_img inner-panel5-img" src="catalog/view/theme/default/stylesheet/img/center_top.png">');
  
  
  panels.forEach(function(el, i){
  // console.log('panel' + el);
    $('#panel1 .inner-tabs img.red_img.inner-panel' + el + '-img').addClass('activated');
    $('#panel2 .inner-tabs ul.external-list > li > a[rel="inner-panel' + el + '"]').addClass('activated');
  });
  
  //$('img.red_img').css('visibility', 'hidden');
  
  $('area').on('click', function(e){
    
    var img_class = $(this).attr('rel') + '-img';
    
    // console.log('img.' + img_class);
    
    $('div.inner-tabs ul.external-list li a.tooltip.inner-tab-links').removeClass('active');
    $('img.red_img').removeClass('active');
    $('img.' + img_class).addClass('active');
    
    
  });
  
  
  
  $('div.inner-tabs ul.external-list li a.tooltip.inner-tab-links').on('click', function(e){
  
  $('img.red_img').removeClass('active');
  $('div.inner-tabs ul.external-list li a.tooltip.inner-tab-links').removeClass('active');
  
  $(this).addClass('active');
    
  });
	
	
	
	
	
	
	$('ul.language_dropdown-menu > li > a').on('click', function(e){
		
    e.preventDefault();
    e.stopPropagation();
    var code = $(this).text();
    
    $(this).closest('.header_top_language-picker').find('button.curr_lang_code').text(code);
    
    $(this).closest('ul.language_dropdown-menu').slideUp(0);
    
    
    $('input[name=\'language_code\']').attr('value', code);
    
    $('form#lang_form').submit();
    
    return false;
		
		
  });
	
	
	
	$('button.add_group_button').on('click', function(e){
		e.preventDefault();
		
		var form = $(this).parent('form'),
    button = $(this),
    panel_id = form.find('input[name="panel_id"]').val();
    
    
		
		$.ajax({
			url: 'index.php?route=checkout/cart/add_group',
			type: 'post',
			data: form.serialize(),
			dataType: 'json',
			success: function(json) {
				$('.success, .warning, .attention, .information, .error').remove();
				
				if (json['redirect']) {
					location = json['redirect'];
        }
				
				if (json['success']) {
					// $('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
					
					// $('.success').fadeIn('slow');
					
					// $('#cart-total').html(json['total']);
					
					// $('html, body').animate({ scrollTop: 0 }, 'slow'); 
					
					button.parents('.tabs-block').find('.inner-panel').removeClass('active');
					button.parents('.tabs-block').find('.inner-panel.last-block').addClass('active');
          
          
          $('#panel1 .inner-tabs img.red_img.inner-panel' + panel_id + '-img').addClass('activated');
          $('#panel2 .inner-tabs ul.external-list > li > a[rel="inner-panel' + panel_id + '"]').addClass('activated');
          
          
          $('.basket').load('index.php?route=module/cart');
          
        }	
      }
    });
		
  });
  
	
});




function addToCart(product_id, quantity, button) {
  quantity = typeof(quantity) != 'undefined' ? quantity : 1;
  
  
  
  
  $.ajax({
    url: 'index.php?route=checkout/cart/add',
    type: 'post',
    data: 'product_id=' + product_id + '&quantity=' + quantity,
    dataType: 'json',
    beforeSend: function()
    {
      if (typeof(button) != 'undefined')
      {
        button.addClass('loading');
      }
      
    },
    complete: function()
    {
      if (typeof(button) != 'undefined')
      {
        button.removeClass('loading');
      }
      
    },
    success: function(json) {
      $('.success, .warning, .attention, .information, .error').remove();
      
      if (json['redirect']) {
        location = json['redirect'];
      }
      
      if (json['success']) {
        
        // $('#notification').html('<div class="alert alert-success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
        
        // $('#notification .alert-success').fadeIn('slow');
        
        // $('#cart-total').html(json['total']);
        
        $('html, body').animate({ scrollTop: 0 }, 'slow'); 
        
        $('.basket').load('index.php?route=module/cart', function(){
          
          $('.basket_content').slideDown();
          
          
        });
        
        
      }	
    }
  });
}