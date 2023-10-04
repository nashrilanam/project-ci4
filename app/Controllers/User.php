<?php

namespace App\Controllers;

use App\Models\BencanaModel;

class User extends BaseController
{

    protected $session;
    protected $bencanaModel;
    public function __construct()
    {
        $this->session = session();
        $this->bencanaModel = new BencanaModel();
    }
    
    public function new()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Tambah Data Bencana Alam',
            'validation' => \Config\Services::validation()
        ];

        return view('user/new', $data);
    }

    public function lihat()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }

        $bencana = $this->bencanaModel->findAll();

        $data = [
            'title' => 'Data Bencana Alam',
            'bencana' => $bencana
        ];

        return view('user/lihat', $data);
    }

    public function dashboard()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Dashboard',
        ];

        return view('user/dashboard', $data);
    }
    
}