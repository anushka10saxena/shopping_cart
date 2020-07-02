<?php include ('header.php');?>
<div class="container">
  <h1>Edit Articles</h1>
  <?php echo form_open("admin/updatearticle/{$article->id}");?>
 <!---- <?php// echo form_hidden('article_id',$article->id);?>----->
<div class="row">
<div class="col-lg-6">
  <div class="form-group">
    <label for="Username">Article Title:</label>
    <?php echo form_input(['class'=>'form-control','name'=>'article_title','value'=>set_value('article_title',$article->article_title),
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
    <?php echo form_textarea(['class'=>'form-control','name'=>'article_body','value'=>set_value('article_body',$article->article_body),
  'placeholder'=>'Enter Articlebody']);?>
   </div>
  </div>
  <div class='col-lg-6'style="margin-top: 40px">
    <?php echo form_error('article_body',"<div class='text-danger'>",'</div>');?>
  </div>
</div>
<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Submit']);?>
  <?php echo form_submit(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']);?>
</div>

<?php include ('footer.php'); ?>    
  