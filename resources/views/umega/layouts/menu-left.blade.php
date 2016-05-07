
    <div class="brand">
        <a href="index.html" class="logo">
            <i class="ti-underline"></i>
            <h2>YourAppName</h2>
        </a>
        <a href="javascript:;" role="button" class="sidebar-toggle visible-xs-block"><i class="ti-close text-white"></i>
        </a>
    </div>
    <div class="profile">
        <div id="esp-profile" data-percent="100" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart">
            {!! HTML::image('uploads/users/'. $activeUser->image, null, array('class'=> 'avatar img-circle')) !!}
            <span class="status bg-success"></span>
        </div>
        <h5 class="text-white mt-15 mb-5">{{ $activeUser->present()->fullName }}</h5>
        <div class="text-muted">{{ $activeUser->present()->title }}</div>
    </div>
    <!-- Nav tabs-->
    <ul role="tablist" class="nav nav-tabs nav-justified nav-sidebar">
        <li role="presentation" class="active">
            <a href="#menu" aria-controls="menu" role="tab" data-toggle="tab">
                <i class="ti-menu"></i>
            </a>
        </li>
    </ul>
    <!-- Tab panes-->
    <div class="tab-content nav-sidebar-content">
        <div id="menu" role="tabpanel" class="tab-pane fade in active">
            <ul class="list-unstyled navigation mb-0">
                <li class="header">Main</li>
                <li>
                    <a href="index.html" class="active bubble">
                        <i class="ti-home"></i> Dashboard<span class="badge bg-danger">3</span>
                    </a>
                </li>
                <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse1" aria-expanded="false" aria-controls="collapse1" class="collapsed"><i class="ti-paint-bucket"></i> Color system</a>
                    <ul id="collapse1" class="list-unstyled collapse">
                        <li><a href="green-system.html">Green</a></li>
                        <li><a href="blue-system.html">Blue</a></li>
                        <li><a href="red-system.html">Red</a></li>
                        <li><a href="yellow-system.html">Yellow</a></li>
                    </ul>
                </li>
                <li class="panel">
                    <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse2" aria-expanded="false" aria-controls="collapse2" class="collapsed"><i class="ti-palette"></i> Skins</a>
                    <ul id="collapse2" class="list-unstyled collapse">
                        <li><a href="green-dashboard.html">Green</a></li>
                        <li><a href="blue-dashboard.html">Blue</a></li>
                        <li><a href="red-dashboard.html">Red</a></li>
                        <li><a href="yellow-dashboard.html">Yellow</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>