@extends('layouts.index')

    @component('/forms/css')
    @endcomponent

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Payments</h2>
    </div>
    <div class="col-lg-2">

    </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Payments Form</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">

                        @if (isset($payment))
                            {{ Form::open(['url' => '/payment/' . $payment->id, 'method' => 'put', 'class'=>'val-form form-horizontal']) }}
                        @else
                            {{ Form::open(['url'=>'/payment', 'method' => 'post', 'class'=>'val-form form-horizontal']) }}
                        @endif  

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Amount</label>
                            <div class="col-sm-9">
                                <input class="form-control" required number="number"  name="payment_amount" type="text" value="{{ $payment->payment_amount ?? 0 }}">
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