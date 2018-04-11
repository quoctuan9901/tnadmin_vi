@extends ('backend.master')
@section ('back',route('admin.post'))
@section ('title','Danh Sách Bài Đăng')
@section ('controller','Bài Đăng')
@section ('action','Danh Sách')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Danh Sách Bài Đăng</h5>
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
					<th width="200px">Tạo Bởi</th>
					<th width="200px">Tạo Lúc</th>
					<th width="120px">Trạng Thái</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><a href="{{ route('admin.post.edit',['id' => $post["id"]]) }}" target="_blank">{{ $post["title"] }}</a></td>
					@if (empty($post["user"]["firstname"]) && empty($post["user"]["lastname"]))
						<td>Không xác định</td>
					@else
						<td><a href="{{ route('admin.user.edit',['id' => $post["user"]["id"]]) }}" target="_blank">{{ $post["user"]["firstname"] . ' ' . $post["user"]["lastname"] }}</a></td>
					@endif
					<td><center>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post["updated_at"]))->diffForHumans() }}</center></td>
					<td><input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="On" data-off-text="Off" class="switch switch_list" data-table="post" data-col="status" data-id="{{ $post["id"] }}" {{ ($post["status"] == "on") ? "checked" : "" }} /></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-default-600"><a class="button preview_before" data-table="post" id="{{ $post["id"] }}" data-toggle="modal" data-target="#modal_backdrop" data-popup="tooltip" title="View"><i class="icon-eye"></i></a></li>
							<li class="text-primary-600"><a href="{{ route('admin.post.edit',['id' => $post["id"]]) }}" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
							<li class="text-danger-600"><a href="{{ route('admin.post.destroy',['id' => $post["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection