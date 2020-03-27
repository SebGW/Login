<?php
include 'includes/header.php';
?>



<div class="container-md d-flex justify-content-center align-items-center form-height">
    <form action="register-script.php" method="POST">

        <div class="row">

            <div class="col">

                <div class="form-group">
                    <label for="firstname">Fornavn</label>
                    <input type="text" name="firstname" id="firstname" class="form-control">
                </div>

            </div>

            <div class="col">

                <div class="form-group">
                    <label for="lastname">Efternavn</label>
                    <input type="text" name="lastname" id="lastname" class="form-control">
                </div>

            </div>

        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Adgangskode</label>
            <input type="password" name="pw" id="password" class="form-control">
        </div>

        <input type="submit" name="submit" value="Send" class="btn btn-outline-success justify-content-end">

    </form>
</div>