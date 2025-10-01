<?php
namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // cek apakah sudah login
        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('dashboard/index');
    }
}
