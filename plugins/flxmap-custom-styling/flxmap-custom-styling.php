<?php
/*
Plugin Name: Flxmap custom styling
Plugin URI: https://gist.github.com/webaware/3808eb1cac17cb32a294
Description: use Google Maps custom styling for a map
Version: 1.0.1
Author: WebAware
Author URI: http://webaware.com.au/
*/

/**
 * register custom map types with WP Flexible Map plugin
 *
 * references and examples:
 * @link http://flexible-map.webaware.net.au/manual/styled-maps/
 * @link https://developers.google.com/maps/documentation/javascript/styling
 * @link https://developers.google.com/maps/documentation/javascript/examples/maptype-styled-simple
 * @link http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html
 * @link https://snazzymaps.com/
 *
 * @param array $mapTypes    registered custom map types, keyed by mapTypeId
 * @param array $attrs       shortcode attributes for current map
 * @return array
 */
add_filter('flexmap_custom_map_types', function($mapTypes, $attrs) {
    // nothing to register if map type isn't specified
    if (empty($attrs['maptype'])) {
        return $mapTypes;
    }

    // check for map using custom map type
    // https://snazzymaps.com/style/18/retro
    if ($attrs['maptype'] == 'quickfacts') {
        $custom_type = '{
            "styles" : [
                {
                    "featureType": "administrative",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": "-100"
                        }
                    ]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#f8950e"
                        }
                    ]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "saturation": "0"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#f8950e"
                        }
                    ]
                },
                {
                    "featureType": "administrative.neighborhood",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#f8950e"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 65
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": "50"
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": "-100"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "all",
                    "stylers": [
                        {
                            "lightness": "30"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "all",
                    "stylers": [
                        {
                            "lightness": "40"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "lightness": -25
                        },
                        {
                            "saturation": -97
                        },
                        {
                            "color": "#9fa09a"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "lightness": -25
                        },
                        {
                            "saturation": -100
                        }
                    ]
                }
            ],
            "options" : {
                "name" : "Retro"
            }
        }';
        $mapTypes['quickfacts'] = json_decode($custom_type);
    }
    return $mapTypes;
}, 10, 2);