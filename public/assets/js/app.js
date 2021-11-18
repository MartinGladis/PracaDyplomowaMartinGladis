function webgazerActions() {
    webgazer
        .showVideo(false)
        .pause()
        .begin();

    $('#camHidden').on('click', function() {
        if($(this).prop('checked')) {
            webgazer.showVideo(false);
        }
        else {
            webgazer.showVideo(true);
        }
    })
}

$(function() {
    if (!webgazer.detectCompatibility())
    {
        alert("Twoja przeglądarka nie wspiera ruchów gałek ocznych");
        }
    else {
        webgazerActions();
    }
});