@extends('site.master')
@section('page_js')
    @include('inc.page_js')
@stop
@section('main_navigation')
     @include('inc.main_navigation')
@stop
@section('page_title')
    Rehabilitation!
@stop
@section('page_heading_title')
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Vulnerability Assessments </span> - Inclusion</h4>
        <a class="heading-elements-toggle"><i class="icon-more"></i></a>
@stop
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{url('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
        <li class="active"><a href="{{url('assessments/inclusion')}}"><i class="icon-grid position-left"></i>  Vulnerability Assessments</a></li>
        <li class="active">Inclusion</li>
    </ul>
@stop
@section('contents')
    <div class="row" style="margin-bottom: 5px">
        <div class="col-md-12 text-right">
            <a  href="{{url('clients-va')}}" class=" btn"><i class="fa fa-search text-success"></i> <span>Search Client</span></a>
            <a  href="{{url('assessments/vulnerability')}}" class="btn  "><i class="fa fa-list text-info"></i> <span>List All</span></a>
            <a  href="{{url('import/assessments/vulnerability')}}" class="btn "><i class="fa fa-upload text-danger"></i> <span>Import</span></a>
        </div>
    </div>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Vulnerability Assessments Inclusion</h5>
        </div>

        <div class="panel-body">
        </div>

        <table class="table datatable-basic table-hover">
            <thead>
            <tr>
                <th>SNO</th>
                <th>Client No</th>
                <th>Full Name</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Form Details</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>

        </table>
    </div>
@stop