<nav class="sidebar dark_sidebar">
    <div class="logo d-flex justify-content-between">
        <img src="{{asset('images_dashboard/logo.png')}}">
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        @if(Auth::guard('web')->user()->id==1)
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{asset('images_dashboard/admin.png')}}" width="50" height="50">
                    </div>
                    <div class="nav_title">
                        <span>Admins</span>
                    </div>
                </a>
                <ul>
                    @if(Auth()->guard('web')->user()->id==1)
                        <li><a href="{{route('admin.admins.index')}}">List</a></li>
                    @endif
                    @if(Auth()->guard('web')->user()->id==1)
                        <li><a href="{{route('admin.admins.create')}}">Add New</a></li>
                    @endif
                </ul>
            </li>
        @endif

        @if(checkPermission('hr permission'))

            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{asset('images_dashboard/Group 18029.png')}}" width="50" height="50">
                    </div>
                    <div class="nav_title">
                        <span>Department</span>
                    </div>
                </a>
                <ul>
                    @if(checkPermission('hr permission'))
                        <li><a href="{{route('admin.departments.index')}}">List</a></li>
                    @endif
                    @if(checkPermission('hr permission'))
                        <li><a href="{{route('admin.departments.create')}}">Add New</a></li>
                    @endif
                </ul>
            </li>
        @endif

        @if(checkPermission('hr permission')||checkPermission('manager permission'))

            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{asset('images_dashboard/laptop.png')}}" width="50" height="50">
                    </div>
                    <div class="nav_title">
                        <span>Careers</span>
                    </div>
                </a>
                <ul>
                    @if(checkPermission('hr permission')||checkPermission('manager permission'))
                        <li><a href="{{route('admin.careers.index')}}">List</a></li>
                    @endif
                    @if(checkPermission('list direct employee')||checkPermission('delete direct employee'))
                        <li><a href="{{route('admin.direct_employee.index')}}">Direct Employee List</a></li>
                    @endif
                    @if(checkPermission('hr permission'))
                        <li><a href="{{route('admin.careers.create')}}">Add New</a></li>
                    @endif
                    @if(checkPermission('hr permission'))
                        <li><a href="{{route('admin.tags.index')}}"> Tags List</a></li>
                    @endif
                </ul>
            </li>
        @endif
        @if(checkPermission('control admins') )
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{asset('images_dashboard/privacy.png')}}" width="50" height="50">
                    </div>
                    <div class="nav_title">
                        <span>Role & Permissions</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{route('admin.roles.create')}}">Add New Role</a></li>
                    <li><a href="{{route('admin.roles.index')}}">Roles Table</a></li>
                </ul>
            </li>
        @endif

        @if((checkPermission('control business partner')))
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{asset('images_dashboard/partner.png')}}" width="50" height="50">
                    </div>
                    <div class="nav_title">
                        <span>Business Partners</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{route('admin.business_partners_list.list')}}">list</a></li>
                </ul>
                @if(checkPermission('control business partner'))
                    <ul>
                        <li><a href="{{route('admin.business_requests.index')}}">Requests</a></li>
                    </ul>
                @endif
                <ul>
                    <li><a href="{{route('admin.provinces.index')}}">Provinces</a></li>
                </ul>
                @if(checkPermission('control business partner'))
                    <ul>
                        <li>
                            @if(checkSettings())

                                <a href="{{route('admin.business_partners_settings.index')}}">Settings</a>

                            @endif
                        </li>
                    </ul>
                    <ul>
                        <li><a href="{{route('admin.business_partners_settings.create')}}">Add Settings</a></li>
                    </ul>
                @endif
            </li>
        @endif
        @if(checkPermission('list contacts')|| (checkPermission('delete contacts')))
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{asset('images_dashboard/contact.png')}}" width="50" height="50">
                    </div>
                    <div class="nav_title">
                        <span>Contacts</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{route('admin.contacts.index')}}">Contacts Tables</a></li>
                </ul>
            </li>
        @endif
        @if(checkPermission('control settings'))
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{asset('images_dashboard/settings.png')}}" width="50" height="50">
                    </div>

                    <div class="nav_title">
                        <span>Setting</span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{route('admin.settings.index')}}">show setting</a></li>
                    <li><a href="{{route('admin.services.index')}}">Services List</a></li>
                    <li><a href="{{route('admin.features.index')}}">Features List</a></li>
                    <li><a href="{{route('admin.businesses.index')}}">Business Card List</a></li>
                    <li><a href="{{route('admin.products.index')}}">Products List</a></li>

                </ul>

            </li>
        @endif
    </ul>
</nav>
