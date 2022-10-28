<table style="width: 1366px; border: 1px solid #000000; font-family: Tahoma; margin: auto;">
	<tr>
	    <th colspan="6" style="height: 100px; color: #000; padding: 5px; border: 1px solid #000000; text-transform: uppercase; font-size: 40px; background: #bada99;"><?php _e("Campaign Report")?></th>
  	</tr>
  	<?php if(!empty($result)){?>
  	<tr>
	    <th style="background: #bada99; height: 30px; text-transform: uppercase; color: #000; padding: 5px; border: 1px solid #000000; text-align: left;"><?php _e("Whatsapp account")?></th>
	    <th colspan="5" style="color: #000; padding: 5px; border: 1px solid #000000; text-align: left;"><?php _e( $result[0]->account_name )?></th>
  	</tr>
  	<?php }?>
  	<tr>
	    <th style="background: #bada99; height: 30px; text-transform: uppercase; color: #000; padding: 5px; border: 1px solid #000000; text-align: left;"><?php _e("Start time")?></th>
	    <th colspan="2" style="color: #000; padding: 5px; border: 1px solid #000000; text-align: left;"><?php _e( post("from_day") )?></th>
	    <th style="background: #bada99; height: 30px; text-transform: uppercase; color: #000; padding: 5px; border: 1px solid #000000; text-align: left;"><?php _e("End time")?></th>
	    <th colspan="2" style="color: #000; padding: 5px; border: 1px solid #000000; text-align: left;"><?php _e( post("to_day") )?></th>
  	</tr>
  	<tr>
	    <th colspan="6" style="height: 40px;" ></th>
  	</tr>
  	<tr>
	    <th colspan="1" style="height: 25px; color: #000; padding: 5px; border: 1px solid #000000;"><?php _e("Campaign name")?></th>
	    <th colspan="1" style="height: 25px; color: #000; padding: 5px; border: 1px solid #000000;"><?php _e("Contact name")?></th>
	    <th colspan="1" style="height: 25px; color: #000; padding: 5px; border: 1px solid #000000;"><?php _e("Min delay")?></th>
	    <th colspan="1" style="height: 25px; color: #000; padding: 5px; border: 1px solid #000000;"><?php _e("Max delay")?></th>
	    <th colspan="1" style="height: 25px; color: #000; padding: 5px; border: 1px solid #000000;"><?php _e("Phone number")?></th>
	    <th colspan="1" style="height: 25px; color: #000; padding: 5px; border: 1px solid #000000;"><?php _e("Status")?></th>
  	</tr>
  	<?php 
  	if(!empty($result)){

  		foreach ($result as $key => $row) {
  			$data = json_decode($row->result, false);
		  	if(!empty($data)){
		  	?>
			  	<?php foreach ($data as $key => $value): ?>
			  		<?php if (is_object($value)): ?>
				  	<tr>
					    <td colspan="1" style="height: 25px; padding: 5px; border: 1px solid #000000; text-align: left;"><?php _e( $row->name )?></td>
					    <td colspan="1" style="height: 25px; padding: 5px; border: 1px solid #000000; text-align: left;"><?php _e( $row->contact_name )?></td>
					    <td colspan="1" style="height: 25px; padding: 5px; border: 1px solid #000000; text-align: left;"><?php _e( $row->min_delay )?></td>
					    <td colspan="1" style="height: 25px; padding: 5px; border: 1px solid #000000; text-align: left;"><?php _e( $row->max_delay )?></td>
					    <td colspan="1" style="height: 25px; padding: 5px; border: 1px solid #000000; text-align: left;"><?php _e( $value->phone_number )?></td>
					    <td colspan="1" style="height: 25px; padding: 5px; border: 1px solid #000000; text-align: center; color: <?php _e( $value->status?"#009f19":"#f00" )?>;"><?php _e( $value->status?"Successed":"Failed" )?></td>
				  	</tr>
			  		<?php endif ?>
			  	<?php endforeach ?>

  	<?php }}}?>

  	
</table>