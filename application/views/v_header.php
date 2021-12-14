<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/user.css');?>">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>B I S T I R</title>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script type="text/javascript">
       $(document).ready(function(){
         $(".akun_profil .icon_wrap").click(function(){
           $(this).parent().toggleClass("active");
           $(".notif , .pesan").removeClass("active");

         })
         $(".notif .icon_wrap").click(function(){
           $(this).parent().toggleClass("active");
           $(".akun_profil , .pesan").removeClass("active");
         });
         $(".pesan .icon_wrap").click(function(){
           $(this).parent().toggleClass("active");
           $(".akun_profil , .notif").removeClass("active");
         });
       });

     </script>

   </head>
    <body onload="initClock()">
