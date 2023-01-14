<?php 
    include("connection.php");
    include("header.php");
    $id = $_GET['id'];
    $query = mysqli_query($connection,"SELECT * from deleted_donor_infos where id = '$id'");
    $row = mysqli_fetch_array($query);
    $name = $row['First_Name']." ".$row['Last_Name']; 
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
     <table class="table table-striped">
       <thead>
        <hr>
         <h4 style="text-align: center;"><?php echo $name;?> Blood Taken History</h4>
         <tr>
           <th scope="col">Donor Name</th>
           <th scope="col">Blood Group</th>
           <th scope="col">E-mail</th>
           <th scope="col">Phone</th>
           <th scope="col">Taken Date</th>
         </tr>
       </thead>
       <tbody>
        <?php 
        $id = $_GET['id'];
        $query = mysqli_query($connection,"SELECT * from donor_seeker_post where seeker_id = '$id'");
        while($row = mysqli_fetch_array($query))
        {
        $sql = mysqli_query($connection,"SELECT * from donation_infos where post_id = '".$row['id']."'");
        $row2 = mysqli_fetch_array($sql);
        $sql2 = mysqli_query($connection,"SELECT * from deleted_donor_infos where id = '".$row2['donor_id']."'");
        //$row3 = mysqli_fetch_array($sql2);
        $rowcount = mysqli_num_rows($sql2);
                for($i = 1; $i <= $rowcount; $i++)
                {
                  $row3 = mysqli_fetch_array($sql2);
        ?>
         
         <tr>
            <td>
                <?php echo $row3['First_Name']." ".$row3['Last_Name']; ?>
            </td>
            <td>
                <?php echo $row3['Blood_Group']; ?>
            </td>
            <td>
                <?php echo $row3['E_mail']; ?>
            </td>
            <td>
                <?php echo $row3['Phone']; ?>
            </td>
             <td>
                 <?php echo $row2['Last_donate']; ?>
            </td>
          </tr>
            <?php
              }
            }
            ?>
            <td></td>
            <td></td>
            <td>
           <?php
              if(mysqli_num_rows($query) == false)
                {
                    echo "<h5 style='text-align:center;'>No result found</h5>";
                } 
              ?> </td>
            <td></td>
            <td></td>
       </tbody>
     </table>
  </body>
</html>