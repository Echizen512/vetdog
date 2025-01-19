<?php
session_start();
if (!isset($_SESSION['ownerID']))
  header('location: ./../login.php');
require_once './../../assets/db/connectionMysql.php';
?>

<?php include './Includes/Head.php'; ?>
<body class="theme-red">
  <?php include './Includes/Loader.php'; ?>
  <div class="overlay"></div>
  <?php include './Includes/Nav.php'; ?>
  <?php include './Includes/Sidebar.php'; ?>
  <section class="content">
    <div class="container-fluid">
      <h2 class="text-center">Servicios</h2>
      <br><br>
      <section class="container-category">
        <?php
        $sql = "SELECT nomser FROM service ORDER BY nomser DESC";
        $results = mysqli_query($conn, $sql);
        foreach ($results as $row) { ?>
          <a href="/vetdog/vista/SideUser/quotes/newQuote.php" class="card">
            <div class="card1" style="user-select: none;">
              <p><?= $row['nomser'] ?></p>
              <div class="go-corner" href="#">
                <div class="go-arrow"> → </div>
              </div>
            </div>
          </a>
        <?php } ?>
      </section>
      <h3 class="text-center">Mascotas Atendidas</h3>
      <section class="container-fluid" style="display: grid;place-items: center">
        <div style="width: 350px;height:350px">
          <canvas id="pets"></canvas>
        </div>
      </section>
    </div>
    </div>
  </section>

  <?php include './Includes/Footer.php'; ?>

  <script>
    addEventListener('load', () => {
      (getData = async () => {
        const req = await fetch('./data.php?ownerID=<?= $_SESSION['ownerID'] ?>');
        const res = await req.json();

        const optionsLabel = {
          plugins: {
            legend: {
              display: true,
              position: 'bottom'
            }
          }
        }

        new Chart('pets', {
          type: 'pie',
          data: {
            labels: ['Mascotas registradas', 'Mascotas atendidas'],
            datasets: [{
              label: 'Número total de mascotas',
              data: [res.pet1, res.pet2],
              backgroundColor: ['rgb(54, 162, 235)', '#3AF8AC'],
              hoverOffset: 10,
            }],
          },
          options: optionsLabel,
        });

      })();
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
    integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="./main.js"></script>
</body>

</html>