<?php
/**
 * Created by PhpStorm.
 * User: AZIZUL
 * Date: 5/6/2017
 * Time: 6:39 PM
 */

$modal = "<div class=\"w3-container\">
  <div id=\"id01\" class=\"w3-modal\">
    <div class=\"w3-modal-content w3-card-4\">
      <header class=\"w3-container w3-teal\"> 
        <span onclick=\"document.getElementById('id01').style.display='none'\" 
        class=\"w3-button w3-display-topright\">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class=\"w3-container\">
        <p>Some text..</p>
        <p>Some text..</p>
      </div>
      <footer class=\"w3-container w3-teal\">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>
</div>";

echo $modal;

?>

