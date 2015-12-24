var sidebar = document.getElementById("sidebar");
var mainContent = document.getElementById("main-content");
var controlBar = document.getElementById("control-bar");

function toggleSidebar() {
     if (sidebar.style.display) {
          sidebar.style.display = ""; // restoring element to original state
          mainContent.style.width = "69%"; // restoring element to original state
     } else {
          sidebar.style.display = "none";
          mainContent.style.width = "100%"; //(padding-left is ‘illegal’ in JS - so use paddingLeft)
     }
}

// controlBar.addEventListener( "click", toggleSidebar);
controlBar.addEventListener( "click", toggleSidebar);

//controlBar.addEventListener( "click", function(evt){ alert("hiya!")});