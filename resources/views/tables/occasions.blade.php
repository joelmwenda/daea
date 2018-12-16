@extends('layouts.index')

    @component('/tables/css')
    @endcomponent

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Events</h2>
    </div>
    <div class="col-lg-2">

    </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Events Table</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover data-table" >
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Event Details</th>
                                    <th>Registration Deadline</th>
                                    <th>Event Date</th>
                                    <th>Member Price</th>
                                    <th>Non-Member Price</th>
                                    <th class="not-export-column">Register</th>
                                    <th class="not-export-column">View</th>
                                    <th class="not-export-column">Update</th>
                                    <th class="not-export-column">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($occasions as $occasion)
                                    <tr>
                                        <td> {{ $occasion->occasion  }} </td>
                                        <td> {{ $occasion->occasion_details  }} </td>
                                        <td> {{ $occasion->registration_deadline  }} </td>
                                        <td> {{ $occasion->occasion_date  }} </td>
                                        <td> {{ number_format($occasion->member_price)  }} </td>
                                        <td> {{ number_format($occasion->nonmember_price)  }} </td>

                                        @if($user->has_registered($occasion->id))
                                            <td> <a href="{{ url('occasion/deregister/' . $occasion->id) }}">
                                            De-Register</a> </td>
                                        @else
                                            <td> <a href="{{ url('occasion/register/' . $occasion->id) }}">
                                            Register</a> </td>
                                        @endif
                                        <td> <a href="{{ url('occasion/' . $occasion->id) }}">
                                            View</a> </td>
                                        <td> <a href="{{ url('occasion/' . $occasion->id . '/edit') }}">
                                            Edit</a> </td>
                                        <td> 
                                            {{ Form::open(['url' => 'occasion/' . $occasion->id, 'method' => 'delete']) }}
                                                <button type="submit" class="btn btn-xs btn-primary">Delete</button>
                                            {{ Form::close() }} 
                                        </td>
                                    </tr>
                                @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts') 

    @component('/tables/scripts')
    @endcomponent

@endsection