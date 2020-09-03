@extends('layouts.main')

@section('title')
{{str_limit($post->title, 20, '...')}}
@endsection

@section('content')
<style>
    .chat-box-wrapper .chat-box {

        display: block;

    }

    .scroll-area-lg {

        height: 50vh;
    }

::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}

#loading {
    background: url('../../images/loader.gif') no-repeat;
    background-color: black;
    background-position: center;
    background-size: 15%;
    opacity: 0.6;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 9999999;
}
</style>
<div class="row">
    <div class="col-12">
        <div class="main-card mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                    <i class="header-icon pe-7s-news-paper icon-gradient bg-royal"> </i>{{$post->title}}
                </div>

            </div>
            <div class="card-body">
                <p>{{$post->description}}</p>

            </div>
            <div class="card-footer">
                <div class="btn-actions-pane-left text-capitalize actions-icon-btn">
                    <i class="pe-7s-user icon-gradient bg-royal"> </i>{{$post->user->name.' ('.$post->user->phone.')'}}
                    <i class="pe-7s-clock icon-gradient bg-royal"> </i>{{$post->created_at}}
                    <i class="pe-7s-map-2 icon-gradient bg-royal">
                    </i>{{$post->thana->name.' ('.$post->thana->parent.')'}}
                </div>
                <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                    @if ($post->file)
                        
                    <i class="pe-7s-paperclip icon-gradient bg-royal"> </i>
                <a href="{{asset($post->file)}}" target="_blank">View Attachment</a>
                    @else
                        <span>No Attachment</span>
                    @endif
                   
                </div>
            </div>
        </div>
    </div>


    <div class="col-sm-12 col-lg-12">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i
                        class="header-icon pe-7s-comment icon-gradient bg-ripe-malin"> </i>Comments</div>

            </div>
            <div class="scroll-area-lg">
                
                <div class="container p-0 m-0 scroll" >
                    <div id="loading"></div>
                    <div class="p-2">
                        <div class="chat-wrapper p-1" id="comment-box">
                            
                            @if (count($post->comments))
                            @foreach ($post->comments as $comment)
                            
                            <div class="chat-box-wrapper">
                                <div>
                                    <div class="avatar-icon-wrapper mr-1">
                                    
                                        <div class="avatar-icon avatar-icon-lg rounded">
                                            <img src="{{asset($comment->user->avatar)}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="chat-box">
                                        <div class="chat-user-name">
                                            {{$comment->user->name}}
                                        </div>
                                        {{$comment->comment}}
                                    </div>
                                    <small class="opacity-9">
                                        <i class="fa fa-calendar-alt mr-1"></i>
                                        {{$comment->created_at}}
                                    </small>
                                </div>
                            </div>
                            @endforeach



                            @else

                            <div class="chat-box-wrapper">
                                No Comments!!

                            </div>
                            @endif




                        </div>
                    </div>
          
                </div>

           
            </div>
            <div class="card-footer">

                <form class="form-inline m-0 p-1 col-12" id="post-comment" method="POST" autocomplete="off"
                    action="{{route('comment.post', $post->id)}}">
                    @csrf
                    <div class="form-group col-11">

                        <input type="text" name="comment" class="form-control col-12" id="comment"
                            placeholder="Write Your Comment Here..." required>
                    </div>
                    <div class="form-group col-1">

                        <button id="ladda-btn" type="submit" class="ladda-button btn btn-info" data-style="zoom-out">
                            <span class="ladda-label">Comment
                            </span>

                            <span class="ladda-spinner">
                            </span></button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    @endsection

    <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="{{asset('js/spin.min.js')}}"></script>
    <script src="{{asset('js/ladda.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#loading').hide();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#post-comment").submit(function (event) {
                event.preventDefault();
                var form = $(this);
                var url = form.attr('action');
                var l = Ladda.create(document.querySelector( '#ladda-btn' ));
	 	            
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    beforeSend: function(){
                     l.start();
                    },
                    success: function (data) {

                        console.log(data);
                       
                        l.stop();
                        $('#comment-box').html('');
                        $.each(data.comments, function (key, value) {

                            var comment = `<div class="chat-box-wrapper">
                            <div>
                                <div class="avatar-icon-wrapper mr-1">
                                    
                                    <div class="avatar-icon avatar-icon-lg rounded">
                                        <img src="` + value.comment_user.avatar + `" alt="">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="chat-box">
                                    <div class="chat-user-name">
                                        ` + value.comment_user.name + `
                                    </div>
                                    ` + value.comment + `
                                </div>
                                <small class="opacity-9">
                                    <i class="fa fa-calendar-alt mr-1"></i>
                                    ` + value.date_time + `
                                </small>
                            </div>
                        </div>`;

                            $('#comment-box').append(comment);
                            $('#comment').val('');

                        });

                        
                        $(".scroll-area-lg").animate({ scrollTop: $('.scroll-area-lg').prop("scrollHeight")}, 1000);
                    }
                });

            });
        });

    </script>
