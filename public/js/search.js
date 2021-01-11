$('#search').on('keypress', function(e) {
    $.ajax({
        type: "post",
        url: "/do_an_be1/post/searchModel.php",
        data: {
            "search_check": 1,
            "key": $(this).val() + e.key
        },
        dataType: "json",
        success: function (response) {
            $('.result-search').text('');
            let searchGroups = [];
            
            for (let i = 0; i < response.title.length; i++) {
                searchGroups.push(searchGroup(response.title[i],response.tag[i],response.id[i]));
            }

            searchGroups.forEach(e => {
                $('.result-search').append(e);
            });
        }
    });
});
$('.result-search').hide();
$('#search').on('focus',function (e) { 
    $('.result-search').show();
});
$('.container').on('click',function (e) {  
    $('.result-search').hide();
});
$('.result-search').on('focus',function (e) {  
    $(this).show();
})
function searchGroup(title,tagName,id) {
    return '<div class="search-group">'+
                '<div class="row">'+
                    '<div class="col-md-8"><a href="/do_an_be1/post/?id='+id+'">'+title+'</a></div>'+
                    '<div class="col-md-4 tag-list">'+
                        '<div class="tag-scroll col-md-12">'+
                            '<span><a href="/do_an_be1/tag/?tag='+tagName+'">'+tagName+'</a></span>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';
}