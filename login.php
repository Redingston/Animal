<?php
$errors['email'] = "Use @";
?>
<?php
include_once "_header.php";
include_once "_navbar.php";
include_once "helpers/input_creator.php";
?>
<?php include_once "connect_db.php"; ?>
<div class="container">
    <div class="row mt-3">
        <div class="offset-md-3 col-md-6">
            <h1>Sign in</h1>
            <form method="post" id="form_register">
                <?php create_input("email", "Email:", "email", $errors); ?>
                <?php create_input("password", "Password:", "password", $errors); ?>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Sing Up"/>
                </div>
                <div class="form-group">
                    <a href="login.php" class="ForgetPwd">Sing in</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once "_scripts.php";
include_once "_footer.php";
?>
