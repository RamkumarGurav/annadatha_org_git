<?php

$page_module_name = "City";

?>
<?
$city_name = "";
$city_code = "";
$city_id = 0;
$status = 1;
$record_action = "Add New Record";
if (!empty($city_data)) {
    // $record_action = "Update";
    // $city_id = $city_data->city_id;
    // $city_name = $city_data->city_name;
    // $status = $city_data->status;

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
                    <h1 class="m-0 text-dark"><?php echo $page_module_name ?> <small>Details</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo MAINSITE_Admin . "wam" ?>">Home</a></li>
                        <li class="breadcrumb-item"><a
                                href="<?php echo MAINSITE_Admin . $user_access->class_name . "/" . $user_access->function_name ?>"><?php echo $user_access->module_name ?>
                                List</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php ?>

    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title"><?php echo $city_data->city_name ?></h3>
                        <div class="float-right">
                            <?php
                            if ($user_access->add_module == 1 && false) {
                                ?>
                                <a href="<?php echo MAINSITE_Admin . $user_access->class_name ?>/city-edit">
                                    <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add
                                        New</button></a>
                            <?php } ?>
                            <?php
                            if ($user_access->update_module == 1) {
                                ?>
                                <a
                                    href="<?php echo MAINSITE_Admin . $user_access->class_name ?>/city-edit/<?php echo $city_data->city_id ?>">
                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>
                                        Update</button>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <?php
                    if ($user_access->view_module == 1) {
                        ?>
                        <div class="card-body">

                            <?php echo form_open(MAINSITE_Admin . "$user_access->class_name/userRole-doUpdateStatus", array('method' => 'post', 'id' => 'ptype_list_form', "name" => "ptype_list_form", 'style' => '', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>

                            <input type="hidden" name="task" id="task" value="" />
                            <?php echo $this->session->flashdata('alert_message'); ?>
                            <div class="divTable">
                                <div class="TableRow">
                                    <div class="table_col">
                                        <label class="label_content_br">Data Base Id <span class="colen">:</span></label>
                                        <?php echo $city_data->city_id ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">Country <span class="colen">:</span></label>
                                        <?php echo $city_data->country_name ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">State<span class="colen">:</span></label>
                                        <?php echo $city_data->state_name ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">City<span class="colen">:</span></label>
                                        <?php echo $city_data->city_name ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">City Code <span class="colen">:</span></label>
                                        <?php echo $city_data->city_code ?>
                                    </div>

                                    <div class="table_col">
                                        <label class="label_content_br">Is Display <span class="colen">:</span></label>
                                        <?php if ($city_data->is_display == 1) { ?> Yes <i
                                                class="fas fa-check btn-success btn-sm "></i>
                                        <?php } else { ?> No <i class="fas fa-ban btn-danger btn-sm "></i>
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="TableRow">
                                    <div class="table_col">
                                        <label class="label_content_br">Added On <span class="colen">:</span></label>
                                        <?php echo date("d-m-Y h:i:s A", strtotime($city_data->added_on)) ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">Added By <span class="colen">:</span></label>
                                        <?php echo $city_data->added_by_name ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">Updated On <span class="colen">:</span></label>
                                        <?php if (!empty($city_data->updated_on)) {
                                            echo date("d-m-Y h:i:s A", strtotime($city_data->updated_on));
                                        } else {
                                            echo "-";
                                        } ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">Updated By <span class="colen">:</span></label>
                                        <?php if (!empty($city_data->updated_by_name)) {
                                            echo $city_data->updated_by_name;
                                        } else {
                                            echo "-";
                                        } ?>
                                    </div>
                                    <div class="table_col">
                                        <label class="label_content_br">Status <span class="colen">:</span></label>
                                        <?php if ($city_data->status == 1) { ?> Active <i
                                                class="fas fa-check btn-success btn-sm "></i>
                                        <?php } else { ?> Block <i class="fas fa-ban btn-danger btn-sm "></i>
                                        <?php } ?>

                                    </div>

                                </div>
                            </div>
                            <table id="" class="table table-bordered table-hover myviewtable" style="display:none;">
                                <tbody>
                                    <tr>
                                        <td><strong class="full">Data Base Id</strong>
                                            <?php echo $city_data->city_id ?></td>
                                        <td><strong class="full">Country</strong>
                                            <?php echo $city_data->country_name ?></td>
                                        <td><strong class="full">State</strong>
                                            <?php echo $city_data->state_name ?></td>
                                        <td><strong class="full">City</strong>
                                            <?php echo $city_data->city_name ?></td>
                                        <td><strong class="full">City Code</strong>
                                            <?php echo $city_data->city_code ?></td>
                                        <td><strong class="full">is Display</strong>
                                            <?php if ($city_data->is_display == 1) { ?> Yes <i
                                                    class="fas fa-check btn-success btn-sm "></i>
                                            <?php } else { ?> No <i class="fas fa-ban btn-danger btn-sm "></i>
                                            <?php } ?></td>

                                    </tr>
                                    <tr>
                                        <td><strong class="full">Added On</strong>
                                            <?php echo date("d-m-Y h:i:s A", strtotime($city_data->added_on)) ?></td>
                                        <td><strong class="full">Added By</strong>
                                            <?php echo $city_data->added_by_name ?></td>
                                        <td><strong class="full">Updated On</strong>
                                            <?php if (!empty($city_data->updated_on)) {
                                                echo date("d-m-Y h:i:s A", strtotime($city_data->updated_on));
                                            } else {
                                                echo "-";
                                            } ?>
                                        </td>
                                        <td><strong class="full">Updated By</strong>
                                            <?php if (!empty($city_data->updated_by_name)) {
                                                echo $city_data->updated_by_name;
                                            } else {
                                                echo "-";
                                            } ?>
                                        </td>
                                        <td colspan="2"><strong class="full">Status</strong>
                                            <?php if ($city_data->status == 1) { ?> Active <i
                                                    class="fas fa-check btn-success btn-sm "></i>
                                            <?php } else { ?> Block <i class="fas fa-ban btn-danger btn-sm "></i>
                                            <?php } ?></td>

                                    </tr>

                                </tbody>

                            </table>
                            <?php echo form_close() ?>
                        </div>
                    <?php } else {
                        $this->data['no_access_flash_message'] = "You Dont Have Access To View " . $page_module_name;
                        $this->load->view('admin/template/access_denied', $this->data);
                    } ?>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>


    </section>
    <?php ?>

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