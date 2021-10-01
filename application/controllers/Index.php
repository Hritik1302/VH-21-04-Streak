<?php
defined('BASEPATH') or exit('No direct script access allowed');

class index extends CI_Controller
{
	public function index()
	{
		$this->load->view('index');
	}

	public function Login()
	{
		$this->load->view('login');
	}

	public function Register()
	{
		$this->load->view('register');
	}
}
