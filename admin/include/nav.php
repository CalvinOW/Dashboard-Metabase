
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand"></a>
        <button id="toggler" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/admin/main.php" style="font-size: 18px;"><span class="fa fa-cogs"></span> Admin</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 18px;">
                    <span class="fa fa-gear"></span> Mededeling
                </a>
                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/admin/mededeling.php"><span class="fa fa-plus"></span> Aanmaken</a></li>
                    <li><a class="dropdown-item" href="/admin/verwijdermededeling.php"><span class="fa fa-trash"></span> Verwijderen</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 18px;">
                    <span class="fa fa-users"></span> Gebruikers
                </a>
                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/admin/gebruikers.php"><span class="fa fa-plus"></span> Aanmaken</a></li>
                    <li><a class="dropdown-item" href="/admin/editgebruikers.php"><span class="fa fa-edit"></span> Gebruikers</a></li>
                    <li><a class="dropdown-item" href="/admin/rechten.php"><span class="fa fa-edit"></span> Rollen / Rechten</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 18px;">
                    <span class="fa fa-tachometer"></span> Dashboards
                </a>
                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/admin/dashboard_toevoegen.php"><span class="fa fa-plus"></span> Toevoegen</a></li>
                    <li><a class="dropdown-item" href="/admin/dashboard_verwijderen.php"><span class="fa fa-trash"></span> Verwijderen</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="/admin/personeel_dashboard_toevoegen.php"><span class="fa fa-plus"></span> Personeels Dashboard Toevoegen</a></li>
                    <li><a class="dropdown-item" href="/admin/personeel_dashboards.php"><span class="fa fa-trash"></span> Personeels Dashboard Verwijderen</a></li>
                </ul>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/admin/settings.php" style="font-size: 18px;"><span class="fa fa-gear"></span> Website Settings</a>
            </li>
            </ul>
            <ul class="navbar-nav me-auto" style="float: right; text-align: right;">
            <li class="nav-item dropdown" id="profiel">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 18px;">
                    <span class="fa fa-user-circle"></span> Profiel
                </a>
                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/dash/main.php"><span class="fa fa-undo"></span> Dashboard</a></li>
                    <li><a class="dropdown-item" href="/dash/logout.php"><span class="fa fa-sign-out"></span> Uitloggen</a></li>
                </ul>
            </li>
            </ul>
        </div>
</nav>



    <script>
        const navLinks = document.querySelectorAll('#toggler')
const menuToggle = document.getElementById('navbarSupportedContent')
const bsCollapse = new bootstrap.Collapse(menuToggle, {toggle:false})
navLinks.forEach((l) => {
    l.addEventListener('click', () => { bsCollapse.toggle() })
})
    </script>