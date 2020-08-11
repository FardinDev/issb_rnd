@extends('layouts.main')
@section('title', 'User List')

@section('content')







    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif




 

<div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">  {{config('staticTexts.user-m-user-list')}}
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">

                            @can('user-add')

                                <a class="btn btn-success" href="{{ route('user.create') }}">{{config('staticTexts.user-m-add-user')}}</a>
                            
                            @endcan
                   
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Added On</th>
                                <th class="text-center">Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                                @foreach ($users as $key => $user)
                                <tr>
                                        <td class="text-center text-muted">{{ ++$i }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img width="40" class="rounded-circle" src="{{ !$user->image ? 'images/profile-images/default-image.png' : asset('images/profile-images/'.$user->image)}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading bangla-bijoy">{{$user->name}}</div>
                                                        <div class="widget-subheading opacity-7">{{ $user->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                     
                                        <td class="text-center">
                                            {{-- <div class="badge badge-warning">Pending</div> --}}
                                            @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <div class="badge badge-warning">{{ $v }}</div>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td class="text-center">{{(date('d-m-Y', strtotime($user->created_at)))}}</td>
                                        <td class="text-center">
                                                <a class="btn btn-info disabled" href="{{ route('user.show',$user->id) }}">Show</a>
                                                @can('edit-users')
                                                <a class="btn btn-primary disabled" href="{{ route('user.edit',$user->id) }}">Edit</a>
                                                @endcan
                                                @can('delete-users')
                                                {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}
                                                {!! Form::button('Delete', ['class' => 'btn btn-danger deleteUser disabled']) !!}
                                                {!! Form::close() !!}
                                                @endcan
                                        </td>
                                    </tr>      
                                @endforeach
                              
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer">
                    
                </div>
            </div>
        </div>
    </div>





{{-- {!! $users->render() !!} --}}


@endsection

@section('script')


<script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
$(document).ready( function() {
    $('.deleteUser').on('click',function(e){
    
    e.preventDefault();
    var form = $(this).parents('form');
  
Swal.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
type: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, delete it!'
}).then((result) => {
if (result.value) {
Swal.fire(
  'Deleted!',
  'Your file has been deleted.',
  'success'
)
form.submit();
}
})
});
});
</script>

@endsection