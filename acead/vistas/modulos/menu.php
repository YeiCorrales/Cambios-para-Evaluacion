<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

<?php
	//OBTENEMOS EL ROL DEL USUARIO
		$rol = $_SESSION["perfil"];

	//LLAMAMOS LOS PERMISOS DE ESE ROL
		$per = ControladorRoles::ctrAtributosRol($rol);

			echo '
			<li>
			</li>

			<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>';

			foreach ($per as $key => $permiso){

		//MENU USUARIOS
			if($permiso["OBJ"]== 8 && $permiso["PC"]== 1){

			echo '<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

				<ul class="treeview-menu">

				<li>

					<a href="roles">

						<i class="fa fa-circle-o"></i>
						<span>Roles de Usuarios</span>

					</a>

				</li>

			</ul>

			</li>';

		}

		//MENU ALUMNOS
		if($permiso["OBJ"]== 9 && $permiso["PC"]== 1){

			echo '<li>

				<a href="alumnos">

					<i class="fa fa-users"></i>
					<span>Alumnos</span>

				</a>

					<ul class="treeview-menu">

					<li>

						<a href="historialacademico">

							<i class="fa fa-circle-o"></i>
							<span>Historial Academico</span>

						</a>

					</li>

				</ul>


			</li>';

}

//MENU GESTION ACADEMICA
	if($permiso["OBJ"]== 10 && $permiso["PC"]==1){

			echo '<li class="treeview">

				<a href="gestionacademica">

					<i class="fa fa-university"></i>

					<span>Gestión Académica</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="index.php?ruta=gestionacademica&periodo=0">

							<i class="fa fa-circle-o"></i>
							<span>Matrícula Actual</span>

						</a>

					</li>

					<li>

						<a href="modalidades">

							<i class="fa fa-circle-o"></i>
							<span>Administración</span>

						</a>

					</li>

					<li>

						<a href="seccion">

							<i class="fa fa-circle-o"></i>
							<span>Secciones</span>

						</a>

					</li>

					<li>

						<a href="periodoacademico">

							<i class="fa fa-circle-o"></i>
							<span>Periodo Academico</span>

						</a>

					</li>

				</ul>

			</li>';
		}

	//MENU CALIFICACIONES
		if($permiso["OBJ"]== 11 && $permiso["PC"]== 1){

			echo '<li>

				<a href="registracalificaciones">

					<i class="fa fa-pencil"></i>
					<span>Registro de Calificaciones</span>

				</a>

			</li>';

}

//MENU COBROS
	if($permiso["OBJ"]==12 && $permiso["PC"]==1){

			echo '<li class="treeview">

				<a href="gestionacademica">

					<i class="fa fa-money"></i>

					<span>Cobros</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="pagomes">

							<i class="fa fa-circle-o"></i>
							<span>Pago de Mensualidades</span>

						</a>

					</li>

					<li>

						<a href="cobromatricula">

							<i class="fa fa-circle-o"></i>
							<span>Pago de matricula </span>

						</a>

					</li>

				</ul>

			</li>';
		}

	//MENU PARAMETROS
		if($permiso["OBJ"]==13 && $permiso["PC"]==1){

			echo '<li>

				<a href="configuracion">

					<i class="fa fa-cog"></i>
					<span>Configuracion</span>

				</a>

			</li>';

		}
}
			?>

		</ul>

	 </section>

</aside>
