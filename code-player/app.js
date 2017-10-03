$(document).ready(function(){
    // $(".toolbar").controlgroup();
    // input sections
    $windowHtml = $(".stn-html");
    $windowCss = $(".stn-css");
    $windowJs = $(".stn-js");
    $windowOutput = $(".stn-output");

    // text areas
    $htmlEditor = $(".ta-html");
    $cssEditor = $(".ta-css");
    $jsEditor = $(".ta-js");

    $buttonHtml = $('.btn-html');
    $buttonCss = $('.btn-css');
    $buttonJs = $('.btn-js');

    // style tags
    $tagStyle = $("<style></style>");
    $tagJs = $("<script></script>");

    // output html
    $("button").click(function(){
        $(this).toggleClass("ui-state-active");
    });

    $buttonHtml.click(function(){
        if ($(this).hasClass("ui-state-active")) {
            $windowHtml.show();
        } else {
            $windowHtml.hide();
        }
    })

    $htmlEditor.keyup(function(){
        $windowOutput.html($htmlEditor.val()).append($tagStyle).append($tagJs);
    });

    $cssEditor.keyup(function(){
        // if we edit styles and style tag does not exist, append it to output
        if ($.contains($(this), $('style')) == false) {
            $windowOutput.append($tagStyle);
        }
        $("style").html($(this).val());
    });

    $jsEditor.keyup(function(){
        // if we edit js and script tag does not exist, append it to output
        if ($.contains($(this), $('script')) == false) {
            $windowOutput.append($tagJs);
        }
        $("script").html($(this).val());
    });

    // $windowOutput.html($output);
});