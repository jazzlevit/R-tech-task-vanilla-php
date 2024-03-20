<h1 class="text-center ">Registration</h1>

<form action="/registration.php" method="POST" class="needs-validation">

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="formFirstName" class="form-label">First name</label>
            <input
                type="text"
                name="first_name"
                class="form-control <?php echo isset($data['errors']['first_name']) ? 'is-invalid' : ''; ?>"
                value="<?php if(isset($data['first_name'])) { echo ($data['first_name']); } ?>"
                    id="formFirstName">
            <?php if (isset($data['errors']['first_name'])) { ?>
                <div class="invalid-feedback">
                    <?php echo $data['errors']['first_name']; ?>
                </div>
            <?php } ?>
        </div>

        <div class="col-md-6">
            <label for="formLastName" class="form-label">Last name</label>
            <input
                type="text"
                name="last_name"
                class="form-control <?php echo isset($data['errors']['last_name']) ? 'is-invalid' : ''; ?>"
                value="<?php if(isset($data['last_name'])) { echo ($data['last_name']); } ?>"
                id="formLastName">
            <?php if (isset($data['errors']['last_name'])) { ?>
                <div class="invalid-feedback">
                    <?php echo $data['errors']['last_name']; ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="mb-3">
        <label for="formEmail" class="form-label">E-mail</label>
        <input
            type="email"
            name="email"
            class="form-control <?php echo isset($data['errors']['email']) ? 'is-invalid' : ''; ?>"
            value="<?php if(isset($data['email'])) { echo $data['email']; } ?>"
            id="formEmail">
        <?php if (isset($data['errors']['email'])) { ?>
            <div class="invalid-feedback">
                <?php echo $data['errors']['email']; ?>
            </div>
        <?php } ?>
    </div>

    <div class="mb-3">
        <label for="formMobilePhone" class="form-label">Mobile phone</label>
        <input
            type="text"
            name="mobile_phone"
            class="form-control <?php echo isset($data['errors']['mobile_phone']) ? 'is-invalid' : ''; ?>"
            value="<?php if(isset($data['mobile_phone'])) { echo $data['mobile_phone']; } ?>"
            id="formMobilePhone">
        <?php if (isset($data['errors']['mobile_phone'])) { ?>
            <div class="invalid-feedback">
                <?php echo $data['errors']['mobile_phone']; ?>
            </div>
        <?php } ?>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="formPassword" class="form-label">Password</label>
            <input
                type="password"
                name="password"
                class="form-control <?php echo isset($data['errors']['password']) ? 'is-invalid' : ''; ?>"
                value="<?php if(isset($data['password'])) { echo $data['password']; } ?>"
                id="formPassword">
            <?php if (isset($data['errors']['password'])) { ?>
                <div class="invalid-feedback">
                    <?php echo $data['errors']['password']; ?>
                </div>
            <?php } ?>
        </div>

        <div class="col-md-6">
            <label for="formRepeatPassword" class="form-label">Repeat Password</label>
            <input
                type="password"
                name="repeat_password"
                class="form-control <?php echo isset($data['errors']['repeat_password']) ? 'is-invalid' : ''; ?>"
                value="<?php if(isset($data['repeat_password'])) { echo $data['repeat_password']; } ?>"
                id="formRepeatPassword">
            <?php if (isset($data['errors']['repeat_password'])) { ?>
                <div class="invalid-feedback">
                    <?php echo $data['errors']['repeat_password']; ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="/index.php">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>