<?php
    /** @var array $data */
    $posts = $data['posts'];
    $categories = $data['categories'];
    $authors = $data['authors'];
    $statuses = $data['statuses'];
    $errors = $data ['errors'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Hello, world!</title>
</head>
<body>
<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>Create</strong>
            </a>
        </div>
    </div>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
        <form action="store" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" aria-describedby="emailHelp">
                <div class="alert <?php echo isset($errors['title'][0]) ?  'alert-danger' : ''; ?> " role="alert">
                    <?php
                        echo $errors['title'][0] ?? '';
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Author</label>
                <select class="form-control" name="author">
                    <?php
                    foreach($authors as $author) {
                        echo '<option value="'.$author->getAuthorId().'">'.$author->getAuthorName().'</option>';
                    } ?>
                </select>
                <div class="alert <?php echo isset($errors['author'][0]) ?  'alert-danger' : ''; ?> " role="alert">
                    <?php
                        echo $errors['author'][0] ?? '';
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select class="form-control" name="status">
                    <?php
                    foreach($statuses as $status) {
                        echo '<option value="'.$status->getStatusId().'">'.$status->getStatusName().'</option>';
                    }?>
                </select>
                <div class="alert <?php echo isset($errors['status'][0]) ?  'alert-danger' : ''; ?> " role="alert">
                    <?php
                        echo $errors['status'][0] ?? '';
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Category</label>
                <select class="form-control" name="category">
                    <?php
                    foreach($categories as $category) {
                        echo '<option value="'.$category->getCatId().'">'.$category->getCatName().'</option>';
                    } ?>
                </select>
                <div class="alert <?php echo isset($errors['category'][0]) ?  'alert-danger' : ''; ?> " role="alert">
                    <?php
                        echo $errors['category'][0] ?? '';
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Img</label>
                <input type="text" name="img" class="form-control" id="exampleInputPassword1">
               <div class="alert <?php echo isset($errors['img'][0]) ?  'alert-danger' : ''; ?> " role="alert">
                    <?php
                        echo $errors['img'][0] ?? '';
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Content</label>
                <textarea name="content" class="form-control"></textarea>
                <div class="alert <?php echo isset($errors['content'][0]) ?  'alert-danger' : ''; ?> " role="alert">
                    <?php
                        echo $errors['content'][0] ?? '';
                    ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
    </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>