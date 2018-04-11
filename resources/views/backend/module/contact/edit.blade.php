@extends ('backend.master')
@section ('back',route('admin.contact'))
@section ('title','Sửa Liên Hệ')
@section ('controller','Liên Hệ')
@section ('action','Sửa')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.contact')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Liên Hệ</h6>
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
					<label class="control-label">Tên <span class="text-danger">*</span></label>
					<input type="text" name="txtName" class="form-control" placeholder="Vui lòng nhập tên" value="{{ old('txtName',$contact["name"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Địa Chỉ</label>
					<input type="text" name="txtAddress" class="form-control" placeholder="Vui lòng nhập địa chỉ" value="{{ old('txtAddress',$contact["address"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Số Điện Thoại</label>
					<input type="text" name="txtPhone" class="form-control" placeholder="Vui lòng nhập số điện thoại" value="{{ old('txtPhone',$contact["phone"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Số Fax</label>
					<input type="text" name="txtFax" class="form-control" placeholder="Vui lòng nhập số Fax" value="{{ old('txtFax',$contact["fax"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Email</label>
					<input type="email" name="txtEmail" class="form-control" placeholder="Vui lòng nhập địa chỉ Email" value="{{ old('txtEmail',$contact["email"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Skype</label>
					<input type="text" name="txtSkype" class="form-control" placeholder="Vui lòng nhập Skype" value="{{ old('txtSkype',$contact["skype"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Facebook</label>
					<input type="text" name="txtFacebook" class="form-control" placeholder="Vui lòng nhập Facebook" value="{{ old('txtFacebook',$contact["facebook"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Thời Gian Làm Việc</label>
					<input type="text" name="txtTimeWork" class="form-control" placeholder="Vui lòng nhập thời gian làm việc" value="{{ old('txtTimeWork',$contact["timework"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Bản Đồ</label>
					<textarea name="txtMap" class="form-control">{{ old('txtMap',$contact["map"]) }}</textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Liên Hệ</h6>
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
					<label class="control-label">Hình Chính</label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtImage',$contact["image"]) ? old('txtImage',$contact["image"]) :  asset('public/backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImage" id="main-image" value="{{ old('txtImage',$contact["image"]) ? old('txtImage',$contact["image"]) :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Xóa Hình</button>
					</center>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection