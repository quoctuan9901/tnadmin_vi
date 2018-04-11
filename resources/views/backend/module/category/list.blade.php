@extends ('backend.master')
@section ('back',route('admin.category'))
@section ('title','Danh Sách Thể Loại')
@section ('controller','Thể Loại')
@section ('action','Danh Sách')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h6 class="panel-title">Danh Sách Thể Loại</h6>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="150px">Vị Trí</th>
						<th>Tên Thể Loại</th>
						<th width="200px">Tạo Bởi</th>
						<th width="200px">Tạo Lúc</th>
						<th width="150px">Trạng Thái</th>
						<th class="text-center" width="70px">Hoạt Động</th>
					</tr>
				</thead>
				<tbody>
					@if (empty($categories))
						<tr><td colspan="6" align="center">Không Có Dữ Liệu</td></tr>
					@else
						@php recursionTable($categories) @endphp
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection