<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap2 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: PUT, GET, POST");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

		$params = array('server_key' => 'SB-Mid-server-LgQ3iuXIFPxc0efEaP2oHHTJ', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
		$this->load->model('History_model');
	}

	public function index()
	{
		$this->load->view('midtrans/checkout_snap');
	}

	public function token()
	{
		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $this->input->post('gross_amount') // no decimal allowed for creditcard
		);
		$order_id = $transaction_details['order_id'];

		$this->session->set_userdata(array('idHistory' => $order_id));

		$item_details = array(
			'id' => $order_id,
			'price' => $this->input->post('price'),
			'quantity' => '1',
			'name' => 'Top-Up GP'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $this->input->post('nama'),
			'email'         => $this->input->post('email'),
			'phone'         => $this->input->post('phone'),
		);
		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;
		$enable_payments = array('bank_transfer');

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'days',
			'duration'  => 2
		);

		$transaction_data = array(
			'enabled_payments' => $enable_payments,
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		// $result = json_decode($this->input->post('result_data')); 
		// print_r($result);
		$this->data['finish'] = json_decode($this->input->post('result_data'));
		$this->load->view('konfirmasi', $this->data);
	}
}
