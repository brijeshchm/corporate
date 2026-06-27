<!Doctype html>
	 <html>
	<head>
		<meta charset="utf-8">
		<title>Fees_Slip_<?php echo $paydetails->name.'_'.date_format(date_create(),"d-m-Y"); ?></title>
		 
		<link href="<?php echo asset('css/feesinvoicestyle.css'); ?>" rel="stylesheet">
		 <style>
		 table { border-collapse:collapse; border-spacing: 0; }	
 		 
		 </style>
	</head>
	<body style="background-image:url(https://www.techpratham.com/wp-content/themes/techpratham/assets/image/croma_logo_invoice.jpg);background-repeat: no-repeat;background-position: center;background-size: 50%;" >
 

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<table >
<tr>
<td style="border:1px solid grey;text-align:center; width:40%; height:70px; padding-top:10px;border-left: 2px solid grey;
    border-top: 2px solid grey;"><div></div> 
<img src="{{asset('public/image/techpratham_trp.png')}}" height="70px" width="150px" style="padding-top:13px;"> 
</td>
<td style="border:1px solid grey; text-align:center; width:60%; height:70px; padding-top:15px;border-right: 2px solid grey;
    border-top: 2px solid grey;"><div></div><span style="font-size:23px;font-weight:bold;">institute Pvt. Ltd</span><br><br> <span>(G-13, Sector-03, Noida 201301, (U.P.))</span></td>

</tr>
</table>
<table cellpadding="5">
<tr >
<td style="border-left:2px solid grey;border-right:2px solid grey; text-align:center; font-size:16px; font-weight:bold;text-decoration-line: underline;"><u>Pay Fees institute Pvt. Ltd </u></td>
</tr>
</table>

<table cellpadding="4" border="2px">
<tr>
<td valign="middle" style="text-align:left;font-size:13px;font-weight:bold;"> Order Id</td>
<td valign="middle" style="text-align:left; "><?php if(!empty($paydetails->order_id)){ echo $paydetails->order_id; } ?> </td>
 
</tr>

<tr>
 
<td valign="middle" style="text-align:left;font-size:13px;font-weight:bold;"> Tracking ID</td>
<td valign="middle" style="text-align:left;"> <?php if(!empty($paydetails->razorpay_payment_id)){ echo $paydetails->razorpay_payment_id; } ?></td>
</tr>

<tr>
<td style="text-align:left;font-size:13px;font-weight:bold;"> Pay Date</td>
<td style="text-align:left;"><?php echo date('d-M, Y',strtotime($paydetails->created_at)); ?></td>
 
</tr>
<tr>
 
<td style="text-align:left;font-size:13px;font-weight:bold; "> To Pay</td>
<td style="text-align:left; "> <?php if(!empty($paydetails->pay_to)){ echo $paydetails->pay_to; }else{ echo "N.A."; }   ?></td>
</tr>

<tr>
<td style="text-align:left;font-size:13px;font-weight:bold; "> Name</td>
<td style="text-align:left;"> <?php echo $paydetails->name; ?></td>
 
</tr> 

<tr>
 
<td style="text-align:left;font-size:13px;font-weight:bold; "> Email</td>
<td style="text-align:left; "> <?php if(!empty($paydetails->email)){ echo $paydetails->email;  } ?></td>
</tr> 

<tr>
<td style="text-align:left;font-size:13px;font-weight:bold; ">Phone</td>
<td style="text-align:left;"> <?php echo $paydetails->phone; ?></td>
 
</tr>

<tr>
 
<td style="text-align:left;font-size:13px;font-weight:bold;"> Amount</td>
<td style="text-align:left; ">  <?php if(!empty($paydetails->merchant_amount)){ echo $paydetails->merchant_amount;  } ?></td>
</tr>

<tr>
<td style="text-align:left;font-size:13px;font-weight:bold; "> Course</td>
<td style="text-align:left;"> <?php echo $paydetails->course; ?></td>
 
</tr>

<tr>
 
<td style="text-align:left;font-size:13px;font-weight:bold;"> City</td>
<td style="text-align:left; "> <?php if(!empty($paydetails->city)){ echo $paydetails->city;  } ?></td>
</tr>

<tr>
<td style="text-align:left;font-size:13px;font-weight:bold; "> State</td>
<td style="text-align:left;"> <?php if(!empty($paydetails->billing_state)){ echo $paydetails->billing_state;  } ?></td>
 
</tr>
<tr>
<td style="text-align:left;font-size:13px;font-weight:bold; "> Country</td>
<td style="text-align:left;"> <?php if(!empty($paydetails->billing_country)){ echo $paydetails->billing_country;  } ?></td>
 
</tr>


</table>
 
 <strong style="font-size: 12px;
    font-weight: 600;">Terms & Conditions:</strong> <span style="font-size: 12px;">This is a computer generated payslip and does not require signature and stamp.</span>
			 
<div style="width:100%;text-align:center;margin-top:20px;position:relative;">
			<a style="background:#2E6DA4;padding:10px;text-decoration:none;color:#fff;border-radius:4px;" href="javascript::void(0);" onclick="this.parentElement.style.display='none';window.print();">Print Slip</a>
		</div>

	  
	</body>
</html>
	<!-- Design Ends  Here -->
 