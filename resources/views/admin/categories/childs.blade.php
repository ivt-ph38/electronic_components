@foreach($categories as $category)
	@if(count($category->childs))
		@include('admin.categories.category', ['category' => $category, 'level' => $level + 1])
		@include('admin.categories.childs', ['categories' => $category->childs, 'level' => $level + 1])
	@else
		@include('admin.categories.category', ['category' => $category, 'level' => $level + 1])
	@endif
@endforeach