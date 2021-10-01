<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$this->load->view('login');
	}

	public function Register()
	{
		$this->load->view('register');
	}

	public function Dashboard()
	{
		$this->load->view('dashboard');
	}

	public function Add()
	{
		$this->load->view('add-item');
	}
}
