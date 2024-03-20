<h1 class="text-center ">Login</h1>

<form action="/login.php" method="POST">
    <div class="mb-3">
        <label for="formEmail" class="form-label">E-mail</label>
        <input
            type="email"
            name="email"
            class="form-control <?php echo isset($data['errors']['email']) ? 'is-invalid' : ''; ?>"
            value="<?php if(isset($data['email'])) { echo ($data['email']); } ?>"
            id="formEmail">
        <?php if (isset($data['errors']['email'])) { ?>
            <div class="invalid-feedback">
                <?php echo $data['errors']['email']; ?>
            </div>
        <?php } ?>
    </div>

    <div class="mb-3">
        <label for="formPassword" class="form-label">Password</label>
        <input
            type="password"
            name="password"
            class="form-control <?php echo isset($data['errors']['password']) ? 'is-invalid' : ''; ?>"
            value="<?php if(isset($data['email'])) { echo ($data['password']); } ?>"
            id="formPassword">
        <?php if (isset($data['errors']['password'])) { ?>
            <div class="invalid-feedback">
                <?php echo $data['errors']['password']; ?>
            </div>
        <?php } ?>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="/index.php">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>