<?php
$od = $orders_detail[0];

?>
<style type="text/css">
    .newModalCss {
        border-radius: 15px 15px 0 0;
        overflow: hidden;
    }

    .newModalCss .modal-header {
        background-color: #3C8DBC;
        color: #fff;

    }

    .newModalCss label {
        text-align: right;
        padding-top: 4px;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>#<?php echo $od->temp_orders_id; ?><small> In Stuck Orders Details</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo MAINSITE . "SecureRegions/wdm"; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo MAINSITE . "SecureRegions/orders/stuckOrders"; ?>"><i></i> All Stuck Orders
                    List</a></li>
            <li class="active">Order Details</li>
        </ol>
    </section>

    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <h3 class="box-title">Order Details </h3>
                    </div>
                    <div class="col-md-8 text-right">

                        <?php if ($od->status == 0) { ?>
                            <a href="#Modalpop" data-toggle="modal" class="btn btn-primary">Take Action</a>
                        <?php } ?>


                    </div>

                </div>
                <?php if ($od->status == 1) { ?>
                    <div class="alert alert-success"><strong>Order Success!</strong> This order is placed successfully.
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger"><strong>Order Fail!</strong> This order is failed.</div>
                <?php } ?>

                <div class="box-body">
                    <?php
                    //	echo "<pre>";print_r($od);echo "</pre>";
                    ?>
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="50%" valign="top">
                                <table id="example2" class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="20%">Order Id</td>
                                            <td width="5%">:</td>
                                            <td width="*"><strong>#<?php echo $od->temp_orders_id ?></strong></td>
                                        </tr>
                                        <?php /*?><tr>
                                                  <td width="20%">Order Number</td>
                                                  <td width="5%">:</td>
                                                  <td width="*"><strong><?php echo $od->order_number?></strong></td>
                                              </tr><?php */ ?>
                                        <tr>
                                            <td width="20%">Order Placed On</td>
                                            <td width="5%">:</td>
                                            <td width="*">
                                                <strong><?php echo date('d-m-Y h:i:s A', strtotime($od->added_on)) ?></strong>
                                            </td>
                                        </tr>
                                        <?php if (!empty($od->updated_on)) { ?>
                                            <tr>
                                                <td width="20%">Last Action taken On</td>
                                                <td width="5%">:</td>
                                                <td width="*">
                                                    <strong><?php echo date('d-m-Y h:i:s A', strtotime($od->updated_on)) ?></strong>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td width="20%">Order Status</td>
                                            <td width="5%">:</td>
                                            <td width="*">
                                                <p><strong>
                                                        Order Fail
                                                    </strong></p>
                                                <?php if (!empty($od->reason)) { ?>
                                                    <p><strong>Reason : </strong> <?php echo $od->reason ?></p>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php if (!empty($od->payment_details)) { ?>
                                            <tr>
                                                <td width="20%">Payment Details</td>
                                                <td width="5%">:</td>
                                                <td width="*">
                                                    <p>TxnreferenceNo :
                                                        <strong><?php echo $od->payment_details[0]->TxnreferenceNo ?></strong>
                                                    </p>
                                                    <p>BankReferenceNo :
                                                        <strong><?php echo $od->payment_details[0]->BankReferenceNo ?></strong>
                                                    </p>
                                                    <p>Mode : <strong>CC</strong></p>
                                                    <?php if ($od->payment_details[0] != 'NA') { ?>
                                                        <p>Error Description :
                                                            <strong><?php echo $od->payment_details[0]->ErrorDescription ?></strong>
                                                        </p><?php } ?>
                                                </td>
                                            </tr>
                                        <?php } else { ?>
                                            <tr>
                                                <td width="20%">Reason</td>
                                                <td width="5%">:</td>
                                                <td width="*">
                                                    <div class="alert alert-danger">
                                                        <?php if ($od->stuck_status == 2) { ?>
                                                            Went For the Payment But Did not come back to the website it may be
                                                            connection lost
                                                        <?php } else { ?>
                                                            Went For the Payment But Payment Not Done
                                                        <?php } ?>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td width="20%">Amount</td>
                                            <td width="5%">:</td>
                                            <td width="*">
                                                <p>Total : <strong><?php echo $od->symbol ?>
                                                        <?php echo $od->total ?></strong></p>
                                                <?php /*?><p>Saving in Rs : <strong><?php echo $od->total_saving_in_rs?></strong></p>
                                                      <p>Saving in % : <strong><?php echo number_format($od->total_saving_in_percent , 2)?></strong></p><?php */ ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Customer Name</td>
                                            <td width="5%">:</td>
                                            <td width="*"><?php echo $od->name ?></td>
                                        </tr>

                                        <tr>
                                            <td width="20%">Customer Contact</td>
                                            <td width="5%">:</td>
                                            <td width="*"><?php echo $od->number ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Customer Email</td>
                                            <td width="5%">:</td>
                                            <td width="*"><?php echo $od->email ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Delivery Details</td>
                                            <td width="5%">:</td>
                                            <td width="*">
                                                <?php /*?><p><?php echo $od->d_name?></p>
                                                      <p><?php echo $od->d_number?></p>
                                                      <p><?php echo $od->d_address?></p>
                                                      <p><?php echo $od->d_location_name?></p>
                                                      <p><?php echo $od->d_city_name?>, <?php echo $od->d_location_pincode?></p><?php */ ?>
                                                <p><?php echo $od->d_name ?></p>
                                                <p><?php echo $od->d_number ?></p>
                                                <p><?php echo $od->d_address ?></p>
                                                <p><?php echo $od->d_city_name ?></p>
                                                <p><?php echo $od->d_state_name ?>, <?php echo $od->d_zipcode ?></p>
                                                <p><?php echo $od->d_country_name ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Billing Details</td>
                                            <td width="5%">:</td>
                                            <td width="*">
                                                <?php /*?><p><?php echo $od->d_name?></p>
                                                      <p><?php echo $od->d_number?></p>
                                                      <p><?php echo $od->d_address?></p>
                                                      <p><?php echo $od->d_location_name?></p>
                                                      <p><?php echo $od->d_city_name?>, <?php echo $od->d_location_pincode?></p><?php */ ?>
                                                <p><?php echo $od->b_name ?></p>
                                                <p><?php echo $od->b_number ?></p>
                                                <p><?php echo $od->b_address ?></p>
                                                <p><?php echo $od->b_city_name ?></p>
                                                <p><?php echo $od->b_state_name ?>, <?php echo $od->b_zipcode ?></p>
                                                <p><?php echo $od->b_country_name ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Order Details</td>
                                            <td width="5%">:</td>
                                            <td width="*">
                                                <p>#Items : <strong><?php echo count($od->details) ?></strong></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                        </tr>

                        <tr>
                            <td width="50%" valign="top">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="15"><strong>Ordered Product In Detail</strong></th>
                                        </tr>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Item Name</th>
                                            <th>Item Code</th>
                                            <th>Remarks</th>
                                            <th>Price</th>
                                            <th>Final Price</th>
                                            <th>Tax</th>
                                            <th>Qty</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        foreach ($od->details as $odd) {
                                            $count++
                                                ?>
                                            <tr>
                                                <td><?php echo $count ?>.</td>
                                                <td>
                                                    <p><?php echo $odd->product_name ?></p>
                                                    <p><?php echo $odd->combi ?></p>
                                                </td>
                                                <td><?php echo $odd->ref_code ?></td>
                                                <td><?php echo $odd->prod_comment ?></td>
                                                <td><?php echo $od->symbol ?>
                                                    <?php if (!empty($odd->discounted_price)) {
                                                        echo $odd->discounted_price;
                                                    } else {
                                                        echo $odd->price;
                                                    } ?>
                                                </td>
                                                <td><?php echo $od->symbol ?>     <?php echo $odd->final_price ?></td>
                                                <td><?php echo $odd->tax_providers_percentage ?>%</td>
                                                <td><?php echo $odd->prod_in_cart ?></td>
                                                <td><?php echo $od->symbol ?>     <?php echo $odd->sub_total ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if (!empty($od->coupon_code)) { ?>
                                            <tr>
                                                <td colspan="7" style="text-align:right">Coupon
                                                    (<?php echo $od->coupon_code ?>)</td>
                                                <td> <?php echo $od->discount ?> %</td>
                                            </tr>
                                        <?php } ?>
                                        <?php if (!empty($od->delivery_charges)) { ?>
                                            <tr>
                                                <td colspan="7" style="text-align:right">Delivery Charges</td>
                                                <td><?php echo $od->symbol ?>     <?php echo $od->delivery_charges ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="7" style="text-align:right">GST Charges</td>
                                            <td><?php echo $od->symbol ?> <?php echo $od->total_gst ?></td>
                                        </tr>

                                        <tr>
                                            <td colspan="7" style="text-align:right">Total</td>
                                            <td><?php echo $od->symbol ?> <?php echo $od->total ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                        </tr>
                    </table>



                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php if ($od->status == 0) { ?>
    <div id="Modalpop" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content newModalCss">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <form class="" action="<?php echo MAINSITE . 'SecureRegions/orders/stuckToSuccess' ?>" method="post">
                        <input type="hidden" name="temp_orders_id" id="temp_orders_id"
                            value="<?php echo $od->temp_orders_id ?>" />
                        <div class="clearfix">
                            <div class="clearfix form-group">
                                <label class="col-md-3">Action</label>
                                <div class="col-md-9">
                                    <select class="form-control" required name="status" id="status">
                                        <option value="">Select Action</option>
                                        <option value="1" selected>Make Order As Success</option>
                                    </select>
                                </div>
                            </div>

                            <div class="clearfix form-group" id="id_courierNo">
                                <label class="col-md-3">TxnreferenceNo.</label>
                                <div class="col-md-9">
                                    <input type="text" name="TxnreferenceNo" placeholder="TxnreferenceNo."
                                        id="TxnreferenceNo" class="form-control" />
                                </div>
                            </div>

                            <div class="clearfix form-group" id="BankReferenceNo">
                                <label class="col-md-3">BankReferenceNo.</label>
                                <div class="col-md-9">
                                    <input type="text" name="BankReferenceNo" placeholder="BankReferenceNo."
                                        id="BankReferenceNo" class="form-control" />
                                </div>
                            </div>


                            <div class="clearfix form-group ">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-bg" name="OrderStatusBTN"
                                        value="1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>


<?php } ?>