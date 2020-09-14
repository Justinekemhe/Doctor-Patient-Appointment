  </div>
  </div>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript">
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var elems = document.querySelectorAll('.modal');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery


  $(document).ready(function(){
    $('select').formSelect();
      });
  $(document).ready(function(){
    $('.modal').modal();
  });
   

   $(document).ready(function(){
    $('.sidenav').sidenav();
   })

   $(document).ready(function(){
   $(".dropdown-trigger").dropdown();

  })
    $('.slider').slider({
    full_width: false,
    interval:5000,
    transition:800,
  })

  $(document).ready(function() {
    $('select').material_select();
  });

  //this is a js function to load regions\ of a particular country

  </script>

  </body>
</html>