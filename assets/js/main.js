/**
* Krank Scripts
*/

$(document).ready(function(){
	
	// Contact Form 7 bootstraping - General Form Styling
	$('.wpcf7-form-control-wrap').addClass('form-group').removeClass('wpcf7-form-control-wrap');
	$('.wpcf7-form-control').addClass('form-control').removeClass('wpcf7-form-control');
	$('.wpcf7-submit').addClass('contact-submit btn btn-primary').removeClass('wpcf7-submit');
	// Contact Form 7 bootstraping - Error Messages
	$('.wpcf7-not-valid-tip-no-ajax').addClass('alert alert-warning');
	$('.wpcf7-valida tion-errors').addClass('alert alert-danger');
	$('.wpcf7-mail-sent-ok').addClass('alert alert-success');
	
	// Photo Modal
	$(function() {     
		$('a.thumbnail').click(function(e)
		
	    {
		    e.preventDefault();
	        var imgPath = $(this).data('imgpath');
	        $('#photo-modal img').attr('src', imgPath);
	        $("#photo-modal").modal('show');
	    });

	    $('img').on('click', function()
		
	    {
	        $("#photo-modal").modal('hide')
	    });
	});

});

// Google Map
function newGoogleMap ( location, template ) {
	
	var map;
	var centerPosition = location;

	var style = [{
	    "stylers": [{
	        "visibility": "off"
	    }]
	}, {
	    "featureType": "road",
	        "stylers": [{
	        "visibility": "on"
	    }, {
	        "color": "#ecf0f1"
	    }]
	}, {
	    "featureType": "road.arterial",
	        "stylers": [{
	        "visibility": "on"
	    }, {
	        "color": "#ecf0f1"
	    }]
	}, {
	    "featureType": "road.highway",
	        "stylers": [{
	        "visibility": "on"
	    }, {
	        "color": "#ecf0f1"
	    }]
	}, {
	    "featureType": "landscape",
	        "stylers": [{
	        "visibility": "on"
	    }, {
	        "color": "#f3f4f4"
	    }]
	}, {
	    "featureType": "water",
	        "stylers": [{
	        "visibility": "on"
	    }, {
	        "color": "#7fc8ed"
	    }]
	}, {}, {
	    "featureType": "road",
	        "elementType": "labels",
	        "stylers": [{
	        "visibility": "on"
	    }, {
	        "color": "#7f8c8d"
	    }]
	}, {}, {
	    "featureType": "poi.park",
	        "elementType": "geometry.fill",
	        "stylers": [{
	        "visibility": "on"
	    }, {
	        "color": "#68d3be"
	    }]
	}, {
	    "elementType": "labels",
	        "stylers": [{
	        "visibility": "on"
	    }]
	}, {
	    "elementType": "labels.text.stroke",
	        "stylers": [{
	        "visibility": "on"
	    }, {
	        "color": "#ffffff"
	    }]
	},  {
	    "featureType": "landscape.man_made",
	        "elementType": "geometry",
	        "stylers": [{
	        "weight": 0.9
	    }, {
	        "visibility": "off"
	    }]
	}]

	var options = {
	    zoom: 16,
	    center: centerPosition,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map($('#map')[0], options);
	map.setOptions({
	    styles: style
	});
	var marker = new google.maps.Marker({
	    position: centerPosition,
	    map: map,
	});
}

// Modified http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
// Only fires on body class (working off strictly WordPress body_class)

var ExampleSite = {
  // All pages
  common: {
    init: function() {
      // JS here
    },
    finalize: function() { }
  },
  // Home page
  home: {
    init: function() {
      // JS here
    }
  },
  // About page
  about: {
    init: function() {
      // JS here
    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = ExampleSite;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });

    UTIL.fire('common', 'finalize');
  }
};

$(document).ready(UTIL.loadEvents);