/**
 *  @info   : 初始化 UEditor, 默认 id 为 Editor
 *  @author : Zhining
 *  @date   : 2012-11-06
 **/
(function () {

	
	var initEditor = function () {
		yepnope('/js/ueditor/themes/default/ueditor.css');
		var editor = new baidu.editor.ui.Editor();
		editor.render("Editor");
	};
	
	// 绑定初始化时间
	if (typeof jQuery != 'undefined') {
		jQuery(document).ready(initEditor);
	} else if (!window.onload) {
		window.onload = initEditor;
	} else {
		var fn = window.onload;
		window.onload = function  () {
			fn();
			initEditor();
		}
	}

})();

