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
                <h1><span>Review </span></h1> 
			</div>
            <div class="bread_crums">
                <p id="breadcrumbs"><span><span><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span><a href="">Company</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <strong class="breadcrumb_last" aria-current="page">About Us</strong></span></span></span></p>            </div>
        </div>
    </div>
</div>
		<section class="job-list">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="job-listing-heading">
							<h4>Current openings</h4>
						</div>
					</div>
				</div>
				<div class="carrer-form">
					<div class="row">
						<div class="col-md-8" style="border-right: 1px solid #ddd;">
							<p class="desc-job">With institute, you get a chance to do what you LOVE. Either Beginner or experienced professionals, if you have the passion to perform, Croma learning Campus is the just the right place to gain utmost confidence and harness the creativity. Come and make career excellence a habit with us!</p>
							<div class="job-listing">
							@if($careers)
								@foreach($careers as $career)
								<div class="job-listing-one">
									<div class="job-course-img">
										<img src="{{asset('public/image/careers-job.webp')}}" alt="{{$career->job_title}}">
									</div>
									<div class="cors-desc cors-desc2">
										<div class="cors-heading">
											<div class="job-leftsection">
												<h4>{{$career->job_title}}</h4>
										<div class="cors-description">
											<strong>Position</strong><span> - {{$career->position}}</span> 
											 
										</div>
										<div class="job-exsala">
											<div class="job-exp">
												<i class="fa fa-briefcase"></i>
												<strong>Exprience</strong>
												<span>{{$career->exp_from}}-{{$career->exp_to}} Years</span>
											</div>
											<div class="job-salary">
												<i class="fa fa-rupee"></i>
												<strong>Salary - </strong>
												<span>Not Disclosed</span>
											</div>
											<div class="job-location">
												<i class="fa fa-map-marker"></i>
												<strong>Location</strong>
												<span>Noida</span>
											</div>
										</div>
											</div>
											<span class="date-post">
												  <?php echo date('j<\s\u\p>S</\s\u\p> M Y', strtotime($career->updated_at));   ?>
											</span>
										</div>
										<div class="jobbrief">
											<div>
												<strong>Description :</strong>
												<p>{{$career->description}}</p>	
											</div>											
											<div class="jobs-button">
					<button class="frsbtnid"><a href="javascript:void()" style="color:#fff; text-decoration:none" data-toggle="modal" data-target="#Applynow_<?php echo $career->id; ?>">APPLY NOW</a></button>
									 
											</div>
										</div>
									</div>
								</div>


								<div class="popup-class-div modal fade" id="Applynow_<?php echo $career->id; ?>" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true">
								<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-body">
								<div class="mdlImg">
								<img src="{{asset('public/image/Enroll_Now.png')}}">
								</div>
								<div class="mdl-field-frm">
								<div class="successmessage"></div><div class="errormessage"></div>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
								<div class="frm-hdg">
								 
								<h4 id="modal-heading"> {{$career->job_title}}</h4>
								</div>
								<form action="" method="post" onsubmit="return contactController.saveApplyJob(this)">

								<input type="hidden" name="from" value="<?php if(!empty(Request::segment(1))){ echo ucwords(Request::segment(1)); }else{ echo "Home Page"; }?>">
								<input type="hidden" name="jobtitle" value="{{$career->job_title}}" >				 
								<input type="text" name="name" value="" placeholder="Enter Name">
								<input type="text" name="email" value="" placeholder="Enter E-mail">
								<div class="valide-text">
                                <div class="drop-number">
                                
                                <select name="code" class="choosecode">
                                 
                                </select>
                                <input type="tel" name="phone"  maxlength="16"  onkeypress="return isNumericKeyCheck(event);" placeholder="Enter Phone no " >	
                                </div>
                                </div>

								<input type="hidden" name="technology" value="{{$career->position}}"  >	
								<input type="file" name="resume" accept=".pdf,.docx">	

								<input type="reset" class="resetData">						
								<button type="submit" class="modal-placement-button" name="submit" >Submit</button>   
								</form>
								</div>
								</div>
								</div>
								</div>
								</div>
								
								
								@endforeach
								@endif
								 
								  
							 
							</div>
						</div>
						<div class="col-md-4">
							<div class="fix-frm-enq job-sticky carrer-form-clear">
								<div class="form-contact">
									<div class="form-column">
										<strong>Quick enquiry</strong>
										<form action="" method="post" onsubmit="return contactController.dataSaveRight(this)">
									
									 
										<input type="text" name="name" placeholder="Enter Name">
										<input type="text" name="email" placeholder="Enter Email">	
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
										
										
										 <input type="text" name="course" maxlength="32" placeholder="Enter Course">
										<textarea name="message" placeholder="Enter remark"></textarea>
										<input type="reset" class="resetData">	
										<button type="submit" class="moreButtonId" >Submit</button>
									</form>						
									</div>
									<div class="india-side-row">
								 
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