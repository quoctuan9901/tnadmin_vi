@extends ('backend.master')
@section ('back',route('admin.dashboard.index'))
@section ('title','Sửa Thành Viên')
@section ('controller','Thành Viên')
@section ('action','Sửa Tài Khoản Của Tôi')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.dashboard.index')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Thành Viên</h6>
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
					<label class="control-label">Email (User Account) <span class="text-danger">*</span></label>
					<input type="email" name="txtEmail" class="form-control" placeholder="Vui lòng nhập email" value="{{ old('txtEmail',$user["email"]) }}" readonly="readonly" />
				</div>
				<div class="form-group">
					<label class="control-label">Mật Khẩu Cũ </label>
					<input type="password" name="txtOldPass" class="form-control" placeholder="Vui lòng nhập mật khẩu cũ" />
				</div>
				<div class="form-group">
					<label class="control-label">Mật Khẩu Mới </label>
					<input type="password" name="txtPass" class="form-control" placeholder="Vui lòng nhập mật khẩu mới" />
				</div>
				<div class="form-group">
					<label class="control-label">Lặp Lại Mật Khẩu </label>
					<input type="password" name="txtRePass" class="form-control" placeholder="Vui lòng nhập lại mật khẩu" />
				</div>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Thông Tin Thành Viên</h6>
				<div class="heading-elements">
					<ul class="icons-list">
	            		<li><a data-action="collapse" class=""></a></li>
	            		<li><a data-action="reload"></a></li>
	            		<li><a data-action="close"></a></li>
	            	</ul>
	        	</div>
			</div>

			<div class="panel-body" style="display: block;">
				<div class="form-group">
					<label class="control-label">Tên</label>
					<input type="text" name="txtFirstName" class="form-control" placeholder="Vui lòng nhập tên" value="{{ old('txtFirstName',$user["firstname"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Họ</label>
					<input type="text" name="txtLastName" class="form-control" placeholder="Vui lòng nhập họ" value="{{ old('txtLastName',$user["lastname"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Số Điện Thoại</label>
					<input type="text" name="txtPhone" class="form-control" placeholder="Vui lòng nhập số điện thoại" value="{{ old('txtPhone',$user["phone"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Địa Chỉ</label>
					<input type="text" name="txtAddress" class="form-control" placeholder="Vui lòng nhập địa chỉ" value="{{ old('txtAddress',$user["address"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Facebook</label>
					<input type="text" name="txtFacebook" class="form-control" placeholder="Nhập Link Facebook" value="{{ old('txtFacebook',$user["facebook"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Mô Tả </label>
					<textarea name="txtDescription">{{ old('txtDescription',$user["description"]) }}</textarea>
					<script type="text/javascript">
						 CKEDITOR.replace('txtDescription', { height: '200px' });
					</script>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Thành Viên</h6>
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
					<label class="control-label">Hình Đại Diện</label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtImage',$user["avatar"]) ? old('txtImage',$user["avatar"]) :  asset('public/backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImage" id="main-image" value="{{ old('txtImage',$user["avatar"]) ? old('txtImage',$user["avatar"]) :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Xóa Hình</button>
					</center>
				</div>
			</div>
		</div>
	</div>
	@include ('backend.blocks.button_bottom',['exit' => route('admin.dashboard.index')])
</form>
@endsection