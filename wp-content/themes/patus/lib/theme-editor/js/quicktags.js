edButtons[edButtons.length] = new edButton(
	'pt_contact_shortcode',
	'contact form',
	'[contact-form]' + "\n" + '',
	'',
	'',
	-1
);

edButtons[edButtons.length] = new edButton(
	'pt_tabs_snippet',
	'tabs',
	'[tabs title1="Tab 1" title2="Tab 2" title3="Tab 3"] [tab] This is tab 1 [/tab] [tab] This is tab 2 [/tab] [tab] This is tab 3 [/tab] [/tabs]' + "\n" + '',
	'',
	'',
	-1
);


edButtons[edButtons.length] = new edButton(
	'pt_toggle_snippet',
	'toggle',
	'<!--BEGIN .toggle -->' + "\n" + '<div class="toggle">' + "\n" + '' + "\t" + '<div class="trigger">Toggle Trigger <span></span></div>' + "\n" + '' + "\t" + '<div class="toggle-pane">Toggle content pane.</div>' + "\n" + '</div>' + "\n" + '<!--END .toggle -->' + "\n" + '' + "\n" + '',
	'',
	'',
	-1
);

edButtons[edButtons.length] = new edButton(
	'pt_toggle_closed_snippet',
	'toggle closed',
	'<!--BEGIN .toggle -->' + "\n" + '<div class="toggle closed">' + "\n" + '' + "\t" + '<div class="trigger">Toggle Trigger <span></span></div>' + "\n" + '' + "\t" + '<div class="toggle-pane">Toggle content pane.</div>' + "\n" + '</div>' + "\n" + '<!--END .toggle -->' + "\n" + '' + "\n" + '',
	'',
	'',
	-1
);




/* Examples ////

// preformatted text for including code in a post
edButtons[edButtons.length] = new edButton(
	'ed_pre',
	'pre',
	'<pre lang="css" line="1">',
	'</pre>',
	''
);

// definition list
edButtons[edButtons.length] = new edButton(
	'ed_dl',
	'dl',
	'<dl>\n',
	'</dl>\n\n',
	''
);

// definition list - definition term
edButtons[edButtons.length] = new edButton(
	'ed_dt',
	'dt',
	'\t<dt>',
	'</dt>\n',
	''
);

// definition list - definition description
edButtons[edButtons.length] = new edButton(
	'ed_dd',
	'dd',
	'\t<dd>',
	'</dd>\n',
	''
);

// tab character
edButtons[edButtons.length] = new edButton(
	'ed_tab',
	'tab',
	'\t',
	'',
	'',
	-1
);

//// End Examples */