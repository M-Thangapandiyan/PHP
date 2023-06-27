<?php include("include/header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('application/css/Home.css') ?>" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Employee Details</h1>
        <div class="form-group row">
        </div>
        <?php
        if (!empty($result)) {
            foreach ($result as $data) {
                ?>
                <form class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Employee Id:</b></label>
                        <div class="col-sm-10">
                            <?php echo $data->emp_id ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>First Name:</b></label>
                        <div class="col-sm-10">
                        <?php echo ucfirst($data->firstname) ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Last Name:</b></label>
                        <div class="col-sm-10">
                        <?php echo ucfirst($data->lastname) ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Email:</b></label>
                        <div class="col-sm-10">
                            <?php echo $data->email ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Phone Number:</b></label>
                        <div class="col-sm-10">
                            <?php echo '+91 ' . $data->phonenumber ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Gender:</b></label>
                        <div class="col-sm-10">
                            <?php echo $data->gender ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>DOB:</b></label>
                        <div class="col-sm-10">
                            <?php echo date('d/m/Y', strtotime($data->DOB)); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Branch:</b></label>
                        <div class="col-sm-10">
                            <?php echo $data->branch ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Designation:</b></label>
                        <div class="col-sm-10">
                            <?php echo $data->designation ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Technology:</b></label>
                        <div class="col-sm-10">
                            <?php if (!empty($data->technologies)) {
                                $technologies = explode(',', $data->technologies);
                                foreach ($technologies as $technology) { ?>
                                    <li>
                                        <?php echo $technology; ?>
                                    </li>
                                <?php }
                            } else { ?>
                                No technologies found
                            <?php } ?>
                        </div>
                    </div>
                </form>
            <?php }
        } else { ?>
            <div>No Record found</div>
        <?php } ?>
    </div>
    <div>
        <a href="http://localhost/CodeIgniter/index.php/employeecontroller/employeeDetails">
            <button type="button" class="btn btn-primary">Back</button>
        </a>
    </div>

</body>

</html>

<?php include("include/footer.php");?>