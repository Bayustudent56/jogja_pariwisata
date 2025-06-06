<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Anda bisa menambahkan logika lain di sini nanti
        return view('admin.dashboard'); // Kita akan membuat view ini sebentar lagi
    }
}