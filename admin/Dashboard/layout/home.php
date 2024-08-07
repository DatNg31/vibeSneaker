<ul class="breadcrumb" style="display: flex;
     align-items: center;
     grid-gap: 16px;
     margin: 20px 30px;">
     <li>
          <a href="index.php?action=sanpham" style="color: var(--dark-grey);">Dashboard</a>
     </li>
     <li><i class='bx bx-chevron-right'></i></li>
     <li>
          <a class="active" href="" style="pointer-events: none;
color: var(--blue);">Trang chủ</a>
     </li>
</ul>
<div style="width: 90%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
     <div class="head">
          <h2>Các đơn hàng cần xử lý</h2>
     </div>
     <table>
          <tr>
               <th>ID</th>
               <th>Tên người nhận</th>
               <th>Địa Chỉ</th>
               <th>Điện thoại</th>
               <th>Ngày tạo</th>
          </tr>

          <?php
          $products_per_page = 10;
          $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
          $start_index = ($current_page - 1) * $products_per_page;

          $sql = "SELECT * FROM donhang LIMIT $start_index, $products_per_page";


          $result = mysqli_query($conn, $sql);
          if ($result && mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_donhang'];
                    $ten = $row['ten'];
                    $sdt = $row['sodienthoai'];
                    $diachi = $row['diachi'];
                    $ngaydat = $row['ngaydat'];
                    $tongtien = number_format($row['tongtien'], 0, ',', '.');
                    $trangthai = $row['trangthai'];
          ?>
                    <tr>
                         <td><?php echo $id; ?></td>
                         <td><?php echo $ten; ?></td>
                         <td><?php echo $diachi; ?></td>
                         <td><?php echo $sdt; ?></td>
                         <td><?php echo $ngaydat; ?></td>
                    </tr>
          <?php
               }
          } else {
               echo "<tr><td colspan='7'>Chưa có đơn hàng nào</td></tr>";
          }
          ?>
     </table>
     <div class="pagination">
          <?php
          $sql_count = "SELECT COUNT(*) AS total FROM donhang";
          $result_count = mysqli_query($conn, $sql_count);
          $row_count = mysqli_fetch_assoc($result_count);
          $total_pages = ceil($row_count['total'] / $products_per_page);
          $query_params = $_GET;
          $current_query = http_build_query($query_params);
          // First page
          if ($current_page > 3) {
               $query_params['page'] = 1; // Chuyển trang về trang 1
               echo "<a href='index.php?" . http_build_query($query_params) . "'>First</a>";
          }
          // Previous page
          if ($current_page > 1) {
               $query_params['page'] = $current_page - 1;
               echo "<a href='index.php?" . http_build_query($query_params) . "'>Prev</a>";
          }
          // Các trang gần trang hiện tại
          for ($i = 1; $i <= $total_pages; $i++) {
               if ($i >= $current_page - 2 && $i <= $current_page + 2) {
                    $query_params['page'] = $i;
                    if ($i == $current_page) {
                         echo "<strong class = 'hover-page'>$i</strong> "; // Trang hiện tại
                    } else {
                         echo "<a href='index.php?" . http_build_query($query_params) . "'>$i</a>";
                    }
               }
          }
          // Next page
          if ($current_page < $total_pages) {
               $query_params['page'] = $current_page + 1;
               echo "<a href='index.php?" . http_build_query($query_params) . "'>Next</a>";
          }
          // Last page
          if ($current_page < $total_pages - 3) {
               $query_params['page'] = $total_pages;
               echo "<a href='index.php?" . http_build_query($query_params) . "'>Last</a>";
          }
          ?>
     </div>
</div>