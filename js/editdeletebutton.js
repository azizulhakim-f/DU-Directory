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
            $('#form_id').val(data[8]);
            $('#form_name').val(data[0]);
            $('#form_designation').val(data[1]);
            $('#form_division').val(data[2]);
            $('#form_subdivision').val(data[3]);
            $('#form_phone1').val(data[4]);
            $('#form_phone2').val(data[5]);
            $('#form_email1').val(data[6]);
            $('#form_email2').val(data[7]);
            window.location = "#contact";
        }
    });
}

function deleteContact(id){
    $.ajax({
        type: 'POST',
        url: 'deleteContact.php',
        data: 'id='+id,
        success:function(response){
            location.reload();
        }
    });
}