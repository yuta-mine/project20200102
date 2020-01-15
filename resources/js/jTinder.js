$("#tinderslide").jTinder({
    onDislike: function (item) {
        currentUserIndex++;
        checkUserNum();
        var to_user = item[0].dataset.user_id
        postReaction(to_user, 'dislike')
    },
    onLike: function (item) {
        currentUserIndex++;
        checkUserNum();
        var to_user = item[0].dataset.user_id
        postReaction(to_user, 'like')


        $('.likebtn').on('click', function () {
            //クリック時に一番上にあるボタンを隠す
            var likebutton = this.innerText;
            $(this).addClass('btn_hidden');

            // 認証確認
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            // ajaxでDBに登録
            $.ajax({
                dataType: 'json',
                url: '/api/like',
                type: 'POST',
                data: {
                    dataval: likebutton,
                },
            }).done(function (data) {
                console.log('success');
            }).fail(function (XMLHttpRequest, textStatus, errorThrown) {
                console.log("ajax通信に失敗しました");
            });
        });
    },
    animationRevertSpeed: 200,
    animationSpeed: 400,
    threshold: 1,
    likeSelector: '.like',
    dislikeSelector: '.dislike'
});

$('.actions .like, .actions .dislike').click(function (e) {
    e.preventDefault();
    $("#tinderslide").jTinder($(this).attr('class'));
});