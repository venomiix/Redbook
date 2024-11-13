<?php
// Підключаємо масив даних тварин
include 'animals_data.php';

// Перевірка, чи є запит на пошук
$searchTerm = '';
$filteredAnimals = $animals;

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    
    // Фільтруємо тварин за назвою
    $filteredAnimals = array_filter($animals, function($animal) use ($searchTerm) {
        return stripos($animal['name'], $searchTerm) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пошук тварин Червоної книги</title>
    <link rel="stylesheet" href="style.css"> <!-- основні стилі -->
    <link rel="stylesheet" href="search-style.css"> <!-- стилі для пошукової сторінки -->
</head>
<body>
    <header>
        <h1>Пошук тварин, занесених у Червону книгу України</h1>
        <nav>
            <ul>
                <li><a href="index.php">Головна</a></li>
                <li><a href="animals.php">Список тварин</a></li>
                <li><a href="search.php">Пошук тварин</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Пошук тварин за назвою</h2>
        
        <!-- Форма для пошуку -->
        <form method="GET" action="search.php">
            <input type="text" name="search" value="<?php echo htmlspecialchars($searchTerm); ?>" placeholder="Введіть назву тварини">
            <button type="submit">Пошук</button>
        </form>

        <?php if ($searchTerm): ?>
            <h3>Результати пошуку для "<?php echo htmlspecialchars($searchTerm); ?>"</h3>
        <?php else: ?>
            <h3>Введіть назву тварини для пошуку.</h3>
        <?php endif; ?>

        <div class="animal-list">
            <?php if (empty($filteredAnimals)): ?>
                <p>Тварин, що відповідають вашому запиту, не знайдено.</p>
            <?php else: ?>
                <?php foreach ($filteredAnimals as $animal): ?>
                    <div class="animal-item">
                        <img src="<?php echo $animal['image']; ?>" alt="<?php echo htmlspecialchars($animal['name']); ?>">
                        <h3><?php echo htmlspecialchars($animal['name']); ?></h3>
                        <p><strong>Статус:</strong> <?php echo htmlspecialchars($animal['status']); ?></p>
                        <p><strong>Місце проживання:</strong> <?php echo htmlspecialchars($animal['habitat']); ?></p>
                        <p><strong>Опис:</strong> <?php echo htmlspecialchars($animal['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Тварини Червоної книги України</p>
    </footer>
</body>
</html>
