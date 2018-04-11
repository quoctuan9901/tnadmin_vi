@extends ('backend.master')
@section ('back',route('admin.role'))
@section ('title','Sửa Vai Trò')
@section ('controller','Vai Trò')
@section ('action','Sửa')
@section ('content')
<form action="" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

	@include ('backend.blocks.button',['exit' => route('admin.role')])

	@include ('backend.blocks.alert')

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sửa Vai Trò</h6>
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
					<input type="text" id="name-slug" name="txtName" class="form-control" placeholder="Vui lòng nhập tên vai trò" value="{{ old('txtName',$role["name"]) }}" />
				</div>
				<div class="form-group">
					<label class="control-label">Mô Tả</label>
					<textarea name="txtDescription">{{ old('txtDescription',$role["description"]) }}</textarea>
					<script type="text/javascript">
						 CKEDITOR.replace('txtDescription', { height: '150px' });
					</script>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Thể Loại</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Thể Loại 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_cate" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_cate') }} /> Danh Sách Thể Loại </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="add_cate" {{ checkedRole (old('chkRole',json_decode($role["role"])),'add_cate') }} /> Thêm Thể Loại </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="edit_cate" {{ checkedRole (old('chkRole',json_decode($role["role"])),'edit_cate') }} /> Sửa Thể Loại </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_cate" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_cate') }} /> Xóa Thể Loại </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Tin Tức</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Tin Tức 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_news" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_news') }} /> Danh Sách Tin Tức </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="add_news" {{ checkedRole (old('chkRole',json_decode($role["role"])),'add_news') }} /> Thêm Tin Tức </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="edit_news" {{ checkedRole (old('chkRole',json_decode($role["role"])),'edit_news') }} /> Sửa Tin Tức </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_news" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_news') }} /> Xóa Tin Tức </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Bài Đăng</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Bài Đăng 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_post" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_post') }} /> Danh Sách Bài Đăng </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="add_post" {{ checkedRole (old('chkRole',json_decode($role["role"])),'add_post') }} /> Thêm Bài Đăng </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="edit_post" {{ checkedRole (old('chkRole',json_decode($role["role"])),'edit_post') }} /> Sửa Bài Đăng </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_post" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_post') }} />Xóa Bài Đăng </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Thẻ</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Thẻ 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_tag" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_tag') }} /> Danh Sách Thẻ </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="add_tag" {{ checkedRole (old('chkRole',json_decode($role["role"])),'add_tag') }} /> Thêm Thẻ </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="edit_tag" {{ checkedRole (old('chkRole',json_decode($role["role"])),'edit_tag') }} /> Sửa Thẻ </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_tag" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_tag') }} /> Xóa Thẻ </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Thuộc Tính</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Thuộc Tính 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_attribute" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_attribute') }} /> Danh Sách Thuộc Tính </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="add_attribute" {{ checkedRole (old('chkRole',json_decode($role["role"])),'add_attribute') }} /> Thêm Thuộc Tính </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="edit_attribute" {{ checkedRole (old('chkRole',json_decode($role["role"])),'edit_attribute') }} /> Sửa Thuộc Tính </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_attribute" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_attribute') }} /> Xóa Thuộc Tính </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Nhà Sản Xuất</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Nhà Sản Xuất 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_manufacturer" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_manufacturer') }} /> Danh Sách Nhà Sản Xuất </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="add_manufacturer" {{ checkedRole (old('chkRole',json_decode($role["role"])),'add_manufacturer') }} /> Thêm Nhà Sản Xuất </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="edit_manufacturer" {{ checkedRole (old('chkRole',json_decode($role["role"])),'edit_manufacturer') }} /> Sửa Nhà Sản Xuất </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_manufacturer" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_manufacturer') }} /> Xóa Nhà Sản Xuất </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Sản Phẩm</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Sản Phẩm 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_product" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_product') }} /> Danh Sách Sản Phẩm </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="add_product" {{ checkedRole (old('chkRole',json_decode($role["role"])),'add_product') }} /> Thêm Sản Phẩm </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="edit_product" {{ checkedRole (old('chkRole',json_decode($role["role"])),'edit_product') }} /> Sửa Sản Phẩm </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_product" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_product') }} /> Xóa Sản Phẩm </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Vị Trí</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Vị Trí 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_position" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_position') }} /> Danh Sách Vị Trí </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="add_position" {{ checkedRole (old('chkRole',json_decode($role["role"])),'add_position') }} /> Thêm Vị Trí </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="edit_position" {{ checkedRole (old('chkRole',json_decode($role["role"])),'edit_position') }} /> Sửa Vị Trí </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_position" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_position') }} /> Xóa Vị Trí </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Banner</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Banner 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_banner" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_banner') }} /> Danh Sách Banner </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="add_banner" {{ checkedRole (old('chkRole',json_decode($role["role"])),'add_banner') }} /> Thêm Banner </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="edit_banner" {{ checkedRole (old('chkRole',json_decode($role["role"])),'edit_banner') }} /> Sửa Banner </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_banner" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_banner') }} /> Xóa Banner </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Thành Viên</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Thành Viên 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_user" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_user') }} /> Danh Sách Thành Viên </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="add_user" {{ checkedRole (old('chkRole',json_decode($role["role"])),'add_user') }} /> Thêm Thành Viên </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="edit_user" {{ checkedRole (old('chkRole',json_decode($role["role"])),'edit_user') }} /> Sửa Thành Viên </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_user" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_user') }} /> Xóa Thành Viên </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Vai Trò</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Vai Trò 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_role" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_role') }} /> Danh Sách Vai Trò </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="add_role" {{ checkedRole (old('chkRole',json_decode($role["role"])),'add_role') }} /> Thêm Vai Trò </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="edit_role" {{ checkedRole (old('chkRole',json_decode($role["role"])),'edit_role') }} /> Sửa Vai Trò </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_role" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_role') }} /> Xóa Vai Trò </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Liên Hệ</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Liên Hệ 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_contact" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_contact') }} /> Danh Sách Liên Hệ </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="add_contact" {{ checkedRole (old('chkRole',json_decode($role["role"])),'add_contact') }} /> Thêm Liên Hệ </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="edit_contact" {{ checkedRole (old('chkRole',json_decode($role["role"])),'edit_contact') }} /> Sửa Liên Hệ </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_contact" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_contact') }} /> Xóa Liên Hệ </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Mail & Bình Luận</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Mail & Bình Luận 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="mail" {{ checkedRole (old('chkRole',json_decode($role["role"])),'mail') }} /> Danh Sách Mail </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="sent_mail" {{ checkedRole (old('chkRole',json_decode($role["role"])),'sent_mail') }} /> Gửi Mail </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_mail" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_mail') }} /> Xóa Mail </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="comment" {{ checkedRole (old('chkRole',json_decode($role["role"])),'comment') }} /> Danh Sách Bình Luận </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="reply_comment" {{ checkedRole (old('chkRole',json_decode($role["role"])),'reply_comment') }} /> Trả Lời Bình Luận </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_comment" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_comment') }} /> Xóa Bình Luận </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h6 class="panel-title">Nhật Ký</h6>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				<ul>
					<li><input type="checkbox" name="chkManage" class="chkRole" /> Quản Lý Nhật Ký 
						<ul>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_action" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_action') }} /> Danh Sách Hoạt Động Thành Viên </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_one_action" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_one_action') }} /> Xóa Một Hoạt Động Thành Viên </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_all_action" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_all_action') }} /> Xóa Tất Cả Hoạt Động Thành Viên </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="list_login" {{ checkedRole (old('chkRole',json_decode($role["role"])),'list_login') }} /> Danh Sách Thành Viên Đăng Nhập </li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_one_login" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_one_login') }} />  Xóa Một Thành Viên Đăng Nhập</li>
							<li><input type="checkbox" name="chkRole[]" class="chkRole" value="delete_all_login" {{ checkedRole (old('chkRole',json_decode($role["role"])),'delete_all_login') }} /> Xóa Tất Cả Thành Viên Đăng Nhập</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	@include ('backend.blocks.button_bottom',['exit' => route('admin.role')])
</form>
@endsection