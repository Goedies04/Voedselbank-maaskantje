<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- vebindt met een plugging die we hebben om de icons goed te krijgen -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        <img class='icon' src="navigationimg/VBN_logo-150x150.png" >
        <div class="logo_name">Maaskantje</div>
        <img id="btn" src="navigationimg/menu-regular-24.png" alt="">
    </div>
    <ul class="nav-list">
        <li>
            <a href="Dashboard.php">
                <i class='bx bx-home-alt-2'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>

        <li>
            <a href="Voedselpakket.php">
                <i class='bx bx-baguette' ></i>
                <span class="links_name">Voedselpaket</span>
            </a>
            <span class="tooltip">Voedselpaket</span>
        </li>
        <li>
            <a href="Inlogpagina.php">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Inlogpagina.php</span>
            </a>
            <span class="tooltip">Inlogpagina.php</span>

    </ul>
</div>

<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
    });
</script>
</body>
</html>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .sidebar{
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 78px;
        background: #11101D;
        padding: 6px 14px;
        z-index: 99;
        transition: all 0.5s ease;
    }
    .sidebar.open{
        width: 250px;
    }
    .sidebar .logo-details{
        height: 60px;
        display: flex;
        align-items: center;
        position: relative;
    }
    .sidebar .logo-details .icon{
        opacity: 0;
        height: 26px;
        margin-right: -3px;
        margin-left: 12px;
        transition: all 0.5s ease;
    }
    .sidebar .logo-details .logo_name{
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        opacity: 0;
        transition: all 0.5s ease;
    }
    .sidebar.open .logo-details .icon,
    .sidebar.open .logo-details .logo_name{
        opacity: 1;
        height: 26px;
        margin-right: -3px;
        margin-left: 12px;
    }
    .sidebar .logo-details #btn{
        position: absolute;
        top: 50%;
        right: 13px;
        transform: translateY(-50%);
        font-size: 22px;
        transition: all 0.4s ease;
        font-size: 23px;
        text-align: center;
        cursor: pointer;
        transition: all 0.5s ease;
    }
    .sidebar.open .logo-details #btn{
        text-align: center;
    }
    .sidebar i{
        /* zorgt er voor dat de icons er goed uit zien en op de goei plek staan */
        color: #fff;
        height: 60px;
        min-width: 50px;
        font-size: 28px;
        text-align: center;
        line-height: 60px;
    }
    .sidebar .nav-list{
        margin-top: 20px;
        height: 100%;
    }
    .sidebar li{
        /* zorgt er voor dat de tooltip op de goei plek zit */
        position: relative;
        margin: 8px 0;
        list-style: none;
    }
    .sidebar li .tooltip{
        /* dit is de style van de tooltip zelf */
        position: absolute;
        top: -20px;
        left: calc(100% + 15px);
        z-index: 3;
        background: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 15px;
        font-weight: 400;
        opacity: 0;
        white-space: nowrap;
        pointer-events: none;
        transition: 0s;
    }
    .sidebar li:hover .tooltip{
        opacity: 1;
        pointer-events: auto;
        transition: all 0.4s ease;
        top: 50%;
        transform: translateY(-50%);
    }
    .sidebar.open li .tooltip{
        /* zorgt er voor dat als je de navigatie bar open heb dan zie je de tooltips niet */
        display: none;
    }
    .sidebar input{
        font-size: 15px;
        color: #FFF;
        font-weight: 400;
        outline: none;
        height: 50px;
        width: 100%;
        width: 50px;
        border: none;
        border-radius: 12px;
        transition: all 0.5s ease;
        background: #1d1b31;
    }
    .sidebar.open input{
        padding: 0 20px 0 50px;
        width: 100%;
    }

    .sidebar li a{
        display: flex;
        height: 100%;
        width: 100%;
        border-radius: 12px;
        align-items: center;
        text-decoration: none;
        transition: all 0.4s ease;
        background: #11101D;
    }
    .sidebar li a:hover{
        /* verandert de achtergrond naar wit waar neer je er over heen hovered */
        background: #FFF;
    }
    .sidebar li a .links_name{
        color: #fff;
        font-size: 15px;
        font-weight: 400;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: 0.4s;
    }
    .sidebar.open li a .links_name{
        opacity: 1;
        pointer-events: auto;
    }

    .sidebar li a:hover .links_name,
    .sidebar li a:hover i{
        /* verandert de kleur van text en icon naar zwart waarneer je er over heen hovered */
        transition: all 0.5s ease;
        color: #11101D;
    }


    .sidebar li i{
        height: 50px;
        line-height: 50px;
        font-size: 18px;
        border-radius: 12px;
    }


    .sidebar li img{
        height: 45px;
        width: 45px;
        object-fit: cover;
        border-radius: 6px;
        margin-right: 10px;
    }


    @media (max-width: 420px) {
        .sidebar li .tooltip{
            display: none;
        }
    }
</Style>
<!-- de code hier boven is voor de navigatie bar -->

<div class="centered-link">
<a href="Rollen_toevoegen.php">Rollen pagina</a>
</div>


</div>

<div class="centered-link">
<a href="categorie_toevoegen.php">Categorie pagina</a>
</div>

</div>
</div>
<div class="centered-link">
<a href = "producten_toevoegen.php">producten pagina</a>
</div>



</div>

<div class="centered-link">
<a href = "levering_toevoegen.php">levering pagina</a>
</div>




    </div>
</div>

<div class="centered-link">
<a href = "leverancier_toevoegen.php">leverancier pagina</a>
</div>
<style>
.centered-link {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.centered-link:first-child {
    margin-top: 100px;
}

.centered-link a {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

</style>