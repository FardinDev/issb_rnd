<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pusher Test</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
        <script>

          // Enable pusher logging - don't include this in production
          Pusher.logToConsole = true;
      
          var pusher = new Pusher('c96d26c768ccf16c0edf', {
            cluster: 'ap1',
            forceTLS: true
          });
      
          var channel = pusher.subscribe('my-channel-admin');
          channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
          });
        </script>
      </head>
      <body>
        <h1>Pusher Test :: <code>My ID {{Auth::user()->id}}</code></h1>
        <p>
          Try publishing an event to channel <code>my-channel</code> 
          with event name <code>my-event</code>.
        </p>
      </body>
</html>