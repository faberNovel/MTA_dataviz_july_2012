var scroller;
var footer;
var topOffset = 300;
var bottomOffset = 10;

$(window).scroll(function(e) {
	console.log($(this).scrollTop());
	if ($(this).scrollTop() >= topAnchor && $(this).scrollTop() < bottomAnchor) 
    {   
	
      scroller.css({
        'position': 'fixed',
        'z-index': '100',
		'width': '100%',
		'top' : '0px'
        });
    } 
	if ($(this).scrollTop() < topAnchor) 
    {  
	 
     scroller.css({
        'position': 'relative',
        'z-index': '100',
		'width': '100%',
		'top' : '0px'
        });
    }
    else if ($(this).scrollTop() >= bottomAnchor) 
    {
      	$('.scroller').css({
            'position': 'relative',
            'top': (bottomAnchor - topAnchor) + 'px'
        });            
    }
});


$(document).ready(function(){

  scroller = $('#nav_wrapper');
  footer = $('#footer');
  topAnchor = 279;
 if (footer.offset() == null)
    bottomAnchor = $(document).height();
  else
    bottomAnchor = footer.offset().top - scroller.height() - bottomOffset - topOffset;
});