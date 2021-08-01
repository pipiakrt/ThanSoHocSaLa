<ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between bg-light">
        <div class="text-success">
            <h6 class="my-0 mt-1">Thông tin tài khoản</h6>
            <small>Brief description</small>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <h6 class="my-0">Giỏ hàng</h6>
            <small class="text-muted">Brief description</small>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <h6 class="my-0">Đơn hàng</h6>
            <small class="text-muted">Brief description</small>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between bg-condensed">
        <div>
            <h6 class="my-0">license code</h6>
            <small class="text-muted">1 lượt tra cứu thần số học</small>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <span>Sản phẩm yêu thích</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <span>Tải file luận giải</span>
        <strong>$20</strong>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <form method="POST" action="/logout">
            @csrf
            <button class="btn p-0" type="submit">
                <span>Đăng xuất</span>
            </button>
        </form>
    </li>
</ul>
<form class="card p-2">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Nhập code" />
        <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Tra cứu nâng cao</button>
        </div>
    </div>
</form>
