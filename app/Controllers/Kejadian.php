<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\KejadianModel;
use App\Models\LokasiModel;

class Kejadian extends BaseController
{
    public function index()
    {
        $model = db_connect()->table('v_kejadian');
        $data['kejadian'] = $model->get()->getResultArray();
        $modelKategori = new KategoriModel();
        $data['kategori'] = $modelKategori->findAll();
        $modelLokasi = new LokasiModel();
        $data['lokasi'] = $modelLokasi->findAll();
        return view('admin/kejadian', $data);
    }

    public function tambah_kejadian()
    {
        
        $upload = $this->request->getFile('dokumentasi');
		if ($upload->getName() == "") {
			$namaFile = "foto.jpg";
		} else {
			$namaFile =  "DOC-" . $_POST["kejadian"] . "-" . rand(1000, 9999) . ".jpg";
			$path = WRITEPATH . '../public/admin/img/dokumentasi/';
			$upload->move($path, $namaFile);
		}
        $model = new KejadianModel();
        $model->insert([
            'kejadian'    => $_POST['kejadian'],
            'id_kategori' => $_POST['id_kategori'],
            'tanggal'     => $_POST['tanggal'],
            'sebab'       => $_POST['sebab'],
            'akibat'      => $_POST['akibat'],
            'korban'      => $_POST['korban'],
            'upaya'       => $_POST['upaya'],
            'dokumentasi' => $namaFile,
        ]);
        session()->setFlashdata('success', 'Berhasil disimpan');
        return redirect()->to(base_url() . "/admin/kejadian");
    }

    public function edit_kejadian()
    {
        $model = new KejadianModel();
        $model->update($_POST['id_kejadian'],
            [
                'kejadian' => $_POST['kejadian']
            ]
        );
        session()->setFlashdata('success', 'Berhasil diedit');
        return redirect()->to(base_url() . "/admin/kejadian");
    }

    public function hapus_kejadian()
    {
        $model = new KejadianModel();
        $model->delete($_POST['id_kejadian']);
        session()->setFlashdata('success', 'Berhasil dihapus');
        return redirect()->to(base_url() . "/admin/kejadian");
    }
}
