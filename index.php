<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<?php

include 'FormController.php';

if (!empty($_POST)) {
    $formController = new FormController;
    $formController->validateForm();
    if (empty($formController->errors)) {
        $email = $formController->processForm();
        $emailer = new Emailer;
        $email = $emailer->compose($email);
        if ($email) {
            $emailer->send($email);
            header('Location: http://localhost/adt/index.php');
        }
    }
}
?>

<body>


    <div class='container'>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address <?= (isset($formController->errors['email'])) ? ' ' . $formController->errors['email'] : ''?></label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">First Name <?= (isset($formController->errors['firstName'])) ? ' ' . $formController->errors['firstName'] : ''?></label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="firstName" value="<?= (isset($_POST['firstName'])) ? $_POST['firstName'] : '' ?>"placeholder="First Name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Last Name <?= (isset($formController->errors['lastName'])) ? ' ' . $formController->errors['lastName'] : ''?></label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="lastName" value="<?= (isset($_POST['lastName'])) ? $_POST['lastName'] : '' ?>"placeholder="Last Name" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>