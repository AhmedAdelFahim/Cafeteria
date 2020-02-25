<html>
<head>
    <title>All-Users</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/util.css">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/min_css.lass">

<!--    <link href="public/css/allUsers.css" rel="stylesheet">-->

</head>
<body>
<?php
    require_once ("utils/check_authorization.php");
    checkAuthorization("admin");

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 3;
    $offset = ($pageno - 1) * $no_of_records_per_page;

?>



    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div id="profile-data">
                    <img id="profile-picture" src="public/img/admin.png"/>
                    <a href="">Admin</a>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class="active"><a href="createOrder.php">Home</a></li>
                    <li><a href="AllUsers.php">Users</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="ordersAdmin.php">Orders</a></li>
                    <li><a href="#">Checks</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
<div class="container">

    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
<!--        <h1>AAA</h1>-->
                <div class="table100">
                    <table>
                        <thead>
                        <?php
                        require_once 'utils/DBConnection.php';
                        $conn = database_connection\DBConnection::getInstance();

                        $stat2 = $conn->prepare('SELECT COUNT(*) FROM users WHERE privilege = "user"');

                        $stat2->execute();
                        $total = $stat2->fetchColumn();
                        $total_pages = ceil($total / $no_of_records_per_page);
                        echo '<tr class="table100-head">';
//<!--                            <th>Order Date</th>-->
                            echo '<th>Name</th>
                                <th>Room</th>
                                <th>Image</th>
                                <th>Ext.</th>
                                <th>Action</th>';
                            $stat = $conn->prepare('SELECT * FROM users WHERE privilege = "user"
                            LIMIT :offset, :num');

                            $stat->bindValue(':offset', (int) trim($offset), PDO::PARAM_INT);
                            $stat->bindValue(':num', (int) trim($no_of_records_per_page), PDO::PARAM_INT);

                            $stat->execute();
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        foreach ($stat->fetchAll() as $row) {
                            echo '<tr>';
                            $ID = $row['id'];
                            echo '<td>'.$row['name'].'</td>';
                            echo '<td>'.$row['roomNo'].'</td>';
                            echo '<td><img src="'.$row['picture'].'" style="width:50px; height:50px;"></td>';
                            echo '<td>'.$row['ext'].'</td>';
                            echo "<td><a href='AddUser.php?operation=update&&id=$ID'> update | </a>
                                <a href='deleteUser.php?operation=delete&&id=$ID'> delete </a></td></tr>";
                        }


                        echo '</tbody>';
                        ?>
                    </table>
                </div>
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
    </div>
</div>

</body>
</html>