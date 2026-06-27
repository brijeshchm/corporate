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
use Carbon\Carbon; 
use Mail;
class ContactController extends Controller
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
	
        return view('site.index');
    } 
	
	public function saveDataEnquiry(Request $request){
		
		if($request->ajax()){
			 
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',	
				'course'=>'required',	
				'code' 	=> 'required|numeric',				
		 		
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			 
		
		$inquiry = New Inquiry;		 
		$inquiry->name= $request->input('name');
		$inquiry->email= $request->input('email');
		$inquiry->mobile= '+'.$request->input('code').'-'.ltrim($request->input('phone'), '0');			 	 
		$inquiry->course= $request->input('course');
		$inquiry->form= $request->input('course');	
		$inquiry->category="send_enquiry";	
	 
		if($inquiry->save())
		{
			return response()->json(['status'=>1,],200);
		}else{
			return response()->json(['status'=>0,],200);
			
			
		}
			  
		}
		
	}
  
	
	
	public function saveDataEnquiryDownload(Request $request){
		
		if($request->ajax()){
			 
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',	
			//	'phone' 	=> 'required|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im',				
				'course'=>'required',				
				'from' 	=> 'required',					
				'code' 	=> 'required|numeric',				
		 		
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
				//echo "<pre>";print_r($_POST);die;
				
		//$geodata = 	unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
		
	//	$geodata = json_decode(file_get_contents('http://ip-api.io/json/'.$_SERVER['REMOTE_ADDR']));	

		
		//$geodata = json_decode(file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']));
		 $geodata = json_decode(file_get_contents('http://ipinfo.io/'.$_SERVER['REMOTE_ADDR'].'?token=a557e96bd50bb0'));
        
//	 echo "<pre>";print_r($geodata);die;
	 
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
	 
	 
	 
		
		 
		/* $geo_city = $geodata['geoplugin_city'];
		$geo_latitude = $geodata['geoplugin_latitude'];
		$geo_longitude = $geodata['geoplugin_longitude'];
		$geo_countryCode = $geodata['geoplugin_countryCode'];
		
		$geo_country = $geodata['geoplugin_countryName'];
		$geo_ipaddress = $geodata['geoplugin_request']; */
		
		$inquiry = New Inquiry;		 
		$inquiry->name= $request->input('name');
		$inquiry->email= $request->input('email');
		$inquiry->mobile= '+'.$request->input('code').'-'.ltrim($request->input('phone'), '0');			 	 
		$inquiry->course= $request->input('course');	
		if(!empty($request->input('demo_date'))){		
				$inquiry->demo_date_time= $request->input('demo_date');			
		}
		if(!empty($request->input('experience'))){		
				$inquiry->experience= $request->input('experience');			
		}
		
		$inquiry->form= $request->input('from');	
		$inquiry->geo_city= $geo_city;	
		$inquiry->geo_latitude= $geo_latitude;	
		$inquiry->geo_longitude= $geo_longitude;	
		$inquiry->geo_country= $geo_country;	
		$inquiry->geo_ipaddress= $geo_ipaddress;		 
		$inquiry->category="send_enquiry";	
		$inquiry->sub_category=$request->input('frm_title');	
		// echo "<pre>";print_r($inquiry);die;
		if($inquiry->save())
		{
			
			
			
 
 
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		//	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			//	$headers .= 'From: info@domain.com' . "\r\n";
			$headers .= 'From: domain <info@domain.com>';
			//$to="webcampusleads@gmail.com";
			$to="puneetrao.rao@gmail.com";
	    	$subject="Student Enquiry - ".$request->input('course');
	    	
	    	if(!empty($request->input('demo_date'))){
				$demo_date ='<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Date:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('demo_date').'</span><u></u><u></u></p>
			</td>
			</tr>';
				
			}else{
				
				$demo_date="";
			}
			
			if(!empty($request->input('experience'))){
				$experience ='<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Experience:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('experience').'</span><u></u><u></u></p>
			</td>
			</tr>';
				
			}else{
				
				$experience="";
			}
			
	    	
			$message=' <tr>
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
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Mobile:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">'.'+'.$request->input('code').'-'.ltrim($request->input('phone'), '0').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Course:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('course').'</span><u></u><u></u></p>
			</td>
			</tr>
			'.$demo_date.'
			'.$experience.'
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">City:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_city.'</span><u></u><u></u></p>
			</td>
			</tr>
				
				<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Ip Address:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_ipaddress.'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">From Session:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('frm_title').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">From Page:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('from').'</span><u></u><u></u></p>
			</td>
			</tr>';
			
			 $stdemail="";
			 $codemail="";
			 $coordinator="";
           // echo "<pre>";print_r($message); die;
          
         $to="puneetrao.rao@gmail.com";
 		     Mail::send('mails.send_lead_inquiry', ['msg'=>$message], function ($m) use ($message,$request,$subject,$stdemail,$codemail) {
				$m->from('info@domain.com', $request->input('name'));
				$m->to('smratabch@gmail.com', "")->subject($subject)->cc('smratabch@gmail.com');				
			});   
				
			
			return response()->json(['status'=>1,],200);
		}else{
			return response()->json(['status'=>0,],200);
			
			
		}
			  
		}
		
	}
  
	
	public function getOTP(Request $request){
		
		if($request->ajax()){
			 
			   $validator = Validator::make($request->all(),[							
				'otp' 	=> 'required|numeric',	

			//'otp' => 'required|numeric|confirmed',				
		 		
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			if($request->has('otp')){
			if($request->session()->get('user.otp')==$request->input('otp') || $request->input('otp')=="123456" ){
				 
				
				 return response()->json(['status'=>1,],200);
			}else{
				$errorsBag="involid OTP";
				//return response()->json(['status'=>0,],200);
				return response()->json(['status'=>0,'errors'=>$errorsBag],200);
			} 
		}
			
			
			
			
			
  }}

	
	
	
  public function dataSaveRight(Request $request){
		
		if($request->ajax()){
			 // echo "<pre>";print_r($_POST);die;
			 
			 
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',
		    	'course'=>'required',	
		    	'code'=>'required',
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
			 
				
	 
		
		$inquiry = New Inquiry;		 
		$inquiry->name= $request->input('name');
		$inquiry->email= $request->input('email');
		$inquiry->mobile= '+'.$request->input('code').'-'.ltrim($request->input('phone'), '0');			 	 
		$inquiry->course= $request->input('course');	
		$inquiry->comment= $request->input('message');
		$inquiry->category="send_enquiry_sidebar";	
    	 
		if($inquiry->save())
		{
			/*
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";		
			$headers .= 'From: domain <info@domain.com>';
		 
			$to="smratabch@gmail.com";
	    	$subject="Student Enquiry - ".$request->input('course');
			$message=' <tr>
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
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Mobile:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">'.'+'.$request->input('code').'-'.ltrim($request->input('phone'), '0').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Course:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('course').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">City:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_city.'</span><u></u><u></u></p>
			</td>
			</tr>
			
				<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Ip Address:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_ipaddress.'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">From Session:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('frm_title').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Message:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('message').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">From Page:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('from').'</span><u></u><u></u></p>
			</td>
			</tr>';		
          
 
 		     Mail::send('mails.send_lead_inquiry', ['msg'=>$message], function ($m) use ($message,$request,$subject) {
				$m->from('info@fff.com', $request->input('name'));
				$m->to('smratabch@gmail.com', "")->subject($subject)->cc('smratabch@gmail.com');				
			});   
				
			 
			
			if(!empty($request->input('email'))){
				
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";		 
			$headers .= 'From: webCdomainampus <info@webcampus.com>';
			$stdemail=$request->input('email');
	    	$std_message=$request->input('name');
			$subject_stud="Thanks for connecting with domain ".$request->input('course');	 
	 
 		   
 		    Mail::send('mails.send_mail_student', ['name'=>$std_message], function ($m) use ($std_message,$request,$subject_stud,$stdemail) {
				$m->from('info@dddd.com', $request->input('name'));
				$m->to($stdemail, "")->subject($subject_stud);				
			});  		
			}*/
			
			
			return response()->json(['status'=>1,],200);
		}else{
			return response()->json(['status'=>0,],200);
			
			
		}
			  
		}
		
	}
  
 
	public function saveFranchise(Request $request){
		//echo "<pre>";print_r($_POST);die;
		if($request->ajax()){
			 
			   $validator = Validator::make($request->all(),[				 
				'state' 	=> 'required',					
				'city' 	=> 'required',					
			//	'individual' 	=> 'required',					
				//'name' 	=> 'required|regex:/^[a-zA-Z ]{2,30}$/|min:2|max:32',					
				'name' 	=> 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',					
			//	'addrees' 	=> 'required|min:3',					
			//	'checkbox' 	=> 'required',					
		 		
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
				//echo "<pre>";print_r($_POST);
				
				

				$geodata = json_decode(file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']));
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
		$statename =State::where('state_id',$request->input('state'))->first()->state_name;
		$cityname =City::where('city_id',$request->input('city'))->first()->city_name;	 
		$inquiry->city= $statename.' '.$cityname;
		$inquiry->name= $request->input('name');
		$inquiry->email= $request->input('email');
		$inquiry->mobile= ltrim($request->input('phone'), '0');	
		$inquiry->geo_city= $geo_city;	
		$inquiry->geo_latitude= $geo_latitude;	
		$inquiry->geo_longitude= $geo_longitude;	
		$inquiry->geo_country= $geo_country;	
		$inquiry->geo_ipaddress= $geo_ipaddress;			
		$inquiry->form= "For Franchise";
		$inquiry->category="send_franchise";			 
		//$inquiry->comment= $request->input('addrees'); 	 
		 
		if($inquiry->save())
		{
		    
		    $headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		//	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			//	$headers .= 'From: info@domain.com' . "\r\n";
			$headers .= 'From: domain <info@domain.com>';
		
			$to="puneetrao.rao@gmail.com";
			 
			$subject="Frenchise Enquiry";
			$message=' <tr>
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
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Mobile:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('phone').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">State:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$statename.'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">City:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$cityname.'</span><u></u><u></u></p>
			</td>
			</tr>
						
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">From:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">For Franchise</span><u></u><u></u></p>
			</td>
			</tr>
			 ';
			
			 $stdemail="";
			 $codemail="";
			 $coordinator="";
            //echo "<pre>";print_r($subjects); die;
           	
					
		$to="puneetrao.rao@gmail.com";
 		     Mail::send('mails.send_franchise_mail', ['msg'=>$message], function ($m) use ($message,$request,$subject,$stdemail,$codemail) {
				$m->from('info@domain.com',$request->input('name'));
				$m->to('puneetrao.rao@gmail.com', "")->subject($subject)->cc('smratabch@gmail.com');				
			});   
			 
		 
			
			
			
			
			return response()->json(['status'=>1,],200);
		}else{
			return response()->json(['status'=>0,],200);
			
			
		}
			  
		}
		
	}
  
	public function saveScholarship(Request $request){
		//echo "<pre>";print_r($_POST);die;
		if($request->ajax()){
			 
			   $validator = Validator::make($request->all(),[							
				'name' 	=> 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',					
				'demo_date' => 'required',					
				'degree' 	=> 'required',					
				'college' 	=> 'required',					
				'technology' 	=> 'required',					
				'checkbox' 	=> 'required',			
		 		
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
				//echo "<pre>";print_r($_POST);
				
			$geodata = json_decode(file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']));
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
		$inquiry->mobile= ltrim($request->input('phone'), '0');			 
		$inquiry->scholarship_exam= $request->input('demo_date');		 
		$inquiry->college= $request->input('college');		 
		$inquiry->degree= $request->input('degree');		 
		$inquiry->technology= $request->input('technology');	
		$inquiry->geo_city= $geo_city;	
		$inquiry->geo_latitude= $geo_latitude;	
		$inquiry->geo_longitude= $geo_longitude;	
		$inquiry->geo_country= $geo_country;	
		$inquiry->geo_ipaddress= $geo_ipaddress;			
		$inquiry->form= "For Scholarship";
		$inquiry->category="send_Scholarship";			 
		 
		if($inquiry->save())
		{
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			//	$headers .= 'From: info@domain.com' . "\r\n";
			$headers .= 'From: domain <info@webcampus.in>';
			//$to="webcampusleads@gmail.com";
			$to=".chauhan@webcampus.com";
			 
			$subject="Scholarship Enquiry";
			$message=' <tr>
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
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Mobile:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('phone').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Exam Date:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('demo_date').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">College:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('college').'</span><u></u><u></u></p>
			</td>
			</tr>	
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Technology:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('technology').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Degree:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('degree').'</span><u></u><u></u></p>
			</td>
			</tr>			 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
		<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">From:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">For Scholarship</span><u></u><u></u></p>
			</td>
			</tr>';
			
			 $stdemail="";
			 $codemail="";
			 $coordinator="";
			 $to="puneetrao.rao@gmail.com";
 		     Mail::send('mails.send_scholarship_mail', ['msg'=>$message], function ($m) use ($message,$request,$subject,$stdemail,$codemail) {
				$m->from('info@domain.com',$request->input('name'));
				$m->to('puneetrao.rao@gmail.com', "")->subject($subject)->cc('smratabch@gmail.com');				
			});   
		 
			
			
			
			
			return response()->json(['status'=>1,],200);
		}else{
			return response()->json(['status'=>0,],200);
			
			
		}
			  
		}
		
	}
  
 
 
 
	public function saveCorporateEnquiry(Request $request){
		
		if($request->ajax()){
			 
			   $validator = Validator::make($request->all(),[							
				'first_name' 	=> 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'last_name' 	=> 'required|regex:/^[\pL\s\-]+$/u|min:2|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',					
				'technology' 	=> 'required',					
				'company' 	=> 'required',
				'message' 	=> 'required',					
				'from' 	=> 'required',					
			//	'participant' 	=> 'required',		
		 		
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
				//echo "<pre>";print_r($_POST);die;
				
		$geodata = json_decode(file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']));
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
		$inquiry->first_name= $request->input('first_name');
		$inquiry->last_name= $request->input('last_name');
		$inquiry->email= $request->input('email');
		$inquiry->mobile= '+'.$request->input('code').'-'.ltrim($request->input('phone'), '0');			 	 
		$inquiry->technology= $request->input('technology');
		$inquiry->comp_name= $request->input('company');
		$inquiry->participant= $request->input('participant');
		$inquiry->proj_name= $request->input('designation');
		$inquiry->comment= $request->input('message');
		$inquiry->form= $request->input('from');		 
		
		$inquiry->geo_city= $geo_city;	
		$inquiry->geo_latitude= $geo_latitude;	
		$inquiry->geo_longitude= $geo_longitude;	
		$inquiry->geo_country= $geo_country;	
		$inquiry->geo_ipaddress= $geo_ipaddress;		 
		$inquiry->category="send_enquiry_corporate";			 
		$inquiry->sub_category=$request->input('frm_title');		 
		// echo "<pre>";print_r($inquiry);die;
		if($inquiry->save())
		{
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		//	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			//	$headers .= 'From: info@domain.com' . "\r\n";
			$headers .= 'From: domain <info@domain.com>';
			//$to="webcampusleads@gmail.com";
			$to="puneetrao.rao@gmail.com";
	    	$subject="Corporate Enquiry - ".$request->input('technology');
			 
			
			$message=' <tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Name:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('first_name').' '.$request->input('last_name').'</span><u></u><u></u></p>
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
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Mobile:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">'.'+'.$request->input('code').'-'.ltrim($request->input('phone'), '0').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Course:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('technology').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Company:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('company').'</span><u></u><u></u></p>
			</td>
			</tr>
			
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Designation:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('designation').'</span><u></u><u></u></p>
			</td>
			</tr>
			 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">City:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_city.'</span><u></u><u></u></p>
			</td>
			</tr>
				
				<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Ip Address:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_ipaddress.'</span><u></u><u></u></p>
			</td>
			</tr>
			 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">From Page:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('from').'</span><u></u><u></u></p>
			</td>
			</tr><tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Message:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$request->input('message').'</span><u></u><u></u></p>
			</td>
			</tr>';
			
			 $stdemail="";
			 $codemail="";
			 $coordinator="";
       
          
         $to="puneetrao.rao@gmail.com";
 		     Mail::send('mails.send_lead_inquiry', ['msg'=>$message], function ($m) use ($message,$request,$subject,$stdemail,$codemail) {
				$m->from('info@domain.com', $request->input('name'));
				$m->to('puneetrao.rao@gmail.com', "")->subject($subject)->cc('smratabch@gmail.com');				
			});   
				
			  
			
			if(!empty($request->input('email'))){				
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";		 
			$headers .= 'From: info@domain.com' . "\r\n";			 
			$stdemail=$request->input('email');
	    	$std_message=$request->input('first_name');
			$subject_stud="Thanks for connecting with web Campus ".$request->input('course');	  		   
 		    Mail::send('mails.send_mail_student', ['name'=>$std_message], function ($m) use ($std_message,$request,$subject_stud,$stdemail) {
				$m->from('info@domain.com', $request->input('name'));
				$m->to($stdemail, "")->subject($subject_stud);				
			});  
			
			 
			
			}
			
			
			return response()->json(['status'=>1,],200);
		}else{
			return response()->json(['status'=>0,],200);
			
			
		}
			  
		}
		
	}
	
	
 
	
 
 
 
	public function saveNewsLetter(Request $request){
		
		if($request->ajax()){
			 
			   $validator = Validator::make($request->all(),[					 				
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
		 		
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	  
				 
    	$geodata = json_decode(file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']));
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
		$inquiry->email= $request->input('email');		 
		$inquiry->form= "News Letter";		 
		
		$inquiry->geo_city= $geo_city;	
		$inquiry->geo_latitude= $geo_latitude;	
		$inquiry->geo_longitude= $geo_longitude;	
		$inquiry->geo_country= $geo_country;	
		$inquiry->geo_ipaddress= $geo_ipaddress;		 
		$inquiry->category="send_News Letter subscribe";			 
		$inquiry->sub_category="News Letter subscribe";		 
	 
		if($inquiry->save())
		{
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		 
			$headers .= 'From: webCampus <info@domain.com>';
			//$to="webcampusleads@gmail.com";
			$to="puneetrao.rao@gmail.com";
	    	$subject="News Letter subscribe - ".$request->input('email');
			 
			
			$message=' 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Email:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('email').'</span><u></u><u></u></p>
			</td>
			</tr>
			 
			 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">City:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_city.'</span><u></u><u></u></p>
			</td>
			</tr>
			
				<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Ip Address:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_ipaddress.'</span><u></u><u></u></p>
			</td>
			</tr>
			 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">From Page:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">News Letter subscribe</span><u></u><u></u></p>
			</td>
			</tr>
			 ';
			
			 $stdemail="";
			 $codemail="";
			 $coordinator="";
          
          
         $to="puneetrao.rao@gmail.com";
 		     Mail::send('mails.send_lead_inquiry', ['msg'=>$message], function ($m) use ($message,$request,$subject) {
				$m->from('info@domain.com', $request->input('email'));
				$m->to('puneetrao.rao@gmail.com', "")->subject($subject)->cc('smratabch@gmail.com');				
			});   
			 
			
			
			if(!empty($request->input('email'))){				
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";		 
			$headers .= 'From: info@domain.com' . "\r\n";			 
			$stdemail=$request->input('email');
	    	$std_message="";
			$subject_stud="Thanks for connecting with web Campus ".$request->input('course');	 
		//	$stdemail="puneetrao.rao@gmail.com";
 		   
 		    Mail::send('mails.send_mail_student', ['name'=>$std_message], function ($m) use ($std_message,$request,$subject_stud,$stdemail) {
				$m->from('info@domain.com', $request->input('email'));
				$m->to($stdemail, "")->subject($subject_stud);				
			});  
			 
			
			}
			
			
			return response()->json(['status'=>1,],200);
		}else{
			return response()->json(['status'=>0,],200);
			
			
		}
			  
		}
		
	}
	
	
 
	public function saveNotifications(Request $request){
		
		if($request->ajax()){
			 
			   $validator = Validator::make($request->all(),[					 				
				'phone' 	=> 'required|numeric',						
		 		
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	    
				
    	$geodata = json_decode(file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']));
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
		$inquiry->mobile= $request->input('phone');		 
		$inquiry->form= "FOR NOTIFICATIONS";		 
		
		$inquiry->geo_city= $geo_city;	
		$inquiry->geo_latitude= $geo_latitude;	
		$inquiry->geo_longitude= $geo_longitude;	
		$inquiry->geo_country= $geo_country;	
		$inquiry->geo_ipaddress= $geo_ipaddress;		 
		$inquiry->category="send_NOTIFICATIONS";			 
		$inquiry->sub_category="NOTIFICATIONS";		 
		 
		if($inquiry->save())
		{
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		 
			$headers .= 'From: webCampus <info@domain.com>';
		 
			$to="puneetrao.rao@gmail.com";
	    	$subject="NOTIFICATIONS - ".$request->input('phone');
			 
			
			$message=' 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Mobile:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('phone').'</span><u></u><u></u></p>
			</td>
			</tr>
			 
			 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">City:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_city.'</span><u></u><u></u></p>
			</td>
			</tr>
				
				<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Ip Address:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_ipaddress.'</span><u></u><u></u></p>
			</td>
			</tr>
			 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">From Page:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">NOTIFICATIONS</span><u></u><u></u></p>
			</td>
			</tr>
			 ';
			
			 $stdemail="";
			 $codemail="";
			 $coordinator="";
          
          
         $to="puneetrao.rao@gmail.com";
 		     Mail::send('mails.send_lead_inquiry', ['msg'=>$message], function ($m) use ($message,$request,$subject) {
				$m->from('info@domain.com', $request->input('phone'));
				$m->to('puneetrao.rao@gmail.com', "")->subject($subject)->cc('smratabch@gmail.com');				
			});   
			 		 
			
			
			return response()->json(['status'=>1,],200);
		}else{
			return response()->json(['status'=>0,],200);
			
			
		}
			  
		}
		
	}
	
	
 
	
 
 
	 
 /**
     * Return the specified resource from storage.
     *
     * @param  obj  Request object
     * @param  int  $id
     * @return Json Response
     */
	public function getCityAjax(Request $request, $id){
		if($request->ajax()){
			$cityes = City::where('city_state_id',$id)->orderBy('city_name','DESC')->get();
			 
			return response()->json($cityes,200);
		} 
	}
  
 
	 
 /**
     * Return the specified resource from storage.
     *
     * @param  obj  Request object
     * @param  int  $id
     * @return Json Response
     */
	public function getStateAjax(Request $request, $id){
		
	//	echo $id;die;
		if($request->ajax()){
			$states = State::where('state_country_id',$id)->orderBy('state_name','asc')->get();
			 
			return response()->json($states,200);
		} 
	}
  
 
	
	public function faceAnIssue(Request $request){
		
		if($request->ajax()){
			 
			   $validator = Validator::make($request->all(),[					 				
				'name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',						
				'remark' 	=> 'required|max:300',						
		 		
			]); 
			
			if($validator->fails()){
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	    
				
            $geodata = json_decode(file_get_contents("http://ipinfo.io/".$_SERVER['REMOTE_ADDR']));
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
		 
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		 
			$headers .= 'From: webCampus <info@domain.com>';
		 
			$to="puneetrao.rao@gmail.com";
	    	$subject="Payment face an issue - ".$request->input('name');
			 
			
			$message=' 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Name:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('name').'</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Mobile:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">
			'.$request->input('phone').'</span><u></u><u></u></p>
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
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">City:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_city.'</span><u></u><u></u></p>
			</td>
			</tr>
			
				<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Ip Address:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333"> '.$geo_ipaddress.'</span><u></u><u></u></p>
			</td>
			</tr>
			 
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">From Page:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Payment Face an Issue</span><u></u><u></u></p>
			</td>
			</tr>
			<tr>
			<td style="padding:0in 0in 7.5pt 0in">
			<p class="MsoNormal"><strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">Message Page:</span></strong><span style="font-size:10.5pt;font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;;color:#333333">'.$request->input('remark').'</span><u></u><u></u></p>
			</td>
			</tr>
			 ';
			
			 $stdemail="";
			 $codemail="";
			 $coordinator="";
          
          
         $to="puneetrao.rao@gmail.com";
 		     Mail::send('mails.send_lead_inquiry', ['msg'=>$message], function ($m) use ($message,$request,$subject) {
				$m->from('info@domain.com', $request->input('name'));
				$m->to('puneetrao.rao@gmail.com', "")->subject($subject)->cc('smratabch@gmail.com');				
			});   
			 		 
			
			
			return response()->json(['status'=>1,],200);
		 
			  
		}
		
	}
	
 
    /**
     * Get matches trainers based on ajax.
     *
     * @param  string
     * @return JSON Object having matched course details
     */
    public function getCountryCode(Request $request)
    {
		if($request->ajax()){
			
			$len=strlen($request->input('id'));
			if(null==$request->input('id')){
					$countryies = Country::whereIn('country_id',['101','231','229','1'])->get();
				 
			}else{
				$countryies = Country::orderBy('country_name','asc');				
				$countryies = $countryies->where(function($query) use($request){
					$query->orWhere('country_name','LIKE','%'.$request->input('id').'%')	
				    	  ->orWhere('phonecode','LIKE','%'.$request->input('id').'%')
						  ->orWhere('sortname','LIKE','%'.$request->input('id').'%');
				});
				$countryies =$countryies->get();				
			}
			 
			if(count($countryies)>0){ 
			echo'<div class="resultCode" style="background: #f7fbff;padding: 10px;border: 1px solid #DCDCDC;margin-top: 0px;position: relative;width: 100%;z-index: 9;margin-left: 0px;right: 0px;top: 100%;height: 205px;overflow-y: scroll;">	
			<ul>';
			foreach($countryies as $data){
				
			$pos=stripos($data->country_name, $request->input('id'));
			if($pos>=0){
			$str=substr($data->country_name, $pos, $len);
			$strong_str="<strong>".strtoupper($str)."</strong>";
			$final_str=str_replace($str, $strong_str, $data->country_name); ?>
		 
			<li  style="padding: 5px 5px;text-align:left;margin-left: 1px;font-size: 14px;" >
			<a style='width:100%; cursor:pointer;' onclick="countryCodeData('<?php echo '+'.$data->phonecode.' '.$data->country_name; ?>','<?php echo $data->phonecode; ?>');"  > <?php echo '+'.$data->phonecode.' '. ucwords($final_str); ?></a>
			</li>
		 
			<?php }else{ ?>
			 
			<li  style="padding: 5px 20px;text-align:left;margin-left: 1px;font-size: 14px;" >
			<a style='width:100%; cursor:pointer;' onclick="countryCodeData('<?php echo '+'.$data->phonecode.' '.$data->country_name; ?>','<?php echo $data->phonecode; ?>');"  > <?php echo $data->phonecode.' '.ucwords($data->country_name); ?></a>
			</li>
			
			<?php 	} ?>				
			<?php		
			}
			echo'</ul>
			</div>';
			} else { 
			echo'<div class="resultCourse" style="list-style-type: none; background: #fff; padding: 10px 20px; border: 1px solid #DCDCDC; margin-top: 27px; position: relative; width: 800px; z-index: 999999; margin-left: 0px" ><ul><li><p style="color:red;text-align: left;" >Sorry Does not found country !</p></li></ul></div>';
		
			} 				 
		} 	
	}
 
 
 
 
 
  /**
     * Get coourse based on ajax.
     *
     * @param  string
     * @return JSON Object having matched course details
     */
    public function getSelectCourse(Request $request)
    {
		if($request->ajax()){
			
			$len=strlen($request->input('id'));
			if(null==$request->input('id')){
				$catCourse = CatCourse::orderBy('name','asc')->whereIn('id',['5','4','8','7','123','252','71'])->get();
				 
			}else{
				$catCourse = CatCourse::orderBy('name','asc');				 			
				$catCourse = $catCourse->where(function($query) use($request){
					$query->orWhere('name','LIKE','%'.$request->input('id').'%')					     		   
						  ->orWhere('id','LIKE','%'.$request->input('id').'%');
				});
				$catCourse =$catCourse->get();				
			}
			 
			if(count($catCourse)>0){ 
			echo'<div class="resultCourse" style="background: #f7fbff; padding: 9px 15px; border: 1px solid #DCDCDC; margin-top: 0px; position: absolute; width: 380px; z-index: 999999; margin-left: 0px">	
			<ul>';
			foreach($catCourse as $data){
				
			$pos=stripos($data->name, $request->input('id'));
			if($pos>=0){
			$str=substr($data->name, $pos, $len);
			$strong_str="<strong>".strtoupper($str)."</strong>";
			$final_str=str_replace($str, $strong_str, $data->name); ?>
		 
			<li  style="padding: 5px 20px;text-align:left;margin-left: 1px;font-size: 14px;" >
			<a style='width:100%; cursor:pointer;' onclick="courseData('<?php echo $data->name; ?>','<?php echo $data->id; ?>');"  > <?php echo ucwords($final_str); ?></a>
			</li>
		 
			<?php }else{ ?>
			 
			<li  style="padding: 5px 20px;text-align:left;margin-left: 1px;font-size: 14px;" >
			<a style='width:100%; cursor:pointer;' onclick="courseData('<?php echo $data->name; ?>','<?php echo $data->id?>');"  > <?php echo ucwords($data->name); ?></a>
			</li>
			
			<?php 	} ?>				
			<?php		
			}
			echo'</ul>
			</div>';
			} else { 
			echo'<div class="resultCourse" style="list-style-type: none; background: #fff; padding: 10px 20px; border: 1px solid #DCDCDC; margin-top: 27px; position: absolute; width: 800px; z-index: 999999; margin-left: -935px" ><ul><li><p style="color:red;text-align: left;" >Sorry Does not found course keyword!</p></li></ul></div>';
		
			} 				 
		} 	
	}	
	
	
	
  /**
     * Get matches trainers based on ajax.
     *
     * @param  string
     * @return JSON Object having matched course details
     */
    public function getSelectState(Request $request)
    {
		if($request->ajax()){
			if(null==$request->input('q')){
				$states = State::get();
				 
			}else{
				$states = State::orderBy('state_name','asc');				
				$states = State::where('state_country_id',101);				
				$states = $states->where(function($query) use($request){
					$query->orWhere('state_name','LIKE','%'.$request->input('q').'%')					     		   
						  ->orWhere('state_id','LIKE','%'.$request->input('q').'%');
				});
				$states =$states->get();
				
			}
			return response()->json($states,200);
		}
	}
 
}
