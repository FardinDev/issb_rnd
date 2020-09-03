
@extends('layouts.main')
@section('title', 'Candidate Data Add')

@section('content')


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="main-card mb-3 card">
<div class="card-body">
    {{-- <div id="smartwizard3" class="forms-wizard-vertical sw-main sw-theme-default">
        <ul class="forms-wizard nav nav-tabs step-anchor">
            <li class="nav-item active">
                <a href="#step-122" class="nav-link">
                    <em>1</em><span>Candidate Information</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#step-222" class="nav-link">
                    <em>2</em><span>Family Information</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#step-322" class="nav-link">
                    <em>3</em><span>Educational Information</span>
                </a>
            </li>
        </ul>
        <div class="form-wizard-content sw-container tab-content" style="min-height: 698px;">
            <div id="step-122" class="tab-pane step-content" style="display: block;">
                <div class="card-body">
                    <div class="position-relative form-group">
                        <label for="exampleEmail5">Input without validation</label>
                        <input type="text" class="form-control">
                        <div class="invalid-feedback">You will not be able to see this</div>
                        <small class="form-text text-muted">Example help text that remains unchanged.</small>
                    </div>
                   
                </div>
            </div>
            <div id="step-222" class="tab-pane step-content" style="display: none;">
                <div id="accordion" class="accordion-wrapper mb-3">
                    <div class="card">
                        <div id="headingTwo" class="b-radius-0 card-header">
                            <button type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block">
                                <span class="form-heading">Credit Card Informations<p>Enter your user informations below</p></span>
                            </button>
                        </div>
                        <div data-parent="#accordion" id="collapseTwo" class="collapse show">
                            <div class="card-body">
                                <div class="position-relative form-group">
                                    <label for="exampleEmail3">Plain Text (Static)</label>
                                    <p class="form-control-plaintext">Some plain text/ static value</p>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="exampleEmail4">Email</label>
                                    <input name="email" id="exampleEmail4" placeholder="with a placeholder" type="email" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="examplePassword">Password</label>
                                    <input name="password" id="examplePassword" placeholder="password placeholder" type="password" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="exampleUrl">Url</label>
                                    <input name="url" id="exampleUrl" placeholder="url placeholder" type="url" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="exampleNumber">Number</label>
                                    <input name="number" id="exampleNumber" placeholder="number placeholder" type="number" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="exampleDatetime">Datetime</label>
                                    <input name="datetime" id="exampleDatetime" placeholder="datetime placeholder" type="datetime" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="exampleDate">Date</label>
                                    <input name="date" id="exampleDate" placeholder="date placeholder" type="date" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="exampleTime">Time</label>
                                    <input name="time" id="exampleTime" placeholder="time placeholder" type="time" class="form-control"></div>
                                <div class="position-relative form-group">
                                    <label for="exampleColor">Color</label>
                                    <input name="color" id="exampleColor" placeholder="color placeholder" type="color" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="step-322" class="tab-pane step-content" style="display: none;">
                <div class="card-body">
                    <div class="position-relative form-group">
                        <label for="exampleEmail5">Input without validation</label>
                        <input type="text" class="form-control">
                        <div class="invalid-feedback">You will not be able to see this</div>
                        <small class="form-text text-muted">Example help text that remains unchanged.</small>
                    </div>
                   
                </div>
            </div>
        </div>
    </div> --}}
<form action="{{route('candidate.search')}}" method="post" autocomplete="off" id="candidateAddForm">
    @csrf
    <div class="position-relative form-group">
        <label for="board_no">Board No.</label>
        <input name="board_no" id="board_no" placeholder="Please Enter Board No" type="text" required class="form-control">
    </div>
    <div class="position-relative form-group">
        <label for="chest_no">Chest No.</label>
        <input name="chest_no" id="chest_no" placeholder="Please Enter Chest No" type="text" required class="form-control">
    </div>
    
    <div class="divider"></div>
    <div class="clearfix">
        <button type="submit" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-info" id="submitBtn">Search</button>
    </div>
</form>
</div>
</div>
<script>
    $(document).ready(function () {

        $('#candidateAddForm').submit(function (e) { 
            $('#submitBtn').attr("disabled","disabled");
            $('#submitBtn').addClass('disabled');
        });
  
    });
</script>
@endsection

@section('script')



@endsection