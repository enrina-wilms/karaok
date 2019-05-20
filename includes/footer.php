  <!-- Footer -->
  <footer class="footer text-center">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-4 mb-5 mb-lg-0">
  				<img src="../images/logo-karaoke.png" class="image-fluid" style="width:200px;">
  			</div>
  			<div class="col-md-4 mb-5 mb-lg-0">
  				<h4 class="text-uppercase mb-4">Follow Us</h4>
  				<ul class="list-inline mb-0">
  					<li class="list-inline-item">
  						<a class="btn btn-outline-light btn-social text-center" href="https://www.facebook.com/singkingkaraoke/" target="_blank">
  							<i class="fab fa-fw fa-facebook-f"></i>
  						</a>
  					</li>
  					<li class="list-inline-item">
  						<a class="btn btn-outline-light btn-social text-center" href="https://www.youtube.com/user/singkingkaraoke" target="_blank">
  							<i class="fab fa-youtube"></i>
  						</a>
  					</li>
  					<li class="list-inline-item">
  						<a class="btn btn-outline-light btn-social text-center" href="https://www.instagram.com/singkingkaraokeofficial" target="_blank">
  							<i class="fab fa-instagram"></i>
  						</a>
  					</li>
  					<li class="list-inline-item">
  						<a class="btn btn-outline-light btn-social text-center" href="https://github.com/enrina-wilms" target="_blank">
  							<i class="fab fa-github"></i>
  						</a>
  					</li>
  					<li class="list-inline-item">
  						<a class="btn btn-outline-light btn-social text-center" href="https://www.linkedin.com/in/eawilms/" target="_blank">
  							<i class="fab fa-linkedin-in"></i>
  						</a>
  					</li>
  				</ul>
  			</div>
  			<div class="col-md-4">
  				<h4 class="text-uppercase mb-4">Subscribe to Us</h4>
  				<form class="input-group">
  					<input type="text" class="form-control form-control-sm" placeholder="Your email address" aria-label="Your email" aria-describedby="basic-addon2">
  				</form>
  			</div>
  		</div>
  	</div>
  </footer>

  <div class="copyright py-4 text-center text-white">
  	<div class="container">
  		<small class="footer-name-text">© 2019 All Rights Reserved. | Web Development and Design by <a href="http://enrinawilms.com">Enrina Wilms</a></small>
  	</div>
  </div>


  <!-- FB SHARE -->
  <script>
  	var fbShareBtn = document.getElementsByClassName("btn-fbShare");

  	for (var i = 0; i < fbShareBtn.length; i++) {

  		fbShareBtn[i].addEventListener('click', fbShareVideo, false)

  	}

  	function fbShareVideo(e) {
  		var youtubeVideoID = e.target.getAttribute('video-id');
  		FB.ui({
  				method: 'share',
  				display: 'popup',
  				href: "https://www.youtube.com/watch?v=" + youtubeVideoID,
  			}, function(response) {}

  		);
  	}

  	document.getElementById('shareBtn').onclick = function() {
  		FB.ui({
  			method: 'share',
  			display: 'popup',
  			href: window.location.href,
  		}, function(response) {});
  	}

  	window.fbAsyncInit = function() {
  		FB.init({
  			appId: '415837849200154',
  			autoLogAppEvents: true,
  			xfbml: true,
  			version: 'v3.2'
  		});
  	};

  </script>
  <script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  </body>

  </html>
