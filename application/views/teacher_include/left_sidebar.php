 <div class="container container_bg">
	<div class="row">
	<!-- Start Left Slide Bar-->
	<div class="three columns">
		<div class="box_c">
			<div class="box_c_heading cf box_actions green" >
				<p>Profile</p>
			</div>
			<div class="box_c_content" style="min-height:305px;line-height:30px">
				<ul class="sepH_b filter_content" >
					<li>
						<div class="user_avatar" style="vertical-align:top"> 
							<img src="<?php echo base_url()?>assets/teachers_images/resize_image/12.jpg" alt="" style="height:115px;border: 4px solid #00A8E1;" /> 
							<div style="margin-left: 135px; margin-bottom:50px;margin-top: -80px;"><strong style="font-weight:600"> <?php echo $userName; ?></strong></div>
						</div>
					</li>
					<li><label><strong style="font-weight:600">Email :</strong></label> <?php echo $email; ?></li>
					<li><label><strong style="font-weight:600">Class Teacher :</strong></label> VI-C</li>
                                        <?php
                                        foreach($teacherPaper as $Skey => $Pdata){
                                            ?>
                                        <li><label><strong style="font-weight:600">Expertise Subject :</strong></label> <?php echo $Skey; ?></li>
                                        <?php
                                        }
                                        ?>
					
				</ul>
			</div>
		</div>					
		<div>
			<div class="box_c">
				<div class="box_c_heading cf box_actions green" >
					<p>Attendance</p>
				</div>
				<div class="box_c_content">
					<p class="inner_heading sepH_c">Current Month's</p>
						<ul class="overview_list">
							<div id="today_st_attendance" style="height:200px;margin:0 auto" class="chart_flw" title="Pie chart"></div>
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
			</div>
		</div>					
	</div>				
             
	<!-- END LEFT SLIDE BAR-->

	

	