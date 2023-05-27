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

  <title>Home</title>
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

  <div class="admin-wrapper clearfix">
    <!-- Left Sidebar -->
    <div class="left-sidebar">
        <ul>
          <li><a href="home.php">MyModules</a></li>
          <li><a href="create.php">Add Module</a></li>
        </ul>
      </div>
    <!-- // Left Sidebar -->
    <!-- PHP Admin Panel -->
    <div >

                        <?php
                        $con = mysqli_connect("localhost","root","","scheduleapp");
                        if(isset($_GET['courseName']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['courseName']);
                       
                            $query = "SELECT * FROM courseinfo WHERE courseName='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="" method="POST">
                                <h2 style="text-align: center;color:Black;font-size:30px;">Add Hours You Studied</h2>
                                  <label style="text-align: center;color:Black;font-size:20px;">Module Name:</label><br>
                               <h1 style="color:Black;font-size:20px;"><?= $student['courseName']; ?></h1>
                               <label style="text-align: center;color:Black;font-size:20px;">Hours Left To Study:</label><br>
                               <h1 style=";color:Black;font-size:20px;"><?= $student['selfStudy']; ?></h1>
                               <label style="text-align: center;color:Black;font-size:20px;">Hours Studied By You:</label><br>
                               <h1style="color:Black;font-size:20px;"><?= $student['hoursStudied']; ?></h1>
                               <div class="input-group">
                                        <label>Hours</label><br>
                                        <div class="form__group" >
                                        <input type="text" name="hours"   class="form__input">
                                    </div>
                                    <div class="input-group">
                                        <button type="submit" name="update_student" class="button">
                                            Add & Save
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                         
                        }
                        ?>
                    </div>
                    
                        
 <!-- //PHP Admin Panel -->
    <!-- Admin Content -->
<?php
require 'db.php';
if(isset($_POST['update_student']))
{

  $student_id = mysqli_real_escape_string($con, $_GET['courseName']);
  $hours    = ($_REQUEST['hours']);                  
  $query = "SELECT * FROM courseinfo WHERE courseName='$student_id' ";
  $query_run = mysqli_query($con, $query);
 $selfStudy = $student['selfStudy'];
 $hoursStudied = $student['hoursStudied'];
 $hoursStudied = $hoursStudied+ $hours;
 $hoursLeft = $selfStudy-$hours;
 $selfStudy = $hoursLeft;


  

  $selfStudy   = mysqli_real_escape_string($con, $selfStudy);
  $hoursStudied   = mysqli_real_escape_string($con, $hoursStudied);

  $query = "UPDATE courseinfo SET  hoursStudied='$hoursStudied', selfStudy='$selfStudy' WHERE courseName='$student_id'  ";
  $query_run = mysqli_query($con, $query);
  

}
 

?>
   

      </div>
    </div>
    <!-- // Admin Content -->

  </div>
  
 

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CKEditor 5 -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  <!-- Custome Scripts -->
  <script src="scripts.js"></script>

</body>

</html>






