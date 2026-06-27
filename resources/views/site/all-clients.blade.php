 @extends('site.layouts.app')
@section('title')
@if(!empty($coursesdetails->title))	 
 {{$coursesdetails->title}}; 
@else
	Corporate Academy India's No.1 Best IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection 
@section('keyword')
@if(!empty($coursesdetails->meta_keyword))
	{{$coursesdetails->meta_keywords}};
@else
	Corporate Academy India's No.1 Best IT Training Institute in Noida | Delhi | Gurgaon
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
	<div class="top-banner">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs">
            <div class="top-banner-title">
                <h1><span>Clients </span></h1> 
			</div>
            <div class="bread_crums">
                <p id="breadcrumbs"><span><span><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span><a href="{{url('clients')}}">Clients</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <strong class="breadcrumb_last" aria-current="page">Clients</strong></span></span></span></p>            </div>
        </div>
    </div>
</div>
		<section class="clnt-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="client-box">
							<div class="client-item">
								<strong>12 To 50 Lakhs</strong>
								<p>Highest Salary Offered</p>
							</div>
							<div class="client-item">
								<strong>30% to 60%</strong>
								<p>Average Salary Hike</p>
							</div>
							<div class="client-item">
								<strong>30+</strong>
								<p>Hiring Partners</p>
							</div>
							<div class="client-item">
								<strong>50+</strong>
								<p>Placed in MNC & Pvt.Org</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="client-place-scn">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="heading">
							<h3>OUR PLACEMENT EMPLOYERS</h3>
						</div>
					</div>
				</div>
				<div class="row">					
					<div class="col-md-9">
						<div class="clnt-main-lst">
							<div class="owl-carousel owl-theme allclients">
							    <div class="item">
							    	<div class="clients-logo">
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/flipkart.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/magic-software.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/imetus.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/qualix.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/AON.png')}}">
							    		</div>
							    	</div>
								</div>
								  <div class="item">
							    	<div class="clients-logo">
								    	<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/delote.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/accenture.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/Microsoft.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/amazon.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/delote.png')}}">
							    		</div>
							    	</div>
							    </div>
							    <div class="item">
							    	<div class="clients-logo">
								    	<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/JKT.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/amazon.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/crestech.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/crmnext.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/dell.png')}}">
							    		</div>
							    	</div>
							    </div>
							    <div class="item">
							    	<div class="clients-logo">
								    	<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/ebix.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/global.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/Hexa.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/infosys.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/mercer.png')}}">
							    		</div>
							    	</div>
							    </div>
							    <div class="item">
							    	<div class="clients-logo">
								    	<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/Metlife.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/mmt.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/nagarro.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/NIIT.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/qualix.png')}}">
							    		</div>
							    	</div>
							    </div>
							    <div class="item">
							    	<div class="clients-logo">
								    	<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/SIEMENS.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/snapdeal.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/tech-mahindra.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/thinksys.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/Timenext.png')}}">
							    		</div>
							    	</div>
							    </div>
							    <div class="item">
							    	<div class="clients-logo">
								    	<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/wipro.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/Xpotech.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/HCL.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/genpact.png')}}">
							    		</div>
							    		<div class="clnt-logo">
							    			<img src="{{asset('public/image/partners/ebay.png')}}">
							    		</div>
							    	</div>
							    </div>
							     
							   
							    
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="clientdropquery">
							<div class="clientdropquery-heading">
								<h5>Quick enquiry</h5>
							</div>
							<form action="" method="post" onsubmit="return contactController.dataSaveRight(this)" autocomplete ="off">
								 
								<input type="text" name="name*" placeholder="Enter Name*">
								<input type="text" name="email*" placeholder="Enter E-mail*">
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
								
								
								<input type="text" name="course" placeholder="Enter Course*">								 
							 
								<input type="reset" class="resetData">	
								<input type="submit" value="SUBMIT" class="btnShowFrm">
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

	 

	 


		 
		
	</div>
	
	 
@endsection

 