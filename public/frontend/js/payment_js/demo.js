// $("body").append('<div class="demo-settings"><div class="demo-settings-toggle"><i class="ion ion-gear-a"></i></div><div class="demo-settings-options"><ul><li class="demo-toggle-skin" style="background-color: #461B93;" title="Default"></li><li class="demo-toggle-skin" style="background-color: #F73F52;" title="Red"></li><li class="demo-toggle-skin" style="background-color: #71397C;" title="Purple"></li><li class="demo-toggle-skin" style="background-color: #626EEF;" title="Blue"></li><li class="demo-toggle-skin" style="background-color: #FC624D;" title="Orange"></li></ul></div></div>');
//
// var skin = function(color) {
// 	$("#skin-css").remove();
// 	if(color == 'default') return;
// 	$("head").append($("<link/>", {
// 		rel: 'stylesheet',
// 		href: 'assets/css/skins/' + color + '.css',
// 		id: 'skin-css'
// 	}));
// }
//
// $(".demo-settings-toggle").on("click", function() {
// 	if($(".demo-settings")[0].classList.contains("active")) {
// 	  $(".demo-settings")[0].classList.remove('active');
// 	}else{
// 	  $(".demo-settings")[0].classList += ' active';
// 	}
// });
//
// if(localStorage.getItem("skin")) {
// 	skin(localStorage.getItem("skin"));
// }
//
// $(".demo-toggle-skin").each(function(i) {
// 	let me = $(this);
// 	me.on("click", function(e) {
// 		let _this = e.target;
// 		localStorage.removeItem("skin");
// 		localStorage.setItem("skin", _this.attributes.title.nodeValue.toLowerCase());
// 	 	skin(_this.attributes.title.nodeValue.toLowerCase());
// 	});
//  });
//
