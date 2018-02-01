$(document).ready(function () {
        $('#tsub').change(function () {
            if ($(this).val() == "Mathematics") {
                $(':checkbox').each(function () {
                    $(this).prop('disabled', false);
                });
            }
            else {
                $(':checkbox').each(function () {
                    $(this).prop('disabled', true);
                    $(this).prop('checked', false);
                });
            }
        });
    });

    $(window).load(function(){
      $('#myModal').modal('show');
       }); 
