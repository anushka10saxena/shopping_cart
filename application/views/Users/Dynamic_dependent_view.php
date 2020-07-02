<!DOCTYPE html>
<html>
<head>
	<title>CODEIGNITER DYNAMIC DEPENDENT SELECT BOX USING AJAX</title>
<link rel="stylesheet" href="<?=base_url('Assets/css/bootstrap.min.css')?>"/ >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('Assets/js/bootstrap.min.js')?>" ></script>
<style>
	.box
	{
		width: 100%;
		max-width: 650px;
		margin: 0 auto;
	}
</style>
</head>
<body>
<div class="container box">
<br />
<br/>
	<h3 align="center">CODEIGNITER DYNAMIC DEPENDENT SELECT BOX USING AJAX</h3>
<br />
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
<br />
	<div class="form-group">
	<select name="state" id="state" class="form-control input-lg">
		<option value="">Select state</option>	
	</select>
    </div>
<br />
	<div class="form-group">
	<select name="city" id="city" class="form-control input-lg">
		<option value="">Select city</option>	
	</select>
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
					url:"<?php echo base_url();?>Dynamic_dependent_controller/fetch_state",
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
					url:"<?php echo base_url('Dynamic_dependent_controller/fetch_city') ?>",
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
</body>
</html>
