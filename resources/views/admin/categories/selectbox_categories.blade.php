						<option @if($selected == 0) selected @endif value="0">---Danh mục gốc---</option>
						@foreach ($categories as $category)
							@if($category->id != $diff)
								@if(count($category->childs))
									<option @if($selected == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
									@if($category->id != $diff)
										@include('admin.categories.selectbox_categories_childs', ['categories' => $category->childs, 'level' => 1, 'diff' => $diff])
									@endif
								@else
									<option @if($selected == $category->id) selected @endif  value="{{$category->id}}">{{$category->name}}</option>
								@endif
							@endif
						@endforeach