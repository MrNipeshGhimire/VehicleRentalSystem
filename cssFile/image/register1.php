
   
    <div>
    <button class="btn-login" onclick="showModal()">Login</button>
    <div class="overlay" onclick="closeModal()"></div>
    <div class="login-form">
        <span onclick="closeModal()">&times;</span>
        <h2>Register</h2>
        <form action="" method="POST">
           <div class="login-form-box">
              <label for="">Username</label>
              <input type="text" name="username" required>
           </div>
           <div class="login-form-box">
            <label for="">Email</label>
            <input type="text" name="email" required>
         </div>
         <div class="login-form-box">
            <label for="">Password</label>
            <input type="text" name="password" required>
         </div>
           <div class="login-form-box">
            <label for="">Phone</label>
            <input type="phone" name="phone" required>
         </div>
         <button type="button" name="submit">Login</button>
         <div class="dont_have_account_box">
         <p>Already a member?</p><a href="login.html">Login</a>
        </div>
        </form>
    </div>
    </div>
<script>
    function showModal(){
        document.querySelector('.overlay').classList.add('showoverlay');
        document.querySelector('.login-form').classList.add('showloginform');
    }
    function closeModal(){
        document.querySelector('.overlay').classList.remove('showoverlay');
        document.querySelector('.login-form').classList.remove('showloginform');
    }
</script>