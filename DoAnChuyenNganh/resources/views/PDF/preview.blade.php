<!-- preview.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Preview PDF</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <h1>Preview PDF</h1>
    <!-- Hiển thị PDF trong iframe -->
    <iframe src="{{ route('pdf-preview', 59) }}" id="pdf-iframe" width="100%" height="600px"></iframe>
    <!-- Button để kiểm tra việc in -->
    <button onclick="checkPrinting()">Kiểm tra in</button>
    <script>
        function checkPrinting() {
            var myWindow = window.open("{{ route('pdf-preview', 49) }}", "_blank");
            myWindow.onload = function() {
                setTimeout(function() {
                    if (!myWindow.window.print) {
                        // Nếu người dùng không chọn in, đóng cửa sổ PDF và thực hiện hành động khác
                        myWindow.close();
                        // Thực hiện logic tiếp theo ở đây
                    }
                }, 1000); // Đợi 1 giây sau khi mở cửa sổ để kiểm tra việc in
            };
        }
    </script>
</body>
</html>
