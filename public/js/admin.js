function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#profile_preview').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});
  $("#profile_picture").change(function() {

    // readURL(this);
    ValidateFileUpload();
  });

  $('#date').val(new Date().toDateInputValue());

  function ValidateFileUpload() {

    var fuData = document.getElementById('profile_picture');
    var FileUploadPath = fuData.value;
    var MAX_SIZE = 500000;

    if (FileUploadPath == '') {
        alert("Please upload an image");
        $("#profile_picture").val('')

    } else {
        var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();



        if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {


                if (fuData.files && fuData.files[0]) {

                    var size = fuData.files[0].size;

                    if(size > MAX_SIZE){
                        alert("Maximum file size exceeds");
                        $("#profile_picture").val('')
                        $('#profile_preview').attr('src','')

                        return;
                    }else{
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#profile_preview').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(fuData.files[0]);
                    }
                }

        }


    else {
            alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
            $("#profile_picture").val('')
            $('#profile_preview').attr('src','')
        }
    }}



$('#alert').hide()
$('#mobile').change(function(e) {
    $.post('/admin/check_mobile',{mobile:$('#mobile').val()},function(data, status){
        console.log(data)
        if(data.status==='Pass'){
            $('#alert').hide();
            $('#submit').prop("disabled",false);

        }else{
            $('#submit').prop("disabled",true);
            $('submit').addClass('disabled');

            $('#alert').show();
            $('#alert').text(data.message)


        }
    });

});
// Implementing Select2 Library Using JQUERY

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

console.log('executed')
$("#search").select2({
    placeholder: "Name or Phone",
    allowClear: true,
      ajax: {
        url: "/admin/q/members",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            _token: CSRF_TOKEN,
            search: params.term // search term
          };
        },
        processResults: function (response) {
            console.log(response)
          return {
            results: response
          };
        },
        cache: true,


      }
    });

$('#search').on('select2:select', function (e) {
        var data = e.params.data;
        console.log(data);
        $('#member_id').val(data.id);
        $('#member_id_hidden').val(data.id);
        $('#name').val(data.name);
        $('#previous_deposit').val(data.previous_deposit);
        $('#previous_deposit_hidden').val(data.previous_deposit);
        $('#previous_withdraw').val(data.previous_withdraw);
        $('#previous_withdraw_hidden').val(data.previous_withdraw);
      });


