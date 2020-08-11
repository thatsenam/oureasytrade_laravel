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
    ValidateFileUpload("#profile_picture","#profile_preview");
  });

  $('#date').val(new Date(Date.now()).toDateInputValue());

  function ValidateFileUpload(file_id,preview_id) {

    var fuData = document.getElementById(file_id.replace('#',''));
    var FileUploadPath = fuData.value;
    var MAX_SIZE = 500000;

    if (FileUploadPath == '') {
        alert("Please upload an image");
        $(file_id).val('')

    } else {
        var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();



        if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {


                if (fuData.files && fuData.files[0]) {

                    var size = fuData.files[0].size;

                    if(size > MAX_SIZE){
                        alert("Maximum file size exceeds");
                        $(file_id).val('')
                        $(preview_id).attr('src','')

                        return;
                    }else{
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $(preview_id).attr('src', e.target.result);
                        }

                        reader.readAsDataURL(fuData.files[0]);
                    }
                }

        }


    else {
            alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
            $(file_id).val('')
            $(preview_id).attr('src','')
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
            // console.log(response)
          return {
            results: response
          };
        },
        cache: true,


      }
    });


    var myfield =  $("#loan").select2({
        placeholder: "Select Loan",
        minimumResultsForSearch: -1,
        "language": {
            "noResults": function(){
                return "Please select the name field first";
            }
        },
        });
    $('#search').on('select2:select', function (e) {
        var data = e.params.data;
        // console.log(data);
        $('#member_id').val(data.id);
        $('#member_id_hidden').val(data.id);
        $('#name').val(data.name);
        $('#previous_deposit').val(data.previous_deposit);
        $('#previous_deposit_hidden').val(data.previous_deposit);
        $('#previous_withdraw').val(data.previous_withdraw);
        $('#previous_withdraw_hidden').val(data.previous_withdraw);
        myfield.empty().trigger("change");
        $.ajax({
            type: 'POST',
            url: '/admin/q/loans',
            data:  {
                  _token: CSRF_TOKEN,
                  search: data.id // search term
                }
              ,
        }).then(function (response) {
            // create the option and append to Select2
            // console.log('bal',data);
            console.log('calling http')

            response.forEach(function(data){
                var option = new Option(`${data.name} ${data.total_amount}TK - ${data.date.replace('00:00:00','')}`, data.id, false, false);
                    option.enamsdata = data
                myfield.append(option).trigger('change');

                // manually trigger the `select2:select` event

                console.log('in loop')
            })
            myfield.trigger({
                type: 'select2:select'
            });

        });

      });


        // var option = new Option('test', 1, true, true);
        // myfield.append(option).trigger('change');

      function cleanloans(){
        $('#loan_amount').val('')
        $('#paid').val('')
        $('#due').val('')
        $('#installment').val('')
        $('#savings').val('')
        $('#total_amount').val('')
        $('#loan_id').val('')



      }

    $('#loan').on('select2:select', function (e) {
        cleanloans()
        var data = e.target[e.target.selectedIndex].enamsdata;
        console.log(data);
        $('#loan_amount').val(data.loan_amount)
        $('#loan_id').val(data.id)
        $('#paid').val(data.paid)
        $('#due').val(data.due)
        $('#installment').val(data.installment)
        $('#savings').val(data.savings)
        $('#total_amount').val(data.total_amount)
      });

$("#witness_2_profile_picture").change(function() {
        // readURL(this);
        console.log('wops')
        ValidateFileUpload("#witness_2_profile_picture","#witness_2_profile_preview");
      });
$("#witness_1_profile_picture").change(function() {
        // readURL(this);
        console.log('wops')

        ValidateFileUpload("#witness_1_profile_picture","#witness_1_profile_preview");
      });
