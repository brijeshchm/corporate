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
                <h1><span>Terms &amp; Conditions </span></h1> 
			</div>
            <div class="bread_crums">
                <p id="breadcrumbs"><span><span><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span><a href="{{url('terms-conditions')}}">Terms &amp; Conditions</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <strong class="breadcrumb_last" aria-current="page">Terms &amp; Conditions</strong></span></span></span></p>            </div>
        </div>
    </div>
</div>
		<section class="ans-place terms-conditions-section">
			<div class="container">
			   <div class="placement-section">
				<div class="row">
					<div class="col-md-9">
						<div class="ans-place-content">
							<div class="ans-place-header">
								<h3>Terms & Conditons</h3>
								<p>We are excited to introduce our comprehensive placement support program designed to help you craft exceptional resumes, apply for top job opportunities, and prepare for interviews with expert guidance from professionals in leading industries. Welcome to our platform! By accessing and using this website, you agree to abide by the terms outlined below, as well as our Privacy Policy. The terms "we," "our," or "us" refer to Corporate Academy, located at Badarpur. The term "you" refers to visitors and users of this site.</p>
							</div>
							<div class="plmt-desc-box">
								<h6>Conditions for Website Use:</h6>  
								<ul class="policy-cc">
								<li>Your use of this website is subject to the following terms: </li>
								<li>General Information: The content on this site is intended for informational purposes only and is subject to change at any time without prior notice. </li>
								<li>No Guarantees: We and any associated third parties do not guarantee the accuracy, completeness, reliability, or timeliness of the information provided. You accept that such content may have errors, and we disclaim liability for any inaccuracies as permitted by law. </li>
								<li>User Responsibility: Your use of the materials and information on this site is entirely at your own risk. It is your duty to ensure the services or information meet your personal or professional needs.</li>
								<li>Content Ownership: All materials, including text, images, and graphics, are either owned by us or used under license. Reproducing or using this content without authorization is strictly prohibited unless it complies with copyright regulations.</li>
								<li>Trademarks: Any trademarks displayed on this site that are not owned by or licensed to us are fully acknowledged.
Prohibited Use: Unauthorized access or use of this website may lead to legal consequences, including claims for damages or criminal charges.</li>
								<li>Third-Party Links: Our website may include links to external websites for your convenience. We are not responsible for the content, security, or accuracy of these third-party sites.</li>
								<li>Linking Policy: Users must obtain written permission before creating any links to our site from other websites or documents.</li>
								<li>Legal Jurisdiction: Any disputes arising from the use of this website will be governed by the laws of India. </li>
								<li>Referral Benefits: Discounts on courses may be earned through referrals, subject to the terms of our referral program. </li>
							
							
								</ul>
							
							</div>
							<div class="ans-place-header mb-0">
							    <h6>Modifications to Terms</h6>  
								<p class="mb-2">
							We reserve the right to revise these terms at any time by updating the content on this website. Users are encouraged to review the terms regularly. Continued use of the site implies acceptance of any updates or amendments.</p>
							
						</div>
						<div class="ans-place-header mb-0">
							    <h6>Courses and Intellectual Property</h6>  
								<p class="mb-2">
							Training Materials: The courses and resources offered through Corporates Academy may include copyrighted materials from third-party providers. All such content is utilized with appropriate permissions.</p>
							<p>Restrictions: Unauthorized reproduction, sharing, or distribution of training materials is prohibited and may result in legal action.</p>
							<p>Copyright Concerns: If you believe that any content on this website infringes on copyright laws, please contact us at Corporate Academy. We will investigate and take necessary steps to address the issue.</p>
							
						</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="ans-place-right">
							 
							<div class="form-contact pi-place">
							 
								<div class="form-column terms-form">
									<strong>Request more information</strong>
									<form action="" method="post" onsubmit="return contactController.dataSaveRight(this)">
									
										<input type="hidden" name="from" value="Placement">	
										<input type="hidden" name="frm_title" value="Side Bar Placement" >
										<input type="text" name="name" placeholder="Enter Name">
										<input type="text" name="email" placeholder="Enter Email">
										 <div class="phone-text">
                                        <div class="drop-number">
                                        
                                        <select name="code" class="choosecode">
                                        
                                        
                                        </select>
                                        <input type="tel" name="phone"  maxlength="16"  onkeypress="return isNumericKeyCheck(event);" placeholder="Enter Phone no" >	
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
	 
@endsection