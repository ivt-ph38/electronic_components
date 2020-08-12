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

	<a href="{{ route('admin.orders.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-folder-open"></i>{{ __(' Đơn hàng') }}</a>

  <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-list-alt" aria-hidden="true"></i>{{ __(' Danh mục') }}</a>

	<a href="{{ route('admin.blogs.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-newspaper-o" aria-hidden="true"></i>{{ __(' Tin Tức') }}</a>

  <a href="{{ route('admin.contacts.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-cogs" aria-hidden="true"></i>{{ __(' Liên Hệ') }}</a>  

	<a href="{{ route('admin.configurations.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-cogs" aria-hidden="true"></i>{{ __(' Cấu Hình') }}</a>	

  <a href="{{ route('admin.banners.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-cogs" aria-hidden="true"></i>{{ __(' Banner') }}</a>

	<a href="" type="button" data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action"><i class="fas fa-box-open"></i>{{ __(' Quản Lý File') }}</a>
	
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