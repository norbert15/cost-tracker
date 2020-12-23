    <div class="toggle" id="myToggle">
        <div class="user">
            <i class="fa fa-user-circle user-icon" data-toggle="tooltip" data-placement="bottom" title="<?php echo $_SESSION["email"]; ?>"></i>
            <strong class=" user-name">
                <?php echo $_SESSION["email"]; ?>
            </strong>
        </div>
        <div class="categoria text-center">
            <p>
                <a href="" id="previous-month" style="margin-right: 15px;"> < </a> 
                <?php echo Flight::get("mydate")["year"] ." ". Flight::get("hun") . " " . Flight::get("mydate")["mday"]?>
                <a href="" id="next-month" style="margin-left: 15px;" > > </a>
            </p>
            <a class="ml-2" id="expends" href="../profile"><?php echo $toggleExpend?></a>
            <strong>
                |
            </strong>
            <a id="incomes" href="revenues"><?php echo $toggleRevenues?></a>
            <strong>
                |
            </strong>
            <a id="overviews" href="overview"><?php echo $toggleOverview?></a>
            <strong class="hide-last">
                |
            </strong>
            <a id="settings" type="button" data-toggle="modal" data-target="#change-data"><?php echo $toggleSettings?></a>
            <strong class="hide-first">
                |
            </strong>  
            <a id="logout" href="#"><?php echo $toggleLogout?></a>
            <div class="modal text-dark" id="change-data" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!--Adat rész-->
                        <div class="modal-header main-title">
                            <h3 class="modal-title"><?php echo $modalTitle?></h3>
                            <button type="button" class="close btn-close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <form>
                                <div class="form-group">
                                    <label for="email" class="form-label font-weight-bold"><?php echo $email?></label>
                                    <input  type="text" class="form-control" disabled value="<?php echo $_SESSION["email"]?>">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label font-weight-bold"><?php echo $fullname?></label>
                                    <input type="text" class="form-control"  id="fullname" value="<?php echo $_SESSION["fullname"]?>">
                                    <div class="invalid-feedback"><?php echo $nameFeedback?></div>
                                </div>
                                <div class="alert alert-success p-1" id="success-name" hidden><?php echo $successAlert?></div>
                                <div class="alert alert-danger p-1" id="error-name" hidden><?php echo $errorAlert?></div>
                                <button type="button" class="btn btn-primary change-name"><?php echo $modify?></button>
                            </form>    
                        </div>
                        <!--Adat rész vége-->
                        <!--Jelszó rész-->
                        <div class="modal-header">
                            <h3 class="modal-title"><?php echo $modalTitleP?></h3>
                        </div>
                        <div class="modal-body text-left">
                            <form>
                                <div class="form-group">
                                    <label for="email" class="form-label font-weight-bold"><?php echo $oldPassword?></label>
                                    <input type="password" class="form-control" id="old-password" placeholder="*******">
                                    <div class="invalid-feedback"><?php echo $oldFeedback?></div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label font-weight-bold"><?php echo $newPassword?></label>
                                    <input type="password" class="form-control" id="new-password" placeholder="*******">
                                    <div class="invalid-feedback"><?php echo $newFeedback?></div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label font-weight-bold"><?php echo $newConfirm?></label>
                                    <input type="password" class="form-control" id="new-password-confirm" placeholder="*******">
                                    <div class="invalid-feedback"><?php echo $confirmFeedback?></div>
                                </div>
                                <div class="alert alert-success p-1" id="success-password" hidden><?php echo $successAlert?></div>
                                <div class="alert alert-danger p-1" id="error-password" hidden><?php echo $errorAlert?></div>
                                <div class="error text-danger mt-2"></div>
                            </form>
                        </div>
                        <!--Jelszó rész vége-->
                        <div class="modal-footer d-flex justify-content-start">
                            <form>
                                <button type="button" class="btn btn-primary change-password"><?php echo $modify?></button>
                                <button type="button" class="btn btn-secondary close-modify" data-dismiss="modal"><?php echo $close?></button>
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

