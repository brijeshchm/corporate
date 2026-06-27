<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use Auth;
use Hash; 
use Validator;
use DB;
use Session;
use App\Inquiry;
use App\City;
use App\Country;
use App\State;
use App\LeadPortal;
use App\JobStutdents;
use App\FeesStutdents;
use App\ExpCertification;
use Carbon\Carbon; 
use Mail;
class requestZoneController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        
	   
    }
 
	
	public function saveRequestZone(Request $request){
		 
		if($request->ajax()){
					//echo "<pre>";print_r($_POST);die;
			  if($request->input('rz_form') ==='TF'){
				 
				 /*  $check = ExpCertification::where('certificate_no',trim($request->input('studentId')))->first();
 
			if(!empty($check)){
				 
				
			}else{		

 	 
				$validator = Validator::make($request->all(),[							
				'name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',					
				'course' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:50',					
				'trainer' 	=> 'required',					
				'feedback' 	=> 'required',					
				'duringcourse' 	=> 'required',					
				'communication' => 'required',					
				'training' 	=> 'required',					
				'studentId' 	=> 'required|unique:certificates|exists:certificate_no',					
				 
			]); 
				
			} */
			   $validator = Validator::make($request->all(),[							
			'name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',					
				'course' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:50',					
				'trainer' 	=> 'required',					
			//	'feedback' 	=> 'required',					
				'rating' 	=> 'required',					
				'rating1' 	=> 'required',	
				'rating2' 	=> 'required',					
				'rating4' 	=> 'required',					
				'rating3' 	=> 'required',					
				'rating5'	=> 'required',					
				'rating6' => 'required',	
				'studentId' 	=> 'required',				
				 
			]); 			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	
			
			
			$inquiry = New LeadPortal;		 
		$inquiry->name= $request->input('name');
		$inquiry->email= $request->input('email');
		$inquiry->phone= $request->input('phone');			 	 
		$inquiry->course= $request->input('course');	
		$inquiry->studentId= $request->input('studentId');	
	    $inquiry->Q1= $request->input('rating');	
		$inquiry->Q2= $request->input('rating1');	
		$inquiry->Q3= $request->input('rating2');	
		$inquiry->Q4= $request->input('rating3');	
		$inquiry->Q5= $request->input('rating4');	
		$inquiry->Q6= $request->input('rating5');	
		$inquiry->Q7= $request->input('rating6');	
		$inquiry->comment= $request->input('feedback');	
		  //echo "<pre>";print_r($inquiry);die;
	    $inquiry->save();
	
			
			
			 }
			 
			
			 
			 
			 if($request->input('rz_form') ==='RCT'){
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',				 					
				'campany_name' 	=> 'required',					
				'technology' 	=> 'required',					
				'remark' 	=> 'required',					
				'code' 	=> 'required|numeric',	
			]); 			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	
			 }
			 
			 
			 
			
			 if($request->input('rz_form') ==='SR'){
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',	
				'candidate_phone' 	=> 'required|numeric',		
				'course' 	=> 'required',					
				'remark' 	=> 'required',					
				'candidate_name' => 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:50',				
				 				
				 
			]); 			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	
			 }
			 
			 
			 
			  if($request->input('rz_form') ==='FC'){
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',					
				'course' 	=> 'required',					
				'query' 	=> 'required',					
				 			
				 				
				 
			]); 			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	
			 } 
			
			
			if($request->input('rz_form') ==='NBE' || $request->input('rz_form') ==='RFOT'|| $request->input('rz_form') ==='CTM'|| $request->input('rz_form') ==='ROT' ){
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',					
				'course' 	=> 'required',					
				'remark' 	=> 'required',		 			
				 				
				 
			]); 			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	
			
			 }
			 
			 if($request->input('rz_form') ==='PQ'){
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',					
				'course' 	=> 'required',					
				'query' 	=> 'required',					
				 			
				 				
				 
			]); 			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	
			 }
			

			 if($request->input('rz_form') ==='JPA'){
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',					
				'course' 	=> 'required',					
				'remark' 	=> 'required',					
				 			
				 				
				 
			]); 			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	
			 }
			 
			 
			 
			   
			 
			 
			 
		//	 echo "<pre>";print_r($_POST);die;
					
			 
			 
					
			 
			  

				
		//$geodata = 	unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
		
	//	$geodata = json_decode(file_get_contents('http://ip-api.io/json/'.$_SERVER['REMOTE_ADDR']));	

		
	//	$geodata = json_decode(file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']));
		//$geodata = json_decode(file_get_contents('http://ip-api.io/json/'.$_SERVER['REMOTE_ADDR']));
 

 /* 
		if(!empty($request->input('location'))){
		$geo_city = $request->input('location');
		}else{
		$geo_city = $geodata->city;
		}
		$geo_latitude = $geodata->latitude;
		$geo_longitude = $geodata->longitude;
		$geo_countryCode = $geodata->country_code;		
		$geo_country = $geodata->country_name;
		$geo_ipaddress = $geodata->ip;
		$geo_callingCode = $geodata->callingCode;	
		 */
		
			/* $geodata = json_decode(file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']));
		 
		$geo_city = $geodata['geoplugin_city'];
		$geo_latitude = $geodata['geoplugin_latitude'];
		$geo_longitude = $geodata['geoplugin_longitude'];
		$geo_countryCode = $geodata['geoplugin_countryCode'];
		
		$geo_country = $geodata['geoplugin_countryName'];
		$geo_ipaddress = $geodata['geoplugin_request']; 
		$geo_callingCode = $geodata['geoplugin_request'];  */
		
		$geodata = json_decode(file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']));
		 
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
		
		$inquiry = New Inquiry;		 
		$inquiry->name= $request->input('name');
		$inquiry->email= $request->input('email');
		$inquiry->mobile= '+'.$request->input('code').'-'.ltrim($request->input('phone'), '0');			 	 
		$inquiry->course= $request->input('course');	
		 
		 
		$inquiry->form= $request->input('from');	
		$inquiry->geo_city= $geo_city;	
		$inquiry->geo_latitude= $geo_latitude;	
		$inquiry->geo_longitude= $geo_longitude;	
		$inquiry->geo_country= $geo_country;	
		$inquiry->geo_ipaddress= $geo_ipaddress;		 
		$inquiry->category="send_request_zone";	
		$inquiry->sub_category=$request->input('frm_title');	
		  //echo "<pre>";print_r($inquiry);die;
		if($inquiry->save())
		{
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		//	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			//	$headers .= 'From: enquiry@webcampus.com' . "\r\n";
			$headers .= 'From: webCampus <enquiry@webcampus.com>';
			//$to="webcampusleads@gmail.com";
			$to="brijesh.chauhan@webcampus.com";
	    	$subject="Student Enquiry - ".$request->input('name');
	    	
	    	  if($request->input('rz_form') ==='RCT'){
				  $coursehtml="";
			  }else{
				$coursehtml='<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Course:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('course').'</span><u></u><u></u></p>
			</td>
			</tr>';
			  }
	    		
	    		if($request->input('code')){
					$htmlmobile='<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Mobile:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">'.'+'.$request->input('code').'-'.ltrim($request->input('phone'), '0').'</span><u></u><u></u></p>
			</td>
			</tr>';
					
				}else{
					$htmlmobile='<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Mobile:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">'.ltrim($request->input('phone'), '0').'</span><u></u><u></u></p>
			</td>
			</tr>';
				}	
	    		
	    		
	    		
	    		
	    					  
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
			'.$htmlmobile.'
			'.$coursehtml.'
			
			 
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
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">From Lead:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('frm_title').'</span><u></u><u></u></p>
			</td>
			</tr>
			 ';
			//$to="webcampusleads@gmail.com";
			
			 
				  
			 
			 
			 
			  if($request->input('rz_form') ==='TF'){
			$message .='  
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Student Id:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('studentId').'</span><u></u><u></u></p>
			</td>
			</tr>
			 
			 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Trainer Name:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('trainer').'</span><u></u><u></u></p>
			</td>
			</tr>
			 
			
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Quality of the content consistent throughout the course?   Rating:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('rating').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">How would you rate your trainer’s expertise?  Rating:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('rating1').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">How would you rate your trainer’s delivery skills?  Rating:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('rating2').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Knowledge or skills have improved by taking the course?  Rating:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('rating3').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Rate your counsellor’s guidance during the course?  Rating:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('rating4').'</span><u></u><u></u></p>
			</td>
			</tr><tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">HR/Placement team helpful during/after the course? Rating:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('rating5').'</span><u></u><u></u></p>
			</td>
			</tr><tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">How would you rate your overall learning experience?  Rating:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('rating6').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Feedback Comments:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('feedback').'</span><u></u><u></u></p>
			</td>
			</tr>';
			
			$to="feedback@webcampus.com";
			  }else if($request->input('rz_form') ==='RCT'){
			
				$message .='<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Campany Name :</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('campany_name').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Technology Name:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('technology').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Remark:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('remark').'</span><u></u><u></u></p>
			</td>
			</tr>';
			$to="webcampusleads@gmail.com";
			
			  }else  if($request->input('rz_form') ==='SR'){			
		    	$message .=' <tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Candidate Name:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('candidate_name').'</span><u></u><u></u></p>
			</td>
			</tr>	<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Candidate Phone:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('candidate_phone').'</span><u></u><u></u></p>
			</td>
			</tr>			 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Remark:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('remark').'</span><u></u><u></u></p>
			</td>
			</tr>';
			$to="webcampusleads@gmail.com";
			  }else if($request->input('rz_form') ==='FC'){			
				$message .='	 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Remark:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('query').'</span><u></u><u></u></p>
			</td>
			</tr>';
			 
			$to="team@webcampus.com,webrequestzone@gmail.com";	
			  }else if($request->input('rz_form') ==='PQ'){			
				$message .='	 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Remark:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('query').'</span><u></u><u></u></p>
			</td>
			</tr>';
			  }else if($request->input('rz_form') ==='JPA'){			
				$message .='	 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Remark:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('remark').'</span><u></u><u></u></p>
			</td>
			</tr>';
			  }else if($request->input('rz_form') ==='NBE'){			
				$message .='	 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Batch :</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('batch').'</span><u></u><u></u></p>
			</td>
			</tr>';
			  }
				
			$to="brijesh.chauhan@webcampus.com";
			
			 $stdemail="";
			 $codemail="";
			 $coordinator="";
         //  echo "<pre>";print_r($request->file('fees_file')->getRealPath()); die;
          
		$to="brijesh.chauhan@webcampus.com";
		Mail::send('mails.send_lead_inquiry', ['msg'=>$message], function ($m) use ($message,$request,$subject,$stdemail,$codemail) {
		$m->from('enquiry@webcampus.com', $request->input('name'));
		if($request->file('choose_file')){

		$m->attach($request->file('choose_file')->getRealPath(), [
		'as' => $request->file('choose_file')->getClientOriginalName(), 
		'mime' => $request->file('choose_file')->getMimeType()
		]); 
		}
		$m->to('brijesh.chauhan@webcampus.com', "")->subject($subject)->cc('deepak.virmani@webcampus.com');				
		});   
				
			 
			//Mail::send($to,$subject,$message,$headers);
		//	mail($to,$subject,$message,$headers);
			
			
			if(!empty($request->input('email'))){
				
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// Additional headers
			//	$headers .= 'From: enquiry@webcampus.com' . "\r\n";
			$headers .= 'From: webCampus <info@webcampus.com>';
			$stdemail=$request->input('email');
	    	$std_message=$request->input('name');
			$subject_stud="Thanks for connecting with web Campus ".$request->input('course');	 
		//	$to="brijesh.chauhan@webcampus.com";
 		   
 		    Mail::send('mails.send_mail_student', ['name'=>$std_message], function ($m) use ($std_message,$request,$subject_stud,$stdemail) {
				$m->from('enquiry@webcampus.com', $request->input('name'));
				$m->to($stdemail, "")->subject($subject_stud);				
			});  
			
			//$message=view('site.submit_enquiry_mail_template');
			
			//echo "<pre>";print_r($message);die;
			//mail($to,$subject,$message,$headers);
			
			}
			
			
			return response()->json(['status'=>1,],200);
		}else{
			return response()->json(['status'=>0,],200);
			
			
		}
			  
		}
		
	}
  
  
  
  public function checkmobilefeedback(Request $request){
	  
	 // echo "<pre>";print_r($_POST);die;
		if(request()->ajax()){
			if($request->has('mobile')){
				$validator = Validator::make($request->all(), [
					'mobile'=>'required',
				]);
				if($validator->fails()){
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Please enter the registered mobile'
						]
					],200);
				}
				//$students = FeesStutdents::where('phone',$request->input('mobile'))->first();
				
			$students = DB::connection('mysql3')->table('wp_students_details as std');	 
			$students = $students->join('wp_courses_details as course','std.courses','=','course.id','left outer');
			$students = $students->join('wp_trainers_details as trainer','std.trainer','=','trainer.id','left outer');
			$students = $students->join('wp_batches_details as batch','std.stud_batch_id','=','batch.id','left outer');		
			$students=$students->select('std.*','course.*','batch.*','batch.batch_name as batchname','std.id as std_id','trainer.name as trainer_name'); 			
			$students=$students->where('phone','=',$request->input('mobile'));	
			$students=$students->get();	 	
		
		
			 
				if(!empty($students) && count($students)>0){
					
					$htmlcourse="";					
					foreach($students as $std){
					$htmlcourse .= '<option value="'.$std->std_id.'-'.$std->course.'">'.$std->course.'</option>';
					}
					 
			 
					return response()->json([
						'statusCode'=>1,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'
							<div class="feedback-details">
								<form action="" method="post"  onsubmit="return homeController.getstdfeedback(this)" autocomplete="off" autocomplete="off">
								<div class="form-row">
								<div class="all-from-request-zone-group2 col-md-12">
								<label>Select Technology</label>
								 
								<select class="form-control" name="technology">
								<option value="">Select Technology</option>
								'.$htmlcourse.'
								 
								</select>
								<span class="help-block"></span>
								</div>
								</div>
								<button class="all-from-request-button" type="submit">Next</button>
								</form>		
								</div>								
							',
							'message'=>'<span style="font-size:13px">Successfully: </span>'
						]
					],200);
				}else{
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Mobile No does not match for certificate'
						]
					],200);
				}
			}
			 
		}
	} 

   
   public function getstdfeedback(Request $request){
	  
	 //echo "<pre>";print_r($_POST);die;
		if(request()->ajax()){
			if($request->has('technology')){
				$validator = Validator::make($request->all(), [
					'technology'=>'required',
				]);
				if($validator->fails()){
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Please select the technology'
						]
					],200);
				}
				 
				
				
				$std_id_c= explode('-',$request->input('technology'));
				
			 
			$studID = $std_id_c[0];
			$studCourse = $std_id_c[1];
			
			
			
			$students = DB::connection('mysql3')->table('wp_students_details as std');	 
			$students = $students->join('wp_courses_details as course','std.courses','=','course.id','left outer');
			$students = $students->join('wp_trainers_details as trainer','std.trainer','=','trainer.id','left outer');
			$students = $students->join('wp_batches_details as batch','std.stud_batch_id','=','batch.id','left outer');		
			$students=$students->select('std.*','course.*','batch.*','batch.batch_name as batchname','std.id as std_id','std.stud_id as stud_id','trainer.name as trainer_name'); 			
			//$students=$students->where('phone','=',$request->input('mobile'));
			$students=$students->where('std.id','=',$studID);		 
			$students=$students->where('course.course','=',$studCourse);					
		 
			$students=$students->first();	 	
		
		
				 
				if(!empty($students) && count($students)>0){
					
					 
					 
			 
			 
					return response()->json([
						'statusCode'=>1,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'
								<div class="">
			<form action="" method="post" onsubmit="return homeController.saveTrainingFeedback(this)" autocomplete="off">
			<div class="form-row">
			<div class="all-from-request-zone-group col-md-6">
			<label>Student Name</label>
			<input type="text" class="form-control" name="name" value="'.$students->name.'" placeholder="Enter Student Name">
			<input type="hidden" name="frm_title" value="Training Feedback" >
			<input type="hidden" name="rz_form" value="TF">
			</div>
			<div class="all-from-request-zone-group col-md-6">
			<label>Student ID(As on fees Invoice)</label>
			<input type="text" class="form-control" name="studentId" value="'.$students->stud_id.'" placeholder="Enter Student ID">
			 
			</div>
			</div>
			<div class="form-row">
			<div class="all-from-request-zone-group col-md-6">
			<label>Mobile</label>
			<div class="valide-text">
			<div class="drop-number">

		 
			<input type="tel" name="phone"  class="form-control" maxlength="16"  value="'.$students->phone.'" onkeypress="return isNumericKeyCheck(event);" placeholder="Enter your mobile " >	
			</div>
			</div>

			</div>
			<div class="all-from-request-zone-group col-md-6">
			<label>Student E-mail</label>
			<input type="text" class="form-control" name="email" value="'.$students->email.'" placeholder="Enter Your Student Email Id">
			</div>
			</div>
			<div class="form-row">
			<div class="all-from-request-zone-group col-md-6">
			<label>Course</label>
			<input type="text" class="form-control" name="course" value="'.$students->course.'" placeholder="Enter Your Course">
			</div>
			<div class="all-from-request-zone-group col-md-6">
			<label>Trainer Name</label>
			<input type="text" class="form-control" name="trainer" value="'.$students->trainer_name.'" placeholder="Enter Your Trainer Name">
			</div>
			</div>
			<div class="form-row">
			<div class="all-from-request-zone-group provide-text">
			<label>Please provide your feedback on the following topics:</label>
			</div>
			</div>
			<!-- first-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>Quality of the content consistent throughout the course?</label>
			</div>
			<div class="myform-check-inline mybutton-filed col-md-6">

			<input class="form-check-input" type="radio" name="rating" value="1">
			<label class="form-check-label" for="training-check1">1</label>
			<input class="form-check-input" type="radio" name="rating"  value="2">
			<label class="form-check-label" for="training-check2">2</label>
			<input class="form-check-input" type="radio" name="rating"  value="3">
			<label class="form-check-label" for="training-check3">3</label>
			<input class="form-check-input" type="radio" name="rating"  value="4">
			<label class="form-check-label" for="training-check4">4</label>
			<input class="form-check-input" type="radio" name="rating" value="5">
			<label class="form-check-label" for="training-check5">5</label>
			</div>
			</div>
			<!-- first-radio-button End-->
			<!-- Second-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>How would you rate your trainer’s expertise?</label>
			</div>
			<div class="myform-check-inline mybutton-filed col-md-6">

			<input class="form-check-input" type="radio" name="rating1" value="1">
			<label class="form-check-label" >1</label>
			<input class="form-check-input" type="radio" name="rating1" value="2">
			<label class="form-check-label">2</label>
			<input class="form-check-input" type="radio" name="rating1" value="3">
			<label class="form-check-label">3</label>
			<input class="form-check-input" type="radio" name="rating1" value="4">
			<label class="form-check-label">4</label>
			<input class="form-check-input" type="radio" name="rating1" value="5">
			<label class="form-check-label">5</label>
			</div>
			</div>
			<!-- second-radio-button End-->
			<!-- third-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>How would you rate your trainer’s delivery skills?</label>
			</div>
			<div class="myform-check-inline mybutton-filed col-md-6">

			<input class="form-check-input" type="radio" name="rating2" value="1">
			<label class="form-check-label">1</label>
			<input class="form-check-input" type="radio" name="rating2" value="2">
			<label class="form-check-label">2</label>
			<input class="form-check-input" type="radio" name="rating2" value="3">
			<label class="form-check-label">3</label>
			<input class="form-check-input" type="radio" name="rating2" value="4">
			<label class="form-check-label">4</label>
			<input class="form-check-input" type="radio" name="rating2" value="5">
			<label class="form-check-label">5</label>
			</div>
			</div>
			<!-- third-radio-button End-->
			<!-- four-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>Knowledge or skills have improved by taking the course?</label>
			</div>
			<div class="myform-check-inline mybutton-filed col-md-6">

			<input class="form-check-input" type="radio" name="rating3" value="1">
			<label class="form-check-label">1</label>
			<input class="form-check-input" type="radio" name="rating3" value="2">
			<label class="form-check-label">2</label>
			<input class="form-check-input" type="radio" name="rating3" value="3">
			<label class="form-check-label">3</label>
			<input class="form-check-input" type="radio" name="rating3" value="4">
			<label class="form-check-label">4</label>
			<input class="form-check-input" type="radio" name="rating3" value="5">
			<label class="form-check-label">5</label>
			</div>
			</div>
			<!-- four-radio-button End-->
				<!-- five-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>Rate your counsellor’s guidance during the course?</label>
			</div>
			<div class="myform-check-inline mybutton-filed col-md-6">

			<input class="form-check-input" type="radio" name="rating4" value="1">
			<label class="form-check-label">1</label>
			<input class="form-check-input" type="radio" name="rating4" value="2">
			<label class="form-check-label">2</label>
			<input class="form-check-input" type="radio" name="rating4" value="3">
			<label class="form-check-label">3</label>
			<input class="form-check-input" type="radio" name="rating4" value="4">
			<label class="form-check-label">4</label>
			<input class="form-check-input" type="radio" name="rating4" value="5">
			<label class="form-check-label">5</label>
			</div>
			</div>
			<!-- five-radio-button End-->
				<!-- six-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>HR/Placement team helpful during/after the course?</label>
			</div>
			<div class="myform-check-inline mybutton-filed col-md-6">

			<input class="form-check-input" type="radio" name="rating5" value="1">
			<label class="form-check-label">1</label>
			<input class="form-check-input" type="radio" name="rating5" value="2">
			<label class="form-check-label">2</label>
			<input class="form-check-input" type="radio" name="rating5" value="3">
			<label class="form-check-label">3</label>
			<input class="form-check-input" type="radio" name="rating5" value="4">
			<label class="form-check-label">4</label>
			<input class="form-check-input" type="radio" name="rating5" value="5">
			<label class="form-check-label">5</label>
			</div>
			</div>
			<!-- six-radio-button End-->
			<!-- seven-radio-button -->
			<div class="form-row">
			<div class="all-from-request-zone-checkbox col-md-6">
			<label>How would you rate your overall learning experience?</label>
			</div>
			<div class="myform-check-inline mybutton-filed col-md-6">

			<input class="form-check-input" type="radio" name="rating6" value="1">
			<label class="form-check-label">1</label>
			<input class="form-check-input" type="radio" name="rating6" value="2">
			<label class="form-check-label">2</label>
			<input class="form-check-input" type="radio" name="rating6" value="3">
			<label class="form-check-label">3</label>
			<input class="form-check-input" type="radio" name="rating6" value="4">
			<label class="form-check-label">4</label>
			<input class="form-check-input" type="radio" name="rating6" value="5">
			<label class="form-check-label">5</label>
			</div>
			</div>
			<!-- seven-radio-button End-->
			<div class="all-from-request-zone-textarea">
			<label>If you have any other feedback please help us to improve our services</label>
			<textarea type="text" class="form-control all-from-request-textarea" name="feedback" placeholder="Tell us your feedback here"></textarea>
			</div>
			<input type="reset" class="resetData">		
			<button class="all-from-request-button" type="submit">Submit</button>
			</form>
			</div>
						  
							',
							'message'=>'<span style="font-size:13px">Successfully: </span>'
						]
					],200);
				}else{
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Course No does not match for Feedback'
						]
					],200);
				}
			}
			 
		}
	} 

    public function checkjobportal(Request $request){
	  
 
		if(request()->ajax()){
			if($request->has('mobile')){
				$validator = Validator::make($request->all(), [
					'mobile'=>'required',
				]);
				if($validator->fails()){
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Please enter the registered mobile'
						]
					],200);
				}
			 
				
			$students = DB::connection('mysql2')->table('students as std');	 
			$students = $students->join('ineed_profile_summary as course','std.student_id','=','course.profile_summary_seekerid','left outer');
			 	
			$students=$students->select('std.*','course.*','std.student_id as std_id'); 			
			$students=$students->where('std.std_mobile','=',$request->input('mobile'));	
			$students=$students->get();	 	
		
		
		 
				if(!empty($students) && count($students)>0){
					
					$htmlcourse="";					
					foreach($students as $std){
					$htmlcourse .= '<option value="'.$std->std_id.'-'.$std->profile_summary_keyskills.'">'.$std->profile_summary_keyskills.'</option>';
					}
				 
			 
					return response()->json([
						'statusCode'=>1,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'
							<div class="jobportal-details">
								<form action="" method="post"  onsubmit="return homeController.getstdjobportal(this)" autocomplete="off" autocomplete="off">
								<div class="form-row">
								<div class="all-from-request-zone-group2 col-md-12">
								<label>Select Technology</label>
								 
								<select class="form-control" name="technology">
								<option value="">Select Technology</option>
								'.$htmlcourse.'
								 
								</select>
								<span class="help-block"></span>
								</div>
								</div>
								<button class="all-from-request-button" type="submit">Next</button>
								</form>		
								</div>								
							',
							'message'=>'<span style="font-size:13px">Successfully: </span>'
						]
					],200);
				}else{
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Mobile No does not match for jobportal'
						]
					],200);
				}
			}
			 
		}
	} 

   
   public function getstdjobportal(Request $request){
	  
	 //echo "<pre>";print_r($_POST);die;
		if(request()->ajax()){
			if($request->has('technology')){
				$validator = Validator::make($request->all(), [
					'technology'=>'required',
				]);
				if($validator->fails()){
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Please select the technology'
						]
					],200);
				}
			 
				
				
				$std_id_c= explode('-',$request->input('technology'));
				
			 
			$studID = $std_id_c[0];
			$studCourse = $std_id_c[1];
			
			$students = DB::connection('mysql2')->table('students as std');	 
			$students = $students->join('ineed_profile_summary as course','std.student_id','=','course.profile_summary_seekerid','left outer');
			$students=$students->select('std.*','course.*','std.student_id as std_id'); 			
			$students=$students->where('std.student_id','=',$studID);	
			$students=$students->first();	 	
		
			
			  	
		
		
				//echo "<pre>";print_r($students);die;
				if(!empty($students) && count($students)>0){
					
					 
					 
			 
			 
					return response()->json([
						'statusCode'=>1,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'
								<div class="">
			<form action="" method="post" onsubmit="return homeController.getjobportaldetails(this)" autocomplete="off">
			<div class="form-row">
			<div class="all-from-request-zone-group col-md-6">
			<label>Student Name</label>
			<input type="text" class="form-control" name="name" value="'.$students->std_name.'" placeholder="Enter Student Name">
			<input type="hidden" name="frm_title" value="Job Portal Access" >
			<input type="hidden" name="rz_form" value="JPA">
			<input type="hidden" name="userid" value="'.$students->std_email.'">
			<input type="hidden" name="password" value="'.$students->pwd.'">
			</div>
			<div class="all-from-request-zone-group col-md-6">
			<label>Email</label>
			<input type="text" class="form-control" name="email" value="'.$students->std_email.'" placeholder="Enter Student ID">
			 
			</div>
			</div>
			<div class="form-row">
			<div class="all-from-request-zone-group col-md-6">
			<label>Mobile</label>
			<div class="valide-text">
			<div class="drop-number">

		 
			<input type="tel" name="phone"  class="form-control" maxlength="16"  value="'.$students->std_mobile.'" onkeypress="return isNumericKeyCheck(event);" placeholder="Enter your mobile " >	
			</div>
			</div>

			</div>
			<div class="all-from-request-zone-group col-md-6">
			<label>Course</label>
			<input type="text" class="form-control" name="course" value="'.$students->profile_summary_keyskills.'" placeholder="Enter Your Student Course">
			</div>
			</div>
			<div class="form-row">
			<div class="all-from-request-zone-group col-md-12">
			<label>Remark</label>
			<textarea type="text" class="form-control" name="remark" value="" placeholder="Enter Remark"></textarea>
			</div>
			 
			</div>
			 
			<input type="reset" class="resetData">		
			<button class="all-from-request-button" type="submit">Submit</button>
			</form>
			</div>
						  
							',
							'message'=>'<span style="font-size:13px">Successfully: </span>'
						]
					],200);
				}else{
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Course No does not match for jobportal'
						]
					],200);
				}
			}
			 
		}
	} 

    public function getjobportaldetails(Request $request){
	  
	 //echo "<pre>";print_r($_POST);die;
		if(request()->ajax()){
			 
				
				
				 
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',					
				'course' 	=> 'required',					
				'remark' 	=> 'required',					
				 			
				 				
				 
			]); 			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	
			
			
		 $inquiry = New Inquiry;		 
		$inquiry->name= $request->input('name');
		$inquiry->email= $request->input('email');
		$inquiry->mobile= $request->input('phone');			 	 
		$inquiry->course= $request->input('course');	
		 
		 
		$inquiry->form= $request->input('from');	
		 
		$inquiry->category="send_request_zone";	
		$inquiry->sub_category=$request->input('frm_title');	
		  //echo "<pre>";print_r($inquiry);die;
		 $inquiry->save();
	 
			
			
			
			$stdmessage="";
			
			
			$stdmessage .='	 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Name:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('name').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Jobportal URL:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			https://webcampus.com/jobportal/jobseeker/login</span><u></u><u></u></p>
			</td>
			</tr>
			
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">User ID:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('userid').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Password:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('password').'</span><u></u><u></u></p>
			</td>
			</tr>';
			
			
		 
				
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// Additional headers
			//	$headers .= 'From: enquiry@webcampus.com' . "\r\n";
			$headers .= 'From: webCampus jobportal <enquiry@webcampus.com>';
			$stdemail= $request->input('email');
	    	$name=$request->input('name');
			$subject_stud="Thanks for connecting with web Campus Jobportal ".$request->input('name');	 
		//	$stdemail="brijesh.chauhan@webcampus.com";
			$stdemail=trim($stdemail);
 		  // echo $stdemail;die;
 		    Mail::send('mails.send_mail_jobportal_password', ['msg'=>$stdmessage], function ($m) use ($stdmessage,$request,$subject_stud,$stdemail) {
				$m->from('enquiry@webcampus.com', $request->input('name'));
				$m->to($stdemail, "")->subject($subject_stud)->cc('deepak.virmani@webcampus.com');				
			});  
			
			 
		  
		
			 
				if(!empty($request->input('email')) ){
					
					 
					 
			 
			 
					return response()->json([
						'statusCode'=>1,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'
								<div class="">			 
			<div class="form-row">
			<div class="all-from-request-zone-group col-md-12">
			<strong>Student Name: </strong> '.$request->input('name').'				
			</div>
			<div class="all-from-request-zone-group col-md-12">
			<strong>User ID :</strong> '.$request->input('userid').'
			 
			</div>
			</div>
			<div class="form-row">
			<div class="all-from-request-zone-group col-md-12">
			<strong>Password : </strong> '.$request->input('password').'
			</div>
			<div class="all-from-request-zone-group col-md-6">
			<strong>Jobportal URL: </strong><br>
			https://webcampus.com/jobportal/jobseeker/login
			</div>
			</div>		 
			</div>',
							'message'=>'<span style="font-size:13px">Successfully: </span>'
						]
					],200);
				}else{
					return response()->json([
						'statusCode'=>0,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'',
							'message'=>'Course No does not match for Jobportal'
						]
					],200);
				}
			 
			 
		}
	} 

   
  
  
   
 
}
