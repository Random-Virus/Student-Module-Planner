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

    <!-- Admin Content -->
    <div class="admin-content clearfix" method="post">
      
      <div class="">
        <h2 style="text-align: center;color:Black;font-size:30px;">Add Module</h2>

        <form action="create.php" method="post">
        <div class="input-group">
            <label>Student Number</label>
            <input type="text" name="studentNo" class="text-input" value="<?php echo $_SESSION['studentNo']; ?>"></input>
          </div>
          <div class="input-group">
            <label>Name</label>
            <input type="text" name="courseName" class="text-input"required>
          </div>
          <div class="input-group">
            <label>Module Code</label>
            <input type="text" name="courseCode" class="text-input"required>
          </div>
          <div class="input-group">
            <label>Number of Credits</label>
            <input type="text" name="creds" class="text-input"required>
          </div>
          <div class="input-group">
            <label>Class hours per week</label>
            <input type="text" name="timeClass" class="text-input"required>
          </div>
          <div class="input-group">
            <label>Weeks In semester</label>
            <input type="text" name="weeks" class="text-input"required>
          </div>
          <div class="input-group">
            <label>Start Date Of The Semester</label>
            <input type="date" name="courseStart" class="text-input"required>
          </div>
        
      
          <div class="input-group">
            <button type="submit" name="submit" class="btn">Save Post</button>
          </div>
         
            <label class="label"></label>
         
        </form>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>
  <!-- /php code -->
  <?php
    require('db.php');
        // removes backslashes
       
      

    // When form submitted, insert values into the database.
    if (isset($_REQUEST['courseName'])) {

        $studentNo = stripslashes($_REQUEST['studentNo']);
        $courseName = stripslashes($_REQUEST['courseName']);
        $creds    = ($_REQUEST['creds']);
        $courseCode  = stripslashes($_REQUEST['courseCode']);
        $classHours = ($_REQUEST['timeClass']);    
        $weeks   = ($_REQUEST['weeks']);
        $courseStart   = stripslashes($_REQUEST['courseStart']);
         $studentNo = mysqli_real_escape_string($con, $studentNo);
        $courseName = mysqli_real_escape_string($con, $courseName);
        $courseCode    = mysqli_real_escape_string($con, $courseCode);
        $creds    = mysqli_real_escape_string($con, $creds);
        $selfStudy = mysqli_real_escape_string($con, $selfStudy);
        $weeks   = mysqli_real_escape_string($con, $weeks);
        $courseStart    = mysqli_real_escape_string($con, $courseStart);
        
        $classHours = mysqli_real_escape_string($con, $classHours);
        $selfStudy =  (($creds*10)/$weeks)-$classHours;
        
      
        
       
        $query    = "INSERT into `courseinfo` (studentNo, courseName, courseCode, creds, weeks, startDate, classHours, selfStudy, hoursStudied)
                     VALUES ('$studentNo','$courseName', '$courseCode', '$creds', '$weeks', '$courseStart', '$classHours', '$selfStudy',0)";
        $result   = mysqli_query($con, $query);
        if ($result) {
          echo " <label >Module Added</label>";
      } else {
          echo "<div class='label'>
                <h3>Required fields are missing.</h3><br/>
               
                </div>";
      }
       
  } 
?>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CKEditor 5 -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  <!-- Custome Scripts -->
  <script src="scripts.js"></script>

</body>

</html>