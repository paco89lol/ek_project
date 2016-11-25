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
    
    $("#document").hide();
    $("#group").hide();
    var form = $("form[name='data']");
    var option = form.find("input[name='option']").val();
    var data = form.serialize();
    if(option === "document")
    {
        $("#document_content").load("view_controller/handle_document_view.php?"+data);
        $("#document").show();
    }else
    {
        $("#group_content").load("view_controller/handle_group_list_view.php?"+data);
        $("#group").show();
    }
    
    
});

function newPdfPage(path)
{
    window.open("../"+path);   
}

function getFileInfo(title,lastUpdate, year, abstract)
{
    $("#file_info_title").html(title);
    $("#file_info_year").html("Year: "+year);
    $("#file_info_last_update").html("Last update: "+lastUpdate);
    $("#file_info_abstract").html("Abstract: "+abstract);
}