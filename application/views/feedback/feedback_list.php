<script type="text/javascript">
    function make_mark_read(feedback_id){
	var dataString = "feedback_id="+ feedback_id;
	var urldata = '<?php echo base_url()?>';
	$.ajax({
		url:urldata+'index.php/feedback/feedback/mark_read_feedback/',
		data:dataString,
		type:'POST',
		success:function(response){}
	}).done(function( data ) {
		var base_path ="<?php echo base_url()?>";
		var img_path ="<img src='"+base_path+"assets/assets/img/check-mark-icon.png' />";
		$("#td_"+data).html(img_path);
		
	});
    }
</script>
<div class="nine columns">
    <div class="row">
        <div class="twelve columns">
	    <div class="box_c">
		<div class="box_c_heading cf">
		    <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
		    <p>Feedback</p>
		</div>
		<div class="box_c_content">
		    <form action="<?php echo base_url()?>index.php/feedback/feedback/feedback_list" id="frm_add_feedback" class="nice" method="post" onsubmit="return validate_add_feedback();">
		        <h3>Filter Feedback</h3>             
			<div class="formRow">
			    <div class="row">
				<div  class="four columns">
				    <label for="datepicker-example1" style="padding:0">Start Date</label>
				    <input type="text" id="datepicker-example1" name="start_date" class="input-text" placeholder="Start Date" value="<?php echo date('Y-m-d')?>"/>
				    <span id="sp_dob" class="error">Enter Start Date.</span>
				</div>
				<div  class="four columns">
				    <label for="datepicker-example2" style="padding:0">End Date</label>
				    <input type="text" id="datepicker-example2" name="end_date" class="input-text" placeholder="End Date" value="<?php echo date('Y-m-d')?>"/>
				    <span id="sp_dob" class="error">Enter End Date.</span>
				</div>
				<div  class="four columns">
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
										<th>Created By</th>
										<th>User Type</th>
										<th>Created Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php $i = 1; foreach($feedback as $feedback_data) { ?>
									<tr>
										<td class="essential"><?php echo $i++;?></td>
										<td><?php if(strlen($feedback_data['feedback_subject'])>50) echo substr(ucfirst($feedback_data['feedback_subject']),0,50)."..."; else echo substr(ucfirst($feedback_data['feedback_subject']),0,50); ?></td>
										<td style="word-wrap: break-word !important"><?php if(strlen($feedback_data['feedback_subject'])>50) echo substr(ucfirst($feedback_data['feedback_description']),0,150)."..."; else  echo substr(ucfirst($feedback_data['feedback_description']),0,150);?></td>
										<td><?php echo ucwords($feedback_data['created_by']);?></thd>
										<td><?php
										    if($feedback_data['user_type']=="A"){
											echo ucwords("Admin");
										    } else if($feedback_data['user_type']=="S"){
											echo ucwords("Student");
										    } else if($feedback_data['user_type']=="P"){
											echo ucwords("Parent");
										    } else if($feedback_data['user_type']=="T"){
											echo ucwords("Teacher");
										    } else if($feedback_data['user_type']=="C"){
											echo ucwords("Co-ordinator");
										    }
										    ?></td>
										<td><?php echo date("m-d-Y",strtotime($feedback_data['created_date']));?></td>
										<td class="content_actions" id="td_<?php echo $feedback_data['feedback_id']?>">
										    <?php if(!$feedback_data['as_read']) { ?>
											<a href="javascript:void(0)" onclick="make_mark_read(<?php echo $feedback_data['feedback_id']?>)" id="read_<?php echo $feedback_data['feedback_id']?>" class="sepV_a" title="Edit">
											    Mark as read
											</a>
										    <?php } else {?>
											<img src="<?php echo base_url()?>assets/assets/img/check-mark-icon.png" alt="" />
										    <?php } ?>
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
