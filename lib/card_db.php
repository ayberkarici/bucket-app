<?php 

include ('db.php');

session_start();

function addToCard ($product_item) {

    // SESSION
    /**
    *shoppingCard
        *products 
        *      Kedi maması...... 2 ...... 100 ...... 200
        *      Köpek maması...... 2 ...... 100 ...... 200
        * 
        *summary
        *      4 adet ürün ...........400
    * 
    */

    if(isset($_SESSION['shoppingCard'])) {

        $shoppingCard = $_SESSION['shoppingCard'];
        $products = $shoppingCard['products'];
        
    } else {
        
        $products = Array();

    }
    
    // Adet Kontrolü

    if (array_key_exists($product_item->id , $products)) {

        $products[$product_item->id]->count++;

    } else {

        // itemi indisinin üzerine ekledik
        $products[$product_item->id] = $product_item;

    }

    // Sepetin Hesaplanması..
    $total_price = 0.0;
    $total_count = 0;

    foreach ($products as $product) {
        
        $product->total_price = $product->count * $product->price;
        $total_price += $product->total_price;
        $total_count += $product->count;
        
    }

    $summary['total_price'] = $total_price; 
    $summary['total_count'] = $total_count; 

    // itemleri ekledik
    $_SESSION['shoppingCard']['products'] = $products;
    $_SESSION['shoppingCard']['summary'] = $summary;

    return $total_count;
    

};

function removeFromCard ($product_id) {

    if(isset($_SESSION['shoppingCard'])) {

        $shoppingCard = $_SESSION['shoppingCard'];
        $products = $shoppingCard['products'];

        // Urunu listeden çıkar
        if(array_key_exists($product_id, $products)) {
            unset($products[$product_id]);
        } 

        // Tekrar sepeti hesapla..
        $total_price = 0.0;
        $total_count = 0;

        foreach ($products as $product) {
            
            $product->total_price = $product->count * $product->price;
            $total_price += $product->total_price;
            $total_count += $product->count;
            
        }

        $summary['total_price'] = $total_price; 
        $summary['total_count'] = $total_count; 

        // itemleri ekledik
        $_SESSION['shoppingCard']['products'] = $products;
        $_SESSION['shoppingCard']['summary'] = $summary;

        return true;

    }

};

function incCount ($product_id) {

    if(isset($_SESSION['shoppingCard'])) {

        $shoppingCard = $_SESSION['shoppingCard'];
        $products = $shoppingCard['products'];
        

         // Adet Kontrolü

        if (array_key_exists($product_id , $products)) {

            $products[$product_id]->count++;

        }

        // Sepetin Hesaplanması..
        $total_price = 0.0;
        $total_count = 0;

        foreach ($products as $product) {
            
            $product->total_price = $product->count * $product->price;
            $total_price += $product->total_price;
            $total_count += $product->count;
            
        }

        $summary['total_price'] = $total_price; 
        $summary['total_count'] = $total_count; 

        // itemleri ekledik
        $_SESSION['shoppingCard']['products'] = $products;
        $_SESSION['shoppingCard']['summary'] = $summary;

        return true;

    }
    
   

};

function decCount ($product_id) {
    if(isset($_SESSION['shoppingCard'])) {

        $shoppingCard = $_SESSION['shoppingCard'];
        $products = $shoppingCard['products'];
        

         // Adet Kontrolü
        if (array_key_exists($product_id , $products) && $products[$product_id]->count > 0) {

            $products[$product_id]->count--;
            
            if($products[$product_id]->count == 0) {
                removeFromCard($product_id);
                header("Location: ../shopping-card.php");
                return false;
            } 

        } else {
            removeFromCard($product_id);
            header("Location: ../shopping-card.php");
            return false;
        }

        // Sepetin Hesaplanması..
        $total_price = 0.0;
        $total_count = 0;

        foreach ($products as $product) {
            
            $product->total_price = $product->count * $product->price;
            $total_price += $product->total_price;
            $total_count += $product->count;
            
        }

        $summary['total_price'] = $total_price; 
        $summary['total_count'] = $total_count; 

        // itemleri ekledik
        $_SESSION['shoppingCard']['products'] = $products;
        $_SESSION['shoppingCard']['summary'] = $summary;

        return true;

    }
};

if (isset($_POST['p'])) {
    
    $islem = $_POST['p'];
    if($islem == 'addToCard') {

        $id = $_POST['product_id'];

        $product = $db->query("SELECT * FROM products WHERE id = {$id}", PDO::FETCH_OBJ)->fetch();
        $product->count = 1;

        echo addToCard($product);
        
    } elseif ($islem  == 'removeFromCard') {

        $id = $_POST['product_id'];

        echo removeFromCard($id);

    }

};

if (isset($_GET['p'])) {
    echo "asd";
    $islem = $_GET['p'];
    if($islem == 'incCount') {

        $id = $_GET['product_id'];

        if(incCount($id)) {
            header("Location: ../shopping-card.php");
        }
        
        
    } elseif ($islem  == 'decCount') {
        
        $id = $_GET['product_id'];
        
        if(decCount($id)) {
            header("Location: ../shopping-card.php");
        }


    }

};


// addToCard
/*
 * urun id al
 * card-db.php dosyasına kaydet
 * veritabanından urun bilgilerini al
 * SESSION da sepete ekle
 * sepeti tekrar hesapla
 * 
 */