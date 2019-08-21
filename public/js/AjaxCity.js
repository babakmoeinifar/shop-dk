$().ready(function () {

    $('#state').on('change', function (e) {
        let state_id = e.target.value;

        $.get('/ajax-city/' + state_id, function (data) {
            //success data
            $('#city').empty();
            $.each(data, function (index, cityObj) {
                $('#city').append('<option value="' + cityObj.id + '">' + cityObj.name + '</option>')
            });
        });
    });
});