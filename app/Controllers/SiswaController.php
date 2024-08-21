<?php namespace App\Controllers;

class SiswaController extends Controller
{
    public function __construct()
    {
        if (!session()->get('logged_in') || session()->get('role') !== 'siswa') {
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        // Halaman siswa
        return view('siswa_dashboard');
    }
}
