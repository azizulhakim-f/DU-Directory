<?php
/**
 * Created by PhpStorm.
 * User: AZIZUL
 * Date: 4/27/2017
 * Time: 6:57 PM
 */
?>

<script>
    var subdivistionList = document.getElementById("subdivisionid")


    function updatesubdivision(selecteddivision){
        //alert(selecteddivision)
        for (i=0; i<5; i++)
            subdivistionList.options[i]=new Option("bal", "balbal")

    }

</script>
