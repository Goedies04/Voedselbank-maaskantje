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