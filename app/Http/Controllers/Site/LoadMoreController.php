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
use App\ApplyJob;

use Cookie;
use PDF;
//use Elibyy\TCPDF\Facades\TCPDF;
class LoadMoreController  extends Controller
//class MYPDFController extends TCPDF 
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
    public function trainingcertificate(Request $request)
    {	 
		$keyword="";
        return view('site.training-certificate');
    } 
	
	 
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function reviewLoadData(Request $request)
    {	 
		 
     if($request->ajax())
     {
      if($request->id > 0)
      {
       //$data = DB::table('post')
	   
	$reviews =DB::table('web_reviews as reviews'); 		
	$reviews  =$reviews->join('web_courses as course','reviews.course','=','course.id','left');
	$reviews =$reviews->select('reviews.*','course.id as courseid','course.title','course.total_rating as totalrating');		 
	$reviews= $reviews->where('reviews.status',1)
	->where('reviews.id', '<', $request->id)
	->orderby('reviews.id','desc')
	->limit(4)
	->get();
      }
      else
      {
		$reviews =DB::table('web_reviews as reviews'); 		
		$reviews  =$reviews->join('web_courses as course','reviews.course','=','course.id','left');
		$reviews =$reviews->select('reviews.*','course.id as courseid','course.title','course.total_rating as totalrating');	 
		$reviews= $reviews->where('reviews.status',1) 
		->orderby('reviews.id','desc')
		->limit(4)
		->get();
		  
		  
		  
		  
      }
      $output = '';
      $last_id = '';
      
      if(!$reviews->isEmpty())
      {
       foreach($reviews as $review)
       {
        
		
		
		$output .= '<div class="rev-list"><div class="review-top-section"><div class="heading-rating"><div class="image-name">';
		 $vreview = unserialize($review->review_image); 
											if(!empty($vreview)){
											 
		$output .='<img src="'.asset('public/'.$vreview['review_image']['src']).'" alt="'.asset($vreview['review_image']['alt']).'">';
				 }else if($review->gender=="Male"){ 
		$output .='<img src="'.asset('publicimg/male.png').'">';
					}else if($review->gender=="Female"){ 
		$output .='<img src="'.asset('publicimg/female.jpg').'">';												
									 	} 
				$output .='</div><div class="name-linked"><strong>'.$review->name.'</strong>';
													if(!empty($review->coursename)){ 
													
													$output .='<span>('.$review->coursename.')</span>';
													}
				$output .='</div></div><div class="rating-smile"><div class="rating-smile1">';
										 
										$rating=$review->rating;
											$stars = '<i class="fa fa-star"></i>
	        							<i class="fa fa-star"></i>
	        							<i class="fa fa-star"></i>
	        							<i class="fa fa-star-half"></i>';
											switch($rating){
											case 1:
											$stars = '<i class="fa fa-star"></i>';
											break;
											case 2:
											$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i>';
											break;
											case 3:
											$stars = '<i class="fa fa-star"></i>
	        							<i class="fa fa-star"></i>
	        							<i class="fa fa-star"></i>';
											break;
											case 4:
											$stars = '<i class="fa fa-star"></i>
	        							<i class="fa fa-star"></i>
	        							<i class="fa fa-star"></i>
	        							<i class="fa fa-star"></i>
	        							';
											break;
											case 4.5:
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
										$output .=$stars;													 
												$output .='<span><img src="'.asset('public/img/Icon_1.png').'"></span>										
											</div>
											<div class="rating-smile2">
												<img src="'.asset('public/img/Icon_2.png').'">
												<span>'.$review->total_rating.'</span>
											</div>
										</div>
									</div>
									<div class="rev-desc">
										<p>'.$review->comment.'</p>
										<div class="rev-date">
											<span>'.date('d M Y',strtotime($review->created_at)).'</span>
										</div>
									</div>
								</div>
        ';
        $last_id = $review->id;
       }
       $output .= '
       <div id="load_more" class="see-more-review">
        <button type="button" name="load_more_button" data-id="'.$last_id.'" id="load_more_button">More</button>
       </div>
       ';
      }
      else
      {
       $output .= '
       <div id="load_more" class="see-more-review">
        <button type="button" name="load_more_button" >Data Not Found</button>
       </div>
       ';
      }
      echo $output;
     }
    
    } 
	
	 
  	 
  /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function placementLoadData(Request $request)
    {	 
		 
     if($request->ajax())
     {
      if($request->id > 0)
      {
       //$data = DB::table('post')
		$placements =Placement::where('status',1) 
		->where('id', '<', $request->id)
		->orderby('id','desc')
		->limit(4)
		->get();
      }
      else
      {
		$placements =Placement::where('status',1) 		
		->orderby('id','desc')
		->limit(4)
		->get();
		  
		  
		  
		  
      }
      $output = '';
      $last_id = '';
      
      if(!$placements->isEmpty())
      {
		  $x=0;
		  $output .='<div class="plmt-desc-box">';
       foreach($placements as $placement)
       {
             $x++;	
			if($x ==1)
			$sclass = 'placeone';
			else if($x == 2 )
			$sclass = 'placetwo'; 
			else if($x == 3)
			$sclass = 'placethree'; 
			else if($x == 4)
			$sclass = 'placefour'; 
			else if($x == 5)
			$sclass = 'placefive'; 
			else if($x == 6)
			$sclass = 'placesix'; 
			else if($x == 7)
			$sclass = 'placeseven'; 
			else if($x == 8)
			$sclass = 'placeeight'; 
			else if($x == 9)
			$sclass = 'placenine'; 
			
		$output .= '<div class="placebox plmt-box-div '.$sclass.'"><div class="plmt-dsc"><strong>'.$placement->coursename.'</strong></div><div class="plce-img">';
        $pimage= unserialize($placement->placement_image); 
        if(!empty($pimage)){
            $output .='<img src="'.asset('public/'.$pimage['placement_image']['src']).'" alt="'.asset($pimage['placement_image']['alt']).'">';
        }else{
            $output .='<img src="'.asset('public/image/user.png').'" alt="user">';
        } 
        $output .='</div><div class="place-name"><strong>'.$placement->name.'</strong></div><div class="place-lans-div">
        <h5>'.$placement->designation.'</h5><h6>Placed:'.$placement->company_name.'</h6>
        <p>'.$placement->comment.'</p>
        </div></div>';	
        
        
        $last_id = $placement->id;
        }
	   
	   $output .='</div>';
       $output .='<div id="load_more" class="see-more-review">
        <button type="button" name="load_more_button" data-id="'.$last_id.'" id="load_more_button">More</button>
       </div></div>';
      }
      else
      {
       $output .= '<div id="load_more" class="see-more-review">
        <button type="button" name="load_more_button" > Data Not Found</button>
       </div>
       ';
      }
      echo $output;
     }
    
    } 
      
  
  
 
 
 
}
