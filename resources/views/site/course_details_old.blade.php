@extends('site.layouts.app')
@section('title')
@if(!empty($coursesdetails->title))	 
 {{$coursesdetails->title}} 
@else
	India's No.1 IT Training Institute in Noida | Delhi | Gurgaon
@endif
@endsection 
@section('keyword')
@if(!empty($coursesdetails->meta_keyword))
	{{$coursesdetails->meta_keyword}}
@else
	India's No.1 IT Training Institute, Best IT Training Institute, Best IT Training Institute in Noida, IT Training Institute in Delhi, IT Training Institute in Gurgaon
@endif
@endsection
@section('description')
@if(!empty($coursesdetails->meta_description))
{{$coursesdetails->meta_description}}
@else
	India's No.1 IT Training Institute in Noida, Delhi, Gurgaon for Industrial Training. We conducts IT Software, Hardware, Network and Security Courses training. 
@endif
@endsection
@section('content') 

<?php //echo "<pre>";print_r($coursesdetails);die; ?>
<script type="application/ld+json"> { "@context": "http://schema.org/", "@type": "Review","itemReviewed": {"@type": "Course","name": "<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; }  ?>"  },"author": {"@type": "Person","name": "Amit" },"ReviewRating":{"@type":"AggregateRating","ratingValue":"<?php if(!empty($coursesdetails->rating)){ echo number_format((float)$coursesdetails->rating, 2, '.', ''); } ?>","ratingCount":"<?php if(!empty($coursesdetails->total_rating)){ echo $coursesdetails->total_rating; } ?>","bestRating":"5"},"publisher": {"@type": "Training","name": "Institute" }} 
</script><?php $htmlfaq=""; 
 
if(!empty($coursesdetails->FAQs)){  
    
    $FAQs =json_decode($coursesdetails->FAQs); 
   
if(!empty($FAQs->faqq)){
     
$faqquestion  = unserialize($FAQs->faqq); 

if(!empty($faqquestion)){	
$faqanswer  = unserialize($FAQs->faqa);								 
for($i=0; $i<count($faqquestion); $i++){ ?> 
<?php $htmlfaq .='{"@type":"Question","name":"'.(isset($faqquestion[$i])? $faqquestion[$i]:"").'","acceptedAnswer":{"@type":"Answer","text":"'. (isset($faqanswer[$i])? $faqanswer[$i]:"").'\n"}},'; ?>
<?php } } } } ?><script type="application/ld+json"> { "@context": "https://schema.org", "@type": "FAQPage", "mainEntity": [<?php echo $htmlfaq ?>]   } </script>
<div class="main"><section class="course-banner"><div class="container"><div class="row"><div class="col-md-12">


<div class="breadcrumbs">
<p><a href="{{ url('/') }}">Home</a><a href="{{ url('all-courses') }}" target="_blank">/<?php if(!empty($coursesdetails->title)){ echo  $coursesdetails->title; } ?> </p>
</div></div>
<div class="col-md-7"><div class="crs-ban-left"><div class="head-ban-txt"><h2><?php if(!empty($coursesdetails->title)){ echo  $coursesdetails->title; } ?> </h2></div>
<div class="sub-heading"><p><?php if(!empty($coursesdetails->sub_title)){ echo $coursesdetails->sub_title; } ?></p><?php if(!empty($coursesdetails->course_defination)){ echo $coursesdetails->course_defination; } ?></div>

 <div class="main-up">
                <div class="up-box">
                    
                  <span class="up-header"><span style="color:#ffc436;font-weight: 800">Guaranteed</span> Interview Calls</span>
             
                    </div>
                
                <div class="up-box">
                    
                  <span class="up-header">One to One <span style="color:#ffc436;font-weight: 800">Doubt Session</span></span>
                </div>
                    
                <div class="up-box">
                       <span class="up-header">Trainer <span style="color:#ffc436;font-weight: 800">Satisfaction</span></span>
                </div>
                <div class="up-box">
                     <span class="up-header">Experience <span style="color:#ffc436;font-weight: 800">Industry Trainer</span></span>
                </div>
            </div>
            

<div class="rating-crs">
    
    
    <div class="stats-rating"><a href="javascript:void(0);">
<?php 
if(!empty($coursesdetails->rating)){
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
} 

?>
{!!$stars!!} 
<?php  } ?>
<span><?php if(!empty($coursesdetails->rating)){ echo $coursesdetails->rating; } ?> Rating  </span> </a></div>
	</div>
<div class="define-crs">
</div>

 
</div></div>


<div class="col-md-5"><div class="ban-crs-grt"><div class="crs-4mp vdoFrmPopupModal" data-title="" data-button="UNLOCK VIDEO">

							@if(isset($coursesdetails) && $coursesdetails->course_image !='')									 
								<?php $vimage= unserialize($coursesdetails->course_image); ?>
								<img src="{{asset('public/'.$vimage['course_image']['src'])}}" alt="{{$vimage['course_image']['alt']}}" >
								@endif
<div class="seeVroWt"><a href="#0"><div class="sadas"><div class="video-btn"><i class="fa fa-play"></i><div class="ripple bgcolor"></div> <div class="ripple bgcolor"></div>
 <div class="ripple bgcolor"></div></div></div></a></div></div></div></div>
 
 
 
 </div>	
  


	</div>
</section>
<style>
    .MasterSecondSection_mainBox__WI_2m {
  display: grid;
  grid-template-columns: 47% 50%;
  grid-gap: 10px;
  gap: 10px;
  margin: 32px 50px 55px;
}
.MasterSecondSection_firstbox__7odsT {
  display: grid;
  grid-template-columns: 33% 33% 33%;
  grid-gap: 10px;
  gap: 10px;
  padding: 35px 15px;
  background: linear-gradient(180deg,#eae8e8,hsla(0,0%,85%,0));
  border-radius: 6px;
  opacity: .8;
}
.MasterSecondSection_BoldC__4VAg5, .MasterSecondSection_BoldP__EKGWa {
  padding-top: 20px;
  font-weight: 700;
  line-height: 45px;
  margin: 0;
  text-align: center;
  font-size: 40px;
}


.MasterSecondSection_NormalP__NXzg1 {
  margin: 0;
  text-align: center;
  padding-bottom: 10px;
  padding-top: 5px;
}


.MasterSecondSection_secondbox__yc8A4 {
  display: flex;
  grid-template-columns: 18% 20%;
  grid-gap: 12px;
  gap: 12px;
  background: linear-gradient(180deg,#eae8e8,hsla(0,0%,85%,0));
  border-radius: 6px;
  opacity: .8;
  padding: 35px 10px 35px 25px;
  align-items: center;
}

.MasterSecondSection_imgBox__l4lX_ img, .MasterSecondSection_imgDesc__G_M8N img, .MasterSecondSection_imgMobile__sProb img {
  height: -moz-fit-content;
  height: fit-content;
  width: 100px;
  color: transparent;
}

 

</style>
<div class="MasterSecondSection_mainBox__WI_2m"><div class="MasterSecondSection_firstbox__7odsT">
    <div><p class="MasterSecondSection_BoldP__EKGWa">IBM <span style="color: rgb(255, 132, 3);"></span></p>
    <p class="MasterSecondSection_NormalP__NXzg1">Certified Capstone</p>
    <div class="MasterSecondSection_radial__mM89n"></div></div>
    <div><p class="MasterSecondSection_BoldP__EKGWa"> <span style="color: rgb(255, 132, 3);">175%</span></p>
    <p class="MasterSecondSection_NormalP__NXzg1">Average Salary Hike</p>
    <div class="MasterSecondSection_radial__mM89n"></div></div>
    <div>
        <p class="MasterSecondSection_BoldP__EKGWa">35K+ <span style="color: rgb(255, 132, 3);"></span></p>
        <p class="MasterSecondSection_NormalP__NXzg1">Trusted Learners</p>
        <div class="MasterSecondSection_radial__mM89n"></div></div></div>
        <div class="MasterSecondSection_secondbox__yc8A4">
            
            <div class="MasterSecondSection_imgBox__l4lX_">
            <img alt="review-0" src="{{asset('public/image/partners/infosys.png')}}">
            
            </div>
              <div class="MasterSecondSection_imgBox__l4lX_">
                <img src="{{asset('public/image/partners/tech-mahindra.png')}}">
                </div>
                  <div class="MasterSecondSection_imgBox__l4lX_">
              <img alt=" " src="{{asset('public/image/partners/magic-software.png')}}">
                </div>
            
            
           
    
    </div>
    
    </div>


 




<section class="nav-items" id="nav-items"><div class="items-container"><a class="navs" href="#aboutsid">ABOUT</a> 
<a class="navs" href="#courseContentId">Course Contents</a><a class="navs" href="#certificateId">Certificate</a><a class="navs" href="#faqsid">FAQs</a>
<a class="navs" href="#testimonialsId">Testimonials</a>
<a class="navs" href="#placementId">Placement</a>  <a href="#0" class="enroll frmModalPopup" data-title="ENROLL NOW" data-button="ENROLL NOW">ENROLL NOW</a> <span class="bottom-slider"></span></div>
</section>


<section id="aboutsid"><div class="about-crs"><div class="container"><div class="row"><div class="col-md-8">
    
    
<div class="about-accordian">

<div class="abt-accordion" id="courseAcrdMain"> 
<?php 	if(!empty($aboutHeading)){  	$i=0; 	$i++;	?> 
<div class="card"><div class="card-header" id="abthdgOne"><h2 class="mb-0"><button type="button" class="btn btn-link" data-target="#heading_<?php echo $aboutHeading->id; ?>" data-parent="#courseAcrdMain">
<span>{!!$aboutHeading->heading!!}</span> </button> </h2></div>
<div id="heading_<?php echo $aboutHeading->id; ?>" class="collapse <?php if($i==1){ echo "show";} ?>" aria-labelledby="abthdgOne" ><div class="card-body"><ul>						 
 
 @if($aboutHeading->courseabout)
<li style="font-size: 13px;"> {!!str_replace('?','',$aboutHeading->courseabout); !!}</li>
 @endif
<ul>
    @if($aboutHeading->paragraph1)
    <li><p style="font-size: 13px;">  <?php if($aboutHeading->paragraph1){ echo str_replace('?','',$aboutHeading->paragraph1); } ?></p></li>
    
    @endif
@if($aboutHeading->paragraph2)
 <li><p style="font-size: 13px;">  {!! str_replace('?','',$aboutHeading->paragraph2); !!}</p> </li>
 @endif

@if($aboutHeading->paragraph3)
 <li><p style="font-size: 13px;"> {!! str_replace('?','',$aboutHeading->paragraph3); !!} </p> </li>
 @endif
 
 @if($aboutHeading->paragraph4)
 <li><p style="font-size: 13px;">  {!! str_replace('?','',$aboutHeading->paragraph4); !!} </p> </li>
 @endif
 
 @if($aboutHeading->paragraph5)
 <li><p style="font-size: 13px;">  {!! str_replace('?','',$aboutHeading->paragraph5); !!}</p> </li>
 @endif
 
 
 @if(!empty($aboutHeading->paragraph6))
 <li><p style="font-size: 13px;">  {!! str_replace('?','',$aboutHeading->paragraph6); !!} </p> </li> 
@endif
  </ul>	
 	 </ul> 
</div> </div> 
</div>	<?php  } ?>  </div></div>
 

</div>	
					 
<div class="col-md-4"><div class="enq-form">
<div class="fix-frm-enq frm-crs-mb">	
<div class="form-contact">	<div class="form-column">	
<strong>Quick Enquiry</strong>
<form action="" method="post" onsubmit="return contactController.dataSaveRight(this)" autocomplete="off">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; }else{  echo $coursesdetails->title; } ?>">
<input type="text"  name="name" placeholder="Enter name*">
<input type="text" name="email" placeholder="Enter E-mail*"> 

<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="" >
<div class="append_countryCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div>


<input type="reset" class="resetData">	
<textarea name="message" placeholder="Enter Message"></textarea>
<button type="submit" name="submit">Submit</button>
</form>
	
</div></div></div></div></div></div></div></div></section>



<style>.countryCodeName {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.pne-div {
    position: relative;
}
.pne-div::after {
    content: '';
    position: absolute;
    background-color: #f2b329;
    width: 1px;
    height: 39%;
    bottom: 10px;
    left: 0px;
}
</style>


<section id="courseContentId"><div class="sticky-section"><section class="curriculum"><div class="cnt-top-hdg"><h2>Course Content</h2><div class="line2"></div></div><div class="container">
<div class="row"><div class="col-md-8"><div class="cnt-hdg-sylb"><h3><?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?> Syllabus </h3>
<div class="line"></div><div class="cnt-dwn"><button class="dwnCrcm" data-title="Download Curriculum" data-button="UNLOCK CURRICULUM">Download Syllabus <i class="fa fa-download"></i></button>
</div></div>
<div class="cnt-ardn mb-4"><div class="accordion" id="acrnCntMain"> 
<?php if(!empty($coursecurriculum)){
	$i=0;
	foreach($coursecurriculum as $course){
	$i++;
	?>
		<div class="card">
			<div class="card-header" id="headingOne">
				<h2 class="mb-0">
					<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#hdgOne<?php echo $i; ?>" data-parent="#acrnCntMain"><i class="fa fa-plus"></i><?php echo str_replace('?','',$course->heading); ?> 				
					</button>
				</h2>
			</div>
			 
			<div id="hdgOne<?php echo $i; ?>" class="collapse <?php if($i==1){ echo "show"; } ?>" aria-labelledby="headingOne" >
			
				<div class="card-body">
				<?php 
$contents = App\CourseCurriculumExcel::where('heading_id',$course->id)->get();
 if($contents){						 
	 
	 foreach($contents as $content){ ?>
						<ul><li><?php echo str_replace('?','',$content->coursescontent); ?></li>
					
					 <?php 
			$subcontents = App\CourseCurriculumExcel::where('content_id',$content->id)->get();
			if($subcontents){
				
				foreach($subcontents as $sub){ ?>
				<ul><p><?php echo str_replace('?','',$sub->subcontent); ?></p>
				
			 <?php 
			$lastcontents = App\CourseCurriculumExcel::where('subcontent_id',$sub->id)->get();
			if($lastcontents){										
				foreach($lastcontents as $last){
				?><ul><li><?php echo str_replace('?','',$last->lastcontent); ?></li>
				<ul>
					<?php 
					$courseEndContent = App\CourseCurriculumExcel::where('endcontent_id',$last->id)->get();
					if($courseEndContent){										
					foreach($courseEndContent as $endContent){
					?>
					<li style="font-size: 11px;"><?php echo str_replace('?','',$endContent->endcontent); ?></li>
					<?php }  } ?>
					</ul>
				
				</ul><?php } } ?></ul>	
		<?php 			
				}
			}
		?> 
			</ul>	<?php } } ?></div></div>
 
		</div>
	<?php } } ?>		
							 
 	<?php if(!empty($moreheading)){	$i=0; foreach($moreheading as $course){	$i++; ?>	<div class="card">	
	<div class="card-header" >	
	<h2 class="mb-0">
<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#hdgOne<?php echo $course->id; ?>"  data-parent="#acrnCntMain"><i class="fa fa-plus"></i><?php echo str_replace('?','',$course->heading); ?> </button>
</h2></div>
<div id="hdgOne<?php echo $course->id; ?>" class="collapse" >	<div class="card-body">	<?php $contents = App\CourseCurriculumExcel::where('heading_id',$course->id)->get(); 
if($contents){	 foreach($contents as $content){ ?><ul><li><?php echo str_replace('?','',$content->coursescontent); ?></li>
<?php $subcontents = App\CourseCurriculumExcel::where('content_id',$content->id)->get(); if($subcontents){	foreach($subcontents as $sub){ ?><ul><p><?php echo str_replace('?','',$sub->subcontent); ?></p>
<?php $lastcontents = App\CourseCurriculumExcel::where('subcontent_id',$sub->id)->get(); if($lastcontents){	foreach($lastcontents as $last){ ?><ul><li><?php echo str_replace('?','',$last->lastcontent); ?></li>
<ul><?php $courseEndContent = App\CourseCurriculumExcel::where('endcontent_id',$last->id)->get(); if($courseEndContent){ foreach($courseEndContent as $endContent){	?> <li style="font-size: 11px;"><?php echo str_replace('?','',$endContent->endcontent); ?></li>
<?php }  } ?> </ul>	</ul><?php } } ?></ul><?php } }	?></ul><?php } } ?></div></div>

</div><?php } } ?></div></div>

<style>
.project{ 
    background: #fff;
    padding: 20px;
     
    box-shadow: 0 0 5px 3px #d4d4d4c2;
    margin-bottom: 20px;
}</style>

<div class="project">
<div class="project-heading"><h3>Certificate</h3><div class="line"></div></div>
<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs">
        <p>Our IT Certification is globally recognized by leading multinational corporations and esteemed organizations. It validates both theoretical understanding and hands-on expertise for freshers as well as corporate professionals. This globally accepted certification enhances your resume's value, equipping you to secure top roles in prominent companies worldwide. Certification is granted only upon successful completion of our comprehensive training and practical projects.</p>		
		
    </div>
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs">
        <img loading="lazy" src="{{asset('public/image/certificate.png')}}" class="img-fluid cartificate_thumb" alt="AWS Training" title="cours" width="316px" height="408px">
    </div>
</div>
<div class="project-list">
<span>Demonstrate your technical abilities by working on real-world, industry-relevant projects.</span>
<span>Industry-Ready Skills: Gain proficiency in cutting-edge IT skills, enabling you to excel in assessments and professional environments.</span>
<span>Our projects and modules adhere to the latest trends and technological advancements in the industry.</span>
<span>Add substantial project experience to your profile, gain visibility among leading employers, and unlock high-paying job opportunities.</span></div>

</div>


<div class="project" id="certificateId"><div class="project-heading"><h3>Student Placement Profile</h3> </div>
<div class="container">        
        <div class="plmt-desc-box">
            <div class="placebox plmt-box-div placeone">
                <div class="plmt-dsc"><strong>Congratulation</strong></div>
                <div class="plce-img"><img src="{{asset('public/image/user.jpeg')}}" alt=""></div>
                <div class="place-name"><strong>Arpit</strong></div>
                
                <div class="place-lans-div">
			   
				<h6>Placed:company_name</h6>
				<p>I joined corporates academy with zero experience in data science and I was honestly nervous about switching careers. But the trainers were so patient, and the course included real projects that helped me to understand the industry. After the program, the placement team connected me with interviews and I am now a Data Analyst at Splunk. It felt like they genuinely cared about my success.</p>
				</div></div>
		</div>

            <div class="plmt-desc-box">
            <div class="placebox plmt-box-div placeone">
                <div class="plmt-dsc"><strong>Congratulation</strong></div>
                <div class="plce-img"><img src="{{asset('public/image/user.jpeg')}}" alt=""></div>
                <div class="place-name"><strong>Arpit</strong></div>
                
                <div class="place-lans-div">
				 
				<h6>Placed:company_name</h6>
				<p>I joined corporates academy with zero experience in data science and I was honestly nervous about switching careers. But the trainers were so patient, and the course included real projects that helped me to understand the industry. After the program, the placement team connected me with interviews and I am now a Data Analyst at Splunk. It felt like they genuinely cared about my success.</p>
				</div></div>
		</div>       
    </div>
</div>

<div class="project" id="faqsid"><div class="project-heading"><h3>FAQ</h3></div>
<div class="cnt-ardn"><div class="accordion" id="faqlistMain">
<?php	if(!empty($coursesdetails->FAQs)){
    
    
    
    $FAQs =json_decode($coursesdetails->FAQs);  $faqquestion  = unserialize($FAQs->faqq); $j=0;	if(!empty($faqquestion)){ $faqanswer  = unserialize($FAQs->faqa);								 
 for($i=0; $i<count($faqquestion); $i++){ $j++;	 ?><div class="card"><div class="card-header" id="faqheadingOne"><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#faqcollapse_<?php echo $i;?>"><i class="fa fa-plus"></i><?php echo (isset($faqquestion[$i])? $faqquestion[$i]:""); ?></button></h2>
</div><div id="faqcollapse_<?php echo $i; ?>" class="collapse <?php if($j==1){ echo "show"; } ?>" aria-labelledby="faqheadingOne" data-parent="#faqlistMain"><div class="card-body"><p><?php echo (isset($faqanswer[$i])? $faqanswer[$i]:""); ?>.</p></div></div></div>
<?php } ?><?php }  }else{
$details = App\Courses::where('id',$coursesdetails->cloneId)->select('FAQs')->first();
 
 
 	if(!empty($details->FAQs)){
    
    $FAQs =json_decode($details->FAQs);  $faqquestion  = unserialize($FAQs->faqq); $j=0;	if(!empty($faqquestion)){ $faqanswer  = unserialize($FAQs->faqa);								 
 for($i=0; $i<count($faqquestion); $i++){ $j++;	 ?><div class="card"><div class="card-header" id="faqheadingOne"><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#faqcollapse_<?php echo $i;?>"><i class="fa fa-plus"></i><?php echo (isset($faqquestion[$i])? $faqquestion[$i]:""); ?></button></h2>
</div><div id="faqcollapse_<?php echo $i; ?>" class="collapse <?php if($j==1){ echo "show"; } ?>" aria-labelledby="faqheadingOne" data-parent="#faqlistMain"><div class="card-body"><p><?php echo (isset($faqanswer[$i])? $faqanswer[$i]:""); ?>.</p></div></div></div>
<?php } } } } ?>
</div>
</div>
</div>


<div class="project"><div class="project-heading"><h3>Testimonials</h3><div class="line"></div></div>

<style>
/* Reset some default styles */
 
 

.cnt-testmonl {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
}

.testimonial {
  background-color: #fff;
  border-radius: 8px;
  padding: 20px;
  width: auto;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.quote-name {
  font-size: 15px;
  font-style: italic;
  color: #555;
  margin-bottom: 7px;
}

.dsc-details {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 15px;
}

.tstm-img {
  border-radius: 50%;
  width: 50px;
  height: 50px;
  margin-right: 15px;
}

.tsm-dec {
  text-align: left;
}

.tstm-name {
  font-size: 1rem;
  font-weight: bold;
  color: #333;
}

.tstm-title {
  font-size: 0.9rem;
  color: #888;
}

</style>
 <div class="cnt-testmonl" id="testimonialsId">
     
     <?php if($testimonials){ foreach($testimonials as $testimonial){ 
      
     
     ?>
    <div class="testimonial">
      <p class="quote-name">"{{ $testimonial->comment; }}"</p>
      <div class="dsc-details">
          <?php if($testimonial->testimonial_image){ ?>
        	<img src="{{asset('public/'.$testimonial->testimonial_image)}}" alt="{{$testimonial->testimonial_image}}" width="50" height="50">
        <?php }else{ ?>
        <img src="{{asset('public/image/user.jpeg')}}" alt="<?php echo $testimonial->name; ?>" class="tstm-img">
      <?php  } ?>
        <div class="tsm-dec">
          <h3 class="tstm-name">{{ $testimonial->name}}</h3>
          <p class="tstm-title">{{ $testimonial->designation }}, {{$testimonial->company_name }}</p>
        </div>
      </div>
    </div>
    <?php  } } ?>
     
    
  </div>
</div>










</div>
<div class="col-md-4"><div class="fix-frm-enq img-inline scroll-on" id="fix-frm-id"><div class="form-contact"><div class="form-column"><strong>Quick Enquiry</strong>
<form action="" method="post" onsubmit="return contactController.dataSaveRight(this)" autocomplete="off">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; }else{ echo $coursesdetails->title; } ?>">
 										
<input type="text" name="name" placeholder="Enter Name">	 
<input type="text" name="email" placeholder="Enter E-mail">	

<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="91" >
<div class="append_countryCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div>


<input type="reset" class="resetData"><textarea name="message" placeholder="Message Details"></textarea>
<button type="submit" name="submit" >Submit</button></form></div></div></div></div></div></div></section>
</div></section>


 
 
 

</div>


<div class="popup-class-div modal fade" id="popupDwnId" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static"><div class="modal-dialog" role="document">
<div class="modal-content"><div class="modal-body"><div class="mdlImg"><img src="{{asset('public/image/enroll_image.png')}}" alt="Enroll"></div><div class="mdl-field-frm"><div class="successmessage"></div><div class="errormessage"></div><button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button><div class="frm-hdg"><img src="{{asset('public/image/download.png')}}" alt="Download"><h4 id="modal-heading">Enquiry Information</h4></div>
<form action="" method="post" onsubmit="return contactController.dataSaveForm(this)" autocomplete="off">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; }else{ echo $coursesdetails->title; } ?>">
 			 			 
<input type="text" name="name" placeholder="Enter Name*">
<input type="text" name="email" placeholder="Enter E-mail*">

<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="" >
<div class="append_countryCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div>


<input type="reset" class="resetData">	 
<textarea name="message" placeholder="Message Details"></textarea> 
<button type="submit" class="modal-placement-button" name="submit"></button></form></div></div></div></div></div>


<div class="modal fade popup-class-div" id="vdoFrmPopupModal" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static">
<div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body"><div class="mdlImg"><img src="{{asset('public/image/enroll_image.png')}}" alt="Enroll"></div>
<div class="mdl-field-frm"><button type="button" class="videoclose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="frm-hdg">
<h4 id="modal-heading">Enquiry Information</h4></div>
<form action=""  method="post" onsubmit="return contactController.saveWatchVideoEnquiry(this)" autocomplete="off">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; }else{ echo $coursesdetails->title; } ?>"> 					
<input type="text" name="name" value="" placeholder="Enter Name*">		        	
<input type="text" name="email" value="" placeholder="Enter E-mail*">	
	        	 
<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="codeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="" >
<div class="appendCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div> 



<input type="reset" class="resetData">
<textarea name="message" placeholder="Message Details"></textarea> 

<button type="submit" class="modal-placement-button" name="submit">Submit</button>   
</form></div></div></div></div></div>
<!-- Modal start-->
<div class="modal fade popup-class-div" id="dwnCrcm" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body"><div class="mdlImg">
<img src="{{asset('public/image/enroll_image.png')}}" alt="Enroll"></div><div class="mdl-field-frm"><div class="successmessage"></div><div class="errormessage"></div><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<div class="frm-hdg"><img src="{{asset('public/image/download.png')}}" alt="Download"><h4 id="modal-heading">VIDEO REVIEWS</h4></div>
<form action="" method="post" onsubmit="return contactController.savedwnCrcm(this)" autocomplete="off">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?>">
<input type="hidden" name="from" value="<?php if(!empty($coursesdetails->title)){ echo $coursesdetails->title; } ?>">	
<input type="hidden" name="frm_title" class="frm_title" >	
<input type="text" name="name" value="" placeholder="Enter your Name">
<input type="text" name="email" value="" placeholder="Enter your e-mail">		         
<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="" >
<div class="append_countryCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div> 


<input type="reset" class="resetData"><button type="submit" class="modal-placement-button" name="submit" >Submit</button></form></div></div></div></div></div>
 <div class="dwn-frm-div">
    <div class="modal fade" id="download_mobileotp" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="modlMain"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="model-image">
    <img src="{{asset('public/image/svg/Otp_new.svg')}}" alt="dwn-frm-div" class="img-fluid">
    </div>
    <div class="modal-body text-center">
    <div class="dwn-frm-div-content">     
    <p class="mb-0">An OTP  on your submit Mobile No has been shared.please check and submit OTP</p>
    <div class="submit-download-from otp-fill">   
 <div class="mdl-field-frm">	
	<form action="" method="post" class="form-inline" onsubmit="return contactController.getOTP(this)" autocomplete="off">

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
	
	
<div class="dwn-frm-div"><div class="modal fade" id="dwn-pdf-Id" tabindex="-1" role="dialog" aria-labelledby="modlMain" aria-hidden="true" data-backdrop="static">
<div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="modlMain"></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button></div><div class="model-image"><img src="" alt="dwn-frm-div" class="img-fluid"></div>
<div class="modal-body text-center"><div class="dwn-frm-div-content"><h6>Download <?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; } ?> Curriculum</h6>
<p>We’re the best training provider with rigorous industry-relevant programs designed and delivered in collaboration with world-class faculty, industry & Infrastructure.</p>
<div class="submit-download-from">
<?php if(!empty($coursesdetails->course_pdf_text)){ ?><a href="{{asset('download')}}/<?php if(!empty($coursesdetails->course_pdf_text)){ echo $coursesdetails->course_pdf_text.'.pdf'; } ?>" target="_blank" class="button-green" name="submit">Download Here</a><?php } ?></div></div></div></div></div></div></div>


<div class="modal right fade " id="sidepopup-class-div" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" data-backdrop="static">
<div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="myModalLabel2">Join us for a Free Demo</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
<div class="modal-body"><div class="dropquery-right"><p>Share some of your details and we will be in touch with you for demo details, and know about Batches Available with us!</p>
<form action=""  method="post" onsubmit="return contactController.dataSaveRight(this)" autocomplete="off">
<input type="hidden" name="course" value="<?php if(!empty($coursesdetails->course_name)){ echo $coursesdetails->course_name; }else{ echo $coursesdetails->title; } ?>">
 							
<input type="text" name="name" placeholder="Enter Name*">
<input type="text" name="email" placeholder="Enter E-mail*">

<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCountryFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="" >
<div class="appCountryCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div>

<textarea name="message" placeholder="Enter Message"></textarea>
<input type="reset" class="resetData"><input type="submit" value="Submit"></form><div class="dropquery-right-img"><img src="" alt="lady"></div></div></div></div></div></div>


<div id="mstHrnMdId" class="modal fade" tabindex="-1"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><img src="" alt="master" class="certificate-image"></div></div></div></div>


<script>var acc = document.getElementsByClassName("abt-accordion");	var i; for (i = 0; i < acc.length; i++) {	acc[i].addEventListener("click", function() {	this.classList.toggle("active"); var panel = this.nextElementSibling; if (panel.style.maxHeight) { panel.style.maxHeight = null; } else { panel.style.maxHeight = panel.scrollHeight + "px"; 	} 	}); }	</script>
	 
	 
	 
	 
	 
	 
	 <style>
.benefits {
    display: inline-block;
    width: 100%;
}


.benefit-rows ul {
    display: flex !important;
    text-align: center;
    margin-top: 0;
}
.overview p {
    margin-top: 32px;
    font-size: 14px;
    line-height: 1.57;
}

.benefit-rows {
    margin-top: 32px;
}

.benefit-rows ul {
    display: flex;
    text-align: center;
    margin-top: 0;
}

.benefits ul {
    margin-top: 30px;
    display: inline-block;
    margin-bottom: 0;
    width: 100%;
    position: relative;
}

.benefit-rows ul li:first-child {
    max-width: 280px;
}
.benefits .benefit-rows li {
    color: #51565e;
}

.benefits li {
    font-size: 16px;
    font-weight: 500;
    line-height: 1.25;
    letter-spacing: .4px;
    color: #272c37;
    margin: 0;
    display: inline-block;
    padding: 10px;
    width: 100%;
}
.graphic {
    margin-top: 24px;
}

.graphic .tab ul {
    min-height: 10px;
    height: 242px;
    box-shadow: 0 2px 8px 0 rgb(0 0 0 / 10%);
}
.tab ul {
    border: 1px solid #d2d6de;
    min-height: 272px;
    margin-top: 0;
    border-radius: 4px;
    overflow: hidden;
}
.benefits ul {
    margin-top: 30px;
    display: inline-block;
    margin-bottom: 0;
    width: 100%;
    position: relative;
}
.tab ul li {
    box-shadow: none;
}


.graphic .tab li.active a {
    cursor: default;
}
.tab ul li.active a {
    border-right: 0;
}
.graphic .tab li.active a {
    cursor: default;
}

.tab ul li:first-child a {
    border-radius: 4px 0 0 0;
}
.tab li.active a {
    background-color: #fff;
    color: #1179ef;
}

.tab .two a {
    padding: 49px 0;
}


.tab ul li.active a {
    border-right: 0;
}
.tab ul li:first-child a {
    border-radius: 4px 0 0 0;
}
.tab li.active a {
    background-color: #fff;
    color: #1179ef;
}
.tab a {
    color: #272c37;
    text-align: center;
    cursor: pointer;
    font-size: 14px;
    left: 0;
    width: 280px;
    padding: 18.6px 0;
    line-height: 1.7;
    border-bottom: 1px solid #d2d6de;
}
.tab a {
    display: inline-block;
    color: #1179ef;
    text-align: left;
    font-weight: 500;
    cursor: pointer;
    font-size: 16px;
    left: 0;
    width: 100%;
    padding: 11px 0;
    line-height: 1.7;
    border-radius: 4px;
    background-color: #ebf1f8;
    padding-left: 20px;
    position: relative;
}
.tab li.active .tabcontent {
    display: block;
}
.tabcontent {
    padding: 0 12px;
    float: right;
    width: calc(92% - 200px);
    height: 242px;
    position: absolute;
    left: 280px;
    top: -1px;
}
.graphic .salarys {
    padding-bottom: 0;
    height: 242px;
}
.salarys {
    width: 50%;
    display: inline-block;
    vertical-align: top;
}
.salarys {
    width: 50%;
    height: 271px;
    overflow: hidden;
    display: inline-block;
    vertical-align: middle;
    padding-bottom: 16px;
}
.graphic span.heading {
    display: inline-block;
    width: 1px;
    overflow: hidden;
    height: 242px;
    vertical-align: middle;
    margin: 0;
    position: static;
    background: #fff;
    color: #fff;
}
.graphic span.heading {
    font-size: 14px;
    font-weight: 500;
    color: #272c37;
    display: inline-block;
    width: 100%;
    margin: 24px 0 8px 5px;
}
.tabcontent span {
    clear: both;
    position: absolute;
    bottom: 19px;
    left: 92px;
}
.graphic .salary-line {
    margin: auto;
    display: inline-block;
    vertical-align: middle;
    width: calc(100% - 1px);
    margin-top: 2px;
}
.salary-line {
    text-align: center;
    display: inline-block;
    width: 100%;
    margin: 46px 0 0;
}
.graphic .salary-line {
    margin: auto;
    display: inline-block;
    vertical-align: middle;
    width: calc(100% - 1px);
    margin-top: 2px;
}
.graphic .hire .hire-source, .graphic .salarys .salary-sourse {
    padding: 0;
    margin: 0;
    margin-top: 16px;
}
.salarys .salary-sourse {
    font-size: 12px;
    font-weight: 400;
    text-align: center;
    display: block;
    position: relative;
    left: 0;
    top: 16px;
    margin-top: 14px;
    color: #51565e;
}
.tabcontent span {
    clear: both;
    position: absolute;
    bottom: 19px;
    left: 92px;
}
.graphic .tab ul .hire {
    min-height: 242px;
}
.tab ul .hire {
    min-height: 292px;
}
.hire {
    padding-bottom: 0;
    position: relative;
}
.hire {
    width: 50%;
    display: inline-block;
    vertical-align: middle;
}
.salarys .dual-bar:first-child {
    margin-left: 0;
    height: 20px;
}
.salarys .dual-bar {
    width: 40px;
    height: 128px;
    background-color: #79bdf6;
    display: inline-block;
    margin-left: 15px;
    vertical-align: bottom;
    position: relative;
}
.salarys .dual-bar .price {
    display: block;
}
.salarys .dual-bar .price {
    font-size: 10px;
    font-weight: 500;
    color: #272c37;
    position: absolute;
    top: -16px;
    right: 0;
    left: 0;
    margin: auto;
}
.tabcontent span {
    clear: both;
    position: absolute;
    bottom: 19px;
    left: 92px;
}
.salarys .dual-bar .price {
    display: block;
}
.salarys .dual-bar .percent {
    top: inherit;
    bottom: -20px;
}

.salarys .salary-line .active {
    position: relative;
    border-bottom: 1px solid #000;
    width: auto;
    padding: 0 10px;
    text-align: center;
    display: inline-block;
}

</style>
	 
	 

	 
	 
<style>	
.points h4{
padding: 15px 0px 0px 15px;
}
.points-features {
    padding-top: 50px;
    padding-bottom: 50px;
}
.points-super-heading h2 {
    text-transform: uppercase;
    border-bottom: 4px solid #0F2C39;
    width: 240px;
    color: #0F2C39;
    font-size: 24px;
    font-weight: 700;
    margin: 0 auto 30px;
    padding-bottom: 2px;
}
.benefits h4{
padding: 15px 0px 0px 15px;
}
.benefits-features {
    padding-top: 50px;
    padding-bottom: 50px;
}
.benefits-super-heading h2 {
    text-transform: uppercase;
    border-bottom: 4px solid #0F2C39;
    width: 112px;
    color: #0F2C39;
    font-size: 24px;
    font-weight: 700;
    margin: 0 auto 30px;
    padding-bottom: 2px;
}
</style>	
 
<style>	
 
.placement-features {
    padding-top: 50px;
    padding-bottom: 50px;
}
.placement-super-heading h2 {
    text-transform: uppercase;
    border-bottom: 4px solid #ED3237;
    width: 320px;
    color: #ED3237;
    font-size: 24px;
    font-weight: 700;
    margin: 0 auto 30px;
    padding-bottom: 2px;
}
.placement-assistment {
    background-color: #f8f8f8;
    background-size: cover;
    height: 700px;
    width: 100%;
}
.topic-content h4{
	font-size: 15px;
}
</style>



<style>
.system-approch {
  margin-top: 50px;
}
.fix {
    overflow: hidden;
}
.pb-70 {
    padding-bottom: 70px;
}
.pt-120 {
    padding-top: 120px;

}
.mt-30{
 margin-top: 30px;
 }
.position-relative {
    position: relative!important;
}
.campus-shape-sticker {
    position: absolute;
    bottom: 70px;
    right: 25px;
    z-index: 1;
}
.shape-light {
    position: absolute;
    background: #FFB013;
    width: 60px;
    height: 60px;
    text-align: center;
    line-height: 60px;
    border-radius: 50%;
    top: -40px;
    right: 20px;
    animation-duration: 2.5s;
    animation-fill-mode: both;
    animation-iteration-count: infinite;
    animation-name: hero-bounce;
}
.campus-shape-content {
    max-width: 290px;
    background: #ffffff;
    padding: 25px 25px;
    border-radius: 5px;
    box-shadow: 0px 40px 50px rgba(24, 44, 74, 0.16);
}
.campus-shape-content h5 {
    font-family: "Nunito Sans", sans-serif;
}
.campus-shape-content span {
    font-size: 18px;
    color: #141517;
    font-weight: 600;
}
.campus-shape-1 {
    position: absolute;
    right: -26%;
    bottom: calc(0% - 70px);
}
.campus-shape-2 {
    position: absolute;
    bottom: 16%;
    left: -14%;
}
.align-items-center {
    align-items: center!important;
}
.mb-30 {
    margin-bottom: 30px;
}
.section-title h2 {
    font-size: 36px;
    line-height: 1.3;
}
.down-mark-line-2 {
    position: relative;
    z-index: 2;
    display: inline-block;
}
.down-mark-line-2::before {
    position: absolute;
    content: "";
    left: 0;
    bottom: 8%;
    width: 100%;
    z-index: -1;
    height: 100%;
    background: url();
    background-size: contain;
    background-repeat: no-repeat;
    background-position: bottom;
    -webkit-animation: section-animation 3s infinite;
    animation: section-animation 3s infinite;
}
.compus-content p {
    margin-bottom: 25px;
}
.compus-content ul li {
    font-size: 16px;
    color: #141517;
    font-weight: 600;
    margin-bottom: 10px;
}
.compus-content ul li i {
    margin-right: 10px;
    color: #2467EC;
}
.campus-img-wrapper {
    min-height: 495px;
    margin-top: 56px;
}
.campus-img-1 {
    position: absolute;
    top: 140px;
}
.campus-img-2 {
    position: absolute;
    top: -5%;
    left: 23%;
}
.campus-img-3 {
    position: absolute;
    top: -11%;
    left: 60%;
}

.campus-img-4 {
    position: absolute;
    top: 41%;
    left: 23%;
}
.campus-img-5 {
    position: absolute;
    right: -4px;
    top: 23%;
}
 
@media only screen and (min-width: 1200px) and (max-width: 1399px){
.campus-img-3 {
    left: 71%;
}
.campus-img-4 {
    left: 27%;
}
}

</style>
<section>
<div class="why-choose-cnt fix pb-70 ">
            <div class="container"><div class="row"><div class="col-md-12">
                <div class="campus-wrapper position-relative">
                    <div class="campus-shape-sticker">
                        
                        
                    </div>
                    <div class="campus-shape-1">
                        <img src="{{asset('public/image/cumpus-2.jpg')}}" alt="shape">
                    </div>
                 
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="compus-content mb-30">
                                <div class="section-title mb-30">								
								    <h2>Why Students <span class="down-mark-line-2">Choose</span> Us to Groom their Career</h2>                    

                                </div>
                                <p>Expand your career opportunities with India's most trusted IT &amp; <?php if($coursesdetails->course_name){ echo  $coursesdetails->course_name; } ?> @institute. Get job-ready for an in-demand career. Choose from Multiple certification programs with us.</p>
                                <ul>
                                    <li><i class="fa fa-check"></i>More than 68806+ Students Trained. </li>
                                    <li><i class="fa fa-check"></i>Team of 470+ Experienced &amp; Certified Instructors. </li>
                                    <li><i class="fa fa-check"></i>250+ Collaboration with Universities &amp; Companies.</li>
                                    <li><i class="fa fa-check"></i>ISO 9001:2015 Accredited Company.</li>
                                    <li><i class="fa fa-check"></i>Industry Recognised Verifiable Certificate.</li>
                                </ul>
								
								 
                           
							
							</div>
                        </div>                     
						<div class="col-xl-6 offset-xl-1 col-lg-6">
                            <div class="campus-img-wrapper position-relative">
                                <div class="campus-shape-3">
                                    <img src="{{asset('public/image/first-1.png')}}" alt="shape">
                                </div>
                                <div class="campus-img-1">
                                    <img src="{{asset('public/image/shape-1.png')}}" alt="training 1">
                                </div>
                                <div class="campus-img-2">
                                    <img src="{{asset('public/image/shape-2.webp')}}" alt="training 2">
                                </div>
                               
                                <div class="campus-img-4">
                                    <img src="{{asset('public/image/share-4.avif')}}" alt=" training 4">
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


<!--<section class="system-approch">
<div class="container">
    
    <div class="row"><div class="col-md-12">
	<div class="salary-info">
	<div class="col-md-12 csm-benfit">

	    <h3>System Approch for Placement</h3>
	<div class="row">
	<div class="col-md-8">
	<ul>
	<li>How do you build your brand?</li>	
	<li>How do you select  your students?</li>
	<li>How do you enhance their lerning?</li>
    <li>How do you increase their employability?</li>
    <li>How do you strenthen their Network?</li>
    <li>How do you enrich their exposure?</li>
    <li>How do you help them plan their careers?</li>
	<li>How do you Create job opportunites?</li>
	</ul>
	
	</div>
	<div class="col-md-4">
	    <div class="placement-img">
	 <img src="{{asset('public/image/first-1.png')}}" alt="shape">
	 </div>
	 </div>

	</div>
	</div>
	</div>
	</div>
	</div>
		</div>
	</section>-->
	
	
	
<section class="system-approch">
<div class="container">
    
    <div class="row"><div class="col-md-12">
	<div class="salary-info">
	<div class="col-md-12 csm-benfit">

	    <h3>Hiring companies</h3>
	<div class="row">
	   <div class="col-md-4">
	    <div class="placement-img">
	 <img src="{{asset('public/image/first-1.png')}}" alt="shape">
	 </div>
	 </div> 
	<div class="col-md-8">
    
	<ul>
	 <li>We contact our team via email, phone, or our website to express your interest in collaboration.
</li>	
	<li>Share your organization's specific training needs, skill gaps, and goals. We'll help you identify the best solutions for your workforce.</li>
	<li>We create a tailored proposal, including training modules, timelines, delivery methods (online, on-site, or hybrid), and costs.</li>
	<li>Sign a Memorandum of Understanding (MoU) or an agreement outlining the scope of work, responsibilities, and deliverables.</li>
	<li>Collaborate with our experts to design training modules aligned with your business objectives and technology stack.</li>
	
	</ul>
	</div>
	

	</div>
	</div>
	</div>
	</div>
	</div>
		</div>
	</section>
	
	
		
	
<section class="system-approch">
<div class="container">
    
    <div class="row"><div class="col-md-12">
	<div class="salary-info">
	<div class="col-md-12 csm-benfit">

	    <h3>Interview Preperation</h3>
	<div class="row">
	<div class="col-md-8">
    
	<ul>
	 <li>We equip you with the skills and confidence needed to ace technical and behavioral interviews.</li>	
	<li>Mock interviews with industry experts experience real world interview scenarios with guidance and feedback from IT professionals.</li>
	<li> Resume building and optimization learn how to craft a compelling resume tailored to the IT industry to stand out from the competition.</li>
	<li>In Depth technical training master key concepts, programming languages, and tools relevant to your desired role.</li>
	<li>Gain hands on experience solving coding challenges commonly asked in IT interviews.</li>
	<li>Enhance your presentation, teamwork, and problem-solving abilities for non-technical interview rounds.</li>
	</ul>
	</div>
	<div class="col-md-4">
	    <div class="placement-img">
	 <img src="{{asset('public/image/first-1.png')}}" alt="shape">
	 </div>
	 </div>

	</div>
	</div>
	</div>
	</div>
	</div>
		</div>
	</section>
	
	
			
	
<section class="system-approch">
<div class="container">
    
    <div class="row"><div class="col-md-12">
	<div class="salary-info">
	<div class="col-md-12 csm-benfit">

	    <h3>Class cross question</h3>
	<div class="row">
	    <div class="col-md-4">
	    <div class="placement-img">
	 <img src="{{asset('public/image/first-1.png')}}" alt="shape">
	 </div>
	 </div>
	<div class="col-md-8">
    
	<ul>
	 <li>Easily switch between batches to accommodate your schedule without disrupting your learning journey.
</li>	
	<li>Missed a class? Join a different batch at the same level to ensure you stay on track.</li>
	<li>Experience diverse teaching styles by attending sessions conducted by different trainers.</li>
	<li>Switching batches or attending cross-classes comes at no extra cost, making learning convenient and affordable.</li>
	<li>Gain insights and network with students from various batches to enhance your understanding of topics.</li>
	<li>Adaptive learning support we provide personalized guidance to help you transition smoothly between classes or instructors.</li>
	</ul>
	</div>
	

	</div>
	</div>
	</div>
	</div>
	</div>
		</div>
	</section>
	
			



<section class="analysis"><div class="container"><div class="row"><div class="col-md-12"><div class="heading"><h3>Related Programs</h3></div>
<div class="heading-desc hidden-xs">
</div></div><div class="col-md-12">	<div class="analysis-test">

<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}"><img src="{{asset('public/image/svg/aws.svg')}}" alt="explantion" width="60" height="57"></div><div class="analysis-heading"><p>AWS Training</p></a>
</div></div>

 

<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/devops-training')}}"><img src="{{asset('public/image/svg/devops.svg')}}" alt="devops" width="60" height="57"></div><div class="analysis-heading"><p>Devops</p></a>
</div></div>

<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}"><img src="{{asset('public/image/big-tool-Power_BI.png')}}" alt="big-tool-Power_BI" width="60" height="57"></div><div class="analysis-heading"><p>Power BI</p></a>
</div></div>

<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}"><img src="{{asset('public/image/data-science.svg')}}" alt="data-science" width="60" height="57"></div><div class="analysis-heading"><p>Data Science</p></a>
</div></div>
<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}"><img src="{{asset('public/image/svg/python.svg')}}" alt="python" width="60" height="57">
</div><div class="analysis-heading"><p>Python</p></a></div></div>


<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}"><img src="{{asset('public/image/svg/Salesforce.svg')}}" alt="Salesforce" width="60" height="57"></div><div class="analysis-heading"><p>Salesforce</p></a>
</div></div>

<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}"><img src="{{asset('public/image/svg/Tableaus.svg')}}" alt="Tableaus" width="60" height="57"></div><div class="analysis-heading"><p>Tableaus</p></a>
</div></div>

<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}"><img src="{{asset('public/image/amazon.png')}}" alt="amazon" width="60" height="57"></div>
<div class="analysis-heading"><p>Web amazon</p></a>	</div></div>

<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}">	<img src="{{asset('public/image/big-tool-sql.png')}}" alt="big-tool-sql" width="60" height="57">
</div><div class="analysis-heading"><p>Big tool sql</p></a></div></div>



<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}">	<img src="{{asset('public/image/R_Program.png')}}" alt="R_Program" width="60" height="57">
</div><div class="analysis-heading"><p>R Program</p></a></div></div>


<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}">	<img src="{{asset('public/image/sas.png')}}" alt="sas" width="60" height="57">
</div><div class="analysis-heading"><p>SAS</p></a></div></div>


<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}">	<img src="{{asset('public/image/small-tool-Hadoop.png')}}" alt="small-tool-Hadoop" width="60" height="57">
</div><div class="analysis-heading"><p>Hadoop</p></a></div></div>

<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}">	<img src="{{asset('public/image/cloud.png')}}" alt="cloud" width="60" height="57">
</div><div class="analysis-heading"><p>Cloud</p></a></div></div>
<div class="analysis-points"><div class="analysis-self"><a href="{{url('/courses/aws-certification-training')}}">	<img src="{{asset('public/image/Microsoft.png')}}" alt="Microsoft" width="60" height="57">
</div><div class="analysis-heading"><p>Microsoft</p></a></div></div>


</div>
 

</div>



</div></div>
</section>

<style>	
.placement-img img{
    width:100%;
}
.system-approch h3 {
  color: #ED3237;
  font-size: 18px;
  font-weight: 600;
  margin: auto;
  padding-bottom: 5px;
  margin-bottom: 30px;
}
.patner-cnt {
    background-color: #F6F8FB;
}
.patner-cnt p{
    color:#000;
}

.pb-170 {
    padding-bottom: 170px;
}
.pt-110 {
    padding-top: 110px;
}

.partner-box {
    position: relative;
    max-width: 430px;
    z-index: 2;
}	
.partner-thumb {
    position: absolute;
    top: -110px;
    left: -250px;
    z-index: -1;
}
.section-title h2 {
    font-size: 36px;
    line-height: 1.3;
    color:#ED3237;
}
.salary-info h3{
    color:#ED3237;
}
.down-mark-line-2 {
    position: relative;
    z-index: 2;
    display: inline-block;
}
.down-mark-line-2::before {
    position: absolute;
    content: "";
    left: 0;
    bottom: 8%;
    width: 100%;
    z-index: -1;
    height: 100%;
    background: url(../image/down-mark-line-2.png);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: bottom;
    -webkit-animation: section-animation 3s infinite;
    animation: section-animation 3s infinite;
}
.partner-text {
    margin-top: 20px;
}
.partner-text p {
    font-weight: 600;
    color: #141517;
    max-width: 245px;
}
.partner-text p span {
    font-size: 24px;
    font-weight: 700;
    color: #2467EC;
}
.partner-wrapper {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 45px 70px;
    margin-top: 10px;
}
@media only screen and (min-width: 1200px) and (max-width: 1399px){
.partner-wrapper {
    gap: 45px 45px;
}
}

</style>			
<section>
	 
	 <div class="patner-cnt pt-110 pb-170 mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-4 col-md-4">
                        <div class="partner-box mb-30">
                            <!--<div class="partner-thumb d-none d-sm-block">
                                <img src="{{asset('public/image/partner.png')}}" alt="partner-png"/>
                            </div>-->
                            <div class="section-title mb-30">
                                <h2>Our
                                    <span class="down-mark-line-2">Global</span> Honorable Partners
                                </h2>
                            </div>
                            <div class="Partner-content">
                                <p>Boost your Career growth company and Professional Certifications. "jobs without un-Limits"</p>
                                <div class="partner-text">
                                    <p> <span>250+</span> Collaboration with leading &amp; Companies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-8 col-md-8">
                        <div class="partner-wrapper">
                            <div class="singel-partner">
                                <img src="{{asset('public/image/partners/infosys.png')}}" alt="infosys">
                            </div>
                            <div class="singel-partner">
                                <img src="{{asset('public/image/partners/wipro.png')}}" alt="wipro">
                            </div>
                            <div class="singel-partner">
                                <img src="{{asset('public/image/partners/tech-mahindra.png')}}" alt="tech-mahindra">
                            </div>
                            <div class="singel-partner">
                                <img src="{{asset('public/image/partners/magic-software.png')}}" alt="magic-software">
                            </div>
                            <div class="singel-partner">
                                <img src="{{asset('public/image/partners/birla-soft.png')}}" alt="birla-soft">
                            </div>
                            <div class="singel-partner">
                                <img src="{{asset('public/image/partners/genpact.png')}}" alt="genpact">
                            </div>
                            <div class="singel-partner">
                                <img src="{{asset('public/image/partners/nagarro.png')}}" alt="nagarro">
                            </div>
                            <div class="singel-partner">
                                <img src="{{asset('public/image/partners/snapdeal.png')}}" alt="snapdeal">
                            </div>
                            <div class="singel-partner">
                                <img src="{{asset('public/image/partners/HCL.png')}}" alt="HCL">
                            </div>
                            <div class="singel-partner">
                                <img src="{{asset('public/image/partners/NIIT.png')}}" alt="NIIT">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
	 
 
 
 
<div class="fade modal popup-class-div" id="with_course" aria-labelledby="modlMain" data-backdrop="static" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop-limit="1" data-modal-parent="#menuCoursePopupId">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header" style="background:#f7fbff">
<div class="frm-hdg"><img alt="You are" src="{{asset('/public/image/youAre.png')}}" width="21" height="21"> Would you like a <b style="font-size:16px;margin-bottom:-5px;color:#165C97">Free Demo </b> of your <b style="font-size:16px;margin-bottom:-5px;color:#165C97"><?php echo $coursesdetails->course_name; ?></b> Course?</div><button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
<div class="mdlImg"><img alt="Enroll" src="{{asset('/public/image/enroll_image.png')}}" width="290" height="254"></div>
<div class="mdl-field-frm">
<div class="successmessage"></div>
<div class="errormessage"></div>
 <div class="whatsheading">
     <a href="https://wa.me/918800182225" target="_blank" aria-label="Whatsup"><span>Click Hare to Start conversion</span> <i class="fa fa-whatsapp fa-fw" style="color: #fff;font-size: 18px;background: #14D73F;border-radius: 4px;"></i></a></div>
<h2>OR</h2>
<form action="" autocomplete="off" method="post" onsubmit="return contactController.dataSavePopup(this)">  
 
 
<input name="course" type="hidden" value="<?php if (!empty($coursesdetails->course_name)) { echo $coursesdetails->course_name; } else { echo $coursesdetails->title; } ?>"> 
<input name="name" placeholder="Enter Name*"> 
<input name="email" placeholder="Enter E-mail*">

<div class="code-phone">
<div class="code-drop-down d-flex">
<div class="arrow-frm">
<input class="countryCodeName" type="text" placeholder="Country Code*" aria-label="Search" onkeyup="searchCodeFunction(this.value,'')"  autofocus>
<input type="hidden" class="form-control countryCodeValue" name="code" value="" >
<div class="append_countryCode"></div>
</div>
<div class="pne-div w-100">  
<input name="phone" type="tel" maxlength="16" placeholder="Enter Mobile no* " onkeypress="return isNumericKeyCheck(event)">
</div>
</div>
</div>

<input type="reset" class="resetData">
<textarea name="message" placeholder="Enter Message"></textarea>
<button class="modal-placement-button popbtn" type="submit" title="when button disabled then enter value" name="submit" value="Submit">Submit</button>
</form>
 
</div>
</div>
</div>
</div>
</div>



<script>
 
function popupRefesh() {
            $('#with_course').modal();
            $('#with_course').show();
        }
        setTimeout('popupRefesh()', 5000);
    </script>
</script>
	 
    </script>
	 
	 
	 
	 @endsection