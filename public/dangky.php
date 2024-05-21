<?php include("inc/top.php") ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Form Đăng Ký</h2>
            <form id="registrationForm" action="index.php?action=themdangky" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="txtemail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="txtemail" name="txtemail" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="txtpass" class="form-label">Mật Khẩu</label>
                    <input type="password" class="form-control" id="txtpass" name="txtpass" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="txthoten" class="form-label">Họ Tên</label>
                    <input type="text" class="form-control" id="txthoten" name="txthoten" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="txtsodienthoai" class="form-label">Số Điện Thoại</label>
                    <input type="number" class="form-control" id="txtsodienthoai" name="txtsodienthoai" required >
                </div>
                <div class="mb-3">
                    <label for="txtnamsinh" class="form-label">Năm Sinh</label>
                    <input type="text" class="form-control" id="txtnamsinh" name="txtnamsinh" required>
                </div>
                <div class="mb-3">
                    <label for="txtgioitinh" class="form-label">Giới Tính</label>
                    <select class="form-select" id="txtgioitinh" name="txtgioitinh" required>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="txtdiachi" class="form-label">Địa Chỉ</label>
                    <input type="text" class="form-control" id="txtdiachi" name="txtdiachi" required>
                </div>
                <div class="mb-3">
                    <label for="txthinhanh" class="form-label">Hình Ảnh</label>
                    <input type="file" class="form-control" id="txthinhanh" name="txthinhanh" >
                </div>
                <button id="submitBtn" type="submit" class="btn btn-primary w-100" disabled>Đăng Ký</button>
</br></br>
            </form>
        </div>
    </div>
</div>

<?php include("inc/bottom.php") ?>

<script>
    // Bắt sự kiện khi người dùng nhập dữ liệu
    document.getElementById("txtemail").addEventListener("input", function(event) {
        var email = this.value;
        var emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        var feedback = this.nextElementSibling;
        if (!emailValid) {
            feedback.textContent = "Email không hợp lệ";
            feedback.classList.add("invalid-feedback");
            this.classList.add("is-invalid");
        } else {
            feedback.textContent = "";
            feedback.classList.remove("invalid-feedback");
            this.classList.remove("is-invalid");
        }
        checkSubmitButton();
    });

    document.getElementById("txtpass").addEventListener("input", function(event) {
        var password = this.value;
        var passwordValid = /^(?=.*[!@#$%^&*])(?=.{5,})/.test(password);
        var feedback = this.nextElementSibling;
        if (!passwordValid) {
            feedback.textContent = "Mật khẩu phải có ít nhất 5 ký tự và chứa ít nhất một ký tự đặc biệt";
            feedback.classList.add("invalid-feedback");
            this.classList.add("is-invalid");
        } else {
            feedback.textContent = "";
            feedback.classList.remove("invalid-feedback");
            this.classList.remove("is-invalid");
        }
        checkSubmitButton();
    });

    document.getElementById("txthoten").addEventListener("input", function(event) {
        var name = this.value;
        var nameValid = !/\d/.test(name);
        var feedback = this.nextElementSibling;
        if (!nameValid) {
            feedback.textContent = "Tên không được chứa số";
            feedback.classList.add("invalid-feedback");
            this.classList.add("is-invalid");
        } else {
            feedback.textContent = "";
            feedback.classList.remove("invalid-feedback");
            this.classList.remove("is-invalid");
        }
        checkSubmitButton();
    });

    document.getElementById("txtsodienthoai").addEventListener("input", function(event) {
    var phone = this.value;
    var phoneValid = /^(0\d{9})$/.test(phone);
    var feedback = this.nextElementSibling;
    if (!phoneValid) {
        feedback.textContent = "Số điện thoại phải bắt đầu bằng số 0 và có đúng 10 số";
        feedback.classList.add("invalid-feedback");
        this.classList.add("is-invalid");
    } else {
        feedback.textContent = "";
        feedback.classList.remove("invalid-feedback");
        this.classList.remove("is-invalid");
    }
    checkSubmitButton();
});


    // Hàm kiểm tra điều kiện và kích hoạt hoặc vô hiệu hóa nút Đăng ký
    function checkSubmitButton() {
        var emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(document.getElementById("txtemail").value);
        var passwordValid = /^(?=.*[!@#$%^&*])(?=.{5,})/.test(document.getElementById("txtpass").value);
        var nameValid = !/\d/.test(document.getElementById("txthoten").value);
        var phoneValid = /^\d{10}$/.test(document.getElementById("txtsodienthoai").value);
        var submitButton = document.getElementById("submitBtn");
        if (emailValid && passwordValid && nameValid && phoneValid) {
            submitButton.removeAttribute("disabled");
        } else {
            submitButton.setAttribute("disabled", "disabled");
        }
    }
</script>


