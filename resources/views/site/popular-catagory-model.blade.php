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

	
	<style type="text/css">
		.popular-categories-modes-banner
		{
			background: url(/image/popular-categories-modes.jpg);
			background-repeat: no-repeat;
			height: 297px;

		}

		.banner-Personalized-content
		{
			color: #fff;
		}
		.banner-Personalized-content h3
		{
			color: #fff;
    font-size: 33px;    line-height: 44px;

    font-weight: 500;    margin-bottom: 22px;
		}
.banner-Personalized-content span{
		    color: #ffbc08;
		    font-weight: 500;
}
.setion-popular-categories ul{
	display: flex;
	justify-content: center;    font-size: 17px;


}
.setion-popular-categories ul li
{
padding-right: 13px;
    padding-left: 13px;}

.button-process
{
	color: #fff;
    margin: auto;
    display: block;
    width: 100%;
    height: 30px;
    border: none;    box-shadow: 0px 0px 8px 3px #b1b1b159;

    background: #ff9d2e;
    border-radius: 4px;
    height: 34px;
}
.process-box{
	display: flex;
	justify-content: space-between;
}
.categories-mood-box
{
	    max-width: 25%;    

box-shadow: 0px 0px 8px 3px #b1b1b159;
border-radius: 15px;
}
.categories-mood-box h4
{
	font-size: 20px;
	font-weight: 600;
	margin-bottom:30px;
	line-height: 26px;
}
.categories-mood-box img
{
	border-top-right-radius: 15px;
		border-top-left-radius: 15px;    height: 137px;
    width: 100%;
}
.mood-box-body
{

	padding: 15px 28px;
	background-color: #f3f3f3;
	border-bottom-right-radius: 15px;
	border-bottom-left-radius: 15px;
	background-image: url(/image/box/box-body-img.png);
    background-size: cover;

}
.mt-40
{
	margin-top: 107px;
}
.popular-categories-modes-section
{
    padding: 30px 0px 50px;
    background-image: url(/image/box/box-body-img2.png);
    background-repeat: no-repeat;
    background-size: 100%;

}
.box-image-center
{


}
@media only screen and (max-width: 767px){
.button-process {
   
    width: 100%;
   
}
.process-box {
    display: grid;    justify-content: center;

}
.box-image-center {
    padding: 0px 15px;
}
.popular-categories-modes-section {
    background-image: none;
   background-color: #fff;    padding: 30px 0px 22px;

}
.banner-Personalized-content h3 {
    color: #fff;
    font-size: 25px;
    line-height: 34px;
   
}
.categories-mood-box {
    max-width: 100%;
    margin-bottom: 30px;

}
.mt-40 {
    margin-top: 0px;
}

}

	</style>
	<div class="main">	
		<section class="popular-categories-modes-banner d-flex align-items-center">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="banner-Personalized-content">
							<h3>Check your <span>Page</span> <br>
							<span>here</span> where you want GO!!!</h3>
							<p>Personalized Online Course is taught by the best industry experts 
in a comprehensive and question-oriented format.</p>
						</div>
					</div>
				</div>
			</div>			
		</section>
	
<section class="popular-categories-modes-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
						<div class="heading">
							<h3>Popular Categories Modes</h3>
						</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="setion-popular-categories text-center mb-5">
					<ul>
						<li>Experience</li>|
						<li>Immersive</li>|
						<li>Learning</li>

					</ul>
				</div>
			</div>

		</div>


		<div class="box-image-center">

<div class="process-box">
		<div class="categories-mood-box">
			<img src="{{asset('public/image/box/box1.jpg')}}" alt="" class="img-fluid">
			<div class="mood-box-body">
					<h4>Placement Process <br>Step-By-Step.</h4>
			<button class="button-process">Go Ahead</button>
			</div>
		
		</div>

	<div class="categories-mood-box">
			<img src="{{asset('public/image/box/box2.jpg')}}" alt="" class="img-fluid">
			<div class="mood-box-body">
					<h4>Client Who Want to <br>
Hire Us.</h4>
			<button class="button-process">Go Ahead</button>
			</div>
		
		</div>

			<div class="categories-mood-box">
			<img src="{{asset('public/image/box/box3.jpg')}}" alt="" class="img-fluid">
			<div class="mood-box-body">
					<h4>Corporate Based
 <br>Program.</h4>
			<button class="button-process">Go Ahead</button>
			</div>
		
		</div>

	</div>




<div class="process-box mt-40">
		<div class="categories-mood-box">
			<img src="{{asset('public/image/box/box1.jpg')}}" alt="" class="img-fluid">
			<div class="mood-box-body">
					<h4>Placement Process <br>Step-By-Step.</h4>
			<button class="button-process">Go Ahead</button>
			</div>
		
		</div>

	<div class="categories-mood-box">
			<img src="{{asset('public/image/box/box2.jpg')}}" alt="" class="img-fluid">
			<div class="mood-box-body">
					<h4>Client Who Want to <br>
Hire Us.</h4>
			<button class="button-process">Go Ahead</button>
			</div>
		
		</div>

			<div class="categories-mood-box">
			<img src="{{asset('public/image/box/box3.jpg')}}" alt="" class="img-fluid">
			<div class="mood-box-body">
					<h4>Corporate Based
 <br>Program.</h4>
			<button class="button-process">Go Ahead</button>
			</div>
		</div>
	</div>
</div>
	</div>
</section>
@endsection
