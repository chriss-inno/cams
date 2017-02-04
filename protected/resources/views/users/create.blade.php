<script type="text/javascript" src="{{asset("assets/js/core/libraries/jquery_ui/core.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/plugins/forms/wizards/form_wizard/form.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/plugins/forms/wizards/form_wizard/form_wizard.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/plugins/forms/selects/select2.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/plugins/pickers/pickadate/picker.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/plugins/pickers/pickadate/picker.date.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/plugins/forms/styling/uniform.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/core/libraries/jasny_bootstrap.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/plugins/forms/validation/validate.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/plugins/notifications/bootbox.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/plugins/notifications/sweet_alert.min.js")}}"></script>

<script type="text/javascript" src="{{asset("assets/js/pages/wizard_form.js")}}"></script>

<script type="text/javascript" src="{{asset("assets/js/plugins/ui/ripple.min.js")}}"></script>
<script>
    $('.pickadate').pickadate();
</script>

<div class="portlet light bordered">
    <div class="portlet-body form">
        {!! Form::open(array('url'=>'users','role'=>'form','id'=>'formUsers')) !!}
        <div class="panel panel-flat">


            <div class="panel-body">
                <fieldset class="scheduler-border">
                    <legend class="text-bold">User Details</legend>
                    <div class="form-group ">
                        <label class="control-label">Full Name</label>
                        <input type="text" class="form-control" placeholder="Username" name="full_name" id="full_name"
                               value="">
                    </div>
                    <div class="form-group ">
                        <label class="control-label">Designation</label>
                        <input type="text" class="form-control" placeholder="Designation" name="designation" id="designation"
                               value="">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label">Email</label>
                                <input type="text" class="form-control" placeholder="Email" name="email" id="email"
                                       value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label">Phone</label>
                                <input type="text" class="form-control" placeholder="phone" name="phone" id="phone"
                                       value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label">Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="username" id="username"
                                       value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label">Role</label>
                                <select class="select" name="role_id" id="role_id" data-placeholder="Choose an option...">
                                    <option></option>
                                    @foreach(\App\Role::all() as $role)
                                        <option value="{{$role->id}}">{{$role->display_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label">Department</label>
                        <select class="select" name="department_id	" id="department_id	" data-placeholder="Choose an option...">
                            <option></option>
                            @foreach(\App\Department::all() as $department)
                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label">Password</label>
                                <input type="password" class="form-control" placeholder="password" name="password" id="password"
                                       value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="confirm" name="confirm" id="confirm"
                                       value="">
                            </div>
                        </div>
                    </div>

                </fieldset>
                <div class="row">
                    <div class="col-md-8 col-sm-8 pull-left" id="output">

                    </div>
                    <div class="col-md-4 col-sm-4 pull-right text-right">
                        <button type="button" class="btn btn-danger "  data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Add  User </button>
                    </div>

                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<script type="text/javascript" src="{{asset("assets/js/plugins/forms/validation/validate.min.js")}}"></script>
<script>


    $("#formUsers").validate({
        ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorElement:'div',
        rules: {
            full_name: "required",
            phone: "required",
            username: "required",
            status: "required",
            role_id: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            confirm: {
                required: true,
                minlength: 8,
                equalTo : "#password"
            }
        },
        messages: {
            full_name: "Please this field is required",
            phone: "Please field is required",
            username: "Please this field is required",
            role_id: "Please this field is required",
            status: "Please this field is required",
            email:{
                required:"Please this field is required",
                email:"Please enter valid email",
            },
            password:{
                required:"Please this field is required",
                minlength:"Password must have 8 characters",
            },
            confirm:{
                required:"Please this field is required",
                minlength:"Password must have 8 characters",
                equalTo :"Password don't match",
            }
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#formClients').serializeArray();
            var formURL = $('#formClients').attr("action");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        console.log(data);
                        //data: return data from server
                        $("#output").html(data);
                        setTimeout(function() {
                            location.replace('{{url('referrals')}}');
                            $("#output").html("");
                        }, 2000);
                    },
                    error: function(data)
                    {
                        console.log(data);
                        //in the responseJSON you get the form validation back.
                        $("#output").html("<h3><span class='text-danger'><i class='fa fa-spinner fa-spin'></i> Error in processing data try again...</span><h3>");

                    }
                });
        }
    });
</script>