@extends ('backend.master')
@section ('back',route('admin.position'))
@section ('title','Sửa Vị Trí')
@section ('controller','Vị Trí')
@section ('action','Sửa')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.position')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Vị Trí</h6>
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
					<input type="text" name="txtName" class="form-control" placeholder="Vui lòng nhập tên" value="{{ old('txtName',$position["name"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Width (Unit Pixels : px)</label>
					<input type="text" name="txtWidth" class="form-control" placeholder="Nhập Width" value="{{ old('txtWidth',$position["width"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Height (Unit Pixels : px)</label>
					<input type="text" name="txtHeight" class="form-control" placeholder="Nhập Height" value="{{ old('txtHeight',$position["height"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Link </label>
					<input type="text" name="txtLink" class="form-control" placeholder="Nhập Link" value="{{ old('txtLink',$position["link"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Trạng Thái Vị Trí</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="Online" data-off-text="Offline" class="switch switch_list" data-table="position" data-col="status" data-id="{{ $position["id"] }}" {{ $position["status"] == "on" ? "checked" : "" }} />
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Vị Trí</h6>
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
					<label class="control-label">Vị Trí Cha</label>
					<select name="sltParent" class="form-control">
						<option value="0">---------------- ROOT ----------------</option>
						@php recursionSelect($parent,old('sltParent',$position["parent_id"]),$position["id"]) @endphp
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Hình Chính</label><br />
					<center>
						<img class="img-responsive" width="60%" id="main-image" src="{{ old('txtImage',$position["image"]) ? old('txtImage',$position["image"]) :  asset('public/backend/assets/images/upload.png') }}" />
						<input type="hidden" name="txtImage" id="main-image" value="{{ old('txtImage',$position["image"]) ? old('txtImage',$position["image"]) :  '' }}" /><br />
						<button name="remove-image" type="button" class="btn btn-danger btn-labeled"><b><i class="icon-x"></i></b>Xóa Hình</button>
					</center><br />
					<label class="control-label">Chú Thích Hình</label><br />
					<input type="text" name="txtAlt" class="form-control" placeholder="Vui lòng nhập chú thích hình" value="{{ old('txtAlt',$position["alt"]) }}" />
				</div>
			</div>
		</div>
	</div>

	@include ('backend.blocks.button_bottom',['exit' => route('admin.position')])
</form>
@endsection