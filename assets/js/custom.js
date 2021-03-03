$(document).ready(function (){

    $('.addToCard').click(function () {

        let url =  'http://localhost/phpdersleri/PHPBasics/MYSQLBasketApp/lib/card_db.php';

        let data = {
            p : "addToCard",
            product_id : $(this).attr('product-id')
        }


        $.post(url, data, function(response) {
            
            $('.card-count').text(response);

        })

    }) 
    $('.removeFromCardBtn').click(function () {

        let url =  'http://localhost/phpdersleri/PHPBasics/MYSQLBasketApp/lib/card_db.php';

        let data = {
            p : "removeFromCard",
            product_id : $(this).attr('product-id')
        }


        $.post(url, data, function(response) {
            
            $('#deneme').load("shopping-card.php");

        })

        
    }) 
    
    $(".btn-inc").click(function(){
        
        let url =  'http://localhost/phpdersleri/PHPBasics/MYSQLBasketApp/lib/card_db.php';

        let data = {
            p : "incCount",
            product_id : $(this).attr('product-id')
        }


        $.get(url, data, function(response) {
            
            $('#deneme').load("shopping-card.php");

        })

    });

    $(".btn-dec").click(function(){
        
        let url =  'http://localhost/phpdersleri/PHPBasics/MYSQLBasketApp/lib/card_db.php';

        let data = {
            p : "decCount",
            product_id : $(this).attr('product-id')
        }


        $.get(url, data, function(response) {

            $('#deneme').load("shopping-card.php");
            
        })

    });
})