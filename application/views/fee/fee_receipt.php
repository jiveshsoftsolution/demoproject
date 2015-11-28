<div class="seven columns">
  <div class="row">
    <div class="nine columns">
      <div class="box_c">
	<div class="twelve columns">
	  <div class="box_c">
	    <div class="box_c_content">
	      <div style="margin-left: 45%;">
		<p><b><?php echo $school_data[0]->school_name; ?></b></p>
		<p><?php echo $school_data[0]->school_address; ?></p>
	      </div>
	      <hr style="border-bottom: 1px solid #dcdcdc">
	      <table style="width:100%">
		<tbody>
		    <tr>	      
		      <td>Student Name : <?php echo ucwords($student_fee_data[0]->student_name); ?> </td>
		      <td>Class Section : <?php foreach($class_section  as $cs) { if($cs->class_section_id==$student_fee_data[0]->class_section_id) echo $cs->class_name." - ".$cs->section_name; } ?> </td>
		      <td>Roll Number : <?php echo $student_fee_data[0]->card_number; ?> </td></td>
		    </tr>
		</tbody>
	      </table>
	      <hr style="border-bottom: 1px solid #dcdcdc">
	      <table style="border: 1px solid #dcdcdc;width: 100%;margin-top: 10px;line-height: 30px;border-collapse: unset;padding-right: 5px !important;text-align: right" cellspacing="5">
		<tbody>
		    <tr>
		      <td style="border-right: 1px solid #dcdcdc;border-bottom: 1px solid #dcdcdc;padding-right: 5px !important">Months</td>
		      <td style="border-bottom: 1px solid #dcdcdc;width: 40%"><?php	echo $student_fee_data[0]->fee_month;?>
		      </td>
		    </tr>
		    <tr>
		      <td style="border-right: 1px solid #dcdcdc;border-bottom: 1px solid #dcdcdc;padding-right: 5px !important">Tuition Fee</td>
		      <td style="border-bottom: 1px solid #dcdcdc;"><?php echo $student_fee_data[0]->tuition_fee; ?></td>
		    </tr>
		    <tr>
		      <td style="border-right: 1px solid #dcdcdc;border-bottom: 1px solid #dcdcdc;padding-right: 5px !important">Transport Fee</td>
		      <td style="border-bottom: 1px solid #dcdcdc;"><?php echo $student_fee_data[0]->transport_fee; ?></td>
		    </tr>
		    <tr>
		      <td style="border-right: 1px solid #dcdcdc;border-bottom: 1px solid #dcdcdc;padding-right: 5px !important">Miscellaneous Fee</td>
		      <td style="border-bottom: 1px solid #dcdcdc;"><?php echo $student_fee_data[0]->miscellaneous_fee; ?></td>
		    </tr>
		    <tr>
		      <td style="border-right: 1px solid #dcdcdc;padding-right: 5px !important"><b>Total</b></td>
		      <td ><?php echo $student_fee_data[0]->tuition_fee + $student_fee_data[0]->transport_fee + $student_fee_data[0]->miscellaneous_fee;  ?></td>
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
