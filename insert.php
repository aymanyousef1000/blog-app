<?php

require  './helpers/dbConnection.php';
require './helpers/helpers.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    # Logic ... 
    $article     = CleanInputs($_POST['article']);

    # Validate Inputs ... 
    $errors = [];

    if(!validate($article,1)){
     $errors['article'] = "Field Required.";
    }elseif(!validate($article,2)){
        $errors['article'] = "Invalid String.";  
    }


    if(count($errors) > 0){

        foreach($errors as $key => $value)
        {
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{

     $sql = "INSERT INTO `list`(`task`) VALUES ('$article')";

     $op = mysqli_query($con,$sql);

     if($op){
         echo 'article Added Sucessfully';
     }else{
         echo 'faild,try again';
       }
    }
    header("Location: form.php");

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Task</h2>
  <form method="post" action="insert.php"  enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputEmail1">Add article</label>
    <input type="text" name="article"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter your article">

  </div>
  
  <button type="submit" class="btn btn-primary">Add</button>
  
</form>
</div>



</body>
</html>