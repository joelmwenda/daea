      

function set_select_student(div_name, url, minimum_length, placeholder, create_listener=true) {
    div_name = '#' + div_name;      

    $(div_name).select2({
        minimumInputLength: minimum_length,
        placeholder: placeholder,
        ajax: {
            delay   : 100,
            type    : "POST",
            dataType: 'json',
            data    : function(params){
                return {
                    search : params.term
                }
            },
            url     : function(params){
                params.page = params.page || 1;
                return  url + "?page=" + params.page;
            },
            processResults: function(data, params){
                return {
                    results     : $.map(data.data, function (row){
                        return {
                            text    : row.student + ' - ' + row.surname + ' ' + row.first_name,
                            id      : row.student_id        
                        };
                    }),
                    pagination  : {
                        more: data.to < data.total
                    }
                };
            }
        }
    });

    if(create_listener){
        set_change_listener(div_name, url);
    }           
}

function set_change_listener(div_name, url)
{
    url = url.substring(0, url.length -6);
    $(div_name).change(function(){
        var val = $(this).val();
        {{ $slot }}
    }); 
}