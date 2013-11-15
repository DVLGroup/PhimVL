<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
		<script>
			var fileName;
			function _(el) {
				return document.getElementById(el);
			}

			function changeFile() {
				var file = _("file1").files[0];

				if (file.type != "video/x-flv" && file.type != "video/mp4") {
					alert("Không Phải Định Dạng Cho Phép!");
					_("file1").value = null;
				}
			}

			function uploadFile() {
				var file = _("file1").files[0];

				if (file != null) {
					var formdata = new FormData();
					formdata.append("file1", file);
					var ajax = new XMLHttpRequest();
					ajax.upload.addEventListener("progress", progressHandler, false);
					ajax.addEventListener("load", completeHandler, false);
					ajax.addEventListener("error", errorHandler, false);
					ajax.addEventListener("abort", abortHandler, false);
					ajax.open("POST", "file_upload_parser.php");
					ajax.send(formdata);
				}

			}

			function progressHandler(event) {
				_("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
				var percent = (event.loaded / event.total) * 100;
				$("#uploadButton").attr("disabled", "disabeled");
				$("#file1").attr("disabled", "disabeled");
				_("progressBar").value = Math.round(percent);
				_("status").innerHTML = Math.round(percent) + "% uploaded... please wait";

			}

			function completeHandler(event) {
				fileName = event.target.responseText;
				if (fileName == "Không") {
					_("status").innerHTML = "Upload " + event.target.responseText + " Thành Công";

				}

				else if (fileName == "Có Rồi") {
					_("status").innerHTML = "File Upload Đã " + event.target.responseText + " Upload Không Thành Công";
				} else {
					$("#cancelButton").attr("disabled", "disabeled");
					_("link").value = fileName;
					_("status").innerHTML = "Upload " + event.target.responseText + " Thành Công";
					$("#upload_form").submit();
				}

				_("progressBar").value = 100;
			}

			function errorHandler(event) {
				_("status").innerHTML = "Upload Failed";
			}

			function abortHandler(event) {
				_("status").innerHTML = "Upload Aborted";
			}
		</script>
		<?php
		require '../include/headPage.php';
		?>
	</head>
	<body>
		<h1 class="text-center text-danger">Upload Phim Bộ</h1>
		<div class="container well">
			<form class="form-horizontal" id="upload_form" action="../addEditDelete/addCTFilmBo.php" enctype="multipart/form-data" method="post">
				<div class="form-group">
					<label class="control-label col-md-2">Upload Phim</label>
					<div class="col-md-8">
						<input accept="video/*" onchange="changeFile()" class="form-control required" type="file" name="file1" id="file1">
						<h4 class="text-danger"><strong>KHÔNG</strong> Chọn File Upload Có Unicode</h4>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-offset-2 col-md-8">
						<progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
						<h3 class="text-success" id="status"></h3>
						<p class="text-info" id="loaded_n_total"></p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Link Phim</label>
					<div class="col-md-8">
						<input type="text" readonly="readonly" id="link" name="cTFilmBoLink" class="form-control required" value="" placeholder="Bạn Phải Upload Để Lưu Link Phim"  />
					</div>
					<div class="col-md-offset-2"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2"></label>
					<div class="col-md-8">
						<input type="button" id="uploadButton" class="btn btn-primary" value="Bắt Đầu Upload" onclick="uploadFile()">
						<a id="cancelButton" class="btn btn-info" href="../index-admin.php?changePage=9&filmBoID=<?php echo($_POST['cTFilmBoID']); ?>">Hủy</a>
					</div>
				</div>
				<input type="hidden" name="cTFilmBoID" value="<?php echo($_POST['cTFilmBoID']); ?>" />
				<input type="hidden" name="cTFilmBoTap" value="<?php echo($_POST['cTFilmBoTap']); ?>" />
			</form>
		</div>
	</body>
</html>