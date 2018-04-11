@extends ('backend.master')
@section ('back',route('admin.banner'))
@section ('title','Thêm Banner')
@section ('controller','Banner')
@section ('action','Thêm')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.banner')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Thêm Banner</h6>
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
					<label class="control-label">Tên Banner <span class="text-danger">*</span></label>
					<input type="text" id="name-slug" name="txtName" class="form-control" placeholder="Vui lòng nhập tên banner" value="{{ old('txtName') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Đường Dẫn </label>
					<input type="text" name="txtLink" class="form-control" placeholder="Vui lòng nhập đường dẫn banner" value="{{ old('txtLink') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Mã Script</label>
					<textarea name="txtScript" class="form-control">{{ old('txtScript') }}</textarea>
				</div>
				<div class="form-group">
					<label class="control-label">Mô Tả</label>
					<textarea name="txtDescription">{{ old('txtDescription') }}</textarea>
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
				<h6 class="panel-title">Thêm Banner</h6>
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
					<label class="control-label">Vị Trí Banner <span class="text-danger">*</span></label>
					<select name="sltPosition" class="form-control">
						<option value="">---------------- ROOT ----------------</option>
						@php recursionSelect($position,old('sltPosition')) @endphp
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Quyền Truy Cập</label>
					<select name="sltAccess" class="form-control">
						<option value="0" {{ (old('sltAccess') == '0') ? 'selected' : '' }}>Cộng Đồng</option>
						<option value="1" {{ (old('sltAccess') == '1') ? 'selected' : '' }}>Quản Trị</option>
						<option value="2" {{ (old('sltAccess') == '2') ? 'selected' : '' }}>Thành Viên</option>
						<option value="3" {{ (old('sltAccess') == '3') ? 'selected' : '' }}>Khách</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Phương Thức Mở</label>
					<select name="sltTarget" class="form-control">
						<option value="_self" {{ (old('sltTarget') == '_self') ? 'selected' : '' }}>The same frame (_self)</option>
						<option value="_blank" {{ (old('sltTarget') == '_blank') ? 'selected' : '' }}>New window or tab (_blank)</option>
						<option value="_parent" {{ (old('sltTarget') == '_parent') ? 'selected' : '' }}>The parent frame (_parent)</option>
						<option value="_top" {{ (old('sltTarget') == '_top') ? "selected" : '' }}>The full body of the window (_top)</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Hình Chính<span class="text-danger">*</span></label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtImage') ? old('txtImage') :  asset('public/backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImage" id="main-image" value="{{ old('txtImage') ? old('txtImage') :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Xóa Hình</button>
					</center><br />
					<label class="control-label">Chú Thích Hình <span class="text-danger">*</span></label><br />
					<input type="text" name="txtAlt" class="form-control" placeholder="Vui lòng chú thích hình" value="{{ old('txtAlt') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Trạng thái Banner</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="Online" data-off-text="Offline" class="switch" checked="checked" />
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr />

	@if (env('APP_LANG'))
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Thêm Banner Tiếng Anh</h6>
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
					<label class="control-label">Tên Banner <span class="text-danger">*</span></label>
					<input type="text" id="name-slug-en" name="txtNameEn" class="form-control" placeholder="Vui lòng nhập tên banner" value="{{ old('txtNameEn') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Đường Dẫn </label>
					<input type="text" name="txtLinkEn" class="form-control" placeholder="Vui lòng nhập đường dẫn banner" value="{{ old('txtLinkEn') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Mô Tả</label>
					<textarea name="txtDescriptionEn">{{ old('txtDescriptionEn') }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtDescriptionEn', { height: '200px' });
					</script>
				</div>
			</div>
		</div>
	</div>
	@endif

	@include ('backend.blocks.button_bottom',['exit' => route('admin.banner')])
</form>
@endsection