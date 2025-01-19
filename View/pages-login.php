<?php
require '../assets/db/config.php';

if(isset($_POST['login'])) {
  $errMsg = '';

  //* Get data from FORM
  $user = $_POST['user'];
  $password = $_POST['password'];

  if (!preg_match('/\S/', $user) || !preg_match('/\S/', $password)) $errMsg = 'No puede enviar datos vacíos';
  
  if($errMsg === '') {
    try {
      $stmt = $connect->prepare('SELECT id, name, user, password FROM admin WHERE user = :user');

      $stmt->execute([':user' => $user]);
      $data = $stmt->fetch(PDO::FETCH_ASSOC);

      if($data === false) $errMsg = "Usuario $user no encontrado.";
      else {
        if(password_verify($password, $data['password'])) {
          //* Create session for the admin
          $_SESSION['id'] = $data['id'];
          $_SESSION['name'] = $data['name'];
          $_SESSION['user'] = $data['user'];
          
          header('Location: panel-admin/administrador');
          exit;
        }
        else $errMsg = 'usuario o contraseña incorrecta.';
      }

    } catch(PDOException $e) {
      $errMsg = $e->getMessage();
    }
  }
}
?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/lll.png" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <!-- tailwind css library  -->
  <script src="./../assets/js/tailwindcss.js"></script>

  <script src="../assets/js/init-alpine.js"></script>
  <title>Login | Beatriz Fagundez - Beatriz Fagundez Administrador</title>
</head>
<body>
<main class="flex items-center min-h-screen p-6" style="background-color: rgba(18,19,23,1)">
  <section class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl" style="background-color: #1a1c23;">

    <div class="flex flex-col overflow-y-auto md:flex-row">

      <article class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="hidden object-cover w-full h-full" src="../assets/icons/DashiconsAdminUsers.svg" alt="admin icon" style="display: block;"/>
      </article>

      <article class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
          <form class="container" autocomplete="off" method="POST"  role="form">
          <h1 class="mb-4 text-xl font-semibold text-gray-700  dark:text-gray-200">Iniciar Sesión Administrador</h1>
          <?php
            if(isset($errMsg)) echo '<div style="color:#FF0000;text-align:center;font-size:20px;">'.$errMsg.'</div>';  
          ?>
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Usuario <span style="font-size: 1.1rem;color:#ff0000db">*</span></span>
            <input
              class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              placeholder="admin" name="user" value="<?php if(isset($_POST['user'])) echo $_POST['user'] ?>" autocomplete="off"
            />
          </label>
          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Contraseña <span style="font-size: 1.1rem;color:#ff0000db">*</span></span>
            <input
              class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              placeholder="*****"
              type="password" required="true" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>"
            />
          </label>

          <hr class="my-8" />
          <button class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray" name='login' type="submit">Acceder</button>
          <div class="text-center mt-3">
            <a href="home.php" class="text-sm text-teal-400 underline decoration-solid">Regresar al inicio</a>
          </div>
          </form>
          <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>
        </div>
      </article>

    </div>
  </section>
</main>
</body>
</html>