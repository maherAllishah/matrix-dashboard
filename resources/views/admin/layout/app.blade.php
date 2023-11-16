<!DOCTYPE html>
<html lang="zxx">
@include('admin.base._meta')
<body class="crm_body_bg">


@include('admin.partials._side_bar')


@yield('content')

<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>

@include('admin.base._scripts')
</body>
</html>
