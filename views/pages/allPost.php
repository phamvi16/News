<style>
.page-heading {
  background-image: url(../../../../cover-image.png) !important;
}
</style>
<div class="heading-page header-text">
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">
            <h4 style="color: #FFF">Các bài viết</h4>
            <?php foreach ($nameCate as $row2) { ?>
            <h2 style="color: #FFF"><?= $row2['NOIDUNG'] ?></h2>

            <?php $_SESSION['idcate'] = $row2['ID'] ?>
            <?php break; ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
$limit = 6;
$total_result = sizeof($post);
$total_pages = ceil($total_result / $limit);

$idCate = $_SESSION['idcate'];

if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
//echo $_SESSION['idcate'];
?>
<!-- Banner Ends Here -->

<section class="blog-posts grid-system">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            <?php foreach ($post as $row) { ?>
            <!-- <?php $tongsopost = sizeof($post);
                    $sotin1trang = 4;
                    $sotrang = ceil($tongsopost / $sotin1trang);
                    echo $sotrang;
                    ?> -->
            <div class="col-xs-12">
              <div class="blog-post">
                <div class="blog-thumb">
                  <img src="<?= $row['IMG'] ?>" alt="">
                </div>
                <div class="down-content">
                  <!-- <span>Lifestyle</span> -->
                  <a href="?controller=pages&action=postDetail&id=<?= $row['ID'] ?>">
                    <h4><?= $row['TIEUDE'] ?></h4>
                  </a>

                  <ul class="post-info">
                    <li><a href="#"><?= $row['DAY'] ?></a></li>
                    <li><a href="#">12 Comments</a></li>
                  </ul>
                  <p><?= $row['NOIDUNG'] ?></p>
                  <div class="post-options">
                    <div class="row">
                      <div class="col-lg-12">
                        <ul class="post-tags">
                          <li><i class="fa fa-tags"></i></li>
                          <li><a href="#">Best Templates</a>,</li>
                          <li><a href="#">TemplateMo</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <div class="col-xs-12">
              <div id="pagination"></div>

              <script>
              $(document).ready(function() {
                var paginationData = [];
                for (let index = 0; index < <?php echo ($total) ?>; index++) {
                  paginationData.push(index);
                }

                $('#pagination').pagination({
                  dataSource: paginationData,
                  pageNumber: <?= $page ?>,
                  pageSize: <?php echo ($pageSize) ?>,
                  showPrevious: true,
                  showNext: true,
                  callback: function(data, pagination) {
                    var pageNumber = pagination.pageNumber;
                    console.log(pageNumber);
                    if (pageNumber !== <?= $page ?>) {
                      window.location =
                        "?controller=pages&action=allPost&idCate=<?= $_SESSION['idcate'] ?>&page=" +
                        pageNumber + "&limit=6";
                    }
                  }
                });
              });
              </script>
            </div>

            <!-- <div class="col-lg-12">
              <ul class="page-numbers">
                <?php if ($page > 1) { ?>
                <li><a
                    href="?controller=pages&action=allPost&idCate=<?= $_SESSION['idcate'] ?>&page=<?= $page - 1 ?>">Pre</a>
                </li>
                <?php } ?>
                <li><a
                    href="?controller=pages&action=allPost&idCate=<?= $_SESSION['idcate'] ?>&page=<?= $page + 1 ?>">Next</a>
                </li>
              </ul>
            </div> -->
          </div>
        </div>
      </div>
      <?php include "views/layouts/sideBar.php" ?>
    </div>
  </div>
</section>