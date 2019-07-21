var route = $('meta[name="route"]').attr('content');
var _token = $('meta[name="csrf-token"]').attr('content');

function deleteItem(id) {
    $.ajax({
        url: route + '/' + id,
        type: "delete",
        data: {
            _token: _token
        },
        success: function(d) {
            if (d.result) {
                window.location.replace(route);
            }
        }
    });
}