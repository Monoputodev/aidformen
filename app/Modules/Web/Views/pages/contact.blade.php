@extends('Web::layouts.master') 
@section('body') 

<div id="contact" class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					
					<div class="col-sm-8 col-md-8">
						<!-- MAPS -->
						<div class="maps-wraper">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.793445808714!2d90.39619241477051!3d23.861467384534716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c4212cd3502d%3A0xbe4c67713057c273!2sAID%20for%20MEN!5e0!3m2!1sen!2sbd!4v1589689141986!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
						<div class="spacer-90"></div>
					</div>

					<div class="col-sm-4 col-md-4">
						<h2 class="section-heading">
							Contact <span>Details</span>
						</h2>

						<div class="rs-icon-info">
							<div class="info-icon">
								<i class="fa fa-map-marker"></i>
							</div>
							<div class="info-text">House #06, Road # 3/F, Sector #09,Uttara Model Town, Dhaka-1230</div>
						</div>

						<div class="rs-icon-info">
							<div class="info-icon">
								<i class="fa fa-envelope"></i>
							</div>
							<div class="info-text"><a href="mailto:info@aidformen.com">info@aidformen.com</a></div>
						</div>

						<div class="rs-icon-info">
							<div class="info-icon">
								<i class="fa fa-phone"></i>
							</div>
							<div class="info-text"><a href="tel:+01944449681">+88 01944-449681 -9</a></div>
						</div>

						
					</div>

					<div class="clearfix"></div>
					
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading">
							Send a <span>Message</span>
						</h2>
						<div class="section-subheading">Feel free to share your problem with us. We are very helpfull for Men rights.</div>
						<div class="margin-bottom-50"></div>

						<div class="content">
							<form action="#" class="form-contact" data-toggle="validator" novalidate="true">
								<div class="row">
									<div class="col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" id="p_name" placeholder="Enter Name" required="">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-sm-6 col-md-6">
										<div class="form-group">
											<input type="email" class="form-control" id="p_email" placeholder="Enter Email" required="">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" id="p_subject" placeholder="Subject">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" id="p_phone" placeholder="Enter Phone Number">
											<div class="help-block with-errors"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									 <textarea id="p_message" class="form-control" rows="6" placeholder="Enter Your Message"></textarea>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group">
									<div id="success"></div>
									<button type="button" class="btn btn-primary">SEND MESSAGE</button>
								</div>
							</form>
							<div class="margin-bottom-50"></div>
							<p><em>Note: Email & Phone Number Are Must Be Required.</em></p>
						 </div>
					</div>

				</div>
				
			</div>
		</div>
	</div>	
@endsection