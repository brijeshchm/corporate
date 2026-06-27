@extends('site.layouts.app')
@section('title')
@if(!empty($coursesdetails->title))	 
 {{$coursesdetails->title}}; 
@else
	India's No.1 IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection 
@section('keyword')
@if(!empty($coursesdetails->meta_keyword))
	{{$coursesdetails->meta_keywords}};
@else
	India's No.1 Best IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection
@section('description')
@if(!empty($coursesdetails->meta_description))
{{$coursesdetails->meta_description}};
@else
	India's No.1 IT Training Institute in Noida | Delhi | Gurgaon for Industrial Training. We conducts IT Software, Hardware, Network &amp; Security Courses training. Corporate Trainer commands all training program. Week Days, Weekend, 6 Week, 6 Months Industrial Training are available
@endif
@endsection
@section('content')	
	 <div class="top-banner">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs">
            <div class="top-banner-title">
                <h1><span>FAQ's </span></h1> 
			</div>
            <div class="bread_crums">
                <p id="breadcrumbs"><span><span><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span><a href="{{url('faq')}}">FAQ's</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <strong class="breadcrumb_last" aria-current="page">FAQ's</strong></span></span></span></p>            </div>
        </div>
    </div>
</div>
			<style>
			
			.faq-ask-question-content h4{
			    font-size: 15px;
			}
			</style>
			 
		<section class="content-faq">
			
		
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="faq-box-body pb-3">										
							 
								 

								<div class="row mt-5 mb-5">
								<div class="col-lg-8 col-md-6">
								<div class="faq-accordian">
								<div class="faq-accordion" id="faqlistMain">
								
								@if(!empty($FAQs))
									<?php $i=0;?>
									@foreach($FAQs as $faq)
									<?php  $i++;?>
								<div class="card">
								<div class="card-header" id="faqheadingOne">
								<h2 class="mb-0">
								<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#faq_<?php echo $faq->id ?>">
								<span>{{$faq->question}}</span>
								<i class="fa fa-plus"></i> 
								</button>						                   							
								</h2>
								</div>
								<div id="faq_<?php echo $faq->id ?>" class="collapse <?php if($i==1){ echo "show"; } ?>" aria-labelledby="faqheadingOne" data-parent="#faqlistMain">
								<div class="card-body">
								<p>{{$faq->answer}}</p>
								</div>
								</div>
								</div>
								@endforeach
								@endif
								
							 

								</div>
								</div>
								</div>
								<div class="col-lg-4 col-md-6">
								<div class="faq-form enq-form">
								<div class="faq-heading">
								<h3>Still have questions? Contact us We’d be Happy to help</h3>
								</div>

								<div class="faq-fix-frm-enq fix-frm-enq">
								<div class="form-contact">
								<div class="form-column">
								<strong>Quick enquiry</strong>
							<form action="" method="post" onsubmit="return contactController.dataSaveRight(this)" autocomplete="off">
									
									<input type="text"  name="name" placeholder="Enter name*">
									<input type="text" name="email" placeholder="Enter E-mail*">	 

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
									<input type="text" name="course" value=""> 
									<input type="reset" class="resetData">	
									<textarea name="message" placeholder="Message Details"></textarea>
									<button type="submit" name="submit" >Submit</button>
									</form>						
								</div>
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
 

@endsection