var $ = require("jquery");
import utils from './inc/utils.js';
import bsn from 'bootstrap.native';
import './inc/audioRecorder';
import './inc/slick.min';

// -----------------------------------------------------------
// ---------------------- Functionality ----------------------
// -----------------------------------------------------------

var currentUrl = utils.getUrl();

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

if (currentUrl.includes('search')) {
  $(".excerpt").text(function(index, currentText) {
     return currentText.substr(0, 50);
  });
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


// toggles between login and sign up
$('.tab a').on('click', function (e) {

  e.preventDefault();

  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');

  var target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();

  $(target).fadeIn(600);

});

if (currentUrl.includes('index')) {
  // Terms and conditions modal
  let tcModal = document.getElementById('tc-modal')
  let tcModalActive = new bsn.Modal(tcModal)

  let tcButton = document.querySelector('#tc-index')
  tcButton.addEventListener('click', () => {

    tcModalActive.show()

  })

}
