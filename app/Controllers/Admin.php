<?php

namespace App\Controllers;

use App\Models\BencanaModel;

class Admin extends BaseController
{

    protected $bencanaModel;
    protected $session;
    protected $userModel;
    public function __construct()
    {
        $this->bencanaModel = new BencanaModel();
        $this->session = session();
    }

    public function index(): string
    {

        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }

        $bencana = $this->bencanaModel->findAll();

        $data = [
            'title' => 'Data Bencana Alam',
            'bencana' => $bencana
        ];

        return view('admin/index', $data);
    }

    public function tambah_bencana()
    {

        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Tambah Bencana Alam',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/tambah', $data);
    }

}
