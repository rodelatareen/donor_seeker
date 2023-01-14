<?php 
    include("connection.php"); // view all user by admin
    include("header.php"); 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>
    <?php
        $query = mysqli_query($connection,"SELECT * from donor_infos where Role = 'admin'");
        $rowcount = mysqli_num_rows($query);
    ?>
     <table class="table table-striped">
       <thead>
        <hr>
        <h4 style="text-align: center;">All Admin Panel</h4>
         <tr>
           <th scope="col">Id</th>
           <th scope="col">First Name</th>
           <th scope="col">Division</th>
           <th scope="col">District</th>
           <th scope="col">Blood Group</th>
           <th scope="col">Status</th>
           <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
        <?php 
                for($i = 1; $i <= $rowcount; $i++)
                {
                  $row = mysqli_fetch_array($query);
        ?>
         
         <tr>
            <td>
                <?php echo $row['id'] ?>
            </td>
            <td>
                <?php echo $row['First_Name']; ?>
            </td>
            <td>
                <?php echo $row['Division']; ?>
            </td>
            <td>
                <?php echo $row['District']; ?>
            </td>
            <td>
                <?php echo $row['Blood_Group']; ?>
            </td>
            <td>
                <?php echo $row['status']; ?>
            </td>
            <td>
                <a class="btn btn-info" href="view_user_full_profile_by_admin.php?id=<?php echo $row['id'];?>">Profile</a>
                <a class="btn btn-primary" href="update_user_profile_by_admin.php?id=<?php echo $row['id'];?>">Update</a>
            </td>
          </tr>
            <?php
              }
            ?>
       </tbody>
     </table>
     <?php
       if(mysqli_num_rows($query) == false)
         {
             echo "<h5 style='text-align:center;'>No result found</h5>";
         } 
     ?>  
  </body>
</html>