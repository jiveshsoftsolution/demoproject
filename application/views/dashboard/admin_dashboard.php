<script type="text/javascript" src="<?php echo base_url() ?>assets/chartjs/jquery.min.js"></script>
<script type="text/javascript">
/*  Student Attendance for Leave, Absent , Present*/
	$(function () {
		$('#attendanceClassSection').highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: 'Today Attendance Of Student'
			},
			xAxis: {
				categories: [ <?php if(isset($className))echo $className; ?> ]
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Students',
				},
				allowDecimals: false,
			},
			tooltip: {
				headerFormat: '<span style="color:{series.color};font-size:10px">Class Section :{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y} </b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true,
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [
				{				
					name: 'Present',
					data: [<?php if(isset($presentStudent)) echo $presentStudent;  ?>]				
				},
				{
					name: 'Absent',
					data: [<?php if(isset($absentStudent)) echo $absentStudent;  ?>]			
				},
				{			
					name: 'Leave',
					data: [<?php if(isset($leaveStudent)) echo $leaveStudent;  ?>]
				}
			]			
		});
	});	
/* END*/ 
</script>

<script type="text/javascript">
/*  Class Strength*/
$(function () {
        $('#class_section_strength').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Student Strength'
            },
            
            xAxis: {
                categories: [ <?php if(isset($classCategory))echo $classCategory; ?> ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Students'
                },
		allowDecimals: false,
            },
            tooltip: {
                headerFormat: '<span style="color:{series.color};font-size:10px">Class Section:{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Student',
                data: [<?php if(isset($classData)) echo $classData;  ?>]
    
            
            }]
            
        });
		});
	  /* END*/ 
</script>

<?php 
	$staff_names = "";
	$average_data = "";
	$good_data = "";
	$very_good_data = "";
	$excellent_data = "";
	if(isset($staffList)){
		$c = 0;
		$staff_names = "";
		foreach($staffList as $staff) { 
			$staff_names .= "'$staff',";			
			$c++;
		}
	}
	if(isset($staffFeedback['average'])){
		$c = 0;
		foreach($staffFeedback['average'] as $average) { 
			$average_data .= $average.",";			
			$c++;
		}
	}
	
	if(isset($staffFeedback['good'])){
		$c = 0;
		foreach($staffFeedback['good'] as $good) { 
			$good_data .= $good.",";			
			$c++;
		}
	}
	if(isset($staffFeedback['very_good'])){
		$c = 0;
		foreach($staffFeedback['very_good'] as $very_good) { 
			$very_good_data .= $very_good.",";			
			$c++;
		}
	}
	
	if(isset($staffFeedback['excellent'])){
		$c = 0;		
		foreach($staffFeedback['excellent'] as $excellent) { 
			$excellent_data .= $excellent.",";			
			$c++;
		}
	}

?>

<script type="text/javascript">
/*  Teacher Feedback*/
	$(function () {
		$('#teacher_feedback').highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: 'Teacher Feedback'
			},
			xAxis: {
				categories: [<?php echo rtrim($staff_names,","); ?>]
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Teacher`s Feedback (in percentage)'
				}
			},
			tooltip: {
				pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
				shared: true
			},
			plotOptions: {
				column: {
					stacking: 'percent'
				}
			},
			series: [{
				name: 'Average',
				data: [<?php echo rtrim($average_data,","); ?>]
			}, {
				name: 'Good',
				data: [<?php echo rtrim($good_data,","); ?>]
			}, {
				name: 'Very Good',
				data: [<?php echo rtrim($good_data,","); ?>]
			},{
				name: 'Excellent',
				data: [<?php echo rtrim($excellent_data,","); ?>]
			}]
		});
	});
	  /* END*/ 
</script>

<style type="text/css">
	.box_c_content
	{
		min-height:365px;
	}
	#footer
	{
		margin-bottom:-30px !important;
	}
</style>
<div class="nine columns">
	<div class="row">
		<div class="six columns">
			<div class="box_c">
				<div class="box_c_heading cf box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
					<p>Attendance Class
						<select name="attendance_class_id" id="attendance_class_id" style="display: inline-table">
							<option value="-1">All Class</option>
							<?php foreach($ems_class as $classRow) {?>
								<option  value="<?php echo $classRow->class_id; ?>"><?php echo $classRow->class_name;  ?> </option>
							<?php } ?>
						</select>
					</p>
				</div>
				<div class="box_c_content">
					<div class="inner_block">
						<div class="h_scrollable sepH_a sw_resizedEL" style="height:320px;">
							<div class="items" style="width: 100%">
								<div class="left" style="width: 100%">
									<div id="attendanceClassSection" style="height:290px;margin:0 auto; width:100%"  title="Combined chart"></div>
								</div>
								<div class="left">
									<div id="ds_plot2" title="Another chart" style="height:280px;margin:0 auto" class="chart_flw"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="six columns">
			<div class="box_c">
				<div class="box_c_heading cf box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
					<p>New Admission Charts</p>
				</div>
				<div class="box_c_content">
					<div class="inner_block">
						<div class="h_scrollable sepH_a sw_resizedEL" style="height:308px">
							<div class="items">
								<div class="left">
									<div id="new_admission" style="height:290px;margin:0 auto" class="chart_flw" title="Combined chart"></div>
								</div>
								<div class="left">
									<div id="ds_plot2" title="Another chart" style="height:280px;margin:0 auto" class="chart_flw"></div>
								</div>
							</div>
						</div>
						<!--<div class="row">
							<div class="four columns"> <a class="gh_button pill small image_from_chart" style="display:none;margin-top:10px" href="#">Create image from chart</a> </div>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="six columns">
			<div class="box_c">
				<div class="box_c_heading cf box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
					<p>Class Strength
						<select name="class_id" id="class_id" style="display:inline-table">
							<option  value="-1">All Class </option><?php
							foreach($ems_class as $classRow) {?>
								<option  value="<?php echo $classRow->class_id; ?>"><?php echo $classRow->class_name;  ?> </option>
							<?php } ?>
						</select> 
					</p>
				</div>
				<div class="box_c_content">
					<div class="inner_block">
						<div class="h_scrollable sepH_a sw_resizedEL" style="height:320px;">
							<div class="items" style="width: 100%">
								<div class="left" style="width: 100%">
									<div id="class_section_strength" style="height:290px;margin:0 auto; width:100%"  title="Combined chart"></div>
								</div>
								<div class="left">
									<div id="ds_plot2" title="Another chart" style="height:280px;margin:0 auto" class="chart_flw"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="six columns">
			<div class="box_c">
				<div class="box_c_heading cf box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
					<p>Notice Board</p>
				</div>
				<div class="box_c_content" style="overflow-x: hidden;overflow-y: scroll; height:350px; ">
					<p class="inner_heading sepH_c">All Notices</p>
					<ul class="overview_list">
					<?php if(!isset($ems_admin_notice['result'])){ foreach($ems_admin_notice as $adminNoticeData) {?>
						<li>
							<a href="#full_notice_view">
								<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/happy-face.png)" alt="" />
								<span class="ov_nb"><?php if(isset($adminNoticeData->notice_subject)){echo $adminNoticeData->notice_subject; }?></span>
								<?php if($adminNoticeData->post_to_web) { ?>								
									<img src="<?php echo base_url()?>assets/assets/img/new_red.gif" style="float: right !important;height: 14px;position: relative;right: 30px !important;top: -15px;width: 30px;">
								<?php }?>
								
								<span class="ov_text"><?php if(isset($adminNoticeData->notice)){echo $adminNoticeData->notice;} ?></span>
							</a>	
						</li>
						<?php  } }else { echo '<h2 align ="center">Notice Not Found </h2>';}?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="six columns">
			<div class="box_c">
				<div class="box_c_heading cf box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
						<p>Teacher Feedback
							<select name="class_section_id" id="class section_id_SP" style="display: inline-table">
							<?php foreach($classSection as $classSectonData) {?>
								<option value="<?php echo $classSectonData->class_section_id ?>"><?php echo $classSectonData->class_name.' - '.$classSectonData->section_name; ?></option>
							<?php } ?>
							</select>
						</p>
				</div>
				<div class="box_c_content">
					<div class="inner_block">
						<div class="h_scrollable sepH_a sw_resizedEL" style="height:320px;">
							<div class="items" style="width: 100%">
								<div class="left" style="width: 100%">
									<div id="teacher_feedback" style="height:290px;margin:0 auto; width:100%"  title="Combined chart"></div>
								</div>
								<div class="left">
									<div id="ds_plot2" title="Another chart" style="height:280px;margin:0 auto" class="chart_flw"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="six columns" style="display:none">
			<div class="box_c">
				<div class="box_c_heading cf box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
						<p>Class Strength</p>
				</div>
				<div class="box_c_content">
					<div class="inner_block">
						<div class="h_scrollable sepH_a sw_resizedEL" style="height:320px;">
							<div class="items" style="width: 100%">
								<div class="left" style="width: 100%">
									<div id="teacherPerformance" style="height:290px;margin:0 auto; width:100%"  title="Combined chart"></div>
								</div>
								<div class="left">
									<div id="ds_plot2" title="Another chart" style="height:280px;margin:0 auto" class="chart_flw"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" style="display: none">
		<div class="six columns">
			<div class="box_c">
				<div class="box_c_heading cf box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
					<p>
						Time Table 
						<select id="class_section_id" name="class_section_id" style="display: inline-table">
							<option value="-1">Select Class Section</option>
							<?php foreach($classSection as $classSectonData) {?>
								<option value="<?php echo $classSectonData->class_section_id ?>"><?php echo $classSectonData->class_name.' - '.$classSectonData->section_name; ?></option>
							<?php } ?>
						</select>
					</p>
				</div>
				<div class="box_c_content">
					<p class="inner_heading sepH_c">Latest info</p>
					<ul class="overview_listTime_table">
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">07:30 AM</span><span style="margin-left:50px">1th Period</span><span style="margin-left:50px">Hindi</span><span style="float:right; width:auto; font-weight:500; font-size:14px">Ranjan Singh</span>
							</a>
						</li>
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">08:30 AM</span><span style="margin-left:50px">2nd Period</span><span style="margin-left:50px">English</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">Amar Tiwari</span>
							</a>
						</li>
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">08:30 AM</span><span style="margin-left:50px">3rd Period</span><span style="margin-left:50px">Math</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">Rahul Pandey</span>
							</a>
						</li>
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">10:30 AM</span><span style="margin-left:50px">4th Period</span><span style="margin-left:50px">Science</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">Ritesh Mishra</span>
							</a>
						</li>
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">11:30 AM</span><span style="margin-left:50px">5th Period</span><span style="margin-left:50px">History</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">R. Thomus</span>                                     
							</a>
						</li>
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">12:30 PM</span><span style="margin-left:50px"> Interval </span>
							</a>
						</li>
						<li>
							<a href="#" style="text-decoration:none">
								<span class="green">1:30 PM</span><span style="margin-left:50px"> 6th Period</span><span style="margin-left:50px">English</span><span style="float:right; width:auto; font-weight:500;  font-size:14px">R. Sharma</span>     
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div style="display:none;height:300px;width:300px" id="full_notice_view">
	Hello How r u ?
</div>