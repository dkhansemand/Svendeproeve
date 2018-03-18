function initMap(locations, id) {
    const map = new google.maps.Map(document.getElementById(id), {
    zoom: 12,
    center: new google.maps.LatLng(55.6755829,12.0733578), //55378614,11106862,29125
    scrollwheel: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    let infowindow = new google.maps.InfoWindow();

    let marker, i;

    for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
}
function initMapKontakt() {
    let location = [
        ['Kajakklubben Pagaj', 55.6755829,12.0733578, 2]
    ]
    initMap(location, 'mapKontakt');
}
