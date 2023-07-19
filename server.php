<?php

session_start();

function create(){
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $phoneNumber = $_POST['phonenumber'];
    $dateOfBirth = $_POST['dateofbirth'];
    $formData[] = isset($_SESSION['formData']) ? $_SESSION['formData'] : array();
    array_push($formData, array(
        'name' => $name,
        'designation' => $designation,
        'phonenumber' => $phoneNumber,
        'dateofbirth' => $dateOfBirth,
    )
    );
    $_SESSION['formData'] = $formData;
}
}

?>


<html>
<head>
    <title> Application </title>
</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>PhoneNumber</th>
                    <th>DOB</th>
                </tr>
            </thead>
            <tbody>
            
            <?php if (isset($_SESSION['formData'])) { 
                       $formData = $_SESSION['formData'];
                   foreach ($formData as $data) { ?>
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
                    </tr>
                <?php } }?>
            </tbody>
        </table>
    </div>
</body>

</html>