var $ = require("jquery");
import utils from './inc/utils.js';
import bsn from 'bootstrap.native';
import './inc/audioRecorder';
import './inc/slick.min';

// -----------------------------------------------------------
// ---------------------- Functionality ----------------------
// -----------------------------------------------------------

var currentUrl = utils.getUrl();
var wholeUrl = utils.getWholeUrl();

// apply active dashboard class
window.onload = function() {
  utils.activeDashabordItem(currentUrl);

  $( ".cross" ).hide();
  $( "#side-bar-mobile" ).hide();
  $( ".hamburger" ).click(function() {
    $( "#side-bar-mobile" ).slideToggle( "slow", function() {
      $( ".hamburger" ).hide();
      $( ".cross" ).show();
    });
  });

  $( ".cross" ).click(function() {
    $( "#side-bar-mobile" ).slideToggle( "slow", function() {
      $( ".cross" ).hide();
      $( ".hamburger" ).show();
    });
  });


}
if (currentUrl.includes('post') && wholeUrl.includes('edit')) {
  let category = document.getElementById('storyCategory').value;
  if (category != 'noCats') {
    document.querySelector(`.${category}`).checked = true; 
  }
}

if (currentUrl.includes('post') && wholeUrl.includes('edit')) {
  let warning = document.getElementById('storyWarning').value;
  if (warning != 'noWarning') {
    document.querySelector(`.${warning}`).checked = true; 
  }
}

if (currentUrl.includes('view-story')) {
  $('.slider').slick({
    autoplay: true,
    autoplaySpeed: 5000,
  });
  $( ".author-cross" ).hide();
  $( "#author-mobile" ).hide();
   $( ".author-hamburger" ).click(function() {
    $( "#author-mobile" ).slideToggle( "slow", function() {
      $( ".author-hamburger" ).hide();
      $( ".author-cross" ).show();
    });
  });

  $( ".author-cross" ).click(function() {
    $( "#author-mobile" ).slideToggle( "slow", function() {
      $( ".author-cross" ).hide();
      $( ".author-hamburger" ).show();
    });
  });
}


if (currentUrl.includes('profile')) {
  document.querySelector('#edit-user-details').addEventListener('click',(element) => {
    document.querySelector('#change-user-details').classList.add('show')
    document.querySelector('.my-details').classList.add('hide')
  })

  document.querySelector('.change-details-cancel').addEventListener('click',(element) => {
    document.querySelector('#change-user-details').classList.remove('show')
    document.querySelector('.my-details').classList.remove('hide')
  })
}

  $('.notifications').on('click', function(){
    $('.all-notifications').toggleClass('show');
  })

// if (currentUrl.includes('index')) {

//   // Terms and conditions modal
//   let tcModal = document.getElementById('tc-modal')
//   let tcModalActive = new bsn.Modal(tcModal)

//   let tcButton = document.querySelector('#tc-index')
//   tcButton.addEventListener('click', () => {

//     tcModalActive.show()

//   })

// }

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
    $(this).removeClass('advanced-active');
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

$('#search-view-more').on('click', ()=> {
  $('.search-wrapper').css('max-height', 'none');
  $('#search-view-more').hide();
})

$('#search-view-all').on('click',()=> {
  $('#search-button').click();
})

var searchResults = $('#search-results').length;
if (searchResults) {
  $('.search-wrapper').css('max-height', 'none');
}

// toggles between login and sign up
$('.tab a').on('click', function (e) {

  e.preventDefault();

  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');

  var target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();

  $(target).fadeIn(600);

});


// Scrolling animation
// $(document).ready(function(){
//   // Add smooth scrolling to all links
//   $("#scrolling-link").on('click', function(event) {

//     // Make sure this.hash has a value before overriding default behavior
//     if (this.hash !== "") {
//       // Prevent default anchor click behavior
//       event.preventDefault();

//       // Store hash
//       var hash = this.hash;

//       // Using jQuery's animate() method to add smooth page scroll
//       // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
//       $('html, body').animate({
//         scrollTop: $(hash).offset().top
//       }, 800, function(){

//         // Add hash (#) to URL when done scrolling (default click behavior)
//         window.location.hash = hash;
//       });
//     } // End if
//   });
// });
