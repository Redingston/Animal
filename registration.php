<?php 
    include_once "_header.php";
    include_once "_navbar.php";
?>
<?php include_once "connect_db.php"; ?>
<div class="conteiner">
    <div class="row">
        <div class="form mx-auto">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item col-md-6">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="true">Sign Up</a>
                </li>
                <li class="nav-item col-md-6">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Log In</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div div class="tab-pane fade show active" id="signup" role="tabpanel" aria-labelledby="home-tab">   
                    <h1>Sign Up for Free</h1>
                <form action="/" method="post">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Email Address</label>
                        <input type="email" class="form-control" id="inputEmail4"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass">
                    </div>    
                    <button type="success" class="btn btn-success btn-block" href="/">Get Started</button>
                </form>
            </div>
            <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="profile-tab">   
                <h1>Welcome Back!</h1>
                <form action="/" method="post">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Email Address</label>
                        <input type="email" class="form-control" id="inputEmail4"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass">
                    </div>    
                    <button type="primery" class="btn btn-primary btn-block" href="/">Log In</button>
                </form>
            </div>              
        </div><!-- tab-content -->   
    </div>
</div>
<?php 
    include_once "_scripts.php";
    //$user->email=$_POST['pass'];
    include_once "_footer.php";
?>
