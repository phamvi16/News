<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="navbar-collapse collapse">
            <!-- ?controller=pages&action=home -->
            <!-- dây là để gọi controller + action -->
            <!-- sap ko làm đang k sửa cái page + load dữ liệu lên -->
            <nav class="navbar navbar-expand-sm bg-light">

                <ul class="nav navbar-nav">
                    <li <?php if (isset($_GET["action"]) && $_GET["action"]=="index") echo 'class="active"';?> >
                        <a href="">Trang Chủ</a>
                    </li>

                    <li <?php if (isset($_GET["action"]) && $_GET["action"]=="member") echo 'class="active"';?> > 
                        <a href="">Thành Viên</a>
                    </li>

                    <!-- <li>
                        <a href="?">Sản Phẩm</a>
                    </li> -->
                </ul>
            </nav>
            </div>  
        </div>
    </div>
</div> <!-- End mainmenu area -->