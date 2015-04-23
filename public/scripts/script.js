function showMap(lat, lon, mapHolder) {
    try {
        //lat = position.coords.latitude;
        //lon = position.coords.longitude;
        var latlon = new google.maps.LatLng(lat, lon);

        var myOptions = {
            center: latlon,
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(mapHolder, myOptions);
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

        var mapHolder = document.querySelector(".map-holder");
        if (mapHolder !== null) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    showMap(response.lat, response.lon, mapHolder);
                }
            };
            xhr.open("get", "public/php/get_map_coordinates.php", true);
            xhr.send();
        }

        var dropdown = document.querySelectorAll(".dropdown");
        var dropdownEvents = ["click", "mouseover"];
        if (dropdown.length !== 0) {
            for (var i = 0; i < dropdown.length; i++) {
                for (var j = 0; j < dropdownEvents.length; j++) {
                    dropdown[i].addEventListener(dropdownEvents[j], function () {
                        this.querySelector(".dropdown-menu").classList.add("ani-slide-up");
                    });
                }
            }
        }
    });
}

addEventListeners();