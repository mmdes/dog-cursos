<h1>Inserir nova matrícula</h1>
<br>

<form method="post" action="processa_matricula.php">
    <p>Selecione o aluno</p>
    <select name="escolha_aluno">
        <?php
            while($linha = mysqli_fetch_array($consulta_alunos)){
                echo '<option value="'.$linha['id_aluno'].'">'
                .$linha['nome_aluno'].'</option>';
                
            }
        ?>
    </select>
    <br><br>
    <p>Selecione o curso</p>
    <select name="escolha_curso">
        <?php
            while($linha = mysqli_fetch_array($consulta_cursos)){
                echo '<option value="'.$linha['id_curso'].'">'
                .$linha['nome_curso'].'</option>';
                
            }
        ?>
    </select>
    <br><br>
    <input type="submit" value="Matricular aluno no curso">
</form>
