<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient extends MY_Controller
{
    public function index()
    {
        $this->load->view('patient_dashboard');
    }
}