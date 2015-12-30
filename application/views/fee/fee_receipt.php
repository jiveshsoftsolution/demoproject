<style type="text/css">
.receipt_right{
	text-align:right;
	padding-right:30px;
}
.receipt_header{
	font-family:Tahoma;
	font-size:25px;
	margin-left:50px;
	vertical-align:top;
}
.school_address{
	font-family:Tahoma;
	font-size:14px;
	margin-left:45px;
}
</style>
<div class="nine columns">
  <div class="row">
    <div class="eleven columns">
      <div class="box_c">
	<div class="twelve columns">
	  <div class="box_c">
	    <div class="box_c_content">
	      <div style="">
			<table>
				<tr>
					<td><img src="<?php echo base_url().$school_data[0]->school_logo; ?>"></td>
					<td style="vertical-align:top;text-align:center">
						<div class="receipt_header"><strong><?php echo $school_data[0]->school_name; ?></strong></div>
						<div class="school_address"><?php echo $school_data[0]->school_address; ?></div>
						<div class="school_address">Website : <?php echo $school_data[0]->school_website; ?></div>
						<div class="school_address">Contact No.: <?php echo $school_data[0]->school_contact_no; ?></div>
					</td>
				<tr>
			</table>
	      </div>
		  <hr style="border-bottom: 0px dotted #dcdcdc">
		  <h1 style="text-align:center;font-size:16px"><b>FEE RECEIPT</b></h1>
	      <hr style="border-bottom: 0px dotted #dcdcdc">
	      <table style="width:100%;line-height: 28px;">
			<tbody>
				<tr>	      
					<td>Receipt No. : <b><?php echo ucwords($student_fee_data[0]->submission_id); ?></b> </td>
					<td class="receipt_right">Date : <?php echo date('d-M-Y'); ?> </td>
				</tr>
				<tr>
				  <td>Class Section : <?php foreach($class_section  as $cs) { if($cs->class_section_id==$student_fee_data[0]->class_section_id) echo $cs->class_name." - ".$cs->section_name; } ?> </td>
				  <td class="receipt_right">Card Number : <?php echo $student_fee_data[0]->card_number; ?> </td></td>
				</tr>
				<tr>
					<td>Student Name : <?php echo ucwords($student_fee_data[0]->first_name." ".trim($student_fee_data[0]->middle_name)." ".$student_fee_data[0]->last_name); ?> </td>
					<td rowspan="2" class="receipt_right">Months : <?php echo $student_fee_data[0]->fee_month;?></td>
				</tr>
				<tr>
					<td>Father's Name : <?php echo ucwords($student_fee_data[0]->father_first_name." ".trim($student_fee_data[0]->father_middle_name)." ".$student_fee_data[0]->father_last_name); ?> </td>
				</tr>
			</tbody>
	      </table>
		  <hr style="border-bottom: 0px dotted #dcdcdc">
	      <table style="border: 1px solid #ccc;width: 100%;line-height: 30px;">
			<tbody>
			<tr>
		      <th style="border-bottom: 1px solid #dcdcdc; padding-left:8px;font-size:15px;background-color:#ccc"><b>Fee</b></th>
		      <th style="border-bottom: 1px solid #dcdcdc;padding-left:10px;font-size:15px;background-color:#ccc"><b>Amount</b></th>
		    </tr>
		    <tr>
		      <td style="border-right: 1px solid #dcdcdc;border-bottom: 1px solid #dcdcdc; padding-left:8px">Tuition Fee</td>
		      <td style="border-bottom: 1px solid #dcdcdc;padding-left:10px"><?php echo $student_fee_data[0]->tuition_fee; ?></td>
		    </tr>
		    <tr>
		      <td style="border-right: 1px solid #dcdcdc;border-bottom: 1px solid #dcdcdc;padding-left:8px">Transport Fee</td>
		      <td style="border-bottom: 1px solid #dcdcdc;padding-left:10px"><?php echo $student_fee_data[0]->transport_fee; ?></td>
		    </tr>
		    <tr>
		      <td style="border-right: 1px solid #dcdcdc;border-bottom: 1px solid #dcdcdc;padding-left:8px">Miscellaneous Fee</td>
		      <td style="border-bottom: 1px solid #dcdcdc;padding-left:10px"><?php echo $student_fee_data[0]->miscellaneous_fee; ?></td>
		    </tr>
			<tr>	      
				<td style="border-right: 1px solid #dcdcdc;border-bottom: 1px solid #dcdcdc;padding-left:8px">&nbsp;</td>
				<td style="border-bottom: 1px solid #dcdcdc;padding-left:10px">&nbsp;</td>
			</tr>
		    <tr>
		      <td style="border-right: 1px solid #dcdcdc;padding-left:8px;font-size:15px"><b>Total</b></td>
		      <td style="padding-left:10px"><?php echo $student_fee_data[0]->tuition_fee + $student_fee_data[0]->transport_fee + $student_fee_data[0]->miscellaneous_fee;  ?> </td>
		    </tr>
		  </tbody>
	      </table>
		  <hr style="border-bottom: 0px dotted #dcdcdc">
		  <table style="width:100%;line-height: 27px;">
			<tbody>
				<tr>	      
					<td>&nbsp;</td>
					<td class="receipt_right">&nbsp;</td>
				</tr>
				<tr>	      
					<td>&nbsp;</td>
					<td class="receipt_right">Authorised Signature </td>
				</tr>
			</tbody>
	      </table>
	    </div>
	  </div>
	</div>
      </div>
    </div>
  </div>
</div>
