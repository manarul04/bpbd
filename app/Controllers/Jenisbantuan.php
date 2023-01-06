<?php

namespace App\Controllers;

use App\Models\JenisbantuanModel;

class Jenisbantuan extends BaseController
{
    public function index()
    {
        $model = new JenisbantuanModel();
        $data['jenisbantuan'] = $model->findAll();
        return view('admin/jenisbantuan', $data);
    }

    public function tambah_jenisbantuan()
    {
        $model = new JenisbantuanModel();
        $model->insert(['jenisbantuan' => $_POST['jenisbantuan']]);
        session()->setFlashdata('success', 'Berhasil disimpan');
        return redirect()->to(base_url() . "/admin/jenisbantuan");
    }

    public function edit_jenisbantuan()
    {
        $model = new JenisbantuanModel();
        $model->update($_POST['id_jenisbantuan'],
            [
                'jenisbantuan' => $_POST['jenisbantuan']
            ]
        );
        session()->setFlashdata('success', 'Berhasil diedit');
        return redirect()->to(base_url() . "/admin/jenisbantuan");
    }

    public function hapus_jenisbantuan()
    {
        $model = new JenisbantuanModel();
        $model->delete($_POST['id_jenisbantuan']);
        session()->setFlashdata('success', 'Berhasil dihapus');
        return redirect()->to(base_url() . "/admin/jenisbantuan");
    }
}
