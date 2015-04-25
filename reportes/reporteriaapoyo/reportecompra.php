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
                    <table class="large-10 about-box" border="1" align="center">
                        <tr>
                            <th>ID Orden Compra</th>
                            <th>Fecha Creacion</th>
                            <th>Fecha Entrega</th>
                            <th>Proveedor</th>
                            <th>En Transito</th>
                        </tr>
                        <?php
                        @mysql_connect("localhost","root","");
                        @mysql_select_db("ci") or die ("BD no existente");
                        include('class.EasyPagination.php');
                        @$page	= $_GET["page"];
                        if ($page==NULL): $page	= 1;		endif;
                        $pagination = new EasyPagination($page,2);
                        $sql="SELECT o.idOrdenDeCompra, o.fechaCreacion, o.fechaEntrega, p.nombre AS proveedor, o.enTransito FROM ordendecompra AS o INNER JOIN proveedor AS p ON p.idProveedor = o.idProveedor";
                        $sqlSearch=$sql;
                        $pagination->setSQLSearch($sqlSearch);
                        $sqlNumRows = "SELECT COUNT(idOrdenDeCompra) AS numTotal FROM ordendecompra";
                        $pagination->setSQLNumRows($sqlNumRows);
                        $SQLresult = $pagination->getResultData($page);
                        echo "Mostrando: <strong>".$pagination->getListCurrentRecords()."</strong><br>";
                        echo "Resultado: <strong><span style='color: #FF0000;'>".$pagination->getTotalRecords()."</span> ocurrencia(s) en <span style='color: #FF0000;'>".$pagination->getPagesFound()."</span> página(s)</strong><br>";
                        echo "<br>";

                        if (mysql_num_rows($SQLresult)>=1):
                            echo "<br>Resultados: <br><br>";
                            while (list($idOrdenDeCompra, $fechaCreacion, $fechaEntrega, $proveedor, $enTransito) = mysql_fetch_row($SQLresult)):?>
                                <tr>
                                    <td><?php echo $idOrdenDeCompra;?></td>
                                    <td><?php echo $fechaCreacion;?></td>
                                    <td><?php echo $fechaEntrega;?></td>
                                    <td><?php echo $proveedor;?></td>
                                    <td><?php echo $enTransito;?></td>
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