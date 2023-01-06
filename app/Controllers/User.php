<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['user'] = $model->findAll();
        return view('admin/user', $data);
    }

    public function tambah_user()
    {
        $model = new UserModel();
        $model->insert(
            [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'nama'     => $_POST['nama'],
                'level'    => $_POST['level'],
            ]);
        session()->setFlashdata('success', 'Berhasil disimpan');
        return redirect()->to(base_url() . "/admin/user");
    }

    public function edit_user()
    {
        $model = new UserModel();
        $model->update($_POST['id_user'],
            [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'nama'     => $_POST['nama'],
                'level'    => $_POST['level'],
            ]
        );
        session()->setFlashdata('success', 'Berhasil diedit');
        return redirect()->to(base_url() . "/admin/user");
    }

    public function hapus_user()
    {
        $model = new UserModel();
        $model->delete($_POST['id_user']);
        session()->setFlashdata('success', 'Berhasil dihapus');
        return redirect()->to(base_url() . "/admin/user");
    }
}
