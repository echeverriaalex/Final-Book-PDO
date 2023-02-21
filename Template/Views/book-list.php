<?php
require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de libros</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Codigo</th>
                         <th>Titulo</th>
                         <th>Precio</th>
                         <th>Opcion</th>
                    </thead>
                    <tbody>
                         <?php foreach($bookList as $book){ ?>
                                   <tr>
                                        <td> <?php echo $book->getCode(); ?> </td>
                                        <td> <?php echo $book->getTitle(); ?> </td>
                                        <td> <?php echo $book->getPrice(); ?> </td>
                                        <td>
                                             <form action="<?php echo FRONT_ROOT?>Book/Delete" method="post">                                                  
                                                  <input type="text" name="code" value="<?php echo $book->getCode(); ?>" hidden>
                                                  <button> Eliminar </button>
                                             </form>                                            
                                        </td>
                                   </tr>
                         <?php } ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>