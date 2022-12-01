(function() {
     /* Register the buttons */
     tinymce.create('tinymce.plugins.debbuttons', {
          init : function(ed, url) {
               /**
               * Inserts shortcode content
               */
               ed.addButton( 'debbutton', {
                    title : 'Insert DebButton',
                    image : (typeof mbtrans !== 'undefined') ? mbtrans.icon : null,
                    onclick : function() {
                        var mm = new window.maxFoundry.maxMedia();
                 				mm.init();
                 				mm.openModal();
                    }
               });
          },
          createControl : function(n, cm) {
               return null;
          },
     });
     /* Start the buttons */
     tinymce.PluginManager.add( 'debbuttons_tinymce', tinymce.plugins.debbuttons );
})();
