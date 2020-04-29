<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
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
		//$gross =  $this->input->post('gross_amount');

		$item_details = $this->input->post('cart');

		//echo "<script>alert('" . $ . "')</script>";


		//$item_details = array();
		// Optional

		// $item_details = array();
		// for ($i = 1; $i <= count($cart); $i++) {
		// 	$row = array();
		// 	$row['id'] = $cart[$i]['id'];
		// 	$row['price'] = $cart[$i]['price'];
		// 	$row['quantity'] = $cart[$i]['quantity'];
		// 	$row['name'] = $cart[$i]['name'];
		// 	array_push($item_details, $row);
		// 	//array_push($item_details, $cart[$i]['id'], $cart[$i]['price'], $cart[$i]['quantity'], $cart[$i]['name']);
		// }


		//$item_details = $cart;
		// 'id' => $this->input->post('id'),
		// 'price' => $this->input->post('price'),
		// 'quantity' => $this->input->post('quantity'),
		// 'name' => $this->input->post('name'),

		// $item_details = array(

		// 	'id' => $cart[1]['id'],
		// 	'price' => $cart[1]['price'],
		// 	'quantity' => $cart[1]['quantity'],
		// 	'name' => $cart[1]['name']

		// 	// array(
		// 	// 	'id' => "m626",
		// 	// 	'price' => "20000",
		// 	// 	'quantity' => "3",
		// 	// 	'name' => "AK"
		// 	// )
		// );
		// $item1_details = array(
		// 	'id' => $this->input->post('id'),
		// 	'price' => $this->input->post('price'),
		// 	'quantity' => $this->input->post('quantity'),
		// 	'name' => $this->input->post('name');
		// )

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
