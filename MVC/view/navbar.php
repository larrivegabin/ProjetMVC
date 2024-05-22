

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a href="index.php?controller=films&action=index" class="navbar-brand">
            <i class="fa-solid fa-house" style="color:white"></i> Accueil
        </a>  
        <!--<a class="navbar-brand" href="#">Navbar</a>-->

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://www.youtube.com/watch?v=Cvo9t98S4G4" style="margin-left: 150px;">Bande Annonce: Les Déguns 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://www.youtube.com/watch?v=yTNKbLhVAQA" style="margin-left: 200px;">Bande annonce: Je suis une Légende</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://www.youtube.com/watch?v=WAXxFGfnfgY" style="margin-left: 200px;">Bande Annonce: L'exorciste</a>
            </li>
            </ul>

            <div id="loginMobile" class="float-right">
                <p style="color:white; margin:0px; padding:0px"><?php 
                    //session_start();
                    //var_dump( $_SESSION);
                    if(isset($_SESSION["member_name"]))
                    { 
                        echo ' <i class="fa-regular fa-user" style="color:white"></i> ' . $_SESSION["member_name"] ;   
                    }
                    ?>
                    &nbsp;&nbsp;
                    <a href="logout.php"> 
                        <i class="fa-solid fa-power-off fa-fade" style="color:white"></i>
                    </a>  
                </p>  
         
            </div>


        </div>

            <div id="login" class="float-right">
                <p style="color:green; margin:0px; padding:0px"><?php 
                    //session_start();
                    //var_dump( $_SESSION);
                    if(isset($_SESSION["member_name"]))
                    { 
                        echo ' <i class="fa-regular fa-user" style="color:red"></i> ' . $_SESSION["member_name"] ;   
                    }
                    ?>
                    &nbsp;&nbsp;
                    <a href="logout.php"> 
                        <i class="fa-solid fa-power-off fa-fade" style="color:blue"></i>
                    </a>  
                </p> 

                          
            </div>
            
</nav> 


<style> 
                @media(max-width: 767px)
                {
                    #login{
                        display:none;
                    }
                }
                @media(min-width: 767px){
                    #loginMobile{
                        display:none;
                    }
                }
            </style>