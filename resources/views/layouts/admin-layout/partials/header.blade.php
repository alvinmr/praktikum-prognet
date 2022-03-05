<div class="page-main-header">
    <div class="main-header-right row m-0">
        <div class="main-header-left">
            <div class="logo-wrapper"><a href="{{ route('admin.index') }}"><img class="img-fluid"
                        src="{{ asset('assets/images/logo/logo.png') }}" alt=""></a></div>
            <div class="dark-logo-wrapper"><a href="{{ route('admin.index') }}"><img class="img-fluid"
                        src="{{ asset('assets/images/logo/dark-logo.png') }}" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle">
                </i></div>
        </div>
        <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>
                <form action="{{ route('admin.logout') }}" method="POST" id="form-logout">@csrf</form>
                <li class="onhover-dropdown p-0">
                    <button class="btn btn-primary-light" type="button"
                        onclick="document.getElementById('form-logout').submit()"><i data-feather="log-out"></i>Log
                        out</button>
                </li>
            </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
</div>