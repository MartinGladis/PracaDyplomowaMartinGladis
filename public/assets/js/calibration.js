document.addEventListener("DOMContentLoaded", function(){
    alert('Naciskaj na poniższe przyciski w celu kalibracji odczytu ruchek gałek ocznych (Nie zapomnij nadać uprawnień do kamery)');
    var gazeClearConfirm = confirm("Strona chce wyczyścić dane z poprzedniej kalibracji. Naciśnij \"OK\" żeby potwierdzić. Jeśli chcesz jednak zachować dane, naciśnij \"Anuluj\"");
    if (gazeClearConfirm) {
        webgazer.clearData();
    }
});