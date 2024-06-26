<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>DASHBOARD</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="flex-row-center-center">
        <a href="#"><i class="fas fa-home"></i> Home</a>
        <a href="#"><i class="fas fa-search"></i> Search</a>
        <a href="#"><i class="fas fa-user"></i> Profile</a>
        <a href="#"><i class="fas fa-envelope"></i> Messages</a>
        <a href="#"><i class="fas fa-cog"></i> Settings</a>
    </nav>

    <div class="add flex-column-center-center">
        <i class="fas fa-plus"></i>
    </div>
    <section class="projects">
                <?php foreach ($projects as $transaction): ?>
                <div id="project-1">
                    <img src="public/uploads/<?= $project->getImage() ?>">
                    <div>
                        <h2><?= $project->getTitle() ?></h2>
                        <p><?= $project->getDescription() ?></p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600</i>
                            <i class="fas fa-minus-square"> 121</i>
                        </div>
                    </div>
                </div>
             <?php endforeach; ?>
            </section>
</body>

</html>