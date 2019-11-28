$(document).ready(function() {

    // Toggle Side Navigation

    $('.toggle-menu').click(function(e) {
        e.preventDefault();
        $('#containNav').toggleClass('nav-open');
        $('section').toggleClass('pushed');
    });

    // Click Navigation

    $('.scroller li a').click(function(e) {
        e.preventDefault();
        var $this = $(this);
        var target = this.hash,
            $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 900, 'swing', function() {
            window.location.hash = target;
        });

        
    });

   
    // We need to turn it into a function.
    // To apply the changes both on document ready and when we resize the browser.

    var ravenous = function() {

        // Set the matchMedia

        if (window.matchMedia('(min-width: 768px)').matches) {

            // Changes when we reach the max-width

            $('#containNav').toggleClass('nav-open', true);
            $('section').toggleClass('pushed', true);

        } else {

            $('#containNav').toggleClass('nav-open', false);
            $('section').toggleClass('pushed', false);
        }
    };
    // Set the function to resize
    $(window).resize(ravenous);
    // Call the function
    ravenous();
});
$(function() {

    // Cache vars
    var $lightbox = $('.lightbox'),
        $figure = $('figure'),
        $close = $('.close');


    // Handle item click
    $('.item').on('click', function() {

        var full = $(this).attr('data-full');
        toggleLightbox(full);
        console.log(full);

    });

    var from_$input = $('#input_date').pickadate(),
    from_picker = from_$input.pickadate('picker')

        // Check if there’s a “selected” date to start with.
        if ( from_picker.get('value') ) {
          to_picker.set('min', from_picker.get('select'))
        }

        // When something is selected, update the “from” and “to” limits.
        from_picker.on('set', function(event) {
          if ( event.select ) {
            to_picker.set('min', from_picker.get('select'))    
          }
          else if ( 'clear' in event ) {
            to_picker.set('min', false)
          }
        })
    
});


