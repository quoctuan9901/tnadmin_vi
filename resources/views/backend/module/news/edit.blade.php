@extends ('backend.master')
@section ('back',route('admin.news'))
@section ('title','Sửa Tin Tức')
@section ('controller','Tin Tức')
@section ('action','Sửa')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.news')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Tin Tức</h6>
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
								<input type="text" id="name-slug" name="txtTitle" class="form-control" placeholder="Vui lòng nhập tiêu đề tin" value="{{ old('txtTitle',$news["title"]) }}" />
							</div>
							<div class="form-group">
								<label class="control-label">Tác Giả</label>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
			                                <input type="text" name="txtNickname" class="form-control" placeholder="Nhập tên tác giả" value="{{ old('txtNickname',$news["author"]) }}" />
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
								<label class="control-label">Origin</label>
								<input type="text" name="txtOrigin" class="form-control" placeholder="Please Enter News Origin" value="{{ old('txtOrigin',$news["origin"]) }}" />
							</div>
							<div class="form-group">
								<label class="control-label">Nguồn</label>
								<textarea name="txtIntro">{{ old('txtIntro',$news["intro"]) }}</textarea>
								<script type="text/javascript">
									 CKEDITOR.replace('txtIntro', { height: '200px' });
								</script>
							</div>
							<div class="form-group">
								<label class="control-label">Nội Dung</label>
								<textarea name="txtContent">{{ old('txtContent',$news["content"]) }}</textarea>
								<script type="text/javascript">
									 CKEDITOR.replace('txtContent', { height: '400px' });
								</script>
							</div>
							<div class="form-group">
								<label class="control-label">Kết Bài</label>
								<textarea name="txtFoot">{{ old('txtFoot',$news["foot"]) }}</textarea>
								<script type="text/javascript">
									 CKEDITOR.replace('txtFoot', { height: '200px' });
								</script>
							</div>
							<div class="form-group">
								<label class="control-label">Tiêu Đề Không Dấu</label>
								<input type="text" id="txtSlug" name="txtSlug" class="form-control" placeholder="Vui lòng nhập tiêu đề không dấu" value="{{ old('txtSlug',$news["slug"]) }}" />
							</div>
							<div class="form-group" style="margin-bottom: 50px">
								<label class="control-label">Thẻ Tiêu Đề (Ví dụ : Từ Khóa Thứ Nhất - Từ Khóa Thứ Hai)</label>
								<input type="text" id="txtMetaTitle" name="txtMetaTitle" class="form-control col-lg-6 maxlength-textarea" maxlength="70" placeholder="Vui lòng nhập từ khóa thứ nhất - từ khóa thứ hai (SEO)" value="{{ old('txtMetaTitle',$news["title_tag"]) }}" />
							</div>
							<div class="form-group">
								<label class="control-label">Thẻ Từ Khóa</label>
								<input type="text" name="txtMetaKeywords" class="tags-input" placeholder="Vui lòng nhập thẻ từ khóa (SEO)" value="{{ old('txtMetaKeywords',$news["meta_keywords_tag"]) }}" />
								<span class="help-block">Thẻ từ khóa không được quá 10 từ</span>
							</div>
							<div class="form-group">
								<label class="control-label">Thẻ Mô Tả</label>
								<textarea rows="3" name="txtMetaDescription" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Please Enter Meta Description Tag (SEO)">{{ old('txtMetaDescription',$news["meta_description_tag"]) }}</textarea>
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
										@php $id_img = 100 @endphp
										@foreach($images as $img)
										<tr id="image-row{{ $id_img }}">
									    	<td class="text-left"><a id="thumb-image{{ $id_img }}"data-toggle="image" class="img-thumbnail"><img class="upload-image" src="{{ $img["images"] }}" id="img-detail-{{ $id_img }}" width="100px" height="100px" /><input type="hidden" name="post_image[{{ $id_img }}][image]" value="{{ $img["images"] }}" id="input-image-{{ $id_img }}" /></td>
									    	<td class="text-right"><input type="text" name="post_image[{{ $id_img }}][alt]" placeholder="Alt Image" class="form-control" value="{{ $img["alt"] }}" /></td>
									    	<td class="text-right"><input type="text" name="post_image[{{ $id_img }}][sort_order]" placeholder="Sort Order" class="form-control" value="{{ $img["position"] }}" /></td>
									    	<td class="text-left"><button type="button" onclick="$('#image-row{{ $id_img }}').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="icon-close2"></i></button></td>
									    </tr>
									    	@php $id_img++ @endphp
									    @endforeach
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
				<h6 class="panel-title">Sửa Tin Tức</h6>
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
							@php recursionList ($category,old('chkCategory',$category_check)) @endphp
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Lượt Xem</label>
					<input type="text" name="txtViewed" class="form-control" placeholder="Please Enter Viewed Default" value="{{ old('txtViewed',$news["viewed"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Link Youtube</label>
					<input type="text" name="txtVideo" class="form-control" placeholder="Please Enter Link Youtube" value="{{ old('txtVideo',$news["youtube"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Quyền Truy Cập</label>
					<select name="sltAccess" class="form-control">
						<option value="0" {{ (old('sltAccess',$news["access"]) == '0') ? 'selected' : '' }}>Cộng Đồng</option>
						<option value="1" {{ (old('sltAccess',$news["access"]) == '1') ? 'selected' : '' }}>Quản Trị</option>
						<option value="2" {{ (old('sltAccess',$news["access"]) == '2') ? 'selected' : '' }}>Thành Viên</option>
						<option value="3" {{ (old('sltAccess',$news["access"]) == '3') ? 'selected' : '' }}>Khách</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Phương Thức Mở</label>
					<select name="sltTarget" class="form-control">
						<option value="_self" {{ (old('sltTarget',$news["target_open"]) == '_self') ? 'selected' : '' }}>The same frame (_self)</option>
						<option value="_blank" {{ (old('sltTarget',$news["target_open"]) == '_blank') ? 'selected' : '' }}>New window or tab (_blank)</option>
						<option value="_parent" {{ (old('sltTarget',$news["target_open"]) == '_parent') ? 'selected' : '' }}>The parent frame (_parent)</option>
						<option value="_top" {{ (old('sltTarget',$news["target_open"]) == '_top') ? "selected" : '' }}>The full body of the window (_top)</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Robot</label>
					<select name="sltMetaRobot" class="form-control">
						<option value="noindex,follow" {{ (old('sltMetaRobot',$news["meta_robot"]) == 'noindex,follow') ? "selected" : '' }}>Noindex, Follow</option>
						<option value="index,nofollow" {{ (old('sltMetaRobot',$news["meta_robot"]) == 'index,nofollow') ? "selected" : '' }}>Index, Nofollow</option>
						<option value="noindex,nofollow" {{ (old('sltMetaRobot',$news["meta_robot"]) == 'noindex,nofollow') ? "selected" : '' }}>Noindex, Nofollow</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Hình Chính </label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtImage',$news["image"]) ? old('txtImage',$news["image"]) :  asset('public/backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImage" id="main-image" value="{{ old('txtImage',$news["image"]) ? old('txtImage',$news["image"]) :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Xóa Hình</button>
					</center><br />
					<label class="control-label">Chú Thích Hình </label><br />
					<input type="text" name="txtAlt" class="form-control" placeholder="Vui lòng nhập chú thích hình" value="{{ old('txtAlt',$news["alt"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Trạng Thái Tin</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="Online" data-off-text="Offline" class="switch switch_list" data-table="news" data-col="status" data-id="{{ $news["id"] }}" {{ $news["status"] == "on" ? "checked" : "" }} />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Tin Nổi Bật</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkFeatured" data-on-color="success" data-off-color="danger" data-on-text="Featured" data-off-text="Unfeatured" class="switch switch_list" data-table="news" data-col="featured" data-id="{{ $news["id"] }}" {{ $news["featured"] == "on" ? "checked" : "" }} />
					</div>
				</div>
			</div>
		</div>
	</div>

	@if (env('APP_LANG'))
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Tin Tức Tiếng Anh</h6>
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
					<input type="text" id="name-slug-en" name="txtTitleEn" class="form-control" placeholder="Vui lòng nhập tiêu đề tin" value="{{ old('txtTitleEn',$news["title_en"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Tóm Tắt</label>
					<textarea name="txtIntroEn">{{ old('txtIntroEn',$news["intro_en"]) }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtIntroEn', { height: '200px' });
					</script>
				</div>
				<div class="form-group">
					<label class="control-label">Nội Dung</label>
					<textarea name="txtContentEn">{{ old('txtContentEn',$news["content_en"]) }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtContentEn', { height: '400px' });
					</script>
				</div>
				<div class="form-group">
					<label class="control-label">Kết Bài</label>
					<textarea name="txtFootEn">{{ old('txtFootEn',$news["foot_en"]) }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtFootEn', { height: '200px' });
					</script>
				</div>
				<div class="form-group">
					<label class="control-label">Tiêu Đề Không Dấu</label>
					<input type="text" id="txtSlugEn" name="txtSlugEn" class="form-control" placeholder="Vui lòng nhập tiêu đề không dấu" value="{{ old('txtSlugEn',$news["slug_en"]) }}" />
				</div>
				<div class="form-group" style="margin-bottom: 50px">
					<label class="control-label">Thẻ Tiêu Đề (Ví dụ : Từ Khóa Thứ Nhất - Từ Khóa Thứ Hai)</label>
					<input type="text" id="txtMetaTitleEn" name="txtMetaTitleEn" class="form-control col-lg-6 maxlength-textarea" maxlength="70" placeholder="Vui lòng nhập từ khóa thứ nhất - từ khóa thứ hai (SEO)" value="{{ old('txtMetaTitleEn',$news["title_tag_en"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Từ Khóa</label>
					<input type="text" name="txtMetaKeywordsEn" class="tags-input" placeholder="Vui lòng nhập thẻ từ khóa (SEO)" value="{{ old('txtMetaKeywordsEn',$news["meta_keywords_tag_en"]) }}" />
					<span class="help-block">Thẻ từ khóa không được quá 10 từ</span>
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Mô Tả</label>
					<textarea rows="3" name="txtMetaDescriptionEn" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Vui lòng nhập thẻ mô tả (SEO)">{{ old('txtMetaDescriptionEn',$news["meta_description_tag_en"]) }}</textarea>
				</div>
			</div>
		</div>
	</div>
	@endif

	@include ('backend.blocks.button_bottom',['exit' => route('admin.news')])
</form>
@endsection