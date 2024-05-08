<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">

	<title>Đăng kí vào Thas </title>

	<link href="../inc/css/app.css" rel="stylesheet">
	<script src="../inc/js/app.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h1">Đăng Nhập</h1>		
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-1">
									<form action="index.php" method="post">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="txtemail" placeholder="Nhập email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Họ Tên</label>
											<input class="form-control form-control-lg" type="text" name="txthoten" placeholder="Nhập họ tên" />
										</div>
										<div class="mb-3">
											<label class="form-label">Mật khẩu</label>
											<input class="form-control form-control-lg" type="text" name="txtmatkhau" placeholder="Nhập mật khẩu" />
										</div>
										<div class="mb-3">
											<label class="form-label">Số điện thoại</label>
											<input class="form-control form-control-lg" type="text" name="txtdienthoai" placeholder="Nhập số điện thoại" />
										</div>
										<div>
											<div>
												<div class="d-grid gap-2 my-3">
													<input type="hidden" name="action" value="xlthem">
													<input type="submit" class="btn btn-lg btn-success" value="Đăng Kí">
												</div>
									</form>
								</div>
							</div>
						</div>
						<!-- <div class="text-center mb-3">
							Chưa có tài khoản? <a href="index.php?action=dangki">Đăng ký</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</main>
</body>

</html>