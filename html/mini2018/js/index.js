$('.overlay').click(function() {
  $(this).addClass('opacity-0');
  window.setTimeout(() => {
    $(this).remove();
  }, 1000)
});

window.setTimeout(() => {
  $('.main-title.img-title').removeClass('opacity-0')
  $('.cat-fluffy').addClass('c-fluffy')
  $('.rabbit-fluffy').addClass('r-fluffy')
}, 100)

window.setTimeout(() => {
  $('.main-title.year').removeClass('opacity-0')
}, 3200)

window.setTimeout(() => {
  $('.baloon').removeClass('scroll-in')
  $('.cat').removeClass('scroll-in')
  $('.rabbit').removeClass('scroll-in')
}, 1200)

window.setTimeout(() => {
  $('.baloon-fluffy').addClass('b-fluffy')
}, 3000)

// みんなスクロールイン
window.setTimeout(() => {
  $('.character div').removeClass('slidein-right')
  $('.character div').removeClass('slidein-left')
  window.setTimeout(() => {
    $('.character div').addClass('animation')
  }, 3500)
}, 3000)

/* smooth scroll */
$(function() {
  $(".top-scroll").on('click', function () {
    $('html,body').animate({ scrollTop: 0 }, 'swing');
      return false;
    });
});

/* Google Map */
function initMap() {
 var map = new google.maps.Map(document.getElementById('map'), {
   center: {lat: 37.464904, lng: 138.829251},
   zoom: 16,
   disableDefaultUI: true,
   styles: [
  {
      "featureType": "administrative.country",
      "elementType": "geometry.stroke",
      "stylers": [
          {
              "lightness": -5
          },
          {
              "color": "#b0b0b0"
          },
          {
              "weight": 1.7
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
      "featureType": "landscape",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#FFB3B3"
          },
          {
              "lightness": 26
          }
      ]
  },
  {
      "featureType": "poi",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#FFB3B3"
          }
      ]
  },
  {
      "featureType": "road.highway",
      "elementType": "all",
      "stylers": [
          {
            // "color": "#FFB3B3"
            "color": "#FFF0F0"
          }
      ]
  },
  {
      "featureType": "road.arterial",
      "elementType": "all",
      "stylers": [
          {
              // "visibility": "off"
          }
      ]
  },
  {
      "featureType": "road.local",
      "elementType": "all",
      "stylers": [
          {
              // "visibility": "off"
              "color": "#FFDDDD"
          }
      ]
  },
  {
      "featureType": "transit",
      "elementType": "all",
      "stylers": [
          {
              "visibility": "off"
              // "color": "#FFCCCC"
          }
      ]
  },
  {
      "featureType": "water",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#FFB3B3"
          },
          {
              "lightness": 66
          }
      ]
  }
]
 });
var latlng = new google.maps.LatLng(37.464904, 138.829251);
var marker = new google.maps.Marker({
  position: latlng,
  map: map
});
var infoWindow = new google.maps.InfoWindow({ // 吹き出しの追加
  content: '<div class="info">長岡リリックホール<a href="https://www.google.co.jp/maps/dir//%E9%95%B7%E5%B2%A1%E3%83%AA%E3%83%AA%E3%83%83%E3%82%AF%E3%83%9B%E3%83%BC%E3%83%AB%E3%80%81%E3%80%92940-2108+%E6%96%B0%E6%BD%9F%E7%9C%8C%E9%95%B7%E5%B2%A1%E5%B8%82%E5%8D%83%E7%A7%8B%EF%BC%93%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%93%EF%BC%95%EF%BC%96%E2%88%92%EF%BC%96/@37.4649032,138.8269598,17z" target="_blank" style="display:block;">Google Map で開く<i class="fa fa-external-link" aria-hidden="true"></i></a></div>'
});
  marker.addListener('click', function() { // マーカーをクリックしたとき
  infoWindow.open(map, marker); // 吹き出しの表示
});
}
