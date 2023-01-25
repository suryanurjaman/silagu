<?php
session_start();
include '../config/koneksi.php';
?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../assets/js/init-alpine.js"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../assets/img/login-office.jpeg" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="../assets/img/login-office-dark.jpeg" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <form method="post" action="" class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Login
                        </h1>
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Username</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Username" type="text" name="username" />
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Password</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" name="password" />
                        </label>

                        <!-- You should use a button here, as the anchor is only used for the example  -->
                        <button name="submit" type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Log in
                        </button>

                        <?php
                        if (isset($_POST['submit'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            if (empty($username) || empty($password)) {
                                echo "<script>
                                alert('Username atau password tidak boleh kosong');
                                </script>";
                            } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $pass = md5($_POST['password']);
                                $sqlCek = mysqli_query($con, "SELECT * FROM tb_admin WHERE username='$_POST[username]' AND password='$pass' AND aktif='Y'");
                                $jml = mysqli_num_rows($sqlCek);
                                $d = mysqli_fetch_array($sqlCek);

                                if ($jml > 0) {
                                    session_start();
                                    $_SESSION['admin'] = $d['id_admin'];
                                    header("location: dashboard.php");
                                } else {
                                    echo "<script>
                                    alert('Username atau password salah');
                                    </script>";
                                }
                                mysqli_close($con);
                            }
                        }
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>