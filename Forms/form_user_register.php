    <div class="form_user_register">
    <hr>
    <h2>New user registration!</h2>
    <small id="emailHelp" class="form-text text-muted">Inputs with character "*" are required!</small>
    <form class="registration" method="post" action="">
        <div>
            <div class="form-group">
              <label for="u_name">Your Name: *</label>
              <input type="text" class="form-control" name="u_name" required>
            </div>
            <div class="form-group">
              <label for="u_surname1">Your Surname 1:</label>
              <input type="text" class="form-control" name="u_surname1" >
            </div>
            <div class="form-group">
              <label for="u_surname2">Your Surname 2:</label>
              <input type="text" class="form-control" name="u_surname2" >
            </div>
            <div class="form-group">
              <label for="nickname">Your nickname: *</label>
              <input type="text" class="form-control" name="nickname" required >
            </div>
            <div class="form-group">
              <label for="phone">Your phone:</label>
              <input type="text" class="form-control" name="phone" >
            </div>
        </div>
        <div>
            <div class="form-group">
              <label for="address">Your address:</label>
              <input type="text" class="form-control" name="address" >
            </div>
            <div class="form-group">
              <label for="u_email">Your email: *</label>
              <input type="email" class="form-control" name="u_email" required >
            </div>
            <div class="form-group">
              <label for="pass">Your pass:  *</label>
              <input type="password" class="form-control" name="pass" required>
            </div>
            <div class="form-group">
              <label for="pass2">Repeat yur pass :</label>
              <input type="password" class="form-control" name="pass2" >
            </div>
            <div>
                <input type="submit" class="btn btn-outline-secondary" name="user_add" value="Register">
            </div>
        </div>
    </form>
    </div>
 