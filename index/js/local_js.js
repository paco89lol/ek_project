$(document).ready(function()
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
    
    $("#btn_delete_file").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='delete_file']");
        //var span_error = $("#add_file_message");
        var refreshPart = $("#tab_view");
        
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
                    toastr.success("File has been deleted.");
                    //window.location = "./";
                }
                form[0].reset();
                var val = form.find("input[name='accountId']").val();
                refreshPart.load("view_controller/handle_refresh_tab_view.php?accountId="+val);
            },
            complete: function (reponse)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
    $("#btn_share_file").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='share_file']");
        //var span_error = $("#add_file_message");
        var refreshPart = $("#tab_view");
        
        event.preventDefault();
        btn_submit.addClass("disabled");
  
        $.ajax({url: form.attr("action"),
            type: form.attr("method"),
            data: form.serialize(),
            beforeSend: function ()
            {

            },
            success: function (reponse)
            {   
                var reponseMessage = JSON.parse(reponse);
                if (reponseMessage[0].error)
                {
                    //error
                    toastr.error(reponseMessage[0].errMsg);
                    //span_error.html(reponseMessage[0].errMsg);
                }else
                {
                    //success
                    toastr.success("File has been shared.");
                    //window.location = "./";
                }
                
                form[0].reset();
                var val = form.find("input[name='accountId']").val();                
                refreshPart.load("view_controller/handle_refresh_tab_view.php?accountId="+val);
            },
            complete: function (reponse)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
    
    $("#btn_add_category").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='add_category']");
        //var span_error = $("#add_file_message");
        var refreshPart = $("#tab_view");
        
        event.preventDefault();
        btn_submit.addClass("disabled");
  
        $.ajax({url: form.attr("action"),
            type: form.attr("method"),
            data: form.serialize(),
            beforeSend: function ()
            {

            },
            success: function (reponse)
            {   
                var reponseMessage = JSON.parse(reponse);
                if (reponseMessage[0].error)
                {
                    //error
                    toastr.error(reponseMessage[0].errMsg);
                    //span_error.html(reponseMessage[0].errMsg);
                }else
                {
                    //success
                    toastr.success("You created a new category.");
                    //window.location = "./";
                }
                
                form[0].reset();
                var val = form.find("input[name='accountId']").val();                
                refreshPart.load("view_controller/handle_refresh_tab_view.php?accountId="+val);
            },
            complete: function (reponse)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
    $("#btn_delete_category").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='delete_category']");
        //var span_error = $("#add_file_message");
        var refreshPart = $("#tab_view");
        
        event.preventDefault();
        btn_submit.addClass("disabled");
  
        $.ajax({url: form.attr("action"),
            type: form.attr("method"),
            data: form.serialize(),
            beforeSend: function ()
            {

            },
            success: function (reponse)
            {   
                var reponseMessage = JSON.parse(reponse);
                if (reponseMessage[0].error)
                {
                    //error
                    toastr.error(reponseMessage[0].errMsg);
                    //span_error.html(reponseMessage[0].errMsg);
                }else
                {
                    //success
                    toastr.success("Category was deleted.");
                    //window.location = "./";
                }
                
                form[0].reset();
                var val = form.find("input[name='accountId']").val();                
                refreshPart.load("view_controller/handle_refresh_tab_view.php?accountId="+val);
            },
            complete: function (reponse)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
    
    $("#btn_change_category").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='change_category']");
        //var span_error = $("#add_file_message");
        var refreshPart = $("#tab_view");
        
        event.preventDefault();
        btn_submit.addClass("disabled");
  
        $.ajax({url: form.attr("action"),
            type: form.attr("method"),
            data: form.serialize(),
            beforeSend: function ()
            {

            },
            success: function (reponse)
            {   
                var reponseMessage = JSON.parse(reponse);
                if (reponseMessage[0].error)
                {
                    //error
                    toastr.error(reponseMessage[0].errMsg);
                    //span_error.html(reponseMessage[0].errMsg);
                }else
                {
                    //success
                    toastr.success("Document has been updated.");
                    //window.location = "./";
                }
                
                form[0].reset();
                var val = form.find("input[name='accountId']").val();                
                refreshPart.load("view_controller/handle_refresh_tab_view.php?accountId="+val);
            },
            complete: function (reponse)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
    
    
});

function getFileInfo(title,lastUpdate, year, abstract)
{
    $("#file_info_title").html(title);
    $("#file_info_year").html("Year: "+year);
    $("#file_info_last_update").html("Last update: "+lastUpdate);
    $("#file_info_abstract").html("Abstract: "+abstract);
}

function newPdfPage(path)
{
    window.open("../"+path);   
}

function deleteFile(accountId, documentId, title)
{
   /*
   var selector = $("#pop_up");
   var form = $("form[name='delete_file']");
   var refreshPart = $("#tab_view");
   var options = {
       title: "Delete File",
       modal: true,
       buttons: [
       {
            text: "Confirm",
            class: "btn btn-s-md btn-primary btn-rounded",
            click: function(event)
            {
                 var btn_submit = $(this);              
                 var formdata = new FormData(form[0]);
                 
                 event.preventDefault();
                 btn_submit.addClass("disabled");
                 $.ajax({
                     url: form.attr('action'),
                     type: form.attr('method'),
                     data: formdata,
                     beforeSend: function(response)
                     {

                     },
                     success: function(response)
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
                             toastr.success("File has been deleted.");
                             //window.location = "./";
                         }
                         form[0].reset();
                         refreshPart.load("view_controller/handle_tab_view.php?accountId="+accountId);
                     },error: function(response)
                     {
                        console.info(response);
                     },
                     complete: function (response)
                     {
                         btn_submit.removeClass("disabled");
                         selector.dialog("close");
                     }

                 });
            }
       },
       {
            text: "Cancel",
            class: "btn btn-s-md btn-dark btn-rounded",
            click: function()
            {
                toastr.info("Delete file have been cancelled.");
                selector.dialog("close");
            }
       }]
   };
   form.find("input[name='documentId']").attr("value", documentId);
   
   //selector.dialog(options);
   */
    $("form[name='delete_file'] input[name='accountId']").attr("value", accountId);
    $("form[name='delete_file'] input[name='documentId']").attr("value", documentId);
}

function shareFiletoGroup(accountId, documentId, title)
{
    $("form[name='share_file'] input[name='accountId']").attr("value", accountId);
    $("form[name='share_file'] input[name='documentId']").attr("value", documentId);
    $("#share_file_name").html(title);
    $("#share_file_group").load("view_controller/query_groups_option.php?accountId="+accountId);
}

function initAddCategory(accountId)
{
    $("form[name='add_category'] input[name='accountId']").attr("value",accountId);
}

function initDeleteCategory(accountId)
{
    $("form[name='delete_category'] input[name='accountId']").attr("value",accountId);
    $("#delete_category_option").load("view_controller/query_category_option.php?accountId="+accountId);
}

function initChangeCategory(accountId, documentId, title, categoryId)
{
    $("form[name='change_category'] input[name='accountId']").attr("value",accountId);
    $("form[name='change_category'] input[name='documentId']").attr("value",documentId);
    $("#change_category_option").load("view_controller/query_category_with_selected_option.php?accountId="+accountId+"&categoryId="+categoryId);
}