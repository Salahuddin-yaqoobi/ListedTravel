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

  document.querySelectorAll('.exploreInventoryBtn').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault(); // Stop normal link behavior

        // Hide the route-area (your slider section)
        const routeArea = document.querySelector('.route-area');
        if (routeArea) {
            routeArea.style.display = 'none'; // ✅ move this inside the if block
        }

        // Now load the product page into a container
        fetch('product.html')
            .then(response => response.text())
            .then(data => {
                // Where to inject the products
                const container = document.getElementById('dynamicContent');
                if (container) { // ✅ Always check if container exists
                    container.innerHTML = data;
                    window.scrollTo(0, 0); // Scroll to top
                } else {
                    console.error('Container with id dynamicContent not found!');
                }
            })
            .catch(error => console.error('Error loading product page:', error));
    });
});


