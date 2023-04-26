<?php include "components/navbar.php"?>
<?php include "config/database.php" ?>
<?php
if($_POST)
{
    $title = $_POST['title'];
    $description = $_POST['description'];

    if (!empty($title) && !empty($description))
    {
        $sql = "insert into things (thing_title, thing_description) values ('$title', '$description')";
        if($result=$connection->query($sql))
        {
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                Succeful Added !!!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            ";
        }
        else
        {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Error to added!!!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            ";
        }
    }
    else
    {
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Title and/or Description are mandatory fields
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        ";
    }
}
?>

<!--FORM-->
<div class="container mt-5 text-center">
    <form action="new.php" method="post">
        <div class="form-group">
            <label for="name">Something Title</label>
            <input type="text" name="title" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="description">Something Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include "components/footer.php"?>
