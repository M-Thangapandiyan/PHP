<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('application/css/Home.css')?>"/>
    <title>Document</title>
</head>

<body>
    <div class="create">
        <a href="http://localhost/CodeIgniter/index.php/companycontroller/create">
            <button class="btn btn-primary">Create</button>
        </a>
    </div>
   
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>PhoneNumber</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (($result)) {
                foreach ($result as $data) { ?>
                    <tr>
                        <td>
                            <?php echo $data->company_id ?>
                        </td>
                        <td>
                            <?php echo $data->name ?>
                        </td>
                        <td>
                            <?php echo $data->address ?>
                        </td>
                        <td>
                            <?php echo $data->email ?>
                        </td>
                        <td>
                            <?php echo $data->phonenumber ?>
                        </td>
                        <td>
                            <a href="http://localhost/CodeIgniter/index.php/companycontroller/delete/<?php echo $data->company_id; ?>"
                                class="btn btn-danger">
                                <span> <i class="fa fa-trash" aria-hidden="true"></i></span>
                            </a>
                            <a href="http://localhost/CodeIgniter/index.php/companycontroller/update/<?php echo $data->company_id; ?>"
                                class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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