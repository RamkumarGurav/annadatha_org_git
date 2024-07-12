<? if (!empty($user->address)) {
	$customer_address_data = $user;
} ?>
<? if (!empty($customer_address_data)) { ?>
	<? foreach ($customer_address_data->address as $address) {
		if ($address->billing_status == 1) {
			?>

			<span class="span2"><?php echo $address->address_type ?></span>
			<span class="span1"><?php echo $address->name ?></span>
			<span class="span3"><?php echo $address->number ?></span>

			<span class="span4"><?php echo $address->address ?>, <?php echo $address->city_name ?>,
				<?php echo $address->state_name ?>
				<span class="span5"><?php echo $address->zipcode ?></span>
			</span>
		<? } ?>
	<? } ?>
<? } ?>