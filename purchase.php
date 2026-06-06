<?php
session_start();
include 'connection.php'; // MongoDB connection ($db)

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['purchase']))
    {
        // 1. Form data variables mein store karein
        $name = $_POST['full_name'];
        $phone = $_POST['phone_no'];
        $address = $_POST['address'];
        $pay_mode = $_POST['pay_mode'];
        
        $total = 0;
        $order_items = [];

        // 2. Cart se items aur total nikalein
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $values){
                $total += $values['price'] * $values['quantity'];
                
                // Items ko array mein store karein taaki MongoDB mein nest kar sakein
                $order_items[] = [
                    'name' => $values['name'],
                    'price' => $values['price'],
                    'quantity' => $values['quantity']
                ];
            }

            try {
                // 3. MongoDB mein aik hi document insert karein
                $ordersCollection = $db->orders; // 'orders' collection (khud ban jayegi agar nahi hai)
                
                $result = $ordersCollection->insertOne([
                    'full_name' => $name,
                    'phone_no' => $phone,
                    'address' => $address,
                    'pay_mode' => $pay_mode,
                    'grand_total' => $total,
                    'items' => $order_items, // Saari items isi ke andar hain
                    'order_date' => new MongoDB\BSON\UTCDateTime() // Current Date & Time
                ]);

                // 4. Cart Khali karein aur Success message dikhayein
                unset($_SESSION['cart']);
                
                echo "<script>
                    alert('Order Placed Successfully in MongoDB!');
                    window.location.href='index.php';
                </script>";

            } catch (Exception $e) {
                echo "<script>alert('MongoDB Error: " . $e->getMessage() . "'); window.location.href='checkout.php';</script>";
            }
        }
        else {
            echo "<script>alert('Your cart is empty'); window.location.href='index.php';</script>";
        }
    }
}
?>