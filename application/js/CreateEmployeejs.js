$(document).ready(function () {
  $("#submit").submit(function () {
    $.ajax({
      type: "POST",
      url: "http://localhost/CodeIgniter/index.php/employeecontroller/create",
      data: $("form").serialize(),
      success: function (responseData) {
        $("#modal").modal("show");
      },
    });
  });
});
<link rel="stylesheet" href="<?php echo base_url('application/js/CreateEmployeejs.js') ?>" />



$(document).ready(function () {
    function a() {
        $('#response').html(data);
    }
    $('.create button').click(function () {
        $.ajax({
            url: 'http://localhost/CodeIgniter/index.php/employeecontroller/create',
            method: 'GET',
            success: function (data) {
                setTimeout(a(data), 5000);
            },
        });
        $('#myModal').modal('show');
    });
});

//submit
$(document).ready(function () {
    $("#submit").submit(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/CodeIgniter/index.php/employeecontroller/create",
            data: $("form").serialize(),
            success: function (responseData) {
                $("#modal").modal("show");
            },
        });
    });
});




//create
$(document).ready(function () {
    $('.pull-right button').click(function () {
        $.ajax({
            url: 'http://localhost/CodeIgniter/index.php/employeecontroller/create',
            method: 'GET',
            success: function (data) {
                $('#response').html(data);
            },
        });
        $('#myModal').modal('show');
    });
});
