<?php include ('header.php');?>
<div class="container">
  <h1>Admin Form</h1>
  <?php if($error=$this->session->flashdata('login_failed')):?>
    <div class="row">
      <div class="col-lg-6">
        <div class="alert alert-danger">
          <?php echo $error;?>
        </div>
      </div>
    </div>
    <?php endif;  ?>
    <?php if($user_added=$this->session->flashdata('user_added')):
  $user_added_class=$this->session->flashdata('user_added_class')?>
    <div class="row">
      <div class="col-lg-6">
        <div class="alert <?php echo $user_added_class;?>">
          <?php echo $user_added;?>
        </div>
      </div>
    </div>
    <?php endif;  ?>
    
<?php echo form_open('login/index/'); ?>
<div class="row">
<div class="col-lg-6">
  <div class="form-group">
    <label for="Username">Username:</label>
    <?php echo form_input(['class'=>'form-control','name'=>'uname','value'=>set_value('uname'),
    'placeholder'=>'Enter Username']);?>
  </div>
  </div>
  <div class="col-lg-6" style="margin-top: 40px;">
    <?php echo form_error('uname',"<div class='text-danger'>",'</div>'); ?>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
   <div class="form-group">
    <label for="password">Password:</label>
    <?php echo form_input(['class'=>'form-control','type'=>'password','name'=>'pass','value'=>set_value('pass'),
  'placeholder'=>'Enter Password']);?>
   </div>
  </div>
  <div class='col-lg-6'style="margin-top: 40px">
    <?php echo form_error('pass',"<div class='text-danger'>",'</div>');?>
  </div>
</div>
<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Submit']);?>
  <?php echo form_submit(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);?>
  <?php echo anchor('login/register','Sign up?',['class'=>'link-class']);?>
</br>
</br>
  <?php echo anchor('Users/forget_password','Forget Password?',['class'=>'link-class']);?>
</div>

<?php include ('footer.php'); ?>    
  