jQuery(document).ready(function(){
	jQuery('#s').keyup(function(){
		var search = new Search(jQuery(this));
		search.keyup();
	});
});

function Search(input){
	var $this = this;

	$this.delay = 1000;
	$this.input = input;
	$this.container = $this.input.parent().find('ul.list-search-results');

	$this.keyup = function(){
		clearTimeout($this.input.data('timer'));
		$this.input.data(
			'time', 
			setTimeout(function(){ $this.load() }, $this.delay)
		);
	};

	$this.load = function(){
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
				
			},
			complete: function(){
				
			},
			error: function(){
				
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