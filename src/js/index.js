var $ = require("jquery");
        // require("jquery-ui/jquery-ui.js");
// -----------------------------------------------------------
// ------------------- Helper functions ----------------------
// -----------------------------------------------------------

function getUrl() {
  var path = window.location.pathname;
  path = path.substring(path.lastIndexOf("/")+1,path.lastIndexOf("."));
  return path;
}

function activeDashabordItem(item) {
  $('.' + item).addClass('active');
}

function slider(){
  $(".slider #1").show("fade",500);
  $(".slider #1").delay(2000).hide("slide",{direction:'left'},500);

  var sc = $(".slider img").size();
  var count = 2;


  setInterval(function(){
  $(".slider #"+count).show("slide",{direction:'right'},500);
  $(".slider #"+count).delay(2000).hide("slide",{direction:'left'},500);

  if(count == sc)
   {count = 1;}
  else
   {
  count++;
  }

  },3000);
}

// -----------------------------------------------------------
// ---------------------- Functionality ----------------------
// ----------------------------------------------------------- 

// apply active dashboard class
window.onload = function() {
  var currentUrl = getUrl();
  activeDashabordItem(currentUrl);
  // slider();
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

$('.advanced-options-button').on('click', function(e){
  var type = $(this).data('type');
  if ($(this).hasClass('advanced-active')) {
    $(this).removeClass('type-active');
    // $('.story-'+type).removeClass('show');
  } else {
    $(this).addClass('advanced-active');
    // $('.story-'+type).addClass('show');
  }
});

$('.advance-button').on('click', () => {
  if ($('.advanced-search-options').hasClass('show')){
    $('.advanced-search-options').removeClass('show')
  } else {
    $('.advanced-search-options').addClass('show')
  }
})


// toggles between login and sign up
$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  var target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
