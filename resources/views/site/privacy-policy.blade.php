@extends('site.layouts.app')
@section('title')
@if(!empty($coursesdetails->title))	 
 {{$coursesdetails->title}}; 
@else
	Institute- Best IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection 
@section('keyword')
@if(!empty($coursesdetails->meta_keyword))
	{{$coursesdetails->meta_keywords}};
@else
	Institute: Best IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection
@section('description')
@if(!empty($coursesdetails->meta_description))
{{$coursesdetails->meta_description}};
@else
	Institute Best IT Training Institute in Noida | Delhi | Gurgaon for Industrial Training. We conducts IT Software, Hardware, Network &amp; Security Courses training. Corporate Trainer commands all training program. Week Days, Weekend, 6 Week, 6 Months Industrial Training are available
@endif
@endsection
@section('content')
<div class="main">	
	<div class="top-banner">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs">
            <div class="top-banner-title">
                <h1><span>Privacy Policy </span></h1> 
			</div>
            <div class="bread_crums">
                <p id="breadcrumbs"><span><span><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span><a href="{{url('privacy-policy')}}">Privacy Policy</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <strong class="breadcrumb_last" aria-current="page">Privacy Policy</strong></span></span></span></p>            </div>
        </div>
    </div>
</div>
		<section class="ans-place privacy-policy-section">
			<div class="container">
			   <div class="placement-section">
				<div class="row">
					<div class="col-md-9">
						<div class="ans-place-content">
							<div class="ans-place-header">
								<h3>Privacy Policy</h3>
								<p>At Corporates Academy, we are committed to respecting your privacy and safeguarding your personal information. This policy explains how we collect, use, and protect your data when you interact with our website. Our mission is to provide a secure and transparent experience while ensuring compliance with legal privacy standards.</p>
							</div>
							<div class="plmt-desc-box">

							<h6>Information We Gather</h6>
							<div class="ans-place-header">
							<p class="mb-2">We may collect and store the following types of information: </p>
				
							<ul class="policy-cc">
							<li>Personal details like your name, job title, and contact information (e.g., email address). </li>
							<li>Demographic data such as location, preferences, and interests.</li>
							<li>Information about your inquiries, feedback, or participation in surveys and offers.</li>
						

							</ul>
							<p>We implement advanced security measures to ensure your information remains confidential and is only accessed by authorized personnel. Rest assured, we are committed to maintaining the integrity and safety of your data. </p>
							</div>


											<h6>Cookies and Their Purpose</h6>
											<div class="ans-place-header">
											<p class="mb-2">Cookies are small files placed on your device to improve your browsing experience. They allow our website to recognize returning visitors, tailor content to your preferences, and enhance functionality.</p>
											<p class="mb-2">We use cookies to analyze user behavior, monitor website performance, and identify popular sections of our site. This helps us continually optimize your experience. The data collected is used for analysis purposes and is not stored long-term.</p>
											<p class="mb-2">You have the option to disable cookies through your browser settings. Please note that turning off cookies may affect certain features and functionalities of the website.</p>
										
											</div>

											<h6>Third-Party Links</h6>
											<div class="ans-place-header">
											<p class="mb-2">Our website may include links to external websites for your convenience. However, once you leave our platform, we are not responsible for the content, privacy practices, or data security of those sites.</p>
											<p>We recommend reviewing the privacy policies of any third-party sites you visit, as our policy does not apply to external platforms.</p>


											</div>
											<h6>Your Control Over Personal Information
You can manage how your personal data is collected and used by taking the following actions:</h6>
											<div class="ans-place-header">
											<p class="mb-2">When filling out forms on our website, check the appropriate boxes to control how your data will be used. </p>

 
 										<ul class="policy-cc">
											<li> If you have previously agreed to receive marketing communications, you can opt-out at any time by emailing us at corporate@gmail.com.
We do not share, sell, or rent your personal information to third parties without your consent, except when required by law. If you suspect any inaccuracies in your data, please contact us, and we will correct or update it promptly.
</li>
										
											</ul>
											</div>
											<h6>Scope of This Privacy Policy</h6>
											<div class="ans-place-header">
											<p>This policy exclusively applies to the data collected through our website and does not cover any information obtained offline or through other channels.</p>

											 
											</div>
										
										
							</div>
								<h6>Your Agreement</h6>
											<div class="ans-place-header">
											<p class="mb-2">By using our website, you agree to the terms outlined in this Privacy Policy. Any updates or changes to the policy will be reflected on this page to keep you informed.</p>


											</div>
											
						</div>
					</div>
					<div class="col-md-3">
						<div class="ans-place-right">
							 
							<div class="form-contact pi-place">
								 
								<div class="form-column">
									<strong>Quick enquiry</strong>
									<form action="" method="post" onsubmit="return contactController.dataSaveRight(this)">
									
										<input type="hidden" name="from" value="Placement">	
										<input type="hidden" name="frm_title" value="Side Bar Placement" >
										<input type="text" name="name" placeholder="Enter Name">
										<input type="text" name="email" placeholder="Enter Email">
																					  
											<div class="code-phone">
											<div class="code-drop-down d-flex">
											<div class="arrow-frm">
											<input class="intCntCode" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
											<input type="hidden" class="form-control codeIntCode" name="code" value="" >
											<div class="append_countryCode"></div>
											</div>
											<div class="pne-div w-100">  
											<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
											</div>
											</div>
											</div> 
										 <input type="text" name="course" maxlength="32" placeholder="Enter Course">
										<textarea name="message" placeholder="Enter remark"></textarea>
										<input type="reset" class="resetData">	
										<button type="submit" class="moreButtonId mt-3" >Submit</button>
									</form>						
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</section>
		  
	</div>
	
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<script>
 
	  		
$(document).on('change','.selecttechnology',function(e){		
			e.preventDefault();
			$this = $(this);	 
			
			if($this.val()=='') return;		 
				$.ajax({
					"url":"/searchplacement/"+$this.val(),
					"type":"post",
					"success":function(data){	
 					
						if(data.length>0){
							$('.plmt-desc-box').html(data);
								 
						}
						 
					}
				});
			 
	 
		});
     
    $('.selecttechnology').select2({ placeholder: "Search Technology",});
    $('.select-technology').select2();
	
	 
 
</script>


<script>
$(document).ready(function(){
 
 var _token = $('input[name="_token"]').val();

 load_data('', _token);

 function load_data(id="", _token)
 {
  $.ajax({
   url:"placement/placementLoadData",
   method:"POST",
   data:{id:id, _token:_token},
   success:function(data)
   {
    $('#load_more_button').remove();
    $('#post_data').append(data);
   }
  })
 }

 $(document).on('click', '#load_more_button', function(){
  var id = $(this).data('id');
  $('#load_more_button').html('<b>Loading...</b>');
  load_data(id, _token);
 });

});
</script>
@endsection