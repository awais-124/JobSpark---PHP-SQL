<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page - JobSpark</title>
    <link rel="stylesheet" href="../styles/generalStyles.css">
    <link rel="stylesheet" href="../styles/RegisterPage/form.css">
    <link rel="stylesheet" href="../styles/RegisterPage/input-field-row.css">
    <link rel="stylesheet" href="../styles/RegisterPage/media-queries.css">
    <link rel="stylesheet" href="../styles/RegisterPage/common-styles.css">
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['register_errors'])) {
        echo '<div class="error-messages">';
        echo '<p class="error"><strong>Plz follow these instructions to submit form:</strong></p>';
        foreach ($_SESSION['register_errors'] as $error) {
            echo '<p class="error">' . htmlspecialchars($error) . '</p>';
        }
        echo '</div>';
        unset($_SESSION['register_errors']);
    }
    ?>
<form class="form-container" action="../controllers/check-register.php" method="POST">
    <div class="image-column"></div>
    <div class="form-content">
        <h3 class="register-form-heading">Create Account</h3>

        <div class="form-fields-row">
            <div class="input-column">
                <div class="input-group-register-form">
                    <input type="text" id="firstName" name="firstName" required placeholder=" ">
                    <label for="firstName">First Name</label>
                </div>
                <div class="input-group-register-form">
                    <input type="text" id="lastName" name="lastName" required placeholder=" ">
                    <label for="lastName">Last Name</label>
                </div>
                <div class="input-group-register-form">
                    <input type="username" id="username" name="username" required placeholder=" ">
                    <label for="username">Username</label>
                </div>
                 <div class="input-group-register-form">
                    <input type="email" id="email" name="email" required placeholder=" ">
                    <label for="email">Email</label>
                </div>
            </div>

            <div class="input-column">
                <div class="input-group-register-form">
                    <input type="password" id="password" name="password" required placeholder=" ">
                    <label for="password">Password</label>
                </div>
                <div class="input-group-register-form">
                    <input type="password" id="confirmPassword" name="confirmPassword" required placeholder=" ">
                    <label for="confirmPassword">Confirm Password</label>
                </div>
                <div class="input-group-register-form">
                    <input type="text" id="linkedIn" name="linkedIn" placeholder=" ">
                    <label for="linkedIn">LinkedIn Username</label>
                </div>
                <div class="input-group-register-form">
                    <input type="text" id="phoneNumber" name="phoneNumber" placeholder=" ">
                    <label for="phoneNumber">Phone Number</label>
                </div>
            </div>
        </div>

        <div class="full-width-row">
            <div class="role-selection">
                <p class="role-title">Sign Up as:</p>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" id="applicant" name="role" value="applicant" required>
                        <label for="applicant">Job Seeker</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="employer" name="role" value="employer">
                        <label for="employer">Employer</label>
                    </div>
                </div>
            </div>
            <button class="btn-register" type="submit">Register</button>

            <div class="bottom-line">
                <p>Already have an account?</p>
                <a href="./LoginPage.php">Login Here!</a>
            </div>
        </div>
    </div>
</form>

<script src="../js/registerForm.js"></script>

</body>
</html>
