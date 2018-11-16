@extends ('backend.master')
@section ('back',route('admin.pages'))
@section ('title','Sửa Trang')
@section ('controller','Trang')
@section ('action','Thêm')
@section ('content')
	<form action="" method="POST" accept-charset="utf-8">
		{{ csrf_field() }}

		@include ('backend.blocks.button',['exit' => route('admin.pages')])

		@include ('backend.blocks.alert')

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h6 class="panel-title">Sửa Trang</h6>
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
						<label class="control-label">Trang <span class="text-danger">*</span></label>
						<input type="text" name="txtPage" class="form-control" placeholder="Nhập tên trang" value="{{ old('txtPage',$page["name"]) }}" />
					</div>
				</div>
			</div>
		</div>

		@include ('backend.blocks.button_bottom',['exit' => route('admin.pages')])
	</form>
@endsection