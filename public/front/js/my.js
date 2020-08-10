(function($) {  
    // Porfolio isotope and filter
    var galeriIsotope = $('.galeri-container').isotope({
        itemSelector: '.galeri-item',
        layoutMode: 'fitRows'
    });
  
    $('#galeri-flters li').on('click', function() {
        $("#galeri-flters li").removeClass('filter-active');
        $(this).addClass('filter-active');
    
        galeriIsotope.isotope({
            filter: $(this).data('filter')
        });
        aos_init();
    });  
})(jQuery);