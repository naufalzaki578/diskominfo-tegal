<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;

class HomeController extends Controller
{
    public function index()
    {
        $pengumumanTerbaru = Pengumuman::latest()->take(3)->get();

        return view('home', [
            'pengumumanTerbaru' => $pengumumanTerbaru,
        ]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}