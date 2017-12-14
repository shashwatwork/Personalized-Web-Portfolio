/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$.stellar();

$(document).ready(function () {
    // Activate Carousel
    $("#myCarousel").carousel({interval: false});

    // Enable Carousel Indicators
    $(".item1").click(function () {
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function () {
        $("#myCarousel").carousel(1);
    });
    $(".item3").click(function () {
        $("#myCarousel").carousel(2);
    });
    $(".item4").click(function () {
        $("#myCarousel").carousel(3);
    });

    // Enable Carousel Controls
//                $(".left").click(function(){
//                    $("#myCarousel").carousel("prev");
//                });
//                $(".right").click(function(){
//                    $("#myCarousel").carousel("next");
//                });
});