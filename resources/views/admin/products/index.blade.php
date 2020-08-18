@extends('layouts.admin.admin')

@section('content')


<section class="content-header mb-3 border-bottom border-primary">

	<h1>
		<i class="fa fa-list" aria-hidden="true"></i> {{ __('Danh Sách Sản Phẩm') }}
	</h1>
	                            <div class="form-group">
                                <input type="text" class="form-controller" id="search" name="search"></input>
                            </div>

</section>

{{-- {{ Form::open(['route' => ['admin.products.destroy'], 'method' => 'post']) }}

<a class="btn btn-success" href="{{ route('admin.products.create') }}"><i class="fas fa-plus-circle"></i> {{ __('Thêm Sản Phẩm') }}</a>

{{ Form::button('<i class="far fa-check-square"></i> Xóa Đã Chọn Hoặc Cập Nhật STT, Giá', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Bạn muốn xóa sản phẩm đã chọn hoặc cập nhật STT, Giá?')"]) }} --}}

<hr>

<script src="{{asset('js/jquery.priceformat.min.js')}}"></script>

<div class="table-responsive">

	
	<a class="btn btn-success" href="{{ route('admin.products.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Thêm Sản Phẩm') }}</a>	

	<table class="table table-striped table-bordered mt-3" id="example">

		<thead>

			<tr class="bg-success text-white">

				<th>{{ __('ID') }}</th>

				<th>{{ __('Tên Sản Phẩm') }}</th>

				<th>{{ __('Hình Đại Diện') }}</th>

				<th>{{ __('Giá / Giảm Giá %') }}</th>

				<th>{{ __('Tình trạng') }}</th>

				<th>{{ __('Danh Mục') }}</th>

				<th>{{ __('Hành Động') }}</th>

			</tr>

		</thead>

		<tbody>
			@foreach($products as $product)
			<tr>
				<td>{{ $product->id }}</td>
				<td>{{ $product->name }}</td>
				<td>

					<img src="{{url($product->image)}}" class="table-img" alt="{{ $product->name }}">
				</td>
				<td>
					{{ number_format($product->price, 0, '', ',') }}  VND
					<hr>
					{{ $product->discount }}
				</td>
				<td class="text-center">
					@if ($product->status == 1)
					{{ __('Còn hàng') }}
					@else
					{{ __('Hết hàng') }}
					@endif
				</td>
				<td>
					@if (!empty($product->category_id))	
					<a href="{{route('admin.categories.index')}}" target="_blank" class="btn btn-info">{{ $product->category->name }}</a>	
					@else
						{{ __('Không có danh mục') }}
					@endif
				</td>

				<td class="actions">	
					<a href="{{ route('admin.products.edit', [$product->id]) }}" class="btn btn-secondary" title="{{ __('Chỉnh Sửa') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				<form action="{{ route('admin.products.delete', [$product->id]) }}" method="POST" role="form">			@method('DELETE')
 					 @csrf
 					 <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('Bạn Muốn Xóa Sản Phẩm');"></i></button>
				</form>				
					<a href="{{ route('admin.products.clone', [$product->id]) }}" class="btn btn-secondary" title="{{ __('Nhân Bản Sản Phẩm') }}"><i class="fa fa-files-o" aria-hidden="true"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
        <script type="text/javascript">
            $('#search').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{route('live_search.action')}}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                    	var html = '';
						$.each(data,function(index, product){
                    		console.log(product);
                    		html += '<tr>';
                    		html+= '<td>'+ product.id +'</td>';
							html+= '<td>'+ product.name +'</td>';
							html+= '<td><img src="'+ '{{url('/')}}' + product.image +'" class="table-img" alt="'+ product.name +'"></td>';
							html+= '<td> {{ number_format($product->price, 0, '', ',') }} VNĐ <hr> @if (!empty('+ product.discount +')) '+ product.discount +' @else 0 @endif </td>';
							html+= '<td> @if ('+ product.status == 1 +') Còn Hàng @else Hết Hàng @endif </td>';
							html+= '<td> @if (!empty('+ product.category_id +')) '+ product.name +' @else {"Không Có Danh Mục"} @endif </td>';
							html+= '<td><a href="{{ route('admin.products.edit', [$product->id]) }}" class="btn btn-secondary" title="Chỉnh Sửa"><i class="fa fa-pencil" aria-hidden="true"></i></a> <form action="{{ route('admin.products.delete', [$product->id]) }}" method="POST" role="form"> @method('DELETE') @csrf <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true" onclick="return confirm("Bạn có chắc muốn xóa Sản phẩm");"></i></button></form>  <a href="{{ route('admin.products.clone', [$product->id]) }}" class="btn btn-secondary" title="Nhân Bản Sản Phẩm"><i class="fa fa-files-o" aria-hidden="true"></i></a> </td>';
							html += '<tr>';
						});
                        $('tbody').html(html);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>

<hr>

<a class="btn btn-success" href="{{ route('admin.products.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Thêm Sản Phẩm') }}</a>

@endsection