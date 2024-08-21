<?php namespace App\Controllers;

class MuridHome extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $role = session()->get('role');
        return view('murid_home', ['role' => $role]);
    }
}
