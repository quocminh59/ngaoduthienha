$(document).ready(function() {
    // get data-itinerary by ajax
    var url = $('#get-url').val();
    var datatable = $('#datatable').DataTable({
        processing: true,
        responsive: true,
        serverSide: true,
        stateSave: true,
        ajax: {
            method: 'POST',
            url: url,
            data: function(d) {
                d.search = $('#search-box').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5%', orderable: false, searchable: false, class: 'align-middle'},  
            {data: 'title', name: 'title', width: '70%', orderable: false, class: 'align-middle'},
            {data: 'action', name: 'action', width: '25%', orderable: false, class: 'align-middle'},
        ]
    });

    $("#search-box").keyup(function() {
        datatable.draw();
    });

    // create/update itinerary by ajax
    $('.button-submit').click(function() {
        var url = $('#action-form').val();
        let title = $('#title').val();
        let data = {
            title: title,
        };
        saveItinerary(url, data, datatable);
    })
})

function saveItinerary(url, data, datatable) {
    $.ajax({
        url: url,
        type: "POST",
        data: {
            title: data.title,
        }
    }).done(function(response) {
        toastr.success(response);
        datatable.draw();
        // reset form
        let value = $('#action-form').children().eq(0).val();
        $('#action-form').val(value);
        $('#title').val('');
        $('.invalid-feedback').children().remove();
    }).fail(function(response) {
        if(response.responseJSON.errors.title.length > 0) {
            $('.invalid-feedback').children().remove();
            let content = `<strong>${response.responseJSON.errors.title[0]}</strong>`;
            $('.invalid-feedback').append(content);
        }
        // toastr.error(response);
        console.log(response);
    })
}

function getData(element) {
    let url = element.data('url-update');
    let urlGetData = element.data('url-data');
    $('#action-form').children().eq(1).val('update');
    $('#action-form option[value="update"]').val(url); 
    $('#action-form').val(url);
    $.ajax({
        url: urlGetData,
        type: 'GET',
    }).done(function(data) {
        $('#title').val(data.title);
    })
}