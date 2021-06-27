<style>
.collapse ul li a {
  font-size: 18px !important;
}

.navbar .navbar-nav .nav-link:hover,
.navbar .navbar-nav .active>.nav-link,
.navbar .navbar-nav .nav-link.active,
.navbar .navbar-nav .nav-link.show,
.navbar .navbar-nav .show>.nav-link {
  color: #06c !important;
}

.modal-header.text-center.bg-primary {
  background-color: #2a852c !important
}

.modal-title.w-100.font-weight-bold {
  color: #fff;
}

.btn-outline-primary {
  color: #2a852c;
  background-color: transparent;
  background-image: none;
  border-color: #2a852c;
}

.btn-outline-primary:hover {
  color: #fff !important;
  background-color: #2a852c;
  border-color: #2a852c;
}


a {
  color: #2a852c;
}
</style>

<header class="" style="position: sticky; top: 0">
  <nav class="navbar navbar-expand-lg">
    <div class="container d-flex">
      <a class="navbar-brand" href="?controller=pages&action=index">
        <!-- <h2>MBC News<em>.</em></h2> -->
        <img style="width: 10rem; margin-top: 14px"
          src="https://cdnweb.dantri.com.vn/bundle/static/assets/lg_dantri_dktop1.svg?v=0619080902" />
        <!-- <?php if (isset($_SESSION["userId"])) echo $_SESSION["userId"]; ?> -->
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li <?php if (isset($_GET["action"]) && $_GET["action"] == "") echo 'class="active"'; ?>>
            <a class="nav-link " href="?controller=pages&action=allPost&idCate=1&page=1">thể
              thao </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="?controller=pages&action=allPost&idCate=2&page=1">thế giới</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controller=pages&action=allPost&idCate=3&page=1">xã hội</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controller=pages&action=allPost&idCate=4&page=1">Kinh Doanh</a>
          </li>
          <?php
          if (isset($_SESSION['userId'])) {
          ?>
          <!--USER AND LOGOUT-->
          <li class="nav-item dropdown">
            <a style="color:#f48840;" class="nav-link dropdown-toggle hvr-underline-from-center" href="" id="navbardrop"
              data-toggle="dropdown">
              <b>Xin chào <?php echo $_SESSION['displayName']; ?></b>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="" data-toggle="modal" data-target="#editModal">Chỉnh sửa thông tin</a>
              <?php if ($_SESSION['type'] == '1' || $_SESSION['type'] == '1') { ?>
              <a class="dropdown-item" href="?controller=admin&action=index">Quản lý</a>
              <?php } ?>
              <a class="dropdown-item" href="?controller=users&action=logout">Đăng Xuất</a>
            </div>
          </li>
          <div class="modal fade" id="editModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header text-center bg-primary">
                  <h4 class="modal-title w-100 font-weight-bold">Chỉnh sửa thông tin</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body mx-3">
                  <form method="post" name="fEdit" id="fEdit" action="?controller=users&action=updateUser">

                    <div class="input-group form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                      </div>
                      <input name="txtEditUser" type="text" class="form-control"
                        value="<?php echo $_SESSION['userName']; ?>" readonly>

                    </div>
                    <div class="input-group form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                      </div>
                      <input name="txtEditDisplay" type="text" class="form-control"
                        value="<?php echo $_SESSION['displayName']; ?>">

                    </div>
                    <div class="input-group form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                      </div>
                      <input name="txtEditPhone" type="text" class="form-control"
                        value="<?php echo $_SESSION['phone']; ?>">
                    </div>
                    <div class="input-group form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-home"></i></span>
                      </div>
                      <input name="txtEditAddress" type="text" class="form-control"
                        value="<?php echo $_SESSION['diachi']; ?>">
                    </div>
                    <div class="input-group form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                      </div>
                      <input name="txtEditPass" type="password" class="form-control">

                    </div>

                    <div class="form-group text-center">
                      <input name="btnEdit" type="submit" value="Cập nhật" class="btn btn-outline-primary rounded-pill">
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php
          }
          ?>

          <?php
          if (!isset($_SESSION['userId'])) {
          ?>
          <!--LOGIN-->
          <li class="nav-item">
            <a style="color:#f48840;" class="nav-link cool-link hvr-underline-from-center" href="" data-toggle="modal"
              data-target="#loginModal">
              <i class="fa fa-sign-in"></i> <b>Đăng nhập</b> <span class="badge badge-danger rounded-circle"></span>
            </a>
            <div class="modal fade" id="loginModal">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                  <div class="modal-header text-center bg-primary">
                    <h4 class="modal-title w-100 font-weight-bold">Đăng nhập</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                    <form method="post" action="?controller=users&action=login" name="fa-cart">

                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input name="txtLoginUser" type="text" class="form-control" placeholder="Tên đăng nhập">

                      </div>
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input name="txtLoginPass" type="password" class="form-control" placeholder="Mật khẩu">
                      </div>
                      <div class="form-group text-center">
                        <input name="btnLogin" type="submit" value="Đăng nhập"
                          class="btn btn-outline-primary rounded-pill">
                      </div>

                    </form>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <div>
                      Không có tài khoản? Nhập vào đây để đăng kí! <a href="" data-toggle="modal" data-dismiss="modal"
                        data-target="#registerModal">Đăng kí</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <!--Register-->
          <li class="nav-item">
            <a style="color:#f48840;" class="nav-link cool-link hvr-underline-from-center" href="" data-toggle="modal"
              data-target="#registerModal">
              <i class="fa fa-user-plus"></i> <b>Đăng kí</b> <span class="badge badge-danger rounded-circle"></span>
            </a>
            <div class="modal fade" id="registerModal">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                  <div class="modal-header text-center bg-primary">
                    <h4 class="modal-title w-100 font-weight-bold">Đăng kí</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                    <form method="post" action="?controller=users&action=register" name="fRegister" id="fRegister">

                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input name="txtUser" type="text" class="form-control" placeholder="Tên đăng nhập">

                      </div>
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input name="txtDisplay" type="text" class="form-control" placeholder="Tên hiển thị">

                      </div>
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <input name="txtPhone" type="text" class="form-control" placeholder="Số điện thoại ">
                      </div>
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input name="txtEmail" type="text" class="form-control" placeholder="Email">

                      </div>
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-home"></i></span>
                        </div>
                        <input name="txtAddress" type="text" class="form-control" placeholder="Địa chỉ ">
                      </div>
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input name="txtPass" type="password" class="form-control" placeholder="Mật khẩu">
                      </div>
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input name="txtRePass" type="password" class="form-control" placeholder="Nhập lại mật khẩu">
                      </div>
                      <div class="form-group text-center">
                        <input name="btnRegister" type="submit" style="color: #2a852c;" value="Đăng ký"
                          class="btn btn-outline-primary rounded-pill">
                      </div>

                    </form>
                  </div>

                </div>
              </div>
            </div>
          </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>