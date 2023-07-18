<?php include("include/header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="parent-container">
        <div class="pull-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create</button>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h1 class="modal-title">Employee Form</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="response"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table ">
        <thead>
            <tr>
                <th>Employee Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Branch</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (($result)) {
                foreach ($result as $data) { ?>
                    <tr>
                        <td>
                            <?php echo $data->employee_id ?>
                        </td>
                        <td>
                            <?php echo ucfirst($data->firstname) ?>
                        </td>
                        <td>
                            <?php echo ucfirst($data->lastname) ?>
                        </td>
                        <td>
                            <?php echo $data->email ?>
                        </td>
                        <td>
                            <?php echo '+91 ' . $data->phonenumber ?>
                        </td>
                        <td>
                            <?php echo $data->gender ?>
                        </td>
                        <td>
                            <?php echo date('d/m/Y', strtotime($data->DOB)); ?>
                        </td>
                        <td>
                            <?php echo $data->branch ?>
                        </td>
                        <td>
                            <button type="button" id="view" class="btn btn-info"
                                data-employeeid="<?php echo $data->employee_id; ?>">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>

                            <button type="button" id="edit" class="btn btn-success" data-toggle="modal" data-target="#myModal"
                                data-employeeid="<?php echo $data->employee_id; ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>

                            <button type="button" id="delete" class="btn btn-danger"
                                data-employeeid="<?php echo $data->employee_id; ?>">
                                <span> <i class="fa fa-trash" aria-hidden="true"></i></span>
                            </button>
                        </td>
                    </tr>
                    <?php
                }
            } else { ?>
            <tr>
                <td>No Record found</td>
            </tr>
            <?php } ?>

        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('.pull-right button').click(function () {
                $.ajax({
                    url: 'http://localhost/CodeIgniter/index.php/employeecontroller/create',
                    method: 'GET',
                    success: function (data) {
                        $('#myModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('#response').html(data);
                    },
                });
                $('#myModal').modal('show');
            });

            $(document).on('click', '#view', function () {
                var employeeId = $(this).attr('data-employeeid');
                $.ajax({
                    url: 'http://localhost/CodeIgniter/index.php/employeecontroller/view/' + employeeId,
                    method: 'GET',
                    success: function (data) {
                        $('#myModal').find('.modal-body').html(data);
                        $('#myModal').modal('show');
                    },
                });
            });

            $(document).on('click', '#delete', function () {
                var employeeId = $(this).attr('data-employeeid');
                $.ajax({
                    url: 'http://localhost/CodeIgniter/index.php/employeecontroller/delete/' + employeeId,
                    method: 'GET',
                    success: function (data) {
                        $('#myModal').find('.modal-body').html('successfully deleted');
                        $('#myModal').modal('show');
                    },
                });
            });

            $(document).on('click', '#edit', function () {
                var employeeId = $(this).attr('data-employeeid');
                $.ajax({
                    url: 'http://localhost/CodeIgniter/index.php/employeecontroller/edit/' + employeeId,
                    method: 'GET',
                    success: function (data) {
                        $('#myModal').find('.modal-body').html(data);
                        $('#myModal').modal('show');
                    },
                });
                $('#myModal').modal('show');
            });

            // $('#edit button').click(function () {
            //     var employeeId = $(this).attr('data-employeeid');
            //     $.ajax({
            //         url: 'http://localhost/CodeIgniter/index.php/employeecontroller/edit/' + employeeId,
            //         method: 'GET',
            //         success: function (data) {
            //             $('#response').html(data);
            //         },
            //     });
            //     $('#myModal').modal('show');
            // });
        });
    </script>
</body>

</html>


<?php include("include/footer.php"); ?>