<?php namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $role = session()->get('role');
        return view('dashboard', ['role' => $role]);
    }
}
