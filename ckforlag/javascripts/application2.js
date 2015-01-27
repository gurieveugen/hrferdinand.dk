$(document).ready(function(){

if ($('.current-menu-item').find('.sub-menu').length) {
$('.pageHeader').addClass('down');
}


if ($('.current-menu-ancestor').find('.sub-menu').length) {
$('.pageHeader').addClass('down');
}

$('#top-nav > LI:last-child').addClass('last');
	
	
		$('input[type="text"], TEXTAREA').focus(function() {
        if (this.value == this.defaultValue){
        	this.value = '';
    	}
        if(this.value != this.defaultValue){
	    	this.select();
        }
    });
    $('input[type="text"], TEXTAREA').blur(function() {
        if (this.value == ''){
        	this.value = this.defaultValue;
    	}
    });
	
});
