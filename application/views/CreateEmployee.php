<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="result">
                        <p>Successfully created</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <?php echo validation_errors(); ?>
        <form class="form-horizontal" method="post">
            <div class="form-group row">
                <label for="firstname" class="col-sm-3 col-form-label" style="text-transform: capitalize;"><b>First
                        Name:</b></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Enter first name" name="firstname"
                        value="<?php echo $data->firstname; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="lastname" class="col-sm-3 col-form-label"><b>Last Name:</b></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Enter last name" name="lastname"
                        value="<?php echo $data->lastname; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="dob" class="col-sm-3 col-form-label"><b>Date of Birth:</b></label>
                <div class="col-sm-6">
                    <input type="date" autocomplete="nope" class="form-control" name="dob">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label"><b>Email:</b></label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" placeholder="Enter email" name="email">
                </div>
            </div>

            <div class="form-group row">
                <label for="phonenumber" class="col-sm-3 col-form-label"><b>Phone Number:</b></label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" placeholder="Enter phone number" name="phonenumber">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Gender:</b></label>
                <div class="col-sm-5">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="other">
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Designation:</b></label>
                <div class="col-sm-6">
                    <select class="form-control" name="designationid">
                        <?php foreach ($designation as $data) { ?>
                            <option value="<?php echo $data->designation_id ?>"><?php echo $data->designation ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Branch:</b></label>
                <div class="col-sm-6">
                    <select class="form-control" name="branchid">
                        <?php foreach ($branch as $data) { ?>
                            <option value="<?php echo $data->branch_id ?>"><?php echo $data->branch ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><b>Technology:</b></label>
                <div class="col-sm-6">
                    <select class="form-control" name="technologyid[]" multiple>
                        <?php foreach ($technology as $data) { ?>
                            <option value="<?php echo $data->technology_id ?>"><?php echo $data->technology ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <button value="Submit" id="submit" type="submit" class="btn btn-primary">submit</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('form').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/CodeIgniter/index.php/employeecontroller/create',
                    data: formData,
                    success: function (response) {
                        $('#modal').modal('show');
                    }
                });
            });
        });

    </script>
</body>

</html> `