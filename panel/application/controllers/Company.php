<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "company";

        $this->load->model("company_model");
    }

    public function index()
	{
	    $viewData = new stdClass();

        $items = $this->company_model->get_all(
            array(), "rank ASC"
        );

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

        $this->form_validation->set_rules("company_name","Firma Adı","required|trim");
        $this->form_validation->set_rules("yds_user","YDS Kullanıcı Adı","required|trim");
        $this->form_validation->set_rules("yds_pass","YDS Kullanıcı Şifre","required|trim");
        $this->form_validation->set_rules("company_address","Firma Adresi","required|trim");
        $this->form_validation->set_rules("ydk_file_no","YDK Dosya No","required|trim");
        $this->form_validation->set_rules("activity_city","Faaliyet İli","required|trim");
        $this->form_validation->set_rules("authorized_person","Yetkili Kişi","required|trim");
        $this->form_validation->set_rules("authorized_person_title","Yetkili Kişi Ünvanı","required|trim");
        $this->form_validation->set_rules("authorized_person_tcno","Yetkili Kişi TC No","required|trim");
        $this->form_validation->set_rules("phone","Telefon","required|trim");
        $this->form_validation->set_rules("website","Web Adresi","required|trim");
        $this->form_validation->set_rules("email","E-posta","required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b>  alanı doldurulmalıdır"
            )
        );

        $validate = $this->form_validation->run();

        if ($validate) {

            $insert = $this->company_model->add(
                array(
                    "company_name"            => $this->input->post("company_name"),
                    "yds_user"                => $this->input->post("yds_user"),
                    "yds_pass"                => $this->input->post("yds_pass"),
                    "company_address"         => $this->input->post("company_address"),
                    "ydk_file_no"             => $this->input->post("ydk_file_no"),
                    "activity_city"           => $this->input->post("activity_city"),
                    "authorized_person"       => $this->input->post("yds_pass"),
                    "authorized_person_title" => $this->input->post("authorized_person"),
                    "authorized_person_tcno"  => $this->input->post("authorized_person_tcno"),
                    "phone"                   => $this->input->post("phone"),
                    "website"                 => $this->input->post("website"),
                    "email"                   => $this->input->post("email"),
                    "createdAt"               => date("Y-m-d H-i-s"),
                    "rank"                    => 1,
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
            redirect(base_url("company"));

        } else {
            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error    = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id) {

	    $item = $this->company_model->get(
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

        $this->form_validation->set_rules("company_name","Firma Adı","required|trim");
        $this->form_validation->set_rules("yds_user","YDS Kullanıcı Adı","required|trim");
        $this->form_validation->set_rules("yds_pass","YDS Kullanıcı Şifre","required|trim");
        $this->form_validation->set_rules("company_address","Firma Adresi","required|trim");
        $this->form_validation->set_rules("ydk_file_no","YDK Dosya No","required|trim");
        $this->form_validation->set_rules("activity_city","Faaliyet İli","required|trim");
        $this->form_validation->set_rules("authorized_person","Yetkili Kişi","required|trim");
        $this->form_validation->set_rules("authorized_person_title","Yetkili Kişi Ünvanı","required|trim");
        $this->form_validation->set_rules("authorized_person_tcno","Yetkili Kişi TC No","required|trim");
        $this->form_validation->set_rules("phone","Telefon","required|trim");
        $this->form_validation->set_rules("website","Web Adresi","required|trim");
        $this->form_validation->set_rules("email","E-posta","required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b>  alanı doldurulmalıdır"
            )
        );

        $validate = $this->form_validation->run();

        if ($validate) {

            $update = $this->company_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "company_name"            => $this->input->post("company_name"),
                    "yds_user"                => $this->input->post("yds_user"),
                    "yds_pass"                => $this->input->post("yds_pass"),
                    "company_address"         => $this->input->post("company_address"),
                    "ydk_file_no"             => $this->input->post("ydk_file_no"),
                    "activity_city"           => $this->input->post("activity_city"),
                    "authorized_person"       => $this->input->post("yds_pass"),
                    "authorized_person_title" => $this->input->post("authorized_person"),
                    "authorized_person_tcno"  => $this->input->post("authorized_person_tcno"),
                    "phone"                   => $this->input->post("phone"),
                    "website"                 => $this->input->post("website"),
                    "email"                   => $this->input->post("email")
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
            redirect(base_url("company"));

        } else {
            $viewData = new stdClass();

            $item = $this->company_model->get(
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
        $delete = $this->company_model->delete(
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
        redirect(base_url("company"));
	}

	public function isActiveSetter($id) {

        if($id) {
            $status = ($this->input->post("data") === "true") ? 1 : 0;

            $this->company_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "status" => $status
                )
            );
        }
    }

    public function rankSetter() {

	    $data = $this->input->post("data");

	    parse_str($data,$order);

	    $items = $order["ord"];

	    foreach ($items as $rank => $id){

            $this->company_model->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank" => $rank
                )
            );
        }

    }

}
