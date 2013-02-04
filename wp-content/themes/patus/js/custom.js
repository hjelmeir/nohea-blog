/*-----------------------------------------------------------------------------------*/
/*	Begin
/*-----------------------------------------------------------------------------------*/


jQuery(document).ready(function ($) {


/*-----------------------------------------------------------------------------------*/
/*	Superfish Settings - http://users.tpg.com.au/j_birch/plugins/superfish/
/*-----------------------------------------------------------------------------------*/


	$('#secondary-nav ul').superfish({
		delay: 200,
		animation: { height:'show'},
		speed: 'fast',
		autoArrows: false,
		dropShadows: false
	});
	
	
/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/


	function activateTab($tab) {
	
		var $activeTab = $tab.closest('dl').find('a.active'),
				contentLocation = $tab.attr("href") + 'Tab';

		//Make Tab Active
		$activeTab.removeClass('active');
		$tab.addClass('active');

    	//Show Tab Content
		$(contentLocation).closest('.tabs-content').children('li').hide();
		$(contentLocation).css('display', 'block');
		
	}

	$('dl.tabs').each(function () {
	
		//Get all tabs
		var tabs = $(this).children('dd').children('a');
		
		tabs.first().addClass('active');
		
		tabs.click(function (e) {
			activateTab($(this));
		});
		
		
	});
	
	$('ul.tabs-content').each(function () {
	
		//Get all tabs
		$(this).find('li').first().css({
			display: 'block'
		});	
		
	});

	if (window.location.hash) {
	
		activateTab($('a[href="' + window.location.hash + '"]'));
		
	}
	
	$('p').each(function() {
	    var $this = $(this);
	    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
	        $this.remove();
	});
		
	
/*-----------------------------------------------------------------------------------*/
/*	Toggles
/*-----------------------------------------------------------------------------------*/


	$('.toggle .trigger').each( function() {
		
		$(this).click(function () {
		
			$(this).parent().find('.toggle-pane').slideToggle('showOrHide', function() {
			
				if($(this).css('display') == 'none') {
				
					$(this).parent().addClass('closed');
					
				} else {
				
					$(this).parent().removeClass('closed')
					
				}
				
			});
		});
		
	});


/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/
	
	$(".alert-box").not('.contact .alert-box').append('<a href="#" class="close">&times;</a>');
	

	$(".alert-box").delegate("a.close", "click", function(event) {
	
   		event.preventDefault();
    
	  	$(this).closest(".alert-box").fadeOut(function(event){
	   		$(this).remove();
	  	});
	  	
	});


/*-----------------------------------------------------------------------------------*/
/*	Placeholders
/*-----------------------------------------------------------------------------------*/


	$('input, textarea').placeholder();
	

/*-----------------------------------------------------------------------------------*/
/*	Videos
/*-----------------------------------------------------------------------------------*/


	$('iframe, object').wrap('<div class="flex-video" />');


/*-----------------------------------------------------------------------------------*/
/*	Tooltips
/*-----------------------------------------------------------------------------------*/


	$(this).tooltips();


/*-----------------------------------------------------------------------------------*/
/*	Columns
/*-----------------------------------------------------------------------------------*/
	
	
	$('.columns.last').after('<div class="clearfix"></div>')
	
    

/*-----------------------------------------------------------------------------------*/
/*	The End
/*-----------------------------------------------------------------------------------*/	
	

});