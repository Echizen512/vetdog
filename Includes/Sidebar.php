<section>

  <aside id="leftsidebar" class="sidebar">
    <div class="user-info">
      <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo ucfirst($_SESSION['name']); ?>
        </div>
        <div class="btn-group user-helper-dropdown">
          <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="true">keyboard_arrow_down</i>
          <ul class="dropdown-menu pull-right">
            <li><a href="../View/pages-logout"><img src="../assets/icons/MaterialSymbolsLightExitToApp.svg"
                  style="width: 25px"> Cerrar Sesión</a></li>
            <li><a href="/vetdog/View/panel-admin/edit-admin.php" style="display: flex;gap: 5px;"><img
                  src="./../assets/icons/IconParkSolidConfig.svg" style="width: 25px">Editar perfil</a></li>
          </ul>
        </div>
      </div>
    </div>


    <div class="menu">
      <ul class="list">
        <li class="header">MENÚ DE NAVEGACIÓN</li>
        <li>
          <a href="../View/panel-admin/administrador">
            <i class="material-icons">home</i>
            <span>INICIO</span>
          </a>
        </li>

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">inbox</i>
            <span>PRODUCTOS</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="../View/productos/nuevo">Registrar</a>
            </li>
            <li>
              <a href="../folder/productos">Listar / Modificar</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">low_priority</i>
            <span>CATEGORÍAS</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="../View/categorias/nuevo">Registrar</a>
            </li>
            <li>
              <a href="../folder/categorias">Listar / Modificar</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">supervisor_account</i>
            <span>CLIENTES</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="../View/clientes/nuevo">Registrar</a>
            </li>
            <li>
              <a href="../folder/clientes">Listar / Modificar</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">person_pin</i>
            <span>VETERINARIOS</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="../View/veterinarios/nuevo">Registrar</a>
            </li>
            <li>
              <a href="../folder/veterinarios">Listar / Modificar</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">business</i>
            <span>PROVEEDORES</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="../View/proveedores/nuevo">Registrar</a>
            </li>
            <li>
              <a href="../folder/proveedores">Listar / Modificar</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">shopping_basket</i>
            <span>COMPRA</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="../View/compra/nuevo">Registrar</a>
            </li>
            <li>
              <a href="../View/compra/compras_fecha">Consultar por fecha</a>
            </li>

          </ul>
        </li>

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">monetization_on</i>
            <span>VENTA</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="../View/venta/nuevo">Registrar</a>
            </li>
            <li>
              <a href="../View/venta/venta_fecha">Consultar por fecha</a>
            </li>
          </ul>
        </li>


        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">flutter_dash</i>
            <span>MASCOTAS</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="../View/mascotas/nuevo">Registrar</a>
            </li>
            <li>
              <a href="../folder/mascotas">Listar / Modificar</a>
            </li>
            <li>
              <a href="../folder/tipo">Tipos</a>
            </li>
            <li>
              <a href="../folder/raza">Razas</a>
            </li>
            <li>
              <a href="../View/mascotas/animales_table.php">Mostrar Adopciones</a>
            </li>
            <li>
              <a href="../View/mascotas/animales_insert.php">Agregar Adopción</a>
            </li>
            <li>
              <a href="../View/mascotas/adopcion.php">Solicitudes</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">calendar_today</i>
            <span>CITAS</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="../View/citas/nuevo">Registrar</a>
            </li>
            <li>
              <a href="../folder/citas">Listar / Modificar</a>
            </li>
            <li>
              <a href="../folder/servicio">Servicio</a>
            </li>
            <li>
              <?php
              $sql = "SELECT * FROM quotes AS q WHERE q.vetID IS NULL ORDER BY q.dateCreation DESC";
              $results = mysqli_query($conn, $sql);
              $numberRequest = mysqli_num_rows($results);
              ?>
              <a href="../View/citas/solicitud.php" style="display: flex;align-items:center;gap:5px">Solicitudes <span
                  style="display: grid;place-items:center;margin: 0;color:#b00"><?= $numberRequest ?></span></a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">assessment</i>
            <span>BITÁCORA</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="../View/audit/mostrar.php">Mostrar</a>
            </li>
          </ul>
        </li>

        <aside id="rightsidebar" class="right-sidebar"></aside>
    </div>
</section>