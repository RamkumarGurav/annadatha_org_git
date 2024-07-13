<?php
$page_module_name = "User Employee";
?>
<?
$name = $contactno = $email = $password = $address = $pincode = $profile_image = $user_employee_code = $birthday = $joining_date = $start_time = $end_time = "";
$user_employee_id = 0;
$branch_id = 0;
$designation_id = 0;
$department_id = 0;
$shift_timing_id = 0;
$country_id = 0;
$state_id = 0;
$city_id = 0;
$status = 1;
$record_action = "Add New Record";



if (!empty($user_employee_data)) {
	$record_action = "Update";
	$user_employee_id = $user_employee_data->user_employee_id;
	$branch_id = $user_employee_data->branch_id;
	$designation_id = $user_employee_data->designation_id;
	$department_id = $user_employee_data->department_id;
	// $shift_timing_id = $user_employee_data->shift_timing_id;
	$name = $user_employee_data->name;
	$contactno = $user_employee_data->contactno;
	$email = $user_employee_data->email;
	$start_time = $user_employee_data->start_time;
	$end_time = $user_employee_data->end_time;
	$birthday = date('d-m-Y', strtotime($user_employee_data->birthday));
	$joining_date = date('d-m-Y', strtotime($user_employee_data->joining_date));
	$password = $user_employee_data->password;
	$address = $user_employee_data->address;
	$pincode = $user_employee_data->pincode;
	$profile_image = $user_employee_data->profile_image;
	$user_employee_code = $user_employee_data->user_employee_code;
	$country_id = $user_employee_data->country_id;
	$state_id = $user_employee_data->state_id;
	$city_id = $user_employee_data->city_id;
	$status = $user_employee_data->status;
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
					<h1 class="m-0 text-dark"><?= $page_module_name ?> </small></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= MAINSITE_Admin . "wam" ?>">Home</a></li>
						<li class="breadcrumb-item"><a
								href="<?= MAINSITE_Admin . $user_access->class_name . "/" . $user_access->function_name ?>"><?= $user_access->module_name ?>
								List</a></li>
						<? if (!empty($user_employee_data)) { ?>
							<li class="breadcrumb-item"><a
									href="<?= MAINSITE_Admin . $user_access->class_name . "/view/" . $user_employee_id ?>">View</a>
							</li>
						<? } ?>
						<li class="breadcrumb-item"><?= $record_action ?></li>
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
						<h3 class="card-title"><?= $name ?> <small><?= $record_action ?></small></h3>
					</div>
					<!-- /.card-header -->
					<?php
					if ($user_access->view_module == 1 || true) {
						?>
						<? echo $this->session->flashdata('alert_message'); ?>
						<div class="card-body">


							<?php echo form_open(
								MAINSITE_Admin . "$user_access->class_name/doEdit",
								array(
									'method' => 'post',
									'id' => 'employee_form',
									"name" => "employee_form",
									'style' => '',
									'class' => 'form-horizontal',
									'role' => 'form',
									'onsubmit' => 'return validateForm()',
									'enctype' => 'multipart/form-data'
								)
							); ?>
							<input type="hidden" name="user_employee_id" id="user_employee_id" value="<?= $user_employee_id ?>" />
							<input type="hidden" name="redirect_type" id="redirect_type" value="" />

							<div class="">

								<div class="form-group row">

									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Branch <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<select type="text" class="form-control form-control-sm custom-select" required id="branch_id"
												onchange="getState(this.value ,0)" name="branch_id">
												<option value="">Select Branch</option>
												<? foreach ($branch_data as $item) {
													$selected = "";
													if ($item->branch_id == $branch_id) {
														$selected = "selected";
													}
													?>
													<option value="<?= $item->branch_id ?>" <?= $selected ?>> <?= $item->branch_name ?>
														<? if ($item->status != 1) {
															echo " [Block]";
														} ?>
													</option>
												<? } ?>
											</select>
										</div>
									</div>

									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Deparment <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<select type="text" class="form-control form-control-sm custom-select" required id="department_id"
												name="department_id">
												<option value="">Select Department</option>
												<? foreach ($department_data as $item) {
													$selected = "";
													if ($item->department_id == $department_id) {
														$selected = "selected";
													}
													?>
													<option value="<?= $item->department_id ?>" <?= $selected ?>> <?= $item->department_name ?>
														<? if ($item->status != 1) {
															echo " [Block]";
														} ?>
													</option>
												<? } ?>
											</select>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Designation <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<select type="text" class="form-control form-control-sm custom-select" required id="designation_id"
												name="designation_id">

												<option value="">Select Designation</option>
												<? foreach ($designation_data as $item) {
													$selected = "";
													if ($item->designation_id == $designation_id) {
														$selected = "selected";
													}
													?>
													<option value="<?= $item->designation_id ?>" <?= $selected ?>> <?= $item->designation_name ?>
														<? if ($item->status != 1) {
															echo " [Block]";
														} ?>
													</option>
												<? } ?>
											</select>
										</div>
									</div>


									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Employee Code<span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" required id="user_employee_code"
												name="user_employee_code" value="<?= $user_employee_code ?>" placeholder="Employee Code">
										</div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Employee Name <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12	">
											<input type="text" class="form-control form-control-sm" required id="name" name="name"
												value="<?= $name ?>" placeholder="Employee Name">
										</div>
									</div>


									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Start Time<span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<input type="time" class="form-control form-control-sm" required id="start_time" name="start_time"
												value="<?= $start_time ?>" placeholder="Start Time">
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">End Time<span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<input type="time" class="form-control form-control-sm" required id="end_time" name="end_time"
												value="<?= $end_time ?>" placeholder="End Time">
										</div>
									</div>


									<!-- <div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Shift Timing <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<select type="text" class="form-control form-control-sm custom-select" required id="shift_timing_id"
												onchange="getState(this.value ,0)" name="shift_timing_id">
												<option value="">Select Shift Timing</option>
												<? foreach ($shift_timing_data as $item) {
													$selected = "";
													if ($item->shift_timing_id == $shift_timing_id) {
														$selected = "selected";
													}
													?>
													<option value="<?= $item->shift_timing_id ?>" <?= $selected ?>>
														<?php if (!empty($item->login_time)): ?>
															<?= (new DateTime($item->login_time))->format('h:i A'); ?>
														<?php else: ?>
															-
														<?php endif; ?> to <?php if (!empty($item->logout_time)): ?>
															<?= (new DateTime($item->logout_time))->format('h:i A'); ?>
														<?php else: ?>
															-
														<?php endif; ?>
														<? if ($item->status != 1) {
															echo " [Block]";
														} ?>
													</option>
												<? } ?>
											</select>
										</div>
									</div> -->




								</div>

								<div class="form-group row">
									<div class="col-md-3 col-sm-6">

										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Employee Mobile No. <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<input type="number" class="form-control form-control-sm" pattern="[0-9]{8,15}" id="contactno"
												name="contactno" value="<?= $contactno ?>" placeholder="Mobile No.">
										</div>
									</div>

									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Employee Email <span
												style="color:#f00;font-size: 22px;margin-top: 3px;"></span></label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" id="email" name="email"
												value="<?= $email ?>" placeholder="Employee Email">
										</div>
									</div>

									<div class="col-lg-3 col-md-4 col-sm-6" style="z-index:99999;">
										<label for="inputEmail3" class="py-0 px-2 col-sm-12 col-form-label-lg label_content">Employee Birthday
											<span style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<div class="input-group date birthday_input" id="birthday_input" data-target-input="nearest">
												<input type="text" required value="<?= $birthday ?>" name="birthday" id="birthday"
													placeholder="Employee Birthday" style="width: 100%;"
													class="form-control datetimepicker-input width100 form-control-sm"
													data-target="#birthday_input" />
												<div class="input-group-append" data-target="#birthday_input" data-toggle="datetimepicker">
													<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div>

											</div>

										</div>
									</div>

									<div class="col-lg-3 col-md-4 col-sm-6">
										<label for="inputEmail3" class="py-0 px-2 col-sm-12 col-form-label-lg label_content">Joining Date
											<span style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<div class="input-group date joining_date_input" id="joining_date_input"
												data-target-input="nearest">
												<input type="text" value="<?= $joining_date ?>" name="joining_date" id="joining_date"
													placeholder="Joining Date" style="width: 100%;"
													class="form-control datetimepicker-input width100 form-control-sm"
													data-target="#joining_date_input" />
												<div class="input-group-append" data-target="#joining_date_input" data-toggle="datetimepicker">
													<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div>

											</div>

										</div>
									</div>

									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Employee Profile Image <span
												style="color:#f00;font-size: 22px;margin-top: 3px;"></span></label>
										<div class="col-sm-12 d-flex">
											<div class="input-group" style="width:90%">
												<div class="custom-file">
													<input type="file" name="profile_image" class="custom-file-input" id="files" accept="image/*">
													<label class="custom-file-label form-control-sm" for="files"></label>
												</div>
											</div>
											<div class="custom-file-display">
												<? if (!empty($profile_image)) { ?>
													<span class="pip">
														<a target="_blank"
															href="<?= _uploaded_files_ . 'user_employee/profile_image/' . $profile_image ?>">
															<img class="imageThumb"
																src="<?= _uploaded_files_ . 'user_employee/profile_image/' . $profile_image ?>" />
														</a>
													</span>
												<? } else { ?>
													<span class="pip">
														<img class="imageThumb" src="<?= MAINSITE ?>assets/images/no_image.jpg" />
													</span>
												<? } ?>
											</div>
										</div>
									</div>




								</div>

								<div class="form-group row">
									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Employee Password<span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" required id="password" name="password"
												value="<?= $password ?>" placeholder="Password">
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Country <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<select type="text" class="form-control form-control-sm custom-select" required id="country_id"
												onchange="getState(this.value ,0)" name="country_id">
												<option value="">Select Country</option>
												<? foreach ($country_data as $cd) {
													$selected = "";
													if ($cd->country_id == $country_id) {
														$selected = "selected";
													}
													?>
													<option value="<?= $cd->country_id ?>" <?= $selected ?>>
														<?= $cd->country_name ?>
														<? if ($cd->status != 1) {
															echo " [Block]";
														} ?>
													</option>
												<? } ?>
											</select>
										</div>
									</div>

									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">State <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<select type="text" class="form-control form-control-sm custom-select" required id="state_id"
												name="state_id" onchange="getCity(this.value ,0)">
												<option value="">Select State</option>
											</select>
										</div>
									</div>

									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">City <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<select type="text" class="form-control form-control-sm custom-select" required id="city_id"
												name="city_id">
												<option value="">Select City</option>
											</select>
										</div>
									</div>


								</div>
								<div class="form-group row">

									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Address<span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" required id="address" name="address"
												value="<?= $address ?>" placeholder="Address">
										</div>
									</div>

									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Pincode <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" id="pincode" name="pincode"
												value="<?= $pincode ?>" placeholder="Pincode">
										</div>
									</div>

									<div class="col-md-3 col-sm-6">
										<label for="radioSuccess1" class="col-sm-12 label_content px-2 py-0">Status</label>
										<div class="col-sm-12">
											<div class="form-check" style="">
												<div class="form-group clearfix">
													<div class="icheck-success d-inline">
														<input type="radio" name="status" <? if ($status == 1) {
															echo "checked";
														} ?> value="1"
															id="radioSuccess1">
														<label for="radioSuccess1"> Active
														</label>
													</div>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<div class="icheck-danger d-inline">
														<input type="radio" name="status" <? if ($status != 1) {
															echo "checked";
														} ?> value="0"
															id="radioSuccess2">
														<label for="radioSuccess2"> Block
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /.card-body -->
								<div class="card-footer">
									<center>
										<div id="before_submit">
											<button type="submit" name="save" onclick=" redirect_type_func('');" value="1"
												class="btn btn-info">Save</button>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<button type="submit" name="save-add-new" onclick="redirect_type_func('save-add-new'); " value="1"
												class="btn btn-default ">Save And Add New</button>
										</div>

										<div id="after_submit" style="display:none">
											<button class="btn btn-info" type="button" disabled>
												<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
												Loading...
											</button>
										</div>
									</center>

								</div>
								<!-- /.card-footer -->

								<?php echo form_close() ?>
								</table>
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
<script>

	// Function to validate the form before submission
	function validateForm() {
		event.preventDefault(); // Prevent the form from submitting
		showFormSubmitLoading(); // Show a loading indicator
		validate_user_employee_code('yes'); // Validate the company unique name, then proceed to validate email
		$(".error_span").html(""); // Clear any error messages
	}

	// Function to validate the company unique name
	function validate_user_employee_code(is_submit) {
		Pace.restart(); // Restart the Pace loading animation
		var user_employee_code = $('#user_employee_code').val(); // Get the value of the company unique name input
		var user_employee_id = $('#user_employee_id').val(); // Get the value of the company profile ID input
		$("#user_employee_code").removeClass("is-invalid"); // Remove invalid class if present
		$("#user_employee_code").removeClass("is-valid"); // Remove valid class if present
		$("#user_employee_code_error").html(""); // Clear any error messages

		if (user_employee_code == '') { // Check if the company unique name is empty
			toastrDefaultErrorFunc("Employee Code Can Not Be Empty."); // Show error message
			hideFormSubmitLoading(); // Hide the loading indicator
			return false; // Stop further execution
		}

		// AJAX request to validate the company unique name
		$.ajax({
			url: "<?= MAINSITE_Admin . 'Validation/isDuplicateUserEmployeeCode' ?>", // URL to send the request to
			type: 'post', // HTTP method
			dataType: "json", // Expected data type
			data: { 'user_employee_code': user_employee_code, 'user_employee_id': user_employee_id, "<?= $csrf['name'] ?>": "<?= $csrf['hash'] ?>" }, // Data to send
			success: function (response) { // Function to execute on successful response
				if (response.boolean_response) { // If the unique name exists in the database
					toastrDefaultErrorFunc(response.message); // Show error message
					hideFormSubmitLoading(); // Hide the loading indicator
					$("#user_employee_code").addClass("is-invalid"); // Add invalid class
					$("#user_employee_code_error").html("<br>" + response.message); // Show error message
					return false; // Stop further execution
				}
				else {
					$("#user_employee_code").addClass("is-valid"); // Add valid class
					if (is_submit == "yes") { validate_user_employee_code(is_submit); } // If validation is successful, proceed to validate email
				}
			},
			error: function (request, error) { // Function to execute on error
				toastrDefaultErrorFunc("Unknown Error. Please Try Again"); // Show error message
			}
		});
	}


	// Function to validate the company email
	function validate_user_employee_code(is_submit) {
		Pace.restart(); // Restart the Pace loading animation
		var email = $('#email').val(); // Get the value of the email input
		var user_employee_id = $('#user_employee_id').val(); // Get the value of the company profile ID input
		$("#email").removeClass("is-invalid"); // Remove invalid class if present
		$("#email").removeClass("is-valid"); // Remove valid class if present
		$("#email_error").html(""); // Clear any error messages

		if (email == '') { // Check if the email is empty
			toastrDefaultErrorFunc("Employee Code Can Not Be Empty."); // Show error message
			hideFormSubmitLoading(); // Hide the loading indicator
			return false; // Stop further execution
		}

		// AJAX request to validate the company email
		$.ajax({
			url: "<?= MAINSITE_Admin . 'Validation/isDuplicateCompanyEmail' ?>", // URL to send the request to
			type: 'post', // HTTP method
			dataType: "json", // Expected data type
			data: { 'email': email, 'user_employee_id': user_employee_id, "<?= $csrf['name'] ?>": "<?= $csrf['hash'] ?>" }, // Data to send
			success: function (response) { // Function to execute on successful response
				if (response.boolean_response) { // If the email exists in the database
					toastrDefaultErrorFunc(response.message); // Show error message
					$("#email").addClass("is-invalid"); // Add invalid class
					hideFormSubmitLoading(); // Hide the loading indicator
					$("#email_error").html("<br>" + response.message); // Show error message
					return false; // Stop further execution
				}
				else {
					$("#email").addClass("is-valid"); // Add valid class
					if (is_submit == "yes") { $('#employee_form').attr('onsubmit', ''); $("#employee_form").submit(); } // If validation is successful, submit the form
				}
			},
			error: function (request, error) { // Function to execute on error
				toastrDefaultErrorFunc("Unknown Error. Please Try Again"); // Show error message
			}
		});
	}


	// Function to set the redirect type
	function redirect_type_func(data) {
		document.getElementById("redirect_type").value = data; // Set the redirect type value
		return true; // Return true
	}

	// Function to get states based on the selected country
	function getState(country_id, state_id = 0) {
		$("#state_id").html(''); // Clear the state dropdown
		$("#city_id").html(''); // Clear the city dropdown
		if (country_id > 0) { // Check if a valid country is selected
			Pace.restart(); // Restart the Pace loading animation
			$.ajax({
				url: "<?= MAINSITE_Admin . 'Ajax/getState' ?>", // URL to send the request to
				type: 'post', // HTTP method
				dataType: "json", // Expected data type
				data: { 'country_id': country_id, 'state_id': state_id, "<?= $csrf['name'] ?>": "<?= $csrf['hash'] ?>" }, // Data to send
				success: function (response) { // Function to execute on successful response
					$("#state_id").html(response.state_html); // Populate the state dropdown with the response
				},
				error: function (request, error) { // Function to execute on error
					toastrDefaultErrorFunc("Unknown Error. Please Try Again"); // Show error message
				}
			});
		}
	}

	// Function to get cities based on the selected state
	function getCity(state_id, city_id = 0) {
		$("#city_id").html(''); // Clear the city dropdown
		if (state_id > 0) { // Check if a valid state is selected
			Pace.restart(); // Restart the Pace loading animation
			$.ajax({
				url: "<?= MAINSITE_Admin . 'Ajax/getCity' ?>", // URL to send the request to
				type: 'post', // HTTP method
				dataType: "json", // Expected data type
				data: { 'city_id': city_id, 'state_id': state_id, "<?= $csrf['name'] ?>": "<?= $csrf['hash'] ?>" }, // Data to send
				success: function (response) { // Function to execute on successful response
					$("#city_id").html(response.city_html); // Populate the city dropdown with the response
				},
				error: function (request, error) { // Function to execute on error
					toastrDefaultErrorFunc("Unknown Error. Please Try Again"); // Show error message
				}
			});
		}
	}




	// Event listener for when the window loads
	window.addEventListener('load', function () {

		// If country_id and state_id are not empty, get the states for the selected country
		<? if (!empty($country_id) && !empty($state_id)) { ?>
			getState(<?= $country_id ?>, <?= $state_id ?>)
		<? } ?>

		// If city_id and state_id are not empty, get the cities for the selected state
		<? if (!empty($city_id) && !empty($state_id)) { ?>
			getCity(<?= $state_id ?>, <?= $city_id ?>)
		<? } ?>



		// Check if the File API is supported by the browser
		if (window.File && window.FileList && window.FileReader) {
			$("#files").on("change", function (e) {
				var files = e.target.files, // Get the selected files
					filesLength = files.length; // Get the number of selected files

				// Loop through each selected file
				for (var i = 0; i < filesLength; i++) {
					var f = files[i]; // Get the current file
					var fileReader = new FileReader(); // Create a new FileReader object
					fileReader.onload = (function (e) {
						var file = e.target; // Get the file from the event

						// Customized code to display the image
						$(".pip").remove(); // Remove any existing .pip elements
						$(".custom-file-display").html("<span class=\"pip\">" + // Insert the new image inside .custom-file-display element
							"<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" + "</span>");
					});
					fileReader.readAsDataURL(f);//actualy this triggers the above "	fileReader.onload"  // Read the file as a data URL (base64 encoded string)
				}
			});
		} else {
			alert("Your browser doesn't support to File API"); // Alert the user if the File API is not supported
		}

		// Check if the File API is supported by the browser
		if (window.File && window.FileList && window.FileReader) {
			$("#letterhead_header_image").on("change", function (e) {
				var files = e.target.files, // Get the selected files
					filesLength = files.length; // Get the number of selected files

				// Loop through each selected file
				for (var i = 0; i < filesLength; i++) {
					var f = files[i]; // Get the current file
					var fileReader = new FileReader(); // Create a new FileReader object
					fileReader.onload = (function (e) {
						var file = e.target; // Get the file from the event

						// Customized code to display the image
						$(".pip1").remove(); // Remove any existing .pip1 elements
						$(".custom-file-display1").html("<span class=\"pip1\">" + // Insert the new image inside .custom-file-display1 element
							"<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" + "</span>");
					});
					fileReader.readAsDataURL(f);//actualy this triggers the above "	fileReader.onload"  // Read the file as a data URL (base64 encoded string)
				}
			});
		} else {
			alert("Your browser doesn't support to File API"); // Alert the user if the File API is not supported
		}



	});



	window.addEventListener('load', function () {
		<? if (!empty($country_id) && !empty($state_id)) { ?>
			getState(<?= $country_id ?>, <?= $state_id ?>)
		<? } ?>

		<? if (!empty($city_id) && !empty($state_id)) { ?>
			getCity(<?= $state_id ?>, <?= $city_id ?>)
		<? } ?>

		//setSearch();
		var dateFormat = "DD-MM-YYYY";
		var CurrDate = new Date();
		var MinDate = new Date();
		var MaxDate = new Date();

		dateCurr = moment(CurrDate, dateFormat);
		dateMin = moment(MinDate, dateFormat);
		dateMax = moment(MaxDate, dateFormat);
		$('#joining_date_input').datetimepicker({
			format: dateFormat,
			//maxDate: dateMax,
			ignoreReadonly: true
		});
		$('#birthday_input').datetimepicker({
			format: dateFormat,
			//maxDate: dateMax,
			ignoreReadonly: true
		});

		$('#termination_date_input').datetimepicker({
			format: dateFormat,
			//maxDate: dateMax,
			timepicker: false,
			ignoreReadonly: true
		});
		<? if (!empty($termination_date)) { ?>
			$('#termination_date_input').val('');
		<? } ?>

	})
</script>