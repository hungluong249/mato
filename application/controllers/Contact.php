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

}