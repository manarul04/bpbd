<?php

namespace App\Controllers;

use App\Models\LokasiModel;

class Lokasi extends BaseController
{
    public function index()
    {
        $model = new LokasiModel();
        $data['lokasi'] = $model->findAll();
        return view('admin/lokasi', $data);
    }

    public function tambah_lokasi()
    {
        $model = new LokasiModel();
        $model->insert([
            'lokasi'    => $_POST['lokasi'],
            'desa'      => $_POST['desa'],
            'kecamatan' => $_POST['kecamatan'],
            'kota'      => $_POST['kota'],
            'rt'        => $_POST['rt'],
            'rw'        => $_POST['rw'],
        ]);
        session()->setFlashdata('success', 'Berhasil disimpan');
        return redirect()->to(base_url() . "/admin/lokasi");
    }

    public function edit_lokasi()
    {
        $model = new LokasiModel();
        $model->update(
            $_POST['id_lokasi'],
            [
                'lokasi' => $_POST['lokasi'],
                'lokasi'    => $_POST['lokasi'],
                'desa'      => $_POST['desa'],
                'kecamatan' => $_POST['kecamatan'],
                'kota'      => $_POST['kota'],
                'rt'        => $_POST['rt'],
                'rw'        => $_POST['rw'],
            ]
        );
        session()->setFlashdata('success', 'Berhasil diedit');
        return redirect()->to(base_url() . "/admin/lokasi");
    }
}
