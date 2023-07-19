<?php
session_start();
delete();
create();
function create()
{
  if ($_POST['name']) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $phoneNumber = $_POST['phonenumber'];
    $dateOfBirth = $_POST['dateofbirth'];
    $formData = isset($_SESSION['formData']) ? $_SESSION['formData'] : array();
    array_push(
      $formData,
      array(
        'name' => $name,
        'designation' => $designation,
        'phonenumber' => $phoneNumber,
        'dateofbirth' => $dateOfBirth,
      )
    );
    $_SESSION['formData'] = $formData;
  }
}

function delete()
{
  if (isset($_POST['delete'])) {
    $name = $_POST['name'];
    echo $name;
    // $formData = $_SESSION['formData'];
    $formData = isset($_SESSION['formData']) ? $_SESSION['formData'] : array();
    foreach ($formData as $index => $data) {
      if ($data['name'] === $name) {
        unset($formData[$index]);

      }
    }
    $_SESSION['formData'] = $formData;
  }
}

?>

<html>

<head>
  <title>Application</title>
</head>

<body>
  <form name="abc" method="post">
    <div>
      <label>Name</label>
      <input type="text" name="name">
    </div>
    <div>
      <label>Designation</label>
      <input type="text" name="designation">
    </div>
    <div>
      <label>Phone number</label>
      <input type="number" name="phonenumber">
    </div>
    <div>
      <label>Date of Birth</label>
      <input type="date" name="dateofbirth">
    </div>
    <div>
      <button type="submit" name="save">Save</button>
    </div>
  </form>
  <div>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Designation</th>
          <th>PhoneNumber</th>
          <th>DOB</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_SESSION['formData'])) {
          $formData = $_SESSION['formData'];
          foreach ($formData as $data) {
            ?>
            <tr>
              <td>
                <?php echo $data['name']; ?>
              </td>
              <td>
                <?php echo $data['designation']; ?>
              </td>
              <td>
                <?php echo $data['phonenumber']; ?>
              </td>
              <td>
                <?php echo $data['dateofbirth']; ?>
              </td>
              <td>
                <form method="post">
                  <input type="hidden" name="name" value="<?php echo $data['name']; ?>">
                  <button type="submit" name="delete">delete</button>
                </form>
              </td>
            </tr>
            <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>