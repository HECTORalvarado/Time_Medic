<menu class="menuHeader">
	<div class="menuTitle">
		<div class="menuBars">
			<input type="checkbox" name="menu" id="menu" onclick="changeMenu()">
			<label for="menu" class="menuClosed">
				<i class="fa-solid fa-bars fa-2x"></i>
			</label>
			<label for="menu" class="menuOpened">
				<i class="fa-regular fa-square-caret-down fa-2x"></i>
			</label>
		</div>
		<h2 class="titles">Time medic</h2>
	</div>
	<div class="userdata">
		<span class="username">
			<?php
			echo $_SESSION['username']
			?>
		</span>
		<figure class="imgContainer imgMenuProfile">
			<img src="./img/userDefault.png" alt="" width="50px" height="50px">
		</figure>
	</div>
</menu>

<div class="menuOptions" id="menuOptions">
	<a href="/app/public/adminProfile.php" class="menuBtn">Administrar Perfil</a>
	<?php
	if ($_SESSION['role'] == 1) {
		echo '
			<a href="/app/public/getCitas.php" class="menuBtn">Citas</a>
			<a href="/app/public/getCitas.php" class="menuBtn">Solicitar Cita</a>
		';
	}
	if ($_SESSION['role'] == 2) {
		echo '
			<a href="/app/public/getCitas.php" class="menuBtn">Administrar Citas</a>
			<a href="/app/public/getCitas.php" class="menuBtn">Administrar Horarios</a>
		';
	}
	if ($_SESSION['role'] == 3) {
		echo '
				<a href="/app/public/dashboard.php" class="menuBtn">Dasboard</a>
				<a href="/app/public/getCitas.php" class="menuBtn">Administrar Horarios</a>
				<a href="/app/public/getCitas.php" class="menuBtn">Areas medicas</a>
				<a href="/app/public/adminUsers.php" class="menuBtn">Administrar Usuarios</a>
				';
	}
	?>
	<a href="/app/public/logout.php" class="menuBtn btnLogout">Cerrar Sesión</a>
</div>