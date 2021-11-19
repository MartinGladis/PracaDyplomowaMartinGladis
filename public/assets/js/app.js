function webgazerActions() {
    webgazer
        .showVideo(false)
        .pause()
        .begin();
}


if (!webgazer.detectCompatibility())
{
    alert("Twoja przeglądarka nie wspiera ruchów gałek ocznych");
}
else {
    webgazerActions();
    var checkbox = document.getElementById('videoContainerSwitch');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            webgazer.showVideo(true);
        }
        else {
            webgazer.showVideo(false);
        }
    });
}
