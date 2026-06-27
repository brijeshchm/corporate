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
use App\Reviews;
use App\Blog;
use App\Testimonial;
use App\CoursesHeading;
use App\Placement;
use App\State;
use App\City;
use App\Careers;
use App\ExpCertification;
use App\CourseEndContent;
use App\MasterCurriculumExcel;
use App\CourseAboutExcel;
use App\CourseAbout;
use App\CourseCurriculumExcel;

use App\CourseAboutHeading;
use App\CourseAboutLevel1;
use App\CourseAboutLevel2;
use App\CourseAboutLevel3;
use App\CourseAboutLevel4;
use Cookie;
use PDF;
use Mail;
use Helpers;
use App\Client;
Use App\Country;
class homeController extends Controller
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
    public function index(Request $request)
    {	 
		//$courses = Courses::where('show_front_page',1)->select('id','title','sub_title','slug','rating','total_rating','course_duration','live_project','course_name')->get()->chunk(2);
		$country= Country::get();
		
		
		$firstSlidesCrs = DB::table('web_courses as course');	
		$firstSlidesCrs = $firstSlidesCrs->join('web_category as cat','course.category','=','cat.id','left');
		$firstSlidesCrs = $firstSlidesCrs->join('web_subcategory as sub','course.subcategory','=','sub.id','left');		
		$firstSlidesCrs= $firstSlidesCrs->select('cat.*','sub.*','course.id as courseid','course.status','course.title','course.sub_title','course.slug','course.rating','course.show_trending_courses','course.total_rating','course.course_duration','course.live_project','course.course_name', 'sub.id as subid','cat.category as categoryname','course.course_type')->where('course.status','1')->groupBy('course.course_name')->get();	 
				
 
		$secondSlidecourse = DB::table('web_courses as course');	
		$secondSlidecourse = $secondSlidecourse->join('web_category as cat','course.category','=','cat.id','left');
		$secondSlidecourse = $secondSlidecourse->join('web_subcategory as sub','course.subcategory','=','sub.id','left');		
		$secondSlidecourse= $secondSlidecourse->select('cat.*','sub.*','course.id as courseid','course.status','course.title','course.sub_title','course.slug','course.rating','course.total_rating','course.course_duration','course.live_project','course.course_name', 'sub.id as subid','cat.category as categoryname','course.course_popular','course.course_type')->where('course.course_type','1')->where('course.status','1')->groupBy('course.course_name')->limit(10)->get();	 
		
// 	echo "<pre>";print_r($firstSlidesCrs);
	
	
	

		$firstcourses = DB::table('web_courses as course');	
		$firstcourses = $firstcourses->join('web_category as cat','course.category','=','cat.id','left');
		$firstcourses = $firstcourses->join('web_subcategory as sub','course.subcategory','=','sub.id','left');		
		$firstcourses= $firstcourses->select('cat.*','sub.*','course.id as courseid','course.status','course.title','course.sub_title','course.slug','course.rating','course.show_front_page','course.total_rating','course.course_duration','course.live_project','course.course_name', 'sub.id as subid','cat.category as categoryname','course.course_type')->where('course.show_front_page','1')->where('course.status','1')->groupBy('course.category')->limit(4)->get();	 
				
		$secondcourse = DB::table('web_courses as course');	
		$secondcourse = $secondcourse->join('web_category as cat','course.category','=','cat.id','left');
		$secondcourse = $secondcourse->join('web_subcategory as sub','course.subcategory','=','sub.id','left');		
		$secondcourse= $secondcourse->select('cat.*','sub.*','course.id as courseid','course.status','course.title','course.sub_title','course.slug','course.rating','course.total_rating','course.course_duration','course.live_project','course.course_name', 'sub.id as subid','cat.category as categoryname','course.course_popular','course.course_type')->where('course.status','1')->limit(10)->groupBy('course.category')->get();	 
		
		
		//echo "<pre>";print_r($courses);die;
		
		$placements =Placement::where('status',1)->limit(10)->orderby('id','desc')->get();
	//	echo "<pre>";print_r($placements);die;
	
    $clients = 	Client::limit(20)->get();
	$blogs =DB::table('web_blog as blog'); 
		$blogs  =$blogs->join('web_category as category','blog.category','=','category.id','left');
		$blogs =$blogs->select('blog.*','category.category as categoryname','category.id as categoryid');
    	$blogs =$blogs->orderby('blog.id','desc');
    	$blogs =$blogs->where('blog.status',1)->limit(3);
		$blogs =$blogs->get();
		
// 		echo "<pre>";print_r($blogs);die;
		
	//	$categoresFirst = Category::limit(0,14)->get();
			$courses_list= Courses::select('id','title','course_name')->groupby('course_name')->get();
			$categores = Category::limit(14)->get();
// 		echo "<pre>";print_r($categoresFirst);die;
        return view('site.index',['firstcourses'=>$firstcourses,'secondcourse'=>$secondcourse,'placements'=>$placements,'blogs'=>$blogs,'clients'=>$clients,'countryies'=>$country,'categores'=>$categores,'firstSlidesCrs'=>$firstSlidesCrs,'secondSlidecourse'=>$secondSlidecourse,'courses_list'=>$courses_list]);
    } 
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function singleCourse(Request $request)
    {	 
		$keyword="";
       // return view('site.single_course');
        return view('site.single_course');
    }
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCourse(Request $request, $url)
    {	 
 
		//$coursesdetails = Courses::where('slug',$url)
		$coursesdetails = DB::table('web_courses as course');	
		$coursesdetails = $coursesdetails->join('web_category as cat','course.category','=','cat.id','left');
		$coursesdetails = $coursesdetails->join('web_subcategory as sub','course.subcategory','=','sub.id','left');		
		$coursesdetails= $coursesdetails->select('cat.*','course.*','sub.*','course.id as courseid','course.course_clone_id as cloneId','sub.id as subid','cat.category as categoryname')->where('course.slug',$url)->where('course.status','1')->first();
  
 //echo "<pre>";print_r($coursesdetails);die;
	
	//	$faqlists = FAQs::get();
		$socials = Social::get();
		$speciality = Speciality::where('id','1')->first();			
		$testimonials = Testimonial::where('status','1')->get();
		$coursecurriculum= "";
		$moreheading ="";
		$aboutHeading ="";
		if(!empty($coursesdetails)){
        if(!empty($coursesdetails->course_curriculum)){			
        $coursecurriculum =CourseCurriculumExcel::where('course_id',$coursesdetails->course_curriculum)->orderby('id','asc')->skip(0)->take(5)->get();
        }else{
            if(!empty($coursesdetails->courseid)){
        $coursecurriculum =CourseCurriculumExcel::where('course_id',$coursesdetails->courseid)->orderby('id','asc')->skip(0)->take(5)->get();
            }
        
        }
        
        if(!empty($coursesdetails->course_curriculum)){			
        $moreheading =CourseCurriculumExcel::where('course_id',$coursesdetails->course_curriculum)->orderby('id','asc')->skip(5)->take(100)->get();		
        }else{
        $moreheading =CourseCurriculumExcel::where('course_id',$coursesdetails->courseid)->orderby('id','asc')->skip(5)->take(100)->get();
        }
        
       $aboutHeading = CourseAbout::where('course_id',$coursesdetails->courseid)->first();
		}
	   return view('site.course_details',['coursesdetails'=>$coursesdetails,'socials'=>$socials,'speciality'=>$speciality,
			  'testimonials'=>$testimonials,'coursecurriculum'=>$coursecurriculum,'moreheading'=>$moreheading,'aboutHeading'=>$aboutHeading,]);
		 
   
   
   
    } 
	
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   
   public function previewCourse(Request $request, $url)
    {	 
 
	 
		$coursesdetails = DB::table('web_courses as course');	
		$coursesdetails = $coursesdetails->join('web_category as cat','course.category','=','cat.id','left');
		$coursesdetails = $coursesdetails->join('web_subcategory as sub','course.subcategory','=','sub.id','left');		
		$coursesdetails= $coursesdetails->select('cat.*','course.*','sub.*','course.id as courseid','sub.id as subid','cat.category as categoryname')->where('course.slug',$url)->first(); 
//echo "<pre>";print_r($coursesdetails);die;
		$faqlists = FAQs::get();
		$socials = Social::get();
		$speciality = Speciality::where('id','1')->first();			
		$testimonials = Testimonial::all();	
    	if(!empty($coursesdetails->course_curriculum)){			
        $coursecurriculum =CourseCurriculumExcel::where('course_id',$coursesdetails->course_curriculum)->orderby('id','asc')->skip(0)->take(5)->get();
        }else{
        $coursecurriculum =CourseCurriculumExcel::where('course_id',$coursesdetails->courseid)->orderby('id','asc')->skip(0)->take(5)->get();
        
        
        }
        if(!empty($coursesdetails->course_curriculum)){			
        $moreheading =CourseCurriculumExcel::where('course_id',$coursesdetails->course_curriculum)->orderby('id','asc')->skip(5)->take(100)->get();		
        }else{
        $moreheading =CourseCurriculumExcel::where('course_id',$coursesdetails->courseid)->orderby('id','asc')->skip(5)->take(100)->get();
        
        }
        
        $aboutHeading = CourseAboutExcel::where('course_id',$coursesdetails->courseid)->get();
        
         if($coursesdetails->course_type=='2' || $coursesdetails->seo_type=='2'){
		     if(!empty($coursesdetails->courses_module)){
		$coursesmodule= unserialize($coursesdetails->courses_module);
		}else{	
		$mcourse= Courses::where('id',$coursesdetails->cloneId)->orderby('id','asc')->first();	
		if(!empty($mcourse)){			
		$coursesmodule= unserialize($mcourse->courses_module);	
		}else{
		$coursesmodule="";
		}			
		}
				return view('site.course_module_details',['coursesdetails'=>$coursesdetails,'socials'=>$socials,'speciality'=>$speciality,'faqlists'=>$faqlists,'testimonials'=>$testimonials,'coursecurriculum'=>$coursecurriculum,'moreheading'=>$moreheading,'aboutHeading'=>$aboutHeading,'coursesmodule'=>$coursesmodule]);
				
		 }else{
			  return view('site.course_details',['coursesdetails'=>$coursesdetails,'socials'=>$socials,'speciality'=>$speciality,'faqlists'=>$faqlists,'testimonials'=>$testimonials,'coursecurriculum'=>$coursecurriculum,'moreheading'=>$moreheading,'aboutHeading'=>$aboutHeading]);
		 }
    } 
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchMasterProgram(Request $request, $url)
    {			
		$coursesdetails = DB::table('web_coursemaster as course');	
		$coursesdetails = $coursesdetails->join('web_category as cat','course.category','=','cat.id','left');
		$coursesdetails = $coursesdetails->join('web_subcategory as sub','course.subcategory','=','sub.id','left');		
		$coursesdetails= $coursesdetails->select('cat.*','course.*','sub.*','course.id as courseid','sub.id as subid','cat.category as categoryname')->where('slug',$url)->where('course.status','1')->first();
        $masterCurriculum =MasterCurriculumExcel::where('course_id',$coursesdetails->courseid)->orderby('id','asc')->get();
 
	/*	$coursesoffer = DB::table('web_offer as offer');			 
		$coursesoffer = $coursesoffer->join('web_category as cat','offer.category','=','cat.id','left');
		$coursesoffer= $coursesoffer->select('offer.*','cat.*');
		$coursesoffer= $coursesoffer->where('offer.subcategory',$coursesdetails->subid);
		$coursesoffer = $coursesoffer->limit(6)->get();	*/
 
		 //echo "<pre>";print_r($coursesoffer);die;
//echo "<pre>";print_r($coursesdetails);die;
		$faqlists = FAQs::get();			
		$testimonials = Testimonial::all();
 
        return view('site.master-program',['coursesdetails'=>$coursesdetails,'faqlists'=>$faqlists,'testimonials'=>$testimonials,'masterCurriculum'=>$masterCurriculum]);
    } 
	
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function previewMasterProgram(Request $request, $url)
    {			
		$coursesdetails = DB::table('web_coursemaster as course');	
		$coursesdetails = $coursesdetails->join('web_category as cat','course.category','=','cat.id','left');
		$coursesdetails = $coursesdetails->join('web_subcategory as sub','course.subcategory','=','sub.id','left');		
		$coursesdetails= $coursesdetails->select('cat.*','course.*','sub.*','course.id as courseid','sub.id as subid','cat.category as categoryname')->where('slug',$url)->first();
        $masterCurriculum =MasterCurriculumExcel::where('course_id',$coursesdetails->courseid)->orderby('id','asc')->get();
 
	/*	$coursesoffer = DB::table('web_offer as offer');			 
		$coursesoffer = $coursesoffer->join('web_category as cat','offer.category','=','cat.id','left');
		$coursesoffer= $coursesoffer->select('offer.*','cat.*');
		$coursesoffer= $coursesoffer->where('offer.subcategory',$coursesdetails->subid);
		$coursesoffer = $coursesoffer->limit(6)->get();	*/
 
		 //echo "<pre>";print_r($coursesoffer);die;
//echo "<pre>";print_r($coursesdetails);die;
		$faqlists = FAQs::get();			
		$testimonials = Testimonial::all();
 
        return view('site.master-program',['coursesdetails'=>$coursesdetails,'faqlists'=>$faqlists,'testimonials'=>$testimonials,'masterCurriculum'=>$masterCurriculum]);
    } 
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function staticMasterProgram(Request $request)
    {	 
 
		 
 
        return view('site.static-master-program');
    } 
	
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function allCourse(Request $request)
    {	 
			$keyword="";
        return view('site.all-courses');
    } 
	
	 
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function masterprogram(Request $request)
    {	 
		$coursesdetails="";
        return view('site.master-program_html',['coursesdetails'=>$coursesdetails]);
    } 
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function feesdeposit(Request $request)
    {	 
		$keyword="";
        return view('site.fees-deposit');
    } 
	 
	
	
	function ajax_view(Request $request)
	{   
		$keyword=  $request->input('id');
		$len=strlen($keyword);
		if($keyword !='')
		{
			$courselist = Courses::where('title','LIKE','%'.$keyword.'%')->limit(11)->where('course_type','1')->get();		
			if(count($courselist)){				
				echo'<div class="result" style="background: #fff; padding: 9px 3px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width: 500px; z-index: 999999; margin-left: -447px">	
				<ul>';
				foreach($courselist as $data){
					
				$pos=stripos($data->title, $keyword);
				if($pos>=0){
				$str=substr($data->title, $pos, $len);
				$strong_str="<strong>".strtoupper($str)."</strong>";
				$final_str=str_replace($str, $strong_str, $data->title); ?>
			 
				<li  style="padding: 10px 20px;text-align:left;margin-left: 1px;" >
				<a style='width:100%; cursor:pointer;color:#000 !important;' onclick="studentdata('<?php echo $data->title?>','<?php echo $data->id; ?>');"  > <?php echo ucwords($final_str); ?></a>
				</li>
			 
				<?php }else{ ?>
				 
				<li  style="padding: 10px 20px;text-align:left;margin-left: 1px;" >
				<a style='width:100%; cursor:pointer;color:#000 !important;' onclick="studentdata('<?php echo $data->title?>','<?php echo $data->id; ?>');"  > <?php echo ucwords($data->title); ?></a>
				</li>
				
			<?php 	} ?>				
				<?php		
				}
				echo'</ul>
				</div>';
			}else{				
				echo'<div class="result" style="list-style-type: none; background: #fff; padding: 10px 20px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width: 500px; z-index: 999999; margin-left: -447px" ><ul><li><p style="color:red;text-align: left;" >No  match found</p></li></ul></div>';
			}		
			
		}
		
	}
	
	function ajax_course()
	{	 
		 
		$name = Courses::where('status','1')->where('course_type','1')->get()->random(6);	

		if(!empty($name))
		{
			echo'<div class="result" style="list-style-type: none; background: #fff; padding: 9px 3px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width:850px; z-index: 999999;margin-left: -447px;">
			<ul>';
			foreach($name as $data)
			{
				?>
				<li  style="list-style-type: none; padding: 10px 20px;text-align:left;margin-left: 1px;" >
				<a style='width:100%; cursor:pointer;' onclick="studentdata('<?php echo $data->title; ?>','<?php echo $data->id?>');"  > <?php echo ucfirst($data->title); ?></a>
				</li>
				<?php		
			}
			echo'</ul></div>';
		}	
		else{
			echo'<div class="result" style="background: #fff; padding: 5px 10px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width: 850px; z-index: 999999; margin-left: -447px" ><p style="color:red;text-align: left;" >No  match found this technology</p></div>';
		}


	}

	
	function ajax_searchCategoryid(Request $request)
	{   
		$keyword=  $request->input('id');
		$len=strlen($keyword);
		if($keyword !='')
		{
			
		$courselist =DB::table('web_courses as courses'); 
		$courselist  =$courselist->join('web_category as category','courses.category','=','category.id','left');
		$courselist =$courselist->select('courses.id as blogid','courses.title','courses.sub_title','courses.slug','category.category as categoryname','category.id as categoryid');
		$courselist =$courselist->where('category.category','LIKE','%'.$keyword.'%');
		$courselist =$courselist->whereNotNull('courses.category');
		$courselist =$courselist->groupby('courses.category');
		$courselist =$courselist->orderby('category.category','ASC');
		$courselist =$courselist->get();
		 
		
			if(count($courselist)){				
				echo'<div class="result" style="background: #fff; padding: 0px 0px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width: 366px; z-index: 999999; margin-left:0px">	
				<ul>';
				foreach($courselist as $data){
					
				$pos=stripos($data->categoryname, $keyword);
				if($pos>=0){
				$str=substr($data->categoryname, $pos, $len);
				$strong_str="<strong>".strtoupper($str)."</strong>";
				$final_str=str_replace($str, $strong_str, $data->categoryname); ?>
			 
				<li style="padding: 10px 20px;text-align:left;margin-left: 0px;background-color: #ddd;box-shadow: 0px 1px #888;margin-bottom: 1px;" >
				<a style='width:100%; cursor:pointer;' onclick="categorydata('<?php echo $data->categoryname?>','<?php echo $data->categoryid; ?>');"  > <?php echo ucwords($final_str); ?></a>
				</li>
			 
				<?php }else{ ?>
				 
				<li  style="padding: 10px 20px;text-align:left;margin-left: 1px;" >
				<a style='width:100%; cursor:pointer;' onclick="categorydata('<?php echo $data->title?>','<?php echo $data->id; ?>');"  > <?php echo ucwords($data->title); ?></a>
				</li>
				
			<?php 	} ?>				
				<?php		
				}
				echo'</ul>
				</div>';
			}else{				
				echo'<div class="result" style="list-style-type: none; background: #fff; padding: 10px 20px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width: 366px; z-index: 999999; margin-left: 0px" ><ul><li><p style="color:red;text-align: left;" >No  match found</p></li></ul></div>';
			}		
			
		}
		
	}
	
	
	
	function ajax_searchCategory()
	{	 
		$categoryes =DB::table('web_courses as courses'); 
		$categoryes  =$categoryes->join('web_category as category','courses.category','=','category.id','left');
		$categoryes =$categoryes->select('courses.id as blogid','courses.title','courses.sub_title','courses.slug','category.category as categoryname','category.id as categoryid');		 
		$categoryes =$categoryes->whereNotNull('category.category');
		$categoryes =$categoryes->groupby('courses.category');
		$categoryes =$categoryes->orderby('category.category','ASC');
		$categoryes =$categoryes->limit(4);
		
		$categoryes =$categoryes->get();	 

		if(!empty($categoryes))
		{
			echo'<div class="result" style="list-style-type: none; background: #fff; padding: 0px 0px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width:366px; z-index: 999999;margin-left:0px;">
			<ul>';
			foreach($categoryes as $data)
			{
				?>
				<li  style="list-style-type: none; padding: 10px 20px;text-align:left;margin-left: 0px;background-color: #ddd;box-shadow: 0px 1px #888;margin-bottom: 1px;" >
				<a style='width:100%; cursor:pointer;' onclick="categorydata('<?php echo $data->categoryname?>','<?php echo $data->categoryid; ?>');"  data-toggle=""> <?php echo ucfirst($data->categoryname); ?></a>
				</li>
				<?php		
			}
			echo'</ul></div>';
		}	
		else{
			echo'<div class="result" style="background: #fff; padding: 5px 10px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width:366px; z-index: 999999; margin-left: 0px" ><p style="color:red;text-align: left;" >No  match found this technology</p></div>';
		}


	}

	

	function ajax_technologyId(Request $request)
	{   
		$keyword=  $request->input('id');
		$len=strlen($keyword);
		if($keyword !='')
		{
			
		$reviews =DB::table('web_reviews as reviews'); 
		$reviews  =$reviews->join('web_courses as course','reviews.course','=','course.id','left');
		$reviews =$reviews->select('course.id as courseid','course.course_name');
		$reviews =$reviews->where('course.course_name','LIKE','%'.$keyword.'%');
		 
		$reviews =$reviews->groupby('course.course_name');
		$reviews =$reviews->orderby('course.course_name','ASC');
		$reviews =$reviews->get();
		 echo "<pre>";print_r($reviews);die;
		
			if(count($reviews)){				
				echo'<div class="result" style="background: #fff; padding: 0px 0px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width: 366px; z-index: 999999; margin-left:0px">	
				<ul>';
				foreach($reviews as $data){
					
				$pos=stripos($data->categoryname, $keyword);
				if($pos>=0){
				$str=substr($data->categoryname, $pos, $len);
				$strong_str="<strong>".strtoupper($str)."</strong>";
				$final_str=str_replace($str, $strong_str, $data->categoryname); ?>
			 
				<li style="padding: 10px 20px;text-align:left;margin-left: 0px;background-color: #ddd;box-shadow: 0px 1px #888;margin-bottom: 1px;" >
				<a style='width:100%; cursor:pointer;' onclick="categorydata('<?php echo $data->categoryname?>','<?php echo $data->categoryid; ?>');"  > <?php echo ucwords($final_str); ?></a>
				</li>
			 
				<?php }else{ ?>
				 
				<li  style="padding: 10px 20px;text-align:left;margin-left: 1px;" >
				<a style='width:100%; cursor:pointer;' onclick="categorydata('<?php echo $data->title?>','<?php echo $data->id; ?>');"  > <?php echo ucwords($data->title); ?></a>
				</li>
				
			<?php 	} ?>				
				<?php		
				}
				echo'</ul>
				</div>';
			}else{				
				echo'<div class="result" style="list-style-type: none; background: #fff; padding: 10px 20px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width: 366px; z-index: 999999; margin-left: 0px" ><ul><li><p style="color:red;text-align: left;" >No  match found</p></li></ul></div>';
			}		
			
		}
		
	}
	
	
	
	function ajax_technology()
	{	 
		$categoryes =DB::table('web_courses as courses'); 
		$categoryes  =$categoryes->join('web_category as category','courses.category','=','category.id','left');
		$categoryes =$categoryes->select('courses.id as blogid','courses.title','courses.sub_title','courses.slug','category.category as categoryname','category.id as categoryid');		 
		$categoryes =$categoryes->whereNotNull('category.category');
		$categoryes =$categoryes->groupby('courses.category');
		$categoryes =$categoryes->orderby('category.category','ASC');
		$categoryes =$categoryes->limit(4);
		
		$categoryes =$categoryes->get();	 

		if(!empty($categoryes))
		{
			echo'<div class="result" style="list-style-type: none; background: #fff; padding: 0px 0px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width:366px; z-index: 999999;margin-left:0px;">
			<ul>';
			foreach($categoryes as $data)
			{
				?>
				<li  style="list-style-type: none; padding: 10px 20px;text-align:left;margin-left: 0px;background-color: #ddd;box-shadow: 0px 1px #888;margin-bottom: 1px;" >
				<a style='width:100%; cursor:pointer;' onclick="categorydata('<?php echo $data->categoryname?>','<?php echo $data->categoryid; ?>');"  data-toggle=""> <?php echo ucfirst($data->categoryname); ?></a>
				</li>
				<?php		
			}
			echo'</ul></div>';
		}	
		else{
			echo'<div class="result" style="background: #fff; padding: 5px 10px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width:366px; z-index: 999999; margin-left: 0px" ><p style="color:red;text-align: left;" >No  match found this technology</p></div>';
		}


	}

	


	function get_course(Request $request)
	{	    
		$id=  $request->input('id');	 
		if($id !='')
		{
			$courses = Courses::where('id',$id)->first();
	 
 
		}	
		 
		echo json_encode($courses);
	}
	
	
	
 
  	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ourCorporateTrainers(Request $request)
    {	 
		$keyword="";
        return view('site.our-corporate-trainers');
    } 
	
 
  	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutus(Request $request)
    {	 
		$keyword="";
        return view('site.about-us');
    } 
	
 
  	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function allclients(Request $request)
    {	 
		$keyword="";
        return view('site.all-clients');
    } 
	 
	
 
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog(Request $request)
    {	 
		$keyword="";
		$blogs = Blog::get();
		//echo "<pre>";print_r($blogs);die;
        return view('site.blog',['blogs'=>$blogs]);
    } 
	
 
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogdetails(Request $request)
    {	 
		$keyword="";
        return view('site.blog-details');
    } 
	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function careers(Request $request)
    {	 
    	$title="";
		$keyword="";
		$description="";
		$careers = Careers::where('status',1)->get();
	 
        return view('site.careers',['careers'=>$careers]);
    } 
	
 
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     
      public function saveApplyJob(Request $request)
    {	 
		$title="";
		$keyword="";
		$description="";
	 
		if($request->ajax()){
			 
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',	 					
				'technology' 	=> 'required',				 				
				'resume' => 'required|max:1000',	
						
		 		
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	
			
			//$geodata = json_decode(file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']));
		 
		//echo "<pre>";print($geodata);die;
		if(!empty($geodata)){
        $lotlog= explode(',',$geodata->loc);
		if(!empty($request->input('location'))){
		$geo_city = $request->input('location');
		}else{
		$geo_city = $geodata->city;
		}
		$geo_latitude = $lotlog['0'];
		$geo_longitude = $lotlog['1'];
		$geo_countryCode = $geodata->country;		
		$geo_country = $geodata->region;
		$geo_ipaddress = $geodata->ip;
		}else{
			$geo_city="";
			$geo_latitude = "";
		$geo_longitude = "";
		$geo_countryCode = "";		
		$geo_country = "";
		$geo_ipaddress = "";
		}
		
		
			$applyJob =new ApplyJob;
			$applyJob->job_title =$request->input('jobtitle');
			$applyJob->from =$request->input('from');
			$applyJob->name =$request->input('name');
			$applyJob->email =$request->input('email');
			$applyJob->phone =$request->input('phone');
			$applyJob->technology =$request->input('technology');
			$image = [];
		/*	if($request->hasFile('resume')){

			$filePath = getResumeFolderStructure();			 
			$file =  $request->file('resume');
			$filename =str_replace(' ', '_', $file->getClientOriginalName());			 
			$destinationPath = public_path($filePath);
			$nameArr = explode('.',$filename);
			$ext = array_pop($nameArr);
			$name = implode('_',$nameArr);
			if(file_exists($destinationPath.'/'.$filename)){
			$filename = $name."_".time().'.'.$ext;
			}
			$file->move($destinationPath,$filename);				 
			$image['resume'] = array(
			'name'=>$filename,
			'alt'=>$filename,						
			'src'=>$filePath."/".$filename
			);	
			
			} */
			
			$applyJob->resume=serialize($image);
			if($applyJob->save()){	
			$jobtitle=$request->input('jobtitle');			
			 Cookie::queue("showapply", $jobtitle, "60");
			 
			 $headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		//	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			//	$headers .= 'From: enquiry@webcampus.com' . "\r\n";
			$headers .= 'From: webCampus <enquiry@webcampus.com>';
			//$to="webcampusleads@gmail.com";
			$to="brijesh.chauhan@webcampus.com";
	    	$subject="Regarding Job trainer careers - ".$request->input('name')."- ".$request->input('technology');
	     			  
			$message =' <tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Name:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('name').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Email:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('email').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Technology:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('technology').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Mobile:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">'.'+'.$request->input('code').'-'.ltrim($request->input('phone'), '0').'</span><u></u><u></u></p>
			</td>
			</tr>		
			 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">City:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_city.'</span><u></u><u></u></p>
			</td>
			</tr>
				<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Country and Code:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_country.' ('.$geo_countryCode.')</span><u></u><u></u></p>
			</td>
			</tr>
				<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Ip Address:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_ipaddress.'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">From Lead:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('from').'</span><u></u><u></u></p>
			</td>
			</tr>
			 ';
			//$to="webcampusleads@gmail.com";
			
			 
			  $stdemail="";
			 $codemail="";
			 $coordinator="";
			 
			// echo "<pre>";print_r($_FILES);die;
		$to="brijesh.chauhan@webcampus.com";
		Mail::send('mails.send_lead_inquiry', ['msg'=>$message], function ($m) use ($message,$request,$subject,$stdemail,$codemail) {
		$m->from('enquiry@webcampus.com', $request->input('name'));
		if($request->file('resume')){ 
		$m->attach($request->file('resume')->getRealPath(), [
		'as' => $request->file('resume')->getClientOriginalName(), 
		'mime' => $request->file('resume')->getMimeType()
		]);
		}
		$m->to('brijesh.chauhan@webcampus.com', "")->subject($subject)->cc('deepak.virmani@webcampus.com');				
		});  
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			return response()->json(['status'=>1,],200);
			}else{
			return response()->json(['status'=>0,],200);


			}


		
	  
     }

	}	
	
    public function saveApplyJobsss(Request $request)
    {	 
		$title="";
		$keyword="";
		$description="";
	 
		if($request->ajax()){
			 
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric|unique:web_applyjob,phone',	 					
				'technology' 	=> 'required',				 				
				'resume' => 'required|max:1000',	
						
		 		
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	
			
			$applyJob =new ApplyJob;
			$applyJob->job_title =$request->input('jobtitle');
			$applyJob->from =$request->input('from');
			$applyJob->name =$request->input('name');
			$applyJob->email =$request->input('email');
			$applyJob->phone =$request->input('phone');
			$applyJob->technology =$request->input('technology');
			$image = [];
			if($request->hasFile('resume')){

			$filePath = getResumeFolderStructure();			 
			$file =  $request->file('resume');
			$filename =str_replace(' ', '_', $file->getClientOriginalName());			 
			$destinationPath = public_path($filePath);
			$nameArr = explode('.',$filename);
			$ext = array_pop($nameArr);
			$name = implode('_',$nameArr);
			if(file_exists($destinationPath.'/'.$filename)){
			$filename = $name."_".time().'.'.$ext;
			}
			$file->move($destinationPath,$filename);				 
			$image['resume'] = array(
			'name'=>$filename,
			'alt'=>$filename,						
			'src'=>$filePath."/".$filename
			);	
			
			} 
			
			$applyJob->resume=serialize($image);
			if($applyJob->save()){	
			$jobtitle=$request->input('jobtitle');
			
			 Cookie::queue("showapply", $jobtitle, "60");
			 
			 
			return response()->json(['status'=>1,],200);
			}else{
			return response()->json(['status'=>0,],200);


			}


		
	  
     }

	}	
	
 
  
	  	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUs(Request $request)
    {	 
		$keyword="";
        return view('site.contact-us');
    } 
	
  
	  	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function corporate(Request $request)
    {	 
		$keyword="";
		$testimonials = Testimonial::all();
        return view('site.corporate',['testimonials'=>$testimonials]);
    } 
	
  

	  	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobs(Request $request)
    {	 
		$keyword="";
		
		$jobs=JobStutdents::limit('40')->where('show_to_stud',1)->orderby('jobid','desc')->get();
		//echo "<pre>"; print_r($jobs);die;
        return view('site.jobs',['jobs'=>$jobs]);
    } 
	
	  	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobdetails(Request $request,$id)
    {	 
		$keyword="";
		$id =base64_decode($id);
	//	echo $id;die;
		$jobsdetails=JobStutdents::where('jobid',$id)->where('show_to_stud',1)->first();
		//echo "<pre>";print_r($jobsdetails);dir;
        return view('site.job-details',['jobsdetails'=>$jobsdetails]);
    } 
	
  	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobplacementopening(Request $request)
    {	 
		$keyword="";
        return view('site.job-placement-opening');
    } 
		
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function joinus(Request $request)
    {	 
		$keyword="";
        return view('site.join-us');
    } 
	
  	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ourteam(Request $request)
    {	 
		$keyword="";
        return view('site.our-team');
    } 
	
  
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function placement(Request $request)
    {	 
		 
		$placements =Placement::where('status',1)->get();


		$courses =DB::table('web_placements as placement'); 
		$courses  =$courses->join('web_courses as course','placement.course','=','course.id','left');
		$courses =$courses->select('course.id as courseid','course.course_name');	 
		$courses =$courses->groupby('course.course_name');
		$courses =$courses->orderby('course.course_name','ASC');
		$courses =$courses->get();
		$socials = Social::get(); 
		 
        return view('site.placement',['placements'=>$placements,'courses'=>$courses,'socials'=>$socials]);
    } 
	
	
	/** terms conditions
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function termsConditions(Request $request)
    {	 
	 $socials = Social::get();
		 
        return view('site.terms-conditions',['socials'=>$socials]);
    } 
	
  /** privacy Policy
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacyPolicy(Request $request)
    {	 
		$socials = Social::get();
		 
        return view('site.privacy-policy',['socials'=>$socials]);
    } 
  	
  /** cancellation Refund
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancellationRefund(Request $request)
    {	 
	 
		 $socials = Social::get();
        return view('site.cancellation-refund',['socials'=>$socials]);
    } 
  
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request)
    {	 
		$keyword="";
        return view('site.reply');
    } 
	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestzone(Request $request)
    {	 
		$keyword="";
        return view('site.request-zone');
    } 
	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function reviews(Request $request,$id=null)
    {	 
		$keyword="";
		 
	
    	$reviews =DB::table('web_reviews as reviews'); 		
		$reviews  =$reviews->join('web_courses as course','reviews.course','=','course.id','left');
		$reviews =$reviews->select('reviews.*','course.id as courseid','course.title','course.total_rating as totalrating');		 
		$reviews= $reviews->where('reviews.status',1)->orderby('reviews.id','desc')->paginate(5);
		$socials = Social::get();
		$categoryes =DB::table('web_courses as courses'); 
		$categoryes  =$categoryes->join('web_category as category','courses.category','=','category.id','left');
		$categoryes =$categoryes->select('courses.id as blogid','courses.title','courses.sub_title','courses.slug','category.category as categoryname','category.id as categoryid','category.category_icons');		 
		$categoryes =$categoryes->whereNotNull('category.category');
		$categoryes =$categoryes->groupby('courses.category');
		$categoryes =$categoryes->orderby('category.category','ASC');
		$categoryes =$categoryes->get();
	 
		
    	$courses =DB::table('web_reviews as reviews'); 
		$courses  =$courses->join('web_courses as course','reviews.course','=','course.id','left');
		$courses =$courses->select('course.id as courseid','course.course_name');
		$courses =$courses->groupby('course.course_name');
		$courses =$courses->orderby('course.course_name','ASC');
		$courses =$courses->get(); 

		$courses_list= Courses::select('id','title','course_name')->groupby('course_name')->get();
		 
//echo "<pre>";print_r($courses_list);die;
		
        return view('site.review',['reviews'=>$reviews,'categoryes'=>$categoryes,'socials'=>$socials,'courses'=>$courses,'courses_list'=>$courses_list]);
    } 
	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchreviews(Request $request,$id=null)
    {	 
	
	if($request->ajax()){
		$keyword="";
	 
		$reviews =Reviews::orderby('course','asc');
			 
	 
		if(!is_null($id)) {
		$reviews->where('course','=',$id);
		} 
		
		if(!is_null($request->input('rating'))) {
		$reviews->where('rating','=',$request->input('rating'));
		} 
	 
		$reviews = $reviews->get();
		
	 
		$html="";
		if($reviews){
			foreach($reviews as $review){
			$html .='<div class="rev-list"><div class="review-top-section"><div class="heading-rating"><div class="image-name">';
		  $vreview = unserialize($review->review_image); 
			if(!empty($vreview)){
			 
			$html .='<img src="'.asset('public/'.$vreview['review_image']['src']).'" alt="'.asset($vreview['review_image']['alt']).'">';
			  }else {  
			$html .='<img src="'.asset('public/img/reviewer-name.png').'">';
			  }  
			$html .='</div><div class="name-linked"><strong>'.$review->name.'</strong>('.$review->coursename.')	
			</div></div><div class="rating-smile"><div class="rating-smile1">';
			 
			$rating=$review->rating;
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
			$html .=$stars;	 										 
			$html .='<span><img src="'.asset('public/img/Icon_1.png').'"></span></div><div class="rating-smile2"><img src="'.asset('img/Icon_2.png').'">
			<span>'.$review->total_rating.'</span></div></div></div><div class="rev-desc"><p>'.$review->comment.'</p>
			<div class="rev-date"><span>'.date('d M Y',strtotime($review->created_at)).'</span></div></div></div>';
			}
		
	}
		
	 
		 
		 return response()->json($html,200);
		 
	}
    } 
	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchplacement(Request $request,$id=null)
    {	 
	
	if($request->ajax()){
		$keyword="";
		 
		$placements =Placement::orderby('course','asc');			 
		if(!is_null($id)) {
		$placements->where('course','=',$id);
		} 		
		if(!is_null($request->input('rating'))) {
		$placements->where('rating','=',$request->input('rating'));
		} 
	 
		$placements = $placements->get();			 
		$html="";
		if(!empty($placements)){
		$x=0;
		foreach($placements as $placement){

		$x++;									  
		if($x%3 == 0)
		$class = 'box1';
		else if($x%2 == 0 )
		$class = 'box2'; 
		else
		$class = 'box3'; 
		$html .=' 
		<div class="plmt-desc-box-'.$class.'">
		<div class="plmt-dsc">
		<strong>'.$placement->coursename.'</strong>
		</div>
		<div class="plce-img">';
		$pimage= unserialize($placement->placement_image); 
		if(!empty($pimage)){

		$html.='<img src="'.asset('public/'.$pimage['placement_image']['src']).'" alt="'.asset($pimage['placement_image']['alt']).'">';
		} 
		$html .='</div><div class="place-name">
		<strong>'.$placement->name.'</strong>
		</div>
		<div class="place-lans-div">
		<p>'.$placement->designation.'</p>
		<p>Placed:'.$placement->company_name.'</p>
		</div>									
		</div>';
		}} 


				
				 
		 
		 
		 return response()->json($html,200);
		 
	}
    } 
	
	
	function reviews_ajax_view(Request $request)
	{   
		$keyword=  $request->input('id');
		$len=strlen($keyword);
		if($keyword !='')
		{
			$courselist = Courses::where('title','LIKE','%'.$keyword.'%')->limit(11)->get();		
			if(count($courselist)){				
				echo'<div class="result" style="background: #fff; padding: 9px 3px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width: 850px; z-index: 999999; margin-left: -996px">	
				<ul>';
				foreach($courselist as $data){
					
				$pos=stripos($data->title, $keyword);
				if($pos>=0){
				$str=substr($data->title, $pos, $len);
				$strong_str="<strong>".strtoupper($str)."</strong>";
				$final_str=str_replace($str, $strong_str, $data->title); ?>
			 
				<li  style="padding: 10px 20px;text-align:left;margin-left: 1px;" >
				<a style='width:100%; cursor:pointer;' onclick="studentdata('<?php echo $data->title?>','<?php echo $data->id; ?>');"  > <?php echo ucwords($final_str); ?></a>
				</li>
			 
				<?php }else{ ?>
				 
				<li  style="padding: 10px 20px;text-align:left;margin-left: 1px;" >
				<a style='width:100%; cursor:pointer;' onclick="studentdata('<?php echo $data->title?>','<?php echo $data->id; ?>');"  > <?php echo ucwords($data->title); ?></a>
				</li>
				
			<?php 	} ?>				
				<?php		
				}
				echo'</ul>
				</div>';
			}else{				
				echo'<div class="result" style="list-style-type: none; background: #fff; padding: 10px 20px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width: 850px; z-index: 999999; margin-left: -996px" ><ul><li><p style="color:red;text-align: left;" >No  match found</p></li></ul></div>';
			}		
			
		}
		
	}
	 /**
	 add save Course Title with slug
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveReview(Request $request)
    {	  
	 // echo "<pre>";print_r($_POST);print_r($_FILES);die;
        if($request->ajax()){ 
		  $validator = Validator::make($request->all(),[	
			 
				'name' => 'required',				
				'phone' => 'required',				
				'gender' => 'required',				
				'technology' => 'required',				
				'message' => 'required',				 			
				'rating' => 'required',				
								
				 		 			
				 				
			]);
				if ($request->hasFile('review_image')) {
				$validator = Validator::make($request->all(),[			
				'review_image' => 'required|mimes:jpeg,png,jpg,svg|max:50|dimensions:min_width=40,min_height=35,max_width=900,max_height=900',

				]);
				}
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
		 	
				 
			$image = [];
			if ($request->hasFile('review_image')) {
				
				$filePath = getReviewsFolderStructure();
			//	$file = Input::file('course_image');
				$file =  $request->file('review_image');
				$filename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$filename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$filename)){
				$filename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$filename);				 
				$image['review_image'] = array(
				'name'=>$filename,
				'alt'=>$filename,						
				'src'=>$filePath."/".$filename
				);	
				} 
				
				$reviews = New Reviews;
				$reviews->name = ucwords(trim($request->input('name')));		
				$reviews->phone = $request->input('phone');	
				$reviews->gender = $request->input('gender');	
				$coursename= Courses::where('id',$request->input('technology'))->first()->course_name;	 
				$reviews->course =$request->input('technology');					 
				$reviews->coursename =$coursename;					 
				$reviews->rating = trim($request->input('rating'));					 
			 			 
				$reviews->comment = $request->input('message');					  							
				$reviews->review_image = serialize($image);									
				$reviews->created_by = '1';				 
				$reviews->status = 0;				 
				
				$course= Courses::findOrFail($request->input('technology'));
				$course->total_rating = $course->total_rating+1;
				$course->save();
				$reviews->total_rating = $course->total_rating;	
				
			if($reviews->save()){
				return response()->json(['status'=>1,],200);
				
			}else{
				return response()->json(['status'=>0,],200);
			}
		
			  
			
		
		}
    } 

  
	
	
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function service(Request $reques)
    {	 
		$keyword="";
        return view('site.service');
    } 
	
  
	 
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function trainingcertificate(Request $reques)
    {	 
		$keyword="";
        return view('site.training-certificate');
    } 
	
  
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function FAQ(Request $request)
    {	 
		 $FAQs =FAQs::where('status',1)->orderby('id','desc')->get();
   
        return view('site.faq',['FAQs'=>$FAQs]);
    }
 
    
 
  
 
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function popularcategory(Request $request)
    {	 
		 
   
        return view('site.popular-catagory-model');
    }
    
 
 
 
 
}
