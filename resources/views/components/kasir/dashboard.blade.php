@extends('layouts.kasirLayout')

@section('mainContent')
<div class="my-best-product">
    <span class="my-primary-color">Best Product</span>
    <div class="my-card-view">
        <div class="my-card">
            <img src="{{asset('assets/images/baju.png')}}" width="64px">
            <span>Baju</span>
        </div>
        <div class="my-card">
            <img src="{{asset('assets/images/jaket.png')}}" width="64px">
            <span>Jaket</span>
        </div>
        <div class="my-card">
            <img src="{{asset('assets/images/kaoskaki.png')}}" width="64px">
            <span>Celana</span>
        </div>
        <div class="my-card">
            <img src="{{asset('assets/images/bedcover.png')}}" width="64px">
            <span>Bedcover</span>
        </div>
        <div class="my-card">
            <img src="{{asset('assets/images/sepatu.png')}}" width="64px">
            <span>Sepatu</span>
        </div>
        <div class="my-card">
            <img src="{{asset('assets/images/karpet.png')}}" width="64px">
            <span>Karpet</span>
        </div>
    </div>
</div>
<div class="my-history-transaction">
    <span class="my-primary-color">History Transaksi</span>
    <table id="tableHistoryTransaction" class="table is-fullwidth">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Kode Invoice</th>
                <th>Outlet</th>
                <th>Member</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody id="bodyHistoryTransaction">
            
        </tbody>
    </table>
</div>
@endsection