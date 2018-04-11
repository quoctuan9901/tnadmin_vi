@extends ('backend.master')
@section ('back',route('admin.news'))
@section ('title','Thêm Tin Tức')
@section ('controller','Tin Tức')
@section ('action','Thêm')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.news')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Thêm Tin Tức</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<div class="tabbable tab-content-bordered">
					<ul class="nav nav-tabs nav-tabs-highlight nav-justified">
						<li class="active"><a href="#bordered-justified-tab1" data-toggle="tab">Thông Tin</a></li>
						<li><a href="#bordered-justified-tab2" data-toggle="tab">Hình</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane has-padding active" id="bordered-justified-tab1">
							<div class="form-group">
								<label class="control-label">Tiêu Đề <span class="text-danger">*</span></label>
								<input type="text" id="name-slug" name="txtTitle" class="form-control" placeholder="Vui lòng nhập tiêu đề tin" value="{{ old('txtTitle') }}" />
							</div>
							<div class="form-group">
								<label class="control-label">Tác Giả</label>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
			                                <input type="text" name="txtNickname" class="form-control" placeholder="Vui lòng nhập tên tác giả" value="{{ old('txtNickname') }}" />
			                            </div>
									</div>
									@php $nickname = '' @endphp
									@if (empty(Auth::user()->firstname) && empty(Auth::user()->lastname))
										@php $nickname = 'Unknown' @endphp
									@else
										@php $nickname = Auth::user()->firstname . ' ' . Auth::user()->lastname @endphp
									@endif
									<div class="col-md-6">
										<div class="form-group">
			                                <input type="text" name="txtLoginName" class="form-control" placeholder="Vui lòng nhập tên đăng nhập" value="{{ $nickname }}" readonly />
			                            </div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Nguồn</label>
								<input type="text" name="txtOrigin" class="form-control" placeholder="Vui lòng nhập nguồn tin" value="{{ old('txtOrigin') }}" />
							</div>
							<div class="form-group">
								<label class="control-label">Tóm Tắt</label>
								<textarea name="txtIntro">{{ old('txtIntro') }}</textarea>
								<script type="text/javascript">
									 CKEDITOR.replace('txtIntro', { height: '200px' });
								</script>
							</div>
							<div class="form-group">
								<label class="control-label">Nội Dung</label>
								<textarea name="txtContent">{{ old('txtContent') }}</textarea>
								<script type="text/javascript">
									 CKEDITOR.replace('txtContent', { height: '400px' });
								</script>
							</div>
							<div class="form-group">
								<label class="control-label">Kết Bài</label>
								<textarea name="txtFoot">{{ old('txtFoot') }}</textarea>
								<script type="text/javascript">
									 CKEDITOR.replace('txtFoot', { height: '200px' });
								</script>
							</div>
							<div class="form-group">
								<label class="control-label">Tiêu Đề Không Dấu</label>
								<input type="text" id="txtSlug" name="txtSlug" class="form-control" placeholder="Vui lòng nhập tiêu đề không dấu" value="{{ old('txtSlug') }}" />
							</div>
							<div class="form-group" style="margin-bottom: 50px">
								<label class="control-label">Thẻ Tiêu Đề (Ví dụ : Từ Khóa Thứ Nhất - Từ Khóa Thứ Hai)</label>
								<input type="text" id="txtMetaTitle" name="txtMetaTitle" class="form-control col-lg-6 maxlength-textarea" maxlength="70" placeholder="Vui lòng nhập từ khóa thứ nhất - từ khóa thứ hai (SEO)" value="{{ old('txtMetaTitle') }}" />
							</div>
							<div class="form-group">
								<label class="control-label">Thẻ Từ Khóa</label>
								<input type="text" name="txtMetaKeywords" class="tags-input" placeholder="Vui lòng nhập thẻ từ khóa (SEO)" value="{{ old('txtMetaKeywords') }}" />
								<span class="help-block">Thẻ từ khóa không được quá 10 từ</span>
							</div>
							<div class="form-group">
								<label class="control-label">Thẻ Mô Tả</label>
								<textarea rows="3" name="txtMetaDescription" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Vui lòng nhập thẻ mô tả (SEO)">{{ old('txtMetaDescription') }}</textarea>
							</div>
						</div>

						<div class="tab-pane has-padding" id="bordered-justified-tab2">
							<div class="table-responsive">
								<table id="images" class="table table-bordered">
									<thead>
										<tr>
											<th width="150px">Hình</th>
											<th width="280">Chú Thích</th>
											<th width="85px">Khác</th>
											<th width="25px">Hoạt Động</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="3"></td>
											<td><button type="button" onclick="addImage();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Image"><i class="icon-add"></i></button></td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Thêm Tin Tức</h6>
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
					<label class="control-label">Thể Loại <span class="text-danger">*</span></label>
					<div class="well" id="scroll-category">
						@if (empty($category))
							Không có dữ liệu trong thể loại
						@else
							@php recursionList ($category,old('chkCategory')) @endphp
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Lượt Xem</label>
					<input type="text" name="txtViewed" class="form-control" placeholder="Please Enter Viewed Default" value="{{ old('txtViewed',100) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Link Youtube</label>
					<input type="text" name="txtVideo" class="form-control" placeholder="Please Enter Link Youtube" value="{{ old('txtVideo') }}" />
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
					<label class="control-label">Thẻ Robot</label>
					<select name="sltMetaRobot" class="form-control">
						<option value="noindex,follow" {{ (old('sltMetaRobot') == 'noindex,follow') ? "selected" : '' }}>Noindex, Follow</option>
						<option value="index,nofollow" {{ (old('sltMetaRobot') == 'index,nofollow') ? "selected" : '' }}>Index, Nofollow</option>
						<option value="noindex,nofollow" {{ (old('sltMetaRobot') == 'noindex,nofollow') ? "selected" : '' }}>Noindex, Nofollow</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Hình Chính </label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtImage') ? old('txtImage') :  asset('public/backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImage" id="main-image" value="{{ old('txtImage') ? old('txtImage') :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Xóa Hình</button>
					</center><br />
					<label class="control-label">Chú Thích Hình</label><br />
					<input type="text" name="txtAlt" class="form-control" placeholder="Vui lòng chú thích hình" value="{{ old('txtAlt') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Trạng Thái Tin</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="Online" data-off-text="Offline" class="switch" checked="checked" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Tin Nổi Bật</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkFeatured" data-on-color="success" data-off-color="danger" data-on-text="Featured" data-off-text="Unfeatured" class="switch" />
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
				<h6 class="panel-title">Thêm Tin Tức Tiếng Anh</h6>
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
					<input type="text" id="name-slug-en" name="txtTitleEn" class="form-control" placeholder="Vui lòng nhập tiêu đề tin" value="{{ old('txtTitleEn') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Tóm Tắt</label>
					<textarea name="txtIntroEn">{{ old('txtIntroEn') }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtIntroEn', { height: '200px' });
					</script>
				</div>
				<div class="form-group">
					<label class="control-label">Nội Dung</label>
					<textarea name="txtContentEn">{{ old('txtContentEn') }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtContentEn', { height: '400px' });
					</script>
				</div>
				<div class="form-group">
					<label class="control-label">Kết Bài</label>
					<textarea name="txtFootEn">{{ old('txtFootEn') }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtFootEn', { height: '200px' });
					</script>
				</div>
				<div class="form-group">
					<label class="control-label">Tiêu Đề Không Dấu</label>
					<input type="text" id="txtSlugEn" name="txtSlugEn" class="form-control" placeholder="Vui lòng nhập tiêu đề không dấu" value="{{ old('txtSlugEn') }}" />
				</div>
				<div class="form-group" style="margin-bottom: 50px">
					<label class="control-label">Thẻ Tiêu Đề (Ví dụ : Từ Khóa Thứ Nhất - Từ Khóa Thứ Hai)</label>
					<input type="text" id="txtMetaTitleEn" name="txtMetaTitleEn" class="form-control col-lg-6 maxlength-textarea" maxlength="70" placeholder="Vui lòng nhập từ khóa thứ nhất - từ khóa thứ hai (SEO)" value="{{ old('txtMetaTitleEn') }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Từ Khóa</label>
					<input type="text" name="txtMetaKeywordsEn" class="tags-input" placeholder="Vui lòng nhập thẻ từ khóa (SEO)" value="{{ old('txtMetaKeywordsEn') }}" />
					<span class="help-block">Thẻ từ khóa không được quá 10 từ</span>
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Mô Tả</label>
					<textarea rows="3" name="txtMetaDescriptionEn" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Vui lòng nhập thẻ mô tả (SEO)">{{ old('txtMetaDescriptionEn') }}</textarea>
				</div>
			</div>
		</div>
	</div>
	@endif
	@include ('backend.blocks.button_bottom',['exit' => route('admin.news')])
</form>
@endsection