@extends ('backend.master')
@section ('back',route('admin.dashboard.index'))
@section ('title','Hoạt Động Thành Viên')
@section ('controller','Nhật Ký')
@section ('action','Hoạt Động Thành Viên')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-body border-top-primary text-left">
		<a href="{{ route('admin.log.delete_all_action') }}" class="btn btn-danger"><i class="icon-trash"></i> Xóa Tất Cả ({{$totalLog}} Log)</a>
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
					<th>Tiêu Đề</th>
					<th width="200px">Hoạt Động</th>
					<th width="200px">Điều Khiển</th>
					<th width="200px">Tên Đầy Đủ</th>
					<th width="200px">Tạo Lúc</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($actions as $action)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{!! $action["title"] !!}</td>
					<td>{{ $action["action"] }}</td>
					<td>{{ $action["controller"] }}</td>
					<td>{{ $action["fullname"] }}</td>
					<td><center>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($action["created_at"]))->diffForHumans() }}</center></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-danger-600"><a href="{{ route('admin.log.delete_one_action',['id' => $action["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection