@extends ('backend.master')
@section ('back',route('admin.news'))
@section ('title','Danh Sách Tin Tức')
@section ('controller','Tin Tức')
@section ('action','Danh Sách')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Danh Sách Tin Tức</h5>
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
					<th width="190px">Thể Loại</th>
					<th width="150px">Tạo Lúc</th>
					<th width="120px">Trạng Thái</th>
					<th width="120px">Nổi Bật</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($news as $item)
					@php 
						$status   = ($item["status"] == "on") ? "checked" : ""; 
						$featured = ($item["featured"] == "on") ? "checked" : "";
					@endphp
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><a href="{{ route('admin.news.edit',['id' => $item["id"]]) }}" target="_blank">{{ $item["title"] }}</a></td>
					<td>
						<ul>
							@foreach ($item["category"] as $category)
							<li><a href="{{ route('admin.category.edit',['id' => $category["category_id"]]) }}" target="_blank">{{ $category["name"] }}</a></li>
							@endforeach
						</ul>
					</td>
					<td><center>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item["updated_at"]))->diffForHumans() }}</center></td>
					<td><input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="On" data-off-text="Off" class="switch switch_list" data-table="news" data-col="status" data-id="{{ $item["id"] }}" {{ $status }} /></td>
					<td><input type="checkbox" name="chkFeatured" data-on-color="success" data-off-color="danger" data-on-text="On" data-off-text="Off" class="switch switch_list" data-table="news" data-col="featured" data-id="{{ $item["id"] }}" {{ $featured }} /></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-default-600"><a class="button preview_before" data-table="news" id="{{ $item["id"] }}" data-toggle="modal" data-target="#modal_backdrop" data-popup="tooltip" title="View"><i class="icon-eye"></i></a></li>
							<li class="text-primary-600"><a href="{{ route('admin.news.edit',['id' => $item["id"]]) }}" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
							<li class="text-danger-600"><a href="{{ route('admin.news.destroy',['id' => $item["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection