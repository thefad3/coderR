$(document).ready(function() {

    $('.like').click(function() {

        var contentId = $(this).attr('rel');
        var userInfo = $(this).attr('uid');
        //console.log(contentId, userInfo);
        var url = "/like/"+userInfo+'/'+contentId;
        console.log(url);
        var link = this;
        if(!$(link).hasClass('liked')) {
            $.post(url, { id: contentId, uid: userInfo }).done(function(data) {
                if(data) {
                    $(link).addClass('liked');
                    $(link).html('<span class="glyphicon glyphicon-thumbs-up"></span> Liked');
                }
            });
        }

    });
    $('#close').on('closed.bs.alert', function () {
        console.log('Closed Alert');
    })
});