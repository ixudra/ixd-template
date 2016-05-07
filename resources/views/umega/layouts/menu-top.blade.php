    <div class="search-bar closed">
        <form>
            <div class="input-group input-group-lg">
                <input type="text" placeholder="Search for..." class="form-control">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default search-bar-toggle"><i class="ti-close"></i></button>
                </span>
            </div>
        </form>
    </div>
    <div class="brand pull-left">
        <a href="index.html" class="logo"><i class="ti-underline"></i>
            <h2>YourAppName</h2>
        </a>
    </div>
    <a href="javascript:;" role="button" class="sidebar-toggle pull-left header-icon"><i class="ti-menu text-muted"></i></a>
    <form class="mt-15 mb-15 pull-left hidden-xs">
        <div class="form-group has-feedback mb-0">
            <input type="text" aria-describedby="inputSearchFor" placeholder="Search for..." style="width: 200px" class="form-control rounded"><span aria-hidden="true" class="ti-search form-control-feedback"></span><span id="inputSearchFor" class="sr-only">(default)</span>
        </div>
    </form>
    <ul class="newsticker list-unstyled ml-15 mb-0 pull-left visible-lg">
        @foreach( $feedItems as $feedItem )
            <li class="fw-500">{!! $feedItem->content !!}</li>
        @endforeach
    </ul>
    <ul class="notification-bar list-inline pull-right">
        <li class="visible-xs">
            <a href="javascript:;" role="button" class="header-icon search-bar-toggle"><i class="ti-search text-muted"></i></a>
        </li>
        <li class="visible-lg">
            <a href="javascript:;" role="button" class="header-icon fullscreen-toggle"><i class="ti-fullscreen text-muted"></i></a>
        </li>
        <li class="dropdown">
            <a id="dropdownMenu2" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle bubble header-icon">
                <i class="ti-world text-muted"></i><span class="badge bg-danger">6</span>
            </a>

            <div aria-labelledby="dropdownMenu2" class="dropdown-menu dropdown-menu-right dm-medium fs-12 animated fadeInDown">
                @if( !$notifications->isEmpty() )
                    <h5 class="dropdown-header">You have {{ $notifications->count() }} notifications</h5>
                    <ul data-mcs-theme="minimal-dark" class="media-list mCustomScrollbar">
                        @foreach( $notifications as $notification )
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left avatar">
                                        {!! HTML::image('uploads/users/'. $notification->actor->image, null, array('class'=> 'media-object img-circle')) !!}
                                        <span class="status bg-{{ $notification->actor->present()->statusAsColor }}"></span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">{{ $notification->actor->present()->fullName}}</h6>
                                        <p class="text-muted mb-0">{{ $notification->content }}</p>
                                    </div>
                                    <div class="media-right text-nowrap">
                                        <time datetime="{{ $notification->present()->timestamp }}" class="fs-11">{{ $notification->present()->timeAgo }}</time>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="dropdown-footer text-center p-10">
                        <a href="javascript:;" class="fw-500 text-muted">See all notifications</a>
                    </div>
                @else
                    <h5 class="dropdown-header">You have no new notifications</h5>
                @endif
            </div>
        </li>
        <li><a href="javascript:;" role="button" class="right-sidebar-toggle bubble header-icon"><i class="ti-comment-alt text-muted"></i><span class="dot bg-danger"></span></a></li>
        <li><a href="login.html" role="button" class="header-icon"><i class="ti-power-off text-muted"></i></a></li>
    </ul>
