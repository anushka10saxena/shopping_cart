<?php include ('header.php');?>
<div class="container">
  <h1>Add Articles</h1>
  <?php echo form_open_multipart('admin/uservalidation'),
             form_hidden('user_id',$this->session->userdata('id')),
             form_hidden('created_at',date('Y-m-d H:i:s'));?>
<div class="row">
<div class="col-lg-6">
  <div class="form-group">
    <label for="Username">Article Title:</label>
    <?php echo form_input(['class'=>'form-control','name'=>'article_title','value'=>set_value('article_title'),
    'placeholder'=>'Enter Articletitle']);?>
  </div>
  </div>
  <div class="col-lg-6" style="margin-top: 40px;">
    <?php echo form_error('article_title',"<div class='text-danger'>",'</div>'); ?>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
   <div class="form-group">
    <label for="password">Article Body:</label>
    <?php echo form_textarea(['class'=>'form-control','name'=>'article_body','value'=>set_value('article_body'),
  'placeholder'=>'Enter Articlebody']);?>
   </div>
  </div>
  <div class='col-lg-6'style="margin-top: 40px">
    <?php echo form_error('article_body',"<div class='text-danger'>",'</div>');?>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
   <div class="form-group">
    <label for="body">Select Image:</label>
    <?php echo form_upload(['name'=>'userfile']);?>
   </div>
  </div>
  <div class='col-lg-6'style="margin-top: 40px">
    <?php if(isset($upload_error))
      {
        echo $upload_error;
      }
      ?>
  </div>
</div>
<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Submit']);?>
  <?php echo form_submit(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);?>
</div>

<?php include ('footer.php'); ?>    
  