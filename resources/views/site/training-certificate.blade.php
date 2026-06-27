  @extends('site.layouts.app')
@section('title')
@if(!empty($coursesdetails->title))	 
 {{$coursesdetails->title}}; 
@else
	Corporate Academy India's No.1 training certificate
@endif
@endsection 
@section('keyword')
@if(!empty($coursesdetails->meta_keyword))
	{{$coursesdetails->meta_keywords}};
@else
	Corporate Academy India's No.1 training certificate
@endif
@endsection
@section('description')
@if(!empty($coursesdetails->meta_description))
{{$coursesdetails->meta_description}};
@else
	Corporate Academy India's No.1 Best IT Training Institute in Noida | Delhi | Gurgaon for Industrial Training. We conducts IT Software, Hardware, Network &amp; Security Courses training. Corporate Trainer commands all training program. Week Days, Weekend, 6 Week, 6 Months Industrial Training are available
@endif
@endsection
@section('content')
<div class="main">		
		<section class="banner-training-certificate" style="height: 299px;">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<div class="head-ban-txt">
								<h1> Your <strong>Certificate </strong><br>
								<strong>Tracking</strong> has been simplified with us!</h1>
							<!--	<a href="#0">View Certificate <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></a>-->
						</div>
					</div>
					<div class="col-md-5">
						<div class="banner-img">
							<img src="public/image/training-banner-img.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="training-certificate-page">
			<ul class="nav nav-tabs gt">
				<li class="nav-item">
					<a href="#get" class="nav-link active" data-toggle="tab">Get Certificate</a>
				</li>
				
				<li class="nav-item">
					<a href="#track" class="nav-link current " data-toggle="tab">Track Certificate</a>
				</li>
			</ul>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="GetTrack">
							<div class="tab-content">
								<div class="tab-pane fade show active" id="get">
									<div class="phone-tracking" id="ret">
										<div class="mobile-track-img">
											<img src="public/image/mobile-track.png" alt="">
										</div>
										<div class="validation">
											<strong>Enter your Phone Number</strong>
											<p>We will send you the 4 digit Verification Code</p>
											<form action="" method="post" onsubmit="return contactController.mobileverifiction(this)"  >
												<label for="mnumber">Mobile</label>
												<input type="tel" name="mobile" maxlength="16" onkeypress="return isNumericKeyCheck(event);" placeholder="Enter Phone no"><br>
												 
												 
												<span class="help-blocks"></span>
												<button class="button3" id="btn-login" type="submit" name="submit">Generate OTP</button>
											</form>
										</div>
									</div>
									<div class="input-otp"></div>
								 
								</div>
								<div class="tab-pane fade" id="track">
									<div class="gc">
										<div class="track-dummy">
											<img src="public/image/svg/Track-Certificate.svg" alt="" width="350">
										</div>
										<div class="gc-tc">
											<div class="gc-heading">
												<h1>Certificate of Completion</h1>
												<p>On the successful completion of the training, get a training certificate as a legitimate proof of your skills that is valid worldwide and helps you to stand ahead of the crowd. So, register for the course, complete it nicely and claim your training certificate today!</p>
											</div>
											<div class="certraid">
												<strong>Enter your Certificate Track ID</strong>
												<p>Please enter Student ID Track Training</p>
												<form action="" method="post" onsubmit="return contactController.getCertificateno(this)"  >
													<input type="text" name="certificateno" value="" placeholder="Enter Certificate XXXX123"><br>	
													<span class="help-block"></span>
													<button class="button3" type="submit" name="submit">Get Certificate</button>
												</form>
											</div>
										</div>
										<div class="student-certificate-here">
											<div class="student-certificate-here-heading">
												<strong>student certificate here</strong>
											</div>
											<div class="student-data">
										 
											</div>
											<div class="tracer">
												<img src="public/image/track-Certificate.png" alt="">
											</div>
										</div>
									</div>
								</div>
							</div>    
						</div>
					</div>
				</div>
			</div>
		</section>
 
	</div>
  
  	@endsection