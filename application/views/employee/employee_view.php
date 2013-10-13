<div class="row">
	<form action="<?=base_url('employee/action_employee')?>" method="POST" class="span10">
	<?php 
	if(isset($error_delete))
	{
		echo $error_delete;		
	} 
	?>
	<table class="table table-bordered table-striped table-hover">
		<caption>Таблица сотрудников</caption>
		<thead>
			<tr>
				<th class="span1">метка</th>
				<th class="span4">ФИО</th>
				<th class="span2">Дата рождения</th>
				<th class="span2">Начало работы</th>
				<th class="span1">действие</th>
			</tr>
		</thead>
		
		<tbody>
		<tr>
			<td></td>
			<td>
				<select  class="span4" name="lstEmployee">
				<option></option>
				<?php foreach($list as $lstEmployee):?>
					<?php $name=$lstEmployee['Family']." ".$lstEmployee['Name']." ".$lstEmployee['Patronymic'];?>
					<option><?=$name?></option>
				<?php endforeach;?>	
				</select>
			</td>
			<td>
				<input type="date" name="date_birth" class="span2"/>
			</td>
			<td>
				<input type="date" name="date_work" class="span2"/>
			</td>
			<td><input  type="submit" class="btn btn-warning" name="btnEmployeeEdit" value="Изменить"/></td>
		</tr>
		<?php foreach($table_employee as $employee):?>
			<tr>
				<td><input type="checkbox" name="chkEmployee[]" value="<?=$employee['id']?>"/></td>
				<td><?=$employee['name']?></td>
				<td><?=$employee['date_birth']?></td>
				<td><?=$employee['date_work']?></td>
				<td>
					<input  type="submit" class="btn btn-danger" name="btnEmployeeDel[<?=$employee['id']?>]" value="Удалить"/>
				</td>
			</tr>
		<?php endforeach;?>


		</tbody>
	</table>
	</form>
</div>