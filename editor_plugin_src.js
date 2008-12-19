(function() {
	tinymce.create('tinymce.plugins.VimeoPlugin', {

		init : function(ed, url) {
			ed.addCommand('mceVimeo', function() {
				ed.windowManager.open({
					file : url + '/dialog.htm',
					width : 260 + parseInt(ed.getLang('vimeo.delta_width', 0)),
					height : 320 + parseInt(ed.getLang('vimeo.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url, // Plugin absolute URL
					some_custom_arg : 'custom arg' // Custom argument
				});
			});


			ed.addButton('vimeo', {
				title : 'insert vimeo video',
				cmd : 'mceVimeo',
				image : url + '/img/vimeo.gif'
			});


			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('vimeo', n.nodeName == 'IMG');
			});
		},

		createControl : function(n, cm) {
			return null;
		},

		
		getInfo : function() {
			return {
				longname : 'Vimeo Plugin',
				author   :  'Denzel',
				authorurl : 'http://denzeldesigns.com',
				infourl : 'http://denzeldesigns.com',
				version : "1.0"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('vimeo', tinymce.plugins.VimeoPlugin);
})();