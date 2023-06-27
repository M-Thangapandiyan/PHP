<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <?php echo validation_errors(); ?>
    <form action="http://localhost/CodeIgniter/index.php/companycontroller/create" method="post">
        <div class="form-group">
            <label for="name">Company Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" name='name'>
        </div>
        <div class="form-group">
            <label for="name">Company Address:</label>
            <input type="text" class="form-control" placeholder="Enter company address" name='address'>
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" name='email'>
        </div>
        <div class="form-group">
            <label for="phonenumber">Phone number:</label>
            <input type="number" class="form-control" placeholder="Enter phonenumber" name="phonenumber">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="http://localhost/CodeIgniter/index.php/companycontroller">
            <button type="button" class="btn btn-primary">Back</button>
        </a>
    </form>
</body>

</html>