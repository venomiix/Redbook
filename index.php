<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тварини Червоної книги</title>
    <link rel="stylesheet" href="style_main.css"> <!-- Підключаємо стилі для головної сторінки -->
</head>
<body>
    <header>
        <h1>Тварини, занесені в Червону книгу України</h1>
        <nav>
            <ul>
                <li><a href="index.php">Головна</a></li>
                <li><a href="animals.php">Список тварин</a></li>
                <li><a href="search.php">Пошук тварин</a></li>
            </ul>
        </nav>
    </header>
   
    <main>
        <h2>Ласкаво просимо на сайт про тварин, занесених в Червону книгу України!</h2>
        <p>Цей сайт присвячений збереженню видів тварин, які знаходяться під загрозою зникнення. Тут ви можете ознайомитися з інформацією про цих тварин, а також дізнатися про заходи щодо їхнього захисту.</p>
    </main>

    <div class="animal-gallery">
        <?php include 'animals_data.php'; // Підключаємо масиви ?>
        <?php foreach ($animals as $animal ): ?>
            <div class="animal-item">
                <img src="<?php echo $animal['image']; ?>" alt="<?php echo $animal['name']; ?>">
                <h3><?php echo $animal['name']; ?></h3>
                <p><?php echo $animal['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <p>&copy; 2024 Тварини Червоної книги України</p>
    </footer>
</body>
</html>
