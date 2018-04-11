@extends ('backend.master')
@section ('back',route('admin.manufacturer'))
@section ('title','Danh Sách Nhà Sản Xuất')
@section ('controller','Nhà Sản Xuất')
@section ('action','Danh Sách')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Danh Sách Nhà Sản Xuất</h5>
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
					<th>Nhà Sản Xuất</th>
					<th>Email</th>
					<th>Số Điện Thoại</th>
					<th width="180px">Tạo Lúc</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($manufacturer as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><a href="{{ route('admin.manufacturer.edit',['id' => $item["id"]]) }}" target="_blank">{{ $item["name"] }}</a></td>
					<td><a href="mailto:{{ $item["email"] }}">{{ $item["email"] }}</a></td>
					<td>{{ $item["phone"] }}</td>
					<td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item["updated_at"]))->diffForHumans() }}</td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-primary-600"><a href="{{ route('admin.manufacturer.edit',['id' => $item["id"]]) }}" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
							<li class="text-danger-600"><a href="{{ route('admin.manufacturer.destroy',['id' => $item["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection