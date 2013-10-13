<form action="<?=base_url('main/action_edit')?>" method="POST" class="span12">
<div class="row">
		<fieldset>
			<legend>Редактирование сотрудника</legend>
			
			<?=form_error('id_prize','<p class="text-error">','</p>');?>
			<label>Награда</label>
			<select  class="span4" name="id_prize">
			<?php foreach($lstPrize as $prize):?>
				<option value="<?=$prize['id']?>" <?= set_select('id_prize',$prize['name'])?>><?=$prize['name']?></option>
			<?php endforeach;?>	
			</select>			
			

			<?=form_error('id_year','<p class="text-error">','</p>');?>
			<label>Год</label>
			<select  class="span4" name="id_year">
			<?php foreach($lstYear as $year):?>
				<option  value="<?=$year['id']?>" <?= set_select('id_year',$year['year'])?>><?=$year['year']?></option>
			<?php endforeach;?>	
			</select><br/>

			<input  type="submit" class="btn btn-info" name="btnMainEdit" value="Изменить"/>
			<span class="help-inline"><b>Внимание! Изменение коснется всех полей</b></span>
		</fieldset>
</div>
<hr/>