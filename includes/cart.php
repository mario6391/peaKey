<?php
$product_ids = array();

//Prüfe ob der add_to_Cart Button gedrückt wurde
if(filter_input(INPUT_POST, 'add_to_cart')){
    //Prüfe ob ein Warenkorb Objekt besteht
    if(isset($_SESSION['shopping_cart'])){
        
        //Zählt wie viele Produkte im Einkaufswagen sind
        $count = count($_SESSION['shopping_cart']);
        
        //erstelle einen Array welcher die Namen in der Datenbank aussucht und bei Erfolg diese dann speichert
        $product_ids = array_column($_SESSION['shopping_cart'], 'id');
        
        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
        $_SESSION['shopping_cart'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );   
        }
        else { // Wenn Produkt vorhanden zähle die Menge hoch
            
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //hinzufügen
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
        
    }
    else { //falls der Einkaufswagen nicht besteht, erstelle ein Produkt mit dem Schlüssel 0.
        //Array erstellen durch die eingegeben Daten in der Form. Startet bei 1.
        $_SESSION['shopping_cart'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loope durch alle Produkte im Einkaufswagen bis es durch die GET id Variable abgeglichen wird
    foreach($_SESSION['shopping_cart'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //lösche das Produkt wenn es mit der GET id übereinstimmt
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    //Resetten des SESSION arrays, damit er mit dem Produkt array übereinstimmt
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}



function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
