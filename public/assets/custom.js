$('#ask-form').submit(function(e){
    $.ajax({
        type: "POST",
        url: "/api/newquestion",
        data: $(this).serialize(),
        success: function(data){
            location.href = "/questions";
        },
        error: function(data){
            console.log(data)
        }
    });
    e.preventDefault();
});

function rateQuestion(id){
    $('#q-button-' + id).prop('disabled', true);
    $.ajax({
        type: "POST",
        url: "/api/ratequestion/" + id,
        success: function(data){
            $('#q-rate-' + id).text(data.rate);
            $('#q-button-' + id).removeClass('btnUncheck')
                .addClass('btnCheck');
        },
        error: function(data){
            console.log(data)
            setTimeout(function(){
              $('#q-button-' + id).prop('disabled', false);
            }, 1000);
        }
    });
}

function rateAnswer(id){
    $('#a-button-' + id).prop('disabled', true);
    $.ajax({
        type: "POST",
        url: "/api/rateanswer/" + id,
        success: function(data){
            $('#a-rate-' + id).text(data.rate);
            $('#a-button-' + id).removeClass('btnUncheck')
                .addClass('btnCheck');
            $('#a-button-' + id + ' img').attr('src', '/images/like-white.png');
        },
        error: function(data){
            console.log(data)
            setTimeout(function(){
              $('#a-button-' + id).prop('disabled', false);
            }, 1000);
        }
    });
}

$(document).ready(function(){
    $('#homeImage').height(window.innerHeight);
    if (window.innerHeight < $('body').height()) {
        $('#footer').css('position', 'relative');
    }
})

