function showMap(lat, lon) {
    try {
        //lat = position.coords.latitude;
        //lon = position.coords.longitude;
        var latlon = new google.maps.LatLng(lat, lon);
        var mapholder = document.querySelector(".map-holder");

        var myOptions = {
            center: latlon,
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(mapholder, myOptions);
        var marker = new google.maps.Marker({position: latlon, map: map, title: "Target"});
        /*google.maps.event.trigger(map, 'resize');
         map.setZoom(map.getZoom());
         map.setCenter(marker.getPosition());*/
    } catch (e) {
        console.log(e);
    }
}

function addEventListeners() {
    document.addEventListener("DOMContentLoaded", function () {
        try {
            $(".main-slider .owl-carousel").owlCarousel({
                autoPlay: true,
                navigation: true,
                navigationText: ["<img src='public/libs/owlcarousel/arrow-left.png'>", "<img src='public/libs/owlcarousel/arrow-right.png'>"],
                pagination: true,
                singleItem: true
            });
        } catch (e) {
            console.log(e);
        }

        var map = document.querySelector(".map-holder");
        if (map !== null) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    showMap(response.lat, response.lon);
                }
            };
            xhr.open("get", "public/php/get_map_coordinates.php", true);
            xhr.send();
        }
    });
}

addEventListeners();