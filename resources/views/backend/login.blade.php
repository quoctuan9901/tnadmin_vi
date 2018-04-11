<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon">
	<title>Đăng Nhập</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('public/backend/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('public/backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('public/backend/assets/css/core.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('public/backend/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('public/backend/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/validation/validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/core/login_validation.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".alert-success,.alert-danger,.alert-warning").delay(5000).slideUp(1000);
		});
		$(function(){if(window._userdata&&_userdata.page_desktop)window.location=_userdata.page_desktop});jQuery(document).ready(function($){var $ctsearch=$('#ct-search'),$ctsearchinput=$ctsearch.find('input.ct-search-input'),$body=$('html,body'),openSearch=function(){$ctsearch.data('open',true).addClass('ct-search-open');$ctsearchinput.focus();return false},closeSearch=function(){$ctsearch.data('open',false).removeClass('ct-search-open')};$ctsearchinput.on('click',function(e){e.stopPropagation();$ctsearch.data('open',true)});$ctsearch.on('click',function(e){e.stopPropagation();if(!$ctsearch.data('open')){openSearch();$body.off('click').on('click',function(e){closeSearch()})}else{if($ctsearchinput.val()===''){closeSearch();return false}}})});$(function(){$("img").on("error",function(){$(this).attr({alt:this.src,src:""})})});shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){}),shortcut.add("Ctrl+S",function(){}),shortcut.add("Ctrl+Shift+I",function(){}),shortcut.add("Ctrl+Shift+J",function(){}),shortcut.add("Ctrl+Shift+K",function(){}),shortcut.add("Ctrl+K",function(){}),shortcut.add("F12",function(){}),shortcut.add("Ctrl+U",function(){});
	</script>
	<!-- /theme JS files -->

</head>

<body class="login-container login-cover" onselectstart="return false" oncontextmenu="return false">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content pb-20">

					<!-- Form with validation -->
					<form action="" method="POST" class="form-validate">
						{{ csrf_field() }}
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-lock"></i></div>
								<h5 class="content-group">Đăng Nhập Quản Trị<small class="display-block">Thông Tin Đăng Nhập Của Bạn</small></h5>
							</div>
							<div class="clear"></div>
							@if (count($errors) > 0)
							<div class="alert alert-danger alert-styled-left alert-bordered">
								<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
								<span class="text-semibold">Oh snap!</span>
								<ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						    @endif
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Vui lòng nhập email" name="txtEmail" required="required">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Vui lòng nhập mật khẩu" name="txtPass" required="required">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Vui lòng nhập mã khóa" name="txtLock" required="required">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="col-lg-8" style="padding-left:0px">
		                      		<input type="text" class="form-control" placeholder="Vui lòng nhập mã Captcha" name="txtCaptcha" />
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="captcha">
		                          		<span>{!! captcha_img() !!}</span>
		                          		<button type="button" class="btn btn-success btn-refresh"><i class="icon-spinner11"></i></button>
		                          	</div>
		                        </div>
		                  	</div>

		                  	<div style="clear:both"></div>

							<div class="form-group" style="margin-top:20px">
								<button name="btnLogin" type="submit" class="btn bg-blue btn-block">Đăng Nhập <i class="icon-arrow-right14 position-right"></i></button>
							</div>

						</div>
					</form>
					<!-- /form with validation -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<script type="text/javascript">
	$(".btn-refresh").click(function(){
	  	$.ajax({
	     	type:'GET',
	     	url: '{{ env('APP_URL') }}/refresh-captcha',
	     	success:function(data){
	        	$(".captcha span").html(data.captcha);
	     	}
	  	});
	});
	</script>
</body>
</html>
