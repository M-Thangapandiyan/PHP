
<?php include("include/header.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('application/css/Home.css') ?>" />
    <title>Document</title>
</head>

<body>
    <div class="create">
        <a href="http://localhost/CodeIgniter/index.php/employeecontroller/create">
            <button class="btn btn-primary">Create</button>
        </a>
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
                            <?php echo $data->emp_id ?>
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
                            <a href="http://localhost/CodeIgniter/index.php/view/<?php echo $data->employee_id; ?>"
                                class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="http://localhost/CodeIgniter/index.php/edit/<?php echo $data->employee_id; ?>"
                                class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="http://localhost/CodeIgniter/index.php/delete/<?php echo $data->employee_id; ?>"
                                class="btn btn-danger">
                                <span> <i class="fa fa-trash" aria-hidden="true"></i></span>
                            </a>
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
</body>

</html>

<?php include("include/footer.php");?>