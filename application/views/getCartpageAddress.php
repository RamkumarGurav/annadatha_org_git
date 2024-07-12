<?  if (!empty($customer_address_data->address)) { ?>
    <div class="row">
        <?  foreach ($customer_address_data->address as $address) { ?>
            <div class="address-row-bg" style="margin-top:10px">
                <label class="row ">
                    <div class="col-lg-1 col-1">
                        <input type="radio" class="hide-div-radio address_radio"
                            data-id='<?php  echo $address->customers_address_id ?>'
                            data-idval='<?php  echo $address->customers_address_id ?>'
                            id="<?php  echo $address->customers_address_id ?>" name="address" readonly="" <?  if ($address->customers_address_id == $this->session->userdata('application_sess_cart_page_selected_address_id')) { ?>
                                checked <?  } ?>>
                    </div>
                    <div class="col-lg-11 col-11">
                        <div class="select-delivery">
                            <div class="select-delivery-inner">
                                <div class="delivery-username"><?php  echo $address->name ?></div>
                                <span>, <?php  echo $address->zipcode ?></span>
                                <span class="delivery-type"><?php  echo $address->address_type ?></span>
                            </div>
                            <p class="select-delivery-desc"><?php  echo $address->address ?>, <?php  echo $address->city_name ?>,
                                <?php  echo $address->state_name ?> </p>
                        </div>
                    </div>
                </label>
            </div>

        <?  } ?>
    </div>
<?  } ?>