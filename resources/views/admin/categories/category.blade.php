					<tr>
						<td>{{ $category->id }}</td>
						<td>
							@for ($i = 0; $i < $level; $i++)
							    &emsp;&emsp;&emsp;&emsp;
							@endfor
							{{ $category->name }}
						</td>
						<td class="actions">	
							<a href="{{ route('admin.categories.edit', [$category->id]) }}" class="btn btn-secondary" title="{{ __('Chỉnh Sửa') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						</td>
						<td>				

		 					<form action="{{ route('admin.categories.delete', [$category->id]) }}" method="POST" role="form">			
		 						@method('DELETE')
		 					 @csrf
		 					 <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('Bạn có chắc muốn xóa '.$category->name)"></i></button>

							</form>
						</td>
					</tr>