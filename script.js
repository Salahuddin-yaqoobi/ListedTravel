$(document).ready(function () {
    var $carousel = $('.brand_slide');
    var $dots = $('.brand-scroll-indicator .dot');
    var itemsPerPage = 6; // match your largest responsive "items" setting
  
    $carousel.owlCarousel({
      loop: false,
      margin: 10,
      nav: false,
      dots: false,
      responsive: {
        0: { items: 2 },
        600: { items: 4 },
        1000: { items: itemsPerPage }
      },
      onInitialized: function (event) {
        updateDots(0); // Always start with the first dot active
      },
      onTranslated: function (event) {
        const currentIndex = event.item.index;
        const pageIndex = Math.floor(currentIndex / itemsPerPage);
        updateDots(pageIndex);
      }
    });
  
    function updateDots(index) {
      $dots.removeClass('active');
      $dots.eq(index).addClass('active');
    }
  
    $dots.each(function (index) {
      $(this).on('click', function () {
        const goToIndex = index * itemsPerPage;
        $carousel.trigger('to.owl.carousel', [goToIndex, 300]);
        updateDots(index);
      });
    });
  });
  