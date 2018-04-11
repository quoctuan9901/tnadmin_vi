@extends ('backend.master')
@section ('back',route('admin.user'))
@section ('title','Sửa Thành Viên')
@section ('controller','Thành Viên')
@section ('action','Sửa')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.user')])

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
					<label class="control-label col-lg-12" style="padding-left:0px">Mật Khẩu <span class="text-danger">*</span></label>
					<div class="col-lg-9" style="padding-left:0px">
						<div class="label-indicator">
							<input type="text" name="txtPass" class="form-control" placeholder="Vui lòng nhập mật khẩu" value="{{ old('txtPass') }}" />
							<span class="label label-block password-indicator-label"></span>
						</div>
					</div>
					<div class="col-lg-3">
						<button type="button" class="btn btn-info generate-label">Tạo 15 Ký Tự</button>
					</div>
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
				@php $disabled_level = ''; @endphp
				@if ($user["id"] == Auth::user()->id)
					@php $disabled_level = 'disabled'; @endphp
				@endif
				<div class="form-group">
					<label class="control-label">Cấp Độ</label>
					<select name="sltLevel" class="form-control" {{ $disabled_level }}>
						<option value="2" {{ (old('sltLevel',$user["level"]) == '2') ? 'selected' : '' }}>Thành Viên</option>
						<option value="1" {{ (old('sltLevel',$user["level"]) == '1') ? 'selected' : '' }}>Quản Trị</option>
					</select>
				</div>
				
				@php $disabled_role = ''; @endphp
				@if (Auth::user()->id != 1)
					@php $disabled_role = 'disabled'; @endphp
				@endif
				<div class="form-group">
					<label class="control-label">Vai Trò</label>
					<select name="sltRole" class="form-control" {{ $disabled_role }}>
						<option value="">Vui Lòng Chọn Vai Trò Của Admin</option>
						@foreach ($roles as $role)
						<option value="{{ $role["id"] }}" {{ (old('sltRole',$user["role_id"]) == $role["id"]) ? 'selected' : '' }}>{{ $role["name"] }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Hình Đại Diện</label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtImage',$user["avatar"]) ? old('txtImage',$user["avatar"]) :  asset('public/backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImage" id="main-image" value="{{ old('txtImage',$user["avatar"]) ? old('txtImage',$user["avatar"]) :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Xóa Hình</button>
					</center>
				</div>
				@if ($user["id"] != Auth::user()->id)
				<div class="form-group">
					<label class="control-label">Trạng Thái Thành Viên</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="Online" data-off-text="Offline" class="switch switch_list" data-table="users" data-col="status" data-id="{{ $user["id"] }}" {{ $user["status"] == "on" ? "checked" : "" }} />
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
	@include ('backend.blocks.button_bottom',['exit' => route('admin.user')])
</form>
@endsection