@extends ('backend.master')
@section ('back',route('admin.product'))
@section ('title','Danh Sách Sản Phẩm')
@section ('controller','Sản Phẩm')
@section ('action','Danh Sách')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Danh Sách Sản Phẩm</h5>
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
					<th width="100px">Giá</th>
					<th width="200px">Thể Loại</th>
					<th width="140px">Tạo Bởi</th>
					<th width="130px">Tạo Lúc</th>
					<th width="100px">Trạng Thái</th>
					<th width="100px">Nổi Bật</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($product as $item)
					@php 
						$status   = ($item["status"] == "on") ? "checked" : ""; 
						$featured = ($item["featured"] == "on") ? "checked" : "";
					@endphp
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><a href="{{ route('admin.product.edit',['id' => $item["id"]]) }}">{{ $item["title"] }}</a></td>
					<td>{{ number_format($item["sale_price"],0,",",".") }}</td>
					<td>
						<ul>
							@foreach ($item["category"] as $category)
							<li><a href="{{ route('admin.category.edit',['id' => $category["category_id"]]) }}" target="_blank">{{ $category["name"] }}</a></li>
							@endforeach
						</ul>
					</td>

					<td><a href="{{ route('admin.user.edit',['id' => $item["user"]["id"]]) }}" target="_blank">{{ $item["user"]["firstname"] . " " . $item["user"]["lastname"] }}</a></td>
					<td><center>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item["updated_at"]))->diffForHumans() }}</center></td>
					<td><input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="On" data-off-text="Off" class="switch switch_list" data-table="product" data-col="status" data-id="{{ $item["id"] }}" {{ $status }} /></td>
					<td><input type="checkbox" name="chkFeatured" data-on-color="success" data-off-color="danger" data-on-text="On" data-off-text="Off" class="switch switch_list" data-table="product" data-col="featured" data-id="{{ $item["id"] }}" {{ $featured }} /></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-default-600"><a class="button preview_before" data-table="product" id="{{ $item["id"] }}" data-toggle="modal" data-target="#modal_backdrop" data-popup="tooltip" title="View"><i class="icon-eye"></i></a></li>
							<li class="text-primary-600"><a href="{{ route('admin.product.edit',['id' => $item["id"]]) }}" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
							<li class="text-danger-600"><a href="{{ route('admin.product.destroy',['id' => $item["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection