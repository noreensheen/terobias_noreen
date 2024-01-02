<!DOCTYPE html>
<html lang="en">
    <?php include('.././head.php'); ?>
    <style>
        .navbar-custom .nav-item:hover, 
        #instructorNav {
            background-color: white;
        }
        .navbar-custom .nav-item:hover a,
        #instructorNav a {
            color: #2c6545 !important;
        }
    </style>
<body>
    <div class="d-flex">
        <?php include('.././sidebar.php'); ?>
        <main>
            <div class="container my-5">
                <button id="showHide" class="m-2">SHOW HIDE</button>
            </div>
            <a href="create.php" role="button" class="btn btn-primary mx-5 my-2">New instructor</a>
            <div class="card mx-5">
                <div class="card-header">
                    <div class="card-title">instructor List</div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">instructor ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include('.././conn.php');
                        $query = "SELECT * FROM `instructor`";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['instructorID'] . "</td>";
                            echo "<td>" . $row['firstN'] . "</td>";
                            echo "<td>" . $row['lastName'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>
                            <a href='update.php?instructorID=$row[instructorID]' class='btn btn-primary btn-sm'>UPDATE</a> 
                            <a href='delete_instructor.php?instructorID=$row[instructorID]' class='btn btn-danger btn-sm'>DELETE</a>
                            </td>";
                            echo "</tr>";
                        }
                        mysqli_close($con);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

<script>
    var showHideBtn = document.getElementById("showHide");
    var customNavbar = document.getElementById("customNavbar"); // Ensure this element exists in your HTML
    showHideBtn.addEventListener('click', () => {
        customNavbar.style.display = "inline-table";
        customNavbar.style.animation = "mymove 1s ease-in";
    });
</script>
