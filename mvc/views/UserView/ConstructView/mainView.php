<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost/FOODOGANICSHOP/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($data["title_link"])) {
                echo $data["title_link"];
            } else {
                echo $data["control"];
            } ?></title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="./mvc/public/user/css/style.css">
    <link rel="stylesheet" href="./mvc/public/user/csshome/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./mvc/public/user/csshome/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./mvc/public/user/csshome/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./mvc/public/user/csshome/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./mvc/public/user/csshome/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./mvc/public/user/csshome/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./mvc/public/user/csshome/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./mvc/public/user/csshome/style2.css" type="text/css">
    <meta name="description" content="Ocop-mart, tụ điểm bán các mặt hàng phục vụ đời sống cho người dân, đã xuất hiện tại Đà Nẵng, Với các mặt hàng như tổ yến, nhàu, ..., Các loại thực phẩm sạch đã qua kiểm định !!">


    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php if (isset($data['title_link'])) {
                                            echo $data['title_link'];
                                        } ?>">
    <meta property="og:description" content="<?php if (isset($data['des_link'])) {
                                                    echo $data['des_link'];
                                                } ?>">
    <meta property="og:image" content="https://ocopmartdng.com/mvc/public/ImgProduct/<?php if (isset($data['img_link'])) {
                                                                                            echo $data['img_link'];
                                                                                        } ?>">

</head>

<body>
    <!-- đây là header -->
    <?php require_once "./mvc/views/UserView/ConstructView/header.php" ?>


    <!-- phần chính  -->
    <?php require_once "./mvc/views/UserView/enitiesView/" . $data["control"] . ".php" ?>


    <!-- đây là footer -->
    <?php require_once "./mvc/views/UserView/ConstructView/footer.php" ?>
    <!-- javascript -->
    <script src="./mvc/public/user/js/script.js"></script>
</body>