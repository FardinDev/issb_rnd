


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form  action="{{route('notification.send')}}" method="post">
                @csrf
<div class="form-group">
    <input class="form-control" type="text" name='message'>
</div>
<div class="form-group">
    <button class="btn btn-info" type="submit" >Submit</button>
</div>
        
               
                
            
            </form>
        </div>
    </div>
</div>

@endsection
