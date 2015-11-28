<script>
	$(document).ready(function() {
		get_state();
		$("#mobile").mask("9999999999"); 
	});
	function get_state()
	{	
		var country_id = $("#country_id").val();
		var dataString = "country_id="+ country_id;
		var urldata = '<?php echo base_url()?>';
		$.ajax({
				url:urldata+'index.php/student/student/retrive_state_list/',
				data:dataString,
				type:'POST',
				success:function(response){
						var obj = JSON.parse(response);
						$("#state_id option").remove();
						$('#state_id').append($('<option>', {
												value: -1,
												text: "Select State"
								}));
						for(var i=0;i<obj.length;i++)
						{
							var state_id ='<?php echo $staffRecord->state_id;?>';
							if(state_id==obj[i].state_id)
							{
								$('#state_id').append("<option value='"+obj[i].state_id+"' selected='selected'>"+obj[i].state_name+"</option>");
							}
							else
							{
								$('#state_id').append("<option value='"+obj[i].state_id+"'>"+obj[i].state_name+"</option>");
							}
						}
						get_city();
				}
					
		});
	}
	function get_city()
	{	
		var state_id = $("#state_id").val();
		var dataString = "state_id="+ state_id;
		var urldata = '<?php echo base_url()?>';
		$.ajax({
				url:urldata+'index.php/student/student/retrive_city_list/',
				data:dataString,
				type:'POST',
				success:function(response){
						var obj = JSON.parse(response);
						$("#city_id option").remove();
						$('#city_id').append($('<option>', {
												value: -1,
												text: "Select City"
								}));
						for(var i=0;i<obj.length;i++)
						{
						
							var city_id ='<?php echo $staffRecord->city_id;?>';
							if(city_id==obj[i].city_id)
							{
								$('#city_id').append("<option value='"+obj[i].city_id+"' selected='selected'>"+obj[i].city_name+"</option>");
							}
							else
							{
								$('#city_id').append("<option value='"+obj[i].city_id+"'>"+obj[i].city_name+"</option>");
							}
						}
				}
					
		});
	}
</script>

	<div class="nine columns">
      <div class="row">
        <div class="twelve columns">
          <div class="box_c">
            <div class="box_c_heading cf">
              <div class="box_c_ico"><img src="<?php echo base_url();?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
              <p>Staff Registration Form</p>
            </div>
            <div class="box_c_content">
			<?php if(isset($upload_error)) { ?>
				<div class="alert-box warning">
					<?php echo $upload_error;?>
					<a href="javascript:void(0)" class="close">×</a>
				</div> 
			<?php } ?>
			<?php if(isset($registration_message)) { ?>
				<div class="alert-box warning">
					<?php echo $registration_message;?>
					<a href="javascript:void(0)" class="close">×</a>
				</div> 
			<?php } ?>
              <form action="<?php echo base_url()?>index.php/staff/staff/staff_edit" id="frm_staff_registration" enctype="multipart/form-data"  class="nice" method="post" onsubmit="return validate_staff_registration();">
			   
			   <h3>Personal Information</h3>
				<div class="formRow">
                  <div class="row">
					<div class="three columns">
						<label for="salutation_id">Salutation</label>
						<select class="small" name="salutation_id" id="salutation_id">
							<?php foreach($salutation as $salutationData) {?>
								<option value="<?php echo $salutationData->salutation_id?>" <?php if($salutationData->salutation_id==$staffRecord->salutation_id) echo "selected='selected'"?>><?php echo $salutationData->salutation;?></option>
							<?php }?>
						</select>
						<span id="sp_salutation_id" class="error">Select Salutation.</span>
					</div>
                    <div class="three columns">
					  <label for="first_name">First Name <span class="sp_required">*</span></label>
					  <input type="text" id="first_name" name="first_name" class="input-text small" placeholder="First Name" value="<?php echo $staffRecord->first_name?>"/>
					  <input type="hidden" id="hd_staff_id" name="hd_staff_id" value="<?php echo $staffRecord->staff_id?>"/>
					  <span id="sp_first_name" class="error">Enter First Name.</span>
                    </div>
                    <div class="three columns">
					  <label for="middle_name">Middle Name</label>
					  <input type="text" id="middle_name" name="middle_name" class="input-text small" placeholder="Middle Name" value="<?php echo $staffRecord->middle_name?>"/>
                    </div>
                    <div class="four columns">
					  <label for="last_name">Last Name <span class="sp_required">*</span></label>
					  <input type="text" id="last_name" name="last_name" class="input-text small" placeholder="Last Name" value="<?php echo $staffRecord->last_name?>"/>
					  <span id="sp_last_name" class="error">Enter Last Name.</span>
                    </div>
                  </div>
                </div>
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="gender">Gender <span class="sp_required">*</span></label>
						  <select name="gender" id="gender" class="small">
							<option value="M" <?php if($staffRecord->gender=="M") echo "selected='selected'"?>>Male</option>
							<option value="F" <?php if($staffRecord->gender=="F") echo "selected='selected'"?>>Female</option>
						  </select>
						  <span id="sp_gender" class="error">Select Gender.</span>
						</div>
						<div  class="four columns">
							<label for="dob" style="padding:0">Date of Birth</label>
							<input type="text" id="datepicker-example1" name="dob" class="input-text large" placeholder="Date of Birth" value="<?php echo date('Y-m-d',strtotime($staffRecord->dob));?>" />
							<span id="sp_dob" class="error">Enter Date of Birth.</span>
						</div>
						<div  class="four columns">
							<label for="card_no">Card No.</label>
							<input type="text" id="card_no" name="card_no" class="input-text small" placeholder="Card No" value="<?php echo $staffRecord->card_no ?>"/>
							<span id="sp_card_no" class="error">Enter Card No.</span>
						</div>
					</div>
                </div>
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="school_user_type_id">Staff Category</label>
						  <select name="school_user_type_id" id="school_user_type_id" class="small">
							<option value="-1">Staff Category</option>
							<?php foreach($user_type as $userTypeData) {?>
							<option value="<?php echo $userTypeData->school_user_type_id?>" <?php if($userTypeData->school_user_type_id==$staffRecord->school_user_type_id) echo "selected='selected'"?>><?php echo $userTypeData->user_type;?></option>
							<?php  } ?>
						</select>
						<span id="sp_class_section_id" class="error">Select Staff Category.</span>
						</div>
						<div class="three columns">
						  <label for="phone">Phone No.</label>
							<input type="text" id="phone" name="phone" class="input-text small" placeholder="Phone No." value="<?php echo $staffRecord->phone?>" />
							<span id="sp_phone" class="error">Enter Phone No.</span>
						</div>
						<div  class="seven columns">
							<label for="email">Email</label>
							<input type="text" id="email" name="email" class="input-text large" placeholder="Email" value="<?php echo $staffRecord->email?>" />
							<span id="sp_email" class="error">Enter Email.</span>
						</div>
					</div>
                </div>
				<div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="address1">Address Line 1 <span class="sp_required">*</span></label>
						  <input type="text" id="address1" name="address1" class="input-text small" placeholder="Address Line 1 " value="<?php echo $staffRecord->address1?>"/>
						  <span id="sp_address1" class="error">Enter Address.</span>
						</div>
						<div class="three columns">
							<label for="address2">Address Line 2</label>
							<input type="text" id="address2" name="address2" class="input-text small" placeholder="Address Line 2 " value="<?php echo $staffRecord->address2?>"/>
						</div>
						<div class="seven columns">
							<label for="address3">Address Line 3</label>
							<input type="text" id="address3" name="address3" class="input-text large" placeholder="Address Line 3" value="<?php echo $staffRecord->address3?>"/>
						</div>
					</div>
				</div>
                <div class="formRow">
					<div class="row">
						<div class="three columns">
						  <label for="country_id">Country</label>
						  <select name="country_id" id="country_id" class="small" onchange="get_state();">
							<?php foreach($country as $countryData) {?>
							<option value="<?php echo $countryData->country_id?>" <?php if($countryData->country_id==$staffRecord->country_id) echo "selected='selected'"?>><?php echo $countryData->country_name;?></option>
							<?php  } ?>
						  </select>
						  <span id="sp_country_id" class="error">Select Country.</span>
						</div>
						<div class="three columns">
							<label for="state_id">State <span class="sp_required">*</span></label>
							<select class="small" name="state_id" id="state_id" onchange="get_city();">
								<option value="-1">Select State</option>
							</select>
							<span id="sp_state_id" class="error">Select State.</span>
						</div>
						<div class="three columns">
							<label for="city_id">City <span class="sp_required">*</span></label>
							<select class="small" name="city_id" id="city_id">
								<option value="-1">Select City</option>
							</select>
							<span id="sp_city_id" class="error">Select City.</span>
						</div>
						<div class="four columns">
							<label for="mobile">Mobile No. <span class="sp_required">*</span></label><label style="font-family: tahoma !important; font-size: 11px;">(10 Digits only)</label>
							<input type="text" id="mobile" name="mobile" class="input-text small" placeholder="Mobile No" value="<?php echo $staffRecord->mobile?>"/>
							<span id="sp_mobile" class="error">Enter Mobile No.</span>
						</div>
					</div>
				</div>
                <div class="formRow">
					<div class="row">
						<div  class="three columns">
							<label for="pincode">Pincode</label>
							<input type="text" id="pincode" name="pincode" class="input-text large" placeholder="Pincode" value="<?php echo $staffRecord->pincode?>" />
							<span id="sp_pincode" class="error">Enter Pincode.</span>
						</div>
						<div  class="seven columns">
							<label for="photo_url">Photo</label>
							<input type="file" id="photo_url" name="photo_url" class="input-text large" />
							<input type="hidden" id="hd_photo_url" name="hd_photo_url" value="<?php echo $staffRecord->photo_url?>"/>
							<span id="sp_photo_url" class="error">Upload Photo.</span>
						</div>
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
 