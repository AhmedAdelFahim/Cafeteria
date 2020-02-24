<html>
<head>
    <title>All-Users</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <link href="public/css/allUsers.css" rel="stylesheet">
</head>
<body>
    <?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 3;
        $offset = ($pageno - 1) * $no_of_records_per_page;
    ?>

    <div class="container">
        <div class="navbar">
            <div class="leftSideLinks">
                <a href="Homepage.html">Home</a><span> | </span>
                <a href="Product.html">Product</a><span> | </span>
                <a href="Users">Users</a><span> | </span>
                <a href="Maualorder.html">Manual Order</a><span> | </span>
                <a href="checks.html">Checks</a>
            </div>

            <div class="rightSideLinks">
                <img src = "Assets/admin.png"/>
                <a href="">Admin</a>
            </div>
        </div>

        <div class="allUserDiv">
            <div class="address">
                <p class="addUserLink"><a href="AddUser.php">Add User</a></p>

                <h1 class="headerName"> All Users</h1>
            </div>

            <?php
                require 'utils/DBConnection.php';
                $conn = database_connection\DBConnection::getInstance();

                $stat2 = $conn->prepare('SELECT COUNT(*) FROM users WHERE privilege = "user"');

                $stat2->execute();
                $total = $stat2->fetchColumn();
                $total_pages = ceil($total / $no_of_records_per_page);

                echo "<table class='usersTable'>";
                echo '<tr><th>name</th><th>Room</th><th>Image</th><th>EXT</th>
                        <th>Action</th></tr>';

                $stat = $conn->prepare('SELECT * FROM users WHERE privilege = "user"
                        LIMIT :offset, :num');

                $stat->bindValue(':offset', (int) trim($offset), PDO::PARAM_INT);
                $stat->bindValue(':num', (int) trim($no_of_records_per_page), PDO::PARAM_INT);

                $stat->execute();

                foreach ($stat->fetchAll() as $row) {
                    $ID = $row['id'];
                    echo '<td>'.$row['name'].'</td>';
                    echo '<td>'.$row['roomNo'].'</td>';
                    echo '<td>'.$row['picture'].'</td>';
                    echo '<td>'.$row['ext'].'</td>';
                    echo "<td><a href='AddUser.php?operation=update&&id=$ID'> update | </a>
                        <a href='deleteUser.php?operation=delete&&id=$ID'> delete </a></td></tr>";
                }
            ?>

        </div>

        <div class="pag">
            <div class="updateNotificationDiv" id="updateDiv">
                <?php
                    if (isset($_GET['updated'])) {
                        if ($_GET['updated'] == 1) {
                            echo '<script src="public/js/updateNotification.js"></script>';
                        }
                    }

                ?>
            </div>
            <ul class="pagination">
                <li><a href="?pageno=1">First</a></li>
                <li class="<?php if ($pageno <= 1) {
                    echo 'disabled';
                } ?>">
                    <a href="<?php if ($pageno <= 1) {
                    echo '#';
                } else {
                    echo '?pageno='.($pageno - 1);
                } ?>">Prev</a>
                </li>
                <li class="<?php if ($pageno >= $total_pages) {
                    echo 'disabled';
                } ?>">
                    <a href="<?php if ($pageno >= $total_pages) {
                    echo '#';
                } else {
                    echo '?pageno='.($pageno + 1);
                } ?>">Next</a>
                </li>
                <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
            </ul>
        </div>

    </div>

</body>
</html>