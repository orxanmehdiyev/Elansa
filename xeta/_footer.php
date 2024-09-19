
</div>


<!-- Placed at the end of the document so the pages load faster -->
<script src="../assets/js/jquery/jquery-3.3.1.min.js"></script>
<script src="../assets/js/vendors.min.js"></script>
<script>
  function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
          }
        </script>

        <script>
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
      </script>

    </body>

    </html>