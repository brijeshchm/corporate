@extends('site.layouts.app')
@section('title')
@if(!empty($coursesdetails->title))	 
 {{$coursesdetails->title}}
@else
	Corporate Academy India's No.1 Best IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection 
@section('keyword')
@if(!empty($coursesdetails->meta_keyword))
	{{$coursesdetails->meta_keyword}}
@else
	Corporate Academy India's No.1 Best IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection
@section('description')
@if(!empty($coursesdetails->meta_description))
{{$coursesdetails->meta_description}}
@else
	Corporate Academy India's No.1 Best IT Training Institute in Noida | Delhi | Gurgaon for Industrial Training. We conducts IT Software, Hardware, Network &amp; Security Courses training. Corporate Trainer commands all training program. Week Days, Weekend, 6 Week, 6 Months Industrial Training are available
@endif
@endsection
@section('content')
<script type="application/ld+json"> {  "@context": "http://schema.org/", "@type": "Review","itemReviewed": {"@type": "Course","name": "<?php if($coursesdetails->course_name){ echo $coursesdetails->course_name; }else{ echo $coursesdetails->title; }  ?>"  },"author": {"@type": "Person","name": "Amit" },"ReviewRating":{"@type":"AggregateRating","ratingValue":"<?php echo number_format((float)$coursesdetails->rating, 2, '.', ''); ?>","ratingCount":"<?php echo $coursesdetails->total_rating; ?>","bestRating":"5"},"publisher": {"@type": "Training","name": "Institute" }} </script>	
<?php

//echo "<pre>";print_r($coursesdetails);
 $htmlfaq="";
if(!empty($coursesdetails->FAQs)){ $FAQs =json_decode($coursesdetails->FAQs); $faqquestion  = unserialize($FAQs->faqq);	
if(!empty($faqquestion)){	
$faqanswer  = unserialize($FAQs->faqa);								 
for($i=0; $i<count($faqquestion); $i++){ ?> 
<?php $htmlfaq .='{"@type":"Question","name":"'.(isset($faqquestion[$i])? $faqquestion[$i]:"").'","acceptedAnswer":{"@type":"Answer","text":"'. (isset($faqanswer[$i])? $faqanswer[$i]:"").'\n"}},'; ?>
<?php } } } ?>
<script type="application/ld+json"> { "@context": "https://schema.org", "@type": "FAQPage", "mainEntity": [<?php echo $htmlfaq ?>]   }</script>
<div class="main"><section class="master-container-page" id="master-container-page"><div class="container"><div class="row"><div class="col-md-8" style="position: inherit;"><div class="mp-device-img" style="background-image: url(public/image/banner-girl2.png);height: 460px;"></div><div class="mp-head-ban-txt"><div class="mp-banner-icon"><img src="{{asset('public/image/mp-icon-banner.png')}}"></div><div class="mp-banner-desc"><h2>@if($coursesdetails->course_name){{$coursesdetails->course_name}} @endif</h2><p><span>Master's Program</span>
<?php 
$rating=$coursesdetails->rating;
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
switch($rating){
case 4:
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
break;
case 4.5:
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
break;
case 4.75:
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
break;
case 4.8:
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
break;
case 4.9:
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
break;
case 5:
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
break;
} ?>
<span>{!!$stars!!}</span><span>{{$coursesdetails->rating}} out of 5 rating votes {{$coursesdetails->total_rating}}</span></p>
</div></div><div class="mp-desc"><p>{{$coursesdetails->course_description}}</p><div class="line"></div></div><div class="mp-explain">
<div class="mp-fees-cov"><div class="rupee-sign"><span><img src="public/image/svg/indian-rupee-symbol.svg" width="15"></span></div>
<div class="mp-device-fees"><strong>INR {{$coursesdetails->fees}}</strong><p> Excluding GST</p></div></div><div class="mp-fees-cov"><div class="rupee-sign"><span><img src="{{asset('public/image/svg/marster-Placement.svg')}}" width="35"></span></div><div class="mp-device-fees"><strong>100% Placement</strong><p>Assistance</p></div></div><div class="mp-fees-cov"><div class="rupee-sign"><span><img src="{{asset('public/image/svg/Ranked.svg')}}" width="30"></span></div><div class="mp-device-fees"><p style="margin-bottom: 6px;">Ranked#2 among Top Full-Time</p>
<p>@if($coursesdetails->course_name){{$coursesdetails->course_name}} @endif in India- 2010-21</p></div></div></div>
<div class="mp-format"><div class="mp-date-format"><img src="{{asset('public/image/svg/Start-Date.svg')}}" width="40"></div><div class="mp-schedule">
<strong>Start Date : <span><?php
$sunday = strtotime("last monday midnight");
$now = strtotime("now");
$saturday = strtotime("next monday", $sunday);
echo date('j<\s\u\p>S</\s\u\p> M Y',$saturday);
?></span></strong><strong>Duration : <span>{{$coursesdetails->course_duration}} Months</span></strong><br><strong>Format : <span>Live Online /Self-Paced/Classroom</span></strong></div></div><div class="mp-buttons"><button class="btnShowFrm popupDwnId" data-title="APPLY NOW" data-button="APPLY NOW">APPLY NOW</button><button class="moreButtonId frmModalPopup" data-title="GET IN TOUCH" data-button="Submit">GET IN TOUCH</button></div></div>
<div class="col-md-4"><div class="right-pannel"><ul>@if($masterCurriculum)	<?php  $i=0;?> @foreach($masterCurriculum as $mcourse) <?php $i++; ?><li><span>Course <?php echo $i; ?></span><a href="#course_<?php echo $mcourse->id; ?>">{{$mcourse->heading}}</a></li>@endforeach @else	<li><span>Course1</span><a href="#course1">Python Statistics for Data Science </a></li>	<li><span>Course2</span><a href="#course2">Database-MySQL and SQL Queries</a></li><li><span>Course3</span><a href="#course3">Data Science Masters</a></li><li><span>Course4</span><a href="#course4">Machine Learning Program</a></li><li><span>Course5</span><a href="#course5">Deep Learning Live project</a></li><li><span>Course6</span><a href="#course6">Tableau Training For Data Visualization</a></li><li><span>Course7</span><a href="#course7">Hadoop - Apache Spark & Scale</a></li><li><span>Course8</span><a href="#course8">Power BI Training project</a></li><li><span>Course9</span><a href="#course9">Data Science Master Live projects</a></li>@endif <li>Master's Certificate</li></ul><button class="frmbtnSh downloadsyllbus"  data-title="Download Syllabus" data-button="UNLOCK SYLLABUS">DOWNLOAD SYLLABUS</button></div></div></div><div class="row"><div class="col-md-8"><div class="all-tools"><strong>Future of {{$coursesdetails->course_name}}</strong></div><div class="future-box"><div class="future-content pr-3"><img src="{{asset('public/image/svg/Salary.svg')}}" alt=""><h4>₹{{$coursesdetails->salary_heading}}</h4><p>{{$coursesdetails->salary_details}}</p></div><div class="future-content pl-0 pr-3"><img src="{{asset('public/image/svg/Jobs.svg')}}" alt="">
<h4>{{$coursesdetails->job_heading}} </h4><p>{{$coursesdetails->job_details}}</p></div><div class="future-content pl-0 pr-3 border-right-0">
<img src="{{asset('public/image/svg/analytics_infra.svg')}}" alt=""><h4>{{$coursesdetails->analytics_heading}}</h4><p>{{$coursesdetails->analytics_details}}</p></div></div></div></div></div></section>
<section class="mst-prg-mb-bn-dr"><div class="container"><div class="row"><div class="col-12"><div class="mobile-mp-head-ban-txt"><div class="mobile-mp-icon"><img src="{{asset('public/image/mp-icon-banner.png')}}"></div><h4>{{$coursesdetails->title}}</h4></div><div class="mob-rating">		<?php 
$rating=$coursesdetails->rating;
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
switch($rating){
case 4:
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
break;
case 4.5:
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
break;
case 4.75:
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
break;
case 4.8:
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
break;
case 4.9:
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>';
break;
case 5:
$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
break;
} ?>
<span> {!!$stars!!}</span><span> {{$coursesdetails->rating}} out of 5 rating vote {{$coursesdetails->total_rating}}</span></div>
<div class="mob-mp-desc"><p>{{$coursesdetails->course_description}}.</p><div class="line"></div></div><div class="mp-mob-exp"><div class="mp-mob-fee"><strong>INR {{$coursesdetails->fees}} + GST</strong></div><div class="mp-mob-fee"><strong>100% Placement Assistance</strong>
</div></div><div class="mob-mp-buttons"><button class="btnShowFrm dwnPopupFrmId" data-title="APPLY NOW" data-button="APPLY NOW">APPLY NOW</button><button class="frmbtnSh frmModalPopup" data-title="GET IN TOUCH" data-button="Submit">GET IN TOUCH</button></div></div></div></div></section>
<section class="nav-items" id="nav-items"><div class="items-container"><a class="navs" href="#progressoverview">ABOUT</a><a class="navs" href="#toolscovered">TOOLS COVERED</a><a class="navs" href="#faqsid">CURRICULUM</a><a class="navs" href="#getheadid">projectS</a><a class="navs" href="#mpproject">PLACEMENT</a><a class="navs" href="#mpadmission">ADMISSION PROCESS</a><a class="navs" href="#mpfee">FEE STRUCTURE</a><?php if(!empty($coursesdetails->FAQs)){ ?><a class="navs" href="#mpfaq">FAQ's</a> <?php } ?><a href="#0" class="enroll frmModalPopup" data-title="ENROLL NOW" data-button="ENROLL NOW">ENROLL NOW</a><span class="bottom-slider"></span></div></section>			
<section id="progressoverview"><div class="progress-overview"><div class="container"><div class="mp-cnt-top-hdg">
<h2>Program <span>Overview</span></h2><div class="line"></div></div></div><div class="container"><div class="row"><div class="col-md-8">
<div class="cnt-ardn"><div class="accordion" id="accordionExample">@if(!empty($coursesdetails->course_heading1)) <div class="card"><div class="card-header" id="headingOne"><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" data-parent="#accordionExample"><i class="fa fa-plus"></i>{{$coursesdetails->course_heading1}} </button></h2>
</div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne"><div class="card-body program-over"><p>	{!!$coursesdetails->course_heading_details1!!}</p>
<?php  if(!empty($coursesdetails->paragraph)){
$paragraphs = unserialize($coursesdetails->paragraph); 
if(!empty($paragraphs)){	 ?>	
<ul>@foreach($paragraphs as $key=>$value) <li>{{$value}}</li> @endforeach </ul><?php  } } ?> 
<a href="#mstHrnMdId" data-toggle="modal"><img class="mp-program-overview-image" src="{{asset('public/image/mp-certificate-min.jpg')}}">
</a></div></div></div>@endif @if(!empty($coursesdetails->course_heading2)) <div class="card"><div class="card-header" id="headingTwo"><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" data-parent="#accordionExample"><i class="fa fa-plus"></i>{{$coursesdetails->course_heading2}} </button></h2></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" ><div class="card-body program-over"><p>	{!!$coursesdetails->course_heading_details2!!}</p><div class="mp-eligibility">
<ul>@if(!empty($coursesdetails->professionals)) <li><img src="{{asset('public/image/Web_Icon.png')}}"><span>{{$coursesdetails->professionals}}</span></li> @endif @if(!empty($coursesdetails->beginners)) <li><img src="{{asset('public/image/Brain.png')}}"><span>{{$coursesdetails->beginners}}</span></li>@endif @if(!empty($coursesdetails->polygon)) <li> <img src="{{asset('public/image/Polygon.png')}}"><span>{{$coursesdetails->polygon}}</span></li>@endif @if(!empty($coursesdetails->scope)) <li><img src="{{asset('public/image/Analytics.png')}}"><span>{{$coursesdetails->scope}}</span></li> @endif </ul></div> </div></div></div> @endif @if(!empty($coursesdetails->course_heading3)) <div class="card"> 
<div class="card-header" id="headingThree"> <h2 class="mb-0"> 
<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" data-parent="#accordionExample"><i class="fa fa-plus"></i>{{$coursesdetails->course_heading3}} </button> </h2> </div>
<div id="collapseThree" class="collapse" aria-labelledby="headingThree" ><div class="card-body program-over"> <p>	{!!$coursesdetails->course_heading_details3!!}</p><div class="mp-data-science">@if(!empty($coursesdetails->growth)) <div class="mp-data-section"> <p><img src="{{asset('public/image/mp-Icon_1.png')}}"><span>{{$coursesdetails->growth}}</span></p></div>@endif @if(!empty($coursesdetails->analytic)) <div class="mp-data-section"> <p><img src="{{asset('public/image/mp-Icon_2.png')}}"><span>{{$coursesdetails->analytic}}</span></p></div> @endif @if(!empty($coursesdetails->structure)) <div class="mp-data-section"><p><img src="{{asset('public/image/mp-Icon_3.png')}}"><span>{{$coursesdetails->structure}}</span></p> </div> @endif </div></div></div></div>@endif
@if(!empty($coursesdetails->course_heading4))
<div class="card"><div class="card-header" id="headingFour"><h2 class="mb-0"><button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" data-parent="#accordionExample"><i class="fa fa-plus"></i> {{$coursesdetails->course_heading4}} </button></h2></div><div id="collapseFour" class="collapse" aria-labelledby="headingFour" >
<div class="card-body program-over"><p>	{!!$coursesdetails->course_heading_details4!!}</p><?php  
if(!empty($coursesdetails->masterparagraph)){
$masterparagraphs = unserialize($coursesdetails->masterparagraph); 
if(!empty($masterparagraphs)){
?>	
<ul>@foreach($masterparagraphs as $key=>$value) <li>{{$value}}</li> @endforeach </ul> <?php  } } ?> </div></div></div>@endif
@if(!empty($coursesdetails->course_heading5))
<div class="card"><div class="card-header" id="headingFive"><h2 class="mb-0"><button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" data-parent="#accordionExample"><i class="fa fa-plus"></i>{{$coursesdetails->course_heading5}} </button></h2> </div> <div id="collapseFive" class="collapse" aria-labelledby="headingFive" >
<div class="card-body program-over"> <p>{!!$coursesdetails->course_heading_details5!!}</p></div> </div> </div>@endif </div></div></div>
<div class="col-md-4"><div class="fix-frm-enq img-inline scroll-on" id="fix-frm-id"><div class="form-contact">
<div class="form-column"><strong>Request more information</strong>
<form action="" method="post" onsubmit="return contactController.dataSaveRight(this)" autocomplete="off">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?>">
 
<input type="text"  name="name" placeholder="Enter name">
<input type="text" name="email" placeholder="Enter E-mail">	 
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


<input type="reset" class="resetData"><textarea name="message" placeholder="Message Details"></textarea><button name="submit" >Submit</button></form></div>

<div class="india-side-row"><div class="fix-contact"><div class="fix-indian"><div class="fix-indian-left"><p>FOR DOMESTIC</p><strong>+91 9999999999</strong></div><div class="fix-indian-right"><img src="{{asset('public/image/svg/call-indian.svg')}}" alt=""></div></div><div class="fix-internatioanl"><div class="fix-international-left"><p>FOR INTERNATIONAL</p><strong>+91 999999999</strong></div><div class="fix-international-right"><img src="{{asset('public/image/svg/call-international.svg')}}" alt=""></div></div></div></div>

</div></div></div></div></div></div>

</section>
<section id="toolscovered"><div class="container" style="padding-top: 40px;"><div class="mp-tool"><div class="mp-cnt-top-hdg">
<h2>Tools <span>Covered of</span>  {{$coursesdetails->course_name}}</h2><div class="line"></div></div></div></div>
<div class="tools-new"><div class="container"><div class="row"><div class="col-md-12"><div class="tools">
<?php 
if(!empty($coursesdetails->tools_covered)){
$toolscovereds = array_slice(unserialize($coursesdetails->tools_covered),0,18);
if(!empty($toolscovereds)){
foreach($toolscovereds as $key=>$val){
$timage = 	App\ToolsCovered::where('id',$val)->first();
if(!empty($timage)){
$covered_icons=unserialize($timage->covered_icons);
if(!empty($covered_icons)){
?>
<div class="tools-img"><img src="{{asset('public/'.$covered_icons['covered_icons']['src'])}}"></div><?php  } } } } } ?></div></div></div></div></div>
</section>
<section id="faqsid"><div class="sticky-section"><div class="faqsid"><div class="mp-training-faq"><div class="container"><div class="row">
<div class="col-md-12"><div class="mp-cnt-top-hdg"><h2>@if($coursesdetails->course_name){{$coursesdetails->course_name}} @endif <span>Curriculum</span></h2><div class="line"></div></div></div></div><div class="faq-career"><div class="row"><div class="col-md-8">
<div class="mp-define-crs"> @if(!empty($masterCurriculum)) <?php $i=0; ?> @foreach($masterCurriculum as $curriculum) <?php $i++; ?>
<div class="mp-course-list" id="course_<?php echo $curriculum->id; ?>"><div class="mp-course-marking"><strong>Course <?php echo $i; ?></strong></div><div class="mp-course-heading-video"><div class="mp-course-heading"><strong>{{$curriculum->heading}}</strong>
<p>	 <?php 
$aboutLevel1 = App\MasterCurriculumExcel::where('heading_id',$curriculum->id)->get();
if($aboutLevel1){	
foreach($aboutLevel1 as $level1){ ?><?php echo str_replace('?','',$level1->level1).'<br>'; ?><?php  } } ?></p></div>
<div class="mp-crs-4mp downloadsyllbus" data-title="@if($coursesdetails->course_name){{$coursesdetails->course_name}} @endif Curriculum" data-button="Download Curriculum"><img src="{{asset('public/image/svg/downloadicon3-new.svg')}}"></div></div><div class="mp-course-content"><div class="accordion" id="coursecontent1"><div class="card"><div class="card-header course-content-header" id="course-content-headingOne"><h2 class="mb-0"><p data-toggle="collapse" data-target="#course-hdgOne<?php echo $curriculum->id;?>" data-parent="#coursecontent1"><span>Course Content</span><i class="fa fa-plus"></i></p></h2></div><div id="course-hdgOne<?php echo $curriculum->id;?>" class="collapse" aria-labelledby="course-content-headingOne" ><div class="card-body mp-course-listing"><ul>				 
<?php 
$aboutLevel1 = App\MasterCurriculumExcel::where('heading_id',$curriculum->id)->get();
if($aboutLevel1){	
foreach($aboutLevel1 as $level1){ ?>
<!--<li style="font-size: 13px;"> <?php echo str_replace('?','',$level1->level1); ?></li>-->
<?php 
$aboutLevel2 = App\MasterCurriculumExcel::where('level1_id',$level1->id)->get();
if($aboutLevel2){
foreach($aboutLevel2 as $level2){ ?>
<ul><li style="font-size: 12px;"> <strong> <?php echo str_replace('?','',$level2->level2); ?></strong></li>
<?php 
$aboutLevel3 = App\MasterCurriculumExcel::where('level2_id',$level2->id)->get();
if($aboutLevel3){										
foreach($aboutLevel3 as $level3){
?><ul><li style="font-size: 11px;"><?php echo str_replace('?','',$level3->level3); ?></li><ul>
<?php 
$aboutLevel4 = App\MasterCurriculumExcel::where('level3_id',$level3->id)->get();
if($aboutLevel4){										
foreach($aboutLevel4 as $level4){ ?>
<li style="font-size: 11px;"><?php echo str_replace('?','',$level4->level4); ?></li><ul>
<?php 
$aboutLevel5 = App\MasterCurriculumExcel::where('level4_id',$level4->id)->get();
if($aboutLevel5){										
foreach($aboutLevel5 as $level5){
?>
<li style="font-size: 11px;"><?php echo str_replace('?','',$level5->level5); ?></li><ul>
<?php 
$aboutLevel6 = App\MasterCurriculumExcel::where('level5_id',$level5->id)->get();
if($aboutLevel6){										
foreach($aboutLevel6 as $level6){
?>
<li style="font-size: 11px;"><?php echo str_replace('?','',$level6->level6); ?></li><ul>
<?php 
$aboutLevel7 = App\MasterCurriculumExcel::where('level6_id',$level6->id)->get();
if($aboutLevel7){										
foreach($aboutLevel7 as $level7){ ?>
<li style="font-size: 11px;"><?php echo str_replace('?','',$level7->level7); ?></li><?php }  } ?></ul><?php }  } ?> </ul><?php }  } ?></ul><?php }  } ?></ul></ul><?php } } ?></ul>	<?php 			} } ?> <?php } } ?></ul>
</div></div></div></div></div></div> @endforeach	@endif										 	 
<div class="mp-certificate"><img src="{{asset('public/image/mp-Certificate.png')}}" alt="Certificate"><strong>Master's Program Certificate</strong>
<p>You will get certificate after completion of program</p></div></div></div>
<div class="col-md-4"><div class="mp-career-course"><div class="mp-career-assistance"><div class="career-heading"><strong>Course Structure</strong><img src="{{asset('public/image/Course_Structure.png')}}"></div><ul><li> - {{$coursesdetails->course_duration}} Months Online Program</li>
<li> - {{$coursesdetails->duration_hours}}+ Hours of Intensive Learning</li><li> - {{$coursesdetails->assigment}}+ Assigments & {{$coursesdetails->project}}+ projects</li><li> - {{$coursesdetails->live_project}} Live projects</li></ul><button class="btnShowFrm frmModalPopup" data-title="GET IN TOUCH" data-button="GET IN TOUCH" >GET IN  TOUCH</button></div><div class="mp-career-assistance"><div class="career-heading"><strong>Career Assistance</strong><img src="{{asset('public/image/Career-Assistance-icon.png')}}"></div><ul>
<li> - Build an Impressive Resume</li><li> - Get Tips from Trainer to Clear Interviews</li><li> - Attend Mock-Up Interviews with Experts</li>
<li> - Get Interviews & Get Hired</li></ul><button class="frmbtnSh frmModalPopup" data-title="GET IN TOUCH" data-button="Submit">GET IN  TOUCH</button></div></div></div></div></div></div></div>
<div class="cc-achievement"><div class="container"><div class="row"><div class="col-md-7"><div class="cc-achie-heading"><h2>Get Ahead with Institute master Certificate</h2></div><div class="cc-achie-desc"><div class="cc-achie-sections"><strong>Earn your certificate</strong>
<p>Our Master program is exhaustive and this certificate is proof that you have taken a big leap in mastering the domain.</p></div>
<div class="cc-achie-sections"><strong>Differentiate yourself with a Masters Certificate</strong><p>The knowledge and skill you've gained working on projects, simulation, case studies will set you ahead of competition.</p></div><div class="cc-achie-sections">
<strong>Share your achievement</strong><p>Talk about it on Linkedin, Twitter, Facebook, boost your resume or frame it- tell your friend and colleagues about it.</p></div></div><div class="cc-achie-button"><button class="btnShowFrm popupDwnId" data-title="APPLY NOW" data-button="APPLY NOW">APPLY NOW</button><a href="#MasterVerticalModal" data-toggle="modal" class="moreButtonId" style="text-decoration: none;color: #fff;">SAMPLE CERTIFICATE</a></div></div><div class="col-md-5"></div></div></div></div></div></div></section>
<section id="getheadid"><div class="master-course-certification"><div class="container"><div class="row"><div id="certificate-preview"></div><div class="col-md-12"><div class="mp-cnt-top-hdg"><h2>Industry <span>project</span></h2><div class="line"></div></div>
</div><div class="col-md-4"><div class="feature-img-heading"><div class="feature-img-section"><img src="{{asset('/image/svg/Real_Time_Case.svg')}}"><h4>Real-life Case Studies</h4></div><p>Work on case studies based on top industry frameworks and connect your learning with real-time industry solutions right away.</p></div></div><div class="col-md-4"><div class="feature-img-heading"><div class="feature-img-section"><img src="{{asset('public/image/svg/Industry-Practitioners.svg')}}"><h4>Best Industry-Practitioners</h4></div><p>All of our trainers and highly experienced, passionate about teaching and worked in the similar space for more than 3 years.</p></div></div><div class="col-md-4"><div class="feature-img-heading"><div class="feature-img-section"><img src="{{asset('/image/svg/Industrial Skills.svg')}}"><h4>Acquire essential Industrial Skills</h4></div><p>Wisely structured course content to help you in acquiring all the required industrial skills and grow like a superstar in the IT marketplace. </p></div></div>
<div class="col-md-4"><div class="feature-img-heading"><div class="feature-img-section"><img src="{{asset('/image/svg/Practical Knowledge.svg')}}"><h4>Hands-on Practical Knowledge</h4></div><p>Case studies based on top industry frameworks help you to relate your learning with real-time based industry solutions.</p></div></div><div class="col-md-4"><div class="feature-img-heading"><div class="feature-img-section"><img src="{{asset('public/image/svg/Collaborative Learning.svg')}}"><h4>Collaborative Learning</h4></div>
<p>Take your career at the top with collaborative learning at the Institute where you could learn and grow in groups.</p>
</div></div><div class="col-md-4"><div class="feature-img-heading">
<div class="feature-img-section"><img src="{{asset('public/image/svg/Assigment_Quiz.svg')}}"><h4>Assignment & Quizzes</h4></div><p>Practice different assignments and quizzes on different topics or at the end of each module to evaluate your skills and learning speed.</p></div></div></div></div></div></section>
<section id="mpproject"><div class="mpproject"><div class="container"><div class="row"><div id="self-img"></div><div class="col-md-12">
<div class="mp-cnt-top-hdg"><h2>Placement & Recruitment <span>Partners</span></h2><div class="line"></div></div>
<div class="placement-section pb-0"><div class="placement-points"><strong>Placement Assistance</strong><p>We provide 100 percent placement assistance and most of our students are placed after completion of the training in top IT giants. We work on your resume, personality development, communication skills, soft-skills, along with the technical skills.</p></div><div class="placement-points">
<strong>CAREERS AND SALARIES IN {{$coursesdetails->course_name}}</strong><p>{!!$coursesdetails->careers_salaries!!}</p></div>
<div class="placement-faqs-accordian"><div class="accordion" id="faqlistMain">@if(!empty($coursesdetails->placement1))
<div class="card"><div class="card-header" ><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#placement1"><span>{{$coursesdetails->placement1}}</span> <i class="fa fa-plus"></i> </button>					
</h2></div><div id="placement1" class="collapse show"><div class="card-body"><p><img src="{{asset('public/image/placement1.jpg')}}"></p>
<div class="placement-text"><p> {!!$coursesdetails->placement_details1!!}</p></div></div></div></div> @endif @if(!empty($coursesdetails->placement2)) <div class="card"><div class="card-header"><h2 class="mb-0"><button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#placement2"><span>{{$coursesdetails->placement2}} </span> <i class="fa fa-plus"></i></button></h2></div><div id="placement2" class="collapse"><div class="card-body"><p>{!!$coursesdetails->placement_details2!!}</p>
</div></div></div>@endif @if(!empty($coursesdetails->placement3)) <div class="card"><div class="card-header"><h2 class="mb-0">
<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#placement3"><span> {{$coursesdetails->placement3}} </span> <i class="fa fa-plus"></i></button>			                    						
</h2></div><div id="placement3" class="collapse" data-parent="#faqlistMain"><div class="card-body"><p>{!!$coursesdetails->placement_details3!!}</p></div></div></div> @endif @if(!empty($coursesdetails->placement4))
<div class="card"><div class="card-header" id="faqheadingFour"><h2 class="mb-0"><button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#placement4"><span>{{$coursesdetails->placement4}}</span> <i class="fa fa-plus"></i></button>               
</h2></div><div id="placement4" class="collapse" aria-labelledby="faqheadingFour" data-parent="#faqlistMain"><div class="card-body">
<p>{!!$coursesdetails->placement_details4!!}</p></div></div></div>@endif
@if(!empty($coursesdetails->placement5))
<div class="card"><div class="card-header" ><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#placement5"><span>{{$coursesdetails->placement5}}</span> <i class="fa fa-plus"></i></button></h2></div><div id="placement5" class="collapse" ><div class="card-body"><p>{!!$coursesdetails->placement_details5!!}</p></div></div></div>@endif
@if(!empty($coursesdetails->placement6))
<div class="card"><div class="card-header" ><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#placement6"><span>{{$coursesdetails->placement6}}</span> <i class="fa fa-plus"></i></button> </h2></div>
<div id="placement6" class="collapse"><div class="card-body"><p>{!!$coursesdetails->placement_details6!!}</p></div></div></div>@endif
@if(!empty($coursesdetails->placement7))
<div class="card"><div class="card-header"><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#placement7"><span>{{$coursesdetails->placement7}}</span> <i class="fa fa-plus"></i></button>					                    							
</h2></div><div id="placement7" class="collapse"><div class="card-body"><p>{!!$coursesdetails->placement_details7!!}</p></div>
</div></div>@endif
@if($coursesdetails->placement8)
<div class="card"><div class="card-header" ><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#placement8"><span>{{$coursesdetails->placement8}}</span> <i class="fa fa-plus"></i></button>						                    							
</h2></div><div id="placement8" class="collapse"><div class="card-body"><p>	{!!$coursesdetails->placement_details8!!}</p>
</div></div></div>@endif
@if($coursesdetails->placement9)
<div class="card"><div class="card-header" ><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#placement9"><span>{{$coursesdetails->placement9}}</span> <i class="fa fa-plus"></i></button>						                    							
</h2></div><div id="placement9" class="collapse"><div class="card-body"><p>{!!$coursesdetails->placement_details9!!}</p></div>
</div></div>@endif </div></div> <div class="placement-points recuirment"><strong>RECRUITMENT PARTNERS</strong>
<p>On the completion of the course, you may work in various domains like manufacturing, It, healthcare, telecom, and more. Also, most of the students get 200 percent hike after completing this course. The average you will get 6 lac p.a. and for a little more efforts you may acquire salary packages up to 12 lacs p.a.</p>
<div class="recuirement-firms">
<?php 
if(!empty($coursesdetails->clients)){
$clients = array_slice(unserialize($coursesdetails->clients),0,20);
if(!empty($clients)){
foreach($clients as $key=>$val){
$timage = 	App\Client::where('id',$val)->first();
if(!empty($timage)){
$client_icons=unserialize($timage->client_icons);
if(!empty($client_icons)){
?>
<div class="recuirment-firm-images"><img src="{{asset('public/'.$client_icons['client_icons']['src'])}}" alt="{{($client_icons['client_icons']['alt'])}}"></div><?php  } } } } } ?></div>	</div></div></div></div></div></div></section>
<section id="mpadmission"><div class="mpadmission"><div class="container"><div class="row"><div class="col-md-12">
<div class="master-admission"><div class="mp-cnt-top-hdg"><h2>Admission <span>Process</span></h2><div class="line"></div>
</div><div class="admission-desc"><div class="admission-content"><div class="admission-content-heading"><img src="{{asset('/image/svg/Date&Time.svg')}}"><strong>Important Date & Time</strong></div><div class="admin-desc">
<p>You can apply for the master program online at our site. Mark the important date and time related to the program and stay in touch with our team to get the information about the program in detail.</p></div><div class="admin-button"><button class="frmbtnSh frmModalPopup" data-title="GET IN TOUCH" data-button="Submit">GET IN TOUCH</button></div></div><div class="admission-content"><div class="admission-content-heading">
<img src="{{asset('/image/svg/Enrollment_Criteria.svg')}}"><strong>Enrollment Criteria</strong></div><div class="admin-desc">
<p>Once you submit your profile online, it will be reviewed by our expert team closely for the eligibility like graduation degree, basic programming skills, etc. Eligible candidates can move to the next step quickly.</p></div><div class="admin-button"><button class="frmbtnSh frmModalPopup" data-title="ENQUIRY NOW" data-button="ENQUIRY NOW">ENQUIRY NOW</button></div></div><div class="admission-content">
<div class="admission-content-heading"><img src="{{asset('public/image/svg/Final_Enrollment.svg')}}"><strong>Final Enrollment Process</strong>
</div><div class="admin-desc"><p>Eligible candidates have to appear for the online assessment based on your graduation and basic programming knowledge. Candidates who clear the exam will appear for the interview and finally they can join the program.</p>
</div><div class="admin-button"><button class="frmbtnSh frmModalPopup" data-title="Final Enrolment" data-button="ENQUIRY NOW">ENQUIRY NOW</button></div></div></div></div></div></div></div></div></section>
<section id="mpfee"><div class="mp-fees-cov-structure"><div class="container"><div class="row"><div class="col-md-4"><div class="owl-carousel owl-theme question-slider-section mp-faq-dots"><div class="item"><div class="scholar-item"><div class="online-class-schedule magenta">
<p>WEEKDAY</p></div><div class="online-class-price"><span>Rs.<?php echo number_format(($coursesdetails->fees*85)/100) ?></span>
<del>Rs.{{$coursesdetails->fees}}</del></div><div class="online-class-time"><div class="online-class-calendar"><img src="{{asset('public/image/svg/Calendar.svg')}}" style="width:16px !important;"><p>
<?php $monday = strtotime("last monday midnight");
$now = strtotime("now");
$monday = strtotime("next monday", $monday);
echo date('d-M-Y',$monday); ?></p></div><div class="online-class-clock"><img src="{{asset('public/image/svg/Clock.svg')}}" style="width:16px !important;"><p>10.00(IST)</p></div></div><div class="online-class-points"><p><i class="fa fa-angle-right"></i>Take class during weekdays and utilize your weekend for practice.</p><p><i class="fa fa-angle-right"></i>Get regular training by Industry Experts.</p>
<p><i class="fa fa-angle-right"></i>Get Proper guidance on certifications.</p><p><i class="fa fa-angle-right"></i>Register for FREE demo before signing up.</p></div><div class="online-class-button"><button class="frmbtnSh inquerySide" data-title="Batch Information" data-paragraph="See why 61,640+ Learners trust us and how did they achieve their professional goals by Joining Institute! You also get your Certificate now!">Enroll Now</button></div><div class="online-class-offer"><h4>15% OFF</h4></div></div></div>
<div class="item"><div class="scholar-item"><div class="online-class-schedule sherpa-blue"><p>WEEKEND</p></div>
<div class="online-class-price"><span>Rs.<?php echo number_format(($coursesdetails->fees*85)/100) ?></span><del>Rs.{{$coursesdetails->fees}}</del></div><div class="online-class-time"><div class="online-class-calendar"><img src="{{asset('/image/svg/Calendar.svg')}}" style="width:16px !important;"><p><?php
$sunday = strtotime("last sunday midnight");
$now = strtotime("now");
$saturday = strtotime("next saturday", $sunday);
echo date('d-M-Y',$saturday); ?></p></div><div class="online-class-clock"><img src="{{asset('public/image/svg/Clock.svg')}}" style="width:16px !important;"><p>10.00(IST)</p></div></div><div class="online-class-points"><p><i class="fa fa-angle-right"></i>More Suitable for working professionals who cannot join in weekdays.</p><p><i class="fa fa-angle-right"></i>Get Intensive coaching in less time.</p>
<p><i class="fa fa-angle-right"></i>Get Proper guidance on certifications.</p><p><i class="fa fa-angle-right"></i>Register for FREE demo before signing up.</p></div><div class="online-class-button"><button class="frmbtnSh inquerySide" data-title="Batch Information" data-paragraph="See why 61,640+ Learners trust us and how did they achieve their professional goals by Joining Institute! You also get your Certificate now!">Enroll Now</button></div><div class="online-class-offer"><h4>15% OFF</h4></div></div></div><div class="item">
<div class="scholar-item"><div class="online-class-schedule blue"><p>FASTRACK</p></div><div class="online-class-price">
<span>Rs.<?php echo number_format(($coursesdetails->fees*85)/100) ?></span><del>Rs.{{$coursesdetails->fees}}</del></div>
<div class="online-class-time"><div class="online-class-calendar"><img src="{{asset('public/image/svg/Calendar.svg')}}" style="width:16px !important;"><p><?php $nextdate = date('d-M-Y', strtotime('+1 day', $now)); echo $nextdate; ?></p></div><div class="online-class-clock">
<img src="{{asset('public/image/svg/Clock.svg')}}" style="width:16px !important;"><p>10.00(IST)</p></div></div>
<div class="online-class-points"><p><i class="fa fa-angle-right"></i>Running lack of time? Join Fastrack classes to speed up your career growth.</p><p><i class="fa fa-angle-right"></i>Materials and guidance on certifications.</p><p><i class="fa fa-angle-right"></i>Get Proper guidance on certifications.</p><p><i class="fa fa-angle-right"></i>Register for FREE demo before signing up.</p></div>
<div class="online-class-button"><button class="frmbtnSh inquerySide" data-title="Batch Information" data-paragraph="See why 61,640+ Learners trust us and how did they achieve their professional goals by Joining Institute! You also get your Certificate now!">Enroll Now</button></div><div class="online-class-offer"><h4>15% OFF</h4></div></div></div></div></div>
<div class="col-md-8"><div class="chance-win"><strong>Get a chance to win a scholarship up to <br><span>₹ <?php echo number_format(($coursesdetails->fees*85)/100);?> <sub>(Excluding of GST)</sub></span></strong><button class="frmbtnSh inquerySide" data-title="Apply now to win" data-paragraph="See why 61,640+ Learners trust us and how did they achieve their professional goals by Joining Institute! You also get your Certificate now!">Apply now to win</button><div class="scholar-fee"><img src="{{asset('public/image/mpcer.png')}}"></div></div>
</div></div></div></div></section>
<?php if(!empty($coursesdetails->FAQs)){
$FAQs =json_decode($coursesdetails->FAQs);                    
$faqquestion  = unserialize($FAQs->faqq);	
if(!empty($faqquestion) && count($faqquestion)>0){
?>
<section id="mpfaq"><div class="mpfaq"><div class="container"><div class="row"><div class="col-md-12"><div class="mp-cnt-top-hdg"><h2>Frequently Asked <span>Questions</span></h2><div class="line"></div></div>
</div></div><div class="faq-career"><div class="row"><div class="col-md-12"><div class="cnt-ardn">
<div class="accordion" >
<?php  
if(!empty($faqquestion)){									 
$faqanswer  = unserialize($FAQs->faqa);								 
for($i=0; $i<count($faqquestion); $i++){						 
?> 
<div class="card"><div class="card-header"><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#faqcollapseOne<?php echo $i;?>"><i class="fa fa-plus"></i> <?php echo (isset($faqquestion[$i])? $faqquestion[$i]:""); ?></button> 
</h2></div><div id="faqcollapseOne<?php echo $i; ?>" class="collapse <?php if($i=='0'){ echo "show"; } ?>"><div class="card-body"><p><?php echo (isset($faqanswer[$i])? $faqanswer[$i]:""); ?>.</p></div></div></div><?php } }   ?>	</div></div><button class="btnShowFrm" style="margin-top: 20px;"><a href="{{url('faq')}}" target="_blank">Still have queries?</a></button></div></div></div></div></div></section>
<?php  } } ?>
<section class="mp-curri"><div class="container"><div class="row"><div class="col-md-12"><div class="mp-master-curri-super-heading">
<h2>If you like our Curriculum</h2><div class="line"></div></div></div><div class="mp-curri-form-desc"><div class="mp-curri-desc">
<p>What You will get <strong>Benefit</strong> <br>from this <strong>Program</strong></p><div class="mp-curri-points">
<ul><li>Simulation Test Papers</li><li>Industry Case Studies</li><li>61,640+ Satisfied Learners</li><li>140+ Training Courses</li>
<li>100% Certification Passing Rate</li><li>Live Instructor Online Training</li><li>100% Placement Assistance</li></ul>	
</div></div><div class="mp-curri-form"><strong>I’m interested in the program </strong>
<form action="" method="post" onsubmit="return contactController.saveDataEnquiry(this)" autocomplete="off">
<div class="form-group">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?>">
 


<div class="form-inline"><div class="col-md-6">
<input type="text" name="name" placeholder="Enter Name"></div><div class="col-md-6"><input type="text" name="email" placeholder="Enter E-mail"></div></div>
<div class="form-inline"><div class="col-md-6">

<div class="valide-text"><div class="drop-number">
 
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


 </div> <div class="col-md-6">	<input type="text" name="demo_date" placeholder="Select Date"> </div> </div>
<div class="form-inline"><div class="col-md-6"><input type="text" name="experience" maxlength="2" placeholder="Total Work Experience"> 
</div><div class="col-md-6"><input type="text" name="message" placeholder="Enter remark" ></div></div></div><p class="terms">By clicking submit button, you agree to our terms & conditions and our privacy policy.</p><button class="btnShowFrm">Submit</button></form>
</div></div></div></div></section>
<div class="course-testimonial"><div class="container"><div class="row"><div class="col-md-12"><div class="course-testi-super-heading">
<h2>Testimonials & Reviews</h2></div><div class="colon"><img src="{{asset('public/image/svg/Inverted-Comma.svg')}}" width="146">
</div><div class="course-testi-owl"><div class="owl-carousel owl-theme course-testy">
<?php  		 
if(!empty($coursesdetails->testimonial_visibility)){									
$newtestimonial =json_decode($coursesdetails->testimonial);                    
$name  = unserialize($newtestimonial->name);									 
if(!empty($name)){	
$comment  = unserialize($newtestimonial->comment);								 
for($i=0; $i<count($name); $i++){ 
?>
<div class="item course-test-review"><div class="testi-review"><p><?php echo (isset($comment[$i])? $comment[$i]:""); ?></p>
<div class="testi-review-bottom"><a href="javascript:void();" target="_blank"></a><div class="testi-sender"><div class="testi-name">
<h5><?php echo (isset($name[$i])? $name[$i]:""); ?></h5></div><div class="testi-star"><i class="fa fa-star"></i><i class="fa fa-star"></i>
<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div></div></div></div></div>
<?php } } }else{ ?>
@if(!empty($testimonials))
@foreach($testimonials as $testimonial)
<div class="item course-test-review"><div class="testi-review"><p>{{$testimonial->comment}}</p><div class="testi-review-bottom">
<a href="javascript:void();" target="_blank"></a><div class="testi-sender"><div class="testi-name"><h5>{{$testimonial->name}}</h5>
</div><div class="testi-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
<i class="fa fa-star"></i></div></div></div></div></div> @endforeach @endif <?php } ?> </div>
</div><div class="view-testi"><a href="{{url('reviews')}}">View All</a></div></div></div></div></div></div>
<div id="mstHrnMdId" class="modal fade" tabindex="-1"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><img src="{{asset('public/image/master-program-certificate-horizontal.png')}}"></div></div></div></div>   
<div id="MasterVerticalModal" class="modal fade" tabindex="-1"><div class="modal-dialog"><div class="modal-content"><div class="modal-body">
<img src="{{asset('public/image/master-program-certificate-vertical.png')}}"></div></div></div></div> 	
<div class="popup-class-div modal fade" id="popupDwnId" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body"><div class="mdlImg"><img src="{{asset('public/image/Enroll_Now.png')}}"></div><div class="mdl-field-frm"><div class="successmessage"></div><div class="errormessage"></div><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>		        </button><div class="frm-hdg"><img src="{{asset('public/image/download.png')}}"><h4 id="modal-heading"></h4></div>
<form action="" method="post" onsubmit="return contactController.saveDataEnquiry(this)" autocomplete="off">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?>">
 

<input type="text" name="name" value="" placeholder="Enter Name*">
<input type="email" name="email" value="" placeholder="Enter E-mail*">

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


<input type="reset" class="resetData"><button type="submit" class="modal-placement-button" name="submit"></button>   
</form></div></div></div></div></div>
 <div class="dwn-frm-div">
 <div class="modal fade" id="download_master_otp" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="modlMain"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="model-image">
    <img src="{{asset('public/image/svg/dwn-frm-div.svg')}}" alt="dwn-frm-div" class="img-fluid">
    </div>
    <div class="modal-body text-center">
    <div class="dwn-frm-div-content">     
    <p>An OTP  on your submit Mobile No has been shared.please check and submit OTP</p>
    <div class="submit-download-from">   
 <div class="mdl-field-frm">	
	<form action="" method="post" class="form-inline" onsubmit="return contactController.getMasterOTP(this)" autocomplete="off">

	<input type="tel" name="otp" value="" class="" placeholder="Enter OTP" maxlength="6">
	<input type="reset" class="resetData">		
	<button type="submit" class="modal-placement-button" name="submit" >Submit</button>   
	</form>
    </div>
    </div>
    </div>
    
    </div>
    </div>
    </div>
    </div>					
	</div>
<div class="modal fade popup-class-div" id="downloadsyllbus" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body">
<div class="mdlImg"><img src="{{asset('public/image/Enroll_Now.png')}}"></div><div class="mdl-field-frm">
<div class="successmessage"></div><div class="errormessage"></div><button type="button" class="downloadclose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="frm-hdg"><img src="{{asset('public/image/download.png')}}">
<h4 id="modal-heading">VIDEO REVIEWS</h4></div>
<form action="" method="post" onsubmit="return contactController.savedownloadSyllabus(this)" autocomplete="off">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?>">
 

<input type="text" name="name" value="" placeholder="Enter your Name">
<input type="email" name="email" value="" placeholder="Enter your e-mail">

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


 <input type="reset" class="resetData"><button type="submit" class="modal-placement-button" name="submit" >UNLOCK REPORT</button> </form></div></div></div></div></div>
<div id="download_syllabus_pdf" class="modal fade popup-class-div" role="dialog" data-backdrop="static"><div class="modal-dialog" role="document">
<div class="modal-content"><div class="modal-body"><div class="mdlImg"><img src="{{asset('public/image/Enroll_Now.png')}}"></div>
<div class="mdl-field-frm"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="downpdf" style="margin-top: 66px;margin-right: 5px;"><div class="frm-hdg"><img src="{{asset('public/image/download.png')}}"><a href="" target="_blank" class="cnt-dwn" title=""><h5 id="modal-heading">Download Curriculum <i class="fa fa-file-pdf-o"></i></h5> </a>
</div></div><p style="margin-top: 55px;">Download To Course Content</p></div></div></div></div></div> 
<div class="modal right fade " id="sidepopup-class-div" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" data-backdrop="static">
<div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="myModalLabel2">Join us for a Free Demo</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="dropquery-right"><p>Share some of your details and we will be in touch with you for demo details, and know about Batches Available with us!</p>
<form action=""  method="post" onsubmit="return contactController.dataSaveRight(this)" autocomplete="off">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?>">
 

<input type="text" name="name" placeholder="Enter Name*"><input type="email" name="email" placeholder="Enter E-mail*">

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



<textarea name="message" placeholder="Enter Message"></textarea><input type="reset" class="resetData"><input type="submit" value="Submit"></form>


<div class="dropquery-right-img">
<img src="{{asset('/image/modal-right-lady.png')}}"></div></div></div></div></div></div>
<div class="modal fade popup-class-div" id="vdoFrmPopupModal" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static">	  <div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body">
<div class="mdlImg"><img src="{{asset('/image/Enroll_Now.png')}}"></div><div class="mdl-field-frm"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="frm-hdg"><img src="{{asset('public/image/download.png')}}"><h4 id="modal-heading">Watch Live Video</h4></div>
<form action=""  method="post" onsubmit="return contactController.saveWatchVideoEnquiry(this)" autocomplete="off">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?>">
 



<input type="text" name="name" value="" placeholder="Enter your Name">	
<input type="email" name="email" value="" placeholder="Enter your e-mail">

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


<input type="reset" class="resetData"><button type="submit" class="modal-placement-button" name="submit">UNLOCK DOWNLOAD</button></form></div></div></div></div></div>
<div id="playVdoId" class="modal fade" role="dialog" data-backdrop="static"><div class="modal-dialog modal-lg"><div class="modal-content"> 
<div class="modal-body" style="padding: 0rem;margin-bottom: -7px;"><iframe width="100%" height="409" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div></div></div> 	
<div class="dwn-frm-div"><div class="modal fade" id="dwn-pdf-Id_master" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">
<h5 class="modal-title" id="modlMain"></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button></div><div class="model-image"><img src="{{asset('public/image/svg/dwn-frm-div.svg')}}" alt="dwn-frm-div" class="img-fluid"></div><div class="modal-body text-center"><div class="dwn-frm-div-content"> 
<h6>Download <?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?> Curriculum</h6>
<p>We have trained 1 Lac+ candidates successfully on cutting edge technologies from various industries.</p>
<div class="submit-download-from"><a href="{{asset('download')}}/<?php if(!empty($coursesdetails->course_pdf_text)){ echo $coursesdetails->course_pdf_text.'.pdf'; } ?>" target="_blank" class="button-green" name="submit">Download Here</a>
</div></div></div></div></div></div></div>
	 
	 @endsection