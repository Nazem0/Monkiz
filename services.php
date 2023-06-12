<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="bootstrap-5.3.0-dist/css/bootstrap.css">
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <style>
        /* p
        {
            margin: 0 !important;
            padding: 0 !important;
            the style by default gives margin bottom to the text,
            so it's better to isolate the used classes only.
        } */
        th img {
            width: 5rem;
        }

        .gap {
            gap: 1.5rem;
            ;
        }
    </style>
    <?php 
        require_once("services_data.php");
    ?>
</head>

<body>
    <section id="section_1" class="d-flex main-content">
        <aside
            class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark position-static"
            id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                    aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="#"
                    target="_blank">
                    <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
                    <span class="ms-1 font-weight-bold text-white">Admin Dashboard</span>
                </a>
            </div>
            <hr class="horizontal light mt-0 mb-2">
            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="Dashboard.html">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="clients.html">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <span class="nav-link-text ms-1">Clients</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="../pages/billing.html">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">handyman</i>
                            </div>
                            <span class="nav-link-text ms-1">Maintenance Centers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active bg-gradient-primary" href="#">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">car_crash</i>
                            </div>
                            <span class="nav-link-text ms-1">Services</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div id="section_1_div_2">
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Service</th>
                            <th scope="col">Average Price</th>
                            <th scope="col">Requsted Count</th>
                            <th scope="col">Providers</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($popular_services as $item)
                        {
                        echo "
                        
                        <tr>
                            <th class='d-flex gap' scope='row'>
                                <img class='ServiceLogo' src=$item[img]
                                    alt=''>
                                <div class='d-flex flex-column justify-content-center '>
                                    <span>$item[name]</span>
                                </div>
                            </th>

                            <td class='pt-4 '>
                                <span>$item[price]</span>
                            </td>

                            <td class='pt-4'>
                                <span>$item[requests]</span>
                            </td>
                            <td class='pt-4'>
                                <a href=$item[providers]>Show Providers</a>
                            </td>
                        </tr>
                        ";};?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>
