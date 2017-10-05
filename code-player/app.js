$(document).ready(function(){
    $(".toggleButton").hover(function(){
        $(this).addClass("highlighted");
    }, function(){
        $(this).removeClass("highlighted");
    }).click(function(){
        $(this).toggleClass("active");
        $(this).removeClass("highlighted");   
        // get class of corresponding panel
        let panelClass = $(this).attr('class').split(' ')[1] + "Panel";
        $("." + panelClass).toggleClass("hidden");
        let numberOfActivePanels = 4 - $('.yourclass').length;
        
        $(".panel").width(($(window).width() / numberOfActivePanels) - 10);
        
        
    });

    $("textarea").height($(window).height() - $("header").height() - 22);    
    updateOutput();
    $("textarea").on("change keyup paste", function(){
        updateOutput();      
    });
    
});

function updateOutput() {
    $("iframe").contents().find("html").html("<html><head><style type='text/css'>" + $(".cssPanel").val() + "</style></head><body>" + $(".htmlPanel").val() + "</body></html>"); 
    document.getElementsByClassName("outputPanel")[0].contentWindow.eval($(".javascriptPanel").val());
}