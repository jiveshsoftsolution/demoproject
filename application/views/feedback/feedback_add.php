<div class="nine columns">
    <div class="row">
        <div class="twelve columns">
			<div class="box_c">
				<div class="box_c_heading cf red">
				  <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
				  <p>Add Feedback</p>
				</div>
				<div class="box_c_content">
					<form action="<?php echo base_url()?>index.php/feedback/feedback/insert_feedback" id="frm_add_feedback" class="nice" method="post" onsubmit="return validate_add_feedback();">
					   <h3>Add Feedback</h3>             
						<div class="formRow">
							<div class="row">
								<div class="twelve columns">
									<label for="feedback_subject">Subject</label>
									<input id="feedback_subject" name="feedback_subject" class="input-text large"  placeholder="Subject">
									<span id="sp_feedback_subject" class="error">Enter Feedback Subject.</span>
								</div>
							</div>											
						</div>
						<div class="formRow">
							<div class="row">
								<div class="twelve columns">
									<label for="feedback_description">Description.</label>
									<textarea id="feedback_description" name="feedback_description" class="input-text large"  placeholder="Description" style="width:100%;height:250px"></textarea>
									<span id="sp_feedback_description" class="error">Enter Feedback Description.</span>
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
							<p>Feedback List</p>
						</div>
						<div class="box_c_content">
							<?php if((isset($feedback['result'])&& $feedback['result']==0) || count($feedback)==0) { ?>
							<div class="alert-box warning">
									Record not found!
									<a href="javascript:void(0)" class="close">×</a>
							</div> 
							<?php } else {?>
							<table class="display " id="content_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Subject</th>
										<th>Description</th>
										<th>Created Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php $i = 1; foreach($feedback as $feedback_data) { ?>
									<tr>
										<td class="essential"><?php echo $i++;?></td>
										<td><?php echo $feedback_data->feedback_subject;?></td>
										<td><?php echo $feedback_data->feedback_description;?></td>
										<td><?php echo date("m-d-Y",strtotime($feedback_data->created_date));?></td>
										<td class="content_actions">
											<a href="<?php echo base_url()?>feedback/feedback/edit_feedback/<?php echo $feedback_data->feedback_id?>" class="sepV_a" title="Edit">
											<img src="<?php echo base_url()?>assets/assets/img/ico/pencil_gray.png" alt="" /></a>&nbsp;&nbsp;&nbsp;
											<a title="Delete" href="<?php echo base_url()?>feedback/feedback/delete_feedback/<?php echo $feedback_data->feedback_id?>" onclick="return confirm('Are you sure want to delete this feedback?')" ><img alt="" src="<?php echo base_url()?>assets/assets/img/ico/trashcan_gray.png"></a>
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
