<div class="row">
	<form action="<?=base_url('main/index')?>" method="POST" class="span5">
		<fieldset>
			<legend>Вручение награды сотруднику</legend>
			
			<?=form_error('id_employee','<p class="text-error">','</p>');?>
			<label>ФИО</label>
			<select  class="span5" name="id_employee">
			<?php foreach($lstEmployee as $employee):?>
				<option value="<?=$employee['id']?>" <?= set_select('id_employee',$employee['name'])?>><?=$employee['name']?></option>
			<?php endforeach;?>	
			</select>
			
			<?=form_error('id_prize','<p class="text-error">','</p>');?>
			<label>Награда</label>
			<select  class="span5" name="id_prize">
			<?php foreach($lstPrize as $prize):?>
				<option value="<?=$prize['id']?>" <?= set_select('id_prize',$prize['name'])?>><?=$prize['name']?></option>
			<?php endforeach;?>	
			</select>			
			

			<?=form_error('id_year','<p class="text-error">','</p>');?>
			<label>Год</label>
			<select  class="span5" name="id_year">
			<?php foreach($lstYear as $year):?>
				<option  value="<?=$year['id']?>" <?= set_select('id_year',$year['year'])?>><?=$year['year']?></option>
			<?php endforeach;?>	
			</select>

			<input  type="submit" class="btn btn-success" name="btnMainAdd" value="Добавить"/>
		</fieldset>
	</form>
</div>
<hr/>