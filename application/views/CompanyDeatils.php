<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <form action="http://localhost/CodeIgniter/index.php/companydetails/show" method="post">
        <div class="form-group">
            <label for="name">Employee Id:</label>
            <input type="number" class="form-control" placeholder="Enter employee number" name='employeeid'>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="http://localhost/CodeIgniter/index.php/employeecontroller">
            <button type="button" class="btn btn-primary">Back</button>
        </a>
    </form>
</body>

</html>