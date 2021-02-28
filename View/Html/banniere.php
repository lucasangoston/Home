<div class = "navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">HOME</a>
            <div>
                <ol class="menu">
                    <li>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=enseigne">L'enseigne</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=NosValeurs">Nos valeurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=shopHomme">Homme</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=shopFemme">Femme</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=Contact">Contact</a>
                            </li>
                        </ul>
                    </li>

                    <?php
                        if(!empty($_SESSION))
                        {
                            if($_SESSION['role'] === 'Admin')
                            {
                                ?>
                                <li>
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?page=dashboard">
                                                <img src = "../img/slider.png" width="20px" alt="panneau de contrôle"/>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?page=profil">
                                                <span style="font-size: 15px;">
                                                    <?= $_SESSION['firstName']?> <img src = "../img/user.png" width="20px" alt="profil"/>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?page=basket">
                                                <img src = "../img/basket.png" width="20px" alt="panier"/>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?page=deconnection">
                                                <span style="font-size: 20px;">
                                                    <img src = "../img/stand-by.png" width="20px" alt="deconnection"/>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                            }
                            else
                            {
                                ?>
                                <li>
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?page=profil">
                                                <span style="font-size: 15px;">
                                                    <?= $_SESSION['firstName']?> <i class="fas fa-user"></i>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?page=basket">
                                                <span style="font-size: 20px;">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?page=deconnection">
                                                <span style="font-size: 20px;">
                                                    <i class="fas fa-power-off" title="deconnection"></i>
                                                </span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <li>
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?page=inscription">Inscription</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?page=connexion">Connexion</a>
                                    </li>
                                </ul>
                            </li>
                            <?php
                        }
                    ?>
                    <li>
                        <ul class="navbar-nav">
                            <li class="nav-item" >
                                <span style="font-size: 16px;">
                                    <form class="form-inline my-2 my-lg-0" method="post" action="index.php?page=banniere">
                                        <input type="text" name="search" style="border-radius: 10px;" placeholder="Recherche">
                                        <input type="submit" value="envoyer">
                                    </form>
                                </span>
                            </li>
                        </ul>
                    </li>
                </ol>
            </div>
        </nav>
    </div>