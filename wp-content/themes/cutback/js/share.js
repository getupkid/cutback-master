;(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$ = jQuery;

$(function() {
	
	$('.fb-share-button').css({ left: '-9999em', opacity: 0});
	
	i = 0;
	
	$('.share-links').click(function() {
		if(i == 0) {
			$('.fb-share-button').css({
				left: 'auto',
			}).animate({
				opacity: 1
			},200);
			i = 1;
		} else {
			$('.fb-share-button').animate({
				opacity: 0
			},200, function() {
				$('.fb-share-button').css('left','-9999em');
			});
			i = 0;
		}
		return false;
	});
	
});
