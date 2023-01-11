<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= $this->Html->meta('icon'); ?>
		<title>Teste Dev DZ</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
	</head>
	<body>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Teste Dev DZ</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</nav>
		<?php echo $this->Flash->render(); ?>
		<div id='main-content'>
			<?php echo $this->fetch('content'); ?>
		</div>

		<div class="toast-container position-fixed bottom-0 end-0 p-3">
			<div id='toast-error' class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="d-flex">
					<div class="toast-body" id='toast-error-body'>
						...
					</div>
					<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
			</div>
		</div>

		<div class="toast-container position-fixed bottom-0 end-0 p-3">
			<div id='toast-success' class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="d-flex">
					<div class="toast-body" id='toast-success-body'>
						...
					</div>
					<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
			</div>
		</div>
		
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/imask"></script>
		<script>
			const BASE_URL = '<?php echo $this->webroot; ?>';
		</script>
		<?php
			$jsFile = WWW_ROOT."js".DS.$this->params['controller'].DS.$this->params['action'].".js";
			echo file_exists($jsFile) ? $this->Html->script($this->params['controller'].'/'.$this->params['action']) : '';
		?>
	</body>
</html>