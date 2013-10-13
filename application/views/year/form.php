<div class="row">
	<form action="<?=base_url('year')?>" method="POST" class="span5">
		<fieldset>
			<legend>Добавление лет</legend>
			<?=form_error('year','<p class="text-error">','</p>');?>
			<label>ГОД</label>
			<input type="text" name="year" value="" placeholder="введите год" class="span3"></input><br/>
			
			<input  type="submit" class="btn btn-success" name="btnYearAdd" value="Добавить"/>
			<span class="help-inline"><b>Не добавлять лишние годы</b></span>
		</fieldset>
	</form>
</div>
<hr/>