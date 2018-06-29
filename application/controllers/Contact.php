<?php

include "class.phpmailer.php"; 
include "class.smtp.php"; 

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {
    

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $this->load->helper('form');
        $this->render('contact_view');
    }
    
    public function send_mail() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('contact_name', 'Your name', 'trim|required');
        $this->form_validation->set_rules('contact_email', 'Your email', 'trim|required|valid_email');
        $this->form_validation->set_rules('contact_phone', 'Your phone number', 'trim|required|numeric');
        
        if($this->form_validation->run() == FALSE){
            $this->render('contact_view');
        }else{
            if($this->input->post()){

               $mail = new PHPMailer();

                $mail->IsSMTP(); // set mailer to use SMTP
                $mail->Host = "smtp.gmail.com"; // specify main and backup server
                $mail->Port = 465; // set the port to use
                $mail->SMTPAuth = true; // turn on SMTP authentication
                $mail->SMTPSecure = 'ssl';

                $mail->Username = "matomailfrom@gmail.com"; // your SMTP username or your gmail username
                $mail->Password = "qpnitgdwirwrreim"; // your SMTP password or your gmail password
                $from = "matomailfrom@gmail.com"; // Reply to this email
                $to = "hello@matocreative.vn"; // Recipients email ID
                $name = 'WEBMAIL'; // Recipient's name
                $mail->From = $from;
                $mail->FromName = $name; // Name to indicate where the email came from when the recepient received
                $mail->AddAddress($to, $name);
                $mail->CharSet = 'UTF-8';
                $mail->AddReplyTo($from);
                $mail->WordWrap = 50; // set word wrap
                $mail->IsHTML(true); // send as HTML
                $mail->Subject = "[matocreative.vn] Email from website ";

                $message = '<html><body>';
                $message .= '<p>Dude, you got mail, let\'s check it now:</p>';
                $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
                $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($this->input->post('contact_name')) . "</td></tr>";
                $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($this->input->post('contact_email')) . "</td></tr>";
                $message .= "<tr><td><strong>Type of Change:</strong> </td><td>" . strip_tags($this->input->post('contact_phone')) . "</td></tr>";
                $message .= "<tr><td><strong>Urgency:</strong> </td><td>" . htmlentities($this->input->post('contact_content')) . "</td></tr>";
                $message .= "</table>";
                $message .= "</body></html>";

                $mail->Body = $message; //HTML Body
                
                try{
                    $mail->Send();
                    $this->session->set_flashdata('message', 'Send mail successfully');
                    redirect('contact', 'refresh');
                }catch(Exception $e){
                    $this->session->set_flashdata('message', '<h1>Oops, Error: "'. $mail->ErrorInfo . '</h1>');
                    redirect('contact', 'refresh');
                }
            }
        }
    }

    public function register_project(){
        $this->load->model('register_project_model');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('request_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('request_position', 'Position', 'trim|required');
        $this->form_validation->set_rules('request_company', 'Company', 'trim|required');
        $this->form_validation->set_rules('request_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('request_phone', 'Phone', 'trim|required|numeric');
        $this->form_validation->set_rules('request_service', 'Service', 'trim|required');
        $this->form_validation->set_rules('request_budget', 'Budget', 'required');
        $this->form_validation->set_rules('request_timeline', 'Timeline', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['check'] = true;
            $this->render('contact_view');
        } else {
            if($this->input->post()){
                $data = array(
                    'name' => $this->input->post('request_name'),
                    'position' => $this->input->post('request_position'),
                    'company' => $this->input->post('request_company'),
                    'email' => $this->input->post('request_email'),
                    'phone' => $this->input->post('request_phone'),
                    'service' => $this->input->post('request_service'),
                    'price' => $this->input->post('request_budget'),
                    'time' => $this->input->post('request_timeline'),
                    'plan' => $this->input->post('request_plan'),
                    'created' => date("Y-m-d H:i:s")
                );
                $insert = $this->register_project_model->insert($data);
                if($insert){
                    $this->session->set_flashdata('message', 'Register project successfully');
                    redirect('contact','refresh');
                }
            }
        }
    }

}