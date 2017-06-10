var $ = require('jquery');
// -----------------------------------------------------------
// ------------------- Helper functions ----------------------
// -----------------------------------------------------------

function getUrl() {
  var path = window.location.pathname;
  path = path.substring(path.lastIndexOf("/")+1,path.lastIndexOf("."));
  return path;
}

function activeDashabordItem(item) {
  $('.'+item).addClass('active');
}

// -----------------------------------------------------------
// ---------------------- Functionality ----------------------
// ----------------------------------------------------------- 

// apply active dashboard class
window.onload = function() {
  var currentUrl = getUrl();
  activeDashabordItem(currentUrl); 
}

// adds float labels
$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

// shows the story type when activated
$('.story-type-button').on('click', function(e){
  var type = $(this).data('type');
  if ($(this).hasClass('type-active')) {
    $(this).removeClass('type-active');
    $('.story-'+type).removeClass('show');
  } else {
    $(this).addClass('type-active');
    $('.story-'+type).addClass('show');
  }
});


// toggles between login and sign up
$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  var target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
