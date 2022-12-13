<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['usuario'])) {
   @include 'Class/config.php';
   @include 'Class/config_basic.php';
   $id = $_GET['edit'];
   $n = intval($id);

   if (isset($_POST['add_product'])) {
      $product_name = $_POST['product_name'];
      $product_quantity = $_POST['product_quantity'];
      $product_image = $_FILES['product_image']['name'];
      $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
      $product_image_folder = 'uploaded_img/' . $product_image;
      $product_categoria = $_POST['categoria'];


      if (empty($product_name) || empty($product_quantity) || empty($product_image) || empty($product_categoria)) {

         $message[] = '<script>alert("Porfavor llenar todos los campos")</script>';
      } else {
         $insert = "Call sp_insertar('$product_name', '$product_quantity','$product_image','$product_categoria')";
         // var_dump($insert);
         $upload = mysqli_query($conn, $insert);
         if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = '<script>alert("Se creo el producto")</script>';
         } else {
            $message[] = '<script>alert("no see creo el producto")</script>';
         }
      }
   };



   if (isset($_POST['update_product'])) {

      $product_name = $_POST['product_name'];
      $product_quantity = $_POST['product_quantity'];
      $product_categoria = $_POST['categoria'];
      //var_dump($product_categoria);
      if (empty($product_name) || empty($product_quantity) || empty($product_categoria)) {

         $message[] = '<script>alert("Porfavor llenar todos los campos")</script>';
      } else {
         $update = "Call sp_update('$id','$product_name', '$product_quantity','$product_categoria')";
         //var_dump($update);
         $upload = mysqli_query($conn, $update);
         if ($upload) {

            $message[] = '<script>alert("Se modifico el producto")</script>';
         } else {
            $message[] = '<script>alert("no se modifico el producto")</script>';
         }
      }
   };

?>

   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/style.css">
   </head>

   <body>

      <?php
      if (isset($message)) {
         foreach ($message as $message) {
            echo  $message;
         }
      }
      ?>

      <div class="container">


         <div class="admin-product-form-container centered">

            <?php
            if ($id != 0) {
               require_once('Class/Consultas.php');
               $obj_selectOne = new Consultas();
               $selectOne = $obj_selectOne->SelectOne($id);
               //echo $selectOne['nombre'];


            ?>

               <form action="" method="post" enctype="multipart/form-data">
                  <h3 class="title">update the product</h3>
                  <input type="text" class="box" name="product_name" value="<?php echo $selectOne['nombre']; ?>" placeholder="enter the product name">
                  <input type="number" min="0" class="box" name="product_quantity" value="<?php echo $selectOne['cantidad']; ?>" placeholder="enter the product price">
                  <select id="categoria" name="categoria" class="box">
                     <option hidden selected><?php echo $selectOne['categorias']; ?></option>
                     <?php require_once('Class/Consultas.php');
                     $obj_categorias = new Consultas();
                     $categorias = $obj_categorias->selectCategorias();

                     foreach ($categorias as $row) :
                     ?>
                        <option value=<?php print $row['id'] ?>><?php print $row['categorias'] ?></option>
                     <?php endforeach; ?>

                  </select>
                  <input type="submit" value="update product" name="update_product" class="btn">
                  <a href="Productos.php" class="btn">Volver a Inicio</a>
               </form>



            <?php
            } else {
               require_once('Class/Consultas.php');
               $obj_categorias = new Consultas();
               $categorias = $obj_categorias->selectCategorias();
               //var_dump($categorias);
               // $nrow = count($row);
               //echo $nrow;
            ?>

               <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                  <h3>Agregar un nuevo producto</h3>
                  <label for="product_name">Nombre del Producto:</label>
                  <input type="text" placeholder="Enter Product name" name="product_name" class="box">
                  <label for="product_name">Cantidad:</label>
                  <input type="Number" placeholder="Enter Product quantity" name="product_quantity" class="box">
                  <label for="product_name">Imagen del producto:</label>
                  <input type="file" accept="image/png, image/jpg, image/jpeg" name="product_image" class="box">
                  <label for="categoria">Categoria:</label>
                  <select id="categoria" name="categoria" class="box">
                     <option hidden selected>Seleccione una Categoria</option>
                     <?php foreach ($categorias as $row) :
                     ?>
                        <option value=<?php print $row['id'] ?>><?php print $row['categorias'] ?></option>
                     <?php endforeach;
                     ?>

                  </select>
                  <input type="submit" class="btn" name="add_product" value="Add Product">
                  <a href="Productos.php" class="btn">Volver a Inicio</a>

               </form>
            <?php
            }; ?>

         </div>

      </div>

   </body>

   </html><?php } else
            header("Location: index.php");
         exit();
            ?>

?>