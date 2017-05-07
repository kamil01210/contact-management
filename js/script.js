/**
 * Created by kuaku on 30.03.2017.
 */

$(document).ready(function (){

    $('.push-form ').click(function() {
        $('.forms').toggleClass('form-slide');
    });

    $('.more-phones-push .btn').click(function() {
        $('.more-phones').toggleClass('more-visibility more-hidden');
    });

    $('.more-emails-push .btn').click(function() {
        $('.more-emails').toggleClass('more-visibility more-hidden');
    });

    $('.more-address-push .btn').click(function() {
        $('.more-address').toggleClass('more-visibility more-hidden');
    });

    $('.btn-more').click(function() {
        $(this).find('.cross').toggleClass('cross-active');
    });

    $('#contact_address_line_2').mask('99-999');
});