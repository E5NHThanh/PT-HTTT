<?php include("inc/top.php") ?>

<body>
	<main class="d-flex w-100 mb-5">
		<div class="container d-flex flex-column">
			<div class="row vh-80">
				<div class="col-sm-8 col-md-6 col-lg-7 col-xl-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mb-4">
						<img src="../images/login.jpg" alt="" height="100">
							<h1 class="text-secondary">Đăng Nhập</h1>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-1">
									<form method="post" action="index.php">
										<input class="form-control" type="email" name="txtemail" placeholder="Email" required><br>
										<input class="form-control" type="password" name="txtmatkhau" placeholder="Mật khẩu" required><br>

										<input type="hidden" name="action" value="xldangnhap">
										<div class="d-grid my-3">
											<input class="btn btn-info btn-block" type="submit" value="Đăng nhập">
										</div>
									</form>
									<a  href="index.php?action=dangky">Đăng ký ngay</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
<?php include("inc/bottom.php") ?>