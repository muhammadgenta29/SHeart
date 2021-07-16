<?php 
  session_start();
  include_once "../../server.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($konek, "SELECT * FROM user WHERE unique_id = '$_SESSION[unique_id]'");
            $row = mysqli_fetch_array($sql);
          ?>
          <img src="../../gambar/<?php echo $row['poto']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['username'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="../index.php" class="logout">Home</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
