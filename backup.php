<?php

#mysqli
$servidor = "localhost";
$usuario = "root";
$senha = "mmdesouza";
$database = "nescola_curso";

$conexao = mysqli_connect($servidor, $usuario, $senha, $database);

/*

# Criando tabelas usando PHP *********************************
# Tabela cursos (nome do curso, carga horária)
$query = "CREATE TABLE CURSOS(
    id_curso int not null auto_increment,
    nome_curso varchar(255) not null,
    carga_horaria int not null,
    primary key(id_curso)
)";

$executar = mysqli_query($conexao, $query);

if($executar){
    echo "Executado com sucesso (cursos)";
} else{
    echo "Falha ao executar";
}

# Tabela alunos (nome do aluno, data de nascimento)

$query = "CREATE TABLE ALUNOS(
    id_aluno int not null auto_increment,
    nome_aluno varchar(255) not null,
    data_nascimento varchar(255) not null,
    primary key(id_aluno)
    )";


$executar = mysqli_query($conexao, $query);

if($executar){
    echo "Executado com sucesso (alunos)<br>";
} else{
    echo "Falha ao executar<br>";
}



# Tabela alunos_cursos (aluno, curso)

$query = "CREATE TABLE ALUNOS_CURSOS(
    id_aluno_curso int not null auto_increment,
    id_aluno int not null,
    id_curso int not null,
    primary key(id_aluno_curso)
)";

$executar = mysqli_query($conexao, $query);


if($executar){
    echo "Executado com sucesso (alunos_cursos)";
} else{
    echo "Falha ao executar";
}


#Inserir dados nas nossas tabelas
$query = "INSERT INTO ALUNOS(nome_aluno, data_nascimento) VALUES('Jose', '01-01-1990')";

$executar = mysqli_query($conexao, $query);

$query = "INSERT INTO ALUNOS(nome_aluno, data_nascimento) VALUES('Maria', '01-04-1991')";

$executar = mysqli_query($conexao, $query);

$query = "INSERT INTO CURSOS(nome_curso, carga_horaria) VALUES('PHP E MYSQL', 10)";

$executar = mysqli_query($conexao, $query);

$query = "INSERT INTO ALUNOS_CURSOS(id_aluno, id_curso) VALUES(8, 1)";
$executar = mysqli_query($conexao, $query);



if(mysqli_query($conexao, "DELETE FROM ALUNOS WHERE ID_ALUNO = 4 or ID_ALUNO = 1 OR ID_ALUNO = 6")){
    echo 'Apagado com sucesso';
}else{
    echo 'Falha ao apagar dados';
}



if(mysqli_query($conexao, "UPDATE ALUNOS SET NOME_ALUNO = 'Jose Miguel' where ID_ALUNO = 2")){
    echo "Sucesso!";
};




echo '<table border = 1>
        <tr>
            <th> id </th> 
            <th> Nome </th> 
            <th> Data de nascimento </th>
        </tr>';

$consulta = mysqli_query($conexao, "SELECT * FROM ALUNOS");
#print_r($consulta);

while($linha = mysqli_fetch_array($consulta)){
    echo '<tr><td>'.$linha['id_aluno'].'</td>';

    echo '<td>';
    echo $linha['nome_aluno'];
    echo '</td>';
    
    echo '<td>';
    echo $linha['data_nascimento'];
    echo '</td>';
    echo '<tr>';
}

echo '</table>';

#ALTERANDO O NOME DA COLUNA NA TABELA 
mysqli_query($conexao, "ALTER TABLE CURSOS CHANGE id id_curso INT NOT NULL AUTO_INCREMENT");
*/

$consulta = mysqli_query($conexao, "SELECT alunos.nome_aluno, cursos.nome_curso FROM alunos, cursos, alunos_cursos WHERE alunos_cursos.id_aluno = alunos.id_aluno AND alunos_cursos.id_curso = cursos.id_curso
");


echo '<table><tr><th>Nome do aluno</th><th>Nome do curso</th>';

while ($linha = mysqli_fetch_array($consulta)) {
    echo '<tr><td>'.$linha['nome_aluno'].'</td><td>'.$linha['nome_curso'].'</td></tr>';
}

echo '</table';