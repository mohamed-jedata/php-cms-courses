<div class=" page-footer" >

  <div class="container">

    <div class="row">

      <!-- Menus -->
      <div class="col-lg-6 col-md-12 col-sm-12">



        <h4 class="text-uppercase"> القوائم</h4>

        <ul>
          <?php

          $query = "SELECT `name`,`id` FROM `navbar_menu` WHERE `visible` = 1";
          $result = mysqli_query($conn, $query);

          if ($result && mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

              $query2 = "SELECT `id` FROM `pages` WHERE `menu_id` = " . $row['id'];
              $result2 = mysqli_query($conn, $query2);

              if ($result2 && mysqli_num_rows($result2) <= 0) {
                echo ' <li class="pt-2 pb-2">';
                echo '<a  href="' . $_SERVER["PHP_SELF"] . "?menu=" . $row['id'] . '">' . $row['name'] . '</a>';
                echo '</li>';
              }
            }
          }
          mysqli_free_result($result);
          ?>
        </ul>


      </div>

      <div class="col-lg-2 col-md-4 col-sm-4 pt-lg-2 pt-md-4 py-sm-4 pb-lg-0 p">
      <h4 class="py-lg-0 py-md-0 py-sm-0 py-xs-5"> تواصل معنا:</h4>
      </div>

      <!-- Socials -->
      <div class="col-lg-4 col-md-8 col-sm-8 py-lg-0 py-sm-3 col-sm-8">


        <!-- Facebook -->
        <a class="fb-ic" href="https:\\www.facebook.com" target="_blank">
          <i class="fab mr-md-5 mr-3  fa-3x fa-facebook"></i>
        </a>
        
             <!-- Linkden +-->
             <a class="lk-ic" href="https://www.linkedin.com/in/mohamed-jedata-582882195/" target="_blank">
          <i class="fab mr-md-5 mr-3 fa-3x fa-linkedin"></i>
        </a>
        <!-- Github -->
        <a class="gt-ic" href="https://github.com/mohamed-jedata" target="_blank">
          <i class="fab  mr-md-5 mr-3 fa-3x fa-github"></i>
        </a>



      </div>




    </div>

  </div>









  <!-- <hr class=" w-100 d-md-none pb-3"> -->








  <div class="footer-copyright text-center py-3">
    <a href="index.php"> موقع كوروس</a>
    © جميع الحقوق محفوظة

  </div>
  <!-- Copyright -->

</div>
</footer>
<!-- Footer -->

</div>


<?php

if (isset($conn)) {
  mysqli_close($conn);
}

?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->


<script src="https://kit.fontawesome.com/236d5d4ef0.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->

<script src="../includes/layout/js/scripts.js"></script>

</body>

</html>