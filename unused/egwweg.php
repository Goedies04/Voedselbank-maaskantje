<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- verbind met een plugging die we hebben om de icons goed te krijgen -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<!-- Navigationbar -->
<div class="sidebar">
    <div class="logo-details">
        <img class='icon' src="navigationimg/VBN_logo-150x150.png" ></img>
        <div class="logo_name">Maaskantje</div>
        <img id="btn" src="navigationimg/menu-regular-24.png" alt="">
    </div>
    <ul class="nav-list">
        <li>
            <a href="#">
                <i class='bx bx-home-alt-2'></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-user' ></i>
                <span class="links_name">Gebruikers</span>
            </a>
            <span class="tooltip">Gebruikers</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-package'></i>
                <span class="links_name">Inventaris</span>
            </a>
            <span class="tooltip">Inventaris</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-baguette' ></i>
                <span class="links_name">Voedselpaket</span>
            </a>
            <span class="tooltip">Voedselpaket</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Beheer</span>
            </a>
            <span class="tooltip">Beheer</span>

    </ul>
</div>
<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();//calling the function(optional)
    });
</script>

<!-- Navigation Links -->
<div class="flexbuttons">

    <button class="popup" onclick="extend()">Producten ⬇️</button>

    <!-- Button content -->
    <div id="submit">
        <h2>Submit Section</h2>
        <p>This is the extended content that you want to display.</p>
        <button onclick="unextend()">⬆️</button>
    </div>

    <button class="popup2" onclick="extend2()">Gebruikers ⬇️</button>

    <!-- Button content -->
    <div id="submit2">
        <h2>Submit Section2</h2>
        <p>This is the extended content that you want to display2.</p>
        <button onclick="unextend2()">⬆️</button>
    </div>
</div>

<!-- Content Sections -->
<div id="submit">
    <h2>Submit Section</h2>
    <p>This is the extended content that you want to display.</p>
    <button onclick="unextend()">⬆️</button>
</div>

<div id="submit2">
    <h2>Submit Section2</h2>
    <p>This is the extended content that you want to display2.</p>
    <button onclick="unextend2()">⬆️</button>
</div>

<script>

    // Extend funtions //

    function extend() {
        var extendedContent = document.getElementById("submit");
        var unextendedContent = document.getElementById("unextendedContent");

        // Show extended content //
        extendedContent.style.display = "block";

        // Hide unextended content //
        unextendedContent.style.display = "none";
    }

    function extend2() {
        var extendedContent = document.getElementById("submit2");
        var unextendedContent = document.getElementById("unextendedContent");

        // Show extended content //
        extendedContent.style.display = "block";

        // Hide unextended content //
        unextendedContent.style.display = "none";
    }

    // Unextend funtions //

    function unextend() {
        var extendedContent = document.getElementById("submit");
        var unextendedContent = document.getElementById("unextendedContent");

        // Hide extended content //
        extendedContent.style.display = "none";

        // Show unextended content //
        unextendedContent.style.display = "block";
    }

    function unextend2() {
        var extendedContent = document.getElementById("submit2");
        var unextendedContent = document.getElementById("unextendedContent");

        // Hide extended content
        extendedContent.style.display = "none";

        // Show unextended content
        unextendedContent.style.display = "block";
    }
</script>
</body>
</html>

<style>
    /* Navigationbar*/

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
        text-align: ce;
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

    /* Style to make the content visually appealing */
    #submit, #submit2{
        display: none;
        margin: 20px;
        margin-left: 100px;
        padding: 20px;
        border: 1px solid #ccc;
    }

    #submit button, #submit2 button {
        padding: 0px 5px 0px 5px;
    }

    .flexbuttons {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .popup, .popup2 {
        margin-top: 27px;
        margin-left: 100px;
        padding: 0px 10px 0px 10px;
    }
</style>
