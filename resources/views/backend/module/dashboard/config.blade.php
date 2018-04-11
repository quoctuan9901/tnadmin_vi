@extends ('backend.master')
@section ('back',route('admin.dashboard.index'))
@section ('title','Cập Nhật Cấu Hình')
@section ('controller','Cấu Hình')
@section ('action','Cập Nhật')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.dashboard.index')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Cập Nhật Cấu Hình</h6>
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
					<label class="control-label">Tên Website<span class="text-danger">*</span></label>
					<input type="text" name="txtNameSite" class="form-control" placeholder="Vui lòng nhập tên Website" value="{{ old('txtNameSite',$config['name_site']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Tiêu Đề Website<span class="text-danger">*</span></label>
					<input type="text" name="txtSiteTitle" class="form-control" placeholder="Vui lòng nhập tiêu đề Website" value="{{ old('txtSiteTitle',$config['title']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Từ Khóa <span class="text-danger">*</span></label>
					<input type="text" name="txtMetaKeywords" class="tags-input" placeholder="Vui lòng nhập thẻ từ khóa (SEO)" value="{{ old('txtMetaKeywords',$config['keywords']) }}" />
					<span class="help-block">Thẻ từ khóa không được quá 10 từ</span>
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Mô Tả <span class="text-danger">*</span></label>
					<textarea rows="3" name="txtMetaDescription" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Vui lòng nhập thẻ mô tả (SEO)">{{ old('txtMetaDescription',$config['description']) }}</textarea>
				</div>
				<hr />
				<div class="form-group">
					<label class="control-label">Host (Mail) :</label>
					<input type="text" name="txtHost" class="form-control" placeholder="Vui lòng nhập Host" value="{{ old('txtHost',$config['host']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Tên Đăng Nhập (Mail) :</label>
					<input type="text" name="txtUsername" class="form-control" placeholder="Vui lòng nhập tên đăng nhập" value="{{ old('txtUsername',$config['email']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Mật Khẩu (Mail) :</label>
					<input type="text" name="txtPassword" class="form-control" placeholder="Vui lòng nhập mật khẩu" value="{{ old('txtPassword',$config['pass']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Port (Mail) :</label>
					<input type="text" name="txtPort" class="form-control" placeholder="Vui lòng nhập port" value="{{ old('txtPort',$config['port']) }}" />
				</div>
				<hr />
				<div class="form-group">
					<label class="control-label">Số tin trong một trang <span class="text-danger">*</span></label>
					<input type="text" name="txtItemNews" class="form-control" placeholder="Vui lòng nhập số tin" value="{{ old('txtItemNews',$config['item_page_news']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Số sản phẩm trong một trang <span class="text-danger">*</span></label>
					<input type="text" name="txtItemProduct" class="form-control" placeholder="Vui lòng nhập số sản phẩm" value="{{ old('txtItemProduct',$config['item_page_product']) }}" />
				</div>
				<hr />
				<div class="form-group">
					<label class="control-label">Email Liên Hệ</label>
					<input type="text" name="txtContactEmail" class="form-control" placeholder="Vui lòng nhập email liên hệ" value="{{ old('txtContactEmail',$config['contact_email']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Số Điện Thoại Liên Hệ</label>
					<input type="text" name="txtContactPhone" class="form-control" placeholder="Vui lòng nhập số điện thoại liên hệ" value="{{ old('txtContactPhone',$config['contact_phone']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Địa Chỉ Liên Hệ</label>
					<input type="text" name="txtContactAddress" class="form-control" placeholder="Vui lòng nhập địa chỉ liên hệ" value="{{ old('txtContactAddress',$config['contact_address']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Facebook</label>
					<input type="text" name="txtFacebook" class="form-control" placeholder="Nhập tên Facebook" value="{{ old('txtFacebook',$config['facebook']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Youtube</label>
					<input type="text" name="txtYoutube" class="form-control" placeholder="Nhập tên Youtube" value="{{ old('txtYoutube',$config['youtube']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Twitter</label>
					<input type="text" name="txtTwitter" class="form-control" placeholder="Nhập tên Twitter" value="{{ old('txtTwitter',$config['twitter']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Linkedin</label>
					<input type="text" name="txtLinkedin" class="form-control" placeholder="Nhập tên Linkedin" value="{{ old('txtLinkedin',$config['linkedin']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Google Plus</label>
					<input type="text" name="txtGooglePlus" class="form-control" placeholder="Nhập tên Google Plus" value="{{ old('txtGooglePlus',$config['google_plus']) }}" />
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Cập Nhật Cấu Hình</h6>
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
					<label class="control-label">Bản Quyền <span class="text-danger">*</span></label>
					<input type="text" name="txtCopyright" class="form-control" placeholder="Vui lòng nhập bản quyền" value="{{ old('txtCopyright',$config['copyright']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Tác Giả <span class="text-danger">*</span></label>
					<input type="text" name="txtAuthor" class="form-control" placeholder="Vui lòng nhập tên tác giả" value="{{ old('txtAuthor',$config['author']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Tạo Lúc <span class="text-danger">*</span></label>
					<input type="text" name="txtCreated" class="form-control" placeholder="Vui lòng nhập thời gian tạo Website" value="{{ old('txtCreated',$config['dc_created']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Right Copyright <span class="text-danger">*</span></label>
					<input type="text" name="txtRightCopyright" class="form-control" placeholder="Vui lòng nhập Right Copyright" value="{{ old('txtRightCopyright',$config['dc_rights_copyright']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Tên Người Tạo <span class="text-danger">*</span></label>
					<input type="text" name="txtCreatorName" class="form-control" placeholder="Vui lòng nhập tên người tạo" value="{{ old('txtCreatorName',$config['dc_creator_name']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Email Người Tạo <span class="text-danger">*</span></label>
					<input type="text" name="txtCreatorEmail" class="form-control" placeholder="Vui lòng nhập email người tạo" value="{{ old('txtCreatorEmail',$config['dc_creator_email']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Định Danh <span class="text-danger">*</span></label>
					<input type="text" name="txtIdentifier" class="form-control" placeholder="Vui lòng nhập tên định danh" value="{{ old('txtIdentifier',$config['dc_identifier']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Ngôn Ngữ <span class="text-danger">*</span></label>
					<input type="text" name="txtLanguage" class="form-control" placeholder="Vui lòng nhập ngôn ngữ" value="{{ old('txtLanguage',$config['dc_language']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Địa Điểm <span class="text-danger">*</span></label>
					<input type="text" name="txtPlacename" class="form-control" placeholder="Vui lòng nhập tên địa điểm" value="{{ old('txtPlacename',$config['geo_placename']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Khu Vực <span class="text-danger">*</span></label>
					<input type="text" name="txtRegion" class="form-control" placeholder="Vui lòng nhập tên khu vực" value="{{ old('txtRegion',$config['geo_region']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Vị Trí <span class="text-danger">*</span></label>
					<input type="text" name="txtPositionGeo" class="form-control" placeholder="Vui lòng nhập vị trí" value="{{ old('txtPosition',$config['geo_position']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">ICBM <span class="text-danger">*</span></label>
					<input type="text" name="txtICBM" class="form-control" placeholder="Nhập ICBM" value="{{ old('txtICBM',$config['icbm']) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Xem Lại Sau <span class="text-danger">*</span></label>
					<input type="text" name="txtRevisitAfter" class="form-control" placeholder="Nhập Xem Lại Sau" value="{{ old('txtRevisitAfter',$config['revisit_after']) }}" />
				</div>

				<div class="form-group">
					<label class="control-label">Thẻ Robot</label>
					<select name="sltMetaRobot" class="form-control">
						<option value="noindex,follow" {{ (old('sltMetaRobot',$config['robots']) == 'noindex,follow') ? "selected" : '' }}>NOINDEX, FOLLOW</option>
						<option value="index,nofollow" {{ (old('sltMetaRobot',$config['robots']) == 'index,nofollow') ? "selected" : '' }}>INDEX, NOFOLLOW</option>
						<option value="noindex,nofollow" {{ (old('sltMetaRobot',$config['robots']) == 'noindex,nofollow') ? "selected" : '' }}>NOINDEX, NOFOLLOW</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Logo Website <span class="text-danger">*</span></label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtLogo',$config["logo"]) ? old('txtLogo',$config["logo"]) :  asset('backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtLogo" id="main-image" value="{{ old('txtLogo',$config["logo"]) ? old('txtLogo',$config["logo"]) :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Xóa Hình</button>
					</center>
				</div>
				<div class="form-group">
					<label class="control-label">Lỗi Hình </label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image-error" src="{{ old('txtImageError',$config["no_photo"]) ? old('txtImageError',$config["no_photo"]) :  asset('backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImageError" id="main-image-error" value="{{ old('txtImageError',$config["no_photo"]) ? old('txtImageError',$config["no_photo"]) :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Xóa Hình</button>
					</center>
				</div>
			</div>
		</div>
	</div>
	@include ('backend.blocks.button_bottom',['exit' => route('admin.dashboard.index')])
</form>
@endsection