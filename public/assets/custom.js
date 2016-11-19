$('#ask-form').submit(function(e){
    $.ajax({
        type: "POST",
        url: "/api/newquestion",
        data: $(this).serialize(),
        success: function(data){
            console.log(data);
            location.href = "/";
        },
        error: function(data){
            console.log(data)
        }
    });
    e.preventDefault();
});

function rateQuestion(id){
    console.log(id)
    $('#q-button-' + id).prop('disabled', true);
    $.ajax({
        type: "POST",
        url: "/api/ratequestion/" + id,
        success: function(data){
            console.log(data)
            $('#q-rate-' + id).text(data.rate);
            setTimeout(function(){
              $('#q-button-' + id).prop('disabled', false);
            }, 1000);
        },
        error: function(data){
            console.log(data)
            setTimeout(function(){
              $('#q-button-' + id).prop('disabled', false);
            }, 1000);
        }
    });
}