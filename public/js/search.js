$(document).ready(function() {

	// Search field in navbar
    $('#search').on('keyup', function() {
        $('div#content').empty();
        var searchKeyword = $(this).val();
        if (searchKeyword.length >= 3) {
            $.post('search.php', {keywords: searchKeyword}, function(data) {
                //$('div#content').empty();
                $.each(data, function() {

                    $('div#content').append('<a class="list-group-item list-group-item-action" href="single.php?p=' + this.id + '">' + this.title + '</a>');
                });
            }, "json");
        }
    });

    // Endless scrolling
    var flag = 0;
    $.ajax({
        type: "GET",
        url: "endlessScroll.php",
        data: {
            'offset': flag,
            'limit': 3
        },
        success: function(data) {
            $(data).appendTo('div.posts');
            flag += 3;
        }
    });
    $(window).scroll(function() {

        if ($(window).scrollTop() >= $(document).height() - $(window).height()) {

            $('.loaderImage').show('slow');
            $.ajax({
                type: "GET",
                url: "endlessScroll.php",
                data: {
                    'offset': flag,
                    'limit': 3
                },

                success: function(data) {


                    $(data).appendTo('div.posts');
                    flag += 3;
                    $('.loaderImage').hide();
                }
            });
        }
    });


 // Back to top button

    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
            //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
            offset_opacity = 1200,
            //duration of the top scrolling animation (in ms)
            scroll_top_duration = 700,
            //grab the "back to top" link
            $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function() {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event) {
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0
        }, scroll_top_duration
                );
    });

    
});