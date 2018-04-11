var image_row = 1;
function addImage() {
    var image_original = publicPath + '/backend/assets/images/upload.png';
    html  = '<tr id="image-row' + image_row + '">';
    html += '  <td class="text-left"><a id="thumb-image' + image_row + '"data-toggle="image" class="img-thumbnail"><img class="upload-image" src="' + image_original + '" id="img-detail-' + image_row + '" width="100px" height="100px" /><input type="hidden" name="post_image[' + image_row + '][image]" value="" id="img-detail-' + image_row + '" /></td>';
    html += '  <td class="text-right"><input type="text" name="post_image[' + image_row + '][alt]" value="" placeholder="Alt Image" class="form-control" /></td>';
    html += '  <td class="text-right"><input type="text" name="post_image[' + image_row + '][sort_order]" value="' + image_row + '" placeholder="Sort Order" class="form-control" /></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="icon-close2"></i></button></td>';
    html += '</tr>';
    
    $('#images tbody').append(html);
    
    image_row++;
}

var attr_row = 0;
function addAttr() {
    html  = '<tr id="attribute-row' + attr_row + '">';
    html += '  <td class="text-right"><select class="form-control" name="post_attribute[' + attr_row + '][id]"></select></td>';
    html += '  <td class="text-right"><input type="text" name="post_attribute[' + attr_row + '][value]" value="" placeholder="Attribute Value" class="form-control" /></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#attribute-row' + attr_row  + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="icon-close2"></i></button></td>';
    html += '</tr>';

    $('#attribute tbody').append(html);

    attr_row++;
}

function startTime() {
    var today = new Date();
    var d = today.getDate();
    var t = today.getMonth()+1;
    var y = today.getFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('lock-time').innerHTML = d + ' / ' + t + ' / '+ y + " - " + h + " : " + m + " : " + s;
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

function touchspin () {
	$(".touchspin-basic").TouchSpin({
	    postfix: '<i class="icon-paragraph-justify2"></i>'
	});	
}
function switchBootstrap () {
	$(".switch").bootstrapSwitch();
}

function tags_keywords () {
    $('.tags-input').tagsinput();
}

function tags_descriptions () {
	$('.maxlength-textarea').maxlength({
        alwaysShow: true
    });
}

function alertHide () {
    $(".alert-success,.alert-danger,.alert-warning").delay(5000).slideUp(1000);
}

function warning_alert () {
    $('.sweet_warning').on('click', function(event) {
        event.preventDefault();
        var linkDelete = $(this).attr("href");
        swal({
          title: "Are you sure delete it?",
          text: "You will not be able to recover this data !",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it !",
          closeOnConfirm: false
        },
        function(isConfirm){
            if (isConfirm) {
                window.location.href = linkDelete;
            } else {
                return false;
            }
        });
    });
}

function generate_pass () {
    // Input labels
    var $inputLabel = $('.label-indicator input');
    var $inputLabelAbsolute = $('.label-indicator-absolute input');
    var $inputGroup = $('.group-indicator input');

    // Output labels
    var $outputLabel = $('.label-indicator > span');
    var $outputLabelAbsolute = $('.label-indicator-absolute > span');
    var $outputGroup = $('.group-indicator > span');

    // Min input length
    $.passy.requirements.length.min = 4;

    // Strength meter
    var feedback = [
        {color: '#D55757', text: 'Weak', textColor: '#fff'},
        {color: '#EB7F5E', text: 'Normal', textColor: '#fff'},
        {color: '#3BA4CE', text: 'Good', textColor: '#fff'},
        {color: '#40B381', text: 'Strong', textColor: '#fff'}
    ];

    // Label indicator
    $inputLabel.passy(function(strength) {
        $outputLabel.text(feedback[strength].text);
        $outputLabel.css('background-color', feedback[strength].color).css('color', feedback[strength].textColor);
    });

    // Label
    $('.generate-label').click(function() {
        $inputLabel.passy( 'generate', 15 );
    });
}

/********************* Convert To Slug *********************/
function convertToSlug () {
	$('#name-slug').keyup(function() {
        var val = $(this).val();
        var slug = to_slug(val);
        $("#txtSlug").val(slug);
        $("#txtMetaTitle").val(val);
        $("input[name='txtAlt']").val(val);
    });

    $('#name-slug-en').keyup(function() {
        var val = $(this).val();
        var slug = to_slug(val);
        $("#txtSlugEn").val(slug);
        $("#txtMetaTitleEn").val(val);
        $("input[name='txtAltEn']").val(val);
    });
}

function to_slug(str) {
    str = str.toLowerCase();     
    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
    str = str.replace(/(đ)/g, 'd');
    str = str.replace(/([^0-9a-z-\s])/g, '');
    str = str.replace(/(\s+)/g, '-');
    str = str.replace(/^-+/g, '');
    str = str.replace(/-+$/g, '');
    return str;
}
/********************* End *********************/

/********************* CKFinder Upload File *********************/
$(document).ready(function() {
    $(document).on('click', '#main-image,#main-image-error,.upload-image', function(event) {
        event.preventDefault();
        var eleImg = $(this).attr('id');
        BrowseServer(eleImg);
    });

    $("button[name='remove-image']").click(function () {
        var image_original = publicPath + '/backend/assets/images/upload.png';
        var val =  $(this).prev().prev().val();
        if (val == "") {
            alert("No Image To Delete");
        } else {
            $(this).prev().prev().val("");
            $(this).prev().prev().prev().attr("src",image_original);
        }
    })
});

function BrowseServer(inputId) {
    var path = publicPath + '/backend/assets/js/plugins/editors/ckfinder';
    var finder = new CKFinder();
    finder.BasePath = path;
    finder.SelectFunction = SetFileField;
    finder.SelectFunctionData = inputId;
    finder.defaultLanguage = 'vi';
    finder.language = 'vi';
    finder.Popup();
}
 
function SetFileField(fileUrl, data) {
    $("input#"+ data.selectActionData).val(fileUrl);
    $("img#" + data.selectActionData).attr("src",fileUrl);
}
/********************* End *********************/
/********************* Format Currency *********************/
function format_current () {
    $('.price-import').on('keyup',function(){ 
        var val = $('.price-import').val();
        $('.price-import-hidden').val( val !== '' ? val : '(empty)' );
    });

    $('.price-sale').on('keyup',function(){ 
        var val = $('.price-sale').val();
        $('.price-sale-hidden').val( val !== '' ? val : '(empty)' );
    });
                
    $('.price-import,.price-sale').number(true, 0,',','.');  
}

function dataTable () {
    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        }
    });


    // Basic initialization
    $('.datatable-button-init-basic').DataTable({
        buttons: {
            dom: {
                button: {
                    className: 'btn btn-default'
                }
            },
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel'},
                {extend: 'pdf'},
                {extend: 'print'}
            ]
        }
    });

    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
}

function checkRole () {
    $('.chkRole').click(function () {
        $(this).parent().find('li .chkRole').prop('checked', $(this).is(':checked'));
        var sibs = false;
        $(this).closest('ul').children('li').each(function () {
            if($('.chkRole', this).is(':checked')) sibs=true;
        })
        $(this).parents('ul').prev().prop('checked', sibs);
    });
}
/********************* End *********************/
$(document).ready(function() {
	tags_keywords ();

	tags_descriptions ();

	alertHide ();

	convertToSlug ();

	touchspin ();

	switchBootstrap ();

    warning_alert ();

    format_current ();

    generate_pass ();

    dataTable ();

    checkRole ();
});