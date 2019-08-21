var UITree = function () {


	
	var handleBiblioteca = function () {
        $('.tree_biblioteca').each(function(index, element) {
            $(this).jstree({
				'plugins': ["wholerow","html_data", "checkbox", "types"],
				"checkbox" : {
				  "keep_selected_style" : false,
				  "three_state":true
				},
				'core': {
					"themes" : {
						"responsive": false,
						 "icons": false
					}
				},
				"types" : {
					"default" : {
						"icon" : "fa fa-folder icon-state-warning icon-lg"
					},
					"file" : {
						"icon" : "fa fa-file icon-state-warning icon-lg"
					} 
				}
			});
        });
		$('.tree_biblioteca a.jstree-anchor').on('focus', function() {
			console.log($('.tree_biblioteca').jstree(true).get_selected());
		});
		
		$('.tree_biblioteca').each(function(index, elementtree) {
			var id_current = $(this).attr("data-id");
			
            $(this).on('changed.jstree', function (e, data) {
			
					var i, j, r = [];
					for (i = 0, j = data.selected.length; i < j; i++) {
						//console.log(data.instance.get_node(data.selected[i]).data.cat);
						r.push(data.instance.get_node(data.selected[i]).data.cat);
					}
			
				   
				   // nodos adicionales
				   var checked_ids = [];
				   setTimeout(function() {
					$(elementtree).find(".jstree-undetermined").each(function (i, element) {
					//	alert($(element).closest('.jstree-node').attr("data-cat"));
						if ( !( $(element).closest('.jstree-node').attr("data-cat") in checked_ids ) ) {
							checked_ids.push( $(element).closest('.jstree-node').attr("data-cat"));
						}
						
					});
					console.log("checked_ids");
					console.log(checked_ids);
					$("#categoriasv2_"+id_current).val(r.join(',')+","+checked_ids.join(','));
				   },300);
				
	
			});
        });
			
		$('.tree_biblioteca').each(function(index, element) {
         	$(this).jstree(true).open_all();
        });
		var nodeids = Array();
		var nodeids_uncheck = Array();
		$('.tree_biblioteca li').each(function() {
		//	console.log($(this).data("checkstate")+'::'+$(this).attr("id"));
			if ($(this).data("checkstate") == "checked") {
					nodeids.push($(this).attr("id"));
			}
		});
		 $('.tree_biblioteca').each(function(index, element) {
            $(this).jstree(true).close_all();
        });
		
		
		// other way
		//var nodeids = ["01", "02"];
        $(".tree_biblioteca").each(function(index, element) {
            $(this).jstree(true).check_node(nodeids);
        });
	
		$('.tree_biblioteca li').each(function() {
		//	console.log($(this).data("checkstate")+'::'+$(this).attr("id"));
			if ($(this).data("checkstate") != "checked") {
				//$('#tree_2').jstree('uncheck_node',$(this).attr("id"));	
				console.log($(".tree_biblioteca").jstree().get_node($(this).attr("id"))._get_children);
		//		$("#tree_2").jstree(true).deselect_node($(this).attr("id"));;	
			} 
		});
		
		

		
		var selected=$(".tree_biblioteca").jstree('get_selected');
		
		console.log(selected);

// end other way
		
		
    }
	
	
	

    return {
        //main function to initiate the module
        init: function () {

        
			handleBiblioteca();
	

        }

    };

}();

    jQuery(document).ready(function() {    
       UITree.init();
    });
