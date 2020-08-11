<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://js.pusher.com/5.1/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('js/jquery.playSound.js')}}"></script>
<script>

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "8000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}


  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = false;

  var pusher = new Pusher('c96d26c768ccf16c0edf', {
    cluster: 'ap1',
    forceTLS: true
  });

  var channel = pusher.subscribe('my-channel-admin');
  channel.bind('my-event', function(data) {

    $.playSound('{{asset("musics/text_notification.mp3")}}');
toastr.options.onclick = function() {
  var id = data.post.id;
   window.location.href= "/posts/show/"+id;
  //  window.location.href= "/projects/bd_police/posts/show/"+id;
   }
      toastr["info"](data.post.title, data.message);
      if ( $( "#postDataTable" ).length ) {
      $('#postDataTable').DataTable().ajax.reload();
      }
      getNotifications();
      
    // alert(JSON.stringify(data));
  });

  window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
    ]) !!};


    function getNotifications() {
            $.ajax({
                type: "GET",
                url: "{{route('get.unread.notification')}}",
                success: function (response) {
                    console.log(response);

                    $('#notification-count').html(response.count);
                    if (response.count > 0) {
                        $('#bell-icon').addClass('icon-anim-pulse');
                        $('#red-dot').show();
                        $('#notification-box').html('');
                        $.each(response.unread, function (key, value){

var links = value.data.post.id;

var url = '{{ route("post.show", ":links") }}';

url = url.replace(':links', links) + '?read='+value.id;


                            var notification = `<div class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span
                                                                    class="vertical-timeline-element-icon bounce-in"><i
                                                                        class="badge badge-dot badge-dot-xl badge-success">
                                                                    </i></span>
                                                                <div
                                                                    class="vertical-timeline-element-content bounce-in">
                                                                    <p class="timeline-title">New Post Added</p>
                                                                    <b> <a href="`+url+`"> ` + value.data.post.title + `</a></b>
                                                                    <p> ` +
                                                                     value.data.post.description.substring(0,150) 
                                                                     + `...</p>
                                                                    <p> 
                                                                     <i class="pe-7s-user icon-gradient bg-royal"> </i> ` +
                                                                     value.data.post.post_user.name +` (` + value.data.post.post_user.phone +`)`
                                                                     + `
                                                                     </p>
                                                                     <p> 
                                                                     <i class="pe-7s-map-2 icon-gradient bg-royal"> </i> ` +
                                                                     value.data.post.thana.name
                                                                     + `
                                                                     </p>
                                                                    <p>  <a href="javascript:void(0);">` + value.data.post.date_time + `</a></p>
                                                                    
                                                                    <span
                                                                        class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>`;

                            $('#notification-box').append(notification);
                           
                        });
                    
                    }
                }
            });
        }   

</script>