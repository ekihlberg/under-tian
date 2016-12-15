
   <footer>
     <div class="main-footer">
       <div class="content">
         <img src="http://localhost:8888/wpinstall/wp-content/uploads/2016/10/undertian-logo-footer.png" alt="logotype" class="logo">
         <?php wp_nav_menu(array(
             'theme_location' => 'secondary',
             'container' => 'nav',
             'container_class' => 'menu',
           ));
          ?>
       </div>
     </div>
     <div class="credit-footer">
       <div class="content">
         <p class="designed">Designed and devoloped with <span>♥</span> by <a href="http://ekihlberg.se/" target="_blank">ekihlberg</a></p>
         <p class="copyright">© Copyright Portionen Under Tian 2016. All Rights Reserved </p>
        </div>
     </div>
   </footer>

  <?php wp_footer(); ?>
  </body>
</html>
