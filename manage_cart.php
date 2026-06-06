<?php 
session_start();
include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['add_to_cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myitems = array_column($_SESSION['cart'], 'name');
            if(in_array($_POST['name'], $myitems))
            {
                echo json_encode(["status" => "error", "message" => "Item Already Added!"]);
            }
            else
            {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('name'=>$_POST['name'], 'price'=>$_POST['price'], 'quantity'=>1);
                echo json_encode(["status" => "success", "message" => "Item Added to Cart!", "cart_count" => count($_SESSION['cart'])]);
            }
        }
        else
        {
            $_SESSION['cart'][0] = array('name'=>$_POST['name'], 'price'=>$_POST['price'], 'quantity'=>1);
            echo json_encode(["status" => "success", "message" => "Item Added to Cart!", "cart_count" => 1]);
        }
    }
    
    if(isset($_POST['remove_item']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['name'] == $_POST['Item_Name'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>window.location.href='cart.php';</script>";
            }
        }
    }

    if(isset($_POST['mod_quantity']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['name'] == $_POST['Item_Name'])
            {
                if($_POST['quantity_op'] == 'increase')
                {
                    if($_SESSION['cart'][$key]['quantity'] < 10) {
                        $_SESSION['cart'][$key]['quantity'] += 1;
                    }
                }
                else 
                {
                    if($_SESSION['cart'][$key]['quantity'] > 1) {
                        $_SESSION['cart'][$key]['quantity'] -= 1;
                    }
                }
                echo "<script>window.location.href='cart.php';</script>";
            }
        }
    }
    exit();
}
?>