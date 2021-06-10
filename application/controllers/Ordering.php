<?php
defined('BASEPATH') or exit('No direct script access allowed');

ERROR_REPORTING(E_ALL);
class Ordering extends CI_Controller
{

	public function index()
	{
		$this->load->model('Model_orders');
		$res = $this->Model_orders->view_beverages();

		$this->load->library('Pagination_bootstrap');

		$sqlBurger = $this->db->get('tblburgers');
		$sqlBeverages = $this->db->get('tblbeverages');
		$sqlComboDeals = $this->db->get('tblcombomeals');


		$this->pagination_bootstrap->offset(5);


		$data["burgerResult"] = $this->pagination_bootstrap->config("/Ordering/index", $sqlBurger);
		$data["result"] = $this->pagination_bootstrap->config("/Ordering/index", $sqlBeverages);
		$data["comboResult"] = $this->pagination_bootstrap->config("/Ordering/index", $sqlComboDeals);

		$this->load->view('header');

		$this->load->view('order', $data);

		$this->load->view('footer');
	}
	/**
	 * SUM(burgerPrice) AS burgerTotal,
	 * SUM(beveragesPrice) AS beveragesTotal,
	 * SUM(comboPrice) AS comboTotal,
	 * 
	 * **/
	public function OrderSummaryView()
	{
		$this->load->library('Pagination_bootstrap');

		$this->db->select("
				orderId,
				customer,
				burgerPrice,
				beveragesPrice,
				comboPrice,
				couponCode
		");

		$this->db->from("tblorders");

		$this->db->join("tblburgers", "tblorders.burgerId = tblburgers.burgerId", "inner");
		$this->db->join("tblbeverages", "tblorders.beveragesId = tblbeverages.beveragesId", "inner");
		$this->db->join("tblcombomeals", "tblorders.comboMealsId = tblcombomeals.comboMealsId", "inner");

		$this->db->order_by('orderId', 'asc');

		$sqlOrders = $this->db->get();


		$data["Order"] = $this->pagination_bootstrap->config("/Ordering/OrderSummaryView", $sqlOrders);

		$this->load->view('header');
		$this->load->view('orderSummary', $data);
		$this->load->view('footer');
	}

	#region Insert 
	public function insertBeverages()
	{

		foreach ($this->input->post('beveragesId') as $multipleBeveragesId) {

			$multipleBeverages = array(
				'beveragesId' => $multipleBeveragesId,
				'couponCode' => $this->input->post('txtCoupon')
			);

			$this->db->insert('tblorderView', $multipleBeverages);
		}
		redirect('Ordering/beverages');
	}

	public function insertOrders()
	{
		//$cust = "cust00"+ $str;
		$defCustomer = htmlentities('Cust' . mt_rand());
		$arrayOrders = array(
			'customer' => $defCustomer,
			'burgerId' => implode(",", $this->input->post('burgerId')),
			'beveragesId' => implode(",", $this->input->post('beveragesId')),
			'comboMealsId' => implode(",", $this->input->post('combomealsId')),
			'couponCode' => $this->input->post('txtCoupon')
		);

		$this->db->insert('tblorders', $arrayOrders);

		redirect('Ordering/OrderSummaryView');
	}
	#endregion

	#region Modal
	public function orderSummaryLoad($getId)
	{

		$this->load->library('Pagination_bootstrap');
		$this->db->select("
		tblorders.orderId,
		tblorders.customer,
		tblorders.burgerId,
				tblburgers.burgerDescription,
				tblburgers.burgerPrice,
				tblbeverages.beveragesDescription,
				tblbeverages.beveragesPrice,
				tblcombomeals.comboMeals,
				tblcombomeals.comboPrice,
				tblorders.couponCode
				");

		$this->db->from("tblorders");

		$this->db->join("tblburgers", "tblorders.burgerId = tblburgers.burgerId", "left");
		$this->db->join("tblbeverages", "tblorders.beveragesId = tblbeverages.beveragesId", "left");
		$this->db->join("tblcombomeals", "tblorders.comboMealsId = tblcombomeals.combomealsId", "left");
		$this->db->where("orderId", $getId);

		$this->db->order_by('orderId', 'asc');

		$sqlOrders = $this->db->get();

		$data["orders"] = $this->pagination_bootstrap->config("/Ordering/index", $sqlOrders);
		$data["title"] = "Summary of Orders";

		$this->load->view('viewOrderSummary', $data);
	}
	#endregion
}
