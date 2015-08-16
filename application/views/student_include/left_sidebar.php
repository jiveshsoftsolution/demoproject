<div class="container container_bg">
       <div class="row">
	<!-- Start Left Slide Bar-->
       <div class="three columns">
	      <div class="box_c">
		     <div class="box_c_heading cf box_actions green" >
			    <p>Profile</p>
		     </div>
		     <div class="box_c_content" style="line-height:30px">
			    <ul class="sepH_b filter_content" >
				   <li>
					  <div class="user_avatar" style="vertical-align:top"> 							
						 <img src="<?php echo base_url()?>assets/students_images/<?php echo $photo_url;?>" style="height:160px; border: 4px solid #00A8E1; background-image: url(<?php echo base_url()?>assets/assets/img/no_image_icon.png)" alt="" />
					  </div>
				   </li>
				   <li><label><strong style="font-weight:600"><?php echo ucwords($studentName); ?></strong></label></li>
				   <li><label><strong style="font-weight:600">S/O :</strong></label> <?php echo ucwords($fatherName); ?></li>
				   <li><label><strong style="font-weight:600">Class-Section :</strong></label> <?php echo $classSection; ?></li>				   
				   <?php if(!empty($email)) { ?>
					  <li><label><strong style="font-weight:600">Email :</strong></label> <?php echo $email; ?></li>
				   <?php }?>
				   <?php if(!empty($roll_number)) { ?>
					  <li><label><strong style="font-weight:600">Roll No. :</strong></label> <?php echo $roll_number; ?></li>
				   <?php }?>
			    </ul>
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
	</div>				
             
	<!-- END LEFT SLIDE BAR-->

	

	