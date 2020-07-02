<?php include('header.php'); ?>
<div class="container">
  <h1>Register Form</h1>
<?php echo form_open("login/sendemail"); ?>
<!---<?php //echo form_hidden('country_id',$country->country_id);?>---->
<div class="row">
<div class="col-lg-6">
  <div class="form-group">
    <label for="Username">Username:</label>
    <?php echo form_input(['class'=>'form-control','name'=>'username','value'=>set_value('username'),
    'placeholder'=>'Enter Username']);?>
  </div>
  </div>
  <div class="col-lg-6" style="margin-top: 40px;">
    <?php echo form_error('username',"<div class='text-danger'>",'</div>'); ?>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
   <div class="form-group">
    <label for="password">Password:</label>
    <?php echo form_input(['class'=>'form-control','type'=>'password','name'=>'password','value'=>set_value('password'),
  'placeholder'=>'Enter Password']);?>
   </div>
  </div>
  <div class='col-lg-6'style="margin-top: 40px">
    <?php echo form_error('password',"<div class='text-danger'>",'</div>');?>
  </div>
</div>
<div class="row">
<div class="col-lg-6">
  <div class="form-group">
    <label for="firstname">Firstname:</label>
    <?php echo form_input(['class'=>'form-control','name'=>'firstname','value'=>set_value('firstname'),
    'placeholder'=>'Enter Firstname']);?>
  </div>
  </div>
  <div class="col-lg-6" style="margin-top: 40px;">
    <?php echo form_error('firstname',"<div class='text-danger'>",'</div>'); ?>
  </div>
</div>
<div class="row">
<div class="col-lg-6">
  <div class="form-group">
    <label for="lastname">Lastname:</label>
    <?php echo form_input(['class'=>'form-control','name'=>'lastname','value'=>set_value('lastname'),
    'placeholder'=>'Enter Lastname']);?>
  </div>
  </div>
  <div class="col-lg-6" style="margin-top: 40px;">
    <?php echo form_error('lastname',"<div class='text-danger'>",'</div>'); ?>
  </div>
</div>
<div class="row">
<div class="col-lg-6">
  <div class="form-group">
    <label for="email">Email adddress:</label>
    <?php echo form_input(['class'=>'form-control','name'=>'email','value'=>set_value('email'),'type'=>'email',
    'placeholder'=>'Enter email']);?>
  </div>
  </div>
  <div class="col-lg-6" style="margin-top: 40px;">
    <?php echo form_error('email',"<div class='text-danger'>",'</div>'); ?>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
  .box
  {
    width: 0%;
    
    margin: auto 0;
  }
</style>
<body>
  <div class="row">
    <div class="col-lg-4">
  <div class="form-group">
  <select name="country" id="country" class="form-control input-lg">
    <option value="">Select country</option>
    <?php foreach ($country as $row) 
    {
      echo '<option value="'.$row->country_id.'">'.$row->country_name.'</option>';
    } 
    ?>
  </select>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4">
  <div class="form-group">
  <select name="state" id="state" class="form-control input-lg">
    <option value="">Select state</option>  
  </select>
    </div>
  </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-lg-4">
  <select name="city" id="city" class="form-control input-lg">
    <option value="">Select city</option> 
  </select>
</div>
</div>
    </div>
<script>
  $(document).ready(function(){
    $('#country').change(function(){
      var country_id=$('#country').val();
      //alert(country_id);
      //exit;

      if(country_id!='')
      {
        $.ajax({
          url:"<?php echo base_url();?>login/fetch_state",
          method:"POST",
          data:{country_id:country_id},
          success:function(data)
          {
            $('#state').html(data);
            $('#city').html('<option value="">select city</option>');
          }

        });
      }
      else
      {
        $('#state').html('<option value="">select state</option>');
        $('#city').html('<option value="">select city</option>');
      }
    });
    $('#state').change(function(){
      var state_id=$('#state').val();
      if(state_id!='')
      {
        $.ajax({
          url:"<?php echo base_url('login/fetch_city') ?>",
          method:"POST",
          data:{state_id:state_id},
          success:function(data)
          {
            $('#city').html(data);
            //$('#city').html('<option value="">select city</option>');
          }

        });
      }
      else
      {
        //$('state').html('<option value="">select state</option>');
        $('#city').html('<option value="">select city</option>');
      }
    });
  });
</script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?= base_url("Assets/js/bootstrap.min.js") ?>"></script>
<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Submit']);?>
<?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);?> 
</div>
<?php include('footer.php'); ?>