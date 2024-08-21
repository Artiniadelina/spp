<?php namespace App\Controllers;

use CodeIgniter\Controller;

class AdminHome extends Controller
{
    public function index()
    {
        if (!session()->get('logged_in') || session()->get('level') !== 'admin') {
            return redirect()->to('/login');
        }
        return view('admin_home'); // Update with the path to your admin home view
    }
}
