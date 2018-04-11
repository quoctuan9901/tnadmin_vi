/**
* docViewer Plugin
* Licensed by Phạm Giang Pro @2017
* http://www.phamgiang.pro/thu-vien/javascript/1-ckeditor-plugin-google-document-viewer.html
*/
/**
* docViewer Plugin
* Licensed by Phạm Giang Pro @2017
* http://www.phamgiang.pro/thu-vien/javascript/1-ckeditor-plugin-google-document-viewer.html
*/
CKEDITOR.plugins.add('docViewer', {
	icons: 'docViewer',
	lang: 'en,ru,vi',
	hidpi: true,
	version: 1.15,

	init: function(editor) {
		editor.addCommand('docViewer', new CKEDITOR.dialogCommand('docViewer'));
	
		editor.ui.addButton('docViewer', {
			label: editor.lang.docViewer.button,
			command: 'docViewer',
			toolbar: 'insert,10',
			icon: this.path + "icons/" + (CKEDITOR.env.hidpi ? "hidpi/" : "") + "docViewer.png"
		});
		editor.widgets.add('docViewer', {
			draggable: false,
			mask: true,
			dialog: 'docViewer',
			allowedContent: {
				div: {
					styles: 'margin,font-size,color,text-decoration,max-width,height,float',
					attributes: '*',
					classes: "vDocViewer"
				},
				'div a': {
					attributes: '*'
				},
			},
			template: '<div style="display:inherit; clear: both; text-align:center; max-width:100%; border: 1px dotted #AEAEAE" class="vDocViewer">' +'</div>',
			upcast: function (element) {
				return element.name == 'div' && element.hasClass("vDocViewer");
			},
			init: function () {
				this.on('dialog', function (evt) {
					evt.data.widget = this;
				}, this);
			}
		});

		CKEDITOR.dialog.add('docViewer', function (editor) {
			return {
				title: editor.lang.docViewer.title,
				minWidth: CKEDITOR.env.ie && CKEDITOR.env.quirks ? 468 : 450,
				height: 190,
				
				onLoad : function() {
				},
				
				contents: 
				[{
					label: editor.lang.common.generalTab,
					id: 'pluginDocViewer',
					elements: [
						{
							type: 'textarea',
							id: 'documents',
							className: 'docViewer',
							label: editor.lang.docViewer.selectDocument,
							onChange: function( api ) {
								//var dialog = CKEDITOR.dialog.getCurrent();
								//var url = dialog.getContentElement('pluginDocViewer', 'txtUrlFile');
								//url.setValue( this.getValue() );
							},
							required: true,
							validate: function () {
								var dialog = this.getDialog(),
									documents = dialog.getContentElement('pluginDocViewer', 'documents').getValue();
								if(this.getValue().length === 0){
									alert(editor.lang.docViewer.alertUrl);
									return false;
								}
							},	
							commit: function(widget) {
								var dialog = this.getDialog(),
								txtWidth = dialog.getContentElement('pluginDocViewer', 'txtWidth').getValue(),
								txtHeight = dialog.getContentElement('pluginDocViewer', 'txtHeight').getValue();
								var srcEncoded = encodeURIComponent( dialog.getValueOf( 'pluginDocViewer', 'documents' ) );
								html = '<iframe src="http://docs.google.com/viewer?url='+srcEncoded+'&amp;embedded=true" style="border: none;" width="'+dialog.getValueOf( 'pluginDocViewer', 'txtWidth' )+'" height="'+dialog.getValueOf( 'pluginDocViewer', 'txtHeight' )+'"></iframe>';
								if (widget.element.$.firstChild) {
									widget.element.$.removeChild(widget.element.$.firstChild);
								}
								widget.element.appendHtml(html);
								//editor.insertElement( iframe );
								widget.setData('txtWidth', txtWidth);
								widget.setData('txtHeight', txtHeight);
								widget.setData('txtUrl', this.getValue());
								widget.element.data('txtWidth', txtWidth);
								widget.element.data('txtHeight', txtHeight);
								widget.element.data('txtUrl', this.getValue());
							}
						},{
							type: 'hbox',
							widths: [ '25%', '25%', '50%' ],
							id: 'docViewerSize',
							className: 'docViewer',
							children:
							[
								//  width
								{
									type: 'text',
									width: '100%',
									id: 'txtWidth',
									label: editor.lang.common.width + ' (pixcel)',
									'default': 710,
									required: true,
									validate: function () {
										if(this.getValue().length === 0){
											alert(editor.lang.docViewer.alertWidth);
											return false;
										}
									}
								},
								//  height
								{
									type: 'text',
									id: 'txtHeight',
									width: '100%',
									label: editor.lang.common.height + ' (pixcel)',
									'default': 920,
									required: true,
									validate: function () {
										if(this.getValue().length === 0){
											alert(editor.lang.docViewer.alertHeight);
											return false;
										}
									}
								},
								{
									type: "button",
									id: "browse",
									width: '100%',
									style: "display:inline-block;margin-top:20px; float:right",
									align: "center",
									label: editor.lang.common.browseServer,
									hidden: !0,
									filebrowser: "pluginDocViewer:documents"
								}
							]
						},{
							type: 'html',
							id: 'powerBy',
							html: '<div style="white-space:normal;width:100%;padding-bottom:10px"><a target="_blank" style="color:red" href="http://www.phamgiang.pro">Author : Phạm Giang Pro</a></div>'
						}
					]
				}],
				onOk: function( widget ) {
	
				},
				onShow: function() {
					var data = {
						txtUrl: this.widget.element.data('txtUrl') || '',
						txtWidth: this.widget.element.data('txtWidth') || 710,
						txtHeight: this.widget.element.data('txtHeight') || 920
					};
					this.getContentElement('pluginDocViewer', 'txtWidth').setValue(data.txtWidth);
					this.getContentElement('pluginDocViewer', 'txtHeight').setValue(data.txtHeight);
					this.getContentElement('pluginDocViewer', 'documents').setValue(data.txtUrl);
					this.widget.setData(data);
				}
			};
		});
	}
});