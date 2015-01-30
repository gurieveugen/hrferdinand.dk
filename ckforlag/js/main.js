jQuery(document).ready(function(){
	jQuery('#s').keyup(function(){
		var search = new Search(jQuery(this));
		search.keyup();
	});

	jQuery(document).click(function(e){
		if(!jQuery(e.target).closest('.list-search-results').length) 
		{
	        if(jQuery('ul.list-search-results').is(":visible")) 
	        {
	            jQuery('ul.list-search-results').hide()
	        }
	    }  
	});
});

function Search(input){
	var $this = this;

	$this.delay = 500;
	$this.input = input;
	$this.container = $this.input.parent().find('ul.list-search-results');

	$this.keyup = function(){
		clearTimeout($this.input.data('timer'));
		$this.input.data(
			'timer', 
			setTimeout(function(){ $this.load() }, $this.delay)
		);
	};

	$this.load = function(){
		if($this.input.val().length <= 0)
		{
			$this.wrapResult({status: 'NULL'});	
			return false;
		} 
		if(typeof(window.search_ajax_req) != 'undefined') window.search_ajax_req.abort();
		window.search_ajax_req = jQuery.ajax({
			type: "POST",
			dataType: 'json',
			url: defaults.ajax_url,
			data: {
				action: 'search',
				s: $this.input.val()
			},
			success: function(response){
				$this.wrapResult(response);
			},
			beforeSend: function(){
				jQuery('.loader').show();
			},
			complete: function(){
				jQuery('.loader').hide();
			},
			error: function(){
				jQuery('.loader').hide();	
			}
		});
	};

	$this.wrapResult = function(result){
		$this.container.find('li').each(function(){
			jQuery(this).remove();
		});

		if(result.status == 'OK')
		{
			for (var i = 0; i < result.posts.length; i++) 
			{
				$this.container.append($this.getPostHTML(result.posts[i]));
			}
		}
		$this.container.show();
	};

	$this.getPostHTML = function(el){
		return	'<li>' + 
				'<a href="' + el.link + '">' +
				'<img src="' + el.image + '" alt="">' +
				'<div class="holder">' + 
				'<strong class="title">' + el.post_title + '</strong>' +
				'</div>' +
				'</a>' +
				'</li>';
	};
}