<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>UDT eSchool | Forgot Password</title>
		<?php echo $this->load->view('common/scripts');?>
		<script type="text/javascript">
			function validate_forgot(){
				var flag = true;
				if($("#email").val()==""){
					flag = false;
					$("#sp_email").css('display','block');	
				}else{
					$("#sp_email").css("display","none");
				}
				return flag;
			}
		</script>
	</head>
	<body class="grdnt_a login_bg">
		<div style="background-color:rgba(255,255,255,0.5);position:fixed;top:0;left:0;right:0;bottom:0;width:100%;height:100%;"></div>
		<div class="container">
			<div class="row">
				<div class="eight columns centered"> </div>
			</div>
			<div class="row">
				<div class="six columns centered">
					<div class="login_box">
						<div class="lb_content">
							<div class="login_logo">
								<div style="float:left;"><img src="<?php echo base_url()?>assets/assets/img/school_logo.png" alt="" /></div>
							</div>
							<div class="cf">
								<h2 class="lb_ribbon lb_blue"><span>Forgot Password</span></h2>
							</div>
							<div class="row m_cont">
								<div class="eight columns centered">
									<div class="l_pane">
										<form action="<?php echo base_url()?>index.php/login/forgot_password" method="post" class="nice" id="rp_form" onsubmit="return validate_forgot()">
											<div class="sepH_c">
												<p class="sepH_b">Please enter your email address or mobile no. You will receive your password on registered email or mobile no.</p>
												<div class="elVal">
													<label for="email">E-mail / Mobile No:</label>
													<input type="text" id="email" name="email" class="expand input-text"  placeholder="Email / Mobile" />
												</div>
												<span id="sp_email" class="error">Enter email/mobile.</span>
												<?php if(!empty($errorInfo)) { ?><div class="cf" style="color: #fff;font-size: 14px !important; font-weight: 600; line-height: 20px !important; font-family: 'Open Sans',sans-serif;padding:5px 5px 5px 10px;background-color:#FFAB25"><?php echo $errorInfo." .";?></div> <?php }?>
											</div>
											<div class="cf">
												<input type="submit" class="button small radius right black" value="Submit" />
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>