	<style type="text/css">	
		form.nice label {
			font-size: 13px !important;
		}
		h4 {
			font-size: 14px !important;
			font-weight:500;
		}
	</style>

	<div class="nine columns">
		<div class="row">
			<div class="twelve columns">
				<div class="box_c">
					<div class="box_c_heading cf orange">
						<div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
						<p>Teacher Feedback</p>
					</div>
					<div class="box_c_content">
						<form action="<?php echo base_url()?>index.php/feedback/teacher_feedback/feedback_by_student" id="frm_teacher_feedback" enctype="multipart/form-data"  class="nice" method="post" onsubmit="return validate_teacher_feedback();">
							<h3>Teacher Feedback</h3>
							<div class="formRow">
								<div class="row">				
									<div class="four columns" id="div_class_section">
										<label for="staff_id">Teacher</label>
										<select id="staff_id" name="staff_id" style="width: 100%">
											<option value="-1">Select Teacher</option>
											<?php foreach($staff_list as $staff) {?>
											<option <?php if($staff->staff_id == $staff_id) echo"selected='selected'"?>   value="<?php echo $staff->staff_id; ?>"><?php echo $staff->first_name." ".$staff->last_name ?> </option>
											<?php } ?>
									  </select>
									  <span id="sp_staff_id" class="error">Select Teacher.</span>
									</div>
									<div class="one">&nbsp;</div>
								</div>
							</div>
							<div class="formRow">
								<h4 style="margin-bottom:15px">1). Teacher expresses clear expectations for my learning and performance in this class.</h4>
								<div class="row">
									<div class="three columns">
										<input type="radio" name="ans1" id="ans_op1" value="1">
										<label for="ans_op1">Average</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans1" id="ans_op2" value="2">
										<label for="ans_op2">Good</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans1" id="ans_op3" value="3">
										<label for="ans_op3">Very Good</label>
									</div>
									<div class="four columns">
										<input type="radio" name="ans1" id="ans_op4" value="4">
										<label for="ans_op4">Excellent</label>
									</div>									
									<span id="sp_ans1" class="error">Choose an option.</span>
								</div>
							</div>
							<div class="formRow">
								<h4 style="margin-bottom:15px">2). Teacher expresses clear expectations for my learning and performance in this class.</h4>
								<div class="row">
									<div class="three columns">
										<input type="radio" name="ans2" id="ans_op5" value="1">
										<label for="ans_op5">Average</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans2" id="ans_op6" value="2">
										<label for="ans_op6">Good</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans2" id="ans_op7" value="3">
										<label for="ans_op7">Very Good</label>
									</div>
									<div class="four columns">
										<input type="radio" name="ans2" id="ans_op8" value="4">
										<label for="ans_op8">Excellent</label>
									</div>									
									<span id="sp_ans2" class="error">Choose an option.</span>
								</div>
							</div>								
							<div class="formRow">
								<h4 style="margin-bottom:15px">3). Teacher expresses clear expectations for my learning and performance in this class.</h4>
								<div class="row">
									<div class="three columns">
										<input type="radio" name="ans3" id="ans_op9" value="1">
										<label for="ans_op9">Average</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans3" id="ans_op10" value="2">
										<label for="ans_op10">Good</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans3" id="ans_op11" value="3">
										<label for="ans_op11">Very Good</label>
									</div>
									<div class="four columns">
										<input type="radio" name="ans3" id="ans_op12" value="4">
										<label for="ans_op12">Excellent</label>
									</div>									
									<span id="sp_ans3" class="error">Choose an option.</span>
								</div>
							</div>
							<div class="formRow">
								<h4 style="margin-bottom:15px">4). Teacher expresses clear expectations for my learning and performance in this class.</h4>
								<div class="row">
									<div class="three columns">
										<input type="radio" name="ans4" id="ans_op13" value="1">
										<label for="ans_op13">Average</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans4" id="ans_op14" value="2">
										<label for="ans_op14">Good</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans4" id="ans_op15" value="3">
										<label for="ans_op15">Very Good</label>
									</div>
									<div class="four columns">
										<input type="radio" name="ans4" id="ans_op16" value="4">
										<label for="ans_op16">Excellent</label>
									</div>									
									<span id="sp_ans4" class="error">Choose an option.</span>
								</div>
							</div>
							<div class="formRow">
								<h4 style="margin-bottom:15px">5). Teacher expresses clear expectations for my learning and performance in this class.</h4>
								<div class="row">
									<div class="three columns">
										<input type="radio" name="ans5" id="ans_op17" value="1">
										<label for="ans_op17">Average</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans5" id="ans_op18" value="2">
										<label for="ans_op18">Good</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans5" id="ans_op19" value="3">
										<label for="ans_op19">Very Good</label>
									</div>
									<div class="four columns">
										<input type="radio" name="ans5" id="ans_op20" value="4">
										<label for="ans_op20">Excellent</label>
									</div>									
									<span id="sp_ans5" class="error">Choose an option.</span>
								</div>
							</div>
							<div class="formRow">
								<h4 style="margin-bottom:15px">6). Teacher expresses clear expectations for my learning and performance in this class.</h4>
								<div class="row">
									<div class="three columns">
										<input type="radio" name="ans6" id="ans_op21" value="1">
										<label for="ans_op21">Average</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans6" id="ans_op22" value="2">
										<label for="ans_op22">Good</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans6" id="ans_op23" value="3">
										<label for="ans_op23">Very Good</label>
									</div>
									<div class="four columns">
										<input type="radio" name="ans6" id="ans_op24" value="4">
										<label for="ans_op24">Excellent</label>
									</div>									
									<span id="sp_ans6" class="error">Choose an option.</span>
								</div>
							</div>
							<div class="formRow">
								<h4 style="margin-bottom:15px">7). Teacher expresses clear expectations for my learning and performance in this class.</h4>
								<div class="row">
									<div class="three columns">
										<input type="radio" name="ans7" id="ans_op25" value="1">
										<label for="ans_op25">Average</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans7" id="ans_op26" value="2">
										<label for="ans_op26">Good</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans7" id="ans_op27" value="3">
										<label for="ans_op27">Very Good</label>
									</div>
									<div class="four columns">
										<input type="radio" name="ans7" id="ans_op28" value="4">
										<label for="ans_op28">Excellent</label>
									</div>									
									<span id="sp_ans7" class="error">Choose an option.</span>
								</div>
							</div>
							<div class="formRow">
								<h4 style="margin-bottom:15px">8). Teacher expresses clear expectations for my learning and performance in this class.</h4>
								<div class="row">
									<div class="three columns">
										<input type="radio" name="ans8" id="ans_op29" value="1">
										<label for="ans_op29">Average</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans8" id="ans_op30" value="2">
										<label for="ans_op30">Good</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans8" id="ans_op31" value="3">
										<label for="ans_op31">Very Good</label>
									</div>
									<div class="four columns">
										<input type="radio" name="ans8" id="ans_op32" value="4">
										<label for="ans_op32">Excellent</label>
									</div>									
									<span id="sp_ans8" class="error">Choose an option.</span>
								</div>
							</div>
							<div class="formRow">
								<h4 style="margin-bottom:15px">9). Teacher expresses clear expectations for my learning and performance in this class.</h4>
								<div class="row">
									<div class="three columns">
										<input type="radio" name="ans9" id="ans_op33" value="1">
										<label for="ans_op33">Average</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans9" id="ans_op34" value="2">
										<label for="ans_op34">Good</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans9" id="ans_op35" value="3">
										<label for="ans_op35">Very Good</label>
									</div>
									<div class="four columns">
										<input type="radio" name="ans9" id="ans_op36" value="4">
										<label for="ans_op36">Excellent</label>
									</div>									
									<span id="sp_ans9" class="error">Choose an option.</span>
								</div>
							</div>
							<div class="formRow">
								<h4 style="margin-bottom:15px">10). Teacher expresses clear expectations for my learning and performance in this class.</h4>
								<div class="row">
									<div class="three columns">
										<input type="radio" name="ans10" id="ans_op37" value="1">
										<label for="ans_op37">Average</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans10" id="ans_op38" value="2">
										<label for="ans_op38">Good</label>
									</div>
									<div class="three columns">
										<input type="radio" name="ans10" id="ans_op39" value="3">
										<label for="ans_op39">Very Good</label>
									</div>
									<div class="four columns">
										<input type="radio" name="ans10" id="ans_op40" value="4">
										<label for="ans_op40">Excellent</label>
									</div>									
									<span id="sp_ans10" class="error">Choose an option.</span>
								</div>
							</div>
							<div class="formRow cf">
								<input type="submit" class="button small" value="Submit">
								<input type="button" class="button small" value="Reset">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
