<style>
    .login_signup{
        position: fixed;
        top: 20%;
        left: 40%;
        width: 300px;
        height: auto;
        padding: 20px;
        box-shadow: 0 0 20px rgb(0,0,0,.1);
        border-radius:15px;
        background: #fff;
        z-index: 999;
        display: none;
    }

    .login_signup .signupBx , .loginBx{
        display: none;
        align-items: center;
        justify-content: center;
        flex-direction: column;   
    }

    .login_signup form{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column; 
    }

    .login_signup form input{
        padding: 10px; 
        margin-top: 10px;
        border-radius:8px;
        background: #fff;
        box-shadow: 0 0 20px rgb(0,0,0,.1);
    }

    .login_signup form button{
        padding: 10px 15px; 
        margin-top: 10px;
        border-radius:8px;
        background: #037b83;
        color:#fff;
        box-shadow: 0 0 20px rgb(0,0,0,.1);
        cursor: pointer;
    }

    .login_signup_ll{
        display: block;
    }

    .login_signup_ll .loginBx{
        display: flex;
    }

    .login_signup_ss{
        display: block;
    }

    .login_signup_ss .signupBx{
        display: flex;
    }
</style>

<!-- login and signup -->

<div class="login_signup">
    <div class="signupBx">
        <h2>Sign Up</h2>
        <form id="signupFrom">
            <input type="text" id="signup_name" placeholder="name" require>
            <input type="number" id="signup_mobile" placeholder="mobile" require>
            <input type="text" id="signup_password" placeholder="password" require>
            <button type = "submit" id="signup">SignUp</button>
        </form>
    </div>
    <div class="loginBx">
    <h2>Log in</h2>
        <form id="loginFrom">
            <input type="number" id="login_mobile" placeholder="mobile" require>
            <input type="text" id="login_password" placeholder="password" require>
            <button type = "submit" id="login">Login</button>
        </form>
    </div>
</div>

<script>
  let login_signup = document.getElementsByClassName('login_signup')[0];
let loginBtn = document.getElementById('loginBtn');  
let signupBtn = document.getElementById('signupBtn'); 

// Login Button Click Event
loginBtn.addEventListener('click', () => {
    login_signup.classList.toggle('login_signup_ll');
    login_signup.classList.remove('login_signup_ss');
});

// Signup Button Click Event (Fixed the issue)
signupBtn.addEventListener('click', () => {
    login_signup.classList.toggle('login_signup_ss');
    login_signup.classList.remove('login_signup_ll');
});
</script>

<script>
    let base_url = "<?php echo base_url('user/'); ?>"; // Ensure trailing slash

// Signup 
document.getElementById('signup').addEventListener('click', async (e) => {
    e.preventDefault();

    let form = new FormData();
    form.append('name', document.getElementById('signup_name').value);
    form.append('mobile', document.getElementById('signup_mobile').value);
    form.append('password', document.getElementById('signup_password').value);

    try {
        const response = await fetch(base_url + 'signup', { // FIXED endpoint
            method: "POST",  // FIXED syntax
            body: form
        });

        const result = await response.json();
        alert(result.message); // FIXED variable name
        window.location.reload();

    } catch (error) {
        console.log("Error:", error);
    }
});

// Login
document.getElementById('login').addEventListener('click', async (e) => {
    e.preventDefault();

    let form = new FormData();
    form.append('mobile', document.getElementById('login_mobile').value);
    form.append('password', document.getElementById('login_password').value);

    try {
        const response = await fetch(base_url + 'login', { // FIXED endpoint
            method: "POST",  // FIXED syntax
            body: form
        });

        const result = await response.json();
        alert(result.message); // FIXED variable name
        window.location.reload();

    } catch (error) {
        console.log("Error:", error);
    }
});

document.getElementById('logoutBtn').addEventListener('click', async (e) => {
    e.preventDefault();

    try {
        const response = await fetch(base_url + 'logout');

        const result = await response.json();
        alert(result.message); // FIXED variable name
        window.location.reload();

    } catch (error) {
        console.log("Error:", error);
    }
});





</script>

<!-- <script src="index.js"></script> -->
</body>
</html>