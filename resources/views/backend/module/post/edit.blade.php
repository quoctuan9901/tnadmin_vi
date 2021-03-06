@extends ('backend.master')
@section ('back',route('admin.post'))
@section ('title','Sửa Bài Đăng')
@section ('controller','Bài Đăng')
@section ('action','Sửa')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.post')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Bài Đăng</h6>
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
					<label class="control-label">Tiêu Đề <span class="text-danger">*</span></label>
					<input type="text" id="name-slug" name="txtTitle" class="form-control" placeholder="Vui lòng nhập tiêu đề" value="{{ old('txtTitle',$post["title"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Nội Dung</label>
					<textarea name="txtContent">{{ old('txtContent',$post["content"]) }}</textarea>
					<script type="text/javascript">
						 CKEDITOR.replace('txtContent', { height: '400px' });
					</script>
				</div>
				<div class="form-group">
					<label class="control-label">Tiêu Đề Không Dấu</label>
					<input type="text" id="txtSlug" name="txtSlug" class="form-control" placeholder="Vui lòng nhập tiêu đề không dấu" value="{{ old('txtSlug',$post["slug"]) }}" />
				</div>
				<div class="form-group" style="margin-bottom: 50px">
					<label class="control-label">Thẻ Tiêu Đề (Ví dụ : Từ Khóa Thứ Nhất - Từ Khóa Thứ Hai)</label>
					<input type="text" id="txtMetaTitle" name="txtMetaTitle" class="form-control col-lg-6 maxlength-textarea" maxlength="70" placeholder="Vui lòng nhập từ khóa thứ nhất - từ khóa thứ hai (SEO)" value="{{ old('txtMetaTitle',$post["title_tag"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Từ Khóa</label>
					<input type="text" name="txtMetaKeywords" class="tags-input" placeholder="Please Enter Meta Keywords Tag (SEO)" value="{{ old('txtMetaKeywords',$post["meta_keywords_tag"]) }}" />
					<span class="help-block">Thẻ từ khóa không được quá 10 từ</span>
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Mô Tả</label>
					<textarea rows="3" name="txtMetaDescription" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Vui lòng nhập thẻ mô tả (SEO)">{{ old('txtMetaDescription',$post["meta_description_tag"]) }}</textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Bài Đăng</h6>
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
					<label class="control-label">Lượt Xem</label>
					<input type="text" name="txtViewed" class="form-control" placeholder="Nhập lượt xem" value="{{ old('txtViewed',$post["viewed"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Link Youtube</label>
					<input type="text" name="txtVideo" class="form-control" placeholder="Nhập Link Youtube" value="{{ old('txtVideo',$post["youtube"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Quyền Truy Cập</label>
					<select name="sltAccess" class="form-control">
						<option value="0" {{ (old('sltAccess',$post["access"]) == '0') ? 'selected' : '' }}>Cộng Đồng</option>
						<option value="1" {{ (old('sltAccess',$post["access"]) == '1') ? 'selected' : '' }}>Quản Trị</option>
						<option value="2" {{ (old('sltAccess',$post["access"]) == '2') ? 'selected' : '' }}>Thành Viên</option>
						<option value="3" {{ (old('sltAccess',$post["access"]) == '3') ? 'selected' : '' }}>Khách</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Phương Thức Mở</label>
					<select name="sltTarget" class="form-control">
						<option value="_self" {{ (old('sltTarget',$post["target_open"]) == '_self') ? 'selected' : '' }}>The same frame (_self)</option>
						<option value="_blank" {{ (old('sltTarget',$post["target_open"]) == '_blank') ? 'selected' : '' }}>New window or tab (_blank)</option>
						<option value="_parent" {{ (old('sltTarget',$post["target_open"]) == '_parent') ? 'selected' : '' }}>The parent frame (_parent)</option>
						<option value="_top" {{ (old('sltTarget',$post["target_open"]) == '_top') ? "selected" : '' }}>The full body of the window (_top)</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Robot</label>
					<select name="sltMetaRobot" class="form-control">
						<option value="noindex,follow" {{ (old('sltMetaRobot',$post["meta_robot"]) == 'noindex,follow') ? "selected" : '' }}>Noindex, Follow</option>
						<option value="index,nofollow" {{ (old('sltMetaRobot',$post["meta_robot"]) == 'index,nofollow') ? "selected" : '' }}>Index, Nofollow</option>
						<option value="noindex,nofollow" {{ (old('sltMetaRobot',$post["meta_robot"]) == 'noindex,nofollow') ? "selected" : '' }}>Noindex, Nofollow</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Hình Chính</label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtImage',$post["image"]) ? old('txtImage',$post["image"]) :  asset('public/backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImage" id="main-image" value="{{ old('txtImage',$post["image"]) ? old('txtImage',$post["image"]) :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Xóa Hình</button>
					</center><br />
					<label class="control-label">Chú Thích Hình</label><br />
					<input type="text" name="txtAlt" class="form-control" placeholder="Vui lòng nhập chú thích hình" value="{{ old('txtAlt',$post["alt"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Trạng Thái Bài Đăng</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="Online" data-off-text="Offline" class="switch switch_list" data-table="post" data-col="status" data-id="{{ $post["id"] }}" {{ $post["status"] == "on" ? "checked" : "" }} />
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
					<h6 class="panel-title">Thêm Bài Đăng Tiếng Anh</h6>
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
						<label class="control-label">Tiêu Đề <span class="text-danger">*</span></label>
						<input type="text" id="name-slug-en" name="txtTitleEn" class="form-control" placeholder="Vui lòng nhập tiêu đề" value="{{ old('txtTitleEn',$post["title_en"]) }}" />
					</div>
					<div class="form-group">
						<label class="control-label">Nội Dung</label>
						<textarea name="txtContentEn">{{ old('txtContentEn',$post["content_en"]) }}</textarea>
						<script type="text/javascript">
                            CKEDITOR.replace('txtContentEn', { height: '400px' });
						</script>
					</div>
					<div class="form-group">
						<label class="control-label">Tiêu Đề Không Dấu</label>
						<input type="text" id="txtSlugEn" name="txtSlugEn" class="form-control" placeholder="Vui lòng nhập tiêu đề không dấu" value="{{ old('txtSlugEn',$post["slug_en"]) }}" />
					</div>
					<div class="form-group" style="margin-bottom: 50px">
						<label class="control-label">Thẻ Tiêu Đề (Ví dụ : Từ Khóa Thứ Nhất - Từ Khóa Thứ Hai)</label>
						<input type="text" id="txtMetaTitleEn" name="txtMetaTitleEn" class="form-control col-lg-6 maxlength-textarea" maxlength="70" placeholder="Please Enter Primary Keyword - Secondary Keyword (SEO)" value="{{ old('txtMetaTitleEn',$post["title_tag_en"]) }}" />
					</div>
					<div class="form-group">
						<label class="control-label">Thẻ Từ Khóa</label>
						<input type="text" name="txtMetaKeywordsEn" class="tags-input" placeholder="Vui lòng nhập thẻ từ khóa (SEO)" value="{{ old('txtMetaKeywordsEn',$post["meta_keywords_tag_en"]) }}" />
						<span class="help-block">Thẻ từ khóa không được quá 10 từ</span>
					</div>
					<div class="form-group">
						<label class="control-label">Thẻ Mô Tả</label>
						<textarea rows="3" name="txtMetaDescriptionEn" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Vui lòng nhập thẻ mô tả (SEO)">{{ old('txtMetaDescriptionEn',$post["meta_description_tag_en"]) }}</textarea>
					</div>
				</div>
			</div>
		</div>
	@endif

	@include ('backend.blocks.button_bottom',['exit' => route('admin.post')])
</form>
@endsection