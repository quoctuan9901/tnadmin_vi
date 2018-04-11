@extends ('backend.master')
@section ('back',route('admin.user'))
@section ('title','Danh Sách Thành Viên')
@section ('controller','Thành Viên')
@section ('action','Danh Sách')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Danh Sách Thành Viên</h5>
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
					<th>Email</th>
					<th>Tên Đầy Đủ</th>
					<th width="250px">Cấp Độ</th>
					<th width="200px">Tạo Lúc</th>
					<th width="120px">Trạng Thái</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><a href="mailto:{{ $user["email"] }}" target="_top">{{ $user["email"] }}</a></td>
					<td>
						@if (empty($user["firstname"]) && empty($user["lastname"]))
							Unknown
						@else
							{{ $user["firstname"] . ' ' .$user["lastname"] }}
						@endif
							
					</td>
					<td>
						@if ($user["level"] == 1 && $user["id"] == 1)
							<span class="text-danger">Superadmin</span>
						@elseif ($user["level"] == 1)
							<span class="text-info">
							Admin
							@if (!empty($user["role"]))
								(<a href="{{ route('admin.role.edit',['id' => $user["role"]["id"]]) }}" target="_blank">{{ $user["role"]["name"]}}</a>)
							@endif
							</span>
						@else
							Member
						@endif
					</td>
					<td><center>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($user["updated_at"]))->diffForHumans() }}</center></td>
					<td><center>
						@if ($user["status"] == "on")
							<span class="label label-success">Active</span>
						@elseif ($user["status"] == "off")
							<span class="label label-danger">Block</span>
						@endif
						</center>
					</td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-default-600"><a class="button preview_before" data-table="user" id="{{ $user["id"] }}" data-toggle="modal" data-target="#modal_backdrop" data-popup="tooltip" title="View"><i class="icon-eye"></i></a></li>
							<li class="text-primary-600"><a href="{{ route('admin.user.edit',['id' => $user["id"]]) }}" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
							<li class="text-danger-600"><a href="{{ route('admin.user.destroy',['id' => $user["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection