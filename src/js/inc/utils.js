export default {
	getUrl : () => {
	  var path = window.location.pathname;
	  path = path.substring(path.lastIndexOf("/")+1,path.lastIndexOf("."));
	  return path;
	},

	activeDashabordItem : (item) => {
	  $("." + item).addClass('active');
	},

	guid : () => {
	  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
	    s4() + '-' + s4() + s4() + s4();
	},

	savedAudio : (audioID) => {
		let audioInput = document.querySelector('#audioID')
		audioInput.value = audioID
	}
}

function s4() {
  return Math.floor((1 + Math.random()) * 0x10000)
    .toString(16)
    .substring(1);
}