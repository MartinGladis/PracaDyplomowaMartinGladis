function webgazerActions(isChecked) {
    webgazer
        .saveDataAcrossSessions(false)
        .showVideo(isChecked)
        .removeMouseEventListeners()
        .begin();
}

if (!webgazer.detectCompatibility())
{
    alert("Twoja przeglądarka nie wspiera ruchów gałek ocznych");
}
else {
    var checkbox = document.getElementById('videoContainerSwitch');
    var isChecked = checkbox.checked;
    webgazerActions(isChecked);

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            webgazer.showVideo(true);
        }
        else {
            webgazer.showVideo(false);
        }
    });
}
