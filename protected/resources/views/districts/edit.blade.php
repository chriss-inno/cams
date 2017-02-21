@extends('site.master')
@section('page_js')
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/validation/validate.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/selects/bootstrap_multiselect.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/inputs/touchspin.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/selects/select2.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/styling/switch.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/styling/switchery.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/styling/uniform.min.js")}}"></script>

    <script type="text/javascript" src="{{asset("assets/js/core/app.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/pages/form_validation.js")}}"></script>

    <script type="text/javascript" src="{{asset("assets/js/plugins/ui/ripple.min.js")}}"></script>
@stop
@section('main_navigation')
    @include('inc.main_navigation')
@stop
@section('page_title')
    Districts
@stop
@section('page_heading_title')
    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Districts</span> - Add new District</h4>
    <a class="heading-elements-toggle"><i class="icon-more"></i></a>
@stop
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{url('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{url('regions')}}">Districts</a></li>
        <li class="active">Add New</li>
    </ul>
@stop
@section('contents')
    <!-- Vertical form options -->
    <div class="row" style="margin-bottom: 5px">
        <div class="col-md-12 text-right">
            <a  href="{{url('districts/create')}}" class="btn btn-info "><i class="fa fa-file-o"></i> <span>Add New</span></a>
            <a  href="{{url('districts')}}" class="btn btn-info "><i class="fa fa-list"></i> <span>List All</span></a>
            <a  href="{{url('districts')}}" class="btn btn-info "><i class="fa fa-search"></i> <span>Search</span></a>
            <a  href="{{url('regions')}}" class="btn btn-info "><i class="fa fa-list"></i> <span>Return to Regions</span></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <!-- Basic layout-->
            {!! Form::model($district, array('route' => array('districts.update', $district->id), 'method' => 'PUT','role'=>'form','id'=>'formDistrict')) !!}
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">District Details</h5>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>Region Name:</label>
                        <select class="select" name="region_id" id="region_id">
                            @if(old('region_id') !="")
                                <?php $region=\App\Region::find(old('region_id'));?>
                                <option value="{{$region->id}}">{{$region->region_name}}</option>
                            @else
                                @if(is_object($district->region) && $district->region != null )
                                <option value="{{$district->region->id}}">{{$district->region->region_name}}</option>
                                    @else
                                    <option value="">--Select--</option>
                                    @endif
                            @endif
                            @foreach(\App\Region::orderBy('region_name','ASC')->get() as $item)
                                <option value="{{$item->id}}">{{$item->region_name}}</option>
                            @endforeach
                        </select>
                        @if($errors->first('region_id') !="")
                            <label id="region_id_name-error" class="validation-error-label" for="region_id">{{ $errors->first('region_id') }}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>District Name:</label>
                        <input type="text" class="form-control" placeholder="District Name" name="district_name" id="district_name"
                               @if(old('district_name') !="") value="{{old('district_name')}}" @else  value="{{$district->district_name}}" @endif>
                        @if($errors->first('district_name') !="")
                            <label id="region_name-error" class="validation-error-label" for="region_name">{{ $errors->first('district_name') }}</label>
                        @endif
                        @if(Session::has('district_error'))
                            <label id="country_code-error" class="validation-error-label" for="country_code">{{ Session::get('district_error') }}</label>
                        @endif
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        <!-- /basic layout -->

        </div>


    </div>
    <!-- /vertical form options -->
@stop