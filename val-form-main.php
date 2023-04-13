<?php

    require('NameValidation.php');
    require('NumberValidation.php');

    if (isset($_POST['submit'])) {
    
        // Name Validation 
        
        $validation = new NameValidation($_POST);
        $errors = $validation->validateForm();

        // Number Validation

        $phoneVal = new NumberValidation($_POST);
        $phoneErr = $phoneVal->phoneValidate();

    }

?>

<html lang="en">
<head>
    <title>Basics Assignments</title>
    <link rel="stylesheet" href="val-form.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Enter The Below Details - Fill The Form</h2>
        <h4>* Required Field</h4>
        <!-- <form action="#" enctype="multipart/form-data" method="POST" id="form-1" onsubmit="return !!(validateTheForm() & fnameTheForm() & lnameTheForm() & validatePhone());"> -->
        <form action="val-form-new.php" enctype="multipart/form-data" method="POST" id="form-1" onsubmit="return !!(validateTheForm() & fnameTheForm() & lnameTheForm() & validatePhone());">

            <div class="section">
                <label>First Name:</label>
                <span class="error">*</span>
                <input placeholder="Enter First Name" type="text" name="fname" id="fname" class="names" value="<?php echo htmlspecialchars($_POST['fname']) ?? '' ?>">
                <div class="error">
                    <?php echo $errors['fname'] ?? '' ?>
                    </div>
            </div>

            <div class="section">
                <label>Last Name:</label>
                <span class="error">*</span>
                <input placeholder="Enter Last Name" type="text" name="lname" id="lname" class="names" value="<?php echo htmlspecialchars($_POST['lname']) ?? '' ?>">
                <div class="error">
                    <?php echo $errors['lname'] ?? '' ?>
                </div>
            </div>

            <div class="section">
                <label>Full Name:</label>
                <input type="text" name="fullName" id="fullname" disabled>
            </div>

            <div class="section">
                <label>Phone Number:</label>
                <span class="error">*</span>
                <input placeholder="Enter Phone Number" type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($_POST['phone']) ?? '' ?>">
                <div class="error">
                    <?php echo $phoneErr['phone'] ?? '' ?>
                </div>
            </div>

            <input type="submit" name="submit" id="submit" value="Submit">

        </form>

    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="val-form.js" type="text/javascript"></script>
</body>
</html>
