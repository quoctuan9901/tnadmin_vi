@extends ('backend.master')
@section ('back',route('admin.product'))
@section ('title','Sửa Sản Phẩm')
@section ('controller','Sản Phẩm')
@section ('action','Sửa')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.product')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Sản Phẩm</h6>
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
						<li><a href="#bordered-justified-tab3" data-toggle="tab">Thuộc Tính</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane has-padding active" id="bordered-justified-tab1">
							<div class="form-group">
								<label class="control-label">Serial</label>
								<input type="text" name="txtSerial" class="form-control" placeholder="Vui lòng nhập serial sản phẩm" value="{{ old('txtSerial',$product["serial"]) }}" />
							</div>
							<div class="form-group">
								<label class="control-label">Tên <span class="text-danger">*</span></label>
								<input type="text" id="name-slug" name="txtTitle" class="form-control" placeholder="Vui lòng nhập tên sản phẩm" value="{{ old('txtTitle',$product["title"]) }}" />
							</div>
							<div class="form-group">
								<label class="control-label">Giá</label>
								<div class="row">
									<div class="col-md-6">
										<div class="input-group">
			                                <input type="text" name="txtPriceImport" class="form-control price-import" placeholder="Nhập Giá" value="{{ old('txtPriceImport',$product["import_price"]) }}" />
			                                <input type="hidden" name="txtPriceImportDB" class="form-control price-import-hidden" value="{{ old('txtPriceImportDB',$product["import_price"]) }}" />
			                            	<span class="input-group-addon">VNĐ</span>
			                            </div>
									</div>
									<div class="col-md-6">
										<div class="input-group">
			                                <input type="text" name="txtPriceSale" class="form-control price-sale" placeholder="Giá Khuyến Mãi" value="{{ old('txtPriceSale',$product["sale_price"]) }}" />
			                                <input type="hidden" name="txtPriceSaleDB" class="form-control price-sale-hidden" value="{{ old('txtPriceSaleDB',$product["sale_price"]) }}" />
			                            	<span class="input-group-addon">VNĐ</span>
			                            </div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Ngày Hết Hạn</label>
								<input type="text" name="txtExpiration" class="form-control" placeholder="Please Enter Expiration Date" value="{{ old('txtExpiration',$product["sale_price"]) }}" />
							</div>
							<div class="form-group">
								<label class="control-label">Tóm Tắt</label>
								<textarea name="txtIntro">{{ old('txtIntro',$product["intro"]) }}</textarea>
								<script type="text/javascript">
									 CKEDITOR.replace('txtIntro', { height: '200px' });
								</script>
							</div>
							<div class="form-group">
								<label class="control-label">Nội Dung</label>
								<textarea name="txtContent">{{ old('txtContent',$product["content"]) }}</textarea>
								<script type="text/javascript">
									 CKEDITOR.replace('txtContent', { height: '400px' });
								</script>
							</div>
							<div class="form-group">
								<label class="control-label">Tiêu Đề Không Dấu</label>
								<input type="text" id="txtSlug" name="txtSlug" class="form-control" placeholder="Vui lòng nhập tiêu đề không dấu" value="{{ old('txtSlug',$product["slug"]) }}" />
							</div>
							<div class="form-group" style="margin-bottom: 50px">
								<label class="control-label">Thẻ Tiêu Đề (Ví dụ : Từ Khóa Thứ Nhất - Từ Khóa Thứ Hai)</label>
								<input type="text" id="txtMetaTitle" name="txtMetaTitle" class="form-control col-lg-6 maxlength-textarea" maxlength="70" placeholder="Please Enter Primary Keyword - Secondary Keyword (SEO)" value="{{ old('txtMetaTitle',$product["title_tag"]) }}" />
							</div>
							<div class="form-group">
								<label class="control-label">Thẻ Từ Khóa</label>
								<input type="text" name="txtMetaKeywords" class="tags-input" placeholder="Vui lòng nhập thẻ từ khóa (SEO)" value="{{ old('txtMetaKeywords',$product["meta_keywords_tag"]) }}" />
								<span class="help-block">Thẻ từ khóa không được quá 10 từ</span>
							</div>
							<div class="form-group">
								<label class="control-label">Thẻ Mô Tả</label>
								<textarea rows="3" name="txtMetaDescription" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Vui lòng nhập thẻ mô tả (SEO)">{{ old('txtMetaDescription',$product["meta_description_tag"]) }}</textarea>
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
											<td class="text-left"><a id="thumb-image{{ $id_img }}"data-toggle="image" class="img-thumbnail"><img class="upload-image" src="{{ $img["images"] }}" id="img-detail-{{ $id_img }}" width="100px" height="100px" /><input type="hidden" name="post_image[{{ $id_img }}][image]" value="{{ $img["images"] }}" id="input-image-{{ $id_img }}" /></a></td>
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

						<div class="tab-pane has-padding" id="bordered-justified-tab3">
							<table id="attribute" class="table table-bordered">
								<thead>
									<tr>
										<th width="247px">Tên Thuộc Tính</th>
										<th width="247px">Giá Trị Thuộc Tính</th>
										<th width="100px">Hoạt Động</th>
									</tr>
								</thead>
								<tbody>
									@php $id_attr = 100 @endphp
									@foreach($product["attribute"] as $attr_product)
									<tr id="attribute-row{{ $id_attr }}">
									    <td class="text-right"><select class="form-control" name="post_attribute[{{ $id_attr }}][id]">{{ recursionSelect ($attribute,$attr_product["attribute_id"]) }}</select></td>
									    <td class="text-right"><input type="text" name="post_attribute[{{ $id_attr }}][value]" value="{{ $attr_product["value"] }}" placeholder="Attribute Value" class="form-control" /></td>
									    <td class="text-left"><button type="button" onclick="$('#attribute-row{{ $id_attr }}').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="icon-close2"></i></button></td>
									</tr>
										@php $id_attr++ @endphp
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2"></td>
										<td><button type="button" onclick="addAttr();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Image"><i class="icon-add"></i></button></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Sản Phẩm</h6>
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
							Không có dữ liệu thể loại
						@else
							@php recursionList ($category,old('chkCategory',$category_check)) @endphp
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Nhà Sản Xuất</label>
					<select name="sltManufacturer" class="form-control">
						@foreach ($manufacturer as $item)
						<option value="{{ $item["id"] }}" {{ (old('sltManufacturer',$product["manufacturer_id"]) == $item["id"]) ? 'selected' : '' }}>{{ $item["name"] }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Lượt Xem</label>
					<input type="text" name="txtViewed" class="form-control" placeholder="Nhập lượt xem" value="{{ old('txtViewed',$product["viewed"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Link Youtube</label>
					<input type="text" name="txtVideo" class="form-control" placeholder="Nhập Link Youtube" value="{{ old('txtVideo',$product["youtube"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Quyền Truy Cập</label>
					<select name="sltAccess" class="form-control">
						<option value="0" {{ (old('sltAccess',$product["access"]) == '0') ? 'selected' : '' }}>Cộng Đồng</option>
						<option value="1" {{ (old('sltAccess',$product["access"]) == '1') ? 'selected' : '' }}>Quản Trị</option>
						<option value="2" {{ (old('sltAccess',$product["access"]) == '2') ? 'selected' : '' }}>Thành Viên</option>
						<option value="3" {{ (old('sltAccess',$product["access"]) == '3') ? 'selected' : '' }}>Khách</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Phương Thức Mở</label>
					<select name="sltTarget" class="form-control">
						<option value="_self" {{ (old('sltTarget',$product["target_open"]) == '_self') ? 'selected' : '' }}>The same frame (_self)</option>
						<option value="_blank" {{ (old('sltTarget',$product["target_open"]) == '_blank') ? 'selected' : '' }}>New window or tab (_blank)</option>
						<option value="_parent" {{ (old('sltTarget',$product["target_open"]) == '_parent') ? 'selected' : '' }}>The parent frame (_parent)</option>
						<option value="_top" {{ (old('sltTarget',$product["target_open"]) == '_top') ? "selected" : '' }}>The full body of the window (_top)</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Robot</label>
					<select name="sltMetaRobot" class="form-control">
						<option value="noindex,follow" {{ (old('sltMetaRobot',$product["meta_robot"]) == 'noindex,follow') ? "selected" : '' }}>Noindex, Follow</option>
						<option value="index,nofollow" {{ (old('sltMetaRobot',$product["meta_robot"]) == 'index,nofollow') ? "selected" : '' }}>Index, Nofollow</option>
						<option value="noindex,nofollow" {{ (old('sltMetaRobot',$product["meta_robot"]) == 'noindex,nofollow') ? "selected" : '' }}>Noindex, Nofollow</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Hình Chính</label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtImage',$product["image"]) ? old('txtImage',$product["image"]) :  asset('public/backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImage" id="main-image" value="{{ old('txtImage',$product["image"]) ? old('txtImage',$product["image"]) :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b> Xóa Hình</button>
					</center><br />
					<label class="control-label">Chú Thích Hình</label><br />
					<input type="text" name="txtAlt" class="form-control" placeholder="Vui lòng nhập chú thích hình" value="{{ old('txtAlt',$product["alt"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Trạng Thái Sản Phẩm</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="Online" data-off-text="Offline" class="switch switch_list" data-table="product" data-col="status" data-id="{{ $product["id"] }}" {{ $product["status"] == "on" ? "checked" : "" }} />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Sản Phẩm Nổi Bật</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkFeatured" data-on-color="success" data-off-color="danger" data-on-text="Featured" data-off-text="Unfeatured" class="switch switch_list" data-table="product" data-col="featured" data-id="{{ $product["id"] }}" {{ $product["featured"] == "on" ? "checked" : "" }} />
					</div>
				</div>
			</div>
		</div>
	</div>

	@if (env('APP_LANG'))
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Sản Phẩm Tiếng Anh</h6>
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
					<input type="text" id="name-slug-en" name="txtTitleEn" class="form-control" placeholder="Vui lòng nhập tiêu đề sản phẩm" value="{{ old('txtTitleEn',$product["title_en"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Tóm Tắt</label>
					<textarea name="txtIntroEn">{{ old('txtIntroEn',$product["intro_en"]) }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtIntroEn', { height: '200px' });
					</script>
				</div>
				<div class="form-group">
					<label class="control-label">Nội Dung</label>
					<textarea name="txtContentEn">{{ old('txtContentEn',$product["content_en"]) }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtContentEn', { height: '400px' });
					</script>
				</div>
				<div class="form-group">
					<label class="control-label">Tiêu Đề Không Dấu</label>
					<input type="text" id="txtSlugEn" name="txtSlugEn" class="form-control" placeholder="Vui lòng nhập tiêu đề không dấu" value="{{ old('txtSlugEn',$product["slug_en"]) }}" />
				</div>
				<div class="form-group" style="margin-bottom: 50px">
					<label class="control-label">Thẻ Tiêu Đề (Ví dụ : Từ Khóa Thứ Nhất - Từ Khóa Thứ Hai)</label>
					<input type="text" id="txtMetaTitleEn" name="txtMetaTitleEn" class="form-control col-lg-6 maxlength-textarea" maxlength="70" placeholder="Vui lòng nhập từ khóa thứ nhất - từ khóa thứ hai (SEO)" value="{{ old('txtMetaTitleEn',$product["title_tag_en"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Từ Khóa</label>
					<input type="text" name="txtMetaKeywordsEn" class="tags-input" placeholder="Vui lòng nhập thẻ từ khóa (SEO)" value="{{ old('txtMetaKeywordsEn',$product["meta_keywords_tag_en"]) }}" />
					<span class="help-block">Thẻ từ khóa không được quá 10 từ</span>
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Mô Tả</label>
					<textarea rows="3" name="txtMetaDescriptionEn" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Vui lòng nhập thẻ mô tả (SEO)">{{ old('txtMetaDescriptionEn',$product["meta_description_tag_en"]) }}</textarea>
				</div>
			</div>
		</div>
	</div>
	@endif

	@include ('backend.blocks.button_bottom',['exit' => route('admin.product')])
</form>
@endsection