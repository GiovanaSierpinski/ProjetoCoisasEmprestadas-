<?php
    include "includes/topo.php";
    include "includes/conecta.php";
   
    $id_item = "";
    $id_usuario = "";
    $status = "";
    $nome = "";
    $categoria = "";
    $mutuario = "";
    $num_mutuario = "";
    $descricao = "";
    $dtdevolucao = "";


   if(isset($_GET['id_item'])) {

        $id_item = $_GET['id_item'];

        $sql = "SELECT * FROM itens WHERE id_item = $id_item";
    

        $res = mysqli_query($conn, $sql);
    

        $row = mysqli_fetch_assoc($res);

        $nome = $row['nome'];
        $categoria = $row['categoria'];
        $mutuario = $row['mutuario'];
        $num_mutuario = $row['num_mutuario'];
        $descricao = $row['descricao'];
        $dtdevolucao = $row['dtdevolucao'];
        
        $id = $_SESSION['id'];
        $id_usuario = $id;

   }
?>

<header>
    <h1>Cadastrar novo item</h1>
</header>
<section>
    <?php

    include "includes/menu.php";

    ?>

    <article>
        <form action="recebe-item.php?id=<?php echo $_SESSION['id']?>"" method="post">
        <input type="hidden" name="id_item" value="<?php echo $id_item; ?>"/><br>
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>"/><br>

        <label for="nome">Nome do item</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>"/><br/>


        <label for="categoria">Categoria</label>
  
         <select name="categoria" value="<?php echo $categoria; ?>">
             <option value = "Livros" <?php if($categoria=='Livros') { echo "selected";}?>>Livros</option>
             <option value = "Roupas & Acessórios"  <?php if($categoria=='Roupas & Acessórios') { echo "selected";}?>>Roupas e Acessórios</option>
             <option value = "Ferramentas & Construção"  <?php if($categoria=='Ferramentas & Construção') { echo "selected";}?>>Ferramentas & Construção</option>
             <option value = "Móveis & Utensílios de casa"  <?php if($categoria=='Móveis & Utensílios de casa') { echo "selected";}?>>Móveis & Utensílios de casa</option>
             <option value = "Brinquedos"  <?php if($categoria=='Brinquedos') { echo "selected";}?>>Brinquedos</option>
             <option value = "Papelaria"  <?php if($categoria=='Papelaria') { echo "selected";}?>>Papelaria</option>
             <option value = "Outros"  <?php if($categoria=='Outros') { echo "selected";}?>>Outros</option>
         </select><br/>

         <label for="mutuario">Nome do mutuário</label>
         <input type="text" name="mutuario" value="<?php echo $mutuario; ?>"/><br>

         <label for="num_mutuario">Número do mutuário</label>
         <input type="text" name="num_mutuario" value="<?php echo $num_mutuario; ?>"/><br>

         <label for="descricao">Descrição do item</label>
         <input type="text" name="descricao" value="<?php echo $descricao; ?>"/><br>

        <label for="dtdevolucao">Prazo máximo para devolução</label>
        <input type="date" name="dtdevolucao" value="<?php echo $dtdevolucao; ?>" /> <br/>

         <input type="submit"/><br><br>   
        </form>

    </article>
</section>


<?php

	include "includes/rodape.php";
	
?>
