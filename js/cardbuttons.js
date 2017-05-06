/**
 * Created by AZIZUL on 5/6/2017.
 */

function editContact(id){

    $.ajax({
        type: 'POST',
        url: 'editContact.php',
        data: 'id='+id,
        success:function(response){
            data = response.split('~');
            $('#form_name').val(data[0]);
            $('#form_designation').val(data[1]);
            $('#form_division').val(data[2]);
            $('#form_subdivision').val(data[3]);
            $('#form_phone1').val(data[4]);

        }
    });

    $('#form_name').val('Azizul Hakim');
}

function deleteContact(id){
    alert("delete " + id);
    /*
     $.ajax({
     type: 'POST',
     url: 'getData.php',
     data: 'dept='+dept,
     success:function(response){
     $('#contactdisplay').html(response);
     }
     });
     */
}