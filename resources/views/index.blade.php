<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{config('app.name')}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{secure_asset('assets/style.css')}}">
  <!-- Font Awesome File -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<body>

  <div class="container app">
    <div class="row app-one">


      <!-- New Message Sidebar End -->

      <!-- Conversation Start -->
      <div class="col-sm-8 conversation" style="width:100%;">
        <!-- Heading -->
        <div class="row heading">
          <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
            <div class="heading-avatar-icon">
              <img src="{{secure_asset('assets/logo.png')}}">
            </div>
          </div>
          <div class="col-sm-8 col-xs-7 heading-name">
            <a class="heading-name-meta">{{env('BOT_NAME')}}
            </a>
            <span class="botstatus">Online</span>
          </div>
          <div class="col-sm-1 col-xs-1  heading-dot pull-right">
            <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
          </div>
        </div>
        <!-- Heading End -->

        <!-- Message Box -->
        <div class="row message" id="conversation">



          <div class="row message-body">
            <div class="col-sm-12 message-main-receiver">
              <div class="receiver">
                <div class="message-text">
                 Hello, I'm SadeBOT
                </div>
                <span class="message-time pull-right" id="default">
                  <script>
				  time = new Date().toLocaleTimeString();
				  $("#default").html(time);
				  </script>
                </span>
              </div>
            </div>
          </div>

        </div>
        <!-- Message Box End -->

        <!-- Reply Box -->
        <form name="talkform" id="talkform" class="row reply">
          <!--<div class="col-sm-1 col-xs-1 reply-emojis">-->
          <!--  <i class="fa fa-smile-o fa-2x"></i>-->
          <!--</div>-->
          <div class="col-sm-9 col-xs-9 reply-main">
            <textarea class="form-control" id="comment" name="say" onKeyPress="enterpressalert(event, this)" placeholder="say something..." autofocus></textarea>
          </div>
          <!--<div class="col-sm-1 col-xs-1 reply-recording">-->
          <!--  <i class="fa fa-microphone fa-2x" aria-hidden="true"></i>-->
          <!--</div>-->
          <div class="col-sm-1 col-xs-1 reply-send" onclick="sendChat()" id="btnSubmit">
            <i class="fa fa-send fa-2x" aria-hidden="true"></i>
          </div>
		  <input type="hidden" name="convo_id" id="convo_id" />
                        <input type="hidden" name="bot_id" id="bot_id" value="{{$bot_id}}"/>
                        <input type="hidden" name="format" id="format" value="json"/>
        </form>
        <!-- Reply Box End -->
      </div>
      <!-- Conversation End -->
    </div>
    <!-- App One End -->
  </div>

  <!-- App End -->
</body>
<script>
    const BASE_API = "{{env('APP_URL')}}";
</script>
<script type="text/javascript" src="{{secure_asset('custom.js')}}"></script>
<script>
    var cookie = readCookie('SADEBOT_') !== null ? readCookie('SADEBOT_') : createCookie('SADEBOT_', makeid(40), 30);
    loadChat();
    $("#convo_id").val(cookie);
    $(".heading-compose").click(function() {
      $(".side-two").css({
        "left": "0"
      });
    });

    $(".newMessage-back").click(function() {
      $(".side-two").css({
        "left": "-100%"
      });
    });
</script>
</html>
