@extends('site.master')
@section('page_js')
    <script type="text/javascript" src="{{asset("assets/js/plugins/tables/datatables/datatables.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/selects/select2.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/core/app.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/pages/datatables_basic.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/ui/ripple.min.js")}}"></script>
@stop
@section('scripts')
    <script>
        $(".deleteRecord").click(function(){
            var id1 = $(this).parent().attr('id');
            $(".deleteModule").show("slow").parent().parent().find("span").remove();
            var btn = $(this).parent().parent();
            $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
            $("#no").click(function(){
                $(this).parent().parent().find(".deleteRecord").show("slow");
                $(this).parent().parent().find("span").remove();
            });
            $("#yes").click(function(){
                $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                $.ajax({
                    url:"<?php echo url('camps') ?>/"+id1,
                    type: 'post',
                    data: {_method: 'delete', _token :"{{csrf_token()}}"},
                    success:function(msg){
                        btn.hide("slow").next("hr").hide("slow");
                    }
                });
            });
        });
    </script>
@stop
@section('main_navigation')
    <div class="sidebar-category sidebar-category-visible">
        <div class="category-content no-padding">
            <ul class="navigation navigation-main navigation-accordion">
                <li class="active"><a href="{{url('home')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                <!-- Main -->
                <li class="navigation-header">Registration desk<span></span> <i class="icon-menu" title="Main pages"></i></li>
                <li>
                    <a href="#"><i class="icon-users"></i>Clients <span></span></a>
                    <ul>
                        <li ><a href="{{url('clients/create')}}">Register New Client</a></li>
                        <li><a href="{{url('clients')}}">Search Client</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-list-unordered"></i> <span>Client Assessments</span></a>
                    <ul>
                        <li ><a href="{{url('assessments/create')}}">Vulnerability assessment</a></li>
                        <li><a href="{{url('import/assessments')}}">Inclusion assessment</a></li>
                        <li><a href="{{url('export/assessments')}}">Wheelchair Assessment</a></li>
                        <li><a href="{{url('reports/assessments')}}">Assessments Report</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-stack"></i> <span>Client Referrals</span></a>
                    <ul>
                        <li ><a href="{{url('referrals/create')}}">Open Referral</a></li>
                        <li><a href="{{url('import/referrals')}}">Import Referral</a></li>
                        <li><a href="{{url('export/referrals')}}">Export Referral</a></li>
                        <li><a href="{{url('search/referrals')}}">Search Referral</a></li>
                        <li><a href="{{url('reports/referrals')}}">Referral Report</a></li>
                    </ul>
                </li>
                <!-- /main -->

                <!-- Forms -->
                <li class="navigation-header"><span>Rehabilitation</span> <i class="icon-menu" title="Forms"></i></li>
                <li>
                    <a href="#"><i class="icon-grid"></i> <span>Rehabilitation Service</span></a>
                    <ul>
                        <li><a href="{{url('rehabilitation/register')}}">Open Register</a></li>
                        <li><a href="{{url('rehabilitation/progress')}}">Progress</a></li>
                        <li><a href="{{url('rehabilitation/register')}}">Search</a></li>
                        <li><a href="{{url('rehabilitation/Import')}}">Import</a></li>
                        <li><a href="{{url('rehabilitation/export')}}">Export</a></li>
                    </ul>
                </li>
                <!-- /forms -->
                <!-- Data visualization -->
                <li class="navigation-header"><span>Data visualization</span> <i class="icon-menu" title="Data visualization"></i></li>
                <li>
                    <a href="#"><i class="icon-graph"></i> <span>Clients Reports</span></a>
                    <ul>
                        <li><a href="{{url('reports/clients')}}">Registration</a></li>
                        <li><a href="{{url('reports/clients')}}">Assessments</a></li>
                        <li><a href="{{url('reports/clients')}}">Refferal</a></li>
                    </ul>
                </li>
                <!-- /data visualization -->
                <!-- Appearance -->
                <li class="navigation-header"><span>Settings</span> <i class="icon-menu" title="Settings"></i></li>
                <li>
                    <a href="#"><i class="icon-list"></i> <span>Countries</span></a>
                    <ul>
                        <li><a href="{{url('countries/create')}}">Add New Country</a></li>
                        <li><a href="{{url('countries')}}">List All Countries</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-list"></i> <span>Regions</span></a>
                    <ul>
                        <li><a href="{{url('regions/create')}}">Add New Region</a></li>
                        <li><a href="{{url('regions')}}">List All Regions</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="icon-grid"></i> <span>Camps</span></a>
                    <ul>
                        <li><a href="{{url('camps/create')}}">Add New Camp</a></li>
                        <li><a href="{{url('camps')}}">List All camps</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-puzzle4"></i> <span>PSN Codes</span></a>
                    <ul>
                        <li><a href="{{url('psncodes/create')}}">Add New Code</a></li>
                        <li><a href="{{url('psncodes')}}">List All Codes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-list"></i> <span>Departments</span></a>
                    <ul>
                        <li><a href="{{url('departments/create')}}">Add New Code</a></li>
                        <li><a href="{{url('departments')}}">List All Departments</a></li>
                    </ul>
                </li>
                <!-- /appearance -->

                <!-- Layout -->
                <li class="navigation-header"><span>Users Managements</span> <i class="icon-menu" title="Users Managements"></i></li>

                <li>
                    <a href="#"><i class="icon-users"></i> <span>Users</span></a>
                    <ul>
                        <li><a href="{{url('users')}}">Add New User</a></li>
                        <li><a href="{{url('users')}}">List All Users</a></li>
                        <li><a href="{{url('reports/users')}}">User Reports</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-popout"></i> <span>Users Rights</span></a>
                    <ul>
                        <li><a href="{{url('access/rights/create')}}">Add New</a></li>
                        <li><a href="{{url('access/rights')}}">List All</a></li>
                    </ul>
                </li>
                <!-- /layout -->



                <!-- Extensions -->
                <li class="navigation-header"><span>Data Sharing</span> <i class="icon-menu" title="Data Sharing"></i></li>
                <li>
                    <a href="#"><i class="icon-puzzle4"></i> <span>Data import</span></a>
                    <ul>
                        <li><a href="{{url('backup/import')}}">Import</a></li>
                        <li><a href="{{url('backup/export')}}">Export</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-popout"></i> <span>Data Approval</span></a>
                    <ul>
                        <li><a href="{{url('approval/pending')}}">Pending</a></li>
                    </ul>
                </li>
                <!-- /extensions -->
            </ul>
        </div>
    </div>
@stop
@section('page_title')
    Camps
@stop
@section('page_heading_title')
    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Clients </span> </h4>
    <a class="heading-elements-toggle"><i class="icon-more"></i></a>
@stop
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{url('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{url('clients')}}">Clients list</a></li>
    </ul>
@stop
@section('contents')
    <div class="row" style="margin-bottom: 5px">
        <div class="col-md-12 text-right">
            <a  href="{{url('clients/create')}}" class="btn btn-info "><i class="fa fa-file-o"></i> <span>Register New Client</span></a>
            <a  href="{{url('clients')}}" class="btn btn-info "><i class="fa fa-list"></i> <span>List All</span></a>
            <a  href="{{url('clients')}}" class="btn btn-info "><i class="fa fa-search"></i> <span>Search</span></a>
        </div>
    </div>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Clients Search</h5>
        </div>

        <div class="panel-body">
        </div>

        <table class="table datatable-basic table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>REG #</th>
                <th>Full Name</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Address</th>
                <th>Origin</th>
                <th>Arrival Date</th>
                <th>Camp</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1;?>
            @foreach($clients as $client)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$client->camp_name}}</td>
                <td>{{$client->reg_no}}</td>
                <td>{{$client->description}}</td>
                <td>{{$client->address}}</td>
                <td>{{$client->tel}}</td>
                <td>{{$client->tel}}</td>
                <td>@if(is_object($client->district) && $client->district != null ){{$client->district->district_name}}@endif</td>
                <td>@if(strtolower($client->status) =="working")<span class="label label-success">{{$client->status}}</span> @else <span class="label label-danger">{{$client->status}}</span>@endif</td>
                <td class="text-center">
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="fa fa-pencil"></i> Update details</a></li>
                                <li><a href="#"><i class="fa fa-trash"></i> Remove from list</a></li>
                                <li><a href="#"><i class="fa fa-file-o"></i> Vulnerability Assessment </a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop