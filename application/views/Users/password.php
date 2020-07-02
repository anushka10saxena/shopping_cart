<?php include('header.php');?>
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
	<?php echo form_open("Users/update_pass/{$reset->id}");?>
	
	    <div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="password">New Password:</label>
				<?php echo form_input(['class'=>'form-control','type'=>'password','name'=>'password','value'=>set_value('password'),'placeholder'=>'Enter New Password ']);?>
				</div>
			</div>
		</br>
			<div class="col-lg-6">
					<?php echo form_error('password',"<div class='text-danger'>",'</div>');?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="password">Confirm New Password:</label>
				<?php echo form_input(['class'=>'form-control','type'=>'password','name'=>'confpassword','value'=>set_value('new password'),'placeholder'=>'Enter  Password again']);?>
				</div>
			</div>
		</br>
			<div class="col-lg-6">
				<?php echo form_error('confpassword',"<div class='text-danger'>",'</div>');?>
			</div>
		</div>
		<?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'submit']);?>
	</div>
	<?php include('footer.php');?>