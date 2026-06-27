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
		<section class="opn-jb-banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3>Be Amongst the Ambitious...</h3>
					</div>
				</div> 
			</div>
        </section>
        <section class="opn-jb-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="opn-job-heading">
                            <h3>Current <span>Openings</span></h3>
                        </div>
                        <div class="opn-job-desc">
						@if(!empty($jobs))
							@foreach($jobs as $job)
                            <div class="opn-all-sections">
                                <div class="opn-job-section-inner">
                                    <div class="opn-job-inner-heading">
                                        <strong>{{$job->title}}</strong>
                                    </div>
                                    <div class="opn-job-requ">
									<p>{{$job->jobrefcode}}</p>
                                        <ul> 
                                            <li><i class="fa fa-briefcase"></i>{{$job->exp_req}}-{{$job->maxexperience}} Year</li>
                                            <li><i class="fa fa-rupee"></i>Not Disclosed</li>
                                            <li><i class="fa fa-map-marker"></i>{{$job->location}}</li>                                        
                                            
                                        </ul>
                                    </div>
                                    <div class="opn-job-inner-desc">
									 
									<p><strong>Skills: </strong><?php if(!empty($job->courses_name)){  echo $job->courses_name;	}  	?>,{{$job->technology}}</p>
                                    </div>
                                    <div class="opn-job-inner-desc-read-more">
                                        <a href="{{url('job-details/'.base64_encode($job->jobid))}}">Read More</a>
                                    </div>
                                </div>
                                <div class="opn-job-apply-date">
                                    <a href="{{url('job-details/'.base64_encode($job->jobid))}}"><button>Apply Now</button></a>
                                    <span><?php echo date('j<\s\u\p>S</\s\u\p> M Y',strtotime($job->modificationdate)); ?></span>
                                </div>
                            </div>
                            @endforeach
							@endif
						<!--	
                            <div class="opn-all-sections">
                                <div class="opn-job-section-inner">
                                    <div class="opn-job-inner-heading">
                                        <strong>Senior Team Lead/ Engineering Manager</strong>
                                    </div>
                                    <div class="opn-job-requ">
                                        <ul>
                                            <li><i class="fa fa-briefcase"></i>0-1 Year</li>
                                            <li><i class="fa fa-rupee"></i>Not Disclosed</li>
                                            <li><i class="fa fa-map-marker"></i>Noida</li>
                                        </ul>
                                    </div>
                                    <div class="opn-job-inner-desc">
                                        <p>Job Description: At Institute, we're working to be the most customer-centric company. To get there, we need exceptionally talented, bright, and driven people...</p>
                                    </div>
                                    <div class="opn-job-inner-desc-read-more">
                                        <a href="job-single-page.html">Read More</a>
                                    </div>
                                </div>
                                <div class="opn-job-apply-date">
                                    <a href="job-single-page.html"><button>Apply Now</button></a>
                                    <span>26 Aug 2020</span>
                                </div>
                            </div>

                            <div class="opn-all-sections">
                                <div class="opn-job-section-inner">
                                    <div class="opn-job-inner-heading">
                                        <strong>Senior Team Lead/ Engineering Manager</strong>
                                    </div>
                                    <div class="opn-job-requ">
                                        <ul>
                                            <li><i class="fa fa-briefcase"></i>0-1 Year</li>
                                            <li><i class="fa fa-rupee"></i>Not Disclosed</li>
                                            <li><i class="fa fa-map-marker"></i>Noida</li>
                                        </ul>
                                    </div>
                                    <div class="opn-job-inner-desc">
                                        <p>Job Description: At Institute, we're working to be the most customer-centric company. To get there, we need exceptionally talented, bright, and driven people...</p>
                                    </div>
                                    <div class="opn-job-inner-desc-read-more">
                                        <a href="job-single-page.html">Read More</a>
                                    </div>
                                </div>
                                <div class="opn-job-apply-date">
                                   <a href="job-single-page.html"><button>Apply Now</button></a>
                                    <span>26 Aug 2020</span>
                                </div>
                            </div>

                            <div class="opn-all-sections">
                                <div class="opn-job-section-inner">
                                    <div class="opn-job-inner-heading">
                                        <strong>Senior Team Lead/ Engineering Manager</strong>
                                    </div>
                                    <div class="opn-job-requ">
                                        <ul>
                                            <li><i class="fa fa-briefcase"></i>0-1 Year</li>
                                            <li><i class="fa fa-rupee"></i>Not Disclosed</li>
                                            <li><i class="fa fa-map-marker"></i>Noida</li>
                                        </ul>
                                    </div>
                                    <div class="opn-job-inner-desc">
                                        <p>Job Description: At Institute, we're working to be the most customer-centric company. To get there, we need exceptionally talented, bright, and driven people...</p>
                                    </div>
                                    <div class="opn-job-inner-desc-read-more">
                                         <a href="job-single-page.html">Read More</a>
                                    </div>
                                </div>
                                <div class="opn-job-apply-date">
                                   <a href="job-single-page.html"><button>Apply Now</button></a>
                                    <span>26 Aug 2020</span>
                                </div>
                            </div>

                            <div class="opn-all-sections">
                                <div class="opn-job-section-inner">
                                    <div class="opn-job-inner-heading">
                                        <strong>Senior Team Lead/ Engineering Manager</strong>
                                    </div>
                                    <div class="opn-job-requ">
                                        <ul>
                                            <li><i class="fa fa-briefcase"></i>0-1 Year</li>
                                            <li><i class="fa fa-rupee"></i>Not Disclosed</li>
                                            <li><i class="fa fa-map-marker"></i>Noida</li>
                                        </ul>
                                    </div>
                                    <div class="opn-job-inner-desc">
                                        <p>Job Description: At Institute, we're working to be the most customer-centric company. To get there, we need exceptionally talented, bright, and driven people...</p>
                                    </div>
                                    <div class="opn-job-inner-desc-read-more">
                                        <a href="job-single-page.html">Read More</a>
                                    </div>
                                </div>
                                <div class="opn-job-apply-date">
                                   <a href="job-single-page.html"><button>Apply Now</button></a>
                                    <span>26 Aug 2020</span>
                                </div>
                            </div>

                            <div class="opn-all-sections">
                                <div class="opn-job-section-inner">
                                    <div class="opn-job-inner-heading">
                                        <strong>Senior Team Lead/ Engineering Manager</strong>
                                    </div>
                                    <div class="opn-job-requ">
                                        <ul>
                                            <li><i class="fa fa-briefcase"></i>0-1 Year</li>
                                            <li><i class="fa fa-rupee"></i>Not Disclosed</li>
                                            <li><i class="fa fa-map-marker"></i>Noida</li>
                                        </ul>
                                    </div>
                                    <div class="opn-job-inner-desc">
                                        <p>Job Description: At Institute, we're working to be the most customer-centric company. To get there, we need exceptionally talented, bright, and driven people...</p>
                                    </div>
                                    <div class="opn-job-inner-desc-read-more">
                                        <a href="job-single-page.html">Read More</a>
                                    </div>
                                </div>
                                <div class="opn-job-apply-date">
                                    <a href="job-single-page.html"><button>Apply Now</button></a>
                                    <span>26 Aug 2020</span>
                                </div>
                            </div>


                            <div class="opn-all-sections">
                                <div class="opn-job-section-inner">
                                    <div class="opn-job-inner-heading">
                                        <strong>Senior Team Lead/ Engineering Manager</strong>
                                    </div>
                                    <div class="opn-job-requ">
                                        <ul>
                                            <li><i class="fa fa-briefcase"></i>0-1 Year</li>
                                            <li><i class="fa fa-rupee"></i>Not Disclosed</li>
                                            <li><i class="fa fa-map-marker"></i>Noida</li>
                                        </ul>
                                    </div>
                                    <div class="opn-job-inner-desc">
                                        <p>Job Description: At Institute, we're working to be the most customer-centric company. To get there, we need exceptionally talented, bright, and driven people...</p>
                                    </div>
                                    <div class="opn-job-inner-desc-read-more">
                                       <a href="job-single-page.html">Read More</a>
                                    </div>
                                </div>
                                <div class="opn-job-apply-date">
                                     <a href="job-single-page.html"><button>Apply Now</button></a>
                                    <span>26 Aug 2020</span>
                                </div>
                            </div>

                            <div class="opn-all-sections">
                                <div class="opn-job-section-inner">
                                    <div class="opn-job-inner-heading">
                                        <strong>Senior Team Lead/ Engineering Manager</strong>
                                    </div>
                                    <div class="opn-job-requ">
                                        <ul>
                                            <li><i class="fa fa-briefcase"></i>0-1 Year</li>
                                            <li><i class="fa fa-rupee"></i>Not Disclosed</li>
                                            <li><i class="fa fa-map-marker"></i>Noida</li>
                                        </ul>
                                    </div>
                                    <div class="opn-job-inner-desc">
                                        <p>Job Description: At Institute, we're working to be the most customer-centric company. To get there, we need exceptionally talented, bright, and driven people...</p>
                                    </div>
                                    <div class="opn-job-inner-desc-read-more">
                                        <a href="#0">Read More</a>
                                    </div>
                                </div>
                                <div class="opn-job-apply-date">
                                   <a href="job-single-page.html"><button>Apply Now</button></a>
                                    <span>26 Aug 2020</span>
                                </div>
                            </div>

                            <div class="opn-all-sections">
                                <div class="opn-job-section-inner">
                                    <div class="opn-job-inner-heading">
                                        <strong>Senior Team Lead/ Engineering Manager</strong>
                                    </div>
                                    <div class="opn-job-requ">
                                        <ul>
                                            <li><i class="fa fa-briefcase"></i>0-1 Year</li>
                                            <li><i class="fa fa-rupee"></i>Not Disclosed</li>
                                            <li><i class="fa fa-map-marker"></i>Noida</li>
                                        </ul>
                                    </div>
                                    <div class="opn-job-inner-desc">
                                        <p>Job Description: At Institute, we're working to be the most customer-centric company. To get there, we need exceptionally talented, bright, and driven people...</p>
                                    </div>
                                    <div class="opn-job-inner-desc-read-more">
                                        <a href="#0">Read More</a>
                                    </div>
                                </div>
                                <div class="opn-job-apply-date">
                                    <a href="job-single-page.html"><button>Apply Now</button></a>
                                    <span>26 Aug 2020</span>
                                </div>
                            </div>

                            <div class="opn-all-sections">
                                <div class="opn-job-section-inner">
                                    <div class="opn-job-inner-heading">
                                        <strong>Senior Team Lead/ Engineering Manager</strong>
                                    </div>
                                    <div class="opn-job-requ">
                                        <ul>
                                            <li><i class="fa fa-briefcase"></i>0-1 Year</li>
                                            <li><i class="fa fa-rupee"></i>Not Disclosed</li>
                                            <li><i class="fa fa-map-marker"></i>Noida</li>
                                        </ul>
                                    </div>
                                    <div class="opn-job-inner-desc">
                                        <p>Job Description: At Institute, we're working to be the most customer-centric company. To get there, we need exceptionally talented, bright, and driven people...</p>
                                    </div>
                                    <div class="opn-job-inner-desc-read-more">
                                        <a href="#0">Read More</a>
                                    </div>
                                </div>
                                <div class="opn-job-apply-date">
                                    <a href="job-single-page.html"><button>Apply Now</button></a>
                                    <span>26 Aug 2020</span>
                                </div>
                            </div>

                            <div class="opn-all-sections">
                                <div class="opn-job-section-inner">
                                    <div class="opn-job-inner-heading">
                                        <strong>Senior Team Lead/ Engineering Manager</strong>
                                    </div>
                                    <div class="opn-job-requ">
                                        <ul>
                                            <li><i class="fa fa-briefcase"></i>0-1 Year</li>
                                            <li><i class="fa fa-rupee"></i>Not Disclosed</li>
                                            <li><i class="fa fa-map-marker"></i>Noida</li>
                                        </ul>
                                    </div>
                                    <div class="opn-job-inner-desc">
                                        <p>Job Description: At Institute, we're working to be the most customer-centric company. To get there, we need exceptionally talented, bright, and driven people...</p>
                                    </div>
                                    <div class="opn-job-inner-desc-read-more">
                                        <a href="#0">Read More</a>
                                    </div>
                                </div>
                                <div class="opn-job-apply-date">
                                    <button>Apply Now</button>
                                    <span>26 Aug 2020</span>
                                </div>
                            </div>

                            

-->


							</div>
                </div>
            </div>
        </section>
		 
	</div>

	
 
	<script>
		$(document).ready(function(){	
			$(".an-filter-button").click(function(){
				var value = $(this).attr('data-filter');				
				if(value == "all")
				{
					$('.filter').show('1000');
				}
				else
				{
					$(".filter").not('.'+value).hide('3000');
					$('.filter').filter('.'+value).show('3000');
					
				}
			});			
			if ($(".an-filter-button").removeClass("active")) {
			$(this).removeClass("active");
			}
			$(this).addClass("active");			
			});

			var header = document.getElementById("filt");
			var btns = header.getElementsByClassName("an-filter-button");
			for (var i = 0; i < btns.length; i++) {
				btns[i].addEventListener("click", function() {
				var current = document.getElementsByClassName("an-psb");
				current[0].className = current[0].className.replace(" an-psb", "");
				this.className += " an-psb";
				});
			}


	</script>
	@endsection