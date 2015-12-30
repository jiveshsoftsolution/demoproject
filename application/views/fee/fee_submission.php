<script>
	function get_student_list()
	{	
		var class_section_id = $("#class_section_id").val();
		var dataString = "class_section_id="+ class_section_id;
		var urldata = '<?php echo base_url()?>';
		$.ajax({
			url:urldata+'student/student/get_student_list_by_class_section/',
			data:dataString,
			type:'POST',
			success:function(response){
				var obj = JSON.parse(response);
				$("#student_id option").remove();
				$('#student_id').append($('<option>', {
					value: -1,
					text: "Select Student"
				}));
				for(var i=0;i<obj.length;i++)
				{
					$('#student_id').append($('<option>', {
						value: obj[i].student_id,
						text: obj[i].student_name
					}));
				}
			}    
		});
	}
	
	function get_student_cardno()
	{	
		var student_id = $("#student_id").val();
		var dataString = "student_id="+ student_id;
		var urldata = '<?php echo base_url()?>';
		$.ajax({
			url:urldata+'student/student/get_student_cardno/',
			data:dataString,
			type:'POST',
			success:function(response){
				var obj = JSON.parse(response);
				$("#card_number").val(obj.card_no);
			}    
		});
	}
	
	function get_total_fee(){
		var tuition_fee = 0;
		var transport_fee = 0;
		var miscellaneous_fee = 0;
		if($("#tuition_fee").val()!=""){
			var tuition_fee 		= parseInt($("#tuition_fee").val());
		}
		if($("#transport_fee").val()!=""){
			var transport_fee 		= parseInt($("#transport_fee").val());
		}
		if($("#miscellaneous_fee").val()!=""){
			var miscellaneous_fee 		= parseInt($("#miscellaneous_fee").val());
		}
		var total_fee 			= tuition_fee + transport_fee + miscellaneous_fee;
		$("#total_fee").val(total_fee);		
	}
	$(document).ready(function(){
		$("#tuition_fee").keyup(function(){	
			get_total_fee();
		});
		$("#transport_fee").keyup(function(){	
			get_total_fee();
		});
		$("#miscellaneous_fee").keyup(function(){	
			get_total_fee();
		});
	});
</script>
<div class="nine columns">
  <div class="row">
    <div class="twelve columns">
      <div class="box_c">
	<div class="box_c_heading cf">
	  <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
	  <p>Fee Submisssion</p>
	</div>
	<div class="box_c_content">
	  <form action="<?php echo base_url()?>index.php/fee/fee/fee_submission_add" id="frm_fee_submitssion_add" class="nice" method="post" onsubmit="">
	    <h3>Fee Submission</h3>             
	    <div class="formRow">
	      <div class="row">
		<div class="three columns">
		  <label for="session_id">Session</label>
		  <select name="session_id" id="session_id" class="small">
		    <option value="-1">Select Session</option>
		    <?php foreach($session as $sessionData) {?>
		      <option value="<?php echo $sessionData->session_id?>" <?php if($sessionData->session_name=="2015-16") echo "selected='selected'"?>><?php echo $sessionData->session_name;?></option>
		    <?php  } ?>
		  </select>
		  <span id="sp_session_id" class="error">Select Session.</span>
		</div>
		<div class="three columns">
		  <label for="session_id">Class Section</label>
		  <select name="class_section_id" id="class_section_id" class="small" onchange="get_student_list()">
		    <option value="-1">Select Class Section</option>
		    <?php foreach($class_section as $class_SectionData) {?>
		      <option value="<?php echo $class_SectionData->class_section_id?>"><?php echo $class_SectionData->class_name.' - '.$class_SectionData->section_name;?></option>
		    <?php  } ?>
		  </select>
		  <span id="sp_class_section_id" class="error">Select Class Section.</span>
		</div>
		<div class="three columns">
		  <label for="student_id">Student Name</label>
		  <select name="student_id" id="student_id" class="small" onchange="get_student_cardno()">
		    <option value="-1">Select Student</option>
		  </select>
		  <span id="sp_fee_type_name" class="error">Select Fee Type.</span>
		</div>
		<div class="four columns">
		  <label for="card_number">Card Number</label>
		  <input type="text" name="card_number" id="card_number" class="input-text" placeholder="Card Number" readonly>						  
		</div>
	      </div>
	    </div>
	    <div class="formRow">
	      <div class="row">
		<div class="three columns">
		  <label for="tuition_fee">Tuition Fee</label>
		  <input type="text" name="tuition_fee" id="tuition_fee" class="input-text small" placeholder="Tuition Fee">						  
		  <span id="sp_tuition_fee" class="error">Enter Tuition Fee.</span>
		</div>
		<div class="three columns">
		  <label for="transport_fee">Transport fee</label>
		  <input type="text" name="transport_fee" id="transport_fee" class="input-text small" placeholder="Transport Fee">
		</div>
		<div class="three columns">
		  <label for="miscellaneous_fee">Miscellaneous fee</label>
		  <input type="text" name="miscellaneous_fee" id="miscellaneous_fee" class="input-text small" placeholder="Miscellaneous Fee">
		</div>
		<div class="four columns">
		  <label for="total_fee">Total Fee</label>
		  <input type="text" name="total_fee" id="total_fee" class="input-text small" placeholder="Total Fee" readonly="readonly">						  
		</div>
	      </div>
	    </div>
	    <div class="formRow">
	      <div class="row"> 
		<label for="month"><strong>Month</strong></label><br>
		<?php foreach($month as $monthData) { 
		if($monthData->month_id!=12)
		{
		?>
		  <div class="three columns">
		    <input type="checkbox" name="month[]" id="month_<?php echo $monthData->month_id?>" value="<?php echo $monthData->month?>">
		    <label for="month_<?php echo $monthData->month_id?>"><?php echo $monthData->month?></label><br>
		  </div>
		  <?php } else {?>
		  <div class="three columns" style="left:-71px">
		    <input type="checkbox" name="month[]" id="month_<?php echo $monthData->month_id?>" value="<?php echo $monthData->month?>">
		    <label for="month_<?php echo $monthData->month_id?>"><?php echo $monthData->month?></label><br>
		  </div>
		<?php } } ?>						
	      </div>
	    </div>
	    <div class="formRow cf">
	      <input type="submit" class="button small" value="Submit">
	    </div>
	  </form>
	</div>
      </div>
    </div>
  </div>
</div>

<div class="nine columns">
  <div class="row">
    <div class="twelve columns">
      <div class="box_c">
	<div class="twelve columns">
	  <div class="box_c">
	    <div class="box_c_heading cf box_actions">
	      <p>Today Fee List</p>
	    </div>
	    <div class="box_c_content">
	      <?php if(isset($student_data) && count($student_data)==0) { ?>
	      <div class="alert-box info">
		Record not found!
		<a href="javascript:void(0)" class="close">×</a>
	      </div> 
	      <?php } else {?>
		<table class="display " id="content_table">
		  <thead>
		    <tr>
		      <th>Sr.No.</th>		      
		      <th>Student Name</th>
			  <th>Card No</th>
			  <th>Total Fee</th>
		      <th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php $i = 1; foreach($student_data as $student_fee_data) {?>
				<tr>
					<td class="essential"><?php echo $i++;?></td>
					<td class="essential"><?php echo ucfirst($student_fee_data->student_name);?></td>
					<td class="essential"><?php echo $student_fee_data->card_number;?></td>
					<td class="essential"><?php echo $student_fee_data->total_fee;?></td>
					<td class="content_actions">
						&nbsp;
						<a title="Receipt" href="<?php echo base_url();?>index.php/fee/fee/get_fee_receipt/<?php echo $student_fee_data->submission_id;?>" target="_BLANK">Fee Receipt</a>
					</td>
				</tr>
		    <?php } ?>
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
