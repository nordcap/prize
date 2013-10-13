<div class="row">
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th class="span1">метка</th>
				<th class="span1">Аббревиатура</th>
				<th class="span9">Наименование</th>
				<th class="span1">Год</th>
			</tr>
		</thead>
		
		<tbody>
		<?php foreach($table_edit as $edit):?>
			<tr>
				<td><input type="checkbox" name="checkbox[]" value="<?=$edit['id']?>"/></td>
				<td><?=$edit['short_name']?></td>
				<td><?=$edit['name']?></td>
				<td><?=$edit['year']?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
</div>	
</form>