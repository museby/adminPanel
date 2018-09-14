<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_roles extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "user_roles";

        $this->load->model("user_role_model");
    }

    public function index()
	{
	    $viewData = new stdClass();

        $items = $this->user_role_model->get_all(
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

        $this->form_validation->set_rules("title","Başlık","required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b>  alanı doldurulmalıdır"
            )
        );

        $validate = $this->form_validation->run();

        if ($validate) {

            $insert = $this->user_role_model->add(
                array(
                    "title"            => $this->input->post("title"),
                    "permissions"      => 1,
                    "rank"             => 1,
                    "status"           => 1
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
            redirect(base_url("user_roles"));

        } else {
            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error    = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id) {

	    $item = $this->user_role_model->get(
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

        $this->form_validation->set_rules("title","Başlık","required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b>  alanı doldurulmalıdır"
            )
        );

        $validate = $this->form_validation->run();

        if ($validate) {

            $update = $this->user_role_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "title"            => $this->input->post("title"),
                    "permissions"      => 1
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
            redirect(base_url("user_roles"));

        } else {
            $viewData = new stdClass();

            $item = $this->user_role_model->get(
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
        $delete = $this->user_role_model->delete(
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
        redirect(base_url("user_roles"));
	}

	public function isActiveSetter($id) {

        if($id) {
            $status = ($this->input->post("data") === "true") ? 1 : 0;

            $this->user_role_model->update(
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

            $this->user_role_model->update(
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

    public function permissions_form($id)
    {

        $item = $this->user_role_model->get(
            array(
                "id" => $id
            )
        );

        $viewData = new stdClass();

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->subViewFolder = "permissions";
        $viewData->item          = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update_permissions($id) {

	    $permissions = json_encode($this->input->post("permissions"));

	    $update = $this->user_role_model->update(
	        array(
	            "id" => $id
            ),
	        array(
	            "permissions" => $permissions
            )
        );

        if ($update) {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text"  => "Yetki Tanımı başarılı bir şekilde yapıldı",
                "type"  => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text"  => "Yetki Tanımı sırasında bir problem oluştu",
                "type"  => "error"
            );
        }

        $this->session->set_flashdata("alert",$alert);
        redirect(base_url("user_roles/permissions_form/$id"));

    }

}
