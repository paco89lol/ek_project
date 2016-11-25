$(document).ready(function()
{   
    
    $("#btn_register").click(function(event)
    {
        var btn_submit= $(this);
        var form = $("form[name='register']");
        var span_error = $("#register_message");
        
        event.preventDefault();
        btn_submit.addClass("disabled");
        
        $.ajax({url: form.attr("action"),
                type: form.attr("method"),
                data: form.serialize(),
                beforeSend: function()
                {
                    
                },
                success: function(reponse)
                {
                    var reponseMessage = JSON.parse(reponse);
                    if(reponseMessage[0].error)
                    {
                        //error
                        span_error.html(reponseMessage[0].errMsg);
                    }else
                    {
                        //success
                        window.location = "../index/";
                    }
                    
                },
                complete: function(reponse)
                {
                    btn_submit.removeClass("disabled");
                }
        });
        
    });
    
});

