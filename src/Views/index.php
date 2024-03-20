<h1 class="text-center mt-10">RecMan task</h1>

<div class="mt-3">
    <p class="fw-light">This is test task for RecMan.</p>
    <p class="fw-light">The tasks should be created with an MVC architecture using vanilla PHP. UI uses bootstrap 5.</p>
    <p class="fw-light">Check <span class="fw-bold">README.md</span> for the documentation.</p>
</div>

<hr class="mt-4 mb-4">

<?php if (empty($_SESSION['user'])) { ?>
    <div class="alert alert-secondary" role="alert">
        You're a guest. Please, register or login.
    </div>
<?php } else { ?>
    <div class="alert alert-primary" role="alert">
        Hi, <?php echo $_SESSION['user']['full_name']; ?> (<?php echo $_SESSION['user']['email']; ?>) <br>You're logged in.
    </div>
<?php } ?>

<div class="d-grid gap-2 col-6 mx-auto">
    <?php if (empty($_SESSION['user'])) { ?>
        <a class="btn btn-primary" href="login.php">Login</a>
        <a class="btn btn-outline-secondary" href="registration.php">Registration</a>
    <?php } else { ?>
        <form action="/logout.php" method="POST" class="d-grid col-12">
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    <?php } ?>
</div>