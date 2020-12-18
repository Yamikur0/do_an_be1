$(document).ready(function () {
    $('#submit-comment').on("click", function () {
        let message = $('#message').val();
        let postId = $('#post_id').val();
        let userId = $('#user_id').val();

        if (message != '') {
            $.ajax({
                type: "post",
                url: "/do_an_be1/post/process.php",
                data: {
                    'comment_check': 1,
                    'message': message,
                    'postId': postId,
                    'userId': userId
                },
                dataType: 'json',
                success: function (response) {
                    let newComment = '<div class="media">' +
                        '<div class="media-body">' +
                        '<h4 class="media-heading">' + response.username + '</h4>' +
                        "<p>" + message + "</p>" +
                        '<ul class="list-unstyled list-inline media-detail pull-left">' +
                        '<li><i class="fa fa-calendar"></i>' + response.createAt + '</li>' +
                        '<li><i class="fa fa-thumbs-up"></i>' + 0 + '</li>' +
                        ' </ul>' +
                        '<ul class="list-unstyled list-inline media-detail pull-right">' +
                        '<li class=""><a href="">Like</a></li>' +
                        '<li class=""><a href="">Reply</a></li>' +
                        '</ul>' +
                        '</div>' +
                        '</div>';
                    $('.test').after(newComment);
                    $('#countComment').text(response.countComment+' Comments');
                    $('#message').val('');
                },
            });
        }
    });
    $('.like').on('click', function () {
        let userId = $('#user_id').val();
        let commentId = $(this).attr('commentId');
        $.ajax({
            type: "post",
            url: "/do_an_be1/post/process.php",
            data: {
                "like_check":1,
                "comment_id": commentId,
                "user_id": userId
            },
            dataType: "json",
            success: function (response) {
                if (response.result == 'success') {
                    $('span[comment_id='+commentId+']').text(response.like);
                }
            }
        });    
    });
});