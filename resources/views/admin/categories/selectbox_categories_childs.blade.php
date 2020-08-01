						@foreach ($categories as $category)
							@if($category->id != $diff)
								@if(count($category->childs))
									<option @if($selected == $category->id) selected @endif value="{{$category->id}}">
										@for ($i = 0; $i < $level; $i++)
										    &emsp;&emsp;&emsp;&emsp;
										@endfor
										{{$category->name}}
									</option>
									@include('admin.categories.selectbox_categories_childs', ['categories' => $category->childs, 'level' => $level + 1])
								@else
									<option @if($selected == $category->id) selected @endif value="{{$category->id}}">
										@for ($i = 0; $i < $level; $i++)
										    &emsp;&emsp;&emsp;&emsp;
										@endfor
										{{$category->name}}
									</option>
								@endif
							@endif
						@endforeach