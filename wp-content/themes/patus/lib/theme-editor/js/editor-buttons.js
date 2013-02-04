(function() {
    tinymce.create('tinymce.plugins.UXDE', {
        init : function(ed, url) {
            ed.addButton('uxde');
            ed.addButton('uxde_contact_shortcode', {
                title : 'Insert contact form shortcode',
                image : 'http://www.uxde.net/wp-content/uploads/2012/07/editor-contact.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '[contact-form]' + "\n" + '');
                }
            });
            ed.addButton('uxde_hr_snippet', {
                title : 'Insert divider',
                image : 'http://www.uxde.net/wp-content/uploads/2012/07/editor-hr.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '<hr />' + "\n" + '');
                }
            });
			ed.addButton('uxde_tabs_snippet', {
                title : 'Insert tabs example',
                image : 'http://www.uxde.net/wp-content/uploads/2012/07/editor-tabs.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '[tabs title1="Tab 1" title2="Tab 2" title3="Tab 3"] [tab] This is tab 1 [/tab] [tab] This is tab 2 [/tab] [tab] This is tab 3 [/tab] [/tabs]' + "\n" + '');
                }
            });
            ed.addButton('uxde_toggle_snippet', {
                title : 'Insert toggle example',
                image : 'http://www.uxde.net/wp-content/uploads/2012/07/editor-toggle.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '<!--BEGIN .toggle -->' + "\n" + '<div class="toggle">' + "\n" + '' + "\t" + '<div class="trigger">Toggle Trigger <span></span></div>' + "\n" + '' + "\t" + '<div class="toggle-pane">Toggle content pane.</div>' + "\n" + '</div>' + "\n" + '<!--END .toggle -->' + "\n" + '' + "\n" + '');
                }
            });
            ed.addButton('uxde_toggle_closed_snippet', {
                title : 'Insert toggle (closed) example',
                image : 'http://www.uxde.net/wp-content/uploads/2012/07/editor-toggle.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '<!--BEGIN .toggle -->' + "\n" + '<div class="toggle closed">' + "\n" + '' + "\t" + '<div class="trigger">Toggle Trigger <span></span></div>' + "\n" + '' + "\t" + '<div class="toggle-pane">Toggle content pane.</div>' + "\n" + '</div>' + "\n" + '<!--END .toggle -->' + "\n" + '' + "\n" + '');
                }
            });
			ed.addButton('uxde_slider_snippet', {
                title : 'Insert slider example',
                image : 'http://www.uxde.net/wp-content/uploads/2012/07/slider_icon.jpg',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[slider autoplay="6000"] [slide] slide 1 html goes here [/slide] [slide] slide 2 html goes here [/slide] [slide] slide 3 html goes here [/slide] [/slider]');
                }
            });
            ed.addButton('uxde_callout_snippet', {
                title : 'Callout example',
                image : 'http://www.uxde.net/wp-content/uploads/2012/07/callout_icon.jpg',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[callout quote="UXDE dot Net has brought us immense success of tremendous proportions!" image="place/your/image/here.png"] place your content here [/callout]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('uxde', tinymce.plugins.UXDE);
})();
