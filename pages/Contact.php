<?php
if (isset($_POST['gui'])) {
    $name = $_POST['ten'];
    $email = $_POST['email'];
    $note = $_POST['note'];
    $sql = "INSERT INTO lienhe (ten, email, note) VALUES ('$name', '$email', '$note')";
    mysqli_query($conn, $sql);

    // echo "<script>alert('Bạn đã thêm thành công!');
    // </script>";
}
?>
<main id="main">
    <div class="contact-img">
        <div class="contact-in4">
            <div class="cnt-in4">
                <h3>Bạn cần hỗ trợ?</h3>
                <p style="color: #4b4b4b; margin-top: 10px; font-size: 15px;">
                    VIBESNEAK.vn rất hân hạnh được hỗ trợ bạn, hãy để lại
                    thông tin cho chúng tôi nhé. Yêu cầu của bạn sẽ được xử
                    lý và phản hồi trong thời gian sớm nhất.
                </p>
                <form action="" method="post" class="form-contact" name="frm" onsubmit="return thongbao(this)">
                    <div class="ct-in4-r1">
                        <div class="ct-in4-r1-l">
                            <label class="ct-name" for="">Họ Tên *</label><br />
                            <input type="text" placeholder="Nhập Họ Và Tên Đầy Đủ" name="ten" id="name" />
                        </div>
                        <div class="ct-in4-r1-r">
                            <label class="ct-name" for="">Email *</label><br />
                            <input type="email" placeholder="Địa Chỉ Email" name="email" id="email" />
                        </div>
                    </div>
                    <div class="ct-in4-r2">
                        <label class="ct-name">Tin Nhắn *</label>
                        <textarea rows="10" placeholder="Đừng Ngại Hỏi Về Đơn Hàng Của Bạn" name="note" id="message" class="input01"></textarea>
                        <input type="submit" name="gui" class="btn-cnt"></input>
                    </div>
                </form>
            </div>
        </div>
        <div class="imga">
            <img src="./images/bg_contact.webp" alt="" />
        </div>
    </div>
    <div class="contact-text">
        <div class="ct-t-l">
            <h2>VIBESNEAK - AUTHENTIC SNEAKERS VN</h2>
            <p>Địa chỉ: 131, Thái Thịnh, Đống Đa, Hà Nội</p>
        </div>
        <div class="ct-t-c"></div>
        <div class="ct-t-r">
            <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
            <p>Email: <a href="mailto:vibesneak@gmail.com">vibesneak@gmail.com</a></p>
            <p>CSKH: <a href="tel:0987654321">0987654321</a></p>
            <p>
                Instagram:
                <a href="https://www.instagram.com/vibesneak.vn/">https://www.instagram.com/vibesneak.vn/</a>
            </p>
            <p>Fanpage: VibeSneak Vietnam Authentic - VibeSneakVN</p>
            <p>Zalo: <a href="tel:0987654321">0987654321</a></p>
        </div>
    </div>
</main>


<script>
    function thongbao(frm) {
        if (frm.ten.value.trim() == '') {
            alert('Chưa nhập họ và tên');
            frm.ten.focus();
            return false;
        }
        if(frm.email.value.trim() == '') 
        {
            alert('Chưa nhập email');
            frm.email.focus();
            return false;
        }
        if(frm.note.value.trim() == '') 
        {
            alert('Chưa nhập tin nhắn');
            frm.note.focus();
            return false;
        }
        return true; // Cho phép form được gửi nếu tất cả các trường đều được nhập
    }
</script>