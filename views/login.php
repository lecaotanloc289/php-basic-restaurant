<!-- Login và signup vào chung file php nhưng file process thì khác nhau -->

<div id="login-form" class="login">
    <div class="login-logo">
        <img src="../restaurant/images/logoNH.png">
    </div>

    <div class="login-header">
        <h1>
            Login
        </h1>
    </div>

    <div class="login-content">
        <form action="../../restaurant/views/login_process.php" method="post" enctype="multipart/form-data">
            <div class="login-email">
                <div class="email-label">
                    <label>Username</label>
                    <div class="label">
                        <span>Need an account?</span>
                        <a id="signup-link" href="">Sign up</a>
                    </div>
                </div>
                <div class="email-input">
                    <input class="email-input-box" type="text" name="Username" placeholder="Username" required="required">
                </div>
            </div>

            <div class="login-password">
                <div class="password-label">
                    <label>Password</label>
                </div>
                <div class="email-input">
                    <input class="email-input-box" type="password" name="Password" placeholder="Password" required="required">
                </div>
            </div>

            <div class="login-button">
                <button type="submit" class="login-btnlg">Login</button>
            </div>
        </form>
    </div>

    <div class="login-footer">

        <div class="login-wrapper">
            <div class="login-bottom-box">
                <span>OR</span>
            </div>

            <div class="login-btn">
                <button class="login-btn-fb">
                    <i class="fa-brands fa-facebook"></i>
                    Continute with Facebook
                </button>
            </div>

            <div class="login-btn">
                <button class="login-btn-gg">
                    <i class="fa-brands fa-google"></i>
                    Continute with Google
                </button>
            </div>
        </div>

        <div class="login-forgot">
            <a href="">Forgot password</a>
        </div>
    </div>
</div>

<div id="signup-form" class="signup">
    <div class="login-logo">
        <img src="../../restaurant/images/logoNH.png">
    </div>

    <div class="login-header">
        <h1>
            Sign up
        </h1>
    </div>

    <div class="login-content">
        <form action="../../restaurant/views/signup_process.php" method="post" enctype="multipart/form-data">
            <div>
                <div class="login-email">
                    <div class="email-label">
                        <label>Fullname</label>
                    </div>
                    <div class="email-input">
                        <input class="email-input-box" type="text" name="Fullname" placeholder="Your fullname" required="required">
                    </div>
                </div>

                <div class="login-email">
                <div class="email-label">
                    <label>Email</label>
                </div>
                <div class="email-input">
                    <input class="email-input-box" type="email" name="Email"  placeholder="example@gmail.com" required="required">
                </div>

                <div class="login-email">
                <div class="email-label">
                    <label>Address</label>
                </div>
                <div class="email-input">
                    <input class="email-input-box" type="text" name="Address"  placeholder="Address" required="required">
                </div>
            </div>
            </div>
            </div>

            <div class="login-email">
                <div class="email-label">
                    <label>Username</label>
                </div>
                <div class="email-input">
                    <input class="email-input-box" type="text" name="Username" minlength="6" placeholder="Username" required="required">
                </div>
            </div>

            <div class="login-password">
                <div class="password-label">
                    <label>Password</label>
                </div>
                <div class="email-input">
                    <input class="email-input-box" type="password" minlength="6" name="Password" placeholder="Password" required="required">
                </div>
            </div>

            <div class="login-password">
                <div class="password-label">
                    <label>Confirm password</label>
                </div>
                <div class="email-input">
                    <input class="email-input-box" type="password" minlength="6" name="Confirm password" placeholder="Confirm password" required="required">
                </div>
            </div>

            <div class="form-group">
                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a></label>
            </div>

            <div class="create-btn">
                <input class="login-button login-btnlg" type="submit" value="Create your account" required="required">
            </div>
        </form>

        <div class="login-wrapper">
            <div class="login-bottom-box">
                <span>OR</span>
            </div>

            <div class="label-signup" style="font-size: 16px;margin-left: 24px;">
                <span>Have an account?</span>
            </div>

            <div class="login-btn">
                <button id="login-link" class="login-btn-fb">
                    Login
                </button>
            </div>

        </div>
    </div>
</div>

<script>
    // Lấy các phần tử cần sử dụng
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
    const signupLink = document.getElementById('signup-link');
    const loginLink = document.getElementById('login-link');

    // Xử lý sự kiện khi ấn vào liên kết "Sign Up"
    signupLink.addEventListener('click', function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

        loginForm.style.display = 'none'; // Ẩn form login
        signupForm.style.display = 'block'; // Hiển thị form sign up
    });

    // Xử lý sự kiện khi ấn vào liên kết "Log In"
    loginLink.addEventListener('click', function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

        loginForm.style.display = 'block'; // Hiển thị form login
        signupForm.style.display = 'none'; // Ẩn form sign up
    });
</script>