

@extends('layouts.main')
@section('title')
User Create
@endsection

@section('content')



    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">{{config('staticTexts.user-m-add-user')}}
                      
                </div>
                <div class="table-responsive">
                    {!! Form::open(array('route' => 'user.store','method'=>'POST', 'enctype' =>"multipart/form-data", 'autocomplete' => 'off')) !!}
                    <div class="">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control bangla-bijoy')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Phone:</strong>
                                {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                            </div>
                        </div>
                       

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Gender:</strong>
                                {!! Form::select('gender', ['Male', 'Female'],[], array('class' => 'form-control ')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>DOB:</strong>
                                {!! Form::text('dob', null, array('placeholder' => 'dd-mm-yyyy','class' => 'form-control date')) !!}
                            </div>
                        </div>
                      
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Password:</strong>
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Confirm Password:</strong>
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Designation:</strong>
                                {!! Form::text('designation', null, array('placeholder' => 'Designation','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Works At:</strong>
                                {!! Form::text('works_at', null, array('placeholder' => 'Works At','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Role:</strong>
                                {!! Form::select('role', $roles,[], array('class' => 'form-control ')) !!}
                            </div>
                        </div>
                     
                    </div>
                    
            </div>
            <div class="d-block text-center card-footer">
                <button type="submit" class="btn-wide btn btn-success">Save</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

  
    </div>


    <script type="text/javascript">

        $('.date').datepicker({  
    
           format: 'dd-mm-yyyy',
           uiLibrary: 'bootstrap4'
         });  
    
        </script>




    @endsection

    @section('script')

    @endsection