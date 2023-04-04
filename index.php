<?php
header('Content-Type: text/html; charset=UTF-8');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
// В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
    if (!empty($_GET['save'])) {// Если есть параметр save, то выводим сообщение пользователю.
        print('Спасибо, результаты сохранены.');
    }
    include('form.php');
    exit();
}
// Проверяем ошибки.
$errors = FALSE;
if (empty($_POST['name'])) {
    print('Введите имя<br>');
    $errors = TRUE;
}
if (empty($_POST['email']) or !(strpos($_POST['email'], '@'))) {
    print('Введите e-mail<br>');
    $errors = TRUE;
}
if (empty($_POST['year'])) {
    print('Выберите из списка год рождения<br>');
    $errors = TRUE;
}
if (empty($_POST['gender'])) {
    print('Укажите ваш пол<br>');
    $errors = TRUE;
}
if (empty($_POST['limbs'])){
    print ('Выберите количество конечностей<br>');
    $errors = true;
}
if (empty($_POST['superpowers'])){
    print ('Выберите минимум одну сверхспособность<br>');
    $errors = true;
}
else {
    $super = serialize($_POST['superpowers']);
}
if (empty($_POST['biography'])){
    print ('Расскажите о себе<br>');
    $errors = true;
}
if (empty($_POST['check-kontrol'])){
    print ('Обязательно ознакомьтесь с контрактом перед отправкой формы<br>');
    $errors = true;
}
if ($errors) {// При наличии ошибок завершаем работу скрипта.
    exit();
}
// Сохранение в базу данных.
$user = 'u52984';
$pass = '8295850';
$db = new PDO('mysql:host=localhost;dbname=u52984', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
// Подготовленный запрос. Не именованные метки.
try {
    $stmt = $db->prepare("INSERT INTO person SET name = ?, email = ?, year = ?, gender = ?, limbs = ?, biography = ?");
    $stmt -> execute(array(
        $_POST['name'],
        $_POST['email'],
        $_POST['year'],
        $_POST['gender'],
        $_POST['limbs'],
        $_POST['biography'],
    ));
    //$arr = array(1, 2, 3, 4);
    echo '<pre>';
    print_r($_POST['superpowers']);
    echo '<pre>';
    foreach ($_POST['superpowers'] as $value) {
    //$value = $value * 2;
        $stmt = $db->prepare("INSERT INTO superpower SET name = ?, superpower = ?");
        $stmt -> execute(array(
            $_POST['name'], 
            $value,
        ));
    }
// массив $arr сейчас таков: array(2, 4, 6, 8)
    unset($value);
    
}
catch(PDOException $e){
print('Error: ' . $e->getMessage());
exit();
}
// stmt - это "дескриптор состояния"
header('Location: ?save=1');