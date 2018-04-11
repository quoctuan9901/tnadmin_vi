@extends ('backend.master')
@section ('back',route('admin.role'))
@section ('title','Danh Sách Vai Trò')
@section ('controller','Vai Trò')
@section ('action','Danh Sách')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Danh Sách Vai Trò</h5>
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
					<th>Vai Trò</th>
					<th width="200px">Tạo Bởi</th>
					<th width="200px">Tạo Lúc</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($roles as $role)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><a href="{{ route('admin.role.edit',['id' => $role["id"]]) }}" target="_blank">{{ $role["name"] }}</a></td>
					<td>
						<ol>
						@foreach (json_decode($role["role"]) as $name_role)
							<li>{{ $name_role }}</li>
						@endforeach
						</ol>
					</td>
					@if (empty($role["user"]["firstname"]) && empty($role["user"]["lastname"]))
						<td>Không Xác Định</td>
					@else
						<td><a href="{{ route('admin.user.edit',['id' => $role["user"]["id"]]) }}" target="_blank">{{ $role["user"]["firstname"] . ' ' . $role["user"]["lastname"] }}</a></td>
					@endif
					<td><center>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($role["updated_at"]))->diffForHumans() }}</center></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-primary-600"><a href="{{ route('admin.role.edit',['id' => $role["id"]]) }}" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
							<li class="text-danger-600"><a href="{{ route('admin.role.destroy',['id' => $role["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection