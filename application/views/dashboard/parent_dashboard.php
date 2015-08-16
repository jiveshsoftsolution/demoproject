<script type="text/javascript" src="<?php echo base_url() ?>assets/chartjs/jquery.min.js"></script>
<script type="text/javascript">
	/*  Student Attendance for Leave, Absent , Present*/
	$(function () {
	$('#mothelyAttendance').highcharts({
		chart: {
			type: 'column'
		},
		title: {
			text: 'Monthly Attendance'
		},
		xAxis: {
			categories: [
			'<?php echo date("F Y")?>',
			//'Feb',
			//'Mar',
			//'Apr',
			//'May',
			//'Jun',
			//'Jul',
			//'Aug',
			//'Sep',
			//'Oct',
			//'Nov',
			//'Dec',
			//''
			]
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Students'
			},
			allowDecimals: false,
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			'<td style="padding:0"><b>{point.y:1f} </b></td></tr>',
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
					name: 'Present',
					data: [<?php echo $present_count_month->present_count?>]
				},				   
				{				
					name: 'Absent',
					data: [<?php echo $absent_count_month->absent_count?>]				
				},
				{				
					name: 'Leave',
					data: [<?php echo $leave_count_month->leave_count?>]				
				}
				]
		});
	});
	/* END*/ 
</script>

<div class="nine columns">

	<div class="row">		
		<div class="six columns">
			<div class="box_c">
				<div class="box_c_heading cf green box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Graph.png" alt="" /></div>
					<p>Attendance Record</p>
				</div>
				<div class="box_c_content" style=" overflow:scroll; height:350px; ">
					<div class="inner_block">
						<div class="h_scrollable sepH_a sw_resizedEL" style="height:280px">
							<div class="items">
								<div class="left">
									<div id="mothelyAttendance" style="height:290px;margin:0 auto" class="chart_flw" title="Pie chart"></div>
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
			<div class="box_c" >
				<div class="box_c_heading cf box_actions">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
					<p>Notice Area</p>
				</div>
				<div class="box_c_content" style=" overflow:scroll; height:350px; ">
					<p class="inner_heading sepH_c">Latest info</p>
					<ul class="overview_list">
					<?php if(!isset($ems_admin_notice['result'])){ foreach($student_notice as $studentNoticeData) {?>
						<li>
							<a href="#">
								<img src="<?php echo base_url()?>assets/assets/img/blank.gif" style="background-image: url(<?php echo base_url()?>assets/assets/img/ico/open/happy-face.png)" alt="" />
								<span class="ov_nb"><?php if(isset($studentNoticeData->notice_subject)){echo $studentNoticeData->notice_subject; }?></span>
								<span class="ov_text"><?php if(isset($studentNoticeData->notice)){echo $studentNoticeData->notice;} ?></span>
							</a>
						</li>
						<?php  } }else { echo '<h2 align ="center">Notice Not Found </h2>';}?>
						
					</ul>
				</div>
			</div>
		</div>		
	</div>

	<div class="row">
		<div class="twelve columns">
			<div class="box_c">
				<div class="box_c_heading cf box_actions green">
					<div class="box_c_ico"><img src="<?php echo base_url()?>assets/assets/img/ico/icSw2/16-Abacus.png" alt="" /></div>
					<p>Time Table</p>
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
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>