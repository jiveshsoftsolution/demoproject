<script type="text/javascript">
	$(document).ready(function() {
		$("#attendance_for").change(function(){
			if($("#attendance_for").val()=="Student"){
					$("#div_class_section").css("display","block");
			}else{
				$("#div_class_section").css("display","none");
			}			
		});
	});
</script>
<div class="nine columns">
  <div class="row">
	<div class="twelve columns">
	  <div class="box_c">
		<div class="box_c_heading cf">
		  <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
		  <p>Attendace History</p>
		</div>
		<div class="box_c_content">
		  <form action="<?php echo base_url()?>index.php/student/student_attendance/attendance_history" id="frm_attendance_history" class="nice" method="post" onsubmit="return validate_attendance_history();">
		   <h3>Attendace History</h3>             
			<div class="formRow">
				<div class="row">
					<div class="three columns">
						<label for="session_id">Session</label>
						<select id="session_id" name="session_id" class="small">
						<?php foreach($session as $sRow) {?>						
						<option <?php if($sRow->session_id == $session_id) echo"selected='selected'"?> value="<?php echo $sRow->session_id; ?>"> <?php echo $sRow->session_name; ?> </option>
						<?php } ?>
					  </select>
					</div>
					<div class="three columns">
						<label for="attendance_for">Attendace For</label>
						<select id="attendance_for" name="attendance_for" class="small">
							<option value="Student">Student</option>
							<option value="Staff">Staff</option>
						</select>
					</div>					
					<div class="four columns" id="div_class_section">
						<label for="class_section_id">Class Section</label>
						<select id="class_section_id" name="class_section_id" style="width: 100%">
							<?php foreach($classSecton as $csRow) {?>
							<option <?php if($csRow->class_section_id == $class_section_id) echo"selected='selected'"?>   value="<?php echo $csRow->class_section_id; ?>"><?php echo $csRow->class_name .'-'. $csRow->section_name ?> </option>
							<?php } ?>
					  </select>
					</div>
					<div class="one">&nbsp;</div>
				</div>
			</div>
			<div class="formRow cf">
				<div class="four columns">
						<label for="datepicker-example1"  style="padding:0">Attendace Date</label>
						<input type="text" id="datepicker-example1" name="attendance_date" class="input-text small" placeholder="Attendace Date" value="<?php if(isset($attendance_date))echo $attendance_date?>" />
						<span id="sp_attendance_date" class="error">Enter Attendace Date.</span>
					</div>
			</div>
			<div class="formRow cf">
				<input type="submit" value="Submit" class="button small">
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
						<p>Attendance Histroy</p>
					</div>
					<div class="box_c_content">
					<?php 
						if((!isset($StudentAttendance) || count($StudentAttendance)==0) && (!isset($StaffAttendance) || count($StaffAttendance)==0)) 
						{ 
						?>
						<div class="alert-box info">
							Record not found!
							<a href="javascript:void(0)" class="close">×</a>
						</div> 
						<?php } else if(isset($StudentAttendance) && count($StudentAttendance)>0) { ?>
							<table class="display " id="content_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Card Number</th>
										<th>Student Name</th>
										<th>Present</th>
										<th>Absent</th>
										<th>Leave</th>
									</tr>
								</thead>
								<tbody>
									<?php  $count = 1;  
										for($i=0; $i < count($StudentAttendance) ; $i++) {?>
										<tr>
											<td class="essential"><?php echo $count++;?></td>
											<td><?php echo $StudentAttendance[$i]->card_no;?></td>
											<td><?php echo $StudentAttendance[$i]->first_name." ".$StudentAttendance[$i]->last_name;?></td>
											<td><?php if($StudentAttendance[$i]->attendance_status=='P') echo "<label class='label-present'>Present</label>";?></td>
											<td><?php if($StudentAttendance[$i]->attendance_status=='A') echo "<label class='label-absent'>Absent</label>";?></td>
											<td><?php if($StudentAttendance[$i]->attendance_status=='L') echo "<label class='label-leave'>Leave</label>";?></td>
											</tr>
									<?php } ?>
								</tbody>
							</table>
						<?php }  if(isset($StaffAttendance) && count($StaffAttendance)>0) { ?>
						<table class="display " id="content_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Card Number</th>
										<th>Staff Name</th>
										<th>Present</th>
										<th>Absent</th>
										<th>Leave</th>
									</tr>
								</thead>
								<tbody>
									<?php  $count = 1;  
										for($i=0; $i < count($StaffAttendance) ; $i++) {?>
										<tr>
											<td class="essential"><?php echo $count++;?></td>
											<td><?php echo $StaffAttendance[$i]->card_no;?></td>
											<td><?php echo $StaffAttendance[$i]->first_name." ".$StaffAttendance[$i]->last_name;?></td>
											<td><?php if($StaffAttendance[$i]->attendance_status=='P') echo "Present"; else echo "-";?></td>
											<td><?php if($StaffAttendance[$i]->attendance_status=='A') echo "Absent"; else echo "-";?></td>
											<td><?php if($StaffAttendance[$i]->attendance_status=='L') echo "Leave"; else echo "-";?></td>
											</tr>
									<?php } ?>
								</tbody>
							</table>
						<?php }  ?>
					</div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>