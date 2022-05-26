@extends('layouts.admin-layout.master')

@section('title')
Dashboard
{{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
@endpush

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>Dashboard</h3>
@endslot
@endcomponent

<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Kick start your project development !</h5>
                </div>
                <div class="card-body">
                    <p>
                        Getting start with your project custom requirements using a ready template which is quite
                        difficult and time taking process, viho Admin provides useful features to kick start your
                        project development with no efforts
                        !
                    </p>
                    <ul>
                        <li>
                            <p>viho Admin provides you getting start pages with different layouts, use the layout as per
                                your custom requirements and just change the branding, menu & content.</p>
                        </li>
                        <li>
                            <p>Every components in viho Admin are decoupled, it means use only components you actually
                                need! Remove unnecessary and extra code easily just by excluding the path to specific
                                SCSS, JS file.</p>
                        </li>
                        <li>
                            <p>
                                It use PUG as template engine to generate pages and whole template quickly using node
                                js. Save your time for doing the common changes for each page (i.e menu, branding and
                                footer) by generating template with
                                pug.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @livewire('chartdashboard')
    </div>
</div>


<script type="text/javascript">
    var body = document.body;
        body.classList.add("dark-only");
</script>

@push('scripts')
@endpush
@endsection