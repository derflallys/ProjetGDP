/**
 * Created by ABOUBACAR on 17/03/2017.
 */
$(document).ready(function(){
    $('.modal').modal();
    // $('#modal2').modal();
    $('select').material_select();
    $('.datepicker').pickadate({

    });
    $("a.btn-floating.red.val_note").click(function (e) {
        e.preventDefault();
        console.log($(this).attr("value"));
       $.get("insert_note.php",{insert:true,note:$(this).attr("value")},function (data) {
         $('body').load(data);
        });
    });
});