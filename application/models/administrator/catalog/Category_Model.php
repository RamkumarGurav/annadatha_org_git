<?php
class Category_Model extends CI_Model
{
	public $session_uid = '';
	public $session_name = '';
	public $session_email = '';

	function __construct()
	{
		$this->load->database();
		$this->model_data = array();
		$this->db->query("SET sql_mode = ''");
		$this->session_uid = $this->session->userdata('sess_psts_uid');
		$this->session_name = $this->session->userdata('sess_psts_name');
		$this->session_email = $this->session->userdata('sess_psts_email');

	}

	function get_category($params = array())
	{
		$result = '';
		if (!empty($params['search_for'])) {
			$this->db->select("count(aau.category_id) as counts");
		} else {
			$this->db->select("aau.*");
			$this->db->select("if(aau.super_category_id = 0 , 'Parent' , aau1.name) as super_category_name");
			$this->db->select("(select au.name from admin_user as  au where au.admin_user_id = aau.added_by) as added_by_name ");
			$this->db->select("(select au.name from admin_user as  au where au.admin_user_id = aau.updated_by) as updated_by_name ");
		}

		$this->db->from("category as aau");
		$this->db->join("category as aau1", "aau.super_category_id = aau1.category_id", "left");

		if (!empty($params['sortByPosition'])) {
			$this->db->order_by("aau.position ASC");
		} else if (!empty($params['order_by'])) {
			$this->db->order_by($params['order_by']);
		} else {
			$this->db->order_by("aau.super_category_id ASC");
			$this->db->order_by("aau.category_id desc");
		}

		if (!empty($params['category_id'])) {
			$this->db->where("aau.category_id", $params['category_id']);
		}
		if (!empty($params['admin_user_id'])) {
			$this->db->where("aau.admin_user_id", $params['admin_user_id']);
		}

		if (!empty($params['start_date'])) {
			$temp_date = date('Y-m-d', strtotime($params['start_date']));
			$this->db->where("DATE_FORMAT(aau.added_on, '%Y%m%d') >= DATE_FORMAT('$temp_date', '%Y%m%d')");
		}

		if (!empty($params['end_date'])) {
			$temp_date = date('Y-m-d', strtotime($params['end_date']));
			$this->db->where("DATE_FORMAT(aau.added_on, '%Y%m%d') <= DATE_FORMAT('$temp_date', '%Y%m%d')");
		}

		if (!empty($params['record_status'])) {
			if ($params['record_status'] == 'zero') {
				$this->db->where("aau.status = 0");
			} else {
				$this->db->where("aau.status", $params['record_status']);
			}
		}

		if (!empty($params['limit']) && !empty($params['offset'])) {
			$this->db->limit($params['limit'], $params['offset']);
		} else if (!empty($params['limit'])) {
			$this->db->limit($params['limit']);
		}


		$query_get_list = $this->db->get();
		//echo $this->db->last_query();
		$result = $query_get_list->result();

		if (!empty($result)) {
			// For each category, we want to get details about sub-categories and the names of the users who last updated these sub-categories.
			if (!empty($params['details'])) {
				foreach ($result as $r) {
					$this->db->select("aur.* , emp.name");
					$this->db->from("category as aur");
					$this->db->join("admin_user as emp", "emp.admin_user_id = aur.updated_by", "left");
					$this->db->where("aur.super_category_id", $r->category_id);
					$r->roles = $this->db->get()->result();


				}
			}

		}
		return $result;
	}

}

?>