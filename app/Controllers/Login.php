<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    protected $module;
    public function __construct()
    {
        $this->module =  "login";
    }

    public function index()
    {
        $session = session();
        if ($session->get("logged_in"))
            return redirect()->to(site_url("sanggar"));

        $data = array(
            "title" => "Login",
            "module" => $this->module,
            "view" => "$this->module/vw_index",
            "data" => array()
        );

        return view('templates/vw_template_portal_login', $data);
    }

    public function acLogin()
    {
        $session = \Config\Services::session();
        $post = $this->request->getVar();

        $model = new \App\Models\LoginSanggar();
        $get = $model->where("username", $post["username"])->first();

        if ($get != "") {
            // $hash = base64_encode(sha1($post["password"] . $get["salt"], true) . $get["salt"]);
            if ($get["password"] == $post["password"]) {
                $data_session = array(
                    "id_sanggar" => $get["id_sanggar"],

                    "logged_in" => true
                );

                $session->set($data_session);

                $data = array(
                    "success" => true,
                    "message" => "Login Sukses,anda akan masuk ke halaman admin dalam 5 detik. . .",
                    "url" => site_url("sanggar"),
                );
            } else {
                $data = array(
                    "success" => false,
                    "message" => "Login gagal, password salah!",
                );
            }
        } else {
            $data = array(
                "success" => false,
                "message" => "Login gagal, username tidak ditemukan!"
            );
        }

        $data["csrf"] = csrf_hash();

        return $this->response->setJSON($data);
    }

    public function acLogout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to(site_url('login'));
    }
}
