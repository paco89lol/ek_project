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
    
    var options = {
        width: "700px",
        height: "750px",
        pdfOpenParams: {view: 'FitV', page: '1'}
    };    
    $(".boxed").each(function()
    {
        var path = $(this).find("#pdf").html();
        path = path.trim();
        PDFObject.embed("../"+path, $(this).find("#pdf"), options);
    });
    

    $("#btn_add_new_comment").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='add_new_comment']");
        var refreshPart = $(form.find("input[name='refreshId']").val());
        
        event.preventDefault();
        btn_submit.addClass("disabled");
  
        $.ajax({url: form.attr("action"),
            type: form.attr("method"),
            data: form.serialize(),
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
                    toastr.success("Comment was posted.");
                    //window.location = "./";
                }
                form[0].reset();
                var accountId = form.find("input[name='accountId']").val();
                var groupDocumentId = form.find("input[name='groupDocumentId']").val();
                refreshPart.load("view_controller/handle_refresh_comment_view.php?accountId="+accountId+"&groupDocumentId="+groupDocumentId);
            },
            complete: function (response)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
    
    $("#btn_add_inner_comment").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='add_inner_comment']");
        var refreshPart = $(form.find("input[name='refreshId']").val());
        
        event.preventDefault();
        btn_submit.addClass("disabled");
  
        $.ajax({url: form.attr("action"),
            type: form.attr("method"),
            data: form.serialize(),
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
                    toastr.success("Comment was posted.");
                    //window.location = "./";
                }
                form[0].reset();
                var accountId = form.find("input[name='accountId']").val();
                var groupDocumentId = form.find("input[name='groupDocumentId']").val();
                refreshPart.load("view_controller/handle_refresh_comment_view.php?accountId="+accountId+"&groupDocumentId="+groupDocumentId);
            },
            complete: function (response)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
    $("#btn_delete_inner_comment").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='delete_inner_comment']");
        var refreshPart = $(form.find("input[name='refreshId']").val());
        
        event.preventDefault();
        btn_submit.addClass("disabled");
  
        $.ajax({url: form.attr("action"),
            type: form.attr("method"),
            data: form.serialize(),
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
                    toastr.success("You just delete a comment.");
                    //window.location = "./";
                }
                form[0].reset();
                var accountId = form.find("input[name='accountId']").val();
                var groupDocumentId = form.find("input[name='groupDocumentId']").val();
                refreshPart.load("view_controller/handle_refresh_comment_view.php?accountId="+accountId+"&groupDocumentId="+groupDocumentId);
            },
            complete: function (response)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
    $("#btn_delete_comment").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='delete_comment']");
        var refreshPart = $(form.find("input[name='refreshId']").val());
        
        event.preventDefault();
        btn_submit.addClass("disabled");
  
        $.ajax({url: form.attr("action"),
            type: form.attr("method"),
            data: form.serialize(),
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
                    toastr.success("You just deleted a post.");
                    //window.location = "./";
                }
                form[0].reset();
                var accountId = form.find("input[name='accountId']").val();
                var groupDocumentId = form.find("input[name='groupDocumentId']").val();
                refreshPart.load("view_controller/handle_refresh_comment_view.php?accountId="+accountId+"&groupDocumentId="+groupDocumentId);
            },
            complete: function (response)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
});

function showComment(selector)
{
    $(selector).show();
}

function hideComment(selector)
{
    $(selector).hide();
}

function updatePdfView(path, selector, page)
{
    var options = {
        width: "700px",
        height: "750px",
        pdfOpenParams: {view: 'FitV', page: page}
    };   
    PDFObject.embed("../"+path, selector, options);
}

function clickLike(accountId, commentId, groupDocumentId, refreshId)
{
    var refreshPart = $(refreshId);
    
    $.ajax({url: "view_controller/handle_like.php",
            type: "GET",
            data: {accountId:accountId,commentId:commentId},
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
                    toastr.success("You just like a post.");
                    //window.location = "./";
                }
                refreshPart.load("view_controller/handle_refresh_comment_view.php?accountId="+accountId+"&groupDocumentId="+groupDocumentId);
            },
            complete: function (response)
            {
                
            }
    });
}

function clickDislike(accountId, commentId, groupDocumentId, refreshId)
{
    var refreshPart = $(refreshId);
    
    $.ajax({url: "view_controller/handle_dislike.php",
            type: "GET",
            data: {accountId:accountId,commentId:commentId},
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
                    toastr.success("You just dislike a post.");
                    //window.location = "./";
                }
                refreshPart.load("view_controller/handle_refresh_comment_view.php?accountId="+accountId+"&groupDocumentId="+groupDocumentId);
            },
            complete: function (response)
            {
                
            }
    });
}

function initAddComment(accountId, groupDocumentId, refreshId)
{
    $("form[name='add_new_comment'] input[name='accountId']").attr("value", accountId);
    $("form[name='add_new_comment'] input[name='groupDocumentId']").attr("value", groupDocumentId);
    $("form[name='add_new_comment'] input[name='refreshId']").attr("value", refreshId);
}

function initInnerComment(accountId, commentId, groupDocumentId, refreshId)
{
    $("form[name='add_inner_comment'] input[name='accountId']").attr("value", accountId);
    $("form[name='add_inner_comment'] input[name='groupDocumentId']").attr("value", groupDocumentId);
    $("form[name='add_inner_comment'] input[name='commentId']").attr("value", commentId);
    $("form[name='add_inner_comment'] input[name='refreshId']").attr("value", refreshId);
}

function initDeleteInnerComment(accountId, commentId, groupDocumentId, innerCommentId, refreshId)
{
    $("form[name='delete_inner_comment'] input[name='accountId']").attr("value", accountId);
    $("form[name='delete_inner_comment'] input[name='groupDocumentId']").attr("value", groupDocumentId);
    $("form[name='delete_inner_comment'] input[name='commentId']").attr("value", commentId);
    $("form[name='delete_inner_comment'] input[name='innerCommentId']").attr("value", innerCommentId);
    $("form[name='delete_inner_comment'] input[name='refreshId']").attr("value", refreshId);
}

function initDeleteComment(accountId, commentId, groupDocumentId, refreshId)
{
    $("form[name='delete_comment'] input[name='accountId']").attr("value", accountId);
    $("form[name='delete_comment'] input[name='groupDocumentId']").attr("value", groupDocumentId);
    $("form[name='delete_comment'] input[name='commentId']").attr("value", commentId);
    $("form[name='delete_comment'] input[name='refreshId']").attr("value", refreshId);
}