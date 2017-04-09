/**
 * Created by kuaku on 30.03.2017.
 */

$(document).ready(function (){

    $('.push-form').click(function() {
        $('.forms').toggleClass('form-slide');
    });

    $('.more-phones-push').click(function() {
        $('.more-phones').toggleClass('more-visibility more-hidden');
    });

    $('.more-emails-push').click(function() {
        $('.more-emails').toggleClass('more-visibility more-hidden');
    });

    $('.more-address-push').click(function() {
        $('.more-address').toggleClass('more-visibility more-hidden');
    });
});