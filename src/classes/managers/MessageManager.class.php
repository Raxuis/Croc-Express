<?php

class MessageManager extends Manager {

    public function createOne(object $data): int
    {
        if ($data instanceof Message) {
            $query = "INSERT INTO messages (title, content, user_id, ip) VALUES (:title, :content, :user_id, :ip)";
            $response = $this->bdd->prepare($query);
            $response->execute([
                'title' => $data->getTitle(),
                'content' => $data->getContent(),
                'user_id' => $data->getUserId(),
                'ip' => $data->getIp()
            ]);
        }

        $data->setId($this->bdd->lastInsertId());
        return $this->bdd->lastInsertId();
    }

    public function editOne(object $data): void
    {
        // TODO: Implement editOne() method.
        echo "Editing to implement";
    }
}