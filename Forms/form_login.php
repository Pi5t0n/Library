
<div id="login_register" class="login_register"><!--hidden?-->
    <form class="login_form" method="post" action="">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm"><img src="../img/loginM.png" alt="login"></span>
          </div>
          <input type="text" class="form-control" name="nickname">
          
          <br>
          
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm"><img src="../img/keyM.png" alt="login"></span>
          </div>
    
          <input type="password" class="form-control" name="pass" >
          
          <br>

          <input type="submit" class="btn btn-outline-secondary" name="user_login" value="Login">   
    </form>
    <form method="post" action="">
            <input type="submit" class="btn btn-outline-secondary" name="user_register" value="Register!">
    </form>  
    <?php include("form_shopping_cart.php")?>
</div>
  