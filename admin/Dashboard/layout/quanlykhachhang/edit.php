<ul class="breadcrumb" style="display: flex; align-items: center; gap: 16px; margin: 20px 30px;">
     <li>
          <a href="index.php?action=sanpham" style="color: var(--dark-grey);">Dashboard</a>
     </li>
     <li><i class='bx bx-chevron-right'></i></li>
     <li>
          <span style="color: var(--blue);">Khách hàng</span>
     </li>
</ul>

<div style="width: 90%; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
     <div class="head">
          <h2>Quản lý khách hàng</h2>
     </div>

     <table style="width: 100%; border-collapse: collapse;">
          <thead>
               <tr>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
               </tr>
          </thead>
          <tbody>
               <?php
               // Add pagination logic
               $products_per_page = 10; // Define the number of items per page
               $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
               $offset = ($current_page - 1) * $products_per_page;

               // Fetch paginated data
               $sql = "SELECT ten, email, diachi, sodienthoai FROM nguoidung LIMIT $offset, $products_per_page";
               $result = mysqli_query($conn, $sql);

               if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                         $ten = htmlspecialchars($row['ten'], ENT_QUOTES, 'UTF-8');
                         $email = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
                         $diachi = htmlspecialchars($row['diachi'], ENT_QUOTES, 'UTF-8');
                         $sodienthoai = htmlspecialchars($row['sodienthoai'], ENT_QUOTES, 'UTF-8');
               ?>
                         <tr>
                              <td><?php echo $ten; ?></td>
                              <td><?php echo $email; ?></td>
                              <td><?php echo $diachi; ?></td>
                              <td><?php echo $sodienthoai; ?></td>    
                         </tr>
                    <?php
                    }
               } else {
                    ?>
                    <tr>
                         <td colspan="4" style="text-align: center;">Không có khách hàng nào</td>
                    </tr>
               <?php
               }

               // Pagination logic
               $sql_count = "SELECT COUNT(*) AS total FROM nguoidung";
               $result_count = mysqli_query($conn, $sql_count);
               $row_count = mysqli_fetch_assoc($result_count);
               $total_pages = ceil($row_count['total'] / $products_per_page);

               $query_params = $_GET; // Keep the current query parameters for pagination
               ?>
          </tbody>
     </table>

     <div class="pagination" style="text-align: center; padding: 10px;">
          <?php
          // First page link
          if ($current_page > 3) {
               $query_params['page'] = 1;
               echo "<a href='index.php?" . http_build_query($query_params) . "'>First</a> ";
          }

          // Previous page link
          if ($current_page > 1) {
               $query_params['page'] = $current_page - 1;
               echo "<a href='index.php?" . http_build_query($query_params) . "'>Prev</a> ";
          }

          // Page number links around the current page
          for ($i = 1; $i <= $total_pages; $i++) {
               if ($i >= $current_page - 2 && $i <= $current_page + 2) {
                    $query_params['page'] = $i;
                    if ($i == $current_page) {
                         echo "<strong class = 'hover-page'>$i</strong> ";
                    } else {
                         echo "<a href='index.php?" . http_build_query($query_params) . "'>$i</a> ";
                    }
               }
          }

          // Next page link
          if ($current_page < $total_pages) {
               $query_params['page'] = $current_page + 1;
               echo "<a href='index.php?" . http_build_query($query_params) . "'>Next</a> ";
          }

          // Last page link
          if ($current_page < $total_pages - 3) {
               $query_params['page'] = $total_pages;
               echo "<a href='index.php?" . http_build_query($query_params) . "'>Last</a> ";
          }
          ?>
     </div>
</div>