@extends('layouts.adminLayout')

@section('mainContent')
<div class="my-best-product">
    <span class="my-primary-color">Best Product</span>
    <div class="my-card-view">
        <div class="my-card">
            <img src="{{asset('assets/images/baju.png')}}" width="64px">
            <span>Baju</span>
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
        <div class="my-card">
            <img src="{{asset('assets/images/karpet.png')}}" width="64px">
            <span>Karpet</span>
        </div>
        <div class="my-card">
            <img src="{{asset('assets/images/karpet.png')}}" width="64px">
            <span>Karpet</span>
        </div>
    </div>
</div>
@endsection