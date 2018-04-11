<div class="navbar navbar-default" id="navbar-second">
	<ul class="nav navbar-nav no-border visible-xs-block">
		<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
	</ul>

	<div class="navbar-collapse collapse" id="navbar-second-toggle">
		<ul class="nav navbar-nav">
			<li><a href="{{ route('admin.dashboard.index') }}"><i class="icon-display4 position-left"></i> Bảng Điều Khiển</a></li>
			
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-folder position-left"></i> Thể Loại <span class="caret"></span>
				</a>

				<ul class="dropdown-menu width-200">
					<li class="dropdown-header">Quản Lý Thể Loại</li>
					<li><a href="{{ route('admin.category') }}"><i class="icon-folder-open"></i> Danh Sách Thể Loại</a></li>
					<li><a href="{{ route('admin.category.create') }}"><i class="icon-folder-plus"></i> Thêm Thể Loại</a></li>
				</ul>
			</li>
			
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-man-woman position-left"></i> Thành Viên<span class="caret"></span>
				</a>

				<ul class="dropdown-menu width-250">
					<li class="dropdown-header">Quản Lý Thành Viên</li>						
					<li class="dropdown-submenu">
						<a><i class="icon-users"></i> Thành Viên</a>
						<ul class="dropdown-menu width-200">
							<li><a href="{{ route('admin.user') }}">Danh Sách Thành Viên</a></li>
							<li><a href="{{ route('admin.user.create') }}">Thêm Thành Viên</a></li>
						</ul>
					</li>
					<li class="dropdown-submenu">
						<a><i class="icon-key"></i> Vai Trò</a>
						<ul class="dropdown-menu width-200">
							<li><a href="{{ route('admin.role') }}">Danh Sách Vai Trò</a></li>
							<li><a href="{{ route('admin.role.create') }}">Thêm Vai Trò</a></li>
						</ul>
					</li>
				</ul>
			</li>

			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-stack-text position-left"></i> Bài Viết<span class="caret"></span>
				</a>
				<ul class="dropdown-menu width-250">
					<li class="dropdown-header">Quản Lý Bài Đăng</li>						
					<li class="dropdown-submenu">
						<a><i class="icon-magazine"></i> Bài Đăng</a>
						<ul class="dropdown-menu width-200">
							<li><a href="{{ route('admin.post') }}">Danh Sách Bài Đăng</a></li>
							<li><a href="{{ route('admin.post.create') }}">Thêm Bài Đăng</a></li>
						</ul>
					</li>
					<li class="dropdown-submenu">
						<a><i class="icon-price-tags"></i> Thẻ</a>
						<ul class="dropdown-menu width-200">
							<li><a href="{{ route('admin.tags') }}">Danh Sách Thẻ</a></li>
							<li><a href="{{ route('admin.tags.create') }}">Thêm Thẻ</a></li>
						</ul>
					</li>
					<li class="dropdown-submenu">
						<a><i class="icon-newspaper"></i> Tin Tức</a>
						<ul class="dropdown-menu width-200">
							<li><a href="{{ route('admin.news') }}">Danh Sách Tin Tức</a></li>
							<li><a href="{{ route('admin.news.create') }}">Thêm Tin Tức</a></li>
						</ul>
					</li>
				</ul>
			</li>

			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-grid6 position-left"></i> Sản Phẩm<span class="caret"></span>
				</a>
				<ul class="dropdown-menu width-250">
					<li class="dropdown-header">Quản Lý Sản Phẩm</li>						
					<li class="dropdown-submenu">
						<a><i class="icon-lab"></i> Thuộc Tính</a>
						<ul class="dropdown-menu width-200">
							<li><a href="{{ route('admin.attribute') }}">Danh Sách Thuộc Tính</a></li>
							<li><a href="{{ route('admin.attribute.create') }}">Thêm Thuộc Tính</a></li>
						</ul>
					</li>
					<li class="dropdown-submenu">
						<a><i class="icon-office"></i> Nhà Sản Xuất</a>
						<ul class="dropdown-menu width-200">
							<li><a href="{{ route('admin.manufacturer') }}">Danh Sách Nhà Sản Xuất</a></li>
							<li><a href="{{ route('admin.manufacturer.create') }}">Thêm Nhà Sản Xuất</a></li>
						</ul>
					</li>
					<li class="dropdown-submenu">
						<a><i class="icon-cube3"></i> Sản Phẩm</a>
						<ul class="dropdown-menu width-200">
							<li><a href="{{ route('admin.product') }}">Danh Sách Sản Phẩm</a></li>
							<li><a href="{{ route('admin.product.create') }}">Thêm Sản Phẩm</a></li>
						</ul>
					</li>
				</ul>
			</li>

			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-images2 position-left"></i> Truyền Thông<span class="caret"></span>
				</a>
				<ul class="dropdown-menu width-250">
					<li class="dropdown-header">Quản Lý Truyền Thông</li>						
					<li class="dropdown-submenu">
						<a><i class="icon-move-alt1"></i> Vị Trí Banner, Album</a>
						<ul class="dropdown-menu width-200">
							<li><a href="{{ route('admin.position') }}">Danh Sách Vị Trí</a></li>
							<li><a href="{{ route('admin.position.create') }}">Thêm Vị Trí</a></li>
						</ul>
					</li>
					<li class="dropdown-submenu">
						<a><i class="icon-image2"></i> Banner , Album</a>
						<ul class="dropdown-menu width-200">
							<li><a href="{{ route('admin.banner') }}">Danh Sách Banner</a></li>
							<li><a href="{{ route('admin.banner.create') }}">Thêm Banner</a></li>
						</ul>
					</li>
				</ul>
			</li>

			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-address-book position-left"></i> Liên Hệ <span class="caret"></span>
				</a>

				<ul class="dropdown-menu width-200">
					<li class="dropdown-header">Quản Lý Liên Hệ</li>
					<li><a href="{{ route('admin.contact') }}"><i class="icon-address-book2"></i> Danh Sách Liên Hệ</a></li>
					<li><a href="{{ route('admin.contact.create') }}"><i class="icon-phone-plus"></i> Thêm Liên Hệ</a></li>
				</ul>
			</li>

			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-mailbox position-left"></i> Mail & Bình Luận<span class="caret"></span>
				</a>
				<ul class="dropdown-menu width-250">
					<li class="dropdown-header">Quản Lý Mail & Tin Nhắn</li>						
					<li class="dropdown-submenu">
						<a><i class="icon-envelop5"></i> Mail</a>
						<ul class="dropdown-menu width-200">
							<li><a href="{{ route('admin.mail') }}">Danh Sách Mail</a></li>
							<li><a href="{{ route('admin.mail.getSend') }}">Gửi Mail</a></li>
						</ul>
					</li>
					<li class="dropdown-submenu">
						<a><i class="icon-comments"></i> Bình Luận</a>
						<ul class="dropdown-menu width-200">
							<li><a href="{{ route('admin.comment') }}">Danh Sách Bình Luận</a></li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-cog3"></i>
					<span class="visible-xs-inline-block position-right">Chia Sẻ</span>
					<span class="caret"></span>
				</a>

				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="{{ route('admin.user.get-edit-myself') }}"><i class="icon-user-lock"></i> Sửa Tài Khoản Của Tôi</a></li>
					<li><a><i class="icon-statistics"></i> Analytics (Cập Nhật)</a></li>
					<li><a><i class="icon-accessibility"></i> Accessibility (Cập Nhật)</a></li>
					<li class="divider"></li>
					<li><a href="{{ route('admin.dashboard.config') }}"><i class="icon-gear"></i> Tất Cả Cài Đặt</a></li>
					<li><a href="{{ route('admin.log.list_action') }}"><i class="icon-gear"></i> Nhật Ký Hoạt Động Thành Viên</a></li>
					<li><a href="{{ route('admin.log.list_login') }}"><i class="icon-gear"></i> Nhật Ký Đăng Nhập Thành Viên</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>