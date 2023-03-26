<?php

namespace App\Http\Controllers;

use App\Models\transactionModel;
use Barryvdh\DomPDF\Facade\PDF as PDF;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function logout() {
        return view('auth.login');
    }

    // Print
    public function printPDF() {
        $transaction = transactionModel::all();
        $pdf = PDF::loadView('components.pdf.transactionPDF', ['transaction' => $transaction->loadMissing('member:id,nama,alamat', 'user:id,nama')]);
    	return $pdf->stream('laporan-transaksi.pdf');
    }

    // Admin
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

    public function addTransactionAdmin() {
        return view('components.admin.addTransaction', ['title' => 'Add Transaction']);
    }

    public function editTransactionAdmin($id) {
        return view('components.admin.editTransaction', ['title' => 'Edit Transaction', 'id_transaksi' => $id]);
    }

    public function userAdmin() {
        return view('components.admin.user', ['title' => 'User']);
    }

    // Kasir 
    public function dashboardKasir() {
        return view('components.kasir.dashboard', ['title' => 'Dashboard']);
    }

    public function memberKasir() {
        return view('components.kasir.member', ['title' => 'Member']);
    }

    public function transactionKasir() {
        return view('components.kasir.transaction', ['title' => 'Transaction']);
    }

    public function addTransactionKasir() {
        return view('components.kasir.addTransaction', ['title' => 'Add Transaction']);
    }

    public function editTransactionKasir($id) {
        return view('components.kasir.editTransaction', ['title' => 'Edit Transaction', 'id_transaksi' => $id]);
    }
    
    // Kasir 
    public function dashboardOwner() {
        return view('components.owner.dashboard', ['title' => 'Dashboard']);
    }

    public function transactionOwner() {
        return view('components.owner.transaction', ['title' => 'Transaction']);
    }
}
