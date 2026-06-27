<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use Auth;
use Hash;
use Validator;
use DB;
use Session;
use Carbon\Carbon; 
use App\Courses;
use App\CoursesMaster;
use App\Category;
use App\SubCategory;
use App\FAQs;
use App\Social;
use App\Speciality;
use App\CourseCurriculumExcel;
use App\CourseAboutExcel;
use App\CourseCity;
use App\Reviews;
use App\Blog;
use App\Testimonial;
use App\CoursesHeading;
class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        
	   
    }
 
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function allcourses(Request $reques)
    {	 
		$keyword="";
		$courses =DB::table('web_courses as course'); 
		$courses  =$courses->join('web_category as category','course.category','=','category.id','left');
		$courses = $courses->join('web_subcategory as sub','course.subcategory','=','sub.id','left');	
		$courses =$courses->select('course.*','category.category as categoryname','category.id as categoryid','sub.course_icons','sub.course_image');
		$courses =$courses->where('course.category',32);
		$courses =$courses->where('course.status','1');
		$courses =$courses->where('course.course_type','<>','3');
		$courses =$courses->whereNotNull('category.category');
		$courses =$courses->orderby('category.category','ASC');
		$courses =$courses->get();
        $categoryname = Category::where('id',3)->where('status','1')->first();

		$coursesmaster =DB::table('web_coursemaster as course'); 
		$coursesmaster  =$coursesmaster->join('web_category as category','course.category','=','category.id','left');
		$coursesmaster = $coursesmaster->join('web_subcategory as sub','course.subcategory','=','sub.id','left');	
		$coursesmaster =$coursesmaster->select('course.*','category.category as categoryname','category.id as categoryid','sub.course_icons','sub.course_image');
		$coursesmaster =$coursesmaster->where('course.category',32);
		$coursesmaster =$coursesmaster->orderby('category.category','ASC');
		$coursesmaster =$coursesmaster->get();
		 
		$categoryes =DB::table('web_courses as courses'); 
		$categoryes  =$categoryes->join('web_category as category','courses.category','=','category.id','left');
		$categoryes =$categoryes->select('courses.id as courseid','courses.title','courses.sub_title','courses.slug','category.category as categoryname','category.id as categoryid');
		//$categoryes =$categoryes->where('courses.category','!=',0);
		$categoryes =$categoryes->whereNotNull('category.category');
		$categoryes =$categoryes->groupby('courses.category');
		$categoryes =$categoryes->orderby('category.category','ASC');
		$categoryes =$categoryes->get();
		 $courses_list= Courses::select('id','title','course_name')->groupby('course_name')->get();
		//echo "<pre>";print_r($coursesmaster);die;
        return view('site.all-courses',['courses'=>$courses,'categoryes'=>$categoryes,'coursesmaster'=>$coursesmaster,'categoryname'=>$categoryname,'courses_list'=>$courses_list]);
    } 
	
 
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogdetails(Request $reques,$url)
    {	 
		//echo $url;die;
		$blog_details =Blog::where('slug',$url)->first();
	//echo "<pre>";print_r($blog_details);die;
        return view('site.blog-details',['blog_details'=>$blog_details]);
    } 
	  
  
   /**
     * Get matches trainers based on ajax.
     *
     * @param  string
     * @return JSON Object having matched course details
     */
    public function getCategoryAjax(Request $request)
    {
		if($request->ajax()){
			 
        					 
        
        $categorys =DB::table('web_courses as course'); 
        $categorys  =$categorys->join('web_category as category','course.category','=','category.id','left');
        $categorys =$categorys->select('course.*','category.category as categoryname','category.id as categoryid','category.category_icons');
        $categorys =$categorys->whereNotNull('category.category');
        $categorys =$categorys->groupby('course.category');
        //$categorys =$categorys->limit(10);
        $categorys =$categorys->orderby('category.category','ASC');
        $categorys =$categorys->get();

			 //echo "<pre>";print_r($categorys);die;
			return response()->json($categorys,200);
		}
	}
	
 
   /**
     * Get matches trainers based on ajax.
     *
     * @param  string
     * @return JSON Object having matched course details
     */
      
     public function getCategoryCourse(Request $request,$id)
    {
		if($request->ajax()){
		    
		    
		    $htmulf="";
			$htmuls="";
			$categoryCoursenew = Courses::select('id','title','slug','course_name','show_category')->whereRaw('FIND_IN_SET("'.$id.'",show_category)')->where('course_type','=','1')->get();	
		 						
				if(!empty($categoryCoursenew)){	
					foreach($categoryCoursenew->take(12) as $ccourse){
						$htmulf .='<li><a href="'.url('/courses').'/'.$ccourse->slug.'">'.$ccourse->course_name.'</a></li>';				 
					}				 
				}
		    
		    
				$categoryCourse = Courses::select('id','title','slug','course_name','course_type')->where('category',$id)->where('status','1')->where('course_type','=','1')->get();				 
				if($categoryCourse){
				 
					$i=0;
					foreach($categoryCourse->take(12) as $course){
						$i++;						 
						$htmulf .='<li><a href="'.url('/courses').'/'.$course->slug.'">'.$course->course_name.'</a></li>';							 
					}					
					foreach($categoryCourse->skip(12)->take(12) as $course){
						$i++;						 
						$htmuls .='<li><a href="'.url('/courses').'/'.$course->slug.'">'.$course->course_name.'</a></li>';	 
					} 
				}				
				 $coursesMasters = CoursesMaster::select('id','title','slug','course_duration','live_project','course_name')->where('category',$id)->where('status','1')->orderby('id','desc')->get();
		 
				$htmulff="";
				$htmulss="";
				if(!empty($coursesMasters) && count($coursesMasters)>0){
					
					$j=0;
					$htmulff .='<div class="master-courses"><div class="master-courses-heading"><strong>Master Programme </strong>	</div>';
					 
					//foreach($coursesMasters->chunk(2) as $vmaster){
						 
						if(count($coursesMasters)>2){
						foreach($coursesMasters->chunk(2) as $vmaster){
						$j++;
						$htmulff .='<div class="all-master-courses">';
						
						foreach ($vmaster as $master){
							
						 $htmulff .='<a href="'.url('/master-program').'/'.$master->slug.'" class="master-define-crsription" ><div class="master-define-crsription-heading"><img src="'.asset('/img/master-program-modal.jpg').'"><strong>'.$master->course_name.'</strong></div><div class="master-define-crsription-list"><ul><li>'.$master->course_duration.' Months |  '.$master->live_project.' project</li><li>Certification Aligned with Google</li><li>31 Tools & Rigorous  Curriculum</li><li>100 % Job Assistance</li></ul></div></a>';
						 
						
						}
						$htmulff .='</div>';
						}
						}else{						
							
						 
						foreach ($coursesMasters->take(2) as $master){
						$htmulff .='<div class="all-master-courses">';
						
						
							
						 $htmulff .='<a href="'.url('/master-program').'/'.$master->slug.'" class="master-define-crsription" ><div class="master-define-crsription-heading"><img src="'.asset('/img/master-program-modal.jpg').'"><strong>'.$master->course_name.'</strong></div><div class="master-define-crsription-list"><ul><li>'.$master->course_duration.' Months |  '.$master->live_project.' project</li><li>Certification Aligned with Google</li><li>31 Tools & Rigorous Curricullum</li><li>Guaranteed  Placement Assistance</li></ul></div></a>';						 
						
						 
						$htmulff .='</div>';
						}
						
						foreach ($coursesMasters->skip(2)->take(2)->chunk(2) as $mmaster){
						$htmulff .='<div class="all-master-courses">';						
							foreach($mmaster as $master){
						 $htmulff .='<a href="'.url('/master-program').'/'.$master->slug.'" class="master-define-crsription" ><div class="master-define-crsription-heading"><img src="'.asset('/img/master-program-modal.jpg').'"><strong>'.$master->course_name.'</strong></div><div class="master-define-crsription-list"><ul><li>'.$master->course_duration.' Months |  '.$master->live_project.' project</li><li>Certification Aligned with Google</li><li>31 Tools & Rigorous Curricullum</li><li>Guaranteed  Placement Assistance</li></ul></div></a>';						 
							}
						 
						$htmulff .='</div>';
						}
						
							
						}
					$htmulff .='</div>';
					
				}	 		
				
				$html ='<div class="all-courses"><div class="popular-courses"><div class="popular-courses-heading"><strong>Courses</strong></div><div class="popular-courses-description"><ul>'.$htmulf.'</ul><ul>'.$htmuls.'</ul></div></div>'.$htmulff.' </div>';
				 
			return response()->json($html,200);
		}
	}
	
     
    public function getCategoryCourseTwomaster(Request $request,$id)
    {
		if($request->ajax()){
			 
				$categoryCourse = Courses::select('id','title','slug','course_name')->where('category',$id)->where('status','1')->get();				 
				if($categoryCourse){
					$htmulf="";
					$htmuls="";
					$i=0;
					foreach($categoryCourse->take(12) as $course){
						$i++;						 
						$htmulf .='<li><a href="'.url('/courses').'/'.$course->slug.'" >'.$course->course_name.'</a></li>';							 
					}					
					foreach($categoryCourse->skip(12)->take(12) as $course){
						$i++;						 
						$htmuls .='<li><a href="'.url('/courses').'/'.$course->slug.'" >'.$course->course_name.'</a></li>';	 
					} 
				}				
				 $coursesMasters = CoursesMaster::select('id','title','slug','course_duration','live_project')->where('category',$id)->get();
		 
				$htmulff="";
				$htmulss="";
				if(!empty($coursesMasters) && count($coursesMasters)>0){
					
					$j=0;
					$htmulff .='<div class="master-courses"><div class="master-courses-heading"><strong>Master Programme </strong>	</div>';
					 
					foreach($coursesMasters->chunk(2) as $vmaster){
						$j++;
						$htmulff .='<div class="all-master-courses">';
						
						foreach ($vmaster as $master){
							
						 $htmulff .='<a href="'.url('/master-program').'/'.$master->slug.'" class="master-define-crsription" ><div class="master-define-crsription-heading"><img src="'.asset('/img/master-program-modal.jpg').'"><strong>'.$master->title.'</strong></div><div class="master-define-crsription-list"><ul><li>'.$master->course_duration.' Months |  '.$master->live_project.' project</li><li>Certification Aligned with Google</li><li>31 Tools & Rigorous Curricullum</li><li>Guaranteed Placement Assistance</li></ul></div></a>';
						 
						
						}
						$htmulff .='</div>';
					}
					$htmulff .='</div>';
					
				}	 		
				
				$html ='<div class="all-courses"><div class="popular-courses"><div class="popular-courses-heading"><strong>List of Courses</strong></div><div class="popular-courses-description"><ul>'.$htmulf.'</ul><ul>'.$htmuls.'</ul></div></div>'.$htmulff.' </div>';
				 
			return response()->json($html,200);
		}
	}
	
  /**
     * Get matches trainers based on ajax.
     *
     * @param  string
     * @return JSON Object having matched course details
     */
    public function getCategoryCourse252(Request $request,$id)
    {
		if($request->ajax()){
			 
				$categoryCourse = Courses::select('id','title','slug','course_name')->where('category',$id)->where('status','1')->get();
				//echo "<pre>";print_r($categoryCourse);die;
				if($categoryCourse){
					$htmulf="";
					$htmuls="";
					$i=0;
					foreach($categoryCourse as $course){
						$i++;
						if($i%2==0){
						$htmulf .='<li><a href="'.url('/courses').'/'.$course->slug.'" >'.$course->course_name.'</a></li>';	
						}else{
							$htmuls .='<li><a href="'.url('/courses').'/'.$course->slug.'" >'.$course->course_name.'</a></li>';								
						}
					}
				}
				
				 $coursesMasters = CoursesMaster::select('id','title','slug','course_duration','live_project')->where('category',$id)->get();
				//echo "<pre>";print_r($coursesMasters);die;
				$htmulff="";
				$htmulss="";
				if(!empty($coursesMasters) && count($coursesMasters)>0){
					
					$j=0;
					$htmulff .='<div class="master-courses"><div class="master-courses-heading"><strong>Master Programme </strong>	</div>';
					 
					foreach($coursesMasters->chunk(2) as $vmaster){
						$j++;
						$htmulff .='<div class="all-master-courses">';
						
						foreach ($vmaster as $master){
							
						 $htmulff .='<a href="'.url('/master-program').'/'.$master->slug.'" class="master-define-crsription" target="_blank"><div class="master-define-crsription-heading"><img src="'.asset('/img/master-program-modal.jpg').'"><strong>'.$master->title.'</strong></div><div class="master-define-crsription-list"><ul><li>'.$master->course_duration.' Months |  '.$master->live_project.' project</li><li>Certification Aligned with Google</li><li>31 Tools & Rigorous Curricullum</li><li>Guaranteed Placement Assistance</li></ul></div></a>';
						// if($j%2==0){
						// $htmulff .='<a href="'.url('/master-program').'/'.$master->slug.'"class="master-define-crsription"><div class="master-define-crsription-heading"><img src="'.asset('/img/master-program-modal.jpg').'"><strong>'.$master->title.'</strong></div><div class="master-define-crsription-list"><ul><li>'.$master->course_duration.' Hours |  '.$master->live_project.' project</li><li>Certification Aligned with Google</li><li>31 Tools & Rigorous Curricullum</li><li>Guaranteed Placement Assistance</li></ul></div></a>';	
						// }else{
							// $htmulss .='<a href="'.url('/master-program').'/'.$master->slug.'"class="master-define-crsription"><div class="master-define-crsription-heading"><img src="'.asset('/img/master-program-modal.jpg').'"><strong>'.$master->title.'</strong></div><div class="master-define-crsription-list"><ul><li>'.$master->course_duration.' Hours |  '.$master->live_project.' project</li><li>Certification Aligned with Google</li><li>31 Tools & Rigorous Curricullum</li><li>Guaranteed Placement Assistance</li></ul></div></a>';								
						// }
						
						}
						$htmulff .='</div>';
					}
					$htmulff .='</div>';
					
				}	 		
				
				$html ='<div class="all-courses"><div class="popular-courses"><div class="popular-courses-heading"><strong>List of Courses</strong></div><div class="popular-courses-description"><ul>'.$htmuls.'</ul><ul>'.$htmuls.'</ul></div></div>'.$htmulff.' </div>';
			 
			return response()->json($html,200);
		}
	}
 
   /**
     * Get matches trainers based on ajax.
     *
     * @param  string
     * @return JSON Object having matched course details
     */
    public function getCategoryCourseOLD(Request $request,$id)
    {
		if($request->ajax()){
			 
				$categoryCourse = Courses::select('id','title','slug','course_name')->where('category',$id)->where('status','1')->get();
				//echo "<pre>";print_r($categoryCourse);die;
				if($categoryCourse){
					$htmulf="";
					$htmuls="";
					$i=0;
					foreach($categoryCourse as $course){
						$i++;
						if($i%2==0){
						$htmulf .='<li><a href="'.url('/courses').'/'.$course->slug.'">'.$course->course_name.'</a></li>';	
						}else{
							$htmuls .='<li><a href="'.url('/courses').'/'.$course->slug.'">'.$course->course_name.'</a></li>';								
						}
					}
				}
				
				/* $coursesMasters = CoursesMaster::select('id','title','slug','course_duration','live_project')->where('category',$id)->get();
				//echo "<pre>";print_r($coursesMasters);die;
				if($coursesMasters){
					$htmulff="";
					$htmulss="";
					$j=0;
					foreach($coursesMasters as $master){
						$j++;
						 
						if($j%2==0){
						$htmulff .='<a href="'.url('/master-program').'/'.$master->slug.'"class="master-define-crsription"><div class="master-define-crsription-heading"><img src="'.asset('/img/master-program-modal.jpg').'"><strong>'.$master->title.'</strong></div><div class="master-define-crsription-list"><ul><li>'.$master->course_duration.' Hours |  '.$master->live_project.' project</li><li>Certification Aligned with Google</li><li>31 Tools & Rigorous Curricullum</li><li>Guaranteed Placement Assistance</li></ul></div></a>';	
						}else{
							$htmulss .='<a href="'.url('/master-program').'/'.$master->slug.'"class="master-define-crsription"><div class="master-define-crsription-heading"><img src="'.asset('/img/master-program-modal.jpg').'"><strong>'.$master->title.'</strong></div><div class="master-define-crsription-list"><ul><li>'.$master->course_duration.' Hours |  '.$master->live_project.' project</li><li>Certification Aligned with Google</li><li>31 Tools & Rigorous Curricullum</li><li>Guaranteed Placement Assistance</li></ul></div></a>';								
						}
					}
				}	 */			
				
				$html ='<div class="all-courses"><div class="popular-courses"><div class="popular-courses-heading"><strong>List of Courses</strong></div><div class="popular-courses-description"><ul>'.$htmuls.'</ul><ul>'.$htmulf.'</ul></div></div></div>';
			// echo "<pre>";print_r($categoryCourse);die;
			return response()->json($html,200);
		}
	}
	
/**
     * Get matches trainers based on ajax.
     *
     * @param  string
     * @return JSON Object having matched course details
     */
    public function getCategoryMaster(Request $request,$id)
    {
		if($request->ajax()){
			 			
				$coursesMasters = CoursesMaster::select('id','title','slug','course_duration','live_project','course_name')->where('category',$id)->where('status','1')->orderby('id','desc')->get();
				if($coursesMasters){
					$htmulff="";
					$htmulss="";
					$j=0;
					foreach($coursesMasters->chunk(3) as $vcourse){
						$j++;
						 $htmulff .='<div class="all-master-courses">';
							 
						   foreach ($vcourse as $master){
						 $htmulff .='<a href="'.url('/master-program').'/'.$master->slug.'" class="master-define-crsription"><div class="master-define-crsription-heading"><img src="'.asset('/img/master-program-modal.jpg').'"><strong>'.$master->course_name.'</strong></div><div class="master-define-crsription-list"><ul><li>'.$master->course_duration.' Months |  '.$master->live_project.' project</li><li>Certification Aligned with Google</li><li>31 Tools & Rigorous Curriculum</li><li>100 % Job Assistance</li></ul></div></a>';
						 
						 
						 
					/* 	if($j%2==0){
						$htmulff .='<a href="'.url('/master-program').'/'.$master->slug.'"class="master-define-crsription"><div class="master-define-crsription-heading"><img src="'.asset('/img/master-program-modal.jpg').'"><strong>'.$master->course_name.'</strong></div><div class="master-define-crsription-list"><ul><li>'.$master->course_duration.' Hours |  '.$master->live_project.' project</li><li>Certification Aligned with Google</li><li>31 Tools & Rigorous Curricullum</li><li>Guaranteed Placement Assistance</li></ul></div></a>';	
						}else{
							$htmulss .='<a href="'.url('/master-program').'/'.$master->slug.'"class="master-define-crsription"><div class="master-define-crsription-heading"><img src="'.asset('/img/master-program-modal.jpg').'"><strong>'.$master->course_name.'</strong></div><div class="master-define-crsription-list"><ul><li>'.$master->course_duration.' Hours |  '.$master->live_project.' project</li><li>Certification Aligned with Google</li><li>31 Tools & Rigorous Curricullum</li><li>Guaranteed Placement Assistance</li></ul></div></a>';								
						} */
						
						   }
						$htmulff .='</div>';
					}
					
					
				}			
				
				$html ='<div class="all-courses"><div class="master-courses"><div class="master-courses-heading"><strong>Master Programme</strong></div>'.$htmulff.'<div class="all-master-courses">'.$htmulss.'</div></div></div>';
		 
			return response()->json($html,200);
		}
	}
	
 
 
 
 
   /**
     * Get matches trainers based on ajax.
     *
     * @param  string
     * @return JSON Object having matched course details
     */
     
    public function getAllCoursePage(Request $request,$id)
    {
		if($request->ajax()){
			 
				$categoryCourse = Courses::select('id','title','slug','category','subcategory','rating','total_rating','meta_description','course_name','course_duration','live_project')->where('category',$id)->where('status','1')->where('course_type','<>','3')->get();
				$categoryname = Category::where('id',$id)->where('status','1')->first();
			
				if($categoryCourse){
					$html="";
					$htmlc="";
					$htmlm="";
					$i=0;
					$x=0;
					foreach($categoryCourse as $course){
						$i++;
						$x++;
						if($x ==1)
						$cclass = 'one';
						else if($x == 2 )
						$cclass = 'two'; 
						else if($x == 3)
						$cclass = 'three'; 
						else if($x == 4)
						$cclass = 'four'; 
						else if($x == 5)
						$cclass = 'five'; 
						else if($x == 6)
						$cclass = 'six';
						else if($x == 7)
						$cclass = 'seven'; 
						else if($x == 8)
						$cclass = 'eight'; 
						else if($x == 9)
						$cclass = 'nine';
						else if($x == 10)
						$cclass = 'ten'; 
						$subcategory = SubCategory::where('id',$course->subcategory)->first();
					
						if(!empty($subcategory->course_icons)){
							
							 
							
							$vimage= unserialize($subcategory->course_icons);
						}else{
							$vimage="";
						}
						
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
											}
						$htmlc .='<div class="cors-box"><div class="cors-box-title"><div class="'.$cclass.'"><div class="cors-img"><a href="'.url('/courses').'/'.$course->slug.'" ><img src="'.asset($vimage['course_icons']['src']).'" alt="'.($vimage['course_icons']['alt']).'" class="img-fluid"/></a></div></div><div class="cors-desc"><div class="cors-heading cors-box-content"><div class="cors-box-leftsection"><h4><a href="'.url('/courses').'/'.$course->slug.'">'.$course->title.'</a></h4><div class="rating-smile1">'.$stars.'<span class="rating"> '.$course->rating.' out of 5 based on '.$course->total_rating.' votes</span></div><div class="course-info"><div><ul><li>Live Online /Self-Paced/Classroom</li><li>Certification Pass Guaranteed</li><li>100% Job Assignment</li> </ul></div></div></div></div></div><div class="highlights crs-htg"><button class="crs-btn"><a href="'.url('/courses').'/'.$course->slug.'">View More</a></button><span class="stats"><i class="fa fa-leanpub" aria-hidden="true"></i><span> '.$course->course_duration.' Hours of Learning</span></span><span class="stats"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i><span> '.$course->live_project.' Assignments</span></span><span class="stats"><i class="fa fa-video-camera" aria-hidden="true"></i><span> '.$course->live_project.'  Live project</span></span></div></div></div>';				
						 
						
						
						 
					}
				}
				
				 $coursesMasters = CoursesMaster::select('id','title','slug','course_duration','live_project','category','subcategory','rating','total_rating','meta_description','assigment','live_project')->where('category',$id)->get();
		 
				$htmlm="";
				if(!empty($coursesMasters) && count($coursesMasters)>0 ){
					
					$htmlm .='<div class="master-program-heading">
										<strong>Master Programme</strong>
										</div>';
					 
					$j=0;
					$x=0;
					foreach($coursesMasters as $master){
						$j++;
											
					$x++;

					if($x ==1)
					$class = 'five';
					else if($x == 2 )
					$class = 'two'; 
					else if($x == 3)
					$class = 'three'; 
					else if($x == 4)
					$class = 'four'; 
					else if($x == 5)
					$class = 'one'; 
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
						$subcategorym = SubCategory::where('id',$master->subcategory)->first();
						 
						if(!empty($subcategorym->course_icons)){
							
							$rating=$master->rating;
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
											} 
							
							$mimage= unserialize($subcategorym->course_icons);
							
							$htmlm .='<div class="cors-box"><div class="cors-box-title"><div class="'.$class.'"><div class="cors-img"><a href="'.url('/master-program').'/'.$master->slug.'" ><img src="'.asset($mimage['course_icons']['src']).'" alt="'.($mimage['course_icons']['alt']).'" class="img-fluid"/></a></div></div><div class="cors-desc"><div class="cors-heading cors-box-content"><div class="cors-box-leftsection"><h4><a href="'.url('/master-program').'/'.$course->slug.'">'.$master->title.'</a></h4><div class="rating-smile1">'.$stars.'<span class="rating"> '.$course->rating.' out of 5 based on '.$master->total_rating.' votes</span></div><div class="course-info"><div><ul><li>Live Online /Self-Paced/Classroom</li><li>Certification Pass Guaranteed</li><li>100% Job Assignment</li> </ul></div></div></div></div></div><div class="highlights crs-htg"><button class="crs-btn"><a href="'.url('/master-program').'/'.$master->slug.'">View More</a></button><span class="stats"><i class="fa fa-leanpub" aria-hidden="true"></i><span> '.$master->course_duration.' Hours of Learning</span></span><span class="stats"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i><span> '.$master->assigment.' Assignments</span></span><span class="stats"><i class="fa fa-video-camera" aria-hidden="true"></i><span> '.$master->live_project.' Live project</span></span></div></div></div>';
						
						
										
						}else{
							$htmlm="";
						}	
						 
						 
					}
				}	 		
				 
							
						$html='<div class="course-filter"><div class="cors-heading"><strong>'.$categoryname->category.'</strong></div></div>'.$htmlc.' '.$htmlm.'';
				
				
				
				
			 
			return response()->json($html,200);
		}
	}
	
	
	
     
     
    public function getAllCoursePageoold(Request $request,$id)
    {
		if($request->ajax()){
			// echo $id;die;
				$categoryCourse = Courses::select('id','title','slug','category','subcategory','rating','total_rating','meta_description','course_name','course_duration','live_project')->where('category',$id)->where('status','1')->get();
				$categoryname = Category::where('id',$id)->where('status','1')->first();
				//echo "<pre>";print_r($categoryCourse);die;
				if($categoryCourse){
					$html="";
					$htmlc="";
					$htmlm="";
					$i=0;
					foreach($categoryCourse as $course){
						$i++;
						$subcategory = SubCategory::where('id',$course->subcategory)->first();
						//echo "<pre>";print_r($subcategory);die;
						if(!empty($subcategory->course_image)){
							
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
											} 
							
							$vimage= unserialize($subcategory->course_image);
							
						$htmlc .='<div class="all-course-list"><div class="all-course-listing"><a href="'.url('/courses').'/'.$course->slug.'"><img src="'.asset($vimage['course_image']['src']).'" alt="'.asset($vimage['course_image']['alt']).'" /></a><div class="all-course-listing-desc"><p>'.$course->course_description.'</p><a href="'.url('/courses').'/'.$course->slug.'"> <span>MORE.</span><i class="fa fa-long-arrow-right"></i></a><div class="all-course-listing-rating"><i>Rating:'.$course->total_rating.'</i>'.$stars.'</div></div></div></div>';
						
						}else{
							$htmlc="";
						}
						
						
						 
					}
				}
				
				 $coursesMasters = CoursesMaster::select('id','title','slug','course_duration','live_project','category','subcategory','rating','total_rating','meta_description')->where('category',$id)->get();
				//echo "<pre>";print_r($coursesMasters);die;
				if($coursesMasters){
					$htmlm="";
					 
					$j=0;
					foreach($coursesMasters as $master){
						$j++;
						$subcategorym = SubCategory::where('id',$master->subcategory)->first();
						//echo "<pre>";print_r($subcategorym);die;
						if(!empty($subcategorym->course_image)){
							
							$rating=$master->rating;
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
											} 
							
							$vimage= unserialize($subcategorym->course_image);
						$htmlm .='<div class="all-course-list"><div class="all-course-listing"><a href="'.url('/master-program').'/'.$master->slug.'"><img src="'.asset($vimage['course_image']['src']).'" alt="'.asset($vimage['course_image']['alt']).'"  /></a><div class="all-course-listing-desc"><p>'.$course->course_description.'</p><a href="'.url('/master-program').'/'.$master->slug.'"> <span>MORE.</span><i class="fa fa-long-arrow-right"></i></a><div class="all-course-listing-rating"><i>Rating:'.$master->total_rating.'</i>'.$stars.'</div></div></div></div>';
										
						}else{
							$htmlm="";
						}	
						 
						 
					}
				}	 		
				 
							
						$html='<div class="course-filter"><div class="cors-heading"><strong>'.$categoryname->category.'</strong><span>'.count($categoryCourse).'</span></div></div><div class="all-course-group">'.$htmlc.'</div>
								<div class="master-program"><div class="master-program-heading"><strong>Master Programme Data Analytics</strong></div><div class="all-course-group">'.$htmlm.'</div></div>';
				
				
				
				
			// echo "<pre>";print_r($categoryCourse);die;
			return response()->json($html,200);
		}
	}
 
 
 
 	 
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function courseLoadData(Request $request)
    {	 
		 
     if($request->ajax())
     {
		// echo "<pre>";print_r($_POST);die;
	//	 echo $request->last_id;die;
      if($request->last_id > 0)
      {
       //$data = DB::table('post')
	   
	   //echo $request->last_id;echo "dd";
	   $coursecurriculum =CourseCurriculumExcel::where('course_id',$request->id)->where('id', '<', $request->last_id)->orderby('id','asc')->limit(4)->get();
		
		//echo "<pre>";print_r($coursecurriculum);
	$reviews =DB::table('web_reviews as reviews'); 		
	$reviews  =$reviews->join('web_courses as course','reviews.course','=','course.id','left');
	$reviews =$reviews->select('reviews.*','course.id as courseid','course.title','course.total_rating as totalrating');		 
	$reviews= $reviews->where('reviews.status',1)
	->where('reviews.id', '<', $request->id)
	->orderby('reviews.id','desc')
	->limit(8)
	->get();
      }
      else
      {
		  
		   $coursecurriculum =CourseCurriculumExcel::where('course_id',$request->id)->orderby('id','asc')->limit(5)->get();
		$reviews =DB::table('web_reviews as reviews'); 		
		$reviews  =$reviews->join('web_courses as course','reviews.course','=','course.id','left');
		$reviews =$reviews->select('reviews.*','course.id as courseid','course.title','course.total_rating as totalrating');	 
		$reviews= $reviews->where('reviews.status',1) 
		->orderby('reviews.id','desc')
		->limit(11)
		->get();
		  
		  
		  
		  
      }
      $output = '';
      $last_id = '';
    // echo "<pre>";print_r($coursecurriculum);die;
      if(!$coursecurriculum->isEmpty())
      {
		  
		  $i=16; 
       foreach($coursecurriculum as $course)
       {
       
		 $i++;
	 if($i==17){ $show = "show"; }else{
		 $show='';
	 } 
		$output .='<div class="card"><div class="card-header" id="headingOne"><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#hdgOne'.$i.'" data-parent="#acrnCntMain"><i class="fa fa-plus"></i>'.str_replace('?','',$course->heading).'</button></h2></div><div id="hdgOne'.$i.'" class="collapse '.$show.'" aria-labelledby="headingOne"><div class="card-body">';									 
		$contents = CourseCurriculumExcel::where('heading_id',$course->id)->get();
		if($contents){	
		foreach($contents as $content){ 
		$output .='<ul><li>'.str_replace('?','',$content->coursescontent).'</li>';
		$subcontents = CourseCurriculumExcel::where('content_id',$content->id)->get();
		if($subcontents){										
		foreach($subcontents as $sub){  
		$output .='<ul><p>'. str_replace('?','',$sub->subcontent).'</p>';
		$lastcontents = CourseCurriculumExcel::where('subcontent_id',$sub->id)->get();
		if($lastcontents){										
		foreach($lastcontents as $last){
		$output .='<ul><li>'. str_replace('?','',$last->lastcontent).'</li><ul>';											 
			$courseEndContent = CourseCurriculumExcel::where('endcontent_id',$last->id)->get();
			if($courseEndContent){										
			foreach($courseEndContent as $endContent){											 
			$output .='<li style="font-size: 11px;">'.str_replace('?','',$endContent->endcontent).'</li>';
			 }  }  
			$output .='</ul></ul>';
			  } } 
			  $output .='</ul>';	
			}
			}
			$output .='</ul>';	 						 
			 } }  
			$output .='<div class="course-syllabus"><strong>Get full course syllabus in your inbox</strong>	<button class="dwnCrcm" data-title="Download Curriculum" data-button="UNLOCK CURRICULUM">Download Curriculum <i class="fa fa-download"></i></button></div></div></div></div>';		 
        $last_id = $course->id;
       }
      // $output .= '<div id="load_more" class="see-more-review"><button type="button" name="load_more_couse_curriculum" data-last_id="'.$last_id.'" id="load_more_couse_curriculum">Load More</button></div>';
      }
      
		  
	 
      echo $output;
     }
    
    } 
	
 
	 
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function courseLoadDataAbout(Request $request)
    {	 
		 
     if($request->ajax())
     {		 
// echo $request->id;die;
 
      if($request->id > 0)
      {
        
	   $aboutHeading =CourseAboutExcel::where('course_id',$request->id)->orderby('id','asc')->get();	
	 
      }
       
      $output = '';
      $last_id = '';
   // echo "<pre>";print_r($aboutHeading);die;
      if(!$aboutHeading->isEmpty())
      {
		  
		  $i=0; 
       foreach($aboutHeading as $vheading)
       {
       
		 $i++;
	 if($i==1){ $show = "show"; }else{
		 $show='';
	 } 
	 
	 $output .='<div class="card"><div class="card-header" id="abthdgOne"><h2 class="mb-0"><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#heading_'.$vheading->id.'" data-parent="#courseAcrdMain"><span>'.$vheading->heading.'</span>
	<i class="fa fa-plus"></i></button></h2></div><div id="heading_'.$vheading->id.'" class="collapse '.$show.'" aria-labelledby="abthdgOne" ><div class="card-body"><ul>';						 
	$aboutLevel1 = CourseAboutExcel::where('heading_id',$vheading->id)->get();
	if($aboutLevel1){
	foreach($aboutLevel1 as $level1){ 		
	$output .='<li style="font-size: 13px;">'.str_replace('?','',$level1->coursescontent).'</li>';
	$aboutLevel2 = CourseAboutExcel::where('content_id',$level1->id)->get();
	if($aboutLevel2){ foreach($aboutLevel2 as $level2){  
	$output .='<ul><p style="font-size: 13px;">'.str_replace('?','',$level2->subcontent).'</p>';
	$aboutLevel3 = CourseAboutExcel::where('subcontent_id',$level2->id)->get();
	if($aboutLevel3){
		foreach($aboutLevel3 as $level3){
	$output .='<ul><li style="font-size: 13px;">'.str_replace('?','',$level3->lastcontent).'</li><ul>';										 
	$aboutLevel4 = CourseAboutExcel::where('endcontent_id',$level3->id)->get();
	if($aboutLevel4){										
	foreach($aboutLevel4 as $level4){
	$output .='<li style="font-size: 13px;">'.str_replace('?','',$level4->endcontent).'</li>';
	  }  }  
	$output .='</ul></ul>';
	} } 
	$output .='</ul>';												 		
	}
		}
			}
			} 
	$output .='</ul>';
	 if($i==1){   
	$output .='<a href="#mstHrnMdId" data-toggle="modal"><img class="mp-program-overview-image" src="../img/mp-certificate-min.jpg" alt="certificate"></a>';
	 }  
	$output .='</div></div></div>';
	 
	 
	 
	 
	  	 
        $last_id = $vheading->id;
       }
      // $output .= '<div id="load_more" class="see-more-review"><button type="button" name="load_more_couse_curriculum" data-last_id="'.$last_id.'" id="load_more_couse_curriculum">Load More</button></div>';
      }
      
      echo $output;
     }
    
    } 
	
 
  /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadDataCityWise(Request $request)
    {	 
		 
     if($request->ajax())
     {		 
      $citys = CourseCity::where('status','1')->orderBy('id','asc')->get(); 
      $output = '';
      $last_id = '';
      
    //  echo "<pre>";print_r($citys);die;
      if(!$citys->isEmpty())
      {
    	  $i=0; 
       foreach($citys as $vcity)
       { 
	   $output .='<div class="footer-new-all-course"><strong>Training in '.$vcity->city.'</strong><div class="footer-new-all-course-list">';
		$citynoida = Courses::where('city',$vcity->city)->select('title','slug','course_name')->where('course_type',3)->where('status','1')->where('show_on_footer','1')->get(); 
		if(!empty($citynoida)){
		foreach($citynoida as $noida){
		$output .='<a href="'.url('/courses').'/'.$noida->slug.'">'.$noida->title.' | </a>';
		 } }  									 										
		$output .='</div></div>';
	
       }
       
      }
      
      echo $output;
     }
    
    } 
 
 
 
 
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadDataTwoBlog(Request $request)
    {	 
		 
     if($request->ajax())
     {	
      $blogs = Blog::select('id','title','slug','blog_icons','rating','total_rating','blog_description')->orderby('id','desc')->limit(2)->get(); 
      $output = '';
      $last_id = '';   
      if(!$blogs->isEmpty())
      {
		  
		  $i=0; 
       foreach($blogs as $blog)
       { 
			$output .='<div class="col-md-6"><div class="blog-list">';
			if(isset($blog) && $blog['blog_icons'] !=''){									 
				$vblog= unserialize($blog['blog_icons']); 
			$output .='<img src="'.asset($vblog['blog_icons']['src']).'" alt="'.$vblog['blog_icons']['alt'].'">';
			}
			$output .='<div class="blog-heading"><p><a href="'.url('blog/'.$blog['slug']).'" target="_blank">		
			'.substr($blog['title'],0,45).'</a></p><span>'.substr($blog['blog_description'],0,100).'</span>
			<a href="'.url('blog/'.$blog['slug']).'" target="_blank">Read More...</a></div></div></div>';
	   
       }
       
      }
      
      echo $output;
     }
    
    } 
	
 
 
 
 
 
 
 
 
}
