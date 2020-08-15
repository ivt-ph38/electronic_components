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

	<a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-product-hunt" aria-hidden="true"></i>{{ __(' Sản Phẩm') }}</a>

	<a href="{{ route('admin.orders.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-shopping-cart" aria-hidden="true"></i>{{ __(' Đơn hàng') }}</a>

  <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-book" aria-hidden="true"></i>{{ __(' Danh mục') }}</a>

	<a href="{{ route('admin.blogs.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-newspaper-o" aria-hidden="true"></i>{{ __(' Tin Tức') }}</a>


  <a href="{{ route('admin.posts.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-newspaper-o" aria-hidden="true"></i>{{ __(' Bài Viết') }}</a>

  <a href="{{ route('admin.contacts.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-address-card-o" aria-hidden="true"></i>{{ __(' Liên Hệ') }}</a>  

  <a href="{{ route('admin.contacts.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-address-card-o" aria-hidden="true"></i>{{ __(' Liên Hệ') }}</a>
  
  <a href="{{ url('/admin/comments') }}" class="list-group-item list-group-item-action"><i class="fa fa-address-card-o" aria-hidden="true"></i>{{ __(' Bình luận') }}</a>    


	<a href="{{ route('admin.configurations.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-cogs" aria-hidden="true"></i>{{ __(' Cấu Hình') }}</a>	

  <a href="{{ route('admin.banners.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-cogs" aria-hidden="true"></i>{{ __(' Banner') }}</a>

  <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action"><i class="las la-address-card"></i>{{ __(' Thành Viên') }}</a>
	
	<!-- Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
      <div class="modal-body">
        <iframe width="100%" height="550" frameborder="0" src="/filemanager/dialog.php?akey=xaqogz6cCYn8PS"></iframe>
		</div>
        
      </div>
    </div>
  </div>
  

</div>

@endsection