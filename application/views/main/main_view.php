<div class="row">
	<table class="table table-bordered table-striped table-hover">
		<caption>Таблица награжденных сотрудников</caption>
		<thead>
			<tr>
				<th class="span5">ФИО</th>
<!--				<th class="span1">ДРождения</th>
				<th class="span1">ДНРаботы</th>-->
				<?php foreach($lstYear as $year):?>
				<th><?=$year['year']?></th>
				<?php endforeach;?>		
				<th class="span3">действие</th>			

			</tr>
		</thead>
		
		<tbody>
		<?php foreach($list_prize as $FIO=>$prize_year):?>
			<tr>
				<td><?=$FIO?></td>
				<?php foreach($prize_year as $key_year=>$val_prize):?>
			
				<td><?=$val_prize?></td>
				
				<?php endforeach;?>					
				<td>
					<form action="<?=base_url('main/action_main')?>" method="POST" style="margin-bottom: 0px;">
					<input  type="submit" class="btn btn-danger" name="btnMainDel" value="Удалить"/>
					<a href="<?=base_url('main/edit')?>?employee=<?=$FIO?>" class="btn btn-info">Изменить</a>
					<input type="hidden" name="hidden" value="<?=$FIO?>"/>
					</form>
				</td>
<!--				<td>
					<a href="<?=base_url('main/edit')?>?employee=<?=$FIO?>" class="btn btn-info">Изменить</a>
				</td>
-->			</tr>
		<?php endforeach;?>


		</tbody>
	</table>
	
</div>			