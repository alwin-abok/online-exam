<?php
include('./templates/head.php');
include('config.php');
?>
<nav class="navbar navbar-inverse visible-xs">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Dashboard</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="questions.php">Questions</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="col-sm-2 sidenav hidden-xs">
    <h2>Logo</h2>
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Dashboard</a></li>
        <li><a href="edit.php"></a>Edit</li>
        <li><a href="delete.php"></a>Delete</li>
        <li><a href="index.php"></a>Logout</li>
    </ul><br>
</div>
<br>
<div class="row">
    <form action="" name="form4" method="post">
        <div class="col-sm-4">
            <div class="well">
                <div class="form-group">
                    <label for="usr">New Exam Category</label>
                    <input type="text" class="form-control" name="category">
                </div>

                <div class="form-group">
                    <label for="pwd">Exam Time</label>
                    <input type="text" class="form-control" name="exam_time">
                </div>

    </form>
</div>

<button type="submit" class="btn btn-primary" name="submit4" style="margin-top:20px">Add Exam</button>


<div class="container" style="width:100%">
    <h2>Bordered Table</h2>
    <p>The .table-bordered class adds borders to a table:</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="success" scope="col">ID</th>
                <th class="warning" scope="col">Category</th>
                <th class="info" scope="col">Time</th>
                
                <th class="warning" scope="col">Edit</th>
                <th class="danger" scope="col">Delete</th>


            </tr>
        </thead>
        <tbody>

            <?php
            $count = 0;
            $res = mysqli_query($link, "SELECT * from exam_category ");
            while ($row = mysqli_fetch_array($res)) {

                $count = $count + 1;
            ?>
                <tr>
                    <th scope="row"><?php echo $count; ?></th>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['exam_time']; ?></td>
                    <td><a href="edit.php?id=<?php echo $row['id'];?>">Edit</a></td>
                    <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>

                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>

</div>
</div>
</div>

</body>

</html>


<?php

if (isset($_POST['submit4'])) {

    mysqli_query($link, "INSERT INTO exam_category VALUES(NULL,'$_POST[category]','$_POST[exam_time]')") or die(mysqli_error($link));

?>
    <script type="text/javascript">
        alert('category added succesfully');
        window.location.href = window.location.href;
    </script>

<?php
}

?>