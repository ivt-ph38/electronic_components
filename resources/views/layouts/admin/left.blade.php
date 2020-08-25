@section('left')

<script type="text/javascript">
	$(function () {
  'use strict'
  $('[data-toggle="offcanvas"]').on('click', function () {
    $('.offcanvas-collapse').toggleClass('open')
  })
})
</script>

<div class="list-group offcanvas-collapse">

	<a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-qrcode"></i>{{ __(' Sản Phẩm') }}</a>

	<a href="{{ route('admin.orders.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-shopping-cart" aria-hidden="true"></i>{{ __(' Đơn hàng') }}</a>

  <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-tag"></i>{{ __(' Danh mục') }}</a>

	<a href="{{ route('admin.blogs.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-newspaper"></i>{{ __(' Tin Tức') }}</a>

  <a href="{{ route('admin.posts.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-file-word"></i>{{ __(' Bài Viết') }}</a>

  <a href="{{ route('admin.contacts.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-bell"></i>{{ __(' Liên Hệ') }}</a>  
  
  <a href="{{ url('/admin/comments') }}" class="list-group-item list-group-item-action"><i class="fa fa-comments"></i>{{ __(' Bình luận') }}</a>    

	<a href="{{ route('admin.configurations.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-cogs" aria-hidden="true"></i>{{ __(' Cấu Hình') }}</a>	

  <a href="{{ route('admin.banners.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-image"></i>{{ __(' Banner') }}</a>

  <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-user"></i>{{ __(' Thành Viên') }}</a>
  
  <a href="" data-toggle="modal" data-target="#exampleModal" class="list-group-item list-group-item-action"><i class="fa fa-folder" aria-hidden="true"></i>{{ __(' Quản Lý File') }}</a>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog mw-100 w-75" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <iframe width="100%" height="550" frameborder="0" src="{{asset('filemanager/dialog.php')}}"></iframe>
        </div>
      </div>
    </div>
  </div>  
</div>  

@endsection