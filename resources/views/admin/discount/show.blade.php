@extends('layouts.admin-layout.master')

@section('title')
Courier Master
{{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
@endpush

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>Courier Master</h3>
@endslot
@endcomponent

<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Data Courier</h5>
                    <a href="{{url('admin/courier')}}" class="float-right btn btn-success btn-sm" >Back!</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="form-group">
                            <label class="col-md-12">Courier Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" id="courier" name="courier" value="{{ $courier->courier }}" readonly>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var body = document.body;
        body.classList.add("dark-only");
</script>

@push('scripts')
@endpush
@endsection