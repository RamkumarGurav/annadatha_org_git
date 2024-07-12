<?php
$od = $orders_detail[0];
?>
<?php if ($box_no == 1) {
    foreach ($od->details as $odd) {
        ?>
        <input type="hidden" name="orders_details_ids[]" value="<?php echo $odd->orders_details_id ?>" />
    <?php }
} ?>
<?php
$orders_details_ids = array();
$boxNo = array();
if (!empty($_POST['orders_details_ids']) && !empty($_POST['boxNo'])) {
    $orders_details_ids = $_POST['orders_details_ids'];
    $boxNo = $_POST['boxNo'];
}
?>
<table id="example2" class="table table-bordered table-hover table_box_<?php echo $box_no ?>">
    <input type="hidden" name="boxNo[]" class="table_box_<?php echo $box_no ?>" value="<?php echo $box_no ?>" />
    <thead>
        <tr>
            <th colspan="15">
                <center><strong>Select Items For Box : <strong><?php echo $box_no ?></strong></strong></center>
                <?php if ($box_no > 1) { ?>
                    <span style="text-align:right" class="TBRemovebtn"
                        onclick="removeTB(<?php echo $box_no ?>)">Delete</span>
                <?php } ?>
            </th>
        </tr>
        <tr>
            <td colspan="15">
                <div class="form-group">
                    <div class="col-md-3">
                        <div class="label-wrapper"><label class="control-label" for="Name">Box Weight (In GM)</label>
                            <div data-title="Total Package Weight (In Gram)." class="ico-help icon_title_box"><i
                                    class="fa fa-question-circle"></i></div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="input-group input-group-required">
                            <input type="number" step="any" required min="0.01"
                                name="total_package_weight_<?php echo $box_no ?>"
                                id="total_package_weight_<?php echo $box_no ?>" placeholder="Total Package Weight"
                                class="form-control table_box_<?php echo $box_no ?>" value="">
                            <div class="input-group-btn"><span class="required">*</span>
                            </div>
                        </div><span class="field-validation-valid" data-valmsg-for="Name"
                            data-valmsg-replace="true"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                        <div class="label-wrapper"><label class="control-label" for="Name">Box Dimension (L*B*H)(In
                                CM)</label>
                            <div data-title="Package Dimension (L*B*H)(In CM)" class="ico-help icon_title_box"><i
                                    class="fa fa-question-circle"></i></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group input-group-required">
                            <input type="number" name="box_l_<?php echo $box_no ?>" required
                                id="box_l_<?php echo $box_no ?>" min="1" placeholder="Lenght" class="form-control"
                                value="">
                            <div class="input-group-btn"><span class="required">*</span>
                            </div>
                        </div><span class="field-validation-valid" data-valmsg-for="Name"
                            data-valmsg-replace="true"></span>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group input-group-required">
                            <input type="number" name="box_b_<?php echo $box_no ?>" required
                                id="box_b_<?php echo $box_no ?>" min="1" placeholder="Breadth" class="form-control"
                                value="">
                            <div class="input-group-btn"><span class="required">*</span>
                            </div>
                        </div><span class="field-validation-valid" data-valmsg-for="Name"
                            data-valmsg-replace="true"></span>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group input-group-required">
                            <input type="number" name="box_h_<?php echo $box_no ?>" required
                                id="box_h_<?php echo $box_no ?>" min="1" placeholder="Height" class="form-control"
                                value="">
                            <div class="input-group-btn"><span class="required">*</span>
                            </div>
                        </div><span class="field-validation-valid" data-valmsg-for="Name"
                            data-valmsg-replace="true"></span>
                    </div>
                </div>
            </td>

        </tr>

        <tr>
            <th>#</th>
            <th>Item Name</th>
            <th>Manufacturer</th>
            <th>Price</th>
            <th>Final Price</th>
            <th>Qty</th>
            <th>Sub Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;

        foreach ($od->details as $odd) {
            $pending_item_for_packing = $odd->prod_in_cart;
            if (!empty($orders_details_ids) && !empty($boxNo)) {
                foreach ($boxNo as $bn) {
                    foreach ($orders_details_ids as $bni) {
                        if (!empty($_POST['item_' . $bn . '_i_' . $bni])) {
                            if ($odd->orders_details_id == $bni) {
                                $pending_item_for_packing = $pending_item_for_packing - $_POST['item_' . $bn . '_i_' . $bni];
                            }
                        }
                    }
                }
            }
            //echo $pending_item_for_packing.'<br>';
            ?>

            <?php if ($pending_item_for_packing > 0) {
                $count++; ?>
                <tr id="b_<?php echo $box_no ?>_i_<?php echo $odd->orders_details_id ?>">
                    <td><?php echo $count ?>.</td>
                    <td><?php echo $odd->product_name ?><br><?php echo $odd->combi ?></td>
                    <td><?php echo $odd->manufacturer_name ?></td>
                    <td><?php echo $od->symbol ?>         <?php echo $odd->price ?></td>
                    <td><?php echo $od->symbol ?>         <?php echo $odd->final_price ?></td>
                    <td>
                        <select onchange="checkBoxPackItem(<?php echo $box_no ?> , <?php echo $odd->orders_details_id ?>)"
                            class="form-control TBF_all TBF_<?php echo $box_no ?>"
                            name="item_<?php echo $box_no ?>_i_<?php echo $odd->orders_details_id ?>"
                            id="item_<?php echo $box_no ?>_i_<?php echo $odd->orders_details_id ?>">
                            <?php for ($i = 0; $i <= $pending_item_for_packing; $i++) { ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><?php echo $od->symbol ?>         <?php echo $odd->sub_total ?></td>
                </tr>
            <?php }
        } ?>
    <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th id="box_total_<?php echo $box_no ?>">0</th>
            <th></th>
        </tr>
    </tfoot>
</table>

<?php
if ($count == 0) {
    ?>
    <script>
        removeTB(<?php echo $box_no ?>);
        $('.dhlShippingBTN').show();
        alert('boxes are already assign for products.');
    </script>
<?php
}
?>