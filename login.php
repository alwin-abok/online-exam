<?php
include('config.php');
include('./templates/head.php');
?>
<div class="col-sm-3">
    <form action="" name="form1" method="POST" style="margin-top: 20px;">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="Username" placeholder="Enter username" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="Password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit1" style="margin-top:20px">Login</button>

        <div class="alert alert-danger" id='failure' role="alert" style="display:none ;margin-top:10px">
            Incorrect Username or Password!
        </div>
    </form>
    <br>
    <p>or</p><br>
    <a href="register.php"><button type="submit" class="btn btn-primary" name="">Sign Up</button></a>

</div>
</body>
<?php include('./templates/foot.php') ?>

</html>


<?php

if (isset($_POST['submit1'])) {
    $count = 0;

    $res = mysqli_query($link, "SELECT * FROM registration WHERE Username='$_POST[Username]' && Password='$_POST[Password]'");

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
            window.location = 'questions.php';
        </script>

<?php
    }
}

?>