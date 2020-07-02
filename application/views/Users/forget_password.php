<?php include('header.php');?>
<!--<?php?>-->
<div class="container">
	<h1>Verify your email </h1>
	<?php if($error=$this->session->flashdata('not_verified')):?>
		<div class="row">
			<div class="col-lg-6">
				<div class="alert alert-danger">
					<?php echo $error;?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php echo form_open("Users/validate_email");?>
	    <div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="Email">Email:</label>
				<?php echo form_input(['class'=>'form-control','name'=>'email','value'=>set_value('email'),'placeholder'=>'Enter Email']);?>
				</div>
			</div>
		</br>
			<div class="form-group">
			<div class="col-lg-6">
				<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
				<!--<h1 align="center" style="color:green">countdown timer</h1>-->
					<!--<h3 style="color:#FF0000" align="center">-->
						<h5>
						you will be logged out in 5 minutes:<span id='timer'></span></h5>
						<script>
							var c=60;
							var t;
							timedCount();
							function timedCount()
							{
								//var hours = parseInt(c/3600)%24;
								var minutes = parseInt(c*5/60)%60;
								var seconds= c%60;
								//var result=(hours < 10 ? "0" + hours : hours) + (minutes <10 ? "0"+minutes :minutes)+(seconds <10 ? "0"+seconds : seconds);
								var result=(minutes <10 ? "0"+minutes :minutes)+(seconds <10 ? "0"+seconds : seconds);
								$('#timer').html(result);
								if(c==0)
								{
									window.location="<?php echo base_url('login')?>";
								}
								c=c-1;
								t= setTimeout(function()
								{
									timedCount()
								},
								1000);

							}
						</script>
		</div>
	</div>
	</div>
	</br>

		<?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'submit']);?>
		<!---<?php //echo anchor("Users/edit_pass/{$reset->id}",'submit',['class'=>'btn btn-primary']);?>---->
	</div>
	<!---<?php //include('footer.php');?>-->
