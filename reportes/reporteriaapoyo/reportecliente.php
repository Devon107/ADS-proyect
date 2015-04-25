<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <!--	<link rel="stylesheet" href="../css/style.css" type="text/css">-->
    <link rel="stylesheet" href="../css/foundation.css" />
    <link rel="stylesheet" href="../css/fondo.css">
    <link rel="stylesheet" href="../css/Tablas_reportes.css">
    <script src="../js/vendor/modernizr.js"></script>
</head>
<body>
<section class="hero">
    <div class="row">
        <div class="large-12 columns">
            <nav class="top-bar" data-topbar>
                <ul class="title-area">
                    <li class="name">
                        <h1>
                            <a href="#">
                                NYMSA
                            </a>
                        </h1>
                    </li>
                    <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
                </ul>
                <section class="top-bar-section">
                    <nav class="top-bar" data-topbar role="navigation">
                        <ul class="title-area">
                            <li class="name">
                                <h1><a href="home.php">NYMSA</a></h1>
                            </li>
                            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                            <li class="toggle-topbar menu-icon">
                                <a href="#"><span>Menu</span></a>
                            </li>
                        </ul>
                        <section class="top-bar-section">
                            <!-- Right Nav Section -->
                            <ul class="right">
                                <li class="active"><a href="#"><img class="icono" src="../static/icons/Places-user-identity-icon.png"/></a></li>
                                <li class="has-dropdown">
                                    <a href="#"><img class="icono" src="../static/icons/settings-icon2.png"/></a>
                                    <ul class="dropdown">
                                        <li><a href="#">First link in dropdown</a></li>
                                        <li class="active"><a href="logout.php">Cerrar Seción</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- Left Nav Section -->
                            <ul class="left">
                            </ul>
                        </section>
                    </nav>
                </section>
            </nav>
        </div>
    </div>
    <div class="row" align="center">
        <div class="row">
            <div align="center" class="large-12 about-box">
                <div class="black-box">
                    <table class="large-11 about-box" border="1" align="center">
                        <tr>
                            <th>ID Cliente</th>
                            <th>Cliente</th>
                            <th>Credito Fiscal</th>
                            <th>Fecha Alta</th>
                            <th>Fecha Baja</th>
                            <th>Empleado</th>
                        </tr>
                        <?php
                        @mysql_connect("localhost","root","");
                        @mysql_select_db("ci") or die ("BD no existente");
                        include('class.EasyPagination.php');
                        @$page	= $_GET["page"];
                        if ($page==NULL): $page	= 1;		endif;
                        $pagination = new EasyPagination($page,2);
                        $sql="SELECT c.idCliente, CONCAT(p.Primer_Nombre, ' ', p.Primer_Apellido) AS persona, c.CreditoFiscal, c.FechaAlta, c.FechaBaja, c.empleado FROM cliente AS c INNER JOIN persona AS p ON p.idPersona = c.idPersona";
                        $sqlSearch=$sql;
                        $pagination->setSQLSearch($sqlSearch);
                        $sqlNumRows = "SELECT COUNT(idCliente) AS numTotal FROM cliente";
                        $pagination->setSQLNumRows($sqlNumRows);
                        $SQLresult = $pagination->getResultData($page);
                        echo "Mostrando: <strong>".$pagination->getListCurrentRecords()."</strong><br>";
                        echo "Resultado: <strong><span style='color: #FF0000;'>".$pagination->getTotalRecords()."</span> ocurrencia(s) en <span style='color: #FF0000;'>".$pagination->getPagesFound()."</span> página(s)</strong><br>";
                        echo "<br>";

                        if (mysql_num_rows($SQLresult)>=1):
                            echo "<br>Resultados: <br><br>";
                            while (list($idCliente, $persona, $CreditoFiscal, $FechaAlta, $FechaBaja, $empleado) = mysql_fetch_row($SQLresult)):?>
                                <tr>
                                    <td><?php echo $idCliente;?></td>
                                    <td><?php echo $persona;?></td>
                                    <td><?php echo $CreditoFiscal;?></td>
                                    <td><?php echo $FechaAlta;?></td>
                                    <td><?php echo $FechaBaja;?></td>
                                    <td><?php echo $empleado;?></td>
                                </tr>
                            <?php endWhile;?>
                        <?php endIf;?>
                    </table>
                    <?php
                    // Gets the links for browsing
                    echo $pagination->getNavigation()."<br><br>";

                    // Gets the links of the current page, according to the current page
                    // Always from 1 to 10, 11 to 20, 21 to 30, and so forth
                    echo $pagination->getCurrentPages();
                    echo "<br>";

                    // Gets groups of links, from 10 to 10, oscillating as follows: (X)1,(X+1)1,(X+2)1
                    echo $pagination->getNavigationGroupLinks();
                    ?>
                    <!--                    <a href="#" class="secondary small button">Learn More →</a>-->
                    <div style="min-height: 20px;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="row">
        <div class="large-6 columns">
            <p>© Copyright no one at all. Go to town.</p>
        </div>
        <div class="large-6 columns">
            <ul class="inline-list right">
                <li><a href="#">About</a></li>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>