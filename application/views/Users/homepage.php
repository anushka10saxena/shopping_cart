<?php include('header.php');?>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?= base_url("Assets/js/bootstrap.min.js") ?>"></script>
<script>
	$(document).ready(function(){
		$("#myInput").on("keyup",function(){
			var value=$(this).val().toLowerCase();
			$("#myTable tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
			});
		});
	});
</script>
<div class="container">
<div class="row">
<div class="col-lg-4">
<form class="form-inline">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="myInput">
      <button class="btn btn-outline-success" type="submit">Search</button>
</form>
</div>
</div>
</div>
<!---<?php// print_r($articles);?>--->
<div class="container" style="margin-top:50px;">
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
<!-----<?php// print_r($articles);?>--->
<h1>Article List</h1>
<!--<?php// echo $this->db->last_query();?>--->

<table class="table table-bordered">
<thead>
	<tr>
    <th>S.no.</th>
    <th>Article Image</th>
	<th>Article Title</th>
	<th>Article Body</th>
	<th>Published On</th>
    </tr>
</thead>
<tbody id="myTable">
	<?php if (count($articles)):
	$count= $this->uri->segment(3);?>
	<?php foreach ($articles as $art):?>
	<tr>
		<td><?php echo ++$count;?></td>
		<?php if(!is_null($art->image_path)):?>
		<td> <img src="<?php echo $art->image_path?>" alt="" width="280" height="200"></td>
	    <?php endif;?>
		<td><?php echo $art->article_title; ?></td>
		<td><?php echo $art->article_body;?></td>
		<td><?=date('d-m-y H:i:s',strtotime($art->created_at));?></td>
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
	<li><a href="">></a></li>
</ul>--->
</div>
<?php include('footer.php');?>
