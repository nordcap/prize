<!DOCTYPE html>
<html>
  <head>
    <title>Награды для героев</title>
    <meta charset="utf-8">
    <meta name="description" content="Приложение для просмотра награжденных"> 
    <!-- Bootstrap -->
    <link href="<?=base_url('public_html/css/bootstrap.min.css')?>" rel="stylesheet" media="screen">
  </head>
  <body>
  	<header>
	<?php $this->load->view('layout/navigation');?>
	</header>
  	<div class="container">
	<?php $this->load->view($input_form);?>
	<?php $this->load->view($content);?>
	</div>
    
    <script src="<?=base_url('public_html/js/jquery-2.0.2.min.js')?>"></script>
    <script src="<?=base_url('public_html/js/bootstrap.min.js')?>"></script>
	<script>
		$(document).ready(function(){
			$('.nav li').click(function(obj)
			{
				$(obj.target).attr('class','active');
			});
			
			
		});
	</script>
  </body>
</html>