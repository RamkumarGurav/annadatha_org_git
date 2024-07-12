<?  if (!empty($user->address)) {
    $customer_address_data = $user;
} ?>
<?  if (!empty($customer_address_data)) { ?>
    <?  foreach ($customer_address_data->address as $address) {
        if ($address->billing_status == 1) {
            ?>

            <div class="select-delivery">
                <div class="select-delivery-inner">
                    <div class="delivery-username"><?php  echo $address->name ?></div>
                    <span>, <?php  echo $address->zipcode ?></span>
                    <span class="delivery-type"><?php  echo $address->address_type ?></span>
                </div>
                <p class="select-delivery-desc"><?php  echo $address->address ?>, <?php  echo $address->city_name ?>,
                    <?php  echo $address->state_name ?> </p>
            </div>

        <?  } ?>
    <?  } ?>
<?  } ?>