<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once (APPPATH . "controllers/secureRegions/Main.php");
class Stock_Module extends Main
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->model('Common_Model');
		$this->load->model('administrator/Admin_Common_Model');
		$this->load->model('administrator/Admin_model');
		$this->load->model('administrator/catalog/Stock_Model');
		$this->load->model('administrator/catalog/Store_Model');
		$this->load->library('pagination');
		$this->load->library('User_auth');
		$session_uid = $this->data['session_uid'] = $this->session->userdata('sess_psts_uid');
		$this->data['session_name'] = $this->session->userdata('sess_psts_name');
		$this->data['session_email'] = $this->session->userdata('sess_psts_email');
		$this->load->helper('url');
		$this->data['User_auth_obj'] = new User_auth();
		$this->data['user_data'] = $this->data['User_auth_obj']->check_user_status();
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->data['page_module_id'] = 17;
	}

	function unset_only()
	{
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
	}

	function index()
	{
		parent::get_header();
		parent::get_left_nav();
		$this->load->view('admin/catalog/Product_Module/listing', $this->data);
		parent::get_footer();
	}

	function listing()
	{
		$this->data['page_type'] = "list";
		$this->data['page_module_id'] = 18;
		$this->data['user_access'] = $this->data['User_auth_obj']->check_user_access(array("module_id" => $this->data['page_module_id']));

		if (isset($_POST['saveStock'])) {
			$quantity = $_POST['quantity'];
			$product_id = $_POST['product_id'];
			$product_combination_id = $_POST['product_combination_id'];
			$quantity_per_order = $_POST['quantity_per_order'];
			$stock_out_msg = $_POST['stock_out_msg'];
			$product_in_store_id = $_POST['product_in_store_id'];

			$data_prod_price_qty['quantity_per_order'] = $quantity_per_order;
			$data_prod_price_qty['stock_out_msg'] = $stock_out_msg;
			$data_prod_price_qty['quantity'] = $quantity;
			/*$data_prod_price_qty['price'] = $price;
				 $data_prod_price_qty['discount'] = $discount;
				 $data_prod_price_qty['discount_var'] = $discount_var;
				 $data_prod_price_qty['final_price'] = $final_price;*/
			$data_prod_price_qty['updated_by'] = $this->session->userdata("sess_store_user_id");
			$data_prod_price_qty['updated_on'] = date('Y-m-d H:i:s');
			$condition = "(product_in_store_id = $product_in_store_id)";

			$alert_message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-ban"></i> Something Went Wrong. Please Try Again. </div>';
			$this->session->set_flashdata('alert_message', $alert_message);

			$insertStatus = $this->Common_Model->update_operation(array("table" => "product_in_store", "data" => $data_prod_price_qty, "condition" => $condition)); //echo $insertStatus;
			if ($insertStatus) {
				$alert_message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-check"></i> Record updated successfully. </div>';
			}
			$this->session->set_flashdata('alert_message', $alert_message);
			REDIRECT(MAINSITE_Admin . $this->data['user_access']->class_name . '/' . $this->data['user_access']->function_name);
		}
		//print_r($this->data['user_access']);
		if (empty($this->data['user_access'])) {
			REDIRECT(MAINSITE_Admin . "wam/access-denied");
		}
		$search = array();
		$end_date = '';
		$start_date = '';
		$record_status = "";
		$customer_profile_id = "";
		$microchip_mode = "";
		$admin_user_id = "";

		if (!empty($_POST['end_date']))
			$end_date = $_POST['end_date'];
		if (!empty($_POST['start_date']))
			$start_date = $_POST['start_date'];
		if (!empty($_POST['record_status']))
			$record_status = $_POST['record_status'];
		if (!empty($_POST['customer_profile_id']))
			$customer_profile_id = $_POST['customer_profile_id'];
		if (!empty($_POST['microchip_mode']))
			$microchip_mode = $_POST['microchip_mode'];
		if (!empty($_POST['admin_user_id']))
			$admin_user_id = $_POST['admin_user_id'];

		$this->data['end_date'] = $end_date;
		$this->data['start_date'] = $start_date;
		$this->data['record_status'] = $record_status;
		$this->data['customer_profile_id'] = $customer_profile_id;
		$this->data['microchip_mode'] = $microchip_mode;
		$this->data['admin_user_id'] = $admin_user_id;
		$search['end_date'] = $end_date;
		$search['start_date'] = $start_date;
		$search['record_status'] = $record_status;
		$search['customer_profile_id'] = $customer_profile_id;
		$search['microchip_mode'] = $microchip_mode;
		$search['admin_user_id'] = $admin_user_id;
		$search['search_for'] = "count";
		$data_count = $this->Stock_Model->get_product($search);
		if (!empty($data_count))
			$r_count = $this->data['row_count'] = $data_count[0]->counts;
		else
			$r_count = $this->data['row_count'] = 0;

		unset($search['search_for']);
		$offset = (int) $this->uri->segment(5); //echo $offset;
		if ($offset == "") {
			$offset = '0';
		}
		$per_page = _all_pagination_;
		$this->load->library('pagination');
		//$config['base_url'] =MAINSITE.'secure_region/reports/DispatchedOrders/'.$module_id.'/';
		$this->load->library('pagination');
		$config['base_url'] = MAINSITE_Admin . $this->data['user_access']->class_name . '/' . $this->data['user_access']->function_name . '/';
		$config['total_rows'] = $r_count;
		$config['uri_segment'] = '5';
		$config['per_page'] = $per_page;
		$config['num_links'] = 4;
		$config['first_link'] = '&lsaquo; First';
		$config['last_link'] = 'Last &rsaquo;';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['attributes'] = array('class' => 'paginationClass');
		$this->pagination->initialize($config);
		$this->data['page_is_master'] = $this->data['user_access']->is_master;
		$this->data['page_parent_module_id'] = $this->data['user_access']->parent_module_id;
		$search['details'] = 1;
		$search['limit'] = $per_page;
		$search['offset'] = $offset;
		//$this->data['employee_data'] = $this->Common_Model->getData(array('select'=>'*' , 'from'=>'admin_user' , 'where'=>"admin_user_id > 0" , "order_by"=>"name ASC"));
		$this->data['product_data'] = $this->Stock_Model->get_product($search);
		//pr($this->data['product_data']);
		//$this->data['category_data'] = $this->Store_Model->get_category($search);
		parent::get_header();
		parent::get_left_nav();
		$this->load->view('admin/catalog/Stock_Module/listing', $this->data);
		parent::get_footer();
	}

	function GetCompleteProductsListInStoreMonitoringEditQtyPrice()
	{
		$product_id = $_POST['product_id'];
		$combi_id = $_POST['combi_id'];
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		if (true) {
			$search['product_id'] = $product_id;
			$search['product_combination_id'] = $combi_id;
			//$this->data['employee_data'] = $this->Common_Model->getData(array('select'=>'*' , 'from'=>'admin_user' , 'where'=>"admin_user_id > 0" , "order_by"=>"name ASC"));
			$products_list = $this->Stock_Model->get_product($search);
			//echo "<pre>";print_r($products_list);echo "</pre>";
			//echo $this->db->last_query();
			$count = 0;
			$show = "";
			if (count($products_list) != 0) {
				foreach ($products_list as $col) {
					$col = (array) $col;
					$product_name = $col['product_display_name'];
					$product_id = $col['product_id'];
					$manufacturer_name = $col['brand_name'];

					$updated_on = "";
					$link = '';//ADMIN_STORE."products/view/".$col['product_id'];

					//if($row['super_category_name'] ==''){$row['super_category_name']= 'Parent';}
					$popCount = 0;
					$row = $col;
					//foreach($col['product_combination'] as $row)
					{
						//$discount = $row['discount'].' '.$col['product_combination'][0]['discount_var'];
						if (empty($discount)) {
							$discount = '';
						}
						$price = $row['price'];
						if (empty($price)) {
							$price = 'N/A';
						}
						$product_in_store_id = $row['product_in_store_id'];
						$product_combination_id = $row['product_combination_id'];
						$final_price = $row['final_price'];
						if (empty($final_price)) {
							$final_price = 'N/A';
						}
						$quantity = $row['quantity'];
						if (empty($quantity)) {
							$quantity = 'N/A';
						}
						$product_image_name = $row['product_image_name'];
						$combi = $row['combi'];
						$stock_out_msg = $row['stock_out_msg'];
						$discount = $row['discount'];
						$discount_var = $row['discount_var'];
						$quantity_per_order = $row['quantity_per_order'];
						$product_image_name = $row['product_image_name'];
						if ($row['updated_on'] != '0000-00-00 00:00:00') {
							$updated_on = date('d-m-Y', strtotime($row['updated_on']));
						} else {
							$updated_on = 'N/A';
						}
						//$in_store = $row['in_store'];  $in_store!=0
						$popCount++;
						$count++;
						if (true) {
							?>
							<form role="form" class="form-horizontal" name="ProductAttributeForm" id="ProductAttributeForm" action="" method="post"
								enctype="multipart/form-data">
								<input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id; ?>" />
								<input type="hidden" name="product_in_store_id" id="product_in_store_id"
									value="<?php echo $product_in_store_id; ?>" />
								<input type="hidden" name="product_combination_id" id="product_combination_id"
									value="<?php echo $product_combination_id; ?>" />
								<input type="hidden" name="store_id" id="store_id" value="1" />

								<div class="form-group row">
									<div class="col-md-3"> <a class="btn btn-default"
											href="<? echo base_url() . 'assets/uploads/product/large/' . $product_image_name ?>" target="_blank"><img
												src="<? echo base_url() . 'assets/uploads/product/large/' . $product_image_name ?>" width="75" /></a></div>
									<div class="col-md-9">
										<div class="label-wrapper">
											<label class="control-label" for="Name">Product Name</label>
										</div>
										<div class="input-group input-group-required">
											<? echo $product_name; ?> <br>

											<?
											$category_name = explode("~;", $combi);
											if (count($category_name) > 1) {
												echo "<ol>";
												foreach ($category_name as $cn) {
													echo "<li>$cn</li>";
												}
												echo "</ol>";
											} else {
												echo $category_name[0];
											}

											?>
										</div>
									</div><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span>
								</div>
								</div>

								<?php /*?><div class="form-group"><div class="col-md-3"><div class="label-wrapper">
																			<label class="control-label" for="Name">Manufacture Name</label>
																			</div></div><div class="col-md-9"><div class="input-group input-group-required">
																			<? echo $manufacturer_name;?>
																			</div></div><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span></div><?php */ ?>

								<?php /*?><div class="form-group"><div class="col-md-3"><div class="label-wrapper">
																			<label class="control-label" for="Name">Combination</label>
																			</div></div><div class="col-md-9"><div class="input-group input-group-required">
																			<? echo $combi;?>
																			</div></div><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span></div><?php */ ?>

								<div class="form-group row">
									<div class="col-md-6">
										<div class="label-wrapper">
											<label class="control-label" for="Name">Quantity</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-required">
											<input type="text" name="quantity" id="quantity" pattern="[0-9]{1,10}" title="Enter Only Number"
												placeholder="Combination Quantity" class="form-control" value="<? echo $quantity ?>" required>
										</div>
									</div><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span>
								</div>

								<div class="form-group row">
									<div class="col-md-6">
										<div class="label-wrapper">
											<label class="control-label" for="Name">Quantity Per Order</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-required">
											<input type="text" name="quantity_per_order" id="quantity_per_order" pattern="[0-9]{1,10}"
												title="Enter Only Number" placeholder="Quantity Per Order" class="form-control"
												value="<? echo $quantity_per_order ?>" required>
										</div>
									</div><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span>
								</div>
								</div>

								<div class="form-group row">
									<div class="col-md-6">
										<div class="label-wrapper">
											<label class="control-label" for="Name">Out Of Stock Message</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-required">
											<input type="text" name="stock_out_msg" id="stock_out_msg" placeholder="Out Of Stock Message"
												class="form-control" value="<? echo $stock_out_msg ?>" required>
										</div>
									</div><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span>
								</div>
								</div>

								<?php /*?> <div class="form-group"><div class="col-md-3"><div class="label-wrapper">
																			<label class="control-label" for="Name">Price</label>
																			</div></div><div class="col-md-9"><div class="input-group input-group-required">
																			<input type="text" name="price" id="price"  title="Enter Only Number"  placeholder="Combination Price" class="form-control" value="<? echo $price ?>" required >
																			</div></div><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span></div>
																			
																			<div class="form-group"><div class="col-md-3"><div class="label-wrapper">
																			<label class="control-label" for="Name">Discount</label>
																			</div></div><div class="col-md-9"><div class="input-group input-group-required">
																			<input type="text" name="discount" title="Enter Only Number" id="discount"  placeholder="Combination Discount" class="form-control" value="<? echo $discount ?>"  >
																			</div></div><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span></div>
																			
																			<div class="form-group"><div class="col-md-3"><div class="label-wrapper">
																			<label class="control-label" for="Name">Discount Variable</label>
																			</div></div><div class="col-md-9"><div class="input-group input-group-required">
																			<select name="discount_var" id="discount_var"  class="form-control" onchange="combinationValidation(1)">
																			<option value="">Select Discount Variable</option>
																			<option <? if($discount_var=='Rs'){echo 'selected';} ?> value="Rs">Rs. Off</option>
																			<option <? if($discount_var=='%'){echo 'selected';} ?> value="%"> % Off</option>
																			</select>
																			</div></div><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span></div>
																			
																			<div class="form-group"><div class="col-md-3"><div class="label-wrapper">
																			<label class="control-label" for="Name">Final Price</label>
																			</div></div><div class="col-md-9"><div class="input-group input-group-required">
																			<input type="text" readonly="readonly" name="final_price" id="final_price"  placeholder="Combination Final Price" class="form-control" value="<? echo $final_price ?>" required style="width:400px"><button type="button" onclick="combinationValidation(1)"  ><i class="fa fa-refresh" style="font-size:24px;color:red"></i></button>
																			</div></div><span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span></div>
																			<?php */ ?>
								<div class="pull-right" id="DisplayButton">
									<button type="submit" value="1" name="saveStock" class="btn bg-blue"><i class="fa fa-floppy-o"></i>Save</button>
								</div>
							</form>

						<?
						}
					}
				}
			}
			//echo $show;
		} else {
			$this->sessionOut();
		}


	}



	function view($product_id = "")
	{
		$this->data['page_type'] = "list";
		$this->data['page_module_id'] = 17;
		$this->data['user_access'] = $this->data['User_auth_obj']->check_user_access(array("module_id" => $this->data['page_module_id']));
		//print_r($this->data['user_access']);
		if (empty($product_id)) {
			$alert_message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-ban"></i> Something Went Wrong. Please Try Again. </div>';
			$this->session->set_flashdata('alert_message', $alert_message);
			REDIRECT(MAINSITE_Admin . $user_access->class_name . "/" . $user_access->function_name);
			exit;
		}

		if (empty($this->data['user_access'])) {
			REDIRECT(MAINSITE_Admin . "wam/access-denied");
		}

		$this->data['page_is_master'] = $this->data['user_access']->is_master;
		$this->data['page_parent_module_id'] = $this->data['user_access']->parent_module_id;
		$this->data['product_detail'] = $this->Stock_Model->get_product(array("product_id" => $product_id, "details" => 1));
		$this->data['product_image_detail'] = $this->Stock_Model->get_product_images(array("product_id" => $product_id));
		$this->data['product_category_detail'] = $this->Stock_Model->get_product_category(array("product_id" => $product_id));
		$this->data['product_combination_detail'] = $this->Stock_Model->get_product_combination_detail(array("product_id" => $product_id));
		$this->data['product_seo_detail'] = $this->Common_Model->getData(array('select' => '*', 'from' => 'product_seo', 'where' => "product_id = $product_id"));
		$this->data['product_combination_attribute_detail'] = $this->Stock_Model->get_product_combination_attribute_detail(array("product_id" => $product_id));
		$this->data['product_attribute_list'] = $this->Stock_Model->get_product_attribute_list();
		$this->data['attribute_value_list'] = $this->Store_Model->get_attribute_value_list();
		if (empty($this->data['product_detail'])) {
			$alert_message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-ban"></i> Something Went Wrong. Please Try Again. </div>';
			$this->session->set_flashdata('alert_message', $alert_message);
			REDIRECT(MAINSITE_Admin . $user_access->class_name . "/" . $user_access->function_name);
			exit;
		}

		$this->data['product_detail'] = $this->data['product_detail'][0];
		$this->data['product_category_detail'] = $this->Stock_Model->get_product_category(array("product_id" => $product_id));
		$this->data['category_list'] = $this->Store_Model->get_category();
		$this->data['brand_list'] = $this->Store_Model->get_brand();
		$this->data['tax_list'] = $this->Store_Model->get_tax();
		parent::get_header();
		parent::get_left_nav();
		$this->load->view('admin/catalog/Product_Module/view', $this->data);
		parent::get_footer();
	}

	function list_export()
	{
		$this->data['page_type'] = "list";
		$this->data['page_module_id'] = 17;
		$this->data['user_access'] = $this->data['User_auth_obj']->check_user_access(array("module_id" => $this->data['page_module_id']));
		//print_r($this->data['user_access']);
		if (empty($this->data['user_access'])) {
			REDIRECT(MAINSITE_Admin . "wam/access-denied");
		}
		if ($this->data['user_access']->export_data != 1) {
			$this->session->set_flashdata('no_access_flash_message', "You Are Not Allowed To Export " . $user_access->module_name);
			REDIRECT(MAINSITE_Admin . "wam/access-denied");
		}
		$search = array();
		$end_date = '';
		$start_date = '';
		$record_status = "";
		$customer_profile_id = "";
		$microchip_mode = "";
		$admin_user_id = "";
		if (!empty($_POST['end_date']))
			$end_date = $_POST['end_date'];
		if (!empty($_POST['start_date']))
			$start_date = $_POST['start_date'];
		if (!empty($_POST['record_status']))
			$record_status = $_POST['record_status'];
		if (!empty($_POST['customer_profile_id']))
			$customer_profile_id = $_POST['customer_profile_id'];
		if (!empty($_POST['microchip_mode']))
			$microchip_mode = $_POST['microchip_mode'];
		if (!empty($_POST['admin_user_id']))
			$admin_user_id = $_POST['admin_user_id'];

		$this->data['end_date'] = $end_date;
		$this->data['start_date'] = $start_date;
		$this->data['record_status'] = $record_status;
		$this->data['customer_profile_id'] = $customer_profile_id;
		$this->data['microchip_mode'] = $microchip_mode;
		$this->data['admin_user_id'] = $admin_user_id;
		$search['end_date'] = $end_date;
		$search['start_date'] = $start_date;
		$search['record_status'] = $record_status;
		$search['customer_profile_id'] = $customer_profile_id;
		$search['microchip_mode'] = $microchip_mode;
		$search['admin_user_id'] = $admin_user_id;
		$search['details'] = 1;
		$this->data['microchip_data'] = $this->Store_Model->get_microchip($search);
		$this->load->view('admin/catalog/Product_Module/microchip_list_export', $this->data);
	}

	function pdf()
	{
		$this->load->library('pdf');
		$this->data['page_type'] = "list";
		$this->data['page_module_id'] = 17;
		$this->data['user_access'] = $this->data['User_auth_obj']->check_user_access(array("module_id" => $this->data['page_module_id']));
		//print_r($this->data['user_access']);
		if (empty($this->data['user_access'])) {
			REDIRECT(MAINSITE_Admin . "wam/access-denied");
		}
		if ($this->data['user_access']->export_data != 1) {
			$this->session->set_flashdata('no_access_flash_message', "You Are Not Allowed To Export " . $user_access->module_name);
			REDIRECT(MAINSITE_Admin . "wam/access-denied");
		}

		$search = array();
		$end_date = '';
		$start_date = '';
		$record_status = "";
		$customer_profile_id = "";
		$microchip_mode = "";
		$admin_user_id = "";

		if (!empty($_POST['end_date']))
			$end_date = $_POST['end_date'];
		if (!empty($_POST['start_date']))
			$start_date = $_POST['start_date'];
		if (!empty($_POST['record_status']))
			$record_status = $_POST['record_status'];
		if (!empty($_POST['customer_profile_id']))
			$customer_profile_id = $_POST['customer_profile_id'];
		if (!empty($_POST['microchip_mode']))
			$microchip_mode = $_POST['microchip_mode'];
		if (!empty($_POST['admin_user_id']))
			$admin_user_id = $_POST['admin_user_id'];

		$this->data['end_date'] = $end_date;
		$this->data['start_date'] = $start_date;
		$this->data['record_status'] = $record_status;
		$this->data['customer_profile_id'] = $customer_profile_id;
		$this->data['microchip_mode'] = $microchip_mode;
		$this->data['admin_user_id'] = $admin_user_id;

		$search['end_date'] = $end_date;
		$search['start_date'] = $start_date;
		$search['record_status'] = $record_status;
		$search['customer_profile_id'] = $customer_profile_id;
		$search['microchip_mode'] = $microchip_mode;
		$search['admin_user_id'] = $admin_user_id;
		$search['details'] = 1;

		$this->data['microchip_data'] = $this->Store_Model->get_microchip($search);
		//$this->load->view('admin/catalog/Product_Module/microchip_list_export' , $this->data);
		$date = date('Y-m-d H:i:s');
		//echo "$customer_name : $customer_name <br>";
		$html = $this->load->view('admin/catalog/Product_Module/microchip_list_pdf', $this->data, true);
		//echo $html;
		//$html = $this->load->view('admin/catalog/reports/Project_Reports_Module/project_reports_list_pdf' , $this->data, true);
		$this->pdf->createPDF($html, $date, false);
	}

	function edit($product_id = "")
	{
		$this->data['page_type'] = "list";
		$user_access = $this->data['user_access'] = $this->data['User_auth_obj']->check_user_access(array("module_id" => $this->data['page_module_id']));
		//print_r($this->data['user_access']);
		if (empty($this->data['user_access'])) {
			REDIRECT(MAINSITE_Admin . "wam/access-denied");
		}
		if (empty($product_id)) {
			if ($user_access->add_module != 1) {
				$this->session->set_flashdata('no_access_flash_message', "You Are Not Allowed To Add " . $user_access->module_name);
				REDIRECT(MAINSITE_Admin . "wam/access-denied");
			}
		}

		if (!empty($product_id)) {
			if ($user_access->update_module != 1) {
				$this->session->set_flashdata('no_access_flash_message', "You Are Not Allowed To Update " . $user_access->module_name);
				REDIRECT(MAINSITE_Admin . "wam/access-denied");
			}
		}
		//$this->data['employee_data'] = $this->Common_Model->getData(array('select'=>'*' , 'from'=>'admin_user' , 'where'=>"admin_user_id > 0" , "order_by"=>"name ASC"));
		$this->data['page_is_master'] = $this->data['user_access']->is_master;
		$this->data['page_parent_module_id'] = $this->data['user_access']->parent_module_id;
		if (!empty($product_id)) {
			$this->data['product_detail'] = $this->Stock_Model->get_product(array("product_id" => $product_id, "details" => 1));
			$this->data['product_image_detail'] = $this->Stock_Model->get_product_images(array("product_id" => $product_id));
			$this->data['product_category_detail'] = $this->Stock_Model->get_product_category(array("product_id" => $product_id));
			$this->data['product_combination_detail'] = $this->Stock_Model->get_product_combination_detail(array("product_id" => $product_id));
			$this->data['product_combination_attribute_detail'] = $this->Stock_Model->get_product_combination_attribute_detail(array("product_id" => $product_id));
			if (empty($this->data['product_detail'])) {
				$this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-ban"></i> Record Not Found.</div>');
				REDIRECT(MAINSITE_Admin . $user_access->class_name . '/' . $user_access->function_name);
			}
			$this->data['product_detail'] = $this->data['product_detail'][0];
			$this->data['product_image_detail'] = $this->Stock_Model->get_product_images(array("product_id" => $product_id));
			//			$product_image_list = $this->Stock_Model->get_product_images($search);
		}
		//$this->data['product_detail'] = $this->Stock_Model->get_product();
		$this->data['category_list'] = $this->Stock_Model->get_category();
		$this->data['brand_list'] = $this->Stock_Model->get_brand();
		$this->data['uom_list'] = $this->Stock_Model->get_uom();
		$this->data['tax_list'] = $this->Stock_Model->get_tax();
		$this->data['attributes_input_list'] = $this->Stock_Model->get_attributes_input_list();
		$this->data['product_attribute_list'] = $this->Stock_Model->get_product_attribute_list();
		$this->data['attribute_value_list'] = $this->Stock_Model->get_attribute_value_list();
		//echo "pre"; print_r($this->data['attribute_value_list']); echo "</br>"; exit;
		//echo $this->session->set_userdata;
		//exit;
		$this->session->set_userdata("active_tab", 'INFORMATION');
		parent::get_header();
		parent::get_left_nav();
		$this->load->view('admin/catalog/Product_Module/edit', $this->data);
		parent::get_footer();
	}

	function doEdit()
	{
		$this->data['page_type'] = "list";
		$this->data['page_module_id'] = 17;
		//$this->session->set_userdata("active_tab" , 'INFORMATION');
		$user_access = $this->data['user_access'] = $this->data['User_auth_obj']->check_user_access(array("module_id" => $this->data['page_module_id']));
		if (empty($_POST['name']) && empty($_POST['brand_id']) && empty($_POST['ref_code']) && empty($_POST['hsn_code']) && empty($_POST['tax_categories_id'])) {
			$alert_message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-ban"></i> Something Went Wrong. Please Try Again. anubhav</div>';
			$this->session->set_flashdata('alert_message', $alert_message);
			REDIRECT(MAINSITE_Admin . $user_access->class_name . "/" . $user_access->function_name);
			exit;
		}
		//print_r($_POST);
		$product_id = '';
		$product_id = $_POST['product_id'];
		if (empty($this->data['user_access'])) {
			REDIRECT(MAINSITE_Admin . "wam/access-denied");
		}
		if (empty($product_id)) {
			if ($user_access->add_module != 1) {
				$this->session->set_flashdata('no_access_flash_message', "You Are Not Allowed To Add " . $user_access->module_name);
				REDIRECT(MAINSITE_Admin . "wam/access-denied");
			}
		}
		if (!empty($product_id)) {
			if ($user_access->update_module != 1) {
				$this->session->set_flashdata('no_access_flash_message', "You Are Not Allowed To Update " . $user_access->module_name);
				REDIRECT(MAINSITE_Admin . "wam/access-denied");
			}
		}
		/*$order_date = $_POST['order_date'];
			$mc_chip_no = $_POST['mc_chip_no'];
			$order_no = $_POST['order_no'];
			$status = $_POST['status'];
			$enter_data['order_date'] = date("Y-m-d" , strtotime($_POST['order_date']));
			$enter_data['mc_chip_no'] = $_POST['mc_chip_no'];
			$enter_data['order_no'] = $_POST['order_no'];
			$enter_data['status'] = $_POST['status'];*/
		$msg = 'fail';
		$entereddata['product_id'] = $_POST['product_id'];
		$entereddata['name'] = $_POST['name'];
		$entereddata['brand_id'] = $_POST['brand_id'];
		$entereddata['ref_code'] = $_POST['ref_code'];
		$entereddata['hsn_code'] = $_POST['hsn_code'];
		//$entereddata['discount_group_id'] = $_POST['discount_group_id'];				
		$entereddata['short_description'] = $_POST['short_description'];
		$entereddata['description'] = $_POST['description'];
		if (isset($_POST['status'])) {
			$entereddata['status'] = $_POST['status'];
		}
		$entereddata['tax_id'] = $_POST['tax_categories_id'];
		$entereddata['is_bulk_enquiry'] = $_POST['is_bulk_enquiry'];
		$product_id = $_POST['product_id'];
		$alert_message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-ban"></i> Something Went Wrong Please Try Again. </div>';
		if (!empty($product_id)) {
			$entereddata['updated_by'] = $this->data['session_uid'];
			$entereddata['updated_on'] = date('Y-m-d H:i:s');
			$condition = "(product_id = '$product_id')";
			$insertStatus = $this->Common_Model->update_operation(array('table' => 'product', 'data' => $entereddata, 'condition' => $condition));
			if (!empty($insertStatus)) {
				$alert_message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-check"></i> Record Updated Successfully </div>';
			}
		} else {
			$entereddata['status'] = 1;
			$entereddata['added_by'] = $this->data['session_uid'];
			$entereddata['added_on'] = date('Y-m-d H:i:s');
			$product_id = $insertStatus = $this->Common_Model->add_operation(array('table' => 'product', 'data' => $entereddata));
			if (!empty($insertStatus)) {
				$alert_message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-check"></i> New Record Added Successfully </div>';
				$this->session->set_flashdata('alert_message', $alert_message);
			}
		}
		if ($insertStatus >= 1) {
			$image = $_FILES['image'];
			$image_hide = $_FILES['image']['name'];
			if (count($image_hide) > 0) {
				for ($i = 0; $i < count($image_hide); $i++) {
					if (!empty($_FILES["image"]['name'][$i]) && !empty($image['tmp_name'][$i])) {
						$max_image_id = $this->Admin_model->getMaxid('product_image_id', 'product_image');
						$max_image_position = $this->Admin_model->getMaxPosition('position', 'product_image_position', $product_id);
						$image_name = $_FILES['image']['name'][$i];
						$end = explode(".", strtolower($image_name));
						$image_ext = end($end);
						$image_name_new = "product_" . $product_id . "_" . $max_image_id . "." . $image_ext;
						$imagedata['product_id'] = $product_id;
						$imagedata['position'] = $max_image_position;
						$imagedata['product_image_name'] = $image_name_new;
						$imagedata['status'] = 1;
						if ($i == 0) {
							$imagedata['default_image'] = 1;
						} else {
							$imagedata['default_image'] = 0;
						}
						$entereddata['added_by'] = $this->data['session_uid'];
						$imagedata['added_on'] = date('Y-m-d H:i:s');
						$imginsertStatus = $this->Common_Model->add_operation(array('table' => 'product_image', 'data' => $imagedata));
						if ($imginsertStatus >= 1) {
							$uploadedfile = $_FILES['image']['tmp_name'][$i];
							$src = imagecreatefromstring(file_get_contents($uploadedfile));
							list($width, $height) = getimagesize($uploadedfile);
							$newwidth = 150;
							$newheight = ($height / $width) * $newwidth;
							$tmp = imagecreatetruecolor($newwidth, $newheight);
							$newwidth1 = 400;
							$newheight1 = ($height / $width) * $newwidth1;
							$tmp1 = imagecreatetruecolor($newwidth1, $newheight1);
							$newwidth2 = 1000;
							$newheight2 = ($height / $width) * $newwidth2;
							$tmp2 = imagecreatetruecolor($newwidth2, $newheight2);
							imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
							imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
							imagecopyresampled($tmp2, $src, 0, 0, 0, 0, $newwidth2, $newheight2, $width, $height);
							$filename = _uploaded_temp_files_ . "product/small/" . $image_name_new;
							$filename1 = _uploaded_temp_files_ . "product/medium/" . $image_name_new;
							$filename2 = _uploaded_temp_files_ . "product/large/" . $image_name_new;
							imagejpeg($tmp, $filename, 30);
							imagejpeg($tmp1, $filename1, 35);
							imagejpeg($tmp2, $filename2, 40);
							//move_uploaded_file ($_FILES['image']['tmp_name'][$i],"products/product/".$image_name_new);
						}
					}
				}
			}
			$category_id_arr = $_POST['category_id'];
			$insertStatus = $this->Admin_model->deleteRows('product_category', $product_id);
			for ($i = 0; $i < count($category_id_arr); $i++) {
				$categorydata['product_id'] = $product_id;
				$categorydata['category_id'] = $category_id_arr[$i];
				$catinsertStatus = $this->Common_Model->add_operation(array('table' => 'product_category', 'data' => $categorydata));
			}
		}
		if ($_POST['action'] == 'save-edit') {
			REDIRECT(MAINSITE_Admin . "catalog/Product-Module/edit/" . $product_id);
		}
		$this->session->set_flashdata('alert_message', $alert_message);
		if (!empty($_POST['redirect_type'])) {
			REDIRECT(MAINSITE_Admin . $user_access->class_name . "/edit");
		}
		REDIRECT(MAINSITE_Admin . $user_access->class_name . "/" . $user_access->function_name);
	}

	function doAddProductImages()
	{
		$this->data['page_type'] = "list";
		$this->data['page_module_id'] = 17;
		$this->session->set_userdata("active_tab", 'images');
		$user_access = $this->data['user_access'] = $this->data['User_auth_obj']->check_user_access(array("module_id" => $this->data['page_module_id']));
		$alert_message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-ban"></i> Something Went Wrong. Please Try Again. </div>';
		if (empty($_POST['product_id'])) {
			$alert_message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-ban"></i> Something Went Wrong. Please Try Again.</div>';
			$this->session->set_flashdata('alert_message', $alert_message);
			REDIRECT(MAINSITE_Admin . $user_access->class_name . "/" . $user_access->function_name);
			exit;
		}
		//print_r($_POST);
		$product_id = '';
		$product_id = $_POST['product_id'];
		if (empty($this->data['user_access'])) {
			REDIRECT(MAINSITE_Admin . "wam/access-denied");
		}
		if (empty($product_id)) {
			if ($user_access->add_module != 1) {
				$this->session->set_flashdata('no_access_flash_message', "You Are Not Allowed To Add " . $user_access->module_name);
				REDIRECT(MAINSITE_Admin . "wam/access-denied");
			}
		}
		if (!empty($product_id)) {
			if ($user_access->update_module != 1) {
				$this->session->set_flashdata('no_access_flash_message', "You Are Not Allowed To Update " . $user_access->module_name);
				REDIRECT(MAINSITE_Admin . "wam/access-denied");
			}
		}
		$msg = 'fail';
		$image = $_FILES['image'];
		$image_hide = $_FILES['image']['name'];
		if (count($image_hide) > 0) {
			for ($i = 0; $i < count($image_hide); $i++) {
				if (!empty($_FILES["image"]['name'][$i]) && !empty($image['tmp_name'][$i])) {
					$max_image_id = $this->Admin_model->getMaxid('product_image_id', 'product_image');
					$max_image_position = $this->Admin_model->getMaxPosition('position', 'product_image_position', $product_id);
					$image_name = $_FILES['image']['name'][$i];
					$end = explode(".", strtolower($image_name));
					$image_ext = end($end);
					$image_name_new = "product_" . $product_id . "_" . $max_image_id . "." . $image_ext;
					$imagedata['product_id'] = $product_id;
					$imagedata['position'] = $max_image_position;
					$imagedata['product_image_name'] = $image_name_new;
					$imagedata['status'] = 1;
					if ($i == 0) {
						$imagedata['default_image'] = 1;
					} else {
						$imagedata['default_image'] = 0;
					}
					$entereddata['added_by'] = $this->data['session_uid'];
					$imagedata['added_on'] = date('Y-m-d H:i:s');
					$imginsertStatus = $this->Common_Model->add_operation(array('table' => 'product_image', 'data' => $imagedata));
					if (!empty($imginsertStatus)) {
						$alert_message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-check"></i> Images Added Successfully </div>';
						$this->session->set_flashdata('alert_message', $alert_message);
					}
					if ($imginsertStatus >= 1) {
						$uploadedfile = $_FILES['image']['tmp_name'][$i];
						$src = imagecreatefromstring(file_get_contents($uploadedfile));
						list($width, $height) = getimagesize($uploadedfile);
						$newwidth = 150;
						$newheight = ($height / $width) * $newwidth;
						$tmp = imagecreatetruecolor($newwidth, $newheight);
						$newwidth1 = 400;
						$newheight1 = ($height / $width) * $newwidth1;
						$tmp1 = imagecreatetruecolor($newwidth1, $newheight1);
						$newwidth2 = 1000;
						$newheight2 = ($height / $width) * $newwidth2;
						$tmp2 = imagecreatetruecolor($newwidth2, $newheight2);
						imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
						imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
						imagecopyresampled($tmp2, $src, 0, 0, 0, 0, $newwidth2, $newheight2, $width, $height);
						$filename = _uploaded_temp_files_ . "product/small/" . $image_name_new;
						$filename1 = _uploaded_temp_files_ . "product/medium/" . $image_name_new;
						$filename2 = _uploaded_temp_files_ . "product/large/" . $image_name_new;
						imagejpeg($tmp, $filename, 30);
						imagejpeg($tmp1, $filename1, 35);
						imagejpeg($tmp2, $filename2, 40);
						//move_uploaded_file ($_FILES['image']['tmp_name'][$i],"products/product/".$image_name_new);
					}
				}
			}
		}
		//$this->session->set_flashdata('alert_message', $alert_message);
		if (!empty($_POST['redirect_type'])) {
			REDIRECT($_SERVER['HTTP_REFERER']);
			//REDIRECT(MAINSITE_Admin.$user_access->class_name."/edit");
			//REDIRECT(MAINSITE_Admin.$user_access->class_name."/edit/".$product_id);
		}
		REDIRECT($_SERVER['HTTP_REFERER']);
		//REDIRECT(MAINSITE_Admin.$user_access->class_name."/edit/".$product_id);
		//REDIRECT(MAINSITE_Admin.$user_access->class_name."/".$user_access->function_name);
	}

	function GetCompleteProductImageListNewPos()
	{
		//echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

		$search = array();
		$product_id = 0;
		$podId = '';
		$podIdArr = '';
		if (!empty($_POST['product_id']))
			$product_id = $_POST['product_id'];
		if (!empty($_POST['podId'])) {
			$podId = trim($_POST['podId'], ',');
			$podIdArr = explode(',', $podId);
		}
		$this->data['product_id'] = $product_id;
		$this->data['podId'] = $podIdArr;
		$search['product_id'] = $product_id;
		$search['podId'] = $podIdArr;
		$search['search_for'] = "count";
		$show = "No Record To Display";
		$product_image_list = $this->Stock_Model->get_product_images($search);
		$count = 0;
		$countPos = 0;
		foreach ($product_image_list as $row) {
			$countPos++;
			$update_data['position'] = $countPos;//$podIdArr[$count];	
			$condition = "(product_image_id in ($podIdArr[$count]))";
			//$insertStatus = $this->Admin_model->update($update_data,'category','' , $condition); //echo $insertStatus;
			$insertStatus = $this->Common_Model->update_operation(array('table' => 'product_image', 'data' => $update_data, 'condition' => $condition));
			//echo $this->db->last_query().'<br><br><br><br><br>';
			$count++;
		}
		$this->GetCompleteProductImageList();
	}

	function GetCompleteProductImageList()
	{
		$search = array();
		$search['search_for'] = "count";
		$product_id = 0;
		if (!empty($_POST['product_id'])) {
			$product_id = $_POST['product_id'];
		}
		$search['product_id'] = $product_id;
		//$data['product_image_list'] = $this->Stock_Model->get_category($search);
		$product_image_list = $this->Stock_Model->get_product_images($search);
		$data_count = $this->Stock_Model->get_product_images($search);
		if (!empty($data_count))
			$r_count = $this->data['row_count'] = $data_count[0]->counts;
		else
			$r_count = $this->data['row_count'] = 0;
		unset($search['search_for']);
		$product_image_list = $this->Stock_Model->get_product_images($search);
		//$data['category_list']=$this->Stock_Model->get_category('category_list','', '',$super_category_id, '','', '','', $sortByPosition);
		//print_r($data['category_list']);
		$show = '';
		$count = 0;
		print_r($product_image_list);
		foreach ($product_image_list as $row) {
			$count++;
			$show .= "<tr id='$row->product_image_id'>";
			$show .= '<td><a target="_blank" href="' . _uploaded_files_ . 'product/large/' . $row->product_image_name . '" ><img src="' . _uploaded_files_ . 'product/small/' . $row->product_image_name . '" width="100" /></a></td>';
			$show .= '<td><span style="cursor: move;" class="fa fa-arrows-alt" aria-hidden="true"></span> ' . $row->position . '</td>';
			if ($row->default_image == 1) {
				//$show.='<td class="text-center"><input id="checkBoxId_'.$row->product_image_id.'" checked class="checkBoxClass" onclick="setProductDefaultImage('.$row->product_image_id.' , '.$row->product_id.')" type="checkbox" /></td>';
			} else {
				//$show.='<td class="text-center"><input id="checkBoxId_'.$row->product_image_id.'" class="checkBoxClass" onclick="setProductDefaultImage('.$row->product_image_id.' , '.$row->product_id.')" type="checkbox" /></td>';
			}
			if ($row->product_combination_id <= 0 || $row->product_combination_id == NULL) {
				$show .= '<td class="text-right"><a class="btn btn-default" href="' . _uploaded_files_ . 'product/large/' . $row->product_image_name . '" target="_blank"><i class="fa fa-eye"></i>View This Image</a>
				<form action="' . MAINSITE_Admin . 'catalog/Product-Module/doDeleteImage" method="post" onsubmit="return ConfirmImage()">' . form_open(MAINSITE_Admin . 'catalog/Product-Module/doDeleteImage', array('method' => 'post', 'id' => 'product_delete_form', "name" => "product_delete_form", 'style' => '', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data', 'onsubmit' => 'return ConfirmImage()')) . '<input type="hidden" name="product_image_id" value="' . $row->product_image_id . '" /><input type="hidden" name="product_id" value="' . $row->product_id . '" /><button type="submit" class="btn btn-default" ><i class="fa fa-trash"></i>Delete</button>' . form_close() . '</td>';
			} else {
				$show .= '<td class="text-right"><a  class="btn btn-primary example-image-link" href="' . _uploaded_files_ . 'product/large/' . $row->product_image_name . '" data-lightbox="example-set" ><i class="fa fa-eye"></i>View This Image</a></td>';
			}
			$show .= '</tr>';
		}
		echo $show;
	}

	function doDeleteImage()
	{
		$this->session->set_userdata("active_tab", 'images');
		$product_image_id = $_POST['product_image_id'];
		$product_id = $_POST['product_id'];
		$image_data = $this->Common_Model->getData(array('select' => '*', 'from' => 'product_image', 'where' => "product_image_id = $product_image_id"));

		$alert_message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-ban"></i> Something Went Wrong. Please Try Again. </div>';

		if (!empty($image_data)) {
			$image_data = $image_data[0];
			@unlink("assets/uploads/product/small/" . $image_data->product_image_name);
			@unlink("assets/uploads/product/medium/" . $image_data->product_image_name);
			@unlink("assets/uploads/product/large/" . $image_data->product_image_name);
			$image_data = $this->Common_Model->delete_operation(array('table' => 'product_image', 'where' => "product_image_id = $image_data->product_image_id"));

			$alert_message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-check"></i> Image deleted successfully. </div>';
		}
		$this->session->set_flashdata('alert_message', $alert_message);
		REDIRECT($_SERVER['HTTP_REFERER']);
	}


	function setProductDefaultImage()
	{

		$search = array();

		$product_id = 0;

		$id = '';



		if (!empty($_POST['productId']))

			$product_id = $_POST['productId'];



		if (!empty($_POST['id']))

			$id = $_POST['id'];



		$this->data['product_id'] = $product_id;

		$this->data['id'] = $id;

		$update_data['default_image'] = 0;

		$update_data['updated_by'] = $this->data['session_uid'];

		$update_data['updated_on'] = date('Y-m-d H:i:s');

		$condition = "(product_id in ($product_id))";

		$insertStatus = $this->Common_Model->update_operation(array('table' => 'product_image', 'data' => $update_data, 'condition' => $condition));


		$update_data['default_image'] = 1;

		$update_data['updated_by'] = $this->data['session_uid'];

		$update_data['updated_on'] = date('Y-m-d H:i:s');

		$condition = "(product_image_id in ($id))";

		$insertStatus = $this->Common_Model->update_operation(array('table' => 'product_image', 'data' => $update_data, 'condition' => $condition));
		echo $insertStatus;

	}





	function doUpdateStatus()
	{

		$this->data['page_type'] = "list";

		$this->data['page_module_id'] = 17;

		$user_access = $this->data['user_access'] = $this->data['User_auth_obj']->check_user_access(array("module_id" => $this->data['page_module_id']));

		//print_r($this->data['user_access']);

		$task = $_POST['task'];

		$id_arr = $_POST['sel_recds'];

		if (empty($user_access)) {

			REDIRECT(MAINSITE_Admin . "wam/access-denied");

		}

		if ($user_access->update_module == 1) {

			$this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible">

					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

					<i class="icon fas fa-ban"></i> Something Went Wrong Please Try Again. 

				  </div>');

			$update_data = array();

			if (!empty($id_arr)) {

				$action_taken = "";

				$ids = implode(',', $id_arr);

				if ($task == "active") {

					$update_data['status'] = 1;

					$action_taken = "Activate";

				}

				if ($task == "block") {

					$update_data['status'] = 0;

					$action_taken = "Blocked";

				}

				$update_data['updated_on'] = date("Y-m-d H:i:s");

				$update_data['updated_by'] = $this->data['session_uid'];

				$response = $this->Common_Model->update_operation(array('table' => "product", 'data' => $update_data, 'condition' => "product_id in ($ids)"));

				if ($response) {

					$this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible">

						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

						<i class="icon fas fa-check"></i> Records Successfully ' . $action_taken . ' 

						</div>');

				}

			}

			REDIRECT(MAINSITE_Admin . $user_access->class_name . '/' . $user_access->function_name);

		} else {

			$this->session->set_flashdata('no_access_flash_message', "You Are Not Allowed To Update " . $user_access->module_name);

			REDIRECT(MAINSITE_Admin . "wam/access-denied");

		}

	}



	function GetCompleteCategoryListNewPos()
	{

		$search = array();

		$super_category_id = '';

		$podId = '';

		$podIdArr = '';





		if (!empty($_POST['super_category_id']))

			$super_category_id = $_POST['super_category_id'];



		if (!empty($_POST['podId'])) {

			$podId = trim($_POST['podId'], ',');

			$podIdArr = explode(',', $podId);

		}



		$this->data['super_category_id'] = $super_category_id;

		$this->data['podId'] = $podIdArr;



		$search['super_category_id'] = $super_category_id;

		$search['podId'] = $podIdArr;

		$search['search_for'] = "count";



		$show = "No Record To Display";

		//$super_category_id='';

		/*$super_category_id = $_POST['super_category_id'];

			$podId = trim($_POST['podId'] , ',');

			$podIdArr = explode(',' , $podId);*/

		//$category_list=$this->Stock_Model->get_category('category_list','', '',$super_category_id, '','', '','', '');





		$category_list = $this->Stock_Model->get_category($search);

		$count = 0;

		$countPos = 0;

		foreach ($podIdArr as $row) {

			$countPos++;

			$update_data['position'] = $countPos;//$podIdArr[$count];	

			$condition = "(category_id in ($podIdArr[$count]))";

			//$insertStatus = $this->Admin_model->update($update_data,'category','' , $condition); //echo $insertStatus;

			$insertStatus = $this->Common_Model->update_operation(array('table' => 'category', 'data' => $update_data, 'condition' => $condition));

			//echo $this->db->last_query().'<br><br><br><br><br>';

			$count++;

		}

		$this->GetCompleteCategoryList($super_category_id, 1, 1);

	}



	function GetCompleteCategoryList($super_category_id = '', $withPosition = '', $sortByPosition = '')
	{

		$search = array();

		if (!empty($_POST['super_category_id'])) {
			$super_category_id = $_POST['super_category_id'];
		}

		if (!empty($_POST['withPosition'])) {
			$withPosition = $_POST['withPosition'];
		}

		if (!empty($_POST['sortByPosition'])) {
			$sortByPosition = $_POST['sortByPosition'];
		}

		$search['super_category_id'] = $super_category_id;

		$search['withPosition'] = $withPosition;

		$search['sortByPosition'] = $sortByPosition;

		$data['category_list'] = $this->Stock_Model->get_category($search);

		//$data['category_list']=$this->Stock_Model->get_category('category_list','', '',$super_category_id, '','', '','', $sortByPosition);

		//print_r($data['category_list']);

		$show = '';

		$count = 0;

		foreach ($data['category_list'] as $row) {

			$row = (array) $row;

			$count++;

			$link = MAINSITE_Admin . "catalog/Category-Module/view/" . $row['category_id'];

			$link1 = MAINSITE_Admin . "catalog/Category-Module/edit/" . $row['category_id'];

			if ($row['updated_on'] != '0000-00-00 00:00:00') {
				$updated_on = date('d-m-Y', strtotime($row['updated_on']));
			} else {
				$updated_on = 'N/A';
			}

			if ($row['super_category_name'] == '') {
				$row['super_category_name'] = 'Parent';
			}

			$show .= "<tr id='$row[category_id]'>";

			$show .= "<td>$count</td>";

			$show .= "<td><label class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' name='selectedRecords[]' id='selectedRecords$count' value='$row[category_id]'><span class='custom-control-indicator'></span></label></td>";

			$show .= "<td>$row[name]</td>";

			$show .= "<td>$row[super_category_name]</td>";

			if ($withPosition == 1) {

				$show .= '<td><span style="cursor: move;" class="fa fa-arrows-alt" ></span> ' . $row['position'] . '</td>';

			}

			if ($row['status']) {
				$show .= "<td class='nodrag' align='center'><i class='fa fa-check true-icon'></i><span style='display:none'>Publish</span></td>";
			} else {
				$show .= "<td align='center'><i class='fa fa-close false-icon'></i><span style='display:none'>Un Publish</span></td>";
			}

			$show .= "<td>" . date('d-m-Y', strtotime($row['added_on'])) . "</td>";

			$show .= "<td>$updated_on</td>";

			$show .= "<td><a class='btn btn-primary' href='$link' style='padding:1px 5px;'><i class='fa fa-eye'></i></a>

			<a class='btn btn-info' href='$link1' style='padding:1px 5px;'><i class='fa fa-edit'></i></a></td>";





			//$show.='<td class="text-right"><a class="btn btn-default" href="'.IMAGE.'assets/product/large/'.$row['product_image_name'].'" target="_blank"><i class="fa fa-eye"></i>View This Image</a></td>';

			$show .= '</tr>';

		}

		echo $show;

	}





	function setProductDefaultCombination()
	{
		$search = array();
		if (!empty($_POST['productId'])) {
			$productId = $_POST['productId'];
		}
		if (!empty($_POST['id'])) {
			$id = $_POST['id'];
		}
		$search['productId'] = $productId;
		$search['id'] = $id;
		$update_data['default_combination'] = 0;
		$update_data['updated_by'] = $this->session->userdata("sess_user_id");
		$update_data['updated_on'] = date('Y-m-d H:i:s');
		$condition = "(product_id in ($productId))";
		$insertStatus = $this->Common_Model->update_operation(array('table' => 'product_combination', 'data' => $update_data, 'condition' => $condition));
		$update_data['default_combination'] = 1;
		$update_data['updated_by'] = $this->session->userdata("sess_user_id");
		$update_data['updated_on'] = date('Y-m-d H:i:s');
		$condition = "(product_combination_id in ($id))";
		$insertStatus = $this->Common_Model->update_operation(array('table' => 'product_combination', 'data' => $update_data, 'condition' => $condition));
		echo $insertStatus;
	}

	function GetCompleteProductCombinationList()
	{
		$search = array();
		$product_id = 0;
		if (!empty($_POST['product_id'])) {
			$product_id = $_POST['product_id'];
		}
		$search['product_id'] = $product_id;
		$show = "";
		$show = "No Record To Display";
		$this->data['product_image_detail'] = $this->Stock_Model->get_product_images(array("product_id" => $product_id));
		$this->data['product_attribute_list'] = $this->Stock_Model->get_product_attribute_list();
		$this->data['attribute_value_list'] = $this->Stock_Model->get_attribute_value_list();
		$this->data['product_combination_detail'] = $this->Stock_Model->get_product_combination_detail(array("product_id" => $product_id));
		$this->data['product_combination_attribute_detail'] = $this->Stock_Model->get_product_combination_attribute_detail(array("product_id" => $product_id));
		if (!empty($this->data['product_combination_detail'])) {
			//default_image
			$show = '';
			foreach ($this->data['product_combination_detail'] as $row) {
				$show .= '<tr>';
				$show .= '<td colspan="10"><strong>' . $row->product_display_name . '</strong></td>';
				$show .= '</tr>';
				$show .= '<tr>';
				//print_r($this->data['product_image_detail']);
				foreach ($this->data['product_image_detail'] as $col) {
					if ($col->product_image_id == $row->product_image_id) {
						$img_name = $col->product_image_name;
					}
				}

				$show .= '<td rowspan="4"><a class="btn btn-default" href="' . _uploaded_files_ . 'product/large/' . $img_name . '" target="_blank"><img src="' . _uploaded_files_ . 'product/small/' . $img_name . '" width="100" /></a></td>';
				$show .= '<td>' . $row->ref_code . '</td>';
				$show .= '<td>';
				foreach ($this->data['product_combination_attribute_detail'] as $col) {
					if ($col->product_combination_id == $row->product_combination_id) {
						$attribute = '';
						$attribute_val = '';
						foreach ($this->data['product_attribute_list'] as $col1) {
							if ($col1->product_attribute_id == $col->product_attribute_id) {
								$attribute = $col1->name;
							}
						}
						foreach ($this->data['attribute_value_list'] as $col1) {
							if ($col1->product_attribute_value_id == $col->product_attribute_value_id) {
								$attribute_val = $col1->name;
							}
						}
						$show .= "$attribute : $col->combination_value $attribute_val<br>";
					}
				}
				$show .= '</td>';
				$show .= '<td>' . $row->quantity . '</td>';
				$show .= '<td>' . $row->price . '/-</td>';
				$show .= '<td>' . $row->discount . ' ' . $row->discount_var . ' Off</td>';
				$show .= '<td>' . $row->final_price . '/-</td>';
				if ($row->status == 1) {
					$show .= '<td>Publish</td>';
				} else {
					$show .= '<td class="text-center">UnPublish</td>';
				}
				if ($row->default_combination == 1) {
					$show .= '<td class="demo-radio-button"><input id="checkCombBoxId_' . $row->product_combination_id . '" checked class="checkCombBoxClass radio-col-green" onclick="setProductDefaultCombination(' . $row->product_combination_id . ' , ' . $row->product_id . ')" type="radio" /><label for="checkCombBoxId_' . $row->product_combination_id . '"></label></td>';
				} else {
					$show .= '<td class="text-center demo-radio-button"><input id="checkCombBoxId_' . $row->product_combination_id . '" class="checkCombBoxClass radio-col-green" onclick="setProductDefaultCombination(' . $row->product_combination_id . ' , ' . $row->product_id . ')" type="radio" /><label for="checkCombBoxId_' . $row->product_combination_id . '"></label></td>';
				}
				$show .= '<td class="text-right"  >
				<a onclick="editCombination(' . $row->product_combination_id . ');setCombinationFormHeader(3 , \'' . addslashes($row->product_display_name) . '\')" class="edit_button">Clone <i class="fa fa-clone"></i></a>
				<a onclick="editCombination(' . $row->product_combination_id . ');setCombinationFormHeader(2 , \'' . addslashes($row->product_display_name) . '\')" class="edit_button">Edit <i class="fa fa-pencil-square-o"></i></a>
				</td>';
				$show .= '</tr>';
				$show .= '<tr>';
				$show .= '<td colspan="3">Product Dimension (L*B*H) : ' . $row->product_l . ' * ' . $row->product_b . ' * ' . $row->product_h . '</td>';
				$show .= '<td colspan="6">Product Weight : ' . $row->product_weight . '</td>';
				$show .= '</tr>';
				$show .= '<tr>';
				$show .= '<td colspan="2">Trending Now : ';
				if ($row->trending_now == 1) {
					$show .= '<img src="' . _admin_files_ . 'images/green.gif" width="25" />';
				} else {
					$show .= '<img src="' . _admin_files_ . 'images/red.gif" width="25" />';
				}
				$show .= '</td>';
				$show .= '<td colspan="2">Hot Selling : ';
				if ($row->hot_selling_now == 1) {
					$show .= '<img src="' . _admin_files_ . 'images/green.gif" width="25" />';
				} else {
					$show .= '<img src="' . _admin_files_ . 'images/red.gif" width="25" />';
				}
				$show .= '</td>';
				$show .= '<td colspan="2">Best Sellers : ';
				if ($row->best_sellers == 1) {
					$show .= '<img src="' . _admin_files_ . 'images/green.gif" width="25" />';
				} else {
					$show .= '<img src="' . _admin_files_ . 'images/red.gif" width="25" />';
				}
				$show .= '</td>';
				$show .= '<td colspan="3">New Product : ';
				if ($row->new_product == 1) {
					$show .= '<img src="' . _admin_files_ . 'images/green.gif" width="25" />';
				} else {
					$show .= '<img src="' . _admin_files_ . 'images/red.gif" width="25" />';
				}
				$show .= '</td>';
				$show .= '</tr>';
				$show .= '<tr>';
				$show .= '<td colspan="9">GTIN : ' . $row->gtin;
				//$show.='<td colspan="9">Current Viewers Message : '.$row['current_viewers_msg'].'<br>Current Sold Message : '.$row['current_sold_msg'].'<br>Is Message Dynaminc : ';
				//if($row['is_msg_dynamic']==1)
				//	{ $show.='<img src="'._admin_files_.'images/green.gif" width="25" />'; }
				//	else
				//	{ $show.='<img src="'._admin_files_.'images/red.gif" width="25" />'; }
				$is_google_product_text = "No";
				if ($row->is_google_product == 1) {
					$is_google_product_text = "Yes";
				}
				$show .= '<br>Is Display On Google Merchant : ' . $is_google_product_text;
				$show .= '<br>Delivery Charges : ' . $row->delivery_charges;
				$show .= '</td>';
				$show .= '</tr>';
			}
		}
		echo $show;
		$show = "";
	}

	function GetCompleteProductCombinationListPOS()
	{

		$search = array();

		$product_id = 0;

		if (!empty($_POST['product_id'])) {
			$product_id = $_POST['product_id'];
		} else {
			return false;
		}

		$search['product_id'] = $product_id;



		$show = "";

		$show = "No Record To Display";



		$this->data['product_image_detail'] = $this->Stock_Model->get_product_images(array("product_id" => $product_id));

		$this->data['product_attribute_list'] = $this->Stock_Model->get_product_attribute_list();

		$this->data['attribute_value_list'] = $this->Stock_Model->get_attribute_value_list();

		$this->data['product_combination_detail'] = $this->Stock_Model->get_product_combination_detail(array("product_id" => $product_id));

		$this->data['product_combination_attribute_detail'] = $this->Stock_Model->get_product_combination_attribute_detail(array("product_id" => $product_id));



		if (!empty($this->data['product_combination_detail'])) {//default_image

			$show = '';

			foreach ($this->data['product_combination_detail'] as $row) {

				foreach ($this->data['product_image_detail'] as $col) {
					if ($col->product_image_id == $row->product_image_id) {
						$img_name = $col->product_image_name;
					}
				}



				$show .= "<tr id='$row->product_combination_id'>";

				$show .= '<td><img src="' . _uploaded_files_ . 'product/small/' . $img_name . '" width="100" /></td>';

				$show .= '<td> ' . $row->product_display_name . '</td>';

				$show .= '<td>';

				foreach ($this->data['product_combination_attribute_detail'] as $col) {

					if ($col->product_combination_id == $row->product_combination_id) {

						$attribute = '';

						$attribute_val = '';

						foreach ($this->data['product_attribute_list'] as $col1) {
							if ($col1->product_attribute_id == $col->product_attribute_id) {
								$attribute = $col1->name;
							}
						}

						foreach ($this->data['attribute_value_list'] as $col1) {
							if ($col1->product_attribute_value_id == $col->product_attribute_value_id) {
								$attribute_val = $col1->name;
							}
						}

						$show .= "$attribute : $col->combination_value $attribute_val<br>";

					}

				}

				$show .= '</td>';

				$show .= '<td><span style="cursor: move;" class="fa fa-arrows" aria-hidden="true"></span> ' . $row->position . '</td>';

				$show .= '</tr>';





			}

		}

		echo $show;

		$show = "";

	}



	function checkProductCombinationCombiRefCode()
	{

		$product_combination_id = 0;

		$product_attribute_id = 0;

		$combination_value = 0;

		$product_attribute_value_id = 0;

		$product_seo_id = 0;

		$combination_value = '';

		$combref_code = '';

		$search = array();

		if (!empty($_POST['product_id'])) {
			$product_id = $_POST['product_id'];
		}

		if (!empty($_POST['ref_code'])) {
			$ref_code = $_POST['ref_code'];
		}

		if (!empty($_POST['product_combination_id'])) {
			$product_combination_id = $_POST['product_combination_id'];
		}



		if (!empty($_POST['product_attribute_id'])) {
			$product_attribute_id_arr = $_POST['product_attribute_id'];
		}

		if (!empty($_POST['combination_value'])) {
			$combination_value_arr = $_POST['combination_value'];
		}

		if (!empty($_POST['product_attribute_value_id'])) {
			$product_attribute_value_id_arr = $_POST['product_attribute_value_id'];
		}

		if (!empty($_POST['is_seo_tag'])) {
			$is_seo_tag = $_POST['is_seo_tag'];
		}

		if (!empty($_POST['slug_url'])) {
			$slug_url = $_POST['slug_url'];
		}

		if (!empty($_POST['product_seo_id'])) {
			$product_seo_id = $_POST['product_seo_id'];
		}



		$search['product_id'] = $product_id;

		$search['ref_code'] = $ref_code;

		$search['product_combination_id'] = $product_combination_id;

		$search['product_attribute_id'] = $product_attribute_id;

		$search['combination_value'] = $combination_value;

		$search['product_attribute_value_id'] = $product_attribute_value_id;

		$search['is_seo_tag'] = $is_seo_tag;

		$search['slug_url'] = $slug_url;

		$search['product_seo_id'] = $product_seo_id;



		$is_duplicate = 'no';

		for ($i = 0; $i < count($product_attribute_id_arr); $i++) {

			$product_attribute_id = $product_attribute_id_arr[$i];

			$combination_value = $combination_value_arr[$i];

			$product_attribute_value_id = $product_attribute_value_id_arr[$i];



			$temp_combi_data = $this->Common_Model->getData(array('select' => '*', 'from' => 'product_combination_attribute', 'where' => "product_id = $product_id and product_combination_id != $product_combination_id and product_attribute_id = $product_attribute_id and product_attribute_value_id = $product_attribute_value_id and combination_value = '$combination_value'"));



			//$is_duplicate = 'no';

		}

		//print_r($temp_combi_data);



		$position_status = $this->Stock_Model->checkSlugUrl($combref_code, 'product_combination_ref_code', $product_id, $product_combination_id);

		//echo $position_status;



		if (empty($position_status)) {

			if (!empty($temp_combi_data)) {

				$position_status = "combi_duplicate";

			}

		} else if (empty($position_status)) {

			if ($is_seo_tag == 1) {

				//$slugstatus=$this->Admin_model->checkSlugUrl($slug_url,'product_seo',$product_seo_id);

				$slugstatus = $this->Stock_Model->checkSlugUrl($search);

				if (!empty($slugstatus)) {

					$position_status = "slug_duplicate";

				}

			}

		} else {

			$position_status = "";

		}

		//echo json_encode(array("position_status"=>"exist")); 

		echo json_encode(array("position_status" => $position_status));

	}



	function doAddProductCombination()
	{
		$this->session->set_userdata("active_tab", 'COMBINATIONS');
		$msg = 'fail';
		$entereddata = $this->input->post($this->Stock_Model->product_combination_fields);
		//echo var_dump($_POST);
		$is_add_seo_data = false;
		$product_combination_id = $_POST['product_combination_id'];
		if (!empty($product_combination_id)) {
			$entereddata['updated_by'] = $this->session->userdata("sess_user_id");
			$entereddata['updated_on'] = date('Y-m-d H:i:s');
			$condition = "(product_combination_id = '$product_combination_id')";
			$insertStatus = $this->Admin_model->update($entereddata, 'product_combination', $product_combination_id, $condition);
			if (!empty($insertStatus)) {
				$alert_message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-check"></i> Combination Updated Successfully </div>';
				$this->session->set_flashdata('alert_message', $alert_message);
			}
			if ($insertStatus >= 1) {
				if (!empty($_POST['is_update_store'])) {
					if ($_POST['is_update_store'] == 1) {
						$this->load->model('SecureRegions/Store_Model');
						$stores_data = $this->Common_Model->getName(array("select" => '*', "from" => 'stores', "where" => 'stores_id > 0'));
						if (!empty($stores_data)) {
							foreach ($stores_data as $sd) {
								$product_id = $_POST['product_id'];
								$product_comb_id = $product_combination_id;
								$store_id = $sd->stores_id;
								$pis_condition = "(product_id = $product_id and product_combination_id = $product_comb_id and store_id = $store_id)";
								$product_in_store_data = $this->Common_Model->getName(array("select" => '*', "from" => 'product_in_store', "where" => $pis_condition));
								if (empty($product_in_store_data)) {
									$storeinsertStatus = 0;
									$StoreData['store_id'] = $store_id;
									$StoreData['product_id'] = $product_id;
									$StoreData['product_combination_id'] = $product_comb_id;
									$StoreData['status'] = 1;
									$StoreData['admin_status'] = 3;
									$StoreData['added_by'] = $this->data['session_uid'];
									$StoreData['added_on'] = date('Y-m-d H:i:s');
									$product_in_store_id = $storeinsertStatus = $this->Store_Model->add($StoreData, 'product_in_store');
								} else {
									$product_in_store_id = $product_in_store_data[0]->product_in_store_id;
								}
								if ($product_in_store_id > 0) {
									$price = $_POST['price'];
									//$quantity = $_POST['quantity'];
									$final_price = $_POST['final_price'];
									$discount = $_POST['discount'];
									$delivery_charges = $_POST['delivery_charges'];
									$discount_var = $_POST['discount_var'];
									$product_id = $_POST['product_id'];
									$product_combination_id = $product_comb_id;
									$product_in_store_id = $product_in_store_id;
									if (empty($discount) || $discount <= 0) {
										$discount = '';
										$discount_var = '';
									}
									//$data_prod_price_qty['quantity_per_order'] = $quantity_per_order;
									//$data_prod_price_qty['stock_out_msg'] = $stock_out_msg;
									//$data_prod_price_qty['quantity'] = $quantity;
									$data_prod_price_qty['price'] = $price;
									$data_prod_price_qty['discount'] = $discount;
									$data_prod_price_qty['delivery_charges'] = $delivery_charges;
									$data_prod_price_qty['discount_var'] = $discount_var;
									$data_prod_price_qty['final_price'] = $final_price;
									$data_prod_price_qty['updated_by'] = $this->data['session_uid'];
									$data_prod_price_qty['updated_on'] = date('Y-m-d H:i:s');
									$condition = "(product_in_store_id in ($product_in_store_id) )";
									$insertStatus = $this->Store_Model->update($data_prod_price_qty, 'product_in_store', '', $condition); //echo $insertStatus;
								}
							}
						}
					}
				}
				$msg = 'update';
			}
		} else {
			$entereddata['added_by'] = $this->data['session_uid'];
			$entereddata['added_on'] = date('Y-m-d H:i:s');
			$product_comb_id = $insertStatus = $this->Admin_model->add($entereddata, 'product_combination');
			if (!empty($insertStatus)) {
				$alert_message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fas fa-check"></i> New Combination Added Successfully </div>';
				$this->session->set_flashdata('alert_message', $alert_message);
			}
			if ($insertStatus >= 1) {
				$is_add_seo_data = true;
				if (!empty($_POST['is_update_store'])) {
					if ($_POST['is_update_store'] == 1) {
						$this->load->model('SecureRegions/Store_Model');
						$stores_data = $this->Common_Model->getName(array("select" => '*', "from" => 'stores', "where" => 'stores_id > 0'));
						if (!empty($stores_data)) {
							foreach ($stores_data as $sd) {
								$product_id = $_POST['product_id'];
								$product_comb_id = $product_comb_id;
								$store_id = $sd->stores_id;
								$storeinsertStatus = 0;
								$StoreData['store_id'] = $store_id;
								$StoreData['product_id'] = $product_id;
								$StoreData['product_combination_id'] = $product_comb_id;
								$StoreData['status'] = 1;
								$StoreData['admin_status'] = 3;
								$StoreData['added_by'] = $this->data['session_uid'];
								$StoreData['added_on'] = date('Y-m-d H:i:s');
								$product_in_store_id = $storeinsertStatus = $this->Store_Model->add($StoreData, 'product_in_store');
								if ($product_in_store_id > 0) {
									$price = $_POST['price'];
									$quantity = $_POST['quantity'];
									$final_price = $_POST['final_price'];
									$discount = $_POST['discount'];
									$delivery_charges = $_POST['delivery_charges'];
									$discount_var = $_POST['discount_var'];
									$product_id = $_POST['product_id'];
									$product_combination_id = $product_comb_id;
									$quantity_per_order = '100';
									$stock_out_msg = 'Sold Out';
									$product_in_store_id = $product_in_store_id;
									if (empty($discount) || $discount <= 0) {
										$discount = '';
										$discount_var = '';
									}
									$data_prod_price_qty['quantity_per_order'] = $quantity_per_order;
									$data_prod_price_qty['stock_out_msg'] = $stock_out_msg;
									$data_prod_price_qty['quantity'] = $quantity;
									$data_prod_price_qty['price'] = $price;
									$data_prod_price_qty['discount'] = $discount;
									$data_prod_price_qty['delivery_charges'] = $delivery_charges;
									$data_prod_price_qty['discount_var'] = $discount_var;
									$data_prod_price_qty['final_price'] = $final_price;
									$data_prod_price_qty['updated_by'] = $this->data['session_uid'];
									$data_prod_price_qty['updated_on'] = date('Y-m-d H:i:s');
									$condition = "(product_in_store_id in ($product_in_store_id) )";
									$insertStatus = $this->Store_Model->update($data_prod_price_qty, 'product_in_store', '', $condition); //echo $insertStatus;
								}
							}
						}
					}
				}
				$msg = 'combiSuccess';
				$product_combination_id = $product_comb_id;
			}
		}


		if ($insertStatus >= 1) {
			$product_attribute_id = $_POST['product_attribute_id'];
			//echo "<pre>";print_r($product_attribute_id);echo "</pre>";
			$product_attribute_value_id = $_POST['product_attribute_value_id'];
			$combination_value = $_POST['combination_value'];
			$product_id = $_POST['product_id'];
			$insertStatus = $this->Admin_model->deleteRows('product_combination_attribute', $product_combination_id);
			for ($i = 0; $i < count($product_attribute_id); $i++) {
				$entereddataproduct_attribute['product_combination_id'] = $product_combination_id;
				$entereddataproduct_attribute['product_attribute_id'] = $product_attribute_id[$i];
				$entereddataproduct_attribute['product_attribute_value_id'] = $product_attribute_value_id[$i];
				$entereddataproduct_attribute['product_id'] = $product_id;
				$entereddataproduct_attribute['combination_value'] = $combination_value[$i];
				$insertStatus = $this->Admin_model->add($entereddataproduct_attribute, 'product_combination_attribute');
			}
		}
		if ($is_add_seo_data) {
			if (empty($product_in_store_id)) {
				$product_in_store_id = '';
			}
			//$this->addProductSEOWithCombination($product_id , $product_comb_id , $product_in_store_id);
		}
		if ($product_combination_id > 0 && $product_id > 0) {
			if (!empty($_POST['is_seo_tag'])) {
				if ($_POST['is_seo_tag'] == 1) {
					$this->addUpdateMetaDataWithCombination($product_id, $product_combination_id);
				}
			}
		}
		//exit;
		$this->session->set_userdata("active_tab", 'COMBINATIONS');
		REDIRECT(MAINSITE_Admin . "catalog/Product-Module/edit/$product_id/" . $msg);
		//echo $this->db->last_query();
		REDIRECT(MAINSITE_Admin . "catalog/Product-Module/listing/" . $msg);
	}

	/*function checkProductSEOSlugUrl()

	 {

		 $search = array();

		 if(!empty($_POST['product_id'])){$product_id = $_POST['product_id'];}

		 if(!empty($_POST['product_combination_id'])){$product_combination_id = $_POST['product_combination_id'];}

		 if(!empty($_POST['slug_url'])){$slug_url = $_POST['slug_url'];}

		 if(!empty($_POST['product_seo_id'])){$product_seo_id = $_POST['product_seo_id'];}

		 $search['product_id'] = $product_id;

		 $search['product_combination_id'] = $product_combination_id;

		 $search['slug_url'] = $slug_url;

		 $search['product_seo_id'] = $product_seo_id;

		 $position_status = $this->Stock_Model->checkSlugUrl($search);

		 

		 echo $position_status; 

	 }
 */




	function addUpdateMetaDataWithCombination($product_id, $product_combination_id)
	{

		$entereddata = $this->input->post(

			$this->Admin_model->product_seo_fields
		);

		//echo var_dump($_POST);

		$product_seo_id = $_POST['product_seo_id'];

		$entereddata['store_id'] = 1;

		$entereddata['product_combination_id'] = $product_combination_id;

		$entereddata['product_in_store_id'] = 0;

		unset($entereddata['others']);

		if (!empty($product_seo_id)) {

			$entereddata['updated_by'] = $this->data['session_uid'];

			$entereddata['updated_on'] = date('Y-m-d H:i:s');

			$condition = "(product_seo_id = '$product_seo_id')";

			$insertStatus = $this->Admin_model->update($entereddata, 'product_seo', $product_seo_id, $condition);

			if ($insertStatus >= 1) {
				$msg = 'update';
			}

		} else {

			$entereddata['added_by'] = $this->data['session_uid'];

			$entereddata['added_on'] = date('Y-m-d H:i:s');

			$insertStatus = $this->Admin_model->add($entereddata, 'product_seo');

			if ($insertStatus >= 1) {
				$msg = 'success';
				$product_seo_id = $insertStatus;
			}

		}

	}

	//END



	function checkProductRefCode()
	{
		$response["response"] = 0;
		$product_id = $_POST['product_id'];
		$ref_code = $_POST['ref_code'];
		$position_status = $this->Admin_model->checkSlugUrl($ref_code, 'product_ref_code', $product_id);
		//echo $this->db->last_query();
		if (empty($position_status)) {
			$response["response"] = 1;
		}
		echo json_encode($response);
	}

	function checkProductCombinationSlugUrl()
	{
		$product_id = $_POST['product_id'];
		$slug_url = $_POST['comb_slug_url'];
		$product_combination_id = $_POST['product_combination_id'];

		$position_status = $this->Admin_model->checkSlugUrl($slug_url, 'product_combination', $product_id, $product_combination_id);
		echo $position_status;
	}

	function checkProductSlugUrl()
	{
		$product_id = $_POST['product_id'];
		$slug_url = $_POST['slug_url'];
		$position_status = $this->Admin_model->checkSlugUrl($slug_url, 'product', $product_id);
		echo $position_status;
	}

	function checkProductSEOSlugUrl()
	{//product_id product_combination_id slug_url
		$product_id = $_POST['product_id'];
		$product_combination_id = $_POST['product_combination_id'];
		$slug_url = $_POST['slug_url'];
		$product_seo_id = $_POST['product_seo_id'];
		//$position_status=$this->Admin_Model->checkSlugUrl($slug_url,'product_seo',$product_id,$product_combination_id);
		$position_status = $this->Admin_model->checkSlugUrl($slug_url, 'product_seo', $product_seo_id);
		echo $position_status;
	}

	function product_clone($product_id)
	{

		$data['page_type'] = "list";
		$data['page_module_id'] = 17;
		$data['user_access'] = $this->data['User_auth_obj']->check_user_access(array("module_id" => $this->data['page_module_id']));
		//print_r($this->data['user_access']);
		if (empty($data['user_access'])) {
			REDIRECT(MAINSITE_Admin . "wam/access-denied");
		}


		$data['product_detail'] = $this->Common_Model->getData(array('select' => '*', 'from' => 'product', 'where' => "product_id = $product_id"));
		$data['product_category_detail'] = $this->Common_Model->getData(array('select' => '*', 'from' => 'product_category', 'where' => "product_id = $product_id"));
		$data['product_image_detail'] = $this->Common_Model->getData(array('select' => '*', 'from' => 'product_image', 'where' => "product_id = $product_id"));
		$data['product_combination_detail'] = $this->Common_Model->getData(array('select' => '*', 'from' => 'product_combination', 'where' => "product_id = $product_id"));

		$data['product_in_store_detail'] = $this->Common_Model->getData(array('select' => '*', 'from' => 'product_in_store', 'where' => "product_id = $product_id"));
		$data['product_combination_attribute_detail'] = $this->Common_Model->getData(array('select' => '*', 'from' => 'product_combination_attribute', 'where' => "product_id = $product_id"));
		//$data['product_use_info_value_detail']=$this->Common_Model->getData(array('select'=>'*' , 'from'=>'product_use_info_value' , 'where'=>"product_id = $product_id"));
		$data['product_seo_detail'] = $this->Common_Model->getData(array('select' => '*', 'from' => 'product_seo', 'where' => "product_id = $product_id"));
		//$data['product_specification_detail']=$this->Common_Model->getData(array('select'=>'*' , 'from'=>'product_specification' , 'where'=>"product_id = $product_id"));
		$data['product_attribute_list'] = $this->Common_Model->getData(array('select' => '*', 'from' => 'product_attribute', 'where' => "product_attribute_id > 0"));
		$data['attribute_value_list'] = $this->Common_Model->getData(array('select' => '*', 'from' => 'product_attribute_value', 'where' => "product_attribute_value_id >0"));

		/*$data['product_detail']=$this->Admin_Model->products('product_detail',$product_id);
			$data['product_category_detail']=$this->Admin_Model->products('product_category_detail',$product_id);
			$data['product_image_detail']=$this->Admin_Model->products('product_image_detail',$product_id);
			$data['product_combination_detail']=$this->Admin_Model->products('product_combination_detail',$product_id);
			
			$data['product_in_store_detail']=$this->Admin_Model->products('product_in_store',$product_id);
			$data['product_combination_attribute_detail']=$this->Admin_Model->products('product_combination_attribute_detail',$product_id);
			$data['product_use_info_value_detail']=$this->Admin_Model->products('product_use_info_value_detail',$product_id);
			$data['product_seo_detail']=$this->Admin_Model->products('product_seo_detail',$product_id);
			$data['product_specification_detail']=$this->Admin_Model->products('product_specification',$product_id);
			$data['product_attribute_list']=$this->Admin_Model->getListSearch('all_product_attribute_list','', '','', '','', '','', '' , 1);
			$data['attribute_value_list']=$this->Admin_Model->getListSearch('all_attribute_value_list','', '','', '','', '','', '' , 1);*/
		$this->data = $data;
		$this->load->view('admin/catalog/Product_Module/create_product_clone', $this->data);
	}

}

?>