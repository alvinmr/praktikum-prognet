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
                <li class="onhover-dropdown">
                    <div class="notification-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg>
                        @if (Auth::guard('admin')->user()->notifications->where('read_at',null)->count() != null)
                            <span class="dot-animated"></span>
                        @endif
                    </div>
                    <ul class="notification-dropdown onhover-show-div">
                        <li>
                            <p class="f-w-700 mb-0">Notification Admin
                                @if (Auth::guard('admin')->user()->notifications->where('read_at',null)->count() != null)
                                    <span class="pull-right badge badge-primary badge-pill">{{Auth::guard('admin')->user()->notifications->where('read_at',null)->count() }}</span>
                                @endif
                            </p>
                        </li>
                        @forelse (Auth::guard('admin')->user()->notifications->where('read_at',null) as $data)
                            <li class="noti-primary">
                                <div class="media">
                                    <div class="media-body">
                                        <p>{{$data->data}}</p><span>{{$data->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="noti-primary">
                                <div class="media">
                                    <div class="media-body text-center">
                                        <span>Belum Terdapat Notifikasi</span>
                                    </div>
                                </div>
                            </li>
                        @endforelse
                        @if (Auth::guard('admin')->user()->notifications->where('read_at',null)->count() != 0)
                            <li>
                                <a href="{{route('admin.mark-notifications')}}" class="text-light  f-w-700 mb-0">Tandai Semua Telah diBaca</a>
                            </li>
                        @endif
                    </ul>
                </li>
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
