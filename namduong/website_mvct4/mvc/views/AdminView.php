<html>
    <head>
        <title>Quản trị người dùng</title>
        <link rel="stylesheet" href="./public/style.css"/>
    </head>
    <body>
        <div class="main">
            <div class="header">
                <?php
                    require_once "./mvc/views/pages/menu_backendView.php";
                ?>
            </div>
            <div class="content">
                <?php
                    require_once "./mvc/views/Back_end/" . $data["page"] . ".php";
                ?>
            </div>
        </div>
        <div class="footer">@copyright Đoàn Nam Dương</div>
    </body>
</html>
