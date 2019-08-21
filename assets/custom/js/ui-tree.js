var UITree = function () {


    var handleSample2 = function () {
        $('#tree_2').jstree({
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
		$('#tree_2 a.jstree-anchor').on('focus', function() {
			console.log($('#tree_2').jstree(true).get_selected());
		});
		
		$('#tree_2').on('changed.jstree', function (e, data) {
             	var i, j, r = [];
                for (i = 0, j = data.selected.length; i < j; i++) {
					//console.log(data.instance.get_node(data.selected[i]).data.cat);
                    r.push(data.instance.get_node(data.selected[i]).data.cat);
                }
			//	$("#categoriasv2").val(r.join(','));
				
               // alert('Selected: ' + r.join(', '));
			   
			   // nodos adicionales
			   var checked_ids = [];
			   setTimeout(function() {
				$("#tree_2").find(".jstree-undetermined").each(function (i, element) {
				//	alert($(element).closest('.jstree-node').attr("data-cat"));
					if ( !( $(element).closest('.jstree-node').attr("data-cat") in checked_ids ) ) {
					checked_ids.push( $(element).closest('.jstree-node').attr("data-cat"));
					}
					
				});
				console.log(checked_ids);
			$("#categoriasv2").val(r.join(',')+","+checked_ids.join(','));
			   },300);
			

        });
			
		$('#tree_2').jstree(true).open_all();
		var nodeids = Array();
		var nodeids_uncheck = Array();
		$('#tree_2 li').each(function() {
		//	console.log($(this).data("checkstate")+'::'+$(this).attr("id"));
			if ($(this).data("checkstate") == "checked") {
					nodeids.push($(this).attr("id"));
			}
		});
	 $('#tree_2').jstree(true).close_all();
		
		
		// other way
		//var nodeids = ["01", "02"];
        $("#tree_2").jstree(true).check_node(nodeids);
	
		$('#tree_2 li').each(function() {
		//	console.log($(this).data("checkstate")+'::'+$(this).attr("id"));
			if ($(this).data("checkstate") != "checked") {
				//$('#tree_2').jstree('uncheck_node',$(this).attr("id"));	
				console.log($("#tree_2").jstree().get_node($(this).attr("id"))._get_children);
		//		$("#tree_2").jstree(true).deselect_node($(this).attr("id"));;	
			} 
		});
		
		

		
		var selected=$("#tree_2").jstree('get_selected');
		
		console.log(selected);

// end other way
		
		
    }
	

	

    return {
        //main function to initiate the module
        init: function () {

        
            handleSample2();
	

        }

    };

}();

    jQuery(document).ready(function() {    
       UITree.init();
    });
