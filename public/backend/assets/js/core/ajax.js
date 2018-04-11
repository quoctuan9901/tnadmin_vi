$(document).ready(function() {
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	switchChange ();

	updatePosition ();

	viewPopup ();

	changePosition ();
});

function switchChange () {
	$('input[class="switch switch_list"]').on('switchChange.bootstrapSwitch', function (event, state) {
		var id     = $(this).attr("data-id");
		var table  = $(this).attr("data-table");
		var column = $(this).attr("data-col");
       	$.ajax({
           url: domainPath + '/tnadmin/ajax/switch',
           type: 'POST',
           dataType: 'html',
           data: {state:state,table:table,column:column,id:id}
       	});
    });
}

function updatePosition () {
	$("select[name='sltParent']").change(function () {
		var id = $(this).val();
		$.ajax({
			url: domainPath + '/tnadmin/ajax/position',
			type: 'POST',
			dataType: 'html',
			data: {id: id},
			success: function (position) {
				$("input[name='txtCategoryPosition']").val(position);
			}
		});
	})
}

function viewPopup () {
	$(".preview_before").click(function () {
		var id = $(this).attr("id");
		var table = $(this).attr("data-table");
		$.ajax({
			url: domainPath + '/tnadmin/'+table+'/show/'+id,
			type: 'GET',
			dataType: 'html',
			success: function (result) {
				$(".modal-content").html(result);
			}
		});
	})
}

function changePosition () {
	$("input[name='txtPosition']").change(function(event) {
		var position = $(this).val();
		var id       = $(this).attr('data-id');
		$.ajax({
			url: domainPath + '/tnadmin/ajax/change-position',
			type: 'POST',
			dataType: 'html',
			data: {id: id , position: position},
			success: function (data) {
				location.reload();
			}
		});		
	});
}


var attr_row = 0;
function addAttr() {
    $.ajax({
        url: domainPath + '/tnadmin/ajax/attribute',
        type: 'GET',
        dataType: 'html'
    })
    .done(function(data) {
        html  = '<tr id="attribute-row' + attr_row + '">';
	    html += '  <td class="text-right"><select class="form-control" name="post_attribute[' + attr_row + '][id]">'+data+'</select></td>';
	    html += '  <td class="text-right"><input type="text" name="post_attribute[' + attr_row + '][value]" value="" placeholder="Attribute Value" class="form-control" /></td>';
	    html += '  <td class="text-left"><button type="button" onclick="$(\'#attribute-row' + attr_row  + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="icon-close2"></i></button></td>';
	    html += '</tr>';
	    $('#attribute tbody').append(html);
	    attr_row++;
    });
}