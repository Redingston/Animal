<?php
include_once "_header.php";
include_once "_navbar.php";
?>
<?php include_once "connect_db.php"; ?>
    <div class="container">
        <div class="row">
        <h1>Your profile</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT UserName,Email,Photo FROM tb_user";
                $sth = $dbh->prepare($query);
                $sth->execute();
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                    <tr>
                    <th scope="row"><img src ="'.$row["Photo"].'" width="150"/></th>
                        <td>' . $row["UserName"] . '</td>
                        <td>' . $row["Email"] . '</td>
                    </tr>
                    ';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>



<?php
include_once "_scripts.php";
include_once "_footer.php";
?>