<?php
include('../config.php');
include('../templates/head.php');
?>
<h4>Login to access Admin Panel</h4>
<form action="" name="form3" method="POST" style="margin-top: 20px;">
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" name="Username" placeholder="Enter username" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="Password" class="form-control" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary" name="submit3" style="margin-top:20px">Login</button>

    <div class="alert alert-danger" id='failure' role="alert" style="display:none ;margin-top:10px">
        Incorrect Username or Password!
    </div>
</form>

</body>
<?php include('../templates/foot.php') ?>

</html>


<?php

if (isset($_POST['submit3'])) {
    $count = 0;

    $Username = mysqli_real_escape_string($link, $_POST['Username']);
    $Password = mysqli_real_escape_string($link, $_POST['Password']);

    $res = mysqli_query($link, "SELECT * FROM admin WHERE Username='$Username' && Password ='$Password'");

    $count = mysqli_num_rows($res);

    if ($count == 0) {

?>
        <script type="text/javascript">
            document.getElementById('failure').style.display = 'block';
        </script>

    <?php
    } else {
    ?>
        <script type="text/javascript">
            window.location = 'demo.php';
        </script>

<?php
    }
}

?>