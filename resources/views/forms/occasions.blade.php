@extends('layouts.index')

    @component('/forms/css')
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
                    <h5>Events Form</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">

                        @if (isset($occasion))
                            {{ Form::open(['url' => '/occasion/' . $occasion->id, 'method' => 'put', 'class'=>'val-form form-horizontal']) }}
                        @else
                            {{ Form::open(['url'=>'/occasion', 'method' => 'post', 'class'=>'val-form form-horizontal']) }}
                        @endif                      
        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Event Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" required name="occasion" type="text" value="{{ $occasion->occasion ?? '' }}">
                            </div>
                        </div>                        
        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Event Details</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="occasion_details" type="text" value="{{ $occasion->occasion_details ?? '' }}">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Deadline for Registration</label>
                            <div class="col-sm-9">
                                <div class="input-group date dob-picker">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" required class="form-control" value="{{ $occasion->registration_deadline ?? '' }}" name="registration_deadline">
                                </div>
                            </div>                            
                        </div>   

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Date Of Event</label>
                            <div class="col-sm-9">
                                <div class="input-group date dob-picker">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" required class="form-control" value="{{ $occasion->occasion_date ?? '' }}" name="occasion_date">
                                </div>
                            </div>                            
                        </div>                       
        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Member Price</label>
                            <div class="col-sm-9">
                                <input class="form-control" required number="number"  name="member_price" type="text" value="{{ $occasion->member_price ?? 0 }}">
                            </div>
                        </div>                      
        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Non-Member Price</label>
                            <div class="col-sm-9">
                                <input class="form-control" required number="number"  name="nonmember_price" type="text" value="{{ $occasion->nonmember_price ?? 0 }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary col-xs-offset-5">Submit</button>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts') 

    @component('/forms/scripts')

    @endcomponent

@endsection