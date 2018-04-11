<div class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ route('admin.dashboard.index') }}"><img src="{{ asset($config_site->logo) }}" alt="{{ $config_site->name_site }}"></a>

		<ul class="nav navbar-nav pull-right visible-xs-block">
			<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
		</ul>
	</div>

	<div class="navbar-collapse collapse" id="navbar-mobile">

		<p class="navbar-text"><span class="label bg-success-400">Online</span></p>

		<ul class="nav navbar-nav navbar-right">

			<li class="dropdown dropdown-user">
				<a class="dropdown-toggle" data-toggle="dropdown">
					@if (empty(Auth::user()->avatar))
						<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" alt="">
					@else
						<img src="{{ Auth::user()->avatar }}" alt="My Avatar">
					@endif
					

					@if (empty(Auth::user()->firstname) && empty(Auth::user()->lastname))
						<span>Không Xác Định</span>
					@else
						<span>{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</span>
					@endif
					<i class="caret"></i>
				</a>

				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="{{ route('admin.user.get-edit-myself') }}"><i class="icon-cog5"></i> Sửa Tài Khoản Của Tôi</a></li>
					<li><a href="{{ route('logout') }}"><i class="icon-switch2"></i> Thoát</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>