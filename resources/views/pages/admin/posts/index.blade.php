@extends('layouts.main')

@section('title')
Posts
@endsection

{{-- post panel starts --}}
@section('content')

<div class="main-card mb-3 card">
    <div class="card-header-tab card-header">
        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
            <i class="header-icon pe-7s-news-paper icon-gradient bg-royal"> </i>All Posts</div>
            <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                <button id="reload" class="btn btn-primary">Reload</button>
            </div>
    </div>

    <div class="card-body">
        <table id="postDataTable" class="table table-hover table-striped table-bordered dataTable dtr-inline">
            
        </table>
    </div>
</div>



@endsection



<script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script> 


<script>
    $(document).ready(function () {
      var table =  $('#postDataTable').DataTable({

            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i> '
            },
            processing: true,
            serverSide: true,
            ajax: '{{ route("post.ajax") }}',
            columns: [{
                    data: 'id',
                    title: 'id'
                },
                {
                    data: 'title',
                    title: 'Post Title'
                },
                {
                    data: 'thumb',
                    title: 'Thumb'
                },
                {
                    data: 'user.name',
                    title: 'User Name'
                },
                {
                    data: 'user.phone',
                    title: 'User Phone'
                },
                {
                    data: 'thana.name',
                    title: 'Thana'
                },
                {
                    data: 'comments',
                    title: 'Comments'
                },
                {
                    data: 'created_at',
                    title: 'Posted On'
                },
                {
                    data: 'action',
                    title: 'Veiw'
                },
            ],
            columnDefs: [{
                    targets: 2,
                    render: function (data) {
                        return '<a href="' + data + '" target="_blank"><img src="' + data + '" class="thumb-image"> </a>'
                    },
                    className: 'text-center',
                    sortable: false,
                    searchable: false,

                },
                {
                    targets: 3,
                    className: 'text-bold'

                },
                // {
                //     targets: 4,
                //     render: function (data) {
                //         return '<b>' + data.name + '</b><br>' + data.parent;
                //     }

                // },
                {
                    targets: [0, 6],
                    className: 'text-center',
                    searchable: false,
                },
                {
                    targets: 8,
                    render: function (data) {
                        return '<a class="btn-transition btn btn-outline-info" href="' + data + '">View</a>'
                    },
                    className: 'text-center',
                    sortable: false,
                    searchable: false,
                }
            ]
        });



        $('#reload').on('click', function () {
            $('#postDataTable').DataTable().ajax.reload();
        })
    });


</script>


