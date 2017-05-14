/**
 * Created by AZIZUL on 5/1/2017.
 */
function getContacts(){
    var dept =  document.getElementById("subdivisionid").value
    $.ajax({
        type: 'POST',
        url: 'getData.php',
        data: 'dept='+dept,
        success:function(response){
            $('#contactdisplay').html(response);
        }
    });
}