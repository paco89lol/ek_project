
$(document).ready(function ()
{   
    //search button
    $("#btn_search").click(function (event)
    {
        var form = $("form[name='search']");
        var data = form.serialize();    
        var text = form.find("input[name='text']").val(); 
        
        event.preventDefault();
        console.info(text);
        if(text.trim() !== "")
        {
            window.location = "../search/index.php?"+data;
        }
    });
    
    
    var accountId = $("form[name='add_file'] input[name='accountId']").val();
    $("#add_file_categoryId").load("view_controller/query_category_option.php?accountId="+accountId);

    $("#btn_add_file").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='add_file']");
        //var span_error = $("#add_file_message");
        var formdata = new FormData(form[0]);
        var val;
        val = $("#add_file_categoryId option:selected").val();
        val = (typeof val === "undefined" || val === "")?"": val;
        formdata.append("categoryId",val);
        
        event.preventDefault();
        btn_submit.addClass("disabled");
        
        $.ajax({url: form.attr("action"),
            type: form.attr("method"),
            data: formdata,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function ()
            {

            },
            success: function (response)
            {
                var reponseMessage = JSON.parse(response);
                if (reponseMessage[0].error)
                {
                    //error
                    toastr.error(reponseMessage[0].errMsg);
                    //span_error.html(reponseMessage[0].errMsg);
                }else
                {
                    //success
                    toastr.success('Success messages');
                    //window.location = "./";
                }
                form[0].reset();
            },
            complete: function (response)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
   
});


