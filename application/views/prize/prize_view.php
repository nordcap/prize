<div class="row">
	<form action="<?=base_url('prize/action_prize')?>" method="POST" class="span12">
	<table class="table table-bordered table-striped table-hover">
		<caption>Таблица наград</caption>
		<thead>
			<tr>
				<th class="span1">метка</th>
				<th class="span1">Аббревиатура</th>
				<th class="span5">Наименование</th>
				<th class="span4">Комментарий</th>
				<th class="span1">действие</th>
			</tr>
		</thead>
		
		<tbody>
		<tr>
			<td></td>
			<td><input type="text" name="short_name" value="" placeholder="введите аббревиатуру" class="span1"></input></td>
			<td><input type="text" name="name" value="" placeholder="введите название" class="span5"></input>	</td>
			<td><input type="text" name="comment" value="" placeholder="введите комментарий" class="span4"/></td>
			<td><input  type="submit" class="btn btn-warning" name="btnPrizeEdit" value="Изменить"/></td>
		</tr>
		<?php foreach($table_prize as $prize):?>
			<tr>
				<td><input type="checkbox" name="chkPrize[]" value="<?=$prize['id']?>"/></td>
				<td><?=$prize['short_name']?></td>
				<td><?=$prize['name']?></td>
				<td><?=$prize['comment']?></td>
				<td>
					<input  type="submit" class="btn btn-danger" name="btnPrizeDel[<?=$prize['id']?>]" value="Удалить"/>
				</td>
			</tr>
		<?php endforeach;?>


		</tbody>
	</table>
	</form>
</div>		