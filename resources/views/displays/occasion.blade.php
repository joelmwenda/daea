@extends('layouts.index')

    @component('/tables/css')
    @endcomponent

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ title_case($occasion->occasion) }} Details</h2>
    </div>
    <div class="col-lg-2">

    </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Attendees Table</h5>
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
                                    <th>Person</th>
                                    <th>Current Membership Status</th>
                                    <th>Amount Paid</th>
                                    <th>Date Paid</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($occasion->occasion_registration_view as $v)
                                    <tr>
                                        <td> {{ $v->name  }} </td>
                                        <td> {{ $v->user->get_boolean('is_member')  }} </td>
                                        <td> {{ number_format($v->deduction_amount)  }} </td>
                                        <td> {{ $v->created_at  }} </td>
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