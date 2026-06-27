  @extends('site.layouts.app')
@section('title')
@if(!empty($coursesdetails->title))	 
 {{$coursesdetails->title}}; 
@else
	Corporate Academy India's No.1 IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection 
@section('keyword')
@if(!empty($coursesdetails->meta_keyword))
	{{$coursesdetails->meta_keywords}};
@else
	Corporate Academy India's No.1 IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection
@section('description')
@if(!empty($coursesdetails->meta_description))
{{$coursesdetails->meta_description}};
@else
	Corporate Academy India's No.1 best IT Training Institute in Noida | Delhi | Gurgaon for Industrial Training. We conducts IT Software, Hardware, Network &amp; Security Courses training. Corporate Trainer commands all training program. Week Days, Weekend, 6 Week, 6 Months Industrial Training are available
@endif
@endsection
@section('content')
<div class="main">	
		 <div class="top-banner">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs">
            <div class="top-banner-title">
                <h1><span>Contact Us </span></h1> 
			</div>
            <div class="bread_crums">
                <p id="breadcrumbs"><span><span><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span><a href="">Company</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <strong class="breadcrumb_last" aria-current="page">About Us</strong></span></span></span></p>            </div>
        </div>
    </div>
</div>

 

		<section class="solution-form">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-12">
						<div class="solution">
							<div class="solu-img">
								<img src="{{asset('public/image/Corporate.png')}}">
							</div>
							<div class="cor-ler-sol">
								<strong>Corporate Academy Offical </strong>
								<p><i>Corporate Learning</i></p>
							</div>
							<div class="mail&number">
								<p>G-13, Sector-3 Noida (India)</p>
								<p>Phone (India) : +91-8800182225</p>
								<p>WhatsApp : +91-8800182225</p>
							</div>
						</div>
						</div>
						
						<div class="col-md-6 col-12">
						<div class="solution1">
							<div class="solu-img">
								<img src="{{asset('public/image/Course.png')}}">
							</div>
							<div class="cor-ler-sol">
								<strong>Head Branch :-</strong>
								<p><i>Corporate Learning:-</i></p>
							</div>
							<div class="mail&number">
								<p>1,2,3,4 Badarpur  New Delhi 110044 (India)</p>
								<p>Phone (India) : +91-8800182225</p>
								<p>WhatsApp : +91-8800182225</p>
							</div>
						</div>
						
					</div>
						<div class="col-md-6 col-12">
						<div class="solution1">
							<div class="solu-img">
								<img src="{{asset('public/image/Course.png')}}">
							</div>
							<div class="cor-ler-sol">
								<strong>International Branch:-</strong>
								<p><i>Germany:-</i></p>
							</div>
							<div class="mail&number">
								<p>Limbecker Platz 7, 45147 Essen, Germany.</p>
								<p>Phone (India) : +91-8800182225</p>
								<p>WhatsApp : +91-8800182225</p>
							</div>
						</div>
						
					</div>
					
					<div class="col-md-6 col-12">
						<div class="solution1">
							<div class="solu-img">
								<img src="{{asset('public/image/Course.png')}}">
							</div>
							<div class="cor-ler-sol">
								<strong>International Branch:-</strong>
								<p><i>Dubai:-</i></p>
							</div>
							<div class="mail&number">
								<p>212, Burlington Tower, Business Bay, Dubai</p>
								<p>Phone (India) : +91-8800182225</p>
								<p>WhatsApp : +91-8800182225</p>
							</div>
						</div>
						
					</div>
					 
					 <div class="col-md-6 col-12">
						<div class="solution1">
							<div class="solu-img">
								<img src="{{asset('public/image/Course.png')}}">
							</div>
							<div class="cor-ler-sol">
								<strong>Corporate Academy</strong>
								<p><i>Registration office</i></p>
							</div>
							<div class="mail&number">
								<p>Building NO : H-324, (BA)
								Faridabad, Haryana, 121003 (India)</p>
								<p>Phone (India) : +91-8800182225</p>
								<p>WhatsApp : +91-8800182225</p>
							</div>, 
						</div>
						
					</div>
				</div>
			</div>
		</section>

		<section class="map-container">
			<div class="container">
				<div class="row">
					 
					<div class="col-md-6">
						<div class="google-map">
							<strong>Reach to Us: </strong> 
							 
							
							<iframe style="width:100%;height:500px"
			frameborder="0" scrolling="no" style="border:0"
			src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAPFOcLOlCcBCtp764h9HflPfA56VlCFo0&q=delhi" allowfullscreen   width="520" height="275" frameborder="0" style="border:0;">
			</iframe>
						</div>
					</div>
					
					<div class="col-md-6 col-12">
						<div class="contact-query">
							<div class="contact-query-img">
								<img src="{{asset('public/image/Form.png')}}">
							</div>
							<div class="contact-query-heading">
								<h4>Let's Resolve Your Query</h4>
							</div>
							<div class="contact-query-form">
								 
								<form action="" method="post" onsubmit="return contactController.dataSaveRight(this)" autocomplete="off">
								 
									 
									<input type="text"  name="name" placeholder="Enter Name*">
									<input type="text" name="email" placeholder="Enter E-mail*">	 
									<input type="text" name="course" placeholder="Enter Course*">	 
									<div class="code-phone">
									<div class="code-drop-down d-flex">
									<div class="arrow-frm">
									<input class="countryCode" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
									<input type="hidden" class="form-control countrycodeIntCode" name="code" value="" >
									<div class="append_countryCode"></div>
									</div>
									<div class="pne-div w-100">  
									<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
									</div>
									</div>
									</div>
									
									<input type="reset" class="resetData">	
									<textarea name="message" placeholder="Message Details"></textarea>
									<input type="submit" name="SEND MESSAGE" >
									</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		  	 
	</div>
	@endsection