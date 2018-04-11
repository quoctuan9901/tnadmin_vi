@extends ('backend.master')
@section ('back',route('admin.tags'))
@section ('title','Sửa Thẻ')
@section ('controller','Thẻ')
@section ('action','Sửa')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.tags')])

	@include ('backend.blocks.alert')

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Thẻ</h6>
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
					<label class="control-label">Thẻ <span class="text-danger">*</span></label>
					<input type="text" id="name-slug" name="txtTag" class="form-control" placeholder="Nhập Thẻ" value="{{ old('txtTag',$tags["tags"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Mô Tả</label>
					<textarea name="txtContent">{{ old('txtContent',$tags["description"]) }}</textarea>
					<script type="text/javascript">
						 CKEDITOR.replace('txtContent', { height: '400px' });
					</script>
				</div>
				<div class="form-group">
					<label class="control-label">Tiêu Đề Không Dấu</label>
					<input type="text" id="txtSlug" name="txtSlug" class="form-control" placeholder="Vui lòng nhập tiêu đề không dấu" value="{{ old('txtSlug',$tags["slug"]) }}" />
				</div>
				<div class="form-group" style="margin-bottom: 50px">
					<label class="control-label">Thẻ Tiêu Đề (Ví dụ : Từ Khóa Thứ Nhất - Từ Khóa Thứ Hai)</label>
					<input type="text" id="txtMetaTitle" name="txtMetaTitle" class="form-control col-lg-6 maxlength-textarea" maxlength="70" placeholder="Vui lòng nhập từ khóa thứ nhất - từ khóa thứ hai (SEO)" value="{{ old('txtMetaTitle',$tags["title_tag"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Từ Khóa</label>
					<input type="text" name="txtMetaKeywords" class="tags-input" placeholder="Vui lòng nhập thẻ từ khóa (SEO)" value="{{ old('txtMetaKeywords',$tags["meta_keywords_tag"]) }}" />
					<span class="help-block">Thẻ từ khóa không được quá 10 từ</span>
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Mô Tả</label>
					<textarea rows="3" name="txtMetaDescription" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Vui lòng nhập thẻ mô tả (SEO)">{{ old('txtMetaDescription',$tags["meta_description_tag"]) }}</textarea>
				</div>
			</div>
		</div>
	</div>

	<hr />

	@if (env('APP_LANG'))
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Thẻ Tiếng Anh</h6>
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
					<label class="control-label">Thẻ <span class="text-danger">*</span></label>
					<input type="text" id="name-slug-en" name="txtTagEn" class="form-control" placeholder="Please Enter Tags" value="{{ old('txtTagEn',$tags["tags_en"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Mô Tả</label>
					<textarea name="txtContentEn">{{ old('txtContentEn',$tags['description_en']) }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtContentEn', { height: '400px' });
					</script>
				</div>
				<div class="form-group">
					<label class="control-label">Tiêu Đề Không Dấu</label>
					<input type="text" id="txtSlugEn" name="txtSlugEn" class="form-control" placeholder="Please Enter Slug URL" value="{{ old('txtSlugEn',$tags["slug_en"]) }}" />
				</div>
				<div class="form-group" style="margin-bottom: 50px">
					<label class="control-label">Thẻ Tiêu Đề (Ví dụ : Từ Khóa Thứ Nhất - Từ Khóa Thứ Hai)</label>
					<input type="text" id="txtMetaTitleEn" name="txtMetaTitleEn" class="form-control col-lg-6 maxlength-textarea" maxlength="70" placeholder="Vui lòng nhập từ khóa thứ nhất - từ khóa thứ hai (SEO)" value="{{ old('txtMetaTitleEn',$tags["title_tag_en"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Từ Khóa</label>
					<input type="text" name="txtMetaKeywordsEn" class="tags-input" placeholder="Vui lòng nhập thẻ tù khóa (SEO)" value="{{ old('txtMetaKeywordsEn',$tags["meta_keywords_tag_en"]) }}" />
					<span class="help-block">Thẻ từ khóa không được quá 10 từ</span>
				</div>
				<div class="form-group">
					<label class="control-label">Thẻ Mô Tả</label>
					<textarea rows="3" name="txtMetaDescriptionEn" cols="3" maxlength="160" class="form-control maxlength-textarea" placeholder="Vui lòng nhập thẻ mô tả (SEO)">{{ old('txtMetaDescriptionEn',$tags["meta_description_tag_en"]) }}</textarea>
				</div>
			</div>
		</div>
	</div>
	@endif

	@include ('backend.blocks.button_bottom',['exit' => route('admin.tags')])
</form>
@endsection