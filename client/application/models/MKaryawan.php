<?php 
class MKaryawan extends CI_Model {

	var $API ="";
	function __construct() {
		parent::__construct();
		$this->API="http://localhost/web_service/service/index.php/Karyawan";
	}

	function list_product(){
		return json_decode($this->restclient->get());
	}

	function product($id){
		$params = array('id'=>  $id);
		return json_decode($this->restclient->get($params),true);
	}

	function save($array)
	{
		// $this->curl->post($array);
		// $this->curl->simple_post($this->API.'/Karyawan', $data, array(CURLOPT_BUFFERSIZE => 0));
	}

	function update($array)
	{
		$this->restclient->put($array);
	}

	function delete($id)
	{
		$this->restclient->delete($id);
	}
}