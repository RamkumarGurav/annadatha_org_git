<?php
class Attendance_Model extends CI_Model
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

  /**
   * getting attendances with search ,pagination  and sorting using params ,if your using this method to find single attendance data with its attendance_id then it will be present int the 0th index of the resultant array
   */
  function get_attendance($params = array())
  {
    $result = '';
    if (!empty($params['search_for'])) {
      $this->db->select("count(urm.attendance_id) as counts");
    } else {
      $this->db->select("urm.* , uemp.* ");
      $this->db->select("(select au.name from admin_user as  au where au.admin_user_id = urm.added_by) as added_by_name ");
      $this->db->select("(select au.name from admin_user as  au where au.admin_user_id = urm.updated_by) as updated_by_name ");
    }

    $this->db->from("attendance as urm");
    $this->db->join("user_employee as  uemp", "uemp.user_employee_id = urm.user_employee_id");
    $this->db->order_by("attendance_id desc");

    if (!empty($params['attendance_id'])) {
      $this->db->where("urm.attendance_id", $params['attendance_id']);
    }
    if (!empty($params['branch_id'])) {
      $this->db->where("urm.branch_id", $params['branch_id']);
    }

    if (!empty($params['start_date'])) {
      $temp_date = date('Y-m-d', strtotime($params['start_date']));
      $this->db->where("DATE_FORMAT(urm.added_on, '%Y%m%d') >= DATE_FORMAT('$temp_date', '%Y%m%d')");
    }

    if (!empty($params['end_date'])) {
      $temp_date = date('Y-m-d', strtotime($params['end_date']));
      $this->db->where("DATE_FORMAT(urm.added_on, '%Y%m%d') <= DATE_FORMAT('$temp_date', '%Y%m%d')");
    }

    if (!empty($params['record_status'])) {
      if ($params['record_status'] == 'zero') {
        $this->db->where("urm.status = 0");
      } else {
        $this->db->where("urm.attendance_id", $params['record_status']);
      }
    }



    if (!empty($params['field_value']) && !empty($params['field_name'])) {
      $this->db->where("$params[field_name] like ('%$params[field_value]%')");
    }

    if (!empty($params['limit']) && !empty($params['offset'])) {
      $this->db->limit($params['limit'], $params['offset']);
    } else if (!empty($params['limit'])) {
      $this->db->limit($params['limit']);
    }

    $query_get_list = $this->db->get();
    $result = $query_get_list->result();

    return $result;
  }
}

?>