

<?php if(!empty($result)){
foreach ($result as $key => $row) {
?>
<li class="list-group-item">
	<label class="i-checkbox i-checkbox--tick i-checkbox--brand m-b-0">
		<input type="checkbox" class="check-item" name="id[]" value="<?php _e( get_data($row, 'ids') )?>">
		<span></span>
	</label>
	<?php _e( $row->phone )?>



	<?php 
	$params = json_decode($row->params);
	if(!empty($params)){
	?>
	<select class="form-control w-150 d-inline m-l-20">
		<optgroup label="<?php _e("Params")?>">
			<?php foreach ($params as $key => $param): ?>
			<option><?php echo $key?>: <?php echo $param?></option>
			<?php endforeach ?>
		</optgroup>
	</select>	
	<?php }?>	
</li>
<?php }}else{
	if($page == 0){
?>
<div class="empty m-t-100 m-b-100">
	<div class="icon"></div>
</div>
<?php }}?>