export default {
	getUrl : () => {
	  var path = window.location.pathname;
	  path = path.substring(path.lastIndexOf("/")+1,path.lastIndexOf("."));
	  return path;
	},

	activeDashabordItem : (item) => {
	  $('.' + item).addClass('active');
	}
}