					<tr>
						<td>{{ $category->id }}</td>
						<td>
							@for ($i = 0; $i < $level; $i++)
							    &emsp;&emsp;&emsp;&emsp;
							@endfor
							{{ $category->name }}
						</td>
						<td class="actions">	
							<a href="{{ route('admin.categories.edit', [$category->id]) }}" class="btn btn-secondary" title="{{ __('Chỉnh Sửa') }}"><i class="far fa-edit">Chỉnh Sửa</i></a>
						</td>
						<td>
							{{-- @php
								$messagedel = 'Bạn muốn xóa danh mục '.$category->name;
							@endphp --}}

							{{-- {{ Form::button('<i class="far fa-times-circle"></i>', ['type' => 'submit', 'class' => 'btn btn-danger','name' => 'delete', 'value' => $category->id, 'onclick' => "return confirm('$messagedel')"]) }}
		 					--}}				
		 					<form action="{{ route('admin.categories.delete', [$category->id]) }}" method="POST" role="form">	
		 						@method('DELETE')
			 					@csrf
			 					<button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa danh mục: {{$category->name}}')"><i class="fad fa-trash">Xoá</i></button>
							</form>
						</td>
					</tr>