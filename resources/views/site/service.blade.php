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
                <h1><span>Service </span></h1> 
			</div>
            <div class="bread_crums">
                <p id="breadcrumbs"><span><span><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <span><a href="{{url('service')}}">Service</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <strong class="breadcrumb_last" aria-current="page">Service</strong></span></span></span></p>            </div>
        </div>
    </div>
</div>
		<section class="service-heading">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="service-heading-list">
							<h3>Our Services</h3> 
							 
						</div>						
					</div>
				</div>
			</div>
		</section>
		<section class="service-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="service-section-list ser-col">
							<div class="service-section-list-desc">
								<strong>Classroom Training</strong>
								<p>Classroom training program is a traditional learning process but widely prevalent because of its benefits and warm acceptance worldwide. More often candidates opt for field experience which we provide readily. Live supervision of our experts, well-equipped lab facilities and access to the latest version of hardware and software in the best IT training institute in Noida, make the environment more productive and student friendly. As our training courses are based on current industry standards, they make you industry-ready and future-ready too. Instant clarification of doubts is also another advantage of classroom training while associated with us.</p>
							</div>
							<div class="service-section-list-right">
								<img src="public/image/service_image_2.png">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="service-section grey">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="service-section-list">
							<div class="service-section-list-right">
								<img src="public/image/service_image_3.jpg">
							</div>
							<div class="service-section-list-desc">
								<strong>Instructor Led Online</strong>
								<p>Online Instructor-Led training has recently been in trends because of its high effectiveness in knowledge retention and for strong interactivity with students. We, the best online training institute in India, provide best facilities to students for personalised learning experience. Our experts are especially instructed to reach each and every student and help them with their individual needs. Through LIVE online training or 1-on-1 online training, we help you sharpen your skills and guide you to reinforce and apply that knowledge and skills in your workplace for an improved performance.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="service-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="service-section-list ser-col">
							<div class="service-section-list-desc">
								<strong>Fly - Me - A -Trainer</strong>
								<p>We also provide Fly-me-a-Trainer services to corporate clients in their individual locations. Fly-me-a-Trainer facility helps to reduce the travel expenses, lodging and boarding overheads and such other expenses that might be involved in a classroom training scenario. Our experts conduct onsite training for enterprises to facilitate their needs. These trainers are experts in their field and experienced in conducting training programs. We are at your arm’s length. So, all you have to do is reach out to us, and we shall take care of all your requirements at your location as per your special needs.</p>
							</div>
							<div class="service-section-list-right">
								<img src="public/image/service_image_4.png">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="service-section grey">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="service-section-list">
							<div class="service-section-list-right">
								<img src="public/image/service_image_5.png">
							</div>
							<div class="service-section-list-desc">
								<strong>Corporate Training</strong>
								<p>We provide a wider range of tailor-made training services to Corporates also. The institute works with Corporates to understand their requirements and then customise the training curriculum accordingly to make it more suitable for their employees. The modular course structure helps employees in corporates hone their skills in different technologies and do their job more efficiently. We have trained hundreds of employees for different industries so far and helped them to prepare their workforce for a better Tomorrow.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="service-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="service-section-list ser-col">
							<div class="service-section-list-desc">
								<strong>1 - On - 1 Training</strong>
								<p>If you want individualised training, 1-on-1 Training or a Personal Trainer is the best option for you. As the best IT training institute in Noida, we help you with such a facility whether it is for any special need or for acquiring expertise in any particular skill. Our trainers help you learn specific skills as per your career goals and also assess individual needs. Our team makes sure you get better training and gives individual attention to every single enrolled candidate which is quite effective. Reach us with your needs and we will provide you with the best trainers which will help you grow a lucrative career.</p>
							</div>
							<div class="service-section-list-right">
								<img src="public/image/service_image_6.png">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="service-section grey">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="service-section-list">
							<div class="service-section-list-right">
								<img src="public/image/service_image_7.png">
							</div>
							<div class="service-section-list-desc">
								<strong>Self Placed Training</strong>
								<p>In order to meet the needs of every self-paced student, a plentiful of study materials and tools are provided by the leading training institute in Noida. Here, students take the ownership of their learning. What sets it apart is the prospect of choosing your own learning pace and a dynamic syllabus. The facilities for this asynchronous form of learning involves online tests, presentations, information-packed videos, and many more. We also provide instructors or trainers to the self-directed students for grading their improvement.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="service-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="service-section-list ser-col">
							<div class="service-section-list-desc">
								<strong>Tailor-Made Training</strong>
								<p>“We cater what you require”, is what tailor-made approach is all about. We work with you to make custom training techniques which are best suited for you. We have designed this particularly to suit your requirements and deliver the training accordingly. We are open for discussions and suggestions to train every individual according to their competencies. Workshops, challenging sessions, practical sessions, etc. would be practiced before the completion of the course so that it would contribute to your overall professional development.</p>
							</div>
							<div class="service-section-list-right">
								<img src="public/image/service_image_8.jpg">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="service-section grey">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="service-section-list">
							<div class="service-section-list-right">
								<img src="public/image/service_image_9.png">
							</div>
							<div class="service-section-list-desc">
								<strong>Campus Training</strong>
								<p>Campus training is designed to enhance the students performance level and make them industry ready through theoretical as well as practical exposures. Under expert supervision, we provide training targeting the needs of the market. After the completion of the desired course with us, we will make sure that your profile stands out among the ocean of candidates. Leverage the benefits of getting trained by professional experts and onset your professional journey with a bang by our campus training programme.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		  
	</div>
	@endsection