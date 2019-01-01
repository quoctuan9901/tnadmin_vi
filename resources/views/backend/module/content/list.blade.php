@extends ('backend.master')
@section ('back',route('admin.content.index',['page' => $page["id"]]))
@section ('title','Danh Sách Nội Dung')
@section ('controller','Nội Dung')
@section ('action','Danh Sách')
@section ('content')
@include ('backend.blocks.alert')
<div class="col-md-12">
	<div class="panel panel-body border-top-primary text-left">
		<a href="{{ route('admin.content.create',['page' => $page["id"]])  }}" class="btn btn-success btn-labeled"><b><i class="icon-close2"></i></b> Thêm</a>
	</div>
</div>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Danh Sách Nội Dung: {{ $page["name"] }}</h5>
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
					<th>Code</th>
					<th>Nội dung tiếng Việt</th>
					<th>Nội dung tiếng Anh</th>
					<th width="100px">Hoạt Động</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($content as $c)
				<tr>
					<td>{{ $c["code"] }}</td>
					<td><a href="{{ route('admin.content.edit',['page' => $page["id"],'id' => $c["id"]]) }}" target="_blank">{{ $c["content_vi"] }}</a></td>
					<td><a href="{{ route('admin.content.edit',['page' => $page["id"],'id' => $c["id"]]) }}" target="_blank">{{ $c["content_en"] }}</a></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="text-primary-600"><a href="{{ route('admin.content.edit',['page' => $page["id"],'id' => $c["id"]]) }}" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
							<li class="text-danger-600"><a href="{{ route('admin.content.destroy',['page' => $page["id"],'id' => $c["id"]]) }}" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection