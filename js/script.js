
document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    href: 'https://developers.facebook.com/docs/',
  }, function(response){});
}


  window.fbAsyncInit = function() {
    FB.init({
      appId            : '415837849200154',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.2'
    });
  };
