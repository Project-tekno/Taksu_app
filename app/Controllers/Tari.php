<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Tari extends BaseController
{
    function __construct()
    {
        $this->model = new \App\Models\ModelTari();
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('Tari');
    }

    public function edit($id)
    {
        return json_encode($this->model->find($id));
    }
    public function simpan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'sanggar' => [
                'label' => 'Sanggar',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
            'tari' => [
                'label' => 'Tari',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
            'durasi' => [
                'label' => 'Durasi',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],

        ];






        // $validasi->setRules($aturan);

        // if ($validasi->withRequest($this->request)->run()) {
        $id = $this->request->getPost('id_tari');
        $sanggar = $this->request->getPost('sanggar');
        $tari = $this->request->getPost('tari');
        $harga = $this->request->getPost('harga');
        $durasi = $this->request->getPost('durasi');
        $namaGambar = $this->request->getPost('gambar');



        $data = [
            'id_tari' => $id,
            'sanggar' => $sanggar,
            'tari' => $tari,
            'harga' => $harga,
            'durasi' => $durasi,
            'gambar' => $namaGambar
        ];

        $this->model->save($data);



        $hasil['sukses'] = "Input Berhasil";
        $hasil['error'] = true;
        // } else {
        //     $hasil['sukses'] = false;
        //     $hasil['error'] = $validasi->listErrors();
        // }


        return json_encode($hasil);
    }
    public function index()
    {
        $jumlahBaris = 10;
        $data['dataSanggar'] = $this->model->orderBy('id_tari', 'desc')->paginate($jumlahBaris);
        $data['pager'] = $this->model->pager;
        $data['nomor'] = ($this->request->getVar('page') == 1) ? '0' : $this->request->getVar('page');
        return view('sanggar/tambahtari', $data);
    }
}
