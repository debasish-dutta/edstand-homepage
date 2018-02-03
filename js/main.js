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

jQuery(document).ready(function(){


       $('#user-avatar-upload').on("change",function(){

       		var avatarfile = $(this)[0].files[0];
       		var type = avatarfile.type;
       		//alert(type);
       		var type1 = type.substring(type.indexOf("/")+1);
       		//alert(type1);
       		var size = avatarfile.size;
       		if(type1!="png" && type1!="jpg" && type1!="jpeg")
       		{
       			alert('file type is not supported');
       		}

       		else if(size>500000)
       		{
       			alert('filesize should be less than 500kb');
       		}

       		else
       		{
       			var formdata = new FormData();
       			formdata.append('avatar',avatarfile);
       			var xhr = new XMLHttpRequest();
       			xhr.addEventListener("load",avatarloadedhandler,false);
       			xhr.open('POST','avatarchange.php');
       			xhr.send(formdata);

       			function avatarloadedhandler(evt){
              //alert(evt.target.responseText);
              $('#avatar-image-id').attr('src',evt.target.responseText);
       			}
       		}
       	});
});
