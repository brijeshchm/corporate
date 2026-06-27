<?php

namespace App\Http\Controllers\admin;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use Auth;
use Hash;
use Validator;
use DB;
use Session;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Input;
use Image;
use App\Courses;
use App\CourseCity;
use App\Category;
use App\SubCategory;
use App\Speciality;
use App\CoursesHeading;
use App\CoursesContent;
use App\CoursesSubContent;
use App\CoursesLastContent;
use App\CourseEndContent;
use App\CourseAboutExcel;
use App\CourseCurriculumExcel;
use App\CourseAboutHeading;
use App\CourseAboutLevel1;
use App\CourseAboutLevel2;
use App\CourseAboutLevel3;
use App\CourseAboutLevel4;
use App\CoursesPdf;
use App\Helpers;
use App\Exports\excelFormateExport;
use Maatwebsite\Excel\Facades\Excel;
class SeoPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        
	 $this->middleware('auth');
	   
    }

    /**
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$categorylist =Category::get();	
		$search = [];
		if($request->has('search')){
		$search = $request->input('search');
		}
        return view('admin.seopage.index',['search'=>$search,'categorylist'=>$categorylist]);
    } 
	
 
   /**
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {	  
	 
				$course_list= Courses::select('id','title')->where('course_type','<>','3')->where('status',1)->get();
		$cetegories= DB::table('web_coursepdf as pdf');		 
		$cetegories  =$cetegories->join('web_category as category','pdf.category','=','category.id','left');
		$cetegories= $cetegories->select('pdf.*','category.id as categoryid','category.category as categoryname');
		$cetegories= $cetegories->groupby('pdf.category');
		$cetegories= $cetegories->orderBy('category.category');
		$cetegories= $cetegories->where('pdf.status',1)->get();
		
		$citys= CourseCity::orderBy('city','asc')->where('status',1)->get();
		 
        return view('admin.seopage.add_seocourse',['course_list'=>$course_list,'citys'=>$citys,'cetegories'=>$cetegories]);
    } 
	 /**
	 add save Course Title with slug
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveCourseTitle(Request $request)
    {	  

        if($request->ajax()){   
		
	//	echo "<pre>";print_r($_POST);die;
			$course=explode(',',$request->input('course'));
			$courseslist = Courses::findOrFail($course[0]);	 
			$category=explode(',',$request->input('category'));
			$subcategory=explode(',',$request->input('subcategory'));
			$city_territory= $request->input('city_territory');
			$city = $request->input('city-'.$city_territory);	
			$checkdata = Courses::where('category',$category[0])->where('subcategory',$subcategory[1])->where('title',$courseslist->title.' in '.$city)->get();

			$checkdataslug = Courses::where('category',$category[0])->where('subcategory',$subcategory[1])->where('slug',$this->generate_slug($courseslist->slug.'-in-'.$city))->get();
			
			//echo generate_slug($courseslist->slug.'-in-'.$request->input('city'));die;
			 //echo "<pre>";print_r($checkdata);die;
			if((!empty($checkdata) && count($checkdata) >0) || (!empty($checkdataslug) && count($checkdataslug)>0)){			 
			$validator = Validator::make($request->all(),[
				'category'=>'required',
				'subcategory'=>'required',
				'course'=>'required',	
				'city-'.$city_territory=>'required|unique:web_courses,city',				 
			]);
			}else{				
				$validator = Validator::make($request->all(),[
				'category'=>'required',
				'subcategory'=>'required',
				'course'=>'required',				 
				'city-'.$city_territory=>'required',					 
				]);
				
			}
		
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}
			//	echo "<pre>";print_r($_POST);die;
	 
		 
		if(!empty($city)){
				$courseslist = Courses::findOrFail($course[0]);
				
				if(!empty($courseslist)){
				$courses = New Courses;
				$courses->title = $courseslist->title.' in '.$city;	
				$courses->sub_title = $courseslist->sub_title;	
		    	$courses->slug = $this->generate_slug($courseslist->slug.'-in-'.$city);		
				$courses->course_name = $courseslist->course_name;
				$courses->course_clone_id = $courseslist->id;
				//if($request->input('course_type')=='1'){
				if($request->input('course_type')=='1'){
				$courses->course_curriculum = $courseslist->id;
				}
                if($request->input('course_type')=='2'){
                $courses->courses_module = $courseslist->courses_module;
                }
				
				$courses->seo_type = $category[1];
				$courses->course_pdf_text = $courseslist->course_pdf_text;
				$courses->city = $city;
				$courses->video_link = $courseslist->video_link;
				$courses->course_defination = $courseslist->course_defination;
				$courses->course_duration = $courseslist->course_duration;
				$courses->course_week_days = $courseslist->course_week_days;
				$courses->course_weekend = $courseslist->course_weekend;
				$courses->course_fasttrack = $courseslist->course_fasttrack;
				$courses->live_project = $courseslist->live_project;
				$courses->professional_trained = $courseslist->professional_trained;
				$courses->batches_every_month = $courseslist->batches_every_month;
				$courses->exam_title = $courseslist->exam_title;
				$courses->exam_text = $courseslist->exam_text;
				$courses->format = $courseslist->format;
				$courses->certification_type = $courseslist->certification_type;
				$courses->delivery_method = $courseslist->delivery_method;
				$courses->certification_time = $courseslist->certification_time;
				$courses->certification_cost = $courseslist->certification_cost;
				$courses->language = $courseslist->language;
				$courses->certification_visibility = $courseslist->certification_visibility;
				$courses->category = $category[0];
				$courses->subcategory = $subcategory[1];
				$courses->rating = $courseslist->rating;
				$courses->total_rating = $courseslist->total_rating;	
				$courses->meta_keyword = $courseslist->meta_keyword;	
				$courses->meta_description = $courseslist->meta_description;		 		 					
				$courses->course_type = '3';				 
				$courses->status = '0';				 
				$courses->created_by =1;	
				$courses->save();				
				$add= 1;
				}
				
				
 		} 
			if(!empty($add)){
				$status=1;							 
				$msg="Course submitted successfully!";	
				
			}else{
				$status=0;							 
				$msg="Course could not be submitted!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 


/**
	 add save Course Title with slug
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editSaveCourseAboutImage(Request $request,$id)
    {	  
	// echo "<pre>";print_r($_POST);die;
        if($request->ajax()){ 	  
		  $validator = Validator::make($request->all(),[					
				'course_image_name' => 'required',					 
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	
			    
		 
			 
			$updatetitle =array(
			'course_image_name'=>ucfirst($request->input('course_image_name')),				 				 	
			);
		 
			$checkupdate  =DB::table('web_courses')->where('id',$id)->update($updatetitle);	
			if($checkupdate){
				$status=1;							 
				$msg="Course image name updated successfully !";		
				
			}else{
				$status=0;							 
				$msg="Course image name could not be updated!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 
	

	public function saveCourseTitleold(Request $request)
    {	  

        if($request->ajax()){   
		  $validator = Validator::make($request->all(),[				 
				'title'=>'required|unique:web_courses,title|min:20|max:75',
				'sub_title'=>'required|min:28|max:48',				 
			//	'course_name'=>'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',
				'course_name'=>'required|min:3|max:32',			
			//	'meta_keyword'=>'required|min:20|max:160',	
				'meta_description'=>'required|min:45|max:160',
				'category'=>'required',
				'subcategory'=>'required',
			//	'course_pdf_text'=>'required',
		//		'video_link'=>'required',
				'rating'=>'required',
				'course_type'=>'required',
				'total_rating'=>'required|numeric', 
				 				
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}
				//echo "<pre>";print_r($_POST);die;
		$citycourse = $request->input('citycourse');	
		$alt = $request->input('course_name');	
		if(!empty($citycourse)){
			 
				 
				$related_courses= $request->input('related_courses');
				if(!empty($related_courses)){
					$related_courses= serialize($related_courses);
				
				}else{
					$related_courses="";
				}							
				
			for($i=0; $i<count($citycourse); $i++){
				
			// GENERATING SLUG
			// ***************
			$business_slug = NULL;
			$business_slug = $this->generate_slug(str_replace('?','',$request->input('title')).' in '.$citycourse[$i]);
			if(is_null($business_slug)){
			return redirect("/admin/seopage/add");

			}
			$slugExists = DB::table('web_courses')
			->select(DB::raw('slug'))
			->where('slug', 'like', '%'.$business_slug.'%')
			->orderBy('id','desc')
			->get();
			if(count($slugExists)>0){
			$business_slug = $slugExists[0]->slug;
			$business_slug = explode("-",$business_slug);
			$end = end($business_slug);
			reset($business_slug);
			if(!is_numeric($end)){
			$business_slug[] = 1;
			}else{
			++$end;
			$business_slug[count($business_slug)-1] = $end;
			}
			$business_slug = implode("-",$business_slug);
			}
			
				$courses = New Courses;
				$courses->title = $request->input('title');	
				$courses->sub_title = $request->input('sub_title');	
				$courses->slug  =$business_slug;				
				$courses->course_name = ucfirst($request->input('course_name'));
				$courses->category = trim($request->input('category'));
				$courses->subcategory = trim($request->input('subcategory'));
				$courses->rating = $request->input('rating');
				$courses->total_rating = $request->input('total_rating');	
				$courses->meta_keyword = $request->input('meta_keyword');	
				$courses->meta_description = $request->input('meta_description');				 
				$courses->related_courses = $related_courses;			 					
				$courses->status = '1';				 
				$courses->created_by =1;	
				$courses->save();				
				$add= 1;
			}
 		}else{
			 // GENERATING SLUG
			// ***************
			$business_slug = NULL;
			$business_slug = $this->generate_slug(str_replace('?','',$request->input('title')));
			if(is_null($business_slug)){
			return redirect("/admin/seopage/add");

			}
			$slugExists = DB::table('web_courses')
			->select(DB::raw('slug'))
			->where('slug', 'like', '%'.$business_slug.'%')
			->orderBy('id','desc')
			->get();
			if(count($slugExists)>0){
			$business_slug = $slugExists[0]->slug;
			$business_slug = explode("-",$business_slug);
			$end = end($business_slug);
			reset($business_slug);
			if(!is_numeric($end)){
			$business_slug[] = 1;
			}else{
			++$end;
			$business_slug[count($business_slug)-1] = $end;
			}
			$business_slug = implode("-",$business_slug);
			}



				
				$related_courses= $request->input('related_courses');
				if(!empty($related_courses)){
					$related_courses= serialize($related_courses);
				
				}else{
					$related_courses="";
				}				
				 
				if(!empty($request->input('courses_module'))){
					 $courses_module=serialize($request->input('courses_module'));					 
				}else{
					 $courses_module="";
				}
				
				$courses = New Courses;
				$courses->title = $request->input('title');	
				$courses->sub_title = $request->input('sub_title');	
				$courses->slug  = $business_slug;				
				$courses->course_name = ucfirst($request->input('course_name'));
				$courses->category = ucfirst($request->input('category'));
				$courses->subcategory = trim($request->input('subcategory'));
				$courses->course_pdf_text = trim($request->input('course_pdf_text'));
				$courses->video_link = trim($request->input('video_link'));
				$courses->rating = $request->input('rating');
				$courses->total_rating = $request->input('total_rating');
				$courses->courses_module=trim($courses_module);
				$courses->course_type=trim($request->input('course_type'));
				$courses->meta_keyword = $request->input('meta_keyword');	
				$courses->meta_description = $request->input('meta_description');					 
				$courses->related_courses = $related_courses;				 				
				$courses->status = '1';				 
				$courses->created_by =1;	
				$courses->save();
				
				$add= 1;
			
			
		}
			if(!empty($add)){
				$status=1;							 
				$msg="Course submitted successfully!";	
				
			}else{
				$status=0;							 
				$msg="Course could not be submitted!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 


	/**
	 add save Course Title with slug
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editSaveCourseTitle(Request $request,$id)
    {	  
	//echo "<pre>";print_r($_POST);die;
        if($request->ajax()){ 			
  
		  $validator = Validator::make($request->all(),[		 
				
				'title' => 'required|min:5|max:75|unique:web_courses,title,'.$id.',id',	
				'sub_title'=>'required|min:10|max:68',		
				'slug' => 'required|unique:web_courses,slug,'.$id.',id',	
				'course_name'=>'required|min:3|max:50',	
				'rating'=>'required',
				'total_rating'=>'required|numeric',	
				'city'=>'required',	
				'category'=>'required',	
				'subcategory'=>'required',	
			//	'course_pdf_text'=>'required',	
			//	'video_link'=>'required',				 
			//	'meta_keyword'=>'required|min:20|max:160',	
				'meta_description'=>'required|min:45|max:160',
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	
			
			
			 
			$updatetitle =array(
			'title'=>ucfirst($request->input('title')),	
			'sub_title'=>ucfirst($request->input('sub_title')),			
	    	'slug'=>$this->generate_slug(trim(str_replace('?','',$request->input('slug')))),	
			'course_name'=>ucfirst($request->input('course_name')),	
			'city'=>trim($request->input('city')),	
			'category'=>trim($request->input('category')),	
			'subcategory'=>trim($request->input('subcategory')),	
			'course_pdf_text'=>trim($request->input('course_pdf_text')),	
			'video_link'=>trim($request->input('video_link')),	
			//$courses->seo_type = $category[1];
			'rating'=>trim($request->input('rating')),	
			'total_rating'=>trim($request->input('total_rating')),		 
			'course_duration'=>trim($request->input('course_duration')),
			'live_project'=>trim($request->input('live_project')),	
			'meta_keyword'=>trim($request->input('meta_keyword')),	
			'meta_description'=>trim($request->input('meta_description')),	
			'course_defination'=>trim($request->input('course_defination')),	
			'professional_trained'=>trim($request->input('professional_trained')),	
			'batches_every_month'=>trim($request->input('batches_every_month')),
			'updated_by'=>1,				 	
			);
		// echo "<pre>";print_r($updatetitle);die;
			$checkupdate  =DB::table('web_courses')->where('id',$id)->update($updatetitle);	
			if($checkupdate){
				$status=1;							 
				$msg="Course title updated successfully !";		
				
			}else{
				$status=0;							 
				$msg="Course title could not be updated!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 
	

	 
	/**
	 add save Course Title with slug
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editSaveCourseAbout(Request $request,$id)
    {	  
	
        if($request->ajax()){   
		  $validator = Validator::make($request->all(),[				 
				'why_learn_heading'=>'required',
				'why_learn'=>'required',					 				
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}
				  
			$updatelearn =array(
			'why_learn_heading'=>$request->input('why_learn_heading'),	
			'why_learn'=>serialize($request->input('why_learn')));	

			$checkupdate  =DB::table('web_courses')->where('id',$id)->update($updatelearn);	
			if($checkupdate){
				$status=1;							 
				$msg="Course why learn submitted successfully !";		
				
			}else{
				$status=0;							 
				$msg="Course why learn could not be submitted!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 
	

	/**
	 add save Course Title with slug     
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
      public function editSaveCourseAboutExcel(Request $request,$id)
    {			
		if($request->isMethod('post') )		

				$validator = Validator::make($request->all(),[				 
				'course_about'=>'required',
				]);
				if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
				}
					
					
			$allowedFileType = [			 
			'text/csv',
			'application/vnd.ms-excel'
			];
		 
			if (in_array($_FILES["course_about"]["type"], $allowedFileType)) {

			$coursesexcel = Courses::findOrFail($id);		
			if($request->hasFile('course_about')){
				
				$filePath = "excell";
				$file =  $request->file('course_about');
				$filename =str_replace(' ', '_', trim($file->getClientOriginalName()));			 
				$destinationPath = public_path($filePath); 			
				if(file_exists($destinationPath.'/'.$filename)){
					$filename = $filename;
				}
				$file->move($destinationPath,$filename);	
				$fileTextName= str_replace(' ', '_', trim($file->getClientOriginalName()));
				$coursesexcel->courseaboutexcel = $fileTextName;	
				$csvFile = fopen($destinationPath.'/'.$filename, 'r');
				fgetcsv($csvFile);
				$i=0;
					while(($row = fgetcsv($csvFile)) !== FALSE){

					$heading = trim(ltrim($row[0]));
					if($heading !=""){				 
					$courseAboutHeading  = New CourseAboutExcel;
					$courseAboutHeading->course_id = $id;
					$courseAboutHeading->heading = ltrim(str_replace('?','',$heading));
					$courseAboutHeading->save();
					$add= 1;
					}else if($heading==""){
					$level1 = trim(ltrim($row[1])); 
					if($level1 !=""){

					$courseAboutLevel1  = New CourseAboutExcel;	 
					$courseAboutLevel1->heading_id = $courseAboutHeading->id;
					$courseAboutLevel1->coursescontent = ltrim(str_replace('?','',$level1));
					$courseAboutLevel1->save();
					$add= 1;	
					}else if($level1==""){
					$level2 = trim(ltrim($row[2]));
					if($level2 !=""){				
					$courseAboutLevel2  = New CourseAboutExcel;	 
					$courseAboutLevel2->content_id = $courseAboutLevel1->id;
					$courseAboutLevel2->subcontent = ltrim(str_replace('?','',$level2));						
					$courseAboutLevel2->save();
					$add= 1;

					}else if($level2==""){
					$level3 = trim(ltrim($row[3]));
					if($level3 !=""){					
					$courseAboutLevel3  = New CourseAboutExcel;	 
					$courseAboutLevel3->subcontent_id = $courseAboutLevel2->id;
					$courseAboutLevel3->lastcontent = ltrim(str_replace('?','',$level3));						 
					if($courseAboutLevel3->save()){
					$add= 1;
					}				 

					}else if($level3==""){
					$level4 = trim(ltrim($row[4]));
					if($level4 !=""){					
					$courseAboutLevel4  = New CourseAboutExcel;	 
					$courseAboutLevel4->endcontent_id = $courseAboutLevel3->id;
					$courseAboutLevel4->endcontent = ltrim(str_replace('?','',$level4));						 
					if($courseAboutLevel4->save()){
					$add= 1;
					}				 

					}
					} 

					}  
					}
					}	


				}				
			}else{
			$coursesexcel->courseaboutexcel = $coursesexcel->courseaboutexcel;	
			} 				 	 				 								
			$coursesexcel->save(); 
			 
		} else{
		    $status=0;							 
				$msg="CSV file not formate!";
		    
		} 		
			  
			
			if(!empty($add)){
				$status=1;							 
				$msg="Course about submitted successfully!";		
				
			}else{
				$status=0;							 
				$msg="Course about could not be submitted!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
				
			
		}	 
			
		
    
	  

	/**
	 add save Course Title with slug
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editSaveCourseBatchVisibility(Request $request,$id)
    {	  
	
        if($request->ajax()){   
		  $validator = Validator::make($request->all(),[				 
				'batch_visibility'=>'required',				 
				 				
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}
			

				$updatebatch =array(
				'batch_visibility'=>trim($request->input('batch_visibility')),				 		 	
				'updated_by'=>1,				 	
				);

				$checkupdate  =DB::table('web_courses')->where('id',$id)->update($updatebatch);	
				if($checkupdate){
				$status=1;							 
				$msg="Course Batch visibility updated successfully !";		

				}else{
				$status=0;							 
				$msg="Course Batch visibility could not be update!";	
				}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 
	

	 public function editSaveCurriculum(Request $request,$id)
	{  
	
	
		  
		if($request->isMethod('post') )
		{	
			$validator = Validator::make($request->all(),[				 
			'course_curriculum'=>'required',
			]);
			if($validator->fails()){
			$errorsBag = $validator->getMessageBag()->toArray();
			return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}
			$allowedFileType = [
			'application/vnd.ms-excel',
			'text/xls',
			'text/xlsx',
			'text/csv',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
			];		 
			if (in_array($_FILES["course_curriculum"]["type"], $allowedFileType))
				{			
					$filePath = "excell";
					$file =  $request->file('course_curriculum');
					$filename =str_replace(' ', '_', trim($file->getClientOriginalName()));			 
					$destinationPath = public_path($filePath); 			
					if(file_exists($destinationPath.'/'.$filename)){
						$filename = $filename;
					}
					$file->move($destinationPath,$filename);	
					$fileTextName= str_replace(' ', '_', trim($file->getClientOriginalName()));
					 
					$csvFile = fopen($destinationPath.'/'.$filename, 'r');
					fgetcsv($csvFile);
					$i=0;
						while(($row = fgetcsv($csvFile)) !== FALSE){
										 
							$heading = trim(ltrim($row[0]));	  	

							if($heading !="")
							{				 
								$coursesHeading  = New CourseCurriculumExcel;
								$coursesHeading->course_id = $id;
								$coursesHeading->heading = trim(str_replace('?','',$heading));
								$coursesHeading->save();
								$add= 1;
							}else 
								if($heading=="")
								{
									$level1 = trim(ltrim($row[1])); 
									if($level1 !="")
									{

										$coursesContent  = New CourseCurriculumExcel;	 
										$coursesContent->heading_id = $coursesHeading->id;
										$coursesContent->coursescontent = ltrim(str_replace('?','',$level1));
										$coursesContent->save();
										$add= 1;	
									}else
										if($level1=="")
										{
											$level2 = trim(ltrim($row[2]));
											if($level2 !="")
											{				
											$coursesSubContent  = New CourseCurriculumExcel;	 
											$coursesSubContent->content_id = $coursesContent->id;
											$coursesSubContent->subcontent = ltrim(str_replace('?','',$level2));						
											$coursesSubContent->save();
											$add= 1;

											}else 
												if($level2=="")
												{
													$level3 = trim(ltrim($row[3]));
													if($level3 !=""){					
													$coursesLastcontent  = New CourseCurriculumExcel;	 
													$coursesLastcontent->subcontent_id = $coursesSubContent->id;
													$coursesLastcontent->lastcontent = ltrim(str_replace('?','',$level3));						 
													if($coursesLastcontent->save()){
													$add= 1;
													}				 

													}else if($level3=="")
													{
														$level4 = trim(ltrim($row[4]));
														if($level4 !="")
														{					
															$courseEndContent  = New CourseCurriculumExcel;	 
															$courseEndContent->endcontent_id = $coursesLastcontent->id;
															$courseEndContent->endcontent = ltrim(str_replace('?','',$level4));						 
															if($courseEndContent->save()){
															$add= 1;
															}				 
														}
													}
												}	   
										}
								}	
							
						}
				 



					 			 
				} 		
			if(!empty($add)){
			    
			    $coursesexcel = Courses::findOrFail($id);			 
				if($request->hasFile('course_curriculum')){					 				
					$coursesexcel->coursecurriculumexcel = $fileTextName;					
				}else{
					$coursesexcel->coursecurriculumexcel = $coursesexcel->coursecurriculumexcel;	
				} 				 	 				 								
				$coursesexcel->save(); 
			    
				$status=1;							 
				$msg="Course curriculum updated successfully !";		
				
			}else{
				$status=0;							 
				$msg="Course curriculum could not be updated!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
				
			
		}	 
		
		 
	}
	
	 
 
	/**
	 add save Course Title with slug
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editSaveCourseRelated(Request $request,$id)
    {	  
	
        if($request->ajax()){ 		
  
		  $validator = Validator::make($request->all(),[		 
				//'show_front_page'=>'required',
				//'show_top_menu'=>'required',
				'show_on_footer'=>'required',				 				
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}
				 
				 
				if(!empty($request->input('related_courses'))){
					 $related_courses=serialize($request->input('related_courses'));					 
				 }else{
					 $related_courses="";
				 }
				
			 
				
				$updaterelated =array(
				'related_courses'=>trim($related_courses),				 		 	
				//'show_front_page'=>$request->input('show_front_page'),				 		 	
				//'show_top_menu'=>$request->input('show_top_menu'),				 		 	
				'show_on_footer'=>$request->input('show_on_footer'), 		 	

				'updated_by'=>1,				 	
				);

				$checkupdate  =DB::table('web_courses')->where('id',$id)->update($updaterelated);	
				if($checkupdate){
				$status=1;							 
				$msg="Course related submitted successfully !";		
				
			}else{
				$status=0;							 
				$msg="Course related could not be updated !";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 
	
	/**
	 add save Course Title with slug
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editSaveCourseCertificate(Request $request,$id)
    {	  
	
        if($request->ajax()){ 
  
		  $validator = Validator::make($request->all(),[				 
				'exam_title'=>'required',
				'exam_text'=>'required',
				'format'=>'required',
				'certification_type'=>'required',
				'delivery_method'=>'required',
				'certification_time'=>'required',
				'certification_cost'=>'required',
				'language'=>'required',
				 
				 				
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}
			

			$course_cerificate =array(
			'exam_title'=>$request->input('exam_title'),
			'exam_text'=>$request->input('exam_text'),
			'format'=>$request->input('format'),
			'certification_type'=>$request->input('certification_type'),
			'delivery_method'=>$request->input('delivery_method'),
			'certification_time'=>$request->input('certification_time'),			
			'certification_cost'=>$request->input('certification_cost'),
			'language'=>$request->input('language'),			
			'certification_visibility'=>$request->input('certification_visibility'),
			'updated_by'=>1,
			);	
				 
			$update  =DB::table('web_courses')->where('id',$id)->update($course_cerificate);			
				 
	 
			if(!empty($update)){	
				
				$status=1;							 
				$msg="Course certificate update successfully !";		
				
			}else{
				$status=0;							 
				$msg="Course certificate could not be updated!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 
	
	/**
	 add save Course Title with slug
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editSaveFAQ(Request $request,$id)
    {	  
	
        if($request->ajax()){ 		
		 $validator = Validator::make($request->all(),[				 
				'faqq'=>'required',
				'faqa'=>'required',				 				
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}

				
			$courses = Courses::findOrFail($id);
			if(!empty($request->input('faqq'))){
				$faqq= serialize($request->input('faqq'));
			}else{
				$faqq="";
			}
			
			if(!empty($request->input('faqa'))){
				$faqa= serialize($request->input('faqa'));
			}else{
				$faqa="";
			}
			
			$FAQs= array(
			'faqq'=>$faqq,
			'faqa'=>$faqa
			);
			$courses->FAQs = $FAQs;				 
			$courses->updated_by =1; 		 
			if($courses->save()){
				$status=1;							 
				$msg="Course FAQs submitted successfully !";		
				
			}else{
				$status=0;							 
				$msg="Course FAQs could not be submitted!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 
	
	
	
	/**
	 add save Course Title with slug
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editSaveTestimonial(Request $request,$id)
    {	  
	
        if($request->ajax()){ 		
		 $validator = Validator::make($request->all(),[				 
				'name'=>'required',
				'comment'=>'required',
				'testimonial_visibility'=>'required',		
				
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}

				
			$courses = Courses::findOrFail($id);
			if(!empty($request->input('name'))){
				$name= serialize($request->input('name'));
			}else{
				$name="";
			}
			
			if(!empty($request->input('comment'))){
				$comment= serialize($request->input('comment'));
			}else{
				$comment="";
			}
			
			
				
			if(!empty($request->input('linkedinurl'))){
				$linkedinurl= serialize($request->input('linkedinurl'));
			}else{
				$linkedinurl="";
			}
			
			$testimonial= array(
			'name'=>$name,
			'comment'=>$comment,
			'linkedinurl'=>$linkedinurl
			);
		 
			$courses->testimonial = $testimonial;
			$courses->testimonial_visibility = $request->input('testimonial_visibility');	
			$courses->updated_by =1; 		 
			if($courses->save()){
				$status=1;							 
				$msg="Course Testimonial submitted successfully !";		
				
			}else{
				$status=0;							 
				$msg="Course Testimonial could not be submitted!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 
	
	
 
   /**
     * Get matches trainers based on ajax.
     *
     * @param  string
     * @return JSON Object having matched course details
     */
    public function getCourseAjax(Request $request)
    {
		if($request->ajax()){
			if(null==$request->input('q')){
				$course = Courses::where('status',0)->take(6)->get();
			}else{
				$course = Courses::where('title','LIKE',"%".$request->input('q')."%")->get();
			}
			return response()->json($course,200);
		}
	}
	
	 
   /**
     * Author: Brijesh Chauhan.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {	  
		$edit_data= Courses::findOrFail(base64_decode($id));
		
	 
		
// 		$cetegories= DB::table('web_coursepdf as pdf');		 
// 		$cetegories  =$cetegories->join('web_category as category','pdf.category','=','category.id','left');
// 		$cetegories= $cetegories->select('pdf.*','category.id as categoryid','category.category as categoryname');
// 		$cetegories= $cetegories->groupby('pdf.category');
// 		$cetegories= $cetegories->orderBy('category.category');
// 		$cetegories= $cetegories->where('pdf.status',1)->get();
		
	//echo "<pre>";print_r($edit_data);die;
		$cetegories= Category::where('status',1)->get();	
		// dd($cetegories);
		$course_list= Courses::select('id','title')->where('course_type','<>','3')->where('status',1)->get();
		$speciality =Speciality::where('id',1)->first();
		
		$aboutHeading =CourseAboutExcel::where('course_id',base64_decode($id))->get();		
		//$coursecurriculum =CourseCurriculumExcel::where('course_id',base64_decode($id))->get();		
	
	//echo "<pre>";print_r($edit_data);die;
	
		if(!empty($edit_data->course_curriculum)){			
		$coursecurriculum =CourseCurriculumExcel::where('course_id',$edit_data->course_curriculum)->get();	
		}else{
		$coursecurriculum =CourseCurriculumExcel::where('course_id',base64_decode($id))->get();	

		}
	
	//echo "<pre>";print_r($coursecurriculum);die;
	
	
		$citys= CourseCity::orderBy('city','asc')->where('status',1)->get();	
        return view('admin.seopage.edit_seocourse',['edit_data'=>$edit_data,'course_list'=>$course_list,'cetegories'=>$cetegories,'speciality'=>$speciality,'coursecurriculum'=>$coursecurriculum,'citys'=>$citys,'aboutHeading'=>$aboutHeading]);
    } 
	
 
	// GET  Course pagination
	public function getCoursePagination(Request $request)
	{
		   
		if($request->ajax()){			 
		$courses= 	Courses::orderBy('id','DESC');	
			$courses=$courses->where('course_type','3');
		if($request->input('search.value')!==''){
				$courses = $courses->where(function($query) use($request){
					$query->orWhere('course_name','LIKE','%'.$request->input('search.value').'%')
					      ->orWhere('title','LIKE','%'.$request->input('search.value').'%')						   
						  ->orWhere('slug','LIKE','%'.$request->input('search.value').'%');
				});
			}
			
			if(!empty($request->input('search.category'))){				 
			$courses = $courses->where('category','LIKE','%'.$request->input('search.category').'%');
			}			
			if(!empty($request->input('search.course_type'))){		
//echo $request->input('search.course_type');die;			
			$courses = $courses->where('seo_type','LIKE','%'.$request->input('search.course_type').'%');
			}
			$courses = $courses->paginate($request->input('length'));
			
			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $courses->total();
			$returnLeads['recordsFiltered'] = $courses->total();
			$returnLeads['recordCollection'] = [];
//echo "<pre>";print_r($courses);die;
			foreach($courses as $course){				 
				$action="";
				$seperate="";
				$image="";
					if($course->status=='1'){
				  $action .='<a href="/courses/'.$course->slug.'" title="View Course Content" class="btn btn-primary" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';	
					}else{
					     $action .='<a href="/view/'.$course->slug.'" title="View Course Content" class="btn btn-primary" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>'; 
					    
					}
				//$action .='<a href="admin/course/course-view/'.base64_encode($course->id).'" title="View Course Content" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>';					 
				$action .='<a href="/admin/seopage/edit/'.base64_encode($course->id).'" title="Edit Course Content" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>';
				if(Auth::user()->current_user_can('administrator') || Auth::user()->current_user_can('delete_course_page') ){
				$action .='<a href="javascript:SEOController.delete('.$course->id.')" title="Delete Course Content" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';	
				}
				if($course->subcategory){
					$subcategory = SubCategory::where('id',$course->subcategory)->first();
					if($subcategory){
				$vimage= unserialize($subcategory->course_image); 
				$image='<img src="'.asset('public/'.$vimage['course_image']['src']).'" type="'.$vimage['course_image']['alt'].'" width="100">'; 
				}
				}else{
					$image="";
				}
				$status="";
				if($course->status=='1'){
				$status .='<a href="javascript:SEOController.status('.$course->id.',0)" title="Course status" class="btn btn-success">Active</a>';	
				}else{
				$status .='<a href="javascript:SEOController.status('.$course->id.',1)" title="Course status" class="btn btn-danger">Inactive</a>';	
				}
				
				
				if($course->seo_type=='1'){
					$course_type= "Course Type 1";
				}else if($course->seo_type=='2'){
					$course_type= "Course Type 2";
				}else{
					$course_type= "";
				}
				
				 
					$data[] = [		 		 		 
						$course->course_name,					 	
						$course->title,						
						$course->slug,						
						$course_type,
						$image,			
						$status, 						
						$action,					  
						 
					];
					$returnLeads['recordCollection'][] = $course->id;				 
			}			
			$returnLeads['data'] = $data;
			return response()->json($returnLeads);			
			
		}  
		
	}
	
  
	 /**
     * Remove the specified resource from storage del_icon.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_icon($id)
    {
       	 
		$delet_data = Courses::findOrFail($id);	 
		if($delet_data->course_icons!='')
		{			 
			$image = unserialize($delet_data->course_icons);			
			$large = $image['course_icons']['src'];
			if(!empty($image['course_icons']['src'])){
			$thumbnail = $image['course_icons']['src'];
			if (file_exists($thumbnail))
			{
			unlink($thumbnail);
			}  
			}
			if (file_exists($large))
			{
			unlink($large);
			} 		 
		} 
		$edit_data = array('course_icons'  =>"",);	 
		$del = Courses::where('id',$id)->update($edit_data);			 		
		return redirect('admin/seopage/edit/'.base64_encode($id))->with("success","Icons deleted successfully.");
			
    }
  
	 /**
     * Remove the specified resource from storage del_icon.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_image($id)
    {
       	 
		$delet_data = Courses::findOrFail($id);	 
		if($delet_data->course_image!='')
		{		
			 
			$image = unserialize($delet_data->course_image);
			
			$large = $image['course_image']['src'];
			if(!empty($image['course_image']['src'])){
			$thumbnail = $image['course_image']['src'];
			if (file_exists($thumbnail))
			{
			unlink($thumbnail);
			}  
			}
			if (file_exists($large))
			{
			unlink($large);
			} 
		 
		 
		}
 
		$edit_data = array('course_image'  =>"",);	 
		$del = Courses::where('id',$id)->update($edit_data);			 		
		return redirect('admin/seopage/edit/'.base64_encode($id))->with("success","image deleted successfully.");
			
    }
  
 
 
	 /**
     * Remove the specified resource from storage del_icon.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
		public function delete($id)
		{
 
			$courses = Courses::findOrFail($id);	
			if($courses->course_image!='')
			{
			$image = unserialize($courses->course_image);
			$large = $image['course_image']['src'];
			if(!empty($image['course_image']['src'])){
			$thumbnail = $image['course_image']['src'];
			if (file_exists($thumbnail))
			{
			unlink($thumbnail);
			}  
			}
			if (file_exists($large))
			{
			unlink($large);
			} 
			}
			if($courses->delete()){				
			$status=1;							 
			$msg="Course deleted successfully !";		

			}else{
			$status=0;							 
			$msg="Course could not be deleted!";	
			}

			return response()->json(['status'=>$status,'msg'=>$msg],200); 
		}
  
 
	 /**
     * Remove the specified resource from storage del_icon.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
		 public function courseContentDelete(Request $request,$id){
		  
		  
		  
			$coursesHeading = CourseCurriculumExcel::where('course_id',$id)->get();	
 //echo "<pre>";print_r($coursesHeading);die;
			if(count($coursesHeading)>0){
				 
				foreach($coursesHeading as $heading){					 
						$coursesContent = CourseCurriculumExcel::where('heading_id',$heading->id)->get();
						if(count($coursesContent)>0){
							foreach($coursesContent as $content){
								$coursesSubContent = CourseCurriculumExcel::where('content_id',$content->id)->get();
								if(count($coursesSubContent)>0){
									foreach($coursesSubContent as $subcontent){										
										$coursesLastContent = CourseCurriculumExcel::where('subcontent_id',$subcontent->id)->get();
										if(count($coursesLastContent)>0){
											foreach($coursesLastContent as $lastContent){
												$deleteLastContent = CourseCurriculumExcel::where('id',$lastContent->id)->delete();
												$deleteendContent = CourseCurriculumExcel::where('endcontent_id',$lastContent->id)->delete();
												$delsubcontent  =CourseCurriculumExcel::where('id',$subcontent->id)->delete();
												$delcontent  =CourseCurriculumExcel::where('id',$content->id)->delete();
												$delheading  =CourseCurriculumExcel::where('id',$heading->id)->delete();
												$status=1;
												$error=200;
												$msg="Course Content Deleted Successfully !";
											}
										}else{											
											$delsubcontent  =CourseCurriculumExcel::where('id',$subcontent->id)->delete();
											$delcontent  =CourseCurriculumExcel::where('id',$content->id)->delete();
											$delheading  =CourseCurriculumExcel::where('id',$heading->id)->delete();
											$status=1;
											$error=200;
											$msg="Course Content Deleted Successfully !";											
										}										
									}									
								}else{
									$delcontent  =CourseCurriculumExcel::where('id',$content->id)->delete();
									$delheading  =CourseCurriculumExcel::where('id',$heading->id)->delete();	
									$status=1;
									$error=200;
									$msg="Course Content Deleted Successfully !";
								}								
							}							
						}else{
							$delheading  =CourseCurriculumExcel::where('id',$heading->id)->delete();	
							$status=1;
							$error=200;
							$msg="Course Content Deleted Successfully !";
						}							
				}
				
									 
			
			}else{	 		
				$error=404;
				$status=0;
				$msg="Not Record found!";				
			}
		 return response()->json(['status'=>$status,'msg'=>$msg],200);
	}
	 
 
	  
 
	 /**
     * Remove the specified resource from storage del_icon.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
 
	 public function courseAboutExcelDelete(Request $request,$id){
		  
			$courseAboutHeading = CourseAboutExcel::where('course_id',$id)->get();	

			if(count($courseAboutHeading)>0){
				 
				foreach($courseAboutHeading as $heading){					 
						$courseAboutLevel1 = CourseAboutExcel::where('heading_id',$heading->id)->get();
						if(count($courseAboutLevel1)>0){
							foreach($courseAboutLevel1 as $content){
								$courseAboutLevel2 = CourseAboutExcel::where('content_id',$content->id)->get();
								if(count($courseAboutLevel2)>0){
									foreach($courseAboutLevel2 as $subcontent){										
										$courseAboutLevel3 = CourseAboutExcel::where('subcontent_id',$subcontent->id)->get();
										if(count($courseAboutLevel3)>0){
											foreach($courseAboutLevel3 as $lastContent){
												$deleteLastContent = CourseAboutExcel::where('id',$lastContent->id)->delete();
												$deleteendContent = CourseAboutExcel::where('endcontent_id',$lastContent->id)->delete();
												$delsubcontent  =CourseAboutExcel::where('id',$subcontent->id)->delete();
												$delcontent  =CourseAboutExcel::where('id',$content->id)->delete();
												$delheading  =CourseAboutExcel::where('id',$heading->id)->delete();
												$status=1;
												$error=200;
												$msg="Course About Deleted Successfully !";
											}
										}else{											
											$delsubcontent  =CourseAboutExcel::where('id',$subcontent->id)->delete();
											$delcontent  =CourseAboutExcel::where('id',$content->id)->delete();
											$delheading  =CourseAboutExcel::where('id',$heading->id)->delete();
											$status=1;
											$error=200;
											$msg="Course About Deleted Successfully!";											
										}										
									}									
								}else{
									$delcontent  =CourseAboutExcel::where('id',$content->id)->delete();
									$delheading  =CourseAboutExcel::where('id',$heading->id)->delete();	
									$status=1;
									$error=200;
									$msg="Course About Deleted Successfully!";
								}								
							}							
						}else{
							$delheading  =CourseAboutExcel::where('id',$heading->id)->delete();	
							$status=1;
							$error=200;
							$msg="Course About Deleted Successfully!";
						}							
				}
				
									 
			
			}else{	 		
				$error=404;
				$status=0;
				$msg="Not Record found!";				
			}
		 return response()->json(['status'=>$status,'msg'=>$msg],200);
	}
	 
  
	  
	  
	  
	 /**
     * Remove the specified resource from storage status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(request $request, $id,$val)
    {
       	 if($request->ajax()){	
		 
		$courses = Courses::findOrFail($id);	 
		$courses->status=$val;
	
		if($courses->save()){
			$status=1;							 
			$msg="Course status updated successfully!";					
			}else{
			$status=0;							 
			$msg="Course status could not be successfully, Please try again !";	
			}		
			return response()->json(['status'=>$status,'msg'=>$msg],200); 
		 }
    }
 
 
 /**
     * the specified resource fetch from subcuisine according to cuisine id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_coursecategoryType(Request $request)
    {
		//echo "<pre>";print_r($_POST);die;
        
		$tval = $request->input('tval'); 
		$cat = $request->input('cat'); 	
//echo $tval.'--'.$cat; 
	//	$subcategory_data =SubCategory::where('category',$id)->where('status',1)->get();		
		$category_data= DB::table('web_courses as course');		 
		$category_data  =$category_data->join('web_category as category','course.category','=','category.id','left');
		$category_data= $category_data->select('course.id as courseid','course.title as coursetitle','course.slug as slug','course.course_name as course_name','course.category as categoryid','category.category as categoryname');
		$category_data= $category_data->groupby('course.category');
		$category_data= $category_data->orderBy('category.category');
		
		$category_data= $category_data->where('course.course_type','=',$tval);
		$category_data= $category_data->where('course.seo_page','=',1);
		//$subcategory_data= $subcategory_data->where('course.category',$cat);
		$category_data= $category_data->where('course.status',1)->get();
		
		
		//echo "<pre>";print_r($subcategory_data);die;
		
		/* $subcategory_data= DB::table('web_coursepdf as pdf');		 
		$subcategory_data  =$subcategory_data->join('web_subcategory as subcategory','pdf.subcategory','=','subcategory.id','left');
		$subcategory_data= $subcategory_data->select('pdf.*','subcategory.id as subcategoryid','subcategory.subcategory as subcategoryname','subcategory.category as categoryname');
		$subcategory_data= $subcategory_data->groupby('pdf.subcategory');
		$subcategory_data= $subcategory_data->orderBy('subcategory.subcategory');
		
		$subcategory_data= $subcategory_data->where('pdf.category',$id);
		$subcategory_data= $subcategory_data->where('pdf.status',1)->get(); */	
		//echo "<pre>";print_r($category_data);die;
		if($category_data){ 
		echo '<option value="">Select Category</option>';
		foreach($category_data as $category){ 
		$selected = ($cat==$category->categoryid)?"selected":'';
		echo'<option value="'.$category->categoryid.','.$tval.'" '.$selected.' >'.$category->categoryname.'</option>';
		}
		}else { 
		echo'<option value="">No record found</option>';
		}
		
	}
	
	
 
	/**
     * the specified resource fetch from subcuisine according to cuisine id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCourseSubCategory(Request $request)
    {        
		 
		$id = explode(',',$request->input('cid')); 
	//	echo "<pre>";print_r($id);echo $id[0];echo $id[1];die;
		$sid = $request->input('sid'); 		
//echo $id.'--'.$sid;die;		
	//	$subcategory_data =SubCategory::where('category',$id)->where('status',1)->get();		
		$subcategory_data= DB::table('web_courses as course');		 
		$subcategory_data  =$subcategory_data->join('web_subcategory as subcategory','course.subcategory','=','subcategory.id','left');
		$subcategory_data= $subcategory_data->select('course.id as courseid','course.title as coursetitle','course.slug as slug','course.course_name as course_name','course.category as categoryid','subcategory.id as subcategoryid','subcategory.subcategory as subcategoryname');
		$subcategory_data= $subcategory_data->groupby('course.subcategory');
		$subcategory_data= $subcategory_data->orderBy('subcategory.subcategory');
		$subcategory_data= $subcategory_data->where('course.category',$id[0]);
		$subcategory_data= $subcategory_data->where('course.course_type','=',$id[1]);
		$subcategory_data= $subcategory_data->where('course.seo_page','=',1);
		$subcategory_data= $subcategory_data->where('course.status',1)->get();
		
		
		//echo "<pre>";print_r($subcategory_data);die;
		
		/* $subcategory_data= DB::table('web_coursepdf as pdf');		 
		$subcategory_data  =$subcategory_data->join('web_subcategory as subcategory','pdf.subcategory','=','subcategory.id','left');
		$subcategory_data= $subcategory_data->select('pdf.*','subcategory.id as subcategoryid','subcategory.subcategory as subcategoryname','subcategory.category as categoryname');
		$subcategory_data= $subcategory_data->groupby('pdf.subcategory');
		$subcategory_data= $subcategory_data->orderBy('subcategory.subcategory');
		
		$subcategory_data= $subcategory_data->where('pdf.category',$id);
		$subcategory_data= $subcategory_data->where('pdf.status',1)->get(); */


		
		//echo "<pre>";print_r($subcategory_data);die;
		if($subcategory_data){ 
		echo '<option value="">Select Sub Category</option>';
		foreach($subcategory_data as $subcategory){ 
		$selected = ($sid==$subcategory->subcategoryid)?"selected":'';
		echo'<option value="'.$id[0].','.$subcategory->subcategoryid.','.$id[1].'" '.$selected.' >'.$subcategory->subcategoryname.'</option>';
		}
		}else { 
		echo'<option value="">No record found</option>';
		}
		
	}
 
 /**
     * the specified resource fetch from subcuisine according to cuisine id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCourseName(Request $request)
    {
        
		$id = $request->input('sid'); 
		//echo "<pre>";print_r($id);
		
		$id=explode(',',$id);
		$pid = $request->input('pid'); 
		 //echo "<pre>";print_r($id);die;
	//	$subcategory_data =SubCategory::where('category',$id)->where('status',1)->get();
		
		
		$subcategory_data= DB::table('web_courses as course');	 		
		$subcategory_data= $subcategory_data->select('course.*','course.id as courseid');
	//	$subcategory_data= $subcategory_data->groupby('pdf.subcategory');
		$subcategory_data= $subcategory_data->where('course.subcategory',$id[1]);
		//$subcategory_data= $subcategory_data->where('course.course_type','=',$id[1]);
		$subcategory_data= $subcategory_data->where('course.course_type','=',$id[2]);
		//$subcategory_data= $subcategory_data->where('course.subcategory',$id);
		$subcategory_data= $subcategory_data->where('course.seo_page','=',1);
		$subcategory_data= $subcategory_data->where('course.status',1)->get();
		
//echo "<pre>";print_r($subcategory_data);die;

		/* $subcategory_data= DB::table('web_coursepdf as pdf');	 		
		$subcategory_data= $subcategory_data->select('pdf.*','pdf.id as pdfid');
	//	$subcategory_data= $subcategory_data->groupby('pdf.subcategory');
		$subcategory_data= $subcategory_data->where('pdf.subcategory',$id);
		$subcategory_data= $subcategory_data->where('pdf.status',1)->get(); */


		 
		
		
		//echo "<pre>";print_r($subcategory_data);die;
		if($subcategory_data){ 
		echo '<option value="">Select Course</option>';
		foreach($subcategory_data as $subcategory){ 
		$selected = ($pid==$subcategory->courseid)?"selected":'';

		echo'<option value="'.$subcategory->courseid.','.$id[0].','.$id[1].','.$id[2].'" '.$selected.' >'.$subcategory->course_name.'</option>';

		}
		} else { 
		echo'<option value="">No record found</option>';
		}
		
		
	 	
		  
    } 
	
	
	/**
     * the specified resource fetch from subcuisine according to cuisine id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCourseCity(Request $request)
    {        
	$id = $request->input('cid'); 
		//echo "<pre>";print_r($_POST);die;
	$id=explode(',',$id);
	$pid = $request->input('pid'); 
	
	//$course=explode(',',$request->input('course'));
	$courseslist = Courses::findOrFail($id[0]);	 
//	$category=explode(',',$request->input('category'));
	//$subcategory=explode(',',$request->input('subcategory'));
	//$checkdata = Courses::where('category',$id[1])->where('subcategory',$id[2])->where('title',strtoupper($courseslist->title.' in '.$request->input('city')))->get();

	$checkdataslug = Courses::select('id','course_clone_id','title','course_name','city')->where('category',$id[1])->where('subcategory',$id[2])->where('city','<>','')->where('course_clone_id',$id[0])->groupby('city')->get();
		//echo "<pre>";print_r($checkdataslug); 
		$listcity=[];
		if(!empty($checkdataslug)){
			foreach($checkdataslug as $slug){
				array_push($listcity, $slug->city);				
			}
			
		}


		$inerarr =[];
		$newcity =[];
		$main_array = array(1,3);
		$check_value = array(1,2,3,4,5);
		
		
		/* if(!empty($listcity)){
			foreach($listcity as $key=>$val){
				
				$new= array_push($newcity,$val);
			}			
		} */
		
		
		$check_value =CourseCity::where('status','1')->get();
		foreach ($check_value as $value) {
		if (in_array($value->city, $listcity)) {
		//$new= array_push($newcity,$value);
		}
		else{
		 array_push($newcity,$value->city);
		}
		}
		//echo "<pre>";print_r($newcity); 		
		
	//echo "<pre>";print_r($listcity);die;
	  
		
		
		//echo "<pre>";print_r($subcategory_data);die;
		if($newcity){ 
		echo '<option value="">Select City</option>';
		foreach($newcity as $new=>$nval){ 
		$selected = ($pid==$nval)?"selected":'';

		echo'<option value="'.$nval.'" '.$selected.' >'.$nval.'</option>';

		}
		} else { 
		echo'<option value="">No record found</option>';
		}
		
		
	 	
		  
    }
 
 
 	
	/**
     * the specified resource fetch from subcuisine according to cuisine id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSEOCategoryPDF(Request $request)
    {        
		$id = $request->input('cid'); 
		$sid = $request->input('sid'); 		 
	//	$subcategory_data =SubCategory::where('category',$id)->where('status',1)->get();	
		
		$subcategory_data= DB::table('web_coursepdf as pdf');		 
		$subcategory_data  =$subcategory_data->join('web_subcategory as subcategory','pdf.subcategory','=','subcategory.id','left');
		$subcategory_data= $subcategory_data->select('pdf.*','subcategory.id as subcategoryid','subcategory.subcategory as subcategoryname','subcategory.category as categoryname');
		$subcategory_data= $subcategory_data->groupby('pdf.subcategory');
		$subcategory_data= $subcategory_data->where('pdf.category',$id);
		$subcategory_data= $subcategory_data->where('pdf.status',1)->get();


		
		//echo "<pre>";print_r($subcategory_data);die;
		if($subcategory_data){ 
		echo '<option value="">Select sub Category</option>';
		foreach($subcategory_data as $subcategory){ 
		$selected = ($sid==$subcategory->subcategoryid)?"selected":'';

		echo'<option value="'.$subcategory->subcategoryid.'" '.$selected.' >'.$subcategory->subcategoryname.'</option>';

		}
		} else { 
		echo'<option value="">No record found</option>';
		}
		
	}
	/**
     * the specified resource fetch from subcuisine according to cuisine id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSEOCoursePdf(Request $request)
    {
        
		$id = $request->input('sid'); 
		$pid = $request->input('pid'); 
		 
	//	$subcategory_data =SubCategory::where('category',$id)->where('status',1)->get();
		
		
		$subcategory_data= DB::table('web_coursepdf as pdf');	 		
		$subcategory_data= $subcategory_data->select('pdf.*','pdf.id as pdfid');
	//	$subcategory_data= $subcategory_data->groupby('pdf.subcategory');
		$subcategory_data= $subcategory_data->where('pdf.subcategory',$id);
		$subcategory_data= $subcategory_data->where('pdf.status',1)->get();


		
		//echo "<pre>";print_r($subcategory_data);die;
		if($subcategory_data){ 
		echo '<option value="">Select Course PDF</option>';
		foreach($subcategory_data as $subcategory){ 
		$selected = ($pid==$subcategory->coursePdfText)?"selected":'';

		echo'<option value="'.$subcategory->coursePdfText.'" '.$selected.' >'.$subcategory->coursePdfText.'</option>';

		}
		} else { 
		echo'<option value="">No record found</option>';
		}
		  
    }
 
 
 /** Select subcategory wise show of course module onlu type 1
     * the specified resource fetch from subcuisine according to cuisine id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSEOCourseReletedEdit(Request $request)
    {	 
	
	 
		$cid = $request->input('cid');  		 
		$cr = $request->input('cr'); 		
		$subcategory_data= DB::table('web_courses as course');	 		
		$subcategory_data= $subcategory_data->select('course.*','course.id as courseid');	 
		//$subcategory_data= $subcategory_data->where('course.category','=',$cid);	 
		$subcategory_data= $subcategory_data->where('course.course_type','=',3);	 
		$subcategory_data= $subcategory_data->where('course.status',1)->get();
		
		//echo "<pre>";print_r($subcategory_data);die;


		if(!empty($cr)){	
		$related_courses = unserialize($cr);	
		}else{
		$related_courses=array();
		}
		
		if(!empty($subcategory_data) && count($subcategory_data)>0){ 
		foreach($subcategory_data as $subcategory){ 
		if(in_array($subcategory->courseid, $related_courses)){		 
			echo'<option value="'.$subcategory->courseid.'" selected>'.$subcategory->title.'</option>';
		}else{
			echo'<option value="'.$subcategory->courseid.'" >'.$subcategory->title.'</option>';
		}
		}
		}else{ 
		echo'<option value="">No record found</option>';
		}
		
		
		 
    } 
 
 
	/**
     * the specified resource fetch from subcuisine according to cuisine id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getcourseCityOnline(Request $request)
    {        
		$id = $request->input('cid'); 		 
		$id=explode(',',$id);
		$pid = $request->input('pid'); 	 
		$courseslist = Courses::findOrFail($id[0]);	
		$checkdataslug = Courses::select('id','course_clone_id','title','course_name','city')->where('category',$id[1])->where('subcategory',$id[2])->where('city','<>','')->where('course_clone_id',$id[0])->groupby('city')->get();		 
		$listcity=[];
		if(!empty($checkdataslug)){
			foreach($checkdataslug as $slug){
				array_push($listcity, $slug->city);				
			}			
		}
		$inerarr =[];
		$newcity =[];	 
		$check_value =array('Online');
		foreach ($check_value as $key=>$vale) {
		if (in_array($vale, $listcity)) {
		//$new= array_push($newcity,$value);
		}
		else{
		 array_push($newcity,$vale);
		}
		}	
		 
		if($newcity){ 
		echo '<option value="">Select City</option>';
		foreach($newcity as $new=>$nval){ 
		$selected = ($pid==$nval)?"selected":'';
		echo'<option value="'.$nval.'" '.$selected.' >'.$nval.'</option>';
		}
		} else { 
		echo'<option value="">No record found</option>';
		}		  
    }
 
 
	/**
     * the specified resource fetch from subcuisine according to cuisine id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getcourseNCRCity(Request $request)
    {        
		$id = $request->input('cid'); 		 
		$id=explode(',',$id);
		$pid = $request->input('pid'); 	 
		$courseslist = Courses::findOrFail($id[0]);	
		$checkdataslug = Courses::select('id','course_clone_id','title','course_name','city')->where('category',$id[1])->where('subcategory',$id[2])->where('city','<>','')->where('course_clone_id',$id[0])->groupby('city')->get();		 
		$listcity=[];
		if(!empty($checkdataslug)){
			foreach($checkdataslug as $slug){
				array_push($listcity, $slug->city);				
			}
			
		}
		$inerarr =[];
		$newcity =[];	 
		$check_value =array('Delhi','Noida','Gurgaon');
		foreach ($check_value as $key=>$vale) {
		if (in_array($vale, $listcity)) {
		//$new= array_push($newcity,$value);
		}
		else{
		 array_push($newcity,$vale);
		}
		}	
		 
		if($newcity){ 
		echo '<option value="">Select City</option>';
		foreach($newcity as $new=>$nval){ 
		$selected = ($pid==$nval)?"selected":'';
		echo'<option value="'.$nval.'" '.$selected.' >'.$nval.'</option>';
		}
		} else { 
		echo'<option value="">No record found</option>';
		}		  
    }
 
 
 function generate_slug($slug=null){
	if(is_null($slug)){
		return null;
	}
	$slug = explode(" ",$slug);
	$slug = array_map('trim',$slug);
	//$slug = array_map('remove_splchars',$slug);
	$slug = array_map('strtolower',$slug);
	$slug = implode("-",$slug);
	return $slug;
}
 
 
 
 
}
