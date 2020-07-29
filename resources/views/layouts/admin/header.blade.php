<nav class="navbar fixed-top navbar-expand-md navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="offcanvas">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="{{ route('welcome') }}"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<span class="navbar-text mr-1 text-white">
					<i class="far fa-user"></i> {{-- {{ Auth::user()->name }} --}}
				</span>
			</li>
			<li class="nav-item">
				<a href="{{-- {{ route('admin.users.show', [Auth::user()->id]) }} --}}" class="nav-link"><i class="far fa-id-card"></i> {{ __('Thông Tin') }}</a>
			</li>
			<li class="nav-item">
				<a href="{{-- {{ route('logout') }} --}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> {{ __('Đăng Xuất') }}</a>
				<form id="logout-form" action="{{-- {{ route('logout') }} --}}" method="POST" style="display: none;">
					@csrf
				</form>
			</li>
		</ul>
	</div>
</nav>