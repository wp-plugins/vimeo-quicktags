var VimeoDialog = {
	init : function() {
	},

	insert : function() {
		// Insert the contents from the input into the document
		var embedCode = '<object type="application/x-shockwave-flash" width="'+document.forms[0].vimeoWidth.value+'" height="'+document.forms[0].vimeoHeight.value+'" data="http://www.vimeo.com/moogaloop.swf?clip_id='+document.forms[0].vimeoID.value+'&amp;server=www.vimeo.com&amp;fullscreen=1&amp;show_title='+document.forms[0].vimeoTitle.value+'&amp;show_byline='+document.forms[0].vimeoByline.value+'&amp;show_portrait='+document.forms[0].vimeoPortrait.value+'&amp;color='+document.forms[0].vimeoColor.value+'"><param name="quality" value="best" /><param name="scale" value="showAll" /><param name="allowfullscreen" value="true" /><param name="wmode" value="transparent"><param name="movie" value="http://www.vimeo.com/moogaloop.swf?clip_id='+document.forms[0].vimeoID.value+'&amp;server=www.vimeo.com&amp;fullscreen=1&amp;show_title='+document.forms[0].vimeoTitle.value+'&amp;show_byline='+document.forms[0].vimeoByline.value+'&amp;show_portrait='+document.forms[0].vimeoPortrait.value+'&amp;color='+document.forms[0].vimeoColor.value+'" /></object>';
		tinyMCEPopup.editor.execCommand('mceInsertRawHTML', false, embedCode);
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.onInit.add(VimeoDialog.init, VimeoDialog);

/*** MODEL Vimeo
<object type="application/x-shockwave-flash" width="'+document.forms[0].vimeoWidth.value+'" height="600" data="http://www.vimeo.com/moogaloop.swf?clip_id=923811&amp;server=www.vimeo.com&amp;
fullscreen=1&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef">	
<param name="quality" value="best" />	
<param name="allowfullscreen" value="true" />	
<param name="scale" value="showAll" />
<param name="wmode" value="transparent">	
<param name="movie" value="http://www.vimeo.com/moogaloop.swf?clip_id=923811&amp;server=www.vimeo.com&amp;fullscreen=1&amp;
show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef" /></object>
***/