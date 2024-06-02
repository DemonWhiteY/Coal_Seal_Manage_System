<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录和注册页面</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('img/LoginBackground.jpg') no-repeat center center fixed;
            /* 设置背景图 */
            background-size: cover;
            /* 让背景图覆盖整个页面 */
            margin: 0;
            display: flex;

            /* 居中对齐 */
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            /* 半透明白色背景 */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-left: 200px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .toggle-link {
            text-align: center;
            margin-top: 10px;
        }

        .toggle-link a {
            color: #007BFF;
            text-decoration: none;
        }

        .toggle-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="login-form" style="display: <?php echo isset($_POST['register']) ? 'none' : 'block'; ?>;">
            <h2>登录</h2>
            <form method="post">
                <div class="form-group">
                    <label for="login-username">用户名</label>
                    <input type="text" id="login-username" name="login-username" placeholder="请输入用户名" required>
                </div>
                <div class="form-group">
                    <label for="login-password">密码</label>
                    <input type="password" id="login-password" name="login-password" placeholder="请输入密码" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="login">登录</button>
                </div>
                <div class="toggle-link">
                    <a href="#" onclick="showRegisterForm()">没有账号？注册</a>
                </div>
            </form>
        </div>

        <div id="register-form" style="display: <?php echo isset($_POST['register']) ? 'block' : 'none'; ?>;">
            <h2>注册</h2>
            <form method="post">
                <div class="form-group">
                    <label for="register-username">用户名</label>
                    <input type="text" id="register-username" name="register-username" placeholder="请输入用户名" required>
                </div>
                <div class="form-group">
                    <label for="register-password">密码</label>
                    <input type="password" id="register-password" name="register-password" placeholder="请输入密码" required>
                </div>
                <div class="form-group">
                    <label for="register-email">邮箱</label>
                    <input type="email" id="register-email" name="register-email" placeholder="请输入邮箱" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="register">注册</button>
                </div>
                <div class="toggle-link">
                    <a href="#" onclick="showLoginForm()">已有账号？登录</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showRegisterForm() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
        }

        function showLoginForm() {
            document.getElementById('register-form').style.display = 'none';
            document.getElementById('login-form').style.display = 'block';
        }
    </script>

    <?php
    // 数据库连接信息
    $servername = "localhost"; // 服务器名称
    $username = "root"; // 用户名
    $password = ""; // 密码
    $database = "coal_seal_db"; // 数据库名称
    
    // 创建连接
    $conn = new mysqli($servername, $username, $password, $database);

    // 检查连接是否成功
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 处理注册
    if (isset($_POST['register'])) {
        $register_username = $_POST['register-username'];
        $register_password = password_hash($_POST['register-password'], PASSWORD_BCRYPT);
        $register_email = $_POST['register-email'];

        $sql = "INSERT INTO User (ID, pwd, tele) VALUES ('$register_username', '$register_password', '$register_email')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('注册成功！');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // 处理登录
    if (isset($_POST['login'])) {
        $login_username = $_POST['login-username'];
        $login_password = $_POST['login-password'];

        $sql = "SELECT * FROM User WHERE ID='$login_username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($login_password, $row['pwd'])) {
                echo "<script>alert('登录成功！');</script>";
                session_start();
                $_SESSION['userid'] = $login_username;

                if ($row['type'] == "user")
                    header("location:User/html/index.php");
                else if ($row['type'] == "worker")
                    header("location:Worker/html/index.php");
                else if ($row['type'] == "manager")
                    header("location:Manager/html/index.php");
            } else {
                echo "<script>alert('密码错误');</script>";
            }
        } else {
            echo "<script>alert('用户名不存在');</script>";
        }
    }

    // 关闭连接
    $conn->close();
    ?>
</body>

</html>