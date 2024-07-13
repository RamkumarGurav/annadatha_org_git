<?php
class Tour_Model extends CI_Model
{
  function __construct()
  {
    date_default_timezone_set("Asia/Kolkata");
    $this->load->library('session');
    $this->db->query("SET sql_mode = ''");

    //headers
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
  }




  function get_tour_data($params = array())
  {
    $result = '';



    $this->db->select("ft.*");

    // From admin_user table "ft" refers to "from table"
    $this->db->from("tour as ft");
    $this->db->where("ft.status", 1);

    if (!empty($params['tour_id'])) {
      $this->db->where("ft.tour_id", $params['tour_id']);
    }

    if (!empty($params['tour_variant'])) {
      $this->db->where("ft.tour_variant", $params['tour_variant']);
    }


    // Conditional logic for ordering results
    if (!empty($params['order_by'])) {
      $this->db->order_by($params['order_by']);
    } else {
      $this->db->order_by("ft.tour_id desc"); // Default order by admin_user_id descending
    }




    if (!empty($params['start_date'])) {
      $temp_date = date('Y-m-d', strtotime($params['start_date']));
      $this->db->where("DATE_FORMAT(ft.added_on, '%Y%m%d') >= DATE_FORMAT('$temp_date', '%Y%m%d')"); // Start date condition
    }

    if (!empty($params['end_date'])) {
      $temp_date = date('Y-m-d', strtotime($params['end_date']));
      $this->db->where("DATE_FORMAT(ft.added_on, '%Y%m%d') <= DATE_FORMAT('$temp_date', '%Y%m%d')"); // End date condition
    }


    if (!empty($params['field_value']) && !empty($params['field_name'])) {
      $this->db->where("$params[field_name] like ('%$params[field_value]%')"); // Field name and value condition
    }

    if (!empty($params['limit']) && !empty($params['offset'])) {
      $this->db->limit($params['limit'], $params['offset']); // Limit and offset for pagination
    } else if (!empty($params['limit'])) {
      $this->db->limit($params['limit']); // Limit for number of records
    }


    // Execute query and get results
    $query_get_list = $this->db->get();
    $result = $query_get_list->result();//RESULT CONTAINS ARRAY OF ADMIN_USERS


    // If details parameter is provided, fetch additional details
    if (!empty($result) && !empty($params['details'])) {
      foreach ($result as $utd) {
        $this->db->select("tdate.*");
        $this->db->from("tour_date as tdate");
        $this->db->where("tdate.tour_id", $utd->tour_id);
        $this->db->where("tdate.status", 1);
        $utd->tour_date = $this->db->get()->result();


        $this->db->select("ttc.*");
        $this->db->from("things_to_carry as ttc");
        $this->db->where("ttc.tour_id", $utd->tour_id);
        $this->db->where("ttc.status", 1);
        $utd->things_to_carry = $this->db->get()->result();


        $this->db->select("ci.*");
        $this->db->from("carousel_image as ci");
        $this->db->where("ci.tour_id", $utd->tour_id);
        $this->db->where("ci.status", 1);
        $this->db->order_by("ci.position desc");
        $utd->carousel_image = $this->db->get()->result();


        $this->db->select("gi.*");
        $this->db->from("gallery_image as gi");
        $this->db->where("gi.tour_id", $utd->tour_id);
        $this->db->where("gi.status", 1);
        $this->db->order_by("gi.position desc");
        $utd->gallery_image = $this->db->get()->result();


        $this->db->select("tp.*");
        $this->db->from("tour_plan as tp");
        $this->db->where("tp.tour_id", $utd->tour_id);
        $this->db->where("tp.status", 1);
        $this->db->order_by("tp.day_number asc");
        $utd->tour_plan = $this->db->get()->result();


      }
    }

    return $result; // Return the final result
  }



}

?>