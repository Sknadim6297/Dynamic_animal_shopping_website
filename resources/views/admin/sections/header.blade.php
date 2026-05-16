<div class="row">
    <!--== LOGO ==-->
    <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
        <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
        <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
        <a href="{{ route('admin.dashboard') }}" class="logo">
            @php $headerSettings = \App\Models\HeaderSettings::first(); @endphp
            @if($headerSettings && $headerSettings->logo_dark)
                <img src="{{ asset($headerSettings->logo_dark) }}" alt="Admin Logo" style="max-height: 50px; width: auto;" />
            @else
                <img src="{{ asset('frontend/assets/images/logo_dark.svg') }}" alt="Admin Logo" style="max-height: 50px; width: auto;" />
            @endif
        </a>
    </div>
    <!--== SEARCH ==-->
    <div class="col-md-6 col-sm-6 mob-hide">
        <form class="app-search">
            <input type="text" placeholder="Search..." class="form-control">
            <a href="#"><i class="fa fa-search"></i></a>
        </form>
    </div>
    <!--== NOTIFICATION ==-->
    <div class="col-md-2 tab-hide">
        <div class="top-not-cen">
            <a class='waves-effect btn-noti' href='#'><i class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a>
            <a class='waves-effect btn-noti' href='#'><i class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
            <a class='waves-effect btn-noti' href='#'><i class="fa fa-tag" aria-hidden="true"></i><span>5</span></a>
        </div>
    </div>
    <!--== MY ACCCOUNT ==-->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <!-- Dropdown Trigger -->
        <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="{{ asset('admin/images/user/6.png') }}" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
        </a>

        <!-- Dropdown Structure -->
        <ul id='top-menu' class='dropdown-content top-menu-sty'>
            
            <li class="divider"></li>
            <li>
                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="ho-dr-con-last waves-effect" style="background: none; border: none; color: inherit; width: 100%; text-align: left; padding: 15px 20px; cursor: pointer;">
                        <i class="fa fa-sign-in" aria-hidden="true"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>