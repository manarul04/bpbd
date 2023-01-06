<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        $model = new KategoriModel();
        $data['kategori'] = $model->findAll();
        return view('admin/kategori', $data);
    }

    public function tambah_kategori()
    {
        $model = new KategoriModel();
        $model->insert(['kategori' => $_POST['kategori']]);
        session()->setFlashdata('success', 'Berhasil disimpan');
        return redirect()->to(base_url() . "/admin/kategori");
    }

    public function edit_kategori()
    {
        $model = new KategoriModel();
        $model->update($_POST['id_kategori'],
            [
                'kategori' => $_POST['kategori']
            ]
        );
        session()->setFlashdata('success', 'Berhasil diedit');
        return redirect()->to(base_url() . "/admin/kategori");
    }

    public function hapus_kategori()
    {
        $model = new KategoriModel();
        $model->delete($_POST['id_kategori']);
        session()->setFlashdata('success', 'Berhasil dihapus');
        return redirect()->to(base_url() . "/admin/kategori");
    }
}
