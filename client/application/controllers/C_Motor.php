	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class C_Motor extends CI_Controller {

		var $API ="";

		function __construct() {
			parent::__construct();
			$this->API="https://api.akhmad.id/uaspromnet/";
		}

		// proses yang akan di buka saat pertama masuk ke controller
		public function index()
		{
			// $this->curl->http_header("X-Nim", "1702019");
			// $this->curl->simple_get($this->API. '/user');
			// $this->curl->debug();
			$this->curl->http_header("X-Nim", "1702019");
			$data['motor'] = json_decode($this->curl->simple_get($this->API.'/motor'));
			// $this->curl->debug();
			$this->load->view('V_motor', $data);
		}

		public function getCicil(){
			$this->curl->http_header("X-Nim", "1702019");
			$data['cicil'] = json_decode($this->curl->simple_get($this->API.'/cicil'));
			// $this->curl->debug();
			$this->load->view('V_cicil', $data);
		}

		public function getUangMuka(){
			$this->curl->http_header("X-Nim", "1702019");
			$data['uangmuka'] = json_decode($this->curl->simple_get($this->API.'/uangmuka'));
			// $this->curl->debug();
			$this->load->view('V_uangmuka', $data);
		}

		public function getPenjualan(){
			$this->curl->http_header("X-Nim", "1702019");
			$data['penjualan'] = json_decode($this->curl->simple_get($this->API.'/penjualan'));
			// $this->curl->debug();
			$this->load->view('V_penjualan', $data);
		}

		// proses untuk menambah data
		// insert data kontak

		function add(){
			$this->curl->http_header("X-Nim", "1702019");
			$data = array(
				'id'      =>  $this->input->post('id'),
				'id_motor'    =>  $this->input->post('id_motor'),
				'id_cicil'	  =>  $this->input->post('id_cicil'),
				'id_uang_muka' =>  $this->input->post('id_uang_muka'),
				'cicilan_pokok' =>  $this->input->post('cicilan_pokok'),
				'cicilan_bunga' =>  $this->input->post('cicilan_bunga'),
				'cicilan_total'	  =>  $this->input->post('cicilan_total'));
			// $this->load->model('MKaryawan');
			// $insert = $this->MKaryawan->save($array_item);
			$insert =  $this->curl->simple_post($this->API.'/penjualan', $data, array(CURLOPT_BUFFERSIZE => 0));

			if($insert)
			{
				$this->session->set_flashdata('hasil','Insert Data Berhasil');
			}else
			{
				$this->session->set_flashdata('hasil','Insert Data Gagal');
			}

			redirect('C_Motor/getPenjualan');

		}


		// proses untuk menghapus data pada database
		function delete($id_penjualan){
			$this->curl->http_header("X-Nim", "1702019");

			if(empty($id_penjualan)){
				redirect('C_Motor/getPenjualan');
			}else{
				$delete =  $this->curl->simple_delete($this->API.'/penjualan', array('id_penjualan'=>$id_penjualan), array(CURLOPT_BUFFERSIZE => 10));
				if($delete)
				{
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else
				{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}

				redirect('C_Motor/getPenjualan');
			}
		}

		//TUGAS : bikin fungsi update di client menggunakan service
		//
		//
		function edit($id){

			$data = array(
				'id'      =>  $id,
				'name'    =>  $this->input->post('name'),
				'email'	  =>  $this->input->post('email'),
				'address' =>  $this->input->post('address'),
				'phone'	  =>  $this->input->post('phone'));
			$update =  $this->curl->simple_put($this->API.'/Karyawan', $data, array(CURLOPT_BUFFERSIZE => 0));

			if($update)
			{
				$this->session->set_flashdata('hasil','Update Data Berhasil');
			}else
			{
				$this->session->set_flashdata('hasil','Update Data Gagal');
			}

			redirect('C_Motor');
		}

		function join()
		{
			$data['karyawan'] = json_decode($this->curl->simple_get($this->API.'/Karyawan/Join'));
			$this->load->view('V_join', $data);
		}
	}
