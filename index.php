<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://kit.fontawesome.com/da3f2c352c.js" crossorigin="anonymous"></script> -->
    <title>Project CSDL</title>
    <link rel="stylesheet" href="web/server.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="web/server.js"></script>
</head>

<body>
<div class="container-fluid" id="menu">
    <div class="header"><h1 style="" href="">SIP2 Server</h1></div>
    <h4> Connection Information </h4>
    <div class="col-4 form-server" >
            <div class="row">
                <div class="col" ><a > IP</a></div>
                <div class="col "><input type="text" name="ipaddress" value="127.0.0.1" id="ipaddress" placeholder="127.0.0.1"></div>
                <div class="col" ><button class="border-light" onclick="startServer()"> Start</button></div>
            </div>
            <div class="my-2"></div> <!-- Thêm một div để tạo khoảng cách giữa hai dòng -->
            <div class="row">
                <div class="col" ><a >PORT</a></div>
                <div class="col" ><input type="text" name="port" value="12345" id="port" placeholder="12345"></div>
                <div class="col" ><button class="border-light"  onclick="stopServer();"> Stop</button></div>
            </div>
    </div>
    <div class="row logs">
        <div class="col"><h4>Logs</h4></div>
        <div class="col logs-right">Chọn ngày <input type="date"></input></div>
    </div>
    <div class="input-group logs-text">
        <textarea style="height: 418px;" class="form-control" aria-label="With textarea"></textarea>
    </div>
</div>
</body>

</html>