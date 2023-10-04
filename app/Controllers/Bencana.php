<?php

namespace App\Controllers;

use App\Models\BencanaModel;

class Bencana extends BaseController
{

    protected $session;
    protected $bencanaModel;
    public function __construct()
    {
        $this->session = session();
        $this->bencanaModel = new BencanaModel();
    }

    public function save()
    {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }

        // validation
        if (!$this->validate([
            'nama_bencana' => [
                'rules' => 'required',
            ],
            'keterangan' => [
                'rules' => 'required',
            ],
            'waktu' => [
                'rules' => 'required',
            ],
            'rekomendasi' => [
                'rules' => 'required',
            ]
        ])) {   
            $validation = \Config\Services::validation();
            return redirect()->to('/user/bencana/new')->withInput()-> with('validation', $validation);
        }

        $this->bencanaModel->save([
            'nama_bencana' => $this->request->getVar('nama_bencana'),
            'keterangan' => $this->request->getVar('keterangan'),
            'waktu' => $this->request->getVar('waktu'),
            'rekomendasi' => $this->request->getVar('rekomendasi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/user/bencana/new');
    }

    public function saveadmin()
    {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }

        // validation
        if (!$this->validate([
            'nama_bencana' => [
                'rules' => 'required',
            ],
            'keterangan' => [
                'rules' => 'required',
            ],
            'waktu' => [
                'rules' => 'required',
            ],
            'rekomendasi' => [
                'rules' => 'required',
            ]
        ])) {   
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/tambah/bencana')->withInput()-> with('validation', $validation);
        }

        $this->bencanaModel->save([
            'nama_bencana' => $this->request->getVar('nama_bencana'),
            'keterangan' => $this->request->getVar('keterangan'),
            'waktu' => $this->request->getVar('waktu'),
            'rekomendasi' => $this->request->getVar('rekomendasi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/admin');
    }

    public function delete($id)
    {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }


        $this->bencanaModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin');
    }

    public function edit($id)
    {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Edit Data Bencana Alam',
            'validation' => \Config\Services::validation(),
            'bencana' => $this->bencanaModel->getBencana($id)
        ];

        return view('admin/edit', $data);
    }

    public function update($id) {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }

        // validation
        if (!$this->validate([
            'nama_bencana' => [
                'rules' => 'required',
            ],
            'keterangan' => [
                'rules' => 'required',
            ],
            'waktu' => [
                'rules' => 'required',
            ],
            'rekomendasi' => [
                'rules' => 'required',
            ]
        ])) {   
            $validation = \Config\Services::validation();
            return redirect()->to('/bencana/edit/' . $id)->withInput()-> with('validation', $validation);
        }

        $this->bencanaModel->save([
            'id' => $id,
            'nama_bencana' => $this->request->getVar('nama_bencana'),
            'keterangan' => $this->request->getVar('keterangan'),
            'waktu' => $this->request->getVar('waktu'),
            'rekomendasi' => $this->request->getVar('rekomendasi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/admin');
    }

}
