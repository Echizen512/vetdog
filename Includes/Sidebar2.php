<section>

<aside id="leftsidebar" class="sidebar">
    <div class="user-info">
      <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo ucfirst($_SESSION['name']); ?></div>
        <div class="btn-group user-helper-dropdown">
          <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="true">keyboard_arrow_down</i>
          <ul class="dropdown-menu pull-right">
            <li><a href="../pages-logout"><img src="../assets/icons/MaterialSymbolsLightExitToApp.svg"
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
                    <a href="../panel-admin/administrador">
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
                            <a href="../productos/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/productos">Listar / Modificar</a>
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
                            <a href="../categorias/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/categorias">Listar / Modificar</a>
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
                            <a href="../clientes/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/clientes">Listar / Modificar</a>
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
                            <a href="../proveedores/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/proveedores">Listar / Modificar</a>
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
                            <a href="../veterinarios/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/veterinarios">Listar / Modificar</a>
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
                            <a href="../mascotas/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/mascotas">Listar / Modificar</a>
                        </li>
                        <li>
                            <a href="../../folder/tipo">Tipos</a>
                        </li>
                        <li>
                            <a href="../../folder/raza">Razas</a>
                        </li>
                        <li>
                            <a href="../mascotas/animales_table.php">Mostrar Adopciones</a>
                        </li>
                        <li>
                            <a href="../mascotas/animales_insert.php">Agregar Adopción</a>
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
                            <a href="../citas/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="../../folder/citas">Listar / Modificar</a>
                        </li>
                        <li>
                            <a href="../../folder/servicio">Servicio</a>
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
                            <a href="../compra/nuevo">Registrar</a>
                        </li>
                        <li>
                            <a href="../compra/compras_fecha">Consultar por fecha</a>
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
                            <a href="../venta/nuevo">Registrar</a>
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
              <a href="../audit/mostrar.php">Mostrar</a>
            </li>
          </ul>
        </li>


                <aside id="rightsidebar" class="right-sidebar">
                </aside>
</section>