<?php
    send_form_data();
?>

<div class="wrap-container">
	<div class="zerogrid">
		<div class="row">
			<div class="row">
				<div class="col-1-2">
					<a href="index.html">
						<img src="images/logo.png" />
					</a>
				</div>
				<div class="col-1-2">
					<form id="form-container" action="#" class="f-right">
						<a class="search-submit-button" href="javascript:void(0)">
							<i class="fa fa-search"></i>
						</a>
						<div id="searchtext">
							<input type="text" id="s" name="s" placeholder="Search Something..." />
						</div>
					</form>
				</div>
			</div>
			<div class="crumbs">
				<ul>
					<li>
						<a href="index.html">Home</a>
					</li>
					<li>
						<a href="gallery.html">Contact</a>
					</li>
				</ul>
			</div>
			<h1 class="color-red" style="margin: 20px 0">Contact</h1>
			<div class="col-full">
				<div class='embed-container maps'>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.289259162295!2d-120.7989351!3d37.5246781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8091042b3386acd7%3A0x3b4a4cedc60363dd!2sMain+St%2C+Denair%2C+CA+95316%2C+Hoa+K%E1%BB%B3!5e0!3m2!1svi!2s!4v1434016649434"
					    width="100%" height="450" frameborder="0" style="border:0"></iframe>
				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col">
					<h3 class="color-blue" style="margin: 20px 0">Contact Info</h3>
					<span>SED UT PERSPICIATIS UNDE OMNIS ISTE NATUS ERROR SIT VOLUPTATEM ACCUSANTIUM DOLOREMQUE LAUDANTIUM, TOTAM REM APERIAM.</span>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque la udantium, totam rem aperiam,
						eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
						voluptatem quia.</p>
					<p>JL.Kemacetan timur no.23. block.Q3
						<br /> Jakarta-Indonesia
					</p>
					<p>+6221 888 888 90
						<br /> +6221 888 88891</p>
					<p>info@yourdomain.com</p>
				</div>
			</div>
			<div class="col-2-3">
				<div class="wrap-col">
					<div class="contact">
						<h3 class="color-green" style="margin: 20px 0 20px 30px">Contact Form</h3>
						<div id="contact_form">
							<form name="form1" id="ff" method="POST">
								<label class="row">
									<div class="col-1-2">
										<div class="wrap-col">
											<input type="text" name="name" id="name" placeholder="Enter name" required="required" />
										</div>
									</div>
									<div class="col-1-2">
										<div class="wrap-col">
											<input type="email" name="email" id="email" placeholder="Enter email" required="required" />
										</div>
									</div>
								</label>
								<label class="row">
									<div class="wrap-col">
										<input type="text" name="subject" id="subject" placeholder="Subject" required="required" />
									</div>
								</label>
								<label class="row">
									<div class="wrap-col">
										<textarea name="message" id="message" class="form-control" rows="4" cols="25" required="required" placeholder="Message"></textarea>
									</div>
								</label>
								<center>
									<input class="sendButton" type="submit" name="submit" value="Submit" />
								</center>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>