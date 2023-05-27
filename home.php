<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- Custom Styles -->
  <link rel="stylesheet" href="style1.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="admin.css">

  <title>The Dashboard</title>
</head>

<body>
    <?php
    //include auth_session.php file on all user panel pages
    include("auth_session.php");
    ?>
  <!-- header -->
  <header class="clearfix">
    <div class="logo">
    
        <h1>Study Manager</h1>
        
    </div>
    <div class="fa fa-reorder menu-toggle"></div>
    <nav>
      <ul>
     
        <li>
          <a href="#" class="userinfo">
            <i class="fa fa-user"></i>
            <?php echo $_SESSION['studentNo']; ?>
            <i class="fa fa-chevron-down"></i>
          </a>
          <ul class="dropdown">
            
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <!-- // header -->

  <div class="admin-wrapper clearfix">
    <!-- Left Sidebar -->
    <div class="left-sidebar">
      <ul>
        <li><a href="home.php">MyModules</a></li>
        <li><a href="create.php">Add Module</a></li>
      </ul>
    </div>
    <!-- // Left Sidebar -->

    <!-- Admin Content -->
    <div class="admin-content clearfix">
     
      <div class="">
      <h2 style="text-align: center;color:Black;font-size:30px;">My Modules</h2>
        
    <br>
    <table class="table">
        <thead>
			<tr>
				<th>Name of Module</th>
				<th>Module Code</th>
				<th>Number of Class Hours</th>
				<th>Hours Left To Study</th>
				<th>Hours studied</th>
        <th>Record The Hours You Studied</th>
			</tr>
		</thead>

        <tbody>
        <?php

$con = mysqli_connect("localhost","root","","scheduleapp");

// Check connection
if ($con->connect_error) {
die("Connection failed: " . $connection->connect_error);
}

// read all row from database table
$sql = "SELECT * FROM courseinfo where studentNo = '" . $_SESSION["studentNo"] . "'";
$result = $con->query($sql);

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['courseName']; ?></td>
                                                <td><?= $student['courseCode']; ?></td>
                                                <td><?= $student['classHours']; ?></td>
                                                <td><?= $student['selfStudy']; ?></td>
                                                <td><?= $student['hoursStudied']; ?></td>
                                                <td>
                                                    <a href="TimeAdder.php?courseName=<?= $student['courseName']; ?>" class="btn btn-info btn-sm">Add</a>
                                                   
                                                 
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
        </tbody>
    </table>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="scripts.js"></script>

</body>

</html>







