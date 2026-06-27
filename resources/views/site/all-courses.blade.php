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
	 India's No.1 IT Training Institute in Noida | Delhi | Gurgaon
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
<div class="main">
    <style>
    .course-banner{
    background: url(public/image/course-banner.jpg) !important;background-size: cover !important;height: 180px !important;    background-repeat: no-repeat !important;background-position: center !important;
    }
    </style>
<div class="course-banner">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs">
            <div class="top-banner-title">
                
			</div>
            
        </div>
    </div>
</div>
		
		

<section id="curriculumid"><div class="sticky-section"><section class="curriculum"><div class="cnt-top-hdg"><h2>Courses </h2><div class="line2"></div></div><div class="container">
<div class="row"><div class="col-md-8">




 
 
<style>  .project{ 
    background: #fff;
    padding: 20px;
     
    box-shadow: 0 0 5px 3px #d4d4d4c2;
    margin-bottom: 20px;
}</style>

						

<div class="project">



<div class="row">
<div class="col-md-12">

<style>
.icon-with- {
  display: flex;
  gap: 5px;
}

.cards .boxes P {
  color: var(--white-color);
  font-size: 10px;
  margin-bottom: 5px;
}
.crs-text-para{
  padding: 0px 7px;
  margin: 0px 0px;  
}
.bax-class{
    margin: 0px 18px;
    
}
.course-info{
    padding: 0px 0px;
  margin-right: 50px;
    
}

.course-lst-box{
       padding: 0px 0px;
  margin-right: 50px;
    
}
</style>
<div  class="corp-course">
<div class="crs-content">
<?php 

  

 $courses =DB::table('web_courses as course'); 
                            $courses  =$courses->join('web_category as category','course.category','=','category.id','left');
                            $courses = $courses->join('web_subcategory as sub','course.subcategory','=','sub.id','left');	
                            $courses =$courses->select('course.*','category.category as categoryname','category.id as categoryid','sub.course_icons','sub.course_image');
                            
                            $courses =$courses->whereNotNull('category.category');
                            $courses =$courses->orderby('category.category','ASC');
                            $courses =$courses->get();

?>
<div class="crs-show-list"> 
 
@if(!empty($courses))
<?php $x=0; ?>
@foreach($courses as $course)
<?php   
$x++;

if($x ==1)
$class = 'one';
else if($x == 2 )
$class = 'two'; 
else if($x == 3)
$class = 'three'; 
else if($x == 4)
$class = 'four'; 
else if($x == 5)
$class = 'five'; 
else if($x == 6)
$class = 'six';
else if($x == 7)
$class = 'seven'; 
else if($x == 8)
$class = 'eight'; 
else if($x == 9)
$class = 'nine';
else if($x == 10)
$class = 'ten'; 
?>
<div class="cors-box">

<div class="cors-box-title">
<div class="<?php echo $class; ?>" >
<div class="cors-img ">

<?php 
 

$cimage= unserialize($course->course_icons); 
if(!empty($cimage)){
?>
<a href="{{url('courses/'.$course->slug)}}"><img src="{{asset('public/'.$cimage['course_icons']['src'])}}" alt="{{($cimage['course_icons']['src'])}}"  class="img-fluid" /></a>
<?php  } ?>

</div>
</div>
<div class="cors-desc">
<div class="cors-heading cors-box-content">
<div class="cors-box-leftsection">
<h4><a href="{{url('courses/'.$course->slug)}}">{{$course->title}}</a></h4>
<div class="rating-smile1">
<?php 
$rating=$course->rating;
$stars = '<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-half"></i>';

switch($rating){
case 4:
$stars = '<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>';
break;
case 4.5:
$stars = '<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-half"></i>';
break;
case 4.75:
$stars = '<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-half"></i>';
break;
case 4.8:
$stars = '<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-half"></i>';
break;
case 4.9:
$stars = '<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-half"></i>';
break;
case 5:
$stars = '<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>';
break;
} ?>

<?php echo $stars; ?>
<span class="rating"> {{$course->rating}} rating</span>


</div>

<div class="icon-with-">
     <div class="first-flex">
           <div class="course-info">
<div>
<ul>
<li><i class="fa fa-plane"></i> 100% Job Assignment</li>
<li><i class="fa fa-youtube-play"></i> Online Classes</li>
<li><i class="fa fa-question"></i> Interview Preparation</li>
 
</ul>
</div>

</div>
    </div>
    <div class="second-flex">
        
        <div class="course-info">
<div>
<ul>
<li><i class="fa fa-clock-o "> </i> {{$course->course_duration}} Hours of Learning</li>
<li><i class="fa fa-calendar-plus-o"></i> {{$course->live_project}} Assignments</li>
<li><i class="fa fa-youtube-play"></i> {{$course->live_project}}  Live project</li>
 
</ul>
</div>

</div>

</div>

 
   
    
</div>


 
</div>

</div>

</div>



</div>

</div>
@endforeach
@endif
 


</div>



</div>

</div>




</div>
</div>
			


 
 


</div>
 

 


</div>
<div class="col-md-4"><div class="fix-frm-enq img-inline scroll-on" id="fix-frm-id"><div class="form-contact"><div class="form-column"><strong>Quick enquiry</strong>
<form action="" method="post" onsubmit="return contactController.dataSaveRight(this)" autocomplete="off">

											
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
 
<select type="text" name="course" class="select-technology">
<option value="">Select technology*</option>
@if(!empty($courses_list))
@foreach($courses_list as $course)
<option value="{{$course->course_name}}"> {{$course->course_name}}</option>
@endforeach
@endif					
</select>
<input type="reset" class="resetData"><textarea name="message" placeholder="Message Details"></textarea>
<button type="submit" name="submit" >Submit</button></form></div></div></div></div></div></div></section>
</div></section>


		 
	</div>
	@endsection