@extends ('backend.master')
@section ('back',route('admin.dashboard.index'))
@section ('title','Bảng Điều Khiển')
@section ('controller','Bảng Điều Khiển')
@section ('action','Trang Chủ')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h6 class="panel-title">5 Sản Phẩm Mới Nhất</h6>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="50px">ID</th>
						<th>Tên</th>
						<th width="150px">Tạo Lúc</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($products as $product)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td><a href="{{ route('admin.product.edit',['id' => $product->id]) }}">{{ $product->title }}</a></td>
						<td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($product->updated_at))->diffForHumans() }}</td>
					</tr>
					@empty
					<tr>
						<td colspan="3" align="center">Không có dữ liệu sản phẩm</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h6 class="panel-title">5 Tin Tức Mới Nhất</h6>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="50px">ID</th>
						<th>Tiêu Đề</th>
						<th width="150px">Tạo Lúc</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($news as $item)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td><a href="{{ route('admin.news.edit',['id' => $item->id]) }}">{{ $item->title }}</a></td>
						<td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->updated_at))->diffForHumans() }}</td>
					</tr>
					@empty
					<tr>
						<td colspan="3" align="center">Không có dữ liệu tin tức</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h6 class="panel-title">5 Thành Viên Mới Nhất</h6>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="50px">ID</th>
						<th>Email</th>
						<th width="150px">Tạo Lúc</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($user as $item)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td><a href="{{ route('admin.user.edit',['id' => $item->id]) }}">{{ $item->email }}</a></td>
						<td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->updated_at))->diffForHumans() }}</td>
					</tr>
					@empty
					<tr>
						<td colspan="3" align="center">Không có dữ liệu thành viên</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h6 class="panel-title">5 Bài Đăng Mới Nhất</h6>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="50px">ID</th>
						<th>Tiêu Đề</th>
						<th width="150px">Tạo Lúc</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($post as $item)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td><a href="{{ route('admin.post.edit',['id' => $item->id]) }}">{{ $item->title }}</a></td>
						<td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->updated_at))->diffForHumans() }}</td>
					</tr>
					@empty
					<tr>
						<td colspan="3" align="center">Không có dữ liệu bài đăng</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection