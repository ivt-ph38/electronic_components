@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3 border-bottom border-primary">
	<h1>
		<i class="fa fa-list" aria-hidden="true"></i> {{ __('Danh Sách Liên Hệ') }}
	</h1>
</section>
<div class="table-responsive">
	<table class="table table-striped table-bordered" id="example">
		<thead>
			<tr class="bg-success text-white">
				<th><input type="checkbox" id="select_all" /></th>
				<th>{{ __('ID') }}</th>
				<th>{{ __('Tiêu Đề') }}</th>
				<th>{{ __('Họ Tên') }}</th>
				<th>{{ __('Email') }}</th>
				<th>{{ __('Phone') }}</th>
				<th>{{ __('Hành Động') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($contacts as $contact)
			<tr>
				<td><input type="checkbox" class="checkbox" name="check[]" value="{{ $contact->id }}" class="checkbox-table"></td>
				<td>{{ $contact->id }}</td>
				<td>{{ $contact->title }}</td>
				<td>{{ $contact->name }}</td>
				<td>{{ $contact->email }}</td>
				<td>{{ $contact->phone }}</td>
				<td class="actions">
					<a href="{{ route('admin.contacts.show', [$contact->id]) }}" class="btn btn-info" title="{{ __('Chi Tiết') }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
 				<form action="{{ route('admin.contacts.delete', [$contact->id]) }}" method="POST" role="form">	
 					 @method('DELETE')
 					 @csrf
 					 <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('Bạn có chắc muốn xóa Liên Hệ này')"></i></button>
				</form>
				</td>
			</tr>
			@endforeach
		</tbody>
		<script type="text/javascript">
			//select all checkboxes
			$("#select_all").change(function(){  //"select all" change
				$(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
			});
			//".checkbox" change
			$('.checkbox').change(function(){
				//uncheck "select all", if one of the listed checkbox item is unchecked
				if(false == $(this).prop("checked")){ //if this item is unchecked
				$("#select_all").prop('checked', false); //change "select all" checked status to false
			}
			//check "select all" if all checkbox items are checked
			if ($('.checkbox:checked').length == $('.checkbox').length ){
				$("#select_all").prop('checked', true);
			}
		});
		</script>
	</table>
</div>
@endsection