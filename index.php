<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php

        session_start();
        require_once ('db/conexao.php');

        // checar a sessão 
        if(!isset($_SESSION["user"])){
            header("Location: login.php");
                die();
        }

        
        $sql = "SELECT * FROM curso;";

        $result = $connection->query($sql);

         
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script> 

function editRoom(id) {
    window.location.assign(`/PIM/editcourse.php?course=${id}`)
}

</script>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">UniSalas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="newcourse.php">Cadastrar<span class="sr-only">(current)</span></a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
                </div>
            </nav>
            </div>
        <div>
    </div>
</div>

<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h2>Salas cadastradas</h2>
		</div>
		<?php foreach($result as $sala) { ?>
            <div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>Turma</th>
							<th>Curso</th>
							<th>Sala</th>
							<th>Bloco</th>
							<th>Andar</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $sala['turma'] ?> </td>
							<td><?php echo $sala['curso'] ?> </td>
							<td><?php echo $sala['sala'] ?> </td>
							<td><?php echo $sala['bloco'] ?> </td>
							<td><?php echo $sala['andar'] ?> </td>
							<td>
								<button type="button" class="btn btn-xs btn-warning" onclick="editRoom(`${<?php echo $sala['id'] ?>}`)">Editar</button>
								<button type="button" class="btn btn-xs btn-danger">Apagar</button>
							</td>
						</tr>              
					</tbody>
				</table>
			</div>
		</div>
       <?php } ?>
	</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>