<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
	require './app/models/' . $class_name . '.php';
});
$newModel = new NewsModel();
$newList = $newModel->getNews();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="./public/css/style.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row main-content">
					<div class="col-md-12">
						<div class="main-image">
							<img src="./public/img/lap-trinh-game-dua-xe-voi-pygame-63741703749.7302.jpg" alt="test" class="img-fluid">
						</div>
						<div class="blog-content">
							<h1>5 Dịch Vụ Điện Toán Đám Mây Hàng Đầu Hiện Nay</h1>
							<div class="content">
								<p style="text-align: justify;"><strong>Dịch vụ điện toán đám mây đang dẫn đầu xu hướng dịch vụ lưu trữ. Bài viết sau đây sẽ liệt kê cho các bạn 5 dịch vụ chất lượng nhất từ các nhà cung cấp hàng đầu hiện nay.</strong></p>
								<p style="text-align: justify;">Vậy trước hết, điện toán đám mây là gì?</p>
								<h3 style="text-align: justify;">Điện toán đám mây là gì?</h3>
								<p style="text-align: justify;"><b>Điện toán đám mây</b><span>&nbsp;(</span>tiếng Anh<span>:&nbsp;</span><i>cloud computing</i><span>), còn gọi là&nbsp;</span><b>điện toán máy chủ ảo</b><span>, là mô hình&nbsp;</span>điện toán<span>&nbsp;sử dụng các công nghệ&nbsp;</span>máy tính<span>&nbsp;và phát triển dựa vào mạng&nbsp;</span>Internet<span>. Thuật ngữ "đám mây" ở đây là lối nói ẩn dụ chỉ mạng&nbsp;</span>Internet<span>&nbsp;(dựa vào cách được bố trí của nó trong sơ đồ mạng máy tính) và như sự liên tưởng về độ phức tạp của các cơ sở hạ tầng chứa trong nó. </span></p>
								<p style="text-align: justify;"><span>Điện toán đám mây là việc phân phối các tài nguyên CNTT theo nhu cầu qua Internet với chính sách thanh toán theo mức sử dụng. Thay vì mua, sở hữu và bảo trì các trung tâm dữ liệu và máy chủ vật lý, bạn có thể tiếp cận các dịch vụ công nghệ, như năng lượng điện toán, lưu trữ và cơ sở dữ liệu, khi cần thiết, từ nhà cung cấp dịch vụ đám mây.</span></p>
								<p style="text-align: justify;"><span> <img width="600" height="480" alt="" src="/do_an_be1/public/img/cloud%201.jpg"> </span></p>
								<p style="text-align: justify;"><span>Điện toán đám mây là khái niệm tổng thể bao gồm cả các khái niệm như&nbsp;</span>phần mềm dịch vụ<span>,&nbsp;</span>Web 2.0<span>&nbsp;và các vấn đề khác xuất hiện gần đây, các xu hướng công nghệ nổi bật, trong đó đề tài chủ yếu của nó là vấn đề dựa vào Internet để đáp ứng những nhu cầu điện toán của người dùng. Ví dụ, dịch vụ&nbsp;</span>Google AppEngine<span>&nbsp;cung cấp những ứng dụng kinh doanh trực tuyến thông thường, có thể truy nhập từ một&nbsp;</span>trình duyệt web<span>, còn các&nbsp;</span>phần mềm<span>&nbsp;và&nbsp;</span>dữ liệu<span>&nbsp;đều được lưu trữ trên các máy chủ. (<strong>trích trong Wikipedia</strong>)</span></p>
								<h3 style="text-align: justify;"><span>Điện toán đám mây hoạt động ra sao?</span></h3>
								<p><span>Có ba loại điện toán đám mây chính bao gồm Cơ sở hạ tầng dưới dạng Dịch vụ (IaaS), Nền tảng dưới dạng Dịch vụ (PaaS) và Phần mềm dưới dạng Dịch vụ (SaaS).</span></p>
								<header class="entry-header animated ext-fadeInUp"></header>
								<p style="text-align: justify;">Điện toán đám mây (Cloud computing) có thể hiểu một cách đơn giản là: các nguồn điện toán khổng lồ như phần mềm, dịch vụ… sẽ nằm tại các máy chủ ảo (đám mây) trên Internet thay vì trong máy tính gia đình và văn phòng (trên mặt đất) để mọi người kết nối và sử dụng mỗi khi họ cần. Với các dịch vụ sẵn có trên Internet, doanh nghiệp không phải mua và duy trì hàng trăm, thậm chí hàng nghìn máy tính cũng như phần mềm. Họ chỉ cần tập trung sản xuất bởi đã có người khác lo cơ sở hạ tầng và công nghệ thay họ. Bạn có thể truy cập đến bất kỳ tài nguyên nào tồn tại trong “đám mây (cloud)” tại bất kỳ thời điểm nào và từ bất kỳ đâu thông qua hệ thống Internet.</p>
								<p style="text-align: justify;"><span></span>Ok, giờ chúng ta sẽ quay lại với chủ đề chính nhé.</p>
								<h3 style="text-align: justify;">5 dịch vụ điện toán đám mây hàng đầu hiện nay</h3>
								<h4 style="text-align: justify;">1. Microsoft (Hay còn gọi là MS Azure)</h4>
								<p style="text-align: justify;"><img width="1280" height="720" alt="" src="/do_an_be1/public/img/azure.jpg"> &nbsp;</p>
								<p style="text-align: justify;">Microsoft đã trở thành trung tâm của thế giới công nghệ trong nhiều năm nay. Mặc dù Microsoft bước vào cuộc chiến đám mây tương đối muộn, nhưng sự tham gia sâu sắc của nó vào tất cả các tầng của đám mây đã đẩy công ty lên đỉnh cao. Ngoài ra, cam kết vô song của nó là phát triển và hỗ trợ khách hàng triển khai Blockchain, Machine Learning (ML) và Trí tuệ nhân tạo (AI) trong môi trường sản xuất sáng tạo, cũng như doanh thu dẫn đầu thị trường, cho phép Microsoft giữ vị trí đứng đầu đống.<br>Microsoft đã tiếp tục cung cấp hiệu suất hoạt động mạnh mẽ kể từ khi Satya Nadella tiếp quản vị trí CEO vào năm 2014. Nền tảng Azure, dịch vụ đám mây công cộng của công ty, đã đóng một vai trò quan trọng trong việc thiết lập thương hiệu là người chơi số một trong không gian. Hoạt động kinh doanh của Microsoft được tổ chức tốt thành ba phân khúc: đám mây thông minh (bao gồm Windows Server OS, Azure và SQL Server), máy tính cá nhân (bao gồm Xbox, Surface, Quảng cáo tìm kiếm Bing và Windows Client) và các quy trình kinh doanh bao gồm Microsoft Office và Dynamics.</p>
								<h4 style="text-align: justify;">2. Amazon Web Service (Hay còn gọi là AWS)&nbsp;</h4>
								<p style="text-align: justify;">Amazon Inc. là con chim đầu tiên bắt sâu với Amazon Web Service (AWS) và đã tận dụng các doanh nghiệp lớn và nhỏ đang tìm cách chuyển hoạt động từ các trung tâm dữ liệu sang đám mây. Dịch vụ web của Amazon luôn có lợi ích từ một khởi đầu lớn trong thị trường điện toán đám mây. Hơn một thập kỷ trước và rất lâu trước khi sự cạnh tranh trong thế giới đám mây bắt đầu, AWS bắt đầu cung cấp các giải pháp cơ sở hạ tầng đám mây như lưu trữ và tính toán.<br>Rõ ràng, sự khởi đầu đó tiếp tục phục vụ họ tốt và giúp họ duy trì lợi thế thị phần lớn, bất chấp sự hiện diện của các thương hiệu khác trong không gian này bao gồm Microsoft và Google (và có, thậm chí cả Alibaba và Oracle). Sự tiến bộ đã tiếp tục không bị cản trở trong khi được hỗ trợ bởi những đổi mới nhất quán.</p>
								<p style="text-align: justify;"><img width="800" height="500" alt="" src="/do_an_be1/public/img/aws%201.jpg"></p>
								<h4 style="text-align: justify;">3. Google Cloud Platform (Hay còn gọi là GCP)</h4>
								<p style="text-align: justify;">Khi Alphabet ra mắt Google Cloud Platform, gã khổng lồ công nghệ đã chọn nhắm mục tiêu vào các doanh nghiệp vừa và nhỏ hơn là theo đuổi những người chơi đã thành lập, nhưng giờ đây tự hào về các khách hàng lớn như eBay, Snap và HSBC, mặc dù sau này cũng sử dụng Azure và AWS. Sau khi Google công bố thu nhập quý hai vào giữa năm nay, các nhà đầu tư hiện đang chú ý đáng kể đến tiến trình đã đạt được trong kinh doanh điện toán đám mây của công ty.<br>Mặc dù công ty đã bị Microsoft, IBM và Amazon khuất phục về thị phần, nền tảng Google Cloud gần đây đã thực hiện một số động thái để tăng toàn bộ không gian địa chỉ của mình và cung cấp một sự khác biệt tiềm năng từ các dịch vụ Cơ sở hạ tầng khác như Dịch vụ (IaaS). Điểm mấu chốt là Nền tảng đám mây của Google bị lôi kéo vào một trận chiến khốc liệt với các đối tác của nó, bao gồm AWS và Microsoft Azure.</p>
								<h4 style="text-align: justify;">4. Oracle</h4>
								<p style="text-align: justify;"><img width="747" height="392" alt="" src="/do_an_be1/public/img/oracle.png"></p>
								<p style="text-align: justify;">Oracle Corp, một nhà cung cấp phần mềm cơ sở dữ liệu hàng đầu, đã tiết lộ chương trình đầy tham vọng của mình trong lĩnh vực điện toán đám mây vào năm 2015. Công ty đã công bố kế hoạch của mình trong sự kiện Oracle OpenWorld để mở rộng danh mục đầu tư của mình trong các dịch vụ đám mây phân tích, ứng dụng đám mây, IaaS và dịch vụ tích hợp đám mây. Kể từ đó, Oracle đã không nhìn lại và phát triển với một tốc độ chưa từng thấy.<br>Oracle Corp đã tương đối muộn trong cuộc đua đám mây, cho phép những người mới nổi như Salesforce.com giành được thị phần đáng kể với phần mềm được phân phối qua internet và kết quả là đã gặp khó khăn. Tuy nhiên, bây giờ có vẻ như Oracle cuối cùng đã tìm ra bức tranh lớn hơn, đang ở chế độ đổi mới tích cực và là một sự đánh cược chắc chắn cho tương lai.</p>
								<h4 style="text-align: justify;">5. VMware Cloud</h4>
								<p style="text-align: justify;">Sau khi trở thành một công ty ảo hóa được thành lập, VMware bước vào không gian đám mây với nền tảng đám mây sáng tạo của mình, cho phép khách hàng cung cấp quyền truy cập an toàn vào dữ liệu và ứng dụng cho người dùng cuối của họ từ nhiều thiết bị. VMware gần đây đã hợp tác với AWS, tập đoàn điện toán đám mây khổng lồ trực tuyến, để cung cấp cho khách hàng một giải pháp tích hợp hơn.</p>
								<p style="text-align: justify;"><img width="650" height="400" alt="" src="/do_an_be1/public/img/vmware%20cloud.jpg"></p>
								<h3 style="text-align: justify;">Tạm kết</h3>
								<p style="text-align: justify;">Trên đây là 5 dịch vụ cloud tốt nhất mà mình đã sưu tầm và tham khảo để chia sẻ cho các bạn. Nếu thấy hay các bạn hãy Vote 5* cho blog của mình nhé :3 Nếu có gì khó thì các bạn cứ comment ở dưới, mình sẽ giải đáp</p>
								<p style="text-align: justify;">Một lần nữa, cảm ơn các bạn đã đọc.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>