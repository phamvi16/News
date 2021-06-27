<h1 class="h3 mb-2 text-gray-800">Quản lý bài viết</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Danh sách bài viết</h6>
  </div>
  <div class="card-body">
    <form method="post" action="">
      <div class="row">
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <td>ID</th>
              <th>Tiêu đề</th>
              <!-- <th>Rating</th> -->

              <th>Xoá</th>
            </tr>
          </thead>
          <!-- <tfoot>
                    <tr>
                      <td>ID</th>  
                      <th>Tiêu đề</th>
                     <th>Rating</th> -->

          <!-- <th>Xoá</th>
          </tr>
          </tfoot>  -->
          <tbody>
            <?php
            foreach ($allPost as $item) {
              echo "<tr>";
              echo "<td>{$item['ID']}</td>";

              echo "<td>{$item['TIEUDE']}</td>";
              // echo "<td>{$item->Rating}</td>";

              echo "<td><a class='btn btn-outline-primary' href='?controller=admin&action=deletePost&id={$item['ID']}'>Xóa</a></td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </form>
  </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>