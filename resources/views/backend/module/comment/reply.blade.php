@extends ('backend.master')
@section ('back',route('admin.comment'))
@section ('title','Trả Lời Bình Luận')
@section ('controller','Bình Luận')
@section ('action','Trả Lời')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.comment')])

	@include ('backend.blocks.alert')

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Trả Lời Bình Luận</h6>
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
					<label class="control-label">Kiểu</label>
					<input type="text" class="form-control" name="txtTableName" value="{{ $comment["table_name"] }}" readonly="true" />
				</div>
				<div class="form-group">
					<label class="control-label">Tiêu Đề</label>
					<input type="text" class="form-control" value="{{ $article->title }}" readonly="true" />
					<input type="hidden" class="form-control" name="txtTableId" value="{{ $comment["table_id"] }}" readonly="true" />
				</div>
				<div class="form-group">
					<label class="control-label">Người Bình Luận</label>
					<textarea class="form-control" readonly="true">{{ $comment["comment"] }}</textarea>
				</div>
				<div class="form-group">
					<label class="control-label">IP Bình Luận</label>
					<textarea class="form-control" readonly="true">{{ $comment["ip_comment"] }}</textarea>
				</div>
				<div class="form-group">
					<label class="control-label">Trả Lời <span class="text-danger">*</span></label>
					<textarea name="txtReply">{{ old('txtReply') }}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('txtReply', { height: '200px' });
					</script>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Trả Lời Bình Luận</h6>
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
					<label class="control-label">Thích</label>
					<input type="text" name="txtLike" class="touchspin-basic" value="{{ old('txtLike',$comment["like"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Không Thích</label>
					<input type="text" name="txtDislike" class="touchspin-basic" value="{{ old('txtDislike',$comment["dislike"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Báo Cáo</label>
					<input type="text" name="txtReport" class="touchspin-basic" value="{{ old('txtReport',$comment["report"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Trạng Thái Bình Luận</label><br />
					<div class="checkbox checkbox-switch">
						<input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="Online" data-off-text="Offline" class="switch switch_list" data-table="comment" data-col="status" data-id="{{ $comment["id"] }}" {{ $comment["status"] == "on" ? "checked" : "" }} />
					</div>
				</div>
			</div>
		</div>
	</div>
	@include ('backend.blocks.button_bottom',['exit' => route('admin.comment')])
</form>
@endsection