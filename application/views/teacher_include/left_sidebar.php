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
							<?php if(strlen($photo_url)==0) { ?>
								<img src="<?php echo base_url()?>assets/assets/img/no_image.gif" style="height:160px; border: 4px solid #00A8E1; background-image: url(<?php echo base_url()?>assets/assets/img/no_image_icon.png)" alt="" />							
							<?php }else { ?>							
								<img src="<?php echo base_url()?>assets/teachers_images/<?php echo $photo_url;?>" style="height:160px; border: 4px solid #00A8E1; background-image: url(<?php echo base_url()?>assets/assets/img/no_image_icon.png)" alt="" />
							<?php } ?>
						</div>						
					  </li>
					  <li><label><strong style="font-weight:600"><?php echo ucwords($userName); ?></strong></label></li>
					  <li><label><strong style="font-weight:600">Email :</strong></label> <?php echo $email; ?></li>
				   </ul>
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
									 <span class="ov_nb"><?php echo $birthday_t_data->first_name?></span>
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
		   
	      <!-- END LEFT SLIDE BAR-->