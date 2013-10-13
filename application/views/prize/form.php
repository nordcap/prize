<div class="row">
	<form action="<?=base_url('prize')?>" method="POST" class="span5">
		<fieldset>
			<legend>Добавление наград</legend>
			<?=form_error('short_name','<p class="text-error">','</p>');?>
			<label>Аббревиатура</label>
			<input type="text" name="short_name" value="" placeholder="введите аббревиатуру" class="span3"></input>
			<?=form_error('name','<p class="text-error">','</p>');?>
			<label>Название</label>
			<input type="text" name="name" value="" placeholder="введите название" class="span3"></input>			
			<?=form_error('comment','<p class="text-error">','</p>');?>
			<label>Комментарий</label>
			<input type="text" name="comment" value="" placeholder="введите комментарий" class="span3"></input><br/>
			<input  type="submit" class="btn btn-success" name="btnPrizeAdd" value="Добавить"/>
		</fieldset>
	</form>
</div>
<hr/>