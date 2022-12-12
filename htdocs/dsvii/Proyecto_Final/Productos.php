<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['usuario'])) {
   @include 'Class/config.php';
   if (isset($_GET['delete'])) {
      require('Class/Consultas.php');
      $id = $_GET['delete'];
      // var_dump($id);
      $n = intval($id);
      //var_dump($n);
      $obj_Delete = new Consultas();
      $deleteProduct = $obj_Delete->Delete($id);
      header('location:Productos.php');
   }
?>

   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Product Admin Panel</title>
      <!--font awesome cdn link-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
      <!--css-->
      <link rel="stylesheet" href="css/style.css">
   </head>

   <body>


      <div class="container">
         <div class="btn-continer">
            <a href="update.php?edit=0" class="btn" style="margin-right:1rem;"> Agregar Nuevo Producto <i class="fas fa-plus"></i></a>

         </div>
         <div>
            <form class="btn-continer" style="width: 100%;" action="" method="post" enctype="multipart/form-data">
               <h3 style="padding-top: 2rem;">Filtrar por:</h3>
               <?php require_once('Class/Consultas.php');
               $obj_categorias = new Consultas();
               $categorias = $obj_categorias->selectCategorias(); ?>

               <select id="categoria" name="categoria" class="box" style="margin-left:1rem;margin-right: 1rem; background-color:#eee">
                  <option hidden selected>Seleccione una Categoria</option>
                  <?php foreach ($categorias as $row) :
                  ?>
                     <option value=<?php print $row['id'] ?>><?php print $row['categorias'] ?></option>
                  <?php endforeach;
                  ?>

               </select>
               <input type="submit" class="btn" name="filter_product" value="Filtrar" style="width: fit-content; height:fit-content; margin-right:1rem;">
               <a href="logout.php" class="btn" style="width: fit-content; height:fit-content;">Logout</a>
            </form>

         </div>

         <?php
         if (isset($_POST['filter_product'])) {
            $product_categoria = $_POST['categoria'];
            //print($product_categoria);


            require_once('Class/Consultas.php');
            $obj_productos = new Consultas();
            $productos = $obj_productos->CategoriaSelect($product_categoria);

         ?>

            <div class=" product-display">

               <table class="product-display-table">
                  <thead>
                     <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Categoria</th>
                        <th colspan="2">Action</th>
                     </tr>
                  </thead>
                  <?php
                  foreach ($productos as $row) :
                     //var_dump($row)
                  ?>
                     <tr>
                        <td><img src="uploaded_img/<?php echo $row['imagen']; ?>" height="100"></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['categorias']; ?></td>
                        <td><a href="update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i>Editar</a>
                           <a href="Productos.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i>Borrar</a>

                        </td>
                     </tr>

                  <?php endforeach; ?>

               </table>

            </div><?php } else {
                  require_once('Class/Consultas.php');
                  $obj_productos = new Consultas();
                  $productos = $obj_productos->SelectAll(); ?>
            <div class="product-display">

               <table class="product-display-table">
                  <thead>
                     <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Categoria</th>
                        <th colspan="2">Action</th>
                     </tr>
                  </thead>
                  <?php
                  foreach ($productos as $row) :
                     //var_dump($row)
                  ?>
                     <tr>
                        <td><img src="uploaded_img/<?php echo $row['imagen']; ?>" height="100"></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['categorias']; ?></td>
                        <td><a href="update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i>Editar</a>
                           <a href="Productos.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i>Borrar</a>

                        </td>
                     </tr>

                  <?php endforeach; ?>

               </table>

            </div>

         <?php } ?>

      </div>
   </body>

   </html> <?php } else
            header("Location: index.php");
         exit();
            ?>