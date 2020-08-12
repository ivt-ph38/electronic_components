  
@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3 border-bottom border-primary">
	<h1>
		<i class="fas fa-list-alt"></i> {{ __('Danh sách banner') }}
	</h1>
</section>

<a class="btn btn-success" href="{{ route('admin.banners.create') }}"><i class="fa  fa-plus-circle"></i> {{ __('Thêm banner') }}</a>

<hr>
    <!-- Hiển thị thông báo -->
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div> <!-- end .flash-message -->

<div class="table-responsive">
	<table class="table table-striped table-bordered mt-3" id="example">
		<thead>
			<tr class="bg-success text-white">
				<th>{{ __('Banner') }}</th>
				<th>{{ __('Tên') }}</th>
				<th>{{ __('Link liên kết') }}</th>
				<th colspan="2">{{ __('Hành Động') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($banners as $banner)
				<tr>
					<td><img width="400" class="img-thumbnail" src="{{url($banner->path)}}"></a></td>
					<td>{{$banner->name}}</td>
					<td><a href="{{$banner->link}}">{{$banner->link}}</a></td>
					<td>
						<a class="btn" href="{{url('/admin/banners/edit/'.$banner->id)}}"><span class="fa fa-pencil"></span></a>
					</td>
					<td>
						<form action="{{ route('admin.banners.delete', [$banner->id]) }}" method="POST" role="form">			
		 					@method('DELETE')
		 					@csrf
		 					<button type="submit" class="btn"><i class="fa fa-trash-o" onclick="return confirm('Bạn có chắc muốn xóa banner này')"></i></button>

							</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<hr>

<a class="btn btn-success" href="{{ route('admin.banners.create') }}"><i class="fa fa-plus-circle"></i> {{ __('Thêm Banner') }}</a>


@endsection