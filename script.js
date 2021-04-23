
    var mymap = L.map('mapid').setView([48.8393548,19.5551602], 7);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibHVreTMyOSIsImEiOiJja2d3MnY5cnIwNjQxMnlxaDBzM2t5MjZqIn0.HS1KhMOKpzwDwVnmsWtX3w'
    }).addTo(mymap);


    var popup = L.popup();

    function vytvorMark(hodnota1, hodnota2) {
        L.marker([hodnota1, hodnota2]).addTo(mymap);
    }

