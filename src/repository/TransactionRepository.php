<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Project.php';

class TransactionRepository extends Repository {
    public function getTransaction(int $id): ?Project {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM transactions WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$project) {
            return null;
        }

        return new Project(
            $project['title'],
            $project['description'],
            $project['image']
        );
    }

    public function addTransaction(Project $project): void {
        $date = new Datetime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO transactions (name, price, category, type, id_created_by, image, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

        $assignedBy = 1;
        $stmt->execute([
            $project->getTitle(),
            2,
            $project->getTitle(),
            $project->getTitle(),
            $assignedBy,
            $project->getImage(),
            $date->format('Y-m-d')
        ]);
    }
}
