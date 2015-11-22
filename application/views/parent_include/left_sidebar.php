 <div class="container container_bg">
	<div class="row">
	<!-- Start Left Slide Bar-->
	<div class="three columns">
		<div class="box_c">
			<div class="box_c_heading cf box_actions green" >
				<p>Profile</p>
			</div>
			<div class="box_c_content" style="line-height:29px;height: 350px">
			    <ul class="sepH_b filter_content" >
				   <li>
					  <div class="user_avatar" style="vertical-align:top"> 							
						 <?php if(strlen($photo_url)==0) { ?>
							<img src="<?php echo base_url()?>assets/assets/img/no_image.gif" style="height:160px;width:180px; border: 4px solid #00A8E1; background-image: url(<?php echo base_url()?>assets/assets/img/no_image_icon.png)" alt="" />							
						<?php }else { ?>							
							<img src="<?php echo base_url()?>assets/parents_images/<?php echo $photo_url;?>" style="height:160px;width:180px; border: 4px solid #00A8E1; background-image: url(<?php echo base_url()?>assets/assets/img/no_image_icon.png)" alt="" />
						<?php } ?>
					  </div>
				   </li>
				   <li><label><strong style="font-weight:600"><?php echo ucwords($userName); ?></strong></label></li>
				   <li><label><strong style="font-weight:600">Email :</strong></label> <?php echo $email; ?></li>
				   <li><label><strong style="font-weight:600">Mobile :</strong></label> <?php echo $mobile; ?></li>
				   <li><label><strong style="font-weight:600">Child Name :</strong></label> <?php echo ucwords($child_name); ?></li>
			    </ul>
		     </div>
		</div>					
		<div>
			<!--<div class="box_c">
				<div class="box_c_heading cf box_actions green" >
					<p>Attendance</p>
				</div>
				<div class="box_c_content">
					<p class="inner_heading sepH_c">Current Month's</p>
						<ul class="overview_list">
							<div id="today_st_attendance" style="height:180px;margin:0 auto" class="chart_flw" title="Pie chart"></div>
								<li>
									<a href="#">
										<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/dollar.png)" alt="" />
										<span class="ov_nb">200 Present</span>
										<span class="ov_nb">200 leave</span>
										<span class="ov_nb">200 Absent</span>
									</a>
								</li>
						</ul>
				</div>
			</div>-->
		</div>					
	</div>				
             
	<!-- END LEFT SLIDE BAR-->

	

	