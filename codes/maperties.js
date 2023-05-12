let maper = L.map('map').setView([4.234029340966529, -72.82036016563018], 5.236841);
        L.tileLayer('https://tile.jawg.io/jawg-streets/{z}/{x}/{y}.png?access-token=JEV0JwcmSzWn48G8WkTqPnqLcGD9PX3dVCQtGUBCRacmOngGN08XyrEK3NN06IL9', {}).addTo(maper);
        maper.attributionControl.addAttribution("<a href=\"https://www.jawg.io\" target=\"_blank\">&copy; Jawg</a> - <a href=\"https://www.openstreetmap.org\" target=\"_blank\">&copy; OpenStreetMap</a>&nbsp;contributors")


//Selector
    document.getElementById('select-location').addEventListener('change', function(e){
        let coords = e.target.value.split(",");
        L.marker(coords).addTo(map)
        map.flyTo(coords, 18);
    });