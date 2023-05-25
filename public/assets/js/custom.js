ymaps.ready(init);

function init() {
    var geolocation = ymaps.geolocation;
    var myMap = new ymaps.Map('map', {
        center: [55, 34],
        zoom: 10
    }, {
        searchControlProvider: 'yandex#search'
    });

    var locations = [];

    $('table tr').each(function() {
        var location = {};
        location.latitude = parseFloat($(this).find('td:nth-child(3)').text());
        location.longitude = parseFloat($(this).find('td:nth-child(2)').text());
        location.name = $(this).find('td:nth-child(1)').text();
        location.id = $(this).attr('id');

        if (!isNaN(location.latitude) && !isNaN(location.longitude)) {
            locations.push(location);
        }
    });

    locations.forEach(function(location) {
        var placemark = new ymaps.Placemark([location.latitude, location.longitude], {
            balloonContentBody: location.name
        }, {
            preset: 'islands#redCircleIcon'
        });

        placemark.events.add('click', function() {
            myMap.setCenter([location.latitude, location.longitude], 10);
        });

        myMap.geoObjects.add(placemark);
    });

    geolocation.get({
        provider: 'yandex',
        mapStateAutoApply: true
    }).then(function(result) {
        result.geoObjects.options.set('preset', 'islands#redCircleIcon');
        result.geoObjects.get(0).properties.set({
            balloonContentBody: 'Мое местоположение'
        });
        myMap.geoObjects.add(result.geoObjects);
    });

    geolocation.get({
        provider: 'browser',
        mapStateAutoApply: true
    }).then(function(result) {
        result.geoObjects.options.set('preset', 'islands#blueCircleIcon');
        myMap.geoObjects.add(result.geoObjects);
    });

    $('table tr').each(function() {
        var locationId = $(this).attr('id');
        var locationName = $(this).find('td:nth-child(1)').text();

        $(this).find('td:nth-child(1)').click(function() {
            var clickedLocation = locations.find(function(location) {
                return location.id == locationId;
            });

            if (clickedLocation) {
                myMap.setCenter([clickedLocation.latitude, clickedLocation.longitude], 10);
            }
        });
    });
}