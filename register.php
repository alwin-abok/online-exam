<?php
include('config.php');
include('./templates/head.php')
?>
<div class="container">
    <div class="col-sm-8">

        <form action="" name="form2" method="POST" style="margin-top: 20px;">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationDefault01">First name</label>
                    <input type="text" class="form-control" id="validationDefault01" name="Firstname" value="" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationDefault02">Last name</label>
                    <input type="text" class="form-control" id="validationDefault02" name="Lastname" value="" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationDefault01"> Username</label>
                    <input type="text" class="form-control" id="validationDefault01" name="Username" value="" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationDefault01"> Email</label>
                    <input type="Email" class="form-control" id="validationDefault01" name="Email" value="" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationDefault02">Password</label>
                    <input type="Password" class="form-control" id="validationDefault02" name="Password" value="" required>
                </div>

            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">
                        Agree to terms and conditions
                    </label>
                </div>
            </div>
            <div>

            </div>
            <button class="btn btn-primary" type="submit" name="submit2" style='margin-top:10px;'> SignUp</button>
    </div>

    <div class="alert alert-success" id='success' role="alert" style="display: none;margin-top:10px">
        Registration Succesfull!
    </div>
    <div class="alert alert-danger" id='failure' role="alert" style="display:none ;margin-top:10px">
        Registration Error!Username Already Exists!
    </div>
    </form>
</div>
</body>
<?php include('./templates/foot.php') ?>

<?php
if (isset($_POST['submit2'])) {
    $count = 0;
    $res = mysqli_query($link, "SELECT* FROM registration where Username='$_POST[Username]'") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);

    if ($count > 0) {
?>
        <script type="text/javascript">
            $res = document.getElementById('failure').style.display = 'block'
            $res = document.getElementById('success').style.display = 'none'
        </script>

    <?php
    } else {

        mysqli_query($link, "INSERT INTO registration VALUES(NULL,'$_POST[Firstname]','$_POST[Lastname]','$_POST[Username]','$_POST[Email]','$_POST[Password]')");
    ?>
        <script type="text/javascript">
            alert('registration successful!')
            window.location = 'survey.php';
        </script>

<?php
    }
}
// include('./templates/foot.php');
?>