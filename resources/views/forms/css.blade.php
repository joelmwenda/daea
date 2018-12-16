@section('css_scripts')

<link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet" type="text/css">

{{ $slot }}

@endsection