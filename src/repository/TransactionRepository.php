<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Transaction.php';

class TransactionRepository extends Repository {
    public function getTransaction(int $id): ?Transaction {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM transactions WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $transaction = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$transaction) {
            return null;
        }

        return new Transaction(
            $transaction['name'],
            $transaction['price'],
            $transaction['category'],
            $transaction['type'],
            $transaction['image']
        );
    }

    public function addTransaction(Transaction $transaction): void {
        $date = new Datetime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO transactions (name, price, category, type, id_created_by, image, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

        $assignedBy = 1;
        $stmt->execute([
            $transaction->getName(),
            $transaction->getPrice(),
            $transaction->getCategory(),
            $transaction->getType(),
            //TODO: przy sesji dodac numer uzytkownika
            1,
            $transaction->getImage(),
            $date->format('Y-m-d')
        ]);
    }

    public function getTransactions(): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM transactions
        ');

        $stmt->execute();
        $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($transactions as $transaction) {
            $result[] = new Transaction(
                $transaction['name'],
                $transaction['price'],
                $transaction['category'],
                $transaction['type'],
                $transaction['image']
            );
        }

        return $result;
    }
}
