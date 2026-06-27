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
use App\PaymentMode;
use Mail;
class paymentGatwayController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
       //webcampus.academy@gmail.com
        //Academy@2021
		
		 define('RAZOR_KEY_ID', 'rzp_live_2eCxK722pIgA5s');
		define('RAZOR_KEY_SECRET', '25PQQRsqBywYmIAtzUA9PBDC');
		
		//webcampus.primologic@gmail.com
//define('RAZOR_KEY_ID', 'rzp_live_bPohsY1p07pMEy'); // 15_10_20
//define('RAZOR_KEY_SECRET', 'hfi6uZYMtmCR1EFXGX1G1vlH'); // 15_10_20
	   
    }

	public function validation_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	
	public function dataEncodeJsonBase64($o){
	$o = json_encode($o);
	$o = base64_encode($o);
	return $o;
	}
function dataDecodeJsonBase64($o){
	$o = base64_decode($o);
	$o = json_decode($o); 
	 
	return $o;
}
	public function feesdeposit(Request $request){
		///echo "<pre>";print_r($this->dataDecodeJsonBase64($_GET['o']));
		
		
	if(isset($_GET['status'],$_GET['o'])&& !empty($_GET['o'])){
	$o = base64_decode ( $_GET['o'], $strict=false );
	$data = json_decode($o);
	$status = $_GET['status'];
	}else{
		$data=array();
	}
		return view('site.fees-deposit');
		
	}
	
 /**
     * Return the specified resource from storage.
     *
     * @param  obj  Request object
     * @param  int  $id
     * @return Json Response
     */
	public function saveProcessing(Request $request){	
	
		
	 
			if($request->isMethod('post') && $request->input('checkout')=="CheckOut")
			{
		 
			   $this->validate($request, [
				'name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				 		
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
			//	'pincode' 	=> 'required|numeric',					
				'phone' 	=> 'required|numeric',					
				'amount' 	=> 'required|numeric',					
				'course' 	=> 'required|string|min:3|max:32',	
				'country' 	=> 'required|numeric',	
				'state' 	=> 'required|numeric',	
				'city' 	=> 'required',	
			//	'address' 	=> 'required',	
					 					
					]);  
				
				
		 

			$data['name'] = $this->validation_input($request->input('name'));
			$data['email'] = $this->validation_input($request->input('email'));
			$data['course'] = $this->validation_input($request->input('course'));
		//	$data['pincode'] = $this->validation_input($request->input('pincode'));
			$data['amt'] = $this->validation_input($request->input('amount'));
			$data['phone'] = $this->validation_input($request->input('phone'));
		//	$data['add'] = $this->validation_input($request->input('address'));
		
		//	$cityname =City::where('city_id',$request->input('city'))->first()->city_name;
			$statename =State::where('state_id',$request->input('state'))->first()->state_name;
			$countryname =Country::where('country_id',$request->input('country'))->first()->country_name;
			
		    $data['city'] = $this->validation_input($request->input('city'));
			$data['state'] = $this->validation_input($statename);
			$data['country'] = $this->validation_input($countryname);	
			
			$d= time();
			$traisaction= "CC_".rand(10, 99).'_'.$d;
	 if(!empty($data)){
		 
			$s=1;	
							
	}
	
	if($s==1){
		$inv = $this->dataEncodeJsonBase64($data);
		$inv = "&inv=".$inv;		
		$o =$this->dataEncodeJsonBase64($data);
	 
		return redirect('/fees-checkout?status=incompete&o='.$o.$inv);
		exit;	
				 
			}
			 
		 
			return view('site.fees-deposit');
	}
	}
	
 
	
	
 /**
     * Return the specified resource from storage.
     *
     * @param  obj  Request object
     * @param  int  $id
     * @return Json Response
     */
	public function checkOut(Request $request){
		
		//echo "<pre>";print_r($_GET);die;
		
		//echo "<pre>";print_r($_GET);die;
		$data =$this->dataDecodeJsonBase64($_GET['o']);
		//echo "<pre>";print_r($data);die;
		return view('site.fees-checkout',['data'=>$data]);
		/* 
		
			if($request->ajax()){
				/* 
				 $this->validate($request, [
					'first_name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'last_name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',					
				'amount' 	=> 'required|numeric',					
				'course' 	=> 'required|string|min:3|max:32',	
				'country' 	=> 'required|numeric',	
				'state' 	=> 'required|numeric',	
				'city' 	=> 'required|numeric',	
				'address' 	=> 'required',	
					 					
					]); 
				 
			$validator = Validator::make($request->all(),[					 				
			 					
				'first_name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'last_name' 	=> 'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:32',					
				'email' 	=> 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',					
				'phone' 	=> 'required|numeric',					
				'amount' 	=> 'required|numeric',					
				'course' 	=> 'required|string|min:3|max:32',	
				'country' 	=> 'required|numeric',	
				'state' 	=> 'required|numeric',	
				'city' 	=> 'required|numeric',	
				'address' 	=> 'required',	
				//'remember' 	=> 'required',	
			]); 

			if($validator->fails()){
			$errorsBag = $validator->getMessageBag()->toArray();
			return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			
			 
			
			
			
			
			
			}else{

			

			$data['name'] = $this->validation_input($request->input('first_name')).' '.$this->validation_input($request->input('last_name'));
			$data['email'] = $this->validation_input($request->input('email'));
			$data['course'] = $this->validation_input($request->input('course'));
			$data['amt'] = $this->validation_input($request->input('amount'));
			$data['phone'] = $this->validation_input($request->input('phone'));
			$data['add'] = $this->validation_input($request->input('address'));
			$data['city'] = $this->validation_input($request->input('city'));
			$data['state'] = $this->validation_input($request->input('state'));
			$data['country'] = $this->validation_input($request->input('country'));	
			
			$d= time();
					  $traisaction= "CC_".rand(10, 99).'_'.$d;
	 
			 
			 if(!empty($data)){
		echo "<pre>";print_r($data);echo "dd";die;
				 
				 return redirect('/fees-checkout',['data'=>$data]);
				
			}
			return response()->json([
						'statusCode'=>2,
						'data'=>[
							'responseCode'=>200,
							'payload'=>'						
<form name="razorpay_frm_payment" class="razorpay-frm-payment" id="razorpay-frm-payment" method="post">
<input type="hidden" name="tid" id="tid" readonly />
<input type="hidden" name="merchant_order_id" id="merchant_order_id"> 
<input type="hidden" name="language" value="EN"> 
<input type="hidden" name="currency" id="currency" value="INR"> 
<input type="hidden" name="surl" id="surl" value="http://localhost:8000/success/"> 
<input type="hidden" name="furl" id="furl" value="http://localhost:8000/thankyou/"> 

<input type="hidden" class="form-control" id="amount" name="amount" placeholder="amount" value="'.$data['amt'].'" readonly="readonly">
  <input type="hidden" name="billing_name" class="form-control" id="billing-name" value="'.$data['name'].'" Placeholder="Name" required> 
   <input type="hidden" name="billing_email"class="form-control" id="billing-email" value="'.$data['email'].'" Placeholder="Email" required>
  <input type="hidden" name="billing_phone" class="form-control" id="billing-phone" value="'.$data['phone'].'" Placeholder="Phone" required>  
  <input type="hidden" name="billing_address" class="form-control" id="billing_address" value="'.$data['add'].'" Placeholder="Address">  
  <input type="hidden" name="course" class="form-control" id="course" value="'.$data['course'].'" Placeholder="Address">  
   <input type="hidden" name="billing_country" class="form-control" id="billing_country" value="'.$data['country'].'" Placeholder="Country">
   <input type="hidden" name="billing_state" class="form-control" id="billing_state" value="'.$data['state'].'" Placeholder="State"> 
   <input type="hidden" name="billing_zip" class="form-control" id="billing_zip" value="'.$data['pincode'].'" Placeholder="Zipcode">
   <input type="hidden" name="city" class="form-control" id="city" value="'.$data['city'].'" Placeholder="Zipcode">
							
							<table>
		                      		<tr>
		                      			<td><strong>Summary</strong></td>
		                      			<td><strong>Details</strong></td>
		                      		</tr>
		                      		<tr>
		                      			<td>Order ID</td>
		                      			<td>'.$traisaction.'</td>
		                      		</tr>
		                      		<tr>
		                      			<td>Name</td>
		                      			<td>'.$data['name'].'</td>
		                      		</tr>
		                      		<tr>
		                      			<td>E-mail</td>
		                      			<td>'.$data['email'].'</td>
		                      		</tr>
		                      		<tr>
		                      			<td>Course</td>
		                      			<td>'.$data['course'].'</td>
		                      		</tr>
		                      		<tr>
		                      			<td>Registration Amount</td>
		                      			<td>'.$data['amt'].'</td>
		                      		</tr>
		                      		<tr>
		                      			<td>Contact</td>
		                      			<td>'.$data['phone'].'</td>
		                      		</tr>
		                      		<tr>
		                      			<td>Address</td>
		                      			<td>'.$data['add'].'</td>
		                      		</tr>
		                      		<tr>
		                      			<td>Country</td>
		                      			<td>'.$data['country'].'</td>
		                      		</tr>
									<tr>
		                      			<td>State</td>
		                      			<td>'.$data['state'].'</td>
		                      		</tr>
									<tr>
		                      			<td>City</td>
		                      			<td>'.$data['city'].'</td>
		                      		</tr>
		                      	</table></form>
							',
							'message'=>''
						]
					],200);
					
			return view('site.fees-checkout',$data);
					
			}
			return response()->json(['status'=>0,],200);
			
			
			 */
			
			
			
			
			
			
			
			
			}
			
		function get_curl_handle($payment_id, $data) {
		$url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
		$key_id = RAZOR_KEY_ID;
		$key_secret = RAZOR_KEY_SECRET;
		$params = http_build_query($data);
		//cURL Request
		$ch = curl_init();
		//set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		return $ch;
		}
			
 public function razorPayCheckout(Request $request ){
	 
	// echo "<pre>";print_r($_POST);die;
	 
	 
	 
if (!empty($_POST['razorpay_payment_id']) && !empty($_POST['merchant_order_id'])) {
$json = array();
$razorpay_payment_id = $_POST['razorpay_payment_id'];
$merchant_order_id = $_POST['merchant_order_id'];
$currency_code = $_POST['currency_code_id'];

//$cityname =City::where('city_id',$_POST['city'])->first()->city_name;
//$countryname =Country::where('country_id',$_POST['billing_country'])->first()->country_name;
// store temprary data
$dataFlesh = array(
    'card_holder_name' => $_POST['card_holder_name_id'],
    'merchant_amount' => $_POST['merchant_amount'],
    'merchant_total' => $_POST['merchant_total'],
    'surl' => $_POST['merchant_surl_id'],
    'furl' => $_POST['merchant_furl_id'],
    'currency_code' => $currency_code,
    'order_id' => $_POST['merchant_order_id'],
    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
    'pay_to' => $_POST['pay'],
    'course' => $_POST['course'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
   // 'address' => $_POST['address'],
    'city' => $_POST['city'],  
    'billing_country' => $_POST['billing_country'],
     'billing_state' => $_POST['billing_state'],
    'getpay' => 1,
);

$paymentInfo = $dataFlesh;
$order_info = array('order_status_id' => $_POST['merchant_order_id']);
$amount = $_POST['merchant_total'];
$currency_code = $_POST['currency_code_id'];
// bind amount and currecy code
$data = array(
    'amount' => $amount,
    'currency' => $currency_code,
);
$success = false;
$error = '';
try {
    $ch = $this->get_curl_handle($razorpay_payment_id, $data);
    //execute post
    $result = curl_exec($ch);
	
	 
    $data = json_decode($result);
   
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($result === false) {
        $success = false;
        $error = 'Curl error: ' . curl_error($ch);
    } else {
        $response_array = json_decode($result, true);
        //Check success response
        if ($http_status === 200 and isset($response_array['error']) === false) {
            $success = true;
        } else {
            $success = false;
            if (!empty($response_array['error']['code'])) {
                $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
            } else {
                $error = 'Invalid Response <br/>' . $result;
            }
        }
    }
    //close connection
    curl_close($ch);
} catch (Exception $e) {
    $success = false;
    $error = 'Request to Razorpay Failed';
}
if ($success === true) {
    if (!$order_info['order_status_id']) {
		
        $json['data'] = json_encode($paymentInfo);
        $json['redirectURL'] = $_POST['merchant_surl_id'];
    } else {
        
        $feesHisoty =New FeesHistory;		
		$feesHisoty->name= $paymentInfo['card_holder_name'];
		$feesHisoty->email= $paymentInfo['email'];
		$feesHisoty->phone= $paymentInfo['phone'];
		$feesHisoty->course= $paymentInfo['course'];
		$feesHisoty->merchant_amount= $paymentInfo['merchant_amount'];
		$feesHisoty->merchant_total= $paymentInfo['merchant_total'];
		$feesHisoty->currency_code= $paymentInfo['currency_code'];
		$feesHisoty->order_id= $paymentInfo['order_id'];
		$feesHisoty->razorpay_payment_id= $paymentInfo['razorpay_payment_id'];
		$feesHisoty->city= $paymentInfo['city'];
		$feesHisoty->billing_country= $paymentInfo['billing_country'];
		$feesHisoty->billing_state= $paymentInfo['billing_state'];
		$feesHisoty->pay_to= $paymentInfo['pay_to'];
		$feesHisoty->getpay= 1;
		$feesHisoty->save();
		 $json['data'] = json_encode($paymentInfo);
        $json['redirectURL'] = $_POST['merchant_surl_id'];
    }
} else {
    $json['redirectURL'] = $_POST['merchant_furl_id'];
}
$json['msg'] = '';
} else {
$json['msg'] = 'An error occured. Contact site administrator, please!';
}
header('Content-Type: application/json');
echo json_encode($json);
	 
	 
	 
	 
 }
  
 
 public function success(Request $request){
	 
	 if(isset($_GET)){
		 
		 $data =$_GET;
		 
	 }else{
		 $data ="";
	 }
	 return view('site.success',['date'=>$data]);
 }
 
 public function failed(Request $request){
	 
	 return view('site.failed');
 }
 
  public function getInvoicePrintPdf(Request $request) {

	if(isset($_POST['pid']))
	{			
	if($request->input('action') == 'getInvoicePrintPdf')
	{

	$order_id=$_POST['pid'];	
	$paydetails =FeesHistory::where('order_id',$order_id)->first();

	return response()->view("site.getInvoicePrintPdf",['paydetails'=>$paydetails]);

	die;
	}
	}
	}
	
	
	 
 public function feespaypage(Request $request,$url){ 
	$paymentMode = PaymentMode::where('name',base64_decode($url))->get();
	return view('site.fees-pay-page',['paymentMode'=>$paymentMode]);		
	}
	
	
	public function feespaypawan(Request $request){ 
	//$name='devendra';
	//echo base64_encode($name);
	//saurabh= c2F1cmFiaA==;
	//devendra= ZGV2ZW5kcmE=;
	//pawan= cGF3YW4=;
	return view('site.fees-pay-pawan');		
	}
	
	public function feespaydevendra(Request $request){ 
 
	return view('site.fees-pay-devendra');		
	}
	
	public function feespaysaurabh(Request $request){ 
 
	return view('site.fees-pay-saurabh');		
	}
	
 
}
