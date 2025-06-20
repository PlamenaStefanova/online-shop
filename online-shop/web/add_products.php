<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;
    $description = $_POST['description'] ?? '';
    $category_id = $_POST['category_id'] ?? null;

    if (!empty($name) && $price > 0 && $category_id) {
        $stmt = $conn->prepare("INSERT INTO equipment (name, price, description, category_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdsi", $name, $price, $description, $category_id);
        $stmt->execute();

        echo "<p style='color: green;'>✅ Продуктът беше добавен успешно!</p>";
    } else {
        echo "<p style='color: red;'>⚠️ Моля попълни всички полета правилно.</p>";
    }
}
?>

<h2>Добавяне на нов продукт</h2>
<form method="post" action="add_product.php">
    <label>Име на продукт:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Цена:</label><br>
    <input type="number" step="0.01" name="price" required><br><br>

    <label>Описание:</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Категория:</label><br>
    <select name="category_id" required>
        <option value="">-- Избери категория --</option>
        <?php
        $result = $conn->query("SELECT * FROM categories");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['name']}</option>";
        }
        ?>
    </select><br><br>

    <button type="submit">Добави продукт</button>
</form>
