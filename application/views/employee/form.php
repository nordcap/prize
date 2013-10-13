<div class="row">
	<form action="<?=base_url('employee')?>" method="POST" class="span5">
		<fieldset>
			<legend>Добавление сотрудников</legend>
			<?=form_error('lstEmployee','<p class="text-error">','</p>');?>
			<label>ФИО</label>
			<select  class="span4" name="lstEmployee">
			<option></option>
			<?php foreach($list as $employee):?>
				<?php $name=$employee['Family']." ".$employee['Name']." ".$employee['Patronymic'];?>
				<option <?= set_select('lstEmployee',$name)?>><?=$name?></option>
			<?php endforeach;?>	
			</select>

			<?=form_error('date_birth','<p class="text-error">','</p>');?>
			<label>Дата рождения</label>
			<input type="date" name="date_birth" class="span4"/>

			<?=form_error('date_work','<p class="text-error">','</p>');?>
			<label>Дата поступления на работу</label>
			<input type="date" name="date_work" class="span4"/><br/>
			
			<input  type="submit" class="btn btn-success" name="btnEmployeeAdd" value="Добавить"/>
		
		</fieldset>
	</form>
</div>
<hr/>