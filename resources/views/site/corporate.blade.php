@extends('site.layouts.app')
@section('title')
@if(!empty($coursesdetails->title))	 
{{$coursesdetails->title}}; 
@else
Corporate Academy India's No.1 Tailor Made Corporate Upskilling Programs - Corporates Learning
@endif
@endsection 
@section('keyword')
@if(!empty($coursesdetails->meta_keyword))
{{$coursesdetails->meta_keywords}};
@else
corporate training programs, corporate training, corporate training for freshers, Corporate training examples, Corporate training courses, corporate training in delhi, Corporate training for employees, corporate training in india, corporate training companies, corporate training certification
@endif
@endsection
@section('description')
@if(!empty($coursesdetails->meta_description))
{{$coursesdetails->meta_description}};
@else
Enhance the professional Skills of Your Employees With Tailor-Made Corporate Upskilling Programs. Address Your Corporate Training needs with Corporates Learning. 
@endif
@endsection
@section('content')
<div class="main">
<style>.cor_banner {
    background-image: url(../images/corporate_training/corporate_bg.webp);
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 550px;
    position: relative;
}


 <style>.top-banner {
    padding: 30px 0;
    position: relative;
    z-index: 1;
    min-height: 185px;
    justify-content: center;
    align-items: center;
    display: flex;
}

.top-banner-title h1 {
    display: table;
    border: 1px solid #ED3237;
    padding: 10px 22px;
    position: relative;
    font-size: 18px;
    margin: 15px auto;
    color: #ED3237;
}
.top-banner-title h1::after, .top-banner-title h1::before {
    content: '';
    border-left: 1px solid #ED3237;
    border-top: 1px solid #ED3237;
    border-bottom: 1px solid #ED3237;
    position: absolute;
    left: -4px;
    top: -1px;
    width: 3px;
    height: 100%;
}

.top-banner-title h1 span::after, .top-banner-title h1 span::before {
    content: '';
    border-left: 1px solid #ED3237;
    border-right: 1px solid #ED3237;
    border-top: 1px solid #ED3237;
    position: absolute;
    left: 0;
    top: -4px;
    width: 100%;
    height: 3px;
}

.top-banner-title h1 span::after {
    top: auto;
    bottom: -4px;
    -webkit-transform: scale(-1);
    -moz-transform: scale(-1);
    -ms-transform: scale(-1);
    -o-transform: scale(-1);
    transform: scale(-1);
}
.top-banner-title h1 span::after, .top-banner-title h1 span::before {
    content: '';
    border-left: 1px solid #ED3237;
    border-right: 1px solid #ED3237;
    border-top: 1px solid #ED3237;
    position: absolute;
    left: 0;
    top: -4px;
    width: 100%;
    height: 3px;
}
.top-banner::after {
    position: absolute;
    content: "";
    background: #f0eeee none repeat scroll 0 0;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: -1;
}

.bread_crums {
    margin: 0 auto;
    display: table;
}

#breadcrumbs {
    font-size: 12px;
    padding: 5px 0;
    word-spacing: 0;
    text-align: left;
    letter-spacing: 0;
}
</style>
</style> <div class="top-banner">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs">
            <div class="top-banner-title">
                <h1><span>Corporate </span></h1> 
			</div>
            <div class="bread_crums">
                <p id="breadcrumbs"><span><span><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span><a href="">Company</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <strong class="breadcrumb_last" aria-current="page">About Us</strong></span></span></span></p>            </div>
        </div>
    </div>
</div>


<section class="corp-Id"><div class="container"><div class="row"><div class="col-md-12">
    
    <div class="corp-hdg"><div class="heading"><h3>Corporate Training Programs for Employees</h3><p>By utilizing our high-impact training approach, we always deliver the world-class Corporate Training solutions to industries that assure maximum returns on your investments. We follow easy methodology to help companies undergo transformation and enjoy maximum ROI with skilled workforce:</p></div></div></div></div>
<div class="row">
    
    <div class="col-md-12">
        <div class="main-corp">
            
            <div class="corp-Id-section">
                <div class="corp-Id-section-img">
<img src="{{asset('public/image/svg/Develope.svg')}}"></div>
<div class="corp-Id-section-heading"><strong>AWS Training</strong>
</div>

<div class="corp-Id-section-desc"><p>We not only deliver the skills but help industries to build up talented workforce that is ready for the future.</p></div></div>


<div class="corp-Id-section"><div class="corp-Id-section-img"><img src="{{asset('public/image/svg/Gain_Identity.svg')}}"></div>
<div class="corp-Id-section-heading"><strong>Python Training</strong></div><div class="corp-Id-section-desc">
    <p>With the right skills and knowledge, get unique identification among the crowd and complete your project more effectively.</p></div></div>
    
    <div class="corp-Id-section"><div class="corp-Id-section-img"><img src="{{asset('public/image/svg/project.svg')}}">
</div><div class="corp-Id-section-heading"><strong>Software Testing Training</strong></div><div class="corp-Id-section-desc">
<p>We deliver a perfect blend of theoretical and practical learning where projects are an integral part of the training.</p></div></div>

</div></div></div>


<div class="row"><div class="col-md-12"><div class="main-corp">
    
    <div class="corp-Id-section"><div class="corp-Id-section-img">
<img src="{{asset('public/image/svg/Certification-master.svg')}}"></div><div class="corp-Id-section-heading"><strong>Full Stack Developer Training </strong>
</div><div class="corp-Id-section-desc"><p>We help employees to prepare for the global certification exam and mostly clear it in the first attempt.</p></div></div>
<div class="corp-Id-section"><div class="corp-Id-section-img"><img src="{{asset('public/image/svg/any time.svg')}}"></div>
<div class="corp-Id-section-heading"><strong>DevOps Training</strong></div>
<div class="corp-Id-section-desc">
<p>We offer constant support to clear your doubts anytime, anywhere under the experts’ guidance.</p></div></div>
<div class="corp-Id-section"><div class="corp-Id-section-img"><img src="{{asset('public/image/svg/Training_Certification.svg')}}"></div>
<div class="corp-Id-section-heading"><strong>Data Science Training</strong></div><div class="corp-Id-section-desc">
<p>Get a course completion certificate once you complete the training and this certificate is valid worldwide.</p></div></div></div>
</div></div></div></section>


 
<section class="success"><div class="container"><div class="row"><div class="col-md-12"><div class="success-meter"><div class="successdata">
<h1>10+</h1><p>Years of Corporate Training</p></div><div class="successdata"><h1>62000+</h1><p>Professionals Trained</p></div>
<div class="successdata"><h1>1000+</h1><p>Workshops</p></div></div></div></div></div></section>

 

</div> 
<script>
function openform(evt, formName) {
var i, tabcontent, tablinks;
tabcontent = document.getElementsByClassName("form-tabcontent");
for (i = 0; i < tabcontent.length; i++) {
tabcontent[i].style.display = "none";
}
tablinks = document.getElementsByClassName("form-tablinks");
for (i = 0; i < tablinks.length; i++) {
tablinks[i].className = tablinks[i].className.replace(" active", "");
}
document.getElementById(formName).style.display = "block";
evt.currentTarget.className += " active";
}
document.getElementById("defaultform").click();
</script>

@endsection