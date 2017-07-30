$(function() {
  $(document).on('click', '.panel-heading span.collapse-toggle', function(e){
		    var $this = $(this);
			if(!$this.hasClass('collapsed')) {
				$this.parents('.panel').find('.panel-body').slideUp();
				$this.addClass('collapsed');
				//$this.find('i').addClass('transform-arrow');
			} else {
				$this.parents('.panel').find('.panel-body').slideDown();
				$this.removeClass('collapsed');
				//$this.find('i').removeClass('transform-arrow');
			}
		})
});


 $.isMobile = function(type){
        var reg = [];
        var any = {
            blackberry : 'BlackBerry',
            android : 'Android',
            windows : 'IEMobile',
            opera : 'Opera Mini',
            ios : 'iPhone|iPad|iPod'
        };
        type = 'undefined' == $.type(type) ? '*' : type.toLowerCase();
        if ('*' == type) reg = $.map(any, function(v){ return v; });
        else if (type in any) reg.push(any[type]);
        return !!(reg.length && navigator.userAgent.match(new RegExp(reg.join('|'), 'i')));
    };

 // Numeric only control handler
$.fn.ForceNumericOnly = function() 
{
return this.each(function() {
    $(this).keydown(function(e) {
        var key = e.charCode || e.keyCode || 0;

        // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
        return (
            key == 8 ||
            key == 9 ||
            key == 46 ||
            key == 190 ||   // normal .
            key == 110 ||   // keypad .
            (key >= 37 && key <= 40) ||
            (key >= 48 && key <= 57) ||
            (key >= 96 && key <= 105));
    }) 
})
};
// Numeric only control handler



