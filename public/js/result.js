// googleMapsAPIを持ってくるときに,callback=initMapと記述しているため、initMap関数を作成
function initMap() {
  // welcome.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
  map = document.getElementById("map");

let map_lat = document.getElementsByName('lat');
let map_lng= document.getElementsByName('lng');

 map_lat = map_lat.item(0).value;
 map_lng = map_lng.item(0).value;
let test = {lat:map_lat, lng:map_lng};

  // オプションを設定
  opt = {
      zoom: 13, //地図の縮尺を指定
      center: test, //センターを東京タワーに指定
  };
  // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
  mapObj = new google.maps.Map(map, opt);
  console.log(test)
}
