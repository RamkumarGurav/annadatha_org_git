<?php echo $message ?>
<div class="card">

  <div class="card-body">
    <h5 class="card-title manageAddress" data-id="0">Add New Reviews</h5>
    <div class="add_edit_address_0 add_edit_address_cl"></div>
  </div>
</div>

<? foreach ($customer_address_data->address as $address) { ?>
  <div class="card" style="margin-top:10px">
    <div class="card-header">
      <?php echo $address->address_type ?>
      <div class="dropdown show" style="float:right">
        <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Action
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item manageAddress" data-id="<?php echo $address->customers_address_id ?>">Edit</a>
          <?php  /*?> <a class="dropdown-item" href="#">Delete</a><?php  */ ?>
        </div>
      </div>
    </div>
    <div class="card-body">
      <h5 class="card-title"><?php echo $address->name ?> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $address->number ?></h5>
      <p class="card-text"><?php echo $address->address ?></p>
      <p class="card-text"><?php echo $address->city_name ?>, <?php echo $address->state_name ?> -
        <?php echo $address->zipcode ?>
      </p>
      <?php  /*?><a href="#" class="btn btn-primary">Go somewhere</a><?php  */ ?>
      <div class="add_edit_address_cl add_edit_address_<?php echo $address->customers_address_id ?>"></div>
    </div>
  </div>
<? } ?>