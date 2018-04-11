@extends ('backend.master')
@section ('back',route('admin.attribute'))
@section ('title','Danh Sách Thuộc Tính')
@section ('controller','Thuộc Tính')
@section ('action','Danh Sách')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Danh Sách Thuộc Tính</h5>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Thuộc Tính</th>
					<th width="200px">Tạo Lúc</th>
					<th width="120px">Trạng Thái</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@if (empty($attribute))
					<tr><td colspan="4"><center>Không Có Dữ Liệu</center></td></tr>
				@else
					@php recursionTableAttribute ($attribute) @endphp
				@endif
			</tbody>
		</table>
	</div>
</div>
@endsection