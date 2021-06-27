

<?php $page = 'home' ; ?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
  <div class="container-fluid">
    <div class="owl-banner owl-carousel">
      <?php foreach($allCate as $item){ ?>
      <div class="item">
        <img src="assets/images/<?=$item['IMAGE']?>" alt="">
        <div class="item-content">
          <div class="main-content">
            <div class="meta-category">
              <span><?=$item['NOIDUNG']?></span>
            </div>
            <a href="?controller=pages&action=allPost&idCate=<?=$item['ID']?>&page=1">
              <h4><?=$item['MOTA']?></h4>
            </a>
          </div>
        </div>
      </div>
      <?php } ?>
  </div>
</div>

<!-- Banner Ends Here -->
<section class="blog-posts">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <!-- Hiển thị các bài viết mới nhất -->
        <div class="all-blog-posts">
          <div class="row">
            <?php foreach($allPost as $item){ ?>
            <div class="col-lg-12">
              <div class="blog-post">
                <div class="blog-thumb">
                  <img src="<?=$item['IMG']?>" alt="">
                </div>
                <div class="down-content">
                  <?php foreach ($nameCate as $key2 => $item3) { ?>
                  <span><?=$item3['NOIDUNG']?></span>
                  <?php unset($nameCate[$key2]); break;?>
                  <?php } ?>
                  <a href="?controller=pages&action=postDetail&id=<?=$item['ID']?>">
                    <h4><?=$item['TIEUDE']?></h4>
                  </a>
                  <ul class="post-info">
                    <?php foreach ($user as $key => $item4) { ?>
                    <li><a href="#"><?=$item4['DISPLAYNAME']?></a></li>
                    <?php unset($user[$key]); break;?>
                    <?php } ?>
                    <li><a href="#"><?=$item['DAY']?></a></li>
                    <!-- <li><a href="#">12 Comments</a></li> -->
                  </ul>
                  <p><?=$item['NOIDUNG']?></p>
                  <div class="post-options">
                    <div class="row">
                      <div class="col-6">
                        <ul class="post-tags">
                          <li><i class="fa fa-tags"></i></li>
                          <li><a href="#">Beauty</a>,</li>
                          <li><a href="#">Nature</a></li>
                        </ul>
                      </div>
                      <div class="col-6">
                        <ul class="post-share">
                          <li><i class="fa fa-share-alt"></i></li>
                          <li><a href="#">Facebook</a>,</li>
                          <li><a href="#"> Twitter</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- <div class="col-lg-12">
              <div class="main-button">
                <a href="?controller=pages&action=allPost">Tất cả bài viết</a>
              </div>
            </div> -->
          </div>
        </div>
      </div>
      <?php include "views/layouts/sideBar.php" ?>
    </div>
  </div>
</section>