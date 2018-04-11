<?php 
function recursionSelect ($data,$selected = 0,$id_edit = '',$parent = 0,$str = '') {
	foreach ($data as $key => $value) {
		$id        = $value["id"];
		$name      = $value["name"];
		$parent_id = $value["parent_id"];
		if ($parent_id == $parent) {
			if ($id == $selected) {
				echo '<option value="'.$id.'" selected>'.$str.$name.'</option>';
			} else {
				echo '<option value="'.$id.'">'.$str.$name.'</option>';
			}
			unset($data[$key]);
			recursionSelect ($data,$selected,$id_edit,$id,$str . "---| ");
		}
	}	
}

function recursionTable ($data,$parent = 0,$str = '') {
	foreach ($data as $key => $value) {
		$id        = $value["id"];
		$name      = $value["name"];
		$parent_id = $value["parent_id"];
		$position  = $value["position"];
		$status    = ($value["status"] == "on") ? "checked" : "";
		$time      = \Carbon\Carbon::createFromTimeStamp(strtotime($value["updated_at"]))->diffForHumans();
		if (empty($value["user"]["firstname"]) && empty($value["user"]["lastname"])) {
			$fullname = 'Unknown';
		} else {
			$fullname  = '<a href="'.route('admin.user.edit',['id' => $value["user"]["id"]]).'" target="_blank">'.$value["user"]["firstname"] .' '. $value["user"]["lastname"].'</a>';
		}
		
		if ($parent_id == $parent) {
			echo'
			<tr>
				<td>'.$str.' <input name="txtPosition" type="text" class="text-center" value="'.$position.'" style="width: 30px" data-id="'.$id.'"></td>
				<td>'.$str.' <a href="'.route('admin.category.edit',['id' => $id]).'" target="_blank">'.$name.'</a></td>
				<td>'.$fullname.'</td>
				<td>'.$time.'</td>
				<td><input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="On" data-off-text="Off" class="switch switch_list" data-table="category" data-col="status" data-id="'.$id.'" '.$status.' /></td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="text-primary-600"><a href="'.route('admin.category.edit',['id' => $id]).'" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
						<li class="text-danger-600"><a href="'.route('admin.category.destroy',['id' => $id]).'" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
					</ul>
				</td>
			</tr>';
			unset($data[$key]);
			recursionTable ($data,$id,$str . "---| ");
		}
	}	
}

function recursionList ($data,$checked = array(),$parent = 0,$level = 0) {
	$child = array();
	foreach ($data as $key => $value) {
		if ($value["parent_id"] == $parent) {
			$child[] = $value;
			unset($data[$key]);
		}
	}

	if ($child) {
		echo '<ul>';
		foreach ($child as $key => $value) {
			$id        = $value["id"];
			$name      = $value["name"];
			$parent_id = $value["parent_id"];
			if (!empty($checked) && in_array($id,$checked)) {
				$input = '<input class="chkCategory" type="checkbox" name="chkCategory[]" value="'.$id.'" checked /> '.$name;
			} else {
				$input = '<input class="chkCategory" type="checkbox" name="chkCategory[]" value="'.$id.'" /> '.$name;
			}
			
			echo '<li>'.$input;
			recursionList ($data,$checked,$id,++$level);
			echo '</li>';
		}
		echo '</ul>';
	}
}

function recursionTableAttribute ($data,$parent = 0,$str = '') {
	foreach ($data as $key => $value) {
		$id        = $value["id"];
		$name      = $value["name"];
		$parent_id = $value["parent_id"];
		$status    = ($value["status"] == "on") ? "checked" : "";
		$time      = \Carbon\Carbon::createFromTimeStamp(strtotime($value["updated_at"]))->diffForHumans();
		if ($parent_id == $parent) {
			echo'
			<tr>
				<td>'.$str.' <a href="'.route('admin.attribute.edit',['id' => $id]).'">'.$name.'</a></td>
				<td>'.$time.'</td>
				<td><input type="checkbox" name="chkStatus" data-on-color="success" data-off-color="danger" data-on-text="On" data-off-text="Off" class="switch switch_list" data-table="attribute" data-col="status" data-id="'.$id.'" '.$status.' /></td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="text-primary-600"><a href="'.route('admin.attribute.edit',['id' => $id]).'" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
						<li class="text-danger-600"><a href="'.route('admin.attribute.destroy',['id' => $id]).'" data-popup="tooltip" title="Remove" class="sweet_warning"><i class="icon-trash"></i></a></li>
					</ul>
				</td>
			</tr>';
			unset($data[$key]);
			recursionTableAttribute ($data,$id,$str . "---| ");
		}
	}	
}

function checkedRole ($array,$item) {
	if (is_array($array) && in_array($item,$array)) {
		echo 'checked';
	} else {
		echo '';
	}
}
?>