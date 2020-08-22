@extends('layouts.admin.admin')
@section('content')
<div class="table-responsive">
	<table class="table table-striped table-bordered" id="example">
		<thead>
			<tr class="bg-success text-white">
				<th>{{ __('Tên Cấu Hình') }}</th>
				<th>{{ __('Giá Trị') }}</th>
				<th>{{ __('Hành Động') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($configurations as $configuration)
			<tr>
				<td>{{ $configuration->display }}</td>
				<td>
					@if($configuration->id == 5 ||
						$configuration->id == 6
						)
					{!! $configuration->value !!}
					@else
					{{ $configuration->value }}
					@endif
				</td>
				<td class="actions">
					<a href="{{ route('admin.configurations.edit', [$configuration->id]) }}" class="btn btn-secondary" title="{{ __('Chỉnh Sửa') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection