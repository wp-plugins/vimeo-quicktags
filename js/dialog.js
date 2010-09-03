var VimeoDialog = {
	init : function() {
	},

	insert : function() {
		
		var width = document.forms[0].vimeoWidth.value;
		var height = document.forms[0].vimeoHeight.value;
		var video_id = document.forms[0].vimeoID.value;
		var title = document.forms[0].vimeoTitle.value;
		var byline = document.forms[0].vimeoByline.value;
		var portrait = document.forms[0].vimeoPortrait.value;
		var autoplay = document.forms[0].vimeoAutoplay.value;
		var loop = document.forms[0].vimeoLoop.value;
		var color = document.forms[0].vimeoColor.value;
		
		// Insert the contents from the input into the document
		var embedCode = '[vimeo video_id="'+video_id+'" width="'+width+'" height="'+height+'" title="'+title+'" byline="'+byline+'" portrait="'+portrait+'" autoplay="'+autoplay+'" loop="'+loop+'" color="'+color+'"]';
		tinyMCEPopup.editor.execCommand('mceInsertRawHTML', false, embedCode);
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.onInit.add(VimeoDialog.init, VimeoDialog);