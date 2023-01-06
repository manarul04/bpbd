<?php

namespace App\Controllers;

use App\Models\BantuanModel;

class Bantuan extends BaseController
{
    public function index()
    {
        $model = db_connect()->table('v_bantuan');
        $data['bantuan'] = $model->get()->getResultArray();
        $kejadian = db_connect()->table('v_kejadian');
        $data['kejadian'] = $kejadian->get()->getResultArray();
        $jenisbantuan = db_connect()->table('jenisbantuan');
        $data['jenisbantuan'] = $jenisbantuan->get()->getResultArray();
        return view('admin/bantuan', $data);
    }

    public function tambah_bantuan()
    {
        $model = new BantuanModel();
        $model->insert([
            'bantuan'       => $_POST['bantuan'],
            'tanggal'       => $_POST['tanggal'],
            'jenis_bantuan' => $_POST['jenis_bantuan'],
            'id_kejadian'   => $_POST['id_kejadian'],
        ]);
        session()->setFlashdata('success', 'Berhasil disimpan');
        return redirect()->to(base_url() . "/admin/bantuan");
    }

    public function edit_bantuan()
    {
        $model = new BantuanModel();
        $model->update($_POST['id_bantuan'],
            [
                'bantuan' => $_POST['bantuan']
            ]
        );
        session()->setFlashdata('success', 'Berhasil diedit');
        return redirect()->to(base_url() . "/admin/bantuan");
    }

    public function hapus_bantuan()
    {
        $model = new BantuanModel();
        $model->delete($_POST['id_bantuan']);
        session()->setFlashdata('success', 'Berhasil dihapus');
        return redirect()->to(base_url() . "/admin/bantuan");
    }
}
