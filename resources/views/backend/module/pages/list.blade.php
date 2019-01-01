@extends ('backend.master')
@section ('back',route('admin.pages'))
@section ('title','Danh Sách Trang')
@section ('controller','Trang')
@section ('action','Danh Sách')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Danh Sách Trang</h5>
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
					<th>Trang</th>
					<th width="250px">Nội dung</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($page as $p)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><a href="{{ route('admin.pages.edit',['id' => $p["id"]]) }}" target="_blank">{{ $p["name"] }}</a></td>
					<td><a href="{{ route('admin.content.index',['page' => $p["id"]]) }}" target="_blank">Cập nhật nội dung trang</a></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-primary-600"><a href="{{ route('admin.pages.edit',['id' => $p["id"]]) }}" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
							<li class="text-danger-600"><a href="{{ route('admin.pages.destroy',['id' => $p["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection