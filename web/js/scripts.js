function preview(url){
    $.ajax({
        url      : url,
        type     : 'GET',
        dataType : 'html',
        success  : function(data) {
            $('.modal-body').html(data);
            $('#view').modal();
        }
    });
    alert(id);
    alert('Добрый день');
}