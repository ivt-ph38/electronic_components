					<tr>
						<td>{{ $category->id }}</td>
						<td>
							@for ($i = 0; $i < $level; $i++)
							    &emsp;&emsp;&emsp;&emsp;
							@endfor
							{{ $category->name }}
						</td>
						<?php 
							$count = 0;
							$count += count($category->products);
							foreach ($category->childs as $item) {
								$count += count($item->products);
							}
						?>
						<td>{{$count}}</td>
						<td class="actions">	
							<a href="{{ route('admin.categories.edit', [$category->id]) }}" class="btn btn-secondary" title="{{ __('Chỉnh Sửa') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						</td>
						<td>
							<?php if ($count == 0) {?>		
			 					<form action="{{ route('admin.categories.delete', [$category->id]) }}" method="POST" role="form">			
			 					@method('DELETE')
			 					@csrf
			 					<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" onclick="return confirm('Bạn có muốn xóa danh mục này?');"></i></button>

								</form>
							<?php } ?>
						</td>
					</tr>