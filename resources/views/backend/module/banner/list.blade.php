@extends ('backend.master')
@section ('back',route('admin.banner'))
@section ('title','Danh Sách Banner')
@section ('controller','Banner')
@section ('action','Danh Sách')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Danh Sách Banner</h5>
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
					<th>Vị Trí</th>
					<th width="120px">Đường Dẫn</th>
					<th width="200px">Tạo Bởi</th>
					<th width="200px">Tạo Lúc</th>
					<th width="120px">Trạng Thái</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($banner as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><a href="{{ route('admin.banner.edit',['id' => $item["id"]]) }}" target="_blank">{{ $item["name"] }}</a></td>
					<td><a href="{{ route('admin.position.edit',['id' => $item["position"]["id"]]) }}" target="_blank">{{ $item["position"]["name"] }}</a></td>
					<td><a href="{{ $item["link"] }}" target="_blank">Click Here</a></td>
					@if (empty($item["user"]["firstname"]) && empty($item["user"]["lastname"]))
						<td>Không xác định</td>
					@else
						<td><a href="{{ route('admin.user.edit',['id' => $item["user"]["id"]]) }}" target="_blank">{{ $item["user"]["firstname"] . ' ' . $item["user"]["lastname"] }}</a></td>
					@endif
					<td><center>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item["updated_at"]))->diffForHumans() }}</center></td>
					<td><input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="On" data-off-text="Off" class="switch switch_list" data-table="banner" data-col="status" data-id="{{ $item["id"] }}" {{ ($item["status"] == "on") ? "checked" : "" }} /></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-primary-600"><a href="{{ route('admin.banner.edit',['id' => $item["id"]]) }}" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
							<li class="text-danger-600"><a href="{{ route('admin.banner.destroy',['id' => $item["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection