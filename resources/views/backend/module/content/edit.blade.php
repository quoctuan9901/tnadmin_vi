@extends ('backend.master')
@section ('back',route('admin.content.index',['page' => $page["id"]]))
@section ('title','Sửa Nội Dung Trang')
@section ('controller','Nội Dung Trang')
@section ('action','Sửa')
@section ('content')
	<form action="" method="POST" accept-charset="utf-8">
		{{ csrf_field() }}

		@include ('backend.blocks.button',['exit' => route('admin.content.index',['page' => $page["id"]])])

		@include ('backend.blocks.alert')

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h6 class="panel-title">Sửa Nội Dung Trang: {{ $page["name"] }}</h6>
					<div class="heading-elements">
						<ul class="icons-list">
							<li><a data-action="collapse"></a></li>
							<li><a data-action="reload"></a></li>
							<li><a data-action="close"></a></li>
						</ul>
					</div>
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label class="control-label">Code <span class="text-danger">*</span></label>
						<input type="text" name="txtCode" class="form-control" placeholder="Nhập mã code" value="{{ old('txtCode',$content["code"]) }}" />
					</div>
					<div class="form-group">
						<label class="control-label">Tiếng Việt <span class="text-danger">*</span></label>
						<input type="text" name="txtContentVi" class="form-control" placeholder="Nhập nội dung trang tiếng Việt" value="{{ old('txtContentVi',$content["content_vi"]) }}" />
					</div>
					@if (env('APP_LANG'))
					<div class="form-group">
						<label class="control-label">Tiếng Anh <span class="text-danger">*</span></label>
						<input type="text" name="txtContentEn" class="form-control" placeholder="Nhập nội dung trang tiếng Anh" value="{{ old('txtContentEn',$content["content_en"]) }}" />
					</div>
					@endif
				</div>
			</div>
		</div>

		@include ('backend.blocks.button_bottom',['exit' => route('admin.content.index',['page' => $page["id"]])])
	</form>
@endsection