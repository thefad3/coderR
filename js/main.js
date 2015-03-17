


$(document).ready(function() {

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    });

    var track_click = 0; //track user click on "load more" button, righ now it is 0 click

    var total_pages = <? echo $total_pages; ?>;

    $('#results').load("fetch_pages.php", {'page':track_click}, function() {track_click++;}); //initial data to load


    $(".load_more").click(function (e) { //user clicks on button

        $(this).hide(); //hide load more button on click
        $('.animation_image').show(); //show loading image

        if(track_click <= total_pages) //user click number is still less than total pages
        {
            //post page number and load returned data into result element
            $.post('fetch_pages.php',{'page': track_click}, function(data) {

                $(".load_more").show(); //bring back load more button

                $("#results").append(data); //append data received from server

                //scroll page smoothly to button id
                $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);

                //hide loading image
                $('.animation_image').hide(); //hide loading image once data is received

                track_click++; //user click increment on load button

            }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                alert(thrownError); //alert with HTTP error
                $(".load_more").show(); //bring back load more button
                $('.animation_image').hide(); //hide loading image once data is received
            });


            if(track_click >= total_pages-1) //compare user click with page number
            {
                //reached end of the page yet? disable load button
                $(".load_more").attr("disabled", "disabled");
            }
        }

    });
});