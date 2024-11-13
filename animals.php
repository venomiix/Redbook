<?php
// Підключення файлу з даними тварин
include 'animals_data.php';
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список тварин Червоної книги</title>
    <link rel="stylesheet" href="style_animals.css"> <!-- Підключаємо стилі для списку тварин -->
</head>
<body>
    <header>
        <h1>Тварини, занесені в Червону книгу України</h1>
        <nav>
            <ul>
                <li><a href="index.php">Головна</a></li>
                <li><a href="search.php">Пошук тварин</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Список тварин, занесених у Червону книгу</h2>
        <ul class="animal-list">
            <?php foreach ($animals as $animal): ?>
                <li class="animal-item">
                    <div class="animal-image">
                        <img src="<?php echo htmlspecialchars($animal['image']); ?>" alt="<?php echo htmlspecialchars($animal['name']); ?>" class="animal-photo">
                    </div>
                    <div class="animal-info">
                        <h3><?php echo htmlspecialchars($animal['name']); ?></h3>
                        <p><strong>Статус:</strong> <?php echo htmlspecialchars($animal['status']); ?></p>
                        <p><strong>Місце проживання:</strong> <?php echo htmlspecialchars($animal['habitat']); ?></p>
                        <p><?php echo htmlspecialchars($animal['description']); ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>

    <footer>
        <p>&copy; 2024 Тварини Червоної книги України</p>
    </footer>
</body>
</html>
