function startServer(){
    var ipaddress=$('#ipaddress').val();
    var port=$('#port').val();
    var formData = new FormData();
    formData.append('ipaddress', ipaddress);
    formData.append('port', port);
    console.log(port);
    if (!ipaddress){
        alert(" Vui lòng nhập IP ")
    }else if (!port){
        alert(" Vui lòng nhập PORT")
    }else {
        $.ajax({
            type: "POST",
            url: 'redirect.php?action=startServer',
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                $.get('startServer.php');
                console.log('ok');
            }
        });

        setInterval(readTextFile, 500);
    }
}
function stopServer(){

}
function readTextFile(file)
{
    var x = document.getElementById("autoScroll").checked; //if autoscrool is checked
    if(x==true){
        document.getElementById("textarea").scrollTop = document.getElementById("textarea").scrollHeight; //autoscroll
    }
    var filePath;
    $.ajax({
        url: 'getLatestFile.php',
        type: 'POST',
        data: {
            action: 'my_function'
        },
        success: function(data) {
            filePath = data;
            $.ajax({
                dataType: "text",
                success : function (data) {
                    $("#textarea").load(filePath);
                }
            });
        },
        error: function() {
            alert('Có lỗi xảy ra!');
        }
    });




}


function eraseText() {
    document.getElementById("textarea").value = "";
}

function showMatchingFiles() {
    var selectedDate = document.getElementById('selectedDate').value;
    var fileList = document.getElementById('fileList');

    // Tạo đối tượng Date từ ngày đã chọn
    var selectedDateTime = new Date(selectedDate);

    // Biến đổi ngày đã chọn thành định dạng Ymd_His
    var formattedDate = selectedDateTime.toISOString().replace(/[-:]/g, '').slice(0, 8);

    var formData = new FormData();
    formData.append('formattedDate', formattedDate);
    formData.append('action', 'my_function1');
    $.ajax({
        type: "POST",
        url: 'getLatestFile.php',
        data:formData,
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);

        }
    });

    console.log(formattedDate);

    // Lấy danh sách tất cả các tệp
    var allFiles = ['log_20220101_120000.log', 'log_20220102_080000.log', 'log_20220103_153000.log']; // Thay thế bằng danh sách tệp thực tế

    // Lọc và hiển thị các tệp phù hợp
    var matchingFiles = allFiles.filter(function (fileName) {
        return fileName.indexOf(formattedDate) !== -1;
    });

    fileList.innerHTML = ''; // Xóa danh sách hiện tại

    if (matchingFiles.length === 0) {
        fileList.innerHTML = '<li>Không có tệp nào phù hợp.</li>';
    } else {
        matchingFiles.forEach(function (fileName) {
            var listItem = document.createElement('li');
            listItem.textContent = fileName;
            fileList.appendChild(listItem);
        });
    }
}


