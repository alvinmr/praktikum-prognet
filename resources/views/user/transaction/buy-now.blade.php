@extends('layouts.user-layout.master')

@section('content')
    @livewire('product-buy-now-livewire', ['product' => $product])
@endsection
