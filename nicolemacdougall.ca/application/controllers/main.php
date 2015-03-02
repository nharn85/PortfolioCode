<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
//        $this->load->library('recaptcha');
        //$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
//        $data['page'] = 'main/index';

    }

    public function index()
    {
        $this->load->library('recaptcha');

        $data = array(
            'widget' => $this->recaptcha->getWidget(),
            'script' => $this->recaptcha->getScriptTag()
        );

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('includes/main_content');
        $this->load->view('includes/contact', $data);
        $this->load->view('includes/footer');

    }

    public function recaptcha()
    {
        // load from spark tool
        //$this->load->spark('recaptcha-library/1.0.1');
        // load from CI library
        $this->load->library('recaptcha');

        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {
                echo "You got it!";
            }
        }

        $data = array(
            'widget' => $this->recaptcha->getWidget(),
            'script' => $this->recaptcha->getScriptTag(),
        );
        $this->load->view('recaptcha', $data);
    }

    public function sendMail()
    {
        $this->load->library('form_validation');
        $this->load->library('email');


//        $this->recaptcha->recaptcha_check_answer();

        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);

        if (isset($_POST['send']) && $response['success']) {
            if (empty($_POST['inputName'])) {
                $this->session->set_flashdata('error', 'Please enter your name.');

                $this->session->set_userdata('inputName', $_POST['inputName']);
                $this->session->set_userdata('inputEmail', $_POST['inputEmail']);
                $this->session->set_userdata('inputPhone', $_POST['inputPhone']);
                $this->session->set_userdata('inputMessage', $_POST['inputMessage']);

                redirect(base_url() . '#contact');

            } elseif (empty($_POST['inputEmail']) || (isset($_POST['inputEmail']) && !valid_email($_POST['inputEmail']))) {
                    $this->session->set_flashdata('error', 'Please enter a valid e-mail.');

                    $this->session->set_userdata('inputName', $_POST['inputName']);
                    $this->session->set_userdata('inputEmail', $_POST['inputEmail']);
                    $this->session->set_userdata('inputPhone', $_POST['inputPhone']);
                    $this->session->set_userdata('inputMessage', $_POST['inputMessage']);

                    redirect(base_url() . '#contact');

            } elseif (isset($_POST['inputPhone'])) {
                $regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";
                $validPhone = preg_match($regex, $_POST['inputPhone']);
                if ($validPhone == 0) {
                    $this->session->set_flashdata('error', 'Please enter a valid phone number. (Ex. 555-555-5555)');

                    $this->session->set_userdata('inputName', $_POST['inputName']);
                    $this->session->set_userdata('inputEmail', $_POST['inputEmail']);
                    $this->session->set_userdata('inputPhone', $_POST['inputPhone']);
                    $this->session->set_userdata('inputMessage', $_POST['inputMessage']);

                    redirect(base_url() . '#contact');

                } elseif (empty($_POST['inputMessage'])) {
                    $this->session->set_flashdata('error', 'Please enter a message.');

                    $this->session->set_userdata('inputName', $_POST['inputName']);
                    $this->session->set_userdata('inputEmail', $_POST['inputEmail']);
                    $this->session->set_userdata('inputPhone', $_POST['inputPhone']);
                    $this->session->set_userdata('inputMessage', $_POST['inputMessage']);

                    redirect(base_url() . '#contact');
                } else {
                    //create and send email
                    $this->email->from($_POST['inputEmail'], $_POST['inputName']);
                    $this->email->to('me@nicolemacdougall.ca');
                    $this->email->subject('Email From Nicolemacdougall.ca');
                    $this->email->message("Phone: " . $_POST['inputPhone'] . "\r\n\r\n Message: " . $_POST['inputMessage']);

                    $success = $this->email->send();

                    $this->session->set_userdata('success', $success);

                    //if message sent, send reply email
                    if ($this->session->userdata('success') && $this->session->userdata('success') == true) {
                        $this->email->from("Nicole MacDougall", 'me@nicolemacdougall.ca');
                        $this->email->to($_POST['inputEmail']);
                        $this->email->subject('Thanks for your email!');
                        $this->email->message("Hi there!\r\n\r\nThanks for the message! I will reply to you as soon as possible.\r\nHave a great day! \r\n\r\nSincerely, \r\n Nicole MacDougall");

                        $this->email->send();

                        $this->session->set_flashdata('success', 'Message sent!');

                        $this->session->unset_userdata('inputName');
                        $this->session->unset_userdata('inputEmail');
                        $this->session->unset_userdata('inputPhone');
                        $this->session->unset_userdata('inputMessage');
                        unset($_POST);

                        redirect(base_url() . '#contact');
                    }
                }
            }
        } else {
            if ($response['success'] != true) {
                    $this->session->set_userdata('inputName', $_POST['inputName']);
                    $this->session->set_userdata('inputEmail', $_POST['inputEmail']);
                    $this->session->set_userdata('inputPhone', $_POST['inputPhone']);
                    $this->session->set_userdata('inputMessage', $_POST['inputMessage']);

                    $this->session->set_flashdata('error', 'Incorrect Captcha, please try again.');
                    redirect(base_url() . '#contact');
            }
        } //end outer if
    }//end sendMail




    public function personalPortfolio()
    {
        $this->load->view('includes/portfolioHeader');
        $this->load->view('includes/portfolioNav');

        $this->load->view('personalPortfolio');

        $this->load->view ('includes/portfolioContact');
        $this->load->view('includes/portfolioFooter');
    }

    public function personalBranding()
    {
        $this->load->view('includes/portfolioHeader');
        $this->load->view('includes/portfolioNav');

        $this->load->view('personalBranding');

        $this->load->view ('includes/portfolioContact');
        $this->load->view('includes/portfolioFooter');
    }

    public function trailerRatingApp()
    {
        $this->load->view('includes/portfolioHeader');
        $this->load->view('includes/portfolioNav');

        $this->load->view('trailerRatingApp');

        $this->load->view ('includes/portfolioContact');
        $this->load->view('includes/portfolioFooter');
    }

    public function quizzerApp()
    {
        $this->load->view('includes/portfolioHeader');
        $this->load->view('includes/portfolioNav');

        $this->load->view('quizzerApp');

        $this->load->view ('includes/portfolioContact');
        $this->load->view('includes/portfolioFooter');
    }

    public function fictionalPubSite()
    {
        $this->load->view('includes/portfolioHeader');
        $this->load->view('includes/portfolioNav');

        $this->load->view('fictionalPubSite');

        $this->load->view ('includes/portfolioContact');
        $this->load->view('includes/portfolioFooter');
    }

    public function chinookMusicStore()
    {
        $this->load->view('includes/portfolioHeader');
        $this->load->view('includes/portfolioNav');

        $this->load->view('chinookMusicStore');

        $this->load->view ('includes/portfolioContact');
        $this->load->view('includes/portfolioFooter');
    }



}

/* End of file main.php */
/* Location: ./application/controllers/main.php */