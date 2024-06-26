<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Transaction.php';
require_once __DIR__ . '/../repository/TransactionRepository.php';

class TransactionController extends AppController {

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $messages = [];
    private $transactionRepository;

    public function __construct() {
        parent::__construct();
        $this->transactionRepository = new TransactionRepository();
    }

    public function dashboard() {
        $projects = $this->transactionRepository->getTransactions();
        $this->render('dashboard', ['projects' => $projects]);
    }

    public function addProject() {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $transaction = new Transaction($_POST['title'], $_POST['description'], $_FILES['file']['name']);
            $this->transactionRepository->addTransaction($project);

            return $this->render('dashboard', [
                'messages' => $this->messages, 
                'projects' => $this->transactionRepository->getTransactions()
            ]);
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