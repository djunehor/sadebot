if (readCookie(BASE_API) === null) {
    createCookie(BASE_API, '1234ABCD', 365);
}

function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }

    document.cookie = name + "=" + value + expires + "; path=/";

    return value;
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function makeid(length = 5) {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < length; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

function enterpressalert(e, textarea) {
    var code = (e.keyCode ? e.keyCode : e.which);
    if (code == 13) { //Enter keycode
        $('#comment').focusout();
        sendChat();
    }
}

function sendChat() {

    var user = $('#comment').val();

    var time = new Date().toLocaleTimeString();

    var message = `<div class="row message-body">
            <div class="col-sm-12 message-main-sender">
              <div class="sender" id="sender">
                <div class="message-text">
				${user}
                </div>
                <span class="message-time pull-right">
                  ${time}
                </span>
              </div>
            </div>
          </div>`;

    $("#conversation").append(message);
    scrollDown();
    $(".botstatus").html("<i>Thinking...</i>");

    var token = readCookie(BASE_API);

    var formdata = $("#talkform").serialize();
    $('#comment').val('');
    var id = makeid();
    console.log(id);

    $.ajax({
        url: "api/bot",
        type: "POST",
        data: formdata,
        headers: {
            "app-id": 'test.sadebot.com',
            "token": token
        },
        success: function (data) {
            //console.log(data);
            var b = data.message;
            if (user.toLowerCase() == 'clear') {
                //console.log('message clear');
                $("#conversation").html('');
            }
            $(".botstatus").html("Online");
            var response = `<div class="row message-body">
            <div class="col-sm-12 message-main-receiver">
              <div class="receiver">
                <div class="message-text">
                 ${b}
                </div>
                <span class="message-time pull-right">
                  ${time}
                </span>
              </div>
            </div>
          </div>`;
            $("#conversation").append(response);
            scrollDown();
        },
        error: function (error) {
            $(".botstatus").html("Online");
            var response = `<div class="row message-body">
            <div class="col-sm-12 message-main-receiver">
              <div class="receiver">
                <div class="message-text">
                 Please say that again?
                </div>
                <span class="message-time pull-right">
                  ${time}
                </span>
              </div>
            </div>
          </div>`;
            $("#conversation").append(response);
            scrollDown();
        },
        timeout: 216000
    });

}

function newRoute() {
    $("#loading").show();
    $("#btnSubmit").attr('disabled', 'disabled');

    var token = readCookie(BASE_API);
    $.ajax({
        url: BASE_API + "/api/route",
        type: "POST",
        headers: {
            "app-id": 'test.sadebot.com',
            "token": token
        },
        data: {
            from: $("#from").val(),
            to: $("#to").val(),
            price: $("#price").val(),
            distance: $("#distance").val(),
            nodes: $("#nodes").val(),
            type: $("#type").val()
        },
        success: function (data) {
            $('#loading').hide();
            $('#btnSubmit').removeAttr('disabled');

            if (!data['status']) {
                $('#error').show();
                $('#error').html(data);
            }
            $('#newRoute')[0].reset();
        },
        error: function (xhr) {
            console.log(xhr.responseText);

            $('#loading').hide();

            var response = $.parseJSON(xhr.responseText);

            $('#error').show();
            $('#error').html(response['error']);
        }
    });
}

function showImg(input) {
    var regEx = /\[img\](.*?)\[\/img\]/;
    var repl = '<br><a href="$1" target="_blank"><img src="$1" alt="$1" width="150" /></a>';
    var out = input.replace(regEx, repl);
    console.log('out = ' + out);
    return out
}

function makeLink(input) {
    var regEx = /\[link=(.*?)\](.*?)\[\/link\]/;
    var repl = '<a href="$1" target="_blank">$2</a>';
    var out = input.replace(regEx, repl);
    console.log('out = ' + out);
    return out;
}

function scrollDown() {
    $('#conversation').scrollTop($('#conversation')[0].scrollHeight - $('#conversation')[0].clientHeight);
    $('#comment').focus();
}

function editRoute(id) {
    $("#loading").show();
    $("#btnSubmit").attr('disabled', 'disabled');

    var token = readCookie(BASE_API);
    $.ajax({
        url: BASE_API + "/api/route/" + id,
        type: "PATCH",
        headers: {
            "app-id": 'test.sadebot.com',
            "token": token
        },
        data: {
            from: $("#from").val(),
            to: $("#to").val(),
            price: $("#price").val(),
            distance: $("#distance").val(),
            nodes: $("#nodes").val(),
            type: $("#type").val()
        },
        success: function (data) {
            $('#loading').hide();
            $('#btnSubmit').removeAttr('disabled');

            if (!data['status']) {
                $('#error').show();
                $('#error').html(data);
            }
        },
        error: function (xhr) {

            $('#loading').hide();

            var response = $.parseJSON(xhr.responseText);

            $('#error').show();
            $('#error').html(response['error']);
        }
    });
}

function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
}

function loadChat() {

    var token = readCookie(BASE_API);

    $.ajax({
        url: BASE_API+"/api/bot",
        type: "GET",
        data: {convo_id: readCookie('SADEBOT_')},
        headers: {
            "app-id": 'test.sadebot.com',
            "token": token
        },
        success: function (data) {
            console.log(data);
            var b = data.message;

            $(".botstatus").html("Online");
            for (var i in b) {

                $("#conversation").append(`<div class="row message-body">
            <div class="col-sm-12 message-main-sender">
              <div class="sender" id="sender">
                <div class="message-text">
				${b[i].input}
                </div>
                <span class="message-time pull-right">
                  ${new Date().toLocaleTimeString(Date.parse(b[i].timestamp))}
                </span>
              </div>
            </div>
          </div>`);
                scrollDown();
                $("#conversation").append(`<div class="row message-body">
            <div class="col-sm-12 message-main-receiver">
              <div class="receiver">
                <div class="message-text">
                 ${b[i].response}
                </div>
                <span class="message-time pull-right">
                  ${new Date().toLocaleTimeString(Date.parse(b[i].timestamp))}
                </span>
              </div>
            </div>
          </div>`);

                scrollDown();
            }
        },
        error: function (error) {
            $(".botstatus").html("Online");
            var response = `<div class="row message-body">
            <div class="col-sm-12 message-main-receiver">
              <div class="receiver">
                <div class="message-text">
                 Failed to load conversation
                </div>
                <span class="message-time pull-right">
                  ${time}
                </span>
              </div>
            </div>
          </div>`;
            $("#conversation").append(response);
            scrollDown();
        },
        timeout: 216000
    });

}
