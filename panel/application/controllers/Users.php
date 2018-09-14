<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users";

        $this->load->model("user_model");
    }

    public function index()
	{
	    $viewData = new stdClass();

        $items = $this->user_model->get_all();

	    $viewData->viewFolder    = $this->viewFolder;
	    $viewData->subViewFolder = "list";
	    $viewData->items         = $items;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

    public function new_form()
    {
        $viewData = new stdClass();

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("company_id","Firma","required|trim");
        $this->form_validation->set_rules("fullname","Ad Soyad","required|trim");
        $this->form_validation->set_rules("email","E-posta","required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("pass","Şifre","required|trim|min_length[6]|max_length[10]");
        $this->form_validation->set_rules("re_pass","Şifre Tekrarı","required|trim|min_length[6]|max_length[10]|matches[pass]");
        $this->form_validation->set_rules("tcno","Tc No","required|trim|is_unique[users.tcno]");
        $this->form_validation->set_rules("mobile_phone","Cep Telefonu","required|trim");
        $this->form_validation->set_rules("authority","Yetki","required|trim");
        $this->form_validation->set_rules("job","Meslek","required|trim");
        $this->form_validation->set_rules("duty","Görev","required|trim");
        $this->form_validation->set_rules("image","Fotoğraf","required|trim");

        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b>  alanı doldurulmalıdır",
                "valid_email"   => "Lütfen geçerli bir e-posta adresi giriniz",
                "is_unique"     => "<b>{field}</b> alanı daha önceden kullanılmış",
                "matches"       => "Girilen şifreler birbiri ile aynı değil",
                "min_length"    => "Tanımlanan şifre en az 6 karakterden oluşmalıdır",
                "max_length"    => "Tanımlanan şifre en az 10 karakterden oluşmalıdır",
            )
        );

        $validate = $this->form_validation->run();

        if ($validate) {

            $insert = $this->user_model->add(
                array(
                    "company_id"              => $this->input->post("company_id"),
                    "fullname"                => $this->input->post("fullname"),
                    "email"                   => $this->input->post("email"),
                    "pass"                    => $this->input->post("company_address"),
                    "tcno"                    => $this->input->post("tcno"),
                    "image"                   => $this->input->post("image"),
                    "mobile_phone"            => $this->input->post("mobile_phone"),
                    "authority"               => $this->input->post("authority"),
                    "job"                     => $this->input->post("job"),
                    "duty"                    => $this->input->post("duty"),
                    "last_login"              => date("Y-m-d H-i-s"),
                    "createdAt"               => date("Y-m-d H-i-s"),
                    "status"                  => 1
                )
            );

            if ($insert) {

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text"  => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text"  => "Kayıt sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }

            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("users"));

        } else {
            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error    = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id) {

	    $item = $this->user_model->get(
            array(
                "id" => $id
            )
        );
        $viewData = new stdClass();

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item          = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("company_id","Firma","required|trim");
        $this->form_validation->set_rules("fullname","Ad Soyad","required|trim");
        $this->form_validation->set_rules("email","E-posta","required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("pass","Şifre","required|trim|min_length[6]|max_length[10]");
        $this->form_validation->set_rules("re_pass","Şifre Tekrarı","required|trim|min_length[6]|max_length[10]|matches[pass]");
        $this->form_validation->set_rules("tcno","Tc No","required|trim|is_unique[users.tcno]");
        $this->form_validation->set_rules("mobile_phone","Cep Telefonu","required|trim");
        $this->form_validation->set_rules("authority","Yetki","required|trim");
        $this->form_validation->set_rules("job","Meslek","required|trim");
        $this->form_validation->set_rules("duty","Görev","required|trim");
        $this->form_validation->set_rules("image","Fotoğraf","required|trim");

        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b>  alanı doldurulmalıdır",
                "valid_email"   => "Lütfen geçerli bir e-posta adresi giriniz",
                "is_unique"     => "<b>{field}</b> alanı daha önceden kullanılmış",
                "matches"       => "Girilen şifreler birbiri ile aynı değil",
                "min_length"    => "Tanımlanan şifre en az 6 karakterden oluşmalıdır",
                "max_length"    => "Tanımlanan şifre en az 10 karakterden oluşmalıdır",
            )
        );

        $validate = $this->form_validation->run();

        if ($validate) {

            $update = $this->user_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "company_id"              => $this->input->post("company_id"),
                    "fullname"                => $this->input->post("fullname"),
                    "email"                   => $this->input->post("email"),
                    "pass"                    => $this->input->post("company_address"),
                    "tcno"                    => $this->input->post("tcno"),
                    "image"                   => $this->input->post("image"),
                    "mobile_phone"            => $this->input->post("mobile_phone"),
                    "authority"               => $this->input->post("authority"),
                    "job"                     => $this->input->post("job"),
                    "duty"                    => $this->input->post("duty"),
                    "last_login"              => date("Y-m-d H-i-s"),
                    "createdAt"               => date("Y-m-d H-i-s"),
                    "status"                  => 1
                )
            );

            if ($update) {

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text"  => "Güncelleme başarılı bir şekilde yapıldı",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text"  => "Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );

            }

            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("users"));

        } else {
            $viewData = new stdClass();

            $item = $this->user_model->get(
                array(
                    "id" => $id
                )
            );

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error    = true;
            $viewData->item          = $item;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete($id) {
        $delete = $this->user_model->delete(
            array(
                "id" => $id
            )
        );
        if ($delete) {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text"  => "Silme işlemi başarılı bir şekilde yapıldı",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "İşlem Başarısız",
                "text"  => "Silme işlemi sırasında bir problem oluştu",
                "type"  => "error"
            );

        }

        $this->session->set_flashdata("alert",$alert);
        redirect(base_url("users"));
	}

	public function isActiveSetter($id) {

        if($id) {
            $status = ($this->input->post("data") === "true") ? 1 : 0;

            $this->user_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "status" => $status
                )
            );
        }
    }

}