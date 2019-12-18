<?php
$errors=array();
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $email='';
    if (isset($_POST['email']) and !empty($_POST['email']))
        $email=$_POST['email'];
    else
        $errors['email']='Email is required';

    $phone='';
    if (isset($_POST['phone']) and !empty($_POST['phone']))
        $phone=$_POST['phone'];
    else
        $errors['phone']='Phone is required';

    $password='';
    if (isset($_POST['password']) and !empty($_POST['password']))
        $password=$_POST['password'];
    else
        $errors['password']='Password is required';

    if (count($errors)==0){
        include_once "lib/image_compresor.php";
        include_once "connect_db.php";

        $uploaddir=$_SERVER['DOCUMENT_ROOT'].'/uploads/';
        $file_name=uniqid('300_').'.jpg';
        $file_save_path=$uploaddir.$file_name;
        my_image_resize(600,400,$file_save_path,'image');

        $urlPath="/uploads/".$file_name;
        $sql = "INSERT INTO tb_user (UserName, Email, Phone, Password, Photo) VALUES (?,?,?,?,?)";
        $stmt= $dbh->prepare($sql);
        $stmt->execute([$email, $email, $phone, $password, $urlPath]);
        header("Location: /profile.php");
        exit;
        // if(move_uploaded_file($_FILES['image']['temp_name'],$file_save_path)){
        //     echo "The file is valid and the download is successful.\n";
        // } else{
        //     echo "File download attack is possible.\n";
        // }
    }
}
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
            <h1>Sign Up for Free</h1>
            <form method="post" id="form_register" enctype="multipart/form-data">
                <?php create_input("email", "Email:", "email", $errors); ?>
                <?php create_input("phone", "Phone:", "text", $errors); ?>
                <?php create_input("password", "Password:", "password", $errors); ?>
                <?php create_input("image", "Photo:", "file", $errors); ?>
                <img id="prev" width="300"/>
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
?>
<script>
    $(function () {
        $("#form_register #image").on('input', function () {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#prev').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    });
</script>
<?php
include_once "_footer.php";
?>
