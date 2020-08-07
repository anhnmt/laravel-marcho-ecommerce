<div class="dashboard_menu">
    <ul class="nav nav-tabs flex-column" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.profile') ? 'active' : ''}}" id="account-detail-tab"
                href="{{ route('user.profile') }}" role="tab" aria-controls="account-detail" aria-selected="true"><i
                    class="fal fa-address-card"></i>Hồ sơ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="address-tab" href="#address" role="tab" aria-controls="address"
                aria-selected="true"><i class="fal fa-map-marker-alt"></i>Địa chỉ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.password') ? 'active' : ''}}" id="account-detail-tab"
                href="{{ route('user.password') }}" role="tab" aria-controls="account-detail" aria-selected="true"><i
                    class="fal fa-key"></i>Mật khẩu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs(['user.order.index', 'user.order.edit']) ? 'active' : ''}}" id="orders-tab"
                href="{{ route('user.order.index') }}" role="tab" aria-controls="orders" aria-selected="false"><i
                    class="fal fa-bags-shopping"></i>Đơn hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs(['user.order.trash', 'user.order.show']) ? 'active' : ''}}" id="orders-tab"
                href="{{ route('user.order.trash') }}" role="tab" aria-controls="orders" aria-selected="false"><i
                    class="fal fa-bags-shopping"></i>Đơn hàng bị huỷ</a>
        </li>
    </ul>
</div>