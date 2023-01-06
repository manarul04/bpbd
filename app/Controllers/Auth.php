<?php

namespace App\Controllers;

use App\Models\KajianModel;
use App\Models\PenggunaModel;
use App\Models\UserModel;
use App\Models\UserView;

class Auth extends BaseController
{
	public function index()
	{
		if(session('logged_in')!=null){
			return redirect()->to('/admin');
		}
		return view('login');
	}

	public function saveLogin()
	{
		$session = session();
		$model = new UserModel();
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$dataModel = $model->where('username', $username)->first();
		if ($dataModel) {
			$pass = $dataModel['password'];
			// $verify_pass = password_verify($password, $pass);
			if ($pass == $password) {
				$ses_data = [
					'id_user'     => $dataModel['id_user'],
					'username'    => $dataModel['username'],
					'level'       => $dataModel['level'],
					'nama'        => $dataModel['nama'],
					'logged_in'   => TRUE
				];
				$session->set($ses_data);
				session()->setFlashdata('success', 'Berhasil Login ' . $username);
				return redirect()->to('admin');
			} else {
				session()->setFlashdata('error', 'Password Salah');
				return redirect()->to('/login');
			}
		} else {
			session()->setFlashdata('error', 'Email Tidak Ditemukan');
			return redirect()->to('/login');
		}
	}

	public function register()
	{
		return view('register');
	}

	public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url().'/login');
    }

	//--------------------------------------------------------------------

}
