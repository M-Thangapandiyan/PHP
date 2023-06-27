<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <?php echo validation_errors(); ?>
    <?php
  foreach($data as $value)
  {
  ?>
    <form method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter name"  name='name'
            value="<?php echo $value->name; ?>">
        </div>
        <div class="form-group">
            <label for="email">Address:</label>
            <input type="email" class="form-control" placeholder="Enter address"  name='address'
            value="<?php echo $value->address; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email"  name='email'
            value="<?php echo $value->email; ?>">
        </div>
        <div class="form-group">
            <label for="phonenumber">Phone number:</label>
            <input type="number" class="form-control" placeholder="Enter phone number" 
                name="phonenumber" value="<?php echo $value->phonenumber; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="http://localhost/CodeIgniter/index.php/companycontroller">
            <button type="button" class="btn btn-primary">Back</button>
        </a>
    </form>
    <?php
  }
  ?>
</body>

</html>