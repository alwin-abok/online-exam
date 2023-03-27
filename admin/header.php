<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 550px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }
        }
    </style>
    <title>OnlineExam</title>
</head>

<body>
    <nav class="navbar navbar-inverse bg-info">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="questions.php">Questions</a></li>
                <li><a href="Edit.php">Edit</a></li>
                <li><a href="index.php">Logout</a></li>
                <li><a href="category.php.php">Category</a></li>
                <li><a href="demo.php">Home</a></li>
            </ul>
        </div>
    </nav>