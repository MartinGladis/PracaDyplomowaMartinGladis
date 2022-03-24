if (!webgazer.detectCompatibility())
{
    alert("Twoja przeglądarka nie wspiera ruchów gałek ocznych");
}
else {
    var checkbox = document.getElementById('videoContainerSwitch');
    var isChecked = checkbox.checked;

    previouslyElement = null;

    const TIME_DELAY = 1500;
    isSameElement = false;
    timeAfterElementChange = 0;

    webgazer
        .setGazeListener((data, elapsedTime) => {
            if (data == null || window.location.pathname == '/calibration') {
                return;
            }
            var xPrediction = data.x;
            var yPrediction = data.y;

            if (yPrediction < 50) {
                window.scrollBy(0, -10);
            }
            if (yPrediction > window.innerHeight - 200) {
                window.scrollBy(0, 10);
            }

            if (!isSameElement) {
                timeAfterElementChange = elapsedTime;
            }

            var currentElement = document.elementFromPoint(xPrediction, yPrediction);
            isSameElement = currentElement == previouslyElement ? true : false;

            if (elapsedTime - timeAfterElementChange >= TIME_DELAY && currentElement != null) {
                currentElement.click();
            }

            previouslyElement = currentElement;
        })
        .removeMouseEventListeners()
        .showVideo(isChecked)
        .begin();

    checkbox.addEventListener('change', function() {
        webgazer.showVideo(this.checked ? true : false);
    });
}
