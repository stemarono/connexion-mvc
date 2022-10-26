<form action="" method="POST">
    <div class="block p-20 form-container">
        <h2>s'enregistrer</h2>

        <div class="form-control">
            <label for="firstname">prénom :</label>
            <input type="text" name="firstname" id="firstname">
            <?php if ($errors['firstname']) : ?>
                <p class="text-danger"><?= $errors['firstname'] ?></p>
            <?php endif; ?>
        </div>
        <div class="form-control">
            <label for="lastname">nom :</label>
            <input type="text" name="lastname" id="lastname">
            <?php if ($errors['lastname']) : ?>
                <p class="text-danger"><?= $errors['lastname'] ?></p>
            <?php endif; ?>
        </div>
        <div class="form-control">
            <label for="email">email : </label>
            <input type="text" name="email" id="email">
            <?php if ($errors['email']) : ?>
                <p class="text-danger"><?= $errors['email'] ?></p>
            <?php endif; ?>
        </div>
        <div class="form-control">
            <label for="password">mot de passe :</label>
            <input type="password" name="password" id="password">
            <?php if ($errors['password']) : ?>
                <p class="text-danger"><?= $errors['password'] ?></p>
            <?php endif; ?>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">s'enregistrer</button>
        </div>
    </div>
</form>