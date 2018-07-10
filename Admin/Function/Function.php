<?php

/**
 * Метод для получения продуктов.
 *
 * @param string|null $k_product <tt>Ключ продукта</tt>, для вывода одного товара.
 * @param string|null $k_product_category <tt>Ключ категории товара</tt>, для вывода всех активных товаров одной категории.
 * @param bool|null $is_active Если <tt>true</tt> то выведет все активные товары.
 * @return array <tt>Массив продуктов</tt>
 */
function getAllProduct(string $k_product=null, string $k_product_category=null, bool $is_active=null)
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  $q_active = $is_active ? ' and is_active=1' : '';
  if($k_product)
    $where = 'product.k_product='.$k_product.$q_active;
  elseif($k_product_category)
    $where = 'product.k_product_category='.$k_product_category.$q_active;
  elseif(!$k_product_category&&!$k_product&&$is_active)
    $where = 'product.is_active=1';
  else
    $where = 'true';

  $query = "
    select
      product.i_discount,
      product.img,
      product.i_price,
      product.is_active,
      product.is_stock,
      product.k_product,
      product.k_product_category,
      product_category.s_title as name_category,
      product.s_name,
      product.z_data
    from 
      product inner join
      product_category on
        product_category.k_product_category=product.k_product_category
    where
      ".$where.";
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_product = [];
  while($row = mysqli_fetch_assoc($r_query)){
    $a_product[] = $row;
  }

  return $a_product;
}

/**
 * Метод получения продуктов по категории.
 *
 * @param string|null $k_product_category <tt>Ключ категории товара</tt>, для вывода всех товаров одной категории.
 * @return array <tt>Массив продуктов</tt>
 */
function getProduct(string $k_product_category=null)
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  if($k_product_category)
    $where = 'product.k_product_category='.$k_product_category;
  else
    $where = 'true';

  $query = "
    select
      product.i_discount,
      product.img,
      product.i_price,
      product.is_active,
      product.is_stock,
      product.k_product,
      product_category.s_title as name_category,
      product.s_name,
      product.z_data
    from 
      product inner join
      product_category on
        product_category.k_product_category=product.k_product_category
    where
      product.is_active=1 and
      ".$where."
    limit 48;
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_product = [];
  while($row = mysqli_fetch_assoc($r_query)){
    $a_product[] = $row;
  }

  return $a_product;
}

/**
 * Метод получения продуктов хитов продаж.
 *
 * @param string|null $k_product_category <tt>Ключ категории товара</tt>, для вывода всех товаров одной категории.
 * @return array <tt>Массив продуктов</tt>
 */
function getProductHitSales(string $k_product_category=null)
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  if($k_product_category)
    $where = 'product.k_product_category='.$k_product_category;
  else
    $where = 'true';

  $query = "
    select
      product.i_discount,
      product.img,
      product.i_price,
      product.is_active,
      product.is_stock,
      product.k_product,
      product_category.s_title as name_category,
      product.s_name,
      product.z_data
    from 
      product inner join
      product_category on
        product_category.k_product_category=product.k_product_category
    where
      product.is_active=1 and
      product.is_stock=1 and
      ".$where."
    limit 12;
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_product = [];
  while($row = mysqli_fetch_assoc($r_query)){
    $a_product[] = $row;
  }

  return $a_product;
}

/**
 * Получает асооциативный массив категорий продуктов.
 *
 * @param string $k_product_category Ключ категории.
 * @return array
 */
function getProductCategory(string $k_product_category=null)
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  if($k_product_category)
    $where = 'k_product_category='.$k_product_category;
  else
    $where = 'true';

  $query = "
    select 
      k_product_category,
      is_active,
      s_description,
      s_img,
      s_title
    from 
      product_category
    where
      ".$where.";
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_category = [];
  if($k_product_category)
  {
    $a_category = mysqli_fetch_assoc($r_query);
  }
  else
  {
    while ($row = mysqli_fetch_assoc($r_query))
      $a_category[] = $row;
  }

  return $a_category;
}

/**
 * Метод получения одного продукта.
 *
 * @param string $k_product <tt>Ключ товара</tt>, для вывода одного товара.
 * @return array <tt>Массив  содержащий информацию одного товара.</tt>
 */
function getSingleProduct(string $k_product)
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  $query = "
    select
      product.i_discount,
      product.img,
      product.i_price,
      product.is_active,
      product.is_stock,
      product.k_product,
      product.k_product_category,
      product.s_name,
      product.z_data
    from 
      product
    where
      product.k_product=".$k_product.";
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_product =  mysqli_fetch_assoc($r_query);

  if(!isset($a_product))
    $a_product = [];

  return $a_product;
}

/**
 * @param string $_FILES_offset <tt>Смещение в Суперглобальном массиве <var>_FILES</var></tt>
 * @param string $path_dir <tt>Название дериктории для сохранения картинки.</tt>
 * @return string Имя картинки с расширением.
 */
function uploadImage(string $_FILES_offset, string $path_dir)
{
  $filePath  = $_FILES[$_FILES_offset]['tmp_name'];
  $errorCode = $_FILES[$_FILES_offset]['error'];

  // Проверим на ошибки
  if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePath))
  {
    // Массив с названиями ошибок
    $errorMessages = [
      UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
      UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
      UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
      UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
      UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
      UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
      UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
    ];

    // Зададим неизвестную ошибку
    $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';

    // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
    $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;

    // Выведем название ошибки
    die($outputMessage);
  }

  // Создадим ресурс FileInfo
  $fi = finfo_open(FILEINFO_MIME_TYPE);

  // Получим MIME-тип
  $mime = (string) finfo_file($fi, $filePath);

  // Закроем ресурс
  finfo_close($fi);

  // Проверим ключевое слово image (image/jpeg, image/png и т. д.)
  if (strpos($mime, 'image') === false) die('Можно загружать только изображения.');

  // Результат функции запишем в переменную
  $image = getimagesize($filePath);

  // Зададим ограничения для картинок
  $limitBytes  = 1024 * 1024 * 5;
  $limitWidth  = 1980;
  $limitHeight = 1980;

  // Проверим нужные параметры
  if (filesize($filePath) > $limitBytes)
    die('Размер изображения не должен превышать 5 Мбайт.');

  if ($image[1] > $limitHeight)
    die('Высота изображения не должна превышать 768 точек.');

  if ($image[0] > $limitWidth)
    die('Ширина изображения не должна превышать 1280 точек.');

  // Сгенерируем новое имя файла на основе MD5-хеша
  $s_name = md5_file($filePath);

  // Сгенерируем расширение файла на основе типа картинки
  $extension = image_type_to_extension($image[2]);

  // Сократим .jpeg до .jpg
  $format = str_replace('jpeg', 'jpg', $extension);

  // Переместим картинку с новым именем и расширением в папку /pics
  if (!move_uploaded_file($filePath, $_SERVER['DOCUMENT_ROOT'].'/View/upload_img/'.$path_dir.'/' . $s_name . $format))
  {
    die('При записи изображения на диск произошла ошибка.');
  }

  return $s_name.$format;
}

/**
 * Получает асооциативный массив категорий услуг.
 *
 * @param string $k_service_category Ключ категории.
 * @return array
 */
function getServiceCategory(string $k_service_category=null)
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  if($k_service_category)
    $where = 'k_service_category='.$k_service_category;
  else
    $where = 'true';

  $query = "
    select 
      k_service_category,
      is_active,
      s_name,
      s_description,
      z_data
    from 
      service_category
    where
      ".$where.";
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_category = [];
  if($k_service_category)
  {
    $a_category = mysqli_fetch_assoc($r_query);
  }
  else
  {
    while ($row = mysqli_fetch_assoc($r_query))
      $a_category[] = $row;
  }

  return $a_category;
}

/**
 * Метод для получения продуктов.
 *
 * @param string|null $k_service_category <tt>Ключ категории услуги</tt>, для вывода всех активных услуг одной категории.
 * @param bool|null $is_active Если <tt>true</tt> то выведет все активные услуги.
 * @return array <tt>Массив услуг</tt>
 */
function getAllService(string $k_service_category=null, bool $is_active=null)
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  $q_active = $is_active ? ' and is_active=1' : '';

  if($k_service_category)
    $where = 'service.k_service_category='.$k_service_category.$q_active;
  elseif(!$k_service_category&&$is_active)
    $where = 'service.is_active=1';
  else
    $where = 'true';

  $query = "
    select
      service.img,
      service.is_active,
      service.k_service,
      service.k_service_category,
      service.s_description,
      service.s_name,
      service_category.s_name as name_category,
      service.z_data
    from 
      service inner join
      service_category on
        service_category.k_service_category=service.k_service_category
    where
      ".$where.";
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_service = [];
  while($row = mysqli_fetch_assoc($r_query)){
    $a_service[] = $row;
  }

  return $a_service;
}

/**
 * Метод получения одной услуги.
 *
 * @param string $k_service <tt>Ключ услуги</tt>, для вывода одной услуги.
 * @return array <tt>Массив содержащий информацию об одной услуге.</tt>
 */
function getSingleService(string $k_service)
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  $query = "
    select
      service.img,
      service.is_active,
      service.k_service,
      service.k_service_category,
      service.s_description,
      service.s_name,
      service_category.s_name as name_category,
      service.z_data
    from 
      service inner join
      service_category on
        service_category.k_service_category=service.k_service_category
    where
      service.k_service=".$k_service.";
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_service =  mysqli_fetch_assoc($r_query);

  if(!isset($a_service))
    $a_service = [];

  return $a_service;
}
?>