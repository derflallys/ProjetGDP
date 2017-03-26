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
           console.log(data);
         if(data!='exist'){
             $('body').load(data);
             var $toastContent = $('<span>Merci d\'avoir noter la publication</span>');
             Materialize.toast($toastContent, 50000);
         }
         else
         {
             var $toastContent = $('<span>Vous avez deja note cette publication</span>');
             Materialize.toast($toastContent, 5000);
         }
        });
    });
     $('#donateur').fadeOut();
     $('#fournisseur').fadeOut();
    $('#bt_donateur').click(function(e){
         $('#fournisseur').fadeOut();
        $('#donateur').fadeIn();

    });
    $('#bt_fournisseur').click(function(e){
        $('#donateur').fadeOut();
        $('#fournisseur').fadeIn();
    });
    $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrainWidth: false, // Does not change width of dropdown to that of the activator
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: true, // Displays dropdown below the button
            alignment: 'left', // Displays dropdown with edge aligned to the left of button
            stopPropagation: false // Stops event propagation
        }
    );

});