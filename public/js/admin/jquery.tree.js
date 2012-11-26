// jquery.tree.js
(function($, window, document) {

	// var datas;
	// // flat tree
	// datas = [{
	// 	"label": "Menu 4",
	// 	"id": 6,
	// 	"parent_id": 5
	// }, {
	// 	"label": "Menu 1",
	// 	"id": 0,
	// 	"parent_id": null
	// }, {
	// 	"label": "Menu 2",
	// 	"id": 1,
	// 	"parent_id": null
	// }, {
	// 	"label": "Menu 3",
	// 	"id": 2,
	// 	"parent_id": null
	// }, {
	// 	"label": "Menu 5",
	// 	"id": 3,
	// 	"parent_id": 0
	// }, {
	// 	"label": "Menu 6",
	// 	"id": 4,
	// 	"parent_id": 0
	// }, {
	// 	"label": "Menu 7",
	// 	"id": 5,
	// 	"parent_id": 3
	// }, {
	// 	"label": "Menu 7",
	// 	"id": 7,
	// 	"parent_id": 1
	// }, {
	// 	"label": "Menu 8",
	// 	"id": 8,
	// 	"parent_id": 1
	// }];

	// tree generator , from a flat tree , create a tree of nodes then 
	// display it as a list
	$.fn.tree = function(datas, options) {
		var _datas, _options, _el, _this;
		options = options || {};
		_this = this;
		_options = {
			id_field: "id",
			parent_id_field: "parent_id",
			el: "ul",
			label: "label",
			child_el: "li"
		};
		$.extend(_options, options);
		// create a temp tree , get the children of each node
		this.walk = function(_datas) {
			var i, j, datas;
			datas = _datas;
			// go through each element
			
			for(i in datas) {
				// find if that element has children
				for(j in datas) {
					// if so , then add the child to the parent in
					// the children object
					if(datas[j].parent_id == datas[i].id) {
						// console.log(datas);
						datas[i].children = datas[i].children || [];
						datas[i].children.push(datas[j]);
					}
				}
			}
			return datas;
		};

		this.clean = function(datas) {
			var result, i;
			result = [];
			// clean up delete elements with parents
			for(i = 0; i < datas.length; i++) {
				if(typeof(datas[i].parent_id) === "undefined" ||
					 _datas[i].parent_id === null || 
					 _datas[i].parent_id === "" || 
					 _datas[i].parent_id == 0) {
					
					result.push(datas[i]);
				}
			}
			return result;
		};
		// now render the tree
		this.render = function(_datas) {
			var el, i;
			if(_datas.length <= 0) {
				return;
			};
			el = "<ul>";
			for(i in _datas) {
				if(_datas[i][_options.label] != undefined && _datas[i][_options.label] != "") {
					el += "<li class='collapsable'>" + '<a href="javascript:void(0);" data-parent-id="' + _datas[i][_options.parent_id_field] 
						  + '" data-id="' + _datas[i][_options.id_field] + '">' + 
						  _datas[i][_options.label] + '</a>';
					if(typeof(_datas[i].children) != "undefined") {
						el += _this.render(_datas[i].children);
					}
					el += "</li>";
				}
			}
			el += "</ul>";
			return el;
		};
		// Menu 
		// walk
		_datas = this.walk(datas);
		// clean 
		_datas = this.clean(_datas);
		// render
		_el = this.render(_datas);
		this.datas = _datas;
		this.el = _el;
		$(this).append(this.el);
	};

})(jQuery, window, window.document);