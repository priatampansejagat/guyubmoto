<?php

namespace App\Controllers\Curl;

use App\Controllers\BaseController;

class Api_handler extends BaseController
{

  // protected $curl_api;
  // protected $session;
  private $base_url = API_BASE_URL;

  public function __construct(){
        // $this->session = \Config\Services::session();
    }

    function _log($str) {
        // log to the output
        $log_str = date('d.m.Y').": {$str}\r\n";
        echo $log_str;

        // log to file
        if (($fp = fopen('./_log.txt', 'a+')) !== false) {
            fputs($fp, $log_str);
            fclose($fp);
        }
    }

    public function post_file_test(){
      echo json_encode($_POST);
    }

    public function post_file(){
        $file_var = $_POST["file_var"];

        $encoded_post = json_encode($_POST);
        $decoded_post = json_decode($encoded_post,true);

        $filename = $_FILES[$file_var]['name'];
        $filedata = $_FILES[$file_var]['tmp_name'];
        $cFile = curl_file_create($filedata, $_FILES[$file_var]['type'], $filename);
        $postfields = array("file" => $cFile,
                            "filename" => $filename,
                            "data" => $encoded_post
                          );
        $target_url = $this->base_url . $_POST["url"];
        $request_headers = array(
            // "x-auth-userid: " . $_SESSION['data_login']['user_id'],
            "X-Requested-With: XMLHttpRequest",
            "Content-Type:multipart/form-data"
        );

        // $this->_log('get_file_url : '.$target_url);

        $ch = curl_init();
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_URL, $target_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        // curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        $data_object = curl_exec($ch);
        curl_close($ch);

        // echo $data_object;
    }

    public function post(){
        $data = $this->request->getPost();

        if(isset($data['param'])){

            $encode = $data['param'];
        }else{
            $encode = '';
        }

        $option = array(
            'type' => 'post',
            'url_api' => $this->request->getPost('url'),
            'data' => $encode
        );

        $this->curl_api->set_option($option);
        $data_object = $this->curl_api->exec();

        if ($_SERVER['CI_ENVIRONMENT'] == 'production') {
          if ($data_object->status !== true) {
              http_response_code($data_object->status);
          }
        }

        /* CREATE FLASH SESSION INCOMING DATA FOR SECURITY*/
        $data_flash = array('send' => $data, 'response' => $data_object);
        $this->session->setFlashdata($data_flash);

        echo json_encode($data_object);
    }

    public function put(){
        $data = $this->request->getPost();
        $option = array(
            'type' => 'PUT',
            'url_api' => $this->request->getPost('url'),
            'data' => json_encode($data['param']),
            'headers' => "x-auth-userid: " . $this->session->userdata('id')
        );

        $this->curl_api->set_option($option);
        $data_object = $this->curl_api->exec();
        if ($data_object->status !== 200) {
            http_response_code($data_object->status);
        }
        echo json_encode($data_object);
    }

    public function get(){
        $data = $this->request->getPost();
        $option = array(
            'type' => 'GET',
            'url_api' => $this->request->getPost('url'),
            'headers' => "x-auth-userid: " . $this->session->userdata('id')
        );
        $this->curl_api->set_option($option);
        $data_object = $this->curl_api->exec();

        echo json_encode($data_object);
    }

}

?>
