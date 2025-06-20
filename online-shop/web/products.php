<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Продукти | Онлайн магазин</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Нашите продукти</h1>
        <nav>
            <a href="index.php">Начало</a>
            <a href="products.php">Продукти</a>
        </nav>
    </header>
    
    <main>
        <section class="products">
            <?php
            $host = 'db';
            $user = 'shop_user';
            $pass = 'shop_pass';
            $db = 'equestrian_db';
            
            $conn = new mysqli($host, $user, $pass, $db);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<h2>' . $row['name'] . '</h2>';
                    echo '<p>Цена: ' . $row['price'] . ' лв.</p>';
                    echo '<p>' . $row['description'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "Няма налични продукти";
            }
            $conn->close();
            ?>
        </section>
    </main>
</body>
</html>
