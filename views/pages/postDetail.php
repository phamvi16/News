<?php require_once('crawler/modules.php'); ?>
<?php require_once('crawler/simple_html_dom.php'); ?>

<style>
.page-heading {
  background-image: url(../../../../cover-image.png) !important;

  /* background-color: #5c9953; */
}

/* .cover-img::after {
  content: 'CONTENT';
  margin-top: -100px;
} */
.btn-primary {
  background-color: #1a7900;
  border-color: #1a7900;
}

.btn-primary:hover {
  background-color: #186b03;
  border-color: #186b03
}
</style>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text cover-img">
  <div class="text-content">
  </div>
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">
            <h4 style="color: #fff">Bài viết</h4>
            <!-- <h2><?= $item['TIEUDE'] ?></h2> -->

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Banner Ends Here -->

<section class="blog-posts grid-system">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            <?php foreach ($post as $item) { ?>
            <div class="col-lg-12">
              <div class="blog-post">
                <div class="blog-thumb">
                  <img src="<?= $item['IMG'] ?>" alt="">
                </div>
                <div class="down-content">
                  <?php foreach ($nameCate as $key => $item2) { ?>


                  <?php unset($nameCate[$key]);
                      break; ?>
                  <?php } ?>
                  <!-- <a href="../index/index.php?controller=pages&action=postDetail&id=71"> -->
                  <h4><?= $item['TIEUDE'] ?></h4>
                  <span><?= $item['NOIDUNG'] ?></span>
                  <!-- </a> -->
                  <ul class="post-info">
                    <li><a href="#"><?= $item['DAY'] ?></a></li>
                  </ul>

                  <?php
                    $url = $item['HREF'];
                    $content = get_content($url);
                    echo $content;
                    ?>
                  <div class="post-options">
                    <div class="row">
                      <div class="col-6">
                        <ul class="post-tags">
                          <li><i class="fa fa-tags"></i></li>
                          <li><a href="#">Best Templates</a>,</li>
                          <li><a href="#">TemplateMo</a></li>
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
            <!-- Tải Bình Luận -->
            <div class="col-lg-12">
              <div class="sidebar-item comments">
                <div class="sidebar-heading">
                  <h2>bình luận</h2>
                </div>
                <?php foreach ($cmt as $itemcmt) { ?>
                <div class="content">
                  <ul>
                    <li>
                      <div class="author-thumb">
                        <img
                          src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Breezeicons-actions-22-im-user.svg/1200px-Breezeicons-actions-22-im-user.svg.png"
                          alt="">
                      </div>
                      <div class="right-content">
                        <?php foreach ($nameCmt as $key => $item5) { ?>
                        <h4><?= $item5['DISPLAYNAME'] ?></h4>
                        <?php unset($nameCmt[$key]);
                            break; ?>
                        <?php } ?>
                        <p><?= $itemcmt['NOIDUNG'] ?></p>
                        <?php
                          if (isset($_SESSION['userId'])) {
                            if ($_SESSION['userId'] == $itemcmt['IDUSER']) {
                          ?>
                        <a class='btn btn-outline-primary'
                          href='?controller=pages&action=deleteCmt&id=<?= $itemcmt['ID'] ?>&idpost=<?= $_GET['id']; ?>'>Xóa</a>
                        <?php
                            }
                          }
                          ?>
                      </div>
                    </li>
                  </ul>
                  <div style="padding-top: 30px"></div>
                </div>
                <?php } ?>
              </div>
            </div>
            <!-- Bình Luận -->
            <?php
            if (isset($_SESSION['userId'])) {
            ?>

            <div class="col-lg-7">
              <form class="user" method="post" action="?controller=pages&action=addCmt&id=<?= $_GET['id']; ?>"
                enctype="multipart/form-data">
                <div class="form-group row">
                  <textarea id="exampleAmountProduct" name="txtCmt" class="form-control" placeholder="Nội Dung"
                    style="height:50px"></textarea>
                </div>

                <input name="btnAddCmt" class="btn btn-primary btn-user btn-block" value="Bình luận" type="submit">
                <hr>

              </form>
            </div>

            <?php
            } else {
            ?>

            <div class="col-lg-7">
              <form class="user" method="post" action="?controller=pages&action=addCmt&id=<?= $post[0]['ID'] ?>"
                enctype="multipart/form-data">
                <div class="form-group row">
                  <textarea id="exampleAmountProduct" name="txtBlockCmt" class="form-control" placeholder="Nội Dung"
                    style="height:50px" readonly>HÃY ĐĂNG NHẬP ĐỂ BÌNH LUẬN</textarea>
                </div>
                <hr>

              </form>
            </div>

            <?php
            }
            ?>
          </div>
        </div>
      </div>
      <?php include "views/layouts/sideBar.php" ?>
      <!-- <div class="col-lg-4">
        <div class="sidebar">
          <div class="row">
            <div class="col-lg-12">
              <div class="sidebar-item categories">
                <div class="sidebar-heading">
                  <h2>Danh mục bài viết</h2>
                </div>
                <div class="content">
                  <ul>
                    <li><a href="#">Phong cách sống</a></li>
                    <li><a href="#">Thời Trang</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="sidebar-item submit-comment">
                <div class="sidebar-heading">
                  <h2>Bình luận của bạn</h2>
                </div>
                <div class="content">
                  <form id="comment" action="#" method="post">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="name" type="text" id="name" placeholder="Họ tên" required="">
                        </fieldset>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="email" type="text" id="email" placeholder="Email" required="">
                        </fieldset>
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <fieldset>
                          <input name="subject" type="text" id="subject" placeholder="Tiêu đề">
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="message" rows="6" id="message" placeholder="Điền bình luận của bạn" required=""></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="main-button">Gửi</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</section>