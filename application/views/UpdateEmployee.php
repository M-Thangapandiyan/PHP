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
<div class="modal fade" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <p>Successfully updated</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h4>Employee update Form</h4>
        <?php echo validation_errors(); 
        
        foreach ($updatedata as $data) {
           
            ?>
                <form class="form-horizontal" method="post">
                <div class="form-group row">
                    <label for="firstname" class="col-sm-2 col-form-label"><b>First
                            Name:</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter first name" name="firstname"
                            value="<?php echo $data->firstname; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lastname" class="col-sm-2 col-form-label"><b>Last Name:</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter last name" name="lastname"
                            value="<?php echo $data->lastname; ?>" style="text-transform: capitalize;">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dob" class="col-sm-2 col-form-label"><b>Date of Birth:</b></label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="dob" value="<?php echo $data->DOB; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label"><b>Email:</b></label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Enter email" name="email"
                            value="<?php echo $data->email ?>">
                    </div>

                </div>

                <div class="form-group row">
                    <label for="phonenumber" class="col-sm-2 col-form-label"><b>Phone Number:</b></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" placeholder="Enter phone number" name="phonenumber"
                            value="<?php echo $data->phonenumber ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>Gender:</b></label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="male" <?php if ($data->gender === 'Male')
                                echo 'checked'; ?>>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="female" <?php if ($data->gender === 'Female')
                                echo 'checked'; ?>>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="other" <?php if ($data->gender === 'Other')
                                echo 'checked'; ?>>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>Designation:</b></label>
                    <div class="col-sm-10">
                        <select class="form-control" name="designationid">
                            <?php foreach ($designation as $designationData) { ?>
                                <option <?php if ($designationData->designation == $data->designation) {
                                    echo "selected";
                                } ?>
                                    value="<?php echo $designationData->designation_id ?>"><?php echo $designationData->designation ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>Branch:</b></label>
                    <div class="col-sm-10">
                        <select class="form-control" name="branchid">
                            <?php foreach ($branch as $branchData) { ?>
                                <option <?php if ($branchData->branch == $data->branch) {
                                    echo "selected";
                                } ?>
                                    value="<?php echo $branchData->branch_id ?>"><?php echo $branchData->branch ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>Technology:</b></label>
                    <div class="col-sm-10">
                        <select class="form-control" name="technologyid[]" multiple>
                          <?php
                                $technologies = explode(',', $data->technologies);
                                foreach ($technology as $technologyData) { ?>
                                    <option <?php if (in_array($technologyData->technology,  $technologies)) {
                                        echo "selected";
                                    } ?>
                                        value="<?php echo $technologyData->technology_id ?>"><?php echo $technologyData->technology; ?>
                                    </option>
                                <?php }  ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                <div class="col-md-12 text-center">
                    <button value="Submit" id="submit" type="submit" class="btn btn-primary">submit</button>
                </div>
            </div>
            </form>
            <?php
        }
        ?>
    </div>
    <script>
        $(document).ready(function () {
            $('form').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/CodeIgniter/index.php/employeecontroller/edit/<?php echo $data->employee_id; ?>',
                    data: formData,
                    success: function (response) {
                        $('#my-modal').modal('show');
                    }
                });
            });
        });
    </script>
</body>

</html>