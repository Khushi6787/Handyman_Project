<?php include 'includes/header.php'; ?>

<!--main content start-->
<section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="card">
                  <header class="card-header">
                      Image Galley
                  </header>
                  <div class="card-body">
                      <ul class="grid cs-style-3">

                        <?php foreach($lpData as $LastPhoto) { ?>
                          <li>
                              <figure>
                                  <img src="<?= base_url().$LastPhoto['image'];?>" height="300" width="300" alt="LastPhoto">
                                  <figcaption>
                                      <a class="fancybox" rel="group" href="<?= base_url().$LastPhoto['image'];?>">Take a look</a>
                                  </figcaption>
                              </figure>
                          </li>
                          <?php } ?> 
                      </ul>

                  </div>
              </section>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->

<?php include 'includes/footer.php'; ?>