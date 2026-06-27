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
		<section class="singlepage-job-list">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="singlepage-job-listing-heading">
							<div class="singlepage-job-listing-heading-line">
								<h5>{{$jobsdetails->title}}<span class="horizontal-line"></span></h5>
							</div>

							<ul>
								<li><i class="fa fa-briefcase"></i>{{$jobsdetails->exp_req}}-{{$jobsdetails->maxexperience}} Year</li>
								<li><i class="fa fa-rupee"></i>Not Disclosed</li>
								<li><i class="fa fa-map-marker"></i>{{$jobsdetails->location}}</li>
							</ul>
						</div>
						<a class="btnShowFrm" href="https://techpratham.com/jobportal/home/jobdetails/<?php echo base64_encode($jobsdetails->jobid); ?>" target="_blank">APPLY NOW</a>
					</div>
				</div>
			</div>
		</section>
		<section class="singlepage-job-desc">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="singlepage-job-desc-left">
							<div class="singlepage-job-desc-left-sections">
								<strong>Job Description : </strong>
								<p>{!!$jobsdetails->description!!}.</p>
							</div>
							<div class="singlepage-job-desc-left-sections">
								<strong>Key & Responsibilities : </strong>
								<p><?php if(!empty($jobsdetails->courses_name)){  echo $jobsdetails->courses_name;	}  	?>,{{$jobsdetails->technology}}.</p>
							</div>
						 
						</div>
					</div>
					<div class="col-md-3">
						<div class="singlepage-job-desc-right">
							<div class="singlepage-job-desc-right-sections">
								<strong>Salary</strong>
								<p>Not Disclosed</p>
							</div>
							<div class="singlepage-job-desc-right-sections">
								<strong>Industry</strong>
								<p>{{$jobsdetails->companyname}}</p>
							</div>
							<div class="singlepage-job-desc-right-sections">
								<strong>Functional Areas</strong>
								<p>{{$jobsdetails->technology}}</p>
							</div>
							<div class="singlepage-job-desc-right-sections">
								<strong>Role</strong>
								<p>{{$jobsdetails->exp_req}}-{{$jobsdetails->maxexperience}} Year</p>
							</div>
							<div class="singlepage-job-desc-right-sections">
								<strong>Empolyment Type</strong>
								<p>Full Time, Permanent</p>
							</div>
							<div class="singlepage-job-desc-right-sections">
								<strong>Education</strong>
								<p>B.Tech</p>
								<p>MBA</p>
								<p>BCA</p>
								<p>MCA</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="singlepage-key-skill">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="singlepage-keyskill-heading-line">
							<h5><i class="fa fa-lightbulb-o"></i>Key Skills <span class="horizontal-line"></span></h5>
						</div>
						<div class="singlepage-key-skill-listing">
							@if(!empty($jobsdetails->courses_name))
							<?php $listjob = explode(',',$jobsdetails->courses_name);
							 
							if(!empty($listjob)){
							foreach($listjob as $key=>$val){
							?>
							<a href="#0"><?php echo  $val; ?></a>
							<?php  } } ?>
							
							@endif
							 <a href="#0">{{$jobsdetails->technology}}</a>
							 
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="singlepage-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="singlepage-keyskill-heading-line">
							<h5><i class="fa fa-address-book-o"></i>Contact Details <span class="horizontal-line"></span></h5>
						</div>
						<div class="singlepage-contact-details">
							<ul>
								<li>
									<strong>Contact Person : </strong>
									<span><?php echo(isset($jobsdetails->c_name)) ? $jobsdetails->c_name :"";  ?></span>
								</li>
								<li>
									<strong>E-mail :</strong>
									<span><?php echo(isset($jobsdetails->c_email)) ? $jobsdetails->c_email :"";  ?></span>
								</li>
							</ul>
						</div>
							<a class="btnShowFrm" href="https://techpratham.com/jobportal/home/jobdetails/<?php echo base64_encode($jobsdetails->jobid); ?>" target="_blank" style="width: 140px;">APPLY NOW</a>
					</div>
				</div>
			</div>
		</section>
		   
	</div>

  	@endsection