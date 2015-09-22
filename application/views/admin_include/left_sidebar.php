<div class="container container_bg">
    <div class="row">
		<!-- Start Left Slide Bar-->
		<div class="three columns">
			<div class="box_c"> 
				<div style="display: none">
					<div class="box_c">
						<div class="box_c_heading cf box_actions" >
							<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
							<p>Student's Attendance</p>
						</div>
						<div class="box_c_content" >
							<p class="inner_heading sepH_c">Date: <?php echo date('d M, Y')?></p>
							<ul class="overview_list" >
								<div id="today_st_attendance" style="height:240px;margin:0 auto" class="chart_flw" title="Pie chart"></div>
								<li>
									<a href="#">
										<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/dollar.png)" alt="" />
										<span class="ov_nb" style="font-weight:normal">600 Present</span>
										<span class="ov_nb" style="font-weight:normal">100 Absent</span>
										<span class="ov_nb" style="font-weight:normal">100 Leave</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div style="display: none">
					<div class="box_c">
						<div class="box_c_heading cf box_actions">
							<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
							<p>Teacher's Attendance</p>
						</div>
						<div class="box_c_content">
							<p class="inner_heading sepH_c">Date: <?php echo date('d M, Y')?></p>
							<ul class="overview_list">
								<div id="today_teacher_attendance" style="height:220px;margin:0 auto" class="chart_flw" title="Pie chart"></div>
								<li>
									<a href="#">
										<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/dollar.png)" alt="" />
										<span class="ov_nb">50 Present</span>
										<span class="ov_nb">20 Absent</span>
										<span class="ov_nb">20 Leave</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div>
					<div class="box_c" >
						<div class="box_c_heading cf box_actions" >
							<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
							<p>Student's Birthday</p>
						</div>
						<div class="box_c_content" style="height:330px;margin:0 auto">
							<p class="inner_heading sepH_c">Date: <?php echo date('d M, Y')?></p>
							<ul class="overview_list">
								<marquee direction="up" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 6, 0);"  height="290px">
								    <?php $birthday_student_data = $this->session->userdata('birthday_student_data');
									if(count($birthday_student_data)!=0){
									    foreach($birthday_student_data as $birth_s_data){
								    ?>
									<li>
										<a href="#">
											<img src="<?php echo base_url()?>assets/students_images/resize_image/<?php echo $birth_s_data->photo_url;?>" style="background-image: url(<?php echo base_url()?>assets/assets/img/no_image_icon.png)" alt="" />
											<span class="ov_nb"><?php echo $birth_s_data->first_name." ".$birth_s_data->middle_name." ".$birth_s_data->last_name?></span>
											<span class="ov_text"><?php echo $birth_s_data->class_name."-".$birth_s_data->section_name;?></span>
										</a>
									</li>
								    <?php }} else{ ?>
									<li>
									    <a href="#" style="padding: 8px 15px 8px">
										<span class="ov_nb"><?php echo "No any birthday for the day!"?></span>
									    </a>
									    </li>
									<?php }?>
								</marquee>
							</ul>
						</div>
					</div>
				</div>
				<div>
					<div class="box_c" >
						<div class="box_c_heading cf box_actions" >
							<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
							<p>Teacher's Birthday</p>
						</div>
						<div class="box_c_content" style="height:auto;margin:0 auto">
							<p class="inner_heading sepH_c">Date: <?php echo date('d M, Y')?></p>
							<ul class="overview_list">
								<marquee direction="up" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 6, 0);"  height="290px">
									<?php
									if(count($birthday_teacher_data)!=0){
									    foreach($birthday_teacher_data as $birthday_t_data){
									?>
									    <li>
										<a href="#">
											<img src="<?php echo base_url()?>assets/teachers_images/<?php echo $birthday_t_data->photo_url?>" style="background-image: url(<?php echo base_url()?>assets/assets/img/no_image_icon.png)" alt="" />
											<span class="ov_nb"><?php echo ucfirst($birthday_t_data->first_name)." ".trim($birthday_t_data->middle_name)." ".$birthday_t_data->last_name?></span>
											<span class="ov_text"><?php echo $birthday_t_data->mobile?></span>
										</a>
									    </li>
									<?php } } else{ ?>
									<li>
									    <a href="#" style="padding: 8px 15px 8px ">
										<span class="ov_nb"><?php echo "No any birthday for the day!"?></span>
									    </a>
									</li>
									<?php }?>
								</marquee>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END LEFT SLIDE BAR-->

	

	