@extends('layouts.admin-layout.master')

@section('title')
    Layout dark
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
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head"
                                title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                            <pre><code class="language-html" id="example-head">&lt;!-- Cod Box Copy begin --&gt;
                                          &lt;p&gt;Getting start with your project custom requirements using a ready template which is quite difficult and time taking process, viho Admin provides useful features to kick start your project development with no efforts !&lt;/p&gt;
                                          &lt;ul&gt;
                                          &lt;li&gt;&lt;p&gt;viho Admin provides you getting start pages with different layouts, use the layout as per your custom requirements and just change the branding, menu & content.&lt;/p&gt;&lt;/li&gt;
                                          &lt;li&gt;&lt;p&gt;Every components in viho Admin are decoupled, it means use only components you actually need! Remove unnecessary and extra code easily just by excluding the path to specific SCSS, JS file.&lt;/p&gt;&lt;/li&gt;
                                          &lt;li&gt;&lt;p&gt;It use PUG as template engine to generate pages and whole template quickly using node js. Save your time for doing the common changes for each page (i.e menu, branding and footer) by generating template with pug.&lt;/p&gt;&lt;/li&gt;
                                          &lt;/ul&gt;
                                          &lt;!-- Cod Box Copy end --&gt;</code></pre>
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
