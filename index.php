<?php
    //msg vars
    $msg = '';
    $msgClass = '';
    //check for submit
    if(filter_has_var(INPUT_POST, 'submit')){
        // echo 'submitted';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
    }

    if(!empty($name) && !empty($email) && !empty($message)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $msg = 'email is Invalid';
            $msgClass = 'alert-danger';
        }else{
            echo 'Passed';
        }


    }else{

        $msg='complete the fields';
        $msgClass = 'alert-danger';
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>  

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
  </div>
</nav>
<div class="container">

    <?php if($msg != ''): ?>
        <div class="alert <?php echo $msgClass; ?>">
            <?php echo $msg; ?>
        </div>
     <?php endif;  ?>   

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label >Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name'])? $name: '' ?>">
        </div>
        <div class="form-group">
            <label >Email</label>
            <input  type="text" name="email" class="form-control" value="<?php echo isset($_POST['email'])? $email: '' ?>">
        </div>
        <div class="form-group">
            <label >Description</label>
            <textarea name="message" id="" cols="10" rows="5" class="form-control" ><?php echo isset($_POST['message'])? $message: '' ?></textarea>
        </div>
        <br>
        <div class="form-group">
            <input  type="submit" name="submit" value="submit" class="btn btn-success" require>
        </div>
    </form>
</div>    



</body>
</html>