@extends('layouts.user-layout.master')

@section('content')
    <div class="mb-8">
        <!-- Shop-control-bar Title -->
        <div class="flex-center-between mb-3 mt-10">
            <h3 class="font-size-25 mb-0">Shop</h3>
        </div>
        @if (request()->input('search'))
            <div>
                Display Result for "{{ request()->input('search') }}"
            </div>
        @endif
        <!-- End shop-control-bar Title -->
        <!-- Shop-control-bar -->

        <!-- End Shop-control-bar -->
        <!-- Shop Body -->
        <!-- Tab Content -->


        @livewire('product-livewire', ['search' => request()->input('search')])
        <!-- End Shop Body -->

    </div>
@endsection
