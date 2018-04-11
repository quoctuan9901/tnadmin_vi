@extends ('backend.master')
@section ('back',route('admin.tags'))
@section ('title','Danh Sách Thẻ')
@section ('controller','Thẻ')
@section ('action','Danh Sách')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Danh Sách Thẻ</h5>
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
					<th>Thẻ</th>
					<th>Không Dấu</th>
					<th width="200px">Tạo Bởi</th>
					<th width="200px">Tạo Lúc</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($tags as $tag)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><a href="{{ route('admin.tags.edit',['id' => $tag["id"]]) }}" target="_blank">{{ $tag["tags"] }}</a></td>
					<td>{{ $tag["slug"] }}</td>
					@if (empty($tag["user"]["firstname"]) && empty($tag["user"]["lastname"]))
						<td>Không Xác Định</td>
					@else
						<td><a href="{{ route('admin.user.edit',['id' => $tag["user"]["id"]]) }}" target="_blank">{{ $tag["user"]["firstname"] . ' ' . $tag["user"]["lastname"] }}</a></td>
					@endif
					<td><center>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($tag["updated_at"]))->diffForHumans() }}</center></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-primary-600"><a href="{{ route('admin.tags.edit',['id' => $tag["id"]]) }}" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
							<li class="text-danger-600"><a href="{{ route('admin.tags.destroy',['id' => $tag["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection