    <div class="toggle" id="myToggle">
        <div class="user">
            <i class="material-icons user-icon" data-toggle="tooltip" data-placement="bottom" title="<?php echo $_SESSION["email"]; ?>">account_circle</i>
            <strong class=" user-name">
                <?php echo $_SESSION["email"]; ?>
            </strong>
        </div>
        <div class="categoria text-center">
            <p>
                <a href="" id="previous-month" style="margin-right: 15px;"> < </a> 
                <?php echo "$mydate[year]. $hun_month $mydate[mday]"; ?> 
                <a href="" id="next-month" style="margin-left: 15px;" > > </a>
            </p>
            <a class="ml-2" id="expends" href="profile.php">Kiadások</a>
            <strong>
                |
            </strong>
            <a id="incomes" href="profile-income.php">Bevételek</a>
            <strong>
                |
            </strong>
            <a id="overview" href="all-month.php">Áttekintés</a>
            <strong class="hide-last">
                |
            </strong>
            <a id="settings" type="button" data-toggle="modal" data-target="#change-data">Beállítások</a>
            <strong class="hide-first">
                |
            </strong>  
            <a href="logout.php">Kijelentkezés</a>
            <div class="modal text-dark" id="change-data" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!--Adat rész-->
                        <div class="modal-header main-title">
                            <h3 class="modal-title">Adatok módosítása</h3>
                            <button type="button" class="close btn-close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <form>
                                <div class="form-group">
                                    <label for="email" class="form-label font-weight-bold">Email cím</label>
                                    <input  type="text" class="form-control" disabled value="<?php echo $email?>">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label font-weight-bold">Teljes név</label>
                                    <input type="text" class="form-control"  id="fullname" value="<?php echo $_SESSION["fullname"]?>">
                                    <div class="invalid-feedback">A módosításhoz adjon meg nevet!</div>
                                </div>
                                <div class="alert alert-success p-1" id="success-name" hidden>Sikeres módosítás!</div>
                                <div class="alert alert-danger p-1" id="error-name" hidden>Sikertelen módosítás!</div>
                                <button type="button" class="btn btn-primary change-name">Módosítás</button>
                            </form>    
                        </div>
                        <!--Adat rész vége-->
                        <!--Jelszó rész-->
                        <div class="modal-header">
                            <h3 class="modal-title">Jelszó módosítása</h3>
                        </div>
                        <div class="modal-body text-left">
                            <form>
                                <div class="form-group">
                                    <label for="email" class="form-label font-weight-bold">Régi Jelszó</label>
                                    <input type="password" class="form-control" id="old-password" placeholder="*******">
                                    <div class="invalid-feedback">A jelszavak nem egyezik a régi jelszóval!</div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label font-weight-bold">Új Jelszó</label>
                                    <input type="password" class="form-control" id="new-password" placeholder="*******">
                                    <div class="invalid-feedback">A jelszónak legalább 5 karakternek kell lennie!</div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label font-weight-bold">Új Jelszó Megerősítése</label>
                                    <input type="password" class="form-control" id="new-password-confirm" placeholder="*******">
                                    <div class="invalid-feedback">A jelszavak nem egyeznek meg!</div>
                                </div>
                                <div class="alert alert-success p-1" id="success-password" hidden>Sikeres módosítás!</div>
                                <div class="alert alert-danger p-1" id="error-password" hidden>Sikertelen módosítás!</div>
                                <div class="error text-danger mt-2"></div>
                            </form>
                        </div>
                        <!--Jelszó rész vége-->
                        <div class="modal-footer d-flex justify-content-start">
                            <form>
                                <button type="button" class="btn btn-primary change-password">Módosítás</button>
                                <button type="button" class="btn btn-secondary close-modify" data-dismiss="modal">Bezár</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div></div>
    </div>
    <script src="../javaScript/change-month.js"></script>
    <script src="../javaScript/profile-data.js"></script>

