<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Project.php';
require_once __DIR__ . '/../repository/TransactionRepository.php';

class ProjectController extends AppController {

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $messages = [];
    private $projectRepository;

    public function __construct() {
        parent::__construct();
        $this->projectRepository = new TransactionRepository();
    }
    public function addProject() {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $project = new Project($_POST['title'], $_POST['description'], $_FILES['file']['name']);
            $this->projectRepository->addTransaction($project);

            return $this->render('dashboard', ['messages' => $this->messages, 'project' => $project]);
        }

        $this->render('addProject', ['messages' => $this->messages]);
    }

    private function validate(array $file): bool {
        if($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large for destination file system';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported';
            return false;
        }

        return true;
    }
}