<?php 

$page_module_name = "Coupon";

?>
<?php 
$name = "";
$id = 0;
$status = 1;
$discount_in = 1;
$record_action = "Add New Record";
if (!empty($coupon_data)) {
    // $record_action = "Update";
    // $id = $coupon_data->id;
    // $name = $coupon_data->name;
    // $status = $coupon_data->status;

}
?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php  echo $page_module_name ?> <small>Details</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php  echo MAINSITE_Admin . "wam" ?>">Home</a></li>
                        <li class="breadcrumb-item"><a
                                href="<?php  echo MAINSITE_Admin . $user_access->class_name . "/" . $user_access->function_name ?>"><?php  echo $user_access->module_name ?>
                                List</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php  ?>

    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title"><?php  echo $coupon_data->name ?></h3>
                        <div class="float-right">
                            <?php 
                            if ($user_access->add_module == 1 && false) {
                                ?>
                                <a href="<?php  echo MAINSITE_Admin . $user_access->class_name ?>/edit">
                                    <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add
                                        New</button></a>
                            <?php  } ?>
                            <?php 
                            if ($user_access->update_module == 1) {
                                ?>
                                <a
                                    href="<?php  echo MAINSITE_Admin . $user_access->class_name ?>/edit/<?php  echo $coupon_data->id ?>">
                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>
                                        Update</button>
                                </a>
                            <?php  } ?>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <?php 
                    if ($user_access->view_module == 1) {
                        ?>
                        <div class="card-body">

                            <?php  echo form_open(MAINSITE_Admin . "$user_access->class_name/userRole-doUpdateStatus", array('method' => 'post', 'id' => 'ptype_list_form', "name" => "ptype_list_form", 'style' => '', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
                            <input type="hidden" name="task" id="task" value="" />
                            <?php  echo $this->session->flashdata('alert_message'); ?>
                            <div class="divTable">
                                <div class="TableRow">
                                    <div class="table_col">
                                        <label class="label_content_br">Data Base Id <span class="colen">:</span></label>
                                        <?php  echo $coupon_data->id ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">Coupon <span class="colen">:</span></label>
                                        <?php  echo $coupon_data->name ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">Discount In <span class="colen">:</span></label>
                                        <?php  if ($coupon_data->discount_in == 1) { ?> Rs. <?php  } else { ?> %<?php  } ?>

                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">Discount Value <span class="colen">:</span></label>
                                        <?php  echo $coupon_data->discount_value ?>
                                    </div>

                                    <div class="table_col">
                                        <label class="label_content_br">Added On <span class="colen">:</span></label>
                                        <?php  echo date("d-m-Y h:i:s A", strtotime($coupon_data->added_on)) ?>
                                    </div>


                                </div>
                                <div class="TableRow">
                                    <div class="table_col">
                                        <label class="label_content_br">Added By <span class="colen">:</span></label>
                                        <?php  echo $coupon_data->added_by_name ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">Updated On <span class="colen">:</span></label>
                                        <?php  if (!empty($coupon_data->updated_on)) {
                                            echo date("d-m-Y h:i:s A", strtotime($coupon_data->updated_on));
                                        } else {
                                            echo "-";
                                        } ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">Updated By <span class="colen">:</span></label>
                                        <?php  if (!empty($coupon_data->updated_by_name)) {
                                            echo $coupon_data->updated_by_name;
                                        } else {
                                            echo "-";
                                        } ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">Status <span class="colen">:</span></label>
                                        <?php  if ($coupon_data->status == 1) { ?> Active <i
                                                class="fas fa-check btn-success btn-sm "></i>
                                        <?php  } else { ?> Block <i class="fas fa-ban btn-danger btn-sm "></i> Block
                                        <?php  } ?>

                                    </div>

                                </div>
                            </div>
                            <table id="" class="table table-bordered table-hover myviewtable" style="display:none;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong class="full">Data Base Id</strong>
                                            <?php  echo $coupon_data->id ?>
                                        </td>
                                        <td>
                                            <strong class="full">Coupon</strong>
                                            <?php  echo $coupon_data->name ?>
                                        </td>
                                        <td>
                                            <strong class="full">Discount In</strong>
                                            <?php  if ($coupon_data->status == 1) { ?> Rs. <?php  } else { ?> Block %<?php  } ?></
                                                td>


                                        <td>
                                            <strong class="full">Discount Value</strong>
                                            <?php  echo $coupon_data->discount_value ?>
                                        </td>

                                        <td>
                                            <strong class="full">Added On</strong>
                                            <?php  echo date("d-m-Y h:i:s A", strtotime($coupon_data->added_on)) ?>
                                        </td>
                                        <td>
                                            <strong class="full">Added By</strong>
                                            <?php  echo $coupon_data->added_by_name ?>
                                        </td>
                                        <td>
                                            <strong class="full">Updated On</strong>
                                            <?php  if (!empty($coupon_data->updated_on)) {
                                                echo date("d-m-Y h:i:s A", strtotime($coupon_data->updated_on));
                                            } else {
                                                echo "-";
                                            } ?>
                                        </td>
                                        <td>
                                            <strong class="full">Updated By</strong>
                                            <?php  if (!empty($coupon_data->updated_by_name)) {
                                                echo $coupon_data->updated_by_name;
                                            } else {
                                                echo "-";
                                            } ?>
                                        </td>
                                        <td>
                                            <strong class="full">Status</strong>
                                            <?php  if ($coupon_data->status == 1) { ?> Active <i
                                                    class="fas fa-check btn-success btn-sm "></i>
                                            <?php  } else { ?> Block <i class="fas fa-ban btn-danger btn-sm "></i> Block
                                            <?php  } ?></ td>

                                    </tr>

                                </tbody>

                            </table>
                            <?php  echo form_close() ?>
                        </div>
                    <?php  } else {
                        $this->data['no_access_flash_message'] = "You Dont Have Access To View " . $page_module_name;
                        $this->load->view('admin/template/access_denied', $this->data);
                    } ?>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>


    </section>
    <?php  ?>

</div>

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>

<script type="application/javascript">
    function check_uncheck_All_records() // done
    {
        var mainCheckBoxObj = document.getElementById("main_check");
        var checkBoxObj = document.getElementsByName("sel_recds[]");

        for (var i = 0; i < checkBoxObj.length; i++) {
            if (mainCheckBoxObj.checked)
                checkBoxObj[i].checked = true;
            else
                checkBoxObj[i].checked = false;
        }
    }

    function validateCheckedRecordsArray() // done
    {
        var checkBoxObj = document.getElementsByName("sel_recds[]");
        var count = true;

        for (var i = 0; i < checkBoxObj.length; i++) {
            if (checkBoxObj[i].checked) {
                count = false;
                break;
            }
        }

        return count;
    }

    function validateRecordsActivate() // done
    {
        if (validateCheckedRecordsArray()) {
            //alert("Please select any record to activate.");
            toastrDefaultErrorFunc("Please select any record to activate.");
            document.getElementById("sel_recds1").focus();
            return false;
        } else {
            document.ptype_list_form.task.value = 'active';
            document.ptype_list_form.submit();
        }
    }

    function validateRecordsBlock() // done
    {
        if (validateCheckedRecordsArray()) {
            //alert("Please select any record to block.");
            toastrDefaultErrorFunc("Please select any record to block.");
            document.getElementById("sel_recds1").focus();
            return false;
        } else {
            document.ptype_list_form.task.value = 'block';
            document.ptype_list_form.submit();
        }
    }
</script>