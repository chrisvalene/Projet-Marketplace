<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.tab_bord_admin');  // Vue pour le tableau de bord admin
    }
}
