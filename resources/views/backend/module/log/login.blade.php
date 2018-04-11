@extends ('backend.master')
@section ('back',route('admin.dashboard.index'))
@section ('title','Thành Viên Đăng Nhập')
@section ('controller','Nhật Ký')
@section ('action','Thành Viên Đăng Nhập')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-body border-top-primary text-left">
		<a href="{{ route('admin.log.delete_all_login') }}" class="btn btn-danger"><i class="icon-trash"></i> Xóa Tất Cả ({{$totalLog}} Log)</a>
	</div>
</div>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Hoạt Động Thành Viên</h5>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<table class="table table-bordered table-hover datatable-button-init-basic">
			<thead>
				<tr>
					<th width="80px">ID</th>
					<th>Tên</th>
					<th width="200px">Địa Chỉ IP</th>
					<th width="250px">Trình Duyệt</th>
					<th width="200px">Đăng Nhập Lúc</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($login as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{!! $item["email"] !!}</td>
					<td>{{ $item["ip_address"] }}</td>
					<td>{{ $item["browser"] }}</td>
					<td><center>{{ date('d-m-Y | h:m:i', strtotime($item["created_at"])) }}</center></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-danger-600"><a href="{{ route('admin.log.delete_one_login',['id' => $item["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection