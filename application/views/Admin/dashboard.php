<?php include('header.php');?>
<!---<?php// print_r($articles);?>--->
<div class="container" style="margin-top:50px;">
<a href="<?php echo base_url('admin/addarticle');?>" class="btn btn-primary">Add Article</a>
<?php if($article_added=$this->session->flashdata('article_added')):
	$article_added_class=$this->session->flashdata('article_added_class')?>
    <div class="row">
      <div class="col-lg-6">
        <div class="alert <?php echo $article_added_class;?>">
          <?php echo $article_added;?>
        </div>
      </div>
    </div>
    <?php endif;  ?>
<!---<?php //if($article_deleted=$this->session->flashdata('article_deleted')):
	$article_deleted_class//=$this->session->flashdata('article_deleted_class')?>
    <div class="row">
      <div class="col-lg-6">
        <div class="alert <?php// echo $article_deleted_class;?>">
          <?php //echo $article_deleted;?>
        </div>
      </div>
    </div>
    <?php //endif;  ?>---->
</div>
<!-----<?php// print_r($articles);?>--->
<div class="container" style="margin-top: 50px;">
	<!---<h1>login successfully!welcome to admin</h1>
</div>-->
<!--<?php// echo $this->db->last_query();?>--->
<table class="table table-bordered">
<thead>
	<tr>
    <th>S.no.</th>
	<th>Article Title</th>
	<th>Article Body</th>
	<th>Edit</th>
	<th>Delete</th>
    </tr>
</thead>
<tbody>
	<?php if (count($articles)):
	$count= $this->uri->segment(3);?>
	<?php foreach ($articles as $art):?>
	<tr>
		<td><?php echo ++$count;?></td>
		<td><?php echo $art->article_title; ?></td>
		<td><?php echo $art->article_body;?></td>
		<td><?php echo anchor("admin/editarticle/{$art->id}",'Edit',['class'=>'btn btn-primary']);?></td>	
		<td><?=
			form_open('admin/delarticle'),
		    form_hidden('id',$art->id),
		    form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']);
		    ?>
		    </td>
	</tr>
	<?php endforeach;?>
	<?php else:?>
		<tr>
			<td colspan="3">no data available</td>
		</tr>
    <?php endif;?>
</tbody>
</table>
<?php echo $this->pagination->create_links();?>
<!----<ul class="pagination">
	<li><a href=""><</a></li>
	<li><a href="">1</a></li>
	<li><a href="">2</a></li>
	<li><a href="">3</a></li>
	<li><a href="" class="active">4</a></li>
	<li><a href="">5</a></li>
	<li><a href="">></a></li>-->
</ul>
</div>
</div>
<?php include('footer.php');?>
