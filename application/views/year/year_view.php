<div class="row">
	<form action="<?=base_url('year/action_year')?>" method="POST" class="span3">
	<table class="table table-bordered table-striped table-hover">
		<caption>Таблица лет</caption>
		<thead>
			<tr>
				<th class="span2">год</th>
				<th class="span1">действие</th>
			</tr>
		</thead>
		
		<tbody>
		<?php foreach($table_year as $year):?>
			<tr>
				<td><?=$year['year']?></td>
				<td>
					<input  type="submit" class="btn btn-danger" name="btnYearDel[<?=$year['id']?>]" value="Удалить"/>
				</td>
			</tr>
		<?php endforeach;?>


		</tbody>
	</table>
	</form>
</div>