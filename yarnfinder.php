<?php
//Basic: form checks for geo_area, which goes into the api request, relevant info is printed

require_once('api.php');
?>
  <form method="post" action=<?php echo $PHP_SELF;?>>

    <label for="city">Stad:</label>
    </br> <input type="text" name="city" /></br>
    <input type="submit" value="Hitta garn!" name="submit" />
   
  </form>
<?php
if (isset($_POST['submit'])){

  $city = trim($_POST['city']);

  $url = 'http://api.eniro.com/cs/search/basic?profile=' . $profile . '&key=' . $key . '&country=se&version=1.1.3&search_word=garn&geo_area=' . $city;
  $response = file_get_contents($url);
  $json = json_decode($response, true);
  if(empty($json['adverts'])){
    echo "<p>Tyvärr fanns det inga garnaffärer i " . $city . "!";
  }
    ?>
  <div class="result"> <?php
  foreach($json['adverts'] as $item) { 
    echo "<p>" . $item['companyInfo']['companyName'];
    if(!empty($item['homepage'])){
      echo " <a href=" . $item['homepage'] . ">Hemsida</a>";
    }
  if(!empty($item['location']['coordinates'][0]['latitude'])){
      echo " <a href='karta.html?lat=" . $item['location']['coordinates'][0]['latitude'] . "&lng=" . $item['location']['coordinates'][0]['longitude']. "'>Karta</a>";
  }
  else{
    echo "<br/>Adress: " . $item['address']['streetName'];
  }
    echo "</p>";
  }
  echo "</div>";
}

?>
