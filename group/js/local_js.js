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
    
    $("#btn_add_group").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='add_group']");
        //var span_error = $("#add_file_message");
        var refreshPart = $("#own_group_list");
        
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
                    toastr.success("Group was added.");
                    //window.location = "./";
                }
                form[0].reset();
                var val = form.find("input[name='accountId']").val();
                refreshPart.load("view_controller/handle_refresh_own_group_list_view.php?accountId="+val);
            },
            complete: function (response)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
    
    $("#btn_delete_group").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='delete_group']");
        //var span_error = $("#add_file_message");
        var refreshPart = $("#own_group_list");
        
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
                    toastr.success("Group has been deleted.");
                    //window.location = "./";
                }
                form[0].reset();
                var val = form.find("input[name='accountId']").val();
                refreshPart.load("view_controller/handle_refresh_own_group_list_view.php?accountId="+val);
            },
            complete: function (response)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
    $("#btn_leave_group").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='leave_group']");
        //var span_error = $("#add_file_message");
        var refreshPart = $("#group_list");
        
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
                    toastr.success("You just leave the group.");
                    //window.location = "./";
                }
                form[0].reset();
                var val = form.find("input[name='accountId']").val();
                refreshPart.load("view_controller/handle_refresh_group_list_view.php?accountId="+val);
            },
            complete: function (response)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    //search member 
    $("#btn_search_account").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='add_member_to_group']");
        btn_submit.addClass("disabled");
        $.ajax(
        {   
            url: "view_controller/handle_search_account.php",
            type: "GET",
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
                    form.find("input[name='memberId']").attr("value", "");
                    form.find("input[name='verified']").attr("value", 0);
                }else
                {
                    //success
                    toastr.success("Account Found.");
                    var memberId = reponseMessage[0].data;
                    form.find("input[name='memberId']").attr("value", memberId);
                    form.find("input[name='verified']").attr("value", 1);
                    $("#btn_add_member_to_group").removeClass("disabled");
                }
            },
            complete: function (response)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
    $("#btn_add_member_to_group").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='add_member_to_group']");
        var refreshPart = $("#own_group_list");
        
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
                    toastr.success("You just add a member to group.");
                    //window.location = "./";
                }
                form[0].reset();
                var val = form.find("input[name='accountId']").val();
                refreshPart.load("view_controller/handle_refresh_own_group_list_view.php?accountId="+val);
            },
            complete: function (response)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
    $("#btn_delete_member_in_group").click(function (event)
    {
        var btn_submit = $(this);
        var form = $("form[name='delete_member_in_group']");
        var refreshPart = $("#own_group_list");
        
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
                console.info(response);
                var reponseMessage = JSON.parse(response);
                if (reponseMessage[0].error)
                {
                    //error
                    toastr.error(reponseMessage[0].errMsg);
                    //span_error.html(reponseMessage[0].errMsg);
                }else
                {
                    //success
                    toastr.success("You just delete a member in group.");
                    //window.location = "./";
                }
                form[0].reset();
                var val = form.find("input[name='accountId']").val();
                refreshPart.load("view_controller/handle_refresh_own_group_list_view.php?accountId="+val);
            },
            complete: function (response)
            {
                btn_submit.removeClass("disabled");
            }
        });
        
    });
    
});


function initAddGroup(accountId)
{
    $("form[name='add_group'] input[name='accountId']").attr("value", accountId);
}

function initLeaveGroup(accountId, groupId)
{
    $("form[name='leave_group'] input[name='accountId']").attr("value", accountId);
    $("form[name='leave_group'] input[name='groupsId']").attr("value", groupId);
}

function initDeleteGroup(accountId, groupId)
{
    $("form[name='delete_group'] input[name='accountId']").attr("value", accountId);
    $("form[name='delete_group'] input[name='groupsId']").attr("value", groupId);
}

function initAddMemberToGroup(accountId, groupId)
{
    $("form[name='add_member_to_group'] input[name='accountId']").attr("value", accountId);
    $("form[name='add_member_to_group'] input[name='groupsId']").attr("value", groupId);
    $("form[name='add_member_to_group'] input[name='verified']").attr("value", 0);
    $("form[name='add_member_to_group'] input[name='memberId']").attr("value", "");
    $("#btn_add_member_to_group").addClass("disabled");
}

function initDeleteMemberToGroup(accountId, groupId)
{
    $("form[name='delete_member_in_group'] input[name='accountId']").attr("value", accountId);
    $("form[name='delete_member_in_group'] input[name='groupsId']").attr("value", groupId);
    $("#delete_group_member_option").load("view_controller/query_group_member_option.php?accountId="+accountId+"&groupsId="+groupId);
}