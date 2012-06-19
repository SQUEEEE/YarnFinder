function initMyMap(lat, lng) {
  // get reference to the DIV that will hold the map.
  var mymapDiv = document.getElementById('mymap');

  // start an eniro map in the DIV.
  var mymap = new eniro.maps.Map(mymapDiv);
  
  mymap.setCenter(new eniro.maps.LatLng(lat, lng));
  mymap.setZoom(12);
                            
  var mark = new eniro.maps.Marker({
    position: new eniro.maps.LatLng(lat, lng), 
    map: mymap // by providing map the marker is directly added
    } 
  );

  // set focus to map to allow keyboard navigation
  mymap.setFocus(true);

}
          
function getUrlVars(){
  var vars = [], hash;
  var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
  for(var i = 0; i < hashes.length; i++){
    hash = hashes[i].split('=');
    vars.push(hash[0]);
    vars[hash[0]] = hash[1];
  }
  return vars;
 }
function load(){
  var long = parseFloat(getUrlVars()["lng"]);
  var lat = parseFloat(getUrlVars()["lat"]);
  initMyMap(lat, long);
}
