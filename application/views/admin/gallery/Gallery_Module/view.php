<?php

$page_module_name = "Gallery";

?>
<?php
$name = "";
$id = 0;
$status = 1;
$record_action = "Add New Record";
if (!empty($gallery_data)) {
    // $record_action = "Update";
    // $id = $gallery_data->id;
    // $name = $gallery_data->name;
    // $status = $gallery_data->status;

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
                        <h3 class="card-title"><?php echo $gallery_data->name ?></h3>
                        <div class="float-right">
                            <?php if ($user_access->add_module == 1 && false) { ?>
                                <a href="<?php echo MAINSITE_Admin . $user_access->class_name ?>/edit"><button type="button"
                                        class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</button></a>
                            <?php } ?>
                            <?php if ($user_access->update_module == 1) { ?>
                                <a
                                    href="<?php echo MAINSITE_Admin . $user_access->class_name ?>/edit/<?php echo $gallery_data->id ?>"><button
                                        type="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>
                                        Update</button></a>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <?php
                    if ($user_access->view_module == 1) {
                        ?>
                        <div class="card-body card-primary card-outline">

                            <?php echo form_open(MAINSITE_Admin . "$user_access->class_name/userRole-doUpdateStatus", array('method' => 'post', 'id' => 'ptype_list_form', "name" => "ptype_list_form", 'style' => '', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
                            <input type="hidden" name="task" id="task" value="" />
                            <?php echo $this->session->flashdata('alert_message'); ?>



                            <table id="" class="table table-bordered table-hover myviewtable responsiveTableNewDesign">
                                <tbody>
                                    <tr>
                                        <td><strong class="full">Data Base Id</strong><?php echo $gallery_data->id ?></td>
                                        <td><strong class="full">Gallery Name</strong><?php echo $gallery_data->name ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong class="full">Gallery Image</strong>
                                            <?php if (!empty($gallery_data->image)) { ?>
                                                <span class="pip"><a target="_blank"
                                                        href="<?php echo _uploaded_files_ . 'gallery/medium/' . $gallery_data->image ?>"><img
                                                            class="imageThumb"
                                                            src="<?php echo _uploaded_files_ . 'gallery/medium/' . $gallery_data->image ?>"
                                                            style="max-width:320px;" /></a></span>
                                            <?php } else { ?>
                                                <span class="pip"><img class="imageThumb"
                                                        src="<?php echo _uploaded_files_ ?>no-img.png" /></span>
                                            <?php } ?>
                                        </td>

                                    </tr>


                                    <tr>
                                        <td>
                                            <strong class="full">Added On</strong>
                                            <?php echo date("d-m-Y h:i:s A", strtotime($gallery_data->added_on)) ?>
                                        </td>
                                        <td>
                                            <strong class="full">Added By</strong>
                                            <?php echo $gallery_data->added_by_name ?>
                                        </td>
                                        <td>
                                            <strong class="full">Updated On</strong>
                                            <?php if (!empty($gallery_data->updated_on)) {
                                                echo date("d-m-Y h:i:s A", strtotime($gallery_data->updated_on));
                                            } else {
                                                echo "-";
                                            } ?>
                                        </td>
                                        <td>
                                            <strong class="full">Updated By</strong>
                                            <?php if (!empty($gallery_data->updated_by_name)) {
                                                echo $gallery_data->updated_by_name;
                                            } else {
                                                echo "-";
                                            } ?>
                                        </td>
                                        <td>
                                            <strong class="full">Status</strong>
                                            <?php if ($gallery_data->status == 1) { ?> Active <i
                                                    class="fas fa-check btn-success btn-sm "></i>
                                            <?php } else { ?> Block <i class="fas fa-ban btn-danger btn-sm "></i>
                                            <?php } ?>
                                        </td>



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