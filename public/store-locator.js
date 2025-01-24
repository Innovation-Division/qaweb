var dealersSearch = {
    initFunctions: function() {
        jQuery('.dealers-opener').on('click', function(){
            dealersSearch.dealerOpenClose(this);
        });
        jQuery('#dealer-locator-form .dealer-search-location .dealer-location-area').on('change', function() {
            dealersSearch.searchClearOnChange();
        });
    },
    dealerOpenClose: function(dealersOpener) {
        jQuery(dealersOpener).closest('.dealers-header-wrapper').toggleClass('dealer-open-search');
    },
    itemContactOpen: function(searchItem) {
        if(checkIsMobile()) {
            if(!jQuery(searchItem).hasClass('active')) {
                jQuery('.dealer-open-search').removeClass('dealer-open-search');
            }
        }
        jQuery("#dealer-locator-form .collapsible .collapsible-header").removeClass(function(){
            return "active";
        });
        // jQuery("#dealer-locator-form .collapsible").collapsible({accordion: true});
        // jQuery("#dealer-locator-form .collapsible").collapsible({accordion: false});
    },
    searchClearOnChange: function() {
        jQuery('#dealer-locator-form .dealer-search-location .dealer-location-input').val('');
    }
}

var map, locations, InfoWindow, storeMarkers = [], geocoder;
var marker;
var ucpbIcon = {
    url: SKIN_URL + "images/map-pin.png",
    scaledSize: new google.maps.Size(35, 45)
};
var ucpbStoreIcon = {
    url: SKIN_URL + "images/repair-shop-pin.png",
    scaledSize: new google.maps.Size(35, 45)
};

function initialize() {

    // google.maps.event.addDomListener(window, 'load', init);
    init(); // to initialize the map before the variables below
    geocoder = new google.maps.Geocoder();

    function init()
    {
        // set location data
        locations = JSON.parse(Markers);
        
        var mapOptions = {
            zoom: 30,
            center: new google.maps.LatLng(14.5874822, 121.0578773),
            scaleControl: false,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var mapElement = document.getElementById('map');
        map = new google.maps.Map(mapElement, mapOptions);
        var bounds = new google.maps.LatLngBounds();
        infoWindow = new google.maps.InfoWindow();

        var path = window.location.pathname;

        if (path.endsWith('locate-a-shop')) {
            ucpbIcon = ucpbStoreIcon;
        }

        jQuery.each(locations, function(i,item){
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(parseFloat(locations[i].lat), parseFloat(locations[i].lng)),
                map: map
            });
            locations[i].position = new google.maps.LatLng(parseFloat(locations[i].lat), parseFloat(locations[i].lng));
            storeMarkers[i] = marker;

            //extend the bounds to include each marker's position
            bounds.extend(marker.position);
            marker.setIcon(ucpbIcon);

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    map.setZoom(15);
                    map.setCenter(marker.getPosition());
                    infoWindow.setContent("<div id='iw-container'><div class='iw-title'><b>" + locations[i].name + "</b></div><div class='iw-content'><span>" + toTitleCase(locations[i].address) + "</span></div><div>");
                    infoWindow.open(map, marker);
                }
            })(marker, i));

            google.maps.event.addListener(infoWindow, 'domready', function() {
                var iwOuter = jQuery('.gm-style-iw');
                var iwCloseBtn = iwOuter.next();
                var iwBackground = iwOuter.prev();

                iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': ' rgba(178, 178, 178, 0.6) 0px 1px'});

                iwBackground.children(':nth-child(2)').css({'display' : 'none'});

                iwBackground.children(':nth-child(4)').css({'display' : 'none'});

                iwCloseBtn.css({
                    opacity: '1',
                    right: '16px', top: '3px',
                    border: '7px solid rgb(0, 67, 117)',
                    width: '27px',
                    height: '27px',
                    'border-radius': '13px',
                    'box-shadow': '0 0 5px rgb(0, 67, 117)'
                });
                iwCloseBtn.mouseout(function(){
                    jQuery(this).css({opacity: '1'});
                });
            });
        });

        //now fit the map to the newly inclusive bounds
        map.fitBounds(bounds);
    }

}

function ObjectLength( object )
{
    var length = 0;
    for( var key in object ) {
        if( object.hasOwnProperty(key) ) {
            ++length;
        }
    }
    return length;
};

function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

jQuery(document).ready(function(){
    locations = JSON.parse(Markers);
    dealersSearch.initFunctions(); // for dealers page search
    initialize();
});

/* UCPB custom */
jQuery('select[name="region"]').on('change', function(e) {
    var path = window.location.pathname;

    if (path.endsWith('locate-a-shop')) {
        ucpbIcon = ucpbStoreIcon;
    }

    if (jQuery(this).val() == 0) {
        jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: path,
            success: function(response) {
                var result = jQuery('<div />').append(response).find('.search-results').html();
                jQuery('.search-results').html(result);
            }
        });

        initialize();
        e.stopPropagation();
    } else {
        jQuery.ajax({
            type: "POST",
            dataType: "html",
            data: { region_id: jQuery(this).val() },
            url: path + "/?region=" + jQuery(this).val(),
            success: function(response) {
                var result = jQuery('<div />').append(response).find('.search-results').html();
                jQuery('.search-results').html(result);

                if (typeof result == 'undefined') 
                {
                    jQuery('.search-results').find("li.search-list-item").not(':last-child').addClass('hide');
                    jQuery('.search-results').find('.search-no-results').removeClass('hide');  
                }
                else
                {
                    newLocation  = JSON.parse(resetMarker);
                    var bounds = new google.maps.LatLngBounds();
                    jQuery.each(newLocation, function(i,item) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(parseFloat(newLocation[i].lat), parseFloat(newLocation[i].lng)),
                            map: map
                        });
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                map.setZoom(15);
                                map.setCenter(marker.getPosition());
                                infoWindow.setContent("<div id='iw-container'><div class='iw-title'><b>" + newLocation[i].name + "</b></div><div class='iw-content'><span>" + toTitleCase(newLocation[i].address) + "</span></div><div>");
                                infoWindow.open(map, marker);
                            }
                        })(marker, i));
                        bounds.extend(marker.position);
                        map.setZoom(15);
                        marker.setIcon(ucpbIcon);
                    });
                    map.fitBounds(bounds);
                }
            }
        }); 
    }
});

locations = JSON.parse(Markers);
jQuery('.dealers-search-list .search-results').on('click', 'li.search-list-item', function() {    
    var locId = jQuery(this).attr('data-value');

    jQuery.each(locations, function(i,item) {
        if (locId == item.id) {
            map.setZoom(15);
            map.setCenter(locations[i].position);
            infoWindow.setContent("<div id='iw-container'><div class='iw-title'><b>" + locations[i].name + "</b></div><div class='iw-content'><span>" + toTitleCase(locations[i].address) + "</span></div><div>");
            infoWindow.open(map, storeMarkers[i]);
        }
    });
});