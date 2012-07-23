var scroller;
var footer;
var topOffset = 300;
var bottomOffset = 10;

/*-- // This function will be executed when the user scrolls the page. --*/
$(window).scroll(function(e) {
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
        console.log(bottomAnchor - topOffset);
		console.log("gfffo : ");
        $('.scroller').css({
            'position': 'relative',
            'top': (bottomAnchor - topAnchor) + 'px'
        });            
    }
});
/*-- --*/

$(document).ready(function(){

  scroller = $('#nav_wrapper');
  //container = scroller.parent();
  footer = $('#footer');
  //topAnchor = container.offset().top;
   topAnchor = 279;
 
  console.log('topanchor : ' + topAnchor);
  if (footer.offset() == null)
    bottomAnchor = $(document).height();
  else
    bottomAnchor = footer.offset().top - scroller.height() - bottomOffset - topOffset;
//console.log(bottomAnchor);

//  scroller.css({
  //  'position': 'relative',
    //'top': topOffset + 'px'
  //});

});