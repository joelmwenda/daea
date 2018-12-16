@extends('layouts.index')

    @component('/forms/css')
    @endcomponent

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Student Search</h2>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Student Search Form</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">  

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Students</label>
                            <div class="col-sm-9">
                                <select class="form-control" required id="students" name="students">

                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts') 

    @component('/forms/scripts')
        set_select_student("students", "{{ url('/student/search') }}", 3, "Search for Student");
    @endcomponent

    <script type="text/javascript">        

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
                window.location.href = url + val;
            }); 
        }
    </script>

@endsection