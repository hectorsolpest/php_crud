<?php include "components/navbar.php"?>
<?php include "config/database.php"?>
<?php
$sql = "select * from things";
$result = $connection->query($sql);
$things = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php
    if($_GET)
    {
        $id = $_GET['id'];
        $sql = "delete from `things` where `things`.`id`=" . $id;
        if ($result = $connection->query($sql))
        {
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                Succeful Deleted !!!
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
                Something is wrong !!!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            ";
        }
        header('Location:view.php');
    }
?>
<?php if(!empty($things)):?>
<div class="container mt-5">
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($things as $thing):?>
        <tr>
            <th scope="row"><?php echo $thing['id']?></th>
            <td><?php echo $thing['thing_title']?></td>
            <td><?php echo $thing['thing_description']?></td>
            <td><a class="btn btn-warning" href="#">Editar</a>
                <form class="d-inline-flex" action="view.php" method="get">
                    <input type="hidden" name="id" value="<?php echo $thing['id']?>">
                    <button class="btn btn-danger ml-2" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

    <?php else: ?>
    <div class="container text-center">
        <div class="jumbotron mt-5">
            <h1 class="display-5">Ups !!!</h1>
            <p class="lead">There is nothing here yet.</p>
            <a class="btn btn-primary btn-lg" href="new.php" role="button">Add something</a>
        </div>
    </div>
    <?php endif?>
<?php include "components/footer.php"?>