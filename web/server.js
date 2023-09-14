var intervalId;
function startServer(){
    var ipaddress=$('#ipaddress').val();
    var port=$('#port').val();
    var formData = new FormData();
    formData.append('ipaddress', ipaddress);
    formData.append('port', port);
    console.log(port);
    if (!ipaddress){
        alert(" Vui lòng nhập IP ");
    }else if (!port){
        alert(" Vui lòng nhập PORT");
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

        intervalId = setInterval(readTextFile, 1000);
    }
}
function stopServer(){
    var ipaddress=$('#ipaddress').val();
    var port=$('#port').val();
    var formData = new FormData();
    formData.append('ipaddress', ipaddress);
    formData.append('port', port);
    console.log(port);
    if (!ipaddress){
        alert(" Vui lòng nhập IP ");
    }else if (!port){
        alert(" Vui lòng nhập PORT");
    }else {
        $.ajax({
            type: "POST",
            url: 'redirect?action=stopServer',
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
            }
        });
    }
}
function readTextFile(url)
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
            action: 'getLatestFile'
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
    formData.append('action', 'getFile');
    $.ajax({
        type: "POST",
        url: 'getLatestFile.php',
        data:formData,
        processData: false,
        contentType: false,
        success: function (data) {

            var data = JSON.parse(data);
            populateFileList(data);

        }
    });

}


document.getElementById('openPopup').addEventListener('click', function () {
    document.getElementById('filePopup').style.display = 'block';
    showMatchingFiles();
});

// Thêm sự kiện để tắt popup khi người dùng ấn ra ngoài
document.addEventListener('click', function (event) {
    const filePopup = document.getElementById('filePopup');
    if (!filePopup.contains(event.target) && event.target !== document.getElementById('openPopup')) {
        filePopup.style.display = 'none';
    }
});

function populateFileList(data) {
    const fileList = document.getElementById('fileList');

    fileList.innerHTML = '';

    data.forEach(function (fileName) {
        const fileType = fileName.split('.').pop();
        const li = document.createElement('li');
        li.textContent = fileName;

        li.addEventListener('click', function () {
            // displayFileContent(fileName, fileType);
            filePath = 'logs/'+fileName;
            $.ajax({
                dataType: "text",
                success : function (data) {
                    $("#textarea").load(filePath);
                    clearInterval(intervalId);
                }
            });
        });

        fileList.appendChild(li);
    });
}


