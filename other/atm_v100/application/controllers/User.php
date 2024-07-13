<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');


include_once ('Main.php');
class User extends Main
{

  public function __construct()
  {
    parent::__construct();

    //models
    $this->load->model('Common_Model');
    $this->load->model('Tour_Model');
    $this->load->model('Di_Tour_Model');
    $this->load->model('Gallery_Model');
    $this->load->model('Video_Model');


    //headers
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");

  }

  public function index()
  {

    $this->data['meta_title'] = _project_name_;
    $this->data['meta_description'] = _project_name_;
    $this->data['meta_keywords'] = _project_name_;
    $this->data['meta_others'] = "";



    $last_screen = $this->Common_Model->checkScreen();

    if ($last_screen == 'isdesktop') {
      $last_screen = "Desktop";
      $banners_condition = "b.status=1 and b.banner_for=1";
    } else {
      $last_screen = "Mobile or Tablet";
      $banners_condition = "b.status=1 and b.banner_for=0";
    }



    parent::getHeader('header', $this->data);
    $this->load->view('home', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function upcoming_adventures()
  {
    $this->data['meta_title'] = _project_name_ . " - Upcoming Adventures";
    $this->data['meta_description'] = _project_name_ . " - Upcoming Adventures";
    $this->data['meta_keywords'] = _project_name_ . " - Upcoming Adventures";
    $this->data['meta_others'] = "";

    $this->data['tour_data'] = $this->Tour_Model->get_tour_data([
      "tour_variant" => 1,
      "details" => 1
    ]);




    parent::getHeader('header', $this->data);
    $this->load->view('upcoming-adventures', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function upcoming_adventures_details($slug)
  {



    $this->data['meta_title'] = _project_name_ . " - Upcoming Adventure Details";
    $this->data['meta_description'] = _project_name_ . " - Upcoming Adventure Details";
    $this->data['meta_keywords'] = _project_name_ . " - Upcoming Adventure Details";
    $this->data['meta_others'] = "";


    $this->data['tour_data'] = $this->Tour_Model->get_tour_data([
      "tour_variant" => 1,
      "tour_id" => $slug,
      "details" => 1
    ]);

    if (empty($this->data['tour_data'])) {
      $this->load->view('pageNotFound', $this->data);
    } else {
      $this->data['tour_data'] = $this->data['tour_data'][0];



      parent::getHeader('header', $this->data);
      $this->load->view('upcoming-adventures-details', $this->data);
      parent::getFooter('footer', $this->data);
    }


  }


  public function upcoming_tours()
  {
    $this->data['meta_title'] = _project_name_ . " - Upcoming Tours";
    $this->data['meta_description'] = _project_name_ . " - Upcoming Tours";
    $this->data['meta_keywords'] = _project_name_ . " - Upcoming Tours";
    $this->data['meta_others'] = "";

    $this->data['tour_data'] = $this->Tour_Model->get_tour_data([
      "tour_variant" => 2,
      "details" => 1
    ]);




    parent::getHeader('header', $this->data);
    $this->load->view('upcoming-tours', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function upcoming_tours_details($slug)
  {



    $this->data['meta_title'] = _project_name_ . " - Upcoming Tours Details";
    $this->data['meta_description'] = _project_name_ . " - Upcoming Tours Details";
    $this->data['meta_keywords'] = _project_name_ . " - Upcoming Tours Details";
    $this->data['meta_others'] = "";


    $this->data['tour_data'] = $this->Tour_Model->get_tour_data([
      "tour_variant" => 2,
      "tour_id" => $slug,
      "details" => 1
    ]);

    if (empty($this->data['tour_data'])) {
      $this->load->view('pageNotFound', $this->data);
    } else {
      $this->data['tour_data'] = $this->data['tour_data'][0];



      parent::getHeader('header', $this->data);
      $this->load->view('upcoming-tours-details', $this->data);
      parent::getFooter('footer', $this->data);
    }


  }




  public function activities()
  {
    $this->data['meta_title'] = _project_name_ . " - Activities";
    $this->data['meta_description'] = _project_name_ . " - Activities";
    $this->data['meta_keywords'] = _project_name_ . " - Activities";
    $this->data['meta_others'] = "";

    $this->data['tour_data'] = $this->Tour_Model->get_tour_data([
      "tour_variant" => 3,
      "details" => 1
    ]);




    parent::getHeader('header', $this->data);
    $this->load->view('activities', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function activities_details($slug)
  {



    $this->data['meta_title'] = _project_name_ . " - Activities Details";
    $this->data['meta_description'] = _project_name_ . " - Activities Details";
    $this->data['meta_keywords'] = _project_name_ . " - Activities Details";
    $this->data['meta_others'] = "";


    $this->data['tour_data'] = $this->Tour_Model->get_tour_data([
      "tour_variant" => 3,
      "tour_id" => $slug,
      "details" => 1
    ]);

    if (empty($this->data['tour_data'])) {
      $this->load->view('pageNotFound', $this->data);
    } else {
      $this->data['tour_data'] = $this->data['tour_data'][0];



      parent::getHeader('header', $this->data);
      $this->load->view('activities-details', $this->data);
      parent::getFooter('footer', $this->data);
    }


  }


  public function domestic_tours()
  {
    $this->data['meta_title'] = _project_name_ . " - Domestic Tours";
    $this->data['meta_description'] = _project_name_ . " - Domestic Tours";
    $this->data['meta_keywords'] = _project_name_ . " - Domestic Tours";
    $this->data['meta_others'] = "";

    $this->data['di_tour_data'] = $this->Di_Tour_Model->get_di_tour_data([
      "di_tour_variant" => 1,
      "details" => 1
    ]);




    parent::getHeader('header', $this->data);
    $this->load->view('domestic-tours', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function domestic_tours_details($slug)
  {



    $this->data['meta_title'] = _project_name_ . " - Domestic Tours Details";
    $this->data['meta_description'] = _project_name_ . " - Domestic Tours Details";
    $this->data['meta_keywords'] = _project_name_ . " - Domestic Tours Details";
    $this->data['meta_others'] = "";


    $this->data['di_tour_data'] = $this->Di_Tour_Model->get_di_tour_data([
      "di_tour_variant" => 1,
      "di_tour_id" => $slug,
      "details" => 1
    ]);

    if (empty($this->data['di_tour_data'])) {
      $this->load->view('pageNotFound', $this->data);
    } else {
      $this->data['di_tour_data'] = $this->data['di_tour_data'][0];



      parent::getHeader('header', $this->data);
      $this->load->view('domestic-tours-details', $this->data);
      parent::getFooter('footer', $this->data);
    }


  }


  public function international_tours()
  {

    $this->data['meta_title'] = _project_name_ . " - International Tours";
    $this->data['meta_description'] = _project_name_ . " - International Tours";
    $this->data['meta_keywords'] = _project_name_ . " - International Tours";
    $this->data['meta_others'] = "";

    $this->data['di_tour_data'] = $this->Di_Tour_Model->get_di_tour_data([
      "di_tour_variant" => 2,
      "details" => 1
    ]);




    parent::getHeader('header', $this->data);
    $this->load->view('international-tours', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function international_tours_details($slug)
  {



    $this->data['meta_title'] = _project_name_ . " - International Tours Details";
    $this->data['meta_description'] = _project_name_ . " - International Tours Details";
    $this->data['meta_keywords'] = _project_name_ . " - International Tours Details";
    $this->data['meta_others'] = "";


    $this->data['di_tour_data'] = $this->Di_Tour_Model->get_di_tour_data([
      "di_tour_variant" => 2,
      "di_tour_id" => $slug,
      "details" => 1
    ]);

    if (empty($this->data['di_tour_data'])) {
      $this->load->view('pageNotFound', $this->data);
    } else {
      $this->data['di_tour_data'] = $this->data['di_tour_data'][0];



      parent::getHeader('header', $this->data);
      $this->load->view('international-tours-details', $this->data);
      parent::getFooter('footer', $this->data);
    }


  }


  function ajax_insert_tour_booking_enquiry()
  {
    $page = trim($_POST['page']);



    ini_set('display_errors', 'Off');
    ini_set('error_reporting', E_ALL);
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date("Y-m-d H:i:s");

    //echo '<pre>'; print_r($_POST); echo '</pre>'; exit; 

    if (true) {
      if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {
        $link = $_SERVER['HTTP_REFERER'];
        $link_array = explode('/', $link);
        $page_action = end($link_array);
        $parts = parse_url($link);
        $page_host = $parts['host'];
        if (strpos($parts["host"], 'www.') !== false) { //echo 'yes<br>';
          $parts1 = explode('www.', $parts["host"]);
          $page_host = $parts1[1];
        }


        if ($page_host != _mainsite_hostname_) {
          REDIRECT(MAINSITE . $page);
          echo '<script language="javascript">';
          echo 'alert("Host validation failed! Please try again.")';
          echo '</script>';
          die();
        }
      } else {
        REDIRECT(MAINSITE . $page);
        echo '<script language="javascript">';
        echo 'alert("Error: HTTP_REFERER failed! Please try again.")';
        echo '</script>';
        die();
      }

      $request = '';
      if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $param['secret'] = _google_recaptcha_secret_key_;
        $param['response'] = $_POST['g-recaptcha-response'];
        $param['remoteip'] = $_SERVER['REMOTE_ADDR'];
        foreach ($param as $key => $val) {
          $request .= $key . "=" . $val;
          $request .= "&";
        }
        $request = substr($request, 0, strlen($request) - 1);
        $url = "https://www.google.com/recaptcha/api/siteverify?" . $request;
        //echo $url; exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result_data = curl_exec($ch);
        if (curl_exec($ch) === false) {
          $error_info = curl_error($ch);
        }
        curl_close($ch);

        $response = json_decode($result_data);
        if ($response->success != 1) {
          REDIRECT(MAINSITE . $page);
          echo '<script language="javascript">';
          echo 'alert("google recaptcha validation failed! Please try again.")';
          echo '</script>';

          die();
        }
      } else {
        REDIRECT(MAINSITE . $page);
        echo '<script language="javascript">';
        echo 'alert("Error: google recaptcha post validation failed! Please try again.")';
        echo '</script>';
        die();
      }
    }




    $enter_data['name'] = trim($_POST['name']);
    $enter_data['contactno'] = trim($_POST['contactno']);
    $enter_data['email'] = trim($_POST['email']);
    $enter_data['subject'] = trim($_POST['subject']);
    $enter_data['description'] = trim($_POST['description']);
    $enter_data['tour_id'] = trim($_POST['tour_id']);
    $enter_data['tour_date_id'] = trim($_POST['tour_date_id']);
    $enter_data['status'] = 1;

    $enter_data['added_on'] = date("Y-m-d H:i:s");

    $enquiry_result = $insertStatus = $this->Common_Model->add_operation(array('table' => 'tour_booking_enquiry', 'data' => $enter_data));
    if (!empty($enquiry_result)) {
      //redirect to thank you page
      REDIRECT(MAINSITE . "thank-you");
    } else {
      //redirect to the same page
      REDIRECT(MAINSITE . $page);
    }

  }

  function ajax_insert_di_tour_booking_enquiry()
  {

    $page = trim($_POST['page']);



    ini_set('display_errors', 'Off');
    ini_set('error_reporting', E_ALL);
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date("Y-m-d H:i:s");

    //echo '<pre>'; print_r($_POST); echo '</pre>'; exit; 

    if (true) {
      if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {
        $link = $_SERVER['HTTP_REFERER'];
        $link_array = explode('/', $link);
        $page_action = end($link_array);
        $parts = parse_url($link);
        $page_host = $parts['host'];
        if (strpos($parts["host"], 'www.') !== false) { //echo 'yes<br>';
          $parts1 = explode('www.', $parts["host"]);
          $page_host = $parts1[1];
        }


        if ($page_host != _mainsite_hostname_) {
          REDIRECT(MAINSITE . $page);
          echo '<script language="javascript">';
          echo 'alert("Host validation failed! Please try again.")';
          echo '</script>';
          die();
        }
      } else {
        REDIRECT(MAINSITE . $page);
        echo '<script language="javascript">';
        echo 'alert("Error: HTTP_REFERER failed! Please try again.")';
        echo '</script>';
        die();
      }

      $request = '';
      if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $param['secret'] = _google_recaptcha_secret_key_;
        $param['response'] = $_POST['g-recaptcha-response'];
        $param['remoteip'] = $_SERVER['REMOTE_ADDR'];
        foreach ($param as $key => $val) {
          $request .= $key . "=" . $val;
          $request .= "&";
        }
        $request = substr($request, 0, strlen($request) - 1);
        $url = "https://www.google.com/recaptcha/api/siteverify?" . $request;
        //echo $url; exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result_data = curl_exec($ch);
        if (curl_exec($ch) === false) {
          $error_info = curl_error($ch);
        }
        curl_close($ch);

        $response = json_decode($result_data);
        if ($response->success != 1) {
          REDIRECT(MAINSITE . $page);
          echo '<script language="javascript">';
          echo 'alert("google recaptcha validation failed! Please try again.")';
          echo '</script>';

          die();
        }
      } else {
        REDIRECT(MAINSITE . $page);
        echo '<script language="javascript">';
        echo 'alert("Error: google recaptcha post validation failed! Please try again.")';
        echo '</script>';
        die();
      }
    }




    $di_tour_id = trim($_POST['di_tour_id']);

    $start_journey_date = trim($_POST['start_date_time']);

    $this->data['di_tour_data'] = $this->Di_Tour_Model->get_di_tour_data([
      "di_tour_id" => $di_tour_id,
      "details" => 1
    ]);





    if (!empty($this->data['di_tour_data'])) {
      $di_tour_data = $this->data['di_tour_data'][0];

      $total_day_night = intval($di_tour_data->duration_day) + intval($di_tour_data->duration_night);
      // Duration of the journey in hours
      $journey_duration_hours = 12 * $total_day_night; // example duration

      // Create a DateTime object from the start journey date
      $start_date = new DateTime($start_journey_date);

      // Add the journey duration to the start date
      $end_date = clone $start_date;
      $end_date->add(new DateInterval('PT' . $journey_duration_hours . 'H'));

      // Format the end date as 'YYYY-MM-DD'
      $end_date = $end_date->format('Y-m-d');

      $enter_data['di_tour_id'] = $di_tour_id;
      $enter_data['name'] = trim($_POST['name']);
      $enter_data['contactno'] = trim($_POST['contactno']);
      $enter_data['email'] = trim($_POST['email']);
      $enter_data['subject'] = trim($_POST['subject']);
      $enter_data['description'] = trim($_POST['description']);
      $enter_data['start_date_time'] = $start_journey_date;
      $enter_data['end_date'] = $end_date;
      $enter_data['status'] = 1;
      $enter_data['added_on'] = date("Y-m-d H:i:s");



      $enquiry_result = $insertStatus = $this->Common_Model->add_operation(array('table' => 'di_tour_booking_enquiry', 'data' => $enter_data));
      if (!empty($enquiry_result)) {
        //redirect to thank you page
        REDIRECT(MAINSITE . "thank-you");
      } else {
        //redirect to the same page
        REDIRECT(MAINSITE . "contact");
      }

    }




  }

  function ajax_insert_enquiry()
  {
    $page = trim($_POST['page']);

    ini_set('display_errors', 'Off');
    ini_set('error_reporting', E_ALL);
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date("Y-m-d H:i:s");

    //echo '<pre>'; print_r($_POST); echo '</pre>'; exit; 

    if (true) {
      if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {
        $link = $_SERVER['HTTP_REFERER'];
        $link_array = explode('/', $link);
        $page_action = end($link_array);
        $parts = parse_url($link);
        $page_host = $parts['host'];
        if (strpos($parts["host"], 'www.') !== false) { //echo 'yes<br>';
          $parts1 = explode('www.', $parts["host"]);
          $page_host = $parts1[1];
        }


        if ($page_host != _mainsite_hostname_) {

          echo '<script language="javascript">';
          echo 'alert("Host validation failed! Please try again.")';
          echo '</script>';
          die();
        }
      } else {
        echo '<script language="javascript">';
        echo 'alert("Error: HTTP_REFERER failed! Please try again.")';
        echo '</script>';
        die();
      }

      $request = '';
      if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $param['secret'] = _google_recaptcha_secret_key_;
        $param['response'] = $_POST['g-recaptcha-response'];
        $param['remoteip'] = $_SERVER['REMOTE_ADDR'];
        foreach ($param as $key => $val) {
          $request .= $key . "=" . $val;
          $request .= "&";
        }
        $request = substr($request, 0, strlen($request) - 1);
        $url = "https://www.google.com/recaptcha/api/siteverify?" . $request;
        //echo $url; exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result_data = curl_exec($ch);
        if (curl_exec($ch) === false) {
          $error_info = curl_error($ch);
        }
        curl_close($ch);

        $response = json_decode($result_data);
        if ($response->success != 1) {
          REDIRECT(MAINSITE . $page);
          echo '<script language="javascript">';
          echo 'alert("google recaptcha validation failed! Please try again.")';
          echo '</script>';

          die();
        }
      } else {
        REDIRECT(MAINSITE . $page);
        echo '<script language="javascript">';
        echo 'alert("Error: google recaptcha post validation failed! Please try again.")';
        echo '</script>';
        die();
      }
    }


    $enter_data['name'] = trim($_POST['name']);
    $enter_data['contactno'] = trim($_POST['contactno']);
    $enter_data['email'] = trim($_POST['email']);
    $enter_data['subject'] = trim($_POST['subject']);
    $enter_data['description'] = trim($_POST['description']);
    $enter_data['status'] = 1;

    $enter_data['added_on'] = date("Y-m-d H:i:s");

    $enquiry_result = $insertStatus = $this->Common_Model->add_operation(array('table' => 'enquiry', 'data' => $enter_data));

    if (!empty($enquiry_result)) {
      //redirect to thank you page
      REDIRECT(MAINSITE . "/thank-you");
    } else {
      //redirect to the same page
      REDIRECT(MAINSITE . $page);
    }


  }


  public function thank_you()
  {
    $this->data['meta_title'] = _project_name_ . " - Thank You";
    $this->data['meta_description'] = _project_name_ . " - Thank You";
    $this->data['meta_keywords'] = _project_name_ . " - Thank You";
    $this->data['meta_others'] = "";






    parent::getHeader('header', $this->data);
    $this->load->view('thank-you', $this->data);
    parent::getFooter('footer', $this->data);
  }

  public function gallery()
  {
    $this->data['meta_title'] = _project_name_ . " - Gallery";
    $this->data['meta_description'] = _project_name_ . " - Gallery";
    $this->data['meta_keywords'] = _project_name_ . " - Gallery";
    $this->data['meta_others'] = "";

    $this->data['gallery_data'] = $this->Gallery_Model->get_gallery_data([
      "details" => 1
    ]);




    parent::getHeader('header', $this->data);
    $this->load->view('gallery', $this->data);
    parent::getFooter('footer', $this->data);
  }

  public function videos()
  {

    $this->data['meta_title'] = _project_name_ . " - Videos";
    $this->data['meta_description'] = _project_name_ . " - Videos";
    $this->data['meta_keywords'] = _project_name_ . " - Videos";
    $this->data['meta_others'] = "";

    $this->data['video_data'] = $this->Video_Model->get_video_data([
      "details" => 1
    ]);




    parent::getHeader('header', $this->data);
    $this->load->view('videos', $this->data);
    parent::getFooter('footer', $this->data);
  }










  public function pageNotFound()
  {
    $this->data['meta_title'] = _project_name_ . " - Page Not Found";
    $this->data['meta_description'] = _project_name_ . " - Page Not Found";
    $this->data['meta_keywords'] = _project_name_ . " - Page Not Found";
    $this->data['meta_others'] = "";

    $this->load->view('pageNotFound', $this->data);
  }

  public function found404()
  {
    $this->data['meta_title'] = _project_name_ . " - 404 found";
    $this->data['meta_description'] = _project_name_ . " - 404 found";
    $this->data['meta_keywords'] = _project_name_ . " - 404 found";
    $this->data['meta_others'] = "";

    parent::getHeader('header', $this->data);
    $this->load->view('404found', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function contact()
  {
    $this->data['meta_title'] = _project_name_ . " - Contact Us";
    $this->data['meta_description'] = _project_name_ . " - Contact Us";
    $this->data['meta_keywords'] = _project_name_ . " - Contact Us";
    $this->data['meta_others'] = "";

    parent::getHeader('header', $this->data);
    $this->load->view('contact');
    parent::getFooter('footer', $this->data);
  }


  public function story()
  {

    $this->data['meta_title'] = _project_name_ . " - Story";
    $this->data['meta_description'] = _project_name_ . " - Story";
    $this->data['meta_keywords'] = _project_name_ . " - Story";
    $this->data['meta_others'] = "";

    parent::getHeader('header', $this->data);
    $this->load->view('story');
    parent::getFooter('footer', $this->data);
  }






  public function blog()
  {
    $this->data['meta_title'] = _project_name_ . " - Blog";
    $this->data['meta_description'] = _project_name_ . " - Blog";
    $this->data['meta_keywords'] = _project_name_ . " - Blog";
    $this->data['meta_others'] = "";


    parent::getHeader('header', $this->data);
    $this->load->view('blog');
    parent::getFooter('footer', $this->data);
  }


}
