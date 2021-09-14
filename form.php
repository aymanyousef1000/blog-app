<?php   
    require './helpers/dbConnection.php';


        
        # code...
        if ($_SERVER['REQUEST_METHOD']  == "POST") {
            $search = $_POST['search'];
            # code...
            if(!empty($search)){
                $sql = "select * from list where task like '%$search%'";
            }else{
                $sql = "select * from list";
            }
        }else {
            # code...
            $sql = "select * from list";
        }
        
        
      

    

    $op  =  mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Articles</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }

        .action{
            width:15%;
        }

        .id, .number{
            width:5%;
        }

        .date{
            width: 10%;
        }

        .add{
            position: absolute;
            right: 6%;
            width:15%;
        }


    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1> articles </h1>   
            
            <br>
            <form method="post" action="form.php" >
                <div class="form-group">
                      <label >search</label>
                      <input type="text"  name="search" class="form-control"  placeholder="search">
                </div>
                <button type="submit" class="btn btn-primary">search</button>
            </form>
        </div>

        



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th class="number">#</th>
                <th class="id">id</th>
                <th>article</th>
                <th class="action">Action</th>


            </tr>
            

<?php 
#--- reading records
      $i = 0;
      while ($data = mysqli_fetch_assoc($op)) {
?>
            <tr>
               <td><?php echo ++$i;?></td>
               <td><?php echo $data['id'];?></td>
               <td><?php echo $data['task'];?></td>
               

                <td>
                    <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <!-- <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a> -->
                </td>

            </tr>

<?php } ?>

            <!-- end table -->
        </table>
        

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->
    <div>
        <a href='insert.php' type="button" class="add btn btn-success">Add article</a>
        <br><br>
    <div>
    <br><br>
</body>

</html>