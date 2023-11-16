<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0 ">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="line_icon open_miniSide d-none d-lg-block">
                    <img src="{{asset('images_dashboard/ARROW.png')}}">
                </div>

                <div class="header_right d-flex justify-content-between align-items-center">

                    <div class="profile_info">
                        <img src="{{asset('images_dashboard/admin.png')}}">
                        <div class="profile_info_iner">
                            <div class="profile_author_name">
                                <h5> {{ Auth::user()->name }}</h5>
                            </div>
                            <div class="profile_info_details">
                                <a href="#">My Profile </a>

                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <a href="javascript:{}"
                                               onclick="this.closest('form').submit();return false;">
                                                Logout
                                            </a>
                                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
