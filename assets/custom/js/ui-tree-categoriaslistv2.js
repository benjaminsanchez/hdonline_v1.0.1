var UITree = function () {


    var handleSamplev2 = function () {
        $('#tree_1').jstree({
            'plugins': ["wholerow","html_data",  "types"],
			"checkbox" : {
			  "keep_selected_style" : false,
			  "three_state":true
			},
            'core': {
                "themes" : {
                    "responsive": false,
					 "icons": true
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
	


	 // $('#tree_2').jstree(true).close_all();
		
		
	

// end other way
		
		
    }
	

	

    return {
        //main function to initiate the module
        init: function () {

        
            handleSamplev2();
	

        }

    };

}();

    jQuery(document).ready(function() {    
       UITree.init();
    });
