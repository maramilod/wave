<header class="header">

   <section class="flex">
<a href="" class="logo">
      <img src="../img/sea.png" alt="">
      
         <h1>WAVE</h1>
      </a>

      <nav class="navbar">
         <a href="../index/index.php#offers" class="far fa-eye"></a>
         <a href="../header/login.php" class="fas fa-arrow-right-to-bracket"></a>
         <a href="../header/register.php" class="far fa-registered"></a>
         <?php
         if ($user_id != '') {
         ?>
            <div id="user-btn" class="far fa-user"></div>
         <?php }; ?>
      </nav>

      <?php
      if ($user_id != '') {
      ?>
         <div class="profile">
            <?php
            $select_profile = $con->prepare("SELECT * FROM `clients` WHERE id = ? LIMIT 1");
            $select_profile->execute([$user_id]);
            if ($select_profile->rowCount() > 0) {
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
               <?php if ($fetch_profile['image'] != '') { ?>
                  <img src="../images/<?= $fetch_profile['image']; ?>" alt="" class="image">
               <?php }; ?>
               <p><?= $fetch_profile['name']; ?></p>
               <a href="../header/update.php" class="btn">update profile</a>
               <a href="../components/logout.php" class="delete-btn" onclick="return confirm('logout from this website?');">logout</a>
            <?php } else { ?>
               <div class="flex-btn">
                  <p>please login or register!</p>
                  <a href="../header/login.php" class="inline-option-btn">login</a>
                  <a href="../header/register.php" class="inline-option-btn">register</a>
               </div>
            <?php }; ?>
         </div>
      <?php }; ?>

   </section>

</header>