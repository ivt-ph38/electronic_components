  
@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3 border-bottom border-primary">
	<h1>
		<i class="fas fa-list-alt"></i> {{ __('Danh sách bình luận') }}
	</h1>
</section>
    <!-- Hiển thị thông báo -->
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div> <!-- end .flash-message -->
<div class="">
	<table class="table table-striped table-bordered mt-3" id="example">
		<thead>
			<tr class="bg-success text-white">
				<th>{{ __('ID') }}</th>
				<th>{{ __('Tên') }}</th>
				<th>{{ __('Nội dung') }}</th>
				<th>{{ __('Sản phẩm') }}</th>
				<th>{{ __('Hành Động') }}</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($comments as $comment)
			<tr>
				<td>{{$comment->id}}</td>
				<td>{{$comment->name}}</td>
				<td>{{$comment->content}}</td>
				<td><a href="{{url('/products/'.$comment->product->id.'#comments')}}">{{$comment->product->name}}</a></th>
				<td>
					<form action="{{ url('admin/comments/'.$comment->id) }}" method="POST" role="form">			
		 				@method('DELETE')
		 				@csrf
						<button type="submit" class="btn"><i class="fa fa-trash-o" onclick="return confirm('Bạn có chắc muốn xóa bình luận này')"></i></button>

					</form>
				</td>
			</tr>
			@empty
			<tr>
				<td colspan="5">Không tìm thấy</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>

<hr>

<h4> {{ $comments->links() }}</h4>
@endsection
