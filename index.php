<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <title>Человеческие сверхспособности</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <div id="название">
      <h1>Человеческие сверхспособности</h1>
    </div>
  </header>
  <div class="form">
    <form action="/" method="POST">
      <div>
        <label>
          Введите имя:<br />
          <input name="name" placeholder="Введите имя" />
        </label>
      </div>
      <div>
        <label>
          Адрес электронной почты:<br />
          <input name="email" type="email" placeholder="Введите email" />
        </label>
      </div>
      <div>
        <label for="year">Год рождения</label>
			<select id="year" name="year">
				<option selected>Год</option>
    <?php
        for ($i = 1980; $i <= 2014; $i++)
            echo '<option>' . $i . '</option>';
    ?>
			</select>
      </div>
      <div>
        Выберите пол:<br />
        <label><input type="radio" checked="checked" name="gender" value="female" />
          Женский</label>
        <label><input type="radio" name="gender" value="male" />
          Мужской</label>
      </div>
      <div>
        Количество конечностей:<br />
        <label><input type="radio" checked="checked" name="limbs" value="1" />
          1</label>
        <label><input type="radio" name="limbs" value="2" />
          2</label>
        <label><input type="radio" name="limbs" value="3" />
          3</label>
        <label><input type="radio" name="limbs" value="4" />
          4</label>
        <label>
      </div>
      <div>
        Сверхспособности:<br>
        <select name="superpowers[]" multiple="multiple">
          <option value="deathless">Бессмертие</option>
          <option value="walls" selected="selected">Прохождение сквозь стены</option>
          <option value="levitation" selected="selected">Левитация</option>
          <option value="deathless">Управление стихиями</option>
          <option value="deathless">Путешествие во времени</option>
        </select>
      </div>
      <div>
        Биография:<br>
        <textarea name="biography">Напишите о себе</textarea>
        <br><label><input type="checkbox" checked="checked" name="check-1" />
          с контрактом ознакомлен(а)</label>
      </div>
      <div>
        <input type="submit" class="submit" value="Отправить" />
      </div>
    </form>
  </div>

</body>

</html>