function destroy(id){
    if(window.confirm("Are you want to delete this?")){
        destroyUser(id)
    }
}
function destroyUser(id){
    let body = {
        "_method":"DELETE",
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        "url" : `${window.location.pathname}/${id}`,
        "method" : "POST",
        "data" : body,
        "success" : function(response){
            $("#toast_body").html(response)
            $('#toast').toast('show')
            setTimeout(function(){
                $('#toast').toast('hide')
            },2000)
        }
    })
}
