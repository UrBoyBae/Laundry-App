<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function logout() {
        return view('auth.login');
    }

    public function dashboardAdmin() {
        return view('components.admin.dashboard', ['title' => 'Dashboard']);
    }

    public function outletAdmin() {
        return view('components.admin.outlet', ['title' => 'Outlet']);
    }

    public function productAdmin() {
        return view('components.admin.product', ['title' => 'Product']);
    }

    public function memberAdmin() {
        return view('components.admin.member', ['title' => 'Member']);
    }

    public function transactionAdmin() {
        return view('components.admin.transaction', ['title' => 'Transaction']);
    }

    public function userAdmin() {
        return view('components.admin.user', ['title' => 'User']);
    }
}
