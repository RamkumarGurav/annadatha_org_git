<?php

$page_module_name = "working_method";

?>
<?
$working_method_id = "";
$working_method_id = 0;
$status = 1;
$record_action = "Add New Record";
if (!empty($working_method_data)) {
    // $record_action = "Update";
    // $working_method_id = $working_method_data->working_method_id;
    // $working_method_id = $working_method_data->working_method_id;
    // $status = $working_method_data->status;

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
    <? ?>

    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title"><?php echo $working_method_data->working_method_id ?></h3>
                        <div class="float-right">
                            <?php
                            if ($user_access->add_module == 1) {
                                ?>
                                <a href="<?php echo MAINSITE_Admin . $user_access->class_name ?>/working_method-edit">
                                    <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add
                                        New</button></a>
                            <? } ?>
                            <?php
                            if ($user_access->update_module == 1) {
                                ?>
                                <a
                                    href="<?php echo MAINSITE_Admin . $user_access->class_name ?>/working_method-edit/<?php echo $working_method_data->working_method_id ?>">
                                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>
                                        Update</button>
                                </a>
                            <? } ?>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <?php
                    if ($user_access->view_module == 1) {
                        ?>
                        <div class="card-body">
                            <form
                                action="<?php echo MAINSITE_Admin . "$user_access->class_name/userRole-doUpdateStatus"; ?>"
                                name="ptype_list_form" method="post" class="form-horizontal" role="form">
                                <input type="hidden" name="task" id="task" value="" />
                                <? echo $this->session->flashdata('alert_message'); ?>
                                <table id="" class="table table-bordered table-hover myviewtable responsiveTableNewDesign">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong class="full">Data Base Id</strong>
                                                <?php echo $working_method_data->working_method_id ?>
                                            </td>
                                            <td>
                                                <strong class="full">working_method Link</strong>
                                                <?php echo $working_method_data->working_method_link ?>
                                            </td>
                                            <td>
                                                <strong class="full">working_method Image</strong>
                                                <img src="<?php echo MAINSITE . 'assets/uploads/working_method/' . $working_method_data->working_method_image ?>"
                                                    alt="">

                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <strong class="full">Content</strong>
                                                <?php echo $working_method_data->content ?>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                                <table id="" class="table table-bordered table-hover myviewtable responsiveTableNewDesign">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong class="full">Added On</strong>
                                                <?php echo date("d-m-Y h:i:s A", strtotime($working_method_data->added_on)) ?>
                                            </td>
                                            <td>
                                                <strong class="full">Added By</strong>
                                                <?php echo $working_method_data->added_by_name ?>
                                            </td>
                                            <td>
                                                <strong class="full">Updated On</strong>
                                                <? if (!empty($working_method_data->updated_on)) {
                                                    echo date("d-m-Y h:i:s A", strtotime($working_method_data->updated_on));
                                                } else {
                                                    echo "-";
                                                } ?>
                                            </td>
                                            <td>
                                                <strong class="full">Updated By</strong>
                                                <? if (!empty($working_method_data->updated_by_name)) {
                                                    echo $working_method_data->updated_by_name;
                                                } else {
                                                    echo "-";
                                                } ?>
                                            </td>
                                            <td>
                                                <strong class="full">Status</strong>
                                                <? if ($working_method_data->status == 1) { ?> Active <i
                                                        class="fas fa-check btn-success btn-sm "></i>
                                                <? } else { ?> Block <i class="fas fa-ban btn-danger btn-sm "></i> Block
                                                <? } ?></ td>

                                        </tr>

                                    </tbody>

                                </table>
                            </form>
                        </div>
                    <? } else {
                        $this->data['no_access_flash_message'] = "You Dont Have Access To View " . $page_module_name;
                        $this->load->view('admin/template/access_denied', $this->data);
                    } ?>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>


    </section>
    <? ?>

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