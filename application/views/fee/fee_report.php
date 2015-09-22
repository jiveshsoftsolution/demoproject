<div class="nine columns">
  <div class="row">
    <div class="twelve columns">
      <div class="box_c">
	<div class="twelve columns">
	  <div class="box_c">
	    <div class="box_c_heading cf box_actions">
	      <p>Fee Receipt</p>
	    </div>
	    <div class="box_c_content">
	      <?php if(isset($student_fee_data['result'])&& ($student_fee_data['result'])==0) { ?>
	      <div class="alert-box info">
		Record not found!
		<a href="javascript:void(0)" class="close">×</a>
	      </div> 
	      <?php } else {?>
		<table class="display " id="content_table">
		  <tbody>
		      <tr>	      
			<td>Student Name : <?php echo $student_fee_data[0]->student_name; ?> </td>
			<td>Class Section : <?php foreach($class_section  as $cs) { if($cs->class_section_id==$student_fee_data[0]->class_section_id) echo $cs->class_name." - ".$cs->section_name; } ?> </td>
			<td>Roll Number : <?php echo $student_fee_data[0]->roll_number; ?> </td></td>
		      </tr>
		  </tbody></table>
		<table class="display " id="content_table">
		  <tbody>
		      <tr>
			<td>Month</td>
			<td><?php $i=0; foreach($month as $monthData) {
			  foreach($student_fee_data as $fee_data){
			    if($monthData->month_id==$fee_data->month_id) echo $monthData->month.", ";
			  }} ?>
			</td>
		      </tr>
		      <tr>
			<td>Tuition Fee</td>
			<td><?php echo $student_fee_data[0]->tuition_fee; ?></td>
		      </tr>
		      <tr>
			<td>Transport Fee</td>
			<td><?php echo $student_fee_data[0]->transport_fee; ?></td>
		      </tr>
		      <tr>
			<td>Miscellaneous Fee</td>
			<td><?php echo $student_fee_data[0]->miscellaneous_fee; ?></td>
		      </tr>
		      <tr>
			<td>Total</td>
			<td><?php echo $student_fee_data[0]->tuition_fee + $student_fee_data[0]->transport_fee + $student_fee_data[0]->miscellaneous_fee;  ?></td>
		      </tr>
		    </tbody>
		</table>
	      <?php }?>
	    </div>
	  </div>
	</div>
      </div>
    </div>
  </div>
</div>
