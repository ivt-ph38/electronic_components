<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<style>
	@media only screen and (max-width: 600px) {
		.inner-body {
			width: 100% !important;
		}

		.footer {
			width: 100% !important;
		}
	}

	@media only screen and (max-width: 500px) {
		.button {
			width: 100% !important;
		}
	}
</style>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center">
			<table class="content" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="header" align="center">
						<img src="{{ asset('images/logo.png') }}" alt="{{ $webname }}">
					</td>

				</tr>
				<tr>
					<td class="header">
						<hr>
					</td>
				</tr>
				<!-- Email Body -->
				<tr>
					<td class="body" width="100%" cellpadding="0" cellspacing="0">
						<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
							<!-- Body content -->
							<tr>

								<td class="content-cell">
									<h4>Xin chào {{ $contactEmail->name}}</h4>
									<p>
										Cảm ơn bạn đã liên hệ đến chúng tôi, chúng tôi sẽ phản hồi ngay khi nhận được liên hệ
									</p>
									<hr>
									<h4>Nội dung liên hệ</h4>
									<table cellpadding="5" width="100%">
										<tbody>
											<tr>
												<td width="150">Tiêu Đề :</td>
												<td>{{ $contactEmail->title}}</td>
											</tr>
											<tr>
												<td width="150">Họ Tên :</td>
												<td>{{ $contactEmail->name}}</td>
											</tr>
											<tr>
												<td width="150">Email :</td>
												<td>{{ $contactEmail->email}}</td>
											</tr>
											<tr>
												<td width="150">Địa Chỉ :</td>
												<td>{{ $contactEmail->address}}</td>
											</tr>
											<tr>
												<td width="150">Số Điện Thoại :</td>
												<td>{{ $contactEmail->phone}}</td>
											</tr>
											<tr>
												<td colspan="2">Nội Dung :
													<br>
													<br>
													{{ $contactEmail->content}}
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td class="header">
						<hr>
					</td>
				</tr>
				<tr>
					<td>
						<table class="footer" align="center" width="570" cellpadding="0" cellspacing="0">
							<tr>
								<td class="content-cell" align="center">
									{{-- {!! $contact !!} --}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
