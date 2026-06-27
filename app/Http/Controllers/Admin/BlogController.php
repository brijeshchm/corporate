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
use App\city;
use App\FAQs;
use App\Blog;
use App\Helpers;
use App\Category;
class BlogController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	  
        return view('admin.blog.index');
    } 
	
 
   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {		
		$cetegories= Category::select('id','category')->where('status',1)->get();	
        return view('admin.blog.add_blog',['cetegories'=>$cetegories]);
    } 
	 /**
	 add save Course Title with slug
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveBlog(Request $request)
    {	  
	 //echo "<pre>";print_r($_POST);die;
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
			 
				'title' => 'required|min:20|max:75',				
				'sub_title'=>'required|min:28|max:48',			
				'rating' => 'required',				
				'total_rating' => 'required',				
				'category' => 'required',				
				'subcategory' => 'required',				
				'alt' => 'required',				
				'meta_keyword'=>'required|min:20|max:160',	
				'meta_description'=>'required|min:45|max:160',	
				'blog_description' => 'required|min:100|max:140',					 		
				'blog_content' => 'required',					 		
				//'blog_icons' => 'required|mimes:jpeg,png,jpg,svg|max:8|dimensions:min_width=315,min_height=230,max_width=325,max_height=240', 
				'blog_icons' => 'required|mimes:jpeg,png,jpg,svg', 
				'blog_image' => 'required|mimes:jpeg,png,jpg,svg',					
				//'blog_image' => 'required|mimes:jpeg,png,jpg,svg|max:40|dimensions:min_width=700,min_height=400,max_width=750,max_height=450',					
				 				
			]);
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			$alt= $request->input('alt');
			
				// GENERATING SLUG
			// ***************
			$business_slug = NULL;
			$business_slug = $this->generate_slug(str_replace('?','',$request->input('title')));
			if(is_null($business_slug)){
			return redirect("/admin/blog/add");

			}
			$slugExists = DB::table('web_blog')
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

			if ($request->hasFile('blog_icons')) {
				$icons = [];
				$filePath = $this->getBlogFolderStructure();
			//	$file = Input::file('course_image');
				$file =  $request->file('blog_icons');
				$iconsfilename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$iconsfilename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$iconsfilename)){
				$iconsfilename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$iconsfilename);				 
				$icons['blog_icons'] = array(
				'name'=>$iconsfilename,
				'alt'=>$alt,						
				'src'=>$filePath."/".$iconsfilename
				);	
				} 
				
				
				if ($request->hasFile('blog_image')) {
				$image = [];
				$filePath = $this->getBlogFolderStructure();
			//	$file = Input::file('course_image');
				$file =  $request->file('blog_image');
				$filename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$filename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$filename)){
				$filename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$filename);				 
				$image['blog_image'] = array(
				'name'=>$filename,
				'alt'=>$alt,						
				'src'=>$filePath."/".$filename
				);	
				} 
				
				$blog = New Blog;
				$blog->title = ucwords(trim($request->input('title')));		
				$blog->slug  =$business_slug;					
				$blog->sub_title = ucwords($request->input('sub_title'));					 
				$blog->rating = trim($request->input('rating'));					 
				$blog->total_rating = trim($request->input('total_rating'));					 
				$blog->meta_keyword = $request->input('meta_keyword');					 
				$blog->meta_description = $request->input('meta_description');					 
				$blog->blog_description = $request->input('blog_description');	
				$blog->blog_content = $request->input('blog_content');	
				$blog->category = $request->input('category');	
				$blog->subcategory = $request->input('subcategory');	
				$blog->blog_image = serialize($image);									
				$blog->blog_icons = serialize($icons);									
				$blog->created_by = '1';				 
				$blog->status = '1';				 
				 	
			if($blog->save()){
				$status=1;							 
				$msg="Blog submitted successfully!";		
				
			}else{
				$status=0;							 
				$msg="Blog could not be submitted, Please try again!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 

  
	
	 
   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {	  
		$edit_data= Blog::findOrFail(base64_decode($id)); 
		$cetegories= Category::select('id','category')->where('status',1)->get();	
		
        return view('admin.blog.edit_blog',['edit_data'=>$edit_data,'cetegories'=>$cetegories]);
    } 
	
 /**
	 add save Course Title with slug
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editSaveBlog(Request $request,$id)
    {	  
 
        if($request->ajax()){ 
		
		  $validator = Validator::make($request->all(),[	
				
				'title' => 'required|min:20|max:75',				
				'sub_title'=>'required|min:28|max:48',			
				'rating' => 'required',				
				'total_rating' => 'required',				
				'category' => 'required',				
				'subcategory' => 'required',				
				'alt' => 'required',
				'slug' => 'required',
				'meta_keyword'=>'required|min:20|max:160',	
				'meta_description'=>'required|min:45|max:160',	
				'blog_description' => 'required|min:100|max:140',				 				
				'blog_content' => 'required',				 				
				 			
			]);
			
			if($request->hasFile('blog_icons')){
				 $validator = Validator::make($request->all(),[					 
			//	'blog_icons' => 'required|mimes:jpeg,png,jpg,svg|max:8|dimensions:min_width=315,min_height=230,max_width=325,max_height=240',	 			
				'blog_icons' => 'required|mimes:jpeg,png,jpg,svg', 
					 			
			]);
			}
			if($request->hasFile('blog_image')){
				 $validator = Validator::make($request->all(),[					 
				//'blog_image' => 'required|mimes:jpeg,png,jpg,svg|max:40|dimensions:min_width=600,min_height=400,max_width=750,max_height=450',	 			
		    	'blog_image' => 'required|mimes:jpeg,png,jpg,svg',			
			]);
			} 
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
				$alt= $request->input('alt');	
				$blog = Blog::findOrFail($id);
				$blog->title = ucfirst(trim($request->input('title')));		
				$blog->slug  =trim(str_replace('?','',$request->input('slug')));			
				$blog->sub_title = ucfirst($request->input('sub_title'));					 
				$blog->rating = trim($request->input('rating'));					 
				$blog->total_rating = trim($request->input('total_rating'));	
				$blog->category = trim($request->input('category'));
				$blog->subcategory = trim($request->input('subcategory'));				
				$blog->meta_keyword = ucfirst($request->input('meta_keyword'));					 
				$blog->meta_description = ucfirst($request->input('meta_description'));					 
				$blog->blog_description = ucfirst($request->input('blog_description'));				
				$blog->blog_content = ucfirst($request->input('blog_content'));				
				
				if ($request->hasFile('blog_icons')) {
				$icons = [];
				$filePath = $this->getBlogFolderStructure();
			 
				$file =  $request->file('blog_icons');
				$iconsfilename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$iconsfilename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$iconsfilename)){
				$iconsfilename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$iconsfilename);				 
				$icons['blog_icons'] = array(
				'name'=>$iconsfilename,
				'alt'=>$alt,						
				'src'=>$filePath."/".$iconsfilename
				);	
				$blog->blog_icons = serialize($icons);		
				}else{
				$blog->blog_icons = $blog->blog_icons;	
				}	
				
				if ($request->hasFile('blog_image')) {
				$image = [];
				$filePath = $this->getBlogFolderStructure();
			 
				$file =  $request->file('blog_image');
				$filename =str_replace(' ', '_', $file->getClientOriginalName());			 
				$destinationPath = public_path($filePath);
				$nameArr = explode('.',$filename);
				$ext = array_pop($nameArr);
				$name = implode('_',$nameArr);
				if(file_exists($destinationPath.'/'.$filename)){
				$filename = $name."_".time().'.'.$ext;
				}
				$file->move($destinationPath,$filename);				 
				$image['blog_image'] = array(
				'name'=>$filename,
				'alt'=>$alt,						
				'src'=>$filePath."/".$filename
				);	
				$blog->blog_image = serialize($image);		
				}else{
				$blog->blog_image = $blog->blog_image;	
				}	
				
			 	$blog->updated_by = '1';			
			if($blog->save()){
				$status=1;							 
				$msg="Blog updated successfully!";		
				
			}else{
				$status=0;							 
				$msg="Blog could not be updated, Please try again!";	
			}
		
			 return response()->json(['status'=>$status,'msg'=>$msg],200); 
			
		
		}
    } 

	// GET  Course pagination
	public function getBlogPagination(Request $request)
	{
		   
		if($request->ajax()){			 
		$blogs = 	Blog::orderBy('id','desc');		 
		if($request->input('search.value')!==''){
				$blogs = $blogs->where(function($query) use($request){
					$query->orWhere('title','LIKE','%'.$request->input('search.value').'%')					     		   
						  ->orWhere('sub_title','LIKE','%'.$request->input('search.value').'%');
				});
			}
			$blogs = $blogs->paginate($request->input('length'));
			
			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $blogs->total();
			$returnLeads['recordsFiltered'] = $blogs->total();
			$returnLeads['recordCollection'] = [];
 
			foreach($blogs as $blog){				 
				$action="";
				$seperate="";	
				$status="";		
				$action .='<a href="/admin/blog/edit/'.base64_encode($blog->id).'" title="Edit Blog" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>';
				if(Auth::user()->current_user_can('administrator') || Auth::user()->current_user_can('delete_blog') ){
				$action .='<a href="javascript:blogController.delete('.$blog->id.')" title="Delete Blog" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';	
				}
				if($blog->blog_image){
				 $vimage= unserialize($blog->blog_image); 
				$image='<img src="'.asset('public/'.$vimage['blog_image']['src']).'" type="'.$vimage['blog_image']['alt'].'" width="100">'; 
				}
				if($blog->status=='1'){
					$status .='<a href="javascript:blogController.status('.$blog->id.',0)" title="Course status" class="btn btn-success" >Active</a>';	
					}else{
					$status .='<a href="javascript:blogController.status('.$blog->id.',1)" title="Course status" class="btn btn-danger" >Inactive</a>';	
					}
					$data[] = [		 		 		 
						$blog->title,					 			
						$blog->slug,					 			
						$image,	
						$status,		
						$action,					  
						 
					];
					$returnLeads['recordCollection'][] = $blog->id;				 
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
    public function delete($id)
    {
		 
		$blog = Blog::findOrFail($id);			 
		if($blog->blog_image!='')
		{
			$image = unserialize($blog->blog_image);
			$large = $image['blog_image']['src'];
			if(!empty($image['blog_image']['src'])){
			$thumbnail = $image['blog_image']['src'];
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
		
		if($blog->blog_icons!='')
		{
			$image = unserialize($blog->blog_icons);
			$large = $image['blog_icons']['src'];
			if(!empty($image['blog_icons']['src'])){
			$thumbnail = $image['blog_icons']['src'];
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

		 
		
		if($blog->delete()){
		$status=1;							 
		$msg="Blog Deleted Successfully!";	
		}else{
		$status=0;							 
		$msg="Blog could not be Deleted!";	
		}
		return response()->json(['status'=>$status,'msg'=>$msg],200); 
    }
  
 
	 /**
     * Remove the specified resource from storage del_icon.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_icon($id)
    {
       	 
		$delet_data = Blog::findOrFail($id); 	
		if($delet_data->blog_icons!='')
		{		
			 
			$image = unserialize($delet_data->blog_icons);
			
			$large = $image['blog_icons']['src'];
			if(!empty($image['blog_icons']['src'])){
			$thumbnail = $image['blog_icons']['src'];
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
 
		$edit_data = array('blog_icons'  =>"",);	 
		$del = Blog::where('id',$id)->update($edit_data);			 		
		return redirect('admin/blog/edit/'.base64_encode($id))->with("success","Blog Icons deleted successfully.");
			
    }
 
 
	 /**
     * Remove the specified resource from storage del_icon.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_image($id)
    {
       	 
		$delet_data = Blog::findOrFail($id); 	
		if($delet_data->blog_image!='')
		{		
			 
			$image = unserialize($delet_data->blog_image);
			
			$large = $image['blog_image']['src'];
			if(!empty($image['blog_image']['src'])){
			$thumbnail = $image['blog_image']['src'];
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
 
		$edit_data = array('blog_image'  =>"",);	 
		$del = Blog::where('id',$id)->update($edit_data);			 		
		return redirect('admin/blog/edit/'.base64_encode($id))->with("success","image deleted successfully.");
			
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
		 
		$blog = Blog::findOrFail($id);	 
		$blog->status=$val;
		 
		if($blog->save()){
			$status=1;							 
			$msg="Blog status updated successfully !";					
			}else{
			$status=0;							 
			$msg="Blog status could not be successfully, Please try again !";	
			}		
			return response()->json(['status'=>$status,'msg'=>$msg],200); 
		 }
    }
  
 
      
    // FOLDER STRUCTURE GENERATOR
    // **************************
    function getBlogFolderStructure(){
    	try{
    		$partial_str = '';
    		$day = date('j');
    		$week = '';
    		if($day<11){
    			$week = 'week_1';
    		}
    		else if($day>=11&&$day<21){
    			$week = 'week_2';
    		}
    		else if($day>=21){
    			$week = 'week_3';
    		}
    		$partial_str = 'uploads/Blog/'.date('Y').'/'.date('m').'/'.$week;
    		$structure = public_path($partial_str);
    		if(file_exists($structure)){
    			return $partial_str;
    		}else{
    			if(mkdir($structure, 0755, true)){
    				return $partial_str;
    			}else{
    				throw new Exception("Folder structure not found.\nUnable to create folder structure.");
    			}
    		}
    	}catch(Exception $e){
    		return $e->getMessage();
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
