<script>
	$(document).ready(function(){
		
	});
</script>
<div class="nine columns">
  <div class="row">
    <div class="twelve columns">
      <div class="box_c">
	<div class="box_c_heading cf">
	  <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
	  <p>Fee Report</p>
	</div>
	<div class="box_c_content">
	  <form action="<?php echo base_url()?>index.php/fee/fee/search_fee_report" id="frm_fee_report_search" class="nice" method="post" onsubmit="return fee_report_search()">
	    <h3>Fee Report</h3>             
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
		  <select name="class_section_id" id="class_section_id" class="small">
		    <option value="-1">Select Class Section</option>
		    <?php foreach($class_section as $class_SectionData) {?>
		      <option value="<?php echo $class_SectionData->class_section_id?>"><?php echo $class_SectionData->class_name.' - '.$class_SectionData->section_name;?></option>
		    <?php  } ?>
		  </select>
		  <span id="sp_class_section_id" class="error">Select Class Section.</span>
		</div>
		<div class="three columns" style="display:none">
		  <label for="session_id">Class Section</label>
		</div>
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
	      <p>Student List</p>
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
		      <th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php $i = 1; foreach($student_data as $student) {?>
		      <tr>
			<td class="essential"><?php echo $i++;?></td>
			<td class="essential"><?php echo ucwords($student->first_name." ".trim($student->middle_name)." ".$student->last_name);?></td>
			<td class="essential"><?php echo $student->card_no;?></td>
			<td class="content_actions">
			<?php if(isset($student->student_fee_data)) { ?>
			  <a  href="<?php echo base_url();?>index.php/fee/fee/get_fee_report/<?php echo $student->student_id;?>/<?php echo $student->session_id;?>" class="sepV_a" title="Report"  target="_BLANK">
			    Report
			  </a>&nbsp;
			<?php }?>
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
